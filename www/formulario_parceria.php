<?php
require("includes/conectar_mysql.php");
	$query = "SELECT parametro FROM parametros WHERE nome='cabecalho_form_parceria'";
	$result = mysql_query($query) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());
	$cabecalho = mysql_fetch_array($result, MYSQL_ASSOC);	
require("includes/desconectar_mysql.php");
?>
<html>
<head>
<title>Curriculum Vitae</title>
<style type="text/css">
<!--
.campotxt1 {
	font-family: Helvetica;
	font-size: 11px;
	background-color: #DEDEDE;
	border: 1px solid #DEDEDE;
}
.campotxt2 {
	font-family: Helvetica;
	font-size: 11px;
	background-color: #C6C6C6;
	border: 1px solid #C6C6C6;
}
 BODY {
	scrollbar-arrow-color:#FFFFFF;
	scrollbar-track-color:#FFFFFF;
	scrollbar-shadow-color:#FFFFFF;
	scrollbar-face-color:#767877;
	scrollbar-highlight-color:#FFFFFF;
	scrollbar-darkshadow-color:#FFFFFF;
	scrollbar-3dlight-color:#FFFFFF;
 }
-->
</style>
<link href="includes/quantic.css" rel="stylesheet" type="text/css">
<script language="JavaScript">
	function valida_form(){
		var f = document.all["parceria"];
		if (f.empresa.value != "" && f.contato.value != "" && f.cargo.value != "" && f.email.value != "" && f.endereco.value != "" && f.cidade.value != "" && f.estado.value != "" && f.cep.value != "" && f.pais.value != "" && f.telefone.value != "") f.submit();
		else alert("Os campos com (*) são obrigatórios!");
	}
</script>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
  	<td align="center">
		<table width="80%" border="0">
			<tr>
				<td class="conteudo"><?=$cabecalho["parametro"]?></td>
			</tr>
		</table>
	</td>
  </tr>
  <tr>
    <td align="center" valign="top"> 
      <form action="salva_parceria.php" method="post" name="parceria">
        <table width="80%" border="0" cellspacing="2" cellpadding="5" style="font-family: Helvetica; font-size: 11px;">
          <tr align="center"> 
            <td colspan="2" bgcolor="#000000"><font color="#FFFFFF"><strong>Seja Nosso Parceiro</strong></font></td>
          </tr>
          <tr> 
            <td colspan="2"></td>
          </tr>
          <tr> 
            <td width="43%" align="right">Empresa*:</td>
            <td width="57%"><input name="empresa" type="text" class="campotxt1" style="width: 100%" maxlength="255"></td>
          </tr>
          <tr> 
            <td align="right">Contato*:</td>
            <td><input name="contato" type="text" class="campotxt2" style="width: 100%" maxlength="255"></td>
          </tr>
          <tr> 
            <td align="right">Cargo/Fun&ccedil;&atilde;o*:</td>
            <td><input name="cargo" type="text" class="campotxt1" style="width: 100%" maxlength="255"></td>
          </tr>
          <tr> 
            <td align="right">E-mail*:</td>
            <td><input name="email" type="text" class="campotxt2" style="width: 100%" maxlength="255"></td>
          </tr>
          <tr> 
            <td align="right">Endere&ccedil;o*:</td>
            <td><input name="endereco" type="text" class="campotxt1" style="width: 100%" maxlength="255"></td>
          </tr>
          <tr> 
            <td align="right">N&uacute;mero:</td>
            <td><input name="numero" type="text" class="campotxt2" maxlength="10"></td>
          </tr>
          <tr> 
            <td align="right">Complemento:</td>
            <td><input name="complemento" type="text" class="campotxt1" style="width: 100%" maxlength="100"></td>
          </tr>
          <tr> 
            <td align="right">Bairro:</td>
            <td><input name="bairro" type="text" class="campotxt2" style="width: 100%" maxlength="100"></td>
          </tr>
          <tr> 
            <td align="right">Cidade*:</td>
            <td><input name="cidade" type="text" class="campotxt1" style="width: 100%" maxlength="100"></td>
          </tr>
          <tr> 
            <td align="right">Estado*:</td>
            <td><input name="estado" type="text" class="campotxt2" size="3" maxlength="2"></td>
          </tr>
          <tr> 
            <td align="right">CEP*:</td>
            <td><input name="cep" type="text" class="campotxt1" maxlength="9"></td>
          </tr>
          <tr>
            <td align="right">Pais*:</td>
            <td><input name="pais" type="text" class="campotxt2" style="width: 100%" maxlength="100"></td>
          </tr>
          <tr> 
            <td align="right">Telefone*:</td>
            <td><input name="telefone" type="text" class="campotxt1" maxlength="30"></td>
          </tr>
          <tr> 
            <td align="right">Fax:</td>
            <td><input name="fax" type="text" class="campotxt2" maxlength="30"></td>
          </tr>
          <tr> 
            <td align="right">Website:</td>
            <td><input name="website" type="text" class="campotxt1" style="width: 100%" maxlength="255"></td>
          </tr>
          <tr> 
            <td align="right" valign="top">Descri&ccedil;&atilde;o da Empresa:</td>
            <td><textarea name="descricao_empresa" rows="5" style="width: 100%"></textarea></td>
          </tr>
          <tr> 
            <td colspan="2"></td>
          </tr>
          <tr> 
            <td align="right" valign="top">Descri&ccedil;&atilde;o dos Produtos/Servi&ccedil;os:</td>
            <td><textarea name="descricao_produtos" rows="5" style="width: 100%"></textarea></td>
          </tr>
          <tr> 
            <td colspan="2"></td>
          </tr>
          <tr> 
            <td align="right" valign="top">O que espera desta parceria:</td>
            <td><textarea name="o_que_espera" rows="5" style="width: 100%"></textarea></td>
          </tr>
          <tr> 
		  	<td></td>
            <td>* Campos de preenchimento obrigat&oacute;rio.</td>
          </tr>
        </table>
      <table width="90%" border="0" cellspacing="2" cellpadding="5" style="font-family: Helvetica; font-size: 12px;">
          <tr> 
            <td width="48%">&nbsp;</td>
            <td align="right"><a href="javascript: document.forms[0].reset();"><img src="img/limpar.gif" width="86" height="20" border="0"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript: valida_form();"><img src="img/enviar.gif" width="65" height="20" border="0"></a></td>
          </tr>
        </table>
	  </form>
	  </td>
  </tr>
</table>
</body>
</html>
