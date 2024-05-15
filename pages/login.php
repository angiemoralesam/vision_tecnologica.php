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
    if(isset($_POST["inc"])){
        echo "Hola";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio de sesión</title>
    <!--boostrap-->
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <!-- vinculación font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- vinculación a my style "style.css" -->
    <link rel="stylesheet" href="../my_style/index.css">
    <!-- css login -->
    <link rel="stylesheet" href="../my_style/login.css">
   
</head>

<body class="hidden">
    
    <header>
        <nav id="nav" class="nav1">
            <div class="contenedor-nav">
                <div class="logo">
                    <img src="../img/Logo 2.png" alt="">
                </div>
            <div>
        <form class="d-flex" role="search">
        <input class="form-control custom-input" type="search" placeholder="" aria-label="Search">
        <button class="btn btn-outline-secondary custom-button" type="submit">buscar</button>
      </form>
       <br>
       <br>
      <div class="enlaces" id="enlaces">
          <a href="/proyectosena/index.html" id="enlace-inicio" class="btn-header">INICIO</a>
          <a href="/proyectosena/pages/servicios.html" id="enlace-equipo" class="btn-header">SERVICIOS</a>
          <a href="/proyectosena/pages/productos.html" id="enlace-servicio" class="btn-header">PRODUCTOS</a>
          <a href="/proyectosena/pages/ofertas.html" id="enlace-trabajo" class="btn-header">OFERTAS</a>
    </div>
            </div>
            <div class="galeria-usuario">
                <div class="cont-usuario programacion">
                    <div class="img-usuario">
                       <br> <br><svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100px" height="40px" viewBox="0 0 512 512"> <g> <path class="st0" d="M356.2,365.6C326.6,382.4,292.4,392,256,392c-36.4,0-70.6-9.6-100.1-26.4C77.5,389.5,29.4,443,11.7,512h488.5 C482.6,442.9,434.6,389.5,356.2,365.6z"/> <g> <path class="st0" d="M256,0C158.8,0,80,78.8,80,176s78.8,176,176,176s176-78.8,176-176S353.2,0,256,0z M256,308 c-56,0-103.8-34.8-123-84h246C359.8,273.2,312,308,256,308z"/> </g> </g> </svg>
                    </div>
                </div>
                <div class="texto-team">
                        <p>Inicio Sesion</p>
                    </div>
            </div>
            <div class="galeria-usuario">
                <div class="cont-usuario programacion">
                    <div class="img-usuario">
                       <br> <br><svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100px" height="50px" viewBox="0 0 512 512"> <g id="PL_x5F_Cart_1_"> <path d="M441,416c0,13.8-11.2,25-25,25s-25-11.2-25-25s11.2-25,25-25S441,402.2,441,416z"/> <path d="M153,416c0,13.8-11.2,25-25,25s-25-11.2-25-25s11.2-25,25-25S153,402.2,153,416z"/> <path d="M127.9,96l-11.1-32H64v17h41.7l57.5,213.3c-32.4,11.3-59.9,37.9-65.3,73.1C96,379.1,96,384,96,384h352v-16.7H115.3 c4.7-31.6,38.8-58.1,74.1-62.5s243.3-34.2,243.3-34.2L448,96H127.9z"/> </g> </svg>
                    </div>
                </div>
                <div class="texto-team">
                        <p>Carro Compras</p>
                    </div>
                </nav>
    </header>
    <div class="dropdown contenedor-nav">
        <button class="btn-menu" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-bars"></i>
        </button><span class="text-categoria"> Categorías</span> 
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" href="#">Computadores</a></li>
          <li><a class="dropdown-item" href="#">Impresoras</a></li>
          <li><a class="dropdown-item" href="#">Tablets</a></li>
          <li><a class="dropdown-item" href="#">Audio y Video</a></li>
          <li><a class="dropdown-item" href="#">Accesorios</a></li>
          <li><a class="dropdown-item" href="#">Game</a></li>
          <li><a class="dropdown-item" href="#">Conectividad y Redes</a></li>
          <li><a class="dropdown-item" href="#">Ups</a></li>
        </ul>
      </div>
    <main class="main">
      <div>
            <section class="contenedor-from">
                  <form class="login" action="./login.php" method="post">
                    <h1>inicio sesión</h1>
                    <br>
                    <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">correo electronico</label>
                    <input type="text" name="user"  class="form-control campo-corto" id="exampleInputEmail1" placeholder="ingresar correo electronico" aria-describedby="emailHelp">
                  </div>
                  <br>
                   <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                    <input type="password" name="pass" class="form-control campo-corto" id="exampleInputPassword1" placeholder="ingresar contraseña">
                  </div>
                  <br>
                  <br>
                    <div class="remember">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked"> recordar datos
                        </label>
                      </div>
                      <p>Olvido la Contraseña</p>
                    </div>
                    <button class="btn btn-dark btn-lg" type="submit" name="inc">Enviar</button>
                  </form>
                </div>
            </section>
    </main>
    <footer id="contacto">
        <div class="footer contenedor">
            <div class="marca-logo">
                <img src="img/Logo 2.png" alt="">
            </div>
            <div class="iconos">
                <i class="fab fa-youtube"></i>
                <i class="fab fa-facebook-square"></i>
                <i class="fab fa-twitter"></i>
            </div>
            <p>Formando a los mejores aprendices</p>
        </div>
</footer>     
    <script src="../public/js/bootstrap.min.js"></script>   
    <script src="../public/js/bootstrap.bundle.min.js"></script>
</body>
</html>
