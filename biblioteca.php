<?php
include_once("conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="estilos/insertarE.css">
    <link rel="stylesheet" href="estilos/loader.css">
    <script src="https://kit.fontawesome.com/88f3573231.js"></script>
    <title>biblioteca</title>
</head>
    <br>
  <div id="table-container">
    <table id="example" class="table table-striped" style="width:100%">
      <thead>
        <tr>
          <th>#</th>
          <th>Titulo</th>
          <th>Autor</th>
          <th>Publicacion</th>
          <th>Editorial</th>
          <th>Categoria</th>
          <th>Disponibles</th>
          <th>Solicitar</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $sql="select titulo,fecha_pub,nombre_autor,nomb_edi,cant_dis,categoria from escribe es,autores a,editorial e,libros l, ejemplar ej where es.cod_aut=a.cod_aut and es.isbn=l.isbn and l.cod_edi=e.cod_edi and ej.isbn=l.isbn";
          $result=pg_query($sql);
          $contar=1;
          while($mostrar=pg_fetch_object($result)){
        ?>
        <tr>
          <th scope="row"><?php echo $contar++; ?></th>
          <td><?php echo $mostrar->titulo; ?></td>
          <td><?php echo $mostrar->nombre_autor; ?></td>
          <td><?php echo $mostrar->fecha_pub; ?></td>
          <td><?php echo $mostrar->nomb_edi; ?></td>
          <td><?php echo $mostrar->categoria; ?></td>
          <td><?php echo $mostrar->cant_dis; ?></td>
          <td>
            <button type="button" id="botontabla" data-nombre="<?php echo $mostrar->titulo ?>" data-codigo="<?php echo $mostrar->nombre_autor ?>">
            <i class="fa-solid fa-books"></i>
            </button>
          </td>
        </tr>
      <?php } ?>
      </tbody>
      <tfoot>
        <tr>
        <th>Titulo</th>
          <th>Autor</th>
          <th>Publicacion</th>
          <th>Editorial</th>
          <th>Categoria</th>
          <th>Disponibles</th>
          <th>Solicitar</th>
        </tr>
      </tfoot>
    </table>
  </div>
  
  <script src="javascript/script.js"></script>   
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="javascript/app.js"></script>
<script src="javascript/pasardatos.js"></script>
</body>
</html>