<?php
if ($_POST) {
    include('conexion.php');
    $nombre = $_POST["txt1"];
    $apellido = $_POST["txt2"];
    $cedula = $_POST["txt3"];
    $email = $_POST["txt4"];
    $genero = $_POST["txt5"];

    $sql="SELECT * FROM estudiante where email='".$email."'";
    $result=mysqli_query($con, $sql);
    $fila= mysqli_num_rows($result);

    if ($fila==0){
        $sqlStatement = $con->prepare("INSERT INTO estudiante (nombre, apellido, cedula, email, genero) VALUES (?, ?, ?, ?, ?)");
        $sqlStatement->bind_param("ssiss", $nombre, $apellido, $cedula, $email, $genero);
         if (!$sqlStatement->execute()) {
                $resultado = "error";
        } else {
                $resultado = "éxito";
        }
        $sqlStatement->close();
    }
    else{
        $resultado = "error";
    }

   
    $con->close();
    header('Location: ../index.php?registro='.$resultado);
} else {
    header("Location: ../");
}
