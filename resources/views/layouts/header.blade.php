<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="{{ route('/') }}"><img src="{{ URL::asset('assets/img/logo.png') }}" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <aside class="single_sidebar_widget search_widget col-md-4">
                        <form action="{{ route('/') }}" method="get">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Post Ara" style="border:none">
                                <span class="input-group-btn">
                                            <button class="btn btn-default" type="submit"><i class="lnr lnr-magnifier"></i></button>
                                    </span>
                            </div>
                        </form>
                    </aside>
                    <br>
                    <ul class="nav navbar-nav menu_nav justify-content-end">
                        <li class="nav-item {{ request()->is('/') ? 'active' : '' }}"><a class="nav-link" href="{{ route('/') }}">Anasayfa</a></li>
                        @auth()
                            <li class="nav-item {{ request()->is('profile') ? 'active' : '' }}"><a class="nav-link" href="{{ route('profile') }}">Profil</a></li>
                            <li class="nav-item {{ request()->is('new/post') ? 'active' : '' }}"><a class="nav-link" href="{{ route('user.post.create') }}">Post Ekle</a></li>
                            <li class="nav-item"><a class="nav-link" href="javascript:;" onclick="document.getElementById('logout').submit();">Çıkış Yap</a></li>
                            <form action="{{ route('logout') }}" method="post" id="logout">@csrf</form>
                        @else
                            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Giriş Yap</a></li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
