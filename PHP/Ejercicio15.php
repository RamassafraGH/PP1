<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio15</title>
</head>
<body>
    <?php
    


class Cine{
private $salas = [];

public function addSala(Sala $s){
 $this->salas[] = $s;
}

public function vender($cantidad, $nro){
 $sn = $this->salas[$nro - 1];
 try {
    if ()
    $sn -> ocuparButacas($cantidad);
 } catch (Exception $th) {
    echo $th->getMessage();
 }
 
}

public function mostrarOcupacion(){
    echo "Las butacas ocupadas de la sala " .$s->getNro(). "son " .$s.getButacasOcupadas();
}
}
class Sala{
private $nro;
private $cantidadButacas;
private $butacasOcupadas = 0;


public function ocuparButacas($cantidad){
    if (($butacasOcupadas + $cantidad) > $cantidadButacas)
    try {
        throw new Exception ("La sala" .$this->nro. "esta ocupada")
    } catch (Exception $th) {
        echo "Ha habido una excepcion" .$th->getMessage();
    }
    $this->ocuparButacas = $cantidad;
}


public function setNro($n){$this->$nro = $n;}
public function getNro(){return $this->$nro;}

public function setCantidadButacas($cb){$this->$cantidadButacas = $cb;}
public function getCantidadButacas(){return $this->$cantidadButacas;}

public function getButacasOcupadas(){return $this->$butacasOcupadas;}
}

try {
    $cine = new Cine();
    $sala1 = new Sala();
    $sala1->setNro(1);
    $sala1->setCantidadButacas(50);
    $cine->addSala($sala1);

    $sala2 = new Sala();
    $sala2->setNro(2);
    $sala2->setCantidadButacas(30);
    $cine->addSala($sala2);

    $sala3 = new Sala();
    $sala3->setNro(3);
    $sala3->setCantidadButacas(40);
    $cine->addSala($sala3);

    for ($i = 0; $i < 100; $i++) {
        $cantidad = rand(1, 2);
        $nroSala = rand(1, 3);

        $cine->vender($cantidad, $nroSala);
        ocuparButacas($cantidad);
    }
$cine->mostrarOcupacion();

    foreach ($i as $this->salas => $value) {
        # code...
    }

    ?>
</body>
</html>