<?php
include("config.php");

$conexion = new mysqli($servidor, $usuario, $contrasenha, $BD);



if (mysqli_connect_errno()) {
    echo "error el laconexion", mysqli_connect_error();
    exit();
} //else {
   // echo 'Conectado   al servidor <br />';
//}
