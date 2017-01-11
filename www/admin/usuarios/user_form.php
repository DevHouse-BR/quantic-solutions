<?php
$PERMISSAO_DE_ACESSO = "Administradores";
require("../includes/permissao_documento.php");

$modo = $_GET["modo"];

if($modo == "update"){
	require("../../includes/conectar_mysql.php");
		$cd = $_GET["cd"];
		$query = "SELECT * FROM usuarios where cd=" . $cd;
		$result = mysql_query($query) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());
		$usuario = mysql_fetch_array($result, MYSQL_ASSOC);
	
	
		$query = "SELECT grupo FROM grupos_usuarios WHERE (usuario='" . $usuario['usuario'] . "')";
		$result = mysql_query($query) or die("Erro ao acessar registros relativos aos grupos de usuarios: " . mysql_error());
		$grupo = "";
		while ($grupos = mysql_fetch_array($result, MYSQL_NUM)){
			if ($grupo == "") $grupo .= $grupos[0];
			else {
				$grupo .= "\n" . $grupos[0];
			}
		} 
	
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
		<script language="JavaScript" src="../includes/calendar1.js"></script>
		<script language="JavaScript" type="text/javascript">
			function valida_form(){
				var f = document.all["form_user"];
				if (f.usuario.value != "" && f.senha.value != "" && f.nome_completo.value != ""){
					if (f.senha.value == f.conf_senha.value){
						if(f.senha.value == f.lembrete.value) alert("Não guarde a sua senha no campo lembrete da senha.");
						else f.submit();
					}
					else {
						alert("A Senha digitada é diferente da senha confirmada!");
						f.senha.value = "";
						f.conf_senha.value = "";
						}
				}
				else alert("Os campos Usuário, Senha e Nome Completo são campos Obrigatórios");
			}
			function valida_exp(){
				var f = document.all["form_user"];
				var now = new Date();
				var proximo_mes = (now.getDate() < 10 ? '0' : '') + now.getDate() + "/" + (now.getMonth() < 9 ? '0' : '') + (now.getMonth() + 2) + "/" + now.getFullYear();
				if (f.senha_expira.checked) {
					f.expiracao_senha.value = proximo_mes;
					f.expiracao_senha.disabled = false;
				}
				else {
					f.expiracao_senha.value = "31/12/2099";
					f.expiracao_senha.disabled = true;
				}
			}
			function adicionargrupo(){
				window.open('../grupos/grupo_browser.php?modo=selecionar', 'Grupos', 'width=410,height=380,status=no,resizable=no,top=20,left=100,dependent=yes,alwaysRaised=yes');
			}
			function apagar(){
				if (window.showModalDialog('../includes/confirmacao.html',['Confirme!','Deseja apagar este usuário?','Sim','Não'],'dialogWidth:320px;dialogHeight:100px;status:no;') == "1"){
					self.location = "../delete.php?oque=usuarios&cd=<?=$cd?>";
				}
			}
		</script>
	</head>
	<body leftmargin="0" bottommargin="0" rightmargin="0" topmargin="0" marginheight="0" marginwidth="0" onLoad="document.all['form_user'].usuario.focus();">
		<table width="100%">
			<tr>
				<td align="center">
					<table class="tabela_form" width="400">
					<form name="form_user" method="post" action="salva_usuario.php">
						<tr> 
							<td colspan="2" style="border: 1px solid #FFFFFF; text-align: center;"><b>Usuário</b></td>
						</tr>
						<tr> 
							<td class="label" width="40%">Usuário</td>
							<td class="cell" width="60%">
								<?php if ($modo == "add") {?>
									<input type="text" name="usuario" class="textfield" maxlength="15">
								<?php } else {?>
									<input type="text" name="usuario" class="textfield" value="<?=$usuario['usuario']?>" maxlength="15" <?php if($cd == "1") echo("disabled");?>>
								<?php } ?>
							</td>
						</tr>
						<tr> 
						  <td class="label">Senha</td>
						  <td class="cell">
							<?php if ($modo == "add") {?>
								<input type="password" name="senha" class="textfield" maxlength="50">
							<?php } else {?>
								<input type="password" name="senha" class="textfield" value="<?=$usuario['senha']?>" maxlength="50">
							<?php } ?>
							</td>
						</tr>
						<tr> 
						  <td class="label">Confirmação da Senha</td>
						  <td class="cell">
							<?php if ($modo == "add") {?>
								<input type="password" name="conf_senha" class="textfield" maxlength="50">
							<?php } else {?>
								<input type="password" name="conf_senha" class="textfield" value="<?=$usuario['senha']?>" maxlength="50">
							<?php } ?>
							</td>
						</tr>
						<tr> 
						  <td class="label">Lembrete da Senha</td>
						  <td class="cell">
							<?php if ($modo == "add") {?>
								<input type="text" name="lembrete" class="textfield" maxlength="255">
							<?php } else {?>
								<input type="text" name="lembrete" class="textfield" value="<?=$usuario['lembrete']?>" maxlength="255">
							<?php } ?>
							</td>
						</tr>
						<tr> 
						  <td class="label">Nome Completo</td>
						   <td class="cell">
							<?php if ($modo == "add") {?>
								<input type="text" name="nome_completo" class="textfield" maxlength="255">
							<?php } else {?>
								<input type="text" name="nome_completo" class="textfield" value="<?=$usuario['nome_completo']?>" maxlength="255">
							<?php } ?>
							</td>
						</tr>
						<tr> 
						  <td class="label">Departamento</td>
						   <td class="cell">
							<?php if ($modo == "add") {?>
								<input type="text" name="departamento" class="textfield" maxlength="100">
							<?php } else {?>
								<input type="text" name="departamento" class="textfield" value="<?=$usuario['departamento']?>" maxlength="100">
							<?php } ?>
							</td>
						</tr>
						<tr> 
						  <td class="label">Telefone</td>
						  <td class="cell">
							<?php if ($modo == "add") {?>
								<input type="text" name="telefone" class="textfield" maxlength="30">
							<?php } else {?>
								<input type="text" name="telefone" class="textfield" value="<?=$usuario['telefone']?>" maxlength="30">
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
							<td class="label">Senha Expira?</td>
							<td>
								<table cellpadding="0" cellspacing="0">
									 <td class="cell" width="5%">
									 	<?php if ($modo == "add") {?>
											<input type="checkbox" name="senha_expira" class="checkbox" onClick="valida_exp();">
										<?php } else {?>
											<input type="checkbox" name="senha_expira" class="checkbox" <?php if ($usuario['senha_expira'] == "s") echo("checked"); ?> onClick="valida_exp();">
										<?php } ?>
									</td>
									<td class="label" width="90%">Ativo?</td>
									<td class="cell" width="5%">
										<?php if ($modo == "add") {?>
											<input type="checkbox" name="ativo" class="checkbox" checked>
										<?php } else {?>
											<input type="checkbox" name="ativo" class="checkbox" <?php if ($usuario['ativo'] == "s") echo("checked");  if($cd == "1") echo("disabled");?>>
										<?php } ?>
									</td>
								</table>
							</td>				  
						</tr>
						<tr> 
						  <td class="label">Data Expiração da Senha</td>
						  <td class="cell">
							<?php if ($modo == "add") {?>
								<input type="text" name="expiracao_senha" class="textfield2" disabled>
								<a href="javascript:cal1.popup();"><img src="../imagens/cal.gif" border="0" alt="Clique aqui para escolher a data."></a>
							<?php } else {?>
								<input type="text" name="expiracao_senha" class="textfield2" value="<?php $tmp = split("-", $usuario['expiracao_senha']); echo($tmp[2] . "/" . $tmp[1] . "/" . $tmp[0]);?>">
								<a href="javascript:cal1.popup();"><img src="../imagens/cal.gif" border="0" alt="Clique aqui para escolher a data."></a>
							<?php } ?>
							</td>
						</tr>
						<tr> 
						  <td class="label">Grupos a que pertence<br><br><br><br><input type="button" value="Adicionar Grupo" name="novogrupo" class="botao" onClick="javascript: adicionargrupo();"></td>
						  <td class="cell">
							<?php if ($modo == "add") {?>
								<textarea name="grupos" class="textarea" rows="5">Usuarios</textarea>
							<?php } else {?>
								<textarea name="grupos" class="textarea" rows="5"><?=$grupo?></textarea>
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
	<script language="JavaScript">
		var cal1 = new calendar1(document.forms['form_user'].elements['expiracao_senha']);
		cal1.year_scroll = true;
		cal1.time_comp = false;
	</script>
</html>
