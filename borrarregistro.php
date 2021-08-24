<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <title>Procesar Educacion</title>
</head>

<?php 
$file = json_decode(file_get_contents('borrados.json'));
$password = "12351979";
if ($_POST['password'] != $password) { 
?>
<h2>Introduce contraseña</h2>
<form name="form" method="post" action="">
<input type="password" name="password"><br>
<input type="submit" value="Login"></form>
<?php 
}else{
?>

<?php
    include "conexion.php";

    EliminarProducto($_GET['no']);

    function EliminarProducto($no)
    {
        $sentencia="DELETE FROM productos WHERE no='".$no."' ";
        mysql_query($sentencia) or die (mysql_error());
    }
?>

<script type="text/javascript">
    alert("Producto Eliminado exitosamente");
    window.location.href='persona.html';
</script>
</html>