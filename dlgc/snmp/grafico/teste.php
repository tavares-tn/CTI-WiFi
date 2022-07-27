<?php

include_once '../Banco.class.php';
$totalAgora = new Banco();

$totalAgora->conectaBanco();
$totalAgora->extratoTotalAgora();
$totalAgora->fecharConexaoBancoDados();
?>