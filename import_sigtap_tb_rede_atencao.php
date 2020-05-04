<?php
	############################### IMPORTAR tb_rede_atencao #####################################
function import_sigtap_tb_rede_atencao($conn){

	//Abre o arquivo txt - tb_rede_atencao
	$ponteiro = fopen ("tabelas/tb_rede_atencao.txt","r");

	//Lê o arquivo até chegar ao fim
	while (!feof ($ponteiro)) {
		//Lê uma linha do arquivo
		$linha = fgets($ponteiro, 60);
		// Atribui as colunas as variaveis
		$CO_REDE_ATENCAO = trim((substr(($linha),0,3)));
		$NO_REDE_ATENCAO = trim((substr(($linha),3,50)));

		if($CO_REDE_ATENCAO != ''){
			// código para o banco de dados
			$sql = "INSERT INTO sigtap_tb_rede_atencao (CO_REDE_ATENCAO, NO_REDE_ATENCAO)".
				" VALUES('$CO_REDE_ATENCAO', '$NO_REDE_ATENCAO')";
			if (mysqli_query($conn, $sql)) {
			//echo "New record created successfully";
			
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			
		}
		
	}//Fecha while

	//Fecha o ponteiro do arquivo
	fclose ($ponteiro);
	unset($sql);
}
############################### FIM IMPORTAR tb_rede_atencao #####################################