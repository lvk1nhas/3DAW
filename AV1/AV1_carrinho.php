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
        <a href="AV1_listarCompras.php">Lista dos Produtos</a> | 
        <a href="AV1_buscarCompras.php">Busca de Compras</a> |
        <a href="AV1_carrinho.php">Carrinho</a>
        <br>
    </section>
</header>

<section id="principal">

<h2>Carrinho de Compras</h2>

<table style="width: 100%;">
    <th>ID</th>
    <th>Produto</th>
    <th>Quantidade</th>
    <th>Valor Unitário</th>
    <th>Valor Total</th>
    <th>Ações</th>

<?php
$linhasCarrinho = file("carrinho.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$valorTotalCarrinho = 0;

foreach ($linhasCarrinho as $linhaCarrinho) {
    list($produtoId, $quantidade) = explode('|', $linhaCarrinho);
    
    // Recupere as informações do produto do arquivo de compras
    $compras = file("compras.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($compras as $compra) {
        list($id, $produto, $valor, $quantidadeDisponivel) = explode('|', $compra);
        if ($id == $produtoId) {
            $valorTotal = $valor * $quantidade;
            $valorTotalCarrinho += $valorTotal;

            echo "
            <tr>
                <td>$id</td>
                <td>$produto</td>
                <td>$quantidade</td>
                <td>R$ $valor</td>
                <td>R$ $valorTotal</td>
                <td>
                    <a href='AV1_removerDoCarrinho.php?id=$produtoId'>
                        Excluir
                    </a>
                </td>
            </tr>
            ";
            break;
        }
    }
}

echo "</table>";
echo "<p>Total do Carrinho: R$ $valorTotalCarrinho</p>";

?>
</section>
</body>
</html>
