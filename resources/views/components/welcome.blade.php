<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance Management System</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        .navbar-custom {
            background-color: #2050a8;
        }

        .navbar-custom .navbar-brand, .navbar-custom .nav-link {
            color: #ffffff;
        }

        .navbar-custom .nav-link:hover {
            color: #e0e0e0;
        }

        .footer {
            background-color: #2050a8;
            color: #ffffff;
            text-align: center;
            padding: 10px;
        }

        .footer a {
            color: #ffffff;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .chart-container {
            position: relative;
            height: 300px;
            margin-bottom: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .chart-section {
            margin-top: 40px;
        }

        .chart-section h3 {
            margin-bottom: 30px;
        }

        .chart-section .col-md-6 {
            margin-bottom: 20px;
        }

        .request-type-section {
            margin-top: 40px;
        }

        .request-type-card {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-bottom: 20px;
            position: relative;
        }

        .request-type-card h4 {
            margin-top: 15px;
            margin-bottom: 10px;
            font-size: 1.5rem;
            color: #2050a8;
            animation: slideInFromLeft 1s forwards;
        }

        .request-type-card p {
            font-size: 1rem;
            color: #333;
            animation: fadeInUp 1.5s forwards;
        }

        .description-container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            height: 300px; /* Adjust height as needed */
        }

        .description-container h4 {
            margin-bottom: 20px;
            font-size: 1.25rem;
            color: #2050a8;
        }

        .description-container p {
            font-size: 1rem;
            color: #333;
        }

        .welcome-section {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 1s forwards;
        }

        .welcome-section h3 {
            margin-bottom: 20px;
            color: #2050a8;
            animation: slideInFromLeft 1s forwards;
        }

        .welcome-section p {
            font-size: 1rem;
            color: #333;
        }

        .welcome-section ul {
            list-style-type: disc;
            margin-left: 20px;
        }

        .animated-image {
            width: 100%;
            height: auto;
            margin-top: 20px;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 1s forwards;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInFromLeft {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>
</head>
<body>
    <h3 style="text-align: center; color:#2050a8; padding:20px; " class="font-semibold fs-2 custom-header text-gray-800 leading-tight">
        {{ __('WELCOME TO OUR REQUEST MANAGEMENT SYSTEM') }}
    </h3>

    <!-- Animated Image Before Welcome Section -->
    <img src="{{ asset('images/support.jpg') }}" alt="Maintenance Image" class="animated-image">

    <!-- Welcome Section -->
    <div class="welcome-section">
        <p>
            Welcome to our Request Management System! This platform simplifies the process of submitting, tracking, and resolving service requests, ensuring efficient communication and timely solutions for all your maintenance needs.
        </p>
        <p>
            <strong>Key Features:</strong>
        </p>
        <ul>
            <li>Easily submit and track service requests.</li>
            <li>Efficiently manage user and technician information.</li>
            <li>Receive real-time updates and notifications on request status.</li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="container mt-5">
        <!-- Request Types Overview -->
        <div class="container mt-5">
            <div class="request-type-section">
                <h3 class="text-center mb-4">Request Types Overview</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="request-type-card">
                            <h4>Printer Problem</h4>
                            <p>Issues related to printer functionality, including paper jams, connectivity problems, and printing errors.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="request-type-card">
                            <h4>Computer Hardware</h4>
                            <p>Problems with physical components of computers, such as hard drives, RAM, or motherboards.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="request-type-card">
                            <h4>Computer Software</h4>
                            <p>Issues with software applications, including crashes, errors, and compatibility problems.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="request-type-card">
                            <h4>Application Issue</h4>
                            <p>Problems related to specific applications or programs, including installation and functionality issues.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="request-type-card">
                            <h4>Network Issue</h4>
                            <p>Issues related to network connectivity, including slow speeds, outages, and configuration problems.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="request-type-card">
                            <h4>Password Issue</h4>
                            <p>Problems with passwords, including forgotten passwords, account lockouts, and reset requests.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
