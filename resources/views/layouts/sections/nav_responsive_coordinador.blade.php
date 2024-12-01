<x-responsive-nav-link :href="route('coordinador.home')" :active="request()->routeIs('coordinador.home')">
    {{ __('Home') }}
</x-responsive-nav-link>

<x-responsive-nav-link :href="route('coordinador.panelControl')" :active="request()->routeIs('coordinador.panelControl')">
    {{ __('Panel de Control') }}
</x-responsive-nav-link>

<x-responsive-nav-link :href="route('coordinador.programas')" :active="request()->routeIs('coordinador.programas')">
    {{ __('Programas') }}
</x-responsive-nav-link>

<x-responsive-nav-link :href="route('coordinador.beneficiarios')" :active="request()->routeIs('coordinador.beneficiarios')">
    {{ __('Beneficiarios') }}
</x-responsive-nav-link>