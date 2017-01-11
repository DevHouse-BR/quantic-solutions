<?php

$nome = $_POST["nome"];
$email = $_POST["email"];
$website = $_POST["website"];
$endereco = $_POST["endereco"];
$numero = $_POST["numero"];
$complemento = $_POST["complemento"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];
$cep = $_POST["cep"];
$telefone = $_POST["telefone"];
$celular = $_POST["celular"];
$cargo1 = $_POST["cargo1"];
$cargo2 = $_POST["cargo2"];
$cargo3 = $_POST["cargo3"];
$pretensao_salarial = $_POST["pretensao_salarial"];
$ultima_empresa = $_POST["ultima_empresa"];
$ultima_funcao = $_POST["ultima_funcao"];
$ultimo_periodo = $_POST["ultimo_periodo"];
$penultima_empresa = $_POST["penultima_empresa"];
$penultimo_periodo = $_POST["penultimo_periodo"];
$resumo_qualificacoes = $_POST["resumo_qualificacoes"];
$experiencia_profissional = $_POST["experiencia_profissional"];
$ingles = $_POST["ingles"];
$nivel_ingles = $_POST["nivel_ingles"];
$espanhol = $_POST["espanhol"];
$nivel_espanhol = $_POST["nivel_espanhol"];
$outro_idioma = $_POST["outro_idioma"];
$nivel_outro_idioma = $_POST["nivel_outro_idioma"];
$escolaridade = $_POST["escolaridade"];
$instituicao = $_POST["instituicao"];
$curso = $_POST["curso"];
$situacao = $_POST["situacao"];
$inicio = $_POST["inicio"];
$termino = $_POST["termino"];
$cursos = $_POST["cursos"];
$sobre_voce = $_POST["sobre_voce"];

if ($ingles == true) $ingles = "s";
else $ingles = "n";
if ($espanhol == true) $espanhol = "s";
else $espanhol = "n";

$query .= "INSERT INTO curriculos (nome, email, website, endereco, numero, complemento, bairro, cidade, estado, cep, telefone, celular, ";
$query .= "cargo1, cargo2, cargo3, pretensao_salarial, ultima_empresa, ultima_funcao, ultimo_periodo, penultima_empresa, ";
$query .= "penultima_funcao, penultimo_periodo, resumo_qualificacoes, experiencia_profissional, ingles, nivel_ingles, espanhol, ";
$query .= "nivel_espanhol, outro_idioma, nivel_outro_idioma, escolaridade, instituicao, curso, situacao, inicio, termino, cursos, ";
$query .= "sobre_voce) VALUES ('";
$query .= $nome ."','";
$query .= $email ."','";
$query .= $website ."','";
$query .= $endereco ."','";
$query .= $numero ."','";
$query .= $complemento ."','";
$query .= $bairro ."','";
$query .= $cidade ."','";
$query .= $estado ."','";
$query .= $cep ."','";
$query .= $telefone ."','";
$query .= $celular ."','";
$query .= $cargo1 ."','";
$query .= $cargo2 ."','";
$query .= $cargo3 ."','";
$query .= $pretensao_salarial ."','";
$query .= $ultima_empresa ."','";
$query .= $ultima_funcao ."','";
$query .= $ultimo_periodo ."','";
$query .= $penultima_empresa ."','";
$query .= $penultima_funcao ."','";
$query .= $penultimo_periodo ."','";
$query .= $resumo_qualificacoes ."','";
$query .= $experiencia_profissional ."','";
$query .= $ingles ."','";
$query .= $nivel_ingles ."','";
$query .= $espanhol ."','";
$query .= $nivel_espanhol ."','";
$query .= $outro_idioma ."','";
$query .= $nivel_outro_idioma ."','";
$query .= $escolaridade ."','";
$query .= $instituicao ."','";
$query .= $curso ."','";
$query .= $situacao ."','";
$query .= $inicio ."','";
$query .= $termino ."','";
$query .= $cursos ."','";
$query .= $sobre_voce ."')";

require("includes/conectar_mysql.php");
	$result = mysql_query($query) or die("Erro ao atualizar registros no Banco de dados: " . mysql_error());
require("includes/desconectar_mysql.php");
?>
<html>
	<head>
		<title>Salvando as informações</title>
	</head>
	<body>
		<? if ($result == 1){ ?>
			<center><h4>Informações enviadas com sucesso...</h4></center>
		<? } ?>
	</body>
</html>