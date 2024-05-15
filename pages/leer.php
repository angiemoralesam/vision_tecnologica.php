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
    </head>
    <body>

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

            <a href="./cerrar_sesion.php"><button class="btn btn-outline-success" type="button">Salir</button></a>
        </div>
      </div>
    </nav>
    
      <div class="container">
        <br>
        <h1>Bienvenido, <?php echo $_SESSION["nombre"]."."?></h1>
        <br>
        <?php
          include_once "./conexion.php";
          $sql = "SELECT * FROM producto ";
          $res = $conn->query($sql);

          echo '
          <table class="table table-striped">
              <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Precio</th>
              </tr>
          ';

          while($row = $res->fetch_array()){
            echo '
              <tr>
                <td>'.$row[0].'</td>
                <td>'.$row[1].'</td>
                <td>'.$row[2].' KG</td>
                <td>$'.$row[3].'</td>
              </tr>
            ';
          }
          echo '</table>';
        ?>
      </div>
      
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>