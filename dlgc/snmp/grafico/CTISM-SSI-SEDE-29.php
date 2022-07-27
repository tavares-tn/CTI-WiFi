<?php
include_once '../Grafico.class.php';
$ap29 = new Grafico();

echo '<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">';
$ap29->pieChartAno('AP29');
echo'</article>';

echo '<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">';
$ap29->lineChartMes('AP29');
echo '</article>';

$ap29->dinamicoAP('AP29');

?>