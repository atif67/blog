@extends('layouts.app')

@section('content')
    <section class="blog_area single-post-area section_gap bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post row">
                        <div class="col-lg-12">
                            <div class="feature-img">
                                <img class="img-fluid" src="{{ URL::asset('uploads/'.$post->image) }}" style="width: 100%; height: auto" alt="">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 blog_details">
                            <h1>{{ $post->title }}</h1>
                            <p>
                                {!! $post->content !!}
                            </p>
                        </div>

                    </div>
                    <hr>
                    <div class="blog_info">
                        <div class="post_tag">
                            <a class="active" href="#">{{ $post->category->name }}</a>
                            @foreach($post_tags as $item)
                                @if($item->post_id == $post->id)
                                    <a href="">{{ $item->tags->name }}</a>,
                                @endif
                            @endforeach
                            <ul class="blog_meta list">
                                <li><a href="#">{{ $user->name }}<i class="lnr lnr-user"></i></a></li>
                                <?php
                                    $publishDate = explode(' ',$post->created_at);
                                ?>
                                <li><a href="#">{{ $publishDate[0] }}<i class="lnr lnr-calendar-full"></i></a></li>
                                <!-- <li><a href="#">1.2M Views<i class="lnr lnr-eye"></i></a></li>-->
                                @if($post->comment_status == 1)
                                    <li><a href="#">Yorumlar {{ $confirmedCommentsCount }}<i class="lnr lnr-bubble"></i></a></li>
                                @endif
                            </ul>
                        </div>

                    </div>
                    @if(session()->has('waitingForCheck') == 'ok')
                        <div class="alert alert-success">Yorumunuz modoratörler tarafından onaylanmak üzere başarıyla gönderilmiştir.</div>
                    @endif

                    @if($confirmedCommentsCount > 0)
                        <div class="comments-area">
                            <h4>Yorumlar</h4>
                            <div class="comment-list">
                                    @foreach($comments as $comment)
                                        @if($comment->confirmation_status == 1)
                                            <div class="single-comment justify-content-between d-flex">
                                                <div class="user justify-content-between d-flex">
                                                    <div class="thumb">
                                                        <img src="{{ isset($comment->user->avatar) ? URL::asset('uploads/'.$comment->user->avatar) : URL::asset('uploads/images/avatar.png') }}" width="50" height="50" alt="">
                                                    </div>
                                                    <div class="desc">
                                                        <h5><a href="#">{{ $comment->user->name }}</a></h5>
                                                        <p class="date">{{ $comment->created_at }}</p>
                                                        <p class="comment">
                                                            {{ $comment->content }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                    @endif
                        @if($post->comment_status == 1)
                            @auth
                                @if(auth()->user()->verifyEmail())
                                <div class="comment-form">
                                    <h4>Yorum Yap</h4>
                                    <form action="{{ route('comments.create',$post->id) }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <textarea class="form-control mb-10" rows="5" name="content" placeholder="Yorum" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Yorum'" required="" maxlength="2500"></textarea>
                                        </div>
                                        <button class="primary-btn primary_btn"><span>Gönder</span></button>
                                    </form>
                                </div>
                                @else
                                    <div class="comment-form">
                                        <p>Lütfen Mail Adresinizi <a href="{{ route('profile') }}">Onaylayın</a></p>
                                    </div>
                                @endif
                            @else
                                <div class="comment-form">
                                    <p>Yorum Yapabilmek için lütfen <a href="{{ route('login') }}">giriş</a> yapın.</p>
                                </div>
                            @endauth
                        @endif
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget author_widget">
                            <img class="author_img rounded-circle" src="{{ isset($user->avatar) ? URL::asset('uploads/'.$user->avatar) : URL::asset('uploads/images/avatar.png') }}" width="130" height="130" alt="">
                            <h4>
                                {{ $user->name }}
                            </h4>
                            <p>
                                @foreach($roles as $role)
                                    @if($user->role_id == $role->id)
                                        {{ $role->name }}
                                    @endif
                                @endforeach
                            </p>
                            <div class="social_icon">
                                <a href="{{ isset($socialLinks->github) ? $socialLinks->github : 'javascript:void(0);' }}"><i class="fa fa-github"></i></a>
                                <a href="{{ isset($socialLinks->twitter) ? $socialLinks->twitter : 'javascript:void(0);' }}"><i class="fa fa-twitter"></i></a>
                                <a href="{{ isset($socialLinks->instagram) ? $socialLinks->instagram : 'javascript:void(0);' }}"><i class="fa fa-instagram"></i></a>
                                <a href="{{ isset($socialLinks->facebook) ? $socialLinks->facebook : 'javascript:void(0);' }}"><i class="fa fa-facebook"></i></a>
                                <a href="{{ isset($socialLinks->linkedin) ? $socialLinks->linkedin : 'javascript:void(0);'}}"><i class="fa fa-linkedin"></i></a>
                            </div>
                            <p>
                                {{ $user->about }}
                            </p>
                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Popüler Postlar</h3>
                            <div class="media post_item">
                                <div class="media-body">
                                    @foreach($popularPosts as $posts)
                                        <a href="{{ route('post.detail',$posts->slug) }}" class="text-dark">{{ $posts->title }}</a>
                                        <hr>
                                    @endforeach
                                </div>
                            </div>

                        </aside>
                        <br>
                        <aside class="single_sidebar_widget ads_widget">
                            <a href="#"><img class="img-fluid" src="img/blog/add.jpg" alt=""></a>
                        </aside>
                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Kategoriler</h4>
                            <ul class="list cat-list">
                                @foreach($categories as $category)
                                    <li>
                                        <a href="{{ route('/','category='.$category->id) }}" class="d-flex justify-content-between">
                                            <p>{{ $category->name }}</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </aside>
                        <br>
                        <aside class="single-sidebar-widget tag_cloud_widget">
                            <h4 class="widget_title">Etiketler</h4>
                            <ul class="list">
                                @foreach($tags as $tag)
                                    <li>
                                        <a href="#">
                                            <p>{{ $tag->name }}</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </aside>
                        <br>
                        <aside class="single-sidebar-widget newsletter_widget">
                            <h4 class="widget_title">Abone ol</h4>
                            <p>
                                Yeni bir gönderi paylaşıldığı zaman hemen haberin olsun.
                            </p>
                            @if(session()->has('mail') == 'ok')
                                <div class="alert alert-success">Mail Adresiniz Başarıyla Gönderildi.</div>
                            @endif
                            <form action="{{ route('subscribe') }}" method="post" id="post_email">
                                @csrf
                            <div class="form-group d-flex flex-row">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                    </div>
                                    <input name="email" type="email" class="form-control" id="inlineFormInputGroup" placeholder="Mail Adresiniz" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mail Adresiniz'" required>
                                </div>
                                <a href="javascript:;" onclick="document.getElementById('post_email').submit();" class="bbtns">Gönder</a>
                            </div>
                            </form>
                            <p class="text-bottom">İstediğiniz zaman abonelikten çıkabilirsiniz.</p>
                            <div class="br"></div>
                        </aside>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
