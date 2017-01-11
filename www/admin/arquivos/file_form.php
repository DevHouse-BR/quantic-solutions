<?php
$PERMISSAO_DE_ACESSO = "Administradores";
require("../includes/permissao_documento.php");

$modo = $_GET["modo"];

if($modo == "update"){
	require("../../includes/conectar_mysql.php");
		$cd = $_GET["cd"];
		$query = "SELECT * FROM arquivos where cd=" . $cd;
		$result = mysql_query($query) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());
		$arquivo = mysql_fetch_array($result, MYSQL_ASSOC);
	require("../../includes/desconectar_mysql.php");
}
?>
<html>
	<head>
		<title>Upload de Arquivos</title>
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
				if (window.showModalDialog('../includes/confirmacao.html',['Confirme!','Deseja apagar este arquivo?','Sim','Não'],'dialogWidth:320px;dialogHeight:100px;status:no;') == "1"){
					self.location = "../delete.php?oque=arquivos&cd=<?=$cd?>";
				}
			}
			function editaconteudo(){
				window.open('../../editor.php?onde=descricao', 'Editor', 'width=750,height=400,status=no,resizable=no,top=20,left=20,dependent=yes,alwaysRaised=yes');
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
					<form name="form" method="post" action="file_uploader.php" encType="multipart/form-data">
						<tr> 
							<td colspan="2" style="border: 1px solid #FFFFFF; text-align: center;"><b><?php if ($modo == "add") echo("Novo&nbsp;");?>Arquivo</b></td>
						</tr>
						<tr> 
							<td class="label" width="17%">Nome</td>
							<td class="cell" width="83%">
								<?php if ($modo == "add") {?>
									<input type="text" name="nome" class="textfield" maxlength="255">
								<?php } else {?>
									<input type="text" name="nome" class="textfield" value="<?=$arquivo['nome']?>" maxlength="255">
								<?php } ?>
							</td>
						</tr>
						<tr> 
						  <td class="label">Descrição<br><br><br><br><input type="button" value="Editar" name="edita_conteudo" class="botao" onClick="javascript: editaconteudo();"></td>
						  <td class="cell">
							<?php if ($modo == "add") {?>
								<textarea name="descricao" id="descricao" class="textarea" rows="5" style="width: 100%;"></textarea>
							<?php } else {?>
								<textarea name="descricao" id="descricao" class="textarea" rows="5" style="width: 100%;"><?=$arquivo['descricao']?></textarea>
							<?php } ?>
							</td>
						</tr>
						<tr> 
						  <td class="label">Icone</td>
						  <td class="cell">
							<?php if ($modo == "add") {?>
								<input type="text" name="icone" class="textfield" maxlength="255" style="width: 80%">
							<?php } else {?>
								<input type="text" name="icone" class="textfield" value="<?=$arquivo['icone']?>" maxlength="255" style="width: 80%">
							<?php } ?>
							<input type="button" class="botao" name="procurar" value="Procurar" onClick="seek('form.icone');">
							</td>
						</tr>
						<tr> 
						  <td class="label">Arquivo</td>
						  <td class="cell">
							<?php if ($modo == "add") {?>
								<input type="file" name="arquivo" class="textfield" maxlength="255" style="width: 100%">
							<?php } else {?>
								<input type="text" name="arquivo" class="textfield" value="<?=$arquivo['arquivo']?>" maxlength="255" style="width: 100%">
							<?php } ?>
							</td>
						</tr>
						<tr> 
						  <td class="label">Tipo</td>
						  <td class="cell" height="24">
							<?php if ($modo == "add") {?>
								<select name="tipo" class="textarea" style="width: 100%">
									<option value="press_release">Press Release</option>
									<option value="banco_imagens">Banco de Imagens</option>
									<option value="download">Download</option>
								</select>
							<?php } else {?>
								<select name="tipo" class="textarea" style="width: 100%">
									<option value="press_release" <?php if ($arquivo['tipo'] == "press_release") echo("selected");?>>Press Release</option>
									<option value="banco_imagens" <?php if ($arquivo['tipo'] == "banco_imagens") echo("selected");?>>Banco de Imagens</option>
									<option value="download" <?php if ($arquivo['tipo'] == "download") echo("selected");?>>Download</option>
								</select>
							<?php } ?>
							</td>
						</tr>
						<tr> 
						  <td colspan="2" align="right"><?php if($modo != "add") echo("<input type=\"button\" value=\"Apagar\" class=\"botao\" onClick=\"javascript: apagar();\">"); ?> <input type="submit" value="Salvar" class="botao"></td>
						</tr>
						<?php if ($modo == "add") {?>
						<input type="hidden" name="modo" value="add">
						<?php } else {?>
						<input type="hidden" name="modo" value="update">
						<input type="hidden" name="cd" value="<?=$cd?>">
						<?php } ?>
						<input type="hidden" name="MAX_FILE_SIZE" value="9999999999"> 
					  </form>
					</table>
				</td>
			</tr>
		</table>
	</body>
</html>
