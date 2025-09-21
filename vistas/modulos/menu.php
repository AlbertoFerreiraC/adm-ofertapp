<aside class="main-sidebar">
  <section class="sidebar">
    <!-- Menú principal (sin user-panel) -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENÚ PRINCIPAL</li>

      <!-- ========== FILTROS DINÁMICOS ========== -->
      <li class="treeview" id="filtrosTree">
        <a href="#">
          <i class="fa fa-search"></i>
          <span>Filtros</span>
          <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
        </a>

        <!-- Panel de filtros (cambia los endpoints) -->
        <ul
          class="treeview-menu filtros-dinamicos"
          id="filtrosPanel"
          data-endpoint-cats="/api/categorias"
          data-endpoint-suggest="/api/sugerencias?q=">
          <!-- Buscador con sugerencias -->
          <li class="f-block">
            <label class="f-label"><i class="fa fa-search"></i> Buscar</label>
            <div class="f-input-wrap">
              <input id="f-q" type="text" class="f-input" placeholder="¿Qué estás buscando?">
              <ul id="f-suggest" class="f-suggest"></ul>
            </div>
          </li>

          <!-- Categorías dinámicas -->
          <li class="f-block">
            <label class="f-label"><i class="fa fa-tags"></i> Categorías</label>
            <div id="f-cats" class="f-cats">
            </div>
          </li>

          <!-- Precio (doble rango) -->
          <li class="f-block">
            <label class="f-label"><i class="fa fa-money"></i> Precio</label>
            <div class="f-range-wrap">
              <div id="f-price-track" class="f-range-track"></div>
              <div class="f-range"><input id="f-min" type="range" min="50000" max="1000000" step="5000" value="50000"></div>
              <div class="f-range"><input id="f-max" type="range" min="50000" max="1000000" step="5000" value="1000000"></div>
            </div>
            <div class="f-row">
              <input id="f-min-i" type="number" class="f-input" value="50000" min="50000" max="1000000" step="5000">
              <input id="f-max-i" type="number" class="f-input" value="1000000" min="50000" max="1000000" step="5000">
            </div>
            <div id="f-price-label" class="f-hint">Gs. 50.000 – 1.000.000</div>
          </li>

          <!-- Colores -->
          <li class="f-block">
            <label class="f-label"><i class="fa fa-palette"></i> Color</label>
            <div id="f-colors" class="f-swatches">
              <button data-name="Negro" class="f-swatch" style="background:#222"></button>
              <button data-name="Blanco" class="f-swatch" style="background:#fff; box-shadow:inset 0 0 0 1px #ccc"></button>
              <button data-name="Marrón" class="f-swatch" style="background:#7c3f00"></button>
              <button data-name="Rojo" class="f-swatch" style="background:#dc2626"></button>
              <button data-name="Azul" class="f-swatch" style="background:#2563eb"></button>
              <button data-name="Verde" class="f-swatch" style="background:#16a34a"></button>
            </div>
          </li>

          <!-- Estado -->
          <li class="f-block">
            <label class="f-label"><i class="fa fa-check-circle"></i> Estado</label>
            <div class="f-radio-group">
              <label class="f-radio"><input type="radio" name="estado" value="" checked> Todos</label>
              <label class="f-radio"><input type="radio" name="estado" value="Nuevo"> Nuevo</label>
              <label class="f-radio"><input type="radio" name="estado" value="Usado"> Usado</label>
            </div>
          </li>

          <!-- Chips activos -->
          <li class="f-block">
            <div id="f-chips" class="f-chips"></div>
          </li>

          <!-- Acciones -->
          <li class="f-actions">
            <button id="f-clear" class="f-btn ghost"><i class="fa fa-eraser"></i> Limpiar</button>
            <button id="f-apply" class="f-btn"><i class="fa fa-filter"></i> Aplicar</button>
          </li>
        </ul>
      </li>
      <!-- ========== /FILTROS DINÁMICOS ========== -->

      <li class="treeview">
        <a href="#"><i class="fa fa-book"></i><span>Gestión de Catálogo</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
        <ul class="treeview-menu">
          <li><a href="productos"><i class="fa fa-cube"></i> Productos</a></li>
          <li><a href="membresias_planes"><i class="fa fa-star"></i> Ofertas</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#"><i class="fa fa-building"></i><span>Mi Empresa</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
        <ul class="treeview-menu">
          <li><a href="empresa"><i class="fa fa-industry"></i> Registro de Empresas</a></li>
          <li><a href="categorias"><i class="fa fa-tags"></i> Categorías</a></li>
        </ul>
      </li>

      <li><a href="descripcionProductos"><i class="fa fa-id-card"></i> Membresías</a></li>

      <li class="treeview">
        <a href="#"><i class="fa fa-users"></i><span>Clientes</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
        <ul class="treeview-menu">
          <li><a href="clientes"><i class="fa fa-list"></i> Gestionar Clientes</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#"><i class="fa fa-bar-chart"></i><span>Informes</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
        <ul class="treeview-menu">
          <li><a href="informe-busquedas"><i class="fa fa-line-chart"></i> Búsquedas Populares</a></li>
          <li><a href="informe-productos"><i class="fa fa-pie-chart"></i> Productos Populares</a></li>
          <li><a href="informe-empresas"><i class="fa fa-area-chart"></i> Actividad de Empresas</a></li>
        </ul>
      </li>

      <li><a href="nosotros"><i class="fa fa-info-circle"></i> <span>Nosotros</span></a></li>

      <?php if (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == "Administrador"): ?>
        <li class="treeview">
          <a href="#"><i class="fa fa-cogs"></i><span>Administración</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
          <ul class="treeview-menu">
            <li><a href="usuarios"><i class="fa fa-user-plus"></i> Usuarios</a></li>
            <li><a href="perfil"><i class="fa fa-user"></i> Mi Perfil</a></li>
          </ul>
        </li>
      <?php endif; ?>

      <?php if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"): ?>
        <li><a href="salir"><i class="fa fa-sign-out text-red"></i> <span>Cerrar Sesión</span></a></li>
      <?php else: ?>
        <li><a href="login"><i class="fa fa-sign-in"></i> <span>Iniciar Sesión</span></a></li>
      <?php endif; ?>
    </ul>
  </section>
