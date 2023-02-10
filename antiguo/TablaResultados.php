<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change tdis license
Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/html.html to edit tdis template
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>Consulta de viviendas</h1>
        <h2></h2>

        <h3>
    </body>
</html>

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

//Selecciono la BD a conectar
mysqli_select_db($con, "formulariovivienda");

//Realizo la Query


$query = "SELECT * FROM reserva";

//Introduzco el cabezal de los datos exportados de la base de datos

echo '<table style="widtd:100%">
            <tr>
                <td>Tipo</td>
                <td>Zona</td>
                <td>Dirección</td>
                <td>Dormitorios</td>
                <td>Precio</td>
                <td>Tamaños</td>
                <td>Extras</td>
                 <td>Observaciones</td>
                <td>Foto</td>
            </tr>';
if ($result = $con->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["Tipo"];
        $field2name = $row["Zona"];
        $field22name = $row["Direccion"];
        $field3name = $row["NumeroHabitaciones"];
        $field4name = $row["Precio"];
        $field5name = $row["Tamaño"];
        $field6name = $row["Extras"];
        $field66name=$row["Observaciones"];
        $field7name = $row["Foto"];

        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td>
                  <td>'.$field22name.'</td>     
                  <td>'.$field3name.'</td> 
                  <td>'.$field4name.'</td> 
                  <td>'.$field5name.'</td>
                  <td>'.$field6name.'</td>
                <td>'.$field66name.'</td>';
                  if($field7name!= ""){ 
                    echo'<td><a href='.$field7name.'><IMG SRC=foto/untitled.bmp></a></td>';
                }else{
                    
                    $field7name = "No hay Fotografia";
                  echo '<td>'.$field7name.'</td>';
                }

        echo '</tr>';
    }
    $result->free();
}


//Cierro BD
mysqli_close($con);
?>

</body>
</html>


