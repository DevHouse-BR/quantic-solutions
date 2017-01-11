<?php
$PERMISSAO_DE_ACESSO = "Administradores/Publicadores";
require("../includes/permissao_documento.php");

$modo = $_GET["modo"];
$pagina = $_POST["pagina"];
$qtd = $_POST["qtd"];
$filtro = trim($_POST["filtro"]);

if ($modo == "apagar"){
	require("../../includes/conectar_mysql.php");
	reset ($_POST); 
	while (list($chave, $valor) = each ($_POST)) {
		if (($chave != "allbox") && ($valor == "on")){
			$query = "DELETE FROM noticias WHERE (cd='" . $chave . "') LIMIT 1";
			$result = mysql_query($query) or die("Erro ao remover registros do Banco de dados: " . mysql_error());	
		}
	}
}

if ($filtro != ""){
	$filtro_sql = " WHERE titulo LIKE '%" . $filtro . "%' OR conteudo LIKE '%". $filtro . "%'" ;
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

if ($filtro != "") $result = mysql_query("SELECT cd, titulo, publicador_usuario, data_criacao FROM noticias" . $filtro_sql . $query_limit) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());	
else $result = mysql_query("SELECT cd, titulo, publicador_usuario, data_criacao FROM noticias order by data_criacao" . $query_limit) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());	

$query = "SELECT COUNT(*) FROM noticias";
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
			
			function nova(){
				window.open('noticias_form.php?modo=add', 'Noticia', 'width=610,height=212,status=no,resizable=no,top=20,left=100,dependent=yes,alwaysRaised=yes');
			}
			function cabecalho(){
				window.open('form_cabecalho.php', 'Noticia', 'width=610,height=212,status=no,resizable=no,top=20,left=100,dependent=yes,alwaysRaised=yes');
			}
			function apagar(){
				if (window.showModalDialog('../includes/confirmacao.html',['Confirme!','Deseja apagar as notícias selecionadas?','Sim','Não'],'dialogWidth:320px;dialogHeight:100px;status:no;') == "1"){
					document.all["seleciona_users"].action = "noticias_browser.php?modo=apagar";
					document.all["seleciona_users"].submit();
				}
			}
			function edita_noticia(codigo){
				window.open('noticias_form.php?modo=update&cd=' + codigo, 'Noticia', 'width=610,height=212,status=no,resizable=no,top=20,left=100,dependent=yes,alwaysRaised=yes');
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
		<FORM name="paginacao" action="noticias_browser.php<?php if($modo == "editor") echo("?modo=editor"); ?>" method="post">
			<tr>
				<td class="label" width="10%" align="center"><input type="button" class="botao" onClick="javascript: nova();" value="Nova" style="width: 100%"></td>
				<td class="label" width="10%" align="center"><input type="button" class="botao" onClick="javascript: apagar();" value="Apagar" style="width: 100%"></td>
				<td class="label" width="10%" align="center"><input type="button" class="botao" onClick="javascript: cabecalho();" value="Cabeçalho" style="width: 100%"></td>
				<td class="label">&nbsp;Busca:&nbsp;&nbsp;<input type="text" name="filtro" class="textfield" style="width: 85%" value="<?=$filtro?>">&nbsp;&nbsp;<input type="submit" value="OK" class="botao" style="width: 5%"></td>
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
				<td class="textfield" align="center"><b>Título</b></td>
				<td class="textfield" align="center"><b>Publicador</b></td>
				<td class="textfield" align="center"><b>Data Cria&ccedil;&atilde;o</b></td>
			</tr>
			<?php for($i = 0; $i < $qtd; $i++){
					$noticia = mysql_fetch_row($result); 
					if ($noticia[0] != ""){?>
						<tr>
							<td class="textfield" align="left"><input name="<?=$noticia[0]?>" type="checkbox"></td>
							<td class="textfield"><a href="javascript: edita_noticia('<?=$noticia[0]?>');"><b><?=$noticia[1]?></b></a></td>
							<td class="textfield"><?=$noticia[2]?></td>
							<td class="textfield"><?=$noticia[3]?></td>
						</tr>
			<?php	} 
				} ?>
			</form>
		</table>
		<table class="tabela" width="100%">
		<FORM name="paginacao2" action="noticias_browser.php<?php if($modo == "editor") echo("?modo=editor"); ?>" method="post">
			<tr>
				<td class="label" width="10%" align="center"><input type="button" class="botao" onClick="javascript: nova();" value="Nova" style="width: 100%"></td>
				<td class="label" width="10%" align="center"><input type="button" class="botao" onClick="javascript: apagar();" value="Apagar" style="width: 100%"></td>				
				<td class="label" width="10%" align="center"><input type="button" class="botao" onClick="javascript: cabecalho();" value="Cabeçalho" style="width: 100%"></td>
					<input type="hidden" name="pagina" value="<?=$pagina?>">
				<td class="label" align="center">Notícias/Pagina:&nbsp;<input type="text" class="textfield" name="qtd" value="<?=$qtd?>" onBlur="mudapagina2('');" size="3" maxlength="3" alt="Digite a quantidade de imagens por página a serem mostradas."></td>
				<td class="label" align="center"><?=$eof?>&nbsp;Notícias cadastradas.</td>
				<td class="label" width="5%"><input type="button" style="width: 100%" class="botao" name="back" value="<" onclick="mudapagina2('back');" <?php if($pagina == 0 || $pagina == 1) echo("disabled");?>></td>
				<td class="label" width="5%"><input type="button" class="botao" style="width: 100%" name="next" value=">" onclick="mudapagina2('next');" <?php if($limite + $qtd >= $eof) echo("disabled");?>></td>
			</tr>
		</form>
		</table>
	</body>
</html>
<?php require("../../includes/desconectar_mysql.php"); ?>