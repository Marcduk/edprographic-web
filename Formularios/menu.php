<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestión de Infraestructura de Red - Menú</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background: linear-gradient(90deg, #1a4718, #e4d9d9, #1a4718);
            padding-top: 50px;
            font-family: 'Arial', sans-serif;
        }
        .container {
            max-width: 600px;
            margin: auto;
        }
        h1 {
            margin-bottom: 30px;
            font-size: 48px;
            font-family: 'Times New Roman', serif;
            font-weight: bold;
            color: #000;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            text-align: center;
        }
        .nav-pills {
            background-color: rgba(255,255,255,0.8);
            border-radius: 10px;
            padding: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .nav-pills > li > a {
            border-radius: 5px;
            margin-right: 10px;
            font-size: 18px;
            color: #000;
            transition: all 0.3s;
        }
        .nav-pills > li > a:hover,
        .nav-pills > li > a:focus {
            background-color: rgba(0,0,0,0.1);
            color: #000;
            border: 2px solid #007bff;
            transform: scale(1.1);
        }
        .nav-pills > li > a i {
            margin-right: 5px;
        }
        .volver-btn {
            display: block;
            width: fit-content;
            margin: 0 auto 20px auto;
        }
    </style>
</head>
<body>

<div class="container">
    <a href="../index.html" class="btn btn-primary volver-btn">
        <i class="fas fa-arrow-left"></i> Volver al Inicio
    </a>

    <h1>Gestión de Infraestructura de Red</h1>

    <ul class="nav nav-pills nav-stacked">
        <li role="presentation"><a href="torre_comunicacion.php" class="btn-torre-comunicacion"><i class="fas fa-broadcast-tower"></i> Torres de Comunicación</a></li>
        <li role="presentation"><a href="localizacion_torre.php" class="btn-localizacion-torre"><i class="fas fa-map-marker-alt"></i> Localizaciones de Torres</a></li>
        <li role="presentation"><a href="propietario.php"><i class="fas fa-user"></i> Propietarios</a></li>
        <li role="presentation"><a href="enlace_fibraoptica.php" class="btn-enlace-fibraoptica"><i class="fas fa-project-diagram"></i> Enlaces de Fibra Óptica</a></li>
        <li role="presentation"><a href="nodo_red.php" class="btn-nodo-red"><i class="fas fa-server"></i> Nodos de Red</a></li>
        <li role="presentation"><a href="localizacion_nodo.php" class="btn-localizacion-nodo"><i class="fas fa-map-marker-alt"></i> Localizaciones de Nodos</a></li>
        <li role="presentation"><a href="mantenimiento_componentedered.php" class="btn-componente-red"><i class="fas fa-network-wired"></i> Mantenimientos del Componente</a></li>
        <li role="presentation"><a href="tipo_mantenimiento.php" class="btn-mantenimiento"><i class="fas fa-wrench"></i> Tipos de Mantenimiento</a></li>
        <li role="presentation"><a href="equipos_involucrados.php" class="btn-equipos"><i class="fas fa-cogs"></i> Equipos Involucrados</a></li>
        <li role="presentation"><a href="contrato_mantenimiento.php" class="btn-contrato"><i class="fas fa-file-contract"></i> Contratos de Mantenimiento</a></li>
        <li role="presentation"><a href="proveedor.php"><i class="fas fa-truck"></i> Proveedores</a></li>
        <li role="presentation"><a href="personal_encargado.php"><i class="fas fa-users"></i> Personal Encargado</a></li>
        <li role="presentation"><a href="pais.php" class="btn-pais"><i class="fas fa-globe"></i> Países</a></li>
        <li role="presentation"><a href="ciudad.php" class="btn-ciudad"><i class="fas fa-city"></i> Ciudades</a></li>
    </ul>
</div>

</body>
</html>
