<html>
<head>
	<title>Notícias</title>
</head>
<style type="text/css">
<!--
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
<?php
$cd = $_GET["cd"];

require("includes/conectar_mysql.php");

$result = mysql_query("SELECT nome_etapa, conteudo FROM solucao_etapa WHERE cd_solucao='" . $cd . "' Order by ordem")or die("Erro ao acessar registros no Banco de dados: " . mysql_error());	

?>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td align="center" valign="top"> 
      <table width="100%">
	  		<?php $result2 = mysql_query("SELECT introducao FROM solucoes WHERE cd=" . $cd)or die("Erro ao acessar registros no Banco de dados: " . mysql_error());
					$intro = mysql_fetch_array($result2, MYSQL_ASSOC);
			?>	
	  		<tr>
				<td class="conteudo"><?=$intro['introducao']?></td>
			</tr>
	  		<?php while ($etapa = mysql_fetch_array($result, MYSQL_ASSOC)){ ?>
			<tr>
				<td class="conteudo"><a name="#<?=$etapa['nome_etapa']?>"></a><?=$etapa['conteudo']?></td>
			</tr>
			<? } ?>
		</table>
    </td>
  </tr>
</table>
</body>
</html>
<?php require("includes/desconectar_mysql.php");?>