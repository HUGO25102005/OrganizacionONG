<x-responsive-nav-link :href="route('vol.home')" :active="request()->routeIs('vol.home')">
    {{ __('Home') }}
</x-responsive-nav-link>

<x-responsive-nav-link :href="route('vol.misClases')" :active="request()->routeIs('vol.misClases')">
    {{ __('Mis Clases') }}
</x-responsive-nav-link>

<x-responsive-nav-link :href="route('vol.nuevaClase')" :active="request()->routeIs('vol.nuevaClase')">
    {{ __('Nueva Clase') }}
</x-responsive-nav-link>