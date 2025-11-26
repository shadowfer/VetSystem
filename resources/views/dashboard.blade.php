<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="text-3xl font-extrabold text-gray-900 leading-tight">
                    ¡Hola, <span class="text-emerald-700">{{ auth()->user()->name }}</span>!
                </h2>
                <p class="mt-1.5 text-base text-gray-600">Bienvenido de nuevo a VetSystem</p>
            </div>
            <div class="flex items-center gap-3">
                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-2">
                    <span class="text-sm text-gray-600 font-medium">{{ \Carbon\Carbon::now()->locale('es')->translatedFormat('l, d \d\e F \d\e Y') }}</span>
                    <span class="inline-flex items-center gap-2 px-4 py-2.5 bg-emerald-50 text-emerald-700 rounded-lg text-sm font-bold border border-emerald-200">
                        <div class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></div>
                        Sistema Activo
                    </span>
                </div>
                <button class="inline-flex items-center gap-2 px-6 py-2.5 bg-amber-400 hover:bg-amber-500 text-white rounded-lg text-sm font-bold shadow-md hover:shadow-lg transition-all">
                    <i class="ph-bold ph-calendar-plus text-lg"></i>
                    Reservar Cita
                </button>
            </div>
        </div>
    </x-slot>

    @if(auth()->user()->isClient())
    <!-- CLIENT DASHBOARD -->
    <div class="space-y-8">
        <!-- Hero Section -->
        <div class="relative bg-emerald-700 rounded-2xl overflow-hidden shadow-lg">
            <div class="absolute inset-0">
                <img src="https://images.unsplash.com/photo-1548767797-d8c844163c4c?w=1200&h=400&fit=crop" alt="Welcome" class="w-full h-full object-cover opacity-20">
                <div class="absolute inset-0 bg-gradient-to-r from-emerald-900/90 to-emerald-600/50"></div>
            </div>
            <div class="relative p-8 md:p-12">
                <div class="max-w-2xl">
                    <h2 class="text-3xl font-bold text-white mb-4">Bienvenido al Centro de Bienestar Animal</h2>
                    <p class="text-emerald-50 text-lg mb-8">Ofrecemos servicios veterinarios de primera clase para el cuidado integral de tus mascotas. Desde consultas preventivas hasta cirugías especializadas.</p>
                    <div class="flex flex-wrap gap-4">
                        <a href="#" class="px-6 py-3 bg-amber-400 text-amber-900 font-bold rounded-xl hover:bg-amber-300 transition-colors shadow-lg flex items-center">
                            <i class="ph-bold ph-calendar-plus mr-2"></i> Agendar Cita
                        </a>
                        <a href="{{ route('services.index') }}" class="px-6 py-3 bg-white/10 text-white font-semibold rounded-xl hover:bg-white/20 transition-colors backdrop-blur-sm flex items-center">
                            <i class="ph-bold ph-first-aid mr-2"></i> Ver Servicios
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- My Pets Section -->
        <div>
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-gray-900 flex items-center">
                    <i class="ph-fill ph-paw-print text-emerald-600 mr-2"></i> Mis Mascotas
                </h3>
                <a href="{{ route('pets.index') }}" class="text-sm font-medium text-emerald-600 hover:text-emerald-700 flex items-center">
                    Gestionar Mascotas <i class="ph-bold ph-arrow-right ml-1"></i>
                </a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse(auth()->user()->pets as $pet)
                <!-- Pet Card -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden group hover:shadow-md transition-all duration-300">
                    <div class="h-48 overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1543466835-00a7907e9de1?w=600&h=400&fit=crop" alt="{{ $pet->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-emerald-700 shadow-sm">
                            Saludable
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h4 class="text-lg font-bold text-gray-900">{{ $pet->name }}</h4>
                                <p class="text-sm text-gray-500">{{ $pet->species }} • {{ $pet->breed ?? 'Raza no especificada' }}</p>
                            </div>
                            <div class="w-10 h-10 rounded-full bg-emerald-50 flex items-center justify-center text-emerald-600">
                                <i class="ph-bold ph-dog text-xl"></i>
                            </div>
                        </div>
                        <div class="space-y-3">
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="ph-bold ph-syringe text-emerald-500 mr-2"></i>
                                <span>Próxima vacuna: <strong>--</strong></span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="ph-bold ph-calendar-check text-blue-500 mr-2"></i>
                                <span>Última visita: <strong>--</strong></span>
                            </div>
                        </div>
                        <div class="mt-6 pt-4 border-t border-gray-100 flex gap-3">
                            <a href="{{ route('pets.show', $pet) }}" class="flex-1 px-4 py-2 bg-emerald-50 text-emerald-700 font-medium rounded-lg hover:bg-emerald-100 transition-colors text-sm text-center">
                                Ver Perfil
                            </a>
                            <button class="flex-1 px-4 py-2 bg-amber-50 text-amber-700 font-medium rounded-lg hover:bg-amber-100 transition-colors text-sm">
                                Cita
                            </button>
                        </div>
                    </div>
                </div>
                @empty
                <!-- No Pets State -->
                <div class="col-span-full text-center py-12 bg-white rounded-xl border border-gray-200 border-dashed">
                    <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ph-bold ph-paw-print text-4xl text-gray-400"></i>
                    </div>
                    <h4 class="text-lg font-semibold text-gray-900 mb-2">No tienes mascotas registradas</h4>
                    <p class="text-gray-600 mb-6">Comienza registrando a tu primer compañero</p>
                </div>
                @endforelse

                <!-- Add New Pet Card -->
                <a href="{{ route('pets.create') }}" class="bg-gray-50 rounded-xl border-2 border-dashed border-gray-200 flex flex-col items-center justify-center p-6 hover:border-emerald-400 hover:bg-emerald-50/30 transition-all duration-300 group cursor-pointer min-h-[300px]">
                    <div class="w-16 h-16 bg-white rounded-full shadow-sm flex items-center justify-center text-gray-400 group-hover:text-emerald-500 group-hover:scale-110 transition-all duration-300 mb-4">
                        <i class="ph-bold ph-plus text-3xl"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 group-hover:text-emerald-700 transition-colors">Registrar Nueva Mascota</h4>
                    <p class="text-sm text-gray-500 text-center mt-2 max-w-[200px]">Añade a otro miembro de la familia para gestionar su salud.</p>
                </a>
            </div>
        </div>

        <!-- Featured Services -->
        <div>
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-gray-900 flex items-center">
                    <i class="ph-fill ph-star text-amber-400 mr-2"></i> Servicios Destacados
                </h3>
                <a href="{{ route('services.index') }}" class="text-sm font-medium text-emerald-600 hover:text-emerald-700 flex items-center">
                    Ver Todos <i class="ph-bold ph-arrow-right ml-1"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Service 1 -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden group hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <div class="h-40 overflow-hidden relative">
                        <img src="{{ asset('images/services/consultas.png') }}" alt="Consulta General" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <div class="p-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-600 text-white rounded-xl flex items-center justify-center -mt-10 relative z-10 shadow-lg shadow-blue-500/30 mb-4 group-hover:scale-110 transition-transform duration-300">
                            <i class="ph-bold ph-stethoscope text-2xl"></i>
                        </div>
                        <h4 class="font-bold text-gray-900 mb-2">Consulta General</h4>
                        <p class="text-sm text-gray-600 mb-4">Evaluación completa de la salud de tu mascota por expertos.</p>
                        <span class="text-emerald-700 font-bold text-sm">Desde $30.00</span>
                    </div>
                </div>

                <!-- Service 2 -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden group hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <div class="h-40 overflow-hidden relative">
                        <img src="{{ asset('images/services/consultas.png') }}" alt="Peluquería" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <div class="p-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-purple-600 text-white rounded-xl flex items-center justify-center -mt-10 relative z-10 shadow-lg shadow-purple-500/30 mb-4 group-hover:scale-110 transition-transform duration-300">
                            <i class="ph-bold ph-scissors text-2xl"></i>
                        </div>
                        <h4 class="font-bold text-gray-900 mb-2">Peluquería y Spa</h4>
                        <p class="text-sm text-gray-600 mb-4">Baño, corte y cuidados estéticos para que luzcan increíbles.</p>
                        <span class="text-emerald-700 font-bold text-sm">Desde $25.00</span>
                    </div>
                </div>

                <!-- Service 3 -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden group hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <div class="h-40 overflow-hidden relative">
                        <img src="{{ asset('images/services/urgencias.png') }}" alt="Urgencias" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <div class="p-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-red-400 to-red-600 text-white rounded-xl flex items-center justify-center -mt-10 relative z-10 shadow-lg shadow-red-500/30 mb-4 group-hover:scale-110 transition-transform duration-300">
                            <i class="ph-bold ph-heartbeat text-2xl"></i>
                        </div>
                        <h4 class="font-bold text-gray-900 mb-2">Urgencias 24/7</h4>
                        <p class="text-sm text-gray-600 mb-4">Atención inmediata para emergencias médicas en cualquier momento.</p>
                        <span class="text-emerald-700 font-bold text-sm">Tarifa variable</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Activity & Info Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Activity Widget -->
            <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm">
                <div class="px-6 py-5 border-b border-gray-200 bg-gray-50">
                    <h3 class="text-lg font-bold text-gray-900">Actividad Reciente</h3>
                    <p class="mt-1 text-sm text-gray-600">Últimas actualizaciones del sistema</p>
                </div>
                <div class="p-6 space-y-4">
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 bg-emerald-100 text-emerald-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="ph-bold ph-check-circle text-lg"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-semibold text-gray-900"><span class="text-emerald-700">Max</span> - Vacunación completada</p>
                            <p class="text-xs text-gray-600 mt-1">Hace 15 minutos</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="ph-bold ph-plus-circle text-lg"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-semibold text-gray-900"><span class="text-blue-700">Toby</span> - Nuevo registro</p>
                            <p class="text-xs text-gray-600 mt-1">Hace 1 hora</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 bg-amber-100 text-amber-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="ph-bold ph-calendar-plus text-lg"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-semibold text-gray-900">Nueva cita agendada - <span class="text-amber-700">Rocky</span></p>
                            <p class="text-xs text-gray-600 mt-1">Hace 2 horas</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Image Card -->
            <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                <img src="https://images.unsplash.com/photo-1450778869180-41d0601e046e?w=500&h=300&fit=crop" 
                     alt="Cuidado profesional" 
                     class="w-full h-48 object-cover">
                <div class="p-6">
                    <h4 class="text-lg font-bold text-gray-900 mb-2">Cuidado Integral</h4>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Ofrecemos atención médica de excelencia con tecnología de punta para garantizar el bienestar de tus mascotas.
                    </p>
                </div>
            </div>
        </div>
    </div>
    @else
    <!-- ADMIN/STAFF DASHBOARD -->
    <!-- Admin System Overview -->
    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 border border-blue-200 rounded-xl p-6 mb-8">
        <div class="flex items-start gap-4">
            <div class="w-12 h-12 bg-blue-600 text-white rounded-lg flex items-center justify-center flex-shrink-0">
                <i class="ph-bold ph-chart-line-up text-2xl"></i>
            </div>
            <div class="flex-1">
                <h3 class="text-xl font-bold text-gray-900 mb-2">Vista General del Sistema</h3>
                <p class="text-gray-700">El sistema está operando con <span class="font-bold text-blue-700">85% de capacidad</span> en citas para esta semana. Rendimiento óptimo con <span class="font-bold text-emerald-700">{{ \App\Models\User::where('is_active', true)->count() }} usuarios activos</span> y <span class="font-bold text-emerald-700">{{ \App\Models\Pet::count() }} mascotas registradas</span>.</p>
            </div>
        </div>
    </div>

    <div class="space-y-8">
        <!-- Stats Overview -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Total Revenue -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 relative overflow-hidden group hover:shadow-lg transition-all duration-300">
                <div class="absolute right-0 top-0 h-full w-1/2 bg-gradient-to-l from-emerald-50 to-transparent opacity-50"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-emerald-100 rounded-lg text-emerald-600 group-hover:scale-110 transition-transform">
                            <i class="ph-bold ph-currency-dollar text-xl"></i>
                        </div>
                        <span class="flex items-center text-xs font-medium text-emerald-600 bg-emerald-50 px-2 py-1 rounded-full">
                            <i class="ph-bold ph-trend-up mr-1"></i> +12.5%
                        </span>
                    </div>
                    <h3 class="text-gray-500 text-sm font-medium">Ingresos Totales</h3>
                    <p class="text-3xl font-bold text-gray-900 mt-1">$45,231.89</p>
                    <p class="text-xs text-gray-400 mt-2">Mes actual vs mes anterior</p>
                </div>
            </div>

            <!-- Monthly Growth -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 relative overflow-hidden group hover:shadow-lg transition-all duration-300">
                <div class="absolute right-0 top-0 h-full w-1/2 bg-gradient-to-l from-blue-50 to-transparent opacity-50"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-blue-100 rounded-lg text-blue-600 group-hover:scale-110 transition-transform">
                            <i class="ph-bold ph-users-three text-xl"></i>
                        </div>
                        <span class="flex items-center text-xs font-medium text-blue-600 bg-blue-50 px-2 py-1 rounded-full">
                            <i class="ph-bold ph-trend-up mr-1"></i> +8.2%
                        </span>
                    </div>
                    <h3 class="text-gray-500 text-sm font-medium">Crecimiento Mensual</h3>
                    <p class="text-3xl font-bold text-gray-900 mt-1">1,234</p>
                    <p class="text-xs text-gray-400 mt-2">Nuevas citas este mes</p>
                </div>
            </div>

            <!-- Top Service -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 relative overflow-hidden group hover:shadow-lg transition-all duration-300">
                <div class="absolute right-0 top-0 h-full w-1/2 bg-gradient-to-l from-amber-50 to-transparent opacity-50"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-amber-100 rounded-lg text-amber-600 group-hover:scale-110 transition-transform">
                            <i class="ph-bold ph-star text-xl"></i>
                        </div>
                        <span class="flex items-center text-xs font-medium text-amber-600 bg-amber-50 px-2 py-1 rounded-full">
                            Top #1
                        </span>
                    </div>
                    <h3 class="text-gray-500 text-sm font-medium">Servicio Más Solicitado</h3>
                    <p class="text-xl font-bold text-gray-900 mt-1">Vacunación Anual</p>
                    <p class="text-xs text-gray-400 mt-2">32% del total de citas</p>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Revenue Trend -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-bold text-gray-900">Tendencia de Ingresos</h3>
                    <button class="text-gray-400 hover:text-emerald-600 transition-colors">
                        <i class="ph-bold ph-dots-three-vertical text-xl"></i>
                    </button>
                </div>
                <!-- CSS Bar Chart Mockup -->
                <div class="h-64 flex items-end justify-between gap-2 px-2">
                    <div class="w-full bg-emerald-100 rounded-t-lg relative group" style="height: 40%">
                        <div class="absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs py-1 px-2 rounded opacity-0 group-hover:opacity-100 transition-opacity">$12k</div>
                    </div>
                    <div class="w-full bg-emerald-200 rounded-t-lg relative group" style="height: 55%">
                        <div class="absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs py-1 px-2 rounded opacity-0 group-hover:opacity-100 transition-opacity">$18k</div>
                    </div>
                    <div class="w-full bg-emerald-300 rounded-t-lg relative group" style="height: 45%">
                        <div class="absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs py-1 px-2 rounded opacity-0 group-hover:opacity-100 transition-opacity">$15k</div>
                    </div>
                    <div class="w-full bg-emerald-400 rounded-t-lg relative group" style="height: 70%">
                        <div class="absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs py-1 px-2 rounded opacity-0 group-hover:opacity-100 transition-opacity">$24k</div>
                    </div>
                    <div class="w-full bg-emerald-500 rounded-t-lg relative group" style="height: 60%">
                        <div class="absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs py-1 px-2 rounded opacity-0 group-hover:opacity-100 transition-opacity">$20k</div>
                    </div>
                    <div class="w-full bg-emerald-600 rounded-t-lg relative group" style="height: 85%">
                        <div class="absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs py-1 px-2 rounded opacity-0 group-hover:opacity-100 transition-opacity">$32k</div>
                    </div>
                </div>
                <div class="flex justify-between mt-4 text-xs text-gray-400 font-medium">
                    <span>Jun</span><span>Jul</span><span>Ago</span><span>Sep</span><span>Oct</span><span>Nov</span>
                </div>
            </div>

            <!-- Appointment vs Cancellation -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-bold text-gray-900">Citas vs Cancelaciones</h3>
                    <div class="flex items-center gap-4 text-xs">
                        <span class="flex items-center gap-1"><div class="w-2 h-2 rounded-full bg-emerald-500"></div> Citas</span>
                        <span class="flex items-center gap-1"><div class="w-2 h-2 rounded-full bg-red-400"></div> Canceladas</span>
                    </div>
                </div>
                <!-- CSS Line Chart Mockup -->
                <div class="h-64 relative border-l border-b border-gray-100">
                    <!-- Grid Lines -->
                    <div class="absolute top-0 w-full h-px bg-gray-50"></div>
                    <div class="absolute top-1/4 w-full h-px bg-gray-50"></div>
                    <div class="absolute top-2/4 w-full h-px bg-gray-50"></div>
                    <div class="absolute top-3/4 w-full h-px bg-gray-50"></div>
                    
                    <!-- Lines (SVG) -->
                    <svg class="absolute inset-0 w-full h-full overflow-visible" preserveAspectRatio="none">
                        <!-- Appointments Line -->
                        <path d="M0,200 C50,150 100,180 150,100 S250,50 300,80 S400,20 500,40" fill="none" stroke="#10b981" stroke-width="3" stroke-linecap="round" />
                        <!-- Cancellations Line -->
                        <path d="M0,240 C50,230 100,235 150,220 S250,210 300,215 S400,200 500,205" fill="none" stroke="#f87171" stroke-width="3" stroke-linecap="round" stroke-dasharray="5,5" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Quick Access Links -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="{{ route('admin.users.index') }}" class="group p-4 bg-white border border-gray-200 rounded-xl hover:border-emerald-500 hover:shadow-md transition-all duration-200 flex flex-col items-center justify-center text-center">
                <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                    <i class="ph-bold ph-users text-2xl"></i>
                </div>
                <h4 class="font-semibold text-gray-900">Gestionar Usuarios</h4>
                <p class="text-xs text-gray-500 mt-1">Control de acceso</p>
            </a>
            
            <a href="{{ route('pets.index') }}" class="group p-4 bg-white border border-gray-200 rounded-xl hover:border-emerald-500 hover:shadow-md transition-all duration-200 flex flex-col items-center justify-center text-center">
                <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-full flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                    <i class="ph-bold ph-paw-print text-2xl"></i>
                </div>
                <h4 class="font-semibold text-gray-900">Gestionar Mascotas</h4>
                <p class="text-xs text-gray-500 mt-1">Registros médicos</p>
            </a>

            <a href="#" class="group p-4 bg-white border border-gray-200 rounded-xl hover:border-emerald-500 hover:shadow-md transition-all duration-200 flex flex-col items-center justify-center text-center">
                <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-full flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                    <i class="ph-bold ph-calendar-check text-2xl"></i>
                </div>
                <h4 class="font-semibold text-gray-900">Gestionar Citas</h4>
                <p class="text-xs text-gray-500 mt-1">Agenda global</p>
            </a>

            <a href="{{ route('services.index') }}" class="group p-4 bg-white border border-gray-200 rounded-xl hover:border-emerald-500 hover:shadow-md transition-all duration-200 flex flex-col items-center justify-center text-center">
                <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-full flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                    <i class="ph-bold ph-first-aid text-2xl"></i>
                </div>
                <h4 class="font-semibold text-gray-900">Gestionar Servicios</h4>
                <p class="text-xs text-gray-500 mt-1">Catálogo médico</p>
            </a>
        </div>
    </div>
    
    <!-- Stats Grid -->
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4 mt-8">
        <!-- Card 1 - Admin/Staff Only -->
        <div class="relative bg-gradient-to-br from-blue-50 to-white border border-blue-200 rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
            <div class="absolute top-0 right-0 w-32 h-32 opacity-5">
                <i class="ph-fill ph-users text-9xl text-blue-600"></i>
            </div>
            <div class="relative p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-xl flex items-center justify-center shadow-lg">
                        <i class="ph-bold ph-users text-2xl"></i>
                    </div>
                    <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-emerald-50 text-emerald-700 text-xs font-bold rounded-full">
                        <i class="ph-bold ph-trend-up text-sm"></i>
                        +12%
                    </span>
                </div>
                <p class="text-3xl font-extrabold text-gray-900">{{ \App\Models\User::where('is_active', true)->count() }}</p>
                <p class="mt-1 text-sm text-gray-600 font-medium">Usuarios Activos</p>
            </div>
        </div>

        <!-- Card 2 - Pets -->
        <div class="relative bg-gradient-to-br from-emerald-50 to-white border border-emerald-200 rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
            <div class="absolute top-0 right-0 w-32 h-32 opacity-5">
                <i class="ph-fill ph-paw-print text-9xl text-emerald-600"></i>
            </div>
            <div class="relative p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-emerald-600 text-white rounded-xl flex items-center justify-center shadow-lg">
                        <i class="ph-bold ph-paw-print text-2xl"></i>
                    </div>
                    <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-emerald-50 text-emerald-700 text-xs font-bold rounded-full">
                        <i class="ph-bold ph-trend-up text-sm"></i>
                        +8%
                    </span>
                </div>
                <p class="text-3xl font-extrabold text-gray-900">{{ \App\Models\Pet::count() }}</p>
                <p class="mt-1 text-sm text-gray-600 font-medium">Mascotas Registradas</p>
            </div>
        </div>

        <!-- Card 3 - Appointments -->
        <div class="relative bg-gradient-to-br from-amber-50 to-white border border-amber-200 rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
            <div class="absolute top-0 right-0 w-32 h-32 opacity-5">
                <i class="ph-fill ph-calendar text-9xl text-amber-600"></i>
            </div>
            <div class="relative p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-14 h-14 bg-gradient-to-br from-amber-400 to-amber-500 text-white rounded-xl flex items-center justify-center shadow-lg">
                        <i class="ph-bold ph-calendar text-2xl"></i>
                    </div>
                    <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-blue-50 text-blue-700 text-xs font-bold rounded-full">
                        <i class="ph-bold ph-clock text-sm"></i>
                        Hoy
                    </span>
                </div>
                <p class="text-3xl font-extrabold text-gray-900">5</p>
                <p class="mt-1 text-sm text-gray-600 font-medium">Citas Programadas</p>
            </div>
        </div>

        <!-- Card 4 - Emergencies -->
        <div class="relative bg-gradient-to-br from-red-50 to-white border border-red-200 rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
            <div class="absolute top-0 right-0 w-32 h-32 opacity-5">
                <i class="ph-fill ph-warning text-9xl text-red-600"></i>
            </div>
            <div class="relative p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-14 h-14 bg-gradient-to-br from-red-500 to-red-600 text-white rounded-xl flex items-center justify-center shadow-lg">
                        <i class="ph-bold ph-warning text-2xl"></i>
                    </div>
                    <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-red-50 text-red-700 text-xs font-bold rounded-full">
                        <i class="ph-bold ph-warning-circle text-sm"></i>
                        Urgente
                    </span>
                </div>
                <p class="text-3xl font-extrabold text-gray-900">2</p>
                <p class="mt-1 text-sm text-gray-600 font-medium">Urgencias</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Column -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Quick Actions -->
            <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm">
                <div class="px-6 py-5 border-b border-gray-200 bg-gradient-to-r from-emerald-50 to-white">
                    <h3 class="text-xl font-bold text-gray-900">Acciones Rápidas</h3>
                    <p class="mt-1 text-sm text-gray-600">Accede rápidamente a las funciones más utilizadas</p>
                </div>
                <div class="p-8">
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                        <!-- Action 1 -->
                        <a href="{{ route('pets.create') }}" class="group bg-gradient-to-br from-emerald-50 to-white border-2 border-emerald-200 rounded-xl p-6 hover:border-emerald-400 hover:shadow-lg transition-all duration-300">
                            <div class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-emerald-600 text-white rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform shadow-md">
                                <i class="ph-bold ph-plus text-2xl"></i>
                            </div>
                            <h4 class="font-bold text-gray-900 text-lg">Registrar Mascota</h4>
                            <p class="mt-1 text-sm text-gray-600">Añadir nuevo paciente</p>
                        </a>

                        <!-- Action 2 -->
                        <button class="group bg-gradient-to-br from-amber-50 to-white border-2 border-amber-200 rounded-xl p-6 hover:border-amber-400 hover:shadow-lg transition-all duration-300">
                            <div class="w-14 h-14 bg-gradient-to-br from-amber-400 to-amber-500 text-white rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform shadow-md">
                                <i class="ph-bold ph-calendar-plus text-2xl"></i>
                            </div>
                            <h4 class="font-bold text-gray-900 text-lg">Agendar Cita</h4>
                            <p class="mt-1 text-sm text-gray-600">Nueva consulta</p>
                        </button>

                        <!-- Action 3 -->
                        <button class="group bg-gradient-to-br from-blue-50 to-white border-2 border-blue-200 rounded-xl p-6 hover:border-blue-400 hover:shadow-lg transition-all duration-300">
                            <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform shadow-md">
                                <i class="ph-bold ph-syringe text-2xl"></i>
                            </div>
                            <h4 class="font-bold text-gray-900 text-lg">Registrar Vacuna</h4>
                            <p class="mt-1 text-sm text-gray-600">Actualizar historial</p>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Admin Quick Actions -->
            <div class="bg-white border border-blue-200 rounded-xl overflow-hidden shadow-sm">
                <div class="px-6 py-5 border-b border-blue-200 bg-gradient-to-r from-blue-50 to-white">
                    <h3 class="text-xl font-bold text-gray-900">Administración Rápida</h3>
                    <p class="mt-1 text-sm text-gray-600">Herramientas de gestión del sistema</p>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <a href="{{ route('admin.users.index') }}" class="flex flex-col items-center p-4 bg-blue-50 border border-blue-200 rounded-lg hover:bg-blue-100 hover:shadow-md transition-all">
                            <i class="ph-bold ph-user-circle-gear text-3xl text-blue-600 mb-2"></i>
                            <span class="text-sm font-semibold text-gray-900 text-center">Gestionar Usuarios</span>
                        </a>
                        <a href="{{ route('admin.staff.index') }}" class="flex flex-col items-center p-4 bg-indigo-50 border border-indigo-200 rounded-lg hover:bg-indigo-100 hover:shadow-md transition-all">
                            <i class="ph-bold ph-shield-check text-3xl text-indigo-600 mb-2"></i>
                            <span class="text-sm font-semibold text-gray-900 text-center">Gestionar Roles</span>
                        </a>
                        <button class="flex flex-col items-center p-4 bg-purple-50 border border-purple-200 rounded-lg hover:bg-purple-100 hover:shadow-md transition-all">
                            <i class="ph-bold ph-chart-bar text-3xl text-purple-600 mb-2"></i>
                            <span class="text-sm font-semibold text-gray-900 text-center">Ver Reportes</span>
                        </button>
                        <button class="flex flex-col items-center p-4 bg-pink-50 border border-pink-200 rounded-lg hover:bg-pink-100 hover:shadow-md transition-all">
                            <i class="ph-bold ph-gear-six text-3xl text-pink-600 mb-2"></i>
                            <span class="text-sm font-semibold text-gray-900 text-center">Configurar Sistema</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Appointments Table -->
            <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm">
                <div class="px-6 py-5 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">Próximas Citas</h3>
                        <p class="mt-1 text-sm text-gray-600">Programadas para hoy</p>
                    </div>
                    <a href="#" class="inline-flex items-center gap-2 text-emerald-700 font-semibold text-sm hover:text-emerald-800 transition-colors">
                        Ver todas
                        <i class="ph-bold ph-arrow-right"></i>
                    </a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-emerald-50 border-b border-emerald-100">
                            <tr>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-emerald-900 uppercase tracking-wider">Hora</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-emerald-900 uppercase tracking-wider">Paciente</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-emerald-900 uppercase tracking-wider">Propietario</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-emerald-900 uppercase tracking-wider">Motivo</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-emerald-900 uppercase tracking-wider">Estado</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr class="hover:bg-emerald-50 transition-colors bg-white">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-sm font-bold text-gray-900">09:00 AM</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-3">
                                        <div class="flex items-center justify-center w-10 h-10 bg-orange-100 rounded-full">
                                            <span class="text-sm font-bold text-orange-600">M</span>
                                        </div>
                                        <div>
                                            <p class="text-sm font-semibold text-gray-900">Max</p>
                                            <p class="text-xs text-gray-600">Perro</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Juan Pérez</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Vacunación</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-emerald-100 text-emerald-800 text-xs font-bold rounded-full border border-emerald-200">
                                        <i class="ph-fill ph-check-circle text-sm"></i>
                                        Confirmada
                                    </span>
                                </td>
                            </tr>
                            <tr class="hover:bg-emerald-50 transition-colors bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-sm font-bold text-gray-900">10:30 AM</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-3">
                                        <div class="flex items-center justify-center w-10 h-10 bg-purple-100 rounded-full">
                                            <span class="text-sm font-bold text-purple-600">L</span>
                                        </div>
                                        <div>
                                            <p class="text-sm font-semibold text-gray-900">Luna</p>
                                            <p class="text-xs text-gray-600">Gato</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">María García</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Consulta General</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-amber-100 text-amber-800 text-xs font-bold rounded-full border border-amber-200">
                                        <i class="ph-fill ph-clock text-sm"></i>
                                        Pendiente
                                    </span>
                                </td>
                            </tr>
                            <tr class="hover:bg-emerald-50 transition-colors bg-white">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-sm font-bold text-gray-900">11:45 AM</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-3">
                                        <div class="flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full">
                                            <span class="text-sm font-bold text-blue-600">R</span>
                                        </div>
                                        <div>
                                            <p class="text-sm font-semibold text-gray-900">Rocky</p>
                                            <p class="text-xs text-gray-600">Perro</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Carlos López</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Revisión</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-emerald-100 text-emerald-800 text-xs font-bold rounded-full border border-emerald-200">
                                        <i class="ph-fill ph-check-circle text-sm"></i>
                                        Confirmada
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-8">
            <!-- Staff: Today's Pets -->
            <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm">
                <div class="px-6 py-5 border-b border-gray-200 bg-emerald-50">
                    <h3 class="text-lg font-bold text-gray-900">Pacientes de Hoy</h3>
                    <p class="mt-1 text-sm text-gray-600">Mascotas en clínica</p>
                </div>
                <div class="p-6">
                    <p class="text-gray-500 text-sm text-center">No hay pacientes registrados hoy.</p>
                </div>
            </div>
        </div>
    </div>
    @endif
</x-app-layout>
