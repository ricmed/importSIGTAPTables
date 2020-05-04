<?php
	############################### IMPORTAR tb_tipo_leito #####################################
function import_sigtap_tb_tipo_leito($conn){

	//Abre o arquivo txt - tb_sub_grupo
	$ponteiro = fopen ("tabelas/tb_tipo_leito.txt","r");

	//Lê o arquivo até chegar ao fim
	while (!feof ($ponteiro)) {
		//Lê uma linha do arquivo
		$linha = fgets($ponteiro, 100);
		// Atribui as colunas as variaveis
		$CO_TIPO_LEITO = trim((substr(($linha),0,2)));
		$NO_TIPO_LEITO = trim((substr(($linha),2,60)));
		$DT_COMPETENCIA  = trim((substr(($linha),62,6)));

		
		if($CO_TIPO_LEITO != ''){
			// código para o banco de dados
			$sql = "INSERT INTO sigtap_tb_tipo_leito (CO_TIPO_LEITO, NO_TIPO_LEITO, DT_COMPETENCIA)".
				" VALUES('$CO_TIPO_LEITO', '$NO_TIPO_LEITO', '$DT_COMPETENCIA')";
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
############################### FIM IMPORTAR tb_tipo_leito #####################################