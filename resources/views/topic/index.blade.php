<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Topic</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Topic List</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('topic.create') }}"> Create Topic</a>
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
            <th>Topic Name</th>
            <th>Detail</th>
            <th>Unit</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($topics as $topic)
            <tr>
                <td>{{ $topic->id }}</td>
                <td>{{ $topic->name }}</td>
                <td>{{ $topic->detail }}</td>
                <td>{{ $topic->unit->name }}</td>
                <td>
                    <form action="{{ route('topic.destroy',$topic->id) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('topic.edit',$topic->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $topics->links() !!}
</div>
</body>
</html>
