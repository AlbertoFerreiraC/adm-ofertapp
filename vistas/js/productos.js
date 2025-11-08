$(document).ready(function () {
    const params = new URLSearchParams(window.location.search);
    const categoria = params.get("categoria");
    const tipoUsuario = $("#tipoUsuarioSesion").val();

    if (categoria) {
        console.log("Filtro activo por categoría:", categoria);
        filtrarPorCategoria(categoria);
        return;
    }

    if (tipoUsuario === "personal") {
        console.log("Usuario personal detectado → solicitando ubicación...");

        Swal.fire({
            icon: "info",
            title: "Productos cercanos",
            text: "Los productos se mostrarán en orden de cercanía a tu ubicación actual.",
            confirmButtonText: "Continuar",
            confirmButtonColor: "#3085d6",
            backdrop: true,
            allowOutsideClick: false
        }).then(() => {
            obtenerUbicacionUsuario();
        });
        return;
    }

    // Si NO hay sesión iniciada → mostrar alerta de visitante
    if (!tipoUsuario || tipoUsuario.trim() === "") {
        console.log("Visitante detectado → mostrando aviso de geolocalización");
        Swal.fire({
            icon: "info",
            title: "Productos cercanos",
            text: "Inicia sesión para ver productos cerca de tu ubicación y recibir recomendaciones personalizadas.",
            confirmButtonText: "Entendido",
            confirmButtonColor: "#3085d6",
            backdrop: true,
            allowOutsideClick: true,
            timer: 6000,
            timerProgressBar: true
        }).then(() => {
            cargarProductos(); // cargar productos públicos luego del aviso
        });
        return;
    }

    // En cualquier otro caso → carga normal
    console.log("Mostrando todos los productos (sin geolocalización)");
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
    } else if (idUsuario && (tipoUsuario === "personal" || tipoUsuario === "administrador")) {
        console.log(`🔵 ${tipoUsuario.charAt(0).toUpperCase() + tipoUsuario.slice(1)} logueado (ID: ${idUsuario}) → cargando todos los productos.`);
    } else {
        console.log("Visitante → cargando productos públicos.");
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
                // 🔍 Detecta automáticamente la clave del ID
                const idProducto = item.idProducto || item.id_producto || item.id || null;

                if (!idProducto) {
                    console.warn("⚠️ Producto sin ID:", item);
                    return; // evita crear tarjetas sin ID
                }

                let precioAnterior = item.precio_anterior
                    ? `<span class="precio-anterior">Gs. ${Number(item.precio_anterior).toLocaleString('es-PY')}</span>`
                    : "";

                cards += `
            <div class="producto-card" data-id="${idProducto}">
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

// -------- Evento global para abrir la descripción --------
$(document).on("click", ".producto-card", function () {
    const id = $(this).data("id");
    if (id) {
        console.log("➡️ Redirigiendo a detalle del producto ID:", id);
        window.location.href = `descripcionProductos?id=${id}`;
    } else {
        console.warn("⚠️ No se encontró ID en la tarjeta del producto.");
    }
});

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

// -------- Filtrar por categoría --------
function filtrarPorCategoria(nombreCategoria) {
    $.ajax({
        url: "../api-ofertapp/producto/funListarPorCategoria.php",
        method: "GET",
        data: { categoria: nombreCategoria },
        dataType: "json",
        success: function (response) {
            console.log(`✅ Productos de la categoría ${nombreCategoria}:`, response);
            mostrarProductosFiltrados(response, nombreCategoria);
        },
        error: function (xhr, status, error) {
            console.error("❌ Error al filtrar productos:", error);
        }
    });
}

function mostrarProductosFiltrados(productos, categoria) {
    $("#gridProductos").empty();
    $("#tituloCategoria").text(`Productos en ${categoria}`);

    if (!productos || productos.length === 0) {
        $("#gridProductos").html(`<div class="text-center text-muted p-5">No se encontraron productos en esta categoría.</div>`);
        return;
    }

    let cards = "";
    productos.forEach(item => {
        // 🔍 Detecta automáticamente la clave del ID, igual que en cargarProductos()
        const idProducto = item.idProducto || item.id_producto || item.id || null;

        if (!idProducto) {
            console.warn("⚠️ Producto sin ID en categoría:", item);
            return;
        }

        cards += `
            <div class="producto-card" data-id="${idProducto}">
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
                    <p class="producto-precio">Gs. ${Number(item.precio).toLocaleString('es-PY')}</p>
                    <p class="producto-tienda">${item.empresa} · 
                        <span class="text-gray-500">${item.categoria}</span>
                    </p>
                    <div class="producto-rating">${dibujarEstrellas(item.rating)}</div>
                </div>
            </div>`;
    });

    $("#gridProductos").html(cards);
}


// -------- Obtener ubicación del usuario --------
function obtenerUbicacionUsuario() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            (pos) => {
                const lat = pos.coords.latitude;
                const lng = pos.coords.longitude;

                console.log("📍 Ubicación obtenida:", lat, lng);

                fetch(`../api-ofertapp/producto/funListarCercanos.php?lat=${lat}&lng=${lng}`)
                    .then(res => res.json())
                    .then(data => {
                        console.log("✅ Productos cercanos:", data);
                        mostrarProductosFiltrados(data, "Cercanos a ti");
                    })
                    .catch(err => console.error("❌ Error al cargar cercanos:", err));
            },
            (err) => {
                console.warn("⚠️ El usuario denegó el permiso de ubicación.", err);
                Swal.fire("Atención", "No podemos mostrarte productos cercanos sin tu ubicación.", "info");
                cargarProductos(); // fallback
            }
        );
    } else {
        Swal.fire("Error", "Tu navegador no soporta geolocalización.", "error");
    }
}
