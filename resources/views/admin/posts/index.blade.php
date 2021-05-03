@extends('admin.layouts.app')

@section('content')
    <div class="col-md-12 mb-4">
        <div class="card shadow">
            <div class="card-header">
                <strong class="card-title">Postlar</strong>
                <strong><a class="float-right small card-title" href="{{ route('posts.create') }}">Yeni Ekle</a></strong>
            </div>
            <div class="card-body">
                @if($data->count() > 0)
                    @foreach($data as $item)
                        <div class="list-group list-group-flush my-n3">
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <a href="#">
                                            <small><strong>{{ $item->title }}</strong></small>
                                            <div class="mb-2 text-muted small">{{ $item->summary }}</div>
                                        </a>

                                        <span class="badge badge-pill badge-primary"><a href="" class="text-white">Category</a></span>
                                        <span class="badge badge-pill badge-warning"><a href="" class="text-white">Tag</a></span>
                                    </div>
                                    <div class="col-auto pr-0">
                                        <a href=""><i class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>Henüz post yok..</p>
                @endif

            </div>

        </div>
    </div>
@endsection