</aside>

<style>
  /* ==== Colores/estilos base AdminLTE sidebar ==== */
  .main-sidebar,
  .main-sidebar .sidebar {
    background-color: #222d32 !important;
    color: #fff !important;
  }

  .main-sidebar .sidebar-menu>li>a {
    color: #b8c7ce !important;
    font-weight: 500;
  }

  .main-sidebar .sidebar-menu>li>a:hover {
    background-color: #1e282c !important;
    color: #fff !important;
  }

  .main-sidebar .header {
    color: #4b646f !important;
    border-bottom: 1px solid #1a2226;
  }

  .main-sidebar .user-panel {
    display: none !important;
  }

  body.sidebar-hidden .main-sidebar {
    transform: translateX(-260px);
    transition: transform .25s ease;
  }

  body.sidebar-hidden .content-wrapper,
  body.sidebar-hidden .main-footer {
    margin-left: 0 !important;
    transition: margin .25s ease;
  }

  .main-sidebar {
    transition: transform .25s ease;
  }

  /* Permitir que el dropdown de sugerencias salga del contenedor */
  .sidebar .treeview-menu {
    overflow: visible;
  }

  /* ===== Filtros dinámicos (sidebar oscuro AdminLTE) ===== */
  .filtros-dinamicos {
    padding: 8px 10px;
  }

  .f-block {
    padding: 8px 6px;
    border-bottom: 1px solid #1a2226;
  }

  .f-block:last-child {
    border-bottom: 0;
  }

  .f-label {
    display: block;
    font-size: 12px;
    color: #9fb3bf;
    margin-bottom: 6px;
  }

  .f-input-wrap {
    position: relative;
  }

  .f-input {
    width: 100%;
    background: #1e282c;
    color: #e6eef2;
    border: 1px solid #2b3940;
    outline: 0;
    padding: 8px 10px;
    border-radius: 6px;
    font-size: 13px;
  }

  .f-input:focus {
    border-color: #3ea6ff;
    box-shadow: 0 0 0 2px rgba(62, 166, 255, .2);
  }

  /* Sugerencias (dropdown) */
  .f-suggest {
    position: absolute;
    left: 0;
    right: 0;
    top: calc(100% + 4px);
    z-index: 9999;
    list-style: none;
    margin: 0;
    padding: 0;
    background: #1e282c;
    border: 1px solid #2b3940;
    border-radius: 6px;
    max-height: 180px;
    overflow: auto;
    display: none;
  }

  .f-suggest li {
    padding: 8px 10px;
    cursor: pointer;
    color: #cfe1ea;
  }

  .f-suggest li:hover {
    background: #22313a;
  }

  /* Categorías */
  .f-cats {
    display: grid;
    gap: 6px;
  }

  .f-cat {
    display: flex;
    align-items: center;
    gap: 6px;
    color: #cfe1ea;
    font-size: 13px;
    cursor: pointer;
  }

  .f-cat input {
    margin: 0;
  }

  /* Rango doble */
  .f-range-wrap {
    position: relative;
    height: 32px;
    margin-top: 2px;
  }

  .f-range-track {
    position: absolute;
    left: 0;
    right: 0;
    top: 14px;
    height: 6px;
    border-radius: 999px;
    background: #23313a;
  }

  .f-range {
    position: absolute;
    inset: 0;
    pointer-events: none;
  }

  .f-range input {
    pointer-events: auto;
    -webkit-appearance: none;
    appearance: none;
    background: transparent;
    width: 100%;
    height: 32px;
    margin: 0;
  }

  .f-range input::-webkit-slider-thumb {
    -webkit-appearance: none;
    width: 16px;
    height: 16px;
    border-radius: 50%;
    background: #e6eef2;
    border: 2px solid #111;
  }

  .f-range input::-moz-range-thumb {
    width: 16px;
    height: 16px;
    border-radius: 50%;
    background: #e6eef2;
    border: 2px solid #111;
  }

  .f-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 6px;
    margin-top: 6px;
  }

  .f-hint {
    font-size: 12px;
    color: #9fb3bf;
    margin-top: 4px;
  }

  /* Swatches color */
  .f-swatches {
    display: grid;
    grid-template-columns: repeat(6, 1fr);
    gap: 8px;
  }

  .f-swatch {
    width: 22px;
    height: 22px;
    border-radius: 50%;
    border: 2px solid #2b3940;
    cursor: pointer;
    outline: 0;
  }

  .f-swatch.active {
    box-shadow: 0 0 0 2px #3ea6ff, 0 0 0 4px #0b1216;
  }

  /* Radios */
  .f-radio {
    display: flex;
    align-items: center;
    gap: 6px;
    color: #cfe1ea;
    font-size: 13px;
    cursor: pointer;
  }

  .f-radio input {
    margin: 0;
  }

  /* Chips */
  .f-chips {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
  }

  .f-chip {
    background: #26343c;
    color: #cfe1ea;
    border: 1px solid #2b3940;
    border-radius: 999px;
    font-size: 12px;
    padding: 4px 8px;
    display: inline-flex;
    align-items: center;
    gap: 6px;
  }

  .f-chip .x {
    cursor: pointer;
    color: #9fb3bf;
  }

  .f-chip .x:hover {
    color: #fff;
  }

  /* Botones */
  .f-actions {
    padding: 10px 6px;
    display: flex;
    gap: 8px;
  }

  .f-btn {
    background: #3ea6ff;
    color: #0b1216;
    border: 0;
    padding: 8px 10px;
    border-radius: 6px;
    font-weight: 600;
    cursor: pointer;
    flex: 1;
  }

  .f-btn.ghost {
    background: transparent;
    color: #cfe1ea;
    border: 1px solid #2b3940;
  }

  .f-btn:hover {
    filter: brightness(1.05);
  }

  .main-header {
    height: 60px;
    /* mismo alto que tu navbar */
    z-index: 1000;
  }

  .main-sidebar {
    position: fixed !important;
    top: 60px !important;
    /* arranca debajo del cabezote */
    height: calc(100% - 60px) !important;
    /* ocupa todo el alto menos el cabezote */
    overflow-y: auto;
  }

  .content-wrapper {
    margin-top: 60px;
    /* empuja el contenido principal hacia abajo */
  }

  .content-header {
    display: none !important;
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    (function() {
      // -------- Helpers ----------
      const $ = s => document.querySelector(s);
      const $$ = s => Array.from(document.querySelectorAll(s));

      const panel = document.getElementById('filtrosPanel');
      if (!panel) return; // si no está en esta página, salir

      const EP_CATS = panel.dataset.endpointCats || '';
      const EP_SUGG = panel.dataset.endpointSuggest || '';

      // Estado de filtros
      const state = {
        q: '',
        cats: new Set(),
        colors: new Set(),
        estado: '',
        min: 50000,
        max: 1000000
      };

      // -------- Buscador con sugerencias ----------
      const qInput = $('#f-q');
      const suggBox = $('#f-suggest');

      async function fetchSuggest(q) {
        if (!q) {
          suggBox.style.display = 'none';
          return;
        }
        try {
          const resp = await fetch(EP_SUGG + encodeURIComponent(q));
          if (!resp.ok) throw 0;
          const data = await resp.json(); // espera: ["campera","campera zara",...]
          renderSuggest(data);
        } catch (e) {
          // Fallback estático
          const mock = ["campera zara", "campera cuero", "zapato vizzano", "somier koala"]
            .filter(s => s.includes(q.toLowerCase()));
          renderSuggest(mock);
        }
      }

      function renderSuggest(items) {
        suggBox.innerHTML = items.map(i => `<li data-v="${i}">${i}</li>`).join('');
        suggBox.style.display = items.length ? 'block' : 'none';
      }
      qInput.addEventListener('input', e => {
        state.q = e.target.value.trim();
        fetchSuggest(state.q);
      });
      suggBox.addEventListener('click', e => {
        const li = e.target.closest('li');
        if (!li) return;
        qInput.value = li.dataset.v;
        state.q = li.dataset.v;
        suggBox.style.display = 'none';
        drawChips();
      });
      document.addEventListener('click', e => {
        if (!panel.contains(e.target)) suggBox.style.display = 'none';
      });

      // -------- Categorías dinámicas ----------
      const catsBox = $('#f-cats');
      async function loadCats() {
        try {
          const resp = await fetch(EP_CATS);
          if (!resp.ok) throw 0;
          const cats = await resp.json(); // [{id, nombre, count}]
          renderCats(cats);
        } catch (e) {
          // Fallback
          renderCats([{
              id: 1,
              nombre: 'Ropa y Accesorios',
              count: 124
            },
            {
              id: 2,
              nombre: 'Camperas',
              count: 36
            },
            {
              id: 3,
              nombre: 'Calzados',
              count: 58
            },
            {
              id: 4,
              nombre: 'Electrónica',
              count: 91
            }
          ]);
        }
      }

      function renderCats(list) {
        catsBox.innerHTML = list.map(c => `
        <label class="f-cat">
          <input type="checkbox" value="${c.nombre}">
          <span>${c.nombre} ${c.count!=null?`<small style="color:#7d93a0">(${c.count})</small>`:''}</span>
        </label>
      `).join('');
        catsBox.querySelectorAll('input[type="checkbox"]').forEach(cb => {
          cb.addEventListener('change', () => {
            cb.checked ? state.cats.add(cb.value) : state.cats.delete(cb.value);
            drawChips();
          });
        });
      }
      loadCats();

      // -------- Precio doble rango ----------
      const minR = $('#f-min'),
        maxR = $('#f-max');
      const minI = $('#f-min-i'),
        maxI = $('#f-max-i');
      const track = $('#f-price-track'),
        label = $('#f-price-label');
      const MIN = +minR.min,
        MAX = +maxR.max;

      function clamp(v, a, b) {
        return Math.min(b, Math.max(a, v));
      }

      function paint(a, b) {
        const p1 = ((a - MIN) / (MAX - MIN)) * 100;
        const p2 = ((b - MIN) / (MAX - MIN)) * 100;
        track.style.background =
          `linear-gradient(90deg,#23313a ${p1}%, #3ea6ff ${p1}%, #3ea6ff ${p2}%, #23313a ${p2}%)`;
        label.textContent = `Gs. ${a.toLocaleString('es-PY')} – ${b.toLocaleString('es-PY')}`;
      }

      function syncFromRange() {
        let a = +minR.value,
          b = +maxR.value;
        if (a > b - 5000) {
          a = b - 5000;
          minR.value = a;
        }
        minI.value = a;
        maxI.value = b;
        state.min = a;
        state.max = b;
        paint(a, b);
        drawChips();
      }

      function syncFromInput() {
        let a = clamp(+minI.value || MIN, MIN, MAX),
          b = clamp(+maxI.value || MAX, MIN, MAX);
        if (a > b - 5000) a = b - 5000;
        minR.value = a;
        maxR.value = b;
        state.min = a;
        state.max = b;
        paint(a, b);
        drawChips();
      }
      minR.addEventListener('input', syncFromRange);
      maxR.addEventListener('input', syncFromRange);
      minI.addEventListener('change', syncFromInput);
      maxI.addEventListener('change', syncFromInput);
      syncFromRange();

      // -------- Colores ----------
      $$('#f-colors .f-swatch').forEach(btn => {
        btn.addEventListener('click', () => {
          const name = btn.dataset.name;
          if (state.colors.has(name)) {
            state.colors.delete(name);
            btn.classList.remove('active');
          } else {
            state.colors.add(name);
            btn.classList.add('active');
          }
          drawChips();
        });
      });

      // -------- Estado ----------
      $$('.f-radio-group input[name="estado"]').forEach(r => {
        r.addEventListener('change', () => {
          state.estado = r.value;
          drawChips();
        });
      });

      // -------- Chips ----------
      const chips = $('#f-chips');

      function makeChip(text, onRemove) {
        const el = document.createElement('span');
        el.className = 'f-chip';
        el.innerHTML = `<span>${text}</span><i class="fa fa-times x"></i>`;
        el.querySelector('.x').addEventListener('click', onRemove);
        chips.appendChild(el);
      }

      function drawChips() {
        chips.innerHTML = '';
        if (state.q) makeChip(state.q, () => {
          state.q = '';
          qInput.value = '';
          drawChips();
        });

        state.cats.forEach(v => makeChip(v, () => {
          state.cats.delete(v);
          catsBox.querySelectorAll('input[type="checkbox"]').forEach(cb => {
            if (cb.value === v) cb.checked = false;
          });
          drawChips();
        }));

        state.colors.forEach(v => makeChip('Color: ' + v, () => {
          state.colors.delete(v);
          $$('#f-colors .f-swatch').forEach(s => {
            if (s.dataset.name === v) s.classList.remove('active');
          });
          drawChips();
        }));

        if (state.estado) makeChip('Estado: ' + state.estado, () => {
          state.estado = '';
          $$('.f-radio-group input[name="estado"]').forEach(r => {
            if (r.value === '') r.checked = true;
          });
          drawChips();
        });

        if (state.min > MIN || state.max < MAX) {
          makeChip(`Gs. ${state.min.toLocaleString('es-PY')} – ${state.max.toLocaleString('es-PY')}`, () => {
            state.min = MIN;
            state.max = MAX;
            minR.value = MIN;
            maxR.value = MAX;
            minI.value = MIN;
            maxI.value = MAX;
            paint(MIN, MAX);
            drawChips();
          });
        }
      }
      drawChips();

      // -------- Aplicar / Limpiar ----------
      $('#f-clear').addEventListener('click', () => {
        state.q = '';
        qInput.value = '';
        state.cats.clear();
        catsBox.querySelectorAll('input[type="checkbox"]').forEach(cb => cb.checked = false);
        state.colors.clear();
        $$('#f-colors .f-swatch').forEach(s => s.classList.remove('active'));
        state.estado = '';
        $$('.f-radio-group input[name="estado"]').forEach(r => {
          if (r.value === '') r.checked = true;
        });
        state.min = MIN;
        state.max = MAX;
        minR.value = MIN;
        maxR.value = MAX;
        minI.value = MIN;
        maxI.value = MAX;
        paint(MIN, MAX);
        drawChips();
        dispatch();
      });

      $('#f-apply').addEventListener('click', dispatch);

      function dispatch() {
        const payload = {
          q: state.q,
          categorias: [...state.cats],
          colores: [...state.colors],
          estado: state.estado,
          min: state.min,
          max: state.max
        };

        // 1) Dispara evento para que tu grilla escuche y recargue
        window.dispatchEvent(new CustomEvent('ofertapp:filtros', {
          detail: payload
        }));

        // 2) (Opcional) Actualiza querystring para compartir/guardar filtro
        const params = new URLSearchParams();
        if (payload.q) params.set('q', payload.q);
        if (payload.categorias.length) params.set('cat', payload.categorias.join(','));
        if (payload.colores.length) params.set('color', payload.colores.join(','));
        if (payload.estado) params.set('estado', payload.estado);
        if (payload.min > MIN) params.set('min', payload.min);
        if (payload.max < MAX) params.set('max', payload.max);
        const newUrl = location.pathname + (params.toString() ? `?${params.toString()}` : '');
        history.replaceState(null, '', newUrl);
      }

      // (Ejemplo) Cómo escuchar los filtros en tu listado:
      // window.addEventListener('ofertapp:filtros', (e) => {
      //   console.log('Filtros aplicados:', e.detail);
      //   // TODO: fetch de productos con e.detail
      // });
    })();
  });
</script>