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
    foreach ($error as $mensaje) { ?>
        <h3>Error: <?= $mensaje ?></h3><?php
    }
}

function mostrar_resultado($op1, $op2, $op, $res)
{
?>
    <h3>El resultado de <?= "$op1 $op $op2" ?> es <?= $res ?></h3>
<?php
}

function validar_op1($op1, &$error)
{
    if (empty($op1)) {
        $error['op1'] = 'El primer operando es obligatorio';
    } elseif (!is_numeric($op1)) {
        $error['op1'] = 'El primer operando no es un número válido';
    }
}

function validar_op2($op2, &$error)
{
    if (empty($op2)) {
        $error['op2'] = 'El segundo operando es obligatorio';
    } elseif (!is_numeric($op2)) {
        $error['op2'] = 'El segundo operando no es un número válido';
    }
}

function validar_op($op, &$error)
{
    if (empty($op)) {
        $error['op'] = 'La operación a realizar es obligatoria';
    } elseif (!in_array($op, OPS)) {
        $error['op'] = 'La operación es incorrecta';
    }
}
