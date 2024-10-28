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
