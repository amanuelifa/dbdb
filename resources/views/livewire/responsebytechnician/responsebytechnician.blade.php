<!-- resources/views/livewire/responsebytechnician/responsebytechnician.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responses by Technicians</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles */
        .card-header {
            background-color: #2050a8;
            color: #ffffff;
        }
        .table-custom th, .table-custom td {
            vertical-align: middle;
            text-align: center;
        }
        .table-custom th {
            background-color: #2050a8;
            color: #ffffff;
        }
        .table-custom tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .table-custom tbody tr:hover {
            background-color: #e9ecef;
        }
        .container h1 {
            color: #2050a8;
            font-weight: bold;
        }
        .btn-primary {
            background-color: #2050a8;
            border-color: #2050a8;
        }
        .btn-primary:hover {
            background-color: #004080;
            border-color: #003366;
        }
    </style>
</head>
<body>
    @include('nav')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center">
                        <h4 style="color: black;">Responses by Technicians</h4>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if ($responses->isEmpty())
                            <p>No responses found.</p>
                        @else
                            <table class="table table-bordered table-hover ">
                                <thead>
                                    <tr>
                                        <th>Requested By</th>
                                        <th>Request ID</th>
                                        <th>Response Text</th>
                                        <th>Date</th>
                                        <!-- <th>Updated At</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($responses as $response)
                                        <tr>
                                            <td>{{ $response->name }}</td>
                                            <td>{{ $response->request_id }}</td>
                                            <td>{{ $response->response_text }}</td>
                                            <td>{{ $response->created_at->format('Y-m-d') }}</td>
                                            <!-- <td>{{ $response->updated_at->format('Y-m-d H:i:s') }}</td> -->
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
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
