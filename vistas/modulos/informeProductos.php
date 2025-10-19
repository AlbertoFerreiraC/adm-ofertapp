<!-- ======= INFORME: PRODUCTOS MÁS CONSULTADOS ======= -->
<section class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-pie-chart"></i> Informe: Productos Más Consultados</h1>
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
                        <label for="fecha_inicio">Fecha inicio:</label>
                        <input type="date" id="fecha_inicio" class="form-control" />
                    </div>

                    <div class="btn-container">
                        <button type="button" id="btnBuscar" class="btn btn-primary">
                            <i class="fa fa-search"></i> Buscar
                        </button>
                        <button type="button" id="btnExportar" class="btn btn-danger">
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
                <table id="tablaProductos" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Producto</th>
                            <th>Tienda</th>
                            <th>Consultas</th>
                            <th>Última fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Se llenará dinámicamente con JS -->
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</section>


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

    #tablaProductos {
        width: 100%;
        margin-top: 10px;
    }

    #tablaProductos th {
        background-color: #f08438;
        color: white;
        text-align: center;
    }
</style>

<script src="vistas/js/informeProductos.js"></script>