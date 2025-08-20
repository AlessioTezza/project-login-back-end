<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
session_start (); 
if (! $_SESSION ['logueado']) { 
 header ( "location: login.html" ); 
 exit (); 
} else { 
 echo "<br>"; 
 echo 'Bienvenido, ' . $_SESSION ['username']; 
 echo '<br>'; 
 echo 'Horario de Conexion:' . $_SESSION ['time']; 
 echo '<br>'; 
 echo '<a href="logout.php">Logout</a>'; 
 } 
?> 
</body>
</html>