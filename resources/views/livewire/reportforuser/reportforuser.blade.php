<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Report</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   
                       
                    
<div class="container mt-5">
     <h4 style="text-align: center; font-weight: bold;">Response by Technician Report</h4>
    <form action="{{ route('responsebytechnician') }}" method="GET">
        @csrf
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
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
