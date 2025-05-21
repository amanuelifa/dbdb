<x-guest-layout>
    <style>
        /* Base styles */
        *,
        *::before,
        *::after {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #FFF2F2;
            display: flex; /* Use flexbox for centering */
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            min-height: 100vh;
            color: #0766AD;
            margin: 0;
        }
        .container {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 25px;
            width: 450px;
            max-width: 90%;
        }
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo i {
            font-size: 2rem;
            color: #28A745;
            margin-bottom: 6px;
        }
        .logo h2 {
            color: #0766AD;
            font-weight: 600;
            margin-bottom: 3px;
            font-size: 1.4rem;
        }
        .logo p {
            font-size: 0.85rem;
            color: #6C757D;
        }
        .form-group {
            margin-bottom: 18px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
            color: #343A40;
            font-size: 0.9rem;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            display: block;
            width: 100%;
            padding: 9px 11px;
            border: 1px solid #CED4DA;
            border-radius: 5px;
            font-size: 0.95rem;
            transition: border-color 0.3s ease;
        }
        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #28A745;
            outline: none;
            box-shadow: 0 1px 3px rgba(40, 167, 69, 0.25);
        }
        button[type="submit"] {
            background-color: #28A745;
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
            background-color: #1E7E34;
        }
        .already-registered {
            margin-top: 18px;
            text-align: center;
            font-size: 0.85rem;
            color: #6C757D;
        }
        .already-registered a {
            color: #007BFF;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .already-registered a:hover {
            color: #0056B3;
            text-decoration: underline;
        }
        .validation-errors {
            color: #DC3545;
            font-size: 0.8rem;
            margin-bottom: 10px;
        }
        .validation-errors ul {
            list-style: disc;
            padding-left: 18px;
        }
        .validation-errors li {
            margin-bottom: 3px;
        }
    </style>

    <div class="container">
        <div class="logo">
            <i class="fas fa-user-plus"></i>
            <h2>Create New Account</h2>
            <p class="lead">Please fill out the form to register.</p>
        </div>

        <form method="POST" action="{{ route('register') }}">
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

            <div class="form-group">
                <label for="name">Your Full Name</label>
                <input id="name" type="text" name="name" placeholder="Enter your full name" value="{{ old('name') }}" required autofocus autocomplete="name">
            </div>

            <div class="form-group">
                <label for="email">Your Email Address</label>
                <input id="email" type="email" name="email" placeholder="Enter a valid email address" value="{{ old('email') }}" required autocomplete="username">
            </div>

            <div class="form-group">
                <label for="password">Create Password</label>
                <input id="password" type="password" name="password" placeholder="Choose a strong password" required autocomplete="new-password">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Your Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Re-enter your password" required autocomplete="new-password">
            </div>

            <button type="submit">Sign Up</button>

            <div class="already-registered">
                <p>Already have an account? <a href="{{ route('login') }}">Log In</a></p>
            </div>
        </form>
    </div>
</x-guest-layout>
