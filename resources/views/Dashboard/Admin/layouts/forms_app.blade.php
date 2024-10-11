<div class="admin-header flex justify-between items-center bg-[#2A334B] text-white py-4 px-6 rounded-lg">
    <a href="{{ route('admin.usuarios', ['tipo' => 'Administrador']) }}"
        class="tab-a {{ $tipo === 'Administrador' ? 'active' : '' }} add-admin-button flex items-center bg-white text-[#2A334B] py-2 px-4 rounded-full shadow-md hover:bg-gray-100">
        Administradores
    </a>
    <a href="{{ route('admin.usuarios', ['tipo' => 'Coordinador']) }}"
        class="tab-a {{ $tipo === 'Coordinador' ? 'active' : '' }} add-admin-button flex items-center bg-white text-[#2A334B] py-2 px-4 rounded-full shadow-md hover:bg-gray-100">
        Coordinadores
    </a>
    <a href="{{ route('admin.usuarios', ['tipo' => 'Voluntario']) }}"
        class="tab-a {{ $tipo === 'Voluntario' ? 'active' : '' }} add-admin-button flex items-center bg-white text-[#2A334B] py-2 px-4 rounded-full shadow-md hover:bg-gray-100">
        Voluntarios
    </a>
    <a href="{{ route('admin.usuarios', ['tipo' => 'Beneficiario']) }}"
        class="tab-a {{ $tipo === 'Beneficiario' ? 'active' : '' }} add-admin-button flex items-center bg-white text-[#2A334B] py-2 px-4 rounded-full shadow-md hover:bg-gray-100">
        Beneficiarios
    </a>
    @switch($tipo)
        @case('Administrador')
            <x-modal-form :btnTitulo="'Nuevo Administrador'" :tituloModal="'Agrega Nuevo Administrador'" :router="route('admin.store')" :btnDanger="'Cancelar'" :btnSuccess="'Confirmar'">
                <!-- Nombre -->
                <x-input-form-modal :name="'name'" :labelText="'Nombre:'" :type="'text'" :id="'name'"
                    placeholder="Nombre: " :maxLength="'255'" required>
                </x-input-form-modal>

                {{-- <!-- Apellido Paterno --> --}}
                <x-input-form-modal :name="'apellido_paterno'" :labelText="'Apellido Paterno:'" :type="'text'" :id="'apellido_paterno'"
                    placeholder="'Apellido Paterno'" :maxLength="'255'" required :value="old('apellido_paterno')" />

                {{-- <!-- Apellido Materno --> --}}
                <x-input-form-modal :name="'apellido_materno'" :labelText="'Apellido Materno:'" :type="'text'" :id="'apellido_materno'"
                    placeholder="'Apellido Materno'" :maxLength="'255'" required :value="old('apellido_materno')" />

                {{-- <!-- Fecha de Nacimiento --> --}}
                <x-input-form-modal :name="'fecha_nacimiento'" :labelText="'Fecha de Nacimiento:'" :type="'date'" :id="'fecha_nacimiento'" required
                    :value="old('fecha_nacimiento')" />

                {{-- <!-- Email --> --}}
                <x-input-form-modal :name="'email'" :labelText="'Correo Electrónico:'" :type="'email'" :id="'email'"
                    :maxLength="'255'" required :value="old('email')" />

                {{-- <!-- Contraseña --> --}}
                <x-input-form-modal :name="'password'" :labelText="'Contraseña:'" :type="'password'" :id="'password'" required
                    :value="old('password')" />

                {{-- <!-- Confirmar Contraseña --> --}}
                <x-input-form-modal :name="'password_confirmation'" :labelText="'Confirmar Contraseña:'" :type="'password'" :id="'password_confirmation'" required
                    :value="old('password_confirmation')" />

                {{-- <!-- País --> --}}
                <x-input-form-modal :name="'pais'" :labelText="'País:'" :type="'text'" :id="'pais'"
                    :maxLength="'100'" required :value="old('pais')" />

                {{-- <!-- Estado --> --}}
                <x-input-form-modal :name="'estado'" :labelText="'Estado:'" :type="'text'" :id="'estado'"
                    :maxLength="'100'" required :value="old('estado')" />

                {{-- <!-- Municipio --> --}}
                <x-input-form-modal :name="'municipio'" :labelText="'Municipio:'" :type="'text'" :id="'municipio'"
                    :maxLength="'100'" required :value="old('municipio')" />

                {{-- <!-- Código Postal --> --}}
                <x-input-form-modal :name="'cp'" :labelText="'Código Postal:'" :type="'text'" :id="'cp'"
                    :maxLength="'100'" required :value="old('cp')" />

                {{-- <!-- Dirección --> --}}
                <x-input-form-modal :name="'direccion'" :labelText="'Dirección:'" :type="'text'" :id="'direccion'"
                    :maxLength="'255'" required :value="old('direccion')" />

                {{-- <!-- Género --> --}}
                <div class="mb-4">
                    <label for="genero" class="block text-gray-700 font-bold mb-2">Género:</label>
                    <select id="genero" name="genero" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="M" {{ old('genero') == 'M' ? 'selected' : '' }}>Masculino</option>
                        <option value="F" {{ old('genero') == 'F' ? 'selected' : '' }}>Femenino</option>
                        <option value="O" {{ old('genero') == 'O' ? 'selected' : '' }}>Otro</option>
                    </select>
                </div>

                {{-- <!-- Teléfono --> --}}
                <x-input-form-modal :name="'telefono'" :labelText="'Teléfono:'" :type="'text'" :id="'telefono'"
                    :maxLength="'20'" required :value="old('telefono')" />

                {{-- <!-- Hora Inicio --> --}}
                <x-input-form-modal :name="'hora_inicio'" :labelText="'Hora Inicio:'" :type="'time'" :id="'hora_inicio'" required
                    :value="old('hora_inicio')" />

                {{-- <!-- Hora Fin --> --}}
                <x-input-form-modal :name="'hora_fin'" :labelText="'Hora Fin:'" :type="'time'" :id="'hora_fin'" required
                    :value="old('hora_fin')" />


            </x-modal-form>
        @break

        @case('Coordinador')
            <x-modal-form :btnTitulo="'Nuevo Coordinador'" :tituloModal="'Agrega Nuevo Coordinador'" :router="route('coordinador.store')" :btnDanger="'Cancelar'" :btnSuccess="'Confirmar'">
                <!-- Nombre -->
                <x-input-form-modal :name="'name'" :labelText="'Nombre:'" :type="'text'" :id="'name'"
                    placeholder="Nombre: " :maxLength="'255'" required>
                </x-input-form-modal>

                {{-- <!-- Apellido Paterno --> --}}
                <x-input-form-modal :name="'apellido_paterno'" :labelText="'Apellido Paterno:'" :type="'text'" :id="'apellido_paterno'"
                    placeholder="'Apellido Paterno'" :maxLength="'255'" required :value="old('apellido_paterno')" />

                {{-- <!-- Apellido Materno --> --}}
                <x-input-form-modal :name="'apellido_materno'" :labelText="'Apellido Materno:'" :type="'text'" :id="'apellido_materno'"
                    placeholder="'Apellido Materno'" :maxLength="'255'" required :value="old('apellido_materno')" />

                {{-- <!-- Fecha de Nacimiento --> --}}
                <x-input-form-modal :name="'fecha_nacimiento'" :labelText="'Fecha de Nacimiento:'" :type="'date'" :id="'fecha_nacimiento'" required
                    :value="old('fecha_nacimiento')" />

                {{-- <!-- Email --> --}}
                <x-input-form-modal :name="'email'" :labelText="'Correo Electrónico:'" :type="'email'" :id="'email'"
                    :maxLength="'255'" required :value="old('email')" />

                {{-- <!-- Contraseña --> --}}
                <x-input-form-modal :name="'password'" :labelText="'Contraseña:'" :type="'password'" :id="'password'" required
                    :value="old('password')" />

                {{-- <!-- Confirmar Contraseña --> --}}
                <x-input-form-modal :name="'password_confirmation'" :labelText="'Confirmar Contraseña:'" :type="'password'" :id="'password_confirmation'" required
                    :value="old('password_confirmation')" />

                {{-- <!-- País --> --}}
                <x-input-form-modal :name="'pais'" :labelText="'País:'" :type="'text'" :id="'pais'"
                    :maxLength="'100'" required :value="old('pais')" />

                {{-- <!-- Estado --> --}}
                <x-input-form-modal :name="'estado'" :labelText="'Estado:'" :type="'text'" :id="'estado'"
                    :maxLength="'100'" required :value="old('estado')" />

                {{-- <!-- Municipio --> --}}
                <x-input-form-modal :name="'municipio'" :labelText="'Municipio:'" :type="'text'" :id="'municipio'"
                    :maxLength="'100'" required :value="old('municipio')" />

                {{-- <!-- Código Postal --> --}}
                <x-input-form-modal :name="'cp'" :labelText="'Código Postal:'" :type="'text'" :id="'cp'"
                    :maxLength="'100'" required :value="old('cp')" />

                {{-- <!-- Dirección --> --}}
                <x-input-form-modal :name="'direccion'" :labelText="'Dirección:'" :type="'text'" :id="'direccion'"
                    :maxLength="'255'" required :value="old('direccion')" />

                {{-- <!-- Género --> --}}
                <div class="mb-4">
                    <label for="genero" class="block text-gray-700 font-bold mb-2">Género:</label>
                    <select id="genero" name="genero" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="M" {{ old('genero') == 'M' ? 'selected' : '' }}>Masculino</option>
                        <option value="F" {{ old('genero') == 'F' ? 'selected' : '' }}>Femenino</option>
                        <option value="O" {{ old('genero') == 'O' ? 'selected' : '' }}>Otro</option>
                    </select>
                </div>

                {{-- <!-- Teléfono --> --}}
                <x-input-form-modal :name="'telefono'" :labelText="'Teléfono:'" :type="'text'" :id="'telefono'"
                    :maxLength="'20'" required :value="old('telefono')" />

                {{-- <!-- Hora Inicio --> --}}
                <x-input-form-modal :name="'hora_inicio'" :labelText="'Hora Inicio:'" :type="'time'" :id="'hora_inicio'" required
                    :value="old('hora_inicio')" />

                {{-- <!-- Hora Fin --> --}}
                <x-input-form-modal :name="'hora_fin'" :labelText="'Hora Fin:'" :type="'time'" :id="'hora_fin'" required
                    :value="old('hora_fin')" />


            </x-modal-form>
        @break

        @default
            
    @endswitch
</div>
