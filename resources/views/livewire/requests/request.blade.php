<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Request</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-header {
            background-color: #eaf0fb;
        }
        .btn-primary {
            background-color: #2050a8;
            border-color: #2050a8;
        }
        .btn-primary:hover {
            background-color: #1a3d7d;
            border-color: #1a3d7d;
        }
    </style>
</head>
<body>
    
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div style="font-weight: bolder;" class="card-header text-black text-center ">
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
    <!-- Request Type -->

     
  
    
    <div class="form-group">
        <label for="request_type">Request Type</label>
        <select class="form-control" id="request_type" name="request_type" required>
        <option value="">Select Request Type</option>
            <option value="Password Issue">Password Issue</option>
            <option value="Computer Hardware">Hardware Issue</option>
            <option value="Computer Software">Software Issue</option>
            <option value="Network Issue">Network Issue</option>
            <option value="Power Issue">Power Issue</option>
            <option value="Other">Other</option>
        </select>
    </div>

    <!-- Problem -->
    <div class="form-group">
        <label for="problem">Problem</label>
        <textarea class="form-control" id="problem" name="problem" rows="4" required placeholder="Describe the problem..."></textarea>
    </div>

    <!-- Computer Name -->
    <div class="form-group">
        <label for="computer_name">Computer Name</label>
        <input type="text" class="form-control" id="computer_name" name="computer_name" required placeholder="Enter computer name">
    </div>
        
    
    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary btn-block">Submit Request</button>
</form>


    <!-- Bootstrap JS and dependencies (Optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
