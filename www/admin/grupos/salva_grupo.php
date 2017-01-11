<?php
$PERMISSAO_DE_ACESSO = "Administradores";
require("../includes/permissao_documento.php");

//$modo = $_POST["modo"];
$grupo = $_GET["grupo"];

//if ($modo == "add")	{
	$query = "INSERT INTO grupos (grupo) VALUES ('";
	$query .= $grupo ."')";
//}
/*if ($modo == "update")
	{
	$query = "UPDATE usuarios SET ";
	$query .= "usuario='" . $usuario ."', ";
	$query .= "senha='" . $senha ."', ";
	$query .= "email='" . $email ."', ";
	$query .= "telefone='" . $telefone ."', ";
	$query .= "nome_completo='" . $nome_completo ."', ";
	$query .= "departamento='" . $departamento ."', ";
	$query .= "lembrete='" . $lembrete ."', ";
	$query .= "senha_expira='" . $senha_expira ."', ";
	$query .= "expiracao_senha='" . $expiracao_senha ."', ";
	$query .= "ativo='" . $ativo ."'";
	$query .= " WHERE cd='" . $_POST["cd"] . "'";
}*/

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
<?php	mysql_close($link); ?>