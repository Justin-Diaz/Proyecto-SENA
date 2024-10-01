<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registros</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="editar_registro.js"></script> 
    <link rel="stylesheet" href="ver_registros.css">

<!-- datatables -->
<link href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
<link href="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

</head>
<body>

<table class="table table-striped mt-3" id="myTable">
<!-- cabezera de la tabla -->
<thead class="table-dark"><th>id</th><th>nombres</th><th>apellidos</th><th>id_documento</th><th>num_documento</th><th>id_ciudad</th><th>fecha_nacimiento</th><th>nombre_usuario</th><th>clave</th><th>email</th><th>id_rol</th><th>num_celular</th>
<th>id_genero</th><th>Edicion</th><th>Eliminar</th></thead>
<?php

include_once 'conexionPDO.php';//incluir el archivo de conexion
$db = new Database(); // Crea una instancia de la clase Database
$conexion = $db->connectar();//conectar con la base de datos
// buscar si hay registros en la base de datos
$buscar= "SELECT * FROM reg_usuarios";
$registros = $conexion->query($buscar);
if ($registros)
  {
  while ($fila = $registros->fetch(PDO::FETCH_ASSOC))
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
?>
<tr><td><?php echo $id;?></tc>
<tc><td><?php echo $nombres;?></tc>
<tc><td><?php echo $apellidos;?></tc>
<tc><td><?php echo $id_documento;?></tc>
<tc><td><?php echo $num_documento;?></tc>
<tc><td><?php echo $id_ciudad;?></tc>
<tc><td><?php echo $fecha_nacimiento;?></tc>
<tc><td><?php echo $nombre_usuario;?></tc>
<tc><td><?php echo $clave;?></tc>
<tc><td><?php echo $email;?></tc>
<tc><td><?php echo $id_rol;?></tc>
<tc><td><?php echo $num_celular;?></tc>
<tc><td><?php echo $id_genero;?></tc>
<tc><td><button class="Editar"><a href="ver_registros.php? editar= <?php echo $id; ?>">Editar</a></button></tc>
<tc><td><button class="Eliminar"><a href="ver_registros.php? eliminar= <?php echo $id; ?>">Eliminar</a></button></tc>

<?php
}
}
?>
</table><br>
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
}
?>
<!-- editar los datos de una columna de la tabla -->
<div class="edicion">  
    <form method="POST" action="#">
		nombres  <input type="text" name="nombres"   value="<?php echo $nombres ?>"><br>
		apellidos  <input type="text" name="apellidos"   value="<?php echo $apellidos    ?>"><br>
		id_documento  <input type="text"  name="id_documento"   value="<?php echo $id_documento    ?>"><br>
    num_documento <input type="text" name="num_documento" value="<?php echo $num_documento  ?>"> <br>
    id_ciudad <input type="text" name="id_ciudad" value="<?php echo $id_ciudad  ?>"> <br>
    fecha_nacimiento <input type="datetime-local"  name="fecha_nacimiento" value="<?php echo $fecha_nacimiento  ?>"> <br>
    nombre_usuario <input type="text" name="nombre_usuario" value="<?php echo $nombre_usuario  ?>"> <br>
    clave <input type="text" name="clave" value="<?php echo $clave  ?>"> <br>
    email <input type="email" name="email" value="<?php echo $email  ?>"> <br>
    id_rol <input type="text" name="id_rol" value="<?php echo $id_rol  ?>"> <br>
    num_celular <input type="text" name="num_celular" value="<?php echo $num_celular  ?>"> <br>
    id_genero <input type="text" name="id_genero" value="<?php echo $id_genero  ?>"> <br><br>

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
    $actualizarid_documento=$_POST['id_documento'];
    $actualizarnum_documento=$_POST['num_documento'];
    $actualizarid_ciudad=$_POST['id_ciudad'];
    $actualizarfecha_nacimiento=$_POST['fecha_nacimiento'];
    $actualizarnombre_usuario=$_POST['nombre_usuario'];
    $actualizarclave=$_POST['clave'];
    $actualizaremail=$_POST['email'];
    $actualizarid_rol=$_POST['id_rol'];
    $actualizarnum_celular=$_POST['num_celular'];
    $actualizarid_genero=$_POST['id_genero'];

  // insertar los datos ya actualizados en la base de datos
  $actualizar = "UPDATE reg_usuarios SET nombres = '$actualizarnombres', apellidos = '$actualizarapellidos', id_documento = '$actualizarid_documento', num_documento ='$actualizarnum_documento', id_ciudad = '$actualizarid_ciudad', 
  fecha_nacimiento = '$actualizarfecha_nacimiento', nombre_usuario = '$actualizarnombre_usuario', clave = '$actualizarclave', email = '$actualizaremail', id_rol = '$actualizarid_rol', num_celular = '$actualizarnum_celular',
  id_genero = '$actualizarid_genero' WHERE id = '$editar_id'";
  $ejecutar=$conexion->query($actualizar);
  // verificar si los datos se actualizaron                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
  	if ($ejecutar)
		{
    echo "<script>
    alert ('Registros actualizados correctamente')
    </script> ";
		echo '<meta http-equiv="refresh" content="0;url=http://localhost/proyecto/ver_registros.php">';
		}
	else
		{
		echo "<script>
		alert ('El registro no se pudo actualizar')
		</script> ";
		}
  }
	unset($_POST['actualizar']);

?>
</table>
<?php
// cuando oprime el boton eliminar
if (isset($_GET['eliminar']))
  {
  try
  {
   $borrar = $_GET['eliminar'];
   $eliminar = "DELETE FROM reg_usuarios WHERE id = '$borrar'";
   $ejecutar= $conexion->query($eliminar);
   if ($ejecutar)
      {
      echo '<meta http-equiv="refresh" content="0;url=http://localhost/proyecto/ver_registros.php">';
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
  } 
  unset($_GET['eliminar']);

?>

<script>	
$(document).ready( function () {
    $('#myTable').DataTable({
        "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        }
    });
});
</script>
<a href="loginphp.php" class="volver">« Volver</a>
</body>
</html>