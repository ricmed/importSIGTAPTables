<?php
	############################### IMPORTAR RL_PROCEDIMENTO_DETALHE #####################################
function import_sigtap_rl_procedimento_detalhe($conn){

	//Abre o arquivo txt - 	rl_procedimento_detalhe
	$ponteiro = fopen ("tabelas/rl_procedimento_detalhe.txt","r");
	$sql = "INSERT INTO sigtap_rl_procedimento_detalhe (CO_PROCEDIMENTO, CO_DETALHE, DT_COMPETENCIA) VALUES ";
	$contador=0;

	//Lê o arquivo até chegar ao fim
	while (!feof ($ponteiro)) {
		//Lê uma linha do arquivo
		$linha = fgets($ponteiro, 50);

		$CO_PROCEDIMENTO = trim((substr(($linha),0,10)));
		$CO_DETALHE = trim((substr(($linha),10,3)));
		$DT_COMPETENCIA  = trim((substr(($linha),13,6)));

		if($CO_PROCEDIMENTO != ''){
			// código para o banco de dados

			$sql .= " ('$CO_PROCEDIMENTO', '$CO_DETALHE','$DT_COMPETENCIA'),";
			$contador++;
			if($contador == 100){
				$sql = substr_replace($sql, '', -1);
				mysqli_query($conn, $sql);
				$sql = "INSERT INTO sigtap_rl_procedimento_detalhe (CO_PROCEDIMENTO, CO_DETALHE, DT_COMPETENCIA) VALUES ";
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
############################### FIM IMPORTAR RL_PROCEDIMENTO_DETALHE #####################################