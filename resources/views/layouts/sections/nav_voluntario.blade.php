<div class="shrink-0 flex items-center">
    <a href="{{ route('vol.home') }}">
        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
    </a>
</div>

<!-- Navigation Links -->
<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
    <x-nav-link :href="route('vol.home')" :active="request()->routeIs('vol.home')">
        {{ __('Home') }}
    </x-nav-link>
</div>
<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
    <x-nav-link :href="route('vol.misClases')" :active="request()->routeIs('vol.misClases')">
        {{ __('Mis Clases') }}
    </x-nav-link>
</div> 
<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
    <x-nav-link :href="route('vol.nuevaClase')" :active="request()->routeIs('vol.nuevaClase')">
        {{ __('Nueva clase') }}
    </x-nav-link>
</div>
