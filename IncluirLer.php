<!DOCTYPE html>
<html>
<head>
    <title>Exemplo de uma Inclusão e Leitura de Arquivo em PHP</title>
</head>
<body>
    <?php
    // Inclui o arquivo "conteudo.php"
    include('conteudo.php');

    // Nome do arquivo
    $nomeArquivo = 'arquivo.txt';

    // Verifica se o arquivo existe
    if (file_exists($nomeArquivo)) {
        // Lê o conteúdo do arquivo
        $conteudo = file_get_contents($nomeArquivo);

        // Exibe o conteúdo na página
        echo "Conteúdo do arquivo:<br>";
        echo nl2br($conteudo); // A função nl2br quebra as linhas em <br> para exibição HTML.
    } else {
        echo "Esse arquivo não existe.";
    }
    ?>
</body>
</html>
