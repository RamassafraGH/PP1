<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio7</title>
</head>
<body>
    <?php
function CalcularVol($radio, $altura) {
 $pi = 3.1416;
    $volumen = $pi * $radio * $radio * $altura;
 return $volumen;
}
echo 'El volumen del cilindro es'.' '.calcularVol(4,6);
?>

</body>
</html>