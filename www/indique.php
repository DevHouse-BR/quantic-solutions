<?php
$de = $_POST["de"];
$de_email = $_POST["de_email"];
$para = $_POST["para"];
$para_email = $_POST["para_email"];
if (($de != "") && ($de_email != "") && ($para != "") && ($para_email != "")) {
	$ok = mail($para_email, "Indicação do Site", "Olá, " . $para . "\n\n" . $de . ", quer que você visite o site www.quanticsolutions.com.", "From: " . $de . "<" . $de_email . ">");
	$envio = true;
}
?>
<html>
<head>
<title>Indique Nosso Site</title>
<style type="text/css">
<!--
table {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	font-weight: bold;
	color: #FFFFFF;
}
input {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	border: 1px solid #FFFFFF;
	width: 100%;
}
-->
</style>
<script language="JavaScript">
	<?php 	if($envio){	
				if($ok) echo("alert('Seu e-mail foi enviado!');");
				else echo("alert('Problemas ao enviar o email. Verifique se o endereço foi digitado corretamente.');");
			}
	?>
	function ok(){
		document.forms[0].submit();
	}
	function apagar(){
		document.forms[0].reset();
	}
</script>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="341" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100%" height="306" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="42" valign="middle"><img src="img/logo_small.gif" width="42" height="37" border="0"></td>
        </tr>
        <tr>
          <td height="18" align="right" bgcolor="#F7B70D"><font size="2" color="#000000" face="Verdana, Arial, Helvetica, sans-serif"><strong>INDIQUE NOSSO SITE&nbsp;&nbsp;</strong></font></td>
        </tr>
        <tr>
          <td height="246" align="center" valign="middle" bgcolor="#000000"> 
            <table width="80%" border="0" cellspacing="0" cellpadding="0">
				<form action="indique.php" method="post" name="indique">
              <tr valign="top"> 
                <td width="24%" height="25" valign="middle">De:</td>
                <td align="right"><img src="img/lado_esq_campo_txt.gif"></td>
                <td><input type="text" name="de"></td>
                <td><img src="img/lado_dir_campo_txt.gif"></td>
              </tr>
              <tr valign="top"> 
                <td height="25" valign="middle">E-mail:</td>
                <td align="right"><img src="img/lado_esq_campo_txt.gif"></td>
                <td><input type="text" name="de_email"></td>
                <td><img src="img/lado_dir_campo_txt.gif"></td>
              </tr>
              <tr> 
                <td height="25" colspan="4" align="right" valign="middle">&nbsp;</td>
              </tr>
              <tr valign="top"> 
                <td height="25" valign="middle">Para:</td>
                <td width="4%" align="right"><img src="img/lado_esq_campo_txt.gif"></td>
                <td width="66%"><input type="text" name="para"></td>
                <td width="6%"><img src="img/lado_dir_campo_txt.gif"></td>
              </tr>
              <tr valign="top"> 
                <td height="25" valign="middle">E-mail:</td>
                <td align="right"><img src="img/lado_esq_campo_txt.gif"></td>
                <td><input type="text" name="para_email"></td>
                <td><img src="img/lado_dir_campo_txt.gif"></td>
              </tr>
              <tr> 
                <td>&nbsp;</td>
                <td colspan="3">&nbsp;</td>
              </tr>
              <tr> 
                <td>&nbsp;</td>
                <td colspan="3" align="right"><img style="cursor: hand;" onClick="javascript: apagar();" src="img/apagar.gif">&nbsp;&nbsp;&nbsp;<img style="cursor: hand;" onClick="javascript: ok();" src="img/enviar_black.gif">&nbsp;&nbsp;&nbsp;</td>
              </tr>
              <tr> 
                <td>&nbsp;</td>
                <td colspan="3">&nbsp;</td>
              </tr>
              <tr align="center"> 
                <td colspan="4"><div style="cursor: hand;" onMouseOver="style.textDecoration = 'underline';" onMouseOut="style.textDecoration = 'none';" onClick="self.close();">Fechar</div></td>
              </tr>
			  </form>
            </table>
          </td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>
