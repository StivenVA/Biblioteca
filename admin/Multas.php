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
    <link rel="stylesheet" href="../estilos/admin.css">
    <link rel="stylesheet" href="../estilos/tabla.css">
    <link rel="stylesheet" href="../estilos/Multas.css">
    <link rel="stylesheet" href="../estilos/coleccion.css">

    <script src="../fontawesome/js/all.min.js"></script>
    
    <title>Multas</title>
</head>

<body>


<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>



<img src="../imagenes/logounillanos.png" class="logouni"><h1 class="lines-effect">Prestamos</h1>
        <?php   
          $user=$_SESSION['codigo_user'];
          $sql="select tipo,nomb_user,numero,telefono,estado,titulo,fecha_pres,fecha_dev,p.cod_usuario,p.cod_ejem from prestamo p,usuarios u,ejemplar e,libros l where u.cod_usuario=p.cod_usuario and e.cod_ejem=p.cod_ejem and l.isbn=e.isbn order by fecha_pres desc";
          $result=pg_query($sql);
          $nom="select nomb_user from usuarios where cod_usuario='$user'";
          $nom=pg_query($nom);
          $nomb=pg_fetch_object($nom);
        ?>
        <div class="container">
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
    <div class="nav">
                <div class="link">
                  <a href="admin.php">                           
                    <span><?php echo $nomb->nomb_user;?></span>
                    <ion-icon name="person-circle-outline"></ion-icon> 
                  </a>
                </div>

                <div class="link">
                  <a href="Multas.php">
                    <span>Prestamos</span>
                    <ion-icon name="document-text-outline"></ion-icon>
                  </a>
                </div> 

                <div class="link">
                  <a href="coleccion.php">
                    <span>Colecci??n</span>
                    <ion-icon name="library-outline"></ion-icon>
                  </a>
                </div> 

              <div class="link"> 
                  <a href="Mulview.php">
                    <span>Ver todas las multas</span>
                    <i class="fa-solid fa-dollar-sign"></i>
                  </a>  
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
          <th>Usuario</th>
          <th>Tipo de usuario</th>
          <th>Telefono</th>
          <th>T??tulo</th>
          <th>fecha de prestamo</th>
          <th>fecha de devolucion</th>
          <th>sala</th>
          <th>Estado</th>
          <th>Devolucion</th> 
        </tr>
      </thead>
      <tbody>
        
          <?php 
          $contar=1;
          while($mostrar=pg_fetch_object($result)){
          ?>
          <tr>
          <th scope="row"><?php echo $contar++; ?></th>
          <td><?php echo $mostrar->nomb_user; ?></td>
          <td><?php echo $mostrar->tipo; ?></td>
          <td><?php echo $mostrar->telefono; ?></td>
          <td><?php echo $mostrar->titulo; ?></td>
          <td><?php echo $mostrar->fecha_pres; ?></td>
          <td><?php echo $mostrar->fecha_dev; ?></td>
          <td><?php if($mostrar->numero=="No"){
            echo "Externo";
            }else{
              echo $mostrar->numero;
            } ?></td>
          <td><?php echo $mostrar->estado; ?></td>
          <td><button type="button" id="botontabla" class="btn btn-outline-success" data-bs-target="#modal"  data-bs-toggle="modal" data-titulo="<?php echo $mostrar->titulo; ?>" data-cod="<?php echo $mostrar->cod_ejem; ?>" data-user="<?php echo $mostrar->cod_usuario; ?>" data-fecha="<?php echo $mostrar->fecha_pres; ?>" >
          <img src="../imagenes/aprobar.png" class="check">
            </button></td>
        </tr>
      <?php } ?>
      </tbody>
      <tfoot>
        <tr>
        <th>#</th>
        <th>Usuario</th>
        <th>Tipo de usuario</th>
        <th>Telefono</th>
          <th>T??tulo</th>
          <th>fecha de prestamo</th>
          <th>fecha de devolucion</th>
          <th>sala</th> 
          <th>Estado</th>
          <th>Devolucion</th>
        </tr>
      </tfoot>
    </table>
  </div>

    
            <!--Este es el modal para la verificafcion de la devolucion-->

<div class="modal" tabindex="-1" id="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Verificacion del libro <input id="titulo" type="text" name ="titulo" disabled class="text-center" ></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="genmulta.php" method="POST" class="form-box">
      <div class="modal-body">
        <p>Estado: 
        <select name='estado' id="est" class="form-select form-select-sm" aria-label=".form-select-sm example" required data-estado>
            <option value="" selected disabled>Seleccione una opci??n</option>
            <option value="Regresado" >Regresado </option>
            <option value="Da??ado" >Da??ado </option>
            <option value="Retrasado " >Retrasado </option>
          </select>
          </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" name='verificar' class="btn btn-primary" id="aceptar" >Aceptar</button>
      </div>
          </form>
    </div>
  </div>

</div>
   
    
    <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="../javascript/mul.js"></script>
    <script src="../javascript/Mulescript.js"></script>
  
</body>
</html>