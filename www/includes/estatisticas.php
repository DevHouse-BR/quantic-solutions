<?
require("includes/conectar_mysql.php");
	$query = "SELECT COUNT(*) FROM estatisticas where area='" . $pg . "'";
	$result = mysql_query($query) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());
	$tmp = mysql_fetch_row($result);
	$num = $tmp[0];
	if ($num == 0){
		$query = "INSERT INTO estatisticas (area, visitas) VALUES ('";
		$query .= $pg ."',1)";
		$result = mysql_query($query) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());
	}
	else{
		$query = "SELECT visitas FROM estatisticas where area='" . $pg . "'";
		$result = mysql_query($query) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());
		$tmp = mysql_fetch_row($result);
		$num = $tmp[0];
		$num ++;
		$query = "UPDATE estatisticas SET visitas=" . $num . " where area='" . $pg . "'"; 
		$result = mysql_query($query) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());
	}
	if(empty($_COOKIE["visita_cadastrada"])){
		$query = "INSERT INTO info_visitantes (browser, processador, ip) VALUES ('";
		$query .= $HTTP_SERVER_VARS['HTTP_USER_AGENT'] ."','";
		$query .= $HTTP_SERVER_VARS['PROCESSOR_IDENTIFIER'] ."','";
		$query .= $HTTP_SERVER_VARS['REMOTE_ADDR'] ."')";
		$result = mysql_query($query) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());
		setcookie("visita_cadastrada", "sim");
	}
require("includes/desconectar_mysql.php");
?>