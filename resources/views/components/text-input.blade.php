@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => "w-full py-2 pl-10 pr-2 bg-[#eaeff3] rounded-[15px] shadow-inner"]) !!}>