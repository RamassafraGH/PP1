<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio15</title>
</head>
<body>
    <?php
class Sala {
    private $nro;
    private $cantidadButacas;
    private $butacasOcupadas = 0;

    public function __construct($nro, $cantidadButacas) {
        $this->nro = $nro;
        $this->cantidadButacas = $cantidadButacas;
    }

    public function ocuparButacas($cantidad) {
        if (($this->butacasOcupadas + $cantidad) > $this->cantidadButacas) {
            throw new Exception("La sala " . $this->nro . " ya no tiene capacidad" . "<br>");
        }
        $this->butacasOcupadas += $cantidad;
    }

    public function getNro() { return $this->nro; }
    public function getButacasOcupadas() { return $this->butacasOcupadas; }
}

class Cine {
    private $salas = [];

    public function addSala(Sala $s) {
        $this->salas[] = $s;
    }

    public function vender($cantidad, $nro) {
        if ($nro < 1 || $nro > count($this->salas)) return;
        $sn = $this->salas[$nro - 1];
        try {
            $sn->ocuparButacas($cantidad);
        } catch (Exception $th) {
            echo $th->getMessage() . "\n";
        }
    }

    public function mostrarOcupacion() {
        foreach ($this->salas as $sala) {
            echo "Sala " . $sala->getNro() . ": " . $sala->getButacasOcupadas() . " butacas ocupadas\n";
        }
    }
}

try {
    $cine = new Cine();
    $cine->addSala(new Sala(1, 50));
    $cine->addSala(new Sala(2, 30));
    $cine->addSala(new Sala(3, 40));

    for ($i = 0; $i < 100; $i++) {
        $cantidad = rand(1, 2);
        $nroSala = rand(1, 3);
        $cine->vender($cantidad, $nroSala);
    }

    echo "\nOcupación final de las salas:\n";
    $cine->mostrarOcupacion();
} catch (Exception $e) {
    echo "Error general: " . $e->getMessage();
}
?>
</body>
</html>