@extends('layouts.backend')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Book Issued Information
                            <a href="{{route('issue.create')}}" class="btn btn-success">Issue Book</a>
                            <a href="{{route('issue.index')}}" class="btn btn-secondary">Book Issued List</a>
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
                                <th>Student Name</th>
                                <td>{{$data['row']->StudentId->name}}</td>
                            </tr>

                            <tr>
                                <th>Book Name</th>
                                <td>{{$data['row']->BookId->name}}</td>
                            </tr>

                            <tr>
                                <th>Batch Year</th>
                                <td>{{$data['row']->BatchId->year}}</td>
                            </tr>

                            <tr>
                                <th>Issued By</th>
                                <td>{{$data['row']->user_id}}</td>
                            </tr>

                            <tr>
                                <th>Issued Date</th>
                                <td>{{$data['row']->issue_date}}</td>
                            </tr>

                            <tr>
                                <th>Renew date</th>
                                <td>{{$data['row']->renew_data}}</td>
                            </tr>

                            <tr>
                                <th>Return Date</th>
                                <td>{{$data['row']->return_date}}</td>
                            </tr>
                            <tr>
                                <th>Created At</th>
                                <td>{{$data['row']->created_at}}</td>
                            </tr>
                            <tr>
                                <th>Updated At</th>
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

