<?php
$PERMISSAO_DE_ACESSO = "Administradores";
require("../includes/permissao_documento.php");
require("../../includes/conectar_mysql.php");

	if ($_POST["modo"] == "update"){
		$query = "UPDATE pgprincipal SET ";
		$query .= "comercial1='" . $_POST["comercial1"] ."', ";
		$query .= "comercial2='" . $_POST["comercial2"] ."', ";
		$query .= "paralelosp1='" . $_POST["paralelosp1"] ."', ";
		$query .= "paralelosp2='" . $_POST["paralelosp2"] ."', ";
		$query .= "paralelorj1='" . $_POST["paralelorj1"] ."', ";
		$query .= "paralelorj2='" . $_POST["paralelorj2"] ."', ";
		$query .= "turismo1='" . $_POST["turismo1"] ."', ";
		$query .= "turismo2='" . $_POST["turismo2"] ."', ";
		$query .= "bovespa1='" . $_POST["bovespa1"] ."', ";
		$query .= "bovespa2='" . $_POST["bovespa2"] ."', ";
		$query .= "dowjones1='" . $_POST["dowjones1"] ."', ";
		$query .= "dowjones2='" . $_POST["dowjones2"] ."', ";
		$query .= "merval1='" . $_POST["merval1"] ."', ";
		$query .= "merval2='" . $_POST["merval2"] ."', ";
		$query .= "nasdaq1='" . $_POST["nasdaq1"] ."', ";
		$query .= "nasdaq2='" . $_POST["nasdaq2"] ."', ";
		$query .= "sp5001='" . $_POST["sp5001"] ."', ";
		$query .= "sp5002='" . $_POST["sp5002"] ."', ";
		$query .= "conteudo='" . $_POST["conteudo"] ."', ";
		$query .= "atualizado=" . time() .", ";
		$query .= "fonte='" . $_POST["fonte"] . "'";
		$result = mysql_query($query) or die("Erro ao gravar registros no Banco de dados: " . mysql_error());
		if($result) $notificacao = "Dados Gravados com sucesso!";
	}

	$query = "SELECT * FROM pgprincipal";
	$result = mysql_query($query) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());
	$pgprincipal = mysql_fetch_array($result, MYSQL_ASSOC);	
