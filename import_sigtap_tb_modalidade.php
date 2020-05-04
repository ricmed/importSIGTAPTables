<?php
	############################### IMPORTAR tb_modalidade #####################################
function import_sigtap_tb_modalidade($conn){

	//Abre o arquivo txt - tb_sub_grupo
	$ponteiro = fopen ("tabelas/tb_modalidade.txt","r");

	//Lê o arquivo até chegar ao fim
	while (!feof ($ponteiro)) {
		//Lê uma linha do arquivo
		$linha = fgets($ponteiro, 130);
		// Atribui as colunas as variaveis
		$CO_MODALIDADE = trim((substr(($linha),0,2)));
		$NO_MODALIDADE = trim((substr(utf8_encode($linha),2,100)));
		$DT_COMPETENCIA  = trim((substr(($linha),102,6)));

		if($CO_MODALIDADE != ''){
			// código para o banco de dados
			$sql = "INSERT INTO sigtap_tb_modalidade (CO_MODALIDADE, NO_MODALIDADE, DT_COMPETENCIA)".
				" VALUES('$CO_MODALIDADE', '$NO_MODALIDADE', '$DT_COMPETENCIA')";
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
############################### FIM IMPORTAR tb_modalidade #####################################