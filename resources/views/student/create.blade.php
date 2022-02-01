@extends('layouts.backend')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Student
                            <a href="{{route('student.index')}}" class="btn btn-success btn-sm">Show Students</a>
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

                    <form action="{{route('student.store')}}" method='POST' >
                        @csrf
                        <div class="form-group">

                            <label for="name">Name</label>
                            <input type="text" placeholder="Enter Student name" class="form-control" name="name" id="name" value="{{old('name')}}" >
                            @error('name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="text" class="form-control" placeholder="Enter Email of Student " name="email" id="email" value="{{old('email')}}">
                            @error('email')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                        <label for="faculty_id" class="control-label">Faculty</label>
                        <select name="faculty_id" class="form-control" id="faculty_id">
                            <option value="">Select Faculty</option>
                            @foreach($data['faculty_id'] as $faculty)
                                <option value="{{$faculty->id}}">{{$faculty->faculty}}</option>
                            @endforeach
                        </select>
                </div>
                        <div class="form-group">
                            <label for="batch_id" class="control-label">Batch</label>
                            <select name="batch_id" class="form-control" id="batch_id">
                                <option value="">Select Batch</option>
                                @foreach($data['batch_id'] as $batch)
                                    <option value="{{$batch->id}}">{{$batch->year}}</option>
                                @endforeach
                            </select>
                        </div>
{{--                        <div class="form-group">--}}
{{--                            <label for="password">Password</label>--}}
{{--                            <input type="password" class="form-control" placeholder="Enter Password" name="password" id="password" >--}}
{{--                            @error('password')--}}
{{--                            <p class="text-danger">{{ $message }}</p>--}}
{{--                            @enderror--}}
{{--                        </div>--}}

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" placeholder="Enter student Phone" name="phone" id="phone" value="{{old('phone')}}" >
                            @error('phone')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio"  name='status' id="active" value="1">Active
                                <input class="form-check-input" type="radio" name='status' id="deactive" value="0" checked>
                                Deactive
                            </div>
                            @error('status')
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



