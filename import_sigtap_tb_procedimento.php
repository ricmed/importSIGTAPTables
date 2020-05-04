<?php

	############################### IMPORTAR TB_PROCEDIMENTO #####################################
function import_sigtap_tb_procedimento($conn){


	//Abre o arquivo txt - tb_procedimento
	$ponteiro = fopen ("tabelas/tb_procedimento.txt","r");
	$sql = "INSERT INTO sigtap_tb_procedimento (CO_PROCEDIMENTO, NO_PROCEDIMENTO, TP_COMPLEXIDADE, TP_SEXO, QT_MAXIMA_EXECUCAO,QT_DIAS_PERMANENCIA,QT_PONTOS,VL_IDADE_MINIMA,VL_IDADE_MAXIMA,VL_SH,VL_SA,VL_SP,CO_FINANCIAMENTO,CO_RUBRICA,QT_TEMPO_PERMANENCIA,DT_COMPETENCIA) VALUES ";
	$contador = 1;
	
	//Lê o arquivo até chegar ao fim
	while (!feof ($ponteiro)) {
		//Lê uma linha do arquivo
		$linha = fgets($ponteiro, 400);
		
		//Atribuir campos as variaveis
		$CO_PROCEDIMENTO = (substr(($linha),0,10));
		$NO_PROCEDIMENTO = addslashes(trim((substr(($linha),10,250))));
		$TP_COMPLEXIDADE = trim((substr(($linha),260,1)));
		$TP_SEXO = trim((substr(($linha),261,1)));
		$QT_MAXIMA_EXECUCAO = trim((substr(($linha),262,4)));  // 9999 se não se aplica
		$QT_DIAS_PERMANENCIA = trim((substr(($linha),266,4))); // 9999 se não se aplica
		$QT_PONTOS = trim((substr(($linha),270,4))); // 9999 se não se aplica
		$VL_IDADE_MINIMA = trim((substr(($linha),274,4)));  // de 0000 a 1571 meses. 9999 se nao se aplica
		$VL_IDADE_MAXIMA = trim((substr(($linha),278,4)));  // de 0000 a 1571 meses. 9999 se nao se aplica
		$VL_SH = (double)(trim((substr(($linha),282,10)))/100);
		$VL_SA = (double)trim((substr(($linha),292,10)))/100;
		$VL_SP = (double)trim((substr(($linha),302,10)))/100;
		$CO_FINANCIAMENTO = trim((substr(($linha),312,2)));
		$CO_RUBRICA = trim((substr(($linha),314,6)));
		$QT_TEMPO_PERMANENCIA =trim((substr(($linha),320,4)));
		$DT_COMPETENCIA = trim((substr(($linha),324,6)));

		if($CO_PROCEDIMENTO != ''){
			// código para o banco de dados
			$sql .= "('$CO_PROCEDIMENTO', '$NO_PROCEDIMENTO', '$TP_COMPLEXIDADE', '$TP_SEXO', '$QT_MAXIMA_EXECUCAO','$QT_DIAS_PERMANENCIA','$QT_PONTOS','$VL_IDADE_MINIMA','$VL_IDADE_MAXIMA','$VL_SH','$VL_SA','$VL_SP','$CO_FINANCIAMENTO','$CO_RUBRICA','$QT_TEMPO_PERMANENCIA','$DT_COMPETENCIA'),";
			$contador++;
			//echo $sql.'<br/><br/>';
			
			if($contador == 200){
				$sql = substr_replace($sql, '', -1);
				
				if(!mysqli_query($conn, $sql)){
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
				$sql = "INSERT INTO sigtap_tb_procedimento (CO_PROCEDIMENTO, NO_PROCEDIMENTO, TP_COMPLEXIDADE, TP_SEXO, QT_MAXIMA_EXECUCAO,QT_DIAS_PERMANENCIA,QT_PONTOS,VL_IDADE_MINIMA,VL_IDADE_MAXIMA,VL_SH,VL_SA,VL_SP,CO_FINANCIAMENTO,CO_RUBRICA,QT_TEMPO_PERMANENCIA,DT_COMPETENCIA) VALUES ";
				$contador = 1;
			}
		}
		else{
			$sql = substr_replace($sql, '', -1);
			mysqli_query($conn, $sql);
		}
		
				
	}//Fecha while

	//FECHA o ponteiro do arquivo
	fclose ($ponteiro);
//	$conn->close();
	############################### FIM IMPORTAR OS TB_PROCEDIMENTO #####################################


}
