<?php

$acao = $_GET['file'];

include('squid/arquivos.php');

function abrirArquivo($arquivo) {
    $dir = "/var/squid_acl/";
    $arquivo = $dir . $arquivo;
    $arquivoTmp = $arquivo . "Tmp";
    if (file_exists($arquivo)) {
        $num = 0;
        $abre = fopen($arquivo, "r");
        while ($linhas = fgets($abre)) {
            if (trim($linhas) == '') {
                continue;
            }
            $num++;
            $row['id'] = $num;
            $row['valor'] = $linhas;
            $response->rows[$num - 1] = $row;
        }
        echo json_encode($response);
    }
}

if (isset($arquivos[$_GET['file']])) {
    abrirArquivo($arquivos[$_GET['file']]['arquivo']);
}
?>