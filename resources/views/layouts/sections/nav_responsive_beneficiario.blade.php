<x-responsive-nav-link :href="route('ben.home')" :active="request()->routeIs('ben.home')">
    {{ __('Home') }}
</x-responsive-nav-link>

<x-responsive-nav-link :href="route('ben.misClases')" :active="request()->routeIs('ben.misClases')">
    {{ __('Mis Clases') }}
</x-responsive-nav-link>

<x-responsive-nav-link :href="route('ben.nuevaClase')" :active="request()->routeIs('ben.nuevaClase')">
    {{ __('Nueva Clase') }}
</x-responsive-nav-link>