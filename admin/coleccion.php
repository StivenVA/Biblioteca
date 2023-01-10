<?php
include_once("../conexion.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

    <script src="../fontawesome/js/all.min.js"></script>
    <title>Colección</title>
</head>

<?php   
          $user=$_SESSION['codigo_user'];

          $nom="select nomb_user from usuarios where cod_usuario='$user'";
          $nom=pg_query($nom);
          $nomb=pg_fetch_object($nom);
        ?>

<div class="container">
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">

    <form action="admin.php">
            <button type="submit" class="btn btn-dark" >
              <i class="fa-solid fa-user"></i> <?php echo $nomb->nomb_user;?>
            </button>
      </form>

      <form action="Multas.php">
        <button type="submit" class="btn btn-dark">
        <i class="fa-solid fa-hands"></i> prestamos
        </button>
      </form>

        <div class="collapse navbar-collapse" id="navbarNav">
          <form action="coleccion.php">
           <button type="submit" class="btn btn-dark">
            <i class="fa-solid fa-bookmark"></i> Colección
           </button>
           </form>
        </div>
</div>
  </nav>
</div>
    <br>


<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal">¿Esta seguro?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="prestamos/prestamo.php" method="POST">
        ¿Desea eliminar PERMANENTEMENTE <input id="recibirnombre" type="text" name ="nombre_prueba" disabled class="text-center">?
      </div>
        <div class="modal-footer">        
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button name="codigo_prueba" type="submit" class="btn btn-success" id="recibircodigo">  
              <i class="fa-solid fa-check"></i>
              Aceptar
          </button> 
        </div>
      </div>
      </form>
  </div>
</div>

    <br>
  <div id="table-container" class="container">
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
          <th>Eliminar</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $sql="select l.isbn,titulo,fecha_pub,nombre_autor,nomb_edi,cant_dis,categoria from escribe es,autores a,editorial e,libros l, ejemplar ej where es.cod_aut=a.cod_aut and es.isbn=l.isbn and l.cod_edi=e.cod_edi and ej.isbn=l.isbn order by titulo";
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
            <button type="button" id="botontabla" class="btn btn-outline-danger" data-bs-target="#modal"  data-bs-toggle="modal" data-nombre="<?php echo $mostrar->titulo ?>" data-codigo="<?php echo $mostrar->isbn ?>">
            <i class="fa-solid fa-delete-left"></i>
            </button>
          </td>
        </tr>
      <?php } ?>
      </tbody>
      <tfoot>
        <tr>
        <th>#</th>
        <th>Titulo</th>
          <th>Autor</th>
          <th>Publicacion</th>
          <th>Editorial</th>
          <th>Categoria</th>
          <th>Disponibles</th>
          <th>Eliminar</th>
        </tr>
      </tfoot>
    </table>
  </div>
  
  <script src="../javascript/script.js"></script>   
    <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="../javascript/table.js"></script>
<script src="../javascript/pasardatos.js"></script>
</body>
</html>