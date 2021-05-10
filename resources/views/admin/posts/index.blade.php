@extends('admin.layouts.app')

@section('content')
    <div class="col-md-12 mb-4">
        <div class="card shadow">
            <div class="card-header">
                <strong class="card-title">Yazılar - Toplam {{ $postsAllCount }} Adet</strong>
                <form id="search" class="d-inline">
                    <input class="ml-3" name="search" type="text" placeholder="Ara..." style="border: none; border-bottom: 1px solid darkgray;">
                    <a href="javascript:;" onclick="document.getElementById('search').submit();"><i class="btn fa fa-search"></i></a>
                </form>
                <strong><a class="float-right small card-title" href="{{ route('posts.create') }}">Yeni Ekle</a></strong>
            </div>
            <div class="card-body">
                @if($posts->count() > 0)
                    @foreach($posts as $post)
                        <div class="list-group list-group-flush my-n3">
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <a href="{{ route('posts.show',$post->slug) }}">
                                            <small><strong>{{ $post->title }}</strong></small>
                                            <div class="mb-2 text-muted small">{{ $post->summary }}</div>
                                        </a>

                                        <span class="badge badge-pill badge-primary"><a href="?category-id={{ $post->cat_id }}" class="text-white">{{ $post->category->name }}</a></span>
                                        @foreach($post_tags as $item)
                                            @if($item->post_id == $post->id)
                                                <span class="badge badge-pill badge-dark"><a href="javascript:void 0;" class="text-white"> {{ $item->tags->name }}</a></span>
                                            @endif
                                        @endforeach

                                    </div>
                                    <div class="col-auto pr-0">
                                        <a href="{{ route('post.detail',$post->slug) }}"><i class="fa fa-eye"></i></a><br>
                                        <a href="javascript:;" data-toggle="modal" data-target="#defaultModal{{$post->id}}"><i class="fa fa-trash"></i></a>
                                        <form action="{{ route('posts.destroy',$post->slug) }}" id="delete-post{{ $post->slug }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        @if($post->trend_post_status == 0)
                                            <a href="javascript:;" onclick="document.getElementById('trend-on{{$post->id}}').submit();" data-toggle="popover" data-trigger="hover" data-content="Popüler Post Olarak İşaretle"><i class="fas fa-check"></i></a>
                                            <form action="{{ route('trend-on',$post->id) }}" id="trend-on{{ $post->id }}" method="post">
                                                @csrf
                                            </form>
                                        @else
                                            <a href="javascript:;" onclick="document.getElementById('trend-off{{$post->id}}').submit();" data-toggle="popover" data-trigger="hover" data-content="Popüler Post Olarak İşaretlendi. Çıkartmak İçin Tıklayın."><i class="fa fa-star"></i></a>
                                            <form action="{{ route('trend-off',$post->id) }}" id="trend-off{{ $post->id }}" method="post">
                                                @csrf
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <!-- DELETE MODAL -->
                        <div class="modal fade" id="defaultModal{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="defaultModalLabel">Bu Postu Silmek İstediğinize Emin Misiniz?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="d-flex justify-content-center">
                                            <button type="button" class="btn mb-2 mr-3 btn-secondary" data-dismiss="modal">Hayır</button>
                                            <a href="javascript:;" onclick="document.getElementById('delete-post{{$post->slug}}').submit();" class="btn mb-2 btn-primary">Evet</a>
                                        </div>

                                    </div>
                                    <div class="modal-footer">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- / DELETE MODAL -->
                    @endforeach
                @else
                    <p>Post Bulunamadı</p>
                @endif

            </div>

        </div>
    </div>

    {{ $posts->appends([
        'category-id' => request()->query('category-id'),
        'user' => request()->query('user'),
        'search' => request()->query('search')
     ])->links('pagination::bootstrap-4') }}

@endsection

@section('head')
    <style>
        .popover-content {
            color: black;
        }
    </style>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover();
        });
    </script>
@endsection
