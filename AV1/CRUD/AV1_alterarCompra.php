<?php
$comprasFile = 'compras.txt'; // Nome do arquivo de texto para armazenar as compras

$mensagem = '';
$compraEncontrada = false;
$compraAtualizada = ''; // Variável para armazenar a compra atualizada

// Função para carregar todas as compras do arquivo
function carregarCompras() {
    global $comprasFile;
    if (file_exists($comprasFile)) {
        return file($comprasFile, FILE_IGNORE_NEW_LINES);
    }
    return [];
}

// Verificar se o método de requisição é GET
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = isset($_GET["id"]) ? $_GET["id"] : '';

    $compras = carregarCompras();

    if ($id !== '') {
        // Procurar a compra pelo ID
        foreach ($compras as $compra) {
            list($compraId, $produto, $valor, $quantidade) = explode('|', $compra);
            if ($compraId == $id) {
                $compraEncontrada = true;
                $compraAtualizada = $compra; // Armazenar a compra encontrada
                break;
            }
        }
    }
}

// Verificar se o método de requisição é POST e a compra foi encontrada
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $produto = $_POST["produto"];
    $valor = $_POST["valor"];
    $quantidade = $_POST["quantidade"];

    // Atualizar a compra encontrada
    $compraAtualizada = "$id|$produto|$valor|$quantidade";

    $compras = carregarCompras();
    foreach ($compras as &$compra) {
        list($compraId, $produtoAtual, $valorAtual, $quantidadeAtual) = explode('|', $compra);
        if ($compraId == $id) {
            $compra = $compraAtualizada;
            break;
        }
    }

    file_put_contents($comprasFile, implode(PHP_EOL, $compras));
    $mensagem = "Alteração efetuada com sucesso!";
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
        <a href="AV1_cadastroCompras.php">Cadastro de Compras</a> |
        <a href="AV1_listarCompras.php">Lista de Compras</a> | 
        <a href="AV1_buscarCompras.php">Busca de Compras</a>
        
        <br>
    </section>
</header>

<section id="principal">
<form action="AV1_alterarCompra.php" method="POST">
    <?php
    if ($compraEncontrada) {
        list($compraId, $compraProduto, $compraValor, $compraQuantidade) = explode('|', $compraAtualizada);
        echo '<p>ID: <input type="text" name="id" value="' . $compraId . '"> </p>';
        echo '<p>Produto: <input type="text" name="produto" value="' . $compraProduto . '"></p>';
        echo '<p>Valor: <input type="text" name="valor" value="' . $compraValor . '"> </p>';
        echo '<p>Quantidade: <input type="text" name="quantidade" value="' . $compraQuantidade . '"> </p>';
        
        echo '<br><br><br>';
        echo '<input type="submit" value="Alterar">';
    
    }
    ?>
</form>
</section>

<section>
    <?php echo "<h1>$mensagem</h1> <br>" ?>
</section>
    
</body>
</html>
