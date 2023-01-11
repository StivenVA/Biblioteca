<?php
include_once("../conexion.php");

$estado = $_POST['estado'];
$edit = $_POST['Modify'];
$query = "select cod_ejem,cod_usuario from multa where $edit";
$query = pg_query($query);
$object = pg_fetch_object($query);

if($estado=="Daño"){
    $query = "update multa set motivo='$estado',deuda=20000 where $edit";
    $query = pg_query($query);
    $query = "update prestamo set estado='Dañado' where cod_ejem='$object->cod_ejem' and cod_usuario='$object->cod_usuario' and fecha_pres=(select max(fecha_pres) from prestamo)";
    $query = pg_query($query);

}
else{
    $query = "update multa set motivo='$estado',deuda=15000 where $edit";
    $query = pg_query($query);
    $query = "update prestamo set estado='Retrasado' where cod_ejem='$object->cod_ejem' and cod_usuario='$object->cod_usuario' and fecha_pres=(select max(fecha_pres) from prestamo)";
    $query = pg_query($query);

}

header("location:Mulview.php");
?>