<?php
    session_start();
    if($_SESSION["status"] == false){
        header("Location: ./index.php");
    }
    /*else{
        echo "Ha iniciado sesión...";
    }*/
?>
<!doctype html>
<html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>PROYECTO SENA</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <a class="navbar-brand" href="./"><img src="https://certificadossena.net/wp-content/uploads/2022/10/logo-sena-verde-complementario-svg-2022.svg" alt="" width="100px"></a>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
      <link rel="stylesheet" href="style.css">
    </head>
  <body>

    <div class="container">
        <br>
        <h1>Bienvenido, <?php echo $_SESSION["nombre"]."."?></h1>
        <br>
        <?php
            $cod = null;
            $nom = null;
            $can = null;
            $prc = null;
            if(isset($_GET["cod"])){
              $cod = $_GET["cod"];
              $nom = $_GET["nom"];
              $can = $_GET["can"];
              $prc = $_GET["prc"];
            }
        ?>
        <form action="pagina_ingreso.php" method="post">
          <div class="row g-3 align-items-center">
              <div class="col-auto">
                  <label for="cod" class="col-form-label">Codigo</label>
                  <input type="number" name="cod" id="cod" class="form-control" value="<?php echo $cod; ?>" required>
              </div>
              <div class="col-auto">
                  <label for="nom" class="col-form-label">Nombre</label>
                  <input type="text" name="nom" id="nom" class="form-control" value="<?php echo $nom; ?>" required>
              </div>
              <div class="col-auto">
                  <label for="can" class="col-form-label">Cantidad</label>
                  <input type="number" name="can" id="can" class="form-control" value="<?php echo $can; ?>" required>
              </div>
              <div class="col-auto">
                  <label for="prc" class="col-form-label">Precio</label>
                  <input type="number" name="prc" id="prc" class="form-control" value="<?php echo $prc; ?>"required>
              </div>
              <div class="col-auto">
                  <label for="crear" class="col-form-label"></label><br>
                  <button type="submit" class="btn btn-outline-dark" name="crear" id="crear"><i class="bi bi-plus-circle"></i> CREAR</button>
              </div>
              <div class="col-auto">
                  <input type="hidden" name="cod_org" value="<?php echo $cod; ?>">
                  <label for="actualizar" class="col-form-label"></label><br>
                  <button type="submit" class="btn btn-outline-dark" name="actualizar" id="actualizar"><i class="bi bi-arrow-clockwise"></i> ACTUALIZAR</button>
              </div>
          </div>
        </form>
        <br>
        <?php
        include_once "./conexion.php";

        if(isset($_POST["crear"])){
          $sql = "INSERT INTO producto (codigo, nombre, cantidad, precio) VALUES ('".$_POST["cod"]."', '".$_POST["nom"]."', '".$_POST["can"]."', '".$_POST["prc"]."')";
          $conn->query($sql);
       }
       if(isset($_POST["actualizar"])){ 
       /*$sql = "SELECT * FROM producto WHERE nombre = '".$_POST["nom"]."' ";
        $res = $conn->query($sql);
        echo "RESPUESTA: ".$res->num_rows;*/
        //echo "CODIGO ORIGINAL: ".$_POST["cod_org"]."<br>";
        //echo "CODIGO A MODIFICAR: ".$_POST["cod"]."<br>";
        $sql = "SELECT * FROM producto WHERE codigo != '".$_POST["cod_org"]."' AND nombre = '".$_POST["nom"]."' ";
        $res = $conn->query($sql);

        if($res->num_rows == 0){
          $sql = "UPDATE producto SET codigo = '".$_POST["cod"]."', nombre = '".$_POST["nom"]."', cantidad = '".$_POST["can"]."', precio = '".$_POST["prc"]."' WHERE codigo = '".$_POST["cod_org"]."' ";
          $conn->query($sql);
        }else{
          echo '
              <script>
                  alert("YA EXISTE UN PRODUCTO CON EL MISMO NOMBRE, ERORR...");
              </script>
          ';
        }
    }

    if(isset($_GET["cod_elm"])){
      $sql = "DELETE FROM producto WHERE codigo = '".$_GET["cod_elm"]."'";
      $conn->query($sql);
    }

          $sql = "SELECT * FROM producto ";
          $res = $conn->query($sql);

          echo '
          <table class="table table-striped">
              <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th class="text-center">Actualizar</th>
                <th class="text-center">Eliminar</th>
              </tr>
          ';

          while($row = $res->fetch_array()){
            echo '
              <tr>
                <td>'.$row[0].'</td>
                <td>'.$row[1].'</td>
                <td>'.$row[2].'</td>
                <td>$'.$row[3].'</td>
                <td class="text-center"><a href="pagina_ingreso.php?cod='.$row[0].'&nom='.$row[1].'&can='.$row[2].'&prc='.$row[3].'"><i class="bi bi-arrow-clockwise"></i></a></td>
            ';
        ?>
            <td class="text-center"><a href="pagina_ingreso.php?cod_elm=<?php echo $row[0]; ?>" onclick="return confirm('¿Realmente desea eliminar el dato?')"><i class="bi bi-trash"></i></a></td>
            <?php
            echo '
              </tr>
            ';
          }
          echo '</table>';
        ?>
        </div>
    <a href="./cerrar_sesion.php">CERRAR SESIÓN</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>