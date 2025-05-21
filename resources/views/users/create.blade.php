<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

        h2 {
            color: #2c3e50;
            margin-bottom: 30px;
        }

        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 0.25rem;
        }

        .alert-danger ul {
            margin-bottom: 0;
            padding-left: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: 500;
            color: #555;
            margin-bottom: 5px;
            display: block;
        }

        .form-control {
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            padding: 10px 15px;
            font-size: 1rem;
            display: block;
            width: 100%;
            box-sizing: border-box;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .form-control:focus {
            border-color: #007bff;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 0.25rem;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
@include('nav')
    <div class="container mt-5">
        <h2><i class="fas fa-user-plus mr-2"></i> Create New User</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li><i class="fas fa-exclamation-triangle mr-2"></i> {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('employees.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name"><i class="fas fa-user mr-2"></i> Name:</label>
                <input type="text" id="name" name="name" class="form-control" required placeholder="Enter full name">
            </div>
            <div class="form-group">
                <label for="email"><i class="fas fa-envelope mr-2"></i> Email:</label>
                <input type="email" id="email" name="email" class="form-control" required placeholder="Enter email address">
            </div>
            <div class="form-group">
                <label for="password"><i class="fas fa-key mr-2"></i> Password:</label>
                <input type="password" id="password" name="password" class="form-control" required placeholder="Enter password">
            </div>
            <div class="form-group">
                <label for="password_confirmation"><i class="fas fa-check-double mr-2"></i> Confirm Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required placeholder="Confirm password">
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-plus mr-2"></i> Create User</button>
        </form>
    </div>
</body>
</html>