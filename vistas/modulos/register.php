<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta</title>
    <style>
        /* --- ESTILOS GENERALES Y DE FONDO (CORREGIDO) --- */
        body {
            /* Forzamos el fondo degradado claro para toda la página */
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

        /* --- CONTENEDOR PRINCIPAL (LA TARJETA BLANCA) --- */
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

        /* --- ESTILOS PARA LOS TÍTULOS --- */
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

        /* --- CONTENEDOR DE LAS TARJETAS --- */
        .account-options {
            display: flex;
            gap: 40px;
            justify-content: center;
            align-items: center;
        }

        /* --- ESTILO DE CADA TARJETA --- */
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

        /* --- EFECTOS HOVER Y ACTIVE --- */
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

        /* --- ESTILOS DEL MODAL --- */
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
            width: 100%;
            max-width: 480px;
            text-align: center;
            animation: fadeIn 0.3s ease-in-out;
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

        .form-group {
            text-align: left;
            margin-bottom: 18px;
        }

        .form-group label {
            font-size: 14px;
            color: #74808C;
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        .form-group input {
            box-sizing: border-box;
            width: 100%;
            padding: 12px !important;
            border: 1px solid #D0D5D7;
            border-radius: 8px;
            font-size: 14px;
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
                    <img src="https://api.iconify.design/solar:user-circle-bold-duotone.svg?color=%23e85e2b" alt="Icono de cuenta personal">
                </div>
                <span>Cuenta personal</span>
            </div>
            <div class="account-card" data-value="comercial">
                <div class="icon-circle">
                    <img src="https://api.iconify.design/solar:shop-2-bold-duotone.svg?color=%232b8de8" alt="Icono de cuenta comercial">
                </div>
                <span>Cuenta comercial</span>
            </div>
        </div>
    </div>

    <div class="modal-overlay">
        <div class="register-modal">
            <h2>Crear una cuenta</h2>
            <form id="registerForm" method="POST">
                <input type="hidden" name="tipoCuenta" id="tipoCuenta">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre" required>
                </div>

                <div class="form-group">
                    <label for="apellido">Apellido:</label>
                    <input type="text" id="apellido" name="apellido" placeholder="Ingrese su apellido" required>
                </div>

                <div class="form-group">
                    <label for="usuario">Usuario:</label>
                    <input type="text" id="usuario" name="usuario" placeholder="Se generará automáticamente" readonly required>
                </div>
                <div class="form-group">
                    <label for="email">Correo electrónico:</label>
                    <input type="email" id="email" name="email" placeholder="Ingrese su correo electrónico" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" placeholder="Cree una contraseña" required>
                </div>
                <div class="form-group" id="latGroup" style="display:none;">
                    <label for="latitud">Latitud del negocio:</label>
                    <input type="text" id="latitud" name="latitud" placeholder="Ingrese la latitud">
                </div>
                <div class="form-group" id="lngGroup" style="display:none;">
                    <label for="longitud">Longitud del negocio:</label>
                    <input type="text" id="longitud" name="longitud" placeholder="Ingrese la longitud">
                </div>
                <button type="submit">REGISTRAR</button>
            </form>
            <div class="extra-links">
                <a href="index.php?ruta=login">¿Ya tienes cuenta? Inicia sesión aquí</a>
            </div>
        </div>
    </div>

    <script>
        const cards = document.querySelectorAll('.account-card');
        const modal = document.querySelector('.modal-overlay');
        const tipoInput = document.getElementById('tipoCuenta');
        const latGroup = document.getElementById('latGroup');
        const lngGroup = document.getElementById('lngGroup');
        cards.forEach(card => {
            card.addEventListener('click', () => {
                cards.forEach(c => c.classList.remove('active'));
                card.classList.add('active');
                tipoInput.value = card.dataset.value;
                modal.style.display = 'flex';
                if (card.dataset.value === 'comercial') {
                    latGroup.style.display = 'block';
                    lngGroup.style.display = 'block';
                } else {
                    latGroup.style.display = 'none';
                    lngGroup.style.display = 'none';
                }
            });
        });
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.style.display = 'none';
                cards.forEach(c => c.classList.remove('active'));
            }
        });
    </script>
</body>

<script src="vistas/js/regiser.js"></script>

</html>