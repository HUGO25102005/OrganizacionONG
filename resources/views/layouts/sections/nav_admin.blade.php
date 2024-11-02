<div class="shrink-0 flex items-center">
    <a href="{{ route('admin.home') }}">
        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
    </a>
</div>

<!-- Navigation Links -->
<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
    <x-nav-link :href="route('admin.home')" :active="request()->routeIs('admin.home')">
        {{ __('Home') }}
    </x-nav-link>
</div>
<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
    <x-nav-link :href="route('admin.panelControl')" :active="request()->routeIs('admin.panelControl')">
        {{ __('Panel de Control') }}
    </x-nav-link>
</div>
<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
    <x-nav-link :href="route('admin.donaciones')" :active="request()->routeIs('admin.donaciones')">
        {{ __('Donaciones') }}
</div>

<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
    <x-nav-link :href="route('admin.recursos')" :active="request()->routeIs('admin.recursos')">
        {{ __('Recursos') }}
    </x-nav-link>
</div>
<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
    <x-nav-link :href="route('admin.usuarios')" :active="request()->routeIs('admin.usuarios')">
        {{ __('Usuarios') }}
    </x-nav-link>
</div>
</div>
