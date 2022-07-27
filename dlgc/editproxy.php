<?php

//00:aa:0c:0c:0c:01


include('squid/arquivos.php');

function adicionarArquivo($arquivo, $novovalor) {

    $dir = "/var/squid_acl/";
    $arquivo = $dir . $arquivo;
    $arq = fopen($arquivo, "a");
    if ($arq != FALSE) {
        fwrite($arq, $novovalor . "\n");
        fclose($arq);
    }
}

function editarArquivo($arquivo, $linhaAmodificar, $novovalor) {

    $dir = "/var/squid_acl/";
    $arquivo = $dir . $arquivo;
    $arquivoTmp = $arquivo . "Tmp";
    $arq = fopen($arquivo, "r");
    $temp = fopen($arquivoTmp, "w");
    if ($arq != FALSE && $temp != FALSE) {
        $contador = 0;
        while (!feof($arq)) {
            $linha = fgets($arq, 200);
            $contador++;
            if ($contador == $linhaAmodificar) {
                $linha = $novovalor . "\n";
            }
            fwrite($temp, $linha);
        }
        fclose($arq);
        fclose($temp);
        unlink($arquivo);
        rename($arquivoTmp, $arquivo);
    }
}

function removerArquivo($arquivo, $linhaaRemover) {
    $dir = "/var/squid_acl/";
    $arquivo = $dir . $arquivo;
    $arquivoTmp = $arquivo . "Tmp";
    $arq = fopen($arquivo, "r");
    $temp = fopen($arquivoTmp, "w");
    if ($arq != FALSE && $temp != FALSE) {
        $contador = 0;
        $contLinhas = 0;
        while (!feof($arq)) {
            $linha = fgets($arq, 4096);
            if (trim($linha) == '') {
                continue;
            }
            $contLinhas++;

            if ($contLinhas != $linhaaRemover) {
                fwrite($temp, $linha);
            }
        }
        fclose($arq);
        fclose($temp);
        exec("/bin/mv '$arquivoTmp' '$arquivo'");
    }
}

if ($_POST['oper'] == 'add') {
    if (isset($arquivos[$_GET['file']])) {
        if (preg_match($arquivos[$_GET['file']]['filtro'], $_POST["valor"])) {
            adicionarArquivo($arquivos[$_GET['file']]['arquivo'], $_POST["valor"]);
        } else {
            header("HTTP/1.1 500 Valor Inv&aacute;lido");
        }
    }
} else if ($_POST['oper'] == 'edit') {
    if (isset($arquivos[$_GET['file']])) {
        if (preg_match($arquivos[$_GET['file']]['filtro'], $_POST["valor"])) {
            if (is_numeric($_POST['id'])) {
                editarArquivo($arquivos[$_GET['file']]['arquivo'], $_POST["id"], $_POST["valor"]);
            } else {
                adicionarArquivo($arquivos[$_GET['file']]['arquivo'], $_POST["valor"]);
            }
        } else {
            header("HTTP/1.1 500 Valor Inv&aacute;lido");
        }
    }
} else if ($_POST['oper'] == 'del') {


    
    if (isset($arquivos[$_GET['file']])) {
        if (is_numeric($_POST['id'])) {
            removerArquivo($arquivos[$_GET['file']]['arquivo'], $_POST["id"]);
        } else {
            $ids = explode(",", $_POST['id']);
            foreach ($ids as $id) {
                removerArquivo($arquivos[$_GET['file']]['arquivo'], $id);
            }
        }
    }
}
?>