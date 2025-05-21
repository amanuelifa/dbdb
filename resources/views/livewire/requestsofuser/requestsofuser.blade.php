<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Requests</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        .container {
            margin-top: 30px;
        }

        .card {
            border: none;
            box-shadow: 0 0.15rem 0.5rem rgba(0, 0, 0, 0.05);
            border-radius: 0.5rem;
        }

        .card-header {
            background-color: #e9ecef; /* Light grey for header */
            color: #495057;
            border-bottom: 1px solid #dee2e6;
            padding: 1rem 1.5rem;
            border-radius: 0.5rem 0.5rem 0 0;
        }

        .card-header h4 {
            margin-bottom: 0;
            font-weight: 500;
        }

        .card-body {
            padding: 1.5rem;
        }

        .table {
            margin-bottom: 0;
            border-radius: 0.5rem;
            overflow: hidden; /* To contain the border-radius */
        }

        .table thead th {
            background-color: #343a40; /* Dark grey for header row */
            color: #fff;
            border-bottom: 2px solid #454d55;
            padding: 0.75rem;
            vertical-align: middle;
        }

        .table tbody td {
            padding: 0.75rem;
            vertical-align: middle;
            border-bottom: 1px solid #dee2e6;
        }

        /* Add smooth transition for table rows */
        .table tbody tr {
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        /* Change background color on hover */
        .table tbody tr:hover {
            background-color: #f8f9fa;
            transform: translateY(-2px);
            box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.05);
        }

        /* Add a fade-in effect for the table */
        .table {
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        /* Style the "Assign" button */
        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
            color: #fff;
            border-radius: 0.25rem;
            transition: background-color 0.3s ease;
        }

        .btn-info:hover {
            background-color: #117a8b;
            border-color: #117a8b;
        }

        /* Style the "No pending requests" message */
        .card-body p {
            color: #6c757d;
            font-style: italic;
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
                        <h4><i class="fas fa-exclamation-triangle mr-2"></i> Requests of User (Pending Response)</h4>
                    </div>
                    <div class="card-body">
                        @php
                            // Filter out requests that already have a response
                            $pendingRequests = $requests->filter(function($request) {
                                return is_null($request->response); // Check if response is null
                            });
                        @endphp

                        @if ($pendingRequests->isEmpty())
                            <p><i class="fas fa-info-circle mr-2"></i> No pending requests found.</p>
                        @else
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th><i class="fas fa-tag mr-2"></i> Request Type</th>
                                        <th><i class="fas fa-question-circle mr-2"></i> Problem</th>
                                        <th><i class="fas fa-desktop mr-2"></i> Computer Name</th>
                                        <th><i class="fas fa-user mr-2"></i> Requested By</th>
                                        <th><i class="fas fa-calendar-alt mr-2"></i> Created At</th>
                                        <th><i class="fas fa-wrench mr-2"></i> Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pendingRequests as $request)
                                        <tr>
                                            <td>{{ $request->request_type }}</td>
                                            <td>{{ $request->problem }}</td>
                                            <td>{{ $request->computer_name }}</td>
                                            <td>{{ $request->name }}</td>
                                            <td>{{ $request->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                <a href="{{ route('assign-technician.show', $request->id) }}" class="btn btn-info btn-sm">
                                                    <i class="fas fa-user-plus mr-1"></i> Assign
                                                </a>
                                            </td>
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