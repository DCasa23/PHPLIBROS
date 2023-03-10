<?php
//si es necesario cambiar la config. del php.ini desde tu script
ini_set("session.use_only_cookies","1");
ini_set("session.use_trans_sid","0");

//iniciamos la sesión
session_name("loginUsuario");
session_start();
session_set_cookie_params(0, "/", $HTTP_SERVER_VARS["HTTP_HOST"], 0);
//cambiamos la duración a la cookie de la sesión

//antes de hacer los cálculos, compruebo que el usuario está logueado
//utilizamos el mismo script que antes
if ($_SESSION["autentificado"] != "SI") {
	//si no está logueado lo envío a la página de autentificación
	header("Location: loginusuario.php");
} else {
	//sino, calculamos el tiempo transcurrido
	$fechaGuardada = $_SESSION["ultimoAcceso"];
	$ahora = date("Y-n-j H:i:s");
	$tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada));
	//comparamos el tiempo transcurrido
 	if($tiempo_transcurrido >= 600) {
 	//si pasaron 10 minutos o más
  	session_destroy(); // destruyo la sesión
  	header("Location: index2.php"); //envío al usuario a la pag. de autenticación
      //sino, actualizo la fecha de la sesión
	}else {
	$_SESSION["ultimoAcceso"] = $ahora;
   }
}
?>
