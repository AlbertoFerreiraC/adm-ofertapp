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
    <section class="content-header">
        <h1>Administrar Empresas</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Empresas</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">

            <div class="box-header with-border">
                <div class="form-group col-md-3 col-sm-6 col-xs-12">
                    <button class="btn btn-success btn-block" data-toggle="modal" data-target="#modalAgregarEmpresa">
                        <i class="fa fa-plus"></i> Agregar Empresa
                    </button>
                </div>
                <div class="form-group col-md-9 col-sm-6 col-xs-12">
                    <input type="text" style="text-align: center; font-size: 16px;"
                        class="form-control" id="filtradoEmpresa"
                        autocomplete="off" placeholder="Buscar empresa...">
                </div>
            </div>

            <div class="box-body">
                <div id="divEmpresa">
                    <table class="table table-bordered table-striped dt-responsive" id="tablaEmpresas" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Categoría</th>
                                <th>Dirección</th>
                                <th>Mapa</th>
                                <th style="width:120px;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
</div>

<!--=====================================
MODAL AGREGAR EMPRESA
======================================-->
<div id="modalAgregarEmpresa" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form role="form" method="post" id="formEmpresaAgregar">

                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar Empresa</h4>
                </div>

                <div class="modal-body">
                    <div class="box-body">

                        <!-- Nombre -->
                        <div class="form-group">
                            <label>Nombre de la Empresa</label>
                            <input type="text" class="form-control" name="nombreEmpresa" id="nombreEmpresa" required>
                        </div>

                        <!-- Categoría -->
                        <div class="form-group">
                            <label>Categoría</label>
                            <select class="form-control" name="categoriaEmpresa" id="categoriaEmpresa" required>
                                <option value="">Seleccione una categoría</option>
                            </select>
                        </div>

                        <!-- Dirección desglosada -->
                        <div class="form-group"><label>Calle</label>
                            <input type="text" class="form-control" id="calle" name="calle" required>
                        </div>
                        <div class="form-group"><label>Número</label>
                            <input type="text" class="form-control" id="numero" name="numero">
                        </div>
                        <div class="form-group"><label>Barrio</label>
                            <input type="text" class="form-control" id="barrio" name="barrio">
                        </div>
                        <div class="form-group"><label>Ciudad</label>
                            <input type="text" class="form-control" id="ciudad" name="ciudad" required>
                        </div>
                        <div class="form-group"><label>Departamento</label>
                            <input type="text" class="form-control" id="departamento" name="departamento">
                        </div>
                        <div class="form-group"><label>País</label>
                            <input type="text" class="form-control" id="pais" name="pais" required>
                        </div>

                        <!-- Google Maps -->
                        <div class="form-group">
                            <label>Ubicación en el mapa</label>
                            <div id="mapAgregar" style="height: 400px; width: 100%; border:1px solid #ccc;"></div>

                            <!-- Campos visibles de latitud y longitud -->
                            <div class="row" style="margin-top:10px;">
                                <div class="col-md-6">
                                    <label>Latitud</label>
                                    <input type="text" class="form-control" id="latitud" name="latitud" readonly required>
                                </div>
                                <div class="col-md-6">
                                    <label>Longitud</label>
                                    <input type="text" class="form-control" id="longitud" name="longitud" readonly required>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="button" class="btn btn-primary" id="btnGuardarEmpresa">
                        <i class="fa fa-save"></i> Guardar Empresa
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<!--=====================================
MODAL MODIFICAR EMPRESA
======================================-->
<div id="modalModificarEmpresa" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form role="form" method="post" id="formEmpresaModificar">

                <div class="modal-header" style="background:#f39c12; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modificar Empresa</h4>
                </div>

                <div class="modal-body">
                    <div class="box-body">

                        <input type="hidden" id="idModificar" name="idModificar">

                        <!-- Nombre -->
                        <div class="form-group">
                            <label>Nombre de la Empresa</label>
                            <input type="text" class="form-control" id="nombreEmpresaModificar" name="nombreEmpresaModificar" required>
                        </div>

                        <!-- Categoría -->
                        <div class="form-group">
                            <label>Categoría</label>
                            <select class="form-control" id="categoriaEmpresaModificar" name="categoriaEmpresaModificar" required>
                                <option value="">Seleccione una categoría</option>
                            </select>
                        </div>

                        <!-- Dirección desglosada -->
                        <div class="form-group"><label>Calle</label>
                            <input type="text" class="form-control" id="calleModificar" name="calleModificar" required>
                        </div>
                        <div class="form-group"><label>Número</label>
                            <input type="text" class="form-control" id="numeroModificar" name="numeroModificar">
                        </div>
                        <div class="form-group"><label>Barrio</label>
                            <input type="text" class="form-control" id="barrioModificar" name="barrioModificar">
                        </div>
                        <div class="form-group"><label>Ciudad</label>
                            <input type="text" class="form-control" id="ciudadModificar" name="ciudadModificar" required>
                        </div>
                        <div class="form-group"><label>Departamento</label>
                            <input type="text" class="form-control" id="departamentoModificar" name="departamentoModificar">
                        </div>
                        <div class="form-group"><label>País</label>
                            <input type="text" class="form-control" id="paisModificar" name="paisModificar" required>
                        </div>

                        <!-- Google Maps -->
                        <div class="form-group">
                            <label>Ubicación en el mapa</label>
                            <div id="mapModificar" style="height: 400px; width: 100%; border:1px solid #ccc;"></div>

                            <!-- Campos visibles de latitud y longitud -->
                            <div class="row" style="margin-top:10px;">
                                <div class="col-md-6">
                                    <label>Latitud</label>
                                    <input type="text" class="form-control" id="latitudModificar" name="latitudModificar" readonly required>
                                </div>
                                <div class="col-md-6">
                                    <label>Longitud</label>
                                    <input type="text" class="form-control" id="longitudModificar" name="longitudModificar" readonly required>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="button" class="btn btn-warning" id="btnModificarEmpresa">
                        <i class="fa fa-save"></i> Guardar Cambios
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<!--=====================================
MODAL VER MAPA
======================================-->
<div id="modalVerMapa" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background:#00a65a; color:white">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ubicación de la Empresa</h4>
            </div>
            <div class="modal-body">
                <div id="mapVer" style="height: 450px; width: 100%;"></div>
            </div>
        </div>
    </div>
