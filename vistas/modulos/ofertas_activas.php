<div class="content-wrapper">
    <section class="content">

        <style>
            .producto-card {
                border: 1px solid #ddd;
                border-radius: 10px;
                background: #fff;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
                overflow: hidden;
                transition: transform 0.2s;
                display: flex;
                flex-direction: column;
                height: 100%;
                min-height: 380px;
                max-height: 380px;
            }

            .producto-card:hover {
                transform: scale(1.03);
            }

            .producto-img-wrapper {
                position: relative;
                width: 100%;
                height: 180px;
                overflow: hidden;
                background: #f6f7fb;
            }

            .producto-imagen {
                width: 100%;
                height: 100%;
                object-fit: contain;
                display: block;
            }

            .icono-ubicacion {
                position: absolute;
                top: 8px;
                right: 8px;
                background: rgba(0, 0, 0, 0.6);
                color: #fff;
                padding: 6px;
                border: 0;
                border-radius: 50%;
                font-size: 14px;
                cursor: pointer;
            }

            .producto-detalle {
                padding: 15px;
                flex: 1;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
            }

            .producto-nombre {
                font-size: 16px;
                font-weight: 600;
                margin-bottom: 8px;
                color: #0f172a;
            }

            .producto-precio {
                font-size: 18px;
                font-weight: bold;
                color: #063654;
            }

            .precio-anterior {
                text-decoration: line-through;
                color: #999;
                margin-left: 5px;
                font-size: 14px;
            }

            .producto-tienda {
                font-size: 14px;
                color: #666;
                margin: 5px 0;
            }

            .producto-rating {
                color: #ff9900;
                font-size: 16px;
            }

            .badge-oferta {
                background: linear-gradient(90deg, #ff6600, #ff9900);
                color: white;
                font-weight: bold;
                font-size: 13px;
                border-radius: 50px;
                padding: 3px 10px;
                position: absolute;
                top: 8px;
                left: 8px;
                z-index: 5;
            }
        </style>

        <div id="app" style="min-height:100vh; padding:20px;">

            <!-- Header -->
            <div class="flex flex-wrap items-center justify-between gap-3 mb-4">
                <h1 class="text-2xl md:text-3xl font-black text-orange-600">
                    Ofertas Activas 🔥
                </h1>
                <div class="text-sm text-gray-600">
                    <span id="count">0</span> productos en oferta
                </div>
            </div>

            <!-- Grid productos dinámico -->
            <section id="gridOfertas" class="grid gap-4 grid-cols-[repeat(auto-fill,minmax(220px,1fr))]"></section>

            <div id="vacio" class="hidden bg-white border border-gray-200 rounded-xl p-8 text-center">
                No hay ofertas activas por el momento.
            </div>
        </div>

        <!-- Modal Ver Mapa -->
        <div class="modal fade" id="modalVerMapa" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><i class="fa fa-location-dot mr-2"></i> Ubicación del producto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="height: 400px;">
                        <div id="mapVer" style="width:100%; height:100%;"></div>
                    </div>
                    <div class="modal-footer">
                        <a id="linkComoLlegar" class="btn btn-primary" target="_blank">
                            <i class="fa fa-route mr-1"></i> Cómo llegar
                        </a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>


<script src="vistas/js/ofertas_activas.js"></script>
