<?php
$mensagem = '';
$perguntasFile = 'perguntas.txt'; // Nome do arquivo de texto para armazenar as perguntas

// Função para carregar todas as perguntas do arquivo
function carregarPerguntas() {
    global $perguntasFile;
    if (file_exists($perguntasFile)) {
        return file($perguntasFile, FILE_IGNORE_NEW_LINES);
    }
    return [];
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = isset($_GET["id"]) ? $_GET["id"] : '';

    // Procurar a pergunta pelo ID
    $perguntaEncontrada = false;
    $perguntaExibicao = ''; // Variável para exibir os detalhes da pergunta
    foreach (carregarPerguntas() as $pergunta) {
        list($perguntaId, $texto, $resposta, $pontuacao, $dificuldade) = explode('|', $pergunta);
        if ($perguntaId == $id) {
            $perguntaEncontrada = true;
            $perguntaExibicao = "$perguntaId | $texto"; // Construa a string de exibição da pergunta
            break;
        }
    }

    if (!$perguntaEncontrada) {
        $mensagem = "Pergunta não encontradaaaaaaaa! <br>";
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
        <a href="AV1_buscarCompras.php">Busca de Compras</a> |
        <a href="AV1_carrinho.php">Carrinho</a>
        <br>
    </section>
</header>

<section id="principal">
    <article id="pesquisa">
        <form action="AV1_detalheCompra.php" method="GET">
            <p>Informe o ID da Compra: <input type="text" name="id">
                <input type="submit" value="Procurar">
            </p>
        </form>
    </article>

</section>
</body>
</html>
