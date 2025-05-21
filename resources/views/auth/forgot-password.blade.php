<x-guest-layout>
    <style>
        *,
        *::before,
        *::after {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f6f8; /* Light grey background */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #333; /* Dark grey text */
        }
        .auth-card {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 400px; /* Adjust width as needed */
            max-width: 90%;
        }
        .auth-logo {
            text-align: center;
            margin-bottom: 30px;
        }
        .auth-logo a {
            /* Style your logo image or text here */
            display: inline-block;
            font-size: 1.5rem;
            font-weight: 600;
            color: #2050a8; /* Primary color */
            text-decoration: none;
        }
        .auth-logo svg {
            /* Style the default Laravel logo if you are using it */
            width: 80px;
            height: 80px;
            fill: #2050a8;
        }
        .mb-4 {
            margin-bottom: 20px;
        }
        .text-sm {
            font-size: 0.9rem;
        }
        .text-gray-600 {
            color: #777;
            line-height: 1.6;
        }
        .font-medium {
            font-weight: 500;
        }
        .text-green-600 {
            color: #28a745; /* Success green */
        }
        .block {
            display: block;
        }
        .mt-1 {
            margin-top: 8px;
        }
        .w-full {
            width: 100%;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #555;
            font-size: 0.95rem;
        }
        input[type="email"] {
            display: block;
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }
        input[type="email"]:focus {
            border-color: #2050a8;
            outline: none;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }
        .flex {
            display: flex;
        }
        .items-center {
            align-items: center;
        }
        .justify-end {
            justify-content: flex-end;
        }
        .mt-4 {
            margin-top: 25px;
        }
        button {
            background-color: #2050a8;
            color: #fff;
            padding: 14px 20px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #1a4080;
        }
        .validation-errors {
            color: #dc3545; /* Error red color */
            font-size: 0.9rem;
            margin-bottom: 20px;
        }
        .validation-errors ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .validation-errors li {
            margin-bottom: 5px;
        }
    </style>

    <div class="auth-card">
       

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <label for="email">{{ __('Email') }}</label>
                <input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="Enter your email">
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit">
                    {{ __('Email Password Reset Link') }}
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>