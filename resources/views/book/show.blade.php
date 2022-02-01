@extends('layouts.backend')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{$data['row']->name}} Book Information
                            <a href="{{route('book.create')}}" class="btn btn-success btn-sm">Add Book</a>
                            <a href="{{route('book.index')}}" class="btn btn-info btn-sm">Books List</a>
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

            <!-- Default box -->
            <div class="card">

                <div class="card-body">

                    <table class="table table-bordered">
                        <tr>
                            <th>Name</th>
                            <td>{{$data['row']->name}}</td>
                        </tr>
                        <tr>
                            <th>Publisher</th>
                            <td>{{$data['row']->publisher}}</td>
                        </tr>
                        <tr>
                            <th>Author</th>
                            <td>{{$data['row']->author}}</td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td>{{$data['row']->price}}</td>
                        </tr>
                        <tr>
                            <th>Pages</th>
                            <td>{{$data['row']->pages}}</td>
                        </tr>

                        <tr>
                            <th>Remaining Books</th>
                            <td>#</td>
                        </tr>

                        <tr>
                            <th>Edition</th>
                            <td>{{$data['row']->edition}}</td>
                        </tr>
                        <tr>
                            <th>Quantity</th>
                            <td>{{$data['row']->quantity}}</td>
                        </tr>
                        <tr>
                            <th>Created_At</th>
                            <td>{{$data['row']->created_at}}</td>
                        </tr>
                        <tr>
                            <th>Updated_At</th>
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
