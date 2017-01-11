<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Parceria</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
		var f = document.all["curriculo"];
		if (f.nome.value != "" && f.email.value != "" && f.endereco.value != "" && f.cidade.value != "" && f.estado.value != "" && f.cep.value != "") f.submit();
		else alert("Os campos com (*) são obrigatórios!");
	}
</script>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top"> 
		<table width="80%">
				  		<tr>
				<td class="conteudo"><?php
						require("includes/conectar_mysql.php");
							$query = "SELECT parametro FROM parametros WHERE nome='cabecalho_curriculo'";
							$result2 = mysql_query($query) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());
							$cabecalho = mysql_fetch_array($result2, MYSQL_ASSOC);
							echo($cabecalho["parametro"]);	
						require("includes/desconectar_mysql.php");
					?>
				</td>
			</tr>
		</table>
      <form action="salva_curriculo.php" method="post" name="curriculo">
        <table width="80%" border="0" cellspacing="2" cellpadding="5" style="font-family: Helvetica; font-size: 11px;">
          <tr align="center"> 
            <td colspan="2" bgcolor="#000000"><font color="#FFFFFF"><strong>Dados Pessoais</strong></font></td>
          </tr>
          <tr> 
            <td colspan="2"></td>
          </tr>
          <tr> 
            <td width="43%" align="right">Nome*:</td>
            <td width="57%"><input name="nome" type="text" class="campotxt1" style="width: 100%" maxlength="255"></td>
          </tr>
          <tr> 
            <td align="right">E-mail*:</td>
            <td><input name="email" type="text" class="campotxt2" style="width: 100%" maxlength="255"></td>
          </tr>
          <tr> 
            <td align="right">Website:</td>
            <td><input name="website" type="text" class="campotxt1" style="width: 100%" maxlength="255"> 
            </td>
          </tr>
          <tr> 
            <td align="right">Endere&ccedil;o*:</td>
            <td><input name="endereco" type="text" class="campotxt2" style="width: 100%" maxlength="255"></td>
          </tr>
          <tr> 
            <td align="right">N&uacute;mero:</td>
            <td><input name="numero" type="text" class="campotxt1" maxlength="10"></td>
          </tr>
          <tr> 
            <td align="right">Complemento:</td>
            <td><input name="complemento" type="text" class="campotxt2" style="width: 100%" maxlength="100"></td>
          </tr>
          <tr> 
            <td align="right">Bairro:</td>
            <td><input name="bairro" type="text" class="campotxt1" style="width: 100%" maxlength="100"></td>
          </tr>
          <tr> 
            <td align="right">Cidade*:</td>
            <td><input name="cidade" type="text" class="campotxt2" style="width: 100%" maxlength="100"></td>
          </tr>
          <tr> 
            <td align="right">Estado*:</td>
            <td><input name="estado" type="text" class="campotxt1" size="3" maxlength="2"></td>
          </tr>
          <tr> 
            <td align="right">CEP*:</td>
            <td><input name="cep" type="text" class="campotxt2" maxlength="9"></td>
          </tr>
          <tr> 
            <td align="right">Telefone:</td>
            <td><input name="telefone" type="text" class="campotxt1" maxlength="30"></td>
          </tr>
          <tr> 
            <td align="right">Celular:</td>
            <td><input name="celular" type="text" class="campotxt2" maxlength="30"></td>
          </tr>
          <tr> 
            <td align="right">Cargo(s) Desejado(s):</td>
            <td><input name="cargo1" type="text" class="campotxt1" style="width: 100%" maxlength="100"></td>
          </tr>
          <tr> 
            <td align="right">&nbsp;</td>
            <td><input name="cargo2" type="text" class="campotxt2" style="width: 100%" maxlength="100"></td>
          </tr>
          <tr> 
            <td align="right">&nbsp;</td>
            <td><input name="cargo3" type="text" class="campotxt1" style="width: 100%" maxlength="100"></td>
          </tr>
          <tr> 
            <td align="right">Pretens&atilde;o Salarial:</td>
            <td><input name="pretensao_salarial" type="text" class="campotxt2" maxlength="10"></td>
          </tr>
          <tr> 
            <td align="right" style="font-size: 3px">&nbsp;</td>
            <td style="font-size: 3px">&nbsp;</td>
          </tr>
          <tr align="center"> 
            <td colspan="2" bgcolor="#000000"><font color="#FFFFFF"><strong>Hist&oacute;rico Profissional</strong></font></td>
          </tr>
		<tr> 
            <td colspan="2"></td>
          </tr>
          <tr> 
            <td align="right">&Uacute;ltima Empresa:</td>
            <td><input name="ultima_empresa" type="text" class="campotxt1" style="width: 100%" maxlength="100"></td>
          </tr>
          <tr> 
            <td align="right">Fun&ccedil;&atilde;o:</td>
            <td><input name="ultima_funcao" type="text" class="campotxt2" style="width: 100%" maxlength="100"></td>
          </tr>
          <tr> 
            <td align="right">Per&iacute;odo:</td>
            <td><input name="ultimo_periodo" type="text" class="campotxt1" maxlength="30"></td>
          </tr>
          <tr> 
            <td colspan="2"></td>
          </tr>
          <tr> 
            <td align="right">Pen&uacute;ltima Empresa:</td>
            <td><input name="penultima_empresa" type="text" class="campotxt2" style="width: 100%" maxlength="100"></td>
          </tr>
          <tr> 
            <td align="right">Fun&ccedil;&atilde;o:</td>
            <td><input name="penultima_funcao" type="text" class="campotxt1" style="width: 100%" maxlength="100"></td>
          </tr>
          <tr> 
            <td align="right">Per&iacute;odo:</td>
            <td><input name="penultimo_periodo" type="text" class="campotxt2" maxlength="30"></td>
          </tr>
          <tr> 
            <td colspan="2"></td>
          </tr>
          <tr> 
            <td align="right" valign="top">Resumo de Qualifica&ccedil;&otilde;es:</td>
            <td><textarea name="resumo_qualificacoes" rows="5" style="width: 100%"></textarea></td>
          </tr>
          <tr> 
            <td align="right" valign="top">Experi&ecirc;ncia Profissional</td>
            <td><textarea name="experiencia_profissional" rows="5" style="width: 100%"></textarea></td>
          </tr>
          <tr> 
            <td height="22">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
		<table width="90%" border="0" cellspacing="2" cellpadding="5" style="font-family: Helvetica; font-size: 11px;">
        <tr align="center"> 
          <td colspan="2" bgcolor="#000000"><font color="#FFFFFF"><strong>Idiomas</strong></font></td>
        </tr>
		<tr> 
            <td colspan="2"></td>
          </tr>
        <tr> 
          <td align="left" width="48%">
