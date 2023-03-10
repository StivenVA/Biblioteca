<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../estilos/Grafica.css">
    <link rel="stylesheet" href="../estilos/add.css">
    
    <title>Agregar libro</title>
</head>
<body>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<div class="burbujas">
      <div class="burbuja"></div>
      <div class="burbuja"></div>
      <div class="burbuja"></div>
      <div class="burbuja"></div>
      <div class="burbuja"></div>
      <div class="burbuja"></div>
      <div class="burbuja"></div>
      <div class="burbuja"></div>
      <div class="burbuja"></div>
      <div class="burbuja"></div>

      <img src="../imagenes/logounillanos.png" class="logouni">
    
 <div class="contener">
    <form action="add.php" method="POST" class="form-box">
      <p>Escriba el nombre del autor: </p>
        <input type="text" placeholder="Autor" name="autor" required>

      <p>Escriba el titulo del libro: </p>
        <input type="text" name="titulo" placeholder="Titulo" required>

      <p>Escriba el isbn del libro: </p>
        <input type="text" name="isbn" placeholder="isbn" required>

      <p>Escriba la editorial del libro: </p>
        <input type="text" name="editorial" placeholder="Editorial" required>

      <p>Escriba la categoria del libro: </p>
        <input type="text" name="categoria" placeholder="Categoria" required>

      <p>Escriba la fecha de publicacion del libro: </p>
      <input type="date" name="fecha_pub" id="fecha_pub" placeholder="Fecha de publicacion" required>

      <p>Ingrese la cantidad disponible: </p>
      <input type="number" name="cantidad" id="cantidad" min="1" placeholder="Cantidad" required>

      <br> <br>
      <button type="submit">Agregar</button>
    </form>

    <script>
        const campoNumerico = document.getElementById('cantidad');

campoNumerico.addEventListener('keydown', function(evento) {
  const teclaPresionada = evento.key;
  const teclaPresionadaEsUnNumero = Number.isInteger(parseInt(teclaPresionada));

  const sePresionoUnaTeclaNoAdmitida = 
    teclaPresionada != 'ArrowDown' &&
    teclaPresionada != 'ArrowUp' &&
    teclaPresionada != 'Backspace' &&
    teclaPresionada != 'Enter' &&
    !teclaPresionadaEsUnNumero;
  const comienzaPorCero = 
    campoNumerico.value.length === 0 &&
    teclaPresionada == 0;

  if (sePresionoUnaTeclaNoAdmitida || comienzaPorCero) {
    evento.preventDefault(); 
  }

});

window.addEventListener('DOMContentLoaded', (evento) => {
    /* Obtenemos la fecha de hoy en formato ISO */
    const hoy_fecha = new Date().toISOString().substring(0, 10);
    /* Buscamos la etiqueta*/
    document.querySelector("#fecha_pub").max = hoy_fecha;
});
    </script>
</div>

  <a href="coleccion.php">
    <ion-icon name="arrow-undo-outline" class="atras"></ion-icon>
  </a>


</div>
</body>
</html>