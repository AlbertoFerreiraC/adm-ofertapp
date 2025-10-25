document.addEventListener("DOMContentLoaded", () => {
    const btnBuscar = document.getElementById("btnBuscar");
    const btnExportarPDF = document.getElementById("btnExportarPDF");
    const btnExportarExcel = document.getElementById("btnExportarExcel");
    const tablaBody = document.querySelector("#tablaBusquedas tbody");

    // === OCULTAR BOTONES DE EXPORTACIÓN AL INICIO ===
    btnExportarPDF.style.display = "none";
    btnExportarExcel.style.display = "none";

    // === FUNCIÓN: Cargar datos ===
    async function cargarDatos() {
        const filtros = {
            fecha_inicio: document.getElementById("fecha_inicio").value
        };

        try {
            const response = await fetch("../api-ofertapp/informes/informe_busquedas.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(filtros),
            });

            if (!response.ok) throw new Error("Error HTTP " + response.status);

            const data = await response.json();
            renderTabla(data);
        } catch (error) {
            console.error("Error al cargar el informe:", error);
            ocultarBotonesExportar(); // En caso de error también se ocultan
        }
    }

    // === FUNCIÓN: Renderizar tabla ===
    function renderTabla(data) {
        tablaBody.innerHTML = "";

        if (!data || data.length === 0) {
            tablaBody.innerHTML =
                "<tr><td colspan='6' class='text-center'>No hay resultados para la fecha seleccionada</td></tr>";
            ocultarBotonesExportar();
            return;
        }

        // Mostrar botones solo si hay resultados
        mostrarBotonesExportar();

        data.forEach((item, index) => {
            const fila = `
                <tr>
                    <td>${index + 1}</td>
                    <td>${item.nombre_producto}</td>
                    <td>${item.categoria}</td>
                    <td>${item.tienda}</td>
                    <td>${item.total_interacciones}</td>
                    <td>${item.ultima_interaccion}</td>
                </tr>`;
            tablaBody.insertAdjacentHTML("beforeend", fila);
        });
    }

    // === FUNCIÓN: Mostrar / Ocultar botones ===
    function mostrarBotonesExportar() {
        btnExportarPDF.style.display = "inline-block";
        btnExportarExcel.style.display = "inline-block";
    }

    function ocultarBotonesExportar() {
        btnExportarPDF.style.display = "none";
        btnExportarExcel.style.display = "none";
    }

    // === FUNCIÓN: Exportar a PDF ===
    function exportarPDF() {
        const params = new URLSearchParams({
            fecha_inicio: document.getElementById("fecha_inicio").value
        });
        window.open("../api-ofertapp/informes/exportar_informe_busquedas.php?" + params.toString(), "_blank");
    }

    // === FUNCIÓN: Exportar a Excel ===
    function exportarExcel() {
        const params = new URLSearchParams({
            fecha_inicio: document.getElementById("fecha_inicio").value
        });
        window.open("../api-ofertapp/informes/exportar_informe_busquedas_excel.php?" + params.toString(), "_blank");
    }

    // === EVENTOS ===
    btnBuscar.addEventListener("click", cargarDatos);
    btnExportarPDF.addEventListener("click", exportarPDF);
    btnExportarExcel.addEventListener("click", exportarExcel);
});
