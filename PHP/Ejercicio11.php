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
}

class Empleado extends Persona{
    private $sueldo;

public function __construct($nombre, $edad, $sueldo){
parent::__construct($nombre, $edad);
    $this->sueldo = $sueldo;
}

public function setSueldo($sueldo){$this->sueldo = $sueldo;}
public function getSueldo(){return $this->sueldo;}
}

$p1 = new Persona('Ramiro', 23);
$e1 = new Empleado('Guille', 25, 2000);

echo "Clase Persona" . '==' ."El nombre es: " .$p1->getNombre().'  //  '. "La edad es:" .$p1->getEdad(). "<br>";
echo "Clase Empleado" . '==' ."El nombre es: " .$e1->getNombre().'//'."La edad es:" .$e1->getEdad(). '//'."Su sueldo es de:" .$e1->getSueldo();
?>
</body>
</html>