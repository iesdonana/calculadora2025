<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>
    <?php
    /**
     * Calcula el resultado de la operación definida en $op
     * sobre los operandos $op1 y $op2.
     */
    function calcular_resultado($op1, $op2, $op)
    {
        switch ($op) {
            case '+':
                $res = $op1 + $op2;
                break;
            case '-':
                $res = $op1 - $op2;
                break;
            case '*':
                $res = $op1 * $op2;
                break;
            case '/':
                $res = $op1 / $op2;
                break;
            default:
                $res = null;
        }
        return $res;
    }

    /**
     * Devuelve el valor recogido por GET de un parámetro de la petición.
     * Devuelve null si el parámetro no existe.
     */
    function obtener_get($par)
    {
        return isset($_GET[$par]) ? trim($_GET[$par]) : null;
    }

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
    if (isset($op1, $op2, $op)) {
        $res = calcular_resultado($op1, $op2, $op);
        if (!isset($res)) {
            echo "<h3>Error: el operador es incorrecto.</h3>";
        } else {
            echo "<h3>El resultado de $op1 $op $op2 es $res</h3>";
        }
    }
    ?>
</body>
</html>
