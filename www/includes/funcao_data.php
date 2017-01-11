<?php
function formatadata($entrada){
	if($entrada != ""){
		list($data, $hora) = split(" ", $entrada);
		list($ano, $mes, $dia) = split("-", $data);
		return $dia . "/" . $mes . "/" . $ano . " " . $hora;
	}
}
?>