<?php
$PERMISSAO_DE_ACESSO = "Administradores";
require("../includes/permissao_documento.php");

require("../../includes/conectar_mysql.php");
	$cd = $_GET["cd"];
	$query = "SELECT parametro FROM parametros where nome='solucoes_pginicial'";
	$result = mysql_query($query) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());
	$etapa = mysql_fetch_array($result, MYSQL_ASSOC);	
require("../../includes/desconectar_mysql.php");

?>
<html>
	<head>
		<title>Seção Empresa</title>
		<style type="text/css">
			<!--
			@import url(../includes/forms.css);
			-->
		</style>
		<script language="JavaScript">
			function editaconteudo(){
				window.open('../../editor.php', 'Editor', 'width=750,height=400,status=no,resizable=no,top=20,left=20,dependent=yes,alwaysRaised=yes');
			}
		</script>
	</head>
	<body leftmargin="0" bottommargin="0" rightmargin="0" topmargin="0" marginheight="0" marginwidth="0">
		<table width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td align="center">
					<table class="tabela_form" width="100%">
					<form name="form" method="post" action="salva_pginicial.php">
						<tr> 
							<td colspan="2" style="border: 1px solid #FFFFFF; text-align: center;"><b>Página Inicial</b></td>
						</tr>
						<tr> 
						  <td class="label" width="25%">Conteúdo<br><br><br><br><br><br><br><br><br><br><br><br><input type="button" value="Editar Conteúdo" name="editar_cabecalho" class="botao" onClick="javascript: editaconteudo();"></td>
						  <td class="cell" width="75%">
								<textarea name="conteudo" class="textarea" rows="12" style="width: 100%;"><?=$etapa['parametro']?></textarea>
							</td>
						</tr>
						<tr> 
						  <td colspan="2" align="right"><input type="submit" value="Salvar" class="botao"></td>
						</tr>
					  </form>
					</table>
				</td>
			</tr>
		</table>
	</body>
</html>
