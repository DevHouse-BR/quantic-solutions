<?php
$PERMISSAO_DE_ACESSO = "Administradores";
require("../includes/permissao_documento.php");

$modo = $_POST["modo"];
$nome = $_POST["nome"];
$imagem = $_POST["imagem"];
$texto = $_POST["texto"];
$link = $_POST["link"];


if ($modo == "add")	{
	$query = "INSERT INTO parceiros (nome, imagem, texto, link) VALUES ('";
	$query .= $nome ."','";
	$query .= $imagem ."','";
	$query .= $texto ."','";
	$query .= $link ."')";
}
if ($modo == "update")
	{
	$query = "UPDATE parceiros SET ";
	$query .= "nome='" . $nome ."', ";
	$query .= "imagem='" . $imagem ."', ";
	$query .= "texto='" . $texto ."', ";
	$query .= "link='" . $link ."'";
	$query .= " WHERE cd='" . $_POST["cd"] . "'";
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