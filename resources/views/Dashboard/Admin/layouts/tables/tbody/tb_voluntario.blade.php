@foreach ($datos as $voluntario)
        <tr class="border-b border-gray-300">
            <td class="py-3 px-4 text-center">{{ $voluntario->id }}</td>
            <td class="py-3 px-4 text-center">{{ $voluntario->trabajador->user->name }}</td>
            <td class="py-3 px-4 text-center">{{ $voluntario->trabajador->user->email }}</td>
            <td class="py-3 px-4 text-center">
                <button class="mr-2 text-blue-500 text-xl"><i class='bx bx-show'></i></button>
                <button class="delete-button text-red-500 text-xl"><i class='bx bx-trash'></i></button>
            </td>
        </tr>
@endforeach
