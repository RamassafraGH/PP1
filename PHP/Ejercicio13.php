<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 13</title>
</head>
<body>
<?php

class Tabla{
private $celdas = [];

public function addCelda(Celda $c){
    $this->celdas[] = $c;
}

public function mostrar(){
    echo "<table cellspancing = 4; border = 1>";
    for ($i = 0; $i <= 10; $i++){
        $nro =  $this->celdas[$i]->getNro();
        $txt =  $this->celdas[$i]->getTexto();

        echo "<tr>";
        echo "<th>";
        echo "Celda nro:" .$nro. ':' .$txt . $nro. "<br>";
        echo "</tr>";
        echo "</th>";
    }
echo "</table>";

    
}

}

class Celda{
    private $nCelda;
    private $texto;

public function setNro($nc){
    $this->nCelda = $nc;
}

public function getNro(){
    return $this->nCelda;
}

public function setTexto($t){
    $this->texto = $t;
}

public function getTexto(){
    return $this->texto;
}
}

$tab = new Tabla();

for ($i = 0; $i <= 10; $i++){
    $celda = new Celda();

    $celda->setNro($i);
    $celda->setTexto("Numero");

    $tab->addCelda($celda);
}

$tab->mostrar();


?>
</body>
</html>