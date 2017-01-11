<?php
$PERMISSAO_DE_ACESSO = "Administradores/Publicadores";
require("../includes/permissao_documento.php");

$modo = $_POST["modo"];
$vaga = $_POST["vaga"];
$descricao = $_POST["descricao"];
$ativo = $_POST["ativo"];

if ($ativo == true) $ativo = "s";
else $ativo = "n";


if ($modo == "add")	{
	$query = "INSERT INTO oportunidades (vaga, descricao, ativo) VALUES ('";
	$query .= $vaga ."', '";
	$query .= $descricao ."', '";
	$query .= $ativo . "')";
}
if ($modo == "update")
	{
	$query = "UPDATE oportunidades SET ";
	$query .= "vaga='" . $vaga ."', ";
	$query .= "descricao='" . $descricao ."', ";
	$query .= "ativo='" . $ativo ."'";
	$query .= " WHERE (cd='" . $_POST["cd"] . "')";
}

require("../../includes/conectar_mysql.php");
	$result = mysql_query($query) or die("Erro ao atualizar registros no Banco de dados: " . mysql_error());
require("../../includes/desconectar_mysql.php");
?>
<html>
	<head>
		<title>Salvando as informações</title>
		<? if ($result == 1){ ?>
			<script language="JavaScript" type="text/javascript">
				setTimeout("finaliza();",2000);
				function finaliza(){
					opener.location = opener.location;
					self.close();
				}
			</script>
		<? } ?>
	</head>
	<body>
		<? if ($result == 1){ ?>
			<center><h3>Informações gravadas com sucesso...</h3></center>
		<? } ?>
	</body>
</html>