<?php
	############################### IMPORTAR rl_procedimento_compativel #####################################
function import_sigtap_rl_procedimento_compativel($conn){

	//Abre o arquivo txt - rl_procedimento_compativel
	$ponteiro = fopen ("tabelas/rl_procedimento_compativel.txt","r");
	$sql = "INSERT INTO sigtap_rl_procedimento_compativel (CO_PROCEDIMENTO_PRINCIPAL, CO_REGISTRO_PRINCIPAL, CO_PROCEDIMENTO_COMPATIVEL, CO_REGISTRO_COMPATIVEL, TP_COMPATIBILIDADE, QT_PERMITIDA, DT_COMPETENCIA) VALUES ";
	$contador = 0;
	//Lê o arquivo até chegar ao fim
	while (!feof ($ponteiro)) {
		//Lê uma linha do arquivo
		$linha = fgets($ponteiro, 40);
		// Atribui as colunas as variaveis
		$CO_PROCEDIMENTO_PRINCIPAL = trim((substr(($linha),0,10)));
		$CO_REGISTRO_PRINCIPAL = trim((substr(($linha),10,2)));
		$CO_PROCEDIMENTO_COMPATIVEL = (trim((substr(($linha),12,10)))) ;
		$CO_REGISTRO_COMPATIVEL = (trim((substr(($linha),22,2)))) ;
		$TP_COMPATIBILIDADE = (trim((substr(($linha),24,1)))) ;
		$QT_PERMITIDA = (trim((substr(($linha),25,4)))) ;
		$DT_COMPETENCIA = trim((substr(($linha),29,6)));
		
		if($CO_PROCEDIMENTO_PRINCIPAL != ''){
			// código para o banco de dados
			$sql .="('$CO_PROCEDIMENTO_PRINCIPAL', '$CO_REGISTRO_PRINCIPAL', '$CO_PROCEDIMENTO_COMPATIVEL', '$CO_REGISTRO_COMPATIVEL', '$TP_COMPATIBILIDADE', '$QT_PERMITIDA', '$DT_COMPETENCIA'),";
			$contador++;
			if($contador == 100){
				$sql = substr_replace($sql, '', -1);
				mysqli_query($conn, $sql);
				$sql = "INSERT INTO sigtap_rl_procedimento_compativel (CO_PROCEDIMENTO_PRINCIPAL, CO_REGISTRO_PRINCIPAL, CO_PROCEDIMENTO_COMPATIVEL, CO_REGISTRO_COMPATIVEL, TP_COMPATIBILIDADE, QT_PERMITIDA, DT_COMPETENCIA) VALUES ";
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
############################### FIM IMPORTAR rl_procedimento_compativel #####################################