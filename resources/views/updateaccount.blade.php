@extends('admin.layout.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                        <li class="breadcrumb-item active">General Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="registration-container mb-5">
                        <h2 class="text-center mb-4">Update Account Details</h2>

                        <form class="registration-form" action="{{url('edited')}}" method="post">
                            @if(Session::has('fail'))
                                <div class = "alert alert-danger">{{Session::get('fail')}}</div>
                            @endif

                            @csrf

                            <input type="hidden" name="workerid" value="{{$data->workerid}}">
                            <div class="mb-3">
                                <label for = "fullname">Full Name</label>
                                <input type="text" name="fullname" class="form-control" placeholder="Full Name" value="{{$data->fullname}}" required>
                                <span class = "text-danger">@error('fullname') {{$message}} @enderror</span>
                            </div>
                            <div class="mb-3">
                                <label for = "password">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                                <span class = "text-danger">@error('password') {{$message}} @enderror</span>
                            </div>
                            <div class = "form-group">
                                <label for = "acctype">Type</label>
                                <select class="form-control" placeholder="Type" name="acctype" selected="{{$data->acctype}}">
                                    @if($data->acctype == "Regular")
                                        <option value = "Regular" selected>Regular</option>
                                        <option value = "Admin">Admin</option>
                                    @endif
                                    @if($data->acctype == "Admin")
                                        <option value = "Regular">Regular</option>
                                        <option value = "Admin" selected>Admin</option>
                                    @endif
                                </select>
                                <span class = "text-danger">@error('acctype') {{$message}} @enderror</span>
                            </div>
                            <div class="text-center mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--/.col (left) -->

        <!-- right column -->
        <div class="col-md-6">

        </div>
        <!--/.col (right) -->
</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- jQuery -->
<script src="{{ asset('public/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('public/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('public/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('public/dist/js/demo.js') }}"></script>
@endsection
