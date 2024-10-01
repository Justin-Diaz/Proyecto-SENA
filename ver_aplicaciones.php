<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar ofertas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="ver_aplicaciones.css">
</head>

<body>

<a href="loginphp.php" class="volver">« Volver</a>

<?php
session_start();
include_once 'conexionPDO.php';//incluir el archivo de conexion
$db = new Database(); // Crea una instancia de la clase Database
$conexion = $db->connectar();//conectar con la base de datos

$nombreusua=$_SESSION['nombreusuario'];

//buscar el id de las ofertas a las que el usuario alla aplicado
$buscaraplicacion="SELECT * FROM aplicaciones_ofertas WHERE nombre_usuario = '$nombreusua'";
$aplicaciones = $conexion->query($buscaraplicacion);
if (isset($aplicaciones))
{
    while ($fila = $aplicaciones->fetch(PDO::FETCH_ASSOC))
    {
    $idaplicacion=$fila["id_ofertas"];

    //buscar las ofertas a las que el usuario alla aplicado
    $buscaroferta= "SELECT * FROM ofertas WHERE id ='$idaplicacion'";
    $ofertas = $conexion->query($buscaroferta);
    if (isset($ofertas))
        {
        try
        {
        while ($fila = $ofertas->fetch(PDO::FETCH_ASSOC))
            {  
            $idoferta=$fila["id"]; 
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
        <a href="ver_aplicaciones.php? eliminar= <?php echo $idaplicacion; ?>" class="btn btn-primary" id="btn-eliminar">Eliminar aplicacion</a><br>
      </div>
    </div>
    
    <?php
            }
    }
    catch (PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
    // cuando oprime el boton eliminar
    if (isset($_GET['eliminar']))
      {
      try
      {
       $borrar = $_GET['eliminar'];
       $eliminar = "DELETE FROM aplicaciones_ofertas WHERE id_ofertas = '$borrar'";
       $ejecutar= $conexion->query($eliminar);
       if ($ejecutar)
          {
          echo "<script>alert ('Aplicacion eliminada correctamente')</script> ";
          echo '<meta http-equiv="refresh" content="0;url=http://localhost/proyecto/ver_aplicaciones.php">';
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
    } 
    }
}







    
?>

</body>
</html>