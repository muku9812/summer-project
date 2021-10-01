@extends('layouts.backend')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Upate Book
                        <a href="{{route('book.index')}}" class="btn btn-success">Book List</a>
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

                <div class="card-body">

                    <form action="{{route('book.update',$data['row']->id)}}" method='POST'>
                        <input type="hidden" name="_method" value="PUT"/>
                        @csrf
                        <div class="form-group">

                            <label for="name">Book Title</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$data['row']->name}}" >
                            @error('name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="publisher">Publisher</label>
                            <input type="text" class="form-control" placeholder="Enter Name of Books publisher " name="publisher" id="publisher"  value="{{$data['row']->publisher}}" >
                            @error('publisher')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="quantity">Number of Books</label>
                            <input type="text" class="form-control" placeholder="Enter Total number of  Books " name="quantity" id="quantity" value="{{$data['row']->quantity}}"  >
                            @error('quantity')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="author">Author Name</label>
                            <input type="text" class="form-control" placeholder="Enter Book Auther" name="author" id="author" value="{{$data['row']->author}}" >
                            @error('author')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="isbn">Book ISBN</label>
                            <input type="text" class="form-control" placeholder="Enter Book ISBN" name="isbn" id="isbn" value="{{$data['row']->isbn}}" >
                            @error('isbn')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">

                            <label for="pages">Total Pages</label>
                            <input type="number" class="form-control" placeholder="Enter the number of pages" name="pages" id="pages" value="{{$data['row']->pages}}" >
                            @error('pages')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">

                            <label for="price">Book Price</label>
                            <input type="number" class="form-control" placeholder="Enter the Price" name="price" id="price" value="{{$data['row']->price}}" >
                            @error('price')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="edition">Book Edition</label>
                            <input type="number" class="form-control" placeholder="Enter the Edition" name="edition" id="edition" value="{{$data['row']->edition }}" >
                            @error('edition')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" value="save" class="btn btn-primary">

                        </div>
                    </form>
                <!-- /.card-body -->
                <div class="card-footer">

                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
            </div>
        </section>
        <!-- /.content -->
    </div>

    @endsection
