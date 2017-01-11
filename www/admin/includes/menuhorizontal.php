<?php
$localizacao = "http://localhost/portal/admin";

$menu1 = '<td style="cursor: hand;" onMouseOver="mostramenu1();"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">Sistema</font></strong></td>';
$submenu1 = '<td><div style="z-index: 9999; text-align: center;" id="menu1" onMouseOver="start();" onMouseOut="saiu = 1;"></div></td>';

$menu2 = '<td style="cursor: hand;" onMouseOver="mostramenu2();"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">Quantic</font></strong></td>';
$submenu2 = '<td><div style="z-index: 9999; text-align: center;" id="menu2" onMouseOver="start();" onMouseOut="saiu = 1;"></div></td>';

$menu3 = '<td style="cursor: hand;" onMouseOver="mostramenu3();"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">Cadastros</font></strong></td>';
$submenu3 = '<td><div style="z-index: 9999; text-align: center;" id="menu3" onMouseOver="start();" onMouseOut="saiu = 1;"></div></td>';

$menu4 = '<td style="cursor: hand;" onMouseOver="mostramenu4();"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">Páginas</font></strong></td>';
$submenu4 = '<td><div style="z-index: 9999; text-align: center;" id="menu4" onMouseOver="start();" onMouseOut="saiu = 1;"></div></td>';

$menu5 = '<td style="cursor: hand;" onMouseOver="mostramenu5();"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">Notícias</font></strong></td>';
$submenu5 = '<td><div style="z-index: 9999; text-align: center;" id="menu5" onMouseOver="start();" onMouseOut="saiu = 1;"></div></td>';

$menu6 = '<td style="cursor: hand;" onMouseOver="mostramenu6();"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">Newsletter</font></strong></td>';
$submenu6 = '<td><div style="z-index: 9999; text-align: center;" id="menu6" onMouseOver="start();" onMouseOut="saiu = 1;"></div></td>';

?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="menu" bgcolor="#3399FF">
  <tr align="center">
		<td width="10%">&nbsp;</td>
		<?php
			echo($menu1);
			echo($menu2);
			echo($menu3);
			echo($menu4);
			echo($menu5);
			echo($menu6);
		?>
		<td width="10%">&nbsp;</td>
	</tr>
	<tr>
		<td width="10%"></td>
		<?php
			echo($submenu1);
			echo($submenu2);
			echo($submenu3);
			echo($submenu4);
			echo($submenu5);
			echo($submenu6);
		?>
		<td width="10%"></td>
	</tr>
</table>