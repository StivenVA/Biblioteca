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
    <title>Multas</title>
</head>

<div class="container"> 
    
</div>
        <?php   
          $user=$_SESSION['codigo_user'];
          $sql="select titulo,motivo,deuda,estado,fecha_mul from multa m,usuarios u,ejemplar e,libros l where u.cod_usuario=m.cod_usuario and e.cod_ejem=m.cod_ejem and l.isbn=e.isbn and u.cod_usuario='$user'";
          $result=pg_query($sql);
          $nom="select nomb_user from usuarios where cod_usuario='$user'";
          $nom=pg_query($nom);
          $nomb=pg_fetch_object($nom);
        ?>
        <div class="container">
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
    <form action="prestamoU.php">
            <button type="submit" class="btn btn-dark" >
              <i class="fa-solid fa-user"></i> <?php echo $nomb->nomb_user;?>
            </button>
      </form>
      <form action="multas.php">
        <button type="submit" class="btn btn-dark">
          <i class="fa-solid fa-dollar-sign"></i> Multas
        </button>
      </form>

        <div class="collapse navbar-collapse" id="navbarNav">
          <form action="../biblioteca.php">
           <button type="submit" class="btn btn-dark">
            <i class="fa-solid fa-bookmark"></i> Colección
           </button>
           </form>
        </div>
</div>
  </nav>
</div>
    <br>

  <div id="table-container" class="container">
    <table id="table" class="table table-striped" style="width:100%">
      <thead>
        <tr>
          <th>#</th>
          <th>Título</th>
          <th>Motivo</th>
          <th>Deuda</th> 
          <th>Estado</th> 
          <th>Fecha</th> 
        </tr>
      </thead>
      <tbody>
        
          <?php 
          $contar=1;
          while($mostrar=pg_fetch_object($result)){
        ?>
        <tr>
          <th scope="row"><?php echo $contar++; ?></th>
          <td><?php echo $mostrar->titulo; ?></td>
          <td><?php echo $mostrar->motivo; ?></td>
          <td><?php echo $mostrar->deuda; ?></td>
          <td><?php echo $mostrar->estado; ?></td>
          <td><?php echo $mostrar->fecha_mul; ?></td>
        </tr>
      <?php } ?>
      </tbody>
      <tfoot>
        <tr>
        <th>#</th>
          <th>Título</th>
          <th>Motivo</th>
          <th>Deuda</th> 
          <th>Estado</th> 
          <th>Fecha</th>
        </tr>
      </tfoot>
    </table>
  </div>

  <div class="container"> 
    
  </div>

    <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="../javascript/mul.js"></script>
</body>
</html>