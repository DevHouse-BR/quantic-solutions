<?php
$PERMISSAO_DE_ACESSO = "Administradores";
require("../includes/permissao_documento.php");

$modo = $_POST["modo"];
$usuario = $_POST["usuario"];
$senha = $_POST["senha"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$nome_completo = $_POST["nome_completo"];
$departamento = $_POST["departamento"];
$lembrete = $_POST["lembrete"];
$senha_expira = $_POST["senha_expira"];
$ativo = $_POST["ativo"];
$grupos = $_POST["grupos"];

if ($senha_expira == true) $senha_expira = "s";
else $senha_expira = "n";
if ($ativo == true) $ativo = "s";
else $ativo = "n";

$tmp = split("/", $_POST["expiracao_senha"]);
$expiracao_senha = $tmp[2] . "-" . $tmp[1] . "-" . $tmp[0];


$query = "DELETE FROM grupos_usuarios WHERE (usuario='" . $usuario . "')";
require("../../includes/conectar_mysql.php");
$result = mysql_query($query) or die("Erro ao remover registros de grupos antigos " . mysql_error());
		
if ($grupos != ""){	
	$grupos = split("\r\n",$grupos);
	foreach($grupos as $valores){
		if ($valores != ""){
			$query = "INSERT INTO grupos_usuarios (usuario, grupo) VALUES ('" . $usuario . "', '" . $valores . "')";
			$result = mysql_query($query) or die("Erro ao atualizar registros no Banco de dados: " . mysql_error());
		}
	}
	require("../../includes/desconectar_mysql.php");
}

if ($modo == "add")	{
	$query = "INSERT INTO usuarios (usuario, senha, email, telefone, nome_completo, departamento, lembrete, senha_expira, expiracao_senha, ativo) VALUES ('";
	$query .= $usuario ."','";
	$query .= $senha ."','";
	$query .= $email ."','";
	$query .= $telefone ."','";
	$query .= $nome_completo ."','";
	$query .= $departamento ."','";
	$query .= $lembrete ."','";
	$query .= $senha_expira ."','";
	$query .= $expiracao_senha ."','";
	$query .= $ativo ."')";
}
if ($modo == "update")
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
}

require("../../includes/conectar_mysql.php");
	$result = mysql_query($query) or die("Erro ao atualizar registros no Banco de dados: " . mysql_error());
require("../../includes/desconectar_mysql.php");

if ($modo == "add") mail($email, "Informações Cadastrais Sistema On-Line Quantic Solutions", "Olá, " . $nome_completo . "\n\nVocê foi cadastrado(a) no Site da Quantic Solutions!\nPara acessá-la aponte seu navegador para:\n\nwww.quanticsolutions.com\n\nUsuário: " . $email . "\nSenha: " . $senha, "From: Quantic Solutions On-Line <site@quanticsolutions.com>");
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