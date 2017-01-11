<html>
	<head>
		<title>Quantic</title>
		<style type="text/css">
		<!--
		 BODY {
		 	font-family: Arial, Helvetica;
			font-size: 12px;
			scrollbar-arrow-color:#FFFFFF;
			scrollbar-track-color:#FFFFFF;
			scrollbar-shadow-color:#FFFFFF;
			scrollbar-face-color:#767877;
			scrollbar-highlight-color:#FFFFFF;
			scrollbar-darkshadow-color:#FFFFFF;
			scrollbar-3dlight-color:#FFFFFF;
		 }
		-->
		</style>
		<link href="includes/quantic.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<table width="100%">
			<tr>
				<td align="center">
					<table width="80%">
						<?php
							require("includes/conectar_mysql.php");
							$query = "SELECT parametro FROM parametros where nome='introducao_servicos'";
							$result = mysql_query($query) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());
							$conteudo = mysql_fetch_row($result);
							echo('<tr><td class="conteudo">' . $conteudo[0] . '</td></tr>');
								
							$query = "SELECT conteudo, secao FROM servicos ORDER BY ordem";
							$result = mysql_query($query) or die("Erro ao acessar registros do Banco de dados: " . mysql_error());
							while($conteudo = mysql_fetch_row($result)){?>
								<tr>
									<td class="conteudo"><a name="#<?=$conteudo[1]?>"></a><?=$conteudo[0]?></td>
								</tr>
						<?php } ?>
					</table>
				</td>
			</tr>
		</table>
	</body>
</html>
<?php require("includes/desconectar_mysql.php"); ?>