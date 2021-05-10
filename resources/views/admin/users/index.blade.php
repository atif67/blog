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
                    <a href="?role=1" class="btn btn-primary btn-sm">Yöneticiler</a>
                    <a href="?role=2" class="btn btn-secondary btn-sm">Editörler</a>
                    <a href="?role=3" class="btn btn-primary btn-sm">Üyeler</a>
                </div>
            </div>

        </div>
    </div>
<div class="row">
    @if($users->count() > 0)
        @foreach($users as $user)
                <div class="col-md-3">
                    <div class="card shadow mb-4">
                        <div class="card-body text-center">
                            <div class="avatar avatar-lg mt-4">
                                <a href="{{ route('users.update',$user->id) }}">
                                    <img src="{{ isset($user->avatar) ? URL::asset('uploads/'.$user->avatar) : URL::asset('uploads/images/avatar.png') }}" alt="..." class="avatar-img rounded-circle">
                                </a>
                            </div>
                            <div class="card-text my-2">
                                <strong class="card-title my-0"><a href="{{ route('users.update',$user->id) }}">{{ $user->name }} </a></strong>
                                <p class="small"><span class="badge badge-light text-muted">{{ $user->role->name }}</span></p>
                            </div>
                        </div> <!-- ./card-text -->
                        <div class="card-footer">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-auto">
                                    <?php $postCount = 0; ?>
                                    @foreach($posts as $post)
                                        @if($post->user_id == $user->id)
                                            <?php $postCount++; ?>
                                        @endif
                                    @endforeach
                                        <a href="{{ route('posts.index','user='.$user->id) }}"><small class="text-dark">Postlar : <b>{{ $postCount }} Adet</b></small></a>
                                </div>
                                <div>
                                    @if($user->id != \Illuminate\Support\Facades\Auth::id())
                                        <a href="javascript;;" data-toggle="modal" data-target="#defaultModal{{$user->id}}"><i class="fa fa-trash mr-2"></i></a>
                                        <form action="{{ route('users.delete',$user->id) }}" id="delete-user{{$user->id}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div> <!-- /.card-footer -->
                    </div>
                </div>
                <div class="modal fade" id="defaultModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="defaultModalLabel">Bu Kullanıcıyı Silmek İstediğinize Emin Misiniz?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body text-center">
                                    <div class="avatar avatar-lg mt-4">
                                        <a href="">
                                            <img src="{{ isset($user->avatar) ? URL::asset('uploads/'.$user->avatar) : URL::asset('uploads/images/avatar.png') }}" alt="..." class="avatar-img rounded-circle">
                                        </a>
                                    </div>
                                    <div class="card-text my-2">
                                        <strong class="card-title my-0">{{ $user->name }} </strong>
                                        <p class="small"><span class="badge badge-light text-muted">{{ $user->role->name }}</span></p>
                                    </div>
                                </div> <!-- ./card-text -->
                                <div class="d-flex justify-content-center">
                                    <button type="button" class="btn mb-2 mr-3 btn-secondary" data-dismiss="modal">Hayır</button>
                                    <a href="javascript:;" onclick="document.getElementById('delete-user{{$user->id}}').submit();" class="btn mb-2 btn-primary">Evet</a>
                                </div>

                            </div>
                            <div class="modal-footer">

                            </div>
                        </div>
                    </div>
                </div>
        @endforeach
    @else
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <b>Kullanıcı bulunamadı.</b>
                </div>
            </div>
        </div>

    @endif
</div>
@endsection
