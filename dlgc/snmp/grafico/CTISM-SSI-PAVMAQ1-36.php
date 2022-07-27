<?php
include_once '../Grafico.class.php';
$ap36 = new Grafico();

echo '<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">';
$ap36->lineChartAno('AP36');
echo'</article>';

echo '<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">';
$ap36->barChartMes('AP36');
echo '</article>';

$ap36->dinamicoAP('AP36');
?>