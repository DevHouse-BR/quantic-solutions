<?php
$modo = $_GET["modo"];
$pagina = $_POST["pagina"];
$qtd = $_POST["qtd"];
$filtro = trim($_POST["filtro"]);
$PERMISSAO_DE_ACESSO = "Administradores";
require("../includes/permissao_documento.php");

if ($modo == "apagar"){
	require("../../includes/conectar_mysql.php");
	reset ($_POST); 
	while (list($chave, $valor) = each ($_POST)) {
		if (($chave != "allbox") && ($chave != "1") && ($valor == "on")){
			$query = "DELETE FROM usuarios WHERE (cd='" . $chave . "') LIMIT 1";
			$result = mysql_query($query) or die("Erro ao remover registros do Banco de dados: " . mysql_error());	
		}
	}
}
if ($modo == "desativar"){
	require("../../includes/conectar_mysql.php");
	reset ($_POST); 
	while (list($chave, $valor) = each ($_POST)) {
		if (($chave != "allbox") && ($chave != "1") && ($valor == "on")){
			$query = "UPDATE usuarios SET ativo='n' WHERE (cd='" . $chave . "') LIMIT 1";
			$result = mysql_query($query) or die("Erro ao atualizar registros no Banco de dados: " . mysql_error());	
		}
	}
}
if ($filtro != ""){
	$filtro_sql = " WHERE usuario LIKE '%" . $filtro . "%' or nome_completo LIKE '%" . $filtro . "%'";
}
if ($pagina < 1 || $pagina == ""){
	$pagina = 1;
}
if ($qtd == ""){
	$qtd = 14;
}

require("../../includes/conectar_mysql.php");

$limite = ($qtd * ($pagina -1));
$query_limit = " LIMIT " . $limite . "," . $qtd;

if ($filtro != "") $result = mysql_query("SELECT cd, usuario, nome_completo, departamento FROM usuarios" . $filtro_sql . "order by nome_completo" . $query_limit) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());	
else $result = mysql_query("SELECT cd, usuario, nome_completo, departamento FROM usuarios order by nome_completo" . $query_limit) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());	

$query = "SELECT COUNT(*) FROM usuarios";
if ($filtro != ""){
	$query .= $filtro_sql;
}
$tmp = mysql_fetch_row(mysql_query($query));

$eof = $tmp[0];

