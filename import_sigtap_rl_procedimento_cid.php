<?php
	############################### IMPORTAR rl_procedimento_cid #####################################
function import_sigtap_rl_procedimento_cid($conn){

	//Abre o arquivo txt - rl_procedimento_cid
	$ponteiro = fopen ("tabelas/rl_procedimento_cid.txt","r");
	$sql = "INSERT INTO sigtap_rl_procedimento_cid (CO_PROCEDIMENTO, CO_CID, ST_PRINCIPAL, DT_COMPETENCIA) VALUES";
	$contador = 1;
	
	//Lê o arquivo até chegar ao fim
	while (!feof ($ponteiro)) {
		//Lê uma linha do arquivo
		$linha = fgets($ponteiro, 130);
		// Atribui as colunas as variaveis
		$CO_PROCEDIMENTO = trim((substr(($linha),0,10)));
		$CO_CID = trim((substr(($linha),10,4)));
		$ST_PRINCIPAL = trim((substr(($linha),14,1))); // pode ser principal S - Sim ou N -Não
		$DT_COMPETENCIA = trim((substr(($linha),15,6)));

		
		if($CO_PROCEDIMENTO != ''){
			// código para o banco de dados
			$sql .= "('$CO_PROCEDIMENTO', '$CO_CID', '$ST_PRINCIPAL', '$DT_COMPETENCIA'),";
			$contador++;
			if($contador == 300){
				$sql = substr_replace($sql, '', -1);
				mysqli_query($conn, $sql);
				$sql = "INSERT INTO sigtap_rl_procedimento_cid (CO_PROCEDIMENTO, CO_CID, ST_PRINCIPAL, DT_COMPETENCIA) VALUES";
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
############################### FIM IMPORTAR rl_procedimento_cid #####################################