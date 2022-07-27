<div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-fullscreenbutton="false" data-widget-editbutton="false" data-widget-sortable="false">
    <header>

        <h2>Gráfico mês de <?php
            switch (date('m')) {
                case 01:
                    echo "Janeiro";
                    break;
                case 02:
                    echo "Fevereiro";
                    break;
                case 03:
                    echo "Março";
                    break;
                case 04:
                    echo "Abril";
                    break;
                case 05:
                    echo "Maio";
                    break;
                case 06:
                    echo "Junho";
                    break;
                case 07:
                    echo "Julho";
                    break;
                case 08:
                    echo "Agosto";
                    break;
                case 09:
                    echo "Setembro";
                    break;
                case 10:
                    echo "Outubro";
                    break;
                case 11:
                    echo "Novembro";
                    break;
                case 12:
                    echo "Dezembro";
                    break;
            }
            ?>  </h2>				

    </header>
    <div>
        <div class="jarviswidget-editbox">
            <input class="form-control" type="text">	
        </div>
        <div class="widget-body">
            <canvas id="lineChart" height="120"></canvas>
        </div>
    </div>			
</div>

<script type="text/javascript">

    pageSetUp();

    var myNewChart_1, myNewChart_2, myNewChart_3, myNewChart_4, myNewChart_5, myNewChart_6;

    var pagefunction = function () {


        var lineOptions = {
            scaleShowGridLines: true,
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleGridLineWidth: 1,
            bezierCurve: true,
            bezierCurveTension: 0.4,
            pointDot: true,
            pointDotRadius: 4,
            pointDotStrokeWidth: 1,
            pointHitDetectionRadius: 20,
            datasetStroke: true,
            datasetStrokeWidth: 2,
            datasetFill: true,
            responsive: true,
            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
        };

        var lineData = {labels: [<?php
            $agora = date("i");
            $hora = (date("H")*60) + $agora;
//            echo $agora;
//
//            if ($agora < 30) {
//                for ($i = 1; $i < $agora; $i++) {
//
//                    $inicio = date("H:") . $i;
//                    echo '"' . $inicio . '", ';
//                }
//            } else {
//                for ($i = 30; $i < $agora; $i++) {
//
//                    $inicio = date("H:") . $i;
//                    echo '"' . $inicio . '", ';
//                }
//            }
            
            for ($=1; $i < $hora; $i++){
                $inicio = $i;
                echo '"' . $inicio . '", ';
            }
            
            ?>],
            datasets: [
                {
                    label: "My Second dataset",
                    fillColor: "rgba(151,187,205,0.2)",
                    strokeColor: "rgba(151,187,205,1)",
                    pointColor: "rgba(151,187,205,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(151,187,205,1)",
                    data: [
<?php
//include_once '../Banco.class.php';
//
//$dados = new Banco();
//
//$dados->conectaBanco();
//
//$minutos = date("i");
//
//if ($minutos > 30) {
//    for ($i = 1; $i < $minutos ; $i++) {
//        $inicio = date("Y-m-d H:").$i;
//        $fim = date("Y-m-d H:").($i + 2);
//
//        $dados->extratoAgoraTEST('AP38', $inicio, $fim);
//    }
//} else {
//     for ($i = 30; $i < $minutos ; $i++) {
//        $inicio = date("Y-m-d H:").$i;
//        $fim = date("Y-m-d H:").($i + 2);
//
//        $dados->extratoAgoraTEST('AP38', $inicio, $fim);
//    }
//}
//$dados->fecharConexaoBancoDados();
?>

                    ]
                }
            ]
        };

        var ctx = document.getElementById("lineChart").getContext("2d");
        myNewChart_1 = new Chart(ctx).Line(lineData, lineOptions);



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
