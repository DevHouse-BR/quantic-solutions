<?php
$PERMISSAO_DE_ACESSO = "Usuarios/Administradores";
require("includes/permissao_documento.php");

$usuario = $_POST["usuario"];
$senhadigitada = $_POST["senha"];
$novasenha = $_POST["novasenha"];
$expiracao_senha = date('Y-m-d', time()+(60*60*24*30));

require("../includes/conectar_mysql.php");
	$query = "SELECT cd, senha FROM usuarios WHERE (usuario='" . $usuario . "')";
	$result = mysql_query($query) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());
	$senha = mysql_fetch_row($result);
require("../includes/desconectar_mysql.php");

if (strcmp(trim($senha[1]), trim($senhadigitada)) != 0){
	header("Location: frm_alteracao_senha.php?status=erro1"); 
}
else{
$query = "UPDATE usuarios SET ";
$query .= "senha='" . $novasenha ."', ";
$query .= "expiracao_senha='" . $expiracao_senha ."'";
$query .= " WHERE cd='" . $senha[0] . "'";


require("../includes/conectar_mysql.php");
	$result = mysql_query($query) or die("Erro ao atualizar registros no Banco de dados: " . mysql_error());
require("../includes/desconectar_mysql.php");
?>
<html>
	<head>
		<title>Salvando as informações</title>
		<? if ($result == 1){ ?>
			<script language="JavaScript" type="text/javascript">
				setTimeout("finaliza();",2000);
				function finaliza(){
					self.location = "admin.php";
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
<? } ?>