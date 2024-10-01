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
		if($_SESSION['id_rol'] !=2)
			{
				header('location: loginphp.php');
			}
	}
?>
<html>
<head>
    <title>Empleador</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="empleador.css">
	</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="barra">
  <div class="container-fluid">
    <a class="navbar-brand" href="acerca_de.html"><img src="imagenes/logo.png" class="logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
   
   <?php $nombre=$_SESSION['nombreusuario'] ; echo "<h1 class='bienvenida'>Bienvenid@ ".$nombre."</h1>"; ?>


<!-- boton desplegable -->
<div>
    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">

          <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" id="boton_desplegable">
            Empleador
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
</div>
</nav>
<?php 

//si el usuario realiza una busqueda, el sistema solo imprime lo que busco y no hace lo demas

if (isset($_POST['buscaroferta']))
{
echo '<meta http-equiv="refresh" content="0;url=http://localhost/proyecto/ver_ofertas.php">';
try
{
$oferta=$_POST['buscaroferta'];
$busqueda= "SELECT * FROM ofertas WHERE cargo = :oferta AND nombre = :nombre";
$buscaroferta = $conexion->query($busqueda);
if (isset($buscaroferta))
{

}
   }
  catch (PDOException $e)
   {
  echo "Error: " . $e->getMessage();
   }


  }
 
?>

  <!-- Opciones del empleador -->
    
  <div class="contenedor1">
  <a href="crear_oferta.php" class="btn-1"> CREAR OFERTA </a>
  </div>
  
  <div class="contenedor2">
  <a href="ver_ofertas.php" class="btn-2"> VISUALIZAR OFERTAS </a>
  </div>
  
  <div class="contenedor3">
  <a href="https://www.pse.com.co/persona-tu-primer-pago-por-pse"> METODO DE PAGO <img class= "pse" src="imagenes/pse.png"></a>
  </div>
    
<!-- informacion de contacto -->

<div id="contenedor">
<h1>Contactanos</h1>
<h2>Numero de celular: 3226007455 </h2> 
<h2>Correo electronico:<a href="https://accounts.google.com/AccountChooser/signinchooser?service=mail&continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&flowName=GlifWebSignIn&flowEntry=AccountChooser&ec=asw-gmail-globalnav-signin&theme=glif"> fastwork@gmail.com </a> </h2> 

</div>

</body>
</html>
    
