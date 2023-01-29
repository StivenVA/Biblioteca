<?php
include_once("../conexion.php");

$autor = $_POST['autor'];
$titulo = $_POST['titulo'];
$isbn = $_POST['isbn'];
$editorial = $_POST['editorial'];
$categoria = $_POST['categoria'];
$fecha = $_POST['fecha_pub'];
$cantidad = $_POST['cantidad'];

echo $

$query = pg_query("select from autores where nombre_autor='$autor'");
if(pg_num_rows($query)==0){
    $count = pg_query("select count(*) from autores");
    $count = pg_fetch_object($count);
    $count = $count->count+1;
    $cod_aut = "a$count";
    pg_query("insert into autores values ('$cod_aut','$autor')");
    pg_query("insert into libros values('$isbn')")

}

?>