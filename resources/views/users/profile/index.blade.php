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
                <div class="col-lg-12 posts-list">
                    @if(session()->has('status') == 'ok')
                        <div class="alert alert-success">İşlem Başarı İle Gerçekleşti.</div>
                    @endif
                    @if($posts->count() <= 0)
                            <div class="single-post row p-2">
                                <div class="col-lg-12 bg-white">
                                    <p>Henüz post yok hemen paylaş.</p>
                                </div>
                            </div>
                    @endif
                        @if(session()->has('postDeleted') == 'ok')
                            <div class="alert alert-success">Post başarıyla silindi.</div>
                        @endif
                    @foreach($posts as $post)
                        <div class="single-post row p-2">
                            <div class="col-lg-12">
                                <div class="row justify-content-end p-3">
                                    <div class="dropleft">
                                        <a data-toggle="dropdown" href="" class="text-dark"><i class="fa fa-ellipsis-h fa-lg"></i></a>
                                        <div class="dropdown-menu">
                                            <div class="container">
                                                <a href="{{ route('user.post.edit',$post->slug) }}" class="text-dark"><li>Düzenle</li></a>
                                                <form action="{{ route('user.post.delete',$post->slug) }}" method="post" id="deletePost">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" onclick="return confirm('Postu silmek istediğinizden eminmisiniz ?')" class="text-dark" style="border: none" value="Sil">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="feature-img">
                                    <a href="{{ route('post.detail',$post->slug) }}" class="text-dark">
                                        <a href="{{ route('post.detail',$post->slug) }}" class="text-dark">
                                            <img class="img-fluid" src="{{ URL::asset('uploads/'.$post->image) }}" style="width: 100%; height: auto" alt="">
                                        </a>
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
                </div>
            </div>
        </div>
    </section>
    {{ $posts->links('pagination::bootstrap-4') }}
@endsection
