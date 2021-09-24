@extends('layouts.backend')
@section('title','Dashboard Page')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Dashboard</h1>
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

            <div class="row">

                <!-- Category (count) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><a href="{{route('student.active')}}"> Number of Active Students</a></div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $data['active_student']}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-users fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- news (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Number of Remaining Books</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$rem}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-book fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- comments Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><a href="#">Number of Active Batch</a></div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$data['active_batch']}}</div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-th-large fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Number Active of faculty</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data['active_faculty']}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-graduation-cap fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        <section class="content">

            <div class="dataTable" id="tables">
            <table id="datatable" class="table table-striped" style="width:40%" >
                <tr>
                    <th><a href="{{route('book.index')}}">Total Number of Books</a></th><td>{{$cal}}</td>
                </tr>
                <tr>
                    <th><a href="{{route('batch.index')}}">Total Number of Batches</a></th><td>{{$data['batch']}}</td>
                </tr>
                <tr>
                    <th><a href="{{route('faculty.index')}}">Total Number of Faculty</a></th><td>{{$data['faculty']}}</td>
                </tr>
                <tr>
                    <th><a href="{{route('issue.pending')}}">Total Number of Book issued</a></th><td>{{$data['issue_book']}}</td>
                </tr>
                <tr>
                    <th><a href="{{route('student.index')}}">Total Number of Students</a></th><td>{{$data['student']}}</td>
                </tr>



            </table>
            </div>

            <!-- Default box -->
{{--            <div class="card">--}}
{{--                <div class="card-header">--}}
{{--                    <h3 class="card-title">Dashboard</h3>--}}

{{--                    <div class="card-tools">--}}
{{--                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">--}}
{{--                            <i class="fas fa-minus"></i></button>--}}
{{--                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">--}}
{{--                            <i class="fas fa-times"></i></button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    Start creating your amazing application!--}}
{{--                </div>--}}
{{--                <!-- /.card-body -->--}}
{{--                <div class="card-footer">--}}
{{--                    Footer--}}
{{--                </div>--}}
{{--                <!-- /.card-footer-->--}}
{{--            </div>--}}
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

