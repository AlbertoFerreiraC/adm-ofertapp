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

      .f-chip {
        background: #f1f5f9;
        border: 1px solid #e2e8f0;
        color: #334155;
        border-radius: 999px;
        padding: .25rem .5rem;
        font-size: .85rem;
        display: inline-flex;
        gap: .35rem;
        align-items: center;
      }
    </style>

    <div id="app" style="min-height:100vh; padding:20px;">

      <!-- Header -->
      <div class="flex flex-wrap items-center justify-between gap-3 mb-4">
        <h1 class="text-2xl md:text-3xl font-black">Productos</h1>
        <div class="text-sm text-gray-600"><span id="count">0</span> productos</div>
      </div>

      <!-- Toolbar filtros -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3 mb-4">
        <div class="relative col-span-1 lg:col-span-2">
          <button id="catBtn"
            class="w-full flex items-center justify-between bg-white border border-gray-200 rounded-xl px-3 py-2">
            <span class="flex items-center gap-2 font-semibold">
              <i class="fa fa-tags text-gray-500"></i>
              <span id="catBtnLabel">Categorías: Todas</span>
            </span>
            <i class="fa fa-chevron-down text-gray-500"></i>
          </button>
          <div id="catMenu"
            class="hidden absolute z-20 mt-2 w-full bg-white border border-gray-200 rounded-xl p-3 max-h-72 overflow-auto">
            <div id="cats" class="grid grid-cols-2 md:grid-cols-3 gap-2 text-[15px]"></div>
            <div id="chips" class="flex flex-wrap gap-2 mt-3"></div>
            <div class="mt-3 flex justify-end gap-2">
              <button id="catClear" class="px-3 py-1.5 rounded bg-gray-100 hover:bg-gray-200 font-semibold">Limpiar</button>
              <button id="catApply" class="px-3 py-1.5 rounded bg-blue-600 text-white hover:bg-blue-700 font-semibold">Aplicar</button>
            </div>
          </div>
        </div>
        <div class="bg-white border border-gray-200 rounded-xl px-3 py-2 flex items-center gap-2">
          <i class="fa fa-filter text-gray-500"></i>
          <button id="btnFiltros" class="font-semibold">Filtros</button>
        </div>
        <select id="sort" class="bg-white border border-gray-200 rounded-xl px-3 py-2 font-semibold">
          <option value="relevance">Relevancia</option>
          <option value="price_asc">Precio: menor a mayor</option>
          <option value="price_desc">Precio: mayor a menor</option>
          <option value="name_asc">Nombre: A–Z</option>
        </select>
      </div>

      <!-- Grid productos dinámico -->
      <section id="gridProductos" class="grid gap-4 grid-cols-[repeat(auto-fill,minmax(220px,1fr))]"></section>

      <div id="vacio" class="hidden bg-white border border-gray-200 rounded-xl p-8 text-center">
        No hay resultados con esos filtros.
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

<script src="vistas/js/productos.js"></script>