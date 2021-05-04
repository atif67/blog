@extends('admin.layouts.app')

@section('content')
    <div class="col-md-12 mb-4">
        <div class="card shadow">
            <div class="card-header">
                <strong class="card-title">Yazılar</strong>
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
                                        <a href="javascript;;" data-toggle="modal" data-target="#defaultModal{{$post->id}}"><i class="fa fa-trash"></i></a>
                                        <form action="{{ route('posts.destroy',$post->slug) }}" id="delete-post{{ $post->slug }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                    <p>Henüz post yok..</p>
                @endif

            </div>

        </div>
    </div>
@endsection
