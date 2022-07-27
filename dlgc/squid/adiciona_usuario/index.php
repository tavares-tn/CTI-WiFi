
<?php
include_once('../includes/files.inc.php');
	echo "<form name='insere' method='post'>";
	echo "<p class='titulo'>Para cadastrar usuários livres, utilize o campo abaixo:</p>";
	echo "Usuário: <input class='input' type='text' width='400' name='user' /> ";
	echo "<br>";
	echo "Senha: <input class='input_senha' type='password' width='400' name='senha'/>";
	echo "<br>";
	echo "<input class='botao_users' type='button' name='InsereAplicaRegra' onClick='javascript:InsereAplica()' value='Inserir'> ";
	echo "<input class='botao_users' type='button' onClick='Aplicar()' value='Aplicar'>";
	echo  "</form>";
	echo '<table class="tabela">';
	echo '<td class="id"><b>ID</b></td>';
	echo '<td class="opcao"><b>Opção</b></td>';
	echo '<td><b>Usuários Cadastrados</b></td>';
//NOVO METODO PARA CONTAR    
$arquivo = "$userlivre";
  if (file_exists($arquivo)){
$num =  0;
$abre = fopen($arquivo, "r");
while ($linhas = fgets($abre)) {
if(trim($linhas) != '')
$num++;

echo '<tr>';
echo '<td class="id">';
echo $num;
echo '</td>';
echo '<td class="tabela">';
echo '<a href="javascript:removeRegra(';
echo $num;
echo ')" ><img src="../includes/cross.png" alt="Remover Usuário" title="Remover Usuário"></img></a>';
echo '</td>';
echo '<td align="left" class="tabela">';
echo  $linhas;
echo '</td>';
echo '</tr>';
	}
}
else
{
   echo "O arquivo não existe";
}
?>
</table>
<form name="exclui" method="post" action="remove.php">
<input type="hidden" name="remove_regra" /><br />
</form>