@extends('layouts.base')

@section('title', 'Withdraw Money')


@section('content')

<form action="{{url('/account/manage/withdraw')}}" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="amount">Enter Amount to Withdraw</label>
        <input type='text' name='amount' class='form-control' placeholder='enter amount' >
    </div>
    <div class="btn-group-sm">
        <button name='withdraw' type='submit' class='btn btn-primary'>Withdraw from Account</button>
                
            </div>
    </form>
@endsection