<?php
	############################### IMPORTAR rl_procedimento_sia_sih #####################################
function import_sigtap_rl_procedimento_sia_sih($conn){

	//Abre o arquivo txt - rl_procedimento_sia_sih
	$ponteiro = fopen ("tabelas/rl_procedimento_sia_sih.txt","r");
	$sql = "INSERT INTO sigtap_rl_procedimento_sia_sih (CO_PROCEDIMENTO, CO_PROCEDIMENTO_SIA_SIH, TP_PROCEDIMENTO, DT_COMPETENCIA) VALUES";
	$contador = 1;

	//Lê o arquivo até chegar ao fim
	while (!feof ($ponteiro)) {
		//Lê uma linha do arquivo
		$linha = fgets($ponteiro, 40);
		// Atribui as colunas as variaveis
		$CO_PROCEDIMENTO = trim((substr(($linha),0,10)));
		$CO_PROCEDIMENTO_SIA_SIH = trim((substr(($linha),10,10)));
		$TP_PROCEDIMENTO = trim((substr(($linha),20,1)));
		$DT_COMPETENCIA = trim((substr(($linha),21,6)));

		if($CO_PROCEDIMENTO != ''){
			// código para o banco de dados
			$sql .= "('$CO_PROCEDIMENTO', '$CO_PROCEDIMENTO_SIA_SIH', '$TP_PROCEDIMENTO', '$DT_COMPETENCIA'),";
			$contador++;
			if($contador == 100){
				$sql = substr_replace($sql, '', -1);
				mysqli_query($conn, $sql);
				$sql = "INSERT INTO sigtap_rl_procedimento_sia_sih (CO_PROCEDIMENTO, CO_PROCEDIMENTO_SIA_SIH, TP_PROCEDIMENTO, DT_COMPETENCIA) VALUES";
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
############################### FIM IMPORTAR rl_procedimento_sia_sih #####################################