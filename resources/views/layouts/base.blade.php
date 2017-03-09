<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title') - Bank Account</title>
        <link href="{{url('/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{url('/css/style.css')}}" rel="stylesheet" type="text/css">

    </head>

    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="{{url('/')}}" class="navbar-brand">Bank Account</a>
                </div>
                <div id="navbar">
                    <ul class="nav navbar-nav">
                        <li class=""><a href="{{url('/account/manage')}}">Home</a></li>
                    </ul>                
                </div>
            </div>
        </nav>        
        <div class="container">
            <div class="main-page">  
                @if(isset($success))
                <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> {{ $success }}
                </div>
                @endif
                @if(isset($error))
                <div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Error!</strong> {{ $error }}
                </div>
                @endif
                @if(isset($info))
                <div class="alert alert-info alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Info!</strong> {{ $info }}
                </div>
                @endif                
                @yield('content')
            </div>
        </div>

    </body>

    <script src="{{url('/js/jquery-3.1.1.min.js')}}" type="text/javascript"></script>
    <script src="{{url('/js/bootstrap.min.js')}}" type="text/javascript"></script>
</html>
