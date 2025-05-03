<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Report</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- CSS for Animation -->
    <style>
        /* Fade-in animation for table rows */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        /* Animate rows when they load */
        tbody tr {
            animation: fadeIn 0.5s ease-in;
        }

        /* Hover effect for table rows */
        tbody tr:hover {
            background-color: #f0f8ff;
            transform: scale(1.02);
            transition: all 0.3s ease;
        }

        /* Table header styling */
        .table thead th {
            background-color: #2050a8;
            color: white;
            transition: background-color 0.3s ease;
        }

        /* Table body styling */
        .table tbody td {
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
    </style>
</head>
<body>
@include('nav')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-white text-center" style="background-color: #2050a8;">
                        <h4>Generate User Requests Report</h4>
                    </div>
                    <div class="card-body">
                        <!-- Date range form -->
                        <form action="{{ route('report.generate') }}" method="GET" class="mb-4">
                            <div class="form-row">
                                <div class="col-md-5">
                                    <label for="startDate">From:</label>
                                    <input type="date" id="startDate" name="startDate" class="form-control" required>
                                </div>
                                <div class="col-md-5">
                                    <label for="endDate">To:</label>
                                    <input type="date" id="endDate" name="endDate" class="form-control" required>
                                </div>
                                <div class="col-md-2 d-flex align-items-end">
                                    <button type="submit" class="btn btn-primary btn-block">Generate Report</button>
                                </div>
                            </div>
                        </form>

                        <!-- Display the report table if there are requests -->
                        @if(isset($responses) && !$responses->isEmpty())
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Request Type</th>
                                        <th>Problem</th>
                                        <th>Computer Name</th>
                                        <th>Requested By</th>
                                        <th>Created At</th>
                                        <th>Responses</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($responses as $response)
                                        <tr>
                                            <td>{{ $response->id }}</td>
                                            <td>{{ $response->request_type }}</td>
                                            <td>{{ $response->problem }}</td>
                                            <td>{{ $response->computer_name }}</td>
                                            <td>{{ $response->requested_by }}</td>
                                            <td>{{ $response->created_at->format('Y-m-d H:i:s') }}</td>
                                            <td>
                                                @if ($response->responses->isEmpty())
                                                    <p>No responses yet.</p>
                                                @else
                                                    <ul>
                                                        @foreach ($response->responses as $responseItem)
                                                            <li>{{ $responseItem->response_text }} ({{ $responseItem->created_at->format('Y-m-d H:i:s') }})</li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No requests found for the selected date range.</p>
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
