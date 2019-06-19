<?php
include 'conexion.php';

if (isset($_GET["registro"])) {
    $registro = $_GET["registro"];
    if ($_GET["registro"] === "éxito") {
        echo "<div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                <strong>" . $registro . "</strong> EJECUCION EXITOSA.
            </div>";
    } elseif ($_GET["registro"] === "error") {
        echo "<div class='alert alert-warning alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                <strong>" . $registro . "</strong> ERROR EN EL MANEJO DE LOS DATOS.
            </div>";
    }
}
$sql = "SELECT cedula, nombre, apellido, email, genero FROM estudiante WHERE estado != 0 ORDER BY nombre";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    ?>
    <table class='table table-light table-hover'>
        <thead class='thead-dark'>
            <tr>
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Género</th>
                <th colspan="2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row["cedula"]; ?></td>
                    <td><?php echo $row["nombre"]; ?></td>
                    <td><?php echo $row["apellido"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["genero"]; ?></td>
                    <td>
                        <form method="post">
                            <button type="submit" class="btn btn-link btn-sm" formaction="php/edit.php" value="<?php echo $row["cedula"]; ?>" name="cedula">
                                <i class='fas fa-edit' style='font-size:24px;color:blue'></i>
                            </button>
                            <button type="submit" class="btn btn-link btn-sm" formaction="php/delete.php" value="<?php echo $row["cedula"]; ?>" name="cedula">
                                <i class='fas fa-trash' style='font-size:24px;color:red'></i>
                            </button>
                        </form>
                    </td>
                <tr>
                <?php
            }
            echo "</tbody></table>";
        } else {
            echo "0 results";
        }
        ?>