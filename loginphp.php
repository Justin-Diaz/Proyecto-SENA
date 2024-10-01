
<!-- Representa la raíz de un documento HTML o XHTML. Todos los demás elementos deben ser descendientes de este elemento. -->
<html lang="es">
    
    <head>
        
        <meta charset="utf-8">
            
        <title> Iniciar Sesion </title>    
            
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Videojuegos & Desarrollo">
        <meta name="description" content="Ejemplo de formulario de acceso basado en HTML5 y CSS">
        <meta name="keywords" content="login,formulariode acceso html">
            <link href="login1.css" rel="stylesheet"> 
            
            <!-- Link hacia el archivo de estilos css -->
            <link rel="stylesheet" href="login_basico.css">
            <style type="text/css">
            </style>
    </head>
    
         <body>
    
            <div id="contenedor">
                
                <div id="contenedorcentrado">
                    <div id="login">
                        <form action="#" method="post">

                            <label for="usuario">Usuario</label>
                            <input id="usuario" type="text" name="nombreusuario" placeholder="Usuario" required>
                            
                            <label for="password">Contraseña</label>
                            <input id="password" type="password" placeholder="Contraseña" name="contrasena" required>
                            
                            <button type="submit" title="Ingresar" name="Ingresar">Login</button>
                        </form>
                        
                    </div>
                    <div id="derecho">
                        <div class="titulo">
                            FAST WORK
                        </div>
                        <hr>
                        <div class="pie-form">
                            BIENVENIDO
                            <hr>
                            <a href="pagina_principal.html">« Volver</a>
                        </div>
                    </div>
                </div>
            </div>

                <?php

                include_once 'conexionPDO.php';
                session_start();
                if(isset($_POST['cerrar_sesion']))
                    {
                        include_once 'cerrar.php';
                        /*session_unset();
                        session_destroy();*/
                    }
                if(isset($_SESSION['id_rol']))
                    {
                        switch ($_SESSION['id_rol']) 
                        {
                            case 1:
                                header('Location: administrador.php');
                                break;
                            case 2:
                                header('Location: empleador.php');
                                break;
                            case 3:
                                header('Location: usuario.php');
                                break;
                            case 4:
                                header('Location: invitado.php');
                                break;
                            default:
                                echo "Este rol no existe dentro de las opciones";
                                break;
                        }
                    }
                if (isset($_POST['nombreusuario']) && isset($_POST['contrasena']))
                    {
                        $username=$_POST['nombreusuario'];
                        $password=$_POST['contrasena'];

                        $db=new Database();
                        $query=$db->connectar()->prepare('SELECT * FROM reg_usuarios WHERE nombre_usuario=:nombreusuario AND clave=:contrasena');
                        $query->execute(['nombreusuario'=>$username,'contrasena'=>$password]);
                        $arreglofila=$query->fetch(PDO::FETCH_NUM);

                        if ($arreglofila == true ) 
                            {
                                $rol=$arreglofila[10];
                                $_SESSION['id_rol']=$rol;
                                switch ($rol) 
                                    {
                                        case 1:
                                            header('Location: administrador.php');
                                            break;
                                        case 2:
                                            header('Location: empleador.php');
                                            break;
                                        case 3:
                                            header('Location: usuario.php');
                                            break;
                                        case 4:
                                            header('Location: invitado.php');
                                            break;
                                        default:
                                            echo "Este rol no existe dentro de las opciones";
                                            break;
                                    }
                                    $usuario=$arreglofila[7];
                                    $_SESSION['nombreusuario']=$usuario;
                            }
                            else
                            {
                            echo '<script type="text/javascript">
                                alert("nombre de usuario o contraseña incorrecto");
                                </script>'; 
                            } 
                    }
            ?>
    </body>
 </html>	