<!DOCTYPE html>
<html>
<head>
    <title>Login - IFMOA Nigeria</title>
    <link href="{{url('/lib/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css?family=Numans');
        html,body{
            background-image: linear-gradient(to right, rgb(75, 70, 70),rgb(100, 100, 218));
            background-size: cover;
            background-repeat: no-repeat;
            height: 100%;
            font-family: 'Numans', sans-serif;
        }
        .container{
            height: 100%;
            align-content: center;
        }
        .card{
            margin-top: auto;
            margin-bottom: auto;
            width: 400px;
            background-color: rgba(54, 42, 42, 0.5) !important;
        }
        .social_icon span{
            font-size: 60px;
            margin-left: 10px;
            color: #dc3545;
        }
        .social_icon span:hover{
            color: white;
            cursor: pointer;
        }
        .card-header h3{
            color: white;
        }
        input:focus{
            outline: 0 0 0 0  !important;
            box-shadow: 0 0 0 0 !important;

        }
        .remember{
            color: white;
        }
        .remember input
        {
            width: 20px;
            height: 20px;
            margin-left: 15px;
            margin-right: 5px;
        }
        .login_btn{
            color: black;
            background-color: #dc3545;
            width: 100px;
        }
        .login_btn:hover{
            color: black;
            background-color: white;
        }
        .links{
            color: white;
        }
        .links a{
            margin-left: 4px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card wow fadeInUp">
            <div class="card-header">
                <h3>MEMBER LOGIN</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group form-group">
                        <input type="text" class="form-control{{ $errors->has('registration_number') ? ' is-invalid' : '' }}" name="registration_number" value="{{ old('registration_number') }}" placeholder="Reg number" required autofocus>
                        @if ($errors->has('registration_number'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('registration_number') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-group form-group">
                        <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="password" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row align-items-center remember">
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>Remember Me
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Login" class="btn float-right login_btn">
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center links">
                    Not a Member yet?<a href="{{route('register')}}">Register</a>
                </div>
                <div class="d-flex justify-content-center">
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>