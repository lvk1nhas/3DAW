<?php
$mensagem = "";
$id = "";
$produto = "";
$valor = "";
$quantidade = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $produto = $_POST["produto"];
    $valor = $_POST["valor"];
    $quantidade = $_POST["quantidade"];

    // Função para verificar se o ID já existe no arquivo
    function compraExiste($id, $comprasFile) {
        $compras = file($comprasFile, FILE_IGNORE_NEW_LINES);
        foreach ($compras as $compra) {
            list($compraId, $produto, $valor, $quantidade) = explode('|', $compra);
            if ($compraId == $id) {
                return true; // ID já existe
            }
        }
        return false; // ID não encontrado
    }

    // Verifique se o ID já existe
    if (compraExiste($id, "compras.txt")) {
        $mensagem = "ID já existe. Por favor, escolha outro ID.";
    } else {
        // Armazenamento em um arquivo de texto chamado "compras.txt"
        $novaCompra = "$id|$produto|$valor|$quantidade";
        if (file_put_contents("compras.txt", $novaCompra . PHP_EOL, FILE_APPEND)) {
            $mensagem = "Compra cadastrada com sucesso!";
        } else {
            $mensagem = "Erro ao cadastrar sua compra!";
        }
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
    <p>
    Cadastre suas compras:
    </p>
    
    <form action="AV1_cadastroCompras.php" method="POST">
        <p>ID: <input type="text" name="id" value="<?php echo $id; ?>"></p>
        <p>Nome do Produto: <input type="text" name="produto" value="<?php echo $produto; ?>"></p>
        <p>Valor: <input type="text" name="valor" value="<?php echo $valor; ?>"></p>
        <p>Quantidade: <input type="text" name="quantidade" value="<?php echo $quantidade; ?>"></p>
        
        <br><br>
        <input type="submit" value=" Cadastrar Compra">
    </form>

    <section style="width: 100%; text-align: center;">
        <?php echo "<h1>$mensagem</h1> <br>" ?>
    </section>
    
    <br>
    <br>

</section>

</body>
</html>
