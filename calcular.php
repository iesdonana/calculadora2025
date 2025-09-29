<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>
<body>
    <?php
    $op1 = trim($_GET['op1']);
    $op2 = trim($_GET['op2']);
    $op  = trim($_GET['op']);

    switch ($op) {
        case '+': $res = $op1 + $op2;
                  break;
        case '-': $res = $op1 - $op2;
                  break;
        case '*': $res = $op1 * $op2;
                  break;
        case '/': $res = $op1 / $op2;
                  break;
    }
    ?>
    <?php if (isset($res)): ?>
        <h3>El resultado de <?= "$op1 $op $op2" ?> es <?= $res ?></h3>
    <?php else: ?>
        <h3>Error: el operador es incorrecto.</h3>
    <?php endif ?>
</body>
</html>
