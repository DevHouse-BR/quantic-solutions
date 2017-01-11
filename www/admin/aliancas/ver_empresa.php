<?php
$cd = $_GET["cd"];

require("../../includes/conectar_mysql.php");
	$result = mysql_query("SELECT * FROM empresas WHERE cd='" . $cd . "'") or die("Erro ao acessar registros no Banco de dados: " . mysql_error());	
	$empresa = mysql_fetch_array($result, MYSQL_ASSOC);
require("../../includes/desconectar_mysql.php");
?>
<html>
<head>
<title>Empresa = <?=$empresa["empresa"];?>
</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	font-family: Helvetica, sans-serif;
	font-size: 10px;
}
.label {
	font-family: Helvetica, sans-serif;
	font-size: 12px;
	color: #FF9933;
	font-weight: bolder;
	font-style: italic;
}
table {
	font-family: Helvetica, sans-serif;
	font-size: 10px;
}
.item {
	border: 1px solid #666666;
}
-->
</style>
</head>

<body>
<table width="100%" border="0" cellspacing="5" cellpadding="5">
  <tr> 
    <td width="27%" align="right" valign="top" class="label" bgcolor="#7E7F7E">Empresa:</td>
    <td width="73%" class="item">&nbsp;<?=$empresa["empresa"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">Contato:</td>
    <td class="item">&nbsp;<?=$empresa["contato"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">Cargo/Fun&ccedil;&atilde;o:</td>
    <td class="item">&nbsp;<?=$empresa["cargo"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">E-mail:</td>
    <td class="item">&nbsp;<?=$empresa["email"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">Endere&ccedil;o:</td>
    <td class="item">&nbsp;<?=$empresa["endereco"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">N&uacute;mero:</td>
    <td class="item">&nbsp;<?=$empresa["numero"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">Complemento:</td>
    <td class="item">&nbsp;<?=$empresa["complemento"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">Bairro:</td>
    <td class="item">&nbsp;<?=$empresa["bairro"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">Cidade:</td>
    <td class="item">&nbsp;<?=$empresa["cidade"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">Estado:</td>
    <td class="item">&nbsp;<?=$empresa["estado"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">CEP:</td>
    <td class="item">&nbsp;<?=$empresa["cep"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">Pa&iacute;s:</td>
    <td class="item">&nbsp;<?=$empresa["pais"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">Telefone:</td>
    <td class="item">&nbsp;<?=$empresa["telefone"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">Fax:</td>
    <td class="item">&nbsp;<?=$empresa["fax"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">Website:</td>
    <td class="item">&nbsp;<?=$empresa["website"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">Descri&ccedil;&atilde;o da Empresa:</td>
    <td class="item">&nbsp;<?=$empresa["descricao_empresa"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">Descri&ccedil;&atilde;o 
      de Produtos/Serviços:</td>
    <td class="item">&nbsp;<?=$empresa["descricao_produtos"]?></td>
  </tr>
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">O Que Espera:</td>
    <td class="item">&nbsp;<?=$empresa["o_que_espera"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
