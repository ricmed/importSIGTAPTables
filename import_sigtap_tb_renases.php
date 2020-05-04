<?php
	############################### IMPORTAR tb_renases #####################################
function import_sigtap_tb_renases($conn){

	//Abre o arquivo txt - tb_renases
	$ponteiro = fopen ("tabelas/tb_renases.txt","r");
	$sql = "INSERT INTO sigtap_tb_renases (CO_RENASES, NO_RENASES) VALUES";
	$contador = 1;

	//Lê o arquivo até chegar ao fim
	while (!feof ($ponteiro)) {
		//Lê uma linha do arquivo
		$linha = fgets($ponteiro, 170);
		// Atribui as colunas as variaveis
		$CO_RENASES = trim((substr(($linha),0,10)));
		$NO_RENASES = trim((substr(($linha),10,150)));

		if($CO_RENASES != ''){
			// código para o banco de dados
			$sql .= "('$CO_RENASES', '$NO_RENASES'),";
			$contador++;
			if($contador == 200){
				$sql = substr_replace($sql, '', -1);
				mysqli_query($conn, $sql);
								
				$sql = "INSERT INTO sigtap_tb_renases (CO_RENASES, NO_RENASES) VALUES";
				$contador = 1;
			}
		}
		else{
			$sql = substr_replace($sql, '', -1);
			mysqli_query($conn, $sql);
		}
		
	}//Fecha while

	//Fecha o ponteiro do arquivo
	fclose ($ponteiro);
}
############################### FIM IMPORTAR tb_renases #####################################