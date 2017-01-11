<?php
$usuario = $_POST["usuario"];
$senhadigitada = $_POST["senha"];
$URL = "http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/";


require("../includes/conectar_mysql.php");
	$query = "SELECT cd, senha, senha_expira, expiracao_senha, ativo FROM usuarios WHERE (usuario='" . $usuario . "')";
	$result = mysql_query($query) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());
	$senha = mysql_fetch_row($result);
	
	$query = "SELECT grupo FROM grupos_usuarios WHERE (usuario='" . $usuario . "')";
	$result = mysql_query($query) or die("Erro ao acessar registros relativos aos grupos de usuarios: " . mysql_error());
	$grupo = "";
	while ($grupos = mysql_fetch_row($result)){
		if ($grupo == "") $grupo .= $grupos[0];
		else {
			$grupo .= " " . $grupos[0];
		}
	} 
require("../includes/desconectar_mysql.php");

require("includes/funcoes_datas.php");

if (strcmp(trim($senha[1]), trim($senhadigitada)) != 0){
	saida($URL . "index.php?status=erro1");
}
else{
	if (strcmp($senha[4], "s") == 0){
		if (strcmp($senha[2], "s") == 0){
			if (!compara_datas($senha[3], date('Y-m-d'))){
				valida(false);
				saida($URL . "frm_alteracao_senha.php?status=alerta");
			}
			else valida(true);
		}
		else valida(true);
	}
	else{
		saida($URL . "index.php?status=erro2");
	}
}

function valida($ok){
	global $grupo, $senha, $usuario, $URL;
	if(!setcookie("grupos", $grupo)) die("O seu browser deve aceitar Cookies para o bom funcionamento do software.");
	if(!setcookie("cd_usuario", $senha[0])) die("O seu browser deve aceitar Cookies para o bom funcionamento do software.");
	if(!setcookie("usuario", $usuario)) die("O seu browser deve aceitar Cookies para o bom funcionamento do software.");
	
	if ($ok){
		saida($URL . "admin.php");
	}
}

function saida($redireciona){
$HTML = '<html>
			<head>
				<script language="javascript">
					location = "' . $redireciona . '";
				</script>
			</head>
		</html>';
	die($HTML);
}
?>