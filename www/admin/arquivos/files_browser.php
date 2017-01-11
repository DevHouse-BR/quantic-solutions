<?php
$PERMISSAO_DE_ACESSO = "Administradores/Publicadores";
require("../includes/permissao_documento.php");

$modo = $_GET["modo"];
$pagina = $_POST["pagina"];
$qtd = $_POST["qtd"];
$filtro = trim($_POST["filtro"]);
$linha = $_POST["linha"];

if ($filtro != ""){
	$filtro_sql = " WHERE tipo = '" . $filtro . "'";
}
if ($pagina < 1 || $pagina == ""){
	$pagina = 1;
}
if ($qtd == ""){
	$qtd = 12;
}
if ($linha == ""){
	$linha = 4;
}

require("../../includes/conectar_mysql.php");

$limite = ($qtd * ($pagina -1));

$query_limit = " LIMIT " . $limite . "," . $qtd;


if ($filtro != "") $result = mysql_query("SELECT * FROM arquivos" . $filtro_sql . $query_limit) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());	
else $result = mysql_query("SELECT * FROM arquivos order by tipo" . $query_limit) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());	
$query = "SELECT COUNT(*) FROM arquivos";
if ($filtro != ""){
	$query .= $filtro_sql;
}
$tmp = mysql_fetch_row(mysql_query($query));
$eof = $tmp[0];
?>
<html>
	<head>
		<title>Arquivos Para Download</title>
		<style type="text/css">
			<!--
			@import url("../includes/browser.css");
			-->
		</style>
		<script language="JavaScript" type="text/javascript">
			function nova(){
				window.open('file_form.php?modo=add', 'Novoarquivo', 'width=410,height=235,status=no,resizable=no,top=20,left=20,dependent=yes,alwaysRaised=yes');
			}
			function edita_img(codigo){
				window.open('file_form.php?modo=update&cd=' + codigo, 'Edita_Imagem', 'width=410,height=235,status=no,resizable=yes,top=0,left=0,dependent=yes,alwaysRaised=yes,scrollbars=no');
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
		</script>
		<script language="JavaScript" src="../includes/menuhorizontal.js"></script>
	</head>
	<body bottommargin="0" leftmargin="0" rightmargin="0" topmargin="0" onMouseDown="escondemenu();">
		<?php require("../includes/menuhorizontal.php"); ?>
		<table class="tabela" width="100%">
		<FORM name="paginacao" action="files_browser.php" method="post">
			<tr>
				<td class="label" width="10%"><input type="button" class="botao" onClick="javascript: nova();" value="Novo" style="width: 100%;"></td>
					<input type="hidden" name="pagina" value="<?=$pagina?>">
				<td class="label" align="center">Filtro:&nbsp;
					<select name="filtro" class="textfield" onChange="mudapagina('');">
						<option value="">Todos os Tipos</option>
						<?php
							$resultado = mysql_query("SELECT DISTINCT tipo FROM arquivos");
							$opcoes = "";
							while($tipos = mysql_fetch_row($resultado)){
								$opcoes .= '<option value="' . $tipos[0] . '">' . $tipos[0] . '</option>';
							}
							echo($opcoes);
						?> 
					</select>
				</td>
				<td class="label" align="center">Arquivos/Pagina:&nbsp;<input type="text" class="textfield" name="qtd" value="<?=$qtd?>" onBlur="mudapagina('');" size="3" maxlength="3" alt="Digite a quantidade de imagens por página a serem mostradas."></td>
				<td class="label" align="center">Arquivos/Linha:&nbsp;<input type="text" class="textfield" name="linha" value="<?=$linha?>" onBlur="mudapagina('');" size="3" maxlength="3" alt="Digite a quantidade de imagens por linha a serem mostradas."></td>
				<td class="label" align="center"><?=$eof?>&nbsp;Arquivos cadastrados.</td>
				<td class="label" width="5%"><input type="button" style="width: 100%;" class="botao" name="back" value="<" onclick="mudapagina('back');" <?php if($pagina == 0 || $pagina == 1) echo("disabled");?>></td>
				<td class="label" width="5%"><input type="button" style="width: 100%;" class="botao" name="next" value=">" onclick="mudapagina('next');" <?php if($limite + $qtd >= $eof) echo("disabled");?>></td>				
			</tr>
		</form>
		</table>
		<table class="tabela" width="100%">
			<tr>
			<?php
				$j = 0; 
				for($i = 0; $i < $qtd; $i++){
					$arquivo = mysql_fetch_array($result, MYSQL_ASSOC); ?>
					<td class="textfield" align="center">
					<?php if($arquivo["icone"] != ""){ ?>
						<img border="0" src="<?="../../" . $arquivo["icone"]?>" style="cursor: hand;" onClick="edita_img('<?=$arquivo["cd"]?>');"><br>
						<b><?=$arquivo["nome"]?></b><br>
						<?=$arquivo["tamanho"]?><br>
						Tipo:&nbsp;<?=$arquivo["tipo"]?>
					<?php }
						else echo("&nbsp;");
					?>
					</td>
				<?php 
					$j++;
					if ($j == $linha){
						if ($i == ($qtd-1)) echo("</tr>");
						else echo("</tr><tr>");
						$j = 0;
					}
				} 
			?>
		</table>
		<table class="tabela" width="100%">
		<FORM name="paginacao2" action="files_browser.php" method="post">
			<tr>
				<td class="label" width="10%"><input type="button" class="botao" onClick="javascript: nova();" value="Novo" style="width: 100%;"></td>
					<input type="hidden" name="pagina" value="<?=$pagina?>">
				<td class="label" align="center">Filtro:&nbsp;
					<select name="filtro" class="textfield" onChange="mudapagina2('');">
						<option value="">Todos os Tipos</option>
						<?=$opcoes?> 
					</select>
				</td>
				<td class="label" align="center">Arquivos/Pagina:&nbsp;<input type="text" class="textfield" name="qtd" value="<?=$qtd?>" onBlur="mudapagina2('');" size="3" maxlength="3" alt="Digite a quantidade de arquivos por página a serem mostradas."></td>
				<td class="label" align="center">Arquivos/Linha:&nbsp;<input type="text" class="textfield" name="linha" value="<?=$linha?>" onBlur="mudapagina2('');" size="3" maxlength="3" alt="Digite a quantidade de arquivos por linha a serem mostradas."></td>
				<td class="label" align="center"><?=$eof?>&nbsp;Arquivos cadastrados.</td>
				<td class="label" width="5%"><input type="button" style="width: 100%;" class="botao" name="back" value="<" onclick="mudapagina2('back');" <?php if($pagina == 0 || $pagina == 1) echo("disabled");?>></td>
				<td class="label" width="5%"><input type="button" style="width: 100%;" class="botao" name="next" value=">" onclick="mudapagina2('next');" <?php if($limite + $qtd >= $eof) echo("disabled");?>></td>				
			</tr>
		</form>
		</table>
	</body>
</html>
<?php require("../../includes/desconectar_mysql.php"); ?>