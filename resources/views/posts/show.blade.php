@extends('layouts.app')

@section('content')
    <section class="blog_area single-post-area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post row">
                        <div class="col-lg-12">
                            <div class="feature-img">
                                <img class="img-fluid" src="{{ URL::asset('storage/'.$post->image) }}" style="width: 100%; height: auto" alt="">
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
                                <li><a href="#">06 Comments<i class="lnr lnr-bubble"></i></a></li>
                            </ul>
                        </div>

                    </div>
                    <div class="comments-area">
                        <h4>Yorumlar</h4>
                        <div class="comment-list">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="img/blog/c1.jpg" alt="">
                                    </div>
                                    <div class="desc">
                                        <h5><a href="#">Emilly Blunt</a></h5>
                                        <p class="date">December 4, 2017 at 3:12 pm </p>
                                        <p class="comment">
                                            Never say goodbye till the end comes!
                                        </p>
                                    </div>
                                </div>
                                <div class="reply-btn">
                                    <a href="" class="btn-reply text-uppercase">reply</a>
                                </div>
                            </div>
                        </div>
                        <div class="comment-list left-padding">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="img/blog/c2.jpg" alt="">
                                    </div>
                                    <div class="desc">
                                        <h5><a href="#">Elsie Cunningham</a></h5>
                                        <p class="date">December 4, 2017 at 3:12 pm </p>
                                        <p class="comment">
                                            Never say goodbye till the end comes!
                                        </p>
                                    </div>
                                </div>
                                <div class="reply-btn">
                                    <a href="" class="btn-reply text-uppercase">reply</a>
                                </div>
                            </div>
                        </div>
                        <div class="comment-list left-padding">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="img/blog/c3.jpg" alt="">
                                    </div>
                                    <div class="desc">
                                        <h5><a href="#">Annie Stephens</a></h5>
                                        <p class="date">December 4, 2017 at 3:12 pm </p>
                                        <p class="comment">
                                            Never say goodbye till the end comes!
                                        </p>
                                    </div>
                                </div>
                                <div class="reply-btn">
                                    <a href="" class="btn-reply text-uppercase">reply</a>
                                </div>
                            </div>
                        </div>
                        <div class="comment-list">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="img/blog/c4.jpg" alt="">
                                    </div>
                                    <div class="desc">
                                        <h5><a href="#">Maria Luna</a></h5>
                                        <p class="date">December 4, 2017 at 3:12 pm </p>
                                        <p class="comment">
                                            Never say goodbye till the end comes!
                                        </p>
                                    </div>
                                </div>
                                <div class="reply-btn">
                                    <a href="" class="btn-reply text-uppercase">reply</a>
                                </div>
                            </div>
                        </div>
                        <div class="comment-list">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="img/blog/c5.jpg" alt="">
                                    </div>
                                    <div class="desc">
                                        <h5><a href="#">Ina Hayes</a></h5>
                                        <p class="date">December 4, 2017 at 3:12 pm </p>
                                        <p class="comment">
                                            Never say goodbye till the end comes!
                                        </p>
                                    </div>
                                </div>
                                <div class="reply-btn">
                                    <a href="" class="btn-reply text-uppercase">reply</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment-form">
                        <h4>Leave a Reply</h4>
                        <form>
                            <div class="form-group form-inline">
                                <div class="form-group col-lg-6 col-md-6 name">
                                    <input type="text" class="form-control" id="name" placeholder="Enter Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
                                </div>
                                <div class="form-group col-lg-6 col-md-6 email">
                                    <input type="email" class="form-control" id="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="subject" placeholder="Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                            </div>
                            <a href="#" class="primary-btn primary_btn"><span>Post Comment</span></a>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget author_widget">
                            <img class="author_img rounded-circle" src="{{ isset($user->avatar) ? URL::asset('storage/'.$user->avatar) : URL::asset('storage/avatar.png') }}" width="130" height="130" alt="">
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
                                <a href="#"><i class="fa fa-github"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                            <p>
                                {{ $user->about }}
                            </p>
                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Popüler Postlar</h3>
                            <div class="media post_item">
                                <img src="img/blog/popular-post/post1.jpg" alt="post">
                                <div class="media-body">
                                    <a href="single-blog.html"><h3>Space The Final Frontier</h3></a>
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
                                        <a href="#" class="d-flex justify-content-between">
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
                            <div class="form-group d-flex flex-row">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Mail Adresiniz" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mail Adresiniz'">
                                </div>
                                <a href="#" class="bbtns">Gönder</a>
                            </div>
                            <p class="text-bottom">İstediğiniz zaman abonelikten çıkablirsiniz.</p>
                            <div class="br"></div>
                        </aside>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
