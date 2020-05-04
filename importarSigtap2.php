<?php

require_once('import_sigtap_tb_grupo.php');
require_once('import_sigtap_tb_sub_grupo.php');
require_once('import_sigtap_tb_forma_organizacao.php');
require_once('import_sigtap_tb_procedimento.php');
require_once('import_sigtap_tb_financiamento.php');
require_once('import_sigtap_tb_rubrica.php');
require_once('import_sigtap_tb_detalhe.php');
require_once('import_sigtap_rl_procedimento_detalhe.php');
require_once('import_sigtap_tb_descricao_detalhe.php');
require_once('import_sigtap_tb_registro.php');
require_once('import_sigtap_rl_procedimento_registro.php');
require_once('import_sigtap_tb_servico.php');
require_once('import_sigtap_tb_servico_classificacao.php');
require_once('import_sigtap_rl_procedimento_servico.php');
require_once('import_sigtap_tb_modalidade.php');
require_once('import_sigtap_rl_procedimento_modalidade.php');
require_once('import_sigtap_tb_tipo_leito.php');
require_once('import_sigtap_rl_procedimento_leito.php');
require_once('import_sigtap_tb_cid.php');
require_once('import_sigtap_rl_procedimento_cid.php');
require_once('import_sigtap_tb_ocupacao.php');
require_once('import_sigtap_rl_procedimento_ocupacao.php');
require_once('import_sigtap_tb_habilitacao.php');
require_once('import_sigtap_rl_procedimento_habilitacao.php');
require_once('import_sigtap_rl_procedimento_incremento.php');
require_once('import_sigtap_rl_procedimento_compativel.php');
require_once('import_sigtap_rl_excecao_compatibilidade.php');
require_once('import_sigtap_tb_regra_condicionada.php');
require_once('import_sigtap_tb_sia_sih.php');
require_once('import_sigtap_rl_procedimento_sia_sih.php');
require_once('import_sigtap_rl_procedimento_origem.php');
require_once('import_sigtap_tb_grupo_habilitacao.php');
require_once('import_sigtap_tb_descricao.php');
require_once('import_sigtap_rl_procedimento_regra_cond.php');
require_once('import_sigtap_tb_rede_atencao.php');
require_once('import_sigtap_tb_componente_rede.php');
require_once('import_sigtap_tb_tuss.php');
require_once('import_sigtap_tb_renases.php');
require_once('import_sigtap_rl_procedimento_comp_rede.php');
require_once('import_sigtap_rl_procedimento_renases.php');
require_once('import_sigtap_rl_procedimento_tuss.php');

//header('Content-Type: text/html; charset=utf-8');
	$host="192.168.14.50";
	$port=3306;
	$socket="";
	$user="sishrasdev";
	$password="97ramqui";
	$dbname="sishras";