</div>

<script>
    function initMap() {
        var defaultLocation = {
            lat: -25.30066,
            lng: -57.63591
        };
        var map = new google.maps.Map(document.getElementById("mapAgregar"), {
            zoom: 14,
            center: defaultLocation
        });
        var marker = new google.maps.Marker({
            position: defaultLocation,
            map: map,
            draggable: true
        });

        google.maps.event.addListener(marker, "dragend", function(event) {
            document.getElementById("latitud").value = event.latLng.lat();
            document.getElementById("longitud").value = event.latLng.lng();
        });
    }

    function initMapModificar(lat, lng) {
        var location = {
            lat: parseFloat(lat),
            lng: parseFloat(lng)
        };
        var map = new google.maps.Map(document.getElementById("mapModificar"), {
            zoom: 14,
            center: location
        });
        var marker = new google.maps.Marker({
            position: location,
            map: map,
            draggable: true
        });

        google.maps.event.addListener(marker, "dragend", function(event) {
            document.getElementById("latitudModificar").value = event.latLng.lat();
            document.getElementById("longitudModificar").value = event.latLng.lng();
        });
    }

    function verMapa(lat, lng) {
        $('#modalVerMapa').modal('show');
        setTimeout(function() {
            var location = {
                lat: parseFloat(lat),
                lng: parseFloat(lng)
            };
            var mapVer = new google.maps.Map(document.getElementById("mapVer"), {
                zoom: 16,
                center: location
            });
            new google.maps.Marker({
                position: location,
                map: mapVer
            });
        }, 500);
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCuAZrhi9qDqGs9x8K_xucxfIE8iwQTkKw&callback=initMap" async defer></script>
<script src="vistas/js/empresa.js"></script>

<style>
    #divEmpresa {
        overflow: auto;
        width: 100%;
    }
</style>