<?php
namespace App\Http\Controllers;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TransactionController extends Controller {
    private $withdrawal = 1;
    private $deposit = 2;
    private $depositMax = 150000;
    private $withdrawMax = 40000;
    private $depositMaxPerTrx = 40000;
    private $withdrawalMaxPerTrx = 20000;
    /**
     * Display the bank account home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $transactions = Transaction::all();
        return response()->view('manage', $transactions, 200)->header('Content-Type', '');
    }
    /**
     * Show the form for adding deposit to the bank.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $data = array();
        return response()->view('deposit', $data, 200)->header('Content-Type', '');
    }
    /**
     * Adds Deposited money to the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $date = Carbon::now()->toDateString();
        $validate = $this->checkTimeout($this->deposit);
        $amount = abs($request->input('amount'));
        if ($amount > $this->depositMaxPerTrx) {
            $arr = array('info' => "Sorry. You cannot deposit more than &#x24;$this->depositMaxPerTrx in one go. Please try again");
            return response()->view('deposit', $arr, 200)->header('Content-Type', '');
        }
        if (!empty($validate['status']) && ($validate['status'] === true)) {
            $count = (int) $validate['count'];
            $count += 1;
            $save = $this->saveToDb((float) $amount, $this->deposit, $count, $date);
            $msg = ($save['status'] === 'success') ? array('success' => "Amount Deposited Successfully") : array('info' => $save['message']);
            return response()->view('manage', $msg, 200)->header('Content-Type', '');
        } else {
            $arr1 = array('info' => "Sorry. You have exceeded the maximum number of deposits for today. Try again tomorrow");
            return response()->view('manage', $arr1, 200)->header('Content-Type', '');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show() {
        $transactions = Transaction::all()->sortByDesc('created_at');
        return response()->view('transactions', array('transactions' => $transactions), 200)->header('Content-Type', '');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showBalance() {
        $money = $this->pullBalance();
        return response()
                        ->view('balance', array('balance' => $money, 'code' => 200))
                        ->header('Content-Type', '');
    }
    private function pullBalance($date = Null, $type = Null) {
        if ($date && $type) {
            $today = Carbon::parse($date)->toDateString();
            $timeDiff = (strtotime($date)) - (strtotime($today));           
            $amounts = ($timeDiff < 1) ? DB::table('transactions')->where('type', $type)->where('date', $today)->pluck('amount') : DB::table('transactions')->pluck('amount');
        } else {
            $amounts = DB::table('transactions')->pluck('amount');
        }
        $totalMoney = 0;
        if (!empty($amounts)) {
            foreach ($amounts as $amount) {
                $totalMoney += $amount;
            }
        }
        return $totalMoney;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit() {
        return view('withdraw');
    }
    /**
     * Updates database when money is withdrawn
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        $validate = $this->checkTimeout($this->withdrawal);
        $date = Carbon::now('Africa/Nairobi')->toDateString();
        $amount = $request->input('amount');
        $balance = $this->pullBalance();
        $count = $validate['count'];
        $count += 1;
        if ($amount > $this->withdrawalMaxPerTrx) {
            $data = array('info' => "Sorry. You cannot withdraw more than &#x24;$this->withdrawalMaxPerTrx in one go. Please try again");
            return response()->view('withdraw', $data, 200)->header('Content-Type', '');
        }
        if (!empty($validate) && ($validate['status'] === true)) {
            if ($amount < $balance) {
                $save = $this->saveToDb(-(int) $amount, $this->withdrawal, $count, $date);
                $array = ($save['status'] === 'success') ? array('success' => "You have successfully withdrawn &#x24; $amount from your bank account") : array('info', $save['message']);
                return response()->view('manage', $array, 200)->header('Content-Type', '');
            } else {
                return response()->view('withdraw', array('error' => "Insuffient account balance to withdraw &#x24; $amount"), 200)->header('Content-Type', '');
            }
        } else {
            $arr3 = array('info'=> "Sorry. You have exceeded the maximum number of allowed withdrawals for today. Try again tomorrow");
            return response()->view('manage', $arr3, 200)->header('Content-Type', '');
        }
    }
    /**
     * Save to database. Added to avoid repetition between withdrawals and deposits
     * @param type $amount
     * @param type $type
     * @param type $count
     */
    private function saveToDb($amount, $type, $count, $date) {
        $bal = $this->pullBalance($date, $type);
        $bal += $amount;
        if (($type === $this->deposit) && ($bal > $this->depositMax)) {
            $data = array('status' => 'info', 'message' => "Sorry. You can not deposit more than &#x24;$this->depositMax in one single day. Try again tomorrow or deposit &#x24;" . ($bal - $this->depositMax) . " or less");
            return $data;
        }
        if (($type === $this->withdrawal) && ($bal > $this->withdrawMax)) {
            $data = array('status' => 'info', 'message' => "Sorry. You can not withdraw more than &#x24;$this->withdrawMax in one single day. Try again tomorrow or withdraw &#x24;" . ($bal - $this->withdrawMax) . " or less");
            return $data;
        }
        $trx = new Transaction();
        $trx->amount = (float) $amount;
        $trx->type = $type;
        $trx->count = (int) $count;
        $trx->date = $date;
        $trx->save();
        $data = array('status' => 'success');
        return $data;
    }
    /**
     * Checks if max allowed time for deposits or withdrawals is exceeded
     * @param type $type
     * @return boolean|int
     */
    private function checkTimeout($type) {
        if ($type === $this->deposit) {
            $max = (int) 4;
        }
        if ($type === $this->withdrawal) {
            $max = (int) 3;
        }
        $today = Carbon::now('Africa/Nairobi');
        $lastRow = DB::table('transactions')->where('type', $type)->orderBy('id', 'desc')->first();
        if (!empty($lastRow)) {
            $lastRowArray = get_object_vars($lastRow);
            $count = $lastRowArray['count'];
            $lastDate = Carbon::parse($lastRowArray['created_at']);
        } else {
            $lastDate = $today;
            $count = 0;
        }
        $timeDiff = $today->diffInDays($lastDate);
        $data = ($timeDiff < 24) && ($count < $max) ? array('status' => true, 'count' => $count) : $data = array('status' => false, 'count' => $count);
        return $data;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}
