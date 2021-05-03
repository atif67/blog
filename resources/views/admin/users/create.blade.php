@extends('admin.layouts.app')


@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    Kullanıcı İşlemleri
                </div>
                <div class="">
                    <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm mr-2"><i class="fa fa-plus"></i></a>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary btn-sm">Hepsi</a>
                    <a href="{{ route('users.index').'?role=1' }}" class="btn btn-primary btn-sm">Yöneticiler</a>
                    <a href="{{ route('users.index').'?role=2' }}" class="btn btn-secondary btn-sm">Editörler</a>
                    <a href="{{ route('users.index').'?role=3' }}" class="btn btn-primary btn-sm">Yazarlar</a>
                    <a href="{{ route('users.index').'?role=4' }}" class="btn btn-secondary btn-sm">Aboneler</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">

            <div class="col-md-12">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <p>Lütfen Formu Kontrol Edin</p>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </div>

                @endif
                <form action="{{ isset($user) ? route('users.update',$user->id) : route('users.create') }}" method="post">
                    @csrf
                    @if(isset($user))
                        @method('PUT')
                    @endif
                    <div class="form-group mb-3">
                        <label for="simpleinput">Kullanıcı Adı</label>
                        <input name="name" type="text" class="form-control" value="{{ isset($user) ? $user->name : '' }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="simpleinput">Email</label>
                        <input name="email" type="email" class="form-control" value="{{ isset($user) ? $user->email : '' }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="simpleinput">Şifre</label>
                        <input name="password" type="password" class="form-control" {{ isset($user) ? '' : 'required' }}>
                    </div>
                    <div class="form-group mb-3">
                        <label for="simpleinput">Kullanıcı Rolü</label>
                        <select name="role_id" id="" class="form-control" required>
                            <option value="" selected>Seç</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}"
                                @if(isset($user))
                                    @if($role->id == $user->role_id)
                                        selected
                                    @endif
                                @endif
                                >{{ $role->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <button class="btn btn-primary">
                            {{ isset($user) ? 'Güncelle' : 'Oluştur' }}
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.col -->
        </div>
    </div>
@endsection
