@extends('layouts.backend')
{{--@section('style')--}}
{{--    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">--}}
{{--    @endsection--}}

@section('content')

{{--    <style type="text/css">--}}
{{--        /*if you want to remove some content in print display then use .no_print class on it */--}}
{{--        @media print {--}}
{{--            #datatable_wrapper .row:first-child {display:none;}--}}
{{--            #datatable_wrapper .row:last-child {display:none;}--}}
{{--            .no_print {display:none;}--}}
{{--        }--}}

{{--    </style>--}}


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Book Pending List
                            <a href="{{route('issue.create')}}" class="btn btn-success btn-sm">Issue Book</a>

                            <a class="btn btn-primary text-white btn-sm" id="printBtn">Print / PDF</a>
                            <a href="{{route('issue.index')}}" class="btn btn-dark btn-sm">Issue List</a>

                            {{--                            <form action = '/excel'>--}}
                            {{--                                <input type="submit" value="Download excel">--}}
                            {{--                                <form>--}}
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        {{--                        <ol class="breadcrumb float-sm-right">--}}
                        {{--                            <div class="search-container">--}}
                        {{--                                <form action="{{route('issue.index')}}">--}}
                        {{--                                    <input type="text" placeholder="Search.." name="search">--}}
                        {{--                                    <button type="submit"><i class="fa fa-search"></i></button>--}}
                        {{--                                </form>--}}
                        {{--                            </div>--}}
                        {{--                            <form class="form-inline my-2 my-lg-0" method="post" action="{{route('issue.search')}}">--}}
                        {{--                                @csrf--}}
                        {{--                                <input type="text" class="form-control mr-sm-2" placeholder="Search Batch" name="query" id="query" aria-label="search">--}}
                        {{--                                <button class="btn btn-light my-2 my-sm-0" type="submit">Submit</button>--}}
                        {{--                            </form>--}}
                        {{--                        </ol>--}}
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

                    <div class="dataTable" id="tables">
                        @if(Session::has('success'))
                            <p class="alert alert-success">{{Session::get('success')}}</p>
                        @endif
                        @if(Session::has('error'))
                            <p class="alert alert-danger">{{Session::get('danger')}}</p>
                        @endif
                        <table id="datatable" class="table table-striped" >
                            <thead>

                            <tr>
                                <th>SN</th>
                                <th>Student Name</th>
                                <th>Batch Year</th>
                                <th>Book Name</th>
                                <th>Issued By</th>
                                <th>Issued Date</th>
                                <th>Return Date</th>
{{--                                <th>Status</th>--}}
                                <th class="no_print">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($data['pending']  as $i => $row)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{$row->StudentId->name}}</td>
                                    <td>{{$row->BatchId->year}}</td>
                                    <td>{{$row->BookId->name}}</td>
                                    <td>{{$row->user_id}}</td>
                                    <td>{{$row->issue_date}}</td>
                                    <td>{{$row->return_date}}</td>
                                    {{--                                    <td>--}}

                                    {{--                                        <input data-id="{{$row->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Returned" data-off="Pending" {{ $row->status ? 'checked' : '' }} >--}}
                                    {{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        @if($row->status==1)--}}
{{--                                            <p style="color:Green"><b>Return</b></p>--}}
{{--                                        @else--}}
{{--                                            <p style="color:red"><b>Pending</b></p>--}}
{{--                                        @endif--}}
{{--                                    </td>--}}



                                    <td class="no_print">
                                        <a href="{{route('issue.show',$row->id)}}" class="btn btn-success">View</a>

                                        {{--                                        <a href="{{route('issue.edit2',$row->id)}}" class="btn btn-secondary">Return</a>--}}
                                        {{--                                        <form action="#" method="post">--}}
                                        {{--                                            <input type="hidden" name="_method" value="delete" />--}}
                                        {{--                                            @csrf--}}
                                        {{--                                            <button type="submit" class="btn btn-danger">Returned Book</button>--}}

                                        {{--                                        </form>--}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- /.card-body -->


                    </div>
                    <!-- /.card -->
                </div>
            </section>
        </section>
    </div>

@endsection
{{--@section('javascript')--}}
{{--    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>--}}
{{--<script>--}}
{{--    $(document).ready(function(){--}}
{{--    $('#datatable').DataTable();--}}
{{--    });--}}
{{--</script>--}}
{{--    @endsection--}}






@section('js')
    <script type="text/javascript" src="{{ asset('backend/plugins/print_any_part/dist/jQuery.print.min.js') }}"></script>
    <script type="text/javascript">
        $(function() {

            $("#printBtn").on('click', function() {

                $.print("#printable");

            });

        });
    </script>

@endsection
