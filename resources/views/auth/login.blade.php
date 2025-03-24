<x-guest-layout >
    <div class="flex min-h-screen" style="background:#E9E9EF;">
        <style>
            .w-full.sm\:max-w-md.mt-6.px-6.py-4.bg-white.shadow-md.overflow-hidden.sm\:rounded-lg {
                background: #E9E9EF;
                box-shadow: none !important;
                margin-top:130px !important;
                margin-left:150px;
            }
        </style>
        <!-- Columna izquierda: Información de la empresa (40%) -->
        <div class="w-2/5 bg-gray-200 p-10 flex flex-col justify-center items-center">
            <div class="text-center">
                <img src="/images/logo-black.png" alt="logo" class="flex h-8" style="width:600px;height:auto;">
                <span class="mt-4 px-4 py-2 bg-cyan-500 text-white text-sm" style="margin-top:50px !important;">
                    Sistema de Pago de Planillas RRHH
                </span>
            </div>
        </div>

        <!-- Columna derecha: Formulario de inicio de sesión (60%) -->
        <div class="w-2/5 bg-white p-12 shadow-lg rounded-lg" >
            <h2 class="text-2xl font-bold text-gray-800 text-center">Iniciar Sesión</h2>
            <p class="text-gray-600 text-center mt-2">Ingresa tu información para acceder</p>

            <form method="POST" action="{{ route('login') }}" class="mt-6">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Correo electrónico')" class="text-gray-700"/>
                    <x-text-input id="email" class="block w-full mt-1 p-3 border border-gray-300 rounded-lg focus:ring-cyan-500"
                                  type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm"/>
                </div>

                <!-- Contraseña -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Contraseña')" class="text-gray-700"/>
                    <div class="relative">
                        <x-text-input id="password" class="block w-full mt-1 p-3 border border-gray-300 rounded-lg focus:ring-cyan-500"
                                      type="password" name="password" required />
                        <span class="absolute inset-y-0 right-3 flex items-center cursor-pointer">
                            <i class="fas fa-eye text-gray-500"></i>
                        </span>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm"/>
                </div>

                <!-- Recordar sesión -->
                <div class="flex items-center justify-between mb-4">
                    <label for="remember_me" class="flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-cyan-600 focus:ring-cyan-500" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Recuérdame') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-cyan-500 hover:underline" href="{{ route('password.request') }}">
                            {{ __('¿Olvidaste tu contraseña?') }}
                        </a>
                    @endif
                </div>

                <!-- Botón -->
                <x-primary-button class="w-full bg-cyan-500 text-white py-3 rounded-lg hover:bg-cyan-600 transition">
                    {{ __('Ingresar') }}
                </x-primary-button>
            </form>

            <p class="text-xs text-gray-500 text-center mt-6">
                Copyright © 2025 INFOP VIRTUAL. Todos los derechos reservados.
            </p>
        </div>
    </div>
</x-guest-layout>
