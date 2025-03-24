<!-- resources/views/home.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NOM-35</title>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #0073e6;
            padding: 20px;
            color: white;
        }
        .header img {
            height: 60px;
        }
        .header button {
            background-color: #005bb5;
            color: white;
            border: none;
            padding: 15px 30px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }
        .header button:hover {
            background-color: #004494;
        }
        .icons-container {
            display: flex;
            justify-content: space-around;
            padding: 40px 20px;
            background-color: white;
            flex-grow: 1;
        }
        .icon {
            text-align: center;
            width: 30%;
            padding: 30px;
            background-color: #e6f3ff;
            border-radius: 15px;
            cursor: pointer;
            transition: transform 0.3s ease, background-color 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .icon:hover {
            background-color: #cce6ff;
            transform: scale(1.05);
        }
        .icon .material-icons {
            font-size: 60px;
            color: #0073e6;
            margin-bottom: 20px;
        }
        .icon h3 {
            font-size: 24px;
            margin: 0 0 10px;
            color: #0073e6;
        }
        .icon p {
            font-size: 18px;
            color: #333;
            text-align: center;
            margin: 0;
        }
        .monitorear {
            background-color: #0073e6;
            padding: 40px 20px;
            color: white;
            text-align: center;
        }
        .monitorear h2 {
            font-size: 28px;
            margin-bottom: 20px;
        }
        .monitorear input {
            padding: 15px;
            width: 400px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }
        .monitorear button {
            padding: 15px 30px;
            background-color: #005bb5;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-left: 10px;
        }
        .monitorear button:hover {
            background-color: #004494;
        }
        .footer {
            background-color: #f5ebe0;
            color: black;
            text-align: center;
            padding: 20px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="header">
        <!-- Ruta de la imagen -->
        <img src="Imagenes/Logos/CESRH-logo.png" alt="Logo de la empresa">
        <button>Cerrar Sesión</button>
    </div>
    <div class="icons-container">
        <div class="icon">
            <span class="material-icons">admin_panel_settings</span>
            <h3>Administrador</h3>
            <p>Accede al panel completo de opciones</p>
        </div>
        <div class="icon">
            <span class="material-icons">person_add</span>
            <h3>Nuevo Usuario</h3>
            <p>Registra un nuevo usuario</p>
        </div>
        <div class="icon">
            <span class="material-icons">announcement</span>
            <h3>Comunicado</h3>
            <p>Genera un comunicado para los usuarios</p>
        </div>
    </div>
    <div class="monitorear">
        <h2>Monitorear una encuesta</h2>
        <input type="text" placeholder="Buscar encuesta...">
        <button>Monitorear</button>
    </div>
    <div class="footer">
        DX035 - Derechos Reservados
    </div>
</body>
</html>
