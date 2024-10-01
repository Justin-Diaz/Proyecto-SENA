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
		if($_SESSION['id_rol'] !=3)
			{
				header('location: loginphp.php');
			}
	}
?>
<html>
	<head>
  <title>Usuario</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <!-- <script src="editar_registro.js"></script> para anadir alertas personalizadas-->
		<link rel="stylesheet" href="usuario.css">
	</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="barra">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="imagenes/logo.png" class="logo"></a>
    <div id="contenedor">
    <h1 class="contacto">Contactanos</h1>
    <h2 class="contacto">Numero de celular: 3226007455 </h2> 
    <h2 class="contacto">Correo electronico:<a href="https://accounts.google.com/AccountChooser/signinchooser?service=mail&continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&flowName=GlifWebSignIn&flowEntry=AccountChooser&ec=asw-gmail-globalnav-signin&theme=glif"> fastwork@gmail.com </a> </h2> 
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
  
    <!-- barra de navegacion -->
<div>
  <div class="container-fluid">
    <form class="d-flex" role="search" action="#" method="post">
      <input class="form-control me-2" type="search" placeholder="Buscar oferta" aria-label="Search" id="barra_navegacion" name="buscarusua">

      <!-- boton buscar -->
      <input type="submit" class="boton_buscar" value="Buscar" name="buscaroferta">
    </form>
  </div>
</div>

<!-- boton desplegable -->
<div>
<div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
  <ul class="navbar-nav">
  <li class="nav-item dropdown">

  <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" id="boton_desplegable">
  Usuario
  </button>
          
  <!-- opciones desplegadas por el boton -->
  <ul class="dropdown-menu dropdown-menu-dark">
  <a class="dropdown-item" href="perfil.php"  id="opcion_desplegable">PERFIL</a>
  <a class="dropdown-item" href="ver_aplicaciones.php"  id="opcion_desplegable">Aplicaciones</a>
  <form action="loginphp.php" method="POST">  
  <input type="submit" name="cerrar_sesion" value="CERRAR SESIÓN" class="cerrar"  id="opcion_desplegable">
  </form>
  </ul>
  </li>
  </ul>
</div>
</div>
</nav>

<!-- busqueda de ofertas desde la barra de navegacion -->

<?php

//mensaje de bienvenida
$nombre=$_SESSION['nombreusuario'] ; echo "<h1 class='bienvenida'>Bienvenid@ ".$nombre."</h1>";

//si el usuario realiza una busqueda, el sistema solo imprime lo que busco y no hace lo demas
$prueba=true;
if (isset($_POST['buscarusua']))
{
try
{
$oferta=$_POST['buscarusua'];
$busqueda= "SELECT * FROM ofertas WHERE cargo = '$oferta'";
$buscaroferta = $conexion->query($busqueda);
if (isset($buscaroferta))
   {
    while ($fila = $buscaroferta->fetch(PDO::FETCH_ASSOC))
    {
    $id=$fila["id"];
    $cargo=$fila["cargo"];
    $ciudad=$fila["ciudad"];
    $caracteristicas=$fila["caracteristicas"];
    $funciones=$fila["funciones"];
    $pago=$fila["pago"];
    $nombre=$fila["nombre"];
    $num_celular=$fila["num_celular"];
    $correo=$fila["correo"];  
?>
<div class="buscar">
<div class="card text-center mb-3" style="width: 18rem;" id="trg-buscar">
  <div class="card-body">
    <h5 class="card-title"><h1>Cargo</h1><?php echo $cargo;?></h5><hr>
    <p class="card-text"><h5>Caracteristicas</h5><?php echo $caracteristicas;?></p><hr>
    <p class="card-text"><h5>Pago</h5><?php echo "$".$pago;?></p><hr>
    <button type="submit" class="btn btn-primary" id="btn-oferta"><a href="usuario.php? ver= <?php echo $id; ?>">Ver Oferta</a></button>
  </div>
</div>
</div>

   <?php 
   }
   }
   else
   {
   echo '<script type="text/javascript">
         alert("No ingreso nada en la busqueda");
         </script>';
   }
}
catch (PDOException $e)
{
echo "Error: " . $e->getMessage();
}
} 

//si el usuario no a realizado una busqueda, el sistema mostrara todas las ofertas creadas

