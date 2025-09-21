<?php
/* ===========================
   MOCK de productos (cámbialo por tu BD)
   =========================== */
$productos = [
  ["id"=>1,"nombre"=>"Campera de Cuero Zara Talle M","precio"=>600000,"precio_anterior"=>950000,"tienda"=>"Tienda Moda","categoria"=>"Moda","rating"=>4.6,"img"=>"vistas/img/plantilla/camperaZara.png","lat"=>-25.34342,"lng"=>-57.51050],
  ["id"=>2,"nombre"=>"Bandeja de melamina Premium","precio"=>55000,"precio_anterior"=>119000,"tienda"=>"Rodeo","categoria"=>"Hogar","rating"=>4.2,"img"=>"vistas/img/plantilla/muebles.png","lat"=>-25.30066,"lng"=>-57.63591],
  ["id"=>3,"nombre"=>"Sommier 180x200 Koala Premium","precio"=>3919000,"precio_anterior"=>4700000,"tienda"=>"CaDo Hogar","categoria"=>"Hogar","rating"=>5,"img"=>"vistas/img/plantilla/camaSomierKoala.png","lat"=>-25.282,"lng"=>-57.635],
  ["id"=>4,"nombre"=>"Zapato Vizzano","precio"=>200000,"precio_anterior"=>250000,"tienda"=>"Zapatos","categoria"=>"Calzado","rating"=>4,"img"=>"vistas/img/plantilla/zapatoVisano.png","lat"=>-25.29,"lng"=>-57.62],
  ["id"=>5,"nombre"=>"Pollera de Cuero Zara Talle M","precio"=>400000,"precio_anterior"=>600000,"tienda"=>"Tienda Moda","categoria"=>"Moda","rating"=>4,"img"=>"vistas/img/plantilla/polleraZara.png","lat"=>-25.34342,"lng"=>-57.51050],
  ["id"=>6,"nombre"=>"Gaseosa Pulp 2L","precio"=>11000,"precio_anterior"=>12500,"tienda"=>"Maxi Super","categoria"=>"Alimentos","rating"=>4,"img"=>"vistas/img/plantilla/gaseosa.png","lat"=>-25.34,"lng"=>-57.53],
  ["id"=>7,"nombre"=>"Arroz Premium 1Kg","precio"=>8900,"precio_anterior"=>10500,"tienda"=>"Super Don Juan","categoria"=>"Alimentos","rating"=>5,"img"=>"vistas/img/plantilla/arroz.png","lat"=>-25.31,"lng"=>-57.62]
];
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1"/>
<title>Ofertapp – Productos</title>

<!-- Tailwind para el layout -->
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

<style>
/* ===== ESTILO DE TUS TARJETAS (igual a Ofertas/Promos) ===== */
.producto-card {
  border: 1px solid #ddddddff;
  border-radius: 10px;
  background: #fff;
  box-shadow: 0 2px 6px rgba(0,0,0,0.1);
  overflow: hidden;
  transition: transform 0.2s;
  display: flex;
  flex-direction: column;
  height: 100%;
  min-height: 380px;
  max-height: 380px;
}
.producto-card:hover { transform: scale(1.03); }

.producto-img-wrapper{
  position: relative; width: 100%; height: 180px;
  overflow: hidden; flex-shrink: 0; background:#f6f7fb;
}
.producto-imagen{ width:100%; height:100%; object-fit:contain; display:block; } /* adaptativa */

