<x-guest-layout>
    <style>
        body {
            background-color: #2050a8;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .background {
            width: 400px; /* Increased width */
            height: 400px; /* Increased height */
            position: absolute;
            transform: translate(-50%, -50%);
            left: 50%;
            top: 50%;
        }
        .background .shape {
            height: 180px; /* Increased size */
            width: 180px; /* Increased size */
            position: absolute;
            border-radius: 50%;
        }
        .shape:first-child {
            background: linear-gradient(#1845ad, #23a2f6);
            left: -80px; /* Adjusted position */
            top: -95px;  /* Adjusted position */
        }
        .shape:last-child {
            background: linear-gradient(to right, #ff512f, #f09819);
            right: -65px; /* Adjusted position */
            bottom: -95px; /* Adjusted position */
        }
        form {
            /* height: auto; */
            height: 550px;
            width: 400px; /* Increased width */
            background-color: rgba(255, 255, 255, 0.2);
            position: absolute;
            transform: translate(-50%, -50%);
            top: 50%;
            left: 50%;
            border-radius: 8px;
            backdrop-filter: blur(8px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 30px rgba(8, 7, 16, 0.6);
            padding: 40px 30px;
            box-sizing: border-box;
        }
        form h3 {
            font-size: 24px;
            font-weight: 600;
            line-height: 32px;
            text-align: center;
            color: #ffffff;
            margin-bottom: 20px;
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
            color: #000000;
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
            margin-top: 20px;
            width: 100%;
            background-color: #ffffff;
            color: #000000;
            padding: 12px 0;
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
        .already-registered {
            margin-top: 20px;
            text-align: center;
        }
        .already-registered a {
            color: #ffffff;
            font-size: 12px;
            text-decoration: underline;
            transition: color 0.3s ease;
        }
        .already-registered a:hover {
            color: #ff512f;
        }
    </style>

    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <h3>Welcome</h3>

        <label for="name">Name</label>
        <input id="name" type="text" name="name" placeholder="Enter your name" value="{{ old('name') }}" required autofocus autocomplete="name">

        <label for="email">Email</label>
        <input id="email" type="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required autocomplete="username">

        <label for="password">Password</label>
        <input id="password" type="password" name="password" placeholder="Enter your password" required autocomplete="new-password">

        <label for="password_confirmation">Confirm Password</label>
        <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm your password" required autocomplete="new-password">

        <button type="submit">Register</button>

        <div class="already-registered">
            <a href="{{ route('login') }}">{{ __('Already registered?') }}</a>
        </div>
    </form>
</x-guest-layout>
