<?php // Compara se a primeira data fornecida é posterior ou igual a segunda data
	// datas no formato de strings YYYY-MM-DD
function compara_datas($data1, $data2){
	$data1 = split("-", $data1);
	$data2 = split("-", $data2);
	if (mktime(0,0,0,$data1[1],$data1[2],$data1[0],0) >= mktime(0,0,0,$data2[1],$data2[2],$data2[0],0)){
		return true;
	}
	else return false;
}
?>