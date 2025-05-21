<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Request</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Light background */
        }
        .card {
            background-color: #ffffff; /* White card background */
            border: none;
            border-radius: 10px; /* Rounded corners for the card */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }
        .card-header {
            background-color: #e0f7fa; /* Very light cyan header */
            color: #008ba3; /* Darker cyan text */
            border-bottom: 1px solid #b2ebf2; /* Light border */
            padding: 1.25rem;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .card-header h4 {
            font-weight: bold;
            margin-bottom: 0; /* Remove default margin */
            font-size: 1.5rem;
        }
        .card-body {
            padding: 2rem;
        }
        .form-group label {
            font-weight: 500; /* Medium font weight for labels */
            color: #495057; /* Darker gray label color */
            margin-bottom: 0.5rem;
        }
        .form-control {
            border: 1px solid #ced4da; /* Bootstrap's default border */
            border-radius: 6px; /* Slightly more rounded corners */
            padding: 0.75rem; /* Slightly increased padding */
            transition: border-color 0.2s ease; /* Smooth transition */
            font-size: 1rem;
        }
        .form-control:focus {
            border-color: #4fc3f7; /* Highlight border on focus */
            box-shadow: 0 0 0 3px rgba(0, 188, 212, 0.1); /* Subtle shadow on focus */
            outline: none; /* Remove default outline */
        }
        .form-control::placeholder {
            color: #b0bec5; /* Lighter placeholder color */
            font-style: italic;
        }
        .btn-primary {
            background-color: #008ba3; /* A teal/cyan primary button color */
            border-color: #008ba3;
            color: white;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            border-radius: 6px;
            transition: background-color 0.2s ease, transform 0.1s ease;
            font-size: 1.1rem;
        }
        .btn-primary:hover {
            background-color: #00758c; /* Darker shade on hover */
            border-color: #00758c;
            transform: translateY(-1px);
        }
        .btn-primary:focus {
            box-shadow: 0 0 0 3px rgba(0, 188, 212, 0.3);
            outline: none;
        }
        .alert-success {
            background-color: #e6fffa;
            color: #008060;
            border-color: #b2f5ea;
            padding: 1rem;
            border-radius: 6px;
            margin-bottom: 1.5rem;
            font-size: 1rem;
        }
        .form-group select{
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Create New Request</h4>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('requests.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="request_type">Request Type <span class="text-danger">*</span></label>
                                <select class="form-control" id="request_type" name="request_type" required>
                                    <option value="">Select Request Type</option>
                                    <option value="Password Issue">Password Issue</option>
                                    <option value="Hardware Issue">Hardware Issue</option>
                                    <option value="Software Issue">Software Issue</option>
                                    <option value="Network Issue">Network Issue</option>
                                    <option value="Power Issue">Power Issue</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="problem">Problem <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="problem" name="problem" rows="4" required placeholder="Describe the problem..."></textarea>
                            </div>

                            <div class="form-group">
                                <label for="computer_name">Computer Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="computer_name" name="computer_name" required placeholder="Enter computer name">
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="fas fa-paper-plane mr-2"></i> Submit Request
                            </button>
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
