<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta</title>
    <style>
        body {
            background: linear-gradient(135deg, #fefefe, #D0D5D7) !important;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            padding: 100px;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            box-sizing: border-box;
        }

        .register-container {
            background: #ffffff;
            padding: 50px 60px;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
            width: 100%;
            max-width: 750px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 40px;
        }

        .selection-header {
            text-align: center;
        }

        .selection-header .subtitle {
            color: #e85e2b;
            font-size: 14px;
            font-weight: bold;
            letter-spacing: 1px;
            margin: 0;
        }

        .selection-header .title {
            color: #333;
            font-size: 32px;
            margin: 10px 0 0 0;
        }

        .account-options {
            display: flex;
            gap: 40px;
            justify-content: center;
            align-items: center;
        }

        .account-card {
            background-color: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 12px;
            padding: 40px;
            cursor: pointer;
            color: #333;
            font-size: 16px;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
            width: 250px;
            height: 250px;
            justify-content: center;
            text-align: center;
        }

        .icon-circle {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 1px solid #e0e0e0;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: border-color 0.3s ease;
        }

        .icon-circle img {
            width: 60px;
            height: 60px;
        }

        .account-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            border-color: #e85e2b;
        }

        .account-card:hover .icon-circle {
            border-color: #e85e2b;
        }

        .account-card.active {
            border-color: #e85e2b;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }

        .account-card.active .icon-circle {
            border-color: #e85e2b;
            border-width: 2px;
        }

        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(30, 30, 30, 0.6);
            backdrop-filter: blur(5px);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 100;
        }

        .register-modal {
            background: #fff;
            padding: 35px;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            width: 95%;
            max-width: 800px;
            text-align: center;
            animation: fadeIn 0.3s ease-in-out;
            max-height: 90vh;
            overflow-y: auto;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .register-modal h2 {
            color: #0C2A3E;
            margin-bottom: 20px;
            font-size: 22px;
            font-weight: bold;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            text-align: left;
        }

        .form-grid .form-group {
            margin-bottom: 15px;
        }

        .form-grid label {
            font-size: 14px;
            color: #74808C;
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        .form-grid input {
            box-sizing: border-box;
            width: 100%;
            padding: 12px !important;
            border: 1px solid #D0D5D7;
            border-radius: 8px;
            font-size: 14px;
        }

        #map {
            width: 100%;
            height: 300px;
            border-radius: 8px;
            margin-top: 10px;
            grid-column: span 2;
        }

        button[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #0C2A3E;
            color: white;
            font-size: 15px;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;
        }

        button[type="submit"]:hover {
            background-color: #113f5f;
        }

        .extra-links {
            margin-top: 20px;
            font-size: 14px;
        }

        .extra-links a {
            color: #0C2A3E;
            font-weight: bold;
            text-decoration: none;
        }

        .extra-links a:hover {
            color: #113f5f;
        }

        @media (max-width: 600px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <div class="register-container">
        <div class="selection-header">
            <p class="subtitle">CREAR CUENTA</p>
            <h1 class="title">Seleccione un tipo de cuenta</h1>
        </div>
        <div class="account-options">
            <div class="account-card" data-value="personal">
                <div class="icon-circle">
                    <img src="https://api.iconify.design/solar:user-circle-bold-duotone.svg?color=%23e85e2b">
                </div>
                <span>Cuenta personal</span>
            </div>
            <div class="account-card" data-value="comercial">
                <div class="icon-circle">
                    <img src="https://api.iconify.design/solar:shop-2-bold-duotone.svg?color=%232b8de8">
                </div>
                <span>Cuenta comercial</span>
            </div>
        </div>
    </div>

    <div class="modal-overlay">
        <div class="register-modal">
            <h2>Crear una cuenta</h2>
            <form id="registerForm" method="POST" class="form-grid">
                <input type="hidden" name="tipoCuenta" id="tipoCuenta">

                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>

                <div class="form-group">
                    <label for="apellido">Apellido:</label>
                    <input type="text" id="apellido" name="apellido" required>
                </div>

                <div class="form-group">
                    <label for="usuario">Usuario:</label>
                    <input type="text" id="usuario" name="usuario" readonly required>
                </div>

                <div class="form-group">
                    <label for="email">Correo electrónico:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <!-- CAMPOS DE EMPRESA (solo si es comercial) -->
                <div id="empresaGroup" style="display:none; grid-column: span 2; margin-top:15px;">
                    <h2>Datos de la Empresa</h2>

                    <div class="form-group col-md-6">
                        <label for="nombreEmpresa">Nombre de la empresa:</label>
                        <input type="text" id="nombreEmpresa" name="nombreEmpresa">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="direccionEmpresa">Calle:</label>
                        <input type="text" id="direccionEmpresa" name="direccionEmpresa">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="numeroEmpresa">Número:</label>
                        <input type="text" id="numeroEmpresa" name="numeroEmpresa">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="barrioEmpresa">Barrio:</label>
                        <input type="text" id="barrioEmpresa" name="barrioEmpresa">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="ciudadEmpresa">Ciudad:</label>
                        <input type="text" id="ciudadEmpresa" name="ciudadEmpresa">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="departamentoEmpresa">Departamento:</label>
                        <input type="text" id="departamentoEmpresa" name="departamentoEmpresa">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="paisEmpresa">País:</label>
                        <input type="text" id="paisEmpresa" name="paisEmpresa" value="Paraguay">
                    </div>
                </div>

                <!-- MAPA SOLO PARA CUENTA COMERCIAL -->
                <div id="mapGroup" style="display:none; grid-column: span 2;">
                    <label>Ubicación del negocio:</label>
                    <div id="map"></div>
                    <input type="hidden" id="latitud" name="latitud">
                    <input type="hidden" id="longitud" name="longitud">
                </div>

                <div style="grid-column: span 2;">
                    <button type="submit">REGISTRAR</button>
                </div>
            </form>

            <div class="extra-links">
                <a href="index.php?ruta=login">¿Ya tienes cuenta? Inicia sesión aquí</a>
            </div>
        </div>
    </div>

    <!-- JS DE LA LÓGICA -->
    <script>
        let map, marker;
        const cards = document.querySelectorAll('.account-card');
        const modal = document.querySelector('.modal-overlay');
        const tipoInput = document.getElementById('tipoCuenta');

        cards.forEach(card => {
            card.addEventListener('click', () => {
                cards.forEach(c => c.classList.remove('active'));
                card.classList.add('active');
                tipoInput.value = card.dataset.value;
                modal.style.display = 'flex';

                if (card.dataset.value === 'comercial') {
                    document.getElementById('empresaGroup').style.display = 'block';
                    document.getElementById('mapGroup').style.display = 'block';
                    setTimeout(initMap, 400);
                } else {
                    document.getElementById('empresaGroup').style.display = 'none';
                    document.getElementById('mapGroup').style.display = 'none';
                }
            });
        });

        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.style.display = 'none';
                cards.forEach(c => c.classList.remove('active'));
            }
        });

        function initMap() {
            if (!map) {
                map = new google.maps.Map(document.getElementById("map"), {
                    center: {
                        lat: -25.2637,
                        lng: -57.5759
                    }, // Asunción por defecto
                    zoom: 13,
                });

                map.addListener("click", (e) => {
                    const lat = e.latLng.lat();
                    const lng = e.latLng.lng();

                    if (marker) {
                        marker.setPosition(e.latLng);
                    } else {
                        marker = new google.maps.Marker({
                            position: e.latLng,
                            map: map,
                        });
                    }

                    document.getElementById("latitud").value = lat;
                    document.getElementById("longitud").value = lng;
                });
            }
        }
    </script>

    <!-- GOOGLE MAPS API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCuAZrhi9qDqGs9x8K_xucxfIE8iwQTkKw&callback=initMap" async defer></script>
    <script src="vistas/js/regiser.js"></script>

</body>

</html>