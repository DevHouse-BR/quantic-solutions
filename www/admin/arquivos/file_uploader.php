<?php 
// Nas versões anteriores a 4.1.0, $HTTP_POST_FILES deve ser usado ao invés de $_FILES. 
// Nas versões anteriores a 4.0.3, use copy() e is_uploaded_file() ao invés move_uploaded_file  
$CARACTERES_SEM_PERMISSAO = "ãõñÃÕÑáéíóúÁÉÍÓÚüÜçÇ@#$%&*ªº°?§' "; //caracteres que deverão ser substituidos
$TRADUZIDOS_PARA = "aonaonaeiouaeiouuucc_____________"; //por estes caracteres.

if ($_POST["modo"] == "update"){
	$query = "UPDATE arquivos SET ";
	$query .= "nome = '" . $_POST["nome"] ."', ";
	$query .= "icone = '" . $_POST["icone"] . "', ";
	$query .= "arquivo = '" . $_POST["arquivo"] . "', ";
	$query .= "tipo = '" . $_POST["tipo"] . "', ";
	$query .= "descricao = '" . $_POST["descricao"] . "'";
	$query .= " WHERE cd=" . $_POST["cd"];
	
	require("../../includes/conectar_mysql.php");
		$result = mysql_query($query) or die("Erro ao atualizar registros no Banco de dados: " . mysql_error());
	require("../../includes/desconectar_mysql.php");
	die("Informações alteradas com sucesso!");
}
$uploaddir = '../../downloads/'; 
$nome_do_arquivo = strtolower(strtr($_FILES['arquivo']['name'],$CARACTERES_SEM_PERMISSAO, $TRADUZIDOS_PARA));
print "<pre>";

if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploaddir . $nome_do_arquivo)) {
	print "O arquivo é valido e foi carregado com sucesso.\n";
} 
else {
	die("Erro ao enviar arquivo!\n");
}

$query = "INSERT INTO arquivos (nome, icone, arquivo, tamanho, tipo, descricao) VALUES ('";
$query .= $_POST["nome"] ."', '";
$query .= $_POST["icone"] ."', '";
$query .= "downloads/" . $nome_do_arquivo ."', '";
$query .= sizeformater($_FILES['arquivo']['size']) ."', '";
$query .= $_POST["tipo"] ."', '";
$query .= $_POST["descricao"] ."')";

require("../../includes/conectar_mysql.php");
	$result = mysql_query($query) or die("Erro ao atualizar registros no Banco de dados: " . mysql_error());
require("../../includes/desconectar_mysql.php");

function sizeformater($tam){
	if($tam >= 0 && $tam <= 1023){
		return $tam . " Bytes";
	}
	if($tam >= 1024 && $tam <= 1048575){
		return number_format($tam/1024,2) . " KB";
	}
	if($tam >= 1048576 && $tam <= 1073741824){
		return number_format($tam/1024/1024,2) . " MB";
	}
}
?>