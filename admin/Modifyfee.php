<?php
include_once("../conexion.php");

$estado = $_POST['estado'];
$edit = $_POST['Modify'];

if($estado=="Dañado"){
    $query = "update multa set motivo='$estado',deuda=20000 where $edit";
    $query = pg_query($query);
}
else{
    $query = "update multa set motivo='$estado',deuda=15000 where $edit";
    $query = pg_query($query);
}


header("location:Mulview.php");
?>