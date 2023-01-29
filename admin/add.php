<?php
include_once("../conexion.php");

$autor = $_POST['autor'];
$titulo = $_POST['titulo'];
$isbn = $_POST['isbn'];
$editorial = $_POST['editorial'];
$categoria = $_POST['categoria'];
$fecha = $_POST['fecha_pub'];
$cantidad = $_POST['cantidad'];

$query = pg_query("select from autores where nombre_autor='$autor'");
if(pg_num_rows($query)==0){
    $count = pg_query("select count(*) from autores");
    $count = pg_fetch_object($count);
    $count = $count->count+1;
    $cod_aut = "a$count";
    pg_query("insert into autores values ('$cod_aut','$autor')");

    if(pg_num_rows(pg_query("select from editorial where nomb_edi='$editorial'"))==0){
        $count = pg_query("select count(*) from editorial");
        $count = pg_fetch_object($count);
        $count = $count->count+1;
        $cod = "e$count";
        pg_query("insert into editorial values('$cod','$editorial')");
    }
    else{
        $cod = pg_fetch_object(pg_query("select cod_edi from editorial where nomb_edi='$editorial'"))->cod_edi;
    }
   
    pg_query("insert into libros values('$isbn','$fecha','$titulo','$cod','$categoria')");
    pg_query("insert into escribe values('$cod_aut','$isbn')");
    $cod = pg_fetch_object(pg_query("select count(*) from ejemplar"))->count+1;
    pg_query("insert into ejemplar values('$cod','Por asignar','$cantidad','$isbn')");
    header('location:coleccion.php');

}
else{
    $count = pg_query("select cod_aut from autores where nombre_autor='$autor'");
    $cod_aut = pg_fetch_object($count)->cod_aut;

    if(pg_num_rows(pg_query("select from editorial where nomb_edi='$editorial'"))==0){
        $count = pg_query("select count(*) from editorial");
        $count = pg_fetch_object($count);
        $count = $count->count+1;
        $cod = "e$count";
        pg_query("insert into editorial values('$cod','$editorial')");
    }
    else{
        $cod = pg_fetch_object(pg_query("select cod_edi from editorial where nomb_edi='$editorial'"))->cod_edi;
    }
   
    pg_query("insert into libros values('$isbn','$fecha','$titulo','$cod','$categoria')");
    pg_query("insert into escribe values('$cod_aut','$isbn')");
    $cod = pg_fetch_object(pg_query("select count(*) from ejemplar"))->count+1;
    pg_query("insert into ejemplar values('$cod','Por asignar','$cantidad','$isbn')");
    header('location:coleccion.php');
}

?>