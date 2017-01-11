<?php
$PERMISSAO_DE_ACESSO = "Administradores";
require("includes/permissao_documento.php");

$oque = $_GET["oque"];
$cd = $_GET["cd"];
require("../includes/conectar_mysql.php");

if ($oque == "arquivos"){
	$query = "SELECT arquivo FROM arquivos WHERE cd=" . $cd;
	$result = mysql_query($query) or die("Erro ao acessar registros do Banco de dados: " . mysql_error());;
	$arquivo = mysql_fetch_row($result);
	if(!unlink("../" . $arquivo[0])) die("Erro ao apagar o arquivo!");
}
if ($oque == "imagens"){
	$query = "SELECT caminho_img, caminho_thumb FROM imagens WHERE cd=" . $cd;
	$result = mysql_query($query) or die("Erro ao acessar registros do Banco de dados: " . mysql_error());;
	$arquivo = mysql_fetch_row($result);
	if(!unlink("../" . $arquivo[0])) die("Erro ao apagar o arquivo!");
	if(substr($arquivo[1], -3) != "gif"){
		if(!unlink("../" . $arquivo[1])) die("Erro ao apagar o arquivo!");
	}
}

require("../includes/conectar_mysql.php");
reset ($_POST);
$query = "DELETE FROM " . $oque . " WHERE (cd='" . $cd . "') LIMIT 1";
$result = mysql_query($query) or die("Erro ao remover registros do Banco de dados: " . mysql_error());	
require("../includes/conectar_mysql.php");

?>
<html>
	<head>
		<title>Salvando as informações</title>
		<? if ($result == 1){ ?>
			<script language="JavaScript" type="text/javascript">
				setTimeout("finaliza();",2000);
				function finaliza(){
					if (opener) opener.location = opener.location;
					if (parent) parent.location = parent.location;
					self.close();
				}
			</script>
		<? } ?>
	</head>
	<body>
		<? if ($result == 1){ ?>
			<center><h3>Operação realizada com sucesso...</h3></center>
		<? } ?>
	</body>
</html>