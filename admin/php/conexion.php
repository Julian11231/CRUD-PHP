<?php
header("Content-Type: text/html; charset=utf-8");
$hostname = "localhost";
$user = "root";
$pass = "";

#DB UNIVERSIDAD
#TABLA ESTUDIANTE
$con = new mysqli($hostname, $user, $pass);
if (!$con) {
	die('ERROR DE CONEXION CON MYSQL: ' . mysql_error());
}
$database = mysqli_select_db($con, "universidad");
if (!$database) {
	die('ERROR CONEXION CON BD: ' . mysql_error());
}
/* cambiar el conjunto de caracteres a utf8 */
if (!$con->set_charset("utf8")) {
    die("Error cargando el conjunto de caracteres utf8: %s\n". $con->error);
} 
?>