$limite = $qtd * ($pagina - 1);
?>
<html>
	<head>
		<title>Usuários do Sistema</title>
		<style type="text/css">
			<!--
			@import url("../includes/browser.css");
			-->
		</style>
		<script language="JavaScript" type="text/javascript">
			NS4 = (document.layers);
     		IE4 = (document.all);
			
			function novo(){
				window.open('user_form.php?modo=add', 'Usuario', 'width=410,height=380,status=no,resizable=no,top=20,left=100,dependent=yes,alwaysRaised=yes');
			}
			function apagar(){
				if (window.showModalDialog('../includes/confirmacao.html',['Confirme!','Deseja apagar os usuários selecionados?','Sim','Não'],'dialogWidth:320px;dialogHeight:100px;status:no;') == "1"){
					document.all["seleciona_users"].action = "user_browser.php?modo=apagar";
					document.all["seleciona_users"].submit();
				}
			}
			function desativar(){
				if (window.showModalDialog('../includes/confirmacao.html',['Confirme!','Deseja desativar os usuários selecionados?','Sim','Não'],'dialogWidth:320px;dialogHeight:100px;status:no;') == "1"){
					document.all["seleciona_users"].action = "user_browser.php?modo=desativar";
					document.all["seleciona_users"].submit();
				}
			}
			function edita_usuario(codigo){
				window.open('user_form.php?modo=update&cd=' + codigo, 'Usuario', 'width=410,height=380,status=no,resizable=no,top=80,left=100,dependent=yes,alwaysRaised=yes');
			}
			function mudapagina(direcao){
				var pagina = 0;
				pagina = document.all["paginacao"].pagina.value;
				if (direcao == "next") pagina++;
				else pagina--;
				if (direcao == "") pagina = 1;
				document.all["paginacao"].pagina.value = pagina;
				document.all["paginacao"].submit();
			}
			function mudapagina2(direcao){
				var pagina = 0;
				pagina = document.all["paginacao2"].pagina.value;
				if (direcao == "next") pagina++;
				else pagina--;
				if (direcao == "") pagina = 1;
				document.all["paginacao2"].pagina.value = pagina;
				document.all["paginacao2"].submit();
			}
			function allcheckbox(){
				for (var i=0;i<document.all["seleciona_users"].elements.length;i++)	{
					var e = document.all["seleciona_users"].elements[i];
					if (e.type=='checkbox') {
						e.checked = document.all["seleciona_users"].allbox.checked;
					}
				}
			}
		</script>
		<script language="JavaScript" src="../includes/menuhorizontal.js"></script>
	</head>
	<body leftmargin="0" bottommargin="0" rightmargin="0" topmargin="0" marginheight="0" marginwidth="0" onMouseDown="escondemenu();">
		<?php require("../includes/menuhorizontal.php"); ?>
		<table class="tabela" width="100%">
		<FORM name="paginacao" action="user_browser.php<?php if($modo == "editor") echo("?modo=editor"); ?>" method="post">
			<tr>
				<td class="label" width="10%" align="center"><input type="button" class="botao" onClick="javascript: novo();" value="Novo" style="width: 100%"></td>
				<td class="label" width="10%" align="center"><input type="button" class="botao" onClick="javascript: apagar();" value="Apagar" style="width: 100%"></td>				
				<td class="label" width="10%" align="center"><input type="button" class="botao" onClick="javascript: desativar();" value="Desativar" style="width: 100%"></td>
				<td class="label" width="60%">&nbsp;Busca:&nbsp;&nbsp;<input type="text" name="filtro" class="textfield" style="width: 85%" value="<?=$filtro?>">&nbsp;&nbsp;<input type="submit" value="OK" class="botao" style="width: 5%"></td>
				<input type="hidden" name="pagina" value="<?=$pagina?>">				
				<td class="label" width="5%"><input type="button" style="width: 100%" class="botao" name="back" value="<" onclick="mudapagina('back');" <?php if($pagina == 0 || $pagina == 1) echo("disabled");?>></td>
				<td class="label" width="5%"><input type="button" class="botao" style="width: 100%" name="next" value=">" onclick="mudapagina('next');" <?php if($limite + $qtd >= $eof) echo("disabled");?>></td>
			</tr>
		</form>
		</table>
		<table class="tabela" width="100%">
			<form name="seleciona_users" action="" method="post">
			<tr>
				<td class="textfield" align="left"><input type="checkbox" name="allbox" onClick="allcheckbox();"></td>
				<td class="textfield" align="center"><b>Usu&aacute;rio</b></td>
				<td class="textfield" align="center"><b>Nome Completo</b></td>
				<td class="textfield" align="center"><b>Departamento</b></td>
			</tr>
			<?php for($i = 0; $i < $qtd; $i++){
					$usuario = mysql_fetch_row($result); 
					if ($usuario[0] != ""){?>
						<tr>
							<td class="textfield" align="left"><input name="<?=$usuario[0]?>" type="checkbox"></td>
							<td class="textfield"><a href="javascript: edita_usuario('<?=$usuario[0]?>');"><b><?=$usuario[1]?></b></a></td>
							<td class="textfield"><?=$usuario[2]?></td>
							<td class="textfield"><?=$usuario[3]?></td>
						</tr>
			<?php	} 
				} ?>
			</form>
		</table>
		<table class="tabela" width="100%">
		<FORM name="paginacao2" action="user_browser.php<?php if($modo == "editor") echo("?modo=editor"); ?>" method="post">
			<tr>
				<td class="label" width="10%" align="center"><input type="button" class="botao" onClick="javascript: novo();" value="Novo" style="width: 100%"></td>
				<td class="label" width="10%" align="center"><input type="button" class="botao" onClick="javascript: apagar();" value="Apagar" style="width: 100%"></td>				
				<td class="label" width="10%" align="center"><input type="button" class="botao" onClick="javascript: desativar();" value="Desativar" style="width: 100%"></td>
					<input type="hidden" name="pagina" value="<?=$pagina?>">
				<td class="label" align="center" width="30%">Usuários/Pagina:&nbsp;<input type="text" class="textfield" name="qtd" value="<?=$qtd?>" onBlur="mudapagina2('');" size="3" maxlength="3" alt="Digite a quantidade de imagens por página a serem mostradas."></td>
				<td class="label" align="center" width="30%"><?=$eof?>&nbsp;Usuários cadastrados.</td>
				<td class="label" width="5%"><input type="button" style="width: 100%" class="botao" name="back" value="<" onclick="mudapagina('back');" <?php if($pagina == 0 || $pagina == 1) echo("disabled");?>></td>
				<td class="label" width="5%"><input type="button" class="botao" style="width: 100%" name="next" value=">" onclick="mudapagina('next');" <?php if($limite + $qtd >= $eof) echo("disabled");?>></td>
			</tr>
		</form>
		</table>
	</body>
</html>
<?php require("../../includes/desconectar_mysql.php"); ?>