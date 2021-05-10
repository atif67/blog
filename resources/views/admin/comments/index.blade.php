@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="mb-2 page-title">Yorumlar</h2>
                <div class="row my-4">
                    <!-- Small table -->
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <!-- table -->
                                <table class="table datatables" id="dataTable-1">
                                    <thead>
                                    <tr>
                                        <th>Post</th>
                                        <th>Kullanıcı Adı</th>
                                        <th>Onay Durumu</th>
                                        <th>İşlem</th>
                                        <th>İçerik</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($comments as $comment)
                                        <tr>
                                            <td>{{ $comment->post->title }}</td>
                                            <td>{{ $comment->name }}</td>
                                            <td>
                                                @if($comment->confirmation_status == 1)
                                                    Onaylandı
                                                @else
                                                    Beklemede
                                                @endif
                                            </td>
                                            <td>
                                                @if($comment->confirmation_status == 0)
                                                    <a href="javascript:;" onclick="document.getElementById('confirm-comment{{$comment->id}}').submit();" class="text-success-dark"><i class="fa fa-check"></i></a>
                                                    <form action="{{ route('comments.confirm-or-delete',['id' => $comment->id, 'case' => 1]) }}" method="post" id="confirm-comment{{$comment->id}}" class="d-inline">
                                                        @csrf
                                                    </form>
                                                @endif
                                                <a href="javascript:;" onclick="document.getElementById('delete-comment{{$comment->id}}').submit();" class="text-danger-dark"><i class="fa fa-times"></i></a>
                                                <form action="{{ route('comments.confirm-or-delete',['id' => $comment->id, 'case' => 2]) }}" method="post" id="delete-comment{{$comment->id}}" class="d-inline">
                                                    @csrf
                                                </form>
                                            </td>
                                            <td><a href="javascript;;" data-toggle="modal" data-target="#comment{{$comment->id}}" class="btn btn-secondary btn-sm">Yorum İçeriği</a></td>
                                        </tr>
                                        <div class="modal fade" id="comment{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="defaultModalLabel">Kategori Ekle</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>{{ $comment->content }}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Kapat</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- simple table -->
                </div> <!-- end section -->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div>

@endsection



@section('script')

    <script src='{{ URL::asset('assets/admin-assets/js/jquery.dataTables.min.js') }}'></script>
    <script src='{{ URL::asset('assets/admin-assets/js/dataTables.bootstrap4.min.js') }}'></script>
    <script>
        $('#dataTable-1').DataTable(
            {
                autoWidth: true,
                "lengthMenu": [
                    [10, 20, 50, 100, -1],
                    [10, 20, 50, 100, "All"]
                ]
            });
    </script>
@endsection
