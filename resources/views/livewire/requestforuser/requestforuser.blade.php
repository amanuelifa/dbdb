<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Requests</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* Add smooth transition for table rows */
        .table tbody tr {
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        /* Change background color on hover */
        .table tbody tr:hover {
            background-color: #f8f9fa;
            transform: translateY(-5px);
        }

        /* Add a fade-in effect for the table */
        .table {
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body>
@include('nav')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-black text-center" style="background-color: #eaf0fb;">
                        <h4>Requests of User (Pending Response)</h4>
                    </div>
                    <div class="card-body">
                        @php
                            // Filter out requests that already have a response
                            $pendingRequests = $requests->filter(function($request) {
                                return is_null($request->response); // Check if response is null
                            });
                        @endphp

                        @if ($pendingRequests->isEmpty())
                            <p>No pending requests found.</p>
                        @else
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <!-- <th>#</th> -->
                                        <th>Request Type</th>
                                        <th>Problem</th>
                                        <th>Computer Name</th>
                                        <th>Requested By</th>
                                        <th>Created At</th>
                                        <th>Actions</th> <!-- New column for actions -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pendingRequests as $request)
                                        <tr>
                                            <!-- <td>{{ $request->id }}</td> -->
                                            <td>{{ $request->request_type }}</td>
                                            <td>{{ $request->problem }}</td>
                                            <td>{{ $request->computer_name }}</td>
                                            <td>{{ $request->name }}</td>
                                            <td>{{ $request->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                <!-- Updated Assign Button to redirect to the technician assignment page -->
                                                <a href="{{ route('assign-technician', $request->id) }}" class="btn btn-info btn-sm">Assign</a>
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

    <!-- Bootstrap JS and dependencies (Optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
