<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel 8 HTML to PDF Example</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body class="antialiased container mt-5">
<table id="datatable" class="table table-striped" >
    <thead>

    <tr>
        <th>SN</th>
        <th>Student Name</th>
        <th>Batch Year</th>
        <th>Book Name</th>
        <th>Issued By</th>
        <th>Issued Date</th>
        <th>Return Date</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>

    @foreach($data['rows'] as $i => $row)
        <tr>
            <td>{{$i+1}}</td>
            <td>{{$row->StudentId->name}}</td>
            <td>{{$row->BatchId->year}}</td>
            <td>{{$row->BookId->name}}</td>
            <td>{{$row->user_id}}</td>
            <td>{{$row->issue_date}}</td>
            <td>{{$row->return_date}}</td>
            <td>
                <input data-id="{{$row->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Returned" data-off="Pending" {{ $row->status ? 'checked' : '' }}>
            </td>
        </tr>
        @empty
    @endforeach
    </tbody>
</table>

</body>
</html>
