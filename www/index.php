<?php
	$pg = "HOME";
	require("includes/estatisticas.php");
	require("includes/conectar_mysql.php");
		$query = "SELECT * FROM pgprincipal";
		$result = mysql_query($query) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());
		$pgprincipal = mysql_fetch_array($result, MYSQL_ASSOC);


	$result = mysql_query("SELECT cd, data_criacao, titulo FROM noticias order by data_criacao DESC") or die("Erro ao acessar registros no Banco de dados: " . mysql_error());	
	
	
	require("includes/desconectar_mysql.php");
	require("includes/funcao_data.php");
?>
<html>
	<head>
		<title>Quantic Solutions - Softwares para Indústria Gráfica</title>
		<link href="includes/quantic.css" rel="stylesheet" type="text/css">
		<style type="text/css">
			<!--
			.campotxt {
				font-family: Helvetica;
				font-size: 11px;
			}
			-->
		</style>
		<script language="JavaScript" src="includes/addtonews.js"></script>
	</head>
	<body leftmargin="0" topmargin="0">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr> 
				<td align="center">
					<table width="775" border="0" cellspacing="0" cellpadding="0" background="img/quantic_fundo1.gif" class="pagina">
						<tr> 
							<td width="129" align="center"><img src="img/quantic-logo.gif" width="127" height="89"></td>
							<td width="508" bgcolor="#E8A823">&nbsp;</td>
							<td width="138" bgcolor="#E8A823"></td>
						</tr>
						<tr> 
							<td height="30" width="129" bgcolor="#000000">&nbsp;</td>
							<td colspan="2" height="30" bgcolor="#000000"><?php require("includes/menuhorizontal.php"); ?></td>
						</tr>
						<tr> 
							<td colspan="2" valign="top">
								<table width="100%" border="0">
									<tr>
										<td width="180" valign="top"><br><br><br><br>
											<table width="120%" style="position: relative;" border="0">
												<tr> 
													<td align="right" width="70%"><font size="2"><b>BEM-VINDO À<br>QUANTIC SOLUTIONS</b></font></td>
													<td width="30%"><img src="img/bem_vindo.jpg"></td>
												</tr>
											</table>
											<table width="100%" class="cotacoes3" border="0" cellpadding="0" cellspacing="0">
												<tr> 
													<td colspan="2">
														<table width="100%" border="0">
															<tr> 
																<td><img src="img/ultimas_noticias.jpg"></td>
																<td nowrap><font size="1"><b>ÚLTIMAS NOTÍCIAS</b></font></td>
															</tr>
															<tr> 
																<td></td>
																<td><font size="1">&nbsp;</font></td>
															</tr>
														<?php  for($i = 0; $i < 10; $i++){
																$noticia = mysql_fetch_array($result, MYSQL_ASSOC); 
																$temp = split(" ",formatadata($noticia['data_criacao'])); ?>
																<tr>
																	<td colspan="2" align="left" style="font-size: 10px;"><span style="cursor: hand; color: #E8A823;" onMouseOver="this.style.textDecoration = 'underline';" onMouseOut="this.style.textDecoration = 'none';" onClick="javascript: location = 'imprensa.php?secao=4&cd=<?=$noticia['cd']?>';"><?=$temp[0]?></span>&nbsp;<?=$noticia['titulo']?></td>
																</tr>
														<? } ?>
														</table>
													</td>
													<td>&nbsp;</td>
												</tr>
											</table>
										</td>
										<td valign="top">
											<table>
												<tr> 
													<td width="20">&nbsp;</td>
													<td class="campotxt" align="center">
														<table width="80%">
															<tr> 
																<td class="conteudo"><?=$pgprincipal['conteudo']?></td>
															</tr>
														</table>
													</td>
													<td width="20">&nbsp;</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
							<td valign="top"><?php require("includes/menudireito.php"); ?>
								<table width="145" class="cotacoes" border="0" cellpadding="0" cellspacing="0">
									<tr> 
										<td>&nbsp;</td>
										<td bgcolor="#EEF0F3" colspan="2">&nbsp;</td>
									</tr>
									<tr> 
										<td>&nbsp;</td>
										<td colspan="2"><img width="142" src="img/bolsa.jpg"></td>
									</tr>
									<tr> 
										<td>&nbsp;</td>
										<td colspan="2"><div class="news">Fonte: www.estadao.com.br</div></td>
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