<?php
require("includes/conectar_mysql.php");

$result = mysql_query("SELECT * FROM parceiros order by nome") or die("Erro ao acessar registros no Banco de dados: " . mysql_error());	

require("includes/desconectar_mysql.php");

function link($link){
	if (strpos($link, "//")){
		$string = explode("//", $link);
		return $string[1];
	}
	else return $link;
}
?>
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
<script language="JavaScript">
	function teste(link){
		window.open(link);
	}
</script>
<body>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td align="center" valign="top"> 
      <table width="80%">
	  		<tr>
				<td class="conteudo"><?php
						require("includes/conectar_mysql.php");
							$query = "SELECT parametro FROM parametros WHERE nome='cabecalho_parceiros'";
							$result2 = mysql_query($query) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());
							$cabecalho = mysql_fetch_array($result2, MYSQL_ASSOC);
							echo($cabecalho["parametro"]);	
						require("includes/desconectar_mysql.php");
					?>
				</td>
			</tr>
			<tr>
				<td align="center" class="conteudo">
					<table>
						<tr>
							<?php	$contador = 0;
									while($parceiro = mysql_fetch_array($result, MYSQL_ASSOC)){
										$contador ++; 
										echo("<td align=\center\" valign=\"middle\"><a href=\"#" . $parceiro["nome"] . "\"><img width=\"70\" height=\"80\" src=\"" . $parceiro["imagem"] . "\" border=\"0\"></a></td>");
										if ($contador == 4){
											echo("</tr><tr>");
											$contador = 0;
										}
									}
							?>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td align="left" class="conteudo">
					<table>
						<?php	//mysql_data_seek($result, 0) ;
								while($parceiro = mysql_fetch_array($result, MYSQL_ASSOC)){
									echo("<tr><td class=\"campotxt\"><a name=\"" . $parceiro["nome"] . "\"><b>" . $parceiro["nome"] . "</b></td></tr><tr><td class=\"campotxt\">" . $parceiro["texto"] . "</td></tr><tr><td class=\"campotxt\"><a href=\"javascript: teste('" . $parceiro["link"] . "');\">" . link($parceiro["link"]) . "</a></td></tr><tr><td>&nbsp;</td></tr>");
								}
						?>
					</table>
				</td>
			</tr>
		</table>
    </td>
  </tr>
</table>
</body>
</html>
