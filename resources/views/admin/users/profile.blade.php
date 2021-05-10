@extends('admin.layouts.app')

@section('content')
    <div class="col-12">
        <h2 class="h3 mb-4 page-title">Profil</h2>
        <div class="row mt-5 align-items-center">
            <div class="col-md-3 text-center mb-5">
                <div class="avatar avatar-xl">
                    <img src="{{ isset(auth()->user()->avatar) ? URL::asset('uploads/'.auth()->user()->avatar) : URL::asset('uploads/images/avatar.png') }}"  alt="..." class="avatar-img rounded-circle">
                </div>
            </div>
            <div class="col">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <h4 class="mb-1">{{ auth()->user()->name }}</h4>
                        <p class="small mb-3">
                            <span class="badge badge-dark">{{ auth()->user()->role->name }}</span>
                            <?php $postCount = 0; ?>
                            @foreach($posts as $post)
                                @if($post->user_id == auth()->id())
                                    <?php $postCount++; ?>
                                @endif
                            @endforeach
                            <span class="badge badge-dark ml-2">Postlar {{ $postCount }} Adet</span>
                        </p>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-7">
                        <p>
                            {{ auth()->user()->about }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        @if(session()->has('status') == 'ok')
            <div class="col-12 mb-4">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Profilin Güncellendi <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif

        <div class="d-flex justify-content-between">
                <div class="card col-md-6">
                    <div class="card-header">
                        <h4>Profilini Güncelle</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.update.profile',auth()->id()) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Kullanıcı Adı:</label>
                                <input name="name" type="text" class="form-control" value="{{ auth()->user()->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Hakkımda:</label>
                                <textarea name="about" id="" cols="30" rows="10" class="form-control">{{ auth()->user()->about }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Profil Resmi:</label>
                                <input name="image" type="file" class="form-control" accept="image/x-png,image/gif,image/jpeg">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Güncelle">
                            </div>
                        </form>
                </div> <!-- .card-body -->
            </div>
            <div class="card col-md-6">
                <div class="card-header">
                    <h4>Şifreni Değiştir</h4>
                    @if(session()->has('error') == 'invalid_pass')
                        <div class="alert alert-danger">Şifre Yanlış</div>
                    @endif
                </div>
                <div class="card-body">
                    <form action="{{ route('users.update.password',auth()->id()) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Eski Şifre:</label>
                            <input name="old_pass" type="password" minlength="8" maxlength="30" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Yeni Şifre:</label>
                            <input name="new_pass" type="password" minlength="8" maxlength="30" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Değiştir">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div> <!-- /.col-12 -->
@endsection
