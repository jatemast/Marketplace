<nav x-data="{ open: false }" class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-700 shadow-lg text-gray-300">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center space-x-4">
                <!-- Logo -->
                <div class="shrink-0">
                    <a href="{{ route('dashboard') }}" class="flex items-center text-white hover:text-gray-400 transition-colors duration-300">
                        <x-application-mark class="block h-9 w-auto" />
                        <span class="ml-2 text-2xl font-extrabold tracking-wider">Jamb</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden sm:flex space-x-8">
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" class="text-sm font-semibold text-gray-300 hover:bg-gray-700 hover:text-white px-4 py-2 rounded-lg transition duration-300">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex items-center space-x-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="relative">
                        <x-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <button class="flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-lg bg-gray-800 hover:bg-gray-700 text-white transition duration-300">
                                    {{ Auth::user()->currentTeam->name }}
                                    <svg class="ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15M8.25 9L12 5.25 15.75 9" />
                                    </svg>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Team') }}
                                </div>
                                <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" class="hover:bg-gray-600 hover:text-gray-300">
                                    {{ __('Team Settings') }}
                                </x-dropdown-link>
                                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                    <x-dropdown-link href="{{ route('teams.create') }}" class="hover:bg-gray-600 hover:text-gray-300">
                                        {{ __('Create New Team') }}
                                    </x-dropdown-link>
                                @endcan
                                @if (Auth::user()->allTeams()->count() > 1)
                                    <div class="border-t border-gray-600"></div>
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Switch Teams') }}
                                    </div>
                                    @foreach (Auth::user()->allTeams() as $team)
                                        <x-switchable-team :team="$team" />
                                    @endforeach
                                @endif
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex items-center space-x-2">
                                    <img class="h-8 w-8 rounded-full object-cover border-2 border-gray-600" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <button class="flex items-center px-3 py-2 text-sm font-medium rounded-lg bg-gray-800 hover:bg-gray-700 text-white transition duration-300">
                                    {{ Auth::user()->name }}
                                    <svg class="ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </button>
                            @endif
                        </x-slot>
                        <x-slot name="content">
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>
                            <x-dropdown-link href="{{ route('productos.create') }}" class="hover:bg-gray-600 hover:text-gray-300">
                                <i class="fas fa-box-open mr-2"></i>{{ __('Registrar Artículos') }}
                            </x-dropdown-link>
                            <x-dropdown-link href="{{ route('historial.compras') }}" class="hover:bg-gray-600 hover:text-gray-300">
                                <i class="fas fa-history mr-2"></i>{{ __('Historial de compras') }}
                            </x-dropdown-link>
                            <x-dropdown-link href="{{ route('user-management.index') }}" class="hover:bg-gray-600 hover:text-gray-300">
                                <i class="fas fa-users-cog mr-2"></i>{{ __('Administrar Usuarios') }}
                            </x-dropdown-link>
                            <x-dropdown-link href="{{ route('profile.show') }}" class="hover:bg-gray-600 hover:text-gray-300">
                                <i class="fas fa-user-circle mr-2"></i>{{ __('Profile') }}
                            </x-dropdown-link>
                            <div class="border-t border-gray-600"></div>
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();" class="hover:bg-gray-600 hover:text-gray-300">
                                    <i class="fas fa-sign-out-alt mr-2"></i>{{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-gray-400 hover:bg-gray-700 focus:bg-gray-700 transition-colors duration-200 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-gray-800">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" class="block text-white hover:bg-gray-700 px-3 py-2 rounded-md text-base font-medium transition duration-300">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-600">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover border-2 border-gray-600" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif
                <div>
                    <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-400">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
            <x-responsive-nav-link href="{{ route('productos.create') }}" :active="request()->routeIs('productos.create')" class="block text-white hover:bg-gray-700 px-3 py-2 rounded-md text-base font-medium transition duration-300">
                    {{ __('Registrar Artículos') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('historial.compras') }}" :active="request()->routeIs('historial.compras')" class="block text-white hover:bg-gray-700 px-3 py-2 rounded-md text-base font-medium transition duration-300">
                    {{ __('Historial de compras') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('user-management.index') }}" :active="request()->routeIs('user-management.index')" class="block text-white hover:bg-gray-700 px-3 py-2 rounded-md text-base font-medium transition duration-300">
                    {{ __('Administrar Usuarios') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')" class="block text-white hover:bg-gray-700 px-3 py-2 rounded-md text-base font-medium transition duration-300">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();" class="block text-white hover:bg-gray-700 px-3 py-2 rounded-md text-base font-medium transition duration-300">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