/*
$host="sishras.myscriptcase.com";
$port=3306;
$socket="";
$user="sishrasm_user";
$password="97RAMqui";
$dbname = "sishrasm_sishras";
*/

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Erro na conexão' . mysqli_connect_error($conn));
import_sigtap_tb_grupo($conn);
echo 'import_sigtap_tb_grupo OK </br>';
$conn->close();

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Erro na conexão' . mysqli_connect_error($conn));
import_sigtap_tb_sub_grupo($conn);
echo 'import_sigtap_tb_sub_grupo OK </br>';
$conn->close();

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Erro na conexão' . mysqli_connect_error($conn));
import_sigtap_tb_forma_organizacao($conn);
echo 'import_sigtap_tb_forma_organizacao OK </br>';
$conn->close();

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Erro na conexão' . mysqli_connect_error($conn));
import_sigtap_tb_financiamento($conn);
echo 'import_sigtap_tb_financiamento OK </br>';
$conn->close();

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Erro na conexão' . mysqli_connect_error($conn));
import_sigtap_tb_rubrica($conn);
echo 'import_sigtap_tb_rubrica OK </br>';
$conn->close();

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Erro na conexão' . mysqli_connect_error($conn));
import_sigtap_tb_procedimento($conn);
echo 'import_sigtap_tb_procedimento OK </br>';
$conn->close();

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Erro na conexão' . mysqli_connect_error($conn));
import_sigtap_tb_detalhe($conn);
echo 'import_sigtap_tb_detalhe OK </br>';
$conn->close();

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Erro na conexão' . mysqli_connect_error($conn));
import_sigtap_tb_descricao_detalhe($conn);
echo 'import_sigtap_tb_descricao_detalhe OK </br>';
$conn->close();

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Erro na conexão' . mysqli_connect_error($conn));
import_sigtap_rl_procedimento_detalhe($conn);
echo 'import_sigtap_rl_procedimento_detalhe OK </br>';
$conn->close();

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Erro na conexão' . mysqli_connect_error($conn));
import_sigtap_tb_registro($conn);
echo 'import_sigtap_tb_registro OK </br>';
$conn->close();

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Erro na conexão' . mysqli_connect_error($conn));
import_sigtap_rl_procedimento_registro($conn);
echo 'import_sigtap_rl_procedimento_registro OK </br>';
$conn->close();

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Erro na conexão' . mysqli_connect_error($conn));
import_sigtap_tb_servico($conn);
echo 'import_sigtap_tb_servico OK </br>';
$conn->close();

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Erro na conexão' . mysqli_connect_error($conn));
import_sigtap_tb_servico_classificacao($conn);
echo 'import_sigtap_tb_servico_classificacao OK </br>';
$conn->close();

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Erro na conexão' . mysqli_connect_error($conn));
import_sigtap_rl_procedimento_servico($conn);
echo 'import_sigtap_rl_procedimento_servico OK </br>';
$conn->close();

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Erro na conexão' . mysqli_connect_error($conn));
import_sigtap_tb_modalidade($conn);
echo 'import_sigtap_tb_modalidade OK </br>';
$conn->close();

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Erro na conexão' . mysqli_connect_error($conn));
import_sigtap_rl_procedimento_modalidade($conn);
echo 'import_sigtap_rl_procedimento_modalidade OK </br>';
$conn->close();

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Erro na conexão' . mysqli_connect_error($conn));
import_sigtap_tb_tipo_leito($conn);
echo 'import_sigtap_tb_tipo_leito OK </br>';
$conn->close();

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Erro na conexão' . mysqli_connect_error($conn));
import_sigtap_rl_procedimento_leito($conn);
echo 'import_sigtap_rl_procedimento_leito OK </br>';
$conn->close();

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Erro na conexão' . mysqli_connect_error($conn));
import_sigtap_rl_procedimento_cid($conn);
echo 'import_sigtap_rl_procedimento_cid OK </br>';
$conn->close();

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Erro na conexão' . mysqli_connect_error($conn));
import_sigtap_rl_procedimento_ocupacao($conn);
echo 'import_sigtap_rl_procedimento_ocupacao OK </br>';
$conn->close();

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Erro na conexão' . mysqli_connect_error($conn));
import_sigtap_tb_habilitacao($conn);
echo 'import_sigtap_tb_habilitacao OK </br>';
$conn->close();

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Erro na conexão' . mysqli_connect_error($conn));
import_sigtap_rl_procedimento_habilitacao($conn);
echo 'import_sigtap_rl_procedimento_habilitacao OK </br>';
$conn->close();

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Erro na conexão' . mysqli_connect_error($conn));
import_sigtap_rl_procedimento_incremento($conn);
echo 'import_sigtap_rl_procedimento_incremento OK </br>';
$conn->close();

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Erro na conexão' . mysqli_connect_error($conn));
import_sigtap_rl_procedimento_compativel($conn);
echo 'import_sigtap_rl_procedimento_compativel OK </br>';
$conn->close();

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Erro na conexão' . mysqli_connect_error($conn));
import_sigtap_rl_excecao_compatibilidade($conn);
echo 'import_sigtap_rl_excecao_compatibilidade OK </br>';
$conn->close();

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Erro na conexão' . mysqli_connect_error($conn));
import_sigtap_tb_sia_sih($conn);
echo 'import_sigtap_tb_sia_sih OK </br>';
$conn->close();

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Erro na conexão' . mysqli_connect_error($conn));
import_sigtap_rl_procedimento_sia_sih($conn);
echo 'import_sigtap_rl_procedimento_sia_sih OK </br>';
$conn->close();

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Erro na conexão' . mysqli_connect_error($conn));
import_sigtap_rl_procedimento_origem($conn);
echo 'import_sigtap_rl_procedimento_origem OK </br>';
$conn->close();

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Erro na conexão' . mysqli_connect_error($conn));
import_sigtap_tb_descricao($conn);
echo 'import_sigtap_tb_descricao OK </br>';
$conn->close();

