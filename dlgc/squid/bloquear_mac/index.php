
<?php
//NOVO METODO PARA CONTAR    
$arquivo = "$mac_Bloqueados";
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
echo ')" ><img src="../includes/cross.png" alt="Apagar Regra" title="Apagar Regra"></img></a>';
echo "<a href='javascript:AbrePop(";
echo $num;
echo ")'><img src='../includes/pencil.png' alt='Editar Regra' title='Editar Regra'></img></a>";
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
</body>
</html>
