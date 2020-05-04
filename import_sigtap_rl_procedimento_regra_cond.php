<?php
	############################### IMPORTAR rl_procedimento_regra_cond #####################################
function import_sigtap_rl_procedimento_regra_cond($conn){

	//Abre o arquivo txt - rl_procedimento_regra_cond
	$ponteiro = fopen ("tabelas/rl_procedimento_regra_cond.txt","r");

	//Lê o arquivo até chegar ao fim
	while (!feof ($ponteiro)) {
		//Lê uma linha do arquivo
		$linha = fgets($ponteiro, 20);
		// Atribui as colunas as variaveis
		$CO_PROCEDIMENTO = trim((substr(($linha),0,10)));
		$CO_REGRA_CONDICIONADA = trim((substr(($linha),10,4)));

		if($CO_PROCEDIMENTO != ''){
			// código para o banco de dados
			$sql = "INSERT INTO sigtap_rl_procedimento_regra_cond (CO_PROCEDIMENTO, CO_REGRA_CONDICIONADA)".
				" VALUES('$CO_PROCEDIMENTO', '$CO_REGRA_CONDICIONADA')";
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
############################### FIM IMPORTAR rl_procedimento_regra_cond #####################################