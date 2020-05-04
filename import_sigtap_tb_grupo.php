<?php

############################### IMPORTAR OS GRUPOS #####################################
function import_sigtap_tb_grupo ($conn){
	
		
//Abre o arquivo txt - tb_grupo
$ponteiro = fopen ("tabelas/tb_grupo.txt","r");

//Lê o arquivo até chegar ao fim
while (!feof ($ponteiro)) {
	//Lê uma linha do arquivo
	$linha = fgets($ponteiro, 150);
	
	//atribui valores as variaveis 
	$CO_GRUPO = trim((substr(($linha),0,2)));
	$NO_GRUPO = (trim((substr(($linha),2,100))));
	$DT_COMPETENCIA = trim((substr(($linha),102,6)));
	
	if($CO_GRUPO != ''){
		// código para o banco de dados
		$sql = "INSERT INTO sigtap_tb_grupo (CO_GRUPO, NO_GRUPO, DT_COMPETENCIA)".
			" VALUES('$CO_GRUPO', '$NO_GRUPO', '$DT_COMPETENCIA')";
	
		if (mysqli_query($conn, $sql)) {
		//echo "New record created successfully";
		
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		
	}
		
}//Fecha while

//Fecha o ponteiro do arquivo
fclose ($ponteiro);

}
############################### FIM IMPORTAR OS GRUPOS #####################################
