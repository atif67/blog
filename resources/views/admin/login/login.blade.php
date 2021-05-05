<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ $settings->favicon }}">
    <title>{{ $settings->site_title }}</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/admin-assets/css/simplebar.css') }}">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/admin-assets/css/feather.css') }}">
    <!-- Date Range Picker CSS -->
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/admin-assets/css/app-light.css') }}" id="lightTheme" disabled>
    <link rel="stylesheet" href="{{ URL::asset('assets/admin-assets/css/app-dark.css') }}" id="darkTheme">
</head>
<body class="dark ">
<div class="wrapper vh-100">
    <div class="row align-items-center h-100">
        <form action="{{ route('login') }}" method="post" class="col-lg-3 col-md-4 col-10 mx-auto text-center">
            @csrf
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="#">
                <svg version="1.1" id="logo" class="navbar-brand-img brand-md" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
              <g>
                  <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                  <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                  <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
              </g>
            </svg>
            </a>
            <h1 class="h6 mb-3"><a href="{{ route('/') }}">Anasayfa</a></h1>
            <div class="form-group">
                <label for="inputEmail" class="sr-only">Email</label>
                <input name="email" type="email" id="inputEmail" class="form-control form-control-lg" placeholder="Email" required="" autofocus="">
            </div>
            <div class="form-group">
                <label for="inputPassword" class="sr-only">Şifre</label>
                <input name="password" type="password" id="inputPassword" class="form-control form-control-lg" placeholder="Şifre" required="">
            </div>
            @if($errors->any())
                <div class="alert alert-danger">*Hatalı Giriş, Lütfen Bilgilerinizi Kontrol Edin*</div>
            @endif
            <button class="btn btn-lg btn-primary btn-block" type="submit">Giriş Yap</button>
        </form>
    </div>
</div>
<script src="{{ URL::asset('assets/admin-assets/js/tinycolor-min.js') }}"></script>
<script src="{{ URL::asset('assets/admin-assets/js/config.js') }}"></script>
</body>
</html>
