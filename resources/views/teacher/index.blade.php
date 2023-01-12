<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Teacher</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Teacher List</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('teacher.create') }}"> Create Teacher</a>
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
            <th>Name</th>
            <th>Bio</th>
            <th>Email</th>
            <th>Phone</th>
            <th>School</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($teachers as $teacher)
            <tr>
                <td>{{ $teacher->id }}</td>
                <td>{{ $teacher->name }}</td>
                <td>{{ $teacher->bio }}</td>
                <td>{{ $teacher->email }}</td>
                <td>{{ $teacher->phone }}</td>
                <td>{{ $teacher->school->name }}</td>
                <td>
                    <form action="{{ route('teacher.destroy',$teacher->id) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('teacher.edit',$teacher->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $teachers->links() }}
</div>
</body>
</html>
