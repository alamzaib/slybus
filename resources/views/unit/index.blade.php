<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Unit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Unit List</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('unit.create') }}"> Create Unit</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>S.No</th>
            <th>Unit Name</th>
            <th>Course</th>
            <th>Detail</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($units as $unit)
            <tr>
                <td>{{ $unit->id }}</td>
                <td>{{ $unit->name }}</td>
                <td>{{ $unit->course->name }}</td>
                <td>{{ $unit->detail }}</td>
                <td>
                    <form action="{{ route('unit.destroy',$unit->id) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('unit.edit',$unit->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $units->links() !!}
</div>
</body>
</html>
