<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nodos de red</title>
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
  <h1>Formulario Tabla Nodo de red</h1>
  <a href="menu.php" class="btn btn-default btn-return"><i class="fas fa-arrow-left"></i> Volver al Menú</a>

  <form method="POST" action="nodo_red.php">
    <div class="form-group">
      <label for="id_nodo">ID Nodo</label>
      <input type="text" name="id_nodo" class="form-control" id="id_nodo">
    </div>
    <div class="form-group">
      <label for="tipo_nodo">Tipo de nodo</label>
      <input type="text" name="tipo_nodo" class="form-control" id="tipo_nodo">
    </div>
    <div class="form-group">
      <label for="id_propietario">ID Propietario</label>
      <input type="text" name="id_propietario" class="form-control" id="id_propietario">
    </div>
    <div class="form-group">
      <label for="fecha_instalacion">Fecha de instalación</label>
      <input type="text" name="fecha_instalacion" class="form-control" id="fecha_instalacion">
    </div>
    <div class="form-group">
      <label for="id_localizacion_nodo">ID Localización nodo</label>
      <input type="text" name="id_localizacion_nodo" class="form-control" id="id_localizacion_nodo">
    </div>
    <div class="form-group">
      <label for="protocolo_soportado">Protocolo soportado</label>
      <input type="text" name="protocolo_soportado" class="form-control" id="protocolo_soportado">
    </div>
    <div class="form-group">
      <label for="estado_firmware_software">Estado del Firmware y Software</label>
      <input type="text" name="estado_firmware_software" class="form-control" id="estado_firmware_software">
    </div>
    <div class="text-center">
      <input type="submit" value="Consultar" class="btn btn-primary" name="btn_consultar">
      <input type="submit" value="Nuevo" class="btn btn-success" name="btn_nuevo">
      <input type="submit" value="Actualizar" class="btn btn-info" name="btn_actualizar">
      <input type="submit" value="Eliminar" class="btn btn-danger" name="btn_eliminar">
    </div>
  </form>

  <?php
  include("conexion.php");

  $id_nod = "";
  $tip_nod = "";
  $id_prop = "";
  $fech_inst = "";
  $id_loc_nod = "";
  $protoc_sop = "";
  $est_firmw_softw = "";

  if (isset($_POST['btn_consultar'])) {
    $id_nod = $_POST['id_nodo'];
    if ($id_nod == "") {
      echo '<div class="alert alert-warning">Se requiere el número ID del nodo de red</div>';
    } else {
      $ver = $myPDO->query("SELECT * FROM nodo_red WHERE id_nodo = '$id_nod'");
      if ($row = $ver->fetch()) {
        echo '<div class="alert alert-info">';
        echo 'ID: ' . $row['id_nodo'] . '<br>';
        echo 'Tipo de nodo: ' . $row['tipo_nodo'] . '<br>';
        echo 'ID Propietario: ' . $row['id_propietario'] . '<br>';
        echo 'Fecha de instalación: ' . $row['fecha_instalacion'] . '<br>';
        echo 'ID Localización nodo: ' . $row['id_localizacion_nodo'] . '<br>';
        echo 'Protocolo soportado: ' . $row['protocolo_soportado'] . '<br>';
        echo 'Estado del firmware y software: ' . $row['estado_firmware_software'] . '<br>';
        echo '</div>';
      } else {
        echo '<div class="alert alert-warning">El ID Nodo no existe en la tabla</div>';
      }
    }
  }

  if (isset($_POST['btn_nuevo'])) {
    $id_nod = $_POST['id_nodo'];
    $tip_nod = $_POST['tipo_nodo'];
    $id_prop = $_POST['id_propietario'];
    $fech_inst = $_POST['fecha_instalacion'];
    $id_loc_nod = $_POST['id_localizacion_nodo'];
    $protoc_sop = $_POST['protocolo_soportado'];
    $est_firmw_softw = $_POST['estado_firmware_software'];

    if ($id_nod == "" || $tip_nod == "" || $id_prop == "" || $fech_inst == "" || $id_loc_nod == "" || $protoc_sop == "" || $est_firmw_softw == "") {
      echo '<div class="alert alert-warning">Los campos son obligatorios</div>';
    } else {
      $sql_insert = "INSERT INTO nodo_red (id_nodo, tipo_nodo, id_propietario, fecha_instalacion, id_localizacion_nodo, protocolo_soportado, estado_firmware_software) 
                     VALUES ('$id_nod', '$tip_nod', '$id_prop', '$fech_inst', '$id_loc_nod', '$protoc_sop', '$est_firmw_softw')";
      $myPDO->query($sql_insert);
      echo '<div class="alert alert-success">El nodo de red se registró en la tabla</div>';
    }
  }

  if (isset($_POST['btn_actualizar'])) {
    $id_nod = $_POST['id_nodo'];
    $tip_nod = $_POST['tipo_nodo'];
    $id_prop = $_POST['id_propietario'];
    $fech_inst = $_POST['fecha_instalacion'];
    $id_loc_nod = $_POST['id_localizacion_nodo'];
    $protoc_sop = $_POST['protocolo_soportado'];
    $est_firmw_softw = $_POST['estado_firmware_software'];

    if ($id_nod == "" || $tip_nod == "" || $id_prop == "" || $fech_inst == "" || $id_loc_nod == "" || $protoc_sop == "" || $est_firmw_softw == "") {
      echo '<div class="alert alert-warning">Los campos son obligatorios</div>';
    } else {
      $ver = $myPDO->query("SELECT * FROM nodo_red WHERE id_nodo = '$id_nod'");
      if ($row = $ver->fetch()) {
        $sql_update = "UPDATE nodo_red SET 
                       tipo_nodo = '$tip_nod', 
                       id_propietario = '$id_prop', 
                       fecha_instalacion = '$fech_inst', 
                       id_localizacion_nodo = '$id_loc_nod',
                       protocolo_soportado = '$protoc_sop',
                       estado_firmware_software = '$est_firmw_softw'
                       WHERE id_nodo = '$id_nod'";
        $myPDO->query($sql_update);
        echo '<div class="alert alert-success">Actualización realizada</div>';
      } else {
        echo '<div class="alert alert-warning">El ID Nodo no existe en la tabla</div>';
      }
    }
  }

  if (isset($_POST['btn_eliminar'])) {
    $id_nod = $_POST['id_nodo'];
    if ($id_nod == "") {
      echo '<div class="alert alert-warning">Se requiere el número ID del nodo de red</div>';
    } else {
      $ver = $myPDO->query("SELECT * FROM nodo_red WHERE id_nodo = '$id_nod'");
      if ($row = $ver->fetch()) {
        $sql = "DELETE FROM nodo_red WHERE id_nodo = '$id_nod'";
        $myPDO->query($sql);
        echo '<div class="alert alert-success">El registro se eliminó</div>';
      } else {
        echo '<div class="alert alert-warning">El ID Nodo no existe en la tabla</div>';
      }
    }
  }
  ?>

</div>

</body>
</html>