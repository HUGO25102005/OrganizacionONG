<!DOCTYPE html>
<html>
<head>
    <title>Reporte PDF</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        .logo-text { display: flex; align-items: center; }
        .logo { width: 100px; margin-right: 20px; }
        .title { text-align: center; font-size: 24px; margin-top: 20px; }
    </style>
</head>
<body>
    <!-- Sección del logo y el texto -->
    <div class="logo-text">
        <img src="{{ public_path('images/logo.png') }}" alt="Logo" class="logo">
        <p>Texto a la derecha del logo.</p>
    </div>

    <br><br>

    <!-- Título centrado -->
    <h2 class="title">{{ $titulo }}</h2>

    <!-- Tabla con datos de la base de datos -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
