<?php
if($pg == "HOME") $home = '<a style="color: #E4824C; cursor: hand;" href="index.php">HOME</div>';
else $home = '<a style="color: #FFFFFF; text-decoration: none; cursor: hand;" onMouseOver="style.textDecoration = \'underline\';" onMouseOut="style.textDecoration = \'none\';" href="index.php">HOME</div>';

if($pg == "EMPRESA") $empresa = '<a style="color: #E4824C; cursor: hand;" href="empresa.php">EMPRESA</a></div>';
else $empresa = '<a style="color: #FFFFFF; text-decoration: none; cursor: hand;" onMouseOver="style.textDecoration = \'underline\';" onMouseOut="style.textDecoration = \'none\';" href="empresa.php">EMPRESA</div>';

if($pg == "CLIENTES") $clientes = '<a style="color: #E4824C; cursor: hand;" href="clientes.php">CLIENTES</a></div>';
else $clientes = '<a style="color: #FFFFFF; text-decoration: none; cursor: hand;" onMouseOver="style.textDecoration = \'underline\';" onMouseOut="style.textDecoration = \'none\';" href="clientes.php">CLIENTES</div>';

if($pg == "SOLUÇÕES") $solucoes = '<a style="color: #E4824C; cursor: hand;" href="solucoes.php">SOLU&Ccedil;&Otilde;ES</a></div>';
else $solucoes = '<a style="color: #FFFFFF; text-decoration: none; cursor: hand;" onMouseOver="style.textDecoration = \'underline\';" onMouseOut="style.textDecoration = \'none\';" href="solucoes.php">SOLU&Ccedil;&Otilde;ES</div>';

if($pg == "SERVIÇOS") $servicos = '<a style="color: #E4824C; cursor: hand;" href="servicos.php">SERVI&Ccedil;OS</a></div>';
else $servicos = '<a style="color: #FFFFFF; text-decoration: none; cursor: hand;" onMouseOver="style.textDecoration = \'underline\';" onMouseOut="style.textDecoration = \'none\';" href="servicos.php">SERVI&Ccedil;OS</div>';

if($pg == "ALIANÇAS") $aliancas = '<a style="color: #E4824C; cursor: hand;" href="aliancas.php">ALIAN&Ccedil;AS</a></div>';
else $aliancas = '<a style="color: #FFFFFF; text-decoration: none; cursor: hand;" onMouseOver="style.textDecoration = \'underline\';" onMouseOut="style.textDecoration = \'none\';" href="aliancas.php">ALIANÇAS</div>';

if($pg == "IMPRENSA") $imprensa = '<a style="color: #E4824C; cursor: hand;" href="imprensa.php">IMPRENSA</a></div>';
else $imprensa = '<a style="color: #FFFFFF; text-decoration: none; cursor: hand;" onMouseOver="style.textDecoration = \'underline\';" onMouseOut="style.textDecoration = \'none\';" href="imprensa.php">IMPRENSA</div>';

if($pg == "CURRÍCULO") $curriculo = '<a style="color: #E4824C; cursor: hand;" href="curriculo.php">CURR&Iacute;CULO</a></div>';
else $curriculo = '<a style="color: #FFFFFF; text-decoration: none; cursor: hand;" onMouseOver="style.textDecoration = \'underline\';" onMouseOut="style.textDecoration = \'none\';" href="curriculo.php">CURR&Iacute;CULO</div>';

if($pg == "CONTATO") $contato = '<a style="color: #E4824C; cursor: hand;" href="contato.php">CONTATO</a></div>';
else $contato = '<a style="color: #FFFFFF; text-decoration: none; cursor: hand;" onMouseOver="style.textDecoration = \'underline\';" onMouseOut="style.textDecoration = \'none\';" href="contato.php">CONTATO</div>';

?>

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="menuhorizontal">
	<tr>
		<td width="10">&nbsp;</td>
		<td><?=$home?></td>
		<td><?=$empresa?></td>
		<td><?=$clientes?></td>
		<td><?=$solucoes?></td>
		<td><?=$servicos?></td>
		<td><?=$aliancas?></td>
		<td><?=$imprensa?></td>
		<td><?=$curriculo?></td>
		<td><?=$contato?></td>
		<td width="30">&nbsp;</td>
	</tr>
</table>