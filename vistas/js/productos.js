$(document).ready(function () {
    cargarProductos();
});

function cargarProductos() {
    $("#gridProductos").empty();
    $("#count").text("0");

    const idUsuario = $("#idUsuarioSesion").val();
    const tipoUsuario = $("#tipoUsuarioSesion").val();

    let urlApi = "../api-ofertapp/producto/funListarProductos.php";
    let data = {
        idUsuario: idUsuario,
        tipoUsuario: tipoUsuario
    };

    if (idUsuario && tipoUsuario === "comercial") {
        console.log(`🟢 Comercial logueado (ID: ${idUsuario}) → cargando solo sus productos.`);
    }
    else if (idUsuario && (tipoUsuario === "personal" || tipoUsuario === "administrador")) {
        console.log(`🔵 ${tipoUsuario.charAt(0).toUpperCase() + tipoUsuario.slice(1)} logueado (ID: ${idUsuario}) → cargando todos los productos.`);
    }
    else {
        console.log("⚪ Visitante → cargando productos públicos.");
    }


    $.ajax({
        url: urlApi,
        method: "GET",
        data: data,
        cache: false,
        dataType: "json",
        success: function (response) {
            console.log("✅ Productos cargados:", response);

            if (!response || response.length === 0) {
                $("#vacio").removeClass("hidden");
                $("#count").text("0");
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
                    <div class="producto-card" data-id="${item.id}">
                        <div class="producto-img-wrapper">
                            <img src="${item.img}" alt="${item.nombre}" class="producto-imagen">
                            <button type="button" class="icono-ubicacion" 
                                data-lat="${item.latitud}" 
                                data-lng="${item.longitud}" 
                                data-titulo="${item.empresa}">
                                <i class="fas fa-map-marker-alt"></i>
                            </button>
                        </div>
                        <div class="producto-detalle">
                            <h3 class="producto-nombre">${item.nombre}</h3>
                            <p class="producto-precio">
                                Gs. ${Number(item.precio).toLocaleString('es-PY')}
                                ${precioAnterior}
                            </p>
                            <p class="producto-tienda">${item.empresa} · 
                                <span class="text-gray-500">${item.categoria}</span>
                            </p>
                            <div class="producto-rating">${dibujarEstrellas(item.rating)}</div>
                        </div>
                    </div>
                `;
            });

            $("#gridProductos").append(cards);

            // Evento: ver mapa
            $(".icono-ubicacion").click(function (e) {
                e.stopPropagation();
                verMapa(
                    Number($(this).data("lat")),
                    Number($(this).data("lng")),
                    $(this).data("titulo")
                );
            });

            // Evento: ir a detalle del producto
            $(".producto-card").click(function () {
                const id = $(this).data("id");
                window.location.href = `descripcionProductos?id=${id}`;
            });
        },
        error: function (xhr, status, error) {
            console.error("❌ Error AJAX:", status, error);
            Swal.fire({
                icon: "error",
                title: "Error al cargar productos",
                text: "No se pudo obtener los productos. Intenta más tarde.",
                confirmButtonText: "Aceptar"
            });
        }
    });
}

// -------- Dibujar estrellas --------
function dibujarEstrellas(rating) {
    const full = Math.floor(rating);
    const half = (rating - full) >= 0.5 ? 1 : 0;
    const empty = 5 - full - half;

    let estrellas = "⭐ ".repeat(full);
    if (half) estrellas += "✦ ";
    estrellas += "☆ ".repeat(empty);

    return estrellas;
}

// -------- Ver mapa --------
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
