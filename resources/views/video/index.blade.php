<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>School</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>School List</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('school.create') }}"> Create School</a>
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
            <th>School Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>City</th>
            <th>Country</th>
            <th>Phone</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($schools as $school)
            <tr>
                <td>{{ $school->id }}</td>
                <td>{{ $school->name }}</td>
                <td>{{ $school->email }}</td>
                <td>{{ $school->address }}</td>
                <td>{{ $school->city }}</td>
                <td>{{ $school->country }}</td>
                <td>{{ $school->phone }}</td>
                <td>
                    <form action="{{ route('school.destroy',$school->id) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('school.edit',$school->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $schools->links() !!}
</div>
</body>
</html>
