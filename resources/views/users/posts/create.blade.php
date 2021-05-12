@extends('users.layouts.app')

@section('banner')
    <section class="blog_categorie_area section_gap_top">
        <div class="main_title">
            <h2>{{ isset($post) ? 'Postu Güncelle' : 'Post Ekle' }}</h2>
        </div>
    </section>
@endsection

@section('content')

    <section class="blog_area single-post-area section_gap bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">

                        </div>
                        <div class="card-body">
                            <div class="col-md-12">

                            <form action="{{ isset($post) ? route('user.post.edit',$post->slug) : route('user.post.create') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @if(isset($post))
                                    @method('PUT')
                                @endif
                                <div class="form-group mb-3">
                                    <label for="simpleinput">Başlık*</label>
                                    <input name="title" type="text" class="form-control" value="{{ isset($post) ? $post->title : old('title') }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="simpleinput">İçerik*</label>
                                    <textarea name="content" id="content">{{ isset($post) ? $post->content : old('content') }}</textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="simpleinput">Özet Yazı*</label>
                                    <textarea name="summary" class="form-control" id="" cols="30" rows="5" maxlength="250">{{ isset($post) ? $post->summary : old('summary') }}</textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="simpleinput">Kapak Fotoğrafı</label>
                                    <input name="image" type="file" class="form-control" accept="image/x-png,image/gif,image/jpeg">
                                </div>
                                @if(isset($post))
                                    @if($post->image)
                                        <div class="form-group mb-3">
                                            <img src="{{ URL::asset('uploads/'.$post->image) }}" width="200" height="auto" alt="">
                                        </div>
                                    @endif
                                @endif
                                <div class="form-group mb-3">
                                    <label for="simpleinput">Kategori*</label>
                                    @if($categories->count() > 0)
                                        <select name="cat_id" id="" class="form-control" required>
                                            <option value="" selected>Seç</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}"
                                                        @if(isset($post) && $post->cat_id == $category->id)
                                                        selected
                                                    @endif
                                                >{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <input type="text" class="form-control" placeholder="Lütfen Kategori Oluşturun" disabled>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Etiket*</label>
                                    @if($tags->count() > 0)
                                        <select name="tag_id[]" id="tags" multiple class="form-control" required>
                                            @foreach($tags as $tag)
                                                <option value="{{ $tag->id }}"
                                                    @if(isset($post))
                                                        @foreach($post_tags as $item)
                                                            @if($item->tag_id == $tag->id && $item->post_id == $post->id)
                                                                selected
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                >{{ $tag->name }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <input type="text" class="form-control" placeholder="Lütfen Etiket Oluşturun" disabled>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="checkbox" id="comment_status" name="comment_status"
                                       @if(isset($post))
                                            @if($post->comment_status == 1)
                                                checked
                                            @endif
                                        @else
                                           checked
                                        @endif
                                    >
                                    <label for="comment_status"> Yorumlara izin ver.</label>
                                </div>
                                <div class="form-group mb-3">
                                    <button class="btn btn-primary">
                                        {{ isset($post) ? 'Güncelle' : 'Paylaş' }}
                                    </button>
                                </div>
                            </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('head')
    <link rel="stylesheet" href="{{ URL::asset('assets/admin-assets/css/quill.snow.css') }}">
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <script src='{{ URL::asset('assets/admin-assets/js/quill.min.js') }}'></script>
    <script>
        CKEDITOR.replace( 'content' );

        $(document).ready(function() {
            $('#tags').select2();
        });
    </script>
@endsection
