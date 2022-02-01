@extends('layouts.backend')

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
                        <h1>Faculty List
                            <a href="{{route('faculty.create')}}" class="btn btn-success btn-sm">Add Faculty</a>
                            <a class="btn btn-primary text-white btn-sm" id="printBtn">Print / PDF</a>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
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

                    <div class="dataTable" id="tables">

                            <table id="datatable" class="table table-striped" style="width:100%" >
                                <thead>
                            <tr>
                                <th>SN</th>
                                <th>Faculty</th>
                                <th>Status</th>
                                <th class= "no_print">Action</th>
                            </tr>
                                </thead>

                                <tbody>

                            @foreach($data['rows'] as $i => $row)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{$row->faculty}}</td>
{{--                                    <td>--}}
{{--                                        @if($row->status==1)--}}
{{--                                            <p style="color:Green">Active</p>--}}
{{--                                        @else--}}
{{--                                            <p style="color:red">Deactive</p>--}}
{{--                                        @endif--}}
{{--                                    </td>--}}

                                    <td>
                                        <input data-id="{{$row->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Yes" data-off="No" {{ $row->status ? 'checked' : '' }} >
                                    </td>
                                    <td class="no_print">
                                        <a href="{{route('faculty.show',$row->id)}}" class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a href="{{route('faculty.edit',$row->id)}}"  class="btn btn-primary btn-sm"><i class="fa fa-pencil-alt" aria-hidden="true"></i></a>
                                        <form action="{{route('faculty.destroy',$row->id)}}" method="post" class="d-inline">
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

@section('js')
    <script type="text/javascript" src="{{ asset('backend/plugins/print_any_part/dist/jQuery.print.min.js') }}"></script>
    <script type="text/javascript">
        $(function() {

            $("#printBtn").on('click', function() {

                $.print("#printable");

            });

        });


        // status ajax
        $(function(){
            $('.toggle-class').change(function(){
                var status = $(this).prop('checked')==true ? 1:0;
                var row_id = $(this).data('id');
                $.ajax({
                    type:'GET',
                    datatype:"jason",
                    url:'/ChangeStatus',
                    data:{'status':status,'row_id':row_id},
                    success : function(data){
                        console.log(data.success)
                    }

                });
            });

        });
    </script>

@endsection
