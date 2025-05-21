<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Requests</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-4">
    <h2 class="text-center mb-4">Assigned Requests</h2>
    
    @if ($requests->where('request_status', 'assigned')->isEmpty())
        <div class="alert alert-info">There are no assigned requests for you to respond to.</div>
    @else
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th>Request Type</th>
                    <th>Problem Description</th>
                    <th>Date Submitted</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($requests->where('request_status', 'assigned') as $request)
                    <tr>
                        <td>{{ ucfirst($request->request_type) }}</td>
                        <td>{{ $request->problem }}</td>
                        <td>{{ $request->created_at->format('Y-m-d H:i') }}</td>
                        <td>
                            <span class="badge badge-primary">
                                {{ ucfirst($request->request_status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('respond-to-request', $request->id) }}" 
                               class="btn btn-sm btn-outline-primary">
                               Respond
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>