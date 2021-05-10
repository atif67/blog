<!doctype html>
<html lang="tr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ URL::asset('storage/'.$settings->favicon) }}" type="image/png">
    <title>{{ $settings->site_title }}</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/vendors/linericon/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/vendors/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/vendors/nice-select/css/nice-select.css') }}">
    <!-- main css -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    @yield('head')
</head>

<body class="blog_version">

@include('layouts.header')


@yield('banner')

<section class="blog_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog_left_sidebar">
                    @yield('content')
                </div>
            </div>

        </div>
    </div>
</section>

<!--================Blog Area =================-->

<!--================Footer Area =================-->
<footer class="footer_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="footer_top flex-column">
                    <div class="footer_social">
                        <a href="https://github.com/atif67" target="_blank"><i class="fa fa-github"></i></a>
                        <a href="https://twitter.com/atfdalbay" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="https://www.instagram.com/atifdalbay/" target="_blank"><i class="fa fa-instagram"></i></a>
                        <a href="mailto:ahmetatifdalbay67@gmail.com" target="_blank"><i class="fa fa-envelope-o"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row footer_bottom justify-content-center">
            <p class="col-lg-8 col-sm-12 footer-text">
                Tüm Hakları Saklıdır Powered By <a href="https://ahmetatifdalbay.com/" target="_blank">Atıf</a>
            </p>
        </div>
    </div>
</footer>
<!--================End Footer Area =================-->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ URL::asset('assets/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/popper.js') }}"></script>
<script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/stellar.js') }}"></script>
<script src="{{ URL::asset('assets/vendors/lightbox/simpleLightbox.min.js') }}"></script>
<script src="{{ URL::asset('assets/vendors/nice-select/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ URL::asset('assets/vendors/isotope/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ URL::asset('assets/vendors/isotope/isotope-min.js') }}"></script>
<script src="{{ URL::asset('assets/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/mail-script.js') }}"></script>
<script src="{{ URL::asset('assets/js/theme.js') }}"></script>

@yield('script')

</body>
</html>

