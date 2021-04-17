@extends('admin.layouts.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('admin-templates') }}/assets/vendors/simple-datatables/style.css">
@endsection

@section('content')
    <div class="page-heading">
        <h3>Users</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Users</li>
            </ol>
        </nav>
    </div>
    <div class="page-content" style="min-height: 80vh">
        <section class="row">
            <div class="col-12">
                <a href="{{ route('user.create') }}" class="btn btn-primary mb-4"><i class="fas fa-plus"></i>Add
                    new
                    user</a>
                <div class="card shadow rounded">
                    <div class="card-header">
                        <h5 class="m-0 card-title">Data Users</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>City</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Graiden</td>
                                    <td>vehicula.aliquet@semconsequat.co.uk</td>
                                    <td>076 4820 8838</td>
                                    <td>Offenburg</td>
                                    <td>
                                        <a href="{{ route('user.show', 1) }}">
                                            <span class="badge bg-success">
                                                <i class="fas fa-eye"></i>
                                            </span>
                                        </a>
                                        <a href="{{ route('user.edit', 1) }}">
                                            <span class="badge bg-primary">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                        </a>
                                        <a href="">
                                            <span class="badge bg-danger">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script src="{{ asset('admin-templates') }}/assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);

    </script>
@endsection
