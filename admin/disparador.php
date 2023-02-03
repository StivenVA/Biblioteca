<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../estilos/tabla.css">
    <link rel="stylesheet" href="../estilos/admin.css">
    <link rel="stylesheet" href="../estilos/add.css">

    <title>Document</title>
    <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    
</head>
<body>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<img src="../imagenes/logounillanos.png" class="logouni">

    <?php 
        include_once("../conexion.php");
        $query=pg_query("select * from mensajes");
    ?>

<div id="table-container" class="container">
    <table id="example" class="table table-striped" style="width:100%">
      <thead>
        <tr>
          <th>#</th>
          <th>Fecha</th>
          <th>Acción</th>
          <th>Mensaje</th>
        </tr>
      </thead>
      <tbody>
        
          <?php 
          $contar=1;
          while($mostrar=pg_fetch_object($query)){
          ?>
          <tr>
          <th scope="row"><?php echo $contar++; ?></th>
          <td><?php echo $mostrar->fecha; ?></td>
          <td><?php echo $mostrar->accion; ?></td>
          <td><?php echo $mostrar->mensaje; ?></td>
        </tr>
      <?php } ?>
      </tbody>
      <tfoot>
        <tr>
            <th>#</th>
            <th>Fecha</th>
            <th>Acción</th>
            <th>Mensaje</th>
        </tr>
      </tfoot>
    </table>
  </div>

  <a href="admin.php">
    <ion-icon name="arrow-undo-outline" class="atras"></ion-icon>
  </a>
  <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="../javascript/disparador.js"></script>
</body>
</html>