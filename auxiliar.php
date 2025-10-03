<?php

const OPS = [
    '+' => 'Suma',
    '-' => 'Resta',
    '*' => 'Multiplicación',
    '/' => 'División'
];

/**
 * Calcula el resultado de la operación definida en $op
 * sobre los operandos $op1 y $op2.
 */
function calcular_resultado(string $op1, string $op2, string $op): int|float
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
function obtener_get(string $par): ?string
{
    return isset($_GET[$par]) ? trim($_GET[$par]) : null;
}

function mostrar_errores(array $error): void
{
    foreach ($error as $mensaje) { ?>
        <h3>Error: <?= $mensaje ?></h3><?php
    }
}

function mostrar_resultado(string $op1, string $op2, string $op, int|float $res): void
{
?>
    <h3>El resultado de <?= "$op1 $op $op2" ?> es <?= $res ?></h3>
<?php
}

function validar_op1(string $op1, array &$error): void
{
    if (empty($op1)) {
        $error['op1'] = 'El primer operando es obligatorio';
    } elseif (!is_numeric($op1)) {
        $error['op1'] = 'El primer operando no es un número válido';
    }
}

function validar_op2(string $op2, array &$error): void
{
    if (empty($op2)) {
        $error['op2'] = 'El segundo operando es obligatorio';
    } elseif (!is_numeric($op2)) {
        $error['op2'] = 'El segundo operando no es un número válido';
    }
}

function validar_op(string $op, array &$error): void
{
    if (empty($op)) {
        $error['op'] = 'La operación a realizar es obligatoria';
    } elseif (!key_exists($op, OPS)) {
        $error['op'] = 'La operación es incorrecta';
    }
}

function selected(string $op, string $v): string
{
    return $op == $v ? 'selected' : '';
}

function dibujar_formulario(string $op1, string $op2, string $op): void
{
?>
    <form action="" method="get">
        <label for="op1">Primer operando<sup>*</sup>:</label>
        <input type="text" name="op1" id="op1" value="<?= $op1 ?>">
        <br>
        <label for="op2">Segundo operando<sup>*</sup>:</label>
        <input type="text" name="op2" id="op2" value="<?= $op2 ?>">
        <br>
        <label for="op">Operación<sup>*</sup>:</label>
        <select name="op" id="op">
            <?php foreach (OPS as $k => $v): ?>
                <option value="<?= $k ?>" <?= selected($op, $k) ?> ><?= $v ?></option>
            <?php endforeach ?>
        </select>
        <br>
        <button type="submit">Calcular</button>
    </form>
<?php
}
