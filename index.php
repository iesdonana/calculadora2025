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
    ?>
    <form action="" method="get">
        <label for="op1">Primer operando<sup>*</sup>:</label>
        <input type="text" name="op1" id="op1">
        <br>
        <label for="op2">Segundo operando<sup>*</sup>:</label>
        <input type="text" name="op2" id="op2">
        <br>
        <label for="op">Operación<sup>*</sup>:</label>
        <select name="op" id="op">
            <option value="+">Suma</option>
            <option value="-">Resta</option>
            <option value="*">Multiplicación</option>
            <option value="/">División</option>
        </select>
        <br>
        <button type="submit">Calcular</button>
    </form>
    <?php
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
