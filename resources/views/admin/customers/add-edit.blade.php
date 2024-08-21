@extends('admin.layout.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ Request::path() =="customers/create"?'Create' : 'Update' }} Customer</h1>
                </div>
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
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">

                    <!-- Horizontal Form -->
                    <div class="card card-primary">

                        <div class="card-header">
                            <h3 class="card-title">Customer</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form method="POST" action="{{ (isset($customers->custid)) ? route('update.customer',$customers->custid) : route('create.customer')}}" class="form-horizontal" enctype="multipart/form-data">

                            @csrf
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-2">
                                        <div class="text-center">

                                            {{-- @if (isset())
                                                <h1>Success</h1>
                                            @else
                                                <h1>UnASdsd</h1>
                                            @endif --}}
                                            
                                            @if (isset($customers->image_path))
                                                <img class="profile-user-img img-fluid img-circle" src="{{ asset('images/customers/'.$customers->image_path) }}" alt="User profile picture">
                                            @else
                                                <img class="profile-user-img img-fluid img-circle" src="{{ asset('images/portfolio/customer_icon.png') }}" alt="User profile picture">
                                            @endif

                                            <p><input type="file" name="image_path" id="file" onchange="loadFile(event)" style="display: none;"></p>

                                            <p>
                                                <label for="file" style="cursor: pointer;"
                                                    class="btn btn-success">Upload Image</label>
                                            </p>
                                            <p class="align-item-center">
                                                <img class="profile-user-img img-fluid img-circle" id="output" width="400" src=""/>
                                            </p>

                                        </div>
                                    </div>

                                    <div class="col-md-5">


                                        <div class="form-group row">
                                            <label for="first_name" class="col-sm-3 col-form-label">First Name</label>
                                            <div class="col-sm-10">
                                                <input name="first_name" value="@if(isset($customers->first_name)){{ $customers->first_name }}@endif" type="Text" class="form-control" id="first_name" placeholder="First Name">
                                                <span class = "text-danger">@error('first_name') {{$message}} @enderror</span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="last_name" class="col-sm-3 col-form-label">Last Name</label>
                                            <div class="col-sm-10">
                                                <input name="last_name" value="@if(isset($customers->last_name)){{ $customers->last_name }}@endif" type="Text" class="form-control" id="last_name" placeholder="Last Name">
                                                <span class = "text-danger">@error('last_name') {{$message}} @enderror</span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Gender</label>
                                            <div class="col-sm-10">
                                                <select class="form-control select2" name="gender" value="@if(isset($customers->gender)){{ $customers->gender }}@endif">
                                                    <option selected="selected">
                                                        @if(isset($customers->gender)){{ $customers->gender }}@endif
                                                    </option>
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                </select>
                                                <span class = "text-danger">@error('gender') {{$message}} @enderror</span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="dl" class="col-sm-3 col-form-label">Driver's License</label>
                                            <div class="col-sm-10">
                                                <input name="dl" value="@if(isset($customers->dl)){{ $customers->dl }}@endif" type="Text" class="form-control" id="dl" placeholder="Driver's License">
                                                <span class = "text-danger">@error('dl') {{$message}} @enderror</span>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-5">

                                        <!--<div class="form-group row">
                                            <label for="hire_date" class="col-sm-3 col-form-label">Hire Date</label>
                                            <div class="col-sm-10">
                                                <input name="hire_date"
                                                    value="@if(isset($employees->hire_date)){{ $employees->hire_date }}@endif"
                                                    type="Date" class="form-control" id="hire_date"
                                                    placeholder="Hire Date">
                                            </div>
                                        </div>-->

                                        <div class="form-group row">
                                            <label for="contact_no" class="col-sm-3 col-form-label">Contact No</label>
                                            <div class="col-sm-10">
                                                <input name="contact_no" value="@if(isset($customers->contact_no)){{ $customers->contact_no }}@endif" type="Text" class="form-control" id="contact_no" placeholder="Contact No">
                                                <span class = "text-danger">@error('contact_no') {{$message}} @enderror</span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="address" class="col-sm-3 col-form-label">Address</label>
                                            <div class="col-sm-10">
                                                <input name="address" value="@if(isset($customers->address)){{ $customers->address }}@endif" type="Text" class="form-control" id="address" placeholder="Address">
                                                <span class = "text-danger">@error('address') {{$message}} @enderror</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>



                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit"
                                    class="btn btn-primary float-right">{{ Request::path() =="customers/create"?'Create' : 'Update' }}
                                </button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                    <!-- /.card -->

                </div>
                <!--/.col (left) -->

                <!-- right column -->
                {{-- <div class="col-md-6">

                </div> --}}
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

<script src="{{ asset('public/js/employees.js') }}"></script>

<script>
    var loadFile = function (event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
    };


    function calcAge() {
        // To calculate age:
        var birthDate = document.getElementById('dob');
        var birthYear = birthDate.getFullYear();

        var currentDate = new Date();
        var currentYear = currentDate.getFullYear();

        age = currentYear - birthYear;

        var d = new Date();
        var n = d.getFullYear();

        function getAge(currentYear,birthYear) {
            age = currentYear - birthYear;
            return age;
        }
        calculatedAge = getAge(currentYear,birthYear);
        alert(calculatedAge);
        document.getElementById('age').value = calculatedAge

    }

</script>



@endsection
