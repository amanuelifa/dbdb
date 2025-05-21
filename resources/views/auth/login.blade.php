<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Maintenance Management System</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-color: #0766AD;  /* Strong Blue */
            --secondary-color: #428BCA; /* Slightly Lighter Blue */
            --accent-color: #E50FFF;       /* Bright Pink (Subtle Accents) */
            --light-color: #FFF2F2;     /* Very Light Pink (Background Base) */
            --text-primary: #333;       /* Dark Grey */
            --text-secondary: #666;     /* Medium Grey */
        }

        *,
        *::before,
        *::after {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Roboto', sans-serif;
            background-color: var(--light-color);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: var(--text-primary);
        }
        .container {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            padding: 40px;
            width: 400px;
            max-width: 90%;
        }
        .logo {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo i {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 10px;
        }
        .logo h2 {
            color: var(--primary-color);
            font-weight: 500;
            margin-bottom: 5px;
        }
        .logo p {
            font-size: 0.9rem;
            color: var(--text-secondary);
        }
        .form-group {
            margin-bottom: 25px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--text-primary);
            font-size: 0.95rem;
        }
        input[type="email"],
        input[type="password"] {
            display: block;
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: var(--secondary-color);
            outline: none;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }
        .remember-me {
            display: flex;
            align-items: center;
            margin-top: 15px;
            margin-bottom: 20px;
        }
        .remember-me input[type="checkbox"] {
            width: 18px;
            height: 18px;
            margin-right: 10px;
            cursor: pointer;
            accent-color: var(--secondary-color);
        }
        .remember-me label {
            margin-bottom: 0;
            font-size: 0.9rem;
            color: var(--text-primary);
        }
        button[type="submit"] {
            /* SIGN UP BUTTON STYLES  */
            background-color: #28A745; /* Professional green for signup button */
            color: #fff;
            padding: 11px 18px;
            border: none;
            border-radius: 5px;
            font-size: 0.95rem;
            font-weight: 500;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }
        button[type="submit"]:hover {
            background-color: #1E7E34; /* Darker green on hover */
        }
        .forgot-password {
            margin-top: 20px;
            text-align: right;
        }
        .forgot-password a,
        .no-account a {
            font-size: 0.9rem;
            color: var(--secondary-color);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .forgot-password a:hover,
        .no-account a:hover {
            color: var(--primary-color);
            text-decoration: underline;
        }
        .no-account {
            margin-top: 25px;
            text-align: center;
        }
        .validation-errors {
            color: var(--accent-color);
            font-size: 0.9rem;
            margin-bottom: 15px;
        }
        .session-status {
            color: #28a745;
            font-size: 0.9rem;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <i class="fas fa-user-lock"></i>
            <h2>Sign In</h2>
            <p>Welcome back! Please enter your credentials.</p>
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            @if ($errors->any())
                <div class="validation-errors">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('status'))
                <div class="session-status">
                    {{ session('status') }}
                </div>
            @endif

            <div class="form-group">
                <label for="email">Email Address</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="Your email address">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required placeholder="Your password">
            </div>

            <div class="remember-me">
                <input id="remember_me" type="checkbox" name="remember">
                <label for="remember_me">Keep me logged in</label>
            </div>

            <button type="submit">Sign In</button>

            <div class="forgot-password">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Forgot password?</a>
                @endif
            </div>

            <div class="no-account">
                <p>Don't have an account? <a href="{{ route('register') }}">Create one</a></p>
            </div>
        </form>
    </div>
</body>
</html>
