<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio9</title>
</head>
<body>
 <?php
 echo "Nombre: " . $_POST["nombre"]. "<br>";
 echo "Massafra: " . $_POST["apellido"]. "<br>";
 echo "Sexo:" . $_POST["sexo"]. "<br>";
 echo "Estado:" . $_POST["ecivil"]. "<br>";
 if (isset($_POST["acepto"])){ echo "Ofertas: si <br>";} else {echo "Ofertas: no <br>";} 
if (isset($_POST["aceptoo"])){ echo "Terminos y Condiciones: si <br>";} else {echo "Terminos y Condiciones: no <br>";}
 ?>
 </body>
</html>