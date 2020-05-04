<?php

	############################### IMPORTAR tb_cid #####################################
function import_sigtap_tb_cid($conn){

	//Abre o arquivo txt - tb_sub_grupo
	$ponteiro = fopen ("tabelas/tb_cid.txt","r");
	$sql = "INSERT INTO sigtap_tb_cid (CO_CID, NO_CID, TP_AGRAVO, TP_SEXO, TP_ESTADIO,VL_CAMPOS_IRRADIADOS) VALUES ";
	$contador = 1;
	
	//Lê o arquivo até chegar ao fim
	while (!feof ($ponteiro)) {
		//Lê uma linha do arquivo
		$linha = fgets($ponteiro, 130);
		// Atribui as colunas as variaveis
		$CO_CID = trim((substr(($linha),0,4)));
		$NO_CID = addslashes(trim((substr(($linha),4,100))));
		$TP_AGRAVO = trim((substr(($linha),104,1)));
		$TP_SEXO = trim((substr(($linha),105,1)));
		$TP_ESTADIO = trim((substr(($linha),106,1)));
		$VL_CAMPOS_IRRADIADOS  = trim((substr(($linha),107,4)));
		
		if($CO_CID != ''){
			// código para o banco de dados
			
			$sql .="('$CO_CID', '$NO_CID', '$TP_AGRAVO', '$TP_SEXO', '$TP_ESTADIO','$VL_CAMPOS_IRRADIADOS'),";
			$contador++;
			if($contador == 200){
				$sql = substr_replace($sql, '', -1);
				
				if(!mysqli_query($conn, $sql)){
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
				$sql = "INSERT INTO sigtap_tb_cid (CO_CID, NO_CID, TP_AGRAVO, TP_SEXO, TP_ESTADIO,VL_CAMPOS_IRRADIADOS) VALUES ";
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
############################### FIM IMPORTAR tb_cid #####################################