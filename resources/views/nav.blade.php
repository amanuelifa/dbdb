<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #2050a8;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="nav-item">
                <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    <button class="btn" style="color: white; padding: 12px 20px; font-weight: bold; font-size: 16px;">
                        {{ __('Dashboard') }}
                    </button>
                </x-nav-link>
            </div>
            @if(Auth::user()->usertype == 'admin')
                <div class="nav-item">
                    <x-nav-link href="{{ route('employee') }}" :active="request()->routeIs('employee')">
                        <button class="btn" style="color: white; padding: 12px 20px; font-weight: bold; font-size: 16px;">
                            {{ __('Employee') }}
                        </button>
                    </x-nav-link>
                </div>
                <div class="hidden space-x-2 sm:-my-px sm:ms-5 sm:flex">
                            <x-nav-link href="{{ route('requestsofuser') }}" :active="request()->routeIs('requestsofuser')">
                                <button class="btn" style="text-decoration: none; font-weight: bold; color: white; padding: 12px 20px; font-size: 16px;">
                                    {{ __('Requests of User') }}
                                </button>
                            </x-nav-link>
                        </div>
                <div class="nav-item">
                    <x-nav-link href="{{ route('requestsforadmin') }}" :active="request()->routeIs('requestsforadmin')">
                        <button class="btn" style="color: white; padding: 12px 20px; font-weight: bold; font-size: 16px;">
                            {{ __('Report') }}
                        </button>
                    </x-nav-link>
                </div>
                <div class="hidden space-x-2 sm:-my-px sm:ms-5 sm:flex">
                            <x-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                                <button class="btn" style="text-decoration: none; font-weight: bold; color: white; padding: 12px 20px; font-size: 16px;">
                                    {{ __('Profile') }}
                                </button>
                            </x-nav-link>
                        </div>
            @elseif(Auth::user()->usertype == 'technician')
                <!-- <div class="nav-item">
                    <x-nav-link href="{{ route('requestsofuser') }}" :active="request()->routeIs('requestsofuser')">
                        <button class="btn" style="color: white; padding: 12px 20px; font-weight: bold; font-size: 16px;">
                            {{ __('Requests of User') }}
                        </button>
                    </x-nav-link>
                </div> -->
                <div class="hidden space-x-2 sm:-my-px sm:ms-5 sm:flex">
                            <x-nav-link href="{{ route('responseforuser') }}" :active="request()->routeIs('responseforuser')">
                                <button class="btn" style="text-decoration: none; font-weight: bold; color: white; padding: 12px 20px; font-size: 16px;">
                                    {{ __('Response for user') }}
                                </button>
                            </x-nav-link>
                        </div>
                <div class="hidden space-x-2 sm:-my-px sm:ms-5 sm:flex">
                            <x-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                                <button class="btn" style="text-decoration: none; font-weight: bold; color: white; padding: 12px 20px; font-size: 16px;">
                                    {{ __('Profile') }}
                                </button>
                            </x-nav-link>
                        </div>
            @elseif(Auth::user()->usertype == 'user')
                <div class="nav-item">
                    <x-nav-link href="{{ route('request') }}" :active="request()->routeIs('request')">
                        <button class="btn" style="color: white; padding: 12px 20px; font-weight: bold; font-size: 16px;">
                            {{ __('Request') }}
                        </button>
                    </x-nav-link>
                </div>
                <div class="nav-item">
                    <x-nav-link href="{{ route('responsebytechnician') }}" :active="request()->routeIs('responsebytechnician')">
                        <button class="btn" style="color: white; padding: 12px 20px; font-weight: bold; font-size: 16px;">
                            {{ __('Response by Technician') }}
                        </button>
                    </x-nav-link>
                </div>
                <div class="hidden space-x-2 sm:-my-px sm:ms-5 sm:flex">
                            <x-nav-link href="{{ route('reportforuser') }}" :active="request()->routeIs('reportforuser')">
                                <button class="btn" style="text-decoration: none; font-weight: bold; color: white; padding: 12px 20px; font-size: 16px;">
                                    {{ __('Report') }}
                                </button>
                            </x-nav-link>
                        </div>
                        <div class="hidden space-x-2 sm:-my-px sm:ms-5 sm:flex">
                            <x-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                                <button class="btn" style="text-decoration: none; font-weight: bold; color: white; padding: 12px 20px; font-size: 16px;">
                                    {{ __('Profile') }}
                                </button>
                            </x-nav-link>
                        </div>
            @endif
            <div class="ml-auto">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn" style="color: white; padding: 12px 20px; font-weight: bold; font-size: 16px;">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </nav>
</header>
</body>
</html>
