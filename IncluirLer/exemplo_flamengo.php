<?php
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('funcoes.php');

    $nomeJogador = $_POST["nome_jogador"];
    $posicao = $_POST["posicao"];
    $numeroCamisa = $_POST["numero_camisa"];
    
    $msg = "";

    adicionarJogador($nomeJogador, $posicao, $numeroCamisa);

    $msg = "Informações do jogador adicionadas com sucesso!";
}

$jogadores = lerJogadores();
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Cadastrar Novo Jogador do Flamengo</h1>
<h2>Jogadores Cadastrados</h2>
<ul>
    <?php
    foreach ($jogadores as $jogador) {
        echo "<li>{$jogador['nome']} ({$jogador['posicao']}) - Camisa {$jogador['numero_camisa']}</li>";
    }
    ?>
</ul>
<form action="exemplo_flamengo.php" method="POST">
    Nome do Jogador: <input type="text" name="nome_jogador"><br><br>
    Posição: <input type="text" name="posicao"><br><br>
    Número da Camisa: <input type="text" name="numero_camisa"><br><br>
    <input type="submit" value="Cadastrar Jogador">
</form>
<p><?php echo $msg; ?></p>
</body>
</html>
