<html>
<head>
	<title>Mapa do Site</title>
</head>
<style type="text/css">
<!--
.campotxt {
	font-family: Helvetica;
	font-size: 11px;
}
.txt {
	font-family: Helvetica;
	font-size: 12px;
	text-align: center;
	height: 20px;
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
					$query = "SELECT parametro FROM parametros WHERE nome='mapa_site'";
					$result = mysql_query($query) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());
					$cabecalho = mysql_fetch_row($result);
					echo($cabecalho[0]);	
			?>
			</td>
		</tr>
	</table>
	<table width="80%">
		<tr>
			<td bgcolor="EFC265" class="txt" style="cursor: hand;" onClick="parent.location = 'index.php';"><b>HOME</b></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td bgcolor="EFC265" class="txt" style="cursor: hand;" onClick="parent.location = 'empresa.php';"><b>EMPRESA</b></td>	  
			<?php
				require("includes/conectar_mysql.php");
				$query = "SELECT cd, secao FROM empresa ORDER BY ordem";
				$result = mysql_query($query) or die("Erro ao acessar registros do Banco de dados: " . mysql_error());
				$secao = mysql_fetch_array($result, MYSQL_ASSOC);
				echo('<td bgcolor="#ECA883" class="txt" style="cursor: hand;" onClick="parent.location=\'empresa.php?secao=' . $secao["cd"] .'\';">' . $secao["secao"] . '</td><td></td></tr>');
				while ($secao = mysql_fetch_array($result, MYSQL_ASSOC)){
					echo('<tr><td></td><td class="txt" bgcolor="#ECA883" style="cursor: hand;" onClick="parent.location=\'empresa.php?secao=' . $secao["cd"] .'\';">' . $secao["secao"] . '</td><td></td></tr>');
				} 
				require("includes/desconectar_mysql.php");
			?>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td bgcolor="EFC265" class="txt" style="cursor: hand;" onClick="parent.location = 'clientes.php';"><b>CLIENTES</b></td>	  
			<?php
				require("includes/conectar_mysql.php");
				$query = "SELECT cd, secao FROM clientes ORDER BY ordem";
				$result = mysql_query($query) or die("Erro ao acessar registros do Banco de dados: " . mysql_error());
				$secao = mysql_fetch_array($result, MYSQL_ASSOC);
				echo('<td bgcolor="#ECA883" class="txt" style="cursor: hand;" onClick="parent.location=\'clientes.php?secao=' . $secao["cd"] .'\';">' . $secao["secao"] . '</td><td></td></tr>');
				while ($secao = mysql_fetch_array($result, MYSQL_ASSOC)){
					echo('<tr><td></td><td class="txt" bgcolor="#ECA883" style="cursor: hand;" onClick="parent.location=\'clientes.php?secao=' . $secao["cd"] .'\';">' . $secao["secao"] . '</td><td></td></tr>');
				} 
				require("includes/desconectar_mysql.php");
			?>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td bgcolor="EFC265" class="txt" style="cursor: hand;" onClick="parent.location = 'solucoes.php';"><b>SOLUÇÕES</b></td>
			<?php
				require("includes/conectar_mysql.php");
				$query = "SELECT cd, nome FROM solucoes ORDER BY ordem";
				$result = mysql_query($query) or die("Erro ao acessar registros do Banco de dados: " . mysql_error());
				$i = 0;
				while ($solucao = mysql_fetch_array($result, MYSQL_ASSOC)){
					if ($i == 0) {
						echo('<td class="txt" bgcolor="#ECA883" style="cursor: hand;" onClick="parent.location=\'solucoes.php?solucao=' . $solucao["cd"] . '\';">' . $solucao['nome'] . '</td>');
						$i++;
					}
					else echo('<tr><td></td></tr><tr><td></td><td class="txt" bgcolor="#ECA883" style="cursor: hand;" onClick="parent.location=\'solucoes.php?solucao=' . $solucao["cd"] . '\';">' . $solucao['nome'] . '</td>');
					
					$query = "SELECT nome_etapa FROM solucao_etapa WHERE cd_solucao=" . $solucao["cd"] . " ORDER BY ordem";
					$result2 = mysql_query($query) or die("Erro ao acessar registros do Banco de dados: " . mysql_error());
					
					$etapa = mysql_fetch_array($result2, MYSQL_ASSOC);
					echo('<td class="txt" bgcolor="#AFAFAF" style="cursor: hand;" onClick="parent.location=\'solucoes.php?solucao=' . $solucao["cd"] . '#' . $etapa['nome_etapa'] . '\';">' . $etapa['nome_etapa'] . '<td></tr>');
					
					while ($etapa = mysql_fetch_array($result2, MYSQL_ASSOC)){
						echo('<tr><td></td><td></td><td class="txt" bgcolor="#AFAFAF" style="cursor: hand;" onClick="parent.location=\'solucoes.php?solucao=' . $solucao["cd"] . '#' . $etapa['nome_etapa'] . '\';">' . $etapa['nome_etapa'] . '<td></tr>');
					}
				}
				require("includes/desconectar_mysql.php");
			?>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td bgcolor="EFC265" class="txt" style="cursor: hand;" onClick="parent.location = 'empresa.php';"><b>SERVIÇOS</b></td>	  
			<?php
				require("includes/conectar_mysql.php");
				$query = "SELECT cd, secao FROM servicos ORDER BY ordem";
				$result = mysql_query($query) or die("Erro ao acessar registros do Banco de dados: " . mysql_error());
				$secao = mysql_fetch_array($result, MYSQL_ASSOC);
				echo('<td bgcolor="#ECA883" class="txt" style="cursor: hand;" onClick="parent.location=\'servicos.php?secao=' . $secao["cd"] .'\';">' . $secao["secao"] . '</td><td></td></tr>');
				while ($secao = mysql_fetch_array($result, MYSQL_ASSOC)){
					echo('<tr><td></td><td class="txt" bgcolor="#ECA883" style="cursor: hand;" onClick="parent.location=\'servicos.php?secao=' . $secao["cd"] .'\';">' . $secao["secao"] . '</td><td></td></tr>');
				} 
				require("includes/desconectar_mysql.php");
			?>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td bgcolor="EFC265" class="txt" style="cursor: hand;" onClick="parent.location = 'aliancas.php';"><b>ALIANÇAS</b></td>
			<td class="txt" bgcolor="#ECA883" style="cursor: hand;" onClick="parent.location = 'aliancas.php?secao=1';">Nossos Parceiros</td>
		</tr>
		<tr>
			<td></td>	
			<td class="txt" bgcolor="#ECA883" style="cursor: hand;" onClick="parent.location = 'aliancas.php?secao=2';">Seja Nosso Parceiro</td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td bgcolor="EFC265" class="txt" style="cursor: hand;" onClick="parent.location = 'imprensa.php';"><b>IMPRENSA</b></td>
			<td class="txt" bgcolor="#ECA883" style="cursor: hand;" onClick="parent.location = 'imprensa.php?secao=1';">Notícias</td>
		</tr>
		<tr>
			<td></td>	
			<td class="txt" bgcolor="#ECA883" style="cursor: hand;" onClick="parent.location = 'imprensa.php?secao=2';">Press Releases</td>
		</tr>
		<tr>
			<td></td>	
			<td class="txt" bgcolor="#ECA883" style="cursor: hand;" onClick="parent.location = 'imprensa.php?secao=3';">Banco de Imagens</td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td bgcolor="EFC265" class="txt" style="cursor: hand;" onClick="parent.location = 'curriculo.php';"><b>CURRÍCULO</b></td>
			<td class="txt" bgcolor="#ECA883" style="cursor: hand;" onClick="parent.location = 'curriculo.php?secao=1';">Oportunidades</td>
		</tr>
		<tr>
			<td></td>	
			<td class="txt" bgcolor="#ECA883" style="cursor: hand;" onClick="parent.location = 'curriculo.php?secao=2';">Seu Currículo</td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td bgcolor="EFC265" class="txt" style="cursor: hand;" onClick="parent.location = 'contato.php';"><b>CONTATO</b></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td bgcolor="EFC265" class="txt" style="cursor: hand;" onClick="parent.location = 'downloads.php';"><b>DOWNLOADS</b></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td bgcolor="EFC265" class="txt" style="cursor: hand;" onClick="parent.location = 'mapa.php';"><b>MAPA DO SITE</b></td>
		</tr>
		</table>
    </td>
  </tr>
</table>
</body>
</html>