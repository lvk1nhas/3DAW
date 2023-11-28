<?php
$id = $_POST["id"];
$novaSala = $_POST["novaSala"];

$servidor = "localhost";
$username = "root";
$senha = "";
$database = "faeterj3dawmanha";
$conn = new mysqli($servidor, $username, $senha, $database);

if ($conn->connect_error) {
    die("Conexão falhou, avise o administrador do sistema");
}

// Verifica se a nova sala já possui 50 candidatos
$verificarSQL = $conn->prepare("SELECT COUNT(*) as total_candidatos FROM `Candidato` WHERE sala = ?");
$verificarSQL->bind_param("s", $novaSala);
$verificarSQL->execute();
$verificarResultado = $verificarSQL->get_result();
$verificarDados = $verificarResultado->fetch_assoc();
$totalCandidatosNaSala = $verificarDados['total_candidatos'];

if ($totalCandidatosNaSala < 50) {
    // Se a nova sala possui menos de 50 candidatos, realiza a alteração
    $comandoSQL = $conn->prepare("UPDATE `Candidato` SET sala=? WHERE id=?");
    $comandoSQL->bind_param("si", $novaSala, $id);

    $resultado = $comandoSQL->execute();

    if ($resultado) {
        echo "Candidato transferido para a nova sala com sucesso.";
    } else {
        echo "Erro ao transferir o candidato: " . $conn->error;
    }

    $comandoSQL->close();
} else {
    // Se a nova sala já possui 50 candidatos, exibe mensagem informando que a sala está cheia
    echo "A nova sala atingiu a capacidade máxima de candidatos.";
}

$verificarSQL->close();
$conn->close();
?>
