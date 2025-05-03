<!-- resources/views/livewire/response/user-requests.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Requests</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@include('nav')
    <div class="container mt-5">
        <h2>User Requests</h2>
        @if ($requests->isEmpty())
            <p>No requests found.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Request Type</th>
                        <th>Problem</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requests as $request)
                        <tr>
                            <td>{{ $request->id }}</td>
                            <td>{{ $request->request_type }}</td>
                            <td>{{ $request->problem }}</td>
                            <td>
                                <!-- Assign Button -->
                                <a href="{{ route('assign-technician', $request->id) }}" class="btn btn-info btn-sm">Assign</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>
