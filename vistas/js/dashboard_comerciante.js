document.addEventListener("DOMContentLoaded", function () {
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
