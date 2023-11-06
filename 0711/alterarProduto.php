<?php
$id = $_POST["id"];
$upc = $_POST["upc"];
$nome = $_POST["nome"];
$valor = $_POST["valor"];

$servidor = "localhost";
$username = "root";
$senha = "";
$database = "faeterj3dawmanha";
$conn = new mysqli($servidor, $username, $senha, $database);

if ($conn->connect_error) {
    die("Conexão falhou, avise o administrador do sistema");
}

// Use declaração preparada para evitar injeção de SQL (https://condtec.com.br/programacao-web/instrucoes-preparadas-do-php-mysqli-para-evitar-injecao-de-sql/105/)
$comandoSQL = $conn->prepare("UPDATE `Produtos` SET nome=?, upc=?, valor=? WHERE id=?");
$comandoSQL->bind_param("ssdi", $nome, $upc, $valor, $id);

$resultado = $comandoSQL->execute();

if ($resultado) {
    echo "Produto alterado com sucesso.";
} else {
    echo "Erro ao alterar o produto: " . $conn->error;
}

$comandoSQL->close();
$conn->close();
?>
