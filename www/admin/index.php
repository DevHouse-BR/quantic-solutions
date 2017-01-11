<html>
	
<head>
<title>Acesso Restrito</title>
<style type="text/css">
<!--
@import url(../includes/quantic.css);
.login {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	color: #FFFFFF;
}
-->
</style>
</head>
	<body leftmargin="0" topmargin="0" onLoad="document.all['form1'].usuario.focus();">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr> 
				<td align="center">
					<table width="775" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="129"><img src="../img/quantic-logo.gif" width="127" height="89"></td>
          <td width="646" bgcolor="#E8A823">&nbsp;</td>
        </tr>
        <tr> 
          <td height="30" colspan="2" bgcolor="#000000" align="center"><font color="#FFFFFF" size="2"><B>ADMINISTRAÇÃO DE CONTEÚDO</B></font></td>
        </tr>
        <tr> 
          <td colspan="2" valign="middle" align="center" height="350"> <table width="400" border="0" cellpadding="0" cellspacing="0">
              <form action="valida_usuario.php" method="post" name="form1">
                <tr align="center"> 
                  <td height="39" colspan="3"><strong>Digite seu nome de usuário 
                    e senha</strong></td>
                </tr>
                <tr bgcolor="#000000"> 
                  <td width="25%"></td>
                  <td align="center" valign="middle" height="150" width="50%"> 
                    <table width="100%" class="login">
                      <tr> 
                        <td>Usuario</td>
                      </tr>
                      <tr> 
                        <td><input type="text" name="usuario" style="width: 100%"></td>
                      </tr>
                      <tr> 
                        <td>Senha</td>
                      </tr>
                      <tr> 
                        <td><input type="password" name="senha" style="width: 100%" onKeyDown="if (event.keyCode == 13) document.forms[0].submit();"></td>
                      </tr>
                    </table></td>
                  <td align="center" valign="middle" width="25%"> <table width="100%" border="0" bordercolor="#000000">
                      <tr> 
                        <td>&nbsp;</td>
                      </tr>
                      <tr> 
                        <td>&nbsp;</td>
                      </tr>
                      <tr> 
                        <td>&nbsp;</td>
                      </tr>
                      <tr> 
                        <td><img style="cursor: hand;" src="../img/ok.gif" onClick="document.all['form1'].submit();"></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			if($_GET["status"] == "erro1"){
				echo('<tr><td colspan="2" align="center"><font color=#FF0000>Usuario ou Senha incorretos.</font></td></tr>');
			}
			if($_GET["status"] == "erro2"){
				echo('<tr><td colspan="2" align="center"><font color=#FF0000>Usuário desativado e sem permissões de acesso.</font></td></tr>');
			}
			?>
              </form>
            </table></td>
        </tr>
      </table>
				</td>
			</tr>
		</table>
	</body>
</html>