<?php
$PERMISSAO_DE_ACESSO = "Administradores";
require("../includes/permissao_documento.php");

$modo = $_POST["modo"];
$nome = $_POST["nome"];
$cabecalho = $_POST["cabecalho"];
$ordem = $_POST["ordem"];
$etiqueta = $_POST["etiqueta"];
$introducao = $_POST["intro"];

if ($modo == "add")	{
	$query = "INSERT INTO solucoes (nome, cabecalho, ordem, etiqueta, introducao) VALUES ('";
	$query .= $nome ."','";
	$query .= $cabecalho ."','";
	$query .= $ordem ."','";
	$query .= $etiqueta ."','";
	$query .= $introducao . "')";
}
if ($modo == "update")
	{
	$query = "UPDATE solucoes SET ";
	$query .= "nome='" . $nome ."', ";
	$query .= "cabecalho='" . $cabecalho ."', ";
	$query .= "ordem='" . $ordem ."', ";
	$query .= "etiqueta='" . $etiqueta ."', ";
	$query .= "introducao='" . $introducao ."'";
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