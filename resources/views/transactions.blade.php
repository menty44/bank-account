@extends('layouts.base')

@section('title', 'All Transactions Balance')


@section('content')
@if($transactions)
<ul class="list-group">
    @foreach($transactions as $transaction)  
    <li class="list-group-item list-group-item-info">
        <?php
        if ($transaction['type'] === 2) {
            $type = 'deposited';
            $a = 'into';
        } elseif ($transaction['type'] === 1) {
            $type = 'withdrew';
            $a = 'from';
        } else {
            $type = '';
            $a = '';
        }
        echo "You $type &#x24;<strong>" . abs($transaction['amount']) . "</strong> " . $a;
        ?>
        your bank account on date <strong> {{$transaction['created_at']}}</strong> 
    </li>
    @endforeach
    <ul>
        @endif
        @endsection
