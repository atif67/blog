@extends('users.layouts.app')

@section('banner')
    <section class="blog_categorie_area section_gap_top">
        <div class="main_title">
            <h2>Hesabını Aktif Et</h2>
        </div>
    </section>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Heabınızı aktif edin') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Tekrardan link gönderildi lütfen mail kutunuzu kontrol edin.') }}
                        </div>
                    @endif

                    {{ __('Mail adresinize bir link gönderdik. Lütfen Mail Kutunuzu Kontrol Edin.') }}
                        <br>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{__('Mail Gelmediyse, Tıklayın.') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
