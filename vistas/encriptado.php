<?php
//controlador por parte del servidor
require_once("../config/conexion.php");

$texto="Tengo hambre";
echo "Texto original:".$texto."<br>";
$enc= encryption($texto);
echo "Texto encriptado:".$enc."<br>";
$des= decryption($enc);
echo "Texto desencriptado:".$des."<br>";
?>