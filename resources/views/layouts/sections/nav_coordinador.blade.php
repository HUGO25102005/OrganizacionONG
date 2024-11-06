<div class="shrink-0 flex items-center">
    <a href="{{ route('admin.home') }}">
        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
    </a>
</div>

<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
    <x-nav-link :href="route('coordinador.home')" :active="request()->routeIs('coordinador.home')">
        {{ __('Home') }}
    </x-nav-link>

</div>
<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-nav-link :href="route('coordinador.panelControl')" :active="request()->routeIs('coordinador.panelControl')">
                {{ __('Panel de Control') }}
            </x-nav-link>
</div>

<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-nav-link :href="route('coordinador.beneficiarios')" :active="request()->routeIs('coordinador.beneficiarios')">
                {{ __('Beneficiarios') }}
            </x-nav-link>
</div>

<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-nav-link :href="route('coordinador.programas')" :active="request()->routeIs('coordinador.programas')">
                {{ __('Programas') }}
            </x-nav-link>
</div>