<?php
	############################### IMPORTAR rl_procedimento_tuss #####################################
function import_sigtap_rl_procedimento_tuss($conn){

	//Abre o arquivo txt - rl_procedimento_tuss
	$ponteiro = fopen ("tabelas/rl_procedimento_tuss.txt","r");
	$sql = "INSERT INTO sigtap_rl_procedimento_tuss (CO_PROCEDIMENTO, CO_TUSS) VALUES";
	$contador = 1;
	//Lê o arquivo até chegar ao fim
	while (!feof ($ponteiro)) {
		//Lê uma linha do arquivo
		$linha = fgets($ponteiro, 30);
		// Atribui as colunas as variaveis
		$CO_PROCEDIMENTO = trim((substr(($linha),0,10)));
		$CO_TUSS = trim((substr(($linha),10,10)));

		if($CO_PROCEDIMENTO != ''){
			// código para o banco de dados
			$sql .= "('$CO_PROCEDIMENTO', '$CO_TUSS'),";
			$contador++;
			if($contador == 200){
				$sql = substr_replace($sql, '', -1);
				
				if(!mysqli_query($conn, $sql)){
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
				
				$sql = "INSERT INTO sigtap_rl_procedimento_tuss (CO_PROCEDIMENTO, CO_TUSS) VALUES";
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
############################### FIM IMPORTAR rl_procedimento_tuss #####################################