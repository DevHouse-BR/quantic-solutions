<?php
	$pg = "CONTATO";
	require("includes/estatisticas.php");
?>
<html>
	<head>
		<title>Quantic Solutions</title>
		<link href="includes/quantic.css" rel="stylesheet" type="text/css">
		<script language="JavaScript" src="includes/addtonews.js"></script>
	</head>
	<body leftmargin="0" topmargin="0">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr> 
				<td align="center">
					<table width="775" border="0" cellspacing="0" cellpadding="0" class="pagina">
						<tr>
							<td width="129"><img src="img/quantic-logo.gif" width="127" height="89"></td>
							<td width="508" bgcolor="#E8A823">&nbsp;</td>
							<td width="138" bgcolor="#E8A823">&nbsp;</td>
						</tr>
						<tr>
							<td height="30" width="120" bgcolor="#000000">&nbsp;</td>
							<td colspan="2" height="30" bgcolor="#000000">
								<?php require("includes/menuhorizontal.php"); ?>
							</td>
						</tr>
						<tr>
          					<td valign="top" bgcolor="#E4824C">
								<table width="100%" border="0" cellspacing="0" cellpadding="0" class="menuesquerdo">
									<tr>
										<td height="42">&nbsp;</td>
									</tr>
								</table>
							</td>
							<td>
								<iframe width="100%" height="450" src="vercontato.php" frameborder="0" name="viz"></iframe>
							</td>
							<td width="138" valign="top">
								<?php require("includes/menudireito.php"); ?>
								<table width="138" class="cotacoes" border="0" cellpadding="0" cellspacing="0" height="229">
									<tr>
										<td>&nbsp;</td>
									</tr>
									<tr> 
										<td>&nbsp;</td>
										<td colspan="2">
											<table class="news">
												<tr>
													<td><img src="img/marker3.gif">&nbsp;Para receber nossa Newsletter informe seu nome completo e email:</td>
												</tr>
												<tr>
													<td>
														<table width="100%" class="news">
															<form name="newsletter">
															<tr>
																<td width="30%">Nome:</td>
																<td width="70%"><input type="text" name="nome" id="nome" class="news-form"></td>
															</tr>
															<tr>
																<td>Email:</td>
																<td><input type="text" name="email" id="email" class="news-form"></td>
															</tr>
															<tr>
																<td colspan="2" align="right"><img style="cursor: hand;" onClick="javascript: addnews();" src="img/enviar_branco.gif"></td>
															</tr>
															</form>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr> 
										<td>&nbsp;</td>
										<td colspan="2"></td>
									</tr>
									<tr> 
										<td>&nbsp;</td>
										<td colspan="2">
											<table class="news">
												<tr>
													<td><img src="img/marker3.gif">&nbsp;Tel/Fax 47 4345071</td>
												</tr>
												<tr>
													<td>info@quanticsolutions.com</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<div class="rodape">&copy;&nbsp;2000-2003 Quantic Solutions. Todos os direitos reservados</div>
				</td>
			</tr>
		</table>
	</body>
</html>