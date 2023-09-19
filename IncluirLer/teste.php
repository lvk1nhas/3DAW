<?php

function alterarJogador($nomeAntigo, $novoNome, $novaPosicao, $novoNumeroCamisa) {
    $arquivo = "jogadores_flamengo.txt";
    $linhas = file($arquivo);

    $novoConteudo = "";
    $alterado = false;

    foreach ($linhas as $linha) {
        $dados = explode(";", $linha);
        $nome = trim($dados[0]);

        if ($nome === $nomeAntigo) {
            // Jogador encontrado, faz a alteração
            $linha = $novoNome . ";" . $novaPosicao . ";" . $novoNumeroCamisa . "\n";
            $alterado = true;
        }

        $novoConteudo .= $linha;
    }

    if ($alterado) {
        // Reescreve o arquivo com as alterações
        file_put_contents($arquivo, $novoConteudo);
        return true; // Sucesso na alteração
    } else {
        return false; // Jogador não encontrado
    }
}

function excluirJogador($nome) {
    $arquivo = "jogadores_flamengo.txt";
    $linhas = file($arquivo);

    $novoConteudo = "";
    $excluido = false;

    foreach ($linhas as $linha) {
        $dados = explode(";", $linha);
        $nomeJogador = trim($dados[0]);

        if ($nomeJogador !== $nome) {
            $novoConteudo .= $linha;
        } else {
            $excluido = true;
        }
    }

    if ($excluido) {
        // Reescreve o arquivo sem o jogador excluído
        file_put_contents($arquivo, $novoConteudo);
        return true; // Sucesso na exclusão
    } else {
        return false; // Jogador não encontrado
    }
}

// Exemplo de uso:
//alterarJogador("Neymar", "Messi", "Atacante", 10);
//excluirJogador("Cristiano Ronaldo");

?>