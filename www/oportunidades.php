<?php

require("includes/conectar_mysql.php");

$result = mysql_query("SELECT * FROM oportunidades WHERE ativo='s'") or die("Erro ao acessar registros no Banco de dados: " . mysql_error());	
?>
<html>
<head>
	<title>Oportunidades - Quantic Solutions</title>
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
			<td class="conteudo">
			<?php
				require("includes/conectar_mysql.php");
					$query = "SELECT parametro FROM parametros WHERE nome='oportunidades'";
					$result2 = mysql_query($query) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());
					$cabecalho = mysql_fetch_row($result2);
					echo($cabecalho[0]);	
				require("includes/desconectar_mysql.php");
			?>
			</td>
		</tr>
	</table>
      <table width="80%">
	  		<?php
			while($oportunidades = mysql_fetch_array($result, MYSQL_ASSOC)){ ?>
				<tr>
					<td align="left" class="conteudo"><b><?=$oportunidades['vaga']?></b></td>
				</tr>
				<tr>
					<td align="left" class="conteudo"><?=$oportunidades['descricao']?></td>
				</tr>
				<tr>
					<td align="center" class="conteudo"><br><br></td>
				</tr>
			<? } ?>
		</table>
    </td>
  </tr>
</table>
</body>
</html>
<?php //require("includes/desconectar_mysql.php"); ?>