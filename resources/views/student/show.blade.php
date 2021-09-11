@extends('layouts.backend')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{$data['row']->name}}'S Information
                            <a href="{{route('student.create')}}" class="btn btn-success">Add Student</a>
                            <a href="{{route('student.index')}}" class="btn btn-info">Student List</a>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">
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

                    <table class="table table-bordered">
                        <tr>

                            <th>Name</th>
                            <td>{{$data['row']->name}}</td>
                        </tr>
                        <tr>

                            <th>Email</th>
                            <td>{{$data['row']->email}}</td>
                        </tr>
                        <tr>

                            <th>Faculty</th>
                            <td>{{$data['row']->FacultyId->faculty}}</td>
                        </tr>
                        <tr>

                            <th>Batch</th>
                            <td>{{$data['row']->BatchId->year}}</td>

                        </tr>
                        <tr>

                            <th>Password</th>
                            <td>{{$data['row']->password}}</td>
                        </tr>
                        <tr>

                            <th>Status</th>
                            <td>
                                @if($data['row']->status==1)
                                    <p style="color:Green">Active</p>
                                @else
                                    <p style="color:red">Deactive</p>
                                @endif
                            </td>
                        </tr>
                        <tr>

                            <th>Phone</th>
                            <td>{{$data['row']->phone}}</td>
                        </tr>
                        <tr>
                            <th>Created_At</th>
                            <td>{{$data['row']->created_at}}</td>
                        </tr>
                        <tr>
                            <th>Updated_At</th>
                            <td>{{$data['row']->updated_at}}</td>
                        </tr>

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
