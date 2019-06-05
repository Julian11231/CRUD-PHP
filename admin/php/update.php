<?php
if ($_POST) {
	include("conexion.php");
	$cedula = $_POST["cedula"];
	$nombre = $_POST["txt1"];
	$apellido = $_POST["txt2"];
	$nuevaCedula = $_POST["txt3"];
	$email = $_POST["txt4"];
	$genero = $_POST["txt5"];
	$sqlStatement = $con->prepare("UPDATE estudiante SET cedula=?, nombre=?, apellido=?, email=?, genero=? WHERE cedula= ?");
    $sqlStatement->bind_param("issssi", $nuevaCedula, $nombre, $apellido, $email, $genero, $cedula);
    if (!$sqlStatement->execute()) {
        $resultado = "éxito";
    } else {
        $resultado = "Falló la ejecución: (" . $sqlStatement->errno . ") " . $sqlStatement->error;
    }
    $sqlStatement->close();
	$con->close();
	echo $resultado;
	//header('Location: ../index.php?registro='.$resultado);
} else {
	header("Location: ../");
}
