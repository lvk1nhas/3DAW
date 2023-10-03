<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $produtoId = $_POST["produto_id"];
    $quantidade = intval($_POST["quantidade"]);

    // Verifique se a quantidade é válida (maior que zero)
    if ($quantidade <= 0) {
        header("Location: AV1_listarCompras.php");
        exit;
    }

    // Verifique se o arquivo carrinho.txt já existe
    if (file_exists("carrinho.txt")) {
        // Verifique se o produto já existe no carrinho
        $carrinhoLinhas = file("carrinho.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $produtoEncontrado = false;
        foreach ($carrinhoLinhas as $indice => $linha) {
            list($carrinhoProdutoId, $carrinhoQuantidade) = explode('|', $linha);
            if ($carrinhoProdutoId == $produtoId) {
                $carrinhoQuantidade += $quantidade;
                $carrinhoLinhas[$indice] = "$produtoId|$carrinhoQuantidade";
                $produtoEncontrado = true;
                break;
            }
        }

        // Se o produto não foi encontrado no carrinho, adicione-o
        if (!$produtoEncontrado) {
            $carrinhoLinhas[] = "$produtoId|$quantidade";
        }

        // Escreva as linhas atualizadas no arquivo carrinho.txt
        file_put_contents("carrinho.txt", implode(PHP_EOL, $carrinhoLinhas));
    } else {
        // Se o arquivo carrinho.txt não existir, crie-o
        file_put_contents("carrinho.txt", "$produtoId|$quantidade");
    }

    // Redirecione de volta para a lista de produtos após a adição ao carrinho
    header("Location: AV1_carrinho.php");
    exit;
} else {
    // Redirecione de volta para a lista de produtos caso o formulário não tenha sido enviado via POST
    header("Location: AV1_carrinho.php");
    exit;
}
?>
