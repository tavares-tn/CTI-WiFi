<?php
include_once '../Grafico.class.php';
$ap28 = new Grafico();

echo '<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">';
$ap28->barChartMes('AP28');
echo'</article>';

echo '<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">';
$ap28->lineChartAno('AP28');
echo '</article>';

$ap28->dinamicoAP('AP28');

?>