<?php
if ($_POST) {
    include('conexion.php');
    $nombre = $_POST["txt1"];
    $apellido = $_POST["txt2"];
    $cedula = $_POST["txt3"];
    $email = $_POST["txt4"];
    $genero = $_POST["txt5"];
    $sqlStatement = $con->prepare("INSERT INTO estudiante (nombre, apellido, cedula, email, genero) VALUES (?, ?, ?, ?, ?)");
    $sqlStatement->bind_param("ssiss", $nombre, $apellido, $cedula, $email, $genero);
    if (!$sqlStatement->execute()) {
        $resultado = "éxito";
    } else {
        $resultado = "Falló la ejecución: (" . $sqlStatement->errno . ") " . $sqlStatement->error;
    }
    $sqlStatement->close();
    $con->close();
    header('Location: ../index.php?registro='.$resultado);
} else {
    header("Location: ../");
}
