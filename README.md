# importSIGTAPTables
Scripts em PHP para importação das tabelas SIGTAP (Sistema de Gerenciamento da Tabela de Procedimentos, Medicamentos e OPM do SUS)

As tabelas do sistema SIGTAP são utilizadas para o faturamento de procedimentos realizados nos hospitais, e apresentam paramêtros para registro desses procedimentos que devem ser feitos de forma individual para cada paciente atendido. 

O Ministério da Saúde oferece um software denominado BPA-Magnético para a utilização, porém este software não funciona em rede, para muitos registros, algo em torno de 15000 ou mais, seu é bastante restritivo.

Assim, algumas instituições de saúde possuem seu próprio sistem de faturamento, que precisa importar a cada competência as novas tabelas disponibilizadas no site http://sigtap.datasus.gov.br/tabela-unificada/app/download.jsp para fazer a consistência dos dados e a geração do arquivo à ser enviado para as Prefeituras ou Estados unificarem os dados e os enviar para o Ministério da Saúde.
