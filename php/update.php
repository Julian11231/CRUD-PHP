<?php
if ($_POST) {
	include("conexion.php");
	$cedula = $_POST["cedula"];
	$nombre = $_POST["txt1"];
	$apellido = $_POST["txt2"];
	$nuevaCedula = $_POST["txt3"];
	$email = $_POST["txt4"];
	$genero = $_POST["txt5"];

	$sql = "SELECT * FROM estudiante WHERE nombre LIKE '$nombre'and apellido like '$apellido' and cedula like '$nuevaCedula' and email LIKE '$email' and genero LIKE '$genero'";
	$result=mysqli_query($con, $sql);
    $fila= mysqli_num_rows($result);

    if ($fila==0){
	$query="UPDATE estudiante SET nombre='$nombre', apellido='$apellido',cedula='$nuevaCedula', email='$email', genero='$genero' WHERE cedula='$cedula'";
 	$resultad=$con->query($query);
 	if($resultad){
 		header("Location: ../");
 	}
 	}
 	else{
 		echo '<script language="javascript">
		alert("Cambie algun valor");
		</script>';
  	}
 	
  
}
  


?>