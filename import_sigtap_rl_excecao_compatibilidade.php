<?php
	############################### IMPORTAR rl_excecao_compatibilidade #####################################
function import_sigtap_rl_excecao_compatibilidade($conn){

	//Abre o arquivo txt - rl_excecao_compatibilidade
	$ponteiro = fopen ("tabelas/rl_excecao_compatibilidade.txt","r");
	$sql = "INSERT INTO sigtap_rl_excecao_compatibilidade (CO_PROCEDIMENTO_RESTRICAO, CO_PROCEDIMENTO_PRINCIPAL, CO_REGISTRO_PRINCIPAL, CO_REGISTRO_COMPATIVEL, CO_PROCEDIMENTO_COMPATIVEL, TP_COMPATIBILIDADE, DT_COMPETENCIA) VALUES";
	$contador = 0;
	//Lê o arquivo até chegar ao fim
	while (!feof ($ponteiro)) {
		//Lê uma linha do arquivo
		$linha = fgets($ponteiro, 50);
		// Atribui as colunas as variaveis
		$CO_PROCEDIMENTO_RESTRICAO = trim((substr(($linha),0,10)));
		$CO_PROCEDIMENTO_PRINCIPAL = trim((substr(($linha),10,10)));
		$CO_REGISTRO_PRINCIPAL = (trim((substr(($linha),20,2)))) ;
		$CO_REGISTRO_COMPATIVEL = (trim((substr(($linha),22,10)))) ;
		$CO_PROCEDIMENTO_COMPATIVEL = (trim((substr(($linha),32,2)))) ;
		$TP_COMPATIBILIDADE = (trim((substr(($linha),34,1)))) ;
		$DT_COMPETENCIA = trim((substr(($linha),35,6)));

		if($CO_PROCEDIMENTO_RESTRICAO != ''){
			// código para o banco de dados
			$sql .= "('$CO_PROCEDIMENTO_RESTRICAO', '$CO_PROCEDIMENTO_PRINCIPAL', '$CO_REGISTRO_PRINCIPAL', '$CO_REGISTRO_COMPATIVEL', '$CO_PROCEDIMENTO_COMPATIVEL', '$TP_COMPATIBILIDADE', '$DT_COMPETENCIA'),";
			
			if($contador == 100){
				$sql = substr_replace($sql, '', -1);
				mysqli_query($conn, $sql);
				$sql = "INSERT INTO sigtap_rl_excecao_compatibilidade (CO_PROCEDIMENTO_RESTRICAO, CO_PROCEDIMENTO_PRINCIPAL, CO_REGISTRO_PRINCIPAL, CO_REGISTRO_COMPATIVEL, CO_PROCEDIMENTO_COMPATIVEL, TP_COMPATIBILIDADE, DT_COMPETENCIA) VALUES";
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
############################### FIM IMPORTAR rl_excecao_compatibilidade #####################################