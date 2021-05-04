@extends('admin.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Site Ayarları
        </div>
        <div class="card-body">
            @if(session()->has('status') == 'ok')
                <div class="col-12 mb-4">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Site Ayarları Güncellendi. <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
            @if(session()->has('error') == 'missing_fields')
                    <div class="col-12 mb-4">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Lütfen Formu Kontrol Edin. <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
            @endif
            <form action="" method="post" enctype="multipart/form-data" class="col-md-4">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Site Başlığı</label>
                    <input name="site_title" type="text" value="{{ $settings->site_title }}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Favicon</label>
                    <input name="favicon" type="file" class="form-control" accept="image/x-icon">
                    @if(isset($settings->favicon))
                        <img src="{{ URL::asset('storage/'.$settings->favicon) }}" alt="">
                    @endif
                </div>
                <div class="form-group">
                    <input type="checkbox" name="direct_comment_status" id="direct_comment_status"
                    @if($settings->direct_comment_status == 1)
                       checked
                    @endif
                    >
                    <label for="direct_comment_status">Yapılan Yorumlar Direkt Olarak Yayınlansın</label>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Kaydet">
                </div>
            </form>
        </div>
    </div>
@endsection
