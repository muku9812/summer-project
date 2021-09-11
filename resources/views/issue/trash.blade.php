@extends('layouts.backend')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Students information
                            <a href="{{route('issue.create')}}" class="btn btn-success">Issue Book</a>
                            <a href="{{route('issue.index')}}" class="btn btn-secondary">Issued List</a>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active"> <a href="#">Add Book</a></li>

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
                                <th>Student Name</th>
                                <th>Batch Year</th>
                                <th>Book Name</th>
                                <th>Issued By</th>
                                <th>Issued Date</th>
                                <th>Return Date</th>
                            </tr>

                            @foreach($data['rows'] as $i => $row)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{$row->StudentId->name}}</td>
                                    <td>{{$row->BatchId->year}}</td>
                                    <td>{{$row->BookId->name}}</td>

                                    <td>{{$row->user_id}}</td>
                                    <td>{{$row->issue_date}}</td>
                                    <td>{{$row->return_date}}</td>
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
