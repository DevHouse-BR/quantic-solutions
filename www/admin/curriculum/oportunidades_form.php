<?php
$PERMISSAO_DE_ACESSO = "Administradores/Publicadores";
require("../includes/permissao_documento.php");

$modo = $_GET["modo"];

if($modo == "update"){
	require("../../includes/conectar_mysql.php");
		$cd = $_GET["cd"];
		$query = "SELECT * FROM oportunidades where cd=" . $cd;
		$result = mysql_query($query) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());
		$vaga = mysql_fetch_array($result, MYSQL_ASSOC);	
	require("../../includes/desconectar_mysql.php");
}
?>
<html>
	<head>
		<title>Cadastro de Notícia</title>
		<style type="text/css">
			<!--
			@import url(../includes/forms.css);
			-->
		</style>
		<script language="JavaScript" type="text/javascript">
			function valida_form(){
				var f = document.all["form_noticia"];
				if (f.vaga.value != "" && f.descricao.value != "") f.submit();
				else alert("Todos os campos são Obrigatórios");
			}
			function editaconteudo(){
				window.open('../../editor.php?onde=descricao', 'Editor', 'width=750,height=400,status=no,resizable=no,top=20,left=20,dependent=yes,alwaysRaised=yes');
			}
			function apagar(){
				if (window.showModalDialog('../includes/confirmacao.html',['Confirme!','Deseja apagar esta oportunidade/vaga?','Sim','Não'],'dialogWidth:320px;dialogHeight:100px;status:no;') == "1"){
					self.location = "../delete.php?oque=oportunidades&cd=<?=$cd?>";
				}
			}
		</script>
	</head>
	<body leftmargin="0" bottommargin="0" rightmargin="0" topmargin="0" marginheight="0" marginwidth="0" onLoad="document.all['form_noticia'].vaga.focus();">
		<table width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td align="center">
					<?php if ($_GET["menu"] == "sim") require("../includes/menuhorizontal.php"); ?>
					<table class="tabela_form" width="600">
					<form name="form_noticia" method="post" action="salva_oportunidade.php">
						<tr> 
							<td colspan="2" style="border: 1px solid #FFFFFF; text-align: center;"><b>Vaga/Oportunidade</b></td>
						</tr>
						<tr> 
						  <td class="label" width="25%">Vaga</td>
						  <td class="cell" width="75%">
							<?php if ($modo == "add") {?>
								<input type="text" name="vaga" class="textfield" maxlength="255">
							<?php } else {?>
								<input type="text" name="vaga" class="textfield" value="<?=$vaga['vaga']?>" maxlength="255">
							<?php } ?>
							</td>
						</tr>
						<tr> 
						  <td class="label">Descrição<br><br><br><br><br><br><input type="button" value="Editar Conteúdo" name="edita_conteudo" class="botao" onClick="javascript: editaconteudo();"></td>
						  <td class="cell">
							<?php if ($modo == "add") {?>
								<textarea name="descricao" id="descricao" class="textarea" rows="7" style="width: 440;"></textarea>
							<?php } else {?>
								<textarea name="descricao" id="descricao" class="textarea" rows="7" style="width: 440;"><?=$vaga['descricao']?></textarea>
							<?php } ?>
							</td>
						</tr>
						<tr>
							<td class="label">Ativo?</td>
							<td class="cell">
								<?php if ($modo == "add") {?>
									<input type="checkbox" name="ativo" class="checkbox" checked>
								<?php } else {?>
									<input type="checkbox" name="ativo" class="checkbox" <?php if ($vaga['ativo'] == "s") echo("checked"); ?>>
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