// TABELAS SEM COMPETENCIA
/*
$conn = new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Erro na conexão' . mysqli_connect_error($conn));
import_sigtap_tb_ocupacao($conn);
echo 'import_sigtap_tb_ocupacao OK </br>';
$conn->close();

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Erro na conexão' . mysqli_connect_error($conn));
import_sigtap_tb_regra_condicionada($conn);
echo 'import_sigtap_tb_regra_condicionada OK </br>';
$conn->close();

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Erro na conexão' . mysqli_connect_error($conn));
import_sigtap_tb_cid($conn);
echo 'import_sigtap_tb_cid OK </br>';
$conn->close();

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Erro na conexão' . mysqli_connect_error($conn));
import_sigtap_tb_grupo_habilitacao($conn);
echo 'import_sigtap_tb_grupo_habilitacao OK </br>';
$conn->close();

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Erro na conexão' . mysqli_connect_error($conn));
import_sigtap_rl_procedimento_regra_cond($conn);
echo 'import_sigtap_rl_procedimento_regra_cond OK </br>';
$conn->close();

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Erro na conexão' . mysqli_connect_error($conn));
import_sigtap_tb_rede_atencao($conn);
echo 'import_sigtap_tb_rede_atencao OK </br>';
$conn->close();

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Erro na conexão' . mysqli_connect_error($conn));
import_sigtap_tb_componente_rede($conn);
echo 'import_sigtap_tb_componente_rede OK </br>';
$conn->close();

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Erro na conexão' . mysqli_connect_error($conn));
import_sigtap_tb_tuss($conn);
echo 'import_sigtap_tb_tuss OK </br>';
$conn->close();

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Erro na conexão' . mysqli_connect_error($conn));
import_sigtap_tb_renases($conn);
echo 'import_sigtap_tb_renases OK </br>';
$conn->close();

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Erro na conexão' . mysqli_connect_error($conn));
import_sigtap_rl_procedimento_comp_rede($conn);
echo 'import_sigtap_rl_procedimento_comp_rede OK </br>';
$conn->close();

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Erro na conexão' . mysqli_connect_error($conn));
import_sigtap_rl_procedimento_renases($conn);
echo 'import_sigtap_rl_procedimento_renases OK </br>';
$conn->close();

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Erro na conexão' . mysqli_connect_error($conn));
import_sigtap_rl_procedimento_tuss($conn);
echo 'import_sigtap_rl_procedimento_tuss OK </br>';
$conn->close();
*/

echo 'FIM </br>';


############################### CRIAR TABELA sigtap_tb_complexidade #####################################
/*
 0 - Não se aplica
 1 - Atenção básica complexidade
 2 - Média complexidade
 3 - Alta complexidade
*/

############################### FIM CRIAR TABELA sigtap_tb_complexidade #####################################

############################### CRIAR TABELA sigtap_tb_sexo #####################################
/*
 M - Masculino
 F - Feminino
 I - Indiferente/Ambos
 N - Não se aplica
*/

############################### FIM CRIAR TABELA sigtap_tb_sexo #####################################

############################### CRIAR TABELA sigtap_tb_tipo_agravo #####################################
/*
 0 - Sem agravo
 1 - Agravo de notificação
 2 - Agravo de bloqueio
 
*/
############################### FIM CRIAR TABELA sigtap_tb_tipo_agravo #####################################

############################### CRIAR TABELA sigtap_tb_compatibilidade #####################################
/*
 1 - Compatível
 2 - Incompatível / Excludente
 3 - Concomitante
 
*/
############################### FIM CRIAR TABELA sigtap_tb_compatibilidade ###################################




?>