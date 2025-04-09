<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mantenimiento del componente de Red</title>
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
  <h1>Formulario Tabla Mantenimiento componente de red</h1>
  <a href="menu.php" class="btn btn-default btn-return"><i class="fas fa-arrow-left"></i> Volver al Menú</a>

  <form method="POST" action="mantenimiento_componentedered.php">
    <div class="form-group">
      <br>
      <label for="id_mantenimiento_componentedered">ID Mantenimiento de componente de red</label>
      <input type="text" name="id_mantenimiento_componentedered" class="form-control" id="id_mantenimiento_componentedered">
    </div>
    <div class="form-group">
      <label for="id_torre">ID Torre</label>
      <input type="text" name="id_torre" class="form-control" id="id_torre">
    </div>
    <div class="form-group">
      <label for="id_enlace">ID Enlace</label>
      <input type="text" name="id_enlace" class="form-control" id="id_enlace">
    </div>
    <div class="form-group">
      <label for="id_nodo">ID Nodo</label>
      <input type="text" name="id_nodo" class="form-control" id="id_nodo">
    </div>
    <div class="form-group">
      <label for="id_contrato">ID Contrato</label>
      <input type="text" name="id_contrato" class="form-control" id="id_contrato">
    </div>
    <div class="form-group">
      <label for="id_tipo_mantenimiento">ID Tipo mantenimiento</label>
      <input type="text" name="id_tipo_mantenimiento" class="form-control" id="id_tipo_mantenimiento">
    </div>
    <div class="form-group">
      <label for="fecha">Fecha</label>
      <input type="text" name="fecha" class="form-control" id="fecha">
    </div>
    <div class="form-group">
      <label for="hora">Hora</label>
      <input type="text" name="hora" class="form-control" id="hora">
    </div>
    <div class="form-group">
      <label for="observaciones">Observaciones</label>
      <input type="text" name="observaciones" class="form-control" id="observaciones">
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

  $id_mant_comp = "";
  $id_tor = "";
  $id_enl = "";
  $id_nod = "";
  $id_cont = "";
  $id_tip_man = "";
  $fech = "";
  $hor = "";
  $observ = "";

  if (isset($_POST['btn_consultar'])) {
    $id_mant_comp = $_POST['id_mantenimiento_componentedered'];
    if ($id_mant_comp == "") {
      echo '<div class="alert alert-warning">Se requiere el número del ID del mantenimiento del componente de red</div>';
    } else {
      $ver = $myPDO->query("SELECT * FROM mantenimiento_componentedered WHERE id_mantenimiento_componentedered = '$id_mant_comp'");
      if ($row = $ver->fetch()) {
        echo '<div class="alert alert-info">';
        echo 'ID: ' . $row['id_mantenimiento_componentedered'] . '<br>';
        echo 'ID Torre: ' . $row['id_torre'] . '<br>';
        echo 'ID Enlace: ' . $row['id_enlace'] . '<br>';
        echo 'ID Nodo: ' . $row['id_nodo'] . '<br>';
        echo 'ID Contrato: ' . $row['id_contrato'] . '<br>';
        echo 'ID Tipo de mantenimiento: ' . $row['id_tipo_mantenimiento'] . '<br>';
        echo 'Fecha: ' . $row['fecha'] . '<br>';
        echo 'Hora: ' . $row['hora'] . '<br>';
        echo 'Observaciones: ' . $row['observaciones'] . '<br>';
        echo '</div>';
      } else {
        echo '<div class="alert alert-warning">El ID mantenimiento del componente de red no existe en la tabla</div>';
      }
    }
  }

  if (isset($_POST['btn_nuevo'])) {
    $id_mant_comp = $_POST['id_mantenimiento_componentedered'];
    $id_tor = $_POST['id_torre'];
    $id_enl = $_POST['id_enlace'];
    $id_nod = $_POST['id_nodo'];
    $id_cont = $_POST['id_contrato'];
    $id_tip_man = $_POST['id_tipo_mantenimiento'];
    $fech = $_POST['fecha'];
    $hor = $_POST['hora'];
    $observ = $_POST['observaciones'];
    if ($id_mant_comp == "" || $id_tor == "" || $id_enl == "" || $id_nod == "" || $id_cont == "" || $id_tip_man == "" || $fech == "" || $hor == "" || $observ == "") {
      echo '<div class="alert alert-warning">Los campos son obligatorios</div>';
    } else {
      $sql_insert = "INSERT INTO mantenimiento_componentedered 
                    (id_mantenimiento_componentedered, id_torre, id_enlace, id_nodo, id_contrato, id_tipo_mantenimiento, fecha, hora, observaciones) 
                    VALUES ('$id_mant_comp', '$id_tor', '$id_enl', '$id_nod', '$id_cont', '$id_tip_man', '$fech', '$hor', '$observ')";
      $myPDO->query($sql_insert);
      echo '<div class="alert alert-success">El Mantenimiento del componente de red se registró en la tabla</div>';
    }
  }

  if (isset($_POST['btn_actualizar'])) {
    $id_mant_comp = $_POST['id_mantenimiento_componentedered'];
    $id_tor = $_POST['id_torre'];
    $id_enl = $_POST['id_enlace'];
    $id_nod = $_POST['id_nodo'];
    $id_cont = $_POST['id_contrato'];
    $id_tip_man = $_POST['id_tipo_mantenimiento'];
    $fech = $_POST['fecha'];
    $hor = $_POST['hora'];
    $observ = $_POST['observaciones'];
    if ($id_mant_comp == "" || $id_tor == "" || $id_enl == "" || $id_nod == "" || $id_cont == "" || $id_tip_man == "" || $fech == "" || $hor == "" || $observ == "") {
      echo '<div class="alert alert-warning">Los campos son obligatorios</div>';
    } else {
      $ver = $myPDO->query("SELECT * FROM mantenimiento_componentedered WHERE id_mantenimiento_componentedered = '$id_mant_comp'");
      if ($row = $ver->fetch()) {
        $sql_update = "UPDATE mantenimiento_componentedered 
                       SET id_torre = '$id_tor', 
                           id_enlace = '$id_enl', 
                           id_nodo = '$id_nod', 
                           id_contrato = '$id_cont', 
                           id_tipo_mantenimiento = '$id_tip_man',
                           fecha = '$fech',
                           hora = '$hor',
                           observaciones = '$observ'
                     WHERE id_mantenimiento_componentedered = '$id_mant_comp'";
        $myPDO->query($sql_update);
        echo '<div class="alert alert-success">Actualización realizada</div>';
      } else {
        echo '<div class="alert alert-warning">El ID Mantenimiento del componentedered no existe en la tabla</div>';
      }
    }
  }

  if (isset($_POST['btn_eliminar'])) {
    $id_mant_comp = $_POST['id_mantenimiento_componentedered'];
    if ($id_mant_comp == "") {
      echo '<div class="alert alert-warning">Se requiere el número ID Mantenimiento del componente de red</div>';
    } else {
      $ver = $myPDO->query("SELECT * FROM mantenimiento_componentedered WHERE id_mantenimiento_componentedered = '$id_mant_comp'");
      if ($row = $ver->fetch()) {
        $sql = "DELETE FROM mantenimiento_componentedered WHERE id_mantenimiento_componentedered = '$id_mant_comp'";
        $myPDO->query($sql);
        echo '<div class="alert alert-success">El registro se eliminó</div>';
      } else {
        echo '<div class="alert alert-warning">El ID Mantenimiento del componente de red no existe en la tabla</div>';
      }
    }
  }
  ?>

</div>

</body>
</html>