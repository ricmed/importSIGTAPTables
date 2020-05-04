<?php
	############################### IMPORTAR rl_procedimento_incremento #####################################
function import_sigtap_rl_procedimento_incremento($conn){

	//Abre o arquivo txt - rl_procedimento_incremento
	$ponteiro = fopen ("tabelas/rl_procedimento_incremento.txt","r");
	$sql = "INSERT INTO sigtap_rl_procedimento_incremento (CO_PROCEDIMENTO, CO_HABILITACAO, VL_PERCENTUAL_SH, VL_PERCENTUAL_SA, VL_PERCENTUAL_SP, DT_COMPETENCIA) VALUES";
	$contador = 1;
	//Lê o arquivo até chegar ao fim
	while (!feof ($ponteiro)) {
		//Lê uma linha do arquivo
		$linha = fgets($ponteiro, 50);
		// Atribui as colunas as variaveis
		$CO_PROCEDIMENTO = trim((substr(($linha),0,10)));
		$CO_HABILITACAO = trim((substr(($linha),10,4)));
		$VL_PERCENTUAL_SH = (double)(trim((substr(($linha),14,7))))/100 ;
		$VL_PERCENTUAL_SA = (double)(trim((substr(($linha),21,7))))/100 ;
		$VL_PERCENTUAL_SP = (double)(trim((substr(($linha),28,7))))/100 ;
		$DT_COMPETENCIA = trim((substr(($linha),35,6)));

	
		if($CO_PROCEDIMENTO != ''){
			// código para o banco de dados
			$sql .= "('$CO_PROCEDIMENTO', '$CO_HABILITACAO', '$VL_PERCENTUAL_SH', '$VL_PERCENTUAL_SA', '$VL_PERCENTUAL_SP', '$DT_COMPETENCIA'),";
			$contador++;
			if($contador == 100){
				$sql = substr_replace($sql, '', -1);
				mysqli_query($conn, $sql);
				$sql = "INSERT INTO sigtap_rl_procedimento_incremento (CO_PROCEDIMENTO, CO_HABILITACAO, VL_PERCENTUAL_SH, VL_PERCENTUAL_SA, VL_PERCENTUAL_SP, DT_COMPETENCIA) VALUES";
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
############################### FIM IMPORTAR rl_procedimento_incremento #####################################