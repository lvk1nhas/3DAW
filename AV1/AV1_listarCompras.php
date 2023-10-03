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

<h2>Lista dos Produtos cadastrados</h2>

<table style="width: 100%;">
    <th colspan="6">Lista dos Produtos cadastrados</th>
    <tr>
        <td style='border: 1px solid #ccc; width: 10%;'>ID</td>
        <td style='border: 1px solid #ccc; width: 40%;'>Produto</td>
        <td style='border: 1px solid #ccc; width: 20%;'>Valor</td>
        <td colspan="2" style='border: 1px solid #ccc; width: 20%;'>Quantidade</td>
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
        <td style='border: 2px solid #ccc; width: 5%;'>
            <form action=\"AV1_adicionarAoCarrinho.php\" method=\"POST\">
                <input type=\"hidden\" name=\"produto_id\" value=\"$id\">
                <input type=\"number\" name='quantidade' min=\"1\" max=\"10\" required>
                <input type=\"submit\" value=\"Adicionar ao Carrinho\">
            </form>
        </td>
    </tr>
    ";
}
?>
</table>

</section>
</body>
</html>
