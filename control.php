<?php

//si es necesario cambiar la config. del php.ini desde tu script
ini_set("session.use_only_cookies","1");
ini_set("session.use_trans_sid","0");

//vemos si el usuario y contraseña es váildo
if ($_POST["usuario"]=="admin" && $_POST["contrasena"]=="mio"){
	//usuario y contraseña válidos
	session_name("loginUsuario");
	//asigno un nombre a la sesión para poder guardar diferentes datos
   session_start();
	// inicio la sesión
	session_set_cookie_params(0, "/", $HTTP_SERVER_VARS["HTTP_HOST"], 0);
	//cambiamos la duración a la cookie de la sesión
    $_SESSION["autentificado"]= "SI";
	//defino la sesión que demuestra que el usuario está autorizado
	$_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s");
	//defino la fecha y hora de inicio de sesión en formato aaaa-mm-dd hh:mm:ss
	header ("Location: index2.php");
}else {
	//si no existe le mando otra vez a la portada
	header("Location: loginusuario.php?errorusuario=si");
}
echo "Nombre de usuario recuperado de la variable de sesión:" . $_SESSION['autentificado'];
?>
<head>
<title>Autentificación PHP</title>
</head>
<body>
	<h1>estas en control</h1>
 
<h2><?php echo $_POST["usuario"];
echo $_POST["contrasena"];
echo "ola"?></h2>
</body>
</html>
