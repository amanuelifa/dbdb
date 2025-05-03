<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 900px;
        }
        .form-control, .btn {
            border-radius: 0.25rem;
        }
        .table th, .table td {
            text-align: center;
        }
        .table thead {
            background-color: #f8f9fa;
        }
        .table tbody tr:nth-child(odd) {
            background-color: #f2f2f2;
        }
        /* Apply styles only to the "Add Department" button */
        .add-department-btn {
            background-color: #2050a8;
            border-color: #2050a8;
            color: #ffffff;
        }
        .add-department-btn:hover {
            background-color: #154a8c;
            border-color: #154a8c;
            color: #ffffff;
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <!-- Department Management Section -->
        <div class="mb-4">
            <h2 class="text-center">Department Management</h2>

            <!-- Flash Message -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <form action="{{ route('departments.store') }}" method="POST">
                @csrf
                <!-- Form fields -->
                <div class="form-group">
                    <label for="departmentName">Department Name</label>
                    <input type="text" class="form-control" id="departmentName" name="name" placeholder="Enter department name" required>
                </div>
                <div class="form-group">
                    <label for="departmentResponsibilities">Responsibilities</label>
                    <textarea class="form-control" id="departmentResponsibilities" name="responsibilities" rows="4" placeholder="Describe responsibilities" required></textarea>
                </div>
                <button type="submit" class="btn add-department-btn btn-block">Add Department</button>
            </form>

        </div>   
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Automatically close the alert after a few seconds -->
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('.alert').alert('close');
            }, 3000); // 3 seconds delay
        });
    </script>
</body>
</html>
