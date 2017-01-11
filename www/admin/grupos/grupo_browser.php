<?php
$PERMISSAO_DE_ACESSO = "Administradores";
require("../includes/permissao_documento.php");

$modo = $_GET["modo"];
$pagina = $_POST["pagina"];
$qtd = $_POST["qtd"];

if ($pagina < 1 || $pagina == ""){
	$pagina = 1;
}
if ($qtd == ""){
	$qtd = 14;
}
if ($modo == "apagar"){
	require("../../includes/conectar_mysql.php");
	reset ($_POST); 
	while (list($chave, $valor) = each ($_POST)) {
		if (($chave != "1") && ($chave != "2") && ($chave != "3") && ($valor == "on")){
			$tmp = mysql_fetch_row(mysql_query("SELECT grupo from grupos WHERE (cd='" . $chave . "')"));
			$nomegrupo = $tmp[0];
			$query = "DELETE FROM grupos_usuarios WHERE (grupo='" . $nomegrupo . "')";
			$result = mysql_query($query) or die("Erro ao remover registros do Banco de dados: " . mysql_error());
			$query = "DELETE FROM grupos WHERE (cd='" . $chave . "') LIMIT 1";
			$result = mysql_query($query) or die("Erro ao remover registros do Banco de dados: " . mysql_error());	
		}
	}
}
require("../../includes/conectar_mysql.php");

$limite = ($qtd * ($pagina -1));
$query_limit = " LIMIT " . $limite . "," . $qtd;

$result = mysql_query("SELECT cd, grupo FROM grupos order by grupo" . $query_limit) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());	

$tmp = mysql_fetch_row(mysql_query("SELECT COUNT(*) FROM grupos"));
$eof = $tmp[0];

$limite = $qtd * ($pagina - 1);
?>
<html>
	<head>
		<title>Grupos de Usuários do Sistema</title>
		<style type="text/css">
			<!--
			@import url("../includes/browser.css");
			-->
		</style>
		<script language="JavaScript" type="text/javascript">
			function novo(){
				window.open('salva_grupo.php?grupo=' + document.all["grupo"].value, 'Grupo', 'width=200,height=100,status=no,resizable=no,top=80,left=100,dependent=yes,alwaysRaised=yes');
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
			function apagar(){
				if (window.showModalDialog('../includes/confirmacao.html',['Confirme!','Deseja apagar os grupos selecionados?','Sim','Não'],'dialogWidth:320px;dialogHeight:100px;status:no;') == "1"){
					document.all["seleciona_grupos"].action = "grupo_browser.php?modo=apagar";
					document.all["seleciona_grupos"].submit();
				}
			}
		<?php
			if($modo == "selecionar"){ ?>
			function seleciona_grupo(grupo){
				var txt = opener.document.all["form_user"].grupos;
				if (txt.value == "") txt.value = grupo;
				else {
					if (txt.value.indexOf(grupo) >= 0 ){
						alert("O usuário já faz parte deste grupo.");
						return;
					}
					else txt.value += "\n" + grupo;
				}
				self.close();
			}
		<?php } ?>
		</script>
		<script language="JavaScript" src="../includes/menuhorizontal.js"></script>
	</head>
	<body leftmargin="0" bottommargin="0" rightmargin="0" topmargin="0" marginheight="0" marginwidth="0" onMouseDown="escondemenu();">
		<?php require("../includes/menuhorizontal.php"); ?>
		<table class="tabela" width="100%" border="0">
			<tr>
				<td width="40%" class="label"><input type="text" class="textfield" style="width: 78%;" id="grupo" name="grupo" maxlength="100">&nbsp;&nbsp;<input type="button" onClick="novo();" class="botao" style="width: 19%;" value="Novo"></td>
					<FORM name="paginacao" action="grupo_browser.php<?php if($modo == "selecionar") echo("?modo=selecionar"); ?>" method="post">
					<input type="hidden" name="pagina" value="<?=$pagina?>">
				<td class="label" width="10%"><input type="button" class="botao" name="back" value="<" onclick="mudapagina('back');" <?php if($pagina == 0 || $pagina == 1) echo("disabled");?> style="width: 100%"></td>
				<td class="label" width="10%"><input type="button" class="botao" name="next" value=">" onclick="mudapagina('next');" <?php if($limite + $qtd >= $eof) echo("disabled");?> style="width: 100%"></td>
				<td class="label" align="left" width="20%">Grupos/Pagina:&nbsp;<input type="text" class="textfield" name="qtd" value="<?=$qtd?>" onBlur="mudapagina('');" size="3" maxlength="3" alt="Digite a quantidade de imagens por página a serem mostradas."></td>
				<?php if($modo != "selecionar") echo("<td class=\"label\" align=\"center\" width=\"20%\">" . $eof . "&nbsp;Grupos cadastrados.</td>");?>
			</tr>
					</form>
		</table>
		<table class="tabela" width="100%">
			<form name="seleciona_grupos" action="" method="post">
			<tr>
				<?php if($modo != "selecionar") { ?>
				<td class="textfield" align="center" width="60"><b>Selecionar</b></td>
				<?php } ?>
				<td class="textfield" align="center"><b>Grupos</b></td>
			</tr>
			<?php for($i = 0; $i < $qtd; $i++){
					$grupo = mysql_fetch_row($result); 
					if ($grupo[0] != ""){?>
						<tr>
						<?php if($modo == "selecionar") { ?>
							<td class="textfield" align="center"><a href="javascript: seleciona_grupo('<?=$grupo[1]?>');"><b><?=$grupo[1]?></b></a></td>
						<?php } 
						else {?>
							<td class="textfield" align="center"><input name="<?=$grupo[0]?>" type="checkbox"></td>
							<td class="textfield" align="center"><b><?=$grupo[1]?></b></td>
						<?php } ?>
						</tr>
			<?php	} 
				} ?>
			</form>
		</table>
		<table class="tabela" width="100%" border="0">
			<tr>
				<td class="label" width="10%" align="center"><input type="button" class="botao" onClick="javascript: apagar();" value="Apagar" style="width: 100%"></td>
					<FORM name="paginacao2" action="grupo_browser.php<?php if($modo == "selecionar") echo("?modo=selecionar"); ?>" method="post">
					<input type="hidden" name="pagina" value="<?=$pagina?>">
				<td class="label" width="10%"><input type="button" class="botao" name="back" value="<" onclick="mudapagina2('back');" <?php if($pagina == 0 || $pagina == 1) echo("disabled");?> style="width: 100%"></td>
				<td class="label" width="10%"><input type="button" class="botao" name="next" value=">" onclick="mudapagina2('next');" <?php if($limite + $qtd >= $eof) echo("disabled");?> style="width: 100%"></td>
				<td class="label" align="left" width="20%">Grupos/Pagina:&nbsp;<input type="text" class="textfield" name="qtd" value="<?=$qtd?>" onBlur="mudapagina2('');" size="3" maxlength="3" alt="Digite a quantidade de imagens por página a serem mostradas."></td>
				<?php if($modo != "selecionar") echo("<td class=\"label\" align=\"center\" width=\"60%\">" . $eof . "&nbsp;Grupos cadastrados.</td>");?>
			</tr>
					</form>
		</table>
	</body>
</html>
<?php require("../../includes/desconectar_mysql.php"); ?>