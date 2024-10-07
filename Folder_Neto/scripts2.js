 // Obtener el modal y los botones
 const modal = document.getElementById("myModal");
 const openModalBtn = document.getElementById("openModal");
 const closeModalBtn = document.getElementById("close");

 // Abrir y cerrar modal
 openModalBtn.onclick = function() {
     modal.classList.remove("hidden");
 }


 closeModalBtn.onclick = function() {
     modal.classList.add("hidden");
 }

 // Cerrar el modal al hacer clic fuera del contenido del modal
 window.onclick = function(event) {
     if (event.target === modal) {
         modal.classList.add("hidden");
     }
 }