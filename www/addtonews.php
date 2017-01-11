<?php
$nome = $_GET["nome"];
$email = $_GET["email"];


$query = "INSERT INTO internautas (nome, email) VALUES ('";
$query .= $nome ."','";
$query .= $email ."')";

require("includes/conectar_mysql.php");
	$result = mysql_query($query) or die("Erro ao atualizar registros no Banco de dados: " . mysql_error());
require("includes/desconectar_mysql.php");
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