<div class="shrink-0 flex items-center">
    <a href="{{ route('admin.home') }}">
        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
    </a>
</div>

<!-- Navigation Links -->
<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
    <x-nav-link :href="route('ben.home')" :active="request()->routeIs('ben.home')">
        {{ __('Home') }}
    </x-nav-link>
</div>
<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
    <x-nav-link :href="route('ben.misClases')" :active="request()->routeIs('ben.misClases')">
        {{ __('Mis Clases') }}
    </x-nav-link>
</div>
<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
    <x-nav-link :href="route('ben.nuevaClase')" :active="request()->routeIs('ben.nuevaClase')">
        {{ __('Nueva Clase') }}
    </x-nav-link>
</div>

