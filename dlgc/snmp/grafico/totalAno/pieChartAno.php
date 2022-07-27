

<div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-fullscreenbutton="false" data-widget-editbutton="false" data-widget-sortable="false">
    <header>

        <h2>Pie Chart </h2>				

    </header>

    <div>
        <div class="jarviswidget-editbox">
            <input class="form-control" type="text">	
        </div>
        <div class="widget-body">
            <canvas id="pieChart" height="120"></canvas>
        </div>
    </div>
</div>

<script type="text/javascript">

    pageSetUp();

    var myNewChart_1, myNewChart_2, myNewChart_3, myNewChart_4, myNewChart_5, myNewChart_6;

    var pagefunction = function () {

        var pieOptions = {
            segmentShowStroke: true,
            segmentStrokeColor: "#fff",
            segmentStrokeWidth: 2,
            animationSteps: 100,
            animationEasing: "easeOutBounce",
            animateRotate: true,
            animateScale: false,
            responsive: true,
            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
        };

        var pieData = [
<?php
$meses = array(1 => "'Janeiro'", 2 => "'Fevereiro'", 3 => "'Março'", 4 => "'Abril'", 5 => "'Maio'", 6 => "'Junho'", 7 => "'Julho'", 8 => "'Agosto'", 9 => "'Setembro'", 10 => "'Outubro'", 11 => "'Novembro'", 12 => "'Dezembro'");



for ($indice = 1; $indice < (date('m') + 1); $indice++) {

    echo '{ value:' .
    include_once '../Banco.class.php';
    $pie = new Banco();
    $pie->conectaBanco();
    $x = $indice;
    $y = $x + 1;
    $pie->extrato($pieAno, "2016-{$x}-01", "2016-{$y}-01");


    $pie->fecharConexaoBancoDados();



    echo 'color:"rgba(' . (30 * $indice) . ',' . (25 * $indice) . ',' . (95 * $indice) . ',0.8)",';
    echo 'highlight: "rgba(320,320,250,0.9)",';
    echo 'label:' . $meses[$indice];
    echo '},';
};
?>
        ];

        var ctx = document.getElementById("pieChart").getContext("2d");
        myNewChart_6 = new Chart(ctx).Pie(pieData, pieOptions);


    };

    loadScript("js/plugin/chartjs/chart.min.js", pagefunction);


    var pagedestroy = function () {

        myNewChart_1.destroy();
        myNewChart_1 = null;

        myNewChart_2.destroy();
        myNewChart_2 = null;

        myNewChart_3.destroy();
        myNewChart_3 = null;

        myNewChart_4.destroy();
        myNewChart_4 = null;

        myNewChart_5.destroy();
        myNewChart_5 = null;

        myNewChart_6.destroy();
        myNewChart_6 = null;

        if (debugState) {
            root.console.log("✔ Chart.js charts destroyed");
        }
    }

</script>
