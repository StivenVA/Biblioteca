<?php
include_once("../conexion.php");

$delete = $_POST['codigo_prueba'];
$query = "delete from libros where isbn='$delete'";
$query = pg_query($query);
echo $_POST['codigo_prueba'];

header("location:coleccion.php");
?>