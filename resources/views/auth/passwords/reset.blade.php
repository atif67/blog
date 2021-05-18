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
            <form action="{{ route('password.update') }}" method="post" class="login100-form validate-form">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <span class="login100-form-title p-b-43">
                    Şifreni Sıfırla
                </span>

                <div class="wrap-input100 validate-input" data-validate="Şifre Gerekli">
                    <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    <span class="focus-input100"></span>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="wrap-input100 validate-input" data-validate="Şifre Gerekli">
                    <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Şifre</span>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="wrap-input100 validate-input" data-validate="Şifre Gerekli">
                    <input id="password-confirm" type="password" class="input100" name="password_confirmation" required autocomplete="new-password">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Şifre Tekrarı</span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Şifreni Sıfırla
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


