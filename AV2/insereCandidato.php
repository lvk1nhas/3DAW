<?php
$cpf = $_POST["cpf"];
$nome = $_POST["nome"];
$cargo = $_POST["cargo"];
$id = $_POST["id"];
$email = $_POST["email"];
$sala = $_POST["sala"];

$servidor = "localhost";
$username = "root";
$senha = "";
$database = "faeterj3dawmanha";
$conn = new mysqli($servidor, $username, $senha, $database);

if ($conn->connect_error) {
    die("Conexão falhou, avise o administrador do sistema");
}

// Check if the candidate with the given CPF or ID already exists
$verificarExistenciaSQL = $conn->prepare("SELECT COUNT(*) as total FROM `Candidato` WHERE cpf = ? OR id = ?");
$verificarExistenciaSQL->bind_param("ss", $cpf, $id);
$verificarExistenciaSQL->execute();
$verificarExistenciaResultado = $verificarExistenciaSQL->get_result();
$verificarExistenciaDados = $verificarExistenciaResultado->fetch_assoc();
$totalExistente = $verificarExistenciaDados['total'];

if ($totalExistente > 0) {
    // Se o CPF ou ID ja existe, tente novamente
    echo "CPF ou Identidade já cadastrados. Por favor, verifique os dados e tente novamente.";
} else {
    // Verifica o número de Candidatos para a sala e se ele ja existe
    $verificarSQL = $conn->prepare("SELECT COUNT(*) as total_candidatos FROM `Candidato` WHERE sala = ?");
    $verificarSQL->bind_param("s", $sala);
    $verificarSQL->execute();
    $verificarResultado = $verificarSQL->get_result();
    $verificarDados = $verificarResultado->fetch_assoc();
    $totalCandidatosNaSala = $verificarDados['total_candidatos'];

    if ($totalCandidatosNaSala < 50) {
        // Se houver menos de 50 candidatos na sala, realiza a inserção
        $inserirSQL = $conn->prepare("INSERT INTO `Candidato` (nome, cpf, sala, email, cargo, id) values (?, ?, ?, ?, ?, ?)");
        $inserirSQL->bind_param("sssssi", $nome, $cpf, $sala, $email, $cargo, $id);

        $resultado = $inserirSQL->execute();

        if ($resultado) {
            echo "Candidato inserido com sucesso.";
        } else {
            echo "Erro ao inserir o candidato na sala: " . $conn->error;
        }

        $inserirSQL->close();
    } else {
        // Se já houver 50 candidatos, exibe mensagem informando que a sala está cheia
        echo "A sala atingiu a capacidade máxima de candidatos.";
    }
}

$verificarExistenciaSQL->close();
$verificarSQL->close();
$conn->close();
?>
