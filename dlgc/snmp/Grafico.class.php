<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Grafico
 *
 * @author tavares
 */
class Grafico {

    function lineChartAno($linhaAno) {
        $lineAno = $linhaAno;
        include './totalAno/lineChartAno.php';
    }

    function barChartAno($barraAno) {
        $barAno = $barraAno;
        include './totalAno/barChartAno.php';
    }

    function doughnutChartAno($doughAno) {
        $doughnutAno = $doughAno;
        include './totalAno/doughnutChartAno.php';
    }

    function pieChartAno($pAno) {
        $pieAno = $pAno;
        include './totalAno/pieChartAno.php';
    }

    function lineChartMes($linhaMes) {
        $lineMes = $linhaMes;
        include './mesAtual/lineChartMes.php';
    }

    function barChartMes($barraMes) {
        $barMes = $barraMes;
        include './mesAtual/barChartMes.php';
    }

    function dinamicoAP($tabela) {
        $ap = $tabela;
        include './dinamico/totalAgora.php';
    }

    function dinamicoTodosAP() {
        include './dinamico/totalAgoraTodos.php';
    }

}
