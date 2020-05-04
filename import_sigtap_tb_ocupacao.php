<?php
	############################### IMPORTAR tb_ocupacao #####################################
function import_sigtap_tb_ocupacao($conn){

	//Abre o arquivo txt - tb_ocupacao
	$ponteiro = fopen ("tabelas/tb_ocupacao.txt","r");
	$sql = "INSERT INTO sigtap_tb_ocupacao (CO_OCUPACAO, NO_OCUPACAO) VALUES ";
	$contador = 1;
	
	//Lê o arquivo até chegar ao fim
	while (!feof ($ponteiro)) {
		//Lê uma linha do arquivo
		$linha = fgets($ponteiro, 180);
		// Atribui as colunas as variaveis
		$CO_OCUPACAO = trim((substr(($linha),0,6)));
		$NO_OCUPACAO = trim((substr(($linha),6,150)));

		if($CO_OCUPACAO != ''){
			// código para o banco de dados
			$sql .= "('$CO_OCUPACAO', '$NO_OCUPACAO'),";
			$contador++;
			if($contador == 200){
				$sql = substr_replace($sql, '', -1);
				
				if(!mysqli_query($conn, $sql)){
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
				$sql = "INSERT INTO sigtap_tb_ocupacao (CO_OCUPACAO, NO_OCUPACAO) VALUES ";
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
############################### FIM IMPORTAR tb_ocupacao #####################################