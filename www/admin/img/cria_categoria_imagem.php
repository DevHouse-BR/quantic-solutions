<?php
$PERMISSAO_DE_ACESSO = "Administradores/Publicadores";
require("../includes/permissao_documento.php");

$caminhodefault = "../../imagens/";
$novodir = $_POST["novacat"];

if ($novodir != "") {
	if (mkdir ($caminhodefault . $novodir, 0777) && mkdir ($caminhodefault . $novodir . "/thumb", 0777)) echo("<html><head><title>Nova Categoria Criada!</title><script language='Javascript'>\n setTimeout('retorna()', 1000); \nfunction retorna(){ location = 'img_categoria_browser.php?modo=seleciona'; }</script></head><body><center><h1>OK!</h1><br><a href='Javascript: retorna()'>Voltar</a></center></body></html>");
	else echo("<html><head><title>Problemas ao Adicionar Categoria!</title><script language='Javascript'>function retorna(){ self.location = 'img_categoria_browser.php?modo=seleciona'; }</script></head><body>Problemas ao Adicionar Categoria!<br><a href='Javascript: retorna()'>Voltar</a></body></html>");
}	
?> 
