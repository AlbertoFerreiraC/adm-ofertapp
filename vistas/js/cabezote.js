// ============================
// 🔍 BUSCADOR EN VIVO OFERTAPP
// ============================
$(document).ready(function () {

    const $inputBusqueda = $('#buscadorProductos');
    const $resultadosContainer = $('#resultadosBusqueda');

    // Escuchar mientras el usuario escribe
    $inputBusqueda.on('keyup', function () {
        const query = $(this).val().trim();

        if (query.length < 1) {
            $resultadosContainer.html('').hide();
            return;
        }

        $.ajax({
            url: '../api-ofertapp/cabezote/buscarProductos.php',
            method: 'GET',
            data: { q: query },
            dataType: 'json',
            success: function (productos) {
                if (!productos || productos.length === 0) {
                    $resultadosContainer.html('<p class="sin-resultados">Sin resultados</p>').show();
                    return;
                }

                let html = '';
                productos.forEach(p => {
                    html += `
                        <div class="resultado-item" onclick="verProducto(${p.idProducto})">
                            <img src="${p.imagen}" alt="${p.titulo}">
                            <div class="info">
                                <h4>${p.titulo}</h4>
                                <span>Gs. ${parseInt(p.costo).toLocaleString()}</span>
                            </div>
                        </div>
                    `;
                });

                $resultadosContainer.html(html).show();
            },
            error: function (err) {
                console.error('Error al buscar productos:', err);
            }
        });
    });

    // Cerrar lista si se hace clic fuera del buscador
    $(document).click(function (e) {
        if (!$(e.target).closest('.search-form').length) {
            $resultadosContainer.hide();
        }
    });
});

function verProducto(id) {
    window.location.href = `descripcionProductos?id=${id}`;
}
