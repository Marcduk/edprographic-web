<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestión de Infraestructura de Red - Menú</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome para íconos -->
    <style>
        body {
            background: linear-gradient(90deg, #1a4718, #e4d9d9, #1a4718); /* Fondo con gradiente lineal a 90° */
            padding-top: 50px; /* Espacio para el navbar */
            font-family: 'Arial', sans-serif; /* Fuente */
        }
        .container {
            max-width: 600px; /* Ancho máximo para mantener el contenido centrado */
        }
        h1 {
            margin-bottom: 30px; /* Espacio inferior para separarlo del menú */
            font-size: 48px; /* Tamaño de fuente más grande */
            font-family: 'Times New Roman', serif; /* Fuente Times New Roman */
            font-weight: bold; /* Texto en negrita */
            color: #000; /* Color del texto */
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3); /* Sombra del texto */
            text-align: center; /* Centrar el texto */
        }
        .nav-pills {
            background-color: rgba(255,255,255,0.8); /* Color de fondo del menú con transparencia */
            border-radius: 10px; /* Bordes redondeados */
            padding: 10px; /* Espaciado interno */
            box-shadow: 0 2px 4px rgba(0,0,0,0.1); /* Sombra */
        }
        .nav-pills > li > a {
            border-radius: 5px; /* Bordes redondeados para los botones */
            margin-right: 10px; /* Espacio entre los botones */
            font-size: 18px; /* Tamaño de fuente */
            color: #000; /* Color del texto */
            transition: all 0.3s; /* Transición suave para todos los cambios */
        }
        .nav-pills > li > a:hover,
        .nav-pills > li > a:focus {
            background-color: rgba(0,0,0,0.1); /* Cambio de color de fondo al pasar el cursor */
            color: #000; /* Texto negro */
            border: 2px solid #007bff; /* Borde al pasar el cursor */
            transform: scale(1.1); /* Animación de zoom al pasar el cursor */
        }
        .nav-pills > li > a i {
            margin-right: 5px; /* Espacio entre el icono y el texto */
        }
    </style>
</head>
<body>

<a href="../index.html" class="btn btn-primary">
    <i class="fas fa-arrow-left"></i> Volver al Inicio
</a>

    <h1>Gestión de Infraestructura de Red</h1>
    <ul class="nav nav-pills justify-content-center">
    <li role="presentation"><a href="torre_comunicacion.php" class="btn-torre-comunicacion"><i class="fas fa-broadcast-tower"></i> <span>Torres de Comunicación</span></a></li>
    <li role="presentation"><a href="localizacion_torre.php" class="btn-localizacion-torre"><i class="fas fa-map-marker-alt"></i> <span>Localizaciones de Torres de comunicación</span></a></li>
    <li role="presentation"><a href="propietario.php"><i class="fas fa-user"></i> <span>Propietarios</span></a></li>
    <li role="presentation"><a href="enlace_fibraoptica.php" class="btn-enlace-fibraoptica"><i class="fas fa-project-diagram"></i> <span>Enlaces de Fibra Óptica</span></a></li>
    <li role="presentation"><a href="nodo_red.php" class="btn-nodo-red"><i class="fas fa-server"></i> <span>Nodos de Red</span></a></li>
    <li role="presentation"><a href="localizacion_nodo.php" class="btn-localizacion-nodo"><i class="fas fa-map-marker-alt"></i> <span>Localizaciones de Nodos de red</span></a></li>
    <li role="presentation"><a href="mantenimiento_componentedered.php" class="btn-componente-red"><i class="fas fa-network-wired"></i> <span>Mantenimientos del componente de Red</span></a></li>
    <li role="presentation"><a href="tipo_mantenimiento.php" class="btn-mantenimiento"><i class="fas fa-wrench"></i> <span>Tipos de Mantenimiento</span></a></li>
    <li role="presentation"><a href="equipos_involucrados.php" class="btn-equipos"><i class="fas fa-cogs"></i> <span>Equipos Involucrados</span></a></li>
    <li role="presentation"><a href="contrato_mantenimiento.php" class="btn-contrato"><i class="fas fa-file-contract"></i> <span>Contratos de Mantenimiento</span></a></li>
    <li role="presentation"><a href="proveedor.php"><i class="fas fa-truck"></i> <span>Proveedores</span></a></li>
    <li role="presentation"><a href="personal_encargado.php"><i class="fas fa-users"></i> <span>Personal encargado</span></a></li>
    <li role="presentation"><a href="pais.php" class="btn-pais"><i class="fas fa-globe"></i> <span>Países</span></a></li>
    <li role="presentation"><a href="ciudad.php" class="btn-ciudad"><i class="fas fa-city"></i> <span>Ciudades</span></a></li>
    </ul>
</div>

</body>
</html>
