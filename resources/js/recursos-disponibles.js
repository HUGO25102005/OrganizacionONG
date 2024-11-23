
(function() {

    function updateTableSolicitudes(){

        const tableSoli = document.getElementById('tablaSolicituides');
        const divUrl = document.getElementById('urlUpdateTableSoli');
        const url = divUrl.getAttribute('data-url');
        
        fetch(url, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
            },
        }).then(response => {
            if(!response.ok) throw new Error('Error en la soliciud');
            return response.json();
        }).then(data => {
            const { html } = data;
            if(tableSoli){
                tableSoli.innerHTML = html;
            }
        }) .catch( error => {console.log})
        
    }

    window.updateTableSolicitudes = updateTableSolicitudes;
})();