<input type="checkbox" name="ingles" value="checkbox">
            Ingl&ecirc;s&nbsp;&nbsp;&nbsp;&nbsp;</td>
          <td>N&iacute;vel: 
            <select name="nivel_ingles" class="campotxt1">
              <option value="B&aacute;sico">B&aacute;sico</option>
              <option value="Intermedi&aacute;rio">Intermedi&aacute;rio</option>
              <option value="Avan&ccedil;ado">Avan&ccedil;ado</option>
            </select></td>
        </tr>
        <tr> 
          <td align="left">
<input type="checkbox" name="espanhol" value="checkbox">
            Espanhol&nbsp;&nbsp;&nbsp;&nbsp; </td>
          <td>N&iacute;vel: 
            <select name="nivel_espanhol" class="campotxt2">
              <option value="B&aacute;sico">B&aacute;sico</option>
              <option value="Intermedi&aacute;rio">Intermedi&aacute;rio</option>
              <option value="Avan&ccedil;ado">Avan&ccedil;ado</option>
            </select></td>
        </tr>
        <tr> 
          <td align="left"><input type="checkbox" name="outro" value="checkbox">
		  Outro: 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="outro_idioma" class="campotxt2" size="15"></td>
          <td>N&iacute;vel: 
            <select name="nivel_outro_idioma" class="campotxt2">
              <option value="B&aacute;sico">B&aacute;sico</option>
              <option value="Intermedi&aacute;rio">Intermedi&aacute;rio</option>
              <option value="Avan&ccedil;ado">Avan&ccedil;ado</option>
            </select></td>
        </tr>
        <tr> 
            <td colspan="2"></td>
          </tr>
        <tr> 
          <td align="right">Escolaridade:</td>
          <td><select name="escolaridade" style="width: 100%" class="campotxt1">
              <option value="B&aacute;sico">B&aacute;sico</option>
              <option value="M&eacute;dio">M&eacute;dio</option>
              <option value="T&eacute;cnico">T&eacute;cnico</option>
              <option value="Superior">Superior</option>
              <option value="P&oacute;s-Gradua&ccedil;&atilde;o">P&oacute;s-Gradua&ccedil;&atilde;o</option>
            </select></td>
        </tr>
        <tr> 
          <td align="right">Institui&ccedil;&atilde;o:</td>
          <td><input name="instituicao" type="text" class="campotxt2" style="width: 100%" maxlength="100"></td>
        </tr>
        <tr>
          <td align="right">Curso:</td>
          <td><input name="curso" type="text" class="campotxt1" style="width: 100%" maxlength="100"></td>
        </tr>
        <tr>
          <td align="right">Situa&ccedil;&atilde;o:</td>
          <td><select name="situacao" style="width: 100%" class="campotxt2">
		  	  <option value=""></option>
              <option value="Completo">Completo</option>
              <option value="Cursando">Cursando</option>
              <option value="Incompleto">Incompleto</option>
            </select>
		</td>
        </tr>
        <tr>
          <td align="right">In&iacute;cio:</td>
          <td><input name="inicio" type="text" class="campotxt1" maxlength="10"></td>
        </tr>
        <tr>
          <td align="right">T&eacute;rmino:</td>
          <td><input name="termino" type="text" class="campotxt2" maxlength="10"></td>
        </tr>
        <tr>
          <td align="right" valign="top">Cursos:</td>
          <td><textarea name="cursos" rows="5" style="width: 100%"></textarea></td>
        </tr>
        <tr>
          <td align="right" valign="top">Fale sobre voc&ecirc;:</td>
          <td> <textarea name="sobre_voce" rows="5" style="width: 100%"></textarea></td>
        </tr>
		<tr> 
		  	<td></td>
            <td>* Campos de preenchimento obrigat&oacute;rio.</td>
          </tr>
        <tr>
          <td>&nbsp;</td>
            <td align="right"><a href="javascript: document.forms[0].reset();"><img src="img/limpar.gif" width="86" height="20" border="0"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript: valida_form();"><img src="img/enviar.gif" width="65" height="20" border="0"></a></td>
        </tr>
      </table>
	  </form>
	  </td>
  </tr>
</table>
</body>
</html>
