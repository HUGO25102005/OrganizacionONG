<div class="flex items-center bg-gray-100 rounded-full p-2">
    <div class="flex items-center justify-center text-black bg-white rounded-full w-8 h-8 mr-2">
        {{ $slot }}
    </div>
    <input 
    class="flex-1 bg-transparent border-none outline-none placeholder-gray-500"
    placeholder="{{ $placeholder }}"
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $id }}"
        value="{{ old($id) }}"
        >
</div>