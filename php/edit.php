<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Formulario</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../images/icono.ico">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="../js/script.js"></script>
  <link href="../css/floating-labels.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
</head>

<body>
  <div class="container">
    <?php
    if (isset($_POST["cedula"])) {
      $cedula = $_POST["cedula"];
      include 'conexion.php';
      $sql = "SELECT nombre, apellido, email, genero FROM estudiante WHERE cedula ='$cedula'";
      $result = mysqli_query($con, $sql);
      if ($result) {
        $resultado = "éxito";
        $row = $result->fetch_assoc();
        ?>
        <form class="form-signin" action="update.php" method="post">
          <div class="card">
            <div class="card-header bg-success text-white">
              <h4 class="text-center">Editar usuario</h4>
            </div>
            <div class="card-body">
              <div class="form-label-group">
                <input type="text" name="txt1"onkeypress='return event.charCode >= 65 && event.charCode <= 90 ||event.charCode >= 97 && event.charCode <= 122 ' placeholder="Nombre" value="<?php echo $row['nombre']; ?>" maxlength="25" pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+){2,25}" required autofocus>
                <label for="Nombre">Nombre</label>
              </div>
              <div class="form-label-group">
                <input type="text" name="txt2" onkeypress='return event.charCode >= 65 && event.charCode <= 90 ||event.charCode >= 97 && event.charCode <= 122 ' placeholder="Apellido" value="<?php echo $row['apellido']; ?>" maxlength="50" pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+){2,25}" required>
                <label for="primerApellido">Apellido</label>
              </div>
              <div class="form-label-group">
                <input type="text" name="txt3" class="validanumericos sinborde" placeholder="Cédula" maxlength="10" value="<?php echo $cedula;?>"pattern="[0-9]{8-10}" required>
                <label for="cedula">Cédula</label>
              </div>
              <div class="form-label-group">
                <input type="email" name="txt4" class="sinborde" placeholder="Correo" value="<?php echo $row['email']; ?>" maxlength="50" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,5}$" required>
                <label for="Correo">Correo</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="radioMujer" class="custom-control-input" name="txt5" value="Mujer" <?php
                                                                                                            if (strcmp($row['genero'], "Mujer") == 0) {
                                                                                                              echo 'checked';
                                                                                                            }
                                                                                                            ?>>
                <label class="custom-control-label" for="radioMujer">Mujer</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="radioHombre" class="custom-control-input" name="txt5" value="Hombre" <?php
                                                                                                              if (strcmp($row['genero'], "Hombre") == 0) {
                                                                                                                echo 'checked';
                                                                                                              }
                                                                                                              ?>>
                <label class="custom-control-label" for="radioHombre">Hombre</label>
              </div>
              <br><br>
              <button class="btn btn-lg btn-primary btn-block" type="submit" name="cedula" value="<?php echo $cedula ?>">Guardar</button>
            </div>
          </div>
        </form>
      <?php
    } else {
      $resultado = "error";
      header("Status: 301 Moved Permanently");
      header('Location: index.php?registro=' . $resultado);
      exit;
    }
  } else {
    header('Location: ../index.php');
  }
  ?>
  </div>
</body>

</html>