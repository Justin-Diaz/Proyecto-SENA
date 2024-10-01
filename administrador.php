<?php
include_once 'conexionPDO.php';
$db = new Database(); // Crea una instancia de la clase Database
$conexion = $db->connectar();//conectar con la base de datos
session_start();
if(!isset($_SESSION['id_rol']))	
	{
		header('location: loginphp.php');
	}
else
	{
		if($_SESSION['id_rol'] !=1)
			{
				header('location: loginphp.php');
			}
	}
?>
<html>
	<head>
    <title>Administrador</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="administrador.css">
	</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="barra">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="imagenes/logo.png" class="logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <!-- barra de navegacion -->
<div>
  <div class="container-fluid">
    <form class="d-flex" role="search" action="#" method="post">
      <input class="form-control me-2" type="search" placeholder="Buscar usuario" aria-label="Search" id="barra_navegacion" name="buscarusua">

      <!-- boton buscar -->
      <input type="submit" class="boton_buscar" value="Buscar">
      </form>
  </div>
</div>

  
      <!-- realizar busqueda en la base de datos -->
      <?php
      // try
      // {
      //   $db = new Database(); // Crea una instancia de la clase Database
      //   $conexion = $db->connectar();//conectar con la base de datos
      //  $buscarusua=$_POST['buscarusua'];
      //  $buscar= "SELECT * FROM reg_usuarios WHERE nombre_usuario ='$buscarusua'";
      //  $usuario = $conexion->query($buscar);
      //  if ($usuario)
      //     {
      //       while ($fila = $usuarios->fetch(PDO::FETCH_ASSOC))
      //       {
            
      //       $nombre=$fila["nombre_usuario"];

      //       }
      //     } 
      //   else
      //     {
      //     echo '<script type="text/javascript>
      //           alert ("No .se encontro ningun usuario registrado con el nombre ingresado");
      //           </script>';
      //     }
      // }
      // catch (PDOException $e)
      // {
      // echo "Error: " . $e->getMessage();
      // }
      ?>
<!-- boton desplegable -->
<div>
<div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
<ul class="navbar-nav">
<li class="nav-item dropdown">
<button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" id="boton_desplegable">
Administrador
</button>
          
<!-- opciones desplegadas por el boton -->
<ul class="dropdown-menu dropdown-menu-dark">
<a class="dropdown-item" href="perfil.php"  id="opcion_desplegable">Perfil</a>
<form action="loginphp.php" method="POST">  
<input type="submit" name="cerrar_sesion" value="CERRAR SESION" class="cerrar"  id="opcion_desplegable">
</form>
</ul>
</li>
</ul>
</div>
</div>
</nav>

<?php  $nombre=$_SESSION['nombreusuario'] ; echo "<h1 class='bienvenida'>Bienvenid@ ".$nombre."</h1>"; ?>

<!-- opciones del administrador -->
<div class="contenedor">
<button class="uno"><a href="ver_registros.php">ver registros</button><br>
<button class="dos"><a href="ver_ofertas.php">ver ofertas</button><br>
<button class="tres"><a href="crear_oferta.php">crear oferta</button><br>

</div>
</body>
</html>
