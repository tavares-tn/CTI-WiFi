<?php

//CONFIGURATION for SmartAdmin UI
//ribbon breadcrumbs config
//array("Display Name" => "URL");
//$breadcrumbs = array(
//    "Home" => APP_URL
//);

/* navigation array config

  ex:
  "dashboard" => array(
  "title" => "Display Title",
  "url" => "http://yoururl.com",
  "url_target" => "_blank",
  "icon" => "fa-home",
  "label_htm" => "<span>Add your custom label/badge html here</span>",
  "sub" => array() //contains array of sub items with the same format as the parent
  )

 */
$page_nav = array(

    "snmp" => array(
        "title" => "Gráficos",
        "icon" => "fa fa-plus-square-o",
        "sub" => array(
            "consulta_roteador" => array(
                "title" => "Extrato total da rede",
                "icon" => "fa fa-compress",
                "url" => "snmp/grafico/extrato.php"
            ),
            "ap" => array(
                "title" => "Roteadores",
                "icon" => "fa fa-plus-square-o",
                "sub" => array(
                    "CTISM-PAVMAQ2-35" => array(
                        "title" => "CTISM PAVMAQ2",
                        "icon" => "fa fa-compress",
                        "url" => "snmp/grafico/CTISM-PAVMAQ2-35.php"
                    ),
                    "CTISM-SSI-LAB-1ANDAR" => array(
                        "title" => "CTISM-SSI-LAB-1ANDAR",
                        "icon" => "fa fa-times",
                        "url" => "snmp/grafico/CTISM-SSI-LAB-1ANDAR-40.php"
                    ),
                     "CTISM-SSI-LAB" => array(
                        "title" => "CTISM-SSI-LAB",
                        "icon" => "fa fa-times",
                        "url" => "snmp/grafico/CTISM-SSI-LAB-33.php"
                    ),
                     "CTISM-SSI-LAB301" => array(
                        "title" => "CTISM-SSI-LAB301",
                        "icon" => "fa fa-times",
                        "url" => "snmp/grafico/CTISM-SSI-LAB301-38.php"
                    ),
                     "CTISM-SSI-LAB306" => array(
                        "title" => "CTISM-SSI-LAB306",
                        "icon" => "fa fa-times",
                        "url" => "snmp/grafico/CTISM-SSI-LAB306-34.php"
                    ),
                     "CTISM-SSI-PAVMAQ1" => array(
                        "title" => "CTISM-SSI-PAVMAQ1",
                        "icon" => "fa fa-times",
                        "url" => "snmp/grafico/CTISM-SSI-PAVMAQ1-36.php"
                    ),
                     "CTISM-SSI-PAVMEC01" => array(
                        "title" => "CTISM-SSI-PAVMEC01",
                        "icon" => "fa fa-times",
                        "url" => "snmp/grafico/CTISM-SSI-PAVMEC01-27.php"
                    ),
                     "CTISM-SSI-SEDE-A" => array(
                        "title" => "CTISM-SSI-SEDE-A",
                        "icon" => "fa fa-times",
                        "url" => "snmp/grafico/CTISM-SSI-SEDE-28.php"
                    ),
                     "CTISM-SSI-SEDE-B" => array(
                        "title" => "CTISM-SSI-SEDE-B",
                        "icon" => "fa fa-times",
                        "url" => "snmp/grafico/CTISM-SSI-SEDE-29.php"
                    ),
                     "CTISM-SSI-SEDE-C" => array(
                        "title" => "CTISM-SSI-SEDE-C",
                        "icon" => "fa fa-times",
                        "url" => "snmp/grafico/CTISM-SSI-SEDE-31.php"
                    ),
                     "CTISM-SSI-SEDE-D" => array(
                        "title" => "CTISM-SSI-SEDE-D",
                        "icon" => "fa fa-times",
                        "url" => "snmp/grafico/CTISM-SSI-SEDE-32.php"
                    ),
                     "CTISM-SSI-SEDE-E" => array(
                        "title" => "CTISM-SSI-SEDE-E",
                        "icon" => "fa fa-times",
                        "url" => "snmp/grafico/CTISM-SSI-SEDE-37.php"
                    ),

                )
            )
        )
    )
);

//configuration variables
$page_title = "";
$page_css = array();
$no_main_header = false; //set true for lock.php and login.php
$page_body_prop = array(); //optional properties for <body>
$page_html_prop = array(); //optional properties for <html>
?>