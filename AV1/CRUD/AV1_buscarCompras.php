<?php
$mensagem = '';
$comprasFile = 'compras.txt'; // Nome do arquivo de texto para armazenar as compras

// Função para carregar todas as compras do arquivo
function carregarCompras() {
    global $comprasFile;
    if (file_exists($comprasFile)) {
        return file($comprasFile, FILE_IGNORE_NEW_LINES);
    }
    return [];
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = isset($_GET["id"]) ? $_GET["id"] : '';

    // Procurar a compra pelo ID
    $compraEncontrada = false;
    $compraExibicao = ''; // Variável para exibir os detalhes da compra
    foreach (carregarCompras() as $compra) {
        list($compraId, $produto, $valor, $quantidade) = explode('|', $compra);
        if ($compraId == $id) {
            $compraEncontrada = true;
            $compraExibicao = "$compraId | $produto"; // Construa a string de exibição da compra
            break;
        }
    }

    if (!$compraEncontrada) {
        $mensagem = "Compra não encontrada! <br>";
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
        <a href="AV1_cadastroCompras.php">Cadastro de Compras</a> |
        <a href="AV1_listarCompras.php">Lista de Compras</a> | 
        <a href="AV1_buscarCompras.php">Busca de Compras</a>
        <br>
    </section>
</header>

<section id="principal">
    <article id="pesquisa">
        <form action="AV1_detalheCompra.php" method="GET">
            <p>Informe o ID da compra: <input type="text" name="id">
                <input type="submit" value="Procurar">
            </p>
        </form>
    </article>

    <section>
        <?php echo "<h1>$mensagem</h1> <br>" ?>
    </section>
</section>
</body>
</html>
