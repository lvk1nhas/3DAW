<?php
$cpf = $_POST["cpf"];
$nome = $_POST["nome"];
$sala = $_POST["sala"];

$servidor = "localhost";
$username = "root";
$senha = "";
$database = "faeterj3dawmanha";
$conn = new mysqli($servidor, $username, $senha, $database);

if ($conn->connect_error) {
    die("Conexão falhou, avise o administrador do sistema");
}

// Check if the fiscal with the given CPF already exists
$verificarExistenciaSQL = $conn->prepare("SELECT COUNT(*) as total FROM `Fiscal` WHERE cpf = ?");
$verificarExistenciaSQL->bind_param("s", $cpf);
$verificarExistenciaSQL->execute();
$verificarExistenciaResultado = $verificarExistenciaSQL->get_result();
$verificarExistenciaDados = $verificarExistenciaResultado->fetch_assoc();
$totalExistente = $verificarExistenciaDados['total'];

if ($totalExistente > 0) {
    // If a fiscal with the given CPF already exists, display an error message
    echo "CPF já cadastrado como fiscal. Por favor, verifique os dados e tente novamente.";
} else {
    // If the fiscal does not exist, proceed with the insertion
    // Verifica o número de fiscais para a sala
    $verificarSQL = $conn->prepare("SELECT COUNT(*) as total_fiscais FROM `Fiscal` WHERE sala = ?");
    $verificarSQL->bind_param("d", $sala);
    $verificarSQL->execute();
    $verificarResultado = $verificarSQL->get_result();
    $verificarDados = $verificarResultado->fetch_assoc();
    $totalFiscaisNaSala = $verificarDados['total_fiscais'];

    if ($totalFiscaisNaSala < 2) {
        // Se houver menos de dois fiscais, realiza a inserção
        $inserirSQL = $conn->prepare("INSERT INTO `Fiscal` (nome, cpf, sala) values (?, ?, ?)");
        $inserirSQL->bind_param("sss", $nome, $cpf, $sala);

        $resultado = $inserirSQL->execute();

        if ($resultado) {
            echo "Fiscal inserido com sucesso.";
        } else {
            echo "Erro ao inserir o fiscal na sala: " . $conn->error;
        }

        $inserirSQL->close();
    } else {
        // Se já houver dois fiscais, exibe mensagem informando que a sala está cheia
        echo "A sala atingiu a capacidade máxima de fiscais.";
    }
}

$verificarExistenciaSQL->close();
$verificarSQL->close();
$conn->close();
?>
