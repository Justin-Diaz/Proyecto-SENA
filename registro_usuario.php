<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registro_usuario.css">
    <title>Registrarse</title>
</head>
<body>

    <a href="pagina_principal.html" class="volver">« Volver</a>

    <form action="#" method="post" class="formulario">

    <input type="text" name="nombres" placeholder="Nombres" class="nombres" minlength="3" maxlength="50" required><br><br>

    <input type="text" name="apellidos" placeholder="Apellidos" class="apellidos" minlength="3" maxlength="50" required>

    <h1>Tipo de documento</h1>
    <select name="tipdoc" class="tipo_documento" required>
        <option value="1">Cedula de ciudadania</option>
        <option value="3">Cedula de extranjeria</option>
        <option value="2">Tarjeta de identidad</option>
    </select><br><br>

    <input type="text" name="numerodedocumento" placeholder="Numero de documento" class="num_documento" minlength="10" maxlength="10" required>
    
    <h1>Genero</h1>
    <select name="genero" required>
        <option value="2">Masculino</option>
        <option value="1">Femenino</option>
    </select>

    <h1>Ciudad de residencia</h1><select name="ciudadresidencia" class="ciudad_residencia" required>
        <option value="1">Bogota</option>
        <option value="2">Medellin</option>
    </select>

    <h1>Fecha de nacimiento</h1><input type="datetime-local" class="fechanacimiento" name="fechanac" required><br><br>

    <input type="text" name="nombreusuario" placeholder="Nombre de usuario" class="nombre_usuario" minlength="5" maxlength="20" required><br><br>

    <input type="password" name="contrasena" placeholder="Clave" class="clave" minlength="8" maxlength="50" required><br><br>

    <input type="password" name="confirmarcontrasena" placeholder="Confirmar clave" class="confirmar_clave" minlength="8" maxlength="50" required><br><br>

    <input type="email" name="correo" placeholder="Correo electronico" class="correo" minlength="10" maxlength="60" required><br><br>

    <input type="email" name="confirmarcorreo" placeholder="Confirme su correo" class="confirmar_correo" minlength="10" maxlength="60" required>

    <h1>Rol</h1><select name="rol" required>
    <option value="3">Usuario</option>
    <option value="2">Empleador</option>
    </select><br><br>

    <input type="text" name="numerocelular" placeholder="Numero de celular" class="num_celular" minlength="10" maxlength="10" required><br><br>

    <h1 class="terminos">Aceptar <a href="#">terminos</a> y <a href="#">condiciones</a></h1><input type="checkbox" name="acepta" value="aceptar" required><br><br>

    <input type="reset" value="Eliminar datos ingresados" class="eliminar"><br><br>
    
    <input type="submit" value="Enviar" class="enviar">

</form>

