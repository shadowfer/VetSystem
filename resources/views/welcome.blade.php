<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>VetSystem - Cuidado Veterinario de Excelencia</title>
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:300,400,500,600,700,800&display=swap" rel="stylesheet" />
        
        <!-- Phosphor Icons -->
        <script src="https://unpkg.com/@phosphor-icons/web@2.0.3"></script>
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            body { font-family: 'Plus Jakarta Sans', sans-serif; }
        </style>
    </head>
    <body class="antialiased bg-white">
        <div class="relative min-h-screen flex flex-col">
            <!-- Navigation -->
            <nav class="sticky top-0 z-50 bg-white border-b border-gray-200 shadow-sm">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center h-20">
                        <div class="flex items-center gap-2">
                            <div class="flex items-center justify-center w-10 h-10 bg-emerald-700 rounded-lg">
                                <i class="ph-bold ph-heart text-white text-xl"></i>
                            </div>
                            <span class="text-xl font-extrabold text-emerald-800">VetSystem</span>
                        </div>
                        <div class="flex items-center gap-8">
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="text-gray-600 hover:text-emerald-700 font-medium transition">Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-emerald-700 font-medium transition">Iniciar Sesión</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="inline-flex items-center gap-2 bg-amber-400 hover:bg-amber-500 text-white px-6 py-2.5 rounded-lg font-semibold shadow-sm transition">
                                            Reservar Cita
                                            <i class="ph-bold ph-arrow-right"></i>
                                        </a>
                                    @endif
                                @endauth
                            @endif
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Hero Section -->
            <div class="relative bg-gradient-to-b from-emerald-50 to-white py-20 overflow-hidden">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                        <!-- Left Content -->
                        <div class="space-y-8">
                            <div class="inline-block px-4 py-2 bg-emerald-100 text-emerald-800 rounded-full text-sm font-semibold">
                                Cuidado Veterinario Profesional
                            </div>
                            
                            <h1 class="text-5xl lg:text-6xl font-extrabold text-gray-900 leading-tight">
                                Cuidado Veterinario de
                                <span class="text-emerald-700">Excelencia</span>
                            </h1>
                            
                            <p class="text-xl text-gray-600 leading-relaxed">
                                Proporcionamos atención médica integral y profesional para sus compañeros. Nuestro equipo de veterinarios certificados está comprometido con el bienestar de cada paciente.
                            </p>
                            
                            <div class="flex flex-col sm:flex-row gap-4">
                                <a href="{{ route('register') }}" class="inline-flex items-center justify-center gap-2 bg-amber-400 hover:bg-amber-500 text-white px-8 py-4 rounded-lg font-bold text-lg shadow-md transition">
                                    Reservar Cita
                                    <i class="ph-bold ph-calendar-check"></i>
                                </a>
                                <a href="#servicios" class="inline-flex items-center justify-center gap-2 bg-white text-emerald-700 px-8 py-4 rounded-lg font-bold text-lg border-2 border-emerald-700 hover:bg-emerald-50 transition">
                                    Nuestros Servicios
                                </a>
                            </div>
                        </div>
                        
                        <!-- Right Image -->
                        <div class="relative">
                            <div class="relative rounded-xl overflow-hidden shadow-2xl">
                                <img src="https://images.unsplash.com/photo-1628009368231-7bb7cfcb0def?w=700&h=600&fit=crop" 
                                     alt="Veterinario profesional" 
                                     class="w-full h-[600px] object-cover">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Services Section -->
            <div id="servicios" class="py-24 bg-white">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center max-w-3xl mx-auto mb-16">
                        <span class="text-emerald-700 font-bold uppercase text-sm tracking-wider">Nuestros Servicios</span>
                        <h2 class="mt-3 text-4xl lg:text-5xl font-extrabold text-gray-900">Cuidado Integral Profesional</h2>
                        <p class="mt-4 text-xl text-gray-600">Servicios veterinarios completos para el bienestar de tu mascota.</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                        <!-- Service 1 -->
                        <div class="bg-white border border-gray-200 rounded-xl overflow-hidden hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                            <div class="relative h-48 overflow-hidden">
                                <img src="{{ asset('images/services/consultas.png') }}" 
                                     alt="Consultas médicas veterinarias" 
                                     class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            </div>
                            <div class="p-8">
                                <div class="w-16 h-16 bg-gradient-to-br from-emerald-400 to-emerald-600 text-white rounded-xl flex items-center justify-center mb-6 -mt-16 relative z-10 shadow-lg shadow-emerald-500/30">
                                    <i class="ph-bold ph-stethoscope text-3xl"></i>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-900 mb-3">Consultas Médicas</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    Diagnósticos precisos y tratamientos efectivos para garantizar la salud óptima de tu compañero.
                                </p>
                            </div>
                        </div>

                        <!-- Service 2 -->
                        <div class="bg-white border border-gray-200 rounded-xl overflow-hidden hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                            <div class="relative h-48 overflow-hidden">
                                <img src="{{ asset('images/services/vacunacion.png') }}" 
                                     alt="Vacunación profesional" 
                                     class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            </div>
                            <div class="p-8">
                                <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-blue-600 text-white rounded-xl flex items-center justify-center mb-6 -mt-16 relative z-10 shadow-lg shadow-blue-500/30">
                                    <i class="ph-bold ph-syringe text-3xl"></i>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-900 mb-3">Vacunación</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    Esquemas personalizados de vacunación para prevenir enfermedades de manera efectiva.
                                </p>
                            </div>
                        </div>

                        <!-- Service 3 -->
                        <div class="bg-white border border-gray-200 rounded-xl overflow-hidden hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                            <div class="relative h-48 overflow-hidden">
                                <img src="{{ asset('images/services/urgencias.png') }}" 
                                     alt="Urgencias veterinarias 24/7" 
                                     class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            </div>
                            <div class="p-8">
                                <div class="w-16 h-16 bg-gradient-to-br from-rose-400 to-rose-600 text-white rounded-xl flex items-center justify-center mb-6 -mt-16 relative z-10 shadow-lg shadow-rose-500/30">
                                    <i class="ph-bold ph-first-aid text-3xl"></i>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-900 mb-3">Urgencias 24/7</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    Equipo médico disponible las 24 horas para atender cualquier emergencia con rapidez.
                                </p>
                            </div>
                        </div>

                        <!-- Service 4 -->
                        <div class="bg-white border border-gray-200 rounded-xl overflow-hidden hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                            <div class="relative h-48 overflow-hidden">
                                <img src="{{ asset('images/services/cirugia.png') }}" 
                                     alt="Cirugías veterinarias especializadas" 
                                     class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            </div>
                            <div class="p-8">
                                <div class="w-16 h-16 bg-gradient-to-br from-red-400 to-red-600 text-white rounded-xl flex items-center justify-center mb-6 -mt-16 relative z-10 shadow-lg shadow-red-500/30">
                                    <i class="ph-bold ph-antibody text-3xl"></i>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-900 mb-3">Cirugías Especializadas</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    Procedimientos quirúrgicos de alta complejidad con equipamiento de última generación.
                                </p>
                            </div>
                        </div>

                        <!-- Service 5 -->
                        <div class="bg-white border border-gray-200 rounded-xl overflow-hidden hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                            <div class="relative h-48 overflow-hidden">
                                <img src="{{ asset('images/services/diagnostico.png') }}" 
                                     alt="Diagnóstico por imagen" 
                                     class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            </div>
                            <div class="p-8">
                                <div class="w-16 h-16 bg-gradient-to-br from-indigo-400 to-indigo-600 text-white rounded-xl flex items-center justify-center mb-6 -mt-16 relative z-10 shadow-lg shadow-indigo-500/30">
                                    <i class="ph-bold ph-x-ray text-3xl"></i>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-900 mb-3">Diagnóstico por Imagen</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    Rayos X, ultrasonido y tomografía para diagnósticos precisos y oportunos.
                                </p>
                            </div>
                        </div>

                        <!-- Service 6 -->
                        <div class="bg-white border border-gray-200 rounded-xl overflow-hidden hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                            <div class="relative h-48 overflow-hidden">
                                <img src="{{ asset('images/services/hospitalizacion.png') }}" 
                                     alt="Hospitalización veterinaria" 
                                     class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            </div>
                            <div class="p-8">
                                <div class="w-16 h-16 bg-gradient-to-br from-teal-400 to-teal-600 text-white rounded-xl flex items-center justify-center mb-6 -mt-16 relative z-10 shadow-lg shadow-teal-500/30">
                                    <i class="ph-bold ph-hospital text-3xl"></i>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-900 mb-3">Hospitalización</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    Cuidados intensivos con monitoreo constante para la recuperación de tu mascota.
                                </p>
                            </div>
                        </div>

                        <!-- Service 7 -->
                        <div class="bg-white border border-gray-200 rounded-xl overflow-hidden hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                            <div class="relative h-48 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1444212477490-ca407925329e?w=600&h=400&fit=crop" 
                                     alt="Peluquería y spa para mascotas" 
                                     class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            </div>
                            <div class="p-8">
                                <div class="w-16 h-16 bg-gradient-to-br from-purple-400 to-purple-600 text-white rounded-xl flex items-center justify-center mb-6 -mt-16 relative z-10 shadow-lg shadow-purple-500/30">
                                    <i class="ph-bold ph-scissors text-3xl"></i>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-900 mb-3">Peluquería y Spa</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    Servicios de estética e higiene para mantener a tu compañero saludable y hermoso.
                                </p>
                            </div>
                        </div>

                        <!-- Service 8 -->
                        <div class="bg-white border border-gray-200 rounded-xl overflow-hidden hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                            <div class="relative h-48 overflow-hidden">
                                <img src="{{ asset('images/services/odontologia.png') }}" 
                                     alt="Odontología veterinaria" 
                                     class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            </div>
                            <div class="p-8">
                                <div class="w-16 h-16 bg-gradient-to-br from-cyan-400 to-cyan-600 text-white rounded-xl flex items-center justify-center mb-6 -mt-16 relative z-10 shadow-lg shadow-cyan-500/30">
                                    <i class="ph-bold ph-tooth text-3xl"></i>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-900 mb-3">Odontología Veterinaria</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    Limpieza dental, extracciones y tratamientos para la salud bucal de tu mascota.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimonials Section -->
            <div class="py-24 bg-gradient-to-br from-emerald-50 to-white">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center max-w-3xl mx-auto mb-16">
                        <span class="text-emerald-700 font-bold uppercase text-sm tracking-wider">Testimonios</span>
                        <h2 class="mt-3 text-4xl lg:text-5xl font-extrabold text-gray-900">Lo que Dicen Nuestros Clientes</h2>
                        <p class="mt-4 text-xl text-gray-600">La confianza de nuestros clientes es nuestro mayor logro.</p>
                    </div>

                    <div x-data="{ activeSlide: 0, slides: 4 }" class="relative">
                        <div class="overflow-hidden">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                                <!-- Testimonial 1 -->
                                <div class="bg-white border border-gray-200 rounded-xl p-8 shadow-sm hover:shadow-lg transition-shadow">
                                    <div class="flex items-center gap-1 mb-4">
                                        <i class="ph-fill ph-star text-amber-400 text-xl"></i>
                                        <i class="ph-fill ph-star text-amber-400 text-xl"></i>
                                        <i class="ph-fill ph-star text-amber-400 text-xl"></i>
                                        <i class="ph-fill ph-star text-amber-400 text-xl"></i>
                                        <i class="ph-fill ph-star text-amber-400 text-xl"></i>
                                    </div>
                                    <div class="mb-6">
                                        <i class="ph-fill ph-quotes text-5xl text-emerald-100"></i>
                                    </div>
                                    <p class="text-gray-700 leading-relaxed mb-6">
                                        "Excelente atención veterinaria. El Dr. Pérez cuidó de Max durante su cirugía y el seguimiento fue impecable. ¡Totalmente recomendado!"
                                    </p>
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 bg-gradient-to-br from-emerald-400 to-emerald-600 rounded-full flex items-center justify-center">
                                            <span class="text-xl font-bold text-white">JP</span>
                                        </div>
                                        <div>
                                            <p class="font-bold text-gray-900">Juan Pérez</p>
                                            <p class="text-sm text-gray-600">Dueño de Max</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Testimonial 2 -->
                                <div class="bg-white border border-gray-200 rounded-xl p-8 shadow-sm hover:shadow-lg transition-shadow">
                                    <div class="flex items-center gap-1 mb-4">
                                        <i class="ph-fill ph-star text-amber-400 text-xl"></i>
                                        <i class="ph-fill ph-star text-amber-400 text-xl"></i>
                                        <i class="ph-fill ph-star text-amber-400 text-xl"></i>
                                        <i class="ph-fill ph-star text-amber-400 text-xl"></i>
                                        <i class="ph-fill ph-star text-amber-400 text-xl"></i>
                                    </div>
                                    <div class="mb-6">
                                        <i class="ph-fill ph-quotes text-5xl text-emerald-100"></i>
                                    </div>
                                    <p class="text-gray-700 leading-relaxed mb-6">
                                        "Luna recibió su vacunación anual y el trato fue excepcional. Las instalaciones son muy limpias y modernas. Volveremos sin duda."
                                    </p>
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full flex items-center justify-center">
                                            <span class="text-xl font-bold text-white">MG</span>
                                        </div>
                                        <div>
                                            <p class="font-bold text-gray-900">María García</p>
                                            <p class="text-sm text-gray-600">Dueña de Luna</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Testimonial 3 -->
                                <div class="bg-white border border-gray-200 rounded-xl p-8 shadow-sm hover:shadow-lg transition-shadow">
                                    <div class="flex items-center gap-1 mb-4">
                                        <i class="ph-fill ph-star text-amber-400 text-xl"></i>
                                        <i class="ph-fill ph-star text-amber-400 text-xl"></i>
                                        <i class="ph-fill ph-star text-amber-400 text-xl"></i>
                                        <i class="ph-fill ph-star text-amber-400 text-xl"></i>
                                        <i class="ph-fill ph-star text-amber-400 text-xl"></i>
                                    </div>
                                    <div class="mb-6">
                                        <i class="ph-fill ph-quotes text-5xl text-emerald-100"></i>
                                    </div>
                                    <p class="text-gray-700 leading-relaxed mb-6">
                                        "El servicio de urgencias 24/7 nos salvó cuando Rocky tuvo una emergencia. Personal profesional y muy empático. ¡Gracias por todo!"
                                    </p>
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center">
                                            <span class="text-xl font-bold text-white">CL</span>
                                        </div>
                                        <div>
                                            <p class="font-bold text-gray-900">Carlos López</p>
                                            <p class="text-sm text-gray-600">Dueño de Rocky</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Team Gallery Section -->
            <div class="py-24 bg-gray-50">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center max-w-3xl mx-auto mb-16">
                        <span class="text-emerald-700 font-bold uppercase text-sm tracking-wider">Nuestro Equipo</span>
                        <h2 class="mt-3 text-4xl lg:text-5xl font-extrabold text-gray-900">Profesionales Certificados</h2>
                        <p class="mt-4 text-xl text-gray-600">Equipo dedicado al bienestar de tus mascotas con años de experiencia.</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                        <!-- Team Member 1 -->
                        <div class="bg-white border border-gray-200 rounded-xl overflow-hidden hover:shadow-lg transition-shadow">
                            <div class="relative h-64 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?w=400&h=500&fit=crop" 
                                     alt="Veterinario profesional" 
                                     class="w-full h-full object-cover">
                            </div>
                            <div class="p-6 text-center">
                                <h4 class="text-xl font-bold text-gray-900">Dr. Juan Pérez</h4>
                                <p class="text-emerald-700 font-semibold text-sm mt-1">Veterinario Principal</p>
                                <p class="text-gray-600 text-sm mt-3">Especialista en medicina interna con 15 años de experiencia.</p>
                            </div>
                        </div>

                        <!-- Team Member 2 -->
                        <div class="bg-white border border-gray-200 rounded-xl overflow-hidden hover:shadow-lg transition-shadow">
                            <div class="relative h-64 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1594824476967-48c8b964273f?w=400&h=500&fit=crop" 
                                     alt="Veterinaria profesional" 
                                     class="w-full h-full object-cover">
                            </div>
                            <div class="p-6 text-center">
                                <h4 class="text-xl font-bold text-gray-900">Dra. María García</h4>
                                <p class="text-emerald-700 font-semibold text-sm mt-1">Cirujana Veterinaria</p>
                                <p class="text-gray-600 text-sm mt-3">Experta en cirugías de alta complejidad y cuidados críticos.</p>
                            </div>
                        </div>

                        <!-- Team Member 3 -->
                        <div class="bg-white border border-gray-200 rounded-xl overflow-hidden hover:shadow-lg transition-shadow">
                            <div class="relative h-64 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?w=400&h=500&fit=crop" 
                                     alt="Equipo veterinario" 
                                     class="w-full h-full object-cover">
                            </div>
                            <div class="p-6 text-center">
                                <h4 class="text-xl font-bold text-gray-900">Dr. Carlos López</h4>
                                <p class="text-emerald-700 font-semibold text-sm mt-1">Especialista en Emergencias</p>
                                <p class="text-gray-600 text-sm mt-3">Responsable del servicio de urgencias 24/7.</p>
                            </div>
                        </div>

                        <!-- Team Member 4 -->
                        <div class="bg-white border border-gray-200 rounded-xl overflow-hidden hover:shadow-lg transition-shadow">
                            <div class="relative h-64 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1551601651-2a8555f1a136?w=400&h=500&fit=crop" 
                                     alt="Personal veterinario" 
                                     class="w-full h-full object-cover">
                            </div>
                            <div class="p-6 text-center">
                                <h4 class="text-xl font-bold text-gray-900">Dra. Ana Martínez</h4>
                                <p class="text-emerald-700 font-semibold text-sm mt-1">Medicina Preventiva</p>
                                <p class="text-gray-600 text-sm mt-3">Especializada en vacunación y salud preventiva.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="bg-emerald-900 text-white py-12 mt-auto">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex flex-col md:flex-row justify-between items-center">
                        <div class="mb-4 md:mb-0">
                            <div class="flex items-center gap-2 mb-2">
                                <div class="flex items-center justify-center w-10 h-10 bg-emerald-700 rounded-lg">
                                    <i class="ph-bold ph-heart text-white text-xl"></i>
                                </div>
                                <span class="text-xl font-bold">VetSystem</span>
                            </div>
                            <p class="text-emerald-200 text-sm">Cuidado profesional para tus mascotas</p>
                        </div>
                        <div class="text-emerald-200 text-sm">
                            &copy; {{ date('Y') }} VetSystem. Todos los derechos reservados.
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
