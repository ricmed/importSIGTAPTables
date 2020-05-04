<?php

function import_sigtap_tb_financiamento($conn){

	############################### 5. IMPORTAR TB_FINANCIAMENTO #####################################

	//Abre o arquivo txt - tb_financiamento
	$ponteiro = fopen ("tabelas/tb_financiamento.txt","r");
	
	//Lê o arquivo até chegar ao fim
	while (!feof ($ponteiro)) {
		//Lê uma linha do arquivo
		$linha = fgets($ponteiro, 200);
		
		//Atribuir campos as variaveis
		$CO_FINANCIAMENTO = trim(substr(($linha),0,2));
		$NO_FINANCIAMENTO= utf8_encode(trim((substr(($linha),2,100))));
		$DT_COMPETENCIA = trim((substr(($linha),102,6)));

		if($CO_FINANCIAMENTO != ''){
			// código para o banco de dados
			$sql = "INSERT INTO sigtap_tb_financiamento (CO_FINANCIAMENTO, NO_FINANCIAMENTO, DT_COMPETENCIA)".
				" VALUES('$CO_FINANCIAMENTO', '$NO_FINANCIAMENTO', '$DT_COMPETENCIA')";
			
			if (!mysqli_query($conn, $sql)) {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			
			} 
		}
			
	}//Fecha while

	//FECHA o ponteiro do arquivo
	fclose ($ponteiro);
	unset($sql);


	############################### FIM IMPORTAR TB_FINANCIAMENTO #####################################

}