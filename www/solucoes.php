<?php
	$pg = "SOLUÇÕES";
	require("includes/estatisticas.php");
	$sol = $_GET["solucao"];
	
	if ($sol == ""){
		require("includes/conectar_mysql.php");
		$query = "SELECT parametro from parametros where nome='solucoes_pginicial'";
		$result = mysql_query($query) or die("Erro ao acessar registros do Banco de dados: " . mysql_error());
		$linha = mysql_fetch_array($result, MYSQL_ASSOC);									
		$pginicial = $linha["parametro"];
		require("includes/desconectar_mysql.php");
	}
	else{
		require("includes/conectar_mysql.php");
		$query = "SELECT cabecalho, etiqueta from solucoes where cd=" . $sol;
		$result = mysql_query($query) or die("Erro ao acessar registros do Banco de dados: " . mysql_error());
		$linha = mysql_fetch_array($result, MYSQL_ASSOC);									
		$cabecalho = $linha["cabecalho"];
		$etiqueta = $linha["etiqueta"];
		require("includes/desconectar_mysql.php");
	}
?>
<html>
	<head>
		<title>Quantic Solutions</title>
		<link href="includes/quantic.css" rel="stylesheet" type="text/css">
		<style type="text/css">
			.mostra_menu {
				position: absolute;
				background: #6E6F6E;
				margin-left: 108px;
    			margin-top: -12px;
			}
		</style>
		<script language="JavaScript" src="includes/addtonews.js"></script>
		<script language="JavaScript">
		var saiu = 0;
var intervalo;
function start(){
	saiu = 0;
	intervalo = setInterval(checamouse, 500);
}

function checamouse(){
	if (saiu != 0){
		escondemenu();
		clearInterval(intervalo);
		saiu = 0;
	}
}
<?php
require("includes/conectar_mysql.php");
	$query = "SELECT cd FROM solucoes ORDER BY ordem";
	$result = mysql_query($query) or die("Erro ao acessar registros do Banco de dados: " . mysql_error());
	
	while ($solucao = mysql_fetch_array($result, MYSQL_ASSOC)){
		$query = "SELECT nome_etapa FROM solucao_etapa WHERE cd_solucao=" . $solucao["cd"] . " ORDER BY ordem";
		$result2 = mysql_query($query) or die("Erro ao acessar registros do Banco de dados: " . mysql_error());
		?>
			function mostramenu<?=$solucao["cd"]?>(){
				escondemenu();
				var html = 		"<table width=\"100\">"
				<?php while ($etapa = mysql_fetch_array($result2, MYSQL_ASSOC)){	
					$txt = "+	\"<tr><td style=\\\"cursor: hand;\\\" onClick=\\\"";
					if ($sol == "") $txt .= "location = 'solucoes.php?solucao=" . $solucao["cd"] . "';"; 
					else $txt .= "document.all['viz'].src = 'versolucao.php?cd=" . $solucao["cd"] . "#" . $etapa["nome_etapa"] . "';";
					$txt .= "\\\" align=\\\"center\\\" bgcolor=\\\"#4E4E4E\\\"><font color=\\\"#FFFFFF\\\" size=\\\"1\\\" face=\\\"Arial, Helvetica, sans-serif\\\">" . $etapa["nome_etapa"] . "</font></td></tr>\"";
					echo ($txt);
					}
				?>
							+	"</table>";
				document.all["menu_<?=$solucao["cd"]?>"].innerHTML = html;
				//document.all["menu_<?=$solucao["cd"]?>"].style.position = "absolute";
				document.all["menu_<?=$solucao["cd"]?>"].style.visibility = "visible";
			}
			<?php $escondemenu .= "document.all[\"menu_" . $solucao["cd"] . "\"].innerHTML = \"\";document.all[\"menu_" . $solucao["cd"] . "\"].style.visibility = \"hidden\";";
	}

require("includes/desconectar_mysql.php");?>
			function escondemenu(){
			<?=$escondemenu?>
			}

		</script>
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
									<?php
										require("includes/conectar_mysql.php");
										$query = "SELECT cd, nome FROM solucoes ORDER BY ordem";
										$result = mysql_query($query) or die("Erro ao acessar registros do Banco de dados: " . mysql_error());
										$i = 0;
										while ($secao = mysql_fetch_array($result, MYSQL_ASSOC)){									
											if ($i == 0) {
												echo("<tr><td height=\"23\" valign=\"bottom\"><a style=\"color: black;text-decoration:none;\" onMouseOver=\"mostramenu". $secao["cd"] . "();\" href=\"solucoes.php?solucao=" . $secao["cd"] ."\">" . $secao["nome"] . "</a></td></tr><tr><td><div class=\"mostra_menu\" id=\"menu_". $secao["cd"] ."\" onMouseOver=\"start();\" onMouseOut=\"saiu = 1;\"></div></td></tr>");
												$i++;
											}
											else {
												echo("<tr><td style=\"letter-spacing: 5px;\">..........</td></tr>");
												echo("<tr><td height=\"23\" valign=\"bottom\"><a style=\"color: black;text-decoration:none;\" onMouseOver=\"mostramenu". $secao["cd"] . "();\" href=\"solucoes.php?solucao=" . $secao["cd"] ."\">" . $secao["nome"] . "</a></td></tr><tr><td><div class=\"mostra_menu\" id=\"menu_". $secao["cd"] ."\" onMouseOver=\"start();\" onMouseOut=\"saiu = 1;\"></div></td></tr>");
											}
										} 
										require("includes/desconectar_mysql.php");
									?>
								</table>
							</td>
							<td valign="top" align="center">
								<table width="80%" height="100%" border="0">
									<?php if ($sol != ""){ ?>
										<tr>
											<td height="150" valign="top" class="conteudo"><?=$cabecalho?></td>
										</tr>
										<tr>
											<td height="230" valign="top"><iframe width="100%" height="230" src="versolucao.php?cd=<?=$sol?>" frameborder="0" name="viz"></iframe></td>
										</tr>
										<tr>
											<td height="70" valign="top" class="etiqueta"><?=$etiqueta?></td>
										</tr>
									<?php }
									else{ ?>
										<tr>
											<td height="450" valign="top" class="conteudo"><?=$pginicial?></td>
										</tr>
									<?php } ?>
										
								</table>
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