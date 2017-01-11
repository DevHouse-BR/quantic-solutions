<?php

$empresa = $_POST["empresa"];
$contato = $_POST["contato"];
$cargo = $_POST["cargo"];
$email = $_POST["email"];
$endereco = $_POST["endereco"];
$numero = $_POST["numero"];
$complemento = $_POST["complemento"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];
$cep = $_POST["cep"];
$pais = $_POST["pais"];
$telefone = $_POST["telefone"];
$fax = $_POST["fax"];
$website = $_POST["website"];
$descricao_empresa = $_POST["descricao_empresa"];
$descricao_produtos = $_POST["descricao_produtos"];
$o_que_espera = $_POST["o_que_espera"];

$query .= "INSERT INTO empresas (empresa, contato, cargo, email, endereco, numero, complemento, bairro, cidade, estado, cep, pais, ";
$query .= "telefone, fax, website, descricao_empresa, descricao_produtos, o_que_espera) VALUES ('";
$query .= $empresa ."','";
$query .= $contato ."','";
$query .= $cargo ."','";
$query .= $email ."','";
$query .= $endereco ."','";
$query .= $numero ."','";
$query .= $complemento ."','";
$query .= $bairro ."','";
$query .= $cidade ."','";
$query .= $estado ."','";
$query .= $cep ."','";
$query .= $pais ."','";
$query .= $telefone ."','";
$query .= $fax ."','";
$query .= $website ."','";
$query .= $descricao_empresa ."','";
$query .= $descricao_produtos ."','";
$query .= $o_que_espera ."')";

require("includes/conectar_mysql.php");
	$result = mysql_query($query) or die("Erro ao atualizar registros no Banco de dados: " . mysql_error());
require("includes/desconectar_mysql.php");
?>
<html>
	<head>
		<title>Enviando as informações</title>
	</head>
	<body>
		<? if ($result == 1){ ?>
			<center><h3>Informações enviadas com sucesso...</h3></center>
		<? } ?>
	</body>
</html>