<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<?php
//Introduzco las variables para error y los campos

$errorpassword = $errorusuario = "";
$observaciones = $usuario = $password = "";

//Introduzco 5 variables para controlar los errores

$fallo=true;
$fallo1=true;
$fallo2=true;


//Mediante esta función se permitirá filtrar los datos sin errores

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//Este filtro permitirá controlar cuando un valor esta vacio o esta introducido

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["usuario"])) {
        $errorusuario = "Nombre es requerido";
        
    } else {
        $usuario = test_input($_POST["usuario"]);
        // Checkea si solo tiene espacios y letras
        $fallo1=false;
    }

    if (empty($_POST["password"])) {
        $errorpassword = "Contraseña es requerido";
        
    } else {
        $password = test_input($_POST["password"]);
        // Chequea el correo
        $fallo2=false;
    }

    

   if($fallo1==false&&$fallo2==false){
       $fallo=false;
       
   }
}
//A continuación, viene el cuerpo del formulario
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1 style='color: blue'>Bienvenido a su tienda de Libros</h1>
        <p>Introduzca su perfil de Usuario y Acceda</p>
        <form id="myform" style='width:900px;padding: 50px; border:5px dashed blue' action="<?php if($fallo==true){echo htmlspecialchars($_SERVER["PHP_SELF"]);}
        if($_POST[$usuario]=="admin"){echo"index22.php";}else{echo"index.php";}
        ?>" method="POST" enctype="form-data">
            <br>
            <div>
                <label for="usuario">Usuario: </label>

                <input type="text" name="usuario" value="">
                
                <span class="error" style="color: red"><?php echo $errorusuario ?></span>
            </div>
            <br>
            <div>
                <label for="password">Contraseña: </label>


                <input type="text" name="password" value="">
                <span class="error" style="color: red"><?php echo $errorpassword ?></span>

            </div>
            <br>
            <input type="reset"></input>
            <input type="submit"></input>
        </form>
        
<br>
<input type="checkbox" name="guardar_clave" value="1"> Memorizar el usuario en este ordenador
<br>

        <a href="TablaResultados.php" target="_blank">Consultar Datos</a>
    </body>
</html>

