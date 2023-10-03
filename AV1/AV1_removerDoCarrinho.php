<?php
$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    $linhasCarrinho = file("carrinho.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $exclusaoEfetuada = false;
    $novasLinhas = [];

    foreach ($linhasCarrinho as $linhaCarrinho) {
        list($produtoId, $quantidade) = explode('|', $linhaCarrinho);

        if ($produtoId == $id) {
            $exclusaoEfetuada = true;
        } else {
            $novasLinhas[] = $linhaCarrinho;
        }
    }

    if ($exclusaoEfetuada) {
        // Escrever as novas linhas (sem o produto excluído) de volta no arquivo do carrinho
        file_put_contents("carrinho.txt", implode(PHP_EOL, $novasLinhas));
        $mensagem = "Produto removido do carrinho com sucesso! <br>";
    } else {
        $mensagem = "Erro ao remover o produto do carrinho! <br>";
    }
}

// Redirecionar de volta para a página do carrinho
header("Location: AV1_carrinho.php");
?>
