<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio10</title>
</head>
<body>
    <?php
class Empleado {
public $nombre;
public $sueldo;

public function __construct($nombre, $sueldo){
    $this->nombre = $nombre; 
    $this->sueldo = $sueldo;
}

public function pagaImpuesto(){
     if ($this->sueldo > 3000) {
        echo "El empleado ". $this->nombre . " paga impuesto";} 
    else { echo "El empleado ". $this->nombre. " no paga impuesto";}
}
}
$hombre = new Empleado('Juan',3001);
$hombre1 = new Empleado('Rami',3000);
echo $hombre->pagaImpuesto() ."<br>"; 
echo $hombre1->pagaImpuesto() ."<br>";
    ?>
</body>
</html>