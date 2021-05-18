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
            <form action="{{ route('register') }}" method="post" class="login100-form validate-form">
                @csrf
                <span class="login100-form-title p-b-43">
                    Kayıt Ol
                </span>

                <div class="wrap-input100 validate-input" data-validate="Şifre Gerekli">
                    <input class="input100" type="text" name="name">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Kullanıcı Adı</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Lüfren Email Girin">
                    <input class="input100" type="email" name="email">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Email</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Şifre Gerekli">
                    <input class="input100" type="password" name="password">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Şifre</span>
                </div>

                <div class="flex-sb-m w-full p-t-3 p-b-32">
                    <a href="{{ route('login') }}">Hesabın Varsa Giriş Yap</a>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Kayıt Ol
                    </button>
                </div>
            </form>

            <div class="login100-more" style="background-image: url('assets/login/images/bg-04.jpg');">
            </div>
        </div>
    </div>
</div>

<script src="{{ URL::asset('assets/login/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ URL::asset('assets/login/js/main.js') }}"></script>

</body>
</html>
