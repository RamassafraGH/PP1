<HTML>
 <HEAD>
 <TITLE>Ejercicio8.php</TITLE>
 </HEAD>
 <BODY>
 <?php 
 if ($_GET["a"] > $_GET["b"]) {echo 'El mayor'.' '.$_GET["a"];}
 else if($_GET["a"] < $_GET["b"])  {echo 'El mayor'.' '.$_GET["b"];} 
 else {echo "Ambos tienen el mismo valor";}
  ?>
 </BODY>
 </HTML>
