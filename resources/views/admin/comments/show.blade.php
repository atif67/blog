@extends('admin.layouts.app')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            <strong class="card-title">Yorumlar</strong>
            <span class="float-right"><i class="fe fe-message-circle mr-2"></i>Count</span>
        </div>
        <div class="card-body">
            <div class="row align-items-center mb-4">
                <div class="col-auto">
                    <div class="avatar avatar-sm mb-3 mx-4">
                        <img src="{{ URL::asset('assets/admin-assets/assets/avatars/face-3.jpg') }}" alt="..." class="avatar-img rounded-circle">
                    </div>
                </div>
                <div class="col">
                    <strong>Hester Nissim</strong>
                    <div class="mb-2">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</div>
                    <small class="text-muted">2020-04-21 08:48:18</small>
                </div>
            </div> <!-- .row-->
            <!-- .row-->
            <hr class="my-4">

        </div> <!-- .card-body -->
    </div>
@endsection
