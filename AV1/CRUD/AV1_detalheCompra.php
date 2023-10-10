<?php
$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    $linhas = file("compras.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($linhas as $linha) {
        list($compraId, $produto, $valor, $quantidade) = explode('|', $linha);
        
        if ($compraId == $id) {
            $compraEncontrada = true;
            $compraDetalhes = [
                'id' => $compraId,
                'produto' => $produto,
                'valor' => $valor,
                'quantidade' => $quantidade,
            ];
            break;
        }
    }

    if (isset($compraEncontrada) && $compraEncontrada) {
        $mensagem = "Detalhes da Compra nº $id! <br>";
    } else {
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
        <a href="AV1_listarCompras.php">Lista das Compras</a> | 
        <a href="AV1_buscarCompras.php">Busca de Compras</a>
        <br>
    </section>
</header>

<section id="principal">

    <section>
        <?php echo "<h1>$mensagem</h1> <br>" ?>
    </section>

    <form>
        <p>Compra nº: <input disabled type="text" name="id" value="<?php echo $id ?>">
        
        <?php if (isset($compraDetalhes)): ?>
        <p>Produto: <input disabled type="text" name="produto" value="<?php echo $compraDetalhes['produto'] ?>"></p>
        <p>Valor: <input disabled type="text" name="valor" value="<?php echo $compraDetalhes['valor'] ?>"></p>
        <p>Quantidade: <input disabled type="text" name="quantidade" value="<?php echo $compraDetalhes['quantidade'] ?>"></p>
        
        <?php endif; ?>

        <br><br><br>
    </form>
</section>
<br>
<br>
</body>
</html>
