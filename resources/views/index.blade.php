@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
            <div class="main_title">
                <h2>Keşfet</h2>
                <b class="text-primary">Tüm Postlar</b>
            </div>
        </div>
    </div>

    <section class="features_area">
        <div class="container">
            <div class="row feature_inner">
                @foreach($posts as $post)
                <div class="col-lg-4 col-md-4">
                    <a href="{{ route('post.detail',$post->slug) }}" class="text-dark">
                        <div class="feature_item">
                            <h4>{{ $post->title }}</h4>
                            <p>{{ $post->summary }}</p>
                            @foreach($users as $user)
                                @if($post->user_id == $user->id)
                                    <small><b class="text-dark">Yazan: {{ $user->name }}</b></small>
                                @endif
                            @endforeach
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection

@section('paginator')
    <nav class="blog-pagination justify-content-center d-flex">
        <ul class="pagination">
            <li class="page-item">
                <a href="#" class="page-link" aria-label="Previous">
                <span aria-hidden="true">
                    <span class="lnr lnr-chevron-left"></span>
                </span>
                </a>
            </li>
            <li class="page-item active"><a href="#" class="page-link">01</a></li>
            <li class="page-item"><a href="#" class="page-link">02</a></li>
            <li class="page-item"><a href="#" class="page-link">03</a></li>
            <li class="page-item"><a href="#" class="page-link">04</a></li>
            <li class="page-item"><a href="#" class="page-link">09</a></li>
            <li class="page-item">
                <a href="#" class="page-link" aria-label="Next">
                <span aria-hidden="true">
                    <span class="lnr lnr-chevron-right"></span>
                </span>
                </a>
            </li>
        </ul>
    </nav>
@endsection
