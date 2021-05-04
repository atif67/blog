<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ URL::asset('storage/'.$settings->favicon) }}">
    <title>{{ $settings->site_title }}</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/admin-assets/css/simplebar.css') }}">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/admin-assets/css/feather.css') }}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/admin-assets/css/daterangepicker.css') }}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/admin-assets/css/app-light.css') }}" id="lightTheme" disabled>
    <link rel="stylesheet" href="{{ URL::asset('assets/admin-assets/css/app-dark.css') }}" id="darkTheme">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    @yield('head')
    <style>
        a:hover{
            text-decoration: none;
        }

    </style>
</head>
<body class="vertical  dark  ">
<div class="wrapper">
    <nav class="topnav navbar navbar-light">
        <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
            <i class="fe fe-menu navbar-toggler-icon"></i>
        </button>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="dark">
                    <i class="fe fe-sun fe-16"></i>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="avatar avatar-sm mt-2">
                <img src="{{ isset(auth()->user()->avatar) ? URL::asset('storage/'.auth()->user()->avatar) : URL::asset('storage/avatar.png') }}" alt="..." class="avatar-img rounded-circle">
              </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('users.profile') }}">Profil</a>
                    <a class="dropdown-item" href="#">Ayarlar</a>
                    <a class="dropdown-item" href="javascript:;" onclick="document.getElementById('logout').submit();">Çıkış Yap</a>

                    <form action="{{ route('logout') }}" id="logout" method="post">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </nav>
    <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
            <i class="fe fe-x"><span class="sr-only"></span></i>
        </a>
        <nav class="vertnav navbar navbar-light">
            <!-- nav bar -->
            <div class="w-100 mb-4 d-flex">
                <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{ route('admin.home') }}">
                    <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
                <g>
                    <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                    <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                    <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                </g>
              </svg>
                </a>
            </div>
            <p class="text-muted nav-heading mt-4 mb-1">
                <span>Menü</span>
            </p>
            <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item {{ preg_match('/posts/',request()->url()) ? 'active' : '' }}">
                    <a href="{{ route('posts.index') }}" class=" nav-link">
                        <i class="fas fa-paste"></i>
                        <span class="ml-3 item-text">Yazılar</span>
                    </a>
                </li>
                @if(auth()->user()->role_id == 1)
                    <li class="nav-item {{ preg_match('/users/',request()->url()) ? 'active' : '' }}">
                        <a href="{{ route('users.index') }}" class=" nav-link">
                            <i class="fas fa-users"></i>
                            <span class="ml-3 item-text">Kullanıcılar</span>
                        </a>
                    </li>
                @endif
                @if(auth()->user()->role_id != 3)
                    <li class="nav-item {{ preg_match('/comments/',request()->url()) ? 'active' : '' }}">
                        <a href="{{ route('comments.index') }}" class=" nav-link">
                            <i class="fas fa-comments"></i>
                            <span class="ml-3 item-text">Yorumlar</span>
                        </a>
                    </li>
                @endif
                <li class="nav-item {{ preg_match('/categories/',request()->url()) ? 'active' : '' }}">
                    <a href="{{ route('categories.index') }}" class=" nav-link">
                        <i class="fab fa-buromobelexperte"></i>
                        <span class="ml-3 item-text">Kategoriler</span>
                    </a>
                </li>
                <li class="nav-item {{ preg_match('/tags/',request()->url()) ? 'active' : '' }}">
                    <a href="{{ route('tags.index') }}" class=" nav-link">
                        <i class="fas fa-tag"></i>
                        <span class="ml-3 item-text">Etiketler</span>
                    </a>
                </li>
                @if(auth()->user()->role_id == 1)
                    <li class="nav-item {{ preg_match('/settings/',request()->url()) ? 'active' : '' }}">
                        <a href="{{ route('settings') }}" class=" nav-link">
                            <i class="fas fa-cogs"></i>
                            <span class="ml-3 item-text">Ayarlar</span>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
    </aside>
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    @yield('content')
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
    </main> <!-- main -->
</div> <!-- .wrapper -->
<script src="{{ URL::asset('assets/admin-assets/js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('assets/admin-assets/js/popper.min.js') }}"></script>
<script src="{{ URL::asset('assets/admin-assets/js/moment.min.js') }}"></script>
<script src="{{ URL::asset('assets/admin-assets/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('assets/admin-assets/js/simplebar.min.js') }}"></script>
<script src='{{ URL::asset('assets/admin-assets/js/daterangepicker.js') }}'></script>
<script src='{{ URL::asset('assets/admin-assets/js/jquery.stickOnScroll.js') }}'></script>
<script src="{{ URL::asset('assets/admin-assets/js/tinycolor-min.js') }}"></script>
<script src="{{ URL::asset('assets/admin-assets/js/config.js') }}"></script>
<script src="{{ URL::asset('assets/admin-assets/js/apps.js') }}"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag()
    {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-56159088-1');
</script>
@yield('script')
</body>
</html>
