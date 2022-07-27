<?php
include_once '../Grafico.class.php';
$ap27 = new Grafico();

echo '<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">';
$ap27->pieChartAno('AP27');
echo'</article>';

echo '<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">';
$ap27->barChartMes('AP27');
echo '</article>';

$ap27->dinamicoAP('AP27');

?>