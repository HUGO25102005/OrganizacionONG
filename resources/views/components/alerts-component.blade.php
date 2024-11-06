<<<<<<< HEAD
<div>
    <div class="alert alert-{{ $severity }}">
        <div class="alert-title font-bold">
            {{ ucfirst($severity) }}: {{ $title }}
        </div>
        <p>{{ $message }}</p>
    </div>
</div>

{{-- Opcionalmente puedes agregar clases CSS para el estilo del alert --}}
<style>
    .alert {
        padding: 15px;
        margin-bottom: 10px;
        border-radius: 5px;
        color: white;
    }
    .alert-success {
        background-color: #4caf50;
    }
    .alert-info {
        background-color: #2196f3;
    }
    .alert-warning {
        background-color: #ff9800;
    }
    .alert-error {
        background-color: #f44336;
    }
    .alert-title {
        font-weight: bold;
    }
</style>
=======
@php
    // Lista de posibles tipos de mensaje
    $flashTypes = ['success', 'error', 'info', 'warning'];
@endphp

<!-- Contenedor de las alertas -->
<div id="alert-container" class="fixed top-4 right-4 flex flex-col space-y-4 z-50">
    <!-- Recorrer las claves de mensajes flash -->
    @foreach ($flashTypes as $type)
        @if (session()->has($type))
            <div
                class="alert w-80 p-4 rounded-lg shadow-lg relative
                @if ($type === 'success') bg-green-100 border border-green-400 text-green-700
                @elseif($type === 'info') bg-blue-100 border border-blue-400 text-blue-700
                @elseif($type === 'warning') bg-yellow-100 border border-yellow-400 text-yellow-700
                @elseif($type === 'error') bg-red-100 border border-red-400 text-red-700 @endif animate-fade-in">

                <!-- Botón de cerrar (la equis) -->
                <button class="close-alert absolute top-2 right-2 text-lg font-bold text-gray-500 hover:text-gray-700">
                    &times;
                </button>

                <!-- Contenido de la alerta -->
                {{-- <div class="font-bold text-lg mb-1">
                    {{ ucfirst($type) }}:
                </div> --}}
                <p>{{ session($type) }}</p>
            </div>
        @endif
    @endforeach
</div>

<style>
    /* Añadir animación suave de aparición */
    /* @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    } */

    /* Animación de desvanecimiento */
    /* @keyframes fadeOut {
        from {
            opacity: 1;
            transform: translateY(0);
        }

        to {
            opacity: 0;
            transform: translateY(-10px);
        }
    } */

    .animate-fade-in {
        animation: fadeIn 0.5s ease forwards;
    }

    .animate-fade-out {
        animation: fadeOut 0.5s ease forwards;
    }

    /* Animación para fadeIn */
    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    /* Animación para fadeOut */
    @keyframes fadeOut {
        from {
            opacity: 1;
            height: auto;
            visibility: visible;
        }

        to {
            opacity: 0;
            height: 0;
            visibility: hidden;
            margin-top: -1rem;
        }
    }
</style>

<script>
    // Función para eliminar el alert después de 5 segundos
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            // Selecciona solo las alertas
            let alerts = document.querySelectorAll('#alert-container .alert');

            alerts.forEach(function(alert) {
                // Agrega la clase de animación de salida a la alerta
                alert.classList.add('animate-fade-out');

                // Espera a que la animación de salida termine y luego elimina la alerta
                setTimeout(function() {
                    alert.remove();
                }, 500); // 500 ms es la duración de la animación
            });
        }, 5000); // 5 segundos

        // Función para cerrar manualmente el alert
        document.querySelectorAll('.close-alert').forEach(function(button) {
            button.addEventListener('click', function() {
                let alert = button.parentElement;
                alert.classList.add('animate-fade-out');
                setTimeout(function() {
                    alert.remove();
                }, 500); // Elimina el alert después de la animación
            });
        });
    });
</script>
>>>>>>> 08762f89dda1e4f821e89fd993db7e4fea1d9b4f
