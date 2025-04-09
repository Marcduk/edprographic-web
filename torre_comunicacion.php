<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Torres de comunicación</title>
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
  <h1>Formulario Tabla Torres de comunicación</h1>
  <a href="menu.php" class="btn btn-default btn-return"><i class="fas fa-arrow-left"></i> Volver al Menú</a>

  <form method="POST" action="torre_comunicacion.php">
    <div class="form-group">
      <label for="id_torre">ID Torre</label>
      <input type="text" name="id_torre" class="form-control" id="id_torre">
    </div>
    <div class="form-group">
      <label for="nombre_torre">Nombre de torre</label>
      <input type="text" name="nombre_torre" class="form-control" id="nombre_torre">
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
      <label for="id_localizacion_torre">ID Localización torre</label>
      <input type="text" name="id_localizacion_torre" class="form-control" id="id_localizacion_torre">
    </div>
    <div class="form-group">
      <label for="capacidad_soporte_kg">Capacidad de soporte en Kg</label>
      <input type="text" name="capacidad_soporte_kg" class="form-control" id="capacidad_soporte_kg">
    </div>
    <div class="form-group">
      <label for="nivel_señal_dbm">Nivel de señal en dBm</label>
      <input type="text" name="nivel_señal_dbm" class="form-control" id="nivel_señal_dbm">
    </div>
    <div class="form-group">
      <label for="id_enlace">ID Enlace</label>
      <input type="text" name="id_enlace" class="form-control" id="id_enlace">
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

  if (isset($_POST['btn_consultar'])) {
    $id = $_POST['id_torre'];
    if ($id == "") {
      echo '<div class="alert alert-warning">Se requiere el ID Torre</div>';
    } else {
      $res = $myPDO->query("SELECT * FROM torre_comunicacion WHERE id_torre = '$id'");
      if ($row = $res->fetch()) {
        echo '<div class="alert alert-info">';
        echo 'ID Torre: ' . $row['id_torre'] . '<br>';
        echo 'Nombre de torre: ' . $row['nombre_torre'] . '<br>';
        echo 'ID Propietario: ' . $row['id_propietario'] . '<br>';
        echo 'Fecha de instalación: ' . $row['fecha_instalacion'] . '<br>';
        echo 'ID Localización torre: ' . $row['id_localizacion_torre'] . '<br>';
        echo 'Capacidad de soporte en Kg: ' . $row['capacidad_soporte_kg'] . '<br>';
        echo 'Nivel de señal en dBm: ' . $row['nivel_señal_dbm'] . '<br>';
        echo 'ID Enlace: ' . $row['id_enlace'] . '<br>';
        echo '</div>';
      } else {
        echo '<div class="alert alert-warning">El ID Torre no existe</div>';
      }
    }
  }

  if (isset($_POST['btn_nuevo'])) {
    $id = $_POST['id_torre'];
    $n1 = $_POST['nombre_torre'];
    $n2 = $_POST['id_propietario'];
    $n3 = $_POST['fecha_instalacion'];
    $n4 = $_POST['id_localizacion_torre'];
    $n5 = $_POST['capacidad_soporte_kg'];
    $n6 = $_POST['nivel_señal_dbm'];
    $n7 = $_POST['id_enlace'];
    if ($id == "" || $n1 == "" || $n2 == "" || $n3 == "" || $n4 == "" || $n5 == "" || $n6 == "" || $n7 == "") {
      echo '<div class="alert alert-warning">Los campos son obligatorios</div>';
    } else {
      $sql = "INSERT INTO torre_comunicacion(id_torre, nombre_torre, id_propietario, fecha_instalacion, id_localizacion_torre, capacidad_soporte_kg, nivel_señal_dbm, id_enlace)
              VALUES ('$id','$n1','$n2','$n3','$n4','$n5','$n6','$n7')";
      $myPDO->query($sql);
      echo '<div class="alert alert-success">Registro guardado</div>';
    }
  }

  if (isset($_POST['btn_actualizar'])) {
    $id = $_POST['id_torre'];
    $n1 = $_POST['nombre_torre'];
    $n2 = $_POST['id_propietario'];
    $n3 = $_POST['fecha_instalacion'];
    $n4 = $_POST['id_localizacion_torre'];
    $n5 = $_POST['capacidad_soporte_kg'];
    $n6 = $_POST['nivel_señal_dbm'];
    $n7 = $_POST['id_enlace'];
    if ($id == "" || $n1 == "" || $n2 == "" || $n3 == "" || $n4 == "" || $n5 == "" || $n6 == "" || $n7 == "") {
      echo '<div class="alert alert-warning">Los campos son obligatorios</div>';
    } else {
      $res = $myPDO->query("SELECT * FROM torre_comunicacion WHERE id_torre = '$id'");
      if ($row = $res->fetch()) {
        $sql = "UPDATE torre_comunicacion SET nombre_torre='$n1', id_propietario='$n2', fecha_instalacion='$n3', id_localizacion_torre='$n4', capacidad_soporte_kg='$n5', nivel_señal_dbm='$n6', id_enlace='$n7' WHERE id_torre='$id'";
        $myPDO->query($sql);
        echo '<div class="alert alert-success">Registro actualizado</div>';
      } else {
        echo '<div class="alert alert-warning">El ID Torre no existe</div>';
      }
    }
  }

  if (isset($_POST['btn_eliminar'])) {
    $id = $_POST['id_torre'];
    if ($id == "") {
      echo '<div class="alert alert-warning">Se requiere el ID Torre</div>';
    } else {
      $res = $myPDO->query("SELECT * FROM torre_comunicacion WHERE id_torre = '$id'");
      if ($row = $res->fetch()) {
        $sql = "DELETE FROM torre_comunicacion WHERE id_torre='$id'";
        $myPDO->query($sql);
        echo '<div class="alert alert-success">Registro eliminado</div>';
      } else {
        echo '<div class="alert alert-warning">El ID Torre no existe</div>';
      }
    }
  }
  ?>
</div>

</body>
</html>