else if ($prueba)
{

//ofertas

$buscar= "SELECT * FROM ofertas";
$ofertas = $conexion->query($buscar);
if (isset($ofertas))
   {
    while ($fila = $ofertas->fetch(PDO::FETCH_ASSOC))
    {
    $id=$fila["id"];
    $cargo=$fila["cargo"];
    $ciudad=$fila["ciudad"];
    $caracteristicas=$fila["caracteristicas"];
    $funciones=$fila["funciones"];
    $pago=$fila["pago"];
    $nombre=$fila["nombre"];
    $num_celular=$fila["num_celular"];
    $correo=$fila["correo"];
?>
<div class="defecto">
<div class="card text-center mb-3" id="trg-default">
  <div class="card-body">
    <h5 class="card-title"><h1>Cargo</h1><?php echo $cargo;?></h5><hr>
    <p class="card-text"><h5>Caracteristicas</h5><?php echo $caracteristicas;?></p><hr>
    <p class="card-text"><h5>Pago</h5><?php echo "$".$pago;?></p><hr>
    <button type="submit" class="btn btn-primary" id="btn-oferta"><a href="usuario.php? ver= <?php echo $id; ?>">Ver Oferta</a></button>
  </div>
</div>

<?php
}
//cuando el usuario oprime el boton de ver oferta
if (isset($_GET['ver']))
{
$prueba=false;
$editar_id=$_GET['ver'];
if (isset($editar_id))
  {
  $editar="SELECT * FROM ofertas WHERE id='$editar_id'";
  $nuevos = $conexion->query($editar);
  if ($nuevos)
  {
    while ($fila = $nuevos->fetch(PDO::FETCH_ASSOC))
  {
    $id=$fila["id"];
    $cargo=$fila["cargo"];
    $ciudad=$fila["ciudad"];
    $caracteristicas=$fila["caracteristicas"];
    $funciones=$fila["funciones"];
    $pago=$fila["pago"];
    $nombre=$fila["nombre"];
    $num_celular=$fila["num_celular"];
    $correo=$fila["correo"];
  }
  }
  ?>
<div class="container">
<h1 class="detalles">Detalles de la oferta<a href="usuario.php"><button class="cerrar">X</button></a></h1>
<div class="card text-center mb-3" id="trg-ver">
  <div class="card-body">
    <h5 class="card-title"><h1>Cargo</h1><?php echo $cargo;?></h5><hr>
    <p class="card-text"><h5>id</h5><?php echo$id;?></p><hr>
    <p class="card-text"><h5>Ciudad de residencia</h5><?php echo$ciudad;?></p><hr>
    <p class="card-text"><h5>Caracteristicas</h5><?php echo $caracteristicas;?></p><hr>
    <p class="card-text"><h5>Funciones</h5><?php echo $funciones;?></p><hr>
    <p class="card-text"><h5>Pago</h5><?php echo "$".$pago;?></p><hr>
    <p class="card-text"><h5>Nombre del creador</h5><?php echo $nombre;?></p><hr>
    <p class="card-text"><h5>Numero de celular</h5><?php echo $num_celular;?></p><hr>
    <p class="card-text"><h5>Correo electronico</h5><?php echo $correo;?></p><hr>
    <a href="usuario.php? aplicar=<?php echo $id; ?>" class="btn btn-primary" id="btn-oferta">Aplicar a Oferta</a>
  </div>
</div>
</div>

<?php
}
}
?>

<?php 
if (isset($_GET['aplicar']))
{
$nombreusua=$_SESSION['nombreusuario'];
  try
  {
  $aplicar=$_GET['aplicar'];
  $buscar="SELECT * FROM ofertas WHERE id = '$aplicar'";
  $ejecutar=$conexion->query($buscar);
  if ($ejecutar)
  {
  while ($fila = $ejecutar->fetch(PDO::FETCH_ASSOC))
    {
    $id=$fila['id'];
    }
  }
  else
  {
  echo '<script type="text/javascript">
  alert("No se encontraron registros");
  </script>';
  }
  $guardar_aplicacion= "INSERT INTO aplicaciones_ofertas (id_ofertas, nombre_usuario, nombre_creador) VALUES (:id, :nombreusua, :nombre)";
          
  //preparar la consulta para la insercion de los datos
  $stmt = $conexion->prepare($guardar_aplicacion);

  //escapar de una cadena de texto para prevenir inyeccion de datos
  $stmt->bindValue(':id', $id,PDO::PARAM_INT);
  $stmt->bindValue(':nombreusua', $nombreusua,PDO::PARAM_STR);
  $stmt->bindValue(':nombre', $nombre,PDO::PARAM_STR);

  //ejecutar la consulta
  $stmt->execute();

  if ($stmt)
  {
  //verificar que los datos se allan ingresado correctamente
  if ($stmt->rowCount() > 0)
  {
   echo '<script type="text/javascript">
         alert("Aplicacion a la oferta exitosa");
         </script>';
  }
  echo '<meta http-equiv="refresh" content="0;url=http://localhost/proyecto/usuario.php">';
  }
  }
  catch (PDOException $e)
    {
     echo "Error: ".$e->getMessage();
    }
  }
}
unset($_GET['aplicar']);
}
else
   {
   echo '<script type="text/javascript">
         alert("No se encontro ninguna oferta en la base de datos");
         </script>';
   }
?>
		
</body>
</html>