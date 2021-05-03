@extends('admin.layouts.app')

@section('content')
    <div class="card col-md-12 mb-3 ml-3">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <h4>Etiketler</h4>
                </div>
                <div>
                    <a href="javascript;;" data-toggle="modal" data-target="#newCategory">Yeni Ekle</a>
                </div>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach($tags as $tag)
                <div class="col-md-3 mb-3">
                    <div class="card shadow">
                        <div class="card-header">
                            <span class="card-title"><b>{{ $tag->name }}</b></span>
                        </div>
                        <div class="card-body my-n2">
                            <div class="d-flex">
                                <div class="flex-fill">
                                    <p>120 Post</p>
                                </div>
                                <div>
                                    <a href="javascript;;" data-toggle="modal" data-target="#updateModal{{$tag->id}}"><i class="fa fa-edit mr-2"></i></a>

                                    <a href="javascript;;" data-toggle="modal" data-target="#defaultModal{{$tag->id}}"><i class="fa fa-trash"></i></a>
                                    <form action="{{ route('tags.destroy',$tag->id) }}" id="delete-category{{$tag->id}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </div>
                        </div> <!-- .card-body -->
                    </div> <!-- .card -->
                </div>
                <!-- DELETE MODAL -->
                <div class="modal fade" id="defaultModal{{$tag->id}}" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="defaultModalLabel">Bu Etiketi Silmek İstediğinize Emin Misiniz?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex justify-content-center">
                                    <button type="button" class="btn mb-2 mr-3 btn-secondary" data-dismiss="modal">Hayır</button>
                                    <a href="javascript:;" onclick="document.getElementById('delete-category{{$tag->id}}').submit();" class="btn mb-2 btn-primary">Evet</a>
                                </div>

                            </div>
                            <div class="modal-footer">

                            </div>
                        </div>
                    </div>
                </div>
                <!-- / DELETE MODAL -->
                <div class="modal fade" id="updateModal{{$tag->id}}" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="defaultModalLabel">Etiket Güncelle</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('tags.update',$tag->id) }}" id="update-category{{$tag->id}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label for="">Etiket Adı</label>
                                        <input name="name" type="text" value="{{ $tag->name }}" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn mb-2 mr-3 btn-secondary" data-dismiss="modal">Kapat</button>
                                    <a href="javascript:;" onclick="document.getElementById('update-category{{$tag->id}}').submit();" class="btn mb-2 btn-primary">Güncelle</a>
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
                    <h5 class="modal-title" id="defaultModalLabel">Etiket Ekle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('tags.create') }}" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="">Etiket Adı</label>
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
