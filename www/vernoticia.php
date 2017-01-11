<?php
$cd = $_GET["cd"];

require("includes/conectar_mysql.php");

$result = mysql_query("SELECT titulo, conteudo FROM noticias WHERE cd='" . $cd . "'")or die("Erro ao acessar registros no Banco de dados: " . mysql_error());	
$noticia = mysql_fetch_array($result, MYSQL_ASSOC);
require("includes/desconectar_mysql.php");
?>
<html>
<head>
	<title>Notícias</title>
</head>
<style type="text/css">
<!--
.campotxt {
	font-family: Helvetica;
	font-size: 11px;
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
<body>
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
<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td align="center" valign="top"> 
      <table width="80%">
			<tr>
				<td align="center" class="campotxt"><b><?=$noticia['titulo']?></b></td>
			</tr>
			<tr>
				<td align="left" class="campotxt"><?=$noticia['conteudo']?></td>
			</tr>
		</table>
    </td>
  </tr>
</table>
<br>
<br>
<?php
if ($eof > 1){ ?>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td align="center" valign="top"> 
      <table class="campotxt" cellpadding="2" cellspacing="2">
	  		<tr>
				<td colspan="2" bgcolor="#000000" style="color: white;" align="center"><b>Mais Notícias</b></td>
			</tr>
			<?php for($i = 0; $i < $qtd; $i++){
					$noticia = mysql_fetch_array($result, MYSQL_ASSOC); 
					if ($noticia['cd'] != $cd){?>
						<tr>
							<td align="right"><a href="javascript: location = 'vernoticia.php?cd=<?=$noticia['cd']?>';"><b><?=formatadata($noticia['data_criacao'])?></b></a></td>
							<td align="left"><?=$noticia['titulo']?></td>
						</tr>
			<?php }
				 } ?>
		</table>
	</td>
  </tr>
</table>
<? } ?>
</body>
</html>
