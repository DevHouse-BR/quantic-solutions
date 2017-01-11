<?php
$PERMISSAO_DE_ACESSO = "Administradores";
require("../includes/permissao_documento.php");

$modo = $_GET["modo"];

require("../../includes/conectar_mysql.php");

if ($modo == "salvar"){
	reset ($_POST); 
	while (list($chave, $valor) = each ($_POST)) {
		if ($chave != "Nova"){
			$query = "UPDATE empresa SET ordem='" . $valor ."' WHERE (cd='" . $chave . "') LIMIT 1";
			$result = mysql_query($query) or die("Erro ao remover registros do Banco de dados: " . mysql_error());	
		}
	}
}

$result = mysql_query("SELECT * FROM empresa order by ordem" . $query_limit) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());	

?>
<html>
	<head>
		<title>Empresa</title>
		<style type="text/css">
			<!--
			@import url("../includes/browser.css");
			-->
		</style>
		<script language="JavaScript" type="text/javascript">
			NS4 = (document.layers);
     		IE4 = (document.all);
			
			function nova(){
				document.all["frm_edita"].src = "secao_form.php?modo=add";
			}
			function editar(codigo){
				document.all["frm_edita"].src = 'secao_form.php?modo=update&cd=' + codigo;
			}
		</script>
		<script language="JavaScript" src="../includes/menuhorizontal.js"></script>
	</head>
	<body leftmargin="0" bottommargin="0" rightmargin="0" topmargin="0" marginheight="0" marginwidth="0" onMouseDown="escondemenu();">
	<?php require("../includes/menuhorizontal.php"); ?>
		<table class="tabela" width="100%">
			<tr>
				<td width="50%" valign="top">
					<table class="tabela" width="100%">
					<form name="dados" action="empresa_browser.php?modo=salvar" method="post">
						<tr>
							<td class="label" width="10%" align="center"><input type="button" class="botao" onClick="javascript: nova();" value="Nova" style="width: 100%"></td>
							<td class="label" width="10%" align="center"><input type="submit" class="botao" value="Salvar" style="width: 100%"></td>
						</tr>
					</table>
					<table class="tabela" width="100%">
						<tr>
							<td class="textfield" align="left" width="33%"><b>Se&ccedil;&atilde;o</b></td>
							<td class="textfield" align="center" width="33%"><b>Ordem</b></td>
							<td class="textfield" align="right" width="33%"><b>Ultima Atualiza&ccedil;&atilde;o</b></td>
						</tr>
						<?php while ($secao = mysql_fetch_array($result, MYSQL_ASSOC)){ ?>
									<tr>
										<td class="textfield" align="left"><a href="javascript: editar('<?=$secao['cd']?>');"><b><?=$secao['secao']?></b></a></td>
										<td class="textfield" align="center"><input type="text" name="<?=$secao['cd']?>" class="textfieldbranco" value="<?=$secao['ordem']?>" maxlength="2"></td>
										<td class="textfield" align="right"><b><?php echo(date('d/m/Y H:i \h', $secao['atualizado'])) ?></b></td>
									</tr>
						<?php } ?>
						</form>
					</table>
				</td>
				<td width="50%" valign="top">
					<iframe name="frm_edita" width="100%" scrolling="no" height="197"></iframe>
				</td>
			</tr>
		</table>
	</body>
</html>
<?php require("../../includes/desconectar_mysql.php"); ?>