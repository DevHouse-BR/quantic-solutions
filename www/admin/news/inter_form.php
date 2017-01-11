<?php
$PERMISSAO_DE_ACESSO = "Administradores";
require("../includes/permissao_documento.php");

$modo = $_GET["modo"];

if($modo == "update"){
	require("../../includes/conectar_mysql.php");
		$cd = $_GET["cd"];
		$query = "SELECT * FROM internautas where cd=" . $cd;
		$result = mysql_query($query) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());
		$usuario = mysql_fetch_array($result, MYSQL_ASSOC);
	
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
				var f = document.all["form_user"];
				if (f.nome.value != "" && f.email.value != ""){
					f.submit();
				}
				else alert("Os campos Nome e E-mail são Obrigatórios");
			}
			function apagar(){
				if (window.showModalDialog('../includes/confirmacao.html',['Confirme!','Deseja apagar este internauta?','Sim','Não'],'dialogWidth:320px;dialogHeight:100px;status:no;') == "1"){
					self.location = "../delete.php?oque=internautas&cd=<?=$cd?>";
				}
			}
		</script>
	</head>
	<body leftmargin="0" bottommargin="0" rightmargin="0" topmargin="0" marginheight="0" marginwidth="0" onLoad="document.all['form_user'].nome.focus();">
		<table width="100%">
			<tr>
				<td align="center">
					<table class="tabela_form" width="400">
					<form name="form_user" method="post" action="salva_internauta.php">
						<tr> 
							<td colspan="2" style="border: 1px solid #FFFFFF; text-align: center;"><b>Internauta</b></td>
						</tr>
						<tr> 
						  <td width="97" class="label">Nome Completo</td>
						   <td width="291" class="cell">
							<?php if ($modo == "add") {?>
								<input type="text" name="nome" class="textfield" maxlength="255">
							<?php } else {?>
								<input type="text" name="nome" class="textfield" value="<?=$usuario['nome']?>" maxlength="255">
							<?php } ?>
							</td>
						</tr>
						<tr> 
						  <td class="label">Email</td>
						  <td class="cell">
							<?php if ($modo == "add") {?>
								<input type="text" name="email" class="textfield" maxlength="100">
							<?php } else {?>
								<input type="text" name="email" class="textfield" value="<?=$usuario['email']?>" maxlength="100">
							<?php } ?>
							</td>
						</tr>
						<tr> 
						  <td colspan="2" align="right"><input type="button" value="Apagar" class="botao" onClick="javascript: apagar();"> <input type="button" onClick="valida_form();" value="Salvar" class="botao"></td>
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
