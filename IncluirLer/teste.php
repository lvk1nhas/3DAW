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

<?php

function excluirArquivoJogadores() {
    $arquivo = "jogadores_flamengo.txt";

    if (file_exists($arquivo)) {
        if (unlink($arquivo)) {
            return true; // Sucesso na exclusão do arquivo
        } else {
            return false; // Falha na exclusão do arquivo
        }
    } else {
        return false; // O arquivo não existe
    }
}

// Exemplo de uso:
// if (excluirArquivoJogadores()) {
//     echo "O arquivo de jogadores foi excluído com sucesso.";
// } else {
//     echo "Falha ao excluir o arquivo de jogadores.";
// }

?>
<?php

function alterarAluno($matriculaAntiga, $novaMatricula, $novoNome, $novaIdade) {
    $arquivo = "alunos.txt";
    $linhas = file($arquivo); // Lê todas as linhas do arquivo e armazena em um array.

    $novoConteudo = "";
    $alterado = false;

    foreach ($linhas as $linha) {
        $dados = explode(";", $linha); // Divide a linha em partes usando ';' como separador.
        $matricula = trim($dados[0]); // Pega a matrícula do aluno e remove espaços em branco.

        if ($matricula === $matriculaAntiga) {
            // Aluno encontrado, faz a alteração
            $linha = $novaMatricula . ";" . $novoNome . ";" . $novaIdade . "\n"; // Cria a nova linha com os dados atualizados.
            $alterado = true;
        }

        $novoConteudo .= $linha; // Adiciona a linha atual (alterada ou não) ao novo conteúdo.
    }

    if ($alterado) {
        // Reescreve o arquivo com as alterações
        file_put_contents($arquivo, $novoConteudo);
        return true; // Sucesso na alteração
    } else {
        return false; // Aluno não encontrado
    }
}

// Exemplo de uso:
// if (alterarAluno("12345", "54321", "João Silva", 20)) {
//     echo "Os dados do aluno foram alterados com sucesso.";
// } else {
//     echo "Aluno não encontrado.";
// }

?>

