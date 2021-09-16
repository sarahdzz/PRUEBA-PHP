<?php
include("conexion.php");

session_start();
if (isset($_SESSION['idusuario'])) {
    header("Location: admin.php");
}


// if (!empty($_POST)) {
if (isset($_POST["entrar"])) {
    $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
    $clave_encrip = mysqli_real_escape_string($conexion, $_POST['clave']);
    //cifrado de contraseña md5
    //$clave_encrip = md5($clave, true);
    $historial = "INSERT INTO Historial (usuario, clave, entro, fecha) VALUES ($usuario, $clave_encrip, '1', '') ";
    $resultado4 = $conexion->query($historial);

    $sql = "SELECT id_usuario FROM usuarios
       WHERE usuario = '$usuario' AND clave = '$clave_encrip' ";
    $resultado = $conexion->query($sql);
    $rows = $resultado->num_rows;
    if ($rows > 0) {
        $row = $resultado->fetch_assoc();
        $_SESSION['idusuario'] = $row["id_usuario"];
        header("Location: admin.php");
    } else {
        echo "<script>
        alert('usuario o contraseña incorrecta');
        window.location = 'index.php';
        </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Login</title>
</head>

<body>
    <div class="text-center ">
        <h1 class="text-center ">Login</h1>
        <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
            <input class="text-center col-md-3 login-from-row" type="text" name="usuario" placeholder="Usuario: " required> <br><br>
            <input class="text-center col-md-3 login-from-row" type="password" name="clave" placeholder="Contraseña:" required> <br> <br>

            <button class="btn btn-primary btn-sm text-center col-md-3 login-from-row " type=" submit" name="entrar">entrar</button>


        </form>
    </div>

</body>

</html>