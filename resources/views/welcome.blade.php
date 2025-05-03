<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MAINTENANCE MANAGEMENT SYSTEM</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Iconic Icons CSS -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" rel="stylesheet"> -->

    <!-- Custom CSS -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: white;
            color: #000;
            font-family: 'Figtree', sans-serif;
            height: 100vh;
            margin: 0;
            position: relative;
        }

        h1 {
            font-size: 3.5rem;
            color: #000;
            font-weight: 700;
            text-align: left;
            margin-top: 10vh;
            padding-left: 5vw;
        }

        .quote {
            font-size: 1.25rem;
            color: #6c757d;
            text-align: left;
            padding-left: 5vw;
            margin-bottom: 40px;
        }

        .get-in-btn {
            display: block;
            margin-left: 5vw;
            background-color: #2050a8;
            border: 2px solid #2050a8;
            color: #ffffff;
            border-radius: 50px;
            padding: 12px 30px;
            font-size: 1.2rem;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s ease;
            cursor: pointer;
        }

        .get-in-btn:hover {
            background-color: #ffffff;
            border: 2px solid #2050a8;
            color: #2050a8;
        }

        .image-section {
            text-align: center;
        }

        .image-section img {
            max-width: 90%;
            height: auto;
        }

        footer {
            position: absolute;
            bottom: 10px;
            width: 100%;
            text-align: center;
            font-size: 0.9rem;
            color: #6c757d;
        }
        
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <h1>REAL-TIME REQUEST MANAGEMENT SYSTEM</h1>
                <p class="quote">"Streamline your workflow and resolve issues faster with a seamless Request Management System."</p>
                <a href="{{ auth()->check() ? route('dashboard') : route('login') }}" class="get-in-btn">
    Get Started
</a>

            </div>
            <div class="col-lg-6 image-section">
                <img src="{{ asset('images/sh.png') }}" alt="Illustration">
            </div>
        </div>
    </div>

    <footer>
    <marquee behavior="scroll" direction="left" >
    We’re delighted to have you here. Our platform is designed to streamline and simplify the process of managing requests, ensuring that tasks are efficiently tracked and addressed. Whether you’re submitting a new request or overseeing resources, our system equips you with the tools and insights you need to keep everything running smoothly. Thank you for choosing our solution to support your request management needs!        </marquee>
     <span style="color: #000;">   &copy; {{ date('Y') }} Real-Time Request Management System. All rights reserved.</span>
    </footer>

    <!-- Bootstrap JS (optional) -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>
