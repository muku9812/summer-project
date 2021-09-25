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
                    {{--                    <div class="col-sm-6">--}}
                    {{--                        <ol class="breadcrumb float-sm-right">--}}
                    {{--                            <form class="dataTablea" method="post" action="{{route('batch.search')}}">--}}
                    {{--                                @csrf--}}
                    {{--                                <input type="text" class="form-control mr-sm-2" placeholder="Search Batch" name="query" id="query" aria-label="search">--}}
                    {{--                                <button class="btn btn-light my-2 my-sm-0" type="submit">Submit</button>--}}
                    {{--                                <input type="text">--}}
                    {{--                            </form>--}}
                    {{--                        </ol>--}}
                    {{--                    </div>--}}
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
                        <table id="datatable" class="table table-striped" style="width:100%" >
                            <thead>
                            <tr>
                                <th>SN</th>
                                <th>Batch</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($data['deactive'] as $i => $row)
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
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- /.card-body -->

                    </div>
                </div>
                <!-- /.card -->

            </section>
        </section>
        <!-- /.content -->
    </div>


@endsection
{{--@section('javascript')--}}
{{--    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>--}}
{{--    $(document).ready(function() {--}}
{{--    var eventFired = function ( type ) {--}}
{{--    var n = $('#tables')[0];--}}
{{--    n.innerHTML += '<div>'+type+' event - '+new Date().getTime()+'</div>';--}}
{{--    n.scrollTop = n.scrollHeight;--}}
{{--    }--}}

{{--    $('#datatable')--}}
{{--    .on( 'order.dt',  function () { eventFired( 'Order' ); } )--}}
{{--    .on( 'search.dt', function () { eventFired( 'Search' ); } )--}}
{{--    .on( 'page.dt',   function () { eventFired( 'Page' ); } )--}}
{{--    .DataTable();--}}
{{--    } );--}}
{{--@endsection--}}
