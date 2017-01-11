<?php
$PERMISSAO_DE_ACESSO = "Administradores/Publicadores";
require("includes/permissao_documento.php");
if(substr_count($grupos_do_usuario, "Administradores") != 0) $admin = true;
if(substr_count($grupos_do_usuario, "Publicadores") != 0) $public = true;
?>
<html>
	<head>
		<title>Administra&ccedil;&atilde;o</title>
	</head>
	<body>
		<?php if ($admin) { ?>
		<p><a href="usuarios/user_browser.php" target="mainFrame">Usu&aacute;rios</a></p>
		<p><a href="grupos/grupo_browser.php" target="mainFrame">Grupos</a></p>
		<p><a href="empresa/empresa_browser.php" target="mainFrame">Empresa</a></p>
		<p><a href="curriculum/curriculum_browser.php" target="mainFrame">Currículos</a></p>
		<p><a href="aliancas/empresas_browser.php" target="mainFrame">Alianças</a></p>
		<p><a href="contato/contato.php" target="mainFrame">Contato</a></p>
		<p><a href="servicos/servicos_browser.php" target="mainFrame">Serviços</a></p>
		<p><a href="solucoes/solucoes_browser.php" target="mainFrame">Soluções</a></p>
		<? } 
		if ($admin || $public){ ?>
		<p><a href="img/img_browser.php" target="mainFrame">Imagens</a></p>
		<p><a href="noticias/noticias_browser.php" target="mainFrame">Notícias</a></p>
		<p><a href="principal/principal.php" target="mainFrame">Página Principal</a></p>
		<? } ?>
	</body>
</html>
