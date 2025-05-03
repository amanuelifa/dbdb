<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Maintenance Management System</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

    <style>
        *,
        *::before,
        *::after {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body {
            background-color: #2050a8;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #ffffff;
        }
        .background {
            width: 350px;
            height: 400px;
            position: absolute;
            transform: translate(-50%, -50%);
            left: 50%;
            top: 50%;
        }
        .background .shape {
            height: 150px;
            width: 150px;
            position: absolute;
            border-radius: 50%;
        }
        .shape:first-child {
            background: linear-gradient(#1a3c6c, #1c6ca8);
            left: -60px;
            top: -80px;
        }
        .shape:last-child {
            background: linear-gradient(to right, #ff512f, #f09819);
            right: -50px;
            bottom: -90px;
        }
        .form-container {
            height: auto; /* Increased height */
            width: 360px; /* Increased width */
            background-color: rgba(255, 255, 255, 0.2);
            position: absolute;
            transform: translate(-50%, -50%);
            top: 50%;
            left: 50%;
            border-radius: 8px;
            backdrop-filter: blur(8px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 30px rgba(8, 7, 16, 0.6);
            padding: 50px 30px; /* Increased padding */
            box-sizing: border-box;
        }
        .form-container * {
            color: #ffffff;
            letter-spacing: 0.5px;
            outline: none;
            border: none;
        }
        .form-container h3 {
            font-size: 24px;
            font-weight: 500;
            line-height: 32px;
            text-align: center;
            color: #ffffff;
        }
        label {
            display: block;
            margin-top: 20px;
            font-size: 14px;
            font-weight: 500;
            color: #ffffff;
        }
        input {
            display: block;
            height: 40px;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.15);
            border-radius: 5px;
            padding: 0 10px;
            margin-top: 8px;
            font-size: 12px;
            font-weight: 300;
            color: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: border-color 0.3s;
        }
        input:focus {
            border-color: #ffffff;
            outline: none;
            box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.2);
        }
        ::placeholder {
            color: #e5e5e5;
        }
        button {
            margin-top: 20px; /* Adjusted margin */
            width: 100%;
            background-color: #ffffff;
            color: #000000;
            padding: 12px 0; /* Adjusted padding */
            font-size: 16px;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s, color 0.3s;
        }
        button:hover {
            background-color: #e5e5e5;
            color: #000000;
        }
        .remember-me {
            display: flex;
            align-items: center;
            margin-top: 15px; /* Adjusted margin */
        }
        .remember-me input[type="checkbox"] {
            width: 15px;
            height: 15px;
            margin-right: 8px;
            cursor: pointer;
            accent-color: #ffffff;
            transition: background-color 0.3s, transform 0.3s;
        }
        .remember-me input[type="checkbox"]:checked {
            background-color: #ffffff;
            transform: scale(1.1);
        }
        .remember-me span {
            font-size: 12px;
            color: #ffffff;
        }
        .forgot-password {
            display: block;
            margin-top: 20px; /* Adjusted margin */
            text-align: center;
        }
        .forgot-password a,
        .no-account a {
            font-size: 12px;
            color: #e5e5e5;
            text-decoration: none;
        }
        .forgot-password a:hover,
        /* .no-account a:hover {
            color: #ffffff;
        }
        .no-account {
            display: block;
            margin-top: 10px; /* Adjusted margin */
            /* text-align: center; */
        /* }  */

        .no-account {
            margin-top: 20px;
            text-align: center;
        }
        .no-account a {
            color: #ffffff;
            font-size: 12px;
            text-decoration: underline;
            transition: color 0.3s ease;
        }
        .no-account a:hover {
            color: #ff512f;
        }
    </style>
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <div class="form-container">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h3>Welcome</h3>

            <!-- Display validation errors -->
            <x-validation-errors class="mb-4" />

            <!-- Display session status -->
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <label for="email">Email</label>
            <input id="email" type="email" name="email" :value="old('email')" required autofocus placeholder="Email" />

            <label for="password">Password</label>
            <input id="password" type="password" name="password" required placeholder="Password" />

            <!-- <div class="remember-me">
                <input id="remember_me" type="checkbox" name="remember" />
                <span>{{ __('Remember me') }}</span>
            </div> -->

            <button type="submit" style="color: #000000;">{{ __('Log In') }}</button>

            <!-- <div class="forgot-password">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                @endif
            </div> -->

            <div class="no-account">
                <a href="{{ route('register') }}">I don't have an account</a>
            </div>
        </form>
    </div>
</body>
</html>
