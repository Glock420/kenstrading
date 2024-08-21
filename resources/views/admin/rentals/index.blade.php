@extends('admin.layout.master')

@section('content')



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-capitalize">{{ (Route::current()->getName()) }}</h1>
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
                    <a href="/rentals/create" class="btn btn-primary btn-sm">Add Rental</a>

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
                                        <th>RENTAL ID</th>
                                        <th>CUSTOMER</th>
                                        <th>CAR</th>
                                        <th>RENTAL START</th>
                                        <th>RENTAL EXPIRE</th>
                                        <th>ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rentals as $rental)
                                    <tr>
                                        <td>{{ $rental->rentid }}</td>
                                        <td>{{ $rental->customer->first_name }} {{ $rental->customer->last_name }}</td>
                                        <td>{{ $rental->car->carname }}</td>
                                        <td>{{ $rental->rental_start }}</td>
                                        <td>{{ $rental->rental_expire }}</td>
                                        <td>
                                            <a href="/rentals/delete/{{$rental->rentid}}" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#descriptionModal{{$rental->rentid}}">
                                                View Description
                                            </button>
                                        </td>
                                    </tr>
                                    <!-- Description Modal -->
                                    <div class="modal fade" id="descriptionModal{{$rental->rentid}}" tabindex="-1" role="dialog" aria-labelledby="descriptionModal{{$rental->rentid}}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="descriptionModal{{$rental->rentid}}Label">Rental Description</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>{{ $rental->description }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>


<script>
    
    

    // $(function () {  `

    //     $("#example1").DataTable({
    //         "scrollX": true,
    //         "responsive": true,
    //         "lengthChange": false,
    //         "autoWidth": false,
    //         "buttons": ["copy", "csv", "excel", "pdf", "print"]
    //     }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    //     $('#example2').DataTable({
    //         "paging": true,
    //         "lengthChange": false,
    //         "searching": false,
    //         "ordering": true,
    //         "info": true,
    //         "autoWidth": false,
    //         "responsive": true,
    //     });
    // });

</script>

@endsection
