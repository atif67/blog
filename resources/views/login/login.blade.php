<!DOCTYPE html>
<html lang="tr">
<head>
    <title>Giriş Yap</title>
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
            <form action="{{ route('login') }}" method="post" class="login100-form validate-form">
                @csrf

                <span class="login100-form-title p-b-43">
                    Giriş Yap
                </span>

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
                    <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                        <label class="label-checkbox100" for="ckb1">
                            Beni Hatırla
                        </label>
                    </div>

                    <div>
                        <a href="#" class="txt1">
                            Şifremi Unuttum
                        </a>
                    </div>
                </div>
                <div class="flex-sb-m w-full p-t-3 p-b-32">
                <a href="{{ route('register') }}">Hesabın Yoksa Kayıt Ol</a>
                </div>
                @if(session()->has('status') == 'false')
                    <div class="flex-sb-m w-full p-t-3 p-b-32">
                        <div style="color: darkred">Lütfen Bilgilerinizi Kontrol Edin.</div>
                    </div>
                @endif
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Giriş Yap
                    </button>
                </div>

                <div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							yada
						</span>
                </div>

                <div class="login100-form-social flex-c-m">
                    <a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
                        <i class="fa fa-facebook-f" aria-hidden="true"></i>
                    </a>
                    <a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                    <a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
                        <i class="fa fa-github" aria-hidden="true"></i>
                    </a>
                    <a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
                        <i class="fa fa-google" aria-hidden="true"></i>
                    </a>
                </div>
            </form>

            <div class="login100-more" style="background-image: url('assets/login/images/bg-03.jpg');">
            </div>
        </div>
    </div>
</div>


<script src="{{ URL::asset('assets/login/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ URL::asset('assets/login/js/main.js') }}"></script>

</body>
</html>
