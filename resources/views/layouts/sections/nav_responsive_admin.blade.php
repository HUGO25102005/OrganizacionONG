<!-- Navigation Links -->
<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
    <x-responsive-nav-link :href="route('admin.home')" :active="request()->routeIs('admin.home')">
        {{ __('Home') }}
    </x-responsive-nav-link>
</div>
<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
    <x-responsive-nav-link :href="route('admin.panelControl')" :active="request()->routeIs('admin.panelControl')">
        {{ __('Panel de Control') }}
    </x-responsive-nav-link>
</div>
<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
    <x-responsive-nav-link :href="route('admin.donaciones')" :active="request()->routeIs('admin.donaciones')">
        {{ __('Donaciones') }}
    </x-responsive-nav-link>
</div>
<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
    <x-responsive-nav-link :href="route('admin.recursos')" :active="request()->routeIs('admin.recursos')">
        {{ __('Recursos') }}
    </x-responsive-nav-link>
</div>
<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
    <x-responsive-nav-link :href="route('admin.usuarios')" :active="request()->routeIs('admin.usuarios')">
        {{ __('Usuarios') }}
    </x-responsive-nav-link>
</div>