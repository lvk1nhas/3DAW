<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="CRUD">
    <meta name="keywords" content="HTML, CSS, PHP">
    <meta name="author" content="lvk">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>FAETERJ - 3DAW</title>
    
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

<header>
    <section id="menu">
        <h1>Desenvolvimento de Aplicações Web - 3DAW</h1>
        <h2>AV1 Manhã 2023</h2>
        <h3>Aluno: Lucas de Oliveira de Melo<h3>
        <br>
        <a href="AV1_index.php">Início</a> | 
        <a href="AV1_cadastroCompras.php">Cadastro de Compras</a> |
        <a href="AV1_listarCompras.php">Lista das Compras</a> | 
        <a href="AV1_buscarCompras.php">Busca de Compras</a>
        <br>
    </section>
</header>

<section id="principal">

<table style="width: 100%;">
    <th colspan="5">Lista de compras cadastradas</th>
    <tr>
        <td style='border: 1px solid #ccc; width: 10%;'>ID</td>
        <td style='border: 1px solid #ccc; width: 40%;'>Produto</td>
        <td style='border: 1px solid #ccc; width: 20%;'>Valor</td>
        <td style='border: 1px solid #ccc; width: 20%;'>Quantidade</td>
        <td style='border: 1px solid #ccc; width: 10%;'>Ações</td>
    </tr>

<?php

$linhas = file("compras.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
foreach ($linhas as $linha) {
    list($id, $produto, $valor, $quantidade) = explode('|', $linha);

    echo "
    <tr>
        <td style='border: 2px solid #ccc; width: 10%;'>$id</td>
        <td style='border: 2px solid #ccc; width: 40%;'>$produto</td>
        <td style='border: 2px solid #ccc; width: 20%;'>$valor</td>
        <td style='border: 2px solid #ccc; width: 20%;'>$quantidade</td>
        <td style='border: 2px solid #ccc; width: 10%;'>
            <a href='AV1_alterarCompra.php?id=$id'>
                Alterar
            </a> |
            <a href='AV1_excluirCompra.php?id=$id'>
                Excluir
            </a> |
            <a href='AV1_detalheCompra.php?id=$id'>
                Detalhes
            </a>
        </td>
    </tr>
    ";
}
?>
</table>

</section>
</body>
</html>
