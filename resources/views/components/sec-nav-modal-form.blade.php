@props(['nameTab', 'nameSec'])

<button @click="$dispatch('change-tab', '{{ $nameTab }}')"
    :class="{ 'text-blue-500 border-b-2 border-blue-500': tab === '{{ $nameTab }}' }"
    class="px-3 py-2 font-medium text-gray-500 hover:text-blue-500 focus:outline-none">
    {{ $nameSec }}
</button>
