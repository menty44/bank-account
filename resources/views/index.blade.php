@extends('layouts.base')

@section('title', 'Home')


@section('content')


<div class="row">        
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <h3 class="center">Howdy! Welcome to your Bank Account Manager</h3>
        <p class="center">
            <a class="btn btn-info" href="{{url('/account/manage')}}">Click Here To manage Bank Account</a>
        </p>
    </div>
    <div class="col-md-4"></div>
</div>
@endsection