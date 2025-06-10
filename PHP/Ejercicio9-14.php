<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio9-14</title>
</head>
<body>
 <?php
function validar($nombre, $apellido) {
    if (empty($_POST["nombre"])) {
        throw new Exception("El nombre no puede estar vacío.");
    } 
    if (empty($_POST["apellido"])) {
        throw new Exception("El apellido no puede estar vacío.");
    }
    if (empty($_POST["nombre"]) && empty($_POST["apellido"]))
    throw new Exception("El nombre y apellido no pueden estar vacios");
}
try {
    validar($_POST["nombre"], $_POST["apellido"]);

echo "Nombre: " . $_POST["nombre"]. "<br>";
echo "Apellido: " . $_POST["apellido"]. "<br>";
echo "Sexo:" . $_POST["sexo"]. "<br>";
echo "Estado:" . $_POST["ecivil"]. "<br>";
if (isset($_POST["acepto"])){ echo "Ofertas: si <br>";} else {echo "Ofertas: no <br>";} 
if (isset($_POST["aceptoo"])){ echo "Terminos y Condiciones: si <br>";} else {echo "Terminos y Condiciones: no <br>";}

} catch (Exception $e) {
    echo "Ha habido una excepcion" . $e->getMessage(). "<br>";
} finally {
    echo '<a href="../html/Ejercicio11.html">Volver al formulario</a>';
}
?>
</body>
</html>