<?php
$servidor = "localhost";
$username = "root";
$senha = "";
$database = "faeterj3dawmanha";
$conn = new mysqli($servidor, $username, $senha, $database);

if ($conn->connect_error) {
    die("Conexão falhou, avise o administrador do sistema");
}

$comandoSQL = "SELECT * FROM `Produtos`";
$resultado = $conn->query($comandoSQL);

$produtos = array();

if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $produtos[] = $row;
    }
}

echo json_encode($produtos, JSON_UNESCAPED_UNICODE);

$conn->close();
?>
