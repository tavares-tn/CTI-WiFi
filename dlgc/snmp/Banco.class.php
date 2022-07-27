<?php

/**
 * Description of Banco
 *
 * @author tavares
 */
class Banco {

    private $ip = '172.17.22.74';
    private $base = 'snmp';
    private $usuario = 'root';
    private $senha = 'TAVARES';

    function conectaBanco() {

        try {
            $dsn = "mysql:host={$this->ip};dbname={$this->base}";
            $this->conexao = new PDO($dsn, $this->usuario, $this->senha);
        } catch (Exception $erroConectarBanco) {
            echo 'Erro ! ' . $erroConectarBanco->getMessage();
        }
    }

    function fecharConexaoBancoDados() {
        $this->conexao = null;
    }

    function inserirDadosTabelas($mac, $velocidade, $potencia, $tabelaDestino) {

        try {

            $this->conexao->exec("insert into {$tabelaDestino} (mac, velocidade, potencia) values('{$mac}','{$velocidade}','{$potencia}')");
        } catch (Exception $erroInserirDadosBanco) {
            echo 'Erro ! ' . $erroInserirDadosBanco->getMessage();
        }
    }

    function extrato($tabela, $dataInicio, $dataFim) {

        try {
            $mostra = $this->conexao->query("select count(distinct(mac)) from {$tabela}  where data between '{$dataInicio}' and '{$dataFim}'");

            foreach ($mostra as $value) {
                echo $value['count(distinct(mac))'] . ', ';
            }
        } catch (Exception $erroMostraDadosBanco) {
            echo 'Erro ! ' . $erroMostraDadosBanco->getMessage();
        }
    }

    function extratoAgora($tabela) {
        $inicio = date("Y-m-d H:i", strtotime('-8 minutes'));
        $fim = date("Y-m-d", strtotime('+1 days'));

        try {
            $mostra = $this->conexao->query("select count(distinct(mac)) from {$tabela}  where data between '{$inicio}' and '{$fim}'");

            foreach ($mostra as $value) {
                echo $value['count(distinct(mac))'];
            }
        } catch (Exception $erroMostraDadosBanco) {
            echo 'Erro ! ' . $erroMostraDadosBanco->getMessage();
        }
    }

    function extratoTotalAgora() {
        $inicio = date("Y-m-d H:i", strtotime('-8 minutes'));
        $fim = date("Y-m-d", strtotime('+1 days'));

        try {
            $mostra = $this->conexao->query("select total('{$inicio}','{$fim}')");

            foreach ($mostra as $value) {
                echo $value["total('{$inicio}','{$fim}')"];
            }
        } catch (Exception $erroMostraDadosBanco) {
            echo 'Erro ! ' . $erroMostraDadosBanco->getMessage();
        }
    }
    
    
        function extratoAgoraTEST($tabela, $inicio, $fim) {
//        $inicio = date("Y-m-d H:i", strtotime('-8 minutes'));
//        $fim = date("Y-m-d", strtotime('+1 days'));

        try {
            $mostra = $this->conexao->query("select count(distinct(mac)) from {$tabela}  where data between '{$inicio}' and '{$fim}'");

            foreach ($mostra as $value) {
                echo $value['count(distinct(mac))'];
            }
        } catch (Exception $erroMostraDadosBanco) {
            echo 'Erro ! ' . $erroMostraDadosBanco->getMessage();
        }
    }

}
