$(document).ready(function () {
    const params = new URLSearchParams(window.location.search);
    const idProducto = params.get("id") || params.get("rating");


    if (!idProducto) {
        Swal.fire({
            icon: "error",
            title: "Producto no especificado",
            text: "No se encontró el ID en la URL",
            confirmButtonText: "Aceptar"
        });
        return;
    }

    cargarDetalleProducto(idProducto);
});

function cargarDetalleProducto(id) {
    $.ajax({
        url: `../api-ofertapp/producto/funDetalleProducto.php?id=${id}`,
        method: "GET",
        cache: false,
        dataType: "json",
        success: function (producto) {
            if (!producto || producto.error) {
                Swal.fire({
                    icon: "error",
                    title: "Producto no encontrado",
                    confirmButtonText: "Aceptar"
                });
                return;
            }

            // ================== CABECERA ==================
            $("#tituloProducto").text(producto.titulo);
            $("#precioProducto").html(`
                Gs. ${Number(producto.precio).toLocaleString("es-PY")}
                ${producto.precio_anterior ? `<span class="precio-anterior">Gs. ${Number(producto.precio_anterior).toLocaleString("es-PY")}</span>` : ""}
            `);
            $("#linkVendedor").attr("href", "#");

            // Contactos
            $("#contactoVendedor").empty();
            if (producto.contactos && producto.contactos.length > 0) {
                producto.contactos.forEach(c => {
                    let tel = c.telefono ? `<span><i class="fa-solid fa-phone"></i> <a href="tel:${c.telefono}">${c.telefono}</a></span>` : "";
                    let mail = c.correo ? `<span><i class="fa-solid fa-envelope"></i> <a href="mailto:${c.correo}">${c.correo}</a></span>` : "";
                    $("#contactoVendedor").append(tel + mail);
                });
            }

            // ================== META ==================
            $("#departamento").text(producto.direccion?.departamento || "");
            $("#ciudad").text(producto.direccion?.ciudad || "");
            $("#barrio").text(producto.direccion?.barrio || "");
            $("#cantidad").text(producto?.cantidad || "");


            // ================== GALERÍA ==================
            $("#galeriaPrincipal").empty();
            $("#galeriaThumbs").empty();

            if (producto.imagenes && producto.imagenes.length > 0) {
                producto.imagenes.forEach((img, idx) => {
                    $("#galeriaPrincipal").append(`<div class="swiper-slide"><img src="${img}" alt="Imagen ${idx + 1}"></div>`);
                    $("#galeriaThumbs").append(`<div class="swiper-slide"><img src="${img}" alt="Thumb ${idx + 1}"></div>`);
                });
            } else {
                $("#galeriaPrincipal").append(`<div class="swiper-slide"><img src="vistas/img/plantilla/no-image.png" alt="Sin imagen"></div>`);
            }

            new Swiper(".oferta-gallery-main", {
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                thumbs: {
                    swiper: new Swiper(".oferta-gallery-thumbs", {
                        slidesPerView: 4,
                        spaceBetween: 10,
                        watchSlidesProgress: true,
                    }),
                },
            });

            // ================== DESCRIPCIÓN ==================
            $("#descProducto").text(producto.descripcion || "");
            $("#detallesProducto").html(`
                ${producto.color ? `<li>Color: ${producto.color}</li>` : ""}
                ${producto.tamano ? `<li>Tamaño: ${producto.tamano}</li>` : ""}
                ${producto.condicion ? `<li>Condición: ${producto.condicion}</li>` : ""}
            `);

            // ================== RESEÑAS ==================
            $("#reviewsList").empty();
            if (producto.resenas && producto.resenas.length > 0) {
                let sum = 0;
                producto.resenas.forEach(r => {
                    sum += parseFloat(r.calificacion);
                    $("#reviewsList").append(`
                        <article class="review-item">
                            <div class="review-head">
                                <img class="avatar" src="vistas/img/plantilla/avatar-generico.png">
                                <div>
                                    <div class="review-name">${r.usuario || "Anónimo"}</div>
                                    <div class="stars">${dibujarEstrellas(r.calificacion)} <span class="review-date"> · ${r.fecha_agregado}</span></div>
                                </div>
                            </div>
                            <p class="review-text">${r.comentario || ""}</p>
                        </article>
                    `);
                });
                let avg = (sum / producto.resenas.length).toFixed(1);
                $("#avgScore").text(avg);
                $("#reviewsCount").text(`(${producto.resenas.length})`);
                $("#ratingProducto").html(dibujarEstrellas(avg));
            } else {
                $("#reviewsList").html(`<p class="muted">Sé el primero en dejar tu reseña</p>`);
                $("#avgScore").text("0.0");
                $("#reviewsCount").text("(0)");
                $("#ratingProducto").html(dibujarEstrellas(0));
            }

            // ================== UBICACIÓN ==================
            if (producto.georeferencia) {
                initMapaProducto(producto.georeferencia.latitud, producto.georeferencia.longitud, producto.empresa?.nombre || "Ubicación");
            } else {
                $("#ofertaMap").html("<p>No hay ubicación disponible.</p>");
            }

            $("#direccionVendedor").html(`
                <div><b>Dirección:</b> ${producto.direccion?.calle || ""} ${producto.direccion?.numero || ""}, ${producto.direccion?.barrio || ""}, ${producto.direccion?.ciudad || ""}</div>
                <div><b>Departamento:</b> ${producto.direccion?.departamento || ""}</div>
                <div><b>País:</b> ${producto.direccion?.pais || "Paraguay"}</div>
            `);
        },
        error: function () {
            Swal.fire({
                icon: "error",
                title: "Error de conexión",
                text: "No se pudo cargar el producto",
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

    let estrellas = "★".repeat(full);
    if (half) estrellas += "✦";
    estrellas += "☆".repeat(empty);

    return estrellas;
}

// -------- Inicializar mapa --------
function initMapaProducto(lat, lng, titulo) {
    if (!lat || !lng) {
        $("#ofertaMap").html("<p>No hay ubicación disponible.</p>");
        return;
    }

    const loc = { lat: Number(lat), lng: Number(lng) };
    const map = new google.maps.Map(document.getElementById("ofertaMap"), {
        center: loc,
        zoom: 15,
    });

    new google.maps.Marker({
        position: loc,
        map: map,
        title: titulo,
    });

    $("#ofertaComoLlegar").attr("href", `https://www.google.com/maps?q=${lat},${lng}`);
}

// -------- Publicar reseña --------
$(document).on("submit", "#reviewForm", function (e) {
    e.preventDefault();

    const params = new URLSearchParams(window.location.search);
    const idProducto = params.get("id") || params.get("rating");
    const rating = $("input[name='rating']:checked").val();
    const comentario = $("#reviewText").val().trim();
    const idUsuario = $("#idUsuarioSesion").val();

    if (!rating || comentario.length < 10) {
        Swal.fire({
            icon: "warning",
            title: "Datos incompletos",
            text: "Debes seleccionar una calificación y escribir al menos 10 caracteres.",
            confirmButtonText: "Aceptar"
        });
        return;
    }

    $.ajax({
        url: "../api-ofertapp/producto/funAgregarResena.php",
        method: "POST",
        data: JSON.stringify({
            id_usuario: $("#idUsuarioSesion").val(),
            producto_id: idProducto,
            calificacion: rating,
            comentario: comentario
        }),
        contentType: "application/json; charset=utf-8",
        success: function (resp) {
            if (resp.mensaje === "ok") {
                Swal.fire({
                    icon: "success",
                    title: "Reseña publicada",
                    text: "Gracias por tu aporte",
                    confirmButtonText: "Aceptar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: "No se pudo publicar",
                    text: resp.error || "Intenta nuevamente",
                    confirmButtonText: "Aceptar"
                });
            }
        },
        error: function () {
            Swal.fire({
                icon: "error",
                title: "Error de conexión",
                text: "No se pudo enviar la reseña",
                confirmButtonText: "Aceptar"
            });
        }
    });
});

// -------- Mostrar modal con usuario logueado --------
$(document).on("click", "#btnReserva", function () {
    const params = new URLSearchParams(window.location.search);
    const idProducto = params.get("id");

    $.ajax({
        url: "../api-ofertapp/usuario/funVerificarSesion.php",
        method: "GET",
        cache: false,
        dataType: "json",
        success: function (resp) {
            if (resp.logueado) {
                // Muestra el modal y coloca los datos
                $("#modalReserva").modal("show");
                $("#reservaProductoId").val(idProducto);
            } else {
                Swal.fire({
                    icon: "warning",
                    title: "Iniciá sesión para continuar",
                    text: "Debes iniciar sesión para poder reservar este producto.",
                    confirmButtonText: "Iniciar sesión"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "login";
                    }
                });
            }
        },
        error: function () {
            Swal.fire({
                icon: "error",
                title: "Error de conexión",
                text: "No se pudo verificar la sesión",
                confirmButtonText: "Aceptar"
            });
        }
    });
});

// -------- Envío del formulario de reserva --------
$(document).on("submit", "#formReserva", function (e) {
    e.preventDefault();

    const id_producto = $("#reservaProductoId").val();
    const cantidad_reserva = $("#cantidadReserva").val();
    const comentario = $("#comentarioReserva").val().trim();

    if (!cantidad_reserva || cantidad_reserva <= 0) {
        Swal.fire({
            icon: "warning",
            title: "Cantidad inválida",
            text: "Debe ingresar una cantidad válida para reservar.",
            confirmButtonText: "Aceptar"
        });
        return;
    }

    $.ajax({
        url: "../api-ofertapp/reserva/funRegistrarReserva.php",
        method: "POST",
        data: JSON.stringify({
            id_producto: id_producto,
            cantidad_reserva: cantidad_reserva,
            comentario: comentario
        }),
        contentType: "application/json; charset=utf-8",
        success: function (resp) {
            if (resp.mensaje === "ok") {
                Swal.fire({
                    icon: "success",
                    title: "Reserva realizada",
                    text: "Tu reserva fue registrada correctamente.",
                    confirmButtonText: "Aceptar"
                }).then(() => {
                    $("#modalReserva").modal("hide");
                    $("#formReserva")[0].reset();
                    location.reload();
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: resp.error || "No se pudo registrar la reserva.",
                    confirmButtonText: "Aceptar"
                });
            }
        },
        error: function () {
            Swal.fire({
                icon: "error",
                title: "Error de conexión",
                text: "No se pudo contactar con el servidor.",
                confirmButtonText: "Aceptar"
            });
        }
    });
});
