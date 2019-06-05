<?php
if ($_POST) {
    if (isset($_POST["cedula"])) {
        include ('conexion.php');
        $cedula = $_POST["cedula"];
        $sql = "UPDATE estudiante SET estado=0 WHERE cedula='$cedula'";
        if (mysqli_query($con, $sql)) {
            $resultado = "éxito";
        } else {
            $resultado = "error";
        }
        header('Location: ../index.php?registro=' . $resultado);
        exit;
    }
}else{
    header('Location: ../');
}
?>