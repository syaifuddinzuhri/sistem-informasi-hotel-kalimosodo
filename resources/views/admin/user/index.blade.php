@extends('admin.layouts.main')

@section('css')
<link rel="stylesheet" href="{{ asset('admin-templates') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('admin-templates') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('admin-templates') }}/assets/vendors/sweetalert2/sweetalert2.min.css">
@endsection

@section('content')
<div class="page-heading">
    <h3>User</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">User</li>
        </ol>
    </nav>
</div>
<div class="page-content" style="min-height: 80vh">
    <section class="row">
        <div class="col-12">
            <button class="btn btn-primary mb-4" id="btn-add-user" data-bs-toggle="modal"
            data-bs-target="#addUserModal"><i class="fas fa-plus"></i>Tambah User</button>
            <div class="card shadow rounded">
                <div class="card-header">
                    <h5 class="m-0 card-title">Data Users</h5>
                </div>
                <div class="card-body">
                    <table id="table_user" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No. HP</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection


@section('script')
    <script src="{{ asset('admin-templates') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('admin-templates') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('admin-templates') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('admin-templates') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('admin-templates') }}/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="{{ asset('admin-templates') }}/plugins/jquery-validation/additional-methods.min.js"></script>
    <script src="{{ asset('admin-templates') }}/assets/vendors/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="{{ asset('js/user.js') }}" type="module"></script>
@endsection

