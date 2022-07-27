<?php

$ap26 = new Grafico();

echo '<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">';
$ap26->doughnutChartAno('AP26');
echo'</article>';

echo '<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">';
$ap26->lineChartMes('AP26');
echo '</article>';

$ap26->dinamicoAP($tabela);
?>