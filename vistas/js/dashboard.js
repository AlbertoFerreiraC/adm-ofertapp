document.addEventListener("DOMContentLoaded", () => {
    cargarOfertas();
    cargarMasVendidos();
    configurarRedireccionCategorias();
});

// =============================
// 🔹 CARGAR OFERTAS ACTIVAS
// =============================
function cargarOfertas() {
    fetch("../api-ofertapp/dashboard/funListarOfertas.php")
        .then(response => response.json())
        .then(data => {
            const contenedor = document.querySelector(".productos-slider .swiper-wrapper");
            contenedor.innerHTML = ""; // Limpia contenido anterior

            if (!data || data.length === 0) {
                contenedor.innerHTML = `<div class="text-center text-muted p-5">No hay ofertas activas.</div>`;
                return;
            }

            data.forEach(oferta => {
                const slide = document.createElement("div");
                slide.classList.add("swiper-slide");
                slide.innerHTML = `
          <div class="producto-card">
            <div class="producto-img-wrapper">
              <img src="${oferta.imagen}" alt="${oferta.titulo}" class="producto-imagen">
              <button type="button" class="icono-ubicacion" aria-label="Ver ubicación">
                <i class="fas fa-map-marker-alt"></i>
              </button>
            </div>
            <div class="producto-detalle">
              <h3 class="producto-nombre">${oferta.titulo}</h3>
              <p class="producto-precio">
                Gs. ${Number(oferta.precio).toLocaleString('es-PY')}
              </p>
              <p class="producto-tienda">${oferta.empresa} · 
                <span class="text-gray-500">${oferta.categoria}</span>
              </p>
              <div class="producto-rating">⭐ ⭐ ⭐ ⭐ ☆</div>
            </div>
          </div>
        `;
                contenedor.appendChild(slide);
            });

            // Reinicializar el Swiper dinámicamente
            if (window.productosSwiper) {
                window.productosSwiper.destroy(true, true);
            }

            window.productosSwiper = new Swiper('.productos-slider', {
                slidesPerView: 4,
                spaceBetween: 20,
                loop: true,
                navigation: {
                    nextEl: '.productos-section .swiper-button-next',
                    prevEl: '.productos-section .swiper-button-prev',
                },
                pagination: {
                    el: '.productos-section .swiper-pagination',
                    clickable: true,
                },
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false
                },
                breakpoints: {
                    320: { slidesPerView: 1, spaceBetween: 10 },
                    640: { slidesPerView: 2, spaceBetween: 15 },
                    1024: { slidesPerView: 4, spaceBetween: 20 }
                }
            });
        })
        .catch(error => {
            console.error("Error al cargar ofertas:", error);
        });
}

// =============================
// 🔹 CARGAR PRODUCTOS MÁS VENDIDOS
// =============================
function cargarMasVendidos() {
    fetch("../api-ofertapp/dashboard/funListarMasVendidos.php")
        .then(response => response.json())
        .then(data => {
            const contenedor = document.querySelector(".masvendidos-slider .swiper-wrapper");
            contenedor.innerHTML = "";

            if (!data || data.length === 0) {
                contenedor.innerHTML = `<div class="text-center text-muted p-5">No hay productos más vendidos aún.</div>`;
                return;
            }

            const top6 = data.slice(0, 6);
            top6.forEach(item => {
                const estrellas = dibujarEstrellas(item.rating);
                const slide = document.createElement("div");
                slide.classList.add("swiper-slide");
                slide.innerHTML = `
          <div class="producto-card">
            <div class="producto-img-wrapper">
              <img src="${item.imagen}" alt="${item.titulo}" class="producto-imagen">
              <button type="button" class="icono-ubicacion" aria-label="Ver ubicación">
                <i class="fas fa-map-marker-alt"></i>
              </button>
            </div>
            <div class="producto-detalle">
              <h3 class="producto-nombre">${item.titulo}</h3>
              <p class="producto-precio">Gs. ${Number(item.precio).toLocaleString('es-PY')}</p>
              <p class="producto-tienda">${item.empresa} · 
                <span class="text-gray-500">${item.categoria}</span>
              </p>
              <div class="producto-rating">${estrellas}</div>
            </div>
          </div>
        `;
                contenedor.appendChild(slide);
            });

            // Reinicializar el Swiper dinámicamente
            if (window.masVendidosSwiper) {
                window.masVendidosSwiper.destroy(true, true);
            }

            window.masVendidosSwiper = new Swiper('.masvendidos-slider', {
                slidesPerView: 4,
                spaceBetween: 20,
                loop: true,
                navigation: {
                    nextEl: '.masvendidos-section .swiper-button-next',
                    prevEl: '.masvendidos-section .swiper-button-prev',
                },
                pagination: {
                    el: '.masvendidos-section .swiper-pagination',
                    clickable: true,
                },
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false
                },
                breakpoints: {
                    320: { slidesPerView: 1, spaceBetween: 10 },
                    640: { slidesPerView: 2, spaceBetween: 15 },
                    1024: { slidesPerView: 4, spaceBetween: 20 }
                }
            });
        })
        .catch(error => {
            console.error("Error al cargar productos más vendidos:", error);
        });
}

// =============================
// 🔹 FUNCIÓN: DIBUJAR ESTRELLAS
// =============================
function dibujarEstrellas(rating) {
    const full = Math.floor(rating);
    const half = (rating - full) >= 0.5 ? 1 : 0;
    const empty = 5 - full - half;
    let estrellas = "⭐".repeat(full);
    if (half) estrellas += "✦";
    estrellas += "☆".repeat(empty);
    return estrellas;
}

// =============================
// 🔹 REDIRECCIÓN POR CATEGORÍA
// =============================
function configurarRedireccionCategorias() {
    document.querySelectorAll(".categoria-item").forEach(item => {
        item.addEventListener("click", (e) => {
            e.preventDefault();
            const categoria = item.getAttribute("data-categoria");
            const url = `productos?categoria=${encodeURIComponent(categoria)}`;
            window.location.href = url;
        });
    });
}
