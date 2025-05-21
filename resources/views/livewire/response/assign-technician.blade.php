<!-- resources/views/livewire/response/assign-technician.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Technician</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('nav')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Assign Technician for Request #{{ $request->id }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('assign-technician.store', $request->id) }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="technician">Select Technician:</label>
                                <select name="technician_id" id="technician" class="form-control" required>
                                    <option value=""> Select Technician </option>
                                    @foreach ($technicians as $technician)
                                        <option value="{{ $technician->id }}">{{ $technician->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Assign Technician</button>
                            <a href="{{ route('user-requests') }}" class="btn btn-secondary">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
