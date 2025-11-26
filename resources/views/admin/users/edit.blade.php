<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <a href="{{ route('admin.users.index') }}" class="mr-4 text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
            </a>
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">
                Editar Usuario
            </h2>
        </div>
    </x-slot>

    <div class="max-w-3xl">
        <div class="overflow-hidden bg-white border border-gray-200 shadow-sm rounded-xl">
            <div class="px-6 py-5 border-b border-gray-200 bg-gradient-to-r from-yellow-50 to-yellow-100">
                <div class="flex items-center">
                    <div class="flex items-center justify-center flex-shrink-0 w-12 h-12 bg-white rounded-full shadow">
                        <div class="flex items-center justify-center w-10 h-10 text-sm font-semibold text-white bg-gradient-to-br from-teal-500 to-teal-600 rounded-full">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-900">{{ $user->name }}</h3>
                        <p class="text-sm text-gray-600">{{ $user->email }}</p>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('admin.users.update', $user) }}" class="p-6 space-y-6">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nombre Completo *</label>
                    <div class="mt-1">
                        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required autofocus
                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm transition-colors @error('name') border-red-300 @enderror">
                    </div>
                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico *</label>
                    <div class="mt-1">
                        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required
                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm transition-colors @error('email') border-red-300 @enderror">
                    </div>
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Role -->
                <div>
                    <label for="role" class="block text-sm font-medium text-gray-700">Rol *</label>
                    <div class="mt-1">
                        <select id="role" name="role" required
                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm transition-colors @error('role') border-red-300 @enderror">
                            <option value="client" {{ $user->role === 'client' ? 'selected' : '' }}>Cliente</option>
                            <option value="staff" {{ $user->role === 'staff' ? 'selected' : '' }}>Staff</option>
                            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>
                    @error('role')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Is Active -->
                <div class="relative flex items-start p-4 bg-gray-50 rounded-lg border border-gray-200">
                    <div class="flex items-center h-5">
                        <input id="is_active" name="is_active" type="checkbox" value="1" {{ $user->is_active ? 'checked' : '' }}
                            class="w-4 h-4 text-teal-600 border-gray-300 rounded focus:ring-teal-500">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="is_active" class="font-medium text-gray-700">Cuenta Activa</label>
                        <p class="text-gray-500">Marque esta casilla para mantener la cuenta activa en el sistema</p>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex items-center justify-end pt-6 space-x-4 border-t border-gray-200">
                    <a href="{{ route('admin.users.index') }}" 
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-colors">
                        Cancelar
                    </a>
                    <button type="submit" 
                        class="inline-flex items-center px-6 py-2 text-sm font-medium text-white bg-gradient-to-r from-yellow-500 to-yellow-600 border border-transparent rounded-lg shadow-sm hover:from-yellow-600 hover:to-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-all">
                        <svg class="w-5 h-5 mr-2 -ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                        </svg>
                        Actualizar Usuario
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
