<?php
	############################### IMPORTAR tb_componente_rede #####################################
function import_sigtap_tb_componente_rede($conn){

	//Abre o arquivo txt - tb_componente_rede
	$ponteiro = fopen ("tabelas/tb_componente_rede.txt","r");

	//Lê o arquivo até chegar ao fim
	while (!feof ($ponteiro)) {
		//Lê uma linha do arquivo
		$linha = fgets($ponteiro, 190);
		// Atribui as colunas as variaveis
		$CO_COMPONENTE_REDE = trim((substr(($linha),0,10)));
		$NO_COMPONENTE_REDE = trim((substr(($linha),10,150)));
		$CO_REDE_ATENCAO = trim((substr(($linha),160,3)));

		if($CO_COMPONENTE_REDE != ''){
			// código para o banco de dados
			$sql = "INSERT INTO sigtap_tb_componente_rede (CO_COMPONENTE_REDE, NO_COMPONENTE_REDE, CO_REDE_ATENCAO)".
				" VALUES('$CO_COMPONENTE_REDE', '$NO_COMPONENTE_REDE', '$CO_REDE_ATENCAO')";
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
############################### FIM IMPORTAR tb_componente_rede #####################################