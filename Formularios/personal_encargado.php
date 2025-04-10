<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Personal encargado</title>
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
  <h1>Formulario Tabla Personal encargado</h1>
  <a href="menu.php" class="btn btn-default btn-return"><i class="fas fa-arrow-left"></i> Volver al Menú</a>

  <form method="POST" action="personal_encargado.php">
    <div class="form-group">
      <br>
      <label for="id_personal_encargado">ID personal encargado</label>
      <input type="text" name="id_personal_encargado" class="form-control" id="id_personal_encargado">
    </div>
    <div class="form-group">
      <label for="personal_encargado">Nombre del personal encargado</label>
      <input type="text" name="personal_encargado" class="form-control" id="personal_encargado">
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

  $id_pers_enc = "";
  $nomb_pers_enc = "";

  if (isset($_POST['btn_consultar'])) {
      $id_pers_enc = $_POST['id_personal_encargado'];
      if ($id_pers_enc == "") {
          echo '<div class="alert alert-warning">Se requiere el número del ID del personal encargado</div>';
      } else {
          $ver = $myPDO->query("SELECT * FROM personal_encargado WHERE id_personal_encargado = '$id_pers_enc'");
          if ($row = $ver->fetch()) {
              echo '<div class="alert alert-info">';
              echo 'ID: ' . $row['id_personal_encargado'] . '<br>';
              echo 'Nombre del personal encargado: ' . $row['personal_encargado'] . '<br>';
              echo '</div>';
          } else {
              echo '<div class="alert alert-warning">El ID del personal encargado no existe en la tabla</div>';
          }
      }
  }

  if (isset($_POST['btn_nuevo'])) {
      $id_pers_enc = $_POST['id_personal_encargado'];
      $nomb_pers_enc = $_POST['personal_encargado'];
      if ($id_pers_enc == "" || $nomb_pers_enc == "") {
          echo '<div class="alert alert-warning">Los campos: ID personal encargado y Nombre son obligatorios</div>';
      } else {
          $sql_insert = "INSERT INTO personal_encargado (id_personal_encargado, personal_encargado) VALUES ('$id_pers_enc', '$nomb_pers_enc')";
          $myPDO->query($sql_insert);
          echo '<div class="alert alert-success">El personal encargado se registró en la tabla</div>';
      }
  }

  if (isset($_POST['btn_actualizar'])) {
      $id_pers_enc = $_POST['id_personal_encargado'];
      $nomb_pers_enc = $_POST['personal_encargado'];
      if ($id_pers_enc == "" || $nomb_pers_enc == "") {
          echo '<div class="alert alert-warning">Los campos: ID personal encargado y Nombre son obligatorios</div>';
      } else {
          $ver = $myPDO->query("SELECT * FROM personal_encargado WHERE id_personal_encargado = '$id_pers_enc'");
          if ($row = $ver->fetch()) {
              $sql_update = "UPDATE personal_encargado SET personal_encargado = '$nomb_pers_enc' WHERE id_personal_encargado = '$id_pers_enc'";
              $myPDO->query($sql_update);
              echo '<div class="alert alert-success">Actualización realizada</div>';
          } else {
              echo '<div class="alert alert-warning">El ID del personal encargado no existe en la tabla</div>';
          }
      }
  }

  if (isset($_POST['btn_eliminar'])) {
      $id_pers_enc = $_POST['id_personal_encargado'];
      if ($id_pers_enc == "") {
          echo '<div class="alert alert-warning">Se requiere el número del ID del personal encargado</div>';
      } else {
          $ver = $myPDO->query("SELECT * FROM personal_encargado WHERE id_personal_encargado = '$id_pers_enc'");
          if ($row = $ver->fetch()) {
              $sql = "DELETE FROM personal_encargado WHERE id_personal_encargado = '$id_pers_enc'";
              $myPDO->query($sql);
              echo '<div class="alert alert-success">El registro se eliminó</div>';
          } else {
              echo '<div class="alert alert-warning">El ID del personal encargado no existe en la tabla</div>';
          }
      }
  }
  ?>
</div>

</body>
</html>