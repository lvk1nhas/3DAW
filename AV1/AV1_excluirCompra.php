<?php
$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    // Você pode adicionar a lógica para excluir a compra com o ID especificado do local onde você a estiver armazenando (por exemplo, um arquivo ou outra fonte de dados).

    // Exemplo de exclusão de compra de um arquivo "compras.txt"
    $linhas = file("compras.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $exclusaoEfetuada = false;
    $novasLinhas = [];
    foreach ($linhas as $linha) {
        list($compraId, $produto, $valor, $quantidade) = explode('|', $linha);
        if ($compraId == $id) {
            $exclusaoEfetuada = true;
        } else {
            $novasLinhas[] = $linha;
        }
    }

    if ($exclusaoEfetuada) {
        // Escrever as novas linhas (sem a compra excluída) de volta no arquivo
        file_put_contents("compras.txt", implode(PHP_EOL, $novasLinhas));
        $mensagem = "Compra excluída com sucesso! <br>";
    } else {
        $mensagem = "Erro ao executar a exclusão da compra nº $id! <br>";
    }
}
?>

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
        <a href="AV1_buscarCompras.php">Busca de Compras</a>
        <a href="AV1_carrinho.php">Carrinho</a>
        <br>
    </section>
</header>

<section id="principal">

    <section style="width: 100%; text-align: center; ">
        <?php echo "<h1>$mensagem</h1> <br>" ?>
    </section>


<br>

</section>
<br>
<br>

</body>
</html>
