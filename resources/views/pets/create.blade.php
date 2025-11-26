<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <a href="{{ route('pets.index') }}" class="mr-4 text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
            </a>
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">
                Agregar Nueva Mascota
            </h2>
        </div>
    </x-slot>

    <div class="max-w-3xl">
        <div class="overflow-hidden bg-white border border-gray-200 shadow-sm rounded-xl">
            <div class="px-6 py-5 border-b border-gray-200 bg-gradient-to-r from-blue-50 to-blue-100">
                <h3 class="text-lg font-semibold text-gray-900">Información de la Mascota</h3>
                <p class="mt-1 text-sm text-gray-600">Completa los datos de la nueva mascota</p>
            </div>

            <form method="POST" action="{{ route('pets.store') }}" class="p-6 space-y-6">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nombre *</label>
                    <div class="mt-1">
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus
                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition-colors @error('name') border-red-300 @enderror">
                    </div>
                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Species -->
                <div x-data="{ species: '{{ old('species') }}', otherSpecies: '' }">
                    <label for="species_select" class="block text-sm font-medium text-gray-700">Especie *</label>
                    <div class="mt-1">
                        <select name="species_select" id="species_select" x-model="species" required
                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition-colors">
                            <option value="" disabled selected>Selecciona una especie</option>
                            <option value="Perro">Perro</option>
                            <option value="Gato">Gato</option>
                            <option value="Ave">Ave</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>
                    
                    <!-- Hidden input to store the final value -->
                    <input type="hidden" name="species" :value="species === 'Otro' ? otherSpecies : species">

                    <!-- Other Species Input -->
                    <div class="mt-3" x-show="species === 'Otro'" x-transition>
                        <label for="other_species" class="block text-sm font-medium text-gray-700">Especificar Especie *</label>
                        <div class="mt-1">
                            <input type="text" id="other_species" x-model="otherSpecies"
                                placeholder="Ej. Reptil, Hámster, etc."
                                class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition-colors">
                        </div>
                    </div>

                    @error('species')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Age -->
                <div>
                    <label for="age" class="block text-sm font-medium text-gray-700">Edad (años) *</label>
                    <div class="mt-1">
                        <input type="number" name="age" id="age" value="{{ old('age') }}" required min="0" max="50"
                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition-colors @error('age') border-red-300 @enderror">
                    </div>
                    @error('age')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Form Actions -->
                <div class="flex items-center justify-end pt-6 space-x-4 border-t border-gray-200">
                    <a href="{{ route('pets.index') }}" 
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                        Cancelar
                    </a>
                    <button type="submit" 
                        class="inline-flex items-center px-6 py-2 text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-blue-700 border border-transparent rounded-lg shadow-sm hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all">
                        <svg class="w-5 h-5 mr-2 -ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                        </svg>
                        Guardar Mascota
                    </button>
                </div>
            </form>
        </div>

        <!-- Help Card -->
        <div class="p-4 mt-6 bg-blue-50 border border-blue-200 rounded-lg">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="w-5 h-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a.75.75 0 000 1.5h.253a.25.25 0 01.244.304l-.459 2.066A1.75 1.75 0 0010.747 15H11a.75.75 0 000-1.5h-.253a.25.25 0 01-.244-.304l.459-2.066A1.75 1.75 0 009.253 9H9z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-blue-800">Información Importante</h3>
                    <div class="mt-2 text-sm text-blue-700">
                        <p>Todos los campos marcados con (*) son obligatorios. Asegúrate de ingresar información precisa sobre la mascota.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
