<?php
$PERMISSAO_DE_ACESSO = "Administradores";
require("../includes/permissao_documento.php");

$modo = $_POST["modo"];
$cd_solucao = $_POST["cd_solucao"];
$nome_etapa = $_POST["nome_etapa"];
$conteudo = $_POST["conteudo"];
$ordem = $_POST["ordem"];

if ($modo == "add")	{
	$query = "INSERT INTO solucao_etapa (cd_solucao, nome_etapa, conteudo, ordem) VALUES ('";
	$query .= $cd_solucao ."','";
	$query .= $nome_etapa ."','";
	$query .= $conteudo ."','";
	$query .= $ordem . "')";
}
if ($modo == "update")
	{
	$query = "UPDATE solucao_etapa SET ";
	$query .= "nome_etapa='" . $nome_etapa ."', ";
	$query .= "conteudo='" . $conteudo ."', ";
	$query .= "ordem='" . $ordem ."'";
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