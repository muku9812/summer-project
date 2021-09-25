@extends('layouts.backend')

@section('content')

    <style type="text/css">
        /*if you want to remove some content in print display then use .no_print class on it */
        @media print {
            #datatable_wrapper .row:first-child {display:none;}
            #datatable_wrapper .row:last-child {display:none;}
            .no_print {display:none;}
        }

    </style>



    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Students information
                            <a href="{{route('student.create')}}" class="btn btn-success">Add Student</a>
                            <a class="btn btn-primary text-white" id="printBtn">Print / PDF</a>
                            <a href="{{route('student.active')}}" class="btn btn-primary text-white" id="printBtn">Active</a>
                        </h1>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Faculty</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th class="no_print">Action</th>
                        </tr>
                                </thead>
                                <tbody>
                        @foreach($data['rows'] as $i => $row)
                            <tr>
                                <td>{{$i+1}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->FacultyId->faculty}}</td>
                                <td>{{$row->phone}}</td>

                                <td>
                                    @if($row->status==1)
                                        <p style="color:Green">Active</p>
                                    @else
                                        <p style="color:red">Deactive</p>
                                        @endif
                                </td>

                                <td class="no_print">
                                    <a href="{{route('student.show',$row->id)}}" class="btn btn-success">View</a>
                                    <a href="{{route('student.edit',$row->id)}}" class="btn btn-primary">Update</a>
                                    <form action="{{route('student.destroy',$row->id)}}" method="post">
                                        <input type="hidden" name="_method" value="delete" />
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>

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
        @include('ajax.script')
        <!-- /.content -->
        </section>

@endsection




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

