@extends('users.layouts.app')

@section('banner')
    <section class="blog_categorie_area section_gap_top">
        <div class="main_title">
            <h2>Profilim</h2>
        </div>
    </section>
@endsection

@section('content')

    <section class="blog_area single-post-area section_gap bg-white">
        <div class="container">

            <div class="row">
                <div class="col-lg-8 posts-list">
                    <h2 class="text-center pt-3">Postlarım</h2>
                    <hr>
                    @foreach($posts as $post)
                        <div class="single-post row p-2">
                            <div class="col-lg-12">
                                <div class="row justify-content-end p-3">
                                    <div class="dropleft">
                                        <a data-toggle="dropdown" href="" class="text-dark"><i class="fas fa-ellipsis-v fa-lg"></i></a>
                                        <div class="dropdown-menu">
                                            <div class="container">
                                                <a href="" class="text-dark"><li>Düzenle</li></a>
                                                <a href="" class="text-dark" data-toggle="modal" data-target="#exampleModalScrollable"><li>Sil</li></a>
                                            </div>
                                            <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            ...
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="feature-img">
                                    <a href="{{ route('post.detail',$post->slug) }}" class="text-dark">
                                        <img class="img-fluid" src="{{ URL::asset('uploads/'.$post->image) }}" style="width: 100%; height: auto" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 blog_details">
                                <div>
                                    <h2><a href="{{ route('post.detail',$post->slug) }}" class="text-dark">{{ $post->title }}</a></h2>
                                    <p>
                                        <a href="{{ route('post.detail',$post->slug) }}" class="text-dark">{!! $post->summary !!}</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach

                    @if(session()->has('waitingForCheck') == 'ok')
                        <div class="alert alert-success">Yorumunuz modoratörler tarafından onaylanmak üzere başarıyla gönderilmiştir.</div>
                    @endif

                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <a href=""><i class="fa fa-edit fa-lg"></i></a>
                        <aside class="single_sidebar_widget author_widget">
                            <img class="author_img rounded-circle" src="{{ isset(auth()->user()->avatar) ? URL::asset('uploads/'.auth()->user()->avatar) : URL::asset('uploads/images/avatar.png') }}" width="130" height="130" alt="">
                            <h4>
                                {{ auth()->user()->name }}
                            </h4>
                            <p>
                                {{ auth()->user()->about }}
                            </p>
                            <div class="social_icon">
                                <a href="#"><i class="fa fa-github"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </div>
                            <p>

                            </p>
                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Popüler Postlar</h3>
                            <div class="media post_item">
                                <div class="media-body">

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

                            </ul>
                        </aside>
                        <br>
                        <aside class="single-sidebar-widget tag_cloud_widget">
                            <h4 class="widget_title">Etiketler</h4>
                            <ul class="list">
                                <li>
                                    <a href="">Elamm</a>
                                </li>
                            </ul>
                        </aside>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{ $posts->links('pagination::bootstrap-4') }}
@endsection
