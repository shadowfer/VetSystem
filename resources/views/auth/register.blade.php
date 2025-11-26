<x-guest-layout containerClass="w-full max-w-5xl bg-white shadow-2xl overflow-hidden rounded-2xl flex flex-col md:flex-row p-0 my-8 mx-4">
    <!-- Left Side: Image -->
    <div class="hidden md:block md:w-1/2 relative min-h-[600px]">
        <img src="https://images.unsplash.com/photo-1551601651-2a8555f1a136?w=800&h=1000&fit=crop" 
             alt="Veterinario" 
             class="w-full h-full object-cover absolute inset-0">
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent flex flex-col justify-end p-12">
            <h2 class="text-4xl font-bold text-white mb-4 leading-tight">Únete a Nuestra Comunidad</h2>
            <p class="text-2xl text-emerald-200 font-medium">Cuidado Profesional.</p>
        </div>
    </div>

    <!-- Right Side: Form -->
    <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center bg-white">
        <div class="flex flex-col items-center mb-8">
            <div class="w-16 h-16 bg-emerald-50 rounded-full flex items-center justify-center mb-4">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="w-10 h-10 rounded-full object-cover">
            </div>
            <h1 class="text-3xl font-bold text-gray-900">Crear Cuenta</h1>
            <p class="text-gray-500 mt-2">Únete a VetSystem</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <!-- Name -->
            <div>
                <x-text-input id="name" 
                             class="block w-full rounded-full border-gray-300 focus:border-emerald-500 focus:ring-emerald-500 px-5 py-3" 
                             type="text" 
                             name="name" 
                             :value="old('name')" 
                             required autofocus autocomplete="name" 
                             placeholder="Nombre Completo" />
                <x-input-error :messages="$errors->get('name')" class="mt-2 ml-4" />
            </div>

            <!-- Email Address -->
            <div>
                <x-text-input id="email" 
                             class="block w-full rounded-full border-gray-300 focus:border-emerald-500 focus:ring-emerald-500 px-5 py-3" 
                             type="email" 
                             name="email" 
                             :value="old('email')" 
                             required autocomplete="username" 
                             placeholder="Correo Electrónico" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 ml-4" />
            </div>

            <!-- Password -->
            <div>
                <x-text-input id="password" 
                             class="block w-full rounded-full border-gray-300 focus:border-emerald-500 focus:ring-emerald-500 px-5 py-3" 
                             type="password" 
                             name="password" 
                             required autocomplete="new-password" 
                             placeholder="Contraseña" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 ml-4" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-text-input id="password_confirmation" 
                             class="block w-full rounded-full border-gray-300 focus:border-emerald-500 focus:ring-emerald-500 px-5 py-3" 
                             type="password" 
                             name="password_confirmation" 
                             required autocomplete="new-password" 
                             placeholder="Confirmar Contraseña" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 ml-4" />
            </div>

            <div class="pt-2">
                <button type="submit" class="w-full bg-amber-400 hover:bg-amber-500 text-white font-bold py-3 px-4 rounded-full shadow-lg hover:shadow-xl transition-all duration-200 transform hover:-translate-y-0.5">
                    {{ __('Registrarse') }}
                </button>
            </div>

            <div class="text-center mt-6">
                <p class="text-sm text-gray-500">
                    ¿Ya tienes cuenta? 
                    <a href="{{ route('login') }}" class="font-bold text-emerald-600 hover:text-emerald-700 transition-colors">
                        Iniciar Sesión
                    </a>
                </p>
            </div>
            
            <div class="text-center mt-8">
                <p class="text-xs text-gray-400">© {{ date('Y') }} VetSystem</p>
            </div>
        </form>
    </div>
</x-guest-layout>
