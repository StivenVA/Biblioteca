<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.min.css">
    <title>fallo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"/>
    
    <link rel="stylesheet" href="../estilos/fallo.css">

</head>
<body>
<section>
        <div class="wave wave1"></div>
        <div class="wave wave2"></div>
        <div class="wave wave3"></div>
        <div class="wave wave4"></div>

       <img src="../imagenes/uni.png" class="logo">


<div class="contenedor_loader">
        <div class="loader"></div>
    </div>

    <div class="m-0 vh-100 row justify-content-center align-items-center">
        <div class="col-auto p-5 text-center animated fadeIn">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Usuario y/o contraseña incorrectos!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        
        <div class="container bg-ligth text-dark col-auto p-5 text-center">
        <div class="login">
                    <img src="../imagenes/hombre.png" alt="login" class="login-img">
            </div>
            <form action="loguearse.php" method="POST" class="form-box">
                <h2 class="form-title">Iniciar sesión</h2>
                <br>
                <input type="text" name="user" id="01" placeholder="Ingrese su usuario">
                <br><br>
                <input type="password" name="contraseña" placeholder="Ingrese su contraseña">
                <br><br>
                <button type="submit" class="btn btn-success w-100">Iniciar</button>
            </form>
        </div>
        </div>  
    </div>
</section>
    <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="../javascript/script.js">
 </body>
 </html>