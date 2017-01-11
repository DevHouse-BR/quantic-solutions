<?php
$PERMISSAO_DE_ACESSO = "Administradores/Publicadores";
require("../includes/permissao_documento.php");

$modo = $_GET["modo"];

if($modo == "update"){
	require("../../includes/conectar_mysql.php");
		$cd = $_GET["cd"];
		$query = "SELECT * FROM noticias where cd=" . $cd;
		$result = mysql_query($query) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());
		$noticia = mysql_fetch_array($result, MYSQL_ASSOC);	
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
		<script language="JavaScript" src="../includes/calendar1.js"></script>
		<script language="JavaScript" type="text/javascript">
			function valida_form(){
				var f = document.all["form_noticia"];
				if (f.titulo.value != "" && f.conteudo.value != "" && f.data_inicio.value != "" && f.data_termino.value != "") f.submit();
				else alert("Todos os campos são Obrigatórios");
			}
			function adiciona_datas(){
				var f = document.all["form_noticia"];
				var now = new Date();
				var proximo_mes = (now.getDate() < 10 ? '0' : '') + now.getDate() + "/" + (now.getMonth() < 9 ? '0' : '') + (now.getMonth() + 2) + "/" + now.getFullYear();
				var hoje = (now.getDate() < 10 ? '0' : '') + now.getDate() + "/" + (now.getMonth() < 9 ? '0' : '') + (now.getMonth() + 1) + "/" + now.getFullYear();
				if (f.data_inicio.value == "") {
					f.data_inicio.value = hoje;
				}
				if (f.data_termino.value == "") {
					f.data_termino.value = proximo_mes;
				}
			}
			function editaconteudo(){
				window.open('../../editor.php', 'Editor', 'width=750,height=400,status=no,resizable=no,top=20,left=20,dependent=yes,alwaysRaised=yes');
			}
			function apagar(){
				if (window.showModalDialog('../includes/confirmacao.html',['Confirme!','Deseja apagar esta notícia?','Sim','Não'],'dialogWidth:320px;dialogHeight:100px;status:no;') == "1"){
					self.location = "../delete.php?oque=noticias&cd=<?=$cd?>";
				}
			}
		</script>
	</head>
	<body leftmargin="0" bottommargin="0" rightmargin="0" topmargin="0" marginheight="0" marginwidth="0" onLoad="document.all['form_noticia'].titulo.focus();">
		<table width="100%">
			<tr>
				<td align="center">
					<table class="tabela_form" width="600">
					<form name="form_noticia" method="post" action="salva_noticia.php">
						<tr> 
							<td colspan="2" style="border: 1px solid #FFFFFF; text-align: center;"><b>Notícia</b></td>
						</tr>
							<input type="hidden" name="publicador_cd" value="<?=$_COOKIE['cd_usuario']?>">
							<input type="hidden" name="publicador" value="<?=$_COOKIE['usuario']?>">
						<tr> 
						  <td class="label" width="25%">Título</td>
						  <td class="cell" width="75%">
							<?php if ($modo == "add") {?>
								<input type="text" name="titulo" class="textfield" maxlength="255">
							<?php } else {?>
								<input type="text" name="titulo" class="textfield" value="<?=$noticia['titulo']?>" maxlength="255">
							<?php } ?>
							</td>
						</tr>
						<tr> 
						  <td class="label">Conteúdo da Notícia<br><br><br><br><input type="button" value="Editar Conteúdo" name="edita_conteudo" class="botao" onClick="javascript: editaconteudo();"></td>
						  <td class="cell">
							<?php if ($modo == "add") {?>
								<textarea name="conteudo" id="conteudo" class="textarea" rows="5" style="width: 440;"></textarea>
							<?php } else {?>
								<textarea name="conteudo" id="conteudo" class="textarea" rows="5" style="width: 440;"><?=$noticia['conteudo']?></textarea>
							<?php } ?>
							</td>
						</tr>
						<tr> 
						  <td class="label">Data de Início</td>
						  <td class="cell">
							<?php if ($modo == "add") {?>
								<input type="text" name="data_inicio" class="textfield3" onFocus="javascript: adiciona_datas();">
								<a href="javascript:cal1.popup();"><img src="../imagens/cal.gif" border="0" alt="Clique aqui para escolher a data."></a>
							<?php } else {?>
								<input type="text" name="data_inicio" class="textfield3" onFocus="javascript: adiciona_datas();" value="<?php $tmp = split("-", $noticia['data_inicio']); echo($tmp[2] . "/" . $tmp[1] . "/" . $tmp[0]);?>">
								<a href="javascript:cal1.popup();"><img src="../imagens/cal.gif" border="0" alt="Clique aqui para escolher a data."></a>
							<?php } ?>
							</td>
						</tr>
						<tr> 
						  <td class="label">Data Término</td>
						  <td class="cell">
							<?php if ($modo == "add") {?>
								<input type="text" name="data_termino" class="textfield3" onFocus="javascript: adiciona_datas();">
								<a href="javascript:cal2.popup();"><img src="../imagens/cal.gif" border="0" alt="Clique aqui para escolher a data."></a>
							<?php } else {?>
								<input type="text" name="data_termino" class="textfield3" onFocus="javascript: adiciona_datas();" value="<?php $tmp = split("-", $noticia['data_termino']); echo($tmp[2] . "/" . $tmp[1] . "/" . $tmp[0]);?>">
								<a href="javascript:cal2.popup();"><img src="../imagens/cal.gif" border="0" alt="Clique aqui para escolher a data."></a>
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
	<script language="JavaScript">
		var cal1 = new calendar1(document.forms['form_noticia'].elements['data_inicio']);
		var cal2 = new calendar1(document.forms['form_noticia'].elements['data_termino']);
		cal1.year_scroll = true;
		cal1.time_comp = false;
	</script>
</html>
