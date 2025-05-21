<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee DataTable</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
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

        h2.text-center {
            color: #2c3e50;
            margin-bottom: 30px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .card {
            border: none;
            box-shadow: 0 0.15rem 0.5rem rgba(0, 0, 0, 0.05);
            border-radius: 0.5rem;
        }

        .card-body {
            padding: 20px;
        }

        /* Table row fade-in animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        table.dataTable tbody tr {
            animation: fadeIn 0.3s ease-in;
        }

        /* Hover effects on table rows */
        table.dataTable tbody tr:hover {
            background-color: #e9ecef;
            transform: scale(1.005);
            transition: background-color 0.2s ease, transform 0.2s ease;
            cursor: pointer;
        }

        /* Styling table headers */
        .thead-dark th {
            background-color: #343a40;
            color: #fff;
        }

        /* Styling action buttons */
        .action-buttons button,
        .action-buttons a {
            margin-right: 5px;
            border-radius: 0.25rem;
            transition: opacity 0.2s ease;
        }

        .action-buttons button:hover,
        .action-buttons a:hover {
            opacity: 0.8;
        }

        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
        }

        .btn-info:hover {
            background-color: #117a8b;
            border-color: #117a8b;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #c82333;
        }

        /* Add User button styling */
        .mb-3.text-left {
            margin-bottom: 25px;
        }

        /* DataTables Pagination Styling */
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0.5em 1em;
            margin-left: 2px;
            border: 1px solid #ddd;
            border-radius: 0.25rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background-color: #f8f9fa;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background-color: #007bff;
            color: white !important;
            border-color: #007bff;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
            cursor: not-allowed;
            opacity: 0.6;
        }

        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_length {
            margin-top: 1em;
            margin-bottom: 1em;
        }
    </style>
</head>
<body>
@include('nav')
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Employee List</h2>
        <div class="mb-3 text-left">
            <a href="{{ route('users.create') }}" class="btn btn-primary">
                <i class="fas fa-plus mr-2"></i> Add User
            </a>
        </div>
        <div class="card">
            <div class="card-body">
                <table id="employee-table" class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <br>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#employee-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('employees.data') }}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    {
                        data: null,
                        name: 'actions',
                        render: function (data, type, row) {
                            return `
                                <div class="action-buttons">
                                    <a href="{{ url('/employees/${row.id}/edit') }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ url('/employees/${row.id}') }}" method="POST" class="delete-form" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            `;
                        },
                        orderable: false,
                        searchable: false
                    }
                ],
                language: {
                    paginate: {
                        previous: '<i class="fas fa-chevron-left"></i>',
                        next: '<i class="fas fa-chevron-right"></i>'
                    }
                }
            });

            // Handle Delete button click with SweetAlert2 confirmation
            $('#employee-table').on('click', '.delete-btn', function(event) {
                event.preventDefault(); // Prevent the form from submitting immediately

                let form = $(this).closest('form');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // Submit the form if confirmed
                    }
                });
            });
        });
    </script>
</body>
</html>