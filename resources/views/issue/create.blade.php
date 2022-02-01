@extends('layouts.backend')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Issue Book
                            <a href="{{route('issue.index')}}" class="btn btn-success btn-sm">Issued List</a>
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

                    <form action="{{route('issue.store')}}" method='POST'>
                        @csrf
                        <div class="form-group">

                            <label for="student_id" class="control-label">Student Name</label>
                            <select name="student_id" class="form-control" id="student_id">
                                <option value="">Select Student</option>
                                @foreach($data['active_student'] as $students)
                                    <option value="{{$students->id}}">{{$students->name}}</option>
                                @endforeach
                            </select>

                            @error('student_id')
                            <p class="text-danger">{{ 'Please select student name' }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="book_id" class="control-label">Book Name</label>
                            <select name="book_id" class="form-control" id="book_id">
                                <option value="">Select book</option>
                                @foreach($data['book_id'] as $book)
                                    <option value="{{$book->id}}">{{$book->name}}</option>
                                @endforeach
                            </select>
                            @error('book_id')
                            <p class="text-danger">{{ 'please select the Book name' }}</p>
                            @enderror
                        </div>



                        <div class="form-group">
                            <label for="batch_id" class="control-label">Batch</label>
                            <select name="batch_id" class="form-control" id="batch_id">
                                <option value=" ">Select Class</option>
                                @foreach($data['active_batch'] as $batch)
                                    <option value="{{$batch->id}}">{{$batch->year}}</option>
                                @endforeach
                            </select>
                            @error('batch_id')
                            <p class="text-danger">{{ "please select the batch" }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="user_id" class="control-label">Issued_by</label>
                            <input type="text" name="user_id" class="form-control" id="user_id" value=" {{auth()->user()->name}}" readonly>
                            @error('user_id')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="issue_date" class="control-label">Issue Date</label>
                            <input type="date" name="issue_date" class="form-control" id="issue_date" min="<?php echo date("Y-m-d"); ?>"  value="<?php echo date("Y-m-d")  ?>" readonly>
                            @error('issue_date')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="return_date" class="control-label">Return Date</label>
                            <input type="date" name="return_date" class="form-control" id="return_date" min="<?php echo date("Y-m-d"); ?>">
                            @error('return_date')
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
