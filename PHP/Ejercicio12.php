<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
class Persona {
    private $nombre;
    private $edad;

public function __construct($nombre, $edad){
     $this->nombre = $nombre; 
    $this->edad = $edad;
}

public function setNombre($nombre){$this->nombre = $nombre;}
public function getNombre(){return $this->nombre;}

public function setEdad($edad){$this->edad = $edad;}
public function getEdad(){return $this->edad;}

public function mostrar(){
    echo "El nombre es: " .$this->nombre. "<br>";
    echo "La edad es: " .$this->edad. "<br>";
}
}

class Empleado extends Persona{
    private $sueldo;

public function __construct($nombre, $edad, $sueldo){
parent::__construct($nombre, $edad);
    $this->sueldo = $sueldo;
}

public function setSueldo($sueldo){$this->sueldo = $sueldo;}
public function getSueldo(){return $this->sueldo;}
public function mostrar(){
    parent::mostrar(). "<br>";
    echo "El sueldo es: " .$this->sueldo;
}

}

$p1 = new Persona('Ramiro', 23);
$e1 = new Empleado('Guille', 25, 2000);

$p1->mostrar(). "<br>";
$e1->mostrar(). "<br>";
?>
</body>
</html>