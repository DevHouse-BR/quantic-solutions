<?php
$cd = $_GET["cd"];

require("../../includes/conectar_mysql.php");
	$result = mysql_query("SELECT * FROM curriculos WHERE cd='" . $cd . "'") or die("Erro ao acessar registros no Banco de dados: " . mysql_error());	
	$curriculo = mysql_fetch_array($result, MYSQL_ASSOC);
require("../../includes/desconectar_mysql.php");
?>
<html>
<head>
<title>Curriculum = 
<?=$curriculo["nome"];?>
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
    <td width="27%" align="right" valign="top" class="label" bgcolor="#7E7F7E">Nome:</td>
    <td width="73%" class="item">&nbsp;<?=$curriculo["nome"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">E-mail:</td>
    <td class="item">&nbsp;<?=$curriculo["email"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">Website:</td>
    <td class="item">&nbsp;<?=$curriculo["website"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">Endere&ccedil;o:</td>
    <td class="item">&nbsp;<?=$curriculo["endereco"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">N&uacute;mero:</td>
    <td class="item">&nbsp;<?=$curriculo["numero"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">Complemento:</td>
    <td class="item">&nbsp;<?=$curriculo["complemento"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">Bairro:</td>
    <td class="item">&nbsp;<?=$curriculo["bairro"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">Cidade:</td>
    <td class="item">&nbsp;<?=$curriculo["cidade"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">Estado:</td>
    <td class="item">&nbsp;<?=$curriculo["estado"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">CEP:</td>
    <td class="item">&nbsp;<?=$curriculo["cep"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">Telefone:</td>
    <td class="item">&nbsp;<?=$curriculo["telefone"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">Celular:</td>
    <td class="item">&nbsp;<?=$curriculo["celular"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E" rowspan="3">Cargo(s) Desejado(s):</td>
    <td class="item">&nbsp;<?=$curriculo["cargo1"]?></td>
  </tr>
  <tr> 
    <td class="item">&nbsp;<?=$curriculo["cargo2"]?></td>
  </tr>
  <tr> 
    <td class="item">&nbsp;<?=$curriculo["cargo3"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">Pretens&atilde;o Salarial:</td>
    <td class="item">&nbsp;<?=$curriculo["pretensao_salarial"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td align="center" valign="top" class="label" colspan="2" bgcolor="#7E7F7E">Hist&oacute;rico Profissional</td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">Ultima Empresa:</td>
    <td class="item">&nbsp;<?=$curriculo["ultima_empresa"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">Fun&ccedil;&atilde;o:</td>
    <td class="item">&nbsp;<?=$curriculo["ultima_funcao"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">Per&iacute;odo:</td>
    <td class="item">&nbsp;<?=$curriculo["ultimo_periodo"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">Pen&uacute;ltima Empresa:</td>
    <td class="item">&nbsp;<?=$curriculo["penultima_empresa"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">Fun&ccedil;&atilde;o:</td>
    <td class="item">&nbsp;<?=$curriculo["penultima_funcao"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">Per&iacute;odo:</td>
    <td class="item">&nbsp;<?=$curriculo["penultimo_periodo"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">Resumo de Qualifica&ccedil;&otilde;es:</td>
    <td class="item">&nbsp;<?=$curriculo["resumo_qualificacoes"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">Experi&ecirc;ncia Profissional:</td>
    <td class="item">&nbsp;<?=$curriculo["experiencia_profissional"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td align="center" valign="top" class="label" colspan="2" bgcolor="#7E7F7E">Idiomas</td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">Ingl&ecirc;s:</td>
    <td class="item"> 
      <?php
				if ($curriculo["ingles"] == "s") echo($curriculo["nivel_ingles"]);
				else echo("N&atilde;o");
			?>
    </td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">Espanhol:</td>
    <td class="item"> 
      <?php
				if ($curriculo["espanhol"] == "s") echo($curriculo["nivel_espanhol"]);
				else echo("N&atilde;o");
			?>
    </td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">Outro:</td>
    <td class="item"> 
      <?php
				if ($curriculo["outro_idioma"] != "") echo($curriculo["outro_idioma"] . " " . $curriculo["nivel_outro_idioma"]);
				else echo("N&atilde;o");
			?>
    </td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">Escolaridade:</td>
    <td class="item">&nbsp;<?=$curriculo["escolaridade"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">Institui&ccedil;&atilde;o:</td>
    <td class="item">&nbsp;<?=$curriculo["instituicao"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">Curso:</td>
    <td class="item">&nbsp;<?=$curriculo["curso"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">Situa&ccedil;&atilde;o:</td>
    <td class="item">&nbsp;<?=$curriculo["situacao"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">In&iacute;cio:</td>
    <td class="item">&nbsp;<?=$curriculo["inicio"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">T&eacute;rmino:</td>
    <td class="item">&nbsp;<?=$curriculo["termino"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">Cursos:</td>
    <td class="item">&nbsp;<?=$curriculo["cursos"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label" bgcolor="#7E7F7E">Fale sobre voc&ecirc;:</td>
    <td class="item">&nbsp;<?=$curriculo["sobre_voce"]?></td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td align="right" valign="top" class="label">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
