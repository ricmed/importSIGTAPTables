<?php

function import_sigtap_tb_forma_organizacao($conn){

	############################### 3. IMPORTAR A FORMA DE ORGANIZAÇÃO #####################################

	//Abre o arquivo txt - tb_forma_organizacao
	$ponteiro = fopen ("tabelas/tb_forma_organizacao.txt","r");
	$sql = "INSERT INTO sigtap_tb_forma_organizacao (CO_GRUPO, CO_SUB_GRUPO, CO_FORMA_ORGANIZACAO,NO_FORMA_ORGANIZACAO,DT_COMPETENCIA) VALUES ";
	$contador = 1;
	
	//Lê o arquivo até chegar ao fim
	while (!feof ($ponteiro)) {
	  //Lê uma linha do arquivo
	  $linha = fgets($ponteiro, 200);
	  // Atribui as colunas as variaveis
		$CO_GRUPO = trim((substr(($linha),0,2)));
		$CO_SUB_GRUPO = trim((substr(($linha),2,2)));
		$CO_FORMA_ORGANIZACAO = trim((substr(($linha),4,2)));
		$NO_FORMA_ORGANIZACAO = (trim((substr(($linha),6,100))));
		$DT_COMPETENCIA = trim((substr(($linha),106,6)));

		if($CO_GRUPO != ''){
			// código para o banco de dados
			$sql .= "('$CO_GRUPO', '$CO_SUB_GRUPO', '$CO_FORMA_ORGANIZACAO','$NO_FORMA_ORGANIZACAO','$DT_COMPETENCIA'),";
			$contador++;
			if($contador == 150){
				$sql = substr_replace($sql, '', -1);
				
				if(!mysqli_query($conn, $sql)){
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
				$sql = "INSERT INTO sigtap_tb_forma_organizacao (CO_GRUPO, CO_SUB_GRUPO, CO_FORMA_ORGANIZACAO,NO_FORMA_ORGANIZACAO,DT_COMPETENCIA) VALUES ";
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
	
	############################### FIM IMPORTAR FORMA DE ORGANIZAÇÃO #####################################
}