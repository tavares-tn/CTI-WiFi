<html>
<head>
<title> Removendo regra</title>
<body bgcolor="#FFFFFF">
<center>
<br>
<br>
<font size="5" face="Tahoma"><b>Aguarde, removendo regra selecionada</b>
<br>
<img src="../includes/load.gif" />
</center>

<?php
include_once('../includes/files.inc.php');
$arquivoTmp = "$exp_acesso_especialTmp";	
$arquivo = "$exp_acesso_especial";
	if (file_exists($arquivo)){
	$urlDel  = $_POST["remove_regra"];
	$arqOpen = fopen($arquivo, "r");
	$arqNewOpen = fopen($arquivoTmp,"a");
	$contLinhas = 0 ;
	while (!feof ($arqOpen)) {
	$contLinhas++;
	$lineArqFree = fgets($arqOpen, 4096);
	if ($contLinhas != $urlDel) {
	fwrite($arqNewOpen,$lineArqFree);
	}
	}
	fclose($arqOpen);
	fclose($arqNewOpen);
	exec("/bin/mv '$arquivoTmp' '$arquivo'");
	echo '<meta http-equiv="refresh" content="1;url=index.php">';
}
else
{
   echo "O arquivo não existe.";
}
?>
</body>
</html>
