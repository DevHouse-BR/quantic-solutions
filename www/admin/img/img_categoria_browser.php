<?php
$modo =  $_GET["modo"];
$PERMISSAO_DE_ACESSO = "Administradores/Publicadores";
require("../includes/permissao_documento.php");
?>
<html>
	<head>
		<title>Upload de Imagens</title>
		<style type="text/css">
			<!--
			@import url("../includes/forms.css");
			-->
		</style>
		<script type="text/javascript" language="JavaScript">
			function validaform(){
				if(document.all["catform"].novacat.value != "") document.all["catform"].submit;
				else alert("Não foi infomado um nome para a categoria.");
			}
			function ok(){
				opener.location = opener.location;
				self.close();
			}
			function seleciona_categoria(categoria){
				opener.document.all["sendform"].categoria.value = categoria;
				self.close();
			}
			function atualiza(){
				opener.location = opener.location;
			}
		</script>
	</head>
	<body marginheight="0" marginwidth="0" leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0" onLoad="atualiza();">
		<table width="100%" border="0" height="100%">
			<form action="cria_categoria_imagem.php" method="post" name="catform">
			<tr>
				<td align="center" valign="middle">
					<table width="200" border="0" class="tabela">
						<tr>
							<td class="cell_title" colspan="2">Categorias</td>
						</tr>
						<?php
							if ($handle = opendir('../../imagens')) {
								while (false !== ($file = readdir($handle))) {
									if ($file != "." && $file != ".."){
										if (is_dir("../../imagens/" . $file)){ 
											if ($modo == "seleciona") echo("<tr><td colspan=\"2\" class=\"cell_center\"><a href=\"javascript: seleciona_categoria('$file')\">$file</a></td></tr>\n");
											else echo("<tr><td colspan=\"2\" class=\"cell_center\">$file</td></tr>\n");
										}
									}
								}
								closedir($handle);
							}
						?> 
						<tr>
							<td width="80%"><input type="text" name="novacat" class="textfield"></td>
							<td width="20%"><input name="Submit" class="botao" type="submit" value="Criar" style="width: 100%;"></td>
						</tr>
						<tr>
							<td colspan="2"><input type="button" class="botao" value="OK" onClick="ok();" style="width: 100%;"></td>
						</tr>
					</table>
				</td>
			</tr>
			</FORM>
		</table>	
	</body>
</html>
