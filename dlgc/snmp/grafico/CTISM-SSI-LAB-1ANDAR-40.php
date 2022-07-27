<?php
include_once '../Grafico.class.php';
$ap40 = new Grafico();

echo '<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">';
$ap40->pieChartAno('AP40');
echo'</article>';

echo '<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">';
$ap40->barChartMes('AP40');
echo '</article>';

$ap40->dinamicoAP('AP40');
?>