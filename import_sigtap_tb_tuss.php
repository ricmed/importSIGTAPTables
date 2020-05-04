<?php
	############################### IMPORTAR tb_tuss #####################################
function import_sigtap_tb_tuss($conn){

	//Abre o arquivo txt - tb_tuss
	$ponteiro = fopen ("tabelas/tb_tuss.txt","r");
	$sql = "INSERT INTO sigtap_tb_tuss (CO_TUSS, NO_TUSS) VALUES";
	$contador = 1;
	//Lê o arquivo até chegar ao fim
	while (!feof ($ponteiro)) {
		//Lê uma linha do arquivo
		$linha = fgets($ponteiro, 490);
		// Atribui as colunas as variaveis
		$CO_TUSS = trim((substr(($linha),0,10)));
		$NO_TUSS = trim(addslashes(substr(($linha),10,450)));

		if($CO_TUSS != ''){
			// código para o banco de dados
			$sql .= "('$CO_TUSS', '$NO_TUSS'),";
			$contador++;
			if($contador == 200){
				$sql = substr_replace($sql, '', -1);
				
				if(mysqli_query($conn, $sql)){
				
				}
				else{
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
				$sql = "INSERT INTO sigtap_tb_tuss (CO_TUSS, NO_TUSS) VALUES";
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
############################### FIM IMPORTAR tb_tuss #####################################