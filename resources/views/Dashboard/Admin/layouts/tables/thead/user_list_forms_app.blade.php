
    <div class="bg-white p-4 rounded-lg shadow-md mb-6">
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center space-x-6">
                <!-- Filtro de rol -->
                <form action="{{ route('admin.usuarios') }}" method="POST" class="flex items-center justify-between mb-4">
                    @csrf
                    @method('GET')
                    <div class="flex items-center space-x-6">
                        <div class="w-48">
                            <label for="rol" class="block text-sm font-medium text-gray-700">Rol</label>
                            <select id="rol" name="rol"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="Administrador" {{ $rol == 'Administrador' ? 'selected' : '' }}>
                                    Administrador</option>
                                <option value="Coordinador" {{ $rol == 'Coordinador' ? 'selected' : '' }}>Coordinador
                                </option>
                                <option value="Voluntario" {{ $rol == 'Voluntario' ? 'selected' : '' }}>Voluntario
                                </option>
                                <option value="Beneficiario" {{ $rol == 'Beneficiario' ? 'selected' : '' }}>Beneficiario
                                </option>
                            </select>
                        </div>

                        <!-- Filtro de estado -->
                        <div class="w-48">
                            <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
                            <select id="estado" name="estado"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="1" {{ $estado == '1' ? 'selected' : '' }}>Activo</option>
                                <option value="2" {{ $estado == '2' ? 'selected' : '' }}>Desactivado</option>
                                <option value="4" {{ $estado == '3' ? 'selected' : '' }}>Suspendido</option>
                            </select>
                        </div>

                        <!-- Botón de agregar nuevo usuario -->
                        <div>
                            <button type="submit"
                                class="flex items-center px-4 py-2 bg-blue-400 text-black font-medium rounded-md shadow-sm hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-00">
                                Aplicar Filtros
                            </button>
                        </div>
                    </div>
                </form>
                <div class="">
                    @switch($rol)
                        @case('Administrador')
                            <x-modal-form :btnTitulo="'Nuevo Administrador'" :tituloModal="'Agrega Nuevo Administrador'" :router="route('admin.store')" :btnDanger="'Cancelar'"
                                :btnSuccess="'Confirmar'">
                                <!-- Nombre -->
                                <x-input-form-modal :name="'name'" :labelText="'Nombre:'" :type="'text'" :id="'name'"
                                    placeholder="Nombre " :maxLength="'255'" :value="old('name')" required>
                                    <i class="bx bx-user"></i>
                                </x-input-form-modal>

                                {{-- <!-- Apellido Paterno --> --}}
                                <x-input-form-modal :name="'apellido_paterno'" :labelText="'Apellido Paterno:'" :type="'text'" :id="'apellido_paterno'"
                                    placeholder="Apellido Paterno" :maxLength="'255'" required :value="old('apellido_paterno')">
                                    <i class="bx bxs-user-pin"></i>
                                </x-input-form-modal>

                                {{-- <!-- Apellido Materno --> --}}
                                <x-input-form-modal :name="'apellido_materno'" :labelText="'Apellido Materno:'" :type="'text'" :id="'apellido_materno'"
                                    placeholder="Apellido Materno" :maxLength="'255'" required :value="old('apellido_materno')">
                                    <i class='bx bxs-universal-access'></i>
                                </x-input-form-modal>
                                {{-- <!-- Fecha de Nacimiento 
                                        --> --}}

                                <x-input-form-modal :name="'fecha_nacimiento'" :labelText="'Fecha de Nacimiento:'" :type="'date'" :id="'fecha_nacimiento'"
                                    required :placeholder="'fecha_nacimiento'" :value="old('fecha_nacimiento')">
                                    <i class='bx bxs-universal-access'></i>
                                </x-input-form-modal>

                                {{-- <!-- Email --> --}}
                                <x-input-form-modal :name="'email'" :labelText="'Correo Electrónico:'" :type="'email'" :id="'email'"
                                    placeholder="Correo electrónico" :maxLength="'255'" required :value="old('email')">
                                    <i class='bx bx-envelope'></i>
                                </x-input-form-modal>

                                {{-- <!-- Contraseña --> --}}
                                <x-input-form-modal :name="'password'" :labelText="'Contraseña:'" :type="'password'"
                                    placeholder="Contraseña" :id="'password'" required :value="old('password')">
                                    <i class='bx bxs-lock-alt'></i>
                                </x-input-form-modal>

                                {{-- <!-- Confirmar Contraseña --> --}}
                                <x-input-form-modal :name="'password_confirmation'" :labelText="'Confirmar Contraseña:'" placeholder="Confirmar contraseña"
                                    :type="'password'" :id="'password_confirmation'" required :value="old('password_confirmation')">
                                    <i class='bx bxs-lock-alt'></i>
                                </x-input-form-modal>

                                {{-- <!-- País --> --}}
                                <x-input-form-modal :name="'pais'" :labelText="'País:'" :type="'text'" :id="'pais'"
                                    placeholder="PaÍs" :maxLength="'100'" required :value="old('pais')">
                                    <i class='bx bx-world'></i>
                                </x-input-form-modal>

                                {{-- <!-- Estado --> --}}
                                <x-input-form-modal :name="'estado'" :labelText="'Estado:'" :type="'text'" :id="'estado'"
                                    placeholder="Estado" :maxLength="'100'" required :value="old('estado')">
                                    <i class='bx bxs-building'></i>
                                </x-input-form-modal>

                                {{-- <!-- Municipio --> --}}
                                <x-input-form-modal :name="'municipio'" :labelText="'Municipio:'" :type="'text'" :id="'municipio'"
                                    placeholder="Municipio" :maxLength="'100'" required :value="old('municipio')">
                                    <i class='bx bxs-building-house'></i>
                                </x-input-form-modal>

                                {{-- <!-- Código Postal --> --}}
                                <x-input-form-modal :name="'cp'" :labelText="'Código Postal:'" :type="'text'" :id="'cp'"
                                    placeholder="Código postal" :maxLength="'100'" required :value="old('cp')">
                                    <i class='bx bx-code'></i>
                                </x-input-form-modal>

                                {{-- <!-- Dirección --> --}}
                                <x-input-form-modal :name="'direccion'" :labelText="'Dirección:'" :type="'text'" :id="'direccion'"
                                    placeholder="Dirección" :maxLength="'255'" required :value="old('direccion')">
                                    <i class='bx bxs-upvote'></i>
                                </x-input-form-modal>

                                {{-- <!-- Género --> --}}
                                <div class="flex items-center bg-gray-100 rounded-full p-2">
                                    <div class="flex items-center justify-center text-black bg-white rounded-full w-8 h-8 mr-2">
                                        <i class='bx bx-male-female'></i>
                                    </div>
                                    <select
                                        class="flex-1 bg-transparent border-none outline-none text-black placeholder-gray-500 text-sm px-2"
                                        style="min-width: 200px;" name="genero" id="genero">
                                        <option value="" disabled selected hidden>Género</option> <!-- Placeholder -->
                                        <option value="M">Masculino</option>
                                        <option value="F">Femenino</option>
                                        <option value="O">Prefiero no especificar</option>
                                    </select>
                                </div>


                                {{-- <!-- Teléfono --> --}}
                                <x-input-form-modal :name="'telefono'" :labelText="'Teléfono:'" :type="'text'" :id="'telefono'"
                                    placeholder="Teléfono" :maxLength="'20'" required :value="old('telefono')">
                                    <i class='bx bxs-phone-call'></i>
                                </x-input-form-modal>

                                {{-- <!-- Hora Inicio 
                                        --> --}}
                                <x-input-form-modal :name="'hora_inicio'" :labelText="'Hora Inicio:'" :type="'time'" :id="'hora_inicio'"
                                    required :value="old('hora_inicio')" :placeholder="''">
                                    <i class='bx bxs-phone-call'></i>
                                </x-input-form-modal>

                                {{-- <!-- Hora Fin --> 
                                    --> --}}
                                <x-input-form-modal :name="'hora_fin'" :labelText="'Hora Fin:'" :type="'time'" :id="'hora_fin'"
                                    required :value="old('hora_fin')" :placeholder="''">
                                    <i class='bx bxs-phone-call'></i>
                                </x-input-form-modal>

                            </x-modal-form>
                        @break

                        @case('Coordinador')
                            <x-modal-form :btnTitulo="'Nuevo Coordinador'" :tituloModal="'Agrega Nuevo Coordinador'" :router="route('coordinador.store')" :btnDanger="'Cancelar'"
                                :btnSuccess="'Confirmar'">
                                <!-- Nombre -->
                                <x-input-form-modal :name="'name'" :labelText="'Nombre:'" :type="'text'"
                                    :id="'name'" placeholder="Nombre " :maxLength="'255'" :value="old('name')" required>
                                    <i class="bx bx-user"></i>
                                </x-input-form-modal>

                                {{-- <!-- Apellido Paterno --> --}}
                                <x-input-form-modal :name="'apellido_paterno'" :labelText="'Apellido Paterno:'" :type="'text'"
                                    :id="'apellido_paterno'" placeholder="Apellido Paterno" :maxLength="'255'" required
                                    :value="old('apellido_paterno')">
                                    <i class="bx bxs-user-pin"></i>
                                </x-input-form-modal>

                                {{-- <!-- Apellido Materno --> --}}
                                <x-input-form-modal :name="'apellido_materno'" :labelText="'Apellido Materno:'" :type="'text'"
                                    :id="'apellido_materno'" placeholder="Apellido Materno" :maxLength="'255'" required
                                    :value="old('apellido_materno')">
                                    <i class='bx bxs-universal-access'></i>
                                </x-input-form-modal>
                                {{-- <!-- Fecha de Nacimiento 
                                   --> --}}

                                <x-input-form-modal :name="'fecha_nacimiento'" :labelText="'Fecha de Nacimiento:'" :type="'date'"
                                    :id="'fecha_nacimiento'" required :placeholder="'fecha_nacimiento'" :value="old('fecha_nacimiento')">
                                    <i class='bx bxs-universal-access'></i>
                                </x-input-form-modal>

                                {{-- <!-- Email --> --}}
                                <x-input-form-modal :name="'email'" :labelText="'Correo Electrónico:'" :type="'email'"
                                    :id="'email'" placeholder="Correo electrónico" :maxLength="'255'" required
                                    :value="old('email')">
                                    <i class='bx bx-envelope'></i>
                                </x-input-form-modal>

                                {{-- <!-- Contraseña --> --}}
                                <x-input-form-modal :name="'password'" :labelText="'Contraseña:'" :type="'password'"
                                    placeholder="Contraseña" :id="'password'" required :value="old('password')">
                                    <i class='bx bxs-lock-alt'></i>
                                </x-input-form-modal>

                                {{-- <!-- Confirmar Contraseña --> --}}
                                <x-input-form-modal :name="'password_confirmation'" :labelText="'Confirmar Contraseña:'" placeholder="Confirmar contraseña"
                                    :type="'password'" :id="'password_confirmation'" required :value="old('password_confirmation')">
                                    <i class='bx bxs-lock-alt'></i>
                                </x-input-form-modal>

                                {{-- <!-- País --> --}}
                                <x-input-form-modal :name="'pais'" :labelText="'País:'" :type="'text'"
                                    :id="'pais'" placeholder="PaÍs" :maxLength="'100'" required :value="old('pais')">
                                    <i class='bx bx-world'></i>
                                </x-input-form-modal>

                                {{-- <!-- Estado --> --}}
                                <x-input-form-modal :name="'estado'" :labelText="'Estado:'" :type="'text'"
                                    :id="'estado'" placeholder="Estado" :maxLength="'100'" required :value="old('estado')">
                                    <i class='bx bxs-building'></i>
                                </x-input-form-modal>

                                {{-- <!-- Municipio --> --}}
                                <x-input-form-modal :name="'municipio'" :labelText="'Municipio:'" :type="'text'"
                                    :id="'municipio'" placeholder="Municipio" :maxLength="'100'" required
                                    :value="old('municipio')">
                                    <i class='bx bxs-building-house'></i>
                                </x-input-form-modal>

                                {{-- <!-- Código Postal --> --}}
                                <x-input-form-modal :name="'cp'" :labelText="'Código Postal:'" :type="'text'"
                                    :id="'cp'" placeholder="Código postal" :maxLength="'100'" required
                                    :value="old('cp')">
                                    <i class='bx bx-code'></i>
                                </x-input-form-modal>

                                {{-- <!-- Dirección --> --}}
                                <x-input-form-modal :name="'direccion'" :labelText="'Dirección:'" :type="'text'"
                                    :id="'direccion'" placeholder="Dirección" :maxLength="'255'" required
                                    :value="old('direccion')">
                                    <i class='bx bxs-upvote'></i>
                                </x-input-form-modal>

                                {{-- <!-- Género --> --}}
                                <div class="flex items-center bg-gray-100 rounded-full p-2">
                                    <div class="flex items-center justify-center text-black bg-white rounded-full w-8 h-8 mr-2">
                                        <i class='bx bx-male-female'></i>
                                    </div>
                                    <select
                                        class="flex-1 bg-transparent border-none outline-none text-black placeholder-gray-500 text-sm px-2"
                                        style="min-width: 200px;" name="genero" id="genero">
                                        <option value="" disabled selected hidden>Género</option> <!-- Placeholder -->
                                        <option value="M">Masculino</option>
                                        <option value="F">Femenino</option>
                                        <option value="O">Prefiero no especificar</option>
                                    </select>
                                </div>


                                {{-- <!-- Teléfono --> --}}
                                <x-input-form-modal :name="'telefono'" :labelText="'Teléfono:'" :type="'text'"
                                    :id="'telefono'" placeholder="Teléfono" :maxLength="'20'" required
                                    :value="old('telefono')">
                                    <i class='bx bxs-phone-call'></i>
                                </x-input-form-modal>

                                {{-- <!-- Hora Inicio 
                                   --> --}}
                                <x-input-form-modal :name="'hora_inicio'" :labelText="'Hora Inicio:'" :type="'time'"
                                    :id="'hora_inicio'" required :value="old('hora_inicio')" :placeholder="''">
                                    <i class='bx bxs-phone-call'></i>
                                </x-input-form-modal>

                                {{-- <!-- Hora Fin --> 
                               --> --}}
                                <x-input-form-modal :name="'hora_fin'" :labelText="'Hora Fin:'" :type="'time'"
                                    :id="'hora_fin'" required :value="old('hora_fin')" :placeholder="''">
                                    <i class='bx bxs-phone-call'></i>
                                </x-input-form-modal>

                            </x-modal-form>
                        @break
                        @default
                    @endswitch
                </div>
            </div>

            <!-- Formulario de búsqueda -->
            {{-- <form action="{{ route('admin.programas') }}" method="GET" id="search-form" class="flex items-center">
                <div class="relative">
                    <input type="text" name='search' placeholder="Buscar"
                        class="bg-gray-200 text-gray-700 rounded-full px-4 py-2 pl-10 shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    <i class='bx bx-search absolute left-2 top-1/2 transform -translate-y-1/2 text-gray-500'></i>
                </div>
            </form> --}}

        </div>
    </div>
