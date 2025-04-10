<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Localización de torres</title>
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
  <h1>Formulario Tabla Localización torres</h1>
  <a href="menu.php" class="btn btn-default btn-return"><i class="fas fa-arrow-left"></i> Volver al Menú</a>

  <form method="POST" action="localizacion_torre.php">
    <div class="form-group">
      <label for="id_localizacion_torre">ID Localización torre</label>
      <input type="text" name="id_localizacion_torre" class="form-control" id="id_localizacion_torre">
    </div>
    <div class="form-group">
      <label for="id_pais">ID país</label>
      <input type="text" name="id_pais" class="form-control" id="id_pais">
    </div>
    <div class="form-group">
      <label for="id_ciudad">ID Ciudad</label>
      <input type="text" name="id_ciudad" class="form-control" id="id_ciudad">
    </div>
    <div class="form-group">
      <label for="direccion">Dirección</label>
      <input type="text" name="direccion" class="form-control" id="direccion">
    </div>
    <div class="form-group">
      <label for="codigo_postal">Código postal</label>
      <input type="text" name="codigo_postal" class="form-control" id="codigo_postal">
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

  $id_loc_tor = "";
  $id_pa = "";
  $id_ciud = "";
  $direcc = "";
  $cod_post = "";

  if (isset($_POST['btn_consultar'])) {
    $id_loc_tor = $_POST['id_localizacion_torre'];
    if ($id_loc_tor == "") {
      echo '<div class="alert alert-warning">Se requiere el número ID de la localización de la torre</div>';
    } else {
      $ver = $myPDO->query("SELECT * FROM localizacion_torre WHERE id_localizacion_torre = '$id_loc_tor'");
      if ($row = $ver->fetch()) {
        echo '<div class="alert alert-info">';
        echo 'ID: ' . $row['id_localizacion_torre'] . '<br>';
        echo 'ID País: ' . $row['id_pais'] . '<br>';
        echo 'ID Ciudad: ' . $row['id_ciudad'] . '<br>';
        echo 'Dirección: ' . $row['direccion'] . '<br>';
        echo 'Código postal: ' . $row['codigo_postal'] . '<br>';
        echo '</div>';
      } else {
        echo '<div class="alert alert-warning">El ID Localización torre no existe en la tabla</div>';
      }
    }
  }

  if (isset($_POST['btn_nuevo'])) {
    $id_loc_tor = $_POST['id_localizacion_torre'];
    $id_pa = $_POST['id_pais'];
    $id_ciud = $_POST['id_ciudad'];
    $direcc = $_POST['direccion'];
    $cod_post = $_POST['codigo_postal'];

    if ($id_loc_tor == "" || $id_pa == "" || $id_ciud == "" || $direcc == "" || $cod_post == "") {
      echo '<div class="alert alert-warning">Los campos son obligatorios</div>';
    } else {
      $sql_insert = "INSERT INTO localizacion_torre (id_localizacion_torre, id_pais, id_ciudad, direccion, codigo_postal) VALUES ('$id_loc_tor', '$id_pa', '$id_ciud', '$direcc', '$cod_post')";
      $myPDO->query($sql_insert);
      echo '<div class="alert alert-success">La localización de la torre se registró en la tabla</div>';
    }
  }

  if (isset($_POST['btn_actualizar'])) {
    $id_loc_tor = $_POST['id_localizacion_torre'];
    $id_pa = $_POST['id_pais'];
    $id_ciud = $_POST['id_ciudad'];
    $direcc = $_POST['direccion'];
    $cod_post = $_POST['codigo_postal'];

    if ($id_loc_tor == "" || $id_pa == "" || $id_ciud == "" || $direcc == "" || $cod_post == "") {
      echo '<div class="alert alert-warning">Los campos son obligatorios</div>';
    } else {
      $ver = $myPDO->query("SELECT * FROM localizacion_torre WHERE id_localizacion_torre = '$id_loc_tor'");
      if ($row = $ver->fetch()) {
        $sql_update = "UPDATE localizacion_torre SET id_localizacion_torre = '$id_loc_tor', id_pais = '$id_pa', id_ciudad = '$id_ciud', direccion = '$direcc', codigo_postal = '$cod_post' WHERE id_localizacion_torre = '$id_loc_tor'";
        $myPDO->query($sql_update);
        echo '<div class="alert alert-success">Actualización realizada</div>';
      } else {
        echo '<div class="alert alert-warning">El ID Localización torre no existe en la tabla</div>';
      }
    }
  }

  if (isset($_POST['btn_eliminar'])) {
    $id_loc_tor = $_POST['id_localizacion_torre'];
    if ($id_loc_tor == "") {
      echo '<div class="alert alert-warning">Se requiere el número ID de la localización de la torre</div>';
    } else {
      $ver = $myPDO->query("SELECT * FROM localizacion_torre WHERE id_localizacion_torre = '$id_loc_tor'");
      if ($row = $ver->fetch()) {
        $sql = "DELETE FROM localizacion_torre WHERE id_localizacion_torre = '$id_loc_tor'";
        $myPDO->query($sql);
        echo '<div class="alert alert-success">El registro se eliminó</div>';
      } else {
        echo '<div class="alert alert-warning">El ID Localización torre no existe en la tabla</div>';
      }
    }
  }
  ?>

</div>

</body>
</html>