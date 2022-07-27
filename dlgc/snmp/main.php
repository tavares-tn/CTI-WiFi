<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include './Banco.class.php';
        include './MostraConectados.class.php';



        $mc = new MostraConectados();      

        for ($destino = 26; $destino < 49; $destino++) {
            $ip = "10.10.1." . $destino;
            $mc->ConectadosShow($ip, $destino,"public",".1.3.6.1.4.1.9.6.1.32.4410.1.3.3.3.1");
        }
        
        
        
        

//
//
//        $mostra = new Banco();
//        $mostra->conectaBanco('172.17.22.74', 'snmp', 'root', 'thalesTAVARES');
//        $mostra->mostraDadosBancoConectados();
//        echo '</br>';
//        $mostra->mostraDadosBancoErro()
        ?>
    </body>
</html>

