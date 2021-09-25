<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
            <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
        @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
            @endif
        @endauth
    </div>
@endif


<!-- Main content -->
{{--<section class="content">--}}

{{--    <!-- Default box -->--}}
{{--    <div class="card">--}}

{{--        <div class="dataTable" id="tables">--}}
{{--            @if(Session::has('success'))--}}
{{--                <p class="alert alert-success">{{Session::get('success')}}</p>--}}
{{--            @endif--}}
{{--            @if(Session::has('error'))--}}
{{--                <p class="alert alert-danger">{{Session::get('danger')}}</p>--}}
{{--            @endif--}}
{{--            <table id="datatable" class="table table-striped" >--}}
{{--                <thead>--}}

{{--                <tr>--}}
{{--                    <th>SN</th>--}}
{{--                    <th>Name</th>--}}
{{--                    <th>Description</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody>--}}

{{--                @foreach($data['rows']  as $i => $row)--}}
{{--                    <tr>--}}
{{--                        <td>{{$i+1}}</td>--}}
{{--                        <td>{{$row->name}}</td>--}}
{{--                        <td>{{$row->description}}</td>--}}

{{--                    </tr>--}}
{{--                @endforeach--}}
{{--                </tbody>--}}
{{--            </table>--}}
{{--            <!-- /.card-body -->--}}


{{--        </div>--}}
{{--        <!-- /.card -->--}}
{{--    </div>--}}
{{--</section>--}}



</body>
</html>