.icono-ubicacion{
  position:absolute; top:8px; right:8px;
  background:rgba(0,0,0,0.6); color:#fff;
  padding:6px; border:0; border-radius:50%;
  font-size:14px; line-height:1; cursor:pointer;
  transition: transform .2s, background .2s;
}
.icono-ubicacion:hover{ transform:scale(1.1); background:#e53935; }

.producto-detalle{ padding:15px; flex:1; display:flex; flex-direction:column; justify-content:space-between; }
.producto-nombre{ font-size:16px; font-weight:600; margin-bottom:8px; color:#0f172a; }
.producto-precio{ font-size:18px; font-weight:bold; color:#063654; }
.precio-anterior{ text-decoration:line-through; color:#999; margin-left:5px; font-size:14px; }
.producto-tienda{ font-size:14px; color:#666; margin:5px 0; }
.producto-rating{ color:#ff9900; font-size:16px; }

/* Chips selector */
.f-chip{
  background:#f1f5f9; border:1px solid #e2e8f0; color:#334155;
  border-radius:999px; padding:.25rem .5rem; font-size:.85rem; display:inline-flex; gap:.35rem; align-items:center;
}
</style>
</head>
<body class="bg-gray-50 text-gray-900">
  <div class="max-w-7xl mx-auto px-4 py-5" id="app">

    <!-- Título + contador -->
    <div class="flex flex-wrap items-center justify-between gap-3 mb-4">
      <h1 class="text-2xl md:text-3xl font-black">Productos</h1>
      <div class="text-sm text-gray-600"><span id="count">0</span> productos</div>
    </div>

    <!-- Toolbar: CATEGORÍAS (en lugar de buscador) + filtros + ordenar -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3 mb-4">
      <!-- Categorías (dropdown multi-selección) -->
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

      <!-- Filtros -->
      <div class="bg-white border border-gray-200 rounded-xl px-3 py-2 flex items-center gap-2">
        <i class="fa fa-filter text-gray-500"></i>
        <button id="btnFiltros" class="font-semibold">Filtros</button>
      </div>

      <!-- Orden -->
      <select id="sort" class="bg-white border border-gray-200 rounded-xl px-3 py-2 font-semibold">
        <option value="relevance">Relevancia</option>
        <option value="price_asc">Precio: menor a mayor</option>
        <option value="price_desc">Precio: mayor a menor</option>
        <option value="name_asc">Nombre: A–Z</option>
      </select>
    </div>

    <!-- Panel de filtros (precio) -->
    <div id="panelFiltros" class="hidden grid grid-cols-1 lg:grid-cols-3 gap-4 mb-3">
      <!-- Precio -->
      <div class="lg:col-span-2 bg-white border border-gray-200 rounded-xl p-4">
        <h3 class="font-extrabold mb-2"><i class="fa fa-money-bill mr-2"></i>Precio (Gs.)</h3>
        <div class="grid grid-cols-2 gap-3">
          <div>
            <label class="text-sm text-gray-500">Mín</label>
            <input id="min" type="number" step="1000" min="0" class="w-full border border-gray-200 rounded-lg px-3 py-2 mt-1">
          </div>
          <div>
            <label class="text-sm text-gray-500">Máx</label>
            <input id="max" type="number" step="1000" min="0" class="w-full border border-gray-200 rounded-lg px-3 py-2 mt-1">
          </div>
        </div>
        <div id="rngLabel" class="text-sm text-gray-500 mt-2">—</div>
      </div>
      <!-- Acciones filtros -->
      <div class="bg-white border border-gray-200 rounded-xl p-4 flex flex-col gap-3">
        <button id="apply" class="bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg px-4 py-2">
          <i class="fa fa-filter mr-1"></i> Aplicar
        </button>
        <button id="clear" class="bg-white border border-gray-200 hover:border-gray-300 font-bold rounded-lg px-4 py-2">
          <i class="fa fa-eraser mr-1"></i> Limpiar
        </button>
      </div>
    </div>

    <!-- Grilla de productos SIN huecos:
         auto-fill + minmax(220px,1fr) se ajusta a cualquier ancho -->
    <section id="gridProductos"
      class="grid gap-4 grid-cols-[repeat(auto-fill,minmax(220px,1fr))]"></section>

    <div id="vacio" class="hidden bg-white border border-gray-200 rounded-xl p-8 text-center">
      No hay resultados con esos filtros.
    </div>
  </div>

  <!-- Modal Ver Mapa -->
  <div class="modal fade fixed inset-0 hidden items-center justify-center" id="modalVerMapa" tabindex="-1" aria-hidden="true">
    <div class="absolute inset-0 bg-black/50" id="fondoModal"></div>
    <div class="relative bg-white w-full max-w-3xl rounded-xl overflow-hidden shadow-xl">
      <div class="flex items-center justify-between px-4 py-3 border-b">
        <h5 class="font-black"><i class="fa fa-location-dot mr-2"></i>Ubicación del producto</h5>
        <button id="cerrarModal" class="px-3 py-1.5 rounded bg-gray-100 hover:bg-gray-200 font-semibold">Cerrar</button>
      </div>
      <div class="p-0" style="height: 420px;">
        <div id="mapVer" style="width:100%; height:100%;"></div>
      </div>
      <div class="px-4 py-3 border-t text-sm">
        <a id="linkComoLlegar" class="text-blue-600 hover:underline font-semibold" target="_blank">
          <i class="fa fa-route mr-1"></i>Cómo llegar
        </a>
      </div>
    </div>
  </div>

  <!-- DATA PHP -> JS -->
  <script>const PRODUCTOS = <?php echo json_encode($productos, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES); ?>;</script>

  <!-- JS -->
  <script>
  (function(){
    /* ======== Estado ======== */
    const state = { sort:"relevance", cats:new Set(), min:null, max:null, all:PRODUCTOS, list:[] };

    /* ======== Refs ======== */
    const $ = s => document.querySelector(s);
    const grid = $('#gridProductos'), vacio = $('#vacio'), countEl = $('#count');
    const sortSel = $('#sort');

    // Categorías (dropdown)
    const catBtn = $('#catBtn'), catMenu = $('#catMenu'), catBtnLabel = $('#catBtnLabel');
    const catsBox = $('#cats'), chipsBox = $('#chips');
    const catClear = $('#catClear'), catApply = $('#catApply');

    // Filtros (precio)
    const btnFiltros = $('#btnFiltros'), panel = $('#panelFiltros');
    const minI = $('#min'), maxI = $('#max'), rngLabel = $('#rngLabel');
    const applyBtn = $('#apply'), clearBtn = $('#clear');

    // Toggle paneles
    btnFiltros.addEventListener('click', ()=> panel.classList.toggle('hidden'));
    catBtn.addEventListener('click', ()=> catMenu.classList.toggle('hidden'));
    document.addEventListener('click', e=>{
      if(!catMenu.contains(e.target) && !catBtn.contains(e.target)) catMenu.classList.add('hidden');
    });

    /* ===== Categorías dinámicas ===== */
    renderCats( getCats(state.all) );
    function getCats(list){ return [...new Set(list.map(p=>p.categoria).filter(Boolean))].sort(); }
    function renderCats(cs){
      catsBox.innerHTML = cs.map(c=>`
        <label class="flex items-center gap-2">
          <input type="checkbox" value="${c}" class="w-4 h-4 accent-blue-600">
          <span>${c}</span>
        </label>
      `).join('');
      catsBox.querySelectorAll('input[type="checkbox"]').forEach(cb=>{
        cb.checked = state.cats.has(cb.value);
        cb.addEventListener('change', ()=>{
          cb.checked ? state.cats.add(cb.value) : state.cats.delete(cb.value);
          drawChips();
        });
      });
      drawChips();
    }
    function drawChips(){
      chipsBox.innerHTML='';
      state.cats.forEach(c=>{
        const el=document.createElement('span');
        el.className='f-chip';
        el.innerHTML = `<span>${c}</span><i class="fa fa-times cursor-pointer"></i>`;
        el.querySelector('i').onclick=()=>{ state.cats.delete(c); catsBox.querySelectorAll('input[type="checkbox"]').forEach(cb=>{ if(cb.value===c) cb.checked=false; }); drawChips(); };
        chipsBox.appendChild(el);
      });
      catBtnLabel.textContent = state.cats.size ? `Categorías: ${[...state.cats].join(', ')}` : 'Categorías: Todas';
    }
    catClear.addEventListener('click', ()=>{ state.cats.clear(); renderCats(getCats(state.all)); });
    catApply.addEventListener('click', ()=>{ aplicar(); catMenu.classList.add('hidden'); });

    /* ===== Precio ===== */
    const [mn0, mx0] = (()=>{
      const ps = state.all.map(p=>p.precio);
      return [Math.min(...ps), Math.max(...ps)];
    })();
    state.min = mn0; state.max = mx0;
    minI.value = mn0; maxI.value = mx0; paintRange();
    minI.addEventListener('change', onRange); maxI.addEventListener('change', onRange);
    function onRange(){ state.min = +minI.value||mn0; state.max = +maxI.value||mx0; if(state.min>state.max){ state.min=state.max; minI.value=state.min; } paintRange(); }
    function paintRange(){ rngLabel.textContent = `Gs. ${(+minI.value).toLocaleString('es-PY')} – ${(+maxI.value).toLocaleString('es-PY')}`; }

    applyBtn.addEventListener('click', ()=>{ aplicar(); panel.classList.add('hidden'); });
    clearBtn.addEventListener('click', ()=>{
      state.cats.clear(); renderCats(getCats(state.all));
      state.min=mn0; state.max=mx0; minI.value=mn0; maxI.value=mx0; paintRange();
      aplicar();
    });

    /* ===== Orden ===== */
    sortSel.addEventListener('change', ()=>{ state.sort = sortSel.value; aplicar(); });

    /* ===== Render ===== */
    function estrellas(r){
      const full=Math.floor(r), half=(r-full)>=0.5?1:0, empty=5-full-half;
      return '⭐ '.repeat(full) + (half?'✦ ':'') + '☆ '.repeat(empty);
    }
    function card(p){
      return `
      <div class="producto-card">
        <div class="producto-img-wrapper">
          <img src="${p.img}" alt="${p.nombre}" class="producto-imagen">
          <button type="button" class="icono-ubicacion" data-lat="${p.lat}" data-lng="${p.lng}" data-titulo="${p.tienda}" aria-label="Ver ubicación">
            <i class="fas fa-map-marker-alt"></i>
          </button>
        </div>
        <div class="producto-detalle">
          <h3 class="producto-nombre">${p.nombre}</h3>
          <p class="producto-precio">Gs. ${p.precio.toLocaleString('es-PY')}
            ${p.precio_anterior?`<span class="precio-anterior">Gs. ${p.precio_anterior.toLocaleString('es-PY')}</span>`:''}
          </p>
          <p class="producto-tienda">${p.tienda} · <span class="text-gray-500">${p.categoria}</span></p>
          <div class="producto-rating">${estrellas(p.rating)}</div>
        </div>
      </div>`;
    }
    function pintar(list){
      countEl.textContent = list.length;
      if(!list.length){ grid.innerHTML=''; vacio.classList.remove('hidden'); return; }
      vacio.classList.add('hidden');
      grid.innerHTML = list.map(card).join('');
      // bind ubicación
      grid.querySelectorAll('.icono-ubicacion').forEach(btn=>{
        btn.addEventListener('click', ()=>{
          verMapa(Number(btn.dataset.lat), Number(btn.dataset.lng), btn.dataset.titulo);
        });
      });
    }

    function aplicar(){
      let res = state.all.filter(p=>{
        const okC = !state.cats.size || state.cats.has(p.categoria);
        const okP = p.precio>=state.min && p.precio<=state.max;
        return okC && okP;
      });
      switch(state.sort){
        case 'price_asc':  res.sort((a,b)=>a.precio-b.precio); break;
        case 'price_desc': res.sort((a,b)=>b.precio-a.precio); break;
        case 'name_asc':   res.sort((a,b)=>a.nombre.localeCompare(b.nombre)); break;
        default: /* relevance */ break;
      }
      pintar(res);
    }

    // init
    aplicar();

    /* ====== MAPA ====== */
    const modal = document.getElementById('modalVerMapa');
    const fondo = document.getElementById('fondoModal');
    const cerrar = document.getElementById('cerrarModal');
    const comoLlegar = document.getElementById('linkComoLlegar');
    let map, marker;

    function abrir(){ modal.classList.remove('hidden'); modal.classList.add('flex'); }
    function cerrarM(){ modal.classList.add('hidden'); modal.classList.remove('flex'); }
    fondo.addEventListener('click', cerrarM); cerrar.addEventListener('click', cerrarM);

    window.verMapa = function(lat,lng,titulo){
      abrir();
      const loc = {lat: lat, lng: lng};
      comoLlegar.href = `https://www.google.com/maps?q=${lat},${lng}`;
      if(!map){
        map = new google.maps.Map(document.getElementById('mapVer'), {center: loc, zoom: 15});
        marker = new google.maps.Marker({position: loc, map, title: titulo});
      }else{
        map.setCenter(loc);
        if(marker) marker.setMap(null);
        marker = new google.maps.Marker({position: loc, map, title: titulo});
      }
    }
  })();
  </script>

  <!-- Google Maps (reemplaza TU_API_KEY) -->
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=TU_API_KEY"></script>
</body>
</html>
