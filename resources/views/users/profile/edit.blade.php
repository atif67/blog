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
                    <h2 class="text-center pt-3">Profili Düzenle</h2>
                    <hr>
                    @if(session()->has('status') == 'ok')
                        <div class="alert alert-success">Profiliniz güncellendi.</div>
                    @endif
                    @if(session()->has('error') == 'invalid_pass')
                        <div class="alert alert-danger">Lütfen Şifrenizi Kontrol Edin.</div>
                    @endif
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif
                    <form action="{{ route('profile-edit') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Kullanıcı Adı</label>
                            <input name="name" type="text" class="form-control" value="{{ auth()->user()->name }}">
                        </div>
                        <div class="form-group">
                            <label for="">Hakkımda</label>
                            <textarea name="about" id="" class="form-control" rows="5">{{ auth()->user()->about }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Profil Fotoğrafı</label>
                            <input name="avatar" type="file" class="form-control" value="{{ auth()->user()->name }}">
                        </div>
                        <div class="form-group">
                            <label for="">Eski Şifre</label>
                            <input name="old_pass" type="password" minlength="8" maxlength="30" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Yeni Şifre</label>
                            <input name="new_pass" type="password" minlength="8" maxlength="30" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Twitter Linki <i class="fa fa-twitter"></i></label>
                            <input name="twitter" type="text" class="form-control" value="{{ isset($socialLinks->twitter) ? $socialLinks->twitter : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="">Github Linki <i class="fa fa-github"></i></label>
                            <input name="github" type="text" class="form-control" value="{{ isset($socialLinks->github) ? $socialLinks->github : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="">Facebook Linki <i class="fa fa-facebook"></i></label>
                            <input name="facebook" type="text" class="form-control" value="{{ isset($socialLinks->facebook) ? $socialLinks->facebook : ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">Linkedin Linki <i class="fa fa-linkedin"></i></label>
                            <input name="linkedin" type="text" class="form-control" value="{{ isset($socialLinks->linkedin) ? $socialLinks->linkedin : ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">İnstagram Linki <i class="fa fa-instagram"></i></label>
                            <input name="instagram" type="text" class="form-control" value="{{ isset($socialLinks->instagram) ? $socialLinks->instagram : ''}}">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Güncelle">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
