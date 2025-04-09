<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Enlaces de fibra óptica</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    body {
      background: linear-gradient(90deg, #47183e, #e4d9d9, #47183e);
      padding-top: 50px;
      font-family: 'Arial', sans-serif;
    }
    .container {
      max-width: 600px;
      background-color: rgba(255, 255, 255, 0.8);
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
      font-family: 'Times New Roman', serif;
      font-weight: bold;
      color: #000;
      text-align: center;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
      margin-bottom: 30px;
    }
    .btn {
      margin: 10px 0;
      font-size: 16px;
      border-radius: 5px;
      transition: all 0.3s;
    }
    .btn:hover {
      transform: scale(1.05);
    }
    .btn-default {
      background-color: #fff;
      color: #000;
      border: 2px solid #000;
    }
    .btn-default:hover {
      background-color: rgba(0,0,0,0.1);
      color: #000;
      border-color: #000;
    }
    .btn-default i {
      color: #000;
      margin-right: 5px;
    }
    .form-group label {
      font-weight: bold;
      color: #000;
    }
    .form-control {
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    .alert {
      margin-top: 20px;
      border-radius: 5px;
    }
    .text-center {
      text-align: center;
    }
  </style>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h1>Formulario Enlaces de fibra óptica</h1>
  <a href="menu.php" class="btn btn-default btn-return"><i class="fas fa-arrow-left"></i> Volver al Menú</a>

  <form method="POST" action="enlace_fibraoptica.php">
    <?php
      $campos = [
        "id_enlace" => "ID Enlace",
        "distancia_enlacekm" => "Distancia de enlace en Km",
        "capacidad_transmision_gbps" => "Capacidad de transmisión en Gbps",
        "fecha_instalacion" => "Fecha de instalación",
        "tipo_conexion" => "Tipo de conexión",
        "ancho_banda_mhz" => "Ancho de Banda en MHz",
        "velocidad_gbps" => "Velocidad en Gbps",
        "latencia_us" => "Latencia en μs"
      ];

      foreach ($campos as $name => $label) {
        echo '<div class="form-group">';
        echo '<label for="'.$name.'">'.$label.'</label>';
        echo '<input type="text" name="'.$name.'" class="form-control" id="'.$name.'">';
        echo '</div>';
      }
    ?>
    <div class="text-center">
      <input type="submit" value="Consultar" class="btn btn-primary" name="btn_consultar">
      <input type="submit" value="Nuevo" class="btn btn-success" name="btn_nuevo">
      <input type="submit" value="Actualizar" class="btn btn-info" name="btn_actualizar">
      <input type="submit" value="Eliminar" class="btn btn-danger" name="btn_eliminar">
    </div>
  </form>

  <?php
  include("conexion.php");

  $id_enl = $_POST['id_enlace'] ?? "";
  $dist_enlkm = $_POST['distancia_enlacekm'] ?? "";
  $cap_trans_gbps = $_POST['capacidad_transmision_gbps'] ?? "";
  $fech_inst = $_POST['fecha_instalacion'] ?? "";
  $tip_conex = $_POST['tipo_conexion'] ?? "";
  $anch_band_MHz = $_POST['ancho_banda_mhz'] ?? "";
  $vel_gbps = $_POST['velocidad_gbps'] ?? "";
  $lat_us = $_POST['latencia_us'] ?? "";

  if (isset($_POST['btn_consultar'])) {
    if ($id_enl == "") {
        echo '<div class="alert alert-warning">Se requiere el número ID del enlace de fibra óptica</div>';
    } else {
        $ver = $myPDO->query("SELECT * FROM enlace_fibraoptica WHERE id_enlace = '$id_enl'");
        if ($row = $ver->fetch()) {
            echo '<div class="alert alert-info">';
            foreach ($campos as $campo => $etiqueta) {
              echo $etiqueta . ': ' . $row[$campo] . '<br>';
            }
            echo '</div>';
        } else {
            echo '<div class="alert alert-warning">El ID Enlace no existe en la tabla</div>';
        }
    }
  }

  if (isset($_POST['btn_nuevo'])) {
    if ($id_enl == "" || $dist_enlkm == "" || $cap_trans_gbps == "" || $fech_inst == "" || $tip_conex == "" || $anch_band_MHz == "" || $vel_gbps == "" || $lat_us == "") {
        echo '<div class="alert alert-warning">Los campos son obligatorios</div>';
    } else {
        $sql_insert = "INSERT INTO enlace_fibraoptica
                       (id_enlace, distancia_enlacekm, capacidad_transmision_gbps, fecha_instalacion, tipo_conexion, ancho_banda_mhz, velocidad_gbps, latencia_us) 
                       VALUES ('$id_enl', '$dist_enlkm', '$cap_trans_gbps', '$fech_inst', '$tip_conex', '$anch_band_MHz', '$vel_gbps', '$lat_us')";
        $myPDO->query($sql_insert);
        echo '<div class="alert alert-success">El enlace de fibra óptica se registró en la tabla</div>';
    }
  }

  if (isset($_POST['btn_actualizar'])) {
    if ($id_enl == "" || $dist_enlkm == "" || $cap_trans_gbps == "" || $fech_inst == "" || $tip_conex == "" || $anch_band_MHz == "" || $vel_gbps == "" || $lat_us == "") {
        echo '<div class="alert alert-warning">Los campos son obligatorios</div>';
    } else {
        $ver = $myPDO->query("SELECT * FROM enlace_fibraoptica WHERE id_enlace = '$id_enl'");
        if ($row = $ver->fetch()) {
            $sql_update = "UPDATE enlace_fibraoptica 
                           SET distancia_enlacekm = '$dist_enlkm', 
                               capacidad_transmision_gbps = '$cap_trans_gbps', 
                               fecha_instalacion = '$fech_inst', 
                               tipo_conexion = '$tip_conex',
                               ancho_banda_mhz = '$anch_band_MHz',
                               velocidad_gbps = '$vel_gbps',
                               latencia_us = '$lat_us'
                           WHERE id_enlace = '$id_enl'";
            $myPDO->query($sql_update);
            echo '<div class="alert alert-success">Actualización realizada</div>';
        } else {
            echo '<div class="alert alert-warning">El ID Enlace fibra óptica no existe en la tabla</div>';
        }
    }
  }

  if (isset($_POST['btn_eliminar'])) {
    if ($id_enl == "") {
        echo '<div class="alert alert-warning">Se requiere el número ID del enlace de fibra óptica</div>';
    } else {
        $ver = $myPDO->query("SELECT * FROM enlace_fibraoptica WHERE id_enlace = '$id_enl'");
        if ($row = $ver->fetch()) {
            $sql = "DELETE FROM enlace_fibraoptica WHERE id_enlace = '$id_enl'";
            $myPDO->query($sql);
            echo '<div class="alert alert-success">El registro se eliminó</div>';
        } else {
            echo '<div class="alert alert-warning">El ID Enlace fibra óptica no existe en la tabla</div>';
        }
    }
  }
  ?>
</div>

</body>
</html>