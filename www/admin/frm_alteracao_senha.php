<?php
$status = $_GET["status"];
?>
<html>
	<head>
		<title>Acesso Restrito</title>
		<script language="JavaScript" type="text/javascript">
		<?php
			if ($status == "alerta") echo("alert('Sua senha expirou! Digite uma nova senha!');");
		?>
			function validaform(){
				var f = document.all["form1"];
				if (f.senha.value != f.novasenha.value){
					if (f.novasenha.value == f.confirma.value){
						f.submit();
					}
					else alert("A nova senha não confere com a confirmação!");
				}
				else alert("A nova senha não pode ser igual a antiga!")
			}
		</script>
	</head>
	
	<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="document.all['form1'].usuario.focus();">
		<table width="100%" height="100%" border="0">
		<form action="altera_senha.php" method="post" name="form1">
		  <tr>
			<td align="center" valign="middle">
			<table width="400" border="0">
				<tr> 
					<td height="39" colspan="2" align="center"><strong>Alteração de Senha do Usu&aacute;rio</strong></td>
				</tr>
				<tr> 
				  <td width="75" align="right">Usuario</td>
				  <td width="325"><input type="text" name="usuario" style="width: 100%"></td>
				</tr>
				<tr> 
				  <td align="right">Senha</td>
				  <td><input type="password" name="senha" style="width: 100%"></td>
				</tr>
				<tr> 
				  <td align="right">Nova Senha</td>
				  <td><input type="password" name="novasenha" style="width: 100%"></td>
				</tr>
				<tr> 
				  <td align="right">Confirmação</td>
				  <td><input type="password" name="confirma" style="width: 100%" onKeyDown="if (event.keyCode == 13) document.forms[0].submit();"></td>
				</tr>
				<tr align="right"> 
				  <td colspan="2"><input type="reset" name="Submit2" value="Limpa"> 
					<input type="button" name="Submit" onClick="validaform();" value="OK">
				  </td>
				</tr>
				<?php
				if($status == "erro1"){
					echo('<tr><td colspan="2" align="center"><font color=#FF0000>Usuario ou Senha incorretos.</font></td></tr>');
				}
				if($status == "alerta"){
					echo('<tr><td colspan="2" align="center"><font color=#FF0000>A nova senha deve ser diferente da antiga!</font></td></tr>');
				}
				?>
			  </table>
			</td>
		  </tr>
		 </form>
		</table>
	</body>
</html>
