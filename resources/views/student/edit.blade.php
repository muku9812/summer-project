@extends('layouts.backend')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Student
                            <a href="{{route('student.index')}}" class="btn btn-success">Show Students</a>
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

                    <form action="{{route('student.update',$data['row']->id)}}" method='POST'>
                        <input type="hidden" name="_method" value="PUT"/>
                        @csrf
                        <div class="form-group">

                            <label for="name">Name</label>
                            <input type="text" value="{{$data['row']->name}}" class="form-control" name="name" id="name" >
                            @error('name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="text" class="form-control" value="{{$data['row']->email}}"  name="email" id="email" >
                            @error('email')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

{{--                        <div class="form-group">--}}
{{--                            <label for="faculty">Faculty</label>--}}
{{--                            <input type="text" class="form-control" value="{{$data['row']->faculty}}"  name="faculty" id="faculty" >--}}
{{--                            @error('faculty')--}}
{{--                            <p class="text-danger">{{ $message }}</p>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
                        <div class="form-group">
                            <label for="faculty_id" class="control-label">Faculty</label>
                            <select name="faculty_id" class="form-control" id="faculty_id">
                                <option value="{{$data['row']->faculty_id}}">{{$data['row']->FacultyId->faculty}}</option>
                                @foreach($data['faculty_id'] as $faculty)
                                    <option value="{{$faculty->id}}">{{$faculty->faculty}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" value="{{$data['row']->password}}"  name="password" id="password" >
                            @error('password')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

{{--                        <div class="form-group">--}}
{{--                            <label for="batch_id" class="control-label">Batch</label>--}}
{{--                            <select name="batch_id" class="form-control" id="batch_id">--}}
{{--                                <option value="{{$data['row']->batch_id}}">{{$data['row']->batch_id}}</option>--}}
{{--                                @foreach($data['batch_id'] as $batch)--}}
{{--                                    <option value="{{$batch->id}}">{{$batch->year}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" value="{{$data['row']->phone}}"  name="phone" id="phone" >
                            @error('phone')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Status </label>
                            @if ( $data['row']->Status== 0 )
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"  name='status' id="active" value="1" checked>Active
                                    <input class="form-check-input" type="radio" name='status' id="deactive" value="0" >
                                    Deactive
                                </div>
                            @else
                                <div class="form-check form-check-inline">

                                        <input class="form-check-input" type="radio"  name='status' id="active" value="1" >Active
                                        <input class="form-check-input" type="radio" name='status' id="deactive" value="0" checked>
                                        Deactive


                                </div>
                            @endif
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

        </section>
        <!-- /.content -->
    </div>

@endsection
