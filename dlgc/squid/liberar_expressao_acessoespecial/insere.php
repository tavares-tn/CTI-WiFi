<html>
<head>
<title> Inserindo nova regra</title>
<body bgcolor="#FFFFFF">
<center>
<br>
<br>
<font size="5" face="Tahoma"><b>Aguarde, efetuando as devidas modificações</b>
<br>
<img src="../includes/load.gif" />

<?php
include_once('../includes/files.inc.php');
$arquivoTmp = "$exp_acesso_especialTmp";	
$arquivo = "$exp_acesso_especial";
	if (file_exists($arquivo)){
	$urlFree= $_POST["regra"];
//Validacao 
if (preg_match('/^[a-zA-Z0-9][a-zA-Z0-9\-\_\.]+[a-zA-Z0-9]$/', $_POST["regra"]))
            {
	$arqOpen  = fopen($arquivo, "a");
	$urlInser = "$urlFree\n";
	fwrite($arqOpen, $urlInser);
	fclose ($arqOpen);
	exec("cat $arquivoTmp > $arquivo.bkp |cp $arquivoTmp /tmp |rm -f $arquivoTmp");
	echo '<meta http-equiv="refresh" content="1;url=index.php">';
	echo '</head>';
            }
        else
            {
            echo '<br><br><br><br><br><font size="5" face="Tahoma"><b>Entre com uma expressão válida. Por Favor</b><br><br>
		<form> 
		<input type="button" value="Voltar" onClick="history.go(-1)"> 
		<form>';
            }
}
else
{
   echo "O arquivo não existe";
}
?>
</center>
</font>
</body>
</html>
