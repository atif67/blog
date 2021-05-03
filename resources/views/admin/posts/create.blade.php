@extends('admin.layouts.app')

@section('content')
    <h2 class="page-title">Yeni Post</h2>
    <div class="card shadow mb-4">
        <div class="card-header">
            <strong class="card-title">Yeni Post Ekle</strong>
            @if($errors->any())
                <div class="alert alert-danger" role="alert">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </div>

            @endif
        </div>
        <div class="card-body">
            <div class="row">

                <div class="col-md-12">
                    <form action="{{ route('posts.create') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="simpleinput">Başlık</label>
                            <input name="title" type="text" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="simpleinput">İçerik</label>
                            <textarea name="content" id=""></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="simpleinput">Özet Yazı</label>
                            <textarea name="summary" class="form-control" id="" cols="30" rows="5" maxlength="255"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="simpleinput">Fotoğraf</label>
                            <input name="image" type="file" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="simpleinput">Kategori</label>
                            <select name="cat_id" id="" class="form-control">
                                <option value="" selected>Seç</option>
                                <option value="1">Selam</option>
                                <option value="2">Selam</option>
                                <option value="3">Selam</option>
                                <option value="4">Selam</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Etiket</label>
                            <select name="tag_id" id="" class="form-control">
                                <option value="" selected>Seç</option>
                                <option value="1">Selam</option>
                                <option value="2">Selam</option>
                                <option value="3">Selam</option>
                                <option value=""4>Selam</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <input type="checkbox" id="comment_status" name="comment_status" checked>
                            <label for="comment_status"> Yorumlara izin ver.</label>
                        </div>
                        <div class="form-group mb-3">
                            <button class="btn btn-primary">Paylaş</button>
                        </div>
                    </form>
                </div>
                <!-- /.col -->
            </div>
        </div>
    </div>
@endsection

@section('head')
    <link rel="stylesheet" href="{{ URL::asset('assets/admin-assets/css/quill.snow.css') }}">
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
@endsection

@section('script')

    <script src='{{ URL::asset('assets/admin-assets/js/quill.min.js') }}'></script>
    <script>
        CKEDITOR.replace( 'content' );

    </script>
@endsection
