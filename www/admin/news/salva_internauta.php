<?php
$PERMISSAO_DE_ACESSO = "Administradores";
require("../includes/permissao_documento.php");

$modo = $_POST["modo"];
$nome = $_POST["nome"];
$email = $_POST["email"];


if ($modo == "add")	{
	$query = "INSERT INTO internautas (nome, email) VALUES ('";
	$query .= $nome ."','";
	$query .= $email ."')";
}
if ($modo == "update")
	{
	$query = "UPDATE internautas SET ";
	$query .= "nome='" . $nome ."', ";
	$query .= "email='" . $email ."'";
	$query .= " WHERE cd=" . $_POST["cd"];
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