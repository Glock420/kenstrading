@extends('admin.layout.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ Request::path() =="cars/create"?'Create' : 'Update' }} Car</h1>
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
                            <h3 class="card-title">Car</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST"
                            action="{{ (isset($cars->carid)) ? route('update.car',$cars->carid) : route('create.car')}}" class="form-horizontal">

                            {{-- action="{{ (isset($cars->carid)) ? route('cars/update/'.$cars->carid) : route('cars/create')}}"
                            class="form-horizontal"> --}}

                            {{-- ($cars){{ route('voyager.posts.update', $cars->carid) }}@else{{ route('voyager.posts.store') }}"
                            --}}

                            {{-- @if($cars){{'/cars/update/{{ $cars->carid }}' }}
                            @else{{ '/cars/store' }}@endif --}}

                            @csrf
                            
                    <div class="form-group row">
                        <label for="price" class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                            <input name="price" value="@if(isset($cars->price)){{ $cars->price }}@endif" type="Text" class="form-control" id="price" placeholder="Price">
                            <span class = "text-danger">@error('price') {{$message}} @enderror</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="carname" class="col-sm-2 col-form-label">Car Name</label>
                        <div class="col-sm-10">
                            <input name="carname" value="@if(isset($cars->carname)){{ $cars->carname }}@endif" type="Text" class="form-control" id="carname" placeholder="Car Name">
                            <span class = "text-danger">@error('carname') {{$message}} @enderror</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="brand" class="col-sm-2 col-form-label">Brand</label>
                        <div class="col-sm-10">
                            <input name="brand" value="@if(isset($cars->brand)){{ $cars->brand }}@endif" type="Text" class="form-control" id="brand" placeholder="Brand">
                            <span class = "text-danger">@error('brand') {{$message}} @enderror</span>
                        </div>
                    </div>

                    <!--<div class="form-group row">
                      <label class="col-sm-2 col-form-label">Type</label>
                      <div class="col-sm-10">
                          <select class="form-control select2" name="type"
                              value="@if(isset($properties->type)){{ $properties->type }}@endif">

                              <option selected="selected">
                                  @if(isset($properties->type)){{ $properties->type }}@endif
                              </option>
                              <option>Flat</option>
                              <option>House</option>
                              <option>Bangalow</option>
                              <option>Hut</option>
                              <option>Shop</option>
                          </select>
                      </div>
                  </div>-->

                    <!--<div class="form-group row">
                        <label for="baths" class="col-sm-2 col-form-label">Baths</label>
                        <div class="col-sm-10">
                            <input name="baths" value="@if(isset($properties->baths)){{ $properties->baths }}@endif"
                                type="Number" class="form-control" id="baths" placeholder="Baths">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="rooms" class="col-sm-2 col-form-label">Rooms</label>
                        <div class="col-sm-10">
                            <input name="rooms" value="@if(isset($properties->rooms)){{ $properties->rooms }}@endif"
                                type="Number" class="form-control" id="rooms" placeholder="Rooms">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="stories" class="col-sm-2 col-form-label">Stories</label>
                        <div class="col-sm-10">
                            <input name="stories"
                                value="@if(isset($properties->stories)){{ $properties->stories }}@endif" type="Number"
                                class="form-control" id="stories" placeholder="Stories">
                        </div>
                    </div>-->

                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <input name="description" value="@if(isset($cars->description)){{ $cars->description }}@endif" type="Text" class="form-control" id="description" placeholder="Description">
                            <span class = "text-danger">@error('description') {{$message}} @enderror</span>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <!-- <button type="submit" class="btn btn-default">Cancel</button> -->
                    <button type="submit" class="btn btn-primary float-right">{{ Request::path() =="cars/create"?'Create' : 'Update' }}</button>
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
