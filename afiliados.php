<?php

$campo = !empty($_REQUEST["campo"]) ? trim($_REQUEST["campo"]) : '';

$is_celular = !!preg_match("/9\d{8}/", $campo);
$is_email = !!preg_match("/[^@]+@.+/", $campo);

if(!($is_celular || $is_email)) die("Escribe un celular / correo válido");

$archivo = "./usuarios/" . date("Y-m-d");
$time = date("H:i:s");

$data = @file_get_contents($archivo);
if(empty($data)) $data = "";
$data .= "\n$time $campo";

file_put_contents($archivo, $data);

$msg = $is_celular ? "número de celular" : "correo electrónico";

die("Gracias por subscribirte, pronto recibirás novedades de Ziti a tu $msg");


?>