<?php
    include_once("../conexion.php");
    session_start();
    $user= $_POST['user'];
    $pass= $_POST['contraseña'];
    $query="select nomb_user from usuarios where nomb_user='$user' and cod_usuario='$pass'";
    $consulta=pg_query($query);
    $row=pg_fetch_object($consulta);
    $cantidad=pg_num_rows($consulta);
    if($cantidad>0){
        $_SESSION['codigo_user']=$pass;
        $_SESSION['nombre_user']=$row->nomb_user;
        if($row->nomb_user=='ADMIN'){
            header("location:../admin/admin.php");
        }
        else{
           header("location:../biblioteca.php");
        }   
    }else{
        header("location:fallo.php");
    }
 ?>