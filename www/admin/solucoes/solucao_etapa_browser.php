<?php
$PERMISSAO_DE_ACESSO = "Administradores";
require("../includes/permissao_documento.php");

$modo = $_GET["modo"];
$cd = $_GET["cd"];

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

$result = mysql_query("SELECT * FROM solucao_etapa WHERE cd_solucao=" . $cd) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());	

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
				parent.document.all["frm_edita2"].src = "etapa_form.php?modo=add&cd_solucao=<?=$cd?>";
			}
			function editar(codigo){
				parent.document.all["frm_edita2"].src = 'etapa_form.php?modo=update&cd_solucao=<?=$cd?>&cd=' + codigo;
			}
		</script>
	</head>
	<body leftmargin="0" bottommargin="0" rightmargin="0" topmargin="0" marginheight="0" marginwidth="0">
		<table class="tabela" width="100%">
			<tr>
				<td width="33%" valign="top">
					<table class="tabela" width="100%">
					<form name="dados" action="solucao_etapa_browser.php?modo=salvar" method="post">
						<tr>
							<td class="label" width="10%" align="center"><input type="button" class="botao" onClick="javascript: nova();" value="Nova" style="width: 100%"></td>
							<td class="label" width="10%" align="center"><input type="submit" class="botao" value="Salvar" style="width: 100%"></td>
						</tr>
					</table>
					<table class="tabela" width="100%">
						<tr>
							<td class="textfield" align="left" width="33%"><b>Etapa</b></td>
							<td class="textfield" align="center" width="33%"><b>Ordem</b></td>
						</tr>
						<?php while ($etapa = mysql_fetch_array($result, MYSQL_ASSOC)){ ?>
									<tr>
										<td class="textfield" align="left"><a href="javascript: editar('<?=$etapa['cd']?>');"><b><?=$etapa['nome_etapa']?></b></a></td>
										<td class="textfield" align="center"><input type="text" name="<?=$etapa['cd']?>" class="textfieldbranco" value="<?=$etapa['ordem']?>" maxlength="2"></td>
									</tr>
						<?php } ?>
						</form>
					</table>
				</td>
			</tr>
		</table>
	</body>
</html>
<?php require("../../includes/desconectar_mysql.php"); ?>