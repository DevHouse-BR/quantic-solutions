<?php
$PERMISSAO_DE_ACESSO = "Administradores";
require("../includes/permissao_documento.php");

$modo = $_GET["modo"];

if($modo == "update"){
	require("../../includes/conectar_mysql.php");
		$cd = $_GET["cd"];
		$query = "SELECT * FROM parceiros where cd=" . $cd;
		$result = mysql_query($query) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());
		$parceiro = mysql_fetch_array($result, MYSQL_ASSOC);
	require("../../includes/desconectar_mysql.php");
}
?>
<html>
	<head>
		<title>Cadastro de Usuário</title>
		<style type="text/css">
			<!--
			@import url(../includes/forms.css);
			-->
		</style>
		<script language="JavaScript" type="text/javascript">
			function valida_form(){
				var f = document.all["form"];
				if ((f.nome.value != "") && (f.imagem.value != "") && (f.texto.value != "") && (f.link.value != "")) f.submit();
				else alert("Os campos Usuário, Senha e Nome Completo são campos Obrigatórios");
			}
			function apagar(){
				if (window.showModalDialog('../includes/confirmacao.html',['Confirme!','Deseja apagar este usuário?','Sim','Não'],'dialogWidth:320px;dialogHeight:100px;status:no;') == "1"){
					self.location = "../delete.php?oque=usuarios&cd=<?=$cd?>";
				}
			}
			function editaconteudo(){
				window.open('../../editor.php?onde=texto', 'Editor', 'width=750,height=400,status=no,resizable=no,top=20,left=20,dependent=yes,alwaysRaised=yes');
			}
			function seek(onde){
				window.open('../img/img_browser.php?modo=caminho&onde=' + onde, 'imgbrowser', 'width=700,height=500,status=no,resizable=yes,scrollbars=yes,top=20,left=20,dependent=yes,alwaysRaised=yes');
			}
		</script>
	</head>
	<body leftmargin="0" bottommargin="0" rightmargin="0" topmargin="0" marginheight="0" marginwidth="0" onLoad="document.all['form'].nome.focus();">
		<table width="100%">
			<tr>
				<td align="center">
					<table class="tabela_form" width="400">
					<form name="form" method="post" action="salva_parceiro.php">
						<tr> 
							<td colspan="2" style="border: 1px solid #FFFFFF; text-align: center;"><b><?php if ($modo == "add") echo("Novo&nbsp;");?>Parceiro</b></td>
						</tr>
						<tr> 
							<td class="label" width="40%">Nome</td>
							<td class="cell" width="60%">
								<?php if ($modo == "add") {?>
									<input type="text" name="nome" class="textfield" maxlength="255">
								<?php } else {?>
									<input type="text" name="nome" class="textfield" value="<?=$parceiro['nome']?>" maxlength="255">
								<?php } ?>
							</td>
						</tr>
						<tr> 
						  <td class="label">Imagem</td>
						  <td class="cell">
							<?php if ($modo == "add") {?>
								<input type="text" name="imagem" class="textfield" maxlength="255" style="width: 85%">
							<?php } else {?>
								<input type="text" name="imagem" class="textfield" value="<?=$parceiro['imagem']?>" maxlength="255" style="width: 85%">
							<?php } ?>
							<input type="button" class="botao" name="procurar" value="Procurar" onClick="seek('form.imagem');">
							</td>
						</tr>
						<tr> 
						  <td class="label">Texto<br><br><br><br><input type="button" value="Editar Conteúdo" name="edita_conteudo" class="botao" onClick="javascript: editaconteudo();"></td>
						  <td class="cell">
							<?php if ($modo == "add") {?>
								<textarea name="texto" id="texto" class="textarea" rows="5" style="width: 440;"></textarea>
							<?php } else {?>
								<textarea name="texto" id="texto" class="textarea" rows="5" style="width: 440;"><?=$parceiro['texto']?></textarea>
							<?php } ?>
							</td>
						</tr>
						<tr> 
						  <td class="label">Link</td>
						   <td class="cell">
							<?php if ($modo == "add") {?>
								<input type="text" name="link" class="textfield" maxlength="100">
							<?php } else {?>
								<input type="text" name="link" class="textfield" value="<?=$parceiro['link']?>" maxlength="255">
							<?php } ?>
							</td>
						</tr>
						<tr> 
						  <td colspan="2" align="right"><?php if($cd != "1") echo("<input type=\"button\" value=\"Apagar\" class=\"botao\" onClick=\"javascript: apagar();\">"); ?> <input type="button" onClick="valida_form();" value="Salvar" class="botao"></td>
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
