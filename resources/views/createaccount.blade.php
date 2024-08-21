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
                        <h2 class="text-center mb-4">Create Account</h2>

                        <form class="registration-form" action="{{route('registered')}}" method="post">
                            @if(Session::has('fails'))
                                <div class = "alert alert-danger">{{Session::get('fail')}}</div>
                            @endif

                            @csrf

                            <div class="mb-3">
                                <input type="text" name="fullname" class="form-control" placeholder="Full Name" value="{{old('fullname')}}" required>
                                <span class = "text-danger">@error('fullname') {{$message}} @enderror</span>
                            </div>
                            <div class="mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Email" value="{{old('email')}}" required>
                                <span class = "text-danger">@error('email') {{$message}} @enderror</span>
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                                <span class = "text-danger">@error('password') {{$message}} @enderror</span>
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                                <span class = "text-danger">@error('password_confirmation') {{$message}} @enderror</span>
                            </div>
                            <div class="text-center mb-3">
                                <button type="submit" class="btn btn-primary">Register</button>
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
