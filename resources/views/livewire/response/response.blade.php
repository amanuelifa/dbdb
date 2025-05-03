<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Technician</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@include('nav')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Assign Technician for Request #{{ $request->id }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('response.assign', $request->id) }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="request_type">Request Type:</label>
                                <input type="text" class="form-control" id="request_type" value="{{ $request->request_type }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="problem">Problem:</label>
                                <textarea class="form-control" id="problem" rows="3" readonly>{{ $request->problem }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="technician">Assign Technician:</label>
                                <select name="technician_id" id="technician" class="form-control" required>
                                    <option value="">Select Technician</option>
                                    @foreach ($technicians as $technician)
                                        <option value="{{ $technician->id }}">{{ $technician->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success">Assign Technician</button>
                        </form>

                        <a href="{{ route('requests') }}" class="btn btn-primary mt-3">Back to Requests</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies (Optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
