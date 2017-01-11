<?php
$PERMISSAO_DE_ACESSO = "Administradores/Publicadores";
require("../includes/permissao_documento.php");

$modo = $_GET["modo"];

if($modo == "update"){
	require("../../includes/conectar_mysql.php");
		$cd = $_GET["cd"];
		$query = "SELECT * FROM newsletters where cd=" . $cd;
		$result = mysql_query($query) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());
		$news = mysql_fetch_array($result, MYSQL_ASSOC);	
	require("../../includes/desconectar_mysql.php");
}
else $template = file_get_contents("../../mailtemplate.htm");
?>
<html>
	<head>
		<title>Publicação de Newsletter</title>
		<style type="text/css">
			<!--
			@import url(../includes/forms.css);
			-->
		</style>
		<script language="JavaScript" type="text/javascript">
			function editaconteudo(){
				window.open('../../editor.php', 'Editor', 'width=750,height=400,status=no,resizable=no,top=20,left=20,dependent=yes,alwaysRaised=yes');
			}
			function apagar(){
				if (window.showModalDialog('../includes/confirmacao.html',['Confirme!','Deseja apagar esta newsletter?','Sim','Não'],'dialogWidth:320px;dialogHeight:100px;status:no;') == "1"){
					self.location = "../delete.php?oque=newsletters&cd=<?=$cd?>";
				}
			}
		</script>
	</head>
	<body leftmargin="0" bottommargin="0" rightmargin="0" topmargin="0" marginheight="0" marginwidth="0" onLoad="document.all['form_noticia'].conteudo.focus();">
		<table width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td align="center">					
      <table class="tabela_form" width="600">
        <form name="form_noticia" method="post" action="salva_newsletter.php">
          <tr> 
            <td colspan="2" style="border: 1px solid #FFFFFF; text-align: center;"><b>Newsletter</b></td>
          </tr>
		  <?php if ($modo == "add"){ ?>
			  <input type="hidden" name="publicador_cd" value="<?=$_COOKIE['cd_usuario']?>">
			  <input type="hidden" name="publicador" value="<?=$_COOKIE['usuario']?>">
		  <? } ?>
          <tr> 
            <td class="label">Conteúdo<br>
              <br>
              <br>
              <br><br><br><br><br><br><br><br><br>
              <input type="button" value="Editar Conteúdo" name="edita_conteudo" class="botao" onClick="javascript: editaconteudo();"></td>
            <td width="440" class="cell"> 
              <?php if ($modo == "add") {?>
              <textarea name="conteudo" id="conteudo" class="textarea" rows="12" style="width: 440;"><?=$template?></textarea> 
              <?php } else {?>
              <textarea name="conteudo" id="conteudo" class="textarea" rows="12" style="width: 440;"><?=$news['conteudo']?></textarea> 
              <?php } ?>
            </td>
          </tr>
          <tr> 
            <td colspan="2" align="right"><?php if ($modo != "add") echo('<input type="button" value="Apagar" class="botao" onClick="javascript: apagar();">'); ?>
              <input type="submit" value="Enviar" class="botao"></td>
          </tr>
          <?php if ($modo == "add") {?>
          <input type="hidden" name="modo" value="add">
          <?php } else {?>
          <input type="hidden" name="modo" value="update">
          <input type="hidden" name="cd" value="<?=$cd?>">
          <?php } ?>
        </form>
      </table>
				</td>
			</tr>
		</table>
	</body>
</html>
