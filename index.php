<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>
    <?php
    require 'auxiliar.php';

    $op1 = obtener_get('op1');
    $op2 = obtener_get('op2');
    $op  = obtener_get('op');

    dibujar_formulario($op1, $op2, $op);

    if (isset($op1, $op2, $op)) {   // Si no es la primera vez que entra
        $error = [];
        validar_op1($op1, $error);
        validar_op2($op2, $error);
        validar_op($op, $error);
        if (empty($error)) {
            $res = calcular_resultado($op1, $op2, $op);
            mostrar_resultado($op1, $op2, $op, $res);
        } else {
            mostrar_errores($error);
        }
    }
    ?>
</body>
</html>
