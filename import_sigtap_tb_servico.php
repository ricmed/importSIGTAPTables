<?php
	############################### IMPORTAR tb_servico #####################################
function import_sigtap_tb_servico($conn){

	//Abre o arquivo txt - tb_servico
	$ponteiro = fopen ("tabelas/tb_servico.txt","r");

	//Lê o arquivo até chegar ao fim
	while (!feof ($ponteiro)) {
		//Lê uma linha do arquivo
		$linha = fgets($ponteiro, 200);
		// Atribui as colunas as variaveis
		$CO_SERVICO = trim((substr(($linha),0,3)));
		$NO_SERVICO = addslashes(trim((substr(($linha),3,120))));
		$DT_COMPETENCIA  = trim((substr(($linha),123,6)));

		if($CO_SERVICO != ''){
			// código para o banco de dados
			$sql = "INSERT INTO sigtap_tb_servico (CO_SERVICO, NO_SERVICO,  DT_COMPETENCIA)".
				" VALUES('$CO_SERVICO', '$NO_SERVICO','$DT_COMPETENCIA')";
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
############################### FIM IMPORTAR tb_servico #####################################