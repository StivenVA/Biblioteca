<?php
include_once("../conexion.php");

$delete = $_POST['verificar'];
$query = "delete from multa where $delete";
$query = pg_query($query);

header("location:Mulview.php");
?>