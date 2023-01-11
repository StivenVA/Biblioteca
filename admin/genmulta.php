<html>
    <head>
    <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.min.css">
    <script src="../fontawesome/js/all.min.js"></script>
    </head>
    <body>
        <form action="Multas.php" >
            <button type="Submit" class="btn btn-outline-info"><i class="fa-solid fa-arrow-left-long"></i> Atras</button>
        </form>
    </body>
</html>

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
$fecha = date('Y-m-d');
$fecha_dev = "select fecha_dev from prestamo where $loan";
$fecha_dev = pg_query($fecha_dev);
$dev = pg_fetch_object($fecha_dev);

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
        default:
        if($fecha>$dev->fecha_dev){
            $query="update prestamo set estado='$estado' where $loan";
            $query=pg_query($query);
           $query="insert into multa values('$ejem->cod_usuario','$ejem->cod_ejem',15000,'Retrasado','Pendiente',current_date)";
           $consul=pg_query($query);
            header("location:Mulview.php");
        }
        else{
            echo "Es necesario que la fecha actual sea mayor a la de devolucion para esta opcion";
        }
        # code...
            break;
    }
}
else{
    if($estado=='Regresado'&&$state->estado!="Dañado"){
        $query="update prestamo set estado='$estado' where $loan";
        $query=pg_query($query);
        $query="update ejemplar set cant_dis=cant_dis+1 where cod_ejem='$ejem->cod_ejem'";
        $consul=pg_query($query);
    }
    else if($estado!='Dañado'){
        $query="update prestamo set estado='$estado' where $loan";
        $query=pg_query($query);
        $query="update ejemplar set cant_dis=cant_dis-1 where cod_ejem='$ejem->cod_ejem'";
        $consul=pg_query($query);
    }
    header("location:Multas.php");
}
?>

