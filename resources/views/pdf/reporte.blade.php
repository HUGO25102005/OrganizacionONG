<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .logo-text {
            display: flex;
            align-items: center;
        }

        .logo {
            width: 100px; /* Ajusta el tamaño según necesites */
            margin-right: 10px; /* Espacio entre la imagen y el texto */
        }

        .title {
            text-align: center; /* Centra el título */
            margin: 20px 0; /* Espaciado arriba y abajo */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px; /* Espacio entre el título y la tabla */
        }

        th, td {
            border: 1px solid #000; /* Borde de las celdas */
            padding: 10px; /* Espacio interno de las celdas */
            text-align: left; /* Alineación del texto */
        }

        th {
            background-color: #f2f2f2; /* Color de fondo del encabezado */
        }

        hr {
            border: 1px solid #ccc; /* Color y grosor de la línea horizontal */
            margin: 20px 0; /* Espaciado arriba y abajo */
        }
    </style>
</head>
<body>

    <div class="logo-text">
        <img src="{{ public_path('/images/InspireUp.jpg') }}" alt="Logo" class="logo">
        <h2>InspireUp</h2>
    </div>

    <hr>

    <!-- Título centrado -->
    <h2 class="title">{{ $titulo }}</h2>

    <!-- Tabla con datos de la base de datos -->
    <table>
        <thead>
            <tr>
                <th>Nombre del Programa</th>
                <th>Nombre del Voluntario</th>
                <th>Fecha de Inicio</th>
                <th>Fecha de Término</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($programas as $programa)
                <tr>
                    <td>{{ $programa->nombre_programa }}</td>
                    <td>{{ $programa->voluntario->trabajador->user->name }}</td>
                    <td>{{ $programa->fecha_inicio }}</td>
                    <td>{{ $programa->fecha_termino }}</td>
                    <td>{{ $programa->estado }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>