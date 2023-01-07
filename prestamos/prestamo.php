<?php
include_once("../conexion.php");
session_start();
$ejem=$_POST['codigo_prueba'];


$query="select titulo from ejemplar e,libros l where l.isbn=e.isbn and cod_ejem='$ejem'";
$consulta=pg_query($query);
$object=pg_fetch_object($consulta);
$cant=pg_num_rows($consulta);
$user=$_SESSION['codigo_user'];
if($cant>0){
   $query="insert into prestamo values('$ejem','$user',current_date,current_date+10)";
   $consul=pg_query($query);
   $object=pg_fetch_object($consul);
   $query="update ejemplar set cant_dis=cant_dis-1 where cod_ejem='$ejem'";
   $consul=pg_query($query);
   header("location:prestamoU.php");
}
else{
    echo "ERROR";
}
  
?>