<?php
	############################### IMPORTAR rl_procedimento_ocupacao #####################################
function import_sigtap_rl_procedimento_ocupacao($conn){

	//Abre o arquivo txt - rl_procedimento_ocupacao
	$ponteiro = fopen ("tabelas/rl_procedimento_ocupacao.txt","r");
	$sql = "INSERT INTO sigtap_rl_procedimento_ocupacao (CO_PROCEDIMENTO, CO_OCUPACAO, DT_COMPETENCIA) VALUES"; 
	$contador = 1;
	//Lê o arquivo até chegar ao fim
	while (!feof ($ponteiro)) {
		//Lê uma linha do arquivo
		$linha = fgets($ponteiro, 25);
		// Atribui as colunas as variaveis
		$CO_PROCEDIMENTO = trim((substr(($linha),0,10)));
		$CO_OCUPACAO = trim((substr(($linha),10,6)));
		$DT_COMPETENCIA = trim((substr(($linha),16,6)));
				
		if($CO_PROCEDIMENTO != ''){
			// código para o banco de dados
			$sql .= "('$CO_PROCEDIMENTO', '$CO_OCUPACAO', '$DT_COMPETENCIA'),";
			$contador++;
			if($contador == 250){
				$sql = substr_replace($sql, '', -1);
				mysqli_query($conn, $sql);
				$sql = "INSERT INTO sigtap_rl_procedimento_ocupacao (CO_PROCEDIMENTO, CO_OCUPACAO, DT_COMPETENCIA) VALUES";
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
############################### FIM IMPORTAR rl_procedimento_ocupacao #####################################