<?php
$PERMISSAO_DE_ACESSO = "Administradores";
require("../includes/permissao_documento.php");

$modo = $_GET["modo"];

require("../../includes/conectar_mysql.php");

if ($modo == "salvar"){
	reset ($_POST); 
	while (list($chave, $valor) = each ($_POST)) {
		if ($chave != "Nova"){
			$query = "UPDATE solucoes SET ordem='" . $valor ."' WHERE (cd='" . $chave . "') LIMIT 1";
			$result = mysql_query($query) or die("Erro ao remover registros do Banco de dados: " . mysql_error());	
		}
	}
}

$result = mysql_query("SELECT * FROM solucoes ORDER BY ordem" . $query_limit) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());	

?>
<html>
	<head>
		<title>Soluções</title>
		<style type="text/css">
			<!--
			@import url("../includes/browser.css");
			-->
		</style>
		<script language="JavaScript" type="text/javascript">
			NS4 = (document.layers);
     		IE4 = (document.all);
			
			function nova(){
				document.all["frm_edita1"].src = "solucao_form.php?modo=add";
			}
			function editar(codigo){
				document.all["frm_edita1"].src = 'solucao_etapa_browser.php?cd=' + codigo;
				document.all["frm_edita2"].src = 'solucao_form.php?modo=update&cd=' + codigo;
			}
			function pg_inicial(){
				document.all["frm_edita1"].src = 'pginicial_form.php';
			}
		</script>
		<script language="JavaScript" src="../includes/menuhorizontal.js"></script>
	</head>
	<body leftmargin="0" bottommargin="0" rightmargin="0" topmargin="0" marginheight="0" marginwidth="0" onMouseDown="escondemenu();">
		<?php require("../includes/menuhorizontal.php"); ?>
		<table class="tabela" width="100%">
			<tr>
				<td width="33%" valign="top">
					<table class="tabela" width="100%">
					<form name="dados" action="solucoes_browser.php?modo=salvar" method="post">
						<tr>
							<td class="label" width="10%" align="center"><input type="button" class="botao" onClick="javascript: nova();" value="Nova" style="width: 100%"></td>
							<td class="label" width="10%" align="center"><input type="submit" class="botao" value="Salvar" style="width: 100%"></td>
							<td class="label" width="10%" align="center"><input type="button" class="botao" onClick="javascript: pg_inicial();" value="Pg Inicial" style="width: 100%"></td>
						</tr>
					</table>
					<table class="tabela" width="100%">
						<tr>
							<td class="textfield" align="left" width="33%"><b>Solu&ccedil;&atilde;o</b></td>
							<td class="textfield" align="center" width="33%"><b>Ordem</b></td>
						</tr>
						<?php while ($solucao = mysql_fetch_array($result, MYSQL_ASSOC)){ ?>
									<tr>
										<td class="textfield" align="left"><a href="javascript: editar('<?=$solucao['cd']?>');"><b><?=$solucao['nome']?></b></a></td>
										<td class="textfield" align="center"><input type="text" name="<?=$solucao['cd']?>" class="textfieldbranco" value="<?=$solucao['ordem']?>" maxlength="2"></td>
									</tr>
						<?php } ?>
						</form>
					</table>
				</td>
				<td width="33%" valign="top">
					<iframe name="frm_edita1" width="100%" scrolling="no" height="290" frameborder="0"></iframe>
				</td>
				<td width="33%" valign="top">
					<iframe name="frm_edita2" width="100%" scrolling="no" height="290" frameborder="0"></iframe>
				</td>
			</tr>
		</table>
	</body>
</html>
<?php require("../../includes/desconectar_mysql.php"); ?>