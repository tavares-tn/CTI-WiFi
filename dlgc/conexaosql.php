<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConexaoSQL
 *
 * @author renato
 */
//	Conecta() - Conecta no Banco. (Com Controle Pra Não Abrir Mais de uma Vez a Conexão).
//	Desconecta() - Desconecta do Banco. (Controle Pra não fechar mais de uma vez a Conexão).
//	Query($query) - Executa a Query.
//	Rows([$result]) - Retorna o Numero de Linhas dum Select. Se não inserido Argumento ele Executa ultima Query.
//	Arrays([$result]) - Retorna uma Array com os dados do Banco. Se não inserido Argumento ele Executa ultima Query.
//	Row([$result]) - Retorna uma Array com Indices os dados do Banco. Se não inserido Argumento ele Executa ultima Query.
//	Affect_Rows([$result]) - Linhas afetadas pela Funcao Anterior. Se não inserido Argumento ele Executa ultima Query.
//
//	Renato Preigschadt de Azevedo - rpa @ canalsm . com . br
//

class  ConexaoSQL {
  var $last_result; // Armazenar Ultimo Result.
  var $ip = "172.17.22.74";
  var $user = "root";
  var $pass = "TAVARES";
  var $database = "snmp";
  var $conexao;
  var $qtd = 0;
  
  function __construct($banco){
      $this->database=$banco;
  }
  
  function __destruct() {
      $this->Desconecta();
  }
  function Quantidade(){
  	return $this->qtd;
  }
 
  
  function Log($tipo, $query, $result){
  	if ( strlen($query) > 1 ) {
	  	//$fp = fopen('mysql.log', "a");
		//$str = "$tipo [".date("d:m:Y-H:i:s")."] Query [ ".$query." ] Result [ ".$result." ]\n";
		//fputs($fp, $str);
		//fclose($fp);
		echo "$tipo [".date("d:m:Y-H:i:s")."] Query [ ".$query." ] Result [ ".$result." ]<br />\n";
	}
	return TRUE;
  }
  function Conecta() {
	if ( $this->conexao == NULL ) {
      $this->conexao = mysql_connect ($this->ip,$this->user,$this->pass) or die(mysql_error());//$this->Log("[Die]\t", mysql_error(), "mysql_connect()");
      mysql_select_db ( $this->database, $this->conexao); 
	}
   }
  function Desconecta() {
  	if ( $this->conexao != NULL ) {
      mysql_close ($this->conexao);
	  $this->conexao = NULL;
	} 
  }      
  function Query($query) {
	$resultado = mysql_query($query) or $this->Log("[Die]\t", mysql_error(), "$query");
	$this->qtd+=1;
	$this->last_result = $resultado;
//	$this->Log("[Query]\t",$query, $resultado);
	return $resultado;
  }
  function Rows() {
  $this->qtd+=1;
	if ( func_num_args() )
		$resultado = func_get_arg(0);
	else
		$resultado = $this->last_result;
	if ( $resultado )
		$rows = mysql_num_rows($resultado) or $this->Log("[Die]\t", mysql_error(), "mysql_num_rows");
	else
		$rows = FALSE;
//	$this->Log("[Rows]\t", $rows, $resultado);
    return $rows;
  }
  function Arrays() {
  $this->qtd+=1;
	if ( func_num_args() )
		$resultado = func_get_arg(0);
	else
		$resultado = $this->last_result;
	if ( $resultado )
		$array = mysql_fetch_array($resultado) or $this->Log("[Die]\t", mysql_error(), "mysql_fetch_array");
	else
		$array = FALSE;
//	$this->Log("[Arrays]\t", $array, $resultado);
	return $array;
  }
  function Row() {
  $this->qtd+=1;
	if ( func_num_args() )
		$resultado = func_get_arg(0);
	else
		$resultado = $this->last_result;
	if ( $resultado )
		$array = mysql_fetch_row($resultado) or $this->Log("[Die]\t", mysql_error(), "mysql_feth_row");
	else
		$array = FALSE;
//	$this->Log("[Row]\t", $array[0], $resultado);
	return $array;
  }
  function Affect_Rows(){
  $this->qtd+=1;
	if ( func_num_args() )
		$resultado = func_get_arg(0);
	else
		$resultado = $this->last_result;
	if ( $resultado )
		$rows = mysql_affected_rows($this->conexao) or $this->Log("[Die]\t", mysql_error(), "mysql_affect_rows");
	else
		$rows = FALSE;
//	$this->Log("[Affect_Rows]\t", $rows, $resultado);
	return $rows;
  }
  //Fim da Classe
	function InsertID(){
		return mysql_insert_id ($this->conexao);
	}
} 



?>
