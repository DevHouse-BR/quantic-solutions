<?php
$pagina = $_POST["pagina"];
$qtd = $_POST["qtd"];
$filtro = trim($_POST["filtro"]);

if ($filtro != ""){
	$filtro_sql = " WHERE empresa LIKE '%" . $filtro . "%' or contato LIKE '%" . $filtro . "%'";
}
if ($pagina < 1 || $pagina == ""){
	$pagina = 1;
}
if ($qtd == ""){
	$qtd = 20;
}


require("includes/conectar_mysql.php");

$limite = ($qtd * ($pagina -1));
$query_limit = " LIMIT " . $limite . "," . $qtd;

if ($filtro != "") $result = mysql_query("SELECT cd, data_criacao, titulo FROM noticias" . $filtro_sql . "order by data_criacao DESC" . $query_limit) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());	
else $result = mysql_query("SELECT cd, data_criacao, titulo FROM noticias order by data_criacao DESC" . $query_limit) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());	

$query = "SELECT COUNT(*) FROM noticias";
if ($filtro != ""){
	$query .= $filtro_sql;
}
$tmp = mysql_fetch_row(mysql_query($query));

$eof = $tmp[0];

$limite = $qtd * ($pagina - 1);


require("includes/desconectar_mysql.php");
require("includes/funcao_data.php");
?>
<html>
<head>
	<title>Notícias</title>
</head>
<style type="text/css">
<!--
.campotxt {
	font-family: Helvetica;
	font-size: 12px;
}
 BODY {
	scrollbar-arrow-color:#FFFFFF;
	scrollbar-track-color:#FFFFFF;
	scrollbar-shadow-color:#FFFFFF;
	scrollbar-face-color:#767877;
	scrollbar-highlight-color:#FFFFFF;
	scrollbar-darkshadow-color:#FFFFFF;
	scrollbar-3dlight-color:#FFFFFF;
 }
 a:link {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: bold;
	color: #E8A823;
	text-decoration: none;
}
a:visited {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: bold;
	color: #E8A823;
	text-decoration: none;
}
a:hover {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: bold;
	color: #E4824C;
	text-decoration: underline;
}
a:active {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: bold;
	color: #E4824C;
	text-decoration: none;
}
-->
</style>
<link href="includes/quantic.css" rel="stylesheet" type="text/css">
<script language="JavaScript">
	function mudapagina(direcao){
		var pagina = 0;
		pagina = document.all["paginacao"].pagina.value;
		if (direcao == "next") pagina++;
		else pagina--;
		if (direcao == "") pagina = 1;
		document.all["paginacao"].pagina.value = pagina;
		document.all["paginacao"].submit();
	}
</script>
<body>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
	<tr>
		<td align="center" valign="top">
			<table width="80%">
				<tr>
					<td class="conteudo">
						<?php
							require("includes/conectar_mysql.php");
								$query = "SELECT parametro FROM parametros WHERE nome='cabecalho_noticias'";
								$result2 = mysql_query($query) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());
								$cabecalho = mysql_fetch_array($result2, MYSQL_ASSOC);
								echo($cabecalho["parametro"]);	
							require("includes/desconectar_mysql.php");
						?>
					</td>
				</tr>
			</table>
		</td>
	</tr>
  <tr>
    <td align="center" valign="top"> 
      <table width="90%" class="campotxt" cellpadding="2" cellspacing="2" border="0">
			<?php for($i = 0; $i < $qtd; $i++){
					$noticia = mysql_fetch_array($result, MYSQL_ASSOC); ?>
						<tr>
							<td valign="top" align="right" width="30%"><a href="javascript: location = 'vernoticia.php?cd=<?=$noticia['cd']?>';"><b><?=formatadata($noticia['data_criacao'])?></b></a></td>
							<td align="left" width="70%"><font size="1"><?=$noticia['titulo']?></font></td>
						</tr>
			<?php } ?>
		</table>
		<?php /*<table width="90%">
			<tr>
				<FORM name="paginacao" action="noticias.php" method="post">
				<input type="hidden" name="pagina" value="<?=$pagina?>">				
				<td class="label" width="5%"><input type="button" style="width: 100%" class="botao" name="back" value="<" onclick="mudapagina('back');" <?php if($pagina == 0 || $pagina == 1) echo("disabled");?>></td>
				<td class="label" width="5%"><input type="button" class="botao" style="width: 100%" name="next" value=">" onclick="mudapagina('next');" <?php if($limite + $qtd >= $eof) echo("disabled");?>></td>
				</form>
			</tr>
		</table>*/ ?>
    </td>
  </tr>
</table>

</body>
</html>
