<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <a href="{{ route('services.index') }}" class="mr-4 text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
            </a>
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">
                {{ $service->name }}
            </h2>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Hero Image & Description -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="h-64 sm:h-80 overflow-hidden relative">
                        @if($service->image)
                            <img src="{{ $service->image }}" alt="{{ $service->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-emerald-100 to-emerald-200 flex items-center justify-center">
                                <svg class="w-24 h-24 text-emerald-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                        <div class="absolute bottom-6 left-6 text-white">
                            <h1 class="text-3xl font-bold text-shadow">{{ $service->name }}</h1>
                            <p class="text-emerald-200 font-medium text-lg">Servicio Profesional</p>
                        </div>
                    </div>
                    <div class="p-8">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Descripción del Servicio</h3>
                        <div class="prose prose-emerald max-w-none text-gray-600 leading-relaxed">
                            {{ $service->description }}
                        </div>
                        
                        <div class="mt-8 pt-8 border-t border-gray-100">
                            <h4 class="text-lg font-bold text-gray-900 mb-4">Beneficios Clave</h4>
                            <ul class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <li class="flex items-start">
                                    <div class="flex-shrink-0 w-6 h-6 rounded-full bg-emerald-100 flex items-center justify-center mt-0.5">
                                        <svg class="w-4 h-4 text-emerald-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <span class="ml-3 text-gray-600">Atención personalizada</span>
                                </li>
                                <li class="flex items-start">
                                    <div class="flex-shrink-0 w-6 h-6 rounded-full bg-emerald-100 flex items-center justify-center mt-0.5">
                                        <svg class="w-4 h-4 text-emerald-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <span class="ml-3 text-gray-600">Profesionales certificados</span>
                                </li>
                                <li class="flex items-start">
                                    <div class="flex-shrink-0 w-6 h-6 rounded-full bg-emerald-100 flex items-center justify-center mt-0.5">
                                        <svg class="w-4 h-4 text-emerald-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <span class="ml-3 text-gray-600">Equipamiento moderno</span>
                                </li>
                                <li class="flex items-start">
                                    <div class="flex-shrink-0 w-6 h-6 rounded-full bg-emerald-100 flex items-center justify-center mt-0.5">
                                        <svg class="w-4 h-4 text-emerald-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <span class="ml-3 text-gray-600">Seguimiento post-consulta</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Testimonials -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Lo que dicen nuestros clientes</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Testimonial 1 -->
                        <div class="bg-gray-50 rounded-xl p-6 relative">
                            <svg class="absolute top-4 left-4 w-8 h-8 text-gray-200 transform -scale-x-100" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true">
                                <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
                            </svg>
                            <p class="relative text-gray-600 italic mb-4 z-10">
                                "Excelente servicio, trataron a mi mascota con mucho cariño y profesionalismo. Totalmente recomendado."
                            </p>
                            <div class="flex items-center">
                                <div class="flex-shrink-0 w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600 font-bold">
                                    M
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">María González</p>
                                    <div class="flex text-yellow-400 text-xs">
                                        ★★★★★
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Testimonial 2 -->
                        <div class="bg-gray-50 rounded-xl p-6 relative">
                            <svg class="absolute top-4 left-4 w-8 h-8 text-gray-200 transform -scale-x-100" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true">
                                <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
                            </svg>
                            <p class="relative text-gray-600 italic mb-4 z-10">
                                "Las instalaciones son de primera y el personal muy atento. Me sentí muy seguro dejando a mi perro aquí."
                            </p>
                            <div class="flex items-center">
                                <div class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold">
                                    C
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">Carlos Ruiz</p>
                                    <div class="flex text-yellow-400 text-xs">
                                        ★★★★★
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar / CTA -->
            <div class="space-y-6">
                <!-- Booking Card -->
                <div class="bg-white rounded-2xl shadow-lg border border-emerald-100 p-6 sticky top-8">
                    <div class="text-center mb-6">
                        <span class="inline-block px-4 py-1.5 rounded-full bg-emerald-50 text-emerald-700 text-sm font-bold mb-2">
                            Disponible
                        </span>
                        <h3 class="text-2xl font-bold text-gray-900">${{ number_format($service->price, 2) }}</h3>
                        <p class="text-gray-500 text-sm">Precio estimado por sesión</p>
                    </div>

                    <div class="space-y-4 mb-6">
                        <div class="flex items-center text-sm text-gray-600">
                            <svg class="w-5 h-5 text-emerald-500 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Duración: 30 - 60 min</span>
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <svg class="w-5 h-5 text-emerald-500 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                            </svg>
                            <span>Lunes a Sábado</span>
                        </div>
                    </div>

                    <a href="#" class="block w-full py-3 px-4 bg-gradient-to-r from-emerald-600 to-emerald-700 hover:from-emerald-700 hover:to-emerald-800 text-white font-bold text-center rounded-xl shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">
                        Solicitar Servicio
                    </a>
                    <p class="text-xs text-center text-gray-400 mt-4">
                        * El precio final puede variar según las necesidades específicas de la mascota.
                    </p>
                </div>

                <!-- Contact Info -->
                <div class="bg-blue-50 rounded-2xl p-6 border border-blue-100">
                    <h4 class="font-bold text-blue-900 mb-2">¿Tienes dudas?</h4>
                    <p class="text-sm text-blue-700 mb-4">
                        Nuestro equipo está listo para ayudarte a elegir el mejor servicio para tu mascota.
                    </p>
                    <a href="#" class="text-sm font-bold text-blue-600 hover:text-blue-800 flex items-center">
                        Contáctanos
                        <svg class="w-4 h-4 ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
