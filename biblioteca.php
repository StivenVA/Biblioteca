<?php
include_once("conexion.php");
session_start();
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
    <link rel="stylesheet" href="estilos/prestamos.css">
    <link rel="stylesheet" href="estilos/tabla.css">
    <link rel="stylesheet" href="estilos/coleccion.css">

    <script src="fontawesome/js/all.min.js"></script>
    <title>biblioteca</title>
</head>

<body>

   <!--Scripts de ionicons-->
   <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<?php   
          $user=$_SESSION['codigo_user'];
          $nom="select nomb_user from usuarios where cod_usuario='$user'";
          $nom=pg_query($nom);
          $nomb=pg_fetch_object($nom);
          $sala = "select numero,capacidad from salas";
          $sala = pg_query($sala);
        ?>

<img src="imagenes/logounillanos.png" class="logo"><h1 class="lines-effect">Colección de libros</h1>
<div class="container">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="nav">
                <div class="link">
                  <a href="prestamos/prestamoU.php">                           
                    <span><?php echo $nomb->nomb_user;?></span>
                    <ion-icon name="person-circle-outline"></ion-icon> 
                  </a>
                </div>

                <div class="link">
                  <a href="prestamos/multas.php">
                    <span>Multas</span>
                    <ion-icon name="cash-outline"></ion-icon>
                  </a>
                </div> 

                <div class="link">
                    <a href="biblioteca.php">                    
                        <span>colección</span>
                        <ion-icon name="bookmarks-outline"></ion-icon>                     
                    </a>
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
        <p>¿Desea pedir prestado <input id="recibirnombre" type="text" name ="nombre_prueba" disabled class="text-center">? Recuerde que el libro deberá ser devuelto en 10 días hábiles en caso de préstamo externo.</p>
        <br>
        <p>Sala: 
          <select name="sala" required class="form-select form-select-sm" aria-label=".form-select-sm example">
          <option value="" selected disabled >Seleccione una opcion</option>
            <option value="No">Externo</option>
          <?php
          while($object = pg_fetch_object($sala)){
          ?><option value="<?php echo $object->numero ?>"><?php echo $object->numero ?></option>  
          <?php } ?>
          ?>
          </select>
        </p>
      </div>
        <div class="modal-footer">        
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><ion-icon name="close-circle-outline"></ion-icon>Cancelar</button>
          <button name="codigo_prueba" type="submit" class="btn btn-success" id="recibircodigo">  
          <ion-icon name="checkmark-circle-outline"></ion-icon>Aceptar</button> 
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
          <th>Seccion</th>
          <th>Disponibles</th>
          <th>Solicitar</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $sql="select cod_ejem,titulo,localizacion,fecha_pub,nombre_autor,nomb_edi,cant_dis,categoria from escribe es,autores a,editorial e,libros l, ejemplar ej where es.cod_aut=a.cod_aut and es.isbn=l.isbn and l.cod_edi=e.cod_edi and ej.isbn=l.isbn order by titulo";
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
          <td><?php echo $mostrar->localizacion; ?></td>
          <td><?php echo $mostrar->cant_dis; ?></td>
          <td>
            <button type="button" id="botontabla" data-bs-target="#modal"  data-bs-toggle="modal" data-nombre="<?php echo $mostrar->titulo ?>" data-codigo="<?php echo $mostrar->cod_ejem ?>">
            <img src="imagenes/libro.png" class="soli">
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
          <th>Seccion</th>
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
<script src="javascript/table.js"></script>
<script src="javascript/pasardatos.js"></script>
</body>
</html>