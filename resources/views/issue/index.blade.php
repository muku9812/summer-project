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
                        <h1>Book Issued information
                            <a href="{{route('issue.create')}}" class="btn btn-success btn-sm">Issue Book</a>
                            <a href="{{route('issue.pending')}}" class="btn btn-dark btn-sm">Pending List</a>
                            <a href="{{route('issue.return')}}" class="btn btn-info btn-sm">Return List</a>

                            <a class="btn btn-primary text-white btn-sm" id="printBtn">Print / PDF</a>
                        </h1>
                    </div>

                    <div class="col-sm-6">
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

                        <table id="datatable" class="table table-striped" >
                            <thead>

                            <tr>
                                <th>SN</th>
                                <th>Student Name</th>
                                <th>Batch Year</th>
                                <th>Book Name</th>
                                <th>Fine Amount</th>
                                <th>Issued By</th>
                                <th>Issued Date</th>
                                <th>Return Date</th>
                                <th>Book Return On</th>

                                <th>Status</th>
                                <th class="no_print">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($data['rows'] as $i => $row)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{$row->StudentId->name}}</td>
                                    <td>{{$row->BatchId->year}}</td>
                                    <td>{{$row->BookId->name}}</td>
                                    <td>Rs.{{$row->fine}}</td>

                                    <td>{{$row->user_id}}</td>
                                    <td>{{$row->issue_date}}</td>
                                    <td>{{$row->return_date}}</td>
                                    <td> @if($row->Book_return_on == 0 || $row->Book_return_on== NULL)
                                             Not Return Yet
                                        @else
                                        {{$row->Book_return_on}}
                                    @endif
{{--                                    <td>--}}

{{--                                        <input data-id="{{$row->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Returned" data-off="Pending" {{ $row->status ? 'checked' : '' }} >--}}
{{--                                    </td>--}}
                                    <td>
                                        @if($row->status==1)
                                            <p style="color:Green"><b>Return</b></p>
                                        @else
                                            <p style="color:red"><b>Pending</b></p>
                                        @endif
                                    </td>



                                    <td class="no_print">
                                        <a href="{{route('issue.show',$row->id)}}" class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a href="{{route('issue.edit',$row->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-exchange-alt" aria-hidden="true"></i></a>
                                        <a href="{{route('issue.renew',$row->id)}}" class="btn btn-dark btn-sm d-inline"><i class="fa fa-redo " aria-hidden="true"></i></a>
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