?>
<html>
	<head>
		<title>Cadastro de Notícia</title>
		<style type="text/css">
			<!--
			@import url(../includes/forms.css);
			-->
		</style>
		<script language="JavaScript">
		<?php if ($_POST["modo"] == "update") echo("alert('". $notificacao . "');"); ?>
			function editaconteudo(){
				window.open('../../editor.php', 'Editor', 'width=750,height=400,status=no,resizable=no,top=20,left=20,dependent=yes,alwaysRaised=yes');
			}
		</script>
		<script language="JavaScript" src="../includes/menuhorizontal.js"></script>
	</head>
	<body leftmargin="0" bottommargin="0" rightmargin="0" topmargin="0" marginheight="0" marginwidth="0" onMouseDown="escondemenu();">
		<table width="100%">
			<tr>
				<td align="center">
					<?php require("../includes/menuhorizontal.php"); ?>
					<table class="tabela_form" width="100%">
					<form name="frm1" method="post" action="principal.php">
						<tr> 
							<td colspan="3" style="border: 1px solid #FFFFFF; text-align: center;"><b>Conteúdo da Página Principal</b></td>
						</tr>
						<tr> 
						  <td class="label">Texto<br><br><br><br><input type="button" value="Editar Conteúdo" name="edita_conteudo" class="botao" onClick="javascript: editaconteudo();"></td>
						  <td class="cell" colspan="2">
								<textarea name="conteudo" id="conteudo" class="textarea" rows="5" style="width: 440;"><?=$pgprincipal['conteudo']?></textarea>
							</td>
						</tr>
						<tr> 
							<td colspan="3" style="border: 1px solid #FFFFFF; text-align: center;"><b>Cotações</b></td>
						</tr>
						<tr> 
							<td class="label" width="25%">D. Comercial</td>
							<td class="cell" width="37%">
									<input type="text" name="comercial1" class="textfield" value="<?=$pgprincipal['comercial1']?>" maxlength="15">
							</td>
							<td class="cell" width="37%">
									<input type="text" name="comercial2" class="textfield" value="<?=$pgprincipal['comercial2']?>" maxlength="15">
							</td>
						</tr>
						<tr> 
							<td class="label" width="25%">D. Paralelo (SP)</td>
							<td class="cell" width="37%">
									<input type="text" name="paralelosp1" class="textfield" value="<?=$pgprincipal['paralelosp1']?>" maxlength="15">
							</td>
							<td class="cell" width="37%">
									<input type="text" name="paralelosp2" class="textfield" value="<?=$pgprincipal['paralelosp2']?>" maxlength="15">
							</td>
						</tr>
						<tr> 
							<td class="label" width="25%">D. Paralelo (RJ)</td>
							<td class="cell" width="37%">
									<input type="text" name="paralelorj1" class="textfield" value="<?=$pgprincipal['paralelorj1']?>" maxlength="15">
							</td>
							<td class="cell" width="37%">
									<input type="text" name="paralelorj2" class="textfield" value="<?=$pgprincipal['paralelorj2']?>" maxlength="15">
							</td>
						</tr>
						<tr> 
							<td class="label" width="25%">D. Turismo</td>
							<td class="cell" width="37%">
									<input type="text" name="turismo1" class="textfield" value="<?=$pgprincipal['turismo1']?>" maxlength="15">
							</td>
							<td class="cell" width="37%">
									<input type="text" name="turismo2" class="textfield" value="<?=$pgprincipal['turismo2']?>" maxlength="15">
							</td>
						</tr>
						<tr> 
							<td class="label" width="25%">Bovespa</td>
							<td class="cell" width="37%">
									<input type="text" name="bovespa1" class="textfield" value="<?=$pgprincipal['bovespa1']?>" maxlength="15">
							</td>
							<td class="cell" width="37%">
									<input type="text" name="bovespa2" class="textfield" value="<?=$pgprincipal['bovespa2']?>" maxlength="15">
							</td>
						</tr>
						<tr> 
							<td class="label" width="25%">DowJones</td>
							<td class="cell" width="37%">
									<input type="text" name="dowjones1" class="textfield" value="<?=$pgprincipal['dowjones1']?>" maxlength="15">
							</td>
							<td class="cell" width="37%">
									<input type="text" name="dowjones2" class="textfield" value="<?=$pgprincipal['dowjones2']?>" maxlength="15">
							</td>
						</tr>
						<tr> 
							<td class="label" width="25%">Merval</td>
							<td class="cell" width="37%">
									<input type="text" name="merval1" class="textfield" value="<?=$pgprincipal['merval1']?>" maxlength="15">
							</td>
							<td class="cell" width="37%">
									<input type="text" name="merval2" class="textfield" value="<?=$pgprincipal['merval2']?>" maxlength="15">
							</td>
						</tr>
						<tr> 
							<td class="label" width="25%">Nasdaq</td>
							<td class="cell" width="37%">
									<input type="text" name="nasdaq1" class="textfield" value="<?=$pgprincipal['nasdaq1']?>" maxlength="15">
							</td>
							<td class="cell" width="37%">
									<input type="text" name="nasdaq2" class="textfield" value="<?=$pgprincipal['nasdaq2']?>" maxlength="15">
							</td>
						</tr>
						<tr> 
							<td class="label" width="25%">S&amp;P500</td>
							<td class="cell" width="37%">
									<input type="text" name="sp5001" class="textfield" value="<?=$pgprincipal['sp5001']?>" maxlength="15">
							</td>
							<td class="cell" width="37%">
									<input type="text" name="sp5002" class="textfield" value="<?=$pgprincipal['sp5002']?>" maxlength="15">
							</td>
						</tr>
						<tr> 
							<td class="label" width="25%">Fonte</td>
							<td class="cell" colspan="2" width="37%">
									<input type="text" name="fonte" class="textfield" value="<?=$pgprincipal['fonte']?>" maxlength="15">
							</td>
						</tr>
						<tr> 
						  <td colspan="2" align="right"><input type="submit" value="Salvar" class="botao"></td>
						</tr>
						<input type="hidden" name="modo" value="update">
					  </form>
					</table>
				</td>
			</tr>
		</table>
		<?php require("../../includes/desconectar_mysql.php"); ?>
	</body>
</html>
