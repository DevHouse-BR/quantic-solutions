<?php
$comeco_news = '
<html>
<head>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
<title>QUANTIC SOLUTIONS | NEWSLETTER</title>
<style type="text/css">
<!--
a {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	color: #1111C4;
	text-decoration: none;
}
a:hover {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	color: #1111C4;
	text-decoration: underline;
}
a:visited {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	color: #1111C4;
	text-decoration: none;
}
a:active {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	color: #1111C4;
	text-decoration: none;
}
.menu {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	color: #FFFFFF;
	text-decoration: none;
}
.menu:hover {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	color: #FFFFFF;
	text-decoration: underline;
}
.menu:visited {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	color: #FFFFFF;
	text-decoration: none;
}
.menu:active {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	color: #FFFFFF;
	text-decoration: none;
}
.linkquantic {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	color: #000000;
	text-decoration: none;
}
.linkquantic:hover {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	color: #000000;
	text-decoration: underline;
}
.linkquantic:visited {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	color: #000000;
	text-decoration: none;
}
.linkquantic:active {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	color: #000000;
	text-decoration: none;
}
.conteudo_justificado {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	text-align: justify;
}
.conteudo_justificado_margem {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	text-align: justify;
}
.conteudo {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style>
</head>

<body>';

$fim_news = "</body></html>\r\n";


$PERMISSAO_DE_ACESSO = "Administradores/Publicadores";
require("../includes/permissao_documento.php");

$modo = $_POST["modo"];
$publicador_cd = $_POST["publicador_cd"];
$publicador = $_POST["publicador"];
$data = time();
$conteudo = $_POST["conteudo"];

if ($modo == "add")	{
	$query = "INSERT INTO newsletters (publicador_cd, publicador_usuario, data, conteudo) VALUES ('";
	$query .= $publicador_cd ."','";
	$query .= $publicador ."','";
	$query .= $data ."','";
	$query .= $conteudo . "')";
}
if ($modo == "update")
	{
	$query = "UPDATE newsletters SET ";
	$query .= "data='" . $data ."', ";
	$query .= "conteudo='" . $conteudo ."'";
	$query .= " WHERE (cd='" . $_POST["cd"] . "')";
}

require("../../includes/conectar_mysql.php");
	$result = mysql_query($query) or die("Erro ao atualizar registros no Banco de dados: " . mysql_error());
	
	$query = "SELECT nome, email from internautas";
	$result = mysql_query($query) or die("Erro ao remover registros do Banco de dados: " . mysql_error());
	while ($internauta = mysql_fetch_array($result, MYSQL_ASSOC)){
	
		mail($internauta['email'], "Newsletter Quantic Solutions", $comeco_news . stripslashes($conteudo) . $fim_news, "From: Quantic Solutions On-Line <info@quanticsolutions.com>\r\n MIME-Version: 1.0\r\nContent-type: text/html; charset=iso-8859-1\r\n");
	
	}
require("../../includes/desconectar_mysql.php");
?>
<html>
	<head>
		<title>Salvando as informações</title>
		<? if ($result){ ?>
			<script language="JavaScript" type="text/javascript">
				setTimeout("finaliza();",2000);
				function finaliza(){
					opener.location = opener.location;
					self.close();
				}
			</script>
		<? } ?>
	</head>
	<body>
		<? if ($result){ ?>
			<center><h3>Informações gravadas com sucesso...</h3></center>
		<? } ?>
	</body>
</html>