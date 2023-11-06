<?php
    $id = $_POST["id"];

    $servidor = "localhost";
    $username = "root";
    $senha = "";
    $database = "faeterj3dawmanha";
    $conn = new mysqli($servidor,$username,$senha,$database);
    if ($conn->connect_error) {
       die("Conexao falhou, avise o administrador do sistema");
    }

    // Use declaração preparada para evitar injeção de SQL (https://condtec.com.br/programacao-web/instrucoes-preparadas-do-php-mysqli-para-evitar-injecao-de-sql/105/)
$comandoSQL = $conn->prepare("DELETE FROM `Produtos` WHERE id=?");
$comandoSQL->bind_param("i", $id);

$resultado = $comandoSQL->execute();

if ($resultado) {
    echo "Produto EXCLUÍDO com sucesso.";
} else {
    echo "Erro ao excluir o produto: " . $conn->error;
}

$comandoSQL->close();
$conn->close();
?>
 