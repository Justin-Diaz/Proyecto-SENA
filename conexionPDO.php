<?php
class Database
{
  private $servidorlocal;
  private $basededatos;
  private $usuario;
  private $clave;
  private $caracteres;
    function connectar()
      {
      $servidorlocal = 'localhost';
      $basededatos   = 'proyecto';
      $usuario       = 'root';
      $clave         = '';
      $caracteres    = 'utf8';
        try
          {
            $conexion = "mysql:host=".$servidorlocal.";dbname=".$basededatos.";charset=".$caracteres;
            $opciones = [
                          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                          PDO::ATTR_EMULATE_PREPARES  => false
                        ];
            $pdo = new PDO($conexion, $usuario, $clave, $opciones);
            return $pdo;
          }
        catch(PDOException $error)
          {
            echo 'Error en la conexion:  '.$error->getMessage();
          }
      }
}
?>

<?php

// class Database
// {
//   public function connectar()
//   {
//     try 
//     {
//       $conexion = new PDO('mysql:host=localhost;dbname=proyecto;charset=utf8', 'root', '');
//       $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//       return $conexion;
//     } 
//     catch (PDOException $muestraError) 
//     {
//       die("Error en conexión a bd: " . $muestraError->getMessage());
//     }
//   }
// }

?>    