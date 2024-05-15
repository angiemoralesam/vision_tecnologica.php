<?php
    session_start();
    if($_SESSION["status"] == false){
        header("Location: ./index.php");
    }
?>
<!doctype html>
<html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>PROYECTO SENA</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>
    <body>

    <?php
        if(isset($_POST["crear"])){
            include_once "./conexion.php";
            $sql = "INSERT INTO producto (codigo, nombre, cantidad, precio) VALUES ('".$_POST["cod"]."', '".$_POST["nom"]."', '".$_POST["can"]."', '".$_POST["prc"]."')";
            $conn->query($sql);
        }
    ?>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="./"><img src="https://certificadossena.net/wp-content/uploads/2022/10/logo-sena-verde-complementario-svg-2022.svg" alt="" width="10%"></a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="leer.php">Leer</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="crear.php">Crear</a>
                </li>
            </ul>

            <a href="./salir.php"><button class="btn btn-outline-success" type="button">Salir</button></a>
        </div>
      </div>
    </nav>
    
      <div class="container">
        <br>
        <h1>Bienvenido, <?php echo $_SESSION["nombre"]."."?></h1>
        <br>
        <form action="" method="post">
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="cod" class="col-form-label">Codigo</label>
                    <input type="number" name="cod" id="cod" class="form-control" required>
                </div>
                <div class="col-auto">
                    <label for="nom" class="col-form-label">Nombre</label>
                    <input type="text" name="nom" id="nom" class="form-control" required>
                </div>
                <div class="col-auto">
                    <label for="can" class="col-form-label">Cantidad</label>
                    <input type="number" name="can" id="can" class="form-control" required>
                </div>
                <div class="col-auto">
                    <label for="prc" class="col-form-label">Precio</label>
                    <input type="number" name="prc" id="prc" class="form-control" required>
                </div>
                <div class="col-auto">
                    <label for="crear" class="col-form-label"></label><br>
                    <button type="submit" class="btn btn-success" name="crear" id="crear"><i class="bi bi-plus-circle"></i> CREAR</button>
                </div>
            </div>
        </form>
      </div>
      
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>