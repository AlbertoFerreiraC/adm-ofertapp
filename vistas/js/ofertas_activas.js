// ===================== CARGAR PRODUCTOS EN OFERTA =====================
$(document).ready(function () {
    cargarOfertas();
});

function cargarOfertas() {
    $("#gridOfertas").empty();
    $("#count").text("0");

    $.ajax({
        url: "../api-ofertapp/producto/funListarOfertas.php",
        method: "GET",
        cache: false,
        dataType: "json",
        success: function (response) {
            if (!response || response.length === 0) {
                $("#vacio").removeClass("hidden");
                return;
            }

            $("#vacio").addClass("hidden");
            $("#count").text(response.length);

            let cards = "";

            response.forEach((item) => {
                let precioAnterior = item.precio_anterior
                    ? `<span class="precio-anterior">Gs. ${Number(item.precio_anterior).toLocaleString('es-PY')}</span>`
                    : "";

                cards += `
          <div class="producto-card" data-id="${item.idProducto}">
            <div class="producto-img-wrapper">
              <span class="badge-oferta">🔥 Oferta</span>
              <img src="${item.imagen}" alt="${item.titulo}" class="producto-imagen">
              <button type="button" class="icono-ubicacion"
                data-lat="${item.latitud ?? -25.3}"
                data-lng="${item.longitud ?? -57.6}"
                data-titulo="${item.empresa}">
                <i class="fa fa-map-marker-alt"></i>
              </button>
            </div>
            <div class="producto-detalle">
              <h3 class="producto-nombre">${item.titulo}</h3>
              <p class="producto-precio">
                Gs. ${Number(item.costo).toLocaleString('es-PY')}
                ${precioAnterior}
              </p>
              <p class="producto-tienda">${item.empresa} · 
                <span class="text-gray-500">${item.categoria ?? ''}</span></p>
              <div class="producto-rating">${dibujarEstrellas(item.rating ?? 5)}</div>
            </div>
          </div>
        `;
            });

            $("#gridOfertas").append(cards);

            // Evento: ver mapa
            $(".icono-ubicacion").click(function (e) {
                e.stopPropagation(); // Evita el click de la tarjeta
                verMapa(
                    Number($(this).data("lat")),
                    Number($(this).data("lng")),
                    $(this).data("titulo")
                );
            });

            // Evento: ver detalle del producto
            $(".producto-card").click(function () {
                const id = $(this).data("id");
                window.location.href = `descripcionProductos?id=${id}`;
            });
        },
        error: function () {
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "No se pudieron cargar las ofertas."
            });
        }
    });
}

// ===================== DIBUJAR ESTRELLAS =====================
function dibujarEstrellas(rating) {
    const full = Math.floor(rating);
    const half = (rating - full) >= 0.5 ? 1 : 0;
    const empty = 5 - full - half;

    let estrellas = "⭐ ".repeat(full);
    if (half) estrellas += "✦ ";
    estrellas += "☆ ".repeat(empty);

    return estrellas;
}

// ===================== VER MAPA =====================
function verMapa(lat, lng, titulo) {
    $('#modalVerMapa').modal('show');
    const loc = { lat: lat, lng: lng };

    document.getElementById("linkComoLlegar").href = `https://www.google.com/maps?q=${lat},${lng}`;

    if (!window.map) {
        window.map = new google.maps.Map(document.getElementById("mapVer"), {
            center: loc,
            zoom: 15,
        });
        window.marker = new google.maps.Marker({
            position: loc,
            map: window.map,
            title: titulo,
        });
    } else {
        window.map.setCenter(loc);
        if (window.marker) window.marker.setMap(null);
        window.marker = new google.maps.Marker({
            position: loc,
            map: window.map,
            title: titulo,
        });
    }
}
// ===================== CARGAR PRODUCTOS EN OFERTA (VERSIÓN ANTERIOR) =====================