@extends('admin.layout.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ Request::path() =="rentals/create"?'Create' : 'Update' }} Rental</h1>
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
                            <h3 class="card-title">Rental</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ (isset($rentals->rentid)) ? route('update.rental',$rentals->rentid) : route('create.rental')}}" class="form-horizontal">

                            @csrf
                            <div class="card-body">

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Customer</label>
                                    <div class="col-sm-10">
                                        <select class="form-control select2" name="custid" value="@if(isset($rentals->custid)){{ $rentals->custid }}@endif">
                                            <option selected="selected">
                                                @if(isset($rentals->custid)){{ $rentals->custid }}
                                                @endif
                                            </option>
                                            @foreach ($customers as $customer)
                                            <option value="{{ $customer->custid }}">
                                                {{ $customer->first_name }}    
                                                {{ $customer->last_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <span class = "text-danger">@error('custid') {{$message}} @enderror</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Car</label>
                                    <div class="col-sm-10">
                                        <select class="form-control select2" name="carid" value="@if(isset($rentals->carid)){{$rentals->carid}}@endif">
                                            <option selected="selected">
                                                @if(isset($rentals->carid)){{ $rentals->carid }}
                                                @endif
                                            </option>
                                            @foreach ($cars as $car)
                                            <option value="{{ $car->carid }}">
                                                {{ $car->carname }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <span class = "text-danger">@error('carid') {{$message}} @enderror</span>
                                    </div>
                                </div>

            

                                <div class="form-group row">
                                    <label for="rental_start" class="col-sm-2 col-form-label">Rental Start</label>
                                    <div class="col-sm-10">
                                        <input name="rental_start" value="@if(isset($rentals->rental_start)){{ $rentals->rental_start }}@endif" type="Date" class="form-control" id="rental_start" placeholder="Rental Start">
                                        <span class = "text-danger">@error('rental_start') {{$message}} @enderror</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="rental_expire" class="col-sm-2 col-form-label">Rental Expire</label>
                                    <div class="col-sm-10">
                                        <input name="rental_expire" value="@if(isset($rentals->rental_expire)){{ $rentals->rental_expire }}@endif" type="Date" class="form-control" id="rental_expire" placeholder="Rental Expire">
                                        <span class = "text-danger">@error('rental_expire') {{$message}} @enderror</span>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <input name="description" value="@if(isset($rentals->description)){{ $rentals->description }}@endif" type="Text" class="form-control" id="description" placeholder="Description">
                                        <span class = "text-danger">@error('description') {{$message}} @enderror</span>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary float-right">
                                    {{ Request::path() =="rentals/create"?'Create' : 'Update' }}
                                </button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                    <!-- /.card -->

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
