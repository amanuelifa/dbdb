<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Maintenance Management System') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f0f0;
            color: #333;
            line-height: 1.7;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            overflow-x: hidden; /* Prevent horizontal scrollbar */
        }
        .navbar-custom {
            background-color: #007bff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .navbar-custom .navbar-brand, .navbar-custom .nav-link {
            color: #ffffff;
            font-weight: 600;
        }
        .navbar-custom .nav-link:hover {
            color: #e0f7fa;
        }
        .custom-header {
            color: #2c3e50;
            padding: 2.5rem 0;
            text-align: center;
            font-weight: 700;
            letter-spacing: -0.02em;
            line-height: 1.2;
            animation: fadeIn 1s ease-in-out, slideInDown 0.5s ease-out;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        @keyframes slideInDown {
            from {
                transform: translateY(-50px);
            }
            to {
                transform: translateY(0);
            }
        }
        .footer {
            background-color: #2c3e50;
            color: #fff;
            text-align: center;
            padding: 1.5rem 0;
            margin-top: auto;
            font-size: 0.9rem;
        }
        .footer a {
            color: #a0aec0;
            text-decoration: none;
            transition: color 0.3s ease-in-out;
        }
        .footer a:hover {
            color: #fff;
            text-decoration: underline;
        }
        .chart-container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin-bottom: 2.5rem;
        }
        .chart-section {
            margin-top: 3rem;
        }
        .chart-section h3 {
            color: #2c3e50;
            margin-bottom: 2rem;
            text-align: center;
            font-size: 2.25rem;
            font-weight: 600;
            letter-spacing: -0.02em;
            line-height: 1.3;
        }
        .chart-section .col-md-6 {
            margin-bottom: 2rem;
        }
        .request-type-section {
            margin-top: 3rem;
        }
        .request-type-section h3 {
            color: #2c3e50;
            margin-bottom: 2rem;
            text-align: center;
            font-size: 2.25rem;
            font-weight: 600;
            letter-spacing: -0.02em;
            line-height: 1.3;
            animation: fadeIn 1s ease-in-out, slideInLeft 0.5s ease-out;
        }
        @keyframes slideInLeft {
            from {
                transform: translateX(-50px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .request-type-card {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-bottom: 2rem;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            border-left: 5px solid #007bff;
            animation: fadeIn 1s ease-in-out, zoomIn 0.5s ease-out;
        }
        .request-type-card:hover {
            transform: translateY(-8px) scale(1.05);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }
        @keyframes zoomIn {
            from {
                transform: scale(0);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }
        .request-type-card h4 {
            color: #007bff;
            margin-top: 1.25rem;
            margin-bottom: 1rem;
            font-size: 1.5rem;
            font-weight: 600;
            line-height: 1.2;
        }
        .request-type-card p {
            color: #555;
            font-size: 1rem;
            line-height: 1.7;
        }
        .description-container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            height: auto;
            margin-bottom: 2.5rem;
            animation: fadeIn 1s ease-in-out;
        }
        .description-container h4 {
            color: #2c3e50;
            margin-bottom: 1.5rem;
            font-size: 1.25rem;
            font-weight: 600;
            line-height: 1.2;
        }
        .description-container p {
            color: #555;
            font-size: 1rem;
            line-height: 1.7;
        }
        .welcome-section {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 2.5rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-top: 2.5rem;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 1s forwards;
            border-left: 5px solid #2ecc71;
        }
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
        .welcome-section h3 {
            color: #2ecc71;
            margin-bottom: 2rem;
            font-size: 2rem;
            font-weight: 600;
            line-height: 1.2;
            text-align: left;
            animation: fadeIn 1s ease-in-out, slideInRight 0.5s ease-out;
        }
        @keyframes slideInRight {
            from {
                transform: translateX(50px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        .welcome-section p {
            color: #555;
            font-size: 1.1rem;
            line-height: 1.8;
            margin-bottom: 1.5rem;
            animation: fadeIn 1s ease-in-out, slideIn 0.5s ease-out;
        }
        @keyframes slideIn {
            from{
                opacity: 0;
            }
            to{
                opacity: 1;
            }
        }
        .welcome-section ul {
            list-style-type: disc;
            margin-left: 1.5rem;
            padding-left: 0;
            animation: fadeIn 1s ease-in-out;
        }
        .welcome-section li {
            color: #555;
            font-size: 1.1rem;
            margin-bottom: 0.75rem;
            line-height: 1.8;
            animation: fadeIn 1s ease-in-out;
        }
        .animated-image {
            width: 100%;
            height: auto;
            margin-top: 2.5rem;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 1s forwards 0.5s, pulse 2s infinite alternate;
        }
        @keyframes pulse {
            from {
                transform: translateY(20px) scale(1);
                opacity: 0.7;
            }
            to {
                transform: translateY(20px) scale(1.05);
                opacity: 1;
            }
        }
        .system-features-section {
            margin-top: 3rem;
            padding: 2rem;
            background-color: #f8f9fa;
            border-radius: 10px;
        }

        .system-features-section h3 {
            color: #2c3e50;
            margin-bottom: 2rem;
            text-align: center;
            font-size: 2.25rem;
            font-weight: 600;
            letter-spacing: -0.02em;
            line-height: 1.3;
        }

        .system-features-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .system-features-list li {
            background-color: #ffffff;
            padding: 1.5rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            border-left: 5px solid #28a745;
        }

        .system-features-list li:hover {
            transform: translateY(-8px) scale(1.03);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }

        .system-features-list li h4 {
            color: #28a745;
            font-size: 1.5rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .system-features-list li p {
            color: #555;
            font-size: 1rem;
            line-height: 1.7;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="welcome-section">
            <h3>{{ __('Welcome to Our Support Center') }}</h3>
            <p>
                {{ __('We\'re here to help you with any issues or requests you may have. Our real-time request management system is designed to provide you with efficient and timely support.') }}
            </p>
            <p>
                {{ __('Key Features and Benefits:') }}
            </p>
            <ul>
                <li>{{ __('Submit requests quickly and easily.') }}</li>
                <li>{{ __('Track the progress of your requests in real-time.') }}</li>
                <li>{{ __('Get instant notifications and updates.') }}</li>
            </ul>
            <p>{{ __('Get started by browsing the common request categories below, or submit a new request.') }}</p>
        </div>
    </div>

    <div class="container mt-5">
        <div class="request-type-section">
            <h3 class="mb-4">{{ __('Common Request Categories') }}</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="request-type-card">
                        <h4>{{ __('Password Issue') }}</h4>
                        <p>{{ __('Trouble with your password? Let us help you regain access.') }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="request-type-card">
                        <h4>{{ __('Hardware Issue') }}</h4>
                        <p>{{ __('Experiencing problems with physical components? Report it here.') }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="request-type-card">
                        <h4>{{ __('Software Issue') }}</h4>
                        <p>{{ __('Encountering errors or malfunctions in applications? Let us know.') }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="request-type-card">
                        <h4>{{ __('Network Issue') }}</h4>
                        <p>{{ __('Problems with connectivity or internet access? We\'re on it.') }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="request-type-card">
                        <h4>{{ __('Power Issue') }}</h4>
                        <p>{{ __('Dealing with power-related problems affecting your work? Report it here.') }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="request-type-card">
                        <h4>{{ __('Bug Report') }}</h4>
                        <p>{{ __('Found a glitch or unexpected behavior in the system? Help us squash it!') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="system-features-section">
            <h3 class="mb-4">{{ __('Key System Features') }}</h3>
            <ul class="system-features-list">
                <li>
                    <h4>{{ __('Efficient Request Management') }}</h4>
                    <p>{{ __('Our system allows you to submit, track, and manage your requests from start to finish, ensuring a smooth and efficient resolution process.') }}</p>
                </li>
                <li>
                    <h4>{{ __('Real-Time Updates and Notifications') }}</h4>
                    <p>{{ __('Stay informed with instant updates and notifications about the status of your requests, so you\'re never left in the dark.') }}</p>
                </li>
                <li>
                    <h4>{{ __('Comprehensive Knowledge Base') }}</h4>
                    <p>{{ __('Access a wealth of resources and solutions to common issues, empowering you to resolve problems quickly on your own.') }}</p>
                </li>
                <li>
                    <h4>{{ __('User-Friendly Interface') }}</h4>
                    <p>{{ __('Enjoy a clean, intuitive, and easy-to-use interface that makes navigating the system and submitting requests a breeze.') }}</p>
                </li>
                 <li>
                    <h4>{{ __('24/7 Accessibility') }}</h4>
                    <p>{{ __('Our system is available around the clock, allowing you to submit and track requests anytime, anywhere.') }}</p>
                </li>
            </ul>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
