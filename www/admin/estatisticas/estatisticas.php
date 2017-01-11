<?php
$PERMISSAO_DE_ACESSO = "Administradores";
require("../includes/permissao_documento.php");
?>
<html>
	<head>
		<title>Usuários do Sistema</title>
		<style type="text/css">
			<!--
			@import url("../includes/browser.css");
			-->
		</style>
		<script language="JavaScript" src="../includes/menuhorizontal.js"></script>
	</head>
	<body leftmargin="0" bottommargin="0" rightmargin="0" topmargin="0" marginheight="0" marginwidth="0" onMouseDown="escondemenu();">
		<?php require("../includes/menuhorizontal.php"); ?>
		<table class="tabela" width="100%">
			<tr>
				<td width="50%" align="center" valign="top">
					<table width="70%">
						<tr>
							<td colspan="2" class="textfieldbranco" align="center">Usuários</td>
						</tr>
						<tr>
							<td colspan="2" class="label" align="center">Browsers</td>
						</tr>
						<?php
						require("../../includes/conectar_mysql.php");
						$result = mysql_query("SELECT DISTINCT browser FROM info_visitantes") or die("Erro ao acessar registros no Banco de dados: " . mysql_error());	
						while($tmp = mysql_fetch_row($result)){
							$query = "SELECT COUNT(*) FROM info_visitantes WHERE browser='" . $tmp[0] . "'";
							$result2 = mysql_query($query);
							$estatistica = mysql_fetch_row($result2);
							echo("<tr><td class=\"label\">" . $estatistica[0] . "</td><td class=\"textfield\" align=\"center\">" . $tmp[0] . "</td></tr>");
						}
						?>
						<tr>
							<td colspan="2">&nbsp;</td>
						</tr>
						<tr>
							<td colspan="2" class="label" align="center">Processadores</td>
						</tr>
						<?php
						require("../../includes/conectar_mysql.php");
						$result = mysql_query("SELECT DISTINCT processador FROM info_visitantes") or die("Erro ao acessar registros no Banco de dados: " . mysql_error());	
						while($tmp = mysql_fetch_row($result)){
							$query = "SELECT COUNT(*) FROM info_visitantes WHERE processador='" . $tmp[0] . "'";
							$result2 = mysql_query($query);
							$estatistica = mysql_fetch_row($result2);
							echo("<tr><td class=\"label\">" . $estatistica[0] . "</td><td class=\"textfield\" align=\"center\">" . $tmp[0] . "</td></tr>");
						}
						?>
					</table>
				</td>
				<td width="50%" align="center" valign="top">
					<table width="50%">
						<tr>
							<td colspan="2" class="textfieldbranco" align="center">Contagem de Acessos</td>
						</tr>
						<?php
						require("../../includes/conectar_mysql.php");
						$result = mysql_query("SELECT * FROM estatisticas") or die("Erro ao acessar registros no Banco de dados: " . mysql_error());	
						while($estatistica = mysql_fetch_row($result)){
							echo("<tr><td class=\"label\">" . $estatistica[0] . "</td><td class=\"textfield\" align=\"center\">" . $estatistica[1] . "</td></tr>");
						}
						?>
					</table>
				</td>
			</tr>
		</table>
	</body>
</html>
<?php require("../../includes/desconectar_mysql.php"); ?>