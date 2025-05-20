<html>
 <head>
    <meta charset="UTF-8">
    <title>Tercera página PHP</title>
 </head>
 <body>
<?php

$pais = [
"argentina" =>
    [
    "nombre" => "Argentina",
    "lengua" => "Castellano",
    "moneda" => "Pesos"
    ],
"españa" =>
    [
    "nombre" => "España",
    "lengua" => "Castellano",
    "moneda" => "Euro"
    ],
"usa" =>
    [
    "nombre" => "Estados Unidos",
    "lengua" => "Ingles",
    "moneda" => "Dolar"
    ]
];

echo 'La moneda de argentina es:'; echo $pais["argentina"]["moneda"]
?>

</body>