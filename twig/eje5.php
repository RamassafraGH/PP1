
<?php
require_once 'vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);

$nombre = $_GET['nombre'];
$modo = $_GET['modo'];

echo $twig->render('eje05.html.twig', [
    'nombre' => $nombre,
    'modo' => $modo
]);

?>