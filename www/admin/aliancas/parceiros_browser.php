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
		if (($chave != "allbox") && ($valor == "on")){
			$query = "DELETE FROM parceiros WHERE (cd='" . $chave . "') LIMIT 1";
			$result = mysql_query($query) or die("Erro ao remover registros do Banco de dados: " . mysql_error());	
		}
	}
}
if ($filtro != ""){
	$filtro_sql = " WHERE nome LIKE '%" . $filtro . "%' or texto LIKE '%" . $filtro . "%'";
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

if ($filtro != "") $result = mysql_query("SELECT * FROM parceiros" . $filtro_sql . "order by nome" . $query_limit) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());	
else $result = mysql_query("SELECT * FROM parceiros order by nome" . $query_limit) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());	

$query = "SELECT COUNT(*) FROM parceiros";
if ($filtro != ""){
	$query .= $filtro_sql;
}
$tmp = mysql_fetch_row(mysql_query($query));

$eof = $tmp[0];

$limite = $qtd * ($pagina - 1);
?>
<html>
	<head>
		<title>Parceiros Cadastrados</title>
		<style type="text/css">
			<!--
			@import url("../includes/browser.css");
			-->
		</style>
		<script language="JavaScript" type="text/javascript">
			NS4 = (document.layers);
     		IE4 = (document.all);
			
			function apagar(){
				if (window.showModalDialog('../includes/confirmacao.html',['Confirme!','Deseja apagar os parceiros selecionados?','Sim','Não'],'dialogWidth:320px;dialogHeight:100px;status:no;') == "1"){
					document.all["seleciona_parceiros"].action = "parceiros_browser.php?modo=apagar";
					document.all["seleciona_parceiros"].submit();
				}
			}
			function edita_parceiro(codigo){
				window.open('parceiros_form.php?modo=update&cd=' + codigo, 'parceiro', 'width=595,height=212,status=yes,resizable=yes,top=20,left=20,scrollbars=yes,dependent=yes,alwaysRaised=yes');
			}
			function novo(){
				window.open('parceiros_form.php?modo=add', 'parceiro', 'width=595,height=212,status=yes,resizable=yes,top=20,left=20,scrollbars=yes,dependent=yes,alwaysRaised=yes');
			}
			function cabecalho(){
				if (window.showModalDialog('../includes/confirmacao.html',['Escolha!','Qual o cabeçalho que deseja editar?','Formulario','Parceiros'],'dialogWidth:320px;dialogHeight:100px;status:no;') == "1"){
					window.open('form_cabecalho_formulario.php', 'parceiro', 'width=595,height=205,status=yes,resizable=yes,top=20,left=20,scrollbars=yes,dependent=yes,alwaysRaised=yes');
				}
				else window.open('form_cabecalho_parceiros.php', 'parceiro', 'width=595,height=205,status=yes,resizable=yes,top=20,left=20,scrollbars=yes,dependent=yes,alwaysRaised=yes');
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
				pagina = document.all["paginacao"].pagina.value;
				if (direcao == "next") pagina++;
				else pagina--;
				if (direcao == "") pagina = 1;
				document.all["paginacao2"].pagina.value = pagina;
				document.all["paginacao2"].submit();
			}
			function allcheckbox(){
				for (var i=0;i<document.all["seleciona_parceiros"].elements.length;i++)	{
					var e = document.all["seleciona_parceiros"].elements[i];
					if (e.type=='checkbox') {
						e.checked = document.all["seleciona_parceiros"].allbox.checked;
					}
				}
			}
		</script>
		<script language="JavaScript" src="../includes/menuhorizontal.js"></script>
	</head>
	<body leftmargin="0" bottommargin="0" rightmargin="0" topmargin="0" marginheight="0" marginwidth="0" onMouseDown="escondemenu();">
		<?php require("../includes/menuhorizontal.php"); ?>
		<table class="tabela" width="100%">
		<FORM name="paginacao" action="parceiros_browser.php" method="post">
			<tr>
				<td class="label" width="10%" align="center"><input type="button" class="botao" onClick="javascript: apagar();" value="Apagar" style="width: 100%"></td>
				<td class="label" width="10%" align="center"><input type="button" class="botao" onClick="javascript: novo();" value="Novo" style="width: 100%"></td>				
				<td class="label" width="10%" align="center"><input type="button" class="botao" onClick="javascript: cabecalho();" value="Cabeçalho" style="width: 100%"></td>
				<td class="label" width="60%">&nbsp;Busca:&nbsp;&nbsp;<input type="text" name="filtro" class="textfield" style="width: 85%" value="<?=$filtro?>">&nbsp;&nbsp;<input type="submit" value="OK" class="botao" style="width: 5%"></td>
				<input type="hidden" name="pagina" value="<?=$pagina?>">				
				<td class="label" width="5%"><input type="button" style="width: 100%" class="botao" name="back" value="<" onclick="mudapagina('back');" <?php if($pagina == 0 || $pagina == 1) echo("disabled");?>></td>
				<td class="label" width="5%"><input type="button" class="botao" style="width: 100%" name="next" value=">" onclick="mudapagina('next');" <?php if($limite + $qtd >= $eof) echo("disabled");?>></td>
			</tr>
		</form>
		</table>
		<table class="tabela" width="100%">
			<form name="seleciona_parceiros" action="" method="post">
			<tr>
				<td class="textfield" align="left" width="5%"><input type="checkbox" name="allbox" onClick="allcheckbox();"></td>
				<td class="textfield" align="center" width="25%"><b>Nome</b></td>
				<td class="textfield" align="center" width="20%"><b>Link</b></td>
				<td class="textfield" align="center" width="15%"><b>Imagem</b></td>
			</tr>
			<?php while($parceiro = mysql_fetch_array($result, MYSQL_ASSOC)){ ?>
						<tr>
							<td class="textfield" align="left"><input name="<?=$parceiro['cd']?>" type="checkbox"></td>
							<td class="textfield" align="left"><a href="javascript: edita_parceiro('<?=$parceiro['cd']?>');"><b><?=$parceiro['nome']?></b></a></td>
							<td class="textfield" align="center"><?=$parceiro['link']?></td>
							<td class="textfield" align="center"><?=$parceiro['imagem']?></td>
						</tr>
			<?php } ?>
			</form>
		</table>
		<table class="tabela" width="100%">
		<FORM name="paginacao2" action="parceiros_browser.php<?php if($modo == "editor") echo("?modo=editor"); ?>" method="post">
			<tr>
				<td class="label" width="10%" align="center"><input type="button" class="botao" onClick="javascript: apagar();" value="Apagar" style="width: 100%"></td>				
				<td class="label" width="10%" align="center"><input type="button" class="botao" onClick="javascript: novo();" value="Novo" style="width: 100%"></td>				
				<td class="label" width="10%" align="center"><input type="button" class="botao" onClick="javascript: cabecalho();" value="Cabeçalho" style="width: 100%"></td>				
					<input type="hidden" name="pagina" value="<?=$pagina?>">
				<td class="label" align="center" width="30%">Parceiros/Pagina:&nbsp;<input type="text" class="textfield" name="qtd" value="<?=$qtd?>" onBlur="mudapagina2('');" size="3" maxlength="3" alt="Digite a quantidade de imagens por página a serem mostradas."></td>
				<td class="label" align="center" width="30%"><?=$eof?>&nbsp;Parceiros cadastrados.</td>
				<td class="label" width="5%"><input type="button" style="width: 100%" class="botao" name="back" value="<" onclick="mudapagina2('back');" <?php if($pagina == 0 || $pagina == 1) echo("disabled");?>></td>
				<td class="label" width="5%"><input type="button" class="botao" style="width: 100%" name="next" value=">" onclick="mudapagina2('next');" <?php if($limite + $qtd >= $eof) echo("disabled");?>></td>
			</tr>
		</form>
		</table>
	</body>
</html>
<?php require("../../includes/desconectar_mysql.php"); ?>