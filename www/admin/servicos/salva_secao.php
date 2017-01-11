<?php
$PERMISSAO_DE_ACESSO = "Administradores/Publicadores";
require("../includes/permissao_documento.php");

$modo = $_POST["modo"];
$secao = $_POST["secao"];
$conteudo = $_POST["conteudo"];
$ordem = $_POST["ordem"];
$atualizado = time();

if ($modo == "add")	{
	$query = "INSERT INTO servicos (secao, conteudo, ordem, atualizado) VALUES ('";
	$query .= $secao ."','";
	$query .= $conteudo ."','";
	$query .= $ordem ."','";
	$query .= $atualizado . "')";
}
if ($modo == "update")
	{
	$query = "UPDATE servicos SET ";
	$query .= "secao='" . $secao ."', ";
	$query .= "conteudo='" . $conteudo ."', ";
	$query .= "ordem='" . $ordem ."', ";
	$query .= "atualizado='" . $atualizado ."'";
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
					parent.window.location.reload();
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