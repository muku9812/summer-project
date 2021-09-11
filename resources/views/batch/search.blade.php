@extends('layouts.backend')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Batch List
                            <a href="{{route('batch.create')}}" class="btn btn-success">Add Batch</a>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <form class="form-inline my-2 my-lg-0" type="get" action="{{url('backend.batch.search')}}">
                                <input type="search" class="form-control mr-sm-2" placeholder="Search Batch" name="query" aria-label="search">
                                <button class="btn btn-light my-2 my-sm-0" type="submit">Submit</button>
                            </form>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">

                    <div class="card-body">
                        @if(Session::has('success'))
                            <p class="alert alert-success">{{Session::get('success')}}</p>
                        @endif
                        @if(Session::has('error'))
                            <p class="alert alert-danger">{{Session::get('danger')}}</p>
                        @endif
                        <table class="table table-boardered">

                            <tr>
                                <th>SN</th>
                                <th>Batch</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>

                            @foreach($batches as $i => $row)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{$row->year}}</td>
                                    <td>
                                        @if($row->status==1)
                                            <p style="color:Green">Active</p>
                                        @else
                                            <p style="color:red">Deactive</p>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{route('batch.show',$row->id)}}" class="btn btn-success">View</a>
                                        <a href="{{route('batch.edit',$row->id)}}"  class="btn btn-primary">Update</a>
                                        <form action="{{route('batch.destroy',$row->id)}}" method="post">
                                            <input type="hidden" name="_method" value="delete" />
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
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
