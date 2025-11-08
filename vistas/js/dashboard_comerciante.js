document.addEventListener("DOMContentLoaded", function () {
    const idUsuario = $("#idUsuarioSesion").val();
    const tipoUsuario = $("#tipoUsuarioSesion").val();

    // 🔸 Solo se ejecuta para comerciantes logueados
    if (tipoUsuario === "comercial" && idUsuario) {
        verificarReservasPendientes(idUsuario);
    }
    // Ejemplo de datos ficticios
    const ventas = [
        { id: 1, cliente: "Juan Pérez", fecha: "2025-09-01", total: 250 },
        { id: 2, cliente: "Ana Gómez", fecha: "2025-09-02", total: 400 }
    ];

    const agendados = [
        { id: 1, cliente: "Carlos Ruiz", fecha: "2025-09-03" },
        { id: 2, cliente: "María López", fecha: "2025-09-04" }
    ];

    // Renderizar tabla de ventas
    const tbodyVentas = document.querySelector("#tabla-ventas tbody");
    ventas.forEach(v => {
        tbodyVentas.innerHTML += `
            <tr>
                <td>${v.id}</td>
                <td>${v.cliente}</td>
                <td>${v.fecha}</td>
                <td>$${v.total}</td>
            </tr>
        `;
    });

    // Renderizar tabla de agendados
    const tbodyAgendados = document.querySelector("#tabla-agendados tbody");
    agendados.forEach(a => {
        tbodyAgendados.innerHTML += `
            <tr>
                <td>${a.id}</td>
                <td>${a.cliente}</td>
                <td>${a.fecha}</td>
            </tr>
        `;
    });

    // Gráfico de ventas mensuales
    const ctx = document.getElementById("graficoVentas").getContext("2d");
    new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio"],
            datasets: [{
                label: "Ventas ($)",
                data: [1200, 900, 1400, 1000, 1600, 1800], // <-- reemplazar con datos reales
                backgroundColor: "#3c8dbc"
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            }
        }
    });
});

function verificarReservasPendientes(idUsuario) {
    fetch(`../api-ofertapp/reserva/funVerReservasPendientes.php?idUsuario=${idUsuario}`)
        .then(res => res.json())
        .then(reservas => {
            if (!reservas || reservas.length === 0) return;

            let listaHtml = reservas.map(r => `
                <div class="reserva-item" style="text-align:left; border:1px solid #ddd; border-radius:10px; padding:10px; margin-bottom:10px;">
                    <p><strong>Producto:</strong> ${r.producto}</p>
                    <p><strong>Cliente:</strong> ${r.cliente} ${r.cliente_apellido}</p>
                    <p><strong>Correo:</strong> <a href="mailto:${r.cliente_email}" target="_blank">${r.cliente_email}</a></p>
                    <p><strong>Teléfono:</strong> <a href="tel:${r.cliente_telefono || ''}">${r.cliente_telefono || 'No disponible'}</a></p>
                    <p><strong>Cantidad:</strong> ${r.cantidad_reserva}</p>
                    <p><strong>Comentario:</strong> ${r.comentario || "Sin comentario"}</p>
                    <p><strong>Fecha:</strong> ${r.fecha_reserva}</p>
                    <button class="btn-finalizar" data-id="${r.id_reserva}" 
                        style="margin-top:8px; padding:5px 10px; background:#28a745; color:white; border:none; border-radius:5px; cursor:pointer;">
                        Finalizar
                    </button>
                </div>
            `).join("");

            Swal.fire({
                title: `Reservas pendientes (${reservas.length})`,
                html: `
                    <div style="max-height:400px; overflow-y:auto; text-align:left;">
                        ${listaHtml}
                    </div>
                `,
                confirmButtonText: "Cerrar",
                confirmButtonColor: "#3085d6",
                width: "600px"
            });

            document.querySelectorAll(".btn-finalizar").forEach(btn => {
                btn.addEventListener("click", e => {
                    const idReserva = e.target.getAttribute("data-id");
                    finalizarReserva(idReserva, e.target);
                });
            });
        })
        .catch(err => console.error("Error al verificar reservas:", err));
}

function finalizarReserva(idReserva, boton) {
    boton.disabled = true;
    boton.innerText = "Actualizando...";

    fetch("../api-ofertapp/reserva/funActualizarReserva.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ idReserva })
    })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                boton.style.background = "#6c757d";
                boton.innerText = "Finalizada";
                boton.disabled = true;
            } else {
                Swal.fire("Error", data.error || "No se pudo actualizar la reserva.", "error");
                boton.disabled = false;
                boton.innerText = "Finalizar";
            }
        })
        .catch(err => {
            console.error("Error al actualizar:", err);
            boton.disabled = false;
            boton.innerText = "Finalizar";
        });
}
