<!-- ======= INFORME: PRODUCTOS MÁS BUSCADOS ======= -->
<section class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-search"></i> Informe: Productos Más Buscados</h1>
    </section>

    <section class="content">
        <!-- === Caja de filtros === -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Filtros de búsqueda</h3>
            </div>

            <div class="box-body">
                <form id="filtroInforme" class="filtro-grid">
                    <div class="form-group">
                        <label for="fecha_inicio">Fecha:</label>
                        <input type="date" id="fecha_inicio" class="form-control" />
                    </div>

                    <div class="btn-container">
                        <button type="button" id="btnBuscar" class="btn btn-primary">
                            <i class="fa fa-search"></i> Buscar
                        </button>
                        <button type="button" id="btnExportarPDF" class="btn btn-danger">
                            <i class="fa fa-file-pdf-o"></i> Exportar PDF
                        </button>
                        <button type="button" id="btnExportarExcel" class="btn btn-success">
                            <i class="fa fa-file-excel-o"></i> Exportar Excel
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- === Caja de resultados === -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Resultados</h3>
            </div>

            <div class="box-body">
                <table id="tablaBusquedas" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Producto</th>
                            <th>Categoría</th>
                            <th>Tienda</th>
                            <th>Interacciones</th>
                            <th>Última Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Se llenará dinámicamente -->
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</section>

<!-- === ESTILOS === -->
<style>
    .filtro-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        align-items: flex-end;
    }

    .filtro-grid .form-group {
        flex: 1 1 200px;
        min-width: 180px;
    }

    .btn-container {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    #tablaBusquedas {
        width: 100%;
        margin-top: 10px;
    }

    #tablaBusquedas th {
        background-color: #f08438;
        color: white;
        text-align: center;
    }

    .btn-container button {
        transition: opacity 0.3s ease;
    }
</style>

<!-- === SCRIPT === -->
<script src="vistas/js/informeBusquedas.js"></script>