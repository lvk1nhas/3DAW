<?php
$id = $_POST["id"];

$servidor = "localhost";
$username = "root";
$senha = "";
$database = "faeterj3dawmanha";
$conn = new mysqli($servidor, $username, $senha, $database);
if ($conn->connect_error) {
    die("Conexão falhou, avise o administrador do sistema");
}

// Use uma declaração preparada para evitar injeção de SQL (https://condtec.com.br/programacao-web/instrucoes-preparadas-do-php-mysqli-para-evitar-injecao-de-sql/105/)
$comandoSQL = $conn->prepare("SELECT * FROM `Produtos` WHERE id = ?");
$comandoSQL->bind_param("i", $id);

$comandoSQL->execute();

$resultado = $comandoSQL->get_result();
if ($resultado->num_rows > 0) {
    $produto = $resultado->fetch_assoc();
    echo json_encode($produto, JSON_UNESCAPED_UNICODE);
} else {
    echo "Produto não encontrado.";
}

$comandoSQL->close();
$conn->close();
?>
