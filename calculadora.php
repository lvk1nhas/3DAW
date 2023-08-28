<?php

function somar($num1, $num2) {
    return $num1 + $num2;
}

function subtrair($num1, $num2) {
    return $num1 - $num2;
}

function dividir($num1, $num2) {
    if ($num2 != 0) {
        return $num1 / $num2;
    } else {
        return "Divisão por zero não é válida";
    }
}

function multiplicar($num1, $num2) {
    return $num1 * $num2;
}

function calcularSeno($num) {
    return sin($num);
}

function calcularCosseno($num) {
    return cos($num);
}

$resultado = '';

if (isset($_GET['num1'], $_GET['num2'], $_GET['calcular'])) {
    $num1 = $_GET['num1'];
    $num2 = $_GET['num2'];
    $calcular = $_GET['calcular'];

    switch ($calcular) {
        case 'somar':
            $resultado = somar($num1, $num2);
            break;
        case 'subtrair':
            $resultado = subtrair($num1, $num2);
            break;
        case 'dividir':
            $resultado = dividir($num1, $num2);
            break;
        case 'multiplicar':
            $resultado = multiplicar($num1, $num2);
            break;
        case 'seno':
            $resultado = calcularSeno($num1);
            break;
        case 'cosseno':
            $resultado = calcularCosseno($num1);
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora LVK</title>
</head>
<body>
    <form method="GET">
        Primeiro número <br/>
        <input type="number" name="num1" required/><br/>
        Segundo número <br/>
        <input type="number" name="num2" required/><br/>
        <p>Qual operação deseja utilizar?</p>
        <select name="calcular">
            <option value="somar">Soma</option>
            <option value="subtrair">Subtração</option>
            <option value="dividir">Divisão</option>
            <option value="multiplicar">Multiplicação</option>
            <option value="seno">Seno</option>
            <option value="cosseno">Cosseno</option>
        </select>
        <br/><br/>
        <input type="submit" value="Calcular"/>
        <br/><br/>
        <p> O resultado é <?= is_numeric($resultado) ? number_format($resultado, 2) : "<span style='color: red;'>$resultado</span>" ?></p>
    </form>
</body>
</html>
