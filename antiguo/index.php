<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <?php
        //Establezco conexión con BD
        $con = mysqli_connect("localhost", "root", "");
        //Si da error aviso y cierro
        if (mysqli_connect_errno()) {
            echo "Error al conectar a MySQL: " . mysqli_connect_error();
            exit;
        }

        //Función que devuelve la info del campo dado
        function recogeDato($campo) {
            return isset($_POST[$campo]) ? $_POST[$campo] : "<label>No hay ningun dato</label>";
        }

        //Variables para cada campo
        $errores = "";
        $tipo = recogeDato("tipo");
        $zona = recogeDato("zona");
        $direccion =recogeDato("direccion");
        $numero = recogeDato("numero");
        $precio = recogeDato("precio");
        $tamaño = recogeDato("metros");
        $extras=implode(",",$_POST["extras"]);
        $observaciones = recogeDato("observaciones");

        //Selecciono la BD a conectar
        mysqli_select_db($con, "formulariovivienda");

        
        //Permite seleccionar la foto en formato png o jpg
        
        copy($_FILES['foto']['tmp_name'], $_FILES['foto']['name']);
        
        $nom = $_FILES['foto']['name'];
        if ($_FILES['foto']['type'] !== 'image/png' && $_FILES['foto']['type'] !== 'image/jpeg') {

            $errores .= "- La imagen debe ser de la extensión PNG o JPG";
            
        }

        if ($_FILES['foto']['size'] >= 2097152) { // 2MB
            $errores .= "- La imagen debe ser más pequeña de 2MB.";
            
        }
        if (empty($errores)) {

            $path = "foto/" . basename($_FILES['foto']['name']);

            if (move_uploaded_file($_FILES['foto']['tmp_name'], $path)) {

                echo "El archivo " . basename($_FILES['foto']['name']) . " ha sido subido";
            } else {

                echo "El archivo no se ha subido correctamente";
            }
        } else {
            exit("$errores");
        }
        
        //Realizo la Query
        mysqli_query($con, "INSERT INTO reserva (Tipo, Zona, Direccion, NumeroHabitaciones, Precio, Tamaño, Extras, Foto, Observaciones, ID) VALUES ('$tipo','$zona','$direccion','$numero','$precio','$tamaño','$extras','$path','$observaciones',NULL)");

        $query = "SELECT * FROM table_name";

        //Se imprime por pantalla la información si es correcto

        echo "<h1>Insercion de Vivienda</h1>";
        echo "<p>Tipo:$tipo</p>";
        echo "<p>Zona:$zona</p>";
        echo "<p>Dirección:$direccion</p>";
        echo "<p>Numero de Dormitorios:$numero</p>";
        echo "<p>Precio:$precio</p>";
        echo "<p>Tamaño:$tamaño</p>";
        echo "<p>Extras que tiene:$extras</p>";
        echo "<p>Las Observaciones son las Siguientes:$observaciones</p>";
        echo "La foto se registro en el servidor.<br> El archivo " . basename($_FILES['foto']['name']) . " ha sido subido";
        echo "<img src=\"$nom\">";

        //Cierro BD
        mysqli_close($con);
        ?>
        
    </body>
</html>
