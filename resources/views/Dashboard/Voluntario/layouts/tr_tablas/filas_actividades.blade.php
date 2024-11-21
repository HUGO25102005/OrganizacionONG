@foreach ($actividades as $actividad)
    <tr>
        <td class="px-6 py-4 text-sm text-gray-700 border-b">{{ $loop->iteration }}</td>
        <td class="px-6 py-4 text-sm text-gray-700 border-b">
            {{ $actividad->nombre ?? 'N/A' }}
        </td>
        <td class="px-6 py-4 text-sm text-gray-700 border-b">{{ $actividad->fecha_actividad }}</td>
        <td class="px-6 py-4 text-sm text-gray-700 border-b">{{ $actividad->descripcion_actividad }}</td>
        <td class="px-6 py-4 text-sm text-gray-700 border-b">{{ $actividad->resultados_actividad }}</td>
        <td class="px-6 py-4 text-sm text-gray-700 border-b">{{ $actividad->comentarios_adicionales }}</td>
    </tr>
@endforeach
