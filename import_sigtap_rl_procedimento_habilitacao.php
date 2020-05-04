<?php
	############################### IMPORTAR rl_procedimento_habilitacao #####################################
function import_sigtap_rl_procedimento_habilitacao($conn){

	//Abre o arquivo txt - rl_procedimento_habilitacao
	$ponteiro = fopen ("tabelas/rl_procedimento_habilitacao.txt","r");
	$sql = "INSERT INTO sigtap_rl_procedimento_habilitacao (CO_PROCEDIMENTO, CO_HABILITACAO, NU_GRUPO_HABILITACAO, DT_COMPETENCIA) VALUES";
	$contador = 1;
	//Lê o arquivo até chegar ao fim
	while (!feof ($ponteiro)) {
		//Lê uma linha do arquivo
		$linha = fgets($ponteiro, 30);
		// Atribui as colunas as variaveis
		$CO_PROCEDIMENTO = trim((substr(($linha),0,10)));
		$CO_HABILITACAO = trim((substr(($linha),10,4)));
		$NU_GRUPO_HABILITACAO = trim((substr(($linha),14,4)));
		$DT_COMPETENCIA = trim((substr(($linha),18,6)));

		if($CO_PROCEDIMENTO != ''){
			// código para o banco de dados
			$sql .= "('$CO_PROCEDIMENTO', '$CO_HABILITACAO', '$NU_GRUPO_HABILITACAO', '$DT_COMPETENCIA'),";
			$contador++;
			
			if($contador == 100){
				$sql = substr_replace($sql, '', -1);
				mysqli_query($conn, $sql);
				$sql = "INSERT INTO sigtap_rl_procedimento_habilitacao (CO_PROCEDIMENTO, CO_HABILITACAO, NU_GRUPO_HABILITACAO, DT_COMPETENCIA) VALUES";
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
############################### FIM IMPORTAR rl_procedimento_habilitacao #####################################