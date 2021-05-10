@extends('layouts.app')

@section('content')

    @if(!request()->query('search'))
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="main_title">
                    <h2>Keşfet</h2>
                </div>
            </div>
        </div>
    @else
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="main_title">
                    <h2>{{ request()->query('search') }}</h2>
                    @if($foundPost != 0)
                        <b class="text-primary">İle İlgili Postlar</b>
                    @else
                        <h2 class="text-primary">İle İlgili Hiç Post Bulunamadı...</h2>
                        <h4>Diğer postlara göz atın.</h4>
                    @endif
                </div>
            </div>
        </div>
    @endif
    <section class="features_area lazy">
        <div class="container">
            <div class="row feature_inner">
                @foreach($posts as $post)
                <div class="col-lg-4 col-md-4">
                    <a href="{{ route('post.detail',$post->slug) }}" class="text-dark">
                        <div class="feature_item">
                            <img src="{{ isset($post->image) ? URL::asset('uploads/'.$post->image) : '' }}" alt="" width="100%">
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
