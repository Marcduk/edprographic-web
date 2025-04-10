<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Proveedores</title>
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
  <h1>Formulario Tabla Proveedor</h1>
  <a href="menu.php" class="btn btn-default btn-return"><i class="fas fa-arrow-left"></i> Volver al Menú</a>

  <form method="POST" action="proveedor.php">
    <div class="form-group">
      <label for="id_proveedor">ID proveedor</label>
      <input type="text" name="id_proveedor" class="form-control" id="id_proveedor">
    </div>
    <div class="form-group">
      <label for="nombre_proveedor">Nombre de proveedor</label>
      <input type="text" name="nombre_proveedor" class="form-control" id="nombre_proveedor">
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

  $id_prov = "";
  $nomb_prov = "";

  if (isset($_POST['btn_consultar'])) {
      $id_prov = $_POST['id_proveedor'];
      if ($id_prov == "") {
          echo '<div class="alert alert-warning">Se requiere el número del ID del proveedor</div>';
      } else {
          $ver = $myPDO->query("SELECT * FROM proveedor WHERE id_proveedor = '$id_prov'");
          if ($row = $ver->fetch()) {
              echo '<div class="alert alert-info">';
              echo 'ID: ' . $row['id_proveedor'] . '<br>';
              echo 'Nombre de proveedor: ' . $row['nombre_proveedor'] . '<br>';
              echo '</div>';
          } else {
              echo '<div class="alert alert-warning">El ID del proveedor no existe en la tabla</div>';
          }
      }
  }

  if (isset($_POST['btn_nuevo'])) {
      $id_prov = $_POST['id_proveedor'];
      $nomb_prov = $_POST['nombre_proveedor'];
      if ($id_prov == "" || $nomb_prov == "") {
          echo '<div class="alert alert-warning">Los campos: ID proveedor y Nombre proveedor son obligatorios</div>';
      } else {
          $sql_insert = "INSERT INTO proveedor (id_proveedor, nombre_proveedor) VALUES ('$id_prov', '$nomb_prov')";
          $myPDO->query($sql_insert);
          echo '<div class="alert alert-success">El proveedor se registró en la tabla</div>';
      }
  }

  if (isset($_POST['btn_actualizar'])) {
      $id_prov = $_POST['id_proveedor'];
      $nomb_prov = $_POST['nombre_proveedor'];
      if ($id_prov == "" || $nomb_prov == "") {
          echo '<div class="alert alert-warning">Los campos: ID proveedor y Nombre proveedor son obligatorios</div>';
      } else {
          $ver = $myPDO->query("SELECT * FROM proveedor WHERE id_proveedor = '$id_prov'");
          if ($row = $ver->fetch()) {
              $sql_update = "UPDATE proveedor SET nombre_proveedor = '$nomb_prov' WHERE id_proveedor = '$id_prov'";
              $myPDO->query($sql_update);
              echo '<div class="alert alert-success">Actualización realizada</div>';
          } else {
              echo '<div class="alert alert-warning">El ID del proveedor no existe en la tabla</div>';
          }
      }
  }

  if (isset($_POST['btn_eliminar'])) {
      $id_prov = $_POST['id_proveedor'];
      if ($id_prov == "") {
          echo '<div class="alert alert-warning">Se requiere el número del ID del proveedor</div>';
      } else {
          $ver = $myPDO->query("SELECT * FROM proveedor WHERE id_proveedor = '$id_prov'");
          if ($row = $ver->fetch()) {
              $sql = "DELETE FROM proveedor WHERE id_proveedor = '$id_prov'";
              $myPDO->query($sql);
              echo '<div class="alert alert-success">El registro se eliminó</div>';
          } else {
              echo '<div class="alert alert-warning">El ID del proveedor no existe en la tabla</div>';
          }
      }
  }
  ?>

</div>

</body>
</html>
