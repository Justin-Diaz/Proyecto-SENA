<?php
include_once 'conexionPDO.php';
session_start();
if(!isset($_SESSION['id_rol']))
	{
		header('location: loginphp.php');
	}
else
	{
		if($_SESSION['id_rol'] !=4)
			{
				header('location: loginphp.php');
			}
	}
?>
<html>
	<head>
	<title>Invitado</title>
	<link rel="stylesheet" href="invitado.css">
	</head>
<body>

<div class="dropdown">
    <button class="dropbtn">Invitado</button>
    <div class="dropdown-content">
        <a href="#">Perfil</a>
        <form action="loginphp.php" method="POST">
			<input type="submit" name="cerrar_sesion" value="CERRAR SESION" class="cerrar_sesion">
		</form>
    </div>
</div>




</body>
</html>