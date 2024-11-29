<x-app-layout>
    <div class="alert alert-success">
        <x-alerts-component />
    </div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight bg-gray-100 rounded inline-block px-4 py-2 cursor-pointer transition-transform duration-200 hover:scale-110">
            {{ __('Home') }}
        </h2>

    </x-slot>

    <div class="bg-[#F6F8FF] w-full max-w-[1450px] h-auto my-[20px] p-[20px] shadow-lg rounded-[30px]">
        
        <div class="flex justify-center items-center gap-[30px] pb-[10px]"> 
            <h1 class="text-[45px] font-sans font-medium">InspireUp te da la bienvenida.</h1>
        </div>
        <div class="flex justify-center items-center gap-[30px] pb-[10px]"> 
            <h2 class="text-[24px] font-sans font-extralight">Buen día, {{ session('name') }}!</h2>
        </div>
        <div class="flex justify-center items-center gap-[10px] pb-[10px]"> 
            <img src="{{ asset('images/logo_n.png') }}" alt="Logo" class="w-[100px] h-[100px]">
        </div>
        <div class="flex justify-center items-center gap-[10px] pb-[10px]"> 
            <h3 class="text-[15px] font-sans font-[100]">By InnovateSoft</h3>
        </div>
        
        

    </div>

    <div class="fixed bottom-5 right-5 z-100">
        <a href="{{ route('vol.chat') }}">
            <button
                class="bg-blue-400 text-white p-3 h-12 w-12 rounded-full shadow-lg hover:bg-blue-300 flex items-center justify-center">
                <i class='bx bx-message-square-dots text-2xl'></i>
            </button>
        </a>
    </div>

</x-app-layout>
