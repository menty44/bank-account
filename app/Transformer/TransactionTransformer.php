<?php

namespace App\Transformer;
 
class TransactionTransformer {
 
    public function transform($transaction) {
        return [
            'id' => $transaction->id,
            'balance' => $transaction->balance,
            'withdrawals' => $transaction->withdrawals,
        ];
    }
 
}