<?php
include_once("../conexion.php");

$loan = $_POST['verificar'];
$estado=$_POST['estado'];


$consulta = "select cod_ejem,cod_usuario from prestamo where $loan";
$consulta = pg_query($consulta);
$ejem = pg_fetch_object($consulta);

$request = "select estado from prestamo where $loan";
$request = pg_query($request);
$state = pg_fetch_object($request);

if($state->estado=="Prestado"){
    switch ($estado) {
        case 'Regresado':
            $query="update prestamo set estado='$estado' where $loan";
            $query=pg_query($query);
           $query="update ejemplar set cant_dis=cant_dis+1 where cod_ejem='$ejem->cod_ejem'";
           $consul=pg_query($query);

           header("location:Multas.php");
           break;
        case 'Dañado':
            $query="update prestamo set estado='$estado' where $loan";
            $query=pg_query($query);
           $query="insert into multa values('$ejem->cod_usuario','$ejem->cod_ejem',20000,'Daño','Pendiente',current_date)";
           $consul=pg_query($query);
            header("location:Mulview.php");
           break;
        case 'Retrasado':
            $query="update prestamo set estado='$estado' where $loan";
            $query=pg_query($query);
           $query="insert into multa values('$ejem->cod_usuario','$ejem->cod_ejem',20000,'Retrasado','Pendiente',current_date)";
           $consul=pg_query($query);
            header("location:Mulview.php");
           break;
        default:
        # code...
            break;
    }
}
else{
    header("location:Multas.php");
}
?>