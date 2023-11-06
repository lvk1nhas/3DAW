<?php
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

$comandoSQL = $conn->prepare("INSERT INTO `Produtos` (nome, upc, valor) values (?, ?, ?)");
$comandoSQL->bind_param("ssd", $nome, $upc, $valor);

$resultado = $comandoSQL->execute();

if ($resultado) {
    echo "Produto inserido com sucesso.";
} else {
    echo "Erro ao inserir o produto: " . $conn->error;
}

$comandoSQL->close();
$conn->close();
?>
