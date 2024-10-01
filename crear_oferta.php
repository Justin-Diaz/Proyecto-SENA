<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear oferta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="editar_registro.js"></script> 
    <link rel="stylesheet" href="crear_oferta.css">
</head>
<body>

<a href="loginphp.php" class="volver">« Volver</a>

<?php
session_start();
$nombreusua=$_SESSION['nombreusuario'];
include_once 'conexionPDO.php';//incluir el archivo de conexion
?>
    
<form action="#" method="post" class="formulario">
<br>
<h1 class="titulo">Oferta creada por: <?php echo $nombreusua;?></h1><br><br>

<input type="text" name="cargo" placeholder="Cargo" class="cargo" minlength="3" maxlength="50" required><br><br>

<select name="ciudadresidencia" class="ciudad_residencia" required>
        <option value="1">Bogota</option>
        <option value="2">Medellin</option>
        </select><br><br>

<textarea type="text" name="caracteristicas" placeholder="Caracteristicas" class="caracteristicas" minlength="3" maxlength="200" required></textarea><br><br>

<textarea type="text" name="funciones" placeholder="Funciones" class="funciones" minlength="3" maxlength="200" required></textarea><br><br>

<input type="text" name="pago" placeholder="Pago" class="pago" minlength="3" maxlength="50" required><br><br>

</h1><input type="text" name="num_celular" placeholder="Numero de celular" class="num_celular" minlength="10" maxlength="10" required><br><br>

<input type="email" name="correo" placeholder="Correo" class="correo" minlength="8" maxlength="60" required><br><br>

<input type="reset" value="Eliminar datos ingresados" class="eliminar"><br>

<input type="submit" value="Enviar" class="enviar">

</form>

<?php
if (isset($_POST['cargo']))
{
$db = new Database(); // Crea una instancia de la clase Database
$conexion = $db->connectar();//conectar con la base de datos
try 
{
//almacenar los datos ingresados en el formulario en variables
$cargo=$_POST['cargo'];
$ciudadresidencia=$_POST['ciudadresidencia'];
$caracteristicas=$_POST['caracteristicas'];
$funciones=$_POST['funciones'];
$pago=$_POST['pago'];
$num_celular=$_POST['num_celular'];
$correo=$_POST['correo'];

//insertar los datos ingresados en el formulario, en la base de datos
$insertar = "INSERT INTO ofertas (cargo, ciudad, caracteristicas, funciones, pago, nombre, num_celular, correo)
VALUES (:cargo, :ciudadresidencia, :caracteristicas, :funciones, :pago, :nombreusua, :num_celular, :correo)";

//preparar la consulta para la insercion de los datos
$stmt = $conexion->prepare($insertar);

//escapar de una cadena de texto para prevenir inyeccion de datos
$stmt->bindValue(':cargo', $cargo,PDO::PARAM_STR);
$stmt->bindValue(':ciudadresidencia', $ciudadresidencia,PDO::PARAM_STR);
$stmt->bindValue(':caracteristicas', $caracteristicas,PDO::PARAM_STR);
$stmt->bindValue(':funciones', $funciones,PDO::PARAM_STR);
$stmt->bindValue(':pago', $pago,PDO::PARAM_INT);
$stmt->bindValue(':nombreusua', $nombreusua,PDO::PARAM_STR);
$stmt->bindValue(':num_celular', $num_celular,PDO::PARAM_INT);
$stmt->bindValue(':correo', $correo,PDO::PARAM_STR);

//ejecutar la consulta
$stmt->execute();

if ($stmt)
{
//verificar que los datos se allan ingresado correctamente
if ($stmt->rowCount() > 0)
{
echo '<script type="text/javascript">
      alert("Datos ingresados correctamente");
      </script>';
}
echo '<meta http-equiv="refresh" content="0;url=http://localhost/proyecto/loginphp.php">';
}
}
// en caso de error, emitir mensaje
catch (PDOException $e) 
{
echo "Error: " . $e->getMessage();
}
}


?>

    
</body>
</html>