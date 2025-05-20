<html>
 <head>
    <meta charset="UTF-8">
    <title>Cuarta página PHP</title>
 </head>
 <body>
<?php

$primeracadena="Comer verduras";
$segundacadena="es realmente sano";
$tercercadena=$primeracadena." ".$segundacadena;

echo 'La oracion es'.' '.$tercercadena;
echo '<br>';
echo 'La palabra verduras empieza en la posicion:'.' '.strpos($tercercadena,"verduras")
?>
</body>
</html>