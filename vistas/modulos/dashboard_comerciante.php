<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$idUsuarioSesion = $_SESSION['id_usuario'] ?? '';
$tipoUsuarioSesion = $_SESSION['tipo_usuario'] ?? '';
?>

<div class="content-wrapper">
    <input type="hidden" id="idUsuarioSesion" value="<?php echo $idUsuarioSesion; ?>">
    <input type="hidden" id="tipoUsuarioSesion" value="<?php echo $tipoUsuarioSesion; ?>">

    <!-- Encabezado -->
    <section class="content-header">
        <h1>
            Dashboard Comerciante
            <small>Panel de control</small>
        </h1>
    </section>

    <section class="content">
        <!-- MÉTRICAS PRINCIPALES -->
        <div class="row">
            <!-- Promedio de ventas -->
            <div class="col-lg-4 col-xs-12">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>$0</h3>
                        <p>Promedio de ventas</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-chart-line"></i>
                    </div>
                </div>
            </div>

            <!-- Número de ventas -->
            <div class="col-lg-4 col-xs-12">
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>0</h3>
                        <p>Últimas ventas</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                </div>
            </div>

            <!-- Últimos agendados -->
            <div class="col-lg-4 col-xs-12">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>0</h3>
                        <p>Últimos agendados</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-calendar-check"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- TABLAS DE DATOS -->
        <div class="row">

            <!-- Últimas Ventas -->
            <div class="col-lg-6">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Últimas Ventas</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-striped" id="tabla-ventas">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Cliente</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Llenado dinámico desde JS -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Últimos Agendados -->
            <div class="col-lg-6">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Últimos Agendados</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-striped" id="tabla-agendados">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Cliente</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Llenado dinámico desde JS -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        <!-- GRÁFICO DE VENTAS -->
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Gráfico de Ventas Mensuales</h3>
                    </div>
                    <div class="box-body">
                        <canvas id="graficoVentas"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </section>

</div>

<script src="vistas/js/dashboard_comerciante.js"></script>