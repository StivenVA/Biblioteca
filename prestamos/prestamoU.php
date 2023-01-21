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
    <link rel="stylesheet" href="../estilos/prestamos.css">
    <link rel="stylesheet" href="../estilos/tabla.css">

    <script src="../fontawesome/js/all.min.js"></script>
    <title>prestamos</title>
</head>

<body>
      
<section>
        <div class="wave wave1"></div>
        <div class="wave wave2"></div>
        <div class="wave wave3"></div>
        <div class="wave wave4"></div>
   <!--Scripts de ionicons-->
   <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


        <?php   
          $user=$_SESSION['codigo_user'];
          $sql="select nomb_user,fecha_pres,fecha_dev,titulo from prestamo p, usuarios u,ejemplar e, libros l where l.isbn=e.isbn and e.cod_ejem=p.cod_ejem and u.cod_usuario=p.cod_usuario  and u.cod_usuario='$user'";
          $result=pg_query($sql);
          $nom="select nomb_user from usuarios where cod_usuario='$user'";
          $nom=pg_query($nom);
          $nomb=pg_fetch_object($nom);
        ?>

<img src="../imagenes/logounillanos.png" class="logo"><h1 class="lines-effect">Bienvenido</h1>
      <div class="container">
              <div class="nav">
                <div class="link">
                  <a href="prestamoU.php">                           
                    <span><?php echo $nomb->nomb_user;?></span>
                    <ion-icon name="person-circle-outline"></ion-icon> 
                  </a>
                </div>

                <div class="link">
                  <a href="multas.php">
                    <span>Multas</span>
                    <ion-icon name="cash-outline"></ion-icon>
                  </a>
                </div>                
                
                <div class="link">
                    <a href="../biblioteca.php">                    
                        <span>colección</span>
                        <ion-icon name="bookmarks-outline"></ion-icon>                     
                    </a>
                </div>

                <div class="link">
                  <a href="../log/logout.php">
                      <span>Cerrar sesion</span>
                      <ion-icon name="log-out-outline"></ion-icon>                   
                  </a>
                </div>
                
              </div>
              
      </div>

    <br>

  <div id="table-container" class="container">
    <table id="example" class="table table-striped" style="width:100%">
      <thead>
        <tr>
          <th>#</th>
          <th>Título</th>
          <th>Fecha de prestamo</th>
          <th>Fecha de devolución</th> 
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
  </section> 
    
  </div>

    <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="../javascript/table.js"></script>
   
</body>
</html>