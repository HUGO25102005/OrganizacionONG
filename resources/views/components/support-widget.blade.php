<div>
    <!-- Botón flotante de soporte -->
<div class="fixed bottom-5 right-5 z-100">
    <button 
        onclick="showRoleSelector()" 
        class="bg-blue-400 text-white p-3 h-12 w-12 rounded-full shadow-lg hover:bg-blue-300 flex items-center justify-center">
        <i class='bx bx-message-square-dots text-2xl'></i>
    </button>
</div>

<!-- Contenedor para la selección de rol -->
<div 
    id="roleSelector" 
    class="fixed bottom-16 right-5 w-52 h-auto p-5 rounded-lg shadow-lg hidden flex flex-col space-y-3 z-50" 
    style="background-color: #fbfbfe;">
    
    <div class="flex justify-between items-center border-b pb-3">
        <h2 class="text-lg font-semibold text-gray-700">Comunicarse con</h2>
        <!-- Botón de cierre -->
        <button 
            onclick="closeRoleSelector()" 
            class="flex items-center justify-center font-bold text-gray-500 hover:text-gray-700 text-3xl">
            &times;
        </button>
    </div>
    
    <div class="flex flex-col space-y-4 w-40">
        @foreach ($roles as $role)
            <button 
                onclick="selectRole('{{ $role }}')" 
                class="bg-blue-400 text-white py-2 px-2 rounded-full shadow-inset hover:bg-blue-300">
                {{ $role }}
            </button>
        @endforeach
    </div>
</div>

<!-- Contenedor del widget de soporte -->
<div 
    id="supportWidget" 
    class="fixed bottom-16 right-5 w-96 h-[600px] p-5 rounded-lg shadow-lg hidden flex flex-col space-y-3 z-50" 
    style="background-color: #fbfbfe">
    
    <!-- Encabezado del widget con botón de cierre y reset -->
    <div class="flex justify-between items-center border-b">
        <h2 id="widgetHeader" class="text-lg font-semibold text-blue-400">InspireUp - Administrador</h2>
        <div class="flex items-center justify-center">
            <!-- Botón de reinicio del chat -->
            <button 
                onclick="resetChat()" 
                class="flex items-center justify-center text-gray-500 hover:text-gray-700">
                <i class="bx bx-revision text-xl"></i>
            </button>
            <!-- Botón de cierre -->
            <button 
                onclick="toggleSupport()" 
                class="flex items-center justify-center font-bold text-gray-500 ml-2 hover:text-gray-700 text-3xl">
                &times;
            </button>
        </div>
    </div>

    <!-- Área de chat -->
    <main 
        class="flex-1 overflow-y-auto p-2 space-y-4 flex flex-col-reverse rounded-lg max-h-[450px]" 
        style="background-color: #f7f7fe; box-shadow: inset 5px 5px 7px #d2dbe6;">
        
        <div id="chatContainer" class="flex flex-col space-y-4">
            <!-- Mensaje de bienvenida del soporte -->
            <div 
                class="self-start max-w-xs p-3 text-[#090909] rounded-full shadow-lg" 
                style="background-color: #f6f6fe; box-shadow: 6px 6px 12px #d6dee8, -6px -6px 12px #fefeff;">
                <p class="text-sm">¡Hola! ¿En qué podemos ayudarte?</p>
            </div>
        </div>
    </main>

    <form id="supportForm" onsubmit="sendMessage(event)" class="flex items-center space-x-2 pt-2 border-t">
        <div class="relative w-full">
            <!-- Textarea con los mismos estilos que el input -->
            <textarea 
                name="message" 
                id="userMessage" 
                placeholder="Escribe tu mensaje..." 
                class="w-full py-2 pl-10 pr-2 bg-[#fcfcff] rounded-full outline-none border-none shadow-inner text-[#555] transition-all focus:placeholder-[#999] resize-none" 
                rows="1" 
                style="box-shadow: inset 4px 8px 8px #d7e0eb, inset -8px -8px 8px #ffffff;">
            </textarea>
        </div>
        <!-- Botón de envío con icono de check -->
        <button 
            type="submit" 
            class="text-white h-8 w-10 rounded-full border-4 border-blue-400 hover:bg-blue-400 flex items-center justify-center">
            <i class="bx bx-send text-blue-400 hover:text-white text-lg"></i>
        </button>
    </form>
</div>

<script>
    function showRoleSelector() {
        document.getElementById('roleSelector').classList.remove('hidden');
    }

    function closeRoleSelector() {
        document.getElementById('roleSelector').classList.add('hidden');
    }

    function selectRole(role) {
        document.getElementById('widgetHeader').textContent = `InspireUp - ${role}`;
        closeRoleSelector();
        document.getElementById('supportWidget').classList.remove('hidden');
    }

    function toggleSupport() {
        document.getElementById('supportWidget').classList.toggle('hidden');
    }

    function resetChat() {
        const chatContainer = document.getElementById('chatContainer');
        chatContainer.innerHTML = `
            <div class="self-start max-w-xs p-3 text-[#090909] rounded-full shadow-lg" 
                style="background-color: #f6f6fe; box-shadow: 6px 6px 12px #d6dee8, -6px -6px 12px #fefeff;">
                <p class="text-sm">¡Hola! ¿En qué podemos ayudarte?</p>
            </div>`;
    }

    function sendMessage(event) {
        event.preventDefault();
        const chatContainer = document.getElementById('chatContainer');
        const userMessage = document.getElementById('userMessage').value;

        if (userMessage.trim() !== "") {
            const userBubble = document.createElement('div');
            userBubble.classList.add('self-end', 'max-w-xs', 'p-3', 'text-white', 'rounded-full', 'shadow-lg', 'bg-blue-400');
            userBubble.innerHTML = `<p class="text-sm">${userMessage}</p>`;

            chatContainer.appendChild(userBubble);

            const assistantBubble = document.createElement('div');
            assistantBubble.classList.add('self-start', 'max-w-xs', 'p-3', 'text-[#090909]', 'rounded-full', 'shadow-lg');
            assistantBubble.style.backgroundColor = '#f6f6fe';
            assistantBubble.innerHTML = `<p class="text-sm">Gracias por tu mensaje. ¡Estamos aquí para ayudarte!</p>`;

            chatContainer.appendChild(assistantBubble);

            document.getElementById('userMessage').value = '';
            chatContainer.scrollTop = chatContainer.scrollHeight;
        }
    }
</script>

</div>