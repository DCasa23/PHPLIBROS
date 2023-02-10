<?php

//conecto con la base de datos
$conn = mysqli_connect("localhost", "root", "");
 //Si da error aviso y cierro
        if (mysqli_connect_errno()) {
            echo "Error al conectar a MySQL: " . mysqli_connect_error();
            exit;
        }

//selecciono la BBDD
mysqli_select_db($conn,"mislibros"); 

//Función que devuelve la info del campo dado
function recogeDato($campo) {
	return isset($_POST[$campo]) ? $_POST[$campo] : "<label>No hay ningun dato</label>";
}

//Variables para cada campo

$usuario = recogeDato("usuario");
$contrasena = recogeDato("contrasena");



//Sentencia SQL para buscar un usuario con esos datos
$ssql = "SELECT * FROM usuario WHERE nombre='$usuario' and contrasena='$contrasena'";

//Ejecuto la sentencia
$rs = mysqli_query($conn,$ssql);

//vemos si el usuario y contraseña es váildo
//si la ejecución de la sentencia SQL nos da algún resultado
//es que si que existe esa conbinación usuario/contraseña
if (mysqli_num_rows($rs)!=0){
	//usuario y contraseña válidos
	session_name("loginUsuario");
	//defino una sesion y guardo datos
	session_start();
	$_SESSION["autentificado"]= "SI";
	header ("Location: index2.php");
}else {
	//si no existe le mando otra vez a la portada
	header("Location: loginusuario.php?errorusuario=si");
}
mysqli_free_result($rs);
mysqli_close($conn);

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
