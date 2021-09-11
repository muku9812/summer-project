@extends('layouts.backend')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Announcement List
                            <a href="{{route('announcement.create')}}" class="btn btn-success">Add Announcement</a>
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
                            <table id="datatable" class="table table-striped" style="width:100%" >
                            <thead>
                            <tr>
                            <th>SN</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <td>Action</td>

                            </tr>
                            </thead>
                            <tbody>

                        @foreach($data['rows'] as $i => $row)
                            <tr>
                                <td>{{$i+1}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->description}}</td>
                                <td>
                                    @if($row->status==1)
                                        <p style="color:Green">Active</p>
                                    @else
                                        <p style="color:red">Deactive</p>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('announcement.show',$row->id)}}" class="btn btn-success">View</a>
                                    <a href="{{route('announcement.edit',$row->id)}}" class="btn btn-primary">Update</a>
                                    <form action="{{route('announcement.destroy',$row->id)}}" method="post">
                                        <input type="hidden" name="_method" value="delete" />
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>

                                    </form>
                                </td>

                            </tr>
                        @endforeach
                            </tbody>
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
