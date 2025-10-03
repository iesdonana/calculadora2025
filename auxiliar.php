<?php

const OPS = ['+', '-', '*', '/'];

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

function mostrar_errores($error)
{
    foreach ($error as $mensaje) {
        echo "<h3>Error: $mensaje</h3>";
    }
}

function mostrar_resultado($op1, $op2, $op, $res)
{
?>
    <h3>El resultado de <?= "$op1 $op $op2" ?> es <?= $res ?></h3>
<?php
}
