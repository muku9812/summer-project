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
                        <h1>List Book
                        <a href="{{route('book.create')}}" class="btn btn-success">Add Book</a>
                            <a class="btn btn-primary text-white" id="printBtn">Print / PDF</a>
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
                           <th>Title</th>
                           <th>Publisher</th>
                           <th>Author</th>
                           <th>Price</th>
                           <th> No.of Pages</th>
                           <th>Edition</th>
                            <th>Number of Book</th>
                           <th class= "no_print">Action</th>
                            </tr>
                            <thead>
                            <tbody>

                       @foreach($data['rows'] as $i => $row)
                           <tr>
                               <td>{{$i+1}}</td>
                               <td>{{$row->name}}</td>
                               <td>{{$row->publisher}}</td>
                               <td>{{$row->author}}</td>
                               <td>{{$row->price}}</td>
                               <td>{{$row->pages}}</td>
                               <td>{{$row->edition}}</td>
                               <td>{{$row->quantity}} </td>




                               <td class="no_print">
                                   <a href="{{route('book.show',$row->id)}}" class="btn btn-success">View</a>
                                   <a href="{{route('book.edit',$row->id)}}" class="btn btn-primary">Update</a>
                                 <form action="{{route('book.destroy',$row->id)}}" method="post">
                                     <input type="hidden" name="_method" value="delete" />
                                     @csrf
                                     <button type="submit" class="btn btn-danger">Delete</button>

                                 </form>

                               </td>
                           </tr>
                            </tbody>
                       @endforeach
                   </table>
                <!-- /.card-body -->

                </div>

            </div>
            <!-- /.card -->

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
    </script>

@endsection
