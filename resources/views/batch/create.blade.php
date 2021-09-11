@extends('layouts.backend')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Batch
                            <a href="{{route('batch.index')}}" class="btn btn-success">Batch List</a>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">

                <div class="card-body">




                    <form action="{{route('batch.store')}}" method='POST'>
                        @csrf
                        <div class="form-group">
                            <label for="year">Year</label>
                            <input type="number" class="form-control" placeholder="Enter New Batch to add " name="year" id="year"  >
                            @error('year')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio"  name='status' id="active" value="1">Active
                                <input class="form-check-input" type="radio" name='status' id="deactive" value="0" checked>
                                Deactive
                            </div>


                        <div class="form-group">
                            <input type="submit" value="save" class="btn btn-primary">

                        </div>
                    </form>
                    <!-- /.card-body -->
                    <div class="card-footer">

                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>

@endsection
