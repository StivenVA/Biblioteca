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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <title>biblioteca</title>
</head>

<body>

    <div class="container">
        <form class="navbar" action="buscar/buscar.php" method="POST" class="form-box">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" name="search">
                    <div class="input-group-select">
                            <select name="cat">
                                <option value=0> Todos los campos</option>
                                <option value=1> Titulo</option>
                                <option value=2> Autor</option>
                                <option value=3> Categoria</option>
                                <option value=4> Editorial</option>
                            </select>
                    </div>
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">submit</button>
                        </div>
                        
            </div>
        </form>
    </div>

    <br>
  <div id="table-container">
    <table id="example" class="table table-striped" style="width:100%">
      <thead>
        <tr>
          <th>#</th>
          <th>Codigo</th>
          <th>Nombre</th>
          <th>Acciones</th>
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
          <td>
            <button type="button" id="botontabla" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalconfirmacion" data-nombre="<?php echo $mostrar->nomb_est ?>" data-codigo="<?php echo $mostrar->cod_est ?>">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
              </svg>
            </button>
          </td>
        </tr>
      <?php } ?>
      </tbody>
      <tfoot>
        <tr>
          <th>#</th>
          <th>Codigo</th>
          <th>Nombre</th>
          <th>Acciones</th>
        </tr>
      </tfoot>
    </table>
  </div>
  
  <script src="javascript/script.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script> 
</body>
</html>