<?php
function import_sigtap_tb_habilitacao($conn){
############################### IMPORTAR tb_habilitacao #####################################

	//Abre o arquivo txt - tb_habilitacao
	$ponteiro = fopen ("tabelas/tb_habilitacao.txt","r");
	$sql = "INSERT INTO sigtap_tb_habilitacao VALUES";
	$contador = 1;
	//Lê o arquivo até chegar ao fim
	while (!feof ($ponteiro)) {
		//Lê uma linha do arquivo
		$linha = fgets($ponteiro, 170);
		// Atribui as colunas as variaveis
		$CO_HABILITACAO = trim((substr(($linha),0,4)));
		$NO_HABILITACAO = trim((substr(($linha),4,150)));
		$DT_COMPETENCIA = trim((substr(($linha),154,6)));
		
		
		if($CO_HABILITACAO != ''){
			// código para o banco de dados
			$sql .= "('$CO_HABILITACAO', '$NO_HABILITACAO', '$DT_COMPETENCIA'),";
			$contador++;
			if($contador == 100){
				$sql = substr_replace($sql, '', -1);
				mysqli_query($conn, $sql);
				$sql = "INSERT INTO sigtap_tb_habilitacao VALUES";
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

############################### FIM IMPORTAR tb_habilitacao #####################################