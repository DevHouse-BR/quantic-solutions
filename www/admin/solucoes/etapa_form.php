<?php
$PERMISSAO_DE_ACESSO = "Administradores";
require("../includes/permissao_documento.php");

$modo = $_GET["modo"];
$solucao = $_GET["cd_solucao"];

if($modo == "update"){
	require("../../includes/conectar_mysql.php");
		$cd = $_GET["cd"];
		$query = "SELECT * FROM solucao_etapa where cd=" . $cd;
		$result = mysql_query($query) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());
		$etapa = mysql_fetch_array($result, MYSQL_ASSOC);	
	require("../../includes/desconectar_mysql.php");
}
?>
<html>
	<head>
		<title>Seção Empresa</title>
		<style type="text/css">
			<!--
			@import url(../includes/forms.css);
			-->
		</style>
		<script language="JavaScript" type="text/javascript">
			function valida_form(){
				var f = document.all["form_etapa"];
				if ((f.nome_etapa.value != "") && (f.conteudo.value != "") && (f.ordem.value != "")) f.submit();
				else alert("Todos os campos são Obrigatórios");
			}
			function edita_cabecalho(){
				window.open('../../editor.php?onde=cabecalho', 'Editor', 'width=750,height=400,status=no,resizable=no,top=20,left=20,dependent=yes,alwaysRaised=yes');
			}
			function edita_etiqueta(){
				window.open('../../editor.php?onde=etiqueta', 'Editor', 'width=750,height=400,status=no,resizable=no,top=20,left=20,dependent=yes,alwaysRaised=yes');
			}
			function apagar(){
				if (window.showModalDialog('../includes/confirmacao.html',['Confirme!','Deseja apagar esta seção?','Sim','Não'],'dialogWidth:320px;dialogHeight:100px;status:no;') == "1"){
					self.location = "../delete.php?oque=solucao&cd=<?=$cd?>";
				}
			}
		</script>
	</head>
	<body leftmargin="0" bottommargin="0" rightmargin="0" topmargin="0" marginheight="0" marginwidth="0" onLoad="document.all['form_etapa'].nome_etapa.focus();">
		<table width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td align="center">
					<table class="tabela_form" width="100%">
					<form name="form_etapa" method="post" action="salva_etapa.php">
						<tr> 
							<td colspan="2" style="border: 1px solid #FFFFFF; text-align: center;"><?php if($modo == "add") echo ("<b>Nova<b> "); ?><b>Etapa</b></td>
						</tr>
						<tr> 
						  <td class="label" width="25%">Nome</td>
						  <td class="cell" width="75%">
							<?php if ($modo == "add") {?>
								<input type="text" name="nome_etapa" class="textfield" maxlength="255">
							<?php } else {?>
								<input type="text" name="nome_etapa" class="textfield" value="<?=$etapa['nome_etapa']?>" maxlength="255">
							<?php } ?>
							</td>
						</tr>
						<tr> 
						  <td class="label">conteudo<br><br><br><br><br><br><br><br><br><br><br><br><input type="button" value="Editar Conteúdo" name="editar_cabecalho" class="botao" onClick="javascript: edita_cabecalho();"></td>
						  <td class="cell">
							<?php if ($modo == "add") {?>
								<textarea name="conteudo" id="cabecalho" class="textarea" rows="12" style="width: 100%;"></textarea>
							<?php } else {?>
								<textarea name="conteudo" id="cabecalho" class="textarea" rows="12" style="width: 100%;"><?=$etapa['conteudo']?></textarea>
							<?php } ?>
							</td>
						</tr>
						<tr> 
						  <td class="label" width="25%">Ordem</td>
						  <td class="cell" width="75%">
							<?php if ($modo == "add") {?>
								<input type="text" name="ordem" class="textfield" maxlength="255">
							<?php } else {?>
								<input type="text" name="ordem" class="textfield" value="<?=$etapa['ordem']?>" maxlength="255">
							<?php } ?>
							</td>
						</tr>
						<tr> 
						  <td colspan="2" align="right"><input type="button" value="Apagar" class="botao" onClick="javascript: apagar();"><input type="button" onClick="valida_form();" value="Salvar" class="botao"></td>
						</tr>
						<?php if ($modo == "add") {?>
						<input type="hidden" name="modo" value="add">
						<?php } else {?>
						<input type="hidden" name="modo" value="update">
						<input type="hidden" name="cd" value="<?=$cd?>">
						<?php } ?>
						<input type="hidden" name="cd_solucao" value="<?=$solucao?>">
					  </form>
					</table>
				</td>
			</tr>
		</table>
	</body>
</html>
