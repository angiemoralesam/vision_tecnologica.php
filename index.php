<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PROYECTO SENA</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="style.css">
    </head>
    </head>
    <body>
        <div class="container">
            <h2 class="text-center">Pruebas inicio de sesión.</h2>
            <hr>
            <form action="" method="post">
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="user" class="col-form-label">Usuario</label>
                        <input type="text" name="user" id="user" class="form-control" required>
                    </div>
                    <div class="col-auto">
                        <label for="pass" class="col-form-label">Contraseña</label>
                        <input type="password" name="pass" id="pass" class="form-control" required>
                    </div>
                    <div class="col-auto">
                        <label for="iniciar" class="col-form-label"></label><br>
                        <button type="submit" class="btn btn-success" id="iniciar"><i class="bi bi-hand-thumbs-up"></i> INICIAR</button>
                    </div>
                </div>
            </form>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
<?php
    session_start();
    if(isset($_POST["user"]) && isset($_POST["pass"])){
        include_once ("./usuario.php");
        $users = new usuario($_POST["user"], $_POST["pass"]);
        
        if($users->iniciar_sesion() == 1){
            $_SESSION["status"] = true;
            $_SESSION["nombre"] = $users->getUser();
            header("Location: ./pagina_ingreso.php");
        }else{
            echo '
                <script>
                    Swal.fire({
                        title: "proyectosena",
                        text: "¡Error al iniciar sesión!",
                        icon: "error"
                    });
                </script>
            ';
            //echo "Usuario y/o Contraseña incorrectos <i class='bi bi-emoji-frown'></i><br>";
        }
    }
?>