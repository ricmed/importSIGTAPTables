<?php
	############################### IMPORTAR tb_sia_sih #####################################
function import_sigtap_tb_sia_sih($conn){

	//Abre o arquivo txt - tb_sia_sih
	$ponteiro = fopen ("tabelas/tb_sia_sih.txt","r");
	$sql = "INSERT INTO sigtap_tb_sia_sih (CO_PROCEDIMENTO_SIA_SIH, NO_PROCEDIMENTO_SIA_SIH, TP_PROCEDIMENTO, DT_COMPETENCIA) VALUES";
	$contador =1;
	//Lê o arquivo até chegar ao fim
	while (!feof ($ponteiro)) {
		//Lê uma linha do arquivo
		$linha = fgets($ponteiro, 140);
		// Atribui as colunas as variaveis
		$CO_PROCEDIMENTO_SIA_SIH = trim((substr(($linha),0,10)));
		$NO_PROCEDIMENTO_SIA_SIH = trim(utf8_encode(substr(($linha),10,100)));
		$TP_PROCEDIMENTO = trim((substr(($linha),110,1)));
		$DT_COMPETENCIA = trim((substr(($linha),111,6)));
		
		if($CO_PROCEDIMENTO_SIA_SIH != ''){
			// código para o banco de dados
			$sql .= "('$CO_PROCEDIMENTO_SIA_SIH', '$NO_PROCEDIMENTO_SIA_SIH', '$TP_PROCEDIMENTO', '$DT_COMPETENCIA'),";
			$contador++;
			if($contador == 100){
				$sql = substr_replace($sql, '', -1);
				mysqli_query($conn, $sql);
				$sql = "INSERT INTO sigtap_tb_sia_sih (CO_PROCEDIMENTO_SIA_SIH, NO_PROCEDIMENTO_SIA_SIH, TP_PROCEDIMENTO, DT_COMPETENCIA) VALUES";
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
############################### FIM IMPORTAR tb_sia_sih #####################################