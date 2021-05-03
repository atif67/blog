@extends('admin.layouts.app')

@section('content')
    <div class="card col-md-12 mb-3 ml-3">
        <div class="card-header">
            <div class="d-flex justify-content-between">
            <div>
                <h4>Kategoriler</h4>
            </div>
                <div>
                    <a href="javascript;;" data-toggle="modal" data-target="#newCategory">Yeni Ekle</a>
                </div>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach($categories as $category)
                <div class="col-md-3 mb-3">
                    <div class="card shadow">
                        <div class="card-header">
                            <span class="card-title"><b>{{ $category->name }}</b></span>
                        </div>
                        <div class="card-body my-n2">
                            <div class="d-flex">
                                <div class="flex-fill">
                                    <p>120 Post</p>
                                </div>
                                <div>
                                    <a href="javascript;;" data-toggle="modal" data-target="#updateModal{{$category->id}}"><i class="fa fa-edit mr-2"></i></a>

                                    <a href="javascript;;" data-toggle="modal" data-target="#defaultModal{{$category->id}}"><i class="fa fa-trash"></i></a>
                                    <form action="{{ route('categories.destroy',$category->id) }}" id="delete-category{{$category->id}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </div>
                        </div> <!-- .card-body -->
                    </div> <!-- .card -->
                </div>
            <!-- DELETE MODAL -->
                <div class="modal fade" id="defaultModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="defaultModalLabel">Bu Kategoriyi Silmek İstediğinize Emin Misiniz?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex justify-content-center">
                                    <button type="button" class="btn mb-2 mr-3 btn-secondary" data-dismiss="modal">Hayır</button>
                                    <a href="javascript:;" onclick="document.getElementById('delete-category{{$category->id}}').submit();" class="btn mb-2 btn-primary">Evet</a>
                                </div>

                            </div>
                            <div class="modal-footer">

                            </div>
                        </div>
                    </div>
                </div>
            <!-- / DELETE MODAL -->
                <div class="modal fade" id="updateModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="defaultModalLabel">Kategori Güncelle</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('categories.update',$category->id) }}" id="update-category{{$category->id}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label for="">Kategori Adı</label>
                                        <input name="name" type="text" value="{{ $category->name }}" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn mb-2 mr-3 btn-secondary" data-dismiss="modal">Kapat</button>
                                    <a href="javascript:;" onclick="document.getElementById('update-category{{$category->id}}').submit();" class="btn mb-2 btn-primary">Güncelle</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="modal fade" id="newCategory" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="defaultModalLabel">Kategori Ekle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('categories.create') }}" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="">Kategori Adı</label>
                            <input name="name" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Kapat</button>
                        <button type="submit" class="btn mb-2 btn-primary">Ekle</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
