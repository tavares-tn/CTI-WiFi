<?php
include_once '../Grafico.class.php';
$ap31 = new Grafico();

echo '<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">';
$ap31->barChartMes('AP31');
echo'</article>';

echo '<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">';
$ap31->lineChartAno('AP31');
echo '</article>';

$ap31->dinamicoAP('AP31');

?>