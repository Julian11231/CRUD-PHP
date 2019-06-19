<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Formulario</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" href="images/icono.ico">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- Custom Javascript -->
  <script src="js/script.js"></script>
  <script src="js/jquery.js"></script>
  <!-- Custom style -->
  <link href="css/floating-labels.css" rel="stylesheet">
  <!-- Icons -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
</head>

<body>
  <div class="container-fluid">
    <br>
    <h1 class="text-center">Administración</h1>
    <br>
    <div class="row">
      <div class="col-md-8">
        <?php include 'php/tabla.php'; ?>
      </div>
      <div class="col-md-4">
        <form class="form-signin" action="php/add.php" method="post">
          <div class="card">
            <div class="card-header bg-success text-white">
              <h4 class="text-center">Agregar usuario</h4>
            </div>
            <div class="card-body">
              <div class="form-label-group">
                <input type="text" id="nombre" name="txt1" onkeypress='return event.charCode >= 65 && event.charCode <= 90 ||event.charCode >= 97 && event.charCode <= 122 ' placeholder="Nombre" maxlength="25" pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+){2,25}" required autofocus>
                <label for="nombre">Nombre</label>
              </div>
              <div class="form-label-group">
                <input type="text" id="apellido" name="txt2" onkeypress='return event.charCode >= 65 && event.charCode <= 90 ||event.charCode >= 97 && event.charCode <= 122 ' placeholder="Apellido" maxlength="50" pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+){2,50}" required>
                <label for="apellido">Apellido</label>
              </div>
              <div class="form-label-group">
                <input type="text" id="cedula" name="txt3" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Cédula" maxlength="10" pattern="[0-9]{8-10}" required>
                <label for="cedula">Cédula</label>
              </div>
              <div class="form-label-group">
                <input type="email" id="email" name="txt4" class="sinborde" placeholder="Correo" maxlength="50" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,5}$" required>
                <label for="email">Correo</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="radioMujer" class="custom-control-input" name="txt5" value="Mujer" checked>
                <label class="custom-control-label" for="radioMujer">Mujer</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="radioHombre" class="custom-control-input" name="txt5" value="Hombre">
                <label class="custom-control-label" for="radioHombre">Hombre</label>
              </div>
              <br><br>
              <div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Guardar</button>
              </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>