<?php
if (!extension_loaded('sodium')) 
{
die('<h1 class="error-ext-sodium">La extensión libsodium no está habilitada</h1>');
}
else
{
include_once 'conexionPDO.php';//incluir el archivo de conexion
if (isset($_POST['nombreusuario']) && isset($_POST['contrasena']))
{
$db = new Database(); // Crea una instancia de la clase Database
$conexion = $db->connectar();//conectar con la base de datos
try {

//almacenar los datos ingresados en el formulario en variables
$nombresform=$_POST['nombres'];
$apellidosform=$_POST['apellidos'];
$tipdoc=$_POST['tipdoc'];
$numerodedocumento=$_POST['numerodedocumento'];
$ciudadresidencia=$_POST['ciudadresidencia'];
$fechanac=$_POST['fechanac'];
$nombreusuario=$_POST['nombreusuario'];
$claveform=$_POST['contrasena'];
$confirmarclaveform=$_POST['confirmarcontrasena'];
$correoform=$_POST['correo'];
$confirmarcorreoform=$_POST['confirmarcorreo'];
$rol=$_POST['rol'];
$numerocelular=$_POST['numerocelular'];
$genero=$_POST['genero'];

// Verificar si la cadena contiene solo letras y espacios, en el campo nombres
if (preg_match('/^[a-zA-Z ]+$/', $nombresform)) 
    {
    // Convertir la primera letra y la letra despues de cada espacio a mayuscula 
    //(ucwords=convertir primera letra en mayuscula) (strtolower=convertir todas las letras a minuscula) (strtoupper==convertir todas las letras a mayuscula)
    $nombres = ucwords(strtolower($nombresform));

// Verificar si la cadena contiene solo letras y espacios, en el campo apellidos
if (preg_match('/^[a-zA-Z ]+$/', $apellidosform)) 
    {
    // Convertir la primera letra y la letra despues de cada espacio a mayuscula
    //(ucwords=convertir primera letra en mayuscula) (strtolower=convertir todas las letras a minuscula) (strtoupper==convertir todas las letras a mayuscula)
    $apellidos = ucwords(strtolower($apellidosform));
        
// Verificar si la cadena contiene solo numeros, en el campo numero de documento
if (ctype_digit($numerodedocumento)) 
    {

// Verificar si la cadena contiene solo numeros, en el campo numero de celular
if (ctype_digit($numerocelular)) 
    {

//segunda verificacion de que en los campos (numero de celular, numero de documento) son datos numericos
if (is_numeric($numerodedocumento) && is_numeric($numerocelular) )
{

//verificar que en los campos (numero de celular, numero de documento) los datos numericos ingresados, sean de tipo entero
if (filter_var($numerodedocumento, FILTER_VALIDATE_INT) && filter_var($numerocelular, FILTER_VALIDATE_INT))
{

//validar en correo electronico ingresado
if (filter_var($correoform, FILTER_VALIDATE_EMAIL))
{

//sanitizar el correo electronico ingresado
$correo = filter_var($correoform, FILTER_SANITIZE_EMAIL);

//validar la confirmacion de correo electronico
if (filter_var($confirmarcorreoform, FILTER_VALIDATE_EMAIL))
{

//sanitizar la confirmacion de correo electronico
$confirmarcorreo = filter_var($confirmarcorreoform, FILTER_SANITIZE_EMAIL);


//SALT DE INICIO

//generar un numero aleatorio para definir la cantidad de bytes que tendra la cadena del salt

$NUMEROALEATORIO = random_int(10, 16); // Genera un numero aleatorio seguro entre 10 y 16

//obtener una cadena aleatoria para posteriormente ser usada en el salt

$CANTIDASBYTES = $NUMEROALEATORIO; // longitud de la cadena de bytes que se va a generar
$BYTESALEATORIOS = random_bytes($CANTIDASBYTES);

// convertir los bytes a una representacion hexadecimal
$saltinicial = bin2hex($BYTESALEATORIOS);


//SALT FINAL

//generar un numero aleatorio para definir la cantidad de bytes que tendra la cadena del salt

$numeroaleatorio = random_int(10, 16); // Genera un numero aleatorio seguro entre 10 y 16

//obtener una cadena aleatoria para posteriormente ser usada en el salt

$cantidadbytes = $numeroaleatorio; // longitud de la cadena de bytes que se va a generar
$bytesaleatorios = random_bytes($cantidadbytes);

// convertir los bytes a una representacion hexadecimal
$saltfinal = bin2hex($bytesaleatorios);


//encriptar la contrasena usando (hash con el algoritmo 'Argon2' y salt)
//cabe recalcar que usando el algoritmo de 'Argon2' no es necesario usar sales adicionales, ya que este ya las incluye en dicho algoritmo, asi que en este caso solo se usan como un ejemplo

$clavesalt= $saltinicial.$claveform.$saltfinal;
$confirmarclavesalt =$saltinicial.$confirmarclaveform.$saltfinal;

$contrasena=sodium_crypto_pwhash_str
    (
    $contrasenaform,
    SODIUM_CRYPTO_PWHASH_OPSLIMIT_INTERACTIVE,
    SODIUM_CRYPTO_PWHASH_MEMLIMIT_INTERACTIVE
    );

//verificacion de igualdad
if ($contrasenaform===$confirmarcontrasenaform)
{

if ($correo===$confirmarcorreo)
{
//verificar que el numero de documento ingresado, no se encuentre ya registrado en la base de datos
$buscarnumdoc= "SELECT * FROM reg_usuarios WHERE num_documento='$numerodedocumento'";
$numdoc = $conexion->query($buscarnumdoc);
if ($numdoc)
        {
        while ($fila = $numdoc->fetch(PDO::FETCH_ASSOC))
            {
            $resultado=$fila["num_documento"];
            }
    if (isset($resultado))
        {
    if (($resultado)==($numerodedocumento))
        {
         echo '<script type="text/javascript">
         alert("el numero de documento ingresado ya se encuentra registrado en el sistema, intente con otro");
         </script>'; 
        }
        }   
    else
        {
//verificar que el numero de celular ingresado, no se encuentre ya registrado en la base de datos
$buscarnumcel= "SELECT * FROM reg_usuarios WHERE num_celular='$numerocelular'";
$numcel = $conexion->query($buscarnumcel);
if ($numcel)
        {
        while ($fila = $numcel->fetch(PDO::FETCH_ASSOC))
            {
            $resultado=$fila["num_celular"];
            }
    if (isset($resultado))
        {
    if (($resultado)==($numerocelular))
        {
         echo '<script type="text/javascript">
         alert("el numero de celular ingresado ya se encuentra registrado en el sistema, intente con otro");
         </script>'; 
        }
        }   
    else
        {
//verificar que el nombre de usuario ingresado, no se encuentre ya registrado en la base de datos
$buscarnomusua= "SELECT * FROM reg_usuarios WHERE nombre_usuario='$nombreusuario'";
$nomusua = $conexion->query($buscarnomusua);
if ($nomusua)
        {
        while ($fila = $nomusua->fetch(PDO::FETCH_ASSOC))
            {
            $resultado=$fila["nombre_usuario"];
            }
    if (isset($resultado))
        {
    if (($resultado)==($nombreusuario))
        {
         echo '<script type="text/javascript">
         alert("el nombre de usuario ingresado ya se encuentra registrado en el sistema, intente con otro");
         </script>'; 
        }
        }   
    else
        {
//verificar que el correo electronico ingresado, no se encuentre ya registrado en la base de datos
$buscaremail= "SELECT * FROM reg_usuarios WHERE email='$correo'";
$nomemail = $conexion->query($buscaremail);
if ($nomemail)
        {
        while ($fila = $nomemail->fetch(PDO::FETCH_ASSOC))
            {
            $resultado=$fila["email"];
            }
    if (isset($resultado))
        {
    if (($resultado)==($correo))
        {
         echo '<script type="text/javascript">
         alert("el correo electronico ingresado ya se encuentra registrado en el sistema, intente con otro");
         </script>'; 
        }
        }   
    else
        {

        //insertar los datos ingresados en el formulario, en la base de datos
        $insertar = "INSERT INTO reg_usuarios (nombres, apellidos, id_documento, num_documento, id_ciudad, fecha_nacimiento, nombre_usuario, clave, email, id_rol, num_celular, id_genero)
                                       VALUES (:nombres, :apellidos, :tipdoc, :numerodedocumento, :ciudadresidencia, :fechanac, :nombreusuario, :contrasena, :correo, :rol, :numerocelular, :genero)";
         
        //preparar la consulta para la insercion de los datos
        $stmt = $conexion->prepare($insertar);

        //escapar de una cadena de texto para prevenir inyeccion de datos
        $stmt->bindValue(':nombres', $nombres,PDO::PARAM_STR);
        $stmt->bindValue(':apellidos', $apellidos,PDO::PARAM_STR);
        $stmt->bindValue(':tipdoc', $tipdoc,PDO::PARAM_INT);
        $stmt->bindValue(':numerodedocumento', $numerodedocumento,PDO::PARAM_INT);
        $stmt->bindValue(':ciudadresidencia', $ciudadresidencia,PDO::PARAM_INT);
        $stmt->bindValue(':fechanac', $fechanac);
        $stmt->bindValue(':nombreusuario', $nombreusuario,PDO::PARAM_STR);
        $stmt->bindValue(':contrasena', $contrasena,PDO::PARAM_STR);
        $stmt->bindValue(':correo', $correo,PDO::PARAM_STR);
        $stmt->bindValue(':rol', $rol,PDO::PARAM_INT);
        $stmt->bindValue(':numerocelular', $numerocelular,PDO::PARAM_INT);
        $stmt->bindValue(':genero', $genero,PDO::PARAM_INT);

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
}
}
}
}
}
}
}
}
else
    {
     echo "Los correos ingresados no coinciden, verifique que sean exactamente iguales";
    }
}
else
    {
     echo "Las contraseñas ingresadas no coinciden, verifique que sean exactamente iguales";
    }
}
} 
else 
    {
    echo '<script type="text/javascript">
    alert("La dirrecion de correo electronico ingresado, NO ES VALIDO");
    </script>';
    }
}
else 
    {
    echo '<script type="text/javascript">
    alert("Los datos ingresados en el campo (numero de celular o numero de documento) no son validos, recuerde que estos deben ser de tipo entero (UNICAMENTE NUMEROS SIN CARACTERES ESPECIALES)");
    </script>';
    }
}
else
    {
    echo '<script type="text/javascript">
    alert("El campo (numero de celular o numero de documento) tiene caracteres no permitidos, recuerde que en este solo deben ingresarse (DATOS DE TIPO NUMERICOS)");
     </script>';
    }
}
else
    {
    echo '<script type="text/javascript">
    alert("El campo (numero de celular) tiene caracteres no permitidos, recuerde que en este solo deben ingresarse (numeros)");
     </script>';
    }

}
else 
    {
    echo '<script type="text/javascript">
    alert("El campo (numero de documento) tiene caracteres no permitidos, recuerde que en este solo deben ingresarse (numeros)");
    </script>';
    }
}
else 
    {
    echo '<script type="text/javascript">
    alert("El campo (apellidos) tiene caracteres no permitidos, recuerde que en este solo deben ingresarse (letras en minuscula y/o mayuscula y espacios)");
    </script>';
    }
}
else 
    {
    echo '<script type="text/javascript">
    alert("El campo (nombres) tiene caracteres no permitidos, recuerde que en este solo deben ingresarse (letras en minuscula y/o mayuscula y espacios)");
    </script>';
    }
}
catch (PDOException $e) {
echo "Error: " . $e->getMessage();
}
}
else 
    {
     echo "el nombre de usuario o clave no han sido ingresados";
    }
}
?>
</body>
</html>