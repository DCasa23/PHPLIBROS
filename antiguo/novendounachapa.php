<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<?php
//Introduzco las variables para error y los campos

$errorobservaciones = $errortamaño = $errorprecio = $errordireccion = "";
$observaciones = $tamaño = $precio = $direccion = "";

//Introduzco 5 variables para controlar los errores

$fallo=true;
$fallo1=true;
$fallo2=true;
$fallo3=true;
$fallo4=true;

//Mediante esta función se permitirá filtrar los datos sin errores

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//Este filtro permitirá controlar cuando un valor esta vacio o esta introducido

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["direccion"])) {
        $errordireccion = "Nombre es requerido";
        
    } else {
        $direccion = test_input($_POST["direccion"]);
        // Checkea si solo tiene espacios y letras
        $fallo1=false;
    }

    if (empty($_POST["metros"])) {
        $errortamaño = "Tamaño requerido";
        
    } else {
        $tamaño = test_input($_POST["metros"]);
        // Chequea el correo
        $fallo2=false;
    }

    if (empty($_POST["precio"])) {
        $errorprecio = "Incompleto";
        
    } else {
        $precio = test_input($_POST["precio"]);
        // Chequea si es valida la url
        $fallo3=false;
    }

    if (empty($_POST["observaciones"])) {
        $errorobservaciones = "Se encuentra vacio";
        
    } else {
        $observaciones = test_input($_POST["observaciones"]);
        $fallo4=false;
    }

   if($fallo1==false&&$fallo2==false&&$fallo3==false&&$fallo4==false){
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
        <h1 style='color: blue'>Insercion de la Vivienda</h1>
        <p>Introduzca los datos de la vivienda</p>
        <form id="myform" style='width:900px;padding: 50px; border:5px dashed blue' action="<?php if($fallo==true){echo htmlspecialchars($_SERVER["PHP_SELF"]);}else{echo"index.php";}?>" method="POST" enctype="multipart/form-data">


            <div >
                <label for="tipo">Tipo de vivienda: </label>



                <select name="tipo" id="tipo">
                    <option value="Piso">Piso</option>
                    <option value="Adosado">Adosado</option>
                    <option value="Chalet">Chalet</option>
                    <option value="Casa">Casa</option>

                </select>

            </div>
            <br>
            <div >
                <label for="zona">Zona: </label>



                <select name="zona" id="zona">
                    <option value="Centro">Centro</option>
                    <option value="Nervion">Nervion</option>
                    <option value="Triana">Triana</option>
                    <option value="Aljarafe">Aljarafe</option>
                    <option value="Macarena">Macarena</option>

                </select>

            </div>
            <br>
            <div> 
                <label for="direccion">Dirección: </label>





                <input type="text" name="direccion" value="<?php echo $direccion ?>">
                <span class="error" style="color: red"><?php echo $errordireccion ?></span>

            </div>
            <br>
            <div >
                <label for="numero">Numero de dormitorios: </label>


                <input type="radio" id="uno" name="numero" value="1">
                <label for="numero">1</label>
                <input type="radio" id="dos" name="numero" value="2">
                <label for="numero">2</label>
                <input type="radio" id="tres" name="numero" value="3">
                <label for="numero">3</label>
                <input type="radio" id="cuatro" name="numero" value="4">
                <label for="numero">4</label>
                <input type="radio" id="cinco" name="numero" value="5">
                <label for="numero">5</label>

            </div>
            <br>
            <div>
                <label for="precio">Precio: </label>


                <input type="text" name="precio" value="<?php echo $precio ?>">€
                <span class="error" style="color: red"><?php echo $errorprecio ?></span>

            </div>
            <br>
            <div>
                <label for="metros">Tamaño: </label>


                <input type="number" name="metros" value="<?php echo $tamaño ?>">metros cuadrados
                <span class="error" style="color: red"><?php echo $errortamaño ?></span>

            </div>
            <br>
            <div>
                <label for="foto">Seleccione la foto: </label>



                <input type="file" name="foto"><br>


            </div>

            <br>
            <div>
                <label for="extras">Extras: </label>


                <input type="checkbox" id="extra1" name="extras[]" value="Piscina">
                <label for="vehicle1"> Piscina</label>
                <input type="checkbox" id="extra2" name="extras[]" value="Jardin">
                <label for="vehicle2"> Jardín</label>
                <input type="checkbox" id="extra3" name="extras[]" value="Garaje">
                <label for="vehicle3"> Garaje</label>

            </div>
            <br>
            <div class="observaciones">
                <label for="observaciones">Observaciones: </label>

                <textarea id="observaciones" style='resize:none'name="observaciones" rows="6" cols="60"></textarea>
                <span class="error" style="color: red"><?php echo $errorobservaciones ?></span>
            </div>
            <input type="reset"></input>
            <input type="submit"></input>
        </form>
        <a href="TablaResultados.php" target="_blank">Consultar Datos</a>
    </body>
</html>