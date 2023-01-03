<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <title>Inicio sesión</title>
</head>

<body>
<div class="m-0 vh-100 row justify-content-center align-items-center">
            <div class="container bg-ligth text-dark col-auto p-5 text-center animated fadeIn">
               
                <div class="login">
                    <img src="imagenes/login.png" alt="login" class="login-img">
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

    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <?php echo "a"; 
    ?>
</body>

</html>