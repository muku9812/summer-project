@extends('layouts.backend')


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Batch List
                            <a href="{{route('batch.create')}}" class="btn btn-success btn-sm">Add Batch</a>
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

                            @foreach($data['rows'] as $i => $row)
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
                                        <a href="{{route('batch.show',$row->id)}}" class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a href="{{route('batch.edit',$row->id)}}"  class="btn btn-primary btn-sm"><i class="fa fa-pencil-alt" aria-hidden="true"></i></a>
                                        <form action="{{route('batch.destroy',$row->id)}}" method="post" class="d-inline">
                                            <input type="hidden" name="_method" value="delete" />
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>

                                        </form>
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
