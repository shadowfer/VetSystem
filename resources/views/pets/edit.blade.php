<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <a href="{{ route('pets.index') }}" class="mr-4 text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
            </a>
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">
                Editar Mascota
            </h2>
        </div>
    </x-slot>

    <div class="max-w-3xl">
        <div class="overflow-hidden bg-white border border-gray-200 shadow-sm rounded-xl">
            <div class="px-6 py-5 border-b border-gray-200 bg-gradient-to-r from-yellow-50 to-yellow-100">
                <div class="flex items-center">
                    <div class="flex items-center justify-center flex-shrink-0 w-12 h-12 bg-white rounded-full shadow">
                        <svg class="w-6 h-6 text-yellow-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-900">{{ $pet->name }}</h3>
                        <p class="text-sm text-gray-600">Actualiza la información de esta mascota</p>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('pets.update', $pet) }}" class="p-6 space-y-6">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nombre *</label>
                    <div class="mt-1">
                        <input type="text" name="name" id="name" value="{{ old('name', $pet->name) }}" required autofocus
                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm transition-colors @error('name') border-red-300 @enderror">
                    </div>
                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Species -->
                <div>
                    <label for="species" class="block text-sm font-medium text-gray-700">Especie *</label>
                    <div class="mt-1">
                        <input type="text" name="species" id="species" value="{{ old('species', $pet->species) }}" required
                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm transition-colors @error('species') border-red-300 @enderror">
                    </div>
                    @error('species')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Age -->
                <div>
                    <label for="age" class="block text-sm font-medium text-gray-700">Edad (años) *</label>
                    <div class="mt-1">
                        <input type="number" name="age" id="age" value="{{ old('age', $pet->age) }}" required min="0" max="50"
                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm transition-colors @error('age') border-red-300 @enderror">
                    </div>
                    @error('age')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Form Actions -->
                <div class="flex items-center justify-end pt-6 space-x-4 border-t border-gray-200">
                    <a href="{{ route('pets.index') }}" 
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-colors">
                        Cancelar
                    </a>
                    <button type="submit" 
                        class="inline-flex items-center px-6 py-2 text-sm font-medium text-white bg-gradient-to-r from-yellow-500 to-yellow-600 border border-transparent rounded-lg shadow-sm hover:from-yellow-600 hover:to-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-all">
                        <svg class="w-5 h-5 mr-2 -ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                        </svg>
                        Actualizar Mascota
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
