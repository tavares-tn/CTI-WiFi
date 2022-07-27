<?php
include_once '../Grafico.class.php';
$ap32 = new Grafico();

echo '<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">';
$ap32->pieChartAno('AP32');
echo'</article>';

echo '<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">';
$ap32->barChartMes('AP32');
echo '</article>';

$ap32->dinamicoAP('AP32');

?>