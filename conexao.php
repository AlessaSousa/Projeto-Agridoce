<?php

$servidor = "localhost";
$banco = "agridoce";
$usuariobd = "root";
$senhabd = "";

$conect = new mysqli($servidor,$banco, $usuariobd, $senhabd);
if ($conect->connect_errno) {
	die("Falha ao conectar: ".$conect->connect_error);
}
?> 