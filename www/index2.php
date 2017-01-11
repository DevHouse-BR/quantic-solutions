<?php
	$pg = "HOME";
	require("includes/estatisticas.php");
	require("includes/conectar_mysql.php");
		$query = "SELECT * FROM pgprincipal";
		$result = mysql_query($query) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());
		$pgprincipal = mysql_fetch_array($result, MYSQL_ASSOC);
	require("includes/desconectar_mysql.php");
?>
<html>
	
	<head>
		<title>Quantic Solutions - Softwares para Indústria Gráfica</title>
		<style type="text/css">
			<!--
			@import url("includes/quantic.css");
			-->
		</style>
		<style type="text/css">
		<!--
		.campotxt {
			font-family: Helvetica;
			font-size: 11px;
		}
		-->
		</style>
</head>
	<body leftmargin="0" topmargin="0">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr> 
				<td align="center">
					<table width="775" border="0" cellspacing="0" cellpadding="0" background="img/quantic_fundo1.gif" class="pagina">
						<tr>
							<td width="129"><img src="img/quantic-logo.gif" width="127" height="89"></td>
							<td width="508" bgcolor="#E8A823">&nbsp;</td>
							<td width="138" bgcolor="#E8A823"></td>
						</tr>
						<tr>
							<td height="30" width="119" bgcolor="#000000">&nbsp;</td>
							<td colspan="2" height="30" bgcolor="#000000">
								<?php require("includes/menuhorizontal.php"); ?>
							</td>
						</tr>
						<tr>
							<td valign="top"></td>
							<td valign="top">
								<table>
									<tr>
										<td width="20">&nbsp;</td>
										<td class="campotxt" align="center">
											<table width="80%">
												<tr>
													<td class="campotxt"><?=$pgprincipal['conteudo']?></td>
												</tr>
											</table>
										</td>
										<td width="20">&nbsp;</td>
									</tr>
								</table>
							</td>
							<td valign="top">
								<?php require("includes/menudireito.php"); ?>
								<table width="138" class="cotacoes" border="0" cellpadding="0" cellspacing="0">
									<tr>
										<td>&nbsp;</td>
										<td colspan="2"><div style="font-size: 5px">&nbsp;</div></td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td valign="middle" width="12"><img src="img/marker2.gif"></td>
										<td valign="middle" width="126">&nbsp;COTA&Ccedil;&Oacute;ES</td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td style="font-size: 9px">&nbsp;</td>
										<td style="font-size: 9px">&nbsp;<?=date('d/m \&\n\b\s\p\; H:i \h', $pgprincipal['atualizado'])?></td>
									</tr>
									<tr>
										<td height="5" colspan="2"></td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td colspan="2">
											<table class="cotacoes2" width="100%">
												<tr bgcolor="#CCCCCC">
													<td>Dólar</td>
													<td align="center">Compra</td>
													<td align="center">Venda</td>
												</tr>
												<tr>
													<td>Com.</td>
													<td align="center"><?=$pgprincipal["comercial1"]?></td>
													<td align="center"><?=$pgprincipal["comercial2"]?></td>
												</tr>
												<tr>
													<td>Paral.(SP)</td>
													<td align="center"><?=$pgprincipal["paralelosp1"]?></td>
													<td align="center"><?=$pgprincipal["paralelosp2"]?></td>
												</tr>
												<tr>
													<td>Paral.(RJ)</td>
													<td align="center"><?=$pgprincipal["paralelorj1"]?></td>
													<td align="center"><?=$pgprincipal["paralelorj2"]?></td>
												</tr>
												<tr>
													<td>Turismo</td>
													<td align="center"><?=$pgprincipal["turismo1"]?></td>
													<td align="center"><?=$pgprincipal["turismo2"]?></td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td colspan="2">
											<table class="cotacoes2" width="100%">
												<tr bgcolor="#CCCCCC">
													<td>Bolsas</td>
													<td align="center">Volume</td>
													<td align="center">Varia&ccedil;&atilde;o</td>
												</tr>
												<tr>
													<td>Bovespa</td>
													<td align="center"><?=$pgprincipal["bovespa1"]?></td>
													<td align="center"><?=$pgprincipal["bovespa2"]?></td>
												</tr>
												<tr>
													<td>Dow</td>
													<td align="center"><?=$pgprincipal["dowjones1"]?></td>
													<td align="center"><?=$pgprincipal["dowjones2"]?></td>
												</tr>
												<tr>
													<td>Merval</td>
													<td align="center"><?=$pgprincipal["merval1"]?></td>
													<td align="center"><?=$pgprincipal["merval2"]?></td>
												</tr>
												<tr>
													<td>Nasdaq</td>
													<td align="center"><?=$pgprincipal["nasdaq1"]?></td>
													<td align="center"><?=$pgprincipal["nasdaq2"]?></td>
												</tr>
												<tr>
													<td>S&amp;P500</td>
													<td align="center"><?=$pgprincipal["sp5001"]?></td>
													<td align="center"><?=$pgprincipal["sp5002"]?></td>
												</tr>
												<tr>
													<td colspan="3">Fonte:&nbsp;<?=$pgprincipal["fonte"]?></td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</body>
</html>