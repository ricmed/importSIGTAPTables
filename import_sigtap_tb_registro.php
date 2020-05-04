<?php
	############################### IMPORTAR TB_REGISTRO #####################################
function import_sigtap_tb_registro($conn){

	//Abre o arquivo txt - tb_registro
	$ponteiro = fopen ("tabelas/tb_registro.txt","r");

	//Lê o arquivo até chegar ao fim
	while (!feof ($ponteiro)) {
		//Lê uma linha do arquivo
		$linha = fgets($ponteiro, 300);
		// Atribui as colunas as variaveis
		$CO_REGISTRO = trim((substr(($linha),0,2)));
		$NO_REGISTRO = trim((substr(($linha),2,50)));
		$DT_COMPETENCIA  = trim((substr(($linha),52,6)));

		if($CO_REGISTRO != ''){
			// código para o banco de dados
			$sql = "INSERT INTO sigtap_tb_registro (CO_REGISTRO, NO_REGISTRO,  DT_COMPETENCIA)".
				" VALUES('$CO_REGISTRO', '$NO_REGISTRO','$DT_COMPETENCIA')";
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
############################### FIM IMPORTAR TB_REGISTRO #####################################