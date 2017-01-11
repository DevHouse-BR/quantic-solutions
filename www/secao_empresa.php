<?php
	$cd = $_GET["cd"];
	require("includes/conectar_mysql.php");
		$query = "SELECT conteudo FROM empresa WHERE cd='" . $cd . "'";
		$result = mysql_query($query) or die("Erro ao acessar registros do Banco de dados: " . mysql_error());
		$conteudo = mysql_fetch_row($result); 
	require("includes/desconectar_mysql.php");
?>
<html>
	<head>
		<title>Quantic</title>
		<link href="includes/quantic.css" rel="stylesheet" type="text/css">
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
	</head>
	<body>
		<table width="100%">
			<tr>
				<td align="center">
					<table width="80%">
						<tr>
							<td class="conteudo"><?=$conteudo[0]?></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</body>
</html>
