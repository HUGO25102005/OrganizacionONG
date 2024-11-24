
(function () {

    function updateTableSolicitudes() {

        const tableSoli = document.getElementById('tablaSolicituides');
        const divUrl = document.getElementById('urlUpdateTableSoli');
        const url = divUrl.getAttribute('data-url');
        const searchInput = document.querySelector('#search-form input[name="search"]');

        // Obtener el valor del campo de búsqueda
        const search = searchInput ? searchInput.value : '';

        fetch(`${url}?search=${encodeURIComponent(search)}`, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
            },
        }).then(response => {
            if (!response.ok) throw new Error('Error en la soliciud');
            return response.json();
        }).then(data => {
            const { html } = data;
            // console.log(html);
            if (tableSoli) {
                tableSoli.innerHTML = html;
            }
        }).catch(error => { console.log })

    }

    window.updateTableSolicitudes = updateTableSolicitudes;
})();