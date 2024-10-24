<!-- Contenedor de las alertas -->
<div id="alert-container" class="fixed top-4 right-4 flex flex-col space-y-4 z-50">
    <!-- Alerta individual -->
    @foreach ($message as $error)
    <div class="alert w-80 p-4 rounded-lg shadow-lg relative
        @if($severity === 'success') bg-green-100 border border-green-400 text-green-700
        @elseif($severity === 'info') bg-blue-100 border border-blue-400 text-blue-700
        @elseif($severity === 'warning') bg-yellow-100 border border-yellow-400 text-yellow-700
        @elseif($severity === 'error') bg-red-100 border border-red-400 text-red-700
        @endif animate-fade-in">
        
        <!-- Botón de cerrar (la equis) -->
        <button class="close-alert absolute top-2 right-2 text-lg font-bold text-gray-500 hover:text-gray-700">
            &times;
        </button>

        <!-- Contenido de la alerta -->
        <div class="font-bold text-lg mb-1">
            {{ ucfirst($severity) }}: {{ $title }}
        </div>
        <p>{{ $error }}</p>
    </div>
    @endforeach
</div>

<style>
    /* Añadir animación suave de aparición */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Animación de desvanecimiento */
    @keyframes fadeOut {
        from {
            opacity: 1;
            transform: translateY(0);
        }
        to {
            opacity: 0;
            transform: translateY(-10px);
        }
    }

    .animate-fade-in {
        animation: fadeIn 0.5s ease-in-out;
    }

    .animate-fade-out {
        animation: fadeOut 0.5s ease-in-out;
    }
</style>

<script>
    // Función para eliminar el alert después de 5 segundos
    document.addEventListener('DOMContentLoaded', function () {
        setTimeout(function() {
            let alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                alert.classList.add('animate-fade-out');
                setTimeout(function() {
                    alert.remove();
                }, 500); // Elimina el alert después de la animación
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
