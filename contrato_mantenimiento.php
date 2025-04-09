<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Contrato de Mantenimiento</title>
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
  <h1>Formulario Contrato Mantenimiento</h1>
  <a href="menu.php" class="btn btn-default btn-return"><i class="fas fa-arrow-left"></i> Volver al Menú</a>

  <form method="POST" action="contrato_mantenimiento.php">
    <div class="form-group">
      <br>
      <label for="id_contrato_mantto">ID Contrato</label>
      <input type="text" name="id_contrato_mantto" class="form-control" id="id_contrato_mantto">
    </div>
    <div class="form-group">
      <label for="nombre_contrato_mantto">Nombre del contrato</label>
      <input type="text" name="nombre_contrato_mantto" class="form-control" id="nombre_contrato_mantto">
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

  $id = "";
  $nombre = "";

  if (isset($_POST['btn_consultar'])) {
      $id = $_POST['id_contrato_mantto'];
      if ($id == "") {
          echo '<div class="alert alert-warning">Se requiere el número del ID del contrato</div>';
      } else {
          $ver = $myPDO->query("SELECT * FROM contrato_mantenimiento WHERE id_contrato_mantto = '$id'");
          if ($row = $ver->fetch()) {
              echo '<div class="alert alert-info">';
              echo 'ID: ' . $row['id_contrato_mantto'] . '<br>';
              echo 'Nombre del contrato: ' . $row['nombre_contrato_mantto'] . '<br>';
              echo '</div>';
          } else {
              echo '<div class="alert alert-warning">El ID del contrato no existe en la tabla</div>';
          }
      }
  }

  if (isset($_POST['btn_nuevo'])) {
      $id = $_POST['id_contrato_mantto'];
      $nombre = $_POST['nombre_contrato_mantto'];

      if ($id == "" || $nombre == "") {
          echo '<div class="alert alert-warning">Los campos ID y Nombre del contrato son obligatorios</div>';
      } else {
          echo "<div class='alert alert-info'>Voy a intentar insertar: $id - $nombre</div>";
          $sql = "INSERT INTO contrato_mantenimiento(id_contrato_mantto, nombre_contrato_mantto) VALUES ('$id', '$nombre')";
          $myPDO->query($sql);
          echo '<div class="alert alert-success">El contrato fue registrado</div>';
      }
  }

  if (isset($_POST['btn_actualizar'])) {
      $id = $_POST['id_contrato_mantto'];
      $nombre = $_POST['nombre_contrato_mantto'];

      if ($id == "" || $nombre == "") {
          echo '<div class="alert alert-warning">Los campos ID y Nombre del contrato son obligatorios</div>';
      } else {
          $ver = $myPDO->query("SELECT * FROM contrato_mantenimiento WHERE id_contrato_mantto = '$id'");
          if ($row = $ver->fetch()) {
              $sql = "UPDATE contrato_mantenimiento SET nombre_contrato_mantto = '$nombre' WHERE id_contrato_mantto = '$id'";
              $myPDO->query($sql);
              echo '<div class="alert alert-success">Contrato actualizado correctamente</div>';
          } else {
              echo '<div class="alert alert-warning">El ID del contrato no existe en la tabla</div>';
          }
      }
  }

  if (isset($_POST['btn_eliminar'])) {
      $id = $_POST['id_contrato_mantto'];
      if ($id == "") {
          echo '<div class="alert alert-warning">Se requiere el número del ID del contrato</div>';
      } else {
          $ver = $myPDO->query("SELECT * FROM contrato_mantenimiento WHERE id_contrato_mantto = '$id'");
          if ($row = $ver->fetch()) {
              $sql = "DELETE FROM contrato_mantenimiento WHERE id_contrato_mantto = '$id'";
              $myPDO->query($sql);
              echo '<div class="alert alert-success">Contrato eliminado correctamente</div>';
          } else {
              echo '<div class="alert alert-warning">El ID del contrato no existe en la tabla</div>';
          }
      }
  }
  ?>

</div>

</body>
</html>
