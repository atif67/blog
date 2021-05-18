<!DOCTYPE html>
<html lang="tr">
<head>
    <title>Kayıt Ol</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ URL::asset('uploads/'.$settings->favicon) }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/login/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/login/css/main.css') }}">
    <!--===============================================================================================-->
</head>
<body style="background-color: #666666;">

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">

            <form action="{{ route('password.email') }}" method="post" class="login100-form validate-form">
                @csrf
                <span class="login100-form-title p-b-43">
                    Şifremi Unuttum
                </span>

                <div class="wrap-input100 validate-input" data-validate="Email Gerekli">
                    <input class="input100" type="text" name="email">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Email</span>
                </div>
                <div class="alert alert-success">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Sıfırla
                    </button>
                </div>

            </form>


            <div class="login100-more" style="background-image: {{ URL::asset('assets/login/images/bg-04.jpg') }}">
            </div>
        </div>
    </div>
</div>


<script src="{{ URL::asset('assets/login/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ URL::asset('assets/login/js/main.js') }}"></script>

</body>
</html>
