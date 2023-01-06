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
    <title>biblioteca</title>
</head>

  <div class="container"> 
    <form action="multas.php">
        <button type="submit" id="botontabla">
        <i class="fa-solid fa-dollar-sign"></i>
            </button>
    </form>
  </div>
<?php 
          $user=$_SESSION['codigo_user'];
          $sql="select nomb_user,fecha_pres,fecha_dev,titulo from prestamo p, usuarios u,ejemplar e, libros l where l.isbn=e.isbn and e.cod_ejem=p.cod_ejem and u.cod_usuario=p.cod_usuario  and u.cod_usuario='$user'";
          $result=pg_query($sql);
          $contar=1;
          ?>

    <br>
  <div id="table-container">
    <table id="example" class="table table-striped" style="width:100%">
      <thead>
        <tr>
          <th>#</th>
          <th>Título</th>
          <th>fecha de prestamo</th>
          <th>fecha de devolución</th> 
        </tr>
      </thead>
      <tbody>
        
          <?php 
          while($mostrar=pg_fetch_object($result)){
        ?>
        <tr>
          <th scope="row"><?php echo $contar++; ?></th>
          <td><?php echo $mostrar->titulo; ?></td>
          <td><?php echo $mostrar->fecha_pres; ?></td>
          <td><?php echo $mostrar->fecha_dev; ?></td>
        </tr>
      <?php } ?>
      </tbody>
      <tfoot>
        <tr>
        <th>#</th>
        <th>Título</th>
        <th>Fecha de prestamo</th>
        <th>Fecha de devolución</th>
        </tr>
      </tfoot>
    </table>
  </div>

  <div class="container"> 
    <form action="../biblioteca.php">
        <button type="submit" id="botontabla">
        <i class="fa-solid fa-bookmark"></i>
            </button>
    </form>
  </div>

    <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="../javascript/app.js"></script>
</body>
</html>