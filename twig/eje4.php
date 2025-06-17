<?php
 require_once './vendor/autoload.php';
 $loader = new \Twig\Loader\FilesystemLoader('./templates');
 $twig = new \Twig\Environment($loader);
 echo $twig->render('eje4.html.twig', ['numero' => $_GET['nro']]);
 ?>