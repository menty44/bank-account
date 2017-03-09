@extends('layouts.base')

@section('title', 'Deposit Money')


@section('content')
<form action="{{url('/account/manage/deposit')}}" method="post">
    <div class="form-group">

        {{ csrf_field() }}
        <label for="amount">Want to deposit money? Enter Amount</label>
        <input type='text' name='amount' class='form-control' placeholder='enter amount' >
    </div>
    <div class="btn-group-sm">
        <button name='deposit' type='submit' class='btn btn-primary'>Deposit into Account</button>

    </div>
</form>
@endsection


