@extends('layouts.base')

@section('title', 'Manage Bank Account')


@section('content')

<ul class="list-group">
    <li class="list-group-item list-group-item-heading">Select Action Below</li>
    <li class="list-group-item list-group-item-heading"><a href="{{url('/account/manage/balance/')}}">View Balance</a></li>
    <li class="list-group-item list-group-item-heading"><a href="{{url('/account/manage/deposit/')}}">Deposit Money</a></li>
    <li class="list-group-item list-group-item-heading"><a href="{{url('/account/manage/withdraw/')}}">Withdraw from Bank</a></li>
    <li class="list-group-item list-group-item-heading"><a href="{{url('/account/manage/transactions/')}}">View Past Transactions</a></li>
</ul>

@endsection