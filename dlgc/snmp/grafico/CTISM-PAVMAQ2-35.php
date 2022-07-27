<?php

include_once '../Grafico.class.php';

$ap35 = new Grafico();


echo '<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">';
$ap35->barChartMes('AP35');
echo'</article>';


echo '<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">';
$ap35->lineChartAno('AP35');
echo '</article>';

$ap35->dinamicoAP('AP35');

?>
