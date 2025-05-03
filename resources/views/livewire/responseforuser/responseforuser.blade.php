<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Requests</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
    <body>
<!-- resources/views/livewire/responseforuser/responseforuser.blade.php -->

<div style="padding: 20px; font-family: Arial, sans-serif;">
    <h2 style="text-align: center; color:black; margin-bottom: 20px; font-weight:bold; font-size:larger">Assigned Requests</h2>
    @if ($requests->where('request_status', 'Assigned')->isEmpty())
        <p>There are no assigned requests for you to respond to.</p>
    @else
    <table style="width: 100%; border-collapse: collapse; background-color: #f9f9f9;">
        <thead>
            <tr>
                <!-- <th style="padding: 10px; border: 1px solid #ddd;">Request ID</th> -->
                <th style="padding: 10px; border: 1px solid #ddd;">Request Type</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Problem</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Date</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Status</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($requests->where('request_status', 'Assigned') as $request)
                <tr>
                    <!-- <td style="padding: 10px; border: 1px solid #ddd;">{{ $request->id }}</td> -->
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $request->request_type }}</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $request->problem }}</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $request->created_at->format('Y-m-d H:i') }}</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $request->request_status }}</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">
                        <a href="{{ route('respond-to-request', $request->id) }}" class="btn btn-info btn-sm">Respond</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
