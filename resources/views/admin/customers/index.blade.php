@extends('admin.layout.master')

@push('style')
<link rel="stylesheet" href="{{ asset('css/employees.css') }}">
@endpush

@section('content') 
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-capitalize">Customers</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                        <li class="breadcrumb-item active text-capitalize">{{ (Route::current()->getName()) }}</li>
                    </ol>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="/customers/create" class="btn btn-primary btn-sm">Add Customer</a>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive p-2">
                            <table class="table table-hover text-nowrap" id="example1">
                                <thead>
                                    <tr>
                                        <th>CUSTOMER ID</th>
                                        <th>IMAGE</th>
                                        <th>FIRST NAME</th>
                                        <th>LAST NAME</th>
                                        <th>GENDER</th>
                                        <th>DRIVERS LICENSE</th>
                                        <th>MOBILE NO</th>
                                        <th>ADDRESS</th>
                                        <th>ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $customer)
                                        <tr>
                                            <td>{{ $customer->custid }}</td>
                                            <td>
                                                <div style="padding-bottom:100%; overflow:hidden; position: relative;">
                                                    <img src="{{ isset($customer->image_path) ? 'images/customers/'.$customer->image_path : 'images/portfolio/employee_icon.png'}}"
                                                        alt="User Avatar"
                                                        class="img-size-50 mr-3 img-circle img img-responsive full-width square_image profile-user-img"
                                                        style="position: absolute">
                                                </div>
                                            </td>
                                            <td>{{ $customer->first_name }}</td>
                                            <td>{{ $customer->last_name }}</td>
                                            <td>{{ $customer->gender }}</td>
                                            <td>{{ $customer->dl }}</td>
                                            <td>{{ $customer->contact_no }}</td>
                                            <td>{{ $customer->address }}</td>
                                            <td>
                                                <a href="/customers/edit/{{$customer->custid}}" class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="/customers/delete/{{$customer->custid}}"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- jQuery -->
<script src="{{ asset('public/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('public/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('public/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('public/dist/js/demo.js') }}"></script>

@endsection

 
