<?php
	############################### IMPORTAR tb_detalhe #####################################
	function import_sigtap_tb_detalhe($conn){

	//Abre o arquivo txt - tb_sub_grupo
	$ponteiro = fopen ("tabelas/tb_detalhe.txt","r");

	//Lê o arquivo até chegar ao fim
	while (!feof ($ponteiro)) {
		//Lê uma linha do arquivo
		$linha = fgets($ponteiro, 300);
		// Atribui as colunas as variaveis
		$CO_DETALHE = trim((substr(($linha),0,3)));
		$NO_DETALHE = trim((substr(utf8_encode($linha),3,100)));
		$DT_COMPETENCIA  = trim((substr(($linha),103,6)));
		
		if($CO_DETALHE != ''){
			// código para o banco de dados
			$sql = "INSERT INTO sigtap_tb_detalhe (CO_DETALHE, NO_DETALHE,  DT_COMPETENCIA)".
				" VALUES('$CO_DETALHE', '$NO_DETALHE','$DT_COMPETENCIA')";
			if (mysqli_query($conn, $sql)) {
				//echo "New record created successfully";
				
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}			
			
			
		}
		
	}//Fecha while

	//Fecha o ponteiro do arquivo
	fclose ($ponteiro);

############################### FIM IMPORTAR tb_detalhe #####################################
}
