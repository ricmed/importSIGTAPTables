<?php
	############################### IMPORTAR OS SUBGRUPOS #####################################
	function import_sigtap_tb_rubrica($conn){

	//Abre o arquivo txt - tb_sub_grupo
	$ponteiro = fopen ("tabelas/tb_rubrica.txt","r");
	$sql = "INSERT INTO sigtap_tb_rubrica (CO_RUBRICA, NO_RUBRICA, DT_COMPETENCIA) VALUES ";
	$contador = 1;
	//Lê o arquivo até chegar ao fim
	while (!feof ($ponteiro)) {
		//Lê uma linha do arquivo
		$linha = fgets($ponteiro, 300);
		// Atribui as colunas as variaveis
		$CO_RUBRICA = trim((substr(($linha),0,6)));
		$NO_RUBRICA = utf8_encode(addslashes(trim((substr(($linha),6,100)))));
		$DT_COMPETENCIA  = trim((substr(($linha),106,6)));
						
		if($CO_RUBRICA != ''){
			// código para o banco de dados
			$sql .=" ('$CO_RUBRICA', '$NO_RUBRICA', '$DT_COMPETENCIA'),";
			$contador++;
			if($contador == 200){
				$sql = substr_replace($sql, '', -1);
				
				if(!mysqli_query($conn, $sql)){
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
				$sql = "INSERT INTO sigtap_tb_rubrica (CO_RUBRICA, NO_RUBRICA, DT_COMPETENCIA) VALUES ";
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
############################### FIM IMPORTAR OS SUBGRUPOS #####################################