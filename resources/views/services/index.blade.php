<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-emerald-600 font-bold uppercase text-sm tracking-wider">Nuestros Servicios</span>
                <h2 class="mt-3 text-4xl font-extrabold text-gray-900">Cuidado Integral para tu Mascota</h2>
                <p class="mt-4 text-xl text-gray-600">Ofrecemos una amplia gama de servicios veterinarios especializados para garantizar la salud y felicidad de tu compañero.</p>
            </div>

            <!-- Services Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Service Card 1 -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden group hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <div class="h-48 overflow-hidden relative">
                        <img src="{{ asset('images/services/consultas.png') }}" alt="Consultas" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <div class="p-8">
                        <div class="w-14 h-14 bg-gradient-to-br from-emerald-400 to-emerald-600 text-white rounded-2xl flex items-center justify-center -mt-16 relative z-10 shadow-lg shadow-emerald-500/30 mb-6 group-hover:scale-110 transition-transform duration-300">
                            <i class="ph-bold ph-stethoscope text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Consultas Médicas</h3>
                        <p class="text-gray-600 mb-6 line-clamp-3">
                            Evaluación completa de la salud de tu mascota. Nuestros veterinarios expertos realizan chequeos exhaustivos para detectar y prevenir cualquier problema de salud.
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-emerald-700 font-bold">Desde $30.00</span>
                            <a href="#" class="text-emerald-600 font-semibold hover:text-emerald-700 flex items-center group/link">
                                Ver Detalles <i class="ph-bold ph-arrow-right ml-2 group-hover/link:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Service Card 2 -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden group hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <div class="h-48 overflow-hidden relative">
                        <img src="{{ asset('images/services/vacunacion.png') }}" alt="Vacunación" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <div class="p-8">
                        <div class="w-14 h-14 bg-gradient-to-br from-blue-400 to-blue-600 text-white rounded-2xl flex items-center justify-center -mt-16 relative z-10 shadow-lg shadow-blue-500/30 mb-6 group-hover:scale-110 transition-transform duration-300">
                            <i class="ph-bold ph-syringe text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Vacunación</h3>
                        <p class="text-gray-600 mb-6 line-clamp-3">
                            Mantén a tu mascota protegida contra enfermedades comunes. Ofrecemos esquemas de vacunación completos y personalizados para perros y gatos.
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-emerald-700 font-bold">Desde $25.00</span>
                            <a href="#" class="text-emerald-600 font-semibold hover:text-emerald-700 flex items-center group/link">
                                Ver Detalles <i class="ph-bold ph-arrow-right ml-2 group-hover/link:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Service Card 3 -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden group hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <div class="h-48 overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1516734212186-a967f81ad0d7?w=600&h=400&fit=crop" alt="Peluquería" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <div class="p-8">
                        <div class="w-14 h-14 bg-gradient-to-br from-purple-400 to-purple-600 text-white rounded-2xl flex items-center justify-center -mt-16 relative z-10 shadow-lg shadow-purple-500/30 mb-6 group-hover:scale-110 transition-transform duration-300">
                            <i class="ph-bold ph-scissors text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Peluquería y Spa</h3>
                        <p class="text-gray-600 mb-6 line-clamp-3">
                            Servicios de estética profesional. Baño, corte, limpieza de oídos y corte de uñas para que tu mascota luzca y se sienta increíble.
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-emerald-700 font-bold">Desde $35.00</span>
                            <a href="#" class="text-emerald-600 font-semibold hover:text-emerald-700 flex items-center group/link">
                                Ver Detalles <i class="ph-bold ph-arrow-right ml-2 group-hover/link:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Service Card 4 -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden group hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <div class="h-48 overflow-hidden relative">
                        <img src="{{ asset('images/services/cirugia.png') }}" alt="Cirugía" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <div class="p-8">
                        <div class="w-14 h-14 bg-gradient-to-br from-red-400 to-red-600 text-white rounded-2xl flex items-center justify-center -mt-16 relative z-10 shadow-lg shadow-red-500/30 mb-6 group-hover:scale-110 transition-transform duration-300">
                            <i class="ph-bold ph-heartbeat text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Cirugía Especializada</h3>
                        <p class="text-gray-600 mb-6 line-clamp-3">
                            Quirófano equipado con tecnología de punta. Realizamos cirugías de tejidos blandos, ortopedia y esterilizaciones con monitoreo constante.
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-emerald-700 font-bold">Tarifa variable</span>
                            <a href="#" class="text-emerald-600 font-semibold hover:text-emerald-700 flex items-center group/link">
                                Ver Detalles <i class="ph-bold ph-arrow-right ml-2 group-hover/link:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Service Card 5 -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden group hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <div class="h-48 overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1582719508461-905c673771fd?w=600&h=400&fit=crop" alt="Laboratorio" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <div class="p-8">
                        <div class="w-14 h-14 bg-gradient-to-br from-amber-400 to-amber-600 text-white rounded-2xl flex items-center justify-center -mt-16 relative z-10 shadow-lg shadow-amber-500/30 mb-6 group-hover:scale-110 transition-transform duration-300">
                            <i class="ph-bold ph-flask text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Laboratorio Clínico</h3>
                        <p class="text-gray-600 mb-6 line-clamp-3">
                            Análisis de sangre, orina y heces con resultados rápidos y precisos para un diagnóstico oportuno y tratamiento efectivo.
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-emerald-700 font-bold">Desde $40.00</span>
                            <a href="#" class="text-emerald-600 font-semibold hover:text-emerald-700 flex items-center group/link">
                                Ver Detalles <i class="ph-bold ph-arrow-right ml-2 group-hover/link:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Service Card 6 -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden group hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <div class="h-48 overflow-hidden relative">
                        <img src="{{ asset('images/services/odontologia.png') }}" alt="Odontología" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <div class="p-8">
                        <div class="w-14 h-14 bg-gradient-to-br from-cyan-400 to-cyan-600 text-white rounded-2xl flex items-center justify-center -mt-16 relative z-10 shadow-lg shadow-cyan-500/30 mb-6 group-hover:scale-110 transition-transform duration-300">
                            <i class="ph-bold ph-tooth text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Odontología</h3>
                        <p class="text-gray-600 mb-6 line-clamp-3">
                            Limpieza dental (profilaxis), extracciones y tratamiento de enfermedades periodontales para una sonrisa saludable.
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-emerald-700 font-bold">Desde $50.00</span>
                            <a href="#" class="text-emerald-600 font-semibold hover:text-emerald-700 flex items-center group/link">
                                Ver Detalles <i class="ph-bold ph-arrow-right ml-2 group-hover/link:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
