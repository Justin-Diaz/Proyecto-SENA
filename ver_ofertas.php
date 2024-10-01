<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar ofertas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="ver_ofertas.css">
</head>

<body>

<a href="loginphp.php" class="volver">« Volver</a>

<?php
session_start();
include_once 'conexionPDO.php';//incluir el archivo de conexion
$db = new Database(); // Crea una instancia de la clase Database
$conexion = $db->connectar();//conectar con la base de datos

$nombreusua=$_SESSION['nombreusuario'];

$buscaroferta= "SELECT * FROM ofertas WHERE nombre='$nombreusua'";
$ofertas = $conexion->query($buscaroferta);
if (isset($ofertas))
    {
    try
    {
    while ($fila = $ofertas->fetch(PDO::FETCH_ASSOC))
        {  
        $id=$fila["id"]; 
        $cargo=$fila["cargo"];
        $ciudad =$fila["ciudad"];
        $caracteristicas=$fila["caracteristicas"];
        $funciones=$fila["funciones"];
        $pago=$fila["pago"];
        $nombre=$fila["nombre"];
        $num_celular=$fila["num_celular"];
        $correo=$fila["correo"];
        ?>

<!-- visualizar ofertas        -->
<div class="card text-center mb-3" style="width: 18rem;" id="targeta2">
  <div class="card-body">
    <h5 class="card-title"><h1>Cargo</h1><?php echo $cargo?></h5><hr>
    <p class="card-text"><h5>Ciudad de residencia</h5><?php echo$ciudad?></p><hr>
    <p class="card-text"><h5>Caracteristicas</h5><?php echo $caracteristicas?></p><hr>
    <p class="card-text"><h5>Funciones</h5><?php echo $funciones?></p><hr>
    <p class="card-text"><h5>Pago</h5><?php echo "$".$pago?></p><hr>
    <p class="card-text"><h5>Nombre de usuario</h5><?php echo $nombre?></p><hr>
    <p class="card-text"><h5>Numero de celular</h5><?php echo $num_celular?></p><hr>
    <p class="card-text"><h5>Correo electronico</h5><?php echo $correo?></p><hr>
    <a href="ver_ofertas.php? editar= <?php echo $id; ?>" class="btn btn-primary" id="btn-editar">Editar oferta</a><br><hr>
    <a href="ver_ofertas.php? eliminar= <?php echo $id; ?>" class="btn btn-primary" id="btn-eliminar">Eliminar oferta</a><br><hr>
    <a href="ver_ofertas.php? ver= <?php echo $id; ?>"  class="btn btn-primary" id="btn-oferta">Ver aplicaciones</a>
  </div>
</div>

<?php
        }
}
catch (PDOException $e)
{
echo "Error: " . $e->getMessage();
}

// cuando oprime el boton editar
if (isset($_GET['editar']))
{
$editar_id=$_GET['editar'];

if (isset($editar_id))
{
$editar="SELECT * FROM ofertas WHERE id='$editar_id'";
$nuevos = $conexion->query($editar);
if ($nuevos)
{
  while ($fila = $nuevos->fetch(PDO::FETCH_ASSOC))
{
    $cargo=$fila["cargo"];
    $ciudad =$fila["ciudad"];
    $caracteristicas=$fila["caracteristicas"];
    $funciones=$fila["funciones"];
    $pago=$fila["pago"];
    $nombre=$fila["nombre"];
    $num_celular=$fila["num_celular"];
    $correo=$fila["correo"];
}
}
?>
<!-- editar los datos de una columna de la tabla -->
<div class="container1">
<h1 id="editar-oferta">Editar oferta<a href="ver_ofertas.php"><button class="cerrar1">X</button></a></h1>
<div class="editar-oferta">

  <form method="post" action="#">

	<h1>Cargo</h1> <input type="text" name="cargo" minlength="3" required value="<?php echo $cargo ?>"><br><hr class="linea-edit-oferta">
	<h1>Ciudad de residencia</h1> <input type="text" name="ciudad"  minlength="3" required  value="<?php echo $ciudad    ?>"><br><hr class="linea-edit-oferta">
	<h1>Caracteristicas</h1> <textarea type="text" name="caracteristicas" minlength="10" required placeholder="<?php echo $caracteristicas ?>"></textarea><br><hr class="linea-edit-oferta">
  <h1>Funciones</h1><textarea type="text" name="funciones" required  minlength="10" placeholder="<?php echo $funciones  ?>"></textarea><br><hr class="linea-edit-oferta">
  <h1>Pago</h1><input type="text" name="pago" required  minlength="1" value="<?php echo $pago  ?>"> <br><hr class="linea-edit-oferta">
  <h1>Nombre del creador</h1><input type="text" name="nombre" minlength="1" required value="<?php echo $nombre  ?>" readonly> <br><hr class="linea-edit-oferta">
  <h1>Numero de celular</h1><input type="text" name="num_celular" minlength="10" required value="<?php echo $num_celular  ?>"> <br><hr class="linea-edit-oferta">
  <h1>Correo electronico</h1><input type="text" name="correo" minlength="5" required value="<?php echo $correo  ?>"> <br><br><hr class="linea-edit-oferta">
  <input type="submit"  name="actualizar" class="btn-actualizar" value="Actualizar Datos" style="cursor: pointer;"><br>

	</form>

</div>
</div>
  
<?php
}
}
unset($_GET['editar']);
// cuando oprime el boton actualizar datos
if (isset($_POST['actualizar']))
  {
    $cargo=$_POST["cargo"];
    $ciudad =$_POST["ciudad"];
    $caracteristicas=$_POST["caracteristicas"];
    $funciones=$_POST["funciones"];
    $pago=$_POST["pago"];
    $nombre=$_POST["nombre"];
    $num_celular=$_POST["num_celular"];
    $correo=$_POST["correo"];

  // insertar los datos ya actualizados en la base de datos
  $actualizar = "UPDATE ofertas SET cargo = '$cargo', ciudad = '$ciudad', caracteristicas = '$caracteristicas', funciones ='$funciones', pago = '$pago', 
  nombre = '$nombre', num_celular = '$num_celular', correo = '$correo' WHERE id = '$editar_id'";
  $ejecutar=$conexion->query($actualizar);
  // verificar si los datos se actualizaron                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
  	if ($ejecutar)
		{
    echo "<script>
    alert ('Registros actualizados correctamente')
    </script> ";
		echo '<meta http-equiv="refresh" content="0;url=http://localhost/proyecto/ver_ofertas.php">';
		}
	else
		{
		echo "<script>
		alert ('El registro no se pudo actualizar')
		</script> ";
		}
  }
unset($_POST['actualizar']);


// cuando oprime el boton eliminar
if (isset($_GET['eliminar']))
  {
  try
  {
   $borrar = $_GET['eliminar'];
   $eliminar = "DELETE FROM ofertas WHERE id = '$borrar'";
   $ejecutar= $conexion->query($eliminar);
   if ($ejecutar)
      {
      echo '<meta http-equiv="refresh" content="0;url=http://localhost/proyecto/ver_ofertas.php">';
      }
    else
      {
      echo "<script>alert ('No se logro eliminar el registro')</script> ";
      }
  }

catch (PDOException $e) 
{
    die("Error en conexión a la base de datos: " . $e->getMessage());
}
unset($_GET['eliminar']);
  }

//cuando oprime el boton ver ofertas
if (isset($_GET['ver']))
{
try
{
$ver_aplicaciones=$_GET['ver'];
$buscarperfiles="SELECT * FROM aplicaciones_ofertas WHERE nombre_creador = '$nombreusua' AND id_ofertas = '$ver_aplicaciones'";
$buscar= $conexion->query($buscarperfiles);
if (isset($buscar))
{
  ?>
  <div class="container2">
  <h1 class="ver_aplicados">Usuarios aplicados<a href="ver_ofertas.php"><button class="cerrar2">X</button></a></h1>
  <table class="perfiles">
  <?php
  while ($fila = $buscar->fetch(PDO::FETCH_ASSOC))
  {
  $nombre_usuario=$fila['nombre_usuario'];
  ?>

  <tr><td><h1><?php echo $nombre_usuario;?></h1></tc>
  <a href="perfil.php"><button class="ver-perfil">Ver perfil</button></a>
 
  <?php
  }
  ?>

 </table>
 <br><br>
 </div>
 
<?php
}
else
  {
    echo "<script>
    alert ('No se encontraron usuarios aplicados a la oferta seleccionada')
    </script> ";
  }


}
catch (PDOException $e)
  {
   echo "Error: ".$e->getmessage();
  }

}

} 
    
?>

</body>
</html>