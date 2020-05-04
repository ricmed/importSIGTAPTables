<?php
	############################### IMPORTAR tb_regra_condicionada #####################################
function import_sigtap_tb_regra_condicionada($conn){

	//Abre o arquivo txt - tb_regra_condicionada
	$ponteiro = fopen ("tabelas/tb_regra_condicionada.txt","r");
	$sql = "INSERT INTO sigtap_tb_regra_condicionada (CO_REGRA_CONDICIONADA, NO_REGRA_CONDICIONADA, DS_REGRA_CONDICIONADA) VALUES";
	$contador = 0;
	//Lê o arquivo até chegar ao fim
	while (!feof ($ponteiro)) {
		//Lê uma linha do arquivo
		$linha = fgets($ponteiro, 4200);
		// Atribui as colunas as variaveis
		$CO_REGRA_CONDICIONADA = trim((substr(($linha),0,4)));
		$NO_REGRA_CONDICIONADA = trim(utf8_encode(substr(($linha),4,150)));
		$DS_REGRA_CONDICIONADA = trim((substr(($linha),154,4000)));


		if($CO_REGRA_CONDICIONADA != ''){
			// código para o banco de dados
			$sql .= "('$CO_REGRA_CONDICIONADA', '$NO_REGRA_CONDICIONADA', '$DS_REGRA_CONDICIONADA'),";
			if($contador == 100){
				$sql = substr_replace($sql, '', -1);
				if(mysqli_query($conn, $sql)){
					
				}
				else{echo 'erro';}
				$sql = "INSERT INTO sigtap_tb_regra_condicionada (CO_REGRA_CONDICIONADA, NO_REGRA_CONDICIONADA, DS_REGRA_CONDICIONADA) VALUES";
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
	unset($sql);
}
############################### FIM IMPORTAR tb_regra_condicionada #####################################