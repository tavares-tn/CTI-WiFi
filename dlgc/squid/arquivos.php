<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$arquivos = array(
    "bloqueio_mac" => array(
        "filtro" => '/^([0-9a-fA-F][0-9a-fA-F]:){5}([0-9a-fA-F][0-9a-fA-F])$/',
        "arquivo" => "bloqueados/mac/mac_bloqueados"
        ),
    "bloqueio_ip" => array(
        "filtro" => '/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\z/',
        "arquivo" => "bloqueados/ip/ip_bloqueados"
        ),
    
    "bloqueio_dominio" => array(
        "filtro" => '/^[a-zA-Z0-9][a-zA-Z0-9\-\_\.]+[a-zA-Z0-9]$/',
        "arquivo" => 'bloqueados/dominios/sites_bloqueados'
        ),
    );
?>