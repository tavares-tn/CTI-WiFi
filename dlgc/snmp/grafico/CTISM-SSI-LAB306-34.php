<?php
include_once '../Grafico.class.php';
$ap34 = new Grafico();

echo '<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">';
$ap34->lineChartMes('AP34');
echo'</article>';

echo '<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">';
$ap34->barChartAno('AP34');
echo '</article>';

$ap34->dinamicoAP('AP34');
?>