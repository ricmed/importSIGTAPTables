<?php
	############################### IMPORTAR rl_procedimento_servico #####################################
function import_sigtap_rl_procedimento_servico($conn){

	//Abre o arquivo txt - rl_procedimento_servico
	$ponteiro = fopen ("tabelas/rl_procedimento_servico.txt","r");
	$sql = "INSERT INTO sigtap_rl_procedimento_servico (CO_PROCEDIMENTO, CO_SERVICO, CO_CLASSIFICACAO,  DT_COMPETENCIA) VALUES";
	$contador = 1;

	//Lê o arquivo até chegar ao fim
	while (!feof ($ponteiro)) {
		//Lê uma linha do arquivo
		$linha = fgets($ponteiro, 80);
		// Atribui as colunas as variaveis
		$CO_PROCEDIMENTO = trim((substr(($linha),0,10)));
		$CO_SERVICO = trim((substr(($linha),10,3)));
		$CO_CLASSIFICACAO = trim((substr(($linha),13,3)));
		$DT_COMPETENCIA  = trim((substr(($linha),16,6)));

		if($CO_PROCEDIMENTO != ''){
			// código para o banco de dados
			$sql .= " ('$CO_PROCEDIMENTO', '$CO_SERVICO','$CO_CLASSIFICACAO', '$DT_COMPETENCIA'),";
			$contador++;
			if($contador == 100){
				$sql = substr_replace($sql, '', -1);
				mysqli_query($conn, $sql);
				$sql = "INSERT INTO sigtap_rl_procedimento_servico (CO_PROCEDIMENTO, CO_SERVICO, CO_CLASSIFICACAO,  DT_COMPETENCIA) VALUES ";
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
############################### FIM IMPORTAR rl_procedimento_servico #####################################