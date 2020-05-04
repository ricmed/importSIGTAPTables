<?php
	############################### IMPORTAR rl_procedimento_renases #####################################
function import_sigtap_rl_procedimento_renases($conn){

	//Abre o arquivo txt - rl_procedimento_renases
	$ponteiro = fopen ("tabelas/rl_procedimento_renases.txt","r");
	$sql = "INSERT INTO sigtap_rl_procedimento_renases (CO_PROCEDIMENTO, CO_RENASES) VALUES";
	$contador = 1;
	//Lê o arquivo até chegar ao fim
	while (!feof ($ponteiro)) {
		//Lê uma linha do arquivo
		$linha = fgets($ponteiro, 30);
		// Atribui as colunas as variaveis
		$CO_PROCEDIMENTO = trim((substr(($linha),0,10)));
		$CO_RENASES = trim((substr(($linha),10,10)));

		if($CO_PROCEDIMENTO != ''){
			// código para o banco de dados
			$sql .= "('$CO_PROCEDIMENTO', '$CO_RENASES'),";
			$contador++;
			if($contador == 100){
				$sql = substr_replace($sql, '', -1);
				mysqli_query($conn, $sql);
				$sql = "INSERT INTO sigtap_rl_procedimento_renases (CO_PROCEDIMENTO, CO_RENASES) VALUES ";
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
############################### FIM IMPORTAR rl_procedimento_renases #####################################