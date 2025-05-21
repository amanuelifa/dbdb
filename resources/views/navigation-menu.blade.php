<div>
    <nav x-data="{ open: false }" class="bg-blue-900 border-b border-gray-100" style="background-color: #985988;">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Common Navigation Links -->
                    <div class="hidden space-x-2 sm:-my-px sm:ms-5 sm:flex">
                        <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                            <button class="btn" style="text-decoration: none; font-weight: bold; color: white; padding: 12px 20px; font-size: 16px;">
                                {{ __('Dashboard') }}
                            </button>
                        </x-nav-link>
                    </div>

                    <!-- Admin-Specific Links -->
                    @if(Auth::user()->usertype == 'admin')
                        <div class="hidden space-x-2 sm:-my-px sm:ms-5 sm:flex">
                            <x-nav-link href="{{ route('employee') }}" :active="request()->routeIs('employee')">
                                <button class="btn" style="text-decoration: none; font-weight: bold; color: white; padding: 12px 20px; font-size: 16px;">
                                    {{ __('Employee') }}
                                </button>
                            </x-nav-link>
                        </div>
                       
                     
                        <!-- <div class="hidden space-x-2 sm:-my-px sm:ms-5 sm:flex">
                            <x-nav-link href="{{ route('reportforadmin') }}" :active="request()->routeIs('reportforadmin')">
                                <button class="btn" style="text-decoration: none; font-weight: bold; color: white; padding: 12px 20px; font-size: 16px;">
                                    {{ __('Report') }}
                                </button>
                            </x-nav-link>
                        </div> -->
                        <div class="hidden space-x-2 sm:-my-px sm:ms-5 sm:flex">
                            <x-nav-link href="{{ route('requestsofuser') }}" :active="request()->routeIs('requestsofuser')">
                                <button class="btn" style="text-decoration: none; font-weight: bold; color: white; padding: 12px 20px; font-size: 16px;">
                                    {{ __('Requests of User') }}
                                </button>
                            </x-nav-link>
                        </div>
                        <div class="hidden space-x-2 sm:-my-px sm:ms-5 sm:flex">
                            <x-nav-link href="{{ route('requestsforadmin') }}" :active="request()->routeIs('requestsforadmin')">
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
                        <!-- <div class="hidden space-x-2 sm:-my-px sm:ms-5 sm:flex">
                            <x-nav-link href="{{ route('responsebytechnician') }}" :active="request()->routeIs('responsebytechnician')">
                                <button class="btn" style="text-decoration: none; font-weight: bold; color: white; padding: 12px 20px; font-size: 16px;">
                                    {{ __('Response by Technician') }}
                                </button>
                            </x-nav-link>
                        </div> -->
                        <!-- <div class="hidden space-x-2 sm:-my-px sm:ms-5 sm:flex">
                            <x-nav-link href="{{ route('department') }}" :active="request()->routeIs('department')">
                                <button class="btn" style="text-decoration: none; font-weight: bold; color: white; padding: 12px 20px; font-size: 16px;">
                                    {{ __('Department') }}
                                </button>
                            </x-nav-link>
                        </div> -->
                    @endif

                    <!-- Technician-Specific Links -->
                    @if(Auth::user()->usertype == 'technician')
                        <!-- <div class="hidden space-x-2 sm:-my-px sm:ms-5 sm:flex">
                            <x-nav-link href="{{ route('requestsofuser') }}" :active="request()->routeIs('requestsofuser')">
                                <button class="btn" style="text-decoration: none; font-weight: bold; color: white; padding: 12px 20px; font-size: 16px;">
                                    {{ __('Requests of User') }}
                                </button>
                            </x-nav-link>
                        </div> -->
                        <!-- <div class="hidden space-x-2 sm:-my-px sm:ms-5 sm:flex">
                            <x-nav-link href="{{ route('response') }}" :active="request()->routeIs('response')">
                                <button class="btn" style="text-decoration: none; font-weight: bold; color: white; padding: 12px 20px; font-size: 16px;">
                                    {{ __('Response') }}
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
                    @endif

                    <!-- User-Specific Links -->
                    @if(Auth::user()->usertype == 'user')
                        <div class="hidden space-x-2 sm:-my-px sm:ms-5 sm:flex">
                            <x-nav-link href="{{ route('request') }}" :active="request()->routeIs('request')">
                                <button class="btn" style="text-decoration: none; font-weight: bold; color: white; padding: 12px 20px; font-size: 16px;">
                                    {{ __('Submit Request') }}
                                </button>
                            </x-nav-link>
                        </div>
                        <div class="hidden space-x-2 sm:-my-px sm:ms-5 sm:flex">
                            <x-nav-link href="{{ route('responsebytechnician') }}" :active="request()->routeIs('responsebytechnician')">
                                <button class="btn" style="text-decoration: none; font-weight: bold; color: white; padding: 12px 20px; font-size: 16px;">
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
                   
                </div>


                <!-- Logout Button -->
                <div class="ml-auto">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn" style="color: white; padding: 12px 20px; font-weight: bold; font-size: 16px;">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>

                <!-- Profile Section (Right Corner) -->
               

                <!-- Hamburger -->
                <div class="-me-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>
</div>
