<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="perfil.css">
</head>
<body>

<a href="loginphp.php" class="volver">« Volver</a>

<?php

include_once 'conexionPDO.php';
$db = new Database(); // Crea una instancia de la clase Database
$conexion = $db->connectar();//conectar con la base de datos
session_start();
$nombre=$_SESSION['nombreusuario'];

//buscar el perfil del usuario ingresado
$buscarperfil="SELECT * FROM reg_usuarios WHERE nombre_usuario = '$nombre'";
$perfil = $conexion->query($buscarperfil);
if ($perfil)
{
//almacenar sus datos en variables
while ($fila = $perfil->fetch(PDO::FETCH_ASSOC))
    {
    $id=$fila["id"];
    $nombres=$fila["nombres"];
    $apellidos=$fila["apellidos"];
    $id_documento=$fila["id_documento"];
    $num_documento=$fila["num_documento"];
    $id_ciudad=$fila["id_ciudad"];
    $fecha_nacimiento=$fila["fecha_nacimiento"];
    $nombre_usuario=$fila["nombre_usuario"];
    $clave=$fila["clave"];
    $email=$fila["email"];
    $id_rol=$fila["id_rol"];
    $num_celular=$fila["num_celular"];
    $id_genero=$fila["id_genero"];
    }
?>

<!-- imprimir sus datos -->

<div class="datos">
<h1>Nombres:</h1> <h2><?php echo $nombres; ?></h2><hr>
<h1>Apellidos:</h1> <h2><?php echo $apellidos; ?></h2><hr>
<h1>Numero de documento:</h1> <h2><?php echo $num_documento; ?></h2><hr>
<h1>Fecha de nacimiento:</h1> <h2><?php echo $fecha_nacimiento; ?></h2><hr>
<h1>Nombre de usuario:</h1> <h2><?php echo $nombre_usuario; ?></h2><hr>
<h1>Contraseña:</h1> <h2><?php echo $clave; ?></h2><hr>
<h1>Correo electronico:</h1> <h2><?php echo $email; ?></h2><hr>
<h1>Numero de celular:</h1> <h2><?php echo $num_celular; ?></h2><hr>

<button class="editar"><a href="perfil.php? editar= <?php echo $id; ?>">Editar datos</a></button>

</div>

<?php

// cuando oprime el boton editar
if (isset($_GET['editar']))
{
$editar_id=$_GET['editar'];

if (isset($editar_id))
{
$editar="SELECT * FROM reg_usuarios WHERE id='$editar_id'";
$nuevos = $conexion->query($editar);
if ($nuevos)
{
  while ($fila = $nuevos->fetch(PDO::FETCH_ASSOC))
{
$id=$fila["id"];
$nombres=$fila["nombres"];
$apellidos=$fila["apellidos"];
$num_documento=$fila["num_documento"];
$id_ciudad=$fila["id_ciudad"];
$fecha_nacimiento=$fila["fecha_nacimiento"];
$nombre_usuario=$fila["nombre_usuario"];
$clave=$fila["clave"];
$email=$fila["email"];
$num_celular=$fila["num_celular"];
}
}
?>
<!-- editar los datos de una columna de la tabla -->

<div class="edicion">  

    <form method="POST" action="#">

		Nombres <input type="text" name="nombres"   value="<?php echo $nombres ?>"><br>

		Apellidos  <input type="text" name="apellidos"   value="<?php echo $apellidos    ?>"><br>

    Numero de documento</h1> <input type="text" name="num_documento" value="<?php echo $num_documento  ?>"> <br>

    Ciudad de residencia</h1> <select name="id_ciudad" class="ciudad_residencia" required>
        <option value="1">Bogota</option>
        <option value="2">Medellin</option>
    </select><br>

    Fecha de nacimiento</h1> <input type="datetime-local"  name="fecha_nacimiento" value="<?php echo $fecha_nacimiento  ?>"> <br>

    Nombre de usuario</h1> <input type="text" name="nombre_usuario" value="<?php echo $nombre_usuario  ?>"> <br>

    Contraseña</h1> <input type="password" name="clave" value="<?php echo $clave  ?>"> <br>

    Correo electronico</h1> <input type="email" name="email" value="<?php echo $email  ?>"> <br>

    Numero de celular</h1> <input type="text" name="num_celular" value="<?php echo $num_celular  ?>"> <br><br>

		<input type="submit"  name="actualizar" class="btn-actualizar" value="Actualizar Datos" style="cursor: pointer;"><br>
	  </form>

</div>
  
<?php
}
}
unset($_GET['editar']);
// cuando oprime el boton actualizar
if (isset($_POST['actualizar']))
  {
    $actualizarnombres=$_POST['nombres'];
    $actualizarapellidos=$_POST['apellidos'];
    $actualizarnum_documento=$_POST['num_documento'];
    $actualizarid_ciudad=$_POST['id_ciudad'];
    $actualizarfecha_nacimiento=$_POST['fecha_nacimiento'];
    $actualizarnombre_usuario=$_POST['nombre_usuario'];
    $actualizarclave=$_POST['clave'];
    $actualizaremail=$_POST['email'];
    $actualizarnum_celular=$_POST['num_celular'];

  // insertar los datos ya actualizados en la base de datos
  $actualizar = "UPDATE reg_usuarios SET nombres = '$actualizarnombres', apellidos = '$actualizarapellidos', num_documento ='$actualizarnum_documento', id_ciudad = '$actualizarid_ciudad', 
  fecha_nacimiento = '$actualizarfecha_nacimiento', nombre_usuario = '$actualizarnombre_usuario', clave = '$actualizarclave', email = '$actualizaremail', num_celular = '$actualizarnum_celular' WHERE id = '$editar_id'";
  $ejecutar=$conexion->query($actualizar);
  // verificar si los datos se actualizaron                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
  	if ($ejecutar)
		{
    echo "<script>
    alert ('Registros actualizados correctamente')
    </script> ";
		echo '<meta http-equiv="refresh" content="0;url=http://localhost/proyecto/usuario.php">';
		}
	else
		{
		echo "<script>
		alert ('El registro no se pudo actualizar')
		</script> ";
		}
  }
	unset($_POST['actualizar']);
}

?>

</body>
</html>