<?php
include("conexion.php");
session_start();
if (!isset($_SESSION['idusuario'])) {
    header("Location: index.php");
}

$id_user = $_SESSION['idusuario'];
$sql = "SELECT id_usuario, nombre FROM usuarios WHERE id_usuario='$id_user' ";
$empresas = " SELECT id_empresa, empresas.nombre, contacto, ciudad, cp FROM empresas LEFT JOIN ciudades on empresas.ciudad = ciudades.nombre WHERE asignado='$id_user'";
$resultado2 = $conexion->query($empresas);


$resultado = $conexion->query($sql);
$row = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>inicio</title>
</head>

<body>
    <span>
        <h1 class="text-center">Bienvenido
            <?php echo utf8_decode($row['nombre']); ?>
        </h1>
    </span>

    <table class="table table-striped">
        <tr>
            <th>id_empesa</th>
            <th>empresa</th>
            <th>contacto</th>
            <th>ciudad</th>
            <th>cp</th>
        </tr>

        <?php

        while ($listae = $resultado2->fetch_assoc()) {

            echo '<tr>
            <td>' . $listae['id_empresa'] .
                '</td>
            <td>' . $listae['nombre'] .
                '</td>
            <td>' . $listae['contacto'] .
                '</td>
                <td>' . $listae['ciudad'] .
                '</td>
                <td>' . $listae['cp'] .
                '</td>

            
            </tr>';
        }

        ?>


    </table>

    <a href="logout.php">
        <button class="btn btn-danger btn-sm" name="salir">logout</button>
    </a>


</body>

</html>