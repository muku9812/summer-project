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
                            <a href="{{route('issue.trash')}}" class="btn btn-secondary">Book Returned List</a>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
{{--                            <div class="search-container">--}}
{{--                                <form action="{{route('issue.index')}}">--}}
{{--                                    <input type="text" placeholder="Search.." name="search">--}}
{{--                                    <button type="submit"><i class="fa fa-search"></i></button>--}}
{{--                                </form>--}}
{{--                            </div>--}}
                            <form class="form-inline my-2 my-lg-0" type="get" action="{{url('backend.issue.search')}}">
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
                                <th>Student Name</th>
                                <th>Batch Year</th>
                                <th>Book Name</th>
                                <th>Issued By</th>
                                <th>Issued Date</th>
                                <th>Return Date</th>
                                <th>Status</th>
                                <th>Action</th>
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
                                    <td>
                                        <input data-id="{{$row->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Returned" data-off="Pending" {{ $row->status ? 'checked' : '' }}>
                                    </td>



                                    <td>
                                        <a href="{{route('issue.show',$row->id)}}" class="btn btn-success">View</a>
                                        <a href="{{route('issue.edit',$row->id)}}" class="btn btn-primary">Renew</a>
                                        <form action="#" method="post">
                                            <input type="hidden" name="_method" value="delete" />
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Returned Book</button>

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
                </div>
            </section>
     </section>
        </div>

@endsection
