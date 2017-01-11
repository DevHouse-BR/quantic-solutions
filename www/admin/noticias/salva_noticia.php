<?php
$PERMISSAO_DE_ACESSO = "Administradores/Publicadores";
require("../includes/permissao_documento.php");

$modo = $_POST["modo"];
$publicador_cd = $_POST["publicador_cd"];
$publicador = $_POST["publicador"];
$data_criacao = date('Y-m-d G:i:s');
$titulo = $_POST["titulo"];
$conteudo = $_POST["conteudo"];
$data_inicio = $_POST["data_inicio"];
$data_termino = $_POST["data_termino"];

$tmp = split("/", $data_inicio);
$data_inicio = $tmp[2] . "-" . $tmp[1] . "-" . $tmp[0];

$tmp = split("/", $data_termino);
$data_termino = $tmp[2] . "-" . $tmp[1] . "-" . $tmp[0];

if ($modo == "add")	{
	$query = "INSERT INTO noticias (publicador_cd, publicador_usuario, data_criacao, data_inicio, data_termino, titulo, conteudo) VALUES ('";
	$query .= $publicador_cd ."','";
	$query .= $publicador ."','";
	$query .= $data_criacao ."','";
	$query .= $data_inicio ."','";
	$query .= $data_termino ."','";
	$query .= $titulo ."','";
	$query .= $conteudo . "')";
}
if ($modo == "update")
	{
	$query = "UPDATE noticias SET ";
	$query .= "publicador_cd='" . $publicador_cd ."', ";
	$query .= "publicador_usuario='" . $publicador ."', ";
	$query .= "data_criacao='" . $data_criacao ."', ";
	$query .= "data_inicio='" . $data_inicio ."', ";
	$query .= "data_termino='" . $data_termino ."', ";
	$query .= "titulo='" . $titulo ."', ";
	$query .= "conteudo='" . $conteudo ."'";
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