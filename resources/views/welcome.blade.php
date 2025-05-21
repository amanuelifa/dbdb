<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>REAL-TIME REQUEST MANAGEMENT</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #0766AD;   /* Strong Blue */
            --secondary-color: #428BCA; /* Slightly Lighter Blue */
            --text-primary: #2E3A59;    /* Dark Grayish Blue for readability */
            --text-secondary: #5E7294;  /* Medium Grayish Blue for descriptions */
            --accent-color: #8EA7E9;    /* Light Blue Accent */
            --background-light: #F7FAFC; /* Very Light Gray Background */
            --gradient-primary: linear-gradient(135deg, var(--background-light) 0%, var(--accent-color) 70%); /* Soft Background Gradient */
            --gradient-button: linear-gradient(to right, var(--primary-color) 0%, var(--secondary-color) 100%); /* Engaging Button Gradient */
            --box-shadow-light: 0 0.5rem 1rem rgba(0, 0, 0, 0.08);
            --box-shadow-medium: 0 0.75rem 1.5rem rgba(0, 0, 0, 0.1);
        }

        body {
            margin: 0;
            font-family: 'Figtree', sans-serif;
            background: var(--gradient-primary);
            color: var(--text-primary);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        h1 {
            font-size: 3rem;
            color: var(--text-primary);
            font-weight: 600; /* Slightly less bold for a smoother feel */
            text-align: left;
            margin-top: 10vh;
            padding-left: 6vw;
            line-height: 1.4;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.05);
            animation: fadeInUp 0.8s ease-out;
        }

        .system-description {
            font-size: 1.1rem;
            color: var(--text-secondary);
            text-align: left;
            padding-left: 6vw;
            margin-bottom: 2.5rem;
            font-style: normal;
            line-height: 1.7;
            animation: fadeInUp 1s ease-out 0.2s;
            opacity: 0;
            animation-fill-mode: forwards;
        }

        .get-in-btn {
            display: inline-block;
            margin-left: 6vw;
            background: var(--gradient-button);
            border: none;
            color: var(--background-light);
            border-radius: 0.5rem;
            padding: 1rem 2rem;
            font-size: 1.1rem;
            font-weight: 500;
            text-align: center;
            text-decoration: none;
            transition: background 0.3s ease, box-shadow 0.3s ease, transform 0.2s ease;
            cursor: pointer;
            box-shadow: var(--box-shadow-medium);
            animation: slideInLeft 0.8s ease-out 0.4s;
            opacity: 0;
            animation-fill-mode: forwards;
        }

        .get-in-btn:hover {
            box-shadow: 0 0.75rem 1.25rem rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }

        .get-in-btn:active {
            box-shadow: var(--box-shadow-light);
            transform: translateY(0);
            filter: brightness(95%);
        }

        .image-container {
            text-align: center;
            margin-top: 2rem;
            animation: fadeIn 1s ease-out;
        }

        .image-container img {
            max-width: 85%;
            height: auto;
            border-radius: 0.75rem;
            box-shadow: var(--box-shadow-light);
            animation: tiltImage 1.5s ease-in-out infinite alternate;
        }

        footer {
            width: 100%;
            text-align: center;
            font-size: 0.9rem;
            color: var(--text-secondary);
            padding: 1.5rem 0;
            margin-top: auto;
            background-color: var(--background-light);
            border-top: 1px solid #E0E6ED;
        }

        footer span {
            color: var(--primary-color);
            font-weight: 500;
        }

        /* Keyframe Animations */
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

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes tiltImage {
            0% {
                transform: rotate(0.5deg);
            }
            100% {
                transform: rotate(-0.5deg);
            }
        }

        /* Media Queries for Responsiveness */
        @media (max-width: 1200px) {
            h1 {
                font-size: 2.7rem;
                padding-left: 5vw;
            }
            .system-description {
                font-size: 1rem;
                padding-left: 5vw;
            }
            .get-in-btn {
                margin-left: 5vw;
                font-size: 1rem;
                padding: 0.9rem 1.8rem;
            }
        }

        @media (max-width: 992px) {
            .col-lg-6 {
                display: flex;
                flex-direction: column;
                align-items: center;
                text-align: center;
            }
            h1 {
                font-size: 2.4rem;
                margin-top: 6vh;
                padding-left: 0;
            }
            .system-description {
                font-size: 0.95rem;
                padding-left: 0;
                margin-bottom: 2rem;
            }
            .get-in-btn {
                margin-left: 0;
                font-size: 0.95rem;
                padding: 0.8rem 1.6rem;
            }
            .image-container {
                margin-top: 2rem;
            }
            .image-container img {
                max-width: 75%;
            }
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
                margin-top: 5vh;
            }
            .system-description {
                font-size: 0.9rem;
                margin-bottom: 1.5rem;
            }
            .image-container img {
                max-width: 90%;
            }
        }

        @media (max-width: 576px) {
            h1 {
                font-size: 1.7rem;
            }
            .system-description {
                font-size: 0.8rem;
                margin-bottom: 1rem;
            }
            .get-in-btn {
                font-size: 0.9rem;
                padding: 0.7rem 1.4rem;
            }
            footer {
                font-size: 0.8rem;
            }
            .image-container img {
                max-width: 95%;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <h1>Streamline Your Operations with Real-Time Request Management</h1>
                <p class="system-description">Efficiently manage and track service requests in real-time, improving response times and overall productivity. Our intuitive system ensures seamless communication and task management.</p>
                <a href="{{ auth()->check() ? route('dashboard') : route('login') }}" class="get-in-btn">
                    Get Started Now
                </a>
            </div>
            <div class="col-lg-6 image-container">
                <img src="{{ asset('images/home.png') }}" alt="Request Management System Interface">
            </div>
        </div>
    </div>
    <!-- <footer class="bg-light text-muted py-3 mt-auto">
        <div class="container text-center">
            <span class="text-sm">&copy; {{ date('Y') }} Real-Time Request Management. All rights reserved.</span>
        </div>
    </footer> -->
</body>
</html>