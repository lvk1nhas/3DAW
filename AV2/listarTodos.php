<?php
$servidor = "localhost";
$username = "root";
$senha = "";
$database = "faeterj3dawmanha";
$conn = new mysqli($servidor, $username, $senha, $database);

if ($conn->connect_error) {
    die("Conexão falhou, avise o administrador do sistema");
}

$comandoSQL = "SELECT * FROM `Candidato` ORDER BY sala ASC, nome ASC";
$resultado = $conn->query($comandoSQL);

$candidatos = array();

if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $candidatos[] = $row;
    }
}

echo json_encode($candidatos, JSON_UNESCAPED_UNICODE);

$conn->close();
?>
