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
                                        <th>#</th>
                                        <th>Post</th>
                                        <th>Yorum Sayısı</th>
                                        <th>İşlem</th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr>
                                        <td>1</td>
                                        <td>9022 Suspendisse Rd.</td>
                                        <td>32</td>
                                        <td><a href="" class="btn btn-secondary btn-sm">Gözat</a></td>
                                    </tr>

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
