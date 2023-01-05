<?php
    include_once("../conexion.php");
    session_start();
    $cat= $_POST['cat'];
    $search=$_POST['search'];
    switch ($cat) {
        case 0:
            $query="select DISTINCT titulo,fecha_pub,nombre_autor,nomb_edi,cant_dis,categoria from escribe es,autores a,editorial e,libros l, ejemplar ej where es.cod_aut=a.cod_aut and es.isbn=l.isbn and l.cod_edi=e.cod_edi and ej.isbn=l.isbn and (titulo='$search' or nomb_edi='$search' or nombre_autor='$search' or categoria='$search')";
            break;
        case 1:
            $query="select DISTINCT titulo,fecha_pub,nombre_autor,nomb_edi,cant_dis,categoria from escribe es,autores a,editorial e,libros l, ejemplar ej where es.cod_aut=a.cod_aut and es.isbn=l.isbn and l.cod_edi=e.cod_edi and ej.isbn=l.isbn and titulo='$search";
            break;
        case 2:
            $query="select DISTINCT titulo,fecha_pub,nombre_autor,nomb_edi,cant_dis,categoria from escribe es,autores a,editorial e,libros l, ejemplar ej where es.cod_aut=a.cod_aut and es.isbn=l.isbn and l.cod_edi=e.cod_edi and ej.isbn=l.isbn and nombre_autor='$search'";
            break;
        case 3:
            $query="select DISTINCT titulo,fecha_pub,nombre_autor,nomb_edi,cant_dis,categoria from escribe es,autores a,editorial e,libros l, ejemplar ej where es.cod_aut=a.cod_aut and es.isbn=l.isbn and l.cod_edi=e.cod_edi and ej.isbn=l.isbn and categoria='$query'"
            break;
        case 4:
            $query ="select DISTINCT titulo,fecha_pub,nombre_autor,nomb_edi,cant_dis,categoria from escribe es,autores a,editorial e,libros l, ejemplar ej where es.cod_aut=a.cod_aut and es.isbn=l.isbn and l.cod_edi=e.cod_edi and ej.isbn=l.isbn and nomb_edi='$search'"
            break;
        default:
            $query="Error";
            break;
    }

    
    $consulta=pg_query($query);
    $row=pg_fetch_object($consulta);
    $cantidad=pg_num_rows($consulta);
    if($cantidad>0){
        $_SESSION['categoria']=$cat;
        $_SESSION['busqueda']=$row->titulo;
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