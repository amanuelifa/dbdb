<!-- resources/views/respond-to-request.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respond to Request</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('nav')

    <div class="container mt-5">
        <h2>Respond to Request #{{ $request->id }}</h2>
        <p><strong>Request Type:</strong> {{ $request->request_type }}</p>
        <p><strong>Problem:</strong> {{ $request->problem }}</p>
        <p><strong>Date:</strong> {{ $request->created_at->format('Y-m-d H:i') }}</p>

        <!-- Display existing response if available -->
        @if ($request->response)
            <p><strong>Existing Response:</strong> {{ $request->response }}</p>
        @endif

        <form action="{{ route('submit-response', $request->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="response">Your Response</label>
                <textarea class="form-control" id="response" name="response" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit Response</button>
            <a href="{{ route('responseforuser') }}" class="btn btn-secondary">Back</a>

        </form>
    </div>
</body>
</html>
