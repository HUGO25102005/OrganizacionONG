<x-guest-layout>
    <div class="w-full space-y-4">
        <form method="POST" action="{{ route('register') }}"
            class="max-w-md mx-auto mt-8 p-6 bg-white rounded-lg shadow-md">
            @csrf

            <h2 class="text-2xl font-bold mb-6 text-center">{{ __('Register Administrator') }}</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4"> <!-- Cambiado a grid -->

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                        required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Apellido Paterno -->
                <div>
                    <x-input-label for="apellido_paterno" :value="__('Apellido Paterno')" />
                    <x-text-input id="apellido_paterno" class="block mt-1 w-full" type="text" name="apellido_paterno"
                        :value="old('apellido_paterno')" required />
                    <x-input-error :messages="$errors->get('apellido_paterno')" class="mt-2" />
                </div>

                <!-- Apellido Materno -->
                <div>
                    <x-input-label for="apellido_materno" :value="__('Apellido Materno')" />
                    <x-text-input id="apellido_materno" class="block mt-1 w-full" type="text" name="apellido_materno"
                        :value="old('apellido_materno')" required />
                    <x-input-error :messages="$errors->get('apellido_materno')" class="mt-2" />
                </div>

                <!-- Fecha de Nacimiento -->
                <div>
                    <x-input-label for="fecha_nacimiento" :value="__('Fecha de Nacimiento')" />
                    <x-text-input id="fecha_nacimiento" class="block mt-1 w-full" type="date" name="fecha_nacimiento"
                        :value="old('fecha_nacimiento')" required />
                    <x-input-error :messages="$errors->get('fecha_nacimiento')" class="mt-2" />
                </div>

                <!-- País -->
                <div>
                    <x-input-label for="pais" :value="__('País')" />
                    <x-text-input id="pais" class="block mt-1 w-full" type="text" name="pais"
                        :value="old('pais')" required />
                    <x-input-error :messages="$errors->get('pais')" class="mt-2" />
                </div>

                <!-- Estado -->
                <div>
                    <x-input-label for="estado" :value="__('Estado')" />
                    <x-text-input id="estado" class="block mt-1 w-full" type="text" name="estado"
                        :value="old('estado')" required />
                    <x-input-error :messages="$errors->get('estado')" class="mt-2" />
                </div>

                <!-- Municipio -->
                <div>
                    <x-input-label for="municipio" :value="__('Municipio')" />
                    <x-text-input id="municipio" class="block mt-1 w-full" type="text" name="municipio"
                        :value="old('municipio')" required />
                    <x-input-error :messages="$errors->get('municipio')" class="mt-2" />
                </div>

                <!-- Código Postal -->
                <div>
                    <x-input-label for="cp" :value="__('Código Postal')" />
                    <x-text-input id="cp" class="block mt-1 w-full" type="text" name="cp"
                        :value="old('cp')" required />
                    <x-input-error :messages="$errors->get('cp')" class="mt-2" />
                </div>

                <!-- Dirección -->
                <div>
                    <x-input-label for="direccion" :value="__('Dirección')" />
                    <x-text-input id="direccion" class="block mt-1 w-full" type="text" name="direccion"
                        :value="old('direccion')" required />
                    <x-input-error :messages="$errors->get('direccion')" class="mt-2" />
                </div>

                <!-- Género -->
                <div>
                    <x-input-label for="genero" :value="__('Género')" />
                    <select id="genero" name="genero"
                        class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        required>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                        <option value="O">Otro</option>
                    </select>
                    <x-input-error :messages="$errors->get('genero')" class="mt-2" />
                </div>

                <!-- Teléfono -->
                <div>
                    <x-input-label for="telefono" :value="__('Teléfono')" />
                    <x-text-input id="telefono" class="block mt-1 w-full" type="text" name="telefono"
                        :value="old('telefono')" required />
                    <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
                </div>

                <!-- Hora de Inicio -->
                <div>
                    <x-input-label for="hora_inicio" :value="__('Hora de Inicio')" />
                    <x-text-input id="hora_inicio" class="block mt-1 w-full" type="time" name="hora_inicio"
                        :value="old('hora_inicio')" required />
                    <x-input-error :messages="$errors->get('hora_inicio')" class="mt-2" />
                </div>

                <!-- Hora de Fin -->
                <div>
                    <x-input-label for="hora_fin" :value="__('Hora de Fin')" />
                    <x-text-input id="hora_fin" class="block mt-1 w-full" type="time" name="hora_fin"
                        :value="old('hora_fin')" required />
                    <x-input-error :messages="$errors->get('hora_fin')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
            </div>

            <div class="flex items-center justify-end mt-6">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ms-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>

    </div>
</x-guest-layout>
