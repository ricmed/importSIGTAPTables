<?php
	############################### IMPORTAR tb_descricao #####################################
function import_sigtap_tb_descricao($conn){

	//Abre o arquivo txt - tb_descricao
	$ponteiro = fopen ("tabelas/tb_descricao.txt","r");
	$sql = "INSERT INTO sigtap_tb_descricao (CO_PROCEDIMENTO, DS_PROCEDIMENTO, DT_COMPETENCIA) VALUES";
	$contador=0;
	//Lê o arquivo até chegar ao fim
	while (!feof ($ponteiro)) {
		//Lê uma linha do arquivo
		$linha = fgets($ponteiro, 4100);
		// Atribui as colunas as variaveis
		$CO_PROCEDIMENTO = trim((substr(($linha),0,10)));
		$DS_PROCEDIMENTO = addslashes(trim((substr(($linha),10,4000))));
		$DT_COMPETENCIA = trim((substr(($linha),4010,6)));
		
		if($CO_PROCEDIMENTO != ''){
			// código para o banco de dados
			$sql .= "('$CO_PROCEDIMENTO', '$DS_PROCEDIMENTO', '$DT_COMPETENCIA'),";
			$contador++;
			if($contador == 100){
				$sql = substr_replace($sql, '', -1);
				mysqli_query($conn, $sql);
				$sql = "INSERT INTO sigtap_tb_descricao (CO_PROCEDIMENTO, DS_PROCEDIMENTO, DT_COMPETENCIA) VALUES";
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
############################### FIM IMPORTAR tb_descricao #####################################