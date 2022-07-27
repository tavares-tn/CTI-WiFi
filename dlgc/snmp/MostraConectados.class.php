<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MostraConectados
 *
 * @author tavares
 */
include_once './Banco.class.php';

class MostraConectados {

    function ConectadosShow($ip, $destino, $community, $oid) {
        
        $tabelaDestino = "AP".$destino;

        $session = new SNMP(SNMP::VERSION_2C, $ip, $community);

        if ($retorno = $session->walk($oid)) {

            $qtdElemanto = count($retorno);
            $remove = $qtdElemanto / 5;

                 for ($i = 0; $i < $remove; $i++) {
                        array_pop($retorno);  // remove STRING: "Connected"
                        array_shift($retorno); // remove INTEGER: X
                  }


            $conectados = implode('|', $retorno); //tranforma em string e separa os elemento  por "|"
            $conectados = str_replace('STRING: ', NULL, $conectados); //remove 'STRING:'
            $conectados = str_replace('"', NULL, $conectados); //remove '"'
            $conecta = explode('|', $conectados);
            
            
            $this->salvaConectados($remove, $conecta, $tabelaDestino); //chama metodo responsavel por salvar
            
            $session->close(); //SNMP
        } 
    }
    
    function salvaConectados($rem, $conect, $tabela){
        
            $salva = new Banco(); //estancia banco

                for ($i = 0; $i < $rem; $i++) {
                    $salva->conectaBanco();             
                    $salva->inserirDadosTabelas($conect[$i], $conect[$i + $rem], $conect[$i + $rem * 2], $tabela);
                }

            $salva->fecharConexaoBancoDados(); //fecha conexao banco
    }

}

?>