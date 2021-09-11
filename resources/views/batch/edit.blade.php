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

                    <form action="{{route('batch.update',$data['row']->id)}}" method='POST'>
                        <input type="hidden" name="_method" value="PUT"/>
                        @csrf
                        <div class="form-group">
                            <label for="year">Year</label>
                            <input type="number" class="form-control" value="{{$data['row']->year}}"  name="year" id="year"  >
                            @error('year')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Status </label>
                            @if ( $data['row']->status== 0 )
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"  name='status' id="active" value="1" >Active
                                    <input class="form-check-input" type="radio" name='status' id="deactive" value="0" checked> Deactive

                                </div>
                            @else
                                <div class="form-check form-check-inline">

                                    <input class="form-check-input" type="radio"  name='status' id="active" value="1" checked>Active
                                    <input class="form-check-input" type="radio" name='status' id="deactive" value="0" >Deactive
                                </div>
                            @endif
                                @error('status')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
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
