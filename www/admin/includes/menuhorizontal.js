var saiu = 0;
var intervalo;
var localizacao = "http://localhost/portal/admin/";
function start(){
	saiu = 0;
	intervalo = setInterval(checamouse, 500);
}

function checamouse(){
	if (saiu != 0){
		escondemenu();
		clearInterval(intervalo);
		saiu = 0;
	}
}

function escondeselect(){
	if (document.forms[0]){
		for (i = 0; i < document.forms[0].elements.length; i++){
			if (document.forms[0][i].type == "select-one"){
				if (document.forms[0][i].style.visibility == "") document.forms[0][i].style.visibility = "hidden";
				else if (document.forms[0][i].style.visibility == "visible") document.forms[0][i].style.visibility = "hidden";
			}
		}
	}
}

function mostramenu1(){
	escondemenu();
	escondeselect();
	var html = 		"<table width=\"100\" bgcolor=\"#3399FF\">"
				+	"<tr><td onMouseOver=\"style.fontWeight = 'bold';\" onMouseOut=\"style.fontWeight = 'normal';\" style=\"cursor: hand;\" onMouseDown=\"location = '" + localizacao + "usuarios/user_browser.php';\" align=\"center\"><font color=\"#FFFFFF\" size=\"2\" face=\"Arial, Helvetica, sans-serif\">Usuarios</font></td></tr>"
				+	"<tr><td onMouseOver=\"style.fontWeight = 'bold';\" onMouseOut=\"style.fontWeight = 'normal';\" style=\"cursor: hand;\" onMouseDown=\"location = '" + localizacao + "grupos/grupo_browser.php';\" align=\"center\"><font color=\"#FFFFFF\" size=\"2\" face=\"Arial, Helvetica, sans-serif\">Grupos</font></td></tr>"
				+	"<tr><td onMouseOver=\"style.fontWeight = 'bold';\" onMouseOut=\"style.fontWeight = 'normal';\" style=\"cursor: hand;\" onMouseDown=\"location = '" + localizacao + "img/img_browser.php';\" align=\"center\"><font color=\"#FFFFFF\" size=\"2\" face=\"Arial, Helvetica, sans-serif\">Imagens</font></td></tr>"
				+	"<tr><td onMouseOver=\"style.fontWeight = 'bold';\" onMouseOut=\"style.fontWeight = 'normal';\" style=\"cursor: hand;\" onMouseDown=\"location = '" + localizacao + "arquivos/files_browser.php';\" align=\"center\"><font color=\"#FFFFFF\" size=\"2\" face=\"Arial, Helvetica, sans-serif\">Arquivos</font></td></tr>"
				+	"<tr><td onMouseOver=\"style.fontWeight = 'bold';\" onMouseOut=\"style.fontWeight = 'normal';\" style=\"cursor: hand;\" onMouseDown=\"location = '" + localizacao + "estatisticas/estatisticas.php';\" align=\"center\"><font color=\"#FFFFFF\" size=\"2\" face=\"Arial, Helvetica, sans-serif\">Estatísticas</font></td></tr>"
				+	"</table>";
	document.all["menu1"].innerHTML = html;
	document.all["menu1"].style.position = "absolute";
	document.all["menu1"].style.visibility = "visible";
	document.all["menu1"].style.width = "100%";
}
function mostramenu2(){
	escondemenu();
	escondeselect();
	var html = 		"<table width=\"100\" bgcolor=\"#3399FF\">"
				+	"<tr><td onMouseOver=\"style.fontWeight = 'bold';\" onMouseOut=\"style.fontWeight = 'normal';\" style=\"cursor: hand;\" onMouseDown=\"location = '" + localizacao + "empresa/empresa_browser.php';\" align=\"center\"><font color=\"#FFFFFF\" size=\"2\" face=\"Arial, Helvetica, sans-serif\">Empresa</font></td></tr>"
				+	"<tr><td onMouseOver=\"style.fontWeight = 'bold';\" onMouseOut=\"style.fontWeight = 'normal';\" style=\"cursor: hand;\" onMouseDown=\"location = '" + localizacao + "servicos/servicos_browser.php';\" align=\"center\"><font color=\"#FFFFFF\" size=\"2\" face=\"Arial, Helvetica, sans-serif\">Serviços</font></td></tr>"
				+	"<tr><td onMouseOver=\"style.fontWeight = 'bold';\" onMouseOut=\"style.fontWeight = 'normal';\" style=\"cursor: hand;\" onMouseDown=\"location = '" + localizacao + "solucoes/solucoes_browser.php';\" align=\"center\"><font color=\"#FFFFFF\" size=\"2\" face=\"Arial, Helvetica, sans-serif\">Soluçôes</font></td></tr>"
				+	"<tr><td onMouseOver=\"style.fontWeight = 'bold';\" onMouseOut=\"style.fontWeight = 'normal';\" style=\"cursor: hand;\" onMouseDown=\"location = '" + localizacao + "clientes/clientes_browser.php';\" align=\"center\"><font color=\"#FFFFFF\" size=\"2\" face=\"Arial, Helvetica, sans-serif\">Clientes</font></td></tr>"				
				+	"</table>";
	document.all["menu2"].innerHTML = html;
	document.all["menu2"].style.position = "absolute";
	document.all["menu2"].style.visibility = "visible";
	document.all["menu2"].style.width = "100%";
}
function mostramenu3(){
	escondemenu();
	var html = 		"<table width=\"100\" bgcolor=\"#3399FF\">"
				+	"<tr><td onMouseOver=\"style.fontWeight = 'bold';\" onMouseOut=\"style.fontWeight = 'normal';\" style=\"cursor: hand;\" onMouseDown=\"location = '" + localizacao + "curriculum/curriculum_browser.php';\" align=\"center\"><font color=\"#FFFFFF\" size=\"2\" face=\"Arial, Helvetica, sans-serif\">Currículos</font></td></tr>"
				+	"<tr><td onMouseOver=\"style.fontWeight = 'bold';\" onMouseOut=\"style.fontWeight = 'normal';\" style=\"cursor: hand;\" onMouseDown=\"location = '" + localizacao + "curriculum/oportunidades_browser.php';\" align=\"center\"><font color=\"#FFFFFF\" size=\"2\" face=\"Arial, Helvetica, sans-serif\">Oportunidades</font></td></tr>"
				+	"<tr><td onMouseOver=\"style.fontWeight = 'bold';\" onMouseOut=\"style.fontWeight = 'normal';\" style=\"cursor: hand;\" onMouseDown=\"location = '" + localizacao + "aliancas/empresas_browser.php';\" align=\"center\"><font color=\"#FFFFFF\" size=\"2\" face=\"Arial, Helvetica, sans-serif\">Alianças</font></td></tr>"
				+	"<tr><td onMouseOver=\"style.fontWeight = 'bold';\" onMouseOut=\"style.fontWeight = 'normal';\" style=\"cursor: hand;\" onMouseDown=\"location = '" + localizacao + "aliancas/parceiros_browser.php';\" align=\"center\"><font color=\"#FFFFFF\" size=\"2\" face=\"Arial, Helvetica, sans-serif\">Parceiros</font></td></tr>"
				+	"</table>";
	document.all["menu3"].innerHTML = html;
	document.all["menu3"].style.position = "absolute";
	document.all["menu3"].style.visibility = "visible";
	document.all["menu3"].style.width = "100%";
}
function mostramenu4(){
	escondemenu();
	var html = 		"<table width=\"130\" bgcolor=\"#3399FF\">"
				+	"<tr><td onMouseOver=\"style.fontWeight = 'bold';\" onMouseOut=\"style.fontWeight = 'normal';\" style=\"cursor: hand;\" onMouseDown=\"location = '" + localizacao + "paginas/oportunidades.php';\" align=\"center\"><font color=\"#FFFFFF\" size=\"2\" face=\"Arial, Helvetica, sans-serif\">Oportunidades</font></td></tr>"
				+	"<tr><td onMouseOver=\"style.fontWeight = 'bold';\" onMouseOut=\"style.fontWeight = 'normal';\" style=\"cursor: hand;\" onMouseDown=\"location = '" + localizacao + "paginas/contato.php';\" align=\"center\"><font color=\"#FFFFFF\" size=\"2\" face=\"Arial, Helvetica, sans-serif\">Contato</font></td></tr>"
				+	"<tr><td onMouseOver=\"style.fontWeight = 'bold';\" onMouseOut=\"style.fontWeight = 'normal';\" style=\"cursor: hand;\" onMouseDown=\"location = '" + localizacao + "paginas/downloads.php';\" align=\"center\"><font color=\"#FFFFFF\" size=\"2\" face=\"Arial, Helvetica, sans-serif\">Downloads</font></td></tr>"
				+	"<tr><td onMouseOver=\"style.fontWeight = 'bold';\" onMouseOut=\"style.fontWeight = 'normal';\" style=\"cursor: hand;\" onMouseDown=\"location = '" + localizacao + "paginas/press_releases.php';\" align=\"center\"><font color=\"#FFFFFF\" size=\"2\" face=\"Arial, Helvetica, sans-serif\">Press Releases</font></td></tr>"
				+	"<tr><td onMouseOver=\"style.fontWeight = 'bold';\" onMouseOut=\"style.fontWeight = 'normal';\" style=\"cursor: hand;\" onMouseDown=\"location = '" + localizacao + "paginas/img_bnk.php';\" align=\"center\"><font color=\"#FFFFFF\" size=\"2\" face=\"Arial, Helvetica, sans-serif\">Banco de Imagens</font></td></tr>"
				+	"<tr><td onMouseOver=\"style.fontWeight = 'bold';\" onMouseOut=\"style.fontWeight = 'normal';\" style=\"cursor: hand;\" onMouseDown=\"location = '" + localizacao + "paginas/mapa_site.php';\" align=\"center\"><font color=\"#FFFFFF\" size=\"2\" face=\"Arial, Helvetica, sans-serif\">Mapa do Site</font></td></tr>"
				+	"<tr><td onMouseOver=\"style.fontWeight = 'bold';\" onMouseOut=\"style.fontWeight = 'normal';\" style=\"cursor: hand;\" onMouseDown=\"location = '" + localizacao + "paginas/principal.php';\" align=\"center\"><font color=\"#FFFFFF\" size=\"2\" face=\"Arial, Helvetica, sans-serif\">Principal</font></td></tr>"
				+	"</table>";
	document.all["menu4"].innerHTML = html;
	document.all["menu4"].style.position = "absolute";
	document.all["menu4"].style.visibility = "visible";
	document.all["menu4"].style.width = "100%";
}
function mostramenu5(){
	escondemenu();
	var html = 		"<table width=\"100\" bgcolor=\"#3399FF\">"
				+	"<tr><td onMouseOver=\"style.fontWeight = 'bold';\" onMouseOut=\"style.fontWeight = 'normal';\" style=\"cursor: hand;\" onMouseDown=\"location = '" + localizacao + "noticias/noticias_browser.php';\" align=\"center\"><font color=\"#FFFFFF\" size=\"2\" face=\"Arial, Helvetica, sans-serif\">Vizualizar</font></td></tr>"
				+	"<tr><td onMouseOver=\"style.fontWeight = 'bold';\" onMouseOut=\"style.fontWeight = 'normal';\" style=\"cursor: hand;\" onMouseDown=\"location = '" + localizacao + "noticias/noticias_form.php?modo=add&menu=sim';\" align=\"center\"><font color=\"#FFFFFF\" size=\"2\" face=\"Arial, Helvetica, sans-serif\">Nova</font></td></tr>"
				+	"</table>";
	document.all["menu5"].innerHTML = html;
	document.all["menu5"].style.position = "absolute";
	document.all["menu5"].style.visibility = "visible";
	document.all["menu5"].style.width = "100%";
}
function mostramenu6(){
	escondemenu();
	var html = 		"<table width=\"100\" bgcolor=\"#3399FF\">"
				+	"<tr><td onMouseOver=\"style.fontWeight = 'bold';\" onMouseOut=\"style.fontWeight = 'normal';\" style=\"cursor: hand;\" onMouseDown=\"location = '" + localizacao + "news/inter_browser.php';\" align=\"center\"><font color=\"#FFFFFF\" size=\"2\" face=\"Arial, Helvetica, sans-serif\">Internautas</font></td></tr>"
				+	"<tr><td onMouseOver=\"style.fontWeight = 'bold';\" onMouseOut=\"style.fontWeight = 'normal';\" style=\"cursor: hand;\" onMouseDown=\"location = '" + localizacao + "news/newsletter_browser.php';\" align=\"center\"><font color=\"#FFFFFF\" size=\"2\" face=\"Arial, Helvetica, sans-serif\">Newsletters</font></td></tr>"
				+	"</table>";
	document.all["menu6"].innerHTML = html;
	document.all["menu6"].style.position = "absolute";
	document.all["menu6"].style.visibility = "visible";
	document.all["menu6"].style.width = "100%";
}

function escondemenu(){
	document.all["menu1"].innerHTML = "";
	document.all["menu1"].style.visibility = "hidden";
	document.all["menu2"].innerHTML = "";
	document.all["menu2"].style.visibility = "hidden";
	document.all["menu3"].innerHTML = "";
	document.all["menu3"].style.visibility = "hidden";
	document.all["menu4"].innerHTML = "";
	document.all["menu4"].style.visibility = "hidden";
	document.all["menu5"].innerHTML = "";
	document.all["menu5"].style.visibility = "hidden";
	document.all["menu6"].innerHTML = "";
	document.all["menu6"].style.visibility = "hidden";
	if (document.forms[0]){
		for (i = 0; i < document.forms[0].length; i++){
			if (document.forms[0][i].type == "select-one"){
				if (document.forms[0][i].style.visibility == "hidden") document.forms[0][i].style.visibility = "visible";
			}
		}
	}
}