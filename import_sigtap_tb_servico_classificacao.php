<?php
	############################### IMPORTAR tb_servico_classificacao #####################################
function import_sigtap_tb_servico_classificacao($conn){

	//Abre o arquivo txt - tb_sub_grupo
	$ponteiro = fopen ("tabelas/tb_servico_classificacao.txt","r");

	//Lê o arquivo até chegar ao fim
	while (!feof ($ponteiro)) {
		//Lê uma linha do arquivo
		$linha = fgets($ponteiro, 200);
		// Atribui as colunas as variaveis
		$CO_SERVICO = trim((substr(($linha),0,3)));
		$CO_CLASSIFICACAO = trim((substr(($linha),3,3)));
		$NO_CLASSIFICACAO = addslashes(trim(utf8_encode(substr(($linha),6,150))));
		$DT_COMPETENCIA  = trim((substr(($linha),156,6)));

		
		if($CO_SERVICO != ''){
			// código para o banco de dados
			$sql = "INSERT INTO sigtap_tb_servico_classificacao (CO_SERVICO, CO_CLASSIFICACAO,NO_CLASSIFICACAO,  DT_COMPETENCIA)".
				" VALUES('$CO_SERVICO', '$CO_CLASSIFICACAO','$NO_CLASSIFICACAO', '$DT_COMPETENCIA')";
			if (mysqli_query($conn, $sql)) {
				//echo "New record created successfully";
				
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}								
		}
		
	}//Fecha while

	//Fecha o ponteiro do arquivo
	fclose ($ponteiro);
}
############################### FIM IMPORTAR tb_servico_classificacao #####################################