<x-guest-layout>
    <section class="w-full max-w-[90%] md:max-w-[300px] mx-auto p-5">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Formulario de inicio de sesión -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Input de Usuario/Email -->
            <label for="email"></label>
            <div class="relative w-full mb-5 rounded-[15px]">
                <i class="fa-regular fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                <input type="email" id="email" name="email" placeholder="Usuario" value="{{ old('email') }}"
                    required autofocus class="w-full py-2 pl-10 pr-2 bg-[#eaeff3] rounded-[15px] shadow-inner">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Input de Contraseña -->
            <label for="password"></label>
            <div class="relative w-full mb-5 rounded-[15px]">
                <i class="fa-solid fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                <input type="password" id="password" name="password" placeholder="Contraseña" required
                    class="w-full py-2 pl-10 pr-2 bg-[#eaeff3] rounded-[15px] shadow-inner">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Recordar sesión 
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
            -->
            <div class="relative w-full mb-5 rounded-[15px]">
                <i class="fa-solid fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                <a href="{{ route('terminosCondiciones.index') }}">Terminos y Condiciones</a>
            </div>

            <!-- Botón de enviar -->
            <button type="submit"
                class="w-full py-2 text-white bg-[#283859] rounded-[15px] shadow-inner transform transition-transform duration-300 hover:scale-105">
                Iniciar Sesión
            </button>
             
            <!-- Enlace de "¿Olvidaste tu contraseña?" -->
            @if (Route::has('password.request'))
            <!--
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mt-4 inline-block"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}

                </a>
                -->
            @endif
        </form>
    </section>
</x-guest-layout>
