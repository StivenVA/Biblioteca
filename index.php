<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <title>Inicio sesión</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"/>
    <link rel="stylesheet" href="estilos/estilos.css">
</head>

<body>

<section>
        <div class="wave wave1"></div>
        <div class="wave wave2"></div>
        <div class="wave wave3"></div>
        <div class="wave wave4"></div>

        <img src="imagenes/uni.png" class="logo"><h1 class="lines-effect">Bienvenidos</h1>
    

    <div class="slider">
        <span style="--i:1;"><img src="imagenes/img1.jpg"></span>
        <span style="--i:2;"><img src="imagenes/1.jpg"></span>
        <span style="--i:3;"><img src="imagenes/img3.jpg"></span>
        <span style="--i:4;"><img src="imagenes/biblio.jpg"></span>
        <span style="--i:5;"><img src="imagenes/img4.jpg"></span>
        <span style="--i:6;"><img src="imagenes/unillanos.jpeg"></span>
        <span style="--i:7;"><img src="imagenes/logouni.png"></span>
        <span style="--i:8;"><img src="imagenes/img8.jpg"></span>
    </div>
    

    <div class="m-0 vh-100 row justify-content-center align-items-center">
    
            <div class="container bg-ligth text-dark col-auto p-5 text-center animated fadeIn">

                <div class="login">
                    <img src="imagenes/hombre.png" alt="login" class="login-img">
                </div>
                <form action="log/loguearse.php" method="POST" class="form-box">
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
</section>
    
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>