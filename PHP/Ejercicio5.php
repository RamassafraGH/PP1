<html>
 <head>
    <meta charset="UTF-8">
    <title>Cuarta página PHP</title>
 </head>
 <body>
<?php
echo 'Estructura for';
for ($a=1;$a<11;$a++)
{   echo '<br>'; 
    echo $a;
    echo '<br>';
}
echo '<br>';
echo 'Estructura while';
$b=1;
while ($b<=10)
{   echo '<br>';
    echo $b++;
    echo '<br>';}

?>
</body>
</html>