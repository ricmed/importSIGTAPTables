<?php
	############################### IMPORTAR tb_grupo_habilitacao #####################################
function import_sigtap_tb_grupo_habilitacao($conn){

	//Abre o arquivo txt - tb_grupo_habilitacao
	$ponteiro = fopen ("tabelas/tb_grupo_habilitacao.txt","r");

	//Lê o arquivo até chegar ao fim
	while (!feof ($ponteiro)) {
		//Lê uma linha do arquivo
		$linha = fgets($ponteiro, 280);
		// Atribui as colunas as variaveis
		$NU_GRUPO_HABILITACAO = trim((substr(($linha),0,4)));
		$NO_GRUPO_HABILITACAO = trim(utf8_encode(substr(($linha),4,20)));
		$DS_GRUPO_HABILITACAO = trim((substr(($linha),24,250)));

		if($NU_GRUPO_HABILITACAO != ''){
			// código para o banco de dados
			$sql = "INSERT INTO sigtap_tb_grupo_habilitacao (NU_GRUPO_HABILITACAO, NO_GRUPO_HABILITACAO, DS_GRUPO_HABILITACAO)".
				" VALUES('$NU_GRUPO_HABILITACAO', '$NO_GRUPO_HABILITACAO', '$DS_GRUPO_HABILITACAO')";
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
############################### FIM IMPORTAR tb_grupo_habilitacao #####################################