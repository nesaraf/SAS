<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link target="text/css" rel="stylesheet" href="{{ URL::asset('css/app.css') }}">


</head>
        <style>
        body, html {
  height: 100%;
}


            .header_login{
                padding: 12%;
                
                height: 100%;
                background-image: linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3) ),url("{{ URL::asset('supermarket.jpg') }}");
                background-repeat: no-repeat;
                background-position: center;
                background-size: cover;
                color: #fff;
                font-family: "Comfortaa", "Helvetica", sans-serif;   
                         }

                .card-header{
                    background-color: #0494d4;
                    color: white;
                    text-align: center;
                    border:0;
                    font-size: 1.5em;
                }
                .card{
                    color: #353749;
                    background-color: rgba(255, 255, 255, 0.80);
                    border: 0px;
                }
                .lg{
                    margin-top: 5px;

                }
                @media only screen and (max-width: 600px) {
                   .cart-img{
                      height: 100px;
                      width: 110px;
                }
             }
        </style>
        <body>

  <header class="header_login">

     
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
{{ csrf_field() }}
                        <div class="form-group row">
                            <div class="col-md-6">
                                <img src="{{ URL::asset('shoping cart.png') }}" height="200px" width="220px" class="cart-img" />
                            </div>
                            

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control lg {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="{{ __('E-Mail Address') }}" >

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                <input id="password" type="password" class="form-control lg {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="{{ __('Password') }}" id="lg-btn">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                             <input type="submit" class="btn btn-primary form-control lg" value="{{ __('Login') }}" >


                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                        <div class="col-md-12">
                            @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                
                            </div>
                               </div>
                            </div>


                        </div>


<!--                         <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</header>

<script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>

