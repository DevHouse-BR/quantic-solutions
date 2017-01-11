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
			$query = "DELETE FROM curriculos WHERE (cd='" . $chave . "') LIMIT 1";
			$result = mysql_query($query) or die("Erro ao remover registros do Banco de dados: " . mysql_error());	
		}
	}
}
if ($filtro != ""){
	$filtro_sql = " WHERE nome LIKE '%" . $filtro . "%' or cargo1 LIKE '%" . $filtro . "%'";
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

if ($filtro != "") $result = mysql_query("SELECT cd, nome, cidade, estado, escolaridade, cargo1 FROM curriculos" . $filtro_sql . "order by cargo1" . $query_limit) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());	
else $result = mysql_query("SELECT cd, nome, cidade, estado, escolaridade, cargo1 FROM curriculos order by cargo1" . $query_limit) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());	

$query = "SELECT COUNT(*) FROM curriculos";
if ($filtro != ""){
	$query .= $filtro_sql;
}
$tmp = mysql_fetch_row(mysql_query($query));

$eof = $tmp[0];

$limite = $qtd * ($pagina - 1);
?>
<html>
	<head>
		<title>Curriculos Cadastrados</title>
		<style type="text/css">
			<!--
			@import url("../includes/browser.css");
			-->
		</style>
		<script language="JavaScript" type="text/javascript">
			NS4 = (document.layers);
     		IE4 = (document.all);
			function cabecalho(){
				window.open('form_cabecalho.php', 'cabecalho', 'width=595,height=205,status=yes,resizable=yes,top=20,left=20,scrollbars=yes,dependent=yes,alwaysRaised=yes');
			}
			function apagar(){
				if (window.showModalDialog('../includes/confirmacao.html',['Confirme!','Deseja apagar os currículos selecionados?','Sim','Não'],'dialogWidth:320px;dialogHeight:100px;status:no;') == "1"){
					document.all["seleciona_curriculos"].action = "curriculum_browser.php?modo=apagar";
					document.all["seleciona_curriculos"].submit();
				}
			}
			function visualiza_curriculo(codigo){
				window.open('ver_curriculo.php?cd=' + codigo, 'Curriculo', 'width=700,height=500,status=yes,resizable=yes,top=20,left=20,scrollbars=yes,dependent=yes,alwaysRaised=yes');
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
			function allcheckbox(){
				for (var i=0;i<document.all["seleciona_curriculos"].elements.length;i++)	{
					var e = document.all["seleciona_curriculos"].elements[i];
					if (e.type=='checkbox') {
						e.checked = document.all["seleciona_curriculos"].allbox.checked;
					}
				}
			}
		</script>
		<script language="JavaScript" src="../includes/menuhorizontal.js"></script>
	</head>
	<body leftmargin="0" bottommargin="0" rightmargin="0" topmargin="0" marginheight="0" marginwidth="0" onMouseDown="escondemenu();">
		<?php require("../includes/menuhorizontal.php"); ?>
		<table class="tabela" width="100%">
		<FORM name="paginacao" action="curriculum_browser.php" method="post">
			<tr>
				<td class="label" width="10%" align="center"><input type="button" class="botao" onClick="javascript: apagar();" value="Apagar" style="width: 100%"></td>
				<td class="label" width="10%" align="center"><input type="button" class="botao" onClick="javascript: cabecalho();" value="Cabecalho" style="width: 100%"></td>
				<td class="label" width="60%">&nbsp;Busca:&nbsp;&nbsp;<input type="text" name="filtro" class="textfield" style="width: 85%" value="<?=$filtro?>">&nbsp;&nbsp;<input type="submit" value="OK" class="botao" style="width: 5%"></td>
				<input type="hidden" name="pagina" value="<?=$pagina?>">				
				<td class="label" width="10%"><input type="button" style="width: 100%" class="botao" name="back" value="<" onclick="mudapagina('back');" <?php if($pagina == 0 || $pagina == 1) echo("disabled");?>></td>
				<td class="label" width="10%"><input type="button" class="botao" style="width: 100%" name="next" value=">" onclick="mudapagina('next');" <?php if($limite + $qtd >= $eof) echo("disabled");?>></td>
			</tr>
		</form>
		</table>
		<table class="tabela" width="100%">
			<form name="seleciona_curriculos" action="" method="post">
			<tr>
				<td class="textfield" align="left" width="5%"><input type="checkbox" name="allbox" onClick="allcheckbox();"></td>
				<td class="textfield" align="center" width="30%"><b>Nome</b></td>
				<td class="textfield" align="center" width="15%"><b>Cidade</b></td>
				<td class="textfield" align="center" width="10%"><b>Estado</b></td>
				<td class="textfield" align="center" width="20%"><b>Escolaridade</b></td>
				<td class="textfield" align="center" width="20%"><b>Cargo</b></td>
			</tr>
			<?php while($curriculo = mysql_fetch_array($result, MYSQL_ASSOC)){ ?>
						<tr>
							<td class="textfield" align="left"><input name="<?=$curriculo['cd']?>" type="checkbox"></td>
							<td class="textfield" align="left"><a href="javascript: visualiza_curriculo('<?=$curriculo['cd']?>');"><b><?=$curriculo['nome']?></b></a></td>
							<td class="textfield" align="center"><?=$curriculo['cidade']?></td>
							<td class="textfield" align="center"><?=$curriculo['estado']?></td>
							<td class="textfield" align="center"><?=$curriculo['escolaridade']?></td>
							<td class="textfield" align="center"><?=$curriculo['cargo1']?></td>
						</tr>
			<?php } ?>
			</form>
		</table>
		<table class="tabela" width="100%">
		<FORM name="paginacao2" action="user_browser.php<?php if($modo == "editor") echo("?modo=editor"); ?>" method="post">
			<tr>
				<td class="label" width="10%" align="center"><input type="button" class="botao" onClick="javascript: apagar();" value="Apagar" style="width: 100%"></td>				
					<input type="hidden" name="pagina" value="<?=$pagina?>">
				<td class="label" align="center" width="30%">Currículos/Pagina:&nbsp;<input type="text" class="textfield" name="qtd" value="<?=$qtd?>" onBlur="mudapagina('');" size="3" maxlength="3" alt="Digite a quantidade de imagens por página a serem mostradas."></td>
				<td class="label" align="center" width="30%"><?=$eof?>&nbsp;Currículos cadastrados.</td>
				<td class="label" width="5%"><input type="button" style="width: 100%" class="botao" name="back" value="<" onclick="mudapagina('back');" <?php if($pagina == 0 || $pagina == 1) echo("disabled");?>></td>
				<td class="label" width="5%"><input type="button" class="botao" style="width: 100%" name="next" value=">" onclick="mudapagina('next');" <?php if($limite + $qtd >= $eof) echo("disabled");?>></td>
			</tr>
		</form>
		</table>
	</body>
</html>
<?php require("../../includes/desconectar_mysql.php"); ?>