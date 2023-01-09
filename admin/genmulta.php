<?php
include_once("../conexion.php");

$loan = $_POST['verificar'];
$estado=$_POST['estado'];
$query="update prestamo set estado='$estado' where "+$loan;
$query=pg_query($query);

$consulta = "select cod_ejem from prestamo where "+$loan;
$consulta = pg_query($consulta);
$ejem = pg_fetch_object($consulta);

switch ($estado) {
    case 'Regresado':
        $query="update ejemplar set cant_dis=cant_dis+1 where cod_ejem='$ejem->cod_ejem'";
        $consul=pg_query($query);
        header("location:Multas.php");
        break;
    case 'Dañado':

        header("location:Multas.php");
        break;
     case 'Retrasado':
        header("location:Multas.php");
        break;
    default:
        # code...
        break;
}

?>