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
			$query = "DELETE FROM oportunidades WHERE (cd='" . $chave . "') LIMIT 1";
			$result = mysql_query($query) or die("Erro ao remover registros do Banco de dados: " . mysql_error());	
		}
	}
}
if ($modo == "desativar"){
	require("../../includes/conectar_mysql.php");
	reset ($_POST); 
	while (list($chave, $valor) = each ($_POST)) {
		if (($chave != "allbox") && ($valor == "on")){
			$query = "UPDATE oportunidades SET ativo='n' WHERE (cd='" . $chave . "') LIMIT 1";
			$result = mysql_query($query) or die("Erro ao atualizar registros no Banco de dados: " . mysql_error());	
		}
	}
}
if ($modo == "ativar"){
	require("../../includes/conectar_mysql.php");
	reset ($_POST); 
	while (list($chave, $valor) = each ($_POST)) {
		if (($chave != "allbox") && ($valor == "on")){
			$query = "UPDATE oportunidades SET ativo='s' WHERE (cd='" . $chave . "') LIMIT 1";
			$result = mysql_query($query) or die("Erro ao atualizar registros no Banco de dados: " . mysql_error());	
		}
	}
}
if ($filtro != ""){
	$filtro_sql = " WHERE vaga LIKE '%" . $filtro . "%' or descricao LIKE '%" . $filtro . "%'";
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

if ($filtro != "") $result = mysql_query("SELECT * FROM oportunidades" . $filtro_sql . "order by vaga" . $query_limit) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());	
else $result = mysql_query("SELECT * FROM oportunidades order by vaga" . $query_limit) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());	

$query = "SELECT COUNT(*) FROM oportunidades";
if ($filtro != ""){
	$query .= $filtro_sql;
}
$tmp = mysql_fetch_row(mysql_query($query));

$eof = $tmp[0];

$limite = $qtd * ($pagina - 1);
?>
<html>
	<head>
		<title>Oportunidades de Trabalho - Quantic</title>
		<style type="text/css">
			<!--
			@import url("../includes/browser.css");
			-->
		</style>
		<script language="JavaScript" type="text/javascript">
			NS4 = (document.layers);
     		IE4 = (document.all);
			
			function novo(){
				window.open('oportunidades_form.php?modo=add', 'Vaga', 'width=610,height=212,status=no,resizable=no,top=20,left=100,dependent=yes,alwaysRaised=yes');
			}
			function apagar(){
				if (window.showModalDialog('../includes/confirmacao.html',['Confirme!','Deseja apagar as vagas selecionadas?','Sim','Não'],'dialogWidth:320px;dialogHeight:100px;status:no;') == "1"){
					document.all["seleciona_users"].action = "oportunidades_browser.php?modo=apagar";
					document.all["seleciona_users"].submit();
				}
			}
			function desativar(){
				if (window.showModalDialog('../includes/confirmacao.html',['Confirme!','Deseja desativar as vagas selecionadas?','Sim','Não'],'dialogWidth:320px;dialogHeight:100px;status:no;') == "1"){
					document.all["seleciona_users"].action = "oportunidades_browser.php?modo=desativar";
					document.all["seleciona_users"].submit();
				}
			}
			function ativar(){
				if (window.showModalDialog('../includes/confirmacao.html',['Confirme!','Deseja ativar as vagas selecionadas?','Sim','Não'],'dialogWidth:320px;dialogHeight:100px;status:no;') == "1"){
					document.all["seleciona_users"].action = "oportunidades_browser.php?modo=ativar";
					document.all["seleciona_users"].submit();
				}
			}
			function edita_usuario(codigo){
				window.open('oportunidades_form.php?modo=update&cd=' + codigo, 'Vaga', 'width=610,height=212,status=no,resizable=no,top=80,left=100,dependent=yes,alwaysRaised=yes');
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
		<FORM name="paginacao" action="oportunidades_browser.php" method="post">
			<tr>
				<td class="label" width="10%" align="center"><input type="button" class="botao" onClick="javascript: novo();" value="Nova" style="width: 100%"></td>
				<td class="label" width="10%" align="center"><input type="button" class="botao" onClick="javascript: apagar();" value="Apagar" style="width: 100%"></td>				
				<td class="label" width="10%" align="center"><input type="button" class="botao" onClick="javascript: desativar();" value="Desativar" style="width: 100%"></td>
				<td class="label" width="10%" align="center"><input type="button" class="botao" onClick="javascript: ativar();" value="Ativar" style="width: 100%"></td>
				<td class="label" width="50%">&nbsp;Busca:&nbsp;&nbsp;<input type="text" name="filtro" class="textfield" style="width: 80%" value="<?=$filtro?>">&nbsp;&nbsp;<input type="submit" value="OK" class="botao" style="width: 5%"></td>
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
				<td class="textfield" align="center"><b>Vaga</b></td>
				<td class="textfield" align="center"><b>Descricao</b></td>
				<td class="textfield" align="center"><b>Ativo?</b></td>
			</tr>
			<?php while ($vaga = mysql_fetch_array($result, MYSQL_ASSOC)){?>
						<tr>
							<td class="textfield" align="left"><input name="<?=$vaga['cd']?>" type="checkbox"></td>
							<td class="textfield"><a href="javascript: edita_usuario('<?=$vaga['cd']?>');"><b><?=$vaga['vaga']?></b></a></td>
							<td class="textfield"><?=$vaga['descricao']?></td>
							<td class="textfield" align="center"><b><?=$vaga['ativo']?></b></td>
						</tr>
			<?php } ?>
			</form>
		</table>
		<table class="tabela" width="100%">
		<FORM name="paginacao2" action="oportunidades_browser.php" method="post">
			<tr>
				<td class="label" width="10%" align="center"><input type="button" class="botao" onClick="javascript: novo();" value="Nova" style="width: 100%"></td>
				<td class="label" width="10%" align="center"><input type="button" class="botao" onClick="javascript: apagar();" value="Apagar" style="width: 100%"></td>				
				<td class="label" width="10%" align="center"><input type="button" class="botao" onClick="javascript: desativar();" value="Desativar" style="width: 100%"></td>
				<td class="label" width="10%" align="center"><input type="button" class="botao" onClick="javascript: ativar();" value="Ativar" style="width: 100%"></td>
					<input type="hidden" name="pagina" value="<?=$pagina?>">
				<td class="label" align="center" width="25%">Vagas/Pagina:&nbsp;<input type="text" class="textfield" name="qtd" value="<?=$qtd?>" onBlur="mudapagina2('');" size="3" maxlength="3" alt="Digite a quantidade de imagens por página a serem mostradas."></td>
				<td class="label" align="center" width="25%"><?=$eof?>&nbsp;Vagas cadastradas.</td>
				<td class="label" width="5%"><input type="button" style="width: 100%" class="botao" name="back" value="<" onclick="mudapagina('back');" <?php if($pagina == 0 || $pagina == 1) echo("disabled");?>></td>
				<td class="label" width="5%"><input type="button" class="botao" style="width: 100%" name="next" value=">" onclick="mudapagina('next');" <?php if($limite + $qtd >= $eof) echo("disabled");?>></td>
			</tr>
		</form>
		</table>
	</body>
</html>
<?php require("../../includes/desconectar_mysql.php"); ?>