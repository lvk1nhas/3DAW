<?php

function lerJogadores() {
    $jogadores = [];

    if (file_exists("jogadores_flamengo.txt")) {
        $arqJogadores = fopen("jogadores_flamengo.txt", "r");

        while (($linha = fgets($arqJogadores)) !== false) {
            $dados = explode(";", $linha);
            $jogadores[] = [
                "nome" => $dados[0],
                "posicao" => $dados[1],
                "numero_camisa" => $dados[2]
            ];
        }

        fclose($arqJogadores);
    }

    return $jogadores;
}

function adicionarJogador($nome, $posicao, $numeroCamisa) {
    $arqJogadores = fopen("jogadores_flamengo.txt", "a") or die("Erro ao criar arquivo");
    $linha = $nome . ";" . $posicao . ";" . $numeroCamisa . "\n";
    fwrite($arqJogadores, $linha);
    fclose($arqJogadores);
}
?>
