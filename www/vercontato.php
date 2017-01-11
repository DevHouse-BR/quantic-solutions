<?php
$cd = $_GET["cd"];

	require("includes/conectar_mysql.php");

	$query = "SELECT parametro FROM parametros WHERE nome='pg_contato'";
	$result = mysql_query($query) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());
	$conteudo = mysql_fetch_row($result);
	
	require("includes/desconectar_mysql.php");
?>
<html>
<head>
	<title>Contato</title>
</head>
<style type="text/css">
<!--
.campotxt {
	font-family: Helvetica;
	font-size: 11px;
}
 BODY {
	scrollbar-arrow-color:#FFFFFF;
	scrollbar-track-color:#FFFFFF;
	scrollbar-shadow-color:#FFFFFF;
	scrollbar-face-color:#767877;
	scrollbar-highlight-color:#FFFFFF;
	scrollbar-darkshadow-color:#FFFFFF;
	scrollbar-3dlight-color:#FFFFFF;
 }
 a:link {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: bold;
	color: #E8A823;
	text-decoration: none;
}
a:visited {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: bold;
	color: #E8A823;
	text-decoration: none;
}
a:hover {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: bold;
	color: #E4824C;
	text-decoration: underline;
}
a:active {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: bold;
	color: #E4824C;
	text-decoration: none;
}
-->
</style>
<link href="includes/quantic.css" rel="stylesheet" type="text/css">
<body>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td align="center" valign="top"> 
      <table width="80%">
			<tr>
				<td align="left" valign="top" class="conteudo"><?=$conteudo[0]?></td>
			</tr>
		</table>
    </td>
  </tr>
</table>
</body>
</html>
