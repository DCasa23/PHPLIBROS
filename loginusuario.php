
<head>
<title>Autentificación PHP</title>
</head>
<body>
   <h1>Autentificación PHP</h1>
   <form action="controlbase.php" method="POST">
   <table align="center" width="225" cellspacing="2" cellpadding="2" border="0">
   <tr>
  <td colspan="2" align="center">
  <?php
  $error=$_GET["errorusuario"]   ?? null;
  
  if ($error=="si"){?>
  <span style="color:ffffff;background-color:#ddd"><b>Datos incorrectos</b></span>
<?php
}else{
?>
   Introduce tu clave de acceso
<?php
}
?>
</td>
</tr>
<tr>
<td align="right">USER:</td>
<td><input type="Text" name="usuario" size="8" maxlength="50"></td>
</tr>
<tr>
<td align="right">PASSWD:</td>
<td><input type="password" name="contrasena" size="8" maxlength="50"></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="Submit" value="ENTRAR"></td>
</tr>
</table>
</form>
</body>
</html>
