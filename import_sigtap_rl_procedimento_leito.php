<?php
	############################### IMPORTAR rl_procedimento_leito #####################################
function import_sigtap_rl_procedimento_leito($conn){

	//Abre o arquivo txt - rl_procedimento_leito
	$ponteiro = fopen ("tabelas/rl_procedimento_leito.txt","r");
	$sql = "INSERT INTO sigtap_rl_procedimento_leito (CO_PROCEDIMENTO, CO_TIPO_LEITO, DT_COMPETENCIA) VALUES ";
	$contador = 1;
	
	//Lê o arquivo até chegar ao fim
	while (!feof ($ponteiro)) {
		//Lê uma linha do arquivo
		$linha = fgets($ponteiro, 130);
		// Atribui as colunas as variaveis
		$CO_PROCEDIMENTO = trim((substr(($linha),0,10)));
		$CO_TIPO_LEITO = trim(utf8_encode(substr(($linha),10,2)));
		$DT_COMPETENCIA  = trim((substr(($linha),12,6)));
		
		if($CO_PROCEDIMENTO != ''){
			// código para o banco de dados
			
			$sql .= "('$CO_PROCEDIMENTO', '$CO_TIPO_LEITO', '$DT_COMPETENCIA'),";
			$contador++;
			if($contador == 200){
				$sql = substr_replace($sql, '', -1);
				
				if(!mysqli_query($conn, $sql)){
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
				$sql = "INSERT INTO sigtap_rl_procedimento_leito (CO_PROCEDIMENTO, CO_TIPO_LEITO, DT_COMPETENCIA) VALUES ";
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
############################### FIM IMPORTAR rl_procedimento_leito #####################################