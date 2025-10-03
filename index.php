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

    $error = [];
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
        if (empty($op1)) {
            $error['op1'] = 'El primer operando es obligatorio';
        } elseif (!is_numeric($op1)) {
            $error['op1'] = 'El primer operando no es un número válido';
        }
        if (empty($op2)) {
            $error['op2'] = 'El segundo operando es obligatorio';
        } elseif (!is_numeric($op2)) {
            $error['op2'] = 'El segundo operando no es un número válido';
        }
        if (empty($op)) {
            $error['op'] = 'La operación a realizar es obligatoria';
        } elseif (!in_array($op, OPS)) {
            $error['op'] = 'La operación es incorrecta';
        }
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
