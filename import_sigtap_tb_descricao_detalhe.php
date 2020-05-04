<?php
	############################### IMPORTAR TB_DESCRICAO_DETALHE #####################################
	function import_sigtap_tb_descricao_detalhe($conn){

	//Abre o arquivo txt - tb_sub_grupo
	$ponteiro = fopen ("tabelas/tb_descricao_detalhe.txt","r");

	//Lê o arquivo até chegar ao fim
	while (!feof ($ponteiro)) {
		//Lê uma linha do arquivo
		$linha = fgets($ponteiro, 4100);
		// Atribui as colunas as variaveis
		$CO_DETALHE = trim((substr(($linha),0,3)));
		$DS_DETALHE = addslashes(trim((substr(($linha),3,4000))));
		$DT_COMPETENCIA  = trim((substr(($linha),4003,6)));

		if($CO_DETALHE != ''){
			// código para o banco de dados
			$sql = "INSERT INTO sigtap_tb_descricao_detalhe (CO_DETALHE, DS_DETALHE,  DT_COMPETENCIA)".
				" VALUES('$CO_DETALHE', '$DS_DETALHE','$DT_COMPETENCIA')";
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
############################### FIM IMPORTAR TB_DESCRICAO_DETALHE  #####################################