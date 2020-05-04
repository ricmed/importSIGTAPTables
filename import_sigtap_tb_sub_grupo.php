<?php
	############################### IMPORTAR OS SUBGRUPOS #####################################
function import_sigtap_tb_sub_grupo($conn){
	/*$host="192.168.12.80";
	$port=3306;
	$socket="";
	$user="root";
	$password="#cy2426#";
	$dbname="sishras";

	$conn = new mysqli($host, $user, $password, $dbname, $port, $socket)
		or die ('Erro na conexão' . mysqli_connect_error()); */
	//Abre o arquivo txt - tb_sub_grupo
	$ponteiro = fopen ("tabelas/tb_sub_grupo.txt","r");

	//Lê o arquivo até chegar ao fim
	while (!feof ($ponteiro)) {
		//Lê uma linha do arquivo
		$linha = fgets($ponteiro, 300);
		// Atribui as colunas as variaveis
		$CO_GRUPO = trim((substr(($linha),0,2)));
		$CO_SUB_GRUPO = trim((substr(($linha),2,2)));
		$NO_SUB_GRUPO  = (trim((substr(($linha),4,100))));
		$DT_COMPETENCIA  = trim((substr(($linha),104,6)));

		if($CO_GRUPO != ''){
			// código para o banco de dados
			$sql = "INSERT INTO sigtap_tbsubgrupo (CO_GRUPO, CO_SUB_GRUPO, NO_SUB_GRUPO, DT_COMPETENCIA)".
				" VALUES('$CO_GRUPO', '$CO_SUB_GRUPO', '$NO_SUB_GRUPO', '$DT_COMPETENCIA')";
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
############################### FIM IMPORTAR OS SUBGRUPOS #####################################
