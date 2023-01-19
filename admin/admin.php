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
    <link rel="stylesheet" href="../estilos/admin.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    
    <title>Admin</title>
</head>

        <?php   
          $user=$_SESSION['codigo_user'];
          $sql="select count(pr.cod_usuario),nomb_user as prestamo from prestamo pr,usuarios u where u.cod_usuario=pr.cod_usuario GROUP BY u.nomb_user";
          $result=pg_query($sql);
          $nom="select nomb_user from usuarios where cod_usuario='$user'";
          $nom=pg_query($nom);
          $nomb=pg_fetch_object($nom);
        ?>

<div class="container">  
</div>
    
  <div class="container">
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <form action="admin.php">
            <button type="submit" class="btn" >
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <img src="../imagenes/admin.png" class="logo"> 
               <?php echo $nomb->nomb_user;?>
            </button>
      </form>
      <form action="Multas.php">
        <button type="submit" class="btn btn-dark">
              <span></span>
              <span></span>
              <span></span>
              <span></span>
        <img src="../imagenes/prestado.png" class="logopres"> Prestamos
        </button>
      </form>

        <div class="collapse navbar-collapse" id="navbarNav">
          <form action="coleccion.php">
           <button type="submit" class="btn btn-dark">
              <span></span>
              <span></span>
              <span></span>
              <span></span>
            <img src="../imagenes/libros.png" class="logo">Colección
           </button>
           </form>
        </div>

        <div  id="navbarNav">
          <form action="../log/logout.php">
           <button type="submit" class="btn btn-dark">
              <span></span>
              <span></span>
              <span></span>
              <span></span>
           <img src="../imagenes/apagar.png" class="logo"> Cerrar sesion
           </button>
           </form>
        </div>
</div>
  </nav>
</div>
  <div class="container" width="100" height="100">
  
  <p><br> Persona que ha solicitado más préstamos en los últimos 7 días: 
      <?php 
        $query = "select max(prestamo),nomb_user from (select count(pr.cod_usuario) as prestamo,nomb_user  from prestamo pr,usuarios u where u.cod_usuario=pr.cod_usuario and fecha_pres>=current_date-7 and fecha_pres<=current_date GROUP BY u.nomb_user) d where prestamo=(select max(prestamo) from (select count(pr.cod_usuario) as prestamo from prestamo pr,usuarios u where u.cod_usuario=pr.cod_usuario and fecha_pres>=current_date-7 and fecha_pres<=current_date GROUP BY nomb_user)dd) GROUP BY nomb_user";

        $query = pg_query($query);
        $query = pg_fetch_object($query);

        echo $query->nomb_user;
      ?>
    </p>
  <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" id="collapse">
    Ver gráfico <i class="fa-solid fa-chevron-down"></i>
  </button>
  </div>

<div class="collapse" id="collapseExample" >  
    <div class="card card-body" width="100" height="100">
     <canvas id="myChart" ></canvas>
    </div>

</div>
    <br>
    
    <div class="container" width="100" height="100">
    <p><br> Categoría más leida en los últimos 7 días:
      <?php 
      $query = "select prestamo,categoria from (select count(categoria) as prestamo,categoria  from prestamo pr, ejemplar e,libros l where pr.cod_ejem=e.cod_ejem and e.isbn=l.isbn and fecha_pres>=current_date-7 and fecha_pres<=current_date GROUP BY categoria) d where prestamo = (select max(prestamo)   from (select count(categoria) as prestamo from prestamo pr, ejemplar e,libros l where pr.cod_ejem=e.cod_ejem and e.isbn=l.isbn and fecha_pres>=current_date-7 and fecha_pres<=current_date GROUP BY categoria)dd) GROUP BY categoria,prestamo";
      $query = pg_query($query);
      $query = pg_fetch_object($query);

      echo $query->categoria;
      ?>
      
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#categorias " aria-expanded="false" aria-controls="collapseExample" id="collapse">
    Ver gráfico <i class="fa-solid fa-chevron-down"></i>
    </button>
    </p>
    </div>

<div class="collapse" id="categorias" >
  <div class="card card-body" >
  <canvas id="cats" ></canvas>
  </div>
</div>

<button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#percentage " aria-expanded="false" aria-controls="collapseExample" id="collapse">
    Ver gráfico <i class="fa-solid fa-chevron-down"></i>
    </button>
    </p>
    </div>

<div class="collapse" id="percentage" >
  <div class="card card-body" >
  <canvas id="per" ></canvas>
  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script> 
      /*Este es el js para los datos de los prestamos en los últimos 30 días*/
    <?php 
        $query = "select prestamo,nomb_user from (select count(pr.cod_usuario) as prestamo,nomb_user  from prestamo pr,usuarios u where u.cod_usuario=pr.cod_usuario and fecha_pres>=current_date-7 and fecha_pres<=current_date GROUP BY u.nomb_user) d GROUP BY nomb_user,prestamo";
        $query = pg_query($query);
    ?>
      j = 0;
      var nombres = [];
      var cant = [];
    <?php while($object = pg_fetch_object($query)){ ?>
    
        nombres[j] = "<?php echo $object->nomb_user; ?>";
        cant[j] = <?php echo $object->prestamo; ?>;
        j++;
    <?php } ?>
    </script> 
    <script>

      /*Este es el js para los datos de las categorias mas solicitadas en los últimos 30 días*/
      j = 0;
      var cat = [];
      var pres = [];
    <?php 
        $query = "select prestamo,categoria from (select count(categoria) as prestamo,categoria  from prestamo pr, ejemplar e,libros l where pr.cod_ejem=e.cod_ejem and e.isbn=l.isbn and fecha_pres>=current_date-7 and fecha_pres<=current_date GROUP BY categoria) d  GROUP BY categoria,prestamo";
        $query = pg_query($query);

        while($object = pg_fetch_object($query)){
    ?>
        cat[j] = "<?php echo $object->categoria; ?>";
        pres[j] = <?php echo $object->prestamo; ?>;
        j++;
    <?php } ?>
    </script> 
    <script>
      //Este es el js de los datos  para el tipo de usuario que más suele solictar libros
      <?php 
      $query = "select count(numero) as cantidad from prestamo where fecha_pres>=CURRENT_DATE-7 and fecha_pres<=CURRENT_DATE";
      $query = pg_query($query);
      $query = pg_fetch_object($query);
      $total =$query->cantidad;

      $query = "select count(numero) as cantidad,numero from prestamo where fecha_pres>=CURRENT_DATE-7 and fecha_pres<=CURRENT_DATE group by numero";
      $query = pg_query($query);
      ?>

      var porcentajes = [];
      var salas = [];
      j = 0;
      <?php while($object = pg_fetch_object($query)){ ?>
        porcentajes[j] = <?php echo ($object->cantidad/$total)*100; ?>;
        salas[j] = "<?php if($object->numero=="No"){
              echo "Externo";  
        }
          else{
            echo $object->numero;
           } ?>";
        j++;
      <?php } ?>
    
    
    </script>  
    <script src="../javascript/Graphs.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
</body>
    
    

</html>