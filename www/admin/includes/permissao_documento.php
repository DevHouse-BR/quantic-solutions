<?php
$grupos_do_usuario = $_COOKIE["grupos"];

if (empty($grupos_do_usuario)){
	header("Location: index.php"); 
}
$grupos_com_permissao = split("/",$PERMISSAO_DE_ACESSO);

$i = 0;
foreach ($grupos_com_permissao as $valor){
	if(substr_count($grupos_do_usuario, $valor) != 0) $i++;
}
if($i == 0) die("Você não tem permissão de acesso a este documento.");
?>