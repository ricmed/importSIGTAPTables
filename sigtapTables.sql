CREATE TABLE `sigtap_rl_excecao_compatibilidade` (
  `CO_PROCEDIMENTO_RESTRICAO` varchar(10) NOT NULL,
  `CO_PROCEDIMENTO_PRINCIPAL` varchar(10) NOT NULL,
  `CO_REGISTRO_PRINCIPAL` varchar(2) NOT NULL,
  `CO_PROCEDIMENTO_COMPATIVEL` varchar(10) NOT NULL,
  `CO_REGISTRO_COMPATIVEL` varchar(2) NOT NULL,
  `TP_COMPATIBILIDADE` varchar(1) DEFAULT NULL,
  `DT_COMPETENCIA` varchar(6) NOT NULL,
  PRIMARY KEY (`CO_PROCEDIMENTO_RESTRICAO`,`CO_PROCEDIMENTO_PRINCIPAL`,`CO_REGISTRO_PRINCIPAL`,`CO_PROCEDIMENTO_COMPATIVEL`,`CO_REGISTRO_COMPATIVEL`,`DT_COMPETENCIA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `sigtap_rl_procedimento_cid` (
  `CO_PROCEDIMENTO` varchar(10) NOT NULL,
  `CO_CID` varchar(4) NOT NULL,
  `ST_PRINCIPAL` varchar(1) DEFAULT NULL,
  `DT_COMPETENCIA` varchar(6) NOT NULL,
  PRIMARY KEY (`CO_CID`,`DT_COMPETENCIA`,`CO_PROCEDIMENTO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `sigtap_rl_procedimento_comp_rede` (
  `CO_PROCEDIMENTO` varchar(10) NOT NULL,
  `CO_COMPONENTE_REDE` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`CO_PROCEDIMENTO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `sigtap_rl_procedimento_compativel` (
  `CO_PROCEDIMENTO_PRINCIPAL` varchar(10) NOT NULL,
  `CO_REGISTRO_PRINCIPAL` varchar(2) NOT NULL,
  `CO_PROCEDIMENTO_COMPATIVEL` varchar(10) NOT NULL,
  `CO_REGISTRO_COMPATIVEL` varchar(2) NOT NULL,
  `TP_COMPATIBILIDADE` varchar(1) DEFAULT NULL,
  `QT_PERMITIDA` int DEFAULT NULL,
  `DT_COMPETENCIA` varchar(6) NOT NULL,
  PRIMARY KEY (`CO_PROCEDIMENTO_PRINCIPAL`,`CO_REGISTRO_PRINCIPAL`,`CO_PROCEDIMENTO_COMPATIVEL`,`CO_REGISTRO_COMPATIVEL`,`DT_COMPETENCIA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `sigtap_rl_procedimento_detalhe` (
  `CO_PROCEDIMENTO` varchar(10) NOT NULL,
  `CO_DETALHE` varchar(3) NOT NULL,
  `DT_COMPETENCIA` varchar(6) NOT NULL,
  PRIMARY KEY (`CO_PROCEDIMENTO`,`DT_COMPETENCIA`,`CO_DETALHE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `sigtap_rl_procedimento_habilitacao` (
  `CO_PROCEDIMENTO` varchar(10) NOT NULL,
  `CO_HABILITACAO` varchar(4) NOT NULL,
  `NU_GRUPO_HABILITACAO` varchar(4) DEFAULT NULL,
  `DT_COMPETENCIA` varchar(6) NOT NULL,
  PRIMARY KEY (`CO_PROCEDIMENTO`,`CO_HABILITACAO`,`DT_COMPETENCIA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `sigtap_rl_procedimento_incremento` (
  `CO_PROCEDIMENTO` varchar(10) NOT NULL,
  `CO_HABILITACAO` varchar(4) NOT NULL,
  `VL_PERCENTUAL_SH` float DEFAULT NULL,
  `VL_PERCENTUAL_SA` float DEFAULT NULL,
  `VL_PERCENTUAL_SP` float DEFAULT NULL,
  `DT_COMPETENCIA` varchar(6) NOT NULL,
  PRIMARY KEY (`CO_PROCEDIMENTO`,`DT_COMPETENCIA`,`CO_HABILITACAO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `sigtap_rl_procedimento_leito` (
  `CO_PROCEDIMENTO` varchar(10) NOT NULL,
  `CO_TIPO_LEITO` varchar(2) NOT NULL,
  `DT_COMPETENCIA` varchar(6) NOT NULL,
  PRIMARY KEY (`CO_PROCEDIMENTO`,`DT_COMPETENCIA`,`CO_TIPO_LEITO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `sigtap_rl_procedimento_modalidade` (
  `CO_PROCEDIMENTO` varchar(10) NOT NULL,
  `CO_MODALIDADE` varchar(2) NOT NULL,
  `DT_COMPETENCIA` varchar(6) NOT NULL,
  PRIMARY KEY (`CO_PROCEDIMENTO`,`CO_MODALIDADE`,`DT_COMPETENCIA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `sigtap_rl_procedimento_ocupacao` (
  `CO_PROCEDIMENTO` varchar(10) NOT NULL,
  `CO_OCUPACAO` varchar(6) NOT NULL,
  `DT_COMPETENCIA` varchar(6) NOT NULL,
  PRIMARY KEY (`CO_PROCEDIMENTO`,`CO_OCUPACAO`,`DT_COMPETENCIA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `sigtap_rl_procedimento_origem` (
  `CO_PROCEDIMENTO` varchar(10) NOT NULL,
  `CO_PROCEDIMENTO_ORIGEM` varchar(10) DEFAULT NULL,
  `DT_COMPETENCIA` varchar(6) NOT NULL,
  PRIMARY KEY (`CO_PROCEDIMENTO`,`DT_COMPETENCIA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `sigtap_rl_procedimento_registro` (
  `id_rl_procedimento_registro` int NOT NULL AUTO_INCREMENT,
  `CO_PROCEDIMENTO` varchar(10) NOT NULL,
  `CO_REGISTRO` varchar(2) NOT NULL,
  `DT_COMPETENCIA` varchar(6) NOT NULL,
  PRIMARY KEY (`id_rl_procedimento_registro`,`DT_COMPETENCIA`)
) ENGINE=InnoDB AUTO_INCREMENT=163683 DEFAULT CHARSET=latin1;

CREATE TABLE `sigtap_rl_procedimento_regra_cond` (
  `CO_PROCEDIMENTO` varchar(10) NOT NULL,
  `CO_REGRA_CONDICIONADA` varchar(4) NOT NULL,
  PRIMARY KEY (`CO_REGRA_CONDICIONADA`,`CO_PROCEDIMENTO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `sigtap_rl_procedimento_renases` (
  `CO_PROCEDIMENTO` varchar(10) NOT NULL,
  `CO_RENASES` varchar(10) DEFAULT NULL,
  KEY `CO_PROCEDIMENTO_idx` (`CO_PROCEDIMENTO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `sigtap_rl_procedimento_servico` (
  `CO_PROCEDIMENTO` varchar(10) NOT NULL,
  `CO_SERVICO` varchar(3) NOT NULL,
  `CO_CLASSIFICACAO` varchar(3) NOT NULL,
  `DT_COMPETENCIA` varchar(6) NOT NULL,
  PRIMARY KEY (`CO_PROCEDIMENTO`,`DT_COMPETENCIA`,`CO_SERVICO`,`CO_CLASSIFICACAO`),
  KEY `CO_PROCEDIMENTO_serv` (`CO_PROCEDIMENTO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `sigtap_rl_procedimento_sia_sih` (
  `CO_PROCEDIMENTO` varchar(10) NOT NULL,
  `CO_PROCEDIMENTO_SIA_SIH` varchar(10) NOT NULL,
  `TP_PROCEDIMENTO` varchar(1) DEFAULT NULL,
  `DT_COMPETENCIA` varchar(6) NOT NULL,
  PRIMARY KEY (`CO_PROCEDIMENTO`,`DT_COMPETENCIA`,`CO_PROCEDIMENTO_SIA_SIH`),
  KEY `CO_PROCEDIMENTO_SIA_SIH_idx` (`CO_PROCEDIMENTO_SIA_SIH`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `sigtap_rl_procedimento_tuss` (
  `CO_PROCEDIMENTO` varchar(10) NOT NULL,
  `CO_TUSS` varchar(10) NOT NULL,
  PRIMARY KEY (`CO_PROCEDIMENTO`,`CO_TUSS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `sigtap_tb_cid` (
  `CO_CID` varchar(4) NOT NULL,
  `NO_CID` varchar(100) NOT NULL,
  `TP_AGRAVO` varchar(1) DEFAULT NULL,
  `TP_SEXO` varchar(1) DEFAULT NULL,
  `TP_ESTADIO` varchar(1) DEFAULT NULL,
  `VL_CAMPOS_IRRADIADOS` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`CO_CID`),
  KEY `NO_CID_idx` (`NO_CID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `sigtap_tb_complexidade` (
  `CO_COMPLEXIDADE` varchar(1) NOT NULL,
  `NO_COMPLEXIDADE` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `sigtap_tb_componente_rede` (
  `CO_COMPONENTE_REDE` varchar(10) NOT NULL,
  `NO_COMPONENTE_REDE` varchar(150) DEFAULT NULL,
  `CO_REDE_ATENCAO` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `sigtap_tb_descricao` (
  `CO_PROCEDIMENTO` varchar(10) NOT NULL,
  `DS_PROCEDIMENTO` varchar(4000) NOT NULL,
  `DT_COMPETENCIA` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `sigtap_tb_descricao_detalhe` (
  `CO_DETALHE` varchar(3) NOT NULL,
  `DS_DETALHE` varchar(4000) DEFAULT NULL,
  `DT_COMPETENCIA` varchar(6) NOT NULL,
  PRIMARY KEY (`CO_DETALHE`,`DT_COMPETENCIA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `sigtap_tb_detalhe` (
  `CO_DETALHE` varchar(3) NOT NULL,
  `NO_DETALHE` varchar(100) DEFAULT NULL,
  `DT_COMPETENCIA` varchar(6) NOT NULL,
  PRIMARY KEY (`CO_DETALHE`,`DT_COMPETENCIA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `sigtap_tb_financiamento` (
  `CO_FINANCIAMENTO` varchar(2) NOT NULL,
  `NO_FINANCIAMENTO` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `DT_COMPETENCIA` varchar(6) NOT NULL,
  PRIMARY KEY (`CO_FINANCIAMENTO`,`DT_COMPETENCIA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `sigtap_tb_forma_organizacao` (
  `CO_GRUPO` varchar(2) NOT NULL,
  `CO_SUB_GRUPO` varchar(2) NOT NULL,
  `CO_FORMA_ORGANIZACAO` varchar(2) NOT NULL,
  `NO_FORMA_ORGANIZACAO` varchar(125) NOT NULL,
  `DT_COMPETENCIA` varchar(6) NOT NULL,
  PRIMARY KEY (`CO_GRUPO`,`DT_COMPETENCIA`,`CO_SUB_GRUPO`,`CO_FORMA_ORGANIZACAO`),
  KEY `CO_GRUPO_org_idx` (`CO_GRUPO`),
  KEY `CO_SUB_GRUPO_org_idx` (`CO_SUB_GRUPO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='	';

CREATE TABLE `sigtap_tb_grupo` (
  `CO_GRUPO` varchar(2) NOT NULL,
  `NO_GRUPO` varchar(100) DEFAULT NULL,
  `DT_COMPETENCIA` varchar(6) NOT NULL,
  PRIMARY KEY (`CO_GRUPO`,`DT_COMPETENCIA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `sigtap_tb_grupo_habilitacao` (
  `NU_GRUPO_HABILITACAO` varchar(4) NOT NULL,
  `NO_GRUPO_HABILITACAO` varchar(20) NOT NULL,
  `DS_GRUPO_HABILITACAO` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `sigtap_tb_habilitacao` (
  `CO_HABILITACAO` varchar(4) NOT NULL,
  `NO_HABILITACAO` varchar(150) NOT NULL,
  `DT_COMPETENCIA` varchar(6) NOT NULL,
  PRIMARY KEY (`CO_HABILITACAO`,`DT_COMPETENCIA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `sigtap_tb_modalidade` (
  `CO_MODALIDADE` varchar(2) NOT NULL,
  `NO_MODALIDADE` varchar(100) NOT NULL,
  `DT_COMPETENCIA` varchar(6) NOT NULL,
  PRIMARY KEY (`CO_MODALIDADE`,`DT_COMPETENCIA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `sigtap_tb_ocupacao` (
  `CO_OCUPACAO` varchar(10) NOT NULL,
  `NO_OCUPACAO` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `sigtap_tb_procedimento` (
  `CO_PROCEDIMENTO` varchar(10) NOT NULL,
  `NO_PROCEDIMENTO` varchar(260) NOT NULL,
  `TP_COMPLEXIDADE` varchar(1) DEFAULT NULL,
  `TP_SEXO` varchar(1) DEFAULT NULL,
  `QT_MAXIMA_EXECUCAO` varchar(4) DEFAULT NULL,
  `QT_DIAS_PERMANENCIA` varchar(4) DEFAULT NULL,
  `QT_PONTOS` varchar(4) DEFAULT NULL,
  `VL_IDADE_MINIMA` varchar(4) DEFAULT NULL,
  `VL_IDADE_MAXIMA` varchar(4) DEFAULT NULL,
  `VL_SH` double DEFAULT NULL,
  `VL_SA` double DEFAULT NULL,
  `VL_SP` double DEFAULT NULL,
  `CO_FINANCIAMENTO` varchar(2) DEFAULT NULL,
  `CO_RUBRICA` varchar(6) DEFAULT NULL,
  `QT_TEMPO_PERMANENCIA` varchar(4) DEFAULT NULL,
  `DT_COMPETENCIA` varchar(6) NOT NULL,
  PRIMARY KEY (`CO_PROCEDIMENTO`,`DT_COMPETENCIA`),
  KEY `CO_PROCEDIMENTO_idx` (`CO_PROCEDIMENTO`),
  KEY `NO_PROCEDIMENTO_idx` (`NO_PROCEDIMENTO`),
  KEY `DT_COMPETENCIA` (`DT_COMPETENCIA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `sigtap_tb_rede_atencao` (
  `CO_REDE_ATENCAO` varchar(3) NOT NULL,
  `NO_REDE_ATENCAO` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `sigtap_tb_registro` (
  `CO_REGISTRO` varchar(2) NOT NULL,
  `NO_REGISTRO` varchar(50) NOT NULL,
  `DT_COMPETENCIA` varchar(6) NOT NULL,
  PRIMARY KEY (`CO_REGISTRO`,`DT_COMPETENCIA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `sigtap_tb_regra_condicionada` (
  `CO_REGRA_CONDICIONADA` varchar(4) NOT NULL,
  `NO_REGRA_CONDICIONADA` varchar(150) NOT NULL,
  `DS_REGRA_CONDICIONADA` varchar(4000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `sigtap_tb_renases` (
  `CO_RENASES` varchar(10) CHARACTER SET big5 COLLATE big5_chinese_ci NOT NULL,
  `NO_RENASES` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `sigtap_tb_rubrica` (
  `CO_RUBRICA` varchar(6) NOT NULL,
  `NO_RUBRICA` varchar(100) NOT NULL,
  `DT_COMPETENCIA` varchar(6) NOT NULL,
  PRIMARY KEY (`CO_RUBRICA`,`DT_COMPETENCIA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `sigtap_tb_servico` (
  `CO_SERVICO` varchar(3) NOT NULL,
  `NO_SERVICO` varchar(120) DEFAULT NULL,
  `DT_COMPETENCIA` varchar(6) NOT NULL,
  PRIMARY KEY (`CO_SERVICO`,`DT_COMPETENCIA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `sigtap_tb_servico_classificacao` (
  `CO_SERVICO` varchar(3) NOT NULL,
  `CO_CLASSIFICACAO` varchar(3) NOT NULL,
  `NO_CLASSIFICACAO` varchar(150) DEFAULT NULL,
  `DT_COMPETENCIA` varchar(6) NOT NULL,
  PRIMARY KEY (`CO_SERVICO`,`CO_CLASSIFICACAO`,`DT_COMPETENCIA`),
  KEY `CO_SERVICO_idx` (`CO_SERVICO`),
  KEY `CO_CLASSIFICACAO_idx` (`CO_CLASSIFICACAO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `sigtap_tb_sia_sih` (
  `CO_PROCEDIMENTO_SIA_SIH` varchar(10) NOT NULL,
  `NO_PROCEDIMENTO_SIA_SIH` varchar(100) DEFAULT NULL,
  `TP_PROCEDIMENTO` varchar(1) DEFAULT NULL,
  `DT_COMPETENCIA` varchar(6) NOT NULL,
  PRIMARY KEY (`CO_PROCEDIMENTO_SIA_SIH`,`DT_COMPETENCIA`),
  KEY `CO_PROCEDIMENTO_SIA_SIH_idx` (`CO_PROCEDIMENTO_SIA_SIH`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `sigtap_tb_tipo_leito` (
  `CO_TIPO_LEITO` varchar(2) NOT NULL,
  `NO_TIPO_LEITO` varchar(60) DEFAULT NULL,
  `DT_COMPETENCIA` varchar(6) NOT NULL,
  PRIMARY KEY (`CO_TIPO_LEITO`,`DT_COMPETENCIA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `sigtap_tb_tuss` (
  `CO_TUSS` varchar(10) NOT NULL,
  `NO_TUSS` varchar(450) DEFAULT NULL,
  KEY `CO_TUSS` (`CO_TUSS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `sigtap_tbsubgrupo` (
  `CO_GRUPO` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `CO_SUB_GRUPO` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `NO_SUB_GRUPO` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `DT_COMPETENCIA` varchar(6) NOT NULL,
  PRIMARY KEY (`CO_GRUPO`,`CO_SUB_GRUPO`,`DT_COMPETENCIA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

