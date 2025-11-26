<div class="flex flex-col h-full bg-white border-r border-gray-200 shadow-sm">
    <!-- Logo -->
    <div class="flex items-center flex-shrink-0 px-6 py-5 border-b border-gray-200 justify-between">
        <div class="flex items-center gap-3">
            <div class="flex items-center justify-center w-12 h-12 bg-emerald-700 rounded-lg shadow-md">
                <i class="ph-bold ph-heart text-white text-2xl"></i>
            </div>
            <span class="text-xl font-extrabold text-emerald-800">VetSystem</span>
        </div>
        
        <!-- Notifications (Mobile/Tablet visible, Desktop hidden if needed) -->
        <div class="relative" x-data="{ open: false }">
            <button @click="open = !open" class="relative p-2 text-gray-400 hover:text-emerald-600 transition-colors">
                <i class="ph-bold ph-bell text-xl"></i>
                <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full border border-white"></span>
            </button>
            
            <div x-show="open" @click.away="open = false" x-cloak 
                 class="absolute left-0 mt-2 w-64 bg-white border border-gray-200 rounded-xl shadow-lg z-50 overflow-hidden">
                <div class="p-3 border-b border-gray-100 bg-gray-50">
                    <h4 class="text-xs font-bold text-gray-700 uppercase">Notificaciones</h4>
                </div>
                <div class="max-h-64 overflow-y-auto">
                    <a href="#" class="block p-3 hover:bg-gray-50 border-b border-gray-50 last:border-0">
                        <p class="text-sm font-medium text-gray-900">Nueva cita agendada</p>
                        <p class="text-xs text-gray-500 mt-1">Hace 5 min • Max</p>
                    </a>
                    <a href="#" class="block p-3 hover:bg-gray-50 border-b border-gray-50 last:border-0">
                        <p class="text-sm font-medium text-gray-900">Recordatorio de vacuna</p>
                        <p class="text-xs text-gray-500 mt-1">Hace 2 horas • Luna</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Search Bar (Global) -->
    <div class="px-4 py-4 border-b border-gray-200">
        <div class="relative">
            <i class="ph-bold ph-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
            <input type="text" placeholder="Buscar..." class="w-full pl-10 pr-4 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all">
        </div>
    </div>

    <!-- Navigation -->
    <div class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">
        <!-- Principal Section -->
        <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">Principal</p>
        
        <a href="{{ route('dashboard') }}" class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-emerald-50 text-emerald-700 border-l-4 border-emerald-700' : 'text-gray-600 hover:bg-gray-50 hover:text-emerald-700 hover:translate-x-1' }}">
            <i class="ph-bold ph-house flex-shrink-0 text-lg mr-3 transition-colors {{ request()->routeIs('dashboard') ? 'text-emerald-700' : 'text-gray-400 group-hover:text-emerald-700' }}"></i>
            Dashboard
        </a>

        <!-- Gestión Section -->
        <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider mt-6 mb-3">Gestión</p>

        <a href="{{ route('pets.index') }}" class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs('pets.*') ? 'bg-emerald-50 text-emerald-700 border-l-4 border-emerald-700' : 'text-gray-600 hover:bg-gray-50 hover:text-emerald-700 hover:translate-x-1' }}">
            <i class="ph-bold ph-paw-print flex-shrink-0 text-lg mr-3 transition-colors {{ request()->routeIs('pets.*') ? 'text-emerald-700' : 'text-gray-400 group-hover:text-emerald-700' }}"></i>
            {{ Auth::user()->isClient() ? 'Mis Mascotas' : 'Mascotas' }}
        </a>

        @if(Auth::user()->isClient())
        <a href="{{ route('services.index') }}" class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs('services.*') ? 'bg-emerald-50 text-emerald-700 border-l-4 border-emerald-700' : 'text-gray-600 hover:bg-gray-50 hover:text-emerald-700 hover:translate-x-1' }}">
            <i class="ph-bold ph-first-aid flex-shrink-0 text-lg mr-3 transition-colors {{ request()->routeIs('services.*') ? 'text-emerald-700' : 'text-gray-400 group-hover:text-emerald-700' }}"></i>
            Servicios
        </a>
        @endif

        @if(!Auth::user()->isClient())
        <a href="#" class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 text-gray-600 hover:bg-gray-50 hover:text-emerald-700 hover:translate-x-1">
            <i class="ph-bold ph-calendar-check flex-shrink-0 text-lg mr-3 text-gray-400 group-hover:text-emerald-700 transition-colors"></i>
            Citas Médicas
        </a>

        <a href="{{ route('services.index') }}" class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs('services.*') ? 'bg-emerald-50 text-emerald-700 border-l-4 border-emerald-700' : 'text-gray-600 hover:bg-gray-50 hover:text-emerald-700 hover:translate-x-1' }}">
            <i class="ph-bold ph-first-aid flex-shrink-0 text-lg mr-3 transition-colors {{ request()->routeIs('services.*') ? 'text-emerald-700' : 'text-gray-400 group-hover:text-emerald-700' }}"></i>
            Servicios
        </a>

        @if(Auth::user()->isAdmin())
        <a href="{{ route('admin.users.index') }}" class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs('admin.users.*') ? 'bg-emerald-50 text-emerald-700 border-l-4 border-emerald-700' : 'text-gray-600 hover:bg-gray-50 hover:text-emerald-700 hover:translate-x-1' }}">
            <i class="ph-bold ph-users flex-shrink-0 text-lg mr-3 transition-colors {{ request()->routeIs('admin.users.*') ? 'text-emerald-700' : 'text-gray-400 group-hover:text-emerald-700' }}"></i>
            Usuarios
        </a>
        @endif
        @endif

        <!-- Administración Section -->
        @if(Auth::user()->isAdmin())
        <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider mt-6 mb-3">Administración</p>
        
        <a href="{{ route('admin.staff.index') }}" class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs('admin.staff.*') ? 'bg-emerald-50 text-emerald-700 border-l-4 border-emerald-700' : 'text-gray-600 hover:bg-gray-50 hover:text-emerald-700 hover:translate-x-1' }}">
            <i class="ph-bold ph-shield-check flex-shrink-0 text-lg mr-3 transition-colors {{ request()->routeIs('admin.staff.*') ? 'text-emerald-700' : 'text-gray-400 group-hover:text-emerald-700' }}"></i>
            Gestionar Roles
        </a>

        <a href="#" class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 text-gray-600 hover:bg-gray-50 hover:text-emerald-700 hover:translate-x-1">
            <i class="ph-bold ph-chart-bar flex-shrink-0 text-lg mr-3 text-gray-400 group-hover:text-emerald-700 transition-colors"></i>
            Reportes y Analíticas
        </a>
        @endif

        <!-- Settings -->
        <div class="pt-4 border-t border-gray-200 mt-6">
            <a href="{{ route('profile.edit') }}" class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs('profile.*') ? 'bg-emerald-50 text-emerald-700 border-l-4 border-emerald-700' : 'text-gray-600 hover:bg-gray-50 hover:text-emerald-700 hover:translate-x-1' }}">
                <i class="ph-bold ph-gear flex-shrink-0 text-lg mr-3 transition-colors {{ request()->routeIs('profile.*') ? 'text-emerald-700' : 'text-gray-400 group-hover:text-emerald-700' }}"></i>
                Configuración
            </a>
        </div>
    </div>

    <!-- User Profile -->
    <div class="flex-shrink-0 p-4 border-t border-gray-200 bg-gradient-to-br from-gray-50 to-emerald-50">
        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" class="flex items-center w-full px-3 py-2.5 text-sm rounded-lg hover:bg-white hover:shadow-sm transition-all duration-200">
                <div class="flex items-center justify-center flex-shrink-0 w-10 h-10 mr-3 font-bold text-white bg-gradient-to-br from-emerald-600 to-emerald-800 rounded-full shadow-md">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div class="flex-1 text-left min-w-0">
                    <p class="text-sm font-semibold text-gray-900 truncate">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-emerald-700 font-medium truncate">{{ ucfirst(Auth::user()->role) }}</p>
                </div>
                <i class="ph-bold ph-caret-down text-gray-500 transition-transform" :class="open ? 'rotate-180' : ''"></i>
            </button>

            <div x-show="open" @click.away="open = false" x-cloak 
                 x-transition:enter="transition ease-out duration-200" 
                 x-transition:enter-start="opacity-0 translate-y-1" 
                 x-transition:enter-end="opacity-100 translate-y-0" 
                 x-transition:leave="transition ease-in duration-150" 
                 x-transition:leave-start="opacity-100 translate-y-0" 
                 x-transition:leave-end="opacity-0 translate-y-1"
                 class="absolute bottom-full left-0 right-0 mb-2 bg-white border border-gray-200 rounded-lg shadow-xl overflow-hidden">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center w-full px-4 py-3 text-sm text-left text-red-600 hover:bg-red-50 transition-colors group">
                        <i class="ph-bold ph-sign-out text-lg mr-3 group-hover:scale-110 transition-transform"></i>
                        Cerrar Sesión
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
