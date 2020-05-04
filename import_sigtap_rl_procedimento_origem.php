<?php
	############################### IMPORTAR rl_procedimento_origem #####################################
function import_sigtap_rl_procedimento_origem($conn){

	//Abre o arquivo txt - rl_procedimento_origem
	$ponteiro = fopen ("tabelas/rl_procedimento_origem.txt","r");

	//Lê o arquivo até chegar ao fim
	while (!feof ($ponteiro)) {
		//Lê uma linha do arquivo
		$linha = fgets($ponteiro, 40);
		// Atribui as colunas as variaveis
		$CO_PROCEDIMENTO = trim((substr(($linha),0,10)));
		$CO_PROCEDIMENTO_ORIGEM = trim((substr(($linha),10,10)));
		$DT_COMPETENCIA = trim((substr(($linha),20,6)));
		
		if($CO_PROCEDIMENTO != ''){
			// código para o banco de dados
			$sql = "INSERT INTO sigtap_rl_procedimento_origem (CO_PROCEDIMENTO, CO_PROCEDIMENTO_ORIGEM, DT_COMPETENCIA)".
				" VALUES('$CO_PROCEDIMENTO', '$CO_PROCEDIMENTO_ORIGEM', '$DT_COMPETENCIA')";
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
############################### FIM IMPORTAR rl_procedimento_origem #####################################