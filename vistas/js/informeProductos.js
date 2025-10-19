document.addEventListener("DOMContentLoaded", () => {
    const btnBuscar = document.getElementById("btnBuscar");
    const btnExportar = document.getElementById("btnExportar");
    const btnExportarExcel = document.getElementById("btnExportarExcel");
    const tablaBody = document.querySelector("#tablaProductos tbody");

    // === FUNCIÓN: Cargar datos ===
    async function cargarDatos() {
        const filtros = {
            fecha_inicio: document.getElementById("fecha_inicio").value
        };

        try {
            // ✅ Ruta corregida según tu estructura
            const response = await fetch("../api-ofertapp/informes/informe_productos.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(filtros),
            });

            if (!response.ok) {
                throw new Error("Error HTTP " + response.status);
            }

            const data = await response.json();
            renderTabla(data);
        } catch (error) {
            console.error("Error al cargar informe:", error);
        }
    }

    // === FUNCIÓN: Renderizar tabla ===
    function renderTabla(data) {
        tablaBody.innerHTML = "";
        if (!data || data.length === 0) {
            tablaBody.innerHTML =
                "<tr><td colspan='5' class='text-center'>No hay resultados</td></tr>";
            return;
        }

        data.forEach((item, index) => {
            const fila = `
                <tr>
                    <td>${index + 1}</td>
                    <td>${item.nombre_producto}</td>
                    <td>${item.nombre_tienda}</td>
                    <td>${item.total_consultas}</td>
                    <td>${item.ultima_fecha}</td>
                </tr>`;
            tablaBody.insertAdjacentHTML("beforeend", fila);
        });
    }

    // === FUNCIÓN: Exportar a PDF ===
    function exportarPDF() {
        const params = new URLSearchParams({
            fecha_inicio: document.getElementById("fecha_inicio").value
        });
        // ✅ Ruta ajustada
        window.open("../api-ofertapp/informes/exportar_informe_productos.php?" + params.toString(), "_blank");
    }

    // === FUNCIÓN: Exportar a Excel ===
    function exportarExcel() {
        const params = new URLSearchParams({
            fecha_inicio: document.getElementById("fecha_inicio").value
        });
        // ✅ Nueva ruta para el archivo Excel
        window.open("../api-ofertapp/informes/exportar_informe_productos_excel.php?" + params.toString(), "_blank");
    }

    // === EVENTOS ===
    btnBuscar.addEventListener("click", cargarDatos);
    btnExportar.addEventListener("click", exportarPDF);
    btnExportarExcel.addEventListener("click", exportarExcel);
});
