<?php
require_once './vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader('./templates');
$twig = new \Twig\Environment($loader);

$pais = [
    "españa" =>
    [
    "nombre" => "España",
    "lengua" => "Castellano",
    "moneda" => "Euro"
    ],
    "usa" =>
    [
    "nombre" => "USA",
    "lengua" => "Inglés",
    "moneda" => "Dolar"
    ],
    "china" =>
    [
        "nombre" => "China",
        "lengua" => "Chino mandarin",
        "moneda" => "Yuan"
    ],
    "rusia" =>
    [
        "nombre" => "Rusia",
        "lengua" => "Ruso",
        "moneda" => "Rublos"
    ],
    "portugal" =>
    [
        "nombre" => "Portugal",
        "lengua" => "Portugues",
        "moneda" => "Dolar portugues"
    ]
];
echo $twig->render('eje3.html.twig', ['paises' => $pais]);

?>