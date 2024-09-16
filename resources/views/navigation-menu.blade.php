<nav x-data="{ open: false }" class="text-gray-300 shadow-lg bg-gradient-to-r bg-amber-400 via-gray-800 to-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center space-x-4">
                <!-- Logo -->
                <div class="shrink-0">
                    <a href="{{ route('dashboard') }}" class="flex items-center text-white transition-colors duration-300 hover:text-gray-400">
                        <x-application-mark class="block w-auto h-9" />
                        <span class="ml-2 text-2xl font-extrabold tracking-wider">Jamb</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:flex">
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" class="px-4 py-2 text-sm font-semibold text-gray-300 transition duration-300 rounded-lg hover:bg-gray-700 hover:text-white">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="items-center hidden space-x-6 sm:flex">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures() && Auth::check())
                    @php
                        $user = Auth::user();
                        $currentTeam = $user->currentTeam ?? null;
                        $allTeams = $user->allTeams() ?? collect();
                    @endphp
                    <div class="relative">
                        <x-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <button class="flex items-center px-3 py-2 text-sm font-medium leading-4 text-white transition duration-300 bg-gray-800 rounded-lg hover:bg-gray-700">
                                    {{ $currentTeam->name ?? 'No Team' }}
                                    <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15M8.25 9L12 5.25 15.75 9" />
                                    </svg>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Team') }}
                                </div>
                                @if ($currentTeam)
                                    <x-dropdown-link href="{{ route('teams.show', $currentTeam->id) }}" class="hover:bg-gray-600 hover:text-gray-300">
                                        {{ __('Team Settings') }}
                                    </x-dropdown-link>
                                @endif
                                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                    <x-dropdown-link href="{{ route('teams.create') }}" class="hover:bg-gray-600 hover:text-gray-300">
                                        {{ __('Create New Team') }}
                                    </x-dropdown-link>
                                @endcan
                                @if ($allTeams->count() > 1)
                                    <div class="border-t border-gray-600"></div>
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Switch Teams') }}
                                    </div>
                                    @foreach ($allTeams as $team)
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
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos() && Auth::check())
                                <button class="flex items-center space-x-2">
                                    <img class="object-cover w-8 h-8 border-2 border-gray-600 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <button class="flex items-center px-3 py-2 text-sm font-medium text-white transition duration-300 bg-gray-800 rounded-lg hover:bg-gray-700">
                                    {{ Auth::user()->name ?? 'Guest' }}
                                    <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
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
                                <i class="mr-2 fas fa-box-open"></i>{{ __('Registrar Artículos') }}
                            </x-dropdown-link>
                            <x-dropdown-link href="{{ route('historial.compras') }}" class="hover:bg-gray-600 hover:text-gray-300">
                                <i class="mr-2 fas fa-history"></i>{{ __('Historial de compras') }}
                            </x-dropdown-link>
                            <x-dropdown-link href="{{ route('user-management.index') }}" class="hover:bg-gray-600 hover:text-gray-300">
                                <i class="mr-2 fas fa-users-cog"></i>{{ __('Administrar Usuarios') }}
                            </x-dropdown-link>
                            <x-dropdown-link href="{{ route('profile.show') }}" class="hover:bg-gray-600 hover:text-gray-300">
                                <i class="mr-2 fas fa-user-circle"></i>{{ __('Profile') }}
                            </x-dropdown-link>
                            <div class="border-t border-gray-600"></div>
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();" class="hover:bg-gray-600 hover:text-gray-300">
                                    <i class="mr-2 fas fa-sign-out-alt"></i>{{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="flex items-center -mr-2 sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 text-white transition-colors duration-200 ease-in-out rounded-md hover:text-gray-400 hover:bg-gray-700 focus:bg-gray-700">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden bg-gray-800 sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" class="block px-3 py-2 text-base font-medium text-white transition duration-300 rounded-md hover:bg-gray-700">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-600">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos() && Auth::check())
                    <div class="mr-3 shrink-0">
                        <img class="object-cover w-10 h-10 border-2 border-gray-600 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif
                <div>
                    <div class="text-base font-medium text-white">{{ Auth::user()->name ?? 'Guest' }}</div>
                    <div class="text-sm font-medium text-gray-400">{{ Auth::user()->email ?? '' }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link href="{{ route('productos.create') }}" :active="request()->routeIs('productos.create')" class="block px-3 py-2 text-base font-medium text-white transition duration-300 rounded-md hover:bg-gray-700">
                    {{ __('Registrar Artículos') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('historial.compras') }}" :active="request()->routeIs('historial.compras')" class="block px-3 py-2 text-base font-medium text-white transition duration-300 rounded-md hover:bg-gray-700">
                    {{ __('Historial de compras') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('user-management.index') }}" :active="request()->routeIs('user-management.index')" class="block px-3 py-2 text-base font-medium text-white transition duration-300 rounded-md hover:bg-gray-700">
                    {{ __('Administrar Usuarios') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')" class="block px-3 py-2 text-base font-medium text-white transition duration-300 rounded-md hover:bg-gray-700">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();" class="block px-3 py-2 text-base font-medium text-white transition duration-300 rounded-md hover:bg-gray-700">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
