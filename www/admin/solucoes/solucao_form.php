<?php
$PERMISSAO_DE_ACESSO = "Administradores";
require("../includes/permissao_documento.php");

$modo = $_GET["modo"];

if($modo == "update"){
	require("../../includes/conectar_mysql.php");
		$cd = $_GET["cd"];
		$query = "SELECT * FROM solucoes where cd=" . $cd;
		$result = mysql_query($query) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());
		$solucao = mysql_fetch_array($result, MYSQL_ASSOC);	
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
				var f = document.all["form_solucao"];
				if ((f.nome.value != "") && (f.cabecalho.value != "") && (f.ordem.value != "") && (f.etiqueta.value != "")) f.submit();
				else alert("Todos os campos são Obrigatórios");
			}
			function edita_cabecalho(){
				window.open('../../editor.php?onde=cabecalho', 'Editor', 'width=750,height=400,status=no,resizable=no,top=20,left=20,dependent=yes,alwaysRaised=yes');
			}
			function edita_etiqueta(){
				window.open('../../editor.php?onde=etiqueta', 'Editor', 'width=750,height=400,status=no,resizable=no,top=20,left=20,dependent=yes,alwaysRaised=yes');
			}
			function edita_intro(){
				window.open('../../editor.php?onde=intro', 'Editor', 'width=750,height=400,status=no,resizable=no,top=20,left=20,dependent=yes,alwaysRaised=yes');
			}
			function apagar(){
				if (window.showModalDialog('../includes/confirmacao.html',['Confirme!','Deseja apagar esta seção?','Sim','Não'],'dialogWidth:320px;dialogHeight:100px;status:no;') == "1"){
					self.location = "../delete.php?oque=solucao&cd=<?=$cd?>";
				}
			}
		</script>
	</head>
	<body leftmargin="0" bottommargin="0" rightmargin="0" topmargin="0" marginheight="0" marginwidth="0" onLoad="document.all['form_solucao'].nome.focus();">
		<table width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td align="center">
					<table class="tabela_form" width="100%">
					<form name="form_solucao" method="post" action="salva_solucao.php">
						<tr> 
							<td colspan="2" style="border: 1px solid #FFFFFF; text-align: center; font-size: 11px;"><?php if($modo == "add") echo ("<b>Nova<b> "); ?><b>Solu&ccedil;&atilde;o</b></td>
						</tr>
						<tr> 
						  <td class="label" width="25%">Nome</td>
						  <td class="cell" width="75%">
							<?php if ($modo == "add") {?>
								<input type="text" name="nome" class="textfield" maxlength="255">
							<?php } else {?>
								<input type="text" name="nome" class="textfield" value="<?=$solucao['nome']?>" maxlength="255">
							<?php } ?>
							</td>
						</tr>
						<tr> 
						  <td class="label">Cabeçalho<br><br><br><input type="button" value="Editar Conteúdo" name="editar_cabecalho" class="botao" onClick="javascript: edita_cabecalho();"></td>
						  <td class="cell">
							<?php if ($modo == "add") {?>
								<textarea name="cabecalho" id="cabecalho" class="textarea" rows="4" style="width: 100%;"></textarea>
							<?php } else {?>
								<textarea name="cabecalho" id="cabecalho" class="textarea" rows="4" style="width: 100%;"><?=wordwrap($solucao['cabecalho'],34, "\n", 1)?></textarea>
							<?php } ?>
							</td>
						</tr>
						<tr> 
						  <td class="label" width="25%">Ordem</td>
						  <td class="cell" width="75%">
							<?php if ($modo == "add") {?>
								<input type="text" name="ordem" class="textfield" maxlength="255">
							<?php } else {?>
								<input type="text" name="ordem" class="textfield" value="<?=$solucao['ordem']?>" maxlength="255">
							<?php } ?>
							</td>
						</tr>
						<tr> 
						  <td class="label">Etiqueta<br><br><br><input type="button" value="Editar Conteúdo" name="editar_etiqueta" class="botao" onClick="javascript: edita_etiqueta();"></td>
						  <td class="cell">
							<?php if ($modo == "add") {?>
								
              <textarea name="etiqueta" id="etiqueta" class="textarea" rows="4" style="width: 100%;"></textarea>
							<?php } else {?>
								
              <textarea name="etiqueta" id="etiqueta" class="textarea" rows="4" style="width: 100%;" wrap="virtual"><?=wordwrap($solucao['etiqueta'],34, "\n", 1)?></textarea>
							<?php } ?>
							</td>
						</tr>
						<tr> 
						  <td class="label">Introdução<br><br><br><input type="button" value="Editar Conteúdo" name="editar_intro" class="botao" onClick="javascript: edita_intro();"></td>
						  <td class="cell">
							<?php if ($modo == "add") {?>
								<textarea name="intro" id="intro" class="textarea" rows="4" style="width: 100%;"></textarea>
							<?php } else {?>
								<textarea name="intro" id="intro" class="textarea" rows="4" style="width: 100%;"><?=wordwrap($solucao['introducao'],34, "\n", 1)?></textarea>
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
					  </form>
					</table>
				</td>
			</tr>
		</table>
	</body>
</html>
<?php require("../../includes/desconectar_mysql.php"); ?>