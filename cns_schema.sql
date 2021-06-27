-- MySQL dump 10.13  Distrib 5.5.62, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: ipicyt
-- ------------------------------------------------------
-- Server version	5.5.62-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `academicos`
--

DROP TABLE IF EXISTS `academicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `academicos` (
  `nombres` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidoPaterno` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidoMaterno` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Este atributo es opcional por el caso de las personas que son extranjeros',
  `correo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefonoInstitucional` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefonoPersonal` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Este atributo es opcional',
  `institucionDeAdscripcion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paisDeLaInstitucion` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` binary(1) NOT NULL DEFAULT '0',
  `gradoAcademico` int(11) NOT NULL,
  `tipoDeAcademico` int(11) NOT NULL,
  `pass` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`correo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `academicos`
--

LOCK TABLES `academicos` WRITE;
/*!40000 ALTER TABLE `academicos` DISABLE KEYS */;
INSERT INTO `academicos` VALUES ('leonardo','alvarez','rivera','leonardo_buyer@hotmail.com','4621565956','','ITESI','MEX','0',1,1,'99757427ff4100afcd0b2103573a3f78'),('Leonardo','Álvarez','Rivera','leonardoalvriv@gmail.com','4621565956','4621565956','ITESI','MEX','1',1,1,'85392549f9bcf17d482afb8eb8ad9944'),('Lina','Riego','Ruiz','lina@ipicyt.edu.mx','4448342000 ext 7253','','IPICYT','MEX','1',3,1,'ef199318711712de320680bb37de877f'),('Salvador','Ruiz','Ruiz','salvador.ruiz@ipicyt.edu.mx','4731209009','','IPICYT','MEX','1',3,1,'81dc9bdb52d04dc20036dbd8313ed055');
/*!40000 ALTER TABLE `academicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colaboradoresacademicos`
--

DROP TABLE IF EXISTS `colaboradoresacademicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colaboradoresacademicos` (
  `IDDetalleProyecto` int(11) NOT NULL,
  `correoDelAcademico` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`IDDetalleProyecto`,`correoDelAcademico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colaboradoresacademicos`
--

LOCK TABLES `colaboradoresacademicos` WRITE;
/*!40000 ALTER TABLE `colaboradoresacademicos` DISABLE KEYS */;
/*!40000 ALTER TABLE `colaboradoresacademicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colaboradoresdependientes`
--

DROP TABLE IF EXISTS `colaboradoresdependientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colaboradoresdependientes` (
  `IDDetalleProyecto` int(11) NOT NULL,
  `correoDelDependiente` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`IDDetalleProyecto`,`correoDelDependiente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colaboradoresdependientes`
--

LOCK TABLES `colaboradoresdependientes` WRITE;
/*!40000 ALTER TABLE `colaboradoresdependientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `colaboradoresdependientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colaboradoresprofesionales`
--

DROP TABLE IF EXISTS `colaboradoresprofesionales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colaboradoresprofesionales` (
  `IDDetalleProyecto` int(11) NOT NULL,
  `correoDelProfesional` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`IDDetalleProyecto`,`correoDelProfesional`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colaboradoresprofesionales`
--

LOCK TABLES `colaboradoresprofesionales` WRITE;
/*!40000 ALTER TABLE `colaboradoresprofesionales` DISABLE KEYS */;
/*!40000 ALTER TABLE `colaboradoresprofesionales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dependientes`
--

DROP TABLE IF EXISTS `dependientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dependientes` (
  `nombres` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidoPaterno` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidoMaterno` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Este atributo es opcional por el caso de las personas que son extranjeros',
  `correo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefonoInstitucional` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefonoPersonal` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Este atributo es opcional',
  `institucionDeAdscripcion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paisDeLaInstitucion` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` binary(1) NOT NULL DEFAULT '0',
  `tipoDeDependiente` int(11) NOT NULL,
  `gradoAcademico` int(11) NOT NULL,
  `pass` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correoAcademico` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`correo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dependientes`
--

LOCK TABLES `dependientes` WRITE;
/*!40000 ALTER TABLE `dependientes` DISABLE KEYS */;
INSERT INTO `dependientes` VALUES ('emilio','hernandez','huerfano','emilio.hernandez@ipicyt.edu.mx','4621565956','4621565956','Tecnólogico de veracruz','MEX','1',2,2,'dbcd9767dbce3bf0840912df89054cd0','leonardoalvriv@gmail.com'),('Emilio Ernesto','Hernández','Huerfano','emiliohdezhfno@gmail.com','4448298503','4448298503','IPICYT','MEX','1',2,2,'25d55ad283aa400af464c76d713c07ad','leonardoalvriv@gmail.com'),('jazmin','hernandez','galicia','jazmin@gmail.com','4621565956','4621565956','Tecnólogico de veracruz','DMA','1',1,1,'85392549f9bcf17d482afb8eb8ad9944','leonardoalvriv@gmail.com'),('marco','galvan','hernandez','marco.galvan@gmail.com','44482829092','44482829092','UASLP','MEX','1',1,1,'81dc9bdb52d04dc20036dbd8313ed055','leonardoalvriv@gmail.com');
/*!40000 ALTER TABLE `dependientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detallesproyectos`
--

DROP TABLE IF EXISTS `detallesproyectos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detallesproyectos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resumen` varchar(1500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numeroDeCores` int(11) NOT NULL DEFAULT '192',
  `almacenamiento` int(11) NOT NULL DEFAULT '10' COMMENT 'Espacio en disco duro, en Gigabytes',
  `tarjetasGraficas` int(11) NOT NULL DEFAULT '0',
  `justificacionTarjetaGrafica` varchar(1500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `justificacionGeneral` varchar(1500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `financiamiento` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `areaDeInvestigacion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `especialidad` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resultadosEsperados` varchar(1500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urlDelResumen` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detallesproyectos`
--

LOCK TABLES `detallesproyectos` WRITE;
/*!40000 ALTER TABLE `detallesproyectos` DISABLE KEYS */;
INSERT INTO `detallesproyectos` VALUES (1,'Proyecto de bigdata','Se busca analizar datos de personas que viajan',200,15,0,'','Impulsar el turismo en las comunidades de méxico por medio de experiencias propias y aprender de ello','si','Humanidades Digitales','Machine learning','Expresar lo que las personas buscan al viajar','seed.pdf'),(2,'Proyecto SEED','Se busca analizar experiencias de personas que viajan',200,15,0,'','Impulsar el turismo en las comunidades de méxico por medio de experiencias propias y aprender de ello','si','Humanidades Digitales y psicologia','Machine learning y big data',' Crear modelo para tendencias de viajes y cultura local','seed.pdf'),(3,'Test de Proyecto','...',192,8,0,'','....','4','2','...','...','archivos/proyectos/resumen-e63ba64a72e1126b45ef15f111c037dd.pdf'),(4,'Test de Proyecto','...',192,8,0,'','....','4','2','...','...','archivos/proyectos/resumen-f99d78aff1880d574a080f8b735fb2db.pdf'),(5,'prueba de registro de proyecto','AquÃ­ va la descripciÃ³n del proyecto... se supone que este puede contener una gran cantidad de caracteres especiales como los acentos ya utilizados y la Ã±.',192,43,2,'porque si','...','3','2','ML','aquÃ­ va lo que se espera como resultado final del proyecto.','archivos/proyectos/resumen-770459091b37c54aa5de3fea3ba38fcf.pdf'),(6,'prueba de registro de proyecto','AquÃƒÂ­ va la descripciÃƒÂ³n del proyecto... se supone que este puede contener una gran cantidad de caracteres especiales como los acentos ya utilizados y la ÃƒÂ±.',192,43,2,'porque si','...','3','2','ML','aquÃƒÂ­ va lo que se espera como resultado final del proyecto.','archivos/proyectos/resumen-f207e003ce2af4c4a8ebc350213504a7.pdf'),(7,'prueba de registro de proyecto','Aquí va la descripción del proyecto... se supone que este puede contener una gran cantidad de caracteres especiales como los acentos ya utilizados y la ñ.',192,43,2,'porque si','...','3','2','ML','aquí va lo que se espera como resultado final del proyecto.','archivos/proyectos/resumen-88736f251fba3fa06a6039e41da4a4b9.pdf'),(8,'test con software 1','Aquí va una descripción chida :D',192,4,1,'por que pues si...','...','2','2','IA','','UNKNOW_ERRORS'),(9,'','',192,0,0,'','','','','','','UNKNOW_ERRORS'),(10,'','',192,0,0,'','','','','','','UNKNOW_ERRORS'),(11,'','',192,0,0,'','','','','','','UNKNOW_ERRORS'),(12,'','',192,0,0,'','','','','','','UNKNOW_ERRORS'),(13,'','',192,0,0,'','','','','','','UNKNOW_ERRORS'),(14,'','',192,0,0,'','','','','','','UNKNOW_ERRORS'),(15,'test con software','Avec le temps',192,5,1,'...','...','3','2','AI','...','archivos/proyectos/resumen-8344c84c59df2e77f286094f53ef4737.pdf'),(16,'test con software','...',192,15,2,'...','...','2','2','AI','...','archivos/proyectos/resumen-14f4155f9a6fbfb08c4f9e8cbdffaad5.pdf'),(17,'test con software','...',192,15,2,'...','...','2','2','AI','...','archivos/proyectos/resumen-2c8d7a27325609c50daef128577dbde7.pdf'),(18,'Desarrollo de un Sistema de Crowdsourcing Móvil','El objetivo de este sistema es la recolección de datos provenientes de cierta población, que ayuden a dar solución o mejora a diversas problemáticas sociales.',10,6,2,'Será necesaria para ejecutar tareas de procesamiento de lenguaje natural','Este tipo de proyectos requieren un nivel alto de disponibilidad en red, ya que un alto número de usuarios pueden solicitar subir datos a través del servicio RESTful.','2','2','Inteligencia Artificial','Se espera poder obtener las opiniones de los participantes acerca de ciertas problemáticas sociales.','archivos/proyectos/resumen-908ed3abf318c842723ab3ad14777516.pdf');
/*!40000 ALTER TABLE `detallesproyectos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gradosacademicos`
--

DROP TABLE IF EXISTS `gradosacademicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gradosacademicos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gradosacademicos`
--

LOCK TABLES `gradosacademicos` WRITE;
/*!40000 ALTER TABLE `gradosacademicos` DISABLE KEYS */;
INSERT INTO `gradosacademicos` VALUES (1,'Licenciatura'),(2,'Maestría'),(3,'Doctorado'),(4,'Otro');
/*!40000 ALTER TABLE `gradosacademicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paises`
--

DROP TABLE IF EXISTS `paises`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paises` (
  `ID` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paises`
--

LOCK TABLES `paises` WRITE;
/*!40000 ALTER TABLE `paises` DISABLE KEYS */;
INSERT INTO `paises` VALUES ('ABW','Aruba'),('AFG','Afganistán'),('AGO','Angola'),('AIA','Anguila'),('ALA','Islas de Åland'),('ALB','Albania'),('AND','Andorra'),('ARE','Emiratos Árabes Unidos'),('ARG','Argentina'),('ARM','Armenia'),('ASM','Samoa Americana'),('ATA','Antártida'),('ATF','Territorios Australes y Antárticas Franceses'),('ATG','Antigua y Barbuda'),('AUS','Australia'),('AUT','Austria'),('AZE','Azerbaiyán'),('BDI','Burundi'),('BEL','Bélgica'),('BEN','Benín'),('BFA','Burkina Faso'),('BGD','Bangladesh'),('BGR','Bulgaria'),('BHR','Bahrein'),('BHS','Bahamas'),('BIH','Bosnia y Herzegovina'),('BLM','San Bartolomé'),('BLR','Bielorrusia'),('BLZ','Belice'),('BMU','Islas Bermudas'),('BOL','Bolivia'),('BRA','Brasil'),('BRB','Barbados'),('BRN','Brunéi'),('BTN','Bhután'),('BVT','Isla Bouvet'),('BWA','Botsuana'),('CAF','República Centroafricana'),('CAN','Canadá'),('CCK','Islas Cocos (Keeling)'),('CHE','Suiza'),('CHL','Chile'),('CHN','China'),('CIV','Costa de Marfil'),('CMR','Camerún'),('COD','República Democrática del Congo'),('COG','República del Congo'),('COK','Islas Cook'),('COL','Colombia'),('COM','Comoras'),('CPV','Cabo Verde'),('CRI','Costa Rica'),('CUB','Cuba'),('CWU','Curazao'),('CXR','Isla de Navidad'),('CYM','Islas Caimán'),('CYP','Chipre'),('CZE','República Checa'),('DEU','Alemania'),('DJI','Yibuti'),('DMA','Dominica'),('DNK','Dinamarca'),('DOM','República Dominicana'),('DZA','Algeria'),('ECU','Ecuador'),('EGY','Egipto'),('ERI','Eritrea'),('ESH','Sahara Occidental'),('ESP','España'),('EST','Estonia'),('ETH','Etiopía'),('FIN','Finlandia'),('FJI','Fiyi'),('FLK','Islas Malvinas'),('FRA','Francia'),('FRO','Islas Feroe'),('FSM','Micronesia'),('GAB','Gabón'),('GBR','Reino Unido'),('GEO','Georgia'),('GGY','Guernsey'),('GHA','Ghana'),('GIB','Gibraltar'),('GIN','Guinea'),('GLP','Guadalupe'),('GMB','Gambia'),('GNB','Guinea-Bissau'),('GNQ','Guinea Ecuatorial'),('GRC','Grecia'),('GRD','Granada'),('GRL','Groenlandia'),('GTM','Guatemala'),('GUF','Guayana Francesa'),('GUM','Guam'),('GUY','Guyana'),('HKG','Hong kong'),('HMD','Islas Heard y McDonald'),('HND','Honduras'),('HRV','Croacia'),('HTI','Haití'),('HUN','Hungría'),('IDN','Indonesia'),('IMN','Isla de Man'),('IND','India'),('IOT','Territorio Británico del Océano Índico'),('IRL','Irlanda'),('IRN','Irán'),('IRQ','Irak'),('ISL','Islandia'),('ISR','Israel'),('ITA','Italia'),('JAM','Jamaica'),('JEY','Jersey'),('JOR','Jordania'),('JPN','Japón'),('KAZ','Kazajistán'),('KEN','Kenia'),('KGZ','Kirguistán'),('KHM','Camboya'),('KIR','Kiribati'),('KNA','San Cristóbal y Nieves'),('KOR','Corea del Sur'),('KWT','Kuwait'),('LAO','Laos'),('LBN','Líbano'),('LBR','Liberia'),('LBY','Libia'),('LCA','Santa Lucía'),('LIE','Liechtenstein'),('LKA','Sri lanka'),('LSO','Lesoto'),('LTU','Lituania'),('LUX','Luxemburgo'),('LVA','Letonia'),('MAC','Macao'),('MAF','San Martín (Francia)'),('MAR','Marruecos'),('MCO','Mónaco'),('MDA','Moldavia'),('MDG','Madagascar'),('MDV','Islas Maldivas'),('MEX','México'),('MHL','Islas Marshall'),('MKD','Macedônia'),('MLI','Mali'),('MLT','Malta'),('MMR','Birmania'),('MNE','Montenegro'),('MNG','Mongolia'),('MNP','Islas Marianas del Norte'),('MOZ','Mozambique'),('MRT','Mauritania'),('MSR','Montserrat'),('MTQ','Martinica'),('MUS','Mauricio'),('MWI','Malawi'),('MYS','Malasia'),('MYT','Mayotte'),('NAM','Namibia'),('NCL','Nueva Caledonia'),('NER','Niger'),('NFK','Isla Norfolk'),('NGA','Nigeria'),('NIC','Nicaragua'),('NIU','Niue'),('NLD','Países Bajos'),('NOR','Noruega'),('NPL','Nepal'),('NRU','Nauru'),('NZL','Nueva Zelanda'),('OMN','Omán'),('PAK','Pakistán'),('PAN','Panamá'),('PCN','Islas Pitcairn'),('PER','Perú'),('PHL','Filipinas'),('PLW','Palau'),('PNG','Papúa Nueva Guinea'),('POL','Polonia'),('PRI','Puerto Rico'),('PRK','Corea del Norte'),('PRT','Portugal'),('PRY','Paraguay'),('PSE','Palestina'),('PYF','Polinesia Francesa'),('QAT','Qatar'),('REU','Reunión'),('ROU','Rumanía'),('RUS','Rusia'),('RWA','Ruanda'),('SAU','Arabia Saudita'),('SDN','Sudán'),('SEN','Senegal'),('SGP','Singapur'),('SGS','Islas Georgias del Sur y Sandwich del Sur'),('SHN','Santa Elena'),('SJM','Svalbard y Jan Mayen'),('SLB','Islas Salomón'),('SLE','Sierra Leona'),('SLV','El Salvador'),('SMR','San Marino'),('SMX','Sint Maarten'),('SOM','Somalia'),('SPM','San Pedro y Miquelón'),('SRB','Serbia'),('SSD','República de Sudán del Sur'),('STP','Santo Tomé y Príncipe'),('SUR','Surinám'),('SVK','Eslovaquia'),('SVN','Eslovenia'),('SWE','Suecia'),('SWZ','Swazilandia'),('SYC','Seychelles'),('SYR','Siria'),('TCA','Islas Turcas y Caicos'),('TCD','Chad'),('TGO','Togo'),('THA','Tailandia'),('TJK','Tayikistán'),('TKL','Tokelau'),('TKM','Turkmenistán'),('TLS','Timor Oriental'),('TON','Tonga'),('TTO','Trinidad y Tobago'),('TUN','Tunez'),('TUR','Turquía'),('TUV','Tuvalu'),('TWN','Taiwán'),('TZA','Tanzania'),('UGA','Uganda'),('UKR','Ucrania'),('UMI','Islas Ultramarinas Menores de Estados Unidos'),('URY','Uruguay'),('USA','Estados Unidos de América'),('UZB','Uzbekistán'),('VAT','Ciudad del Vaticano'),('VCT','San Vicente y las Granadinas'),('VEN','Venezuela'),('VGB','Islas Vírgenes Británicas'),('VIR','Islas Vírgenes de los Estados Unidos'),('VNM','Vietnam'),('VUT','Vanuatu'),('WLF','Wallis y Futuna'),('WSM','Samoa'),('YEM','Yemen'),('ZAF','Sudáfrica'),('ZMB','Zambia'),('ZWE','Zimbabue');
/*!40000 ALTER TABLE `paises` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profesionales`
--

DROP TABLE IF EXISTS `profesionales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profesionales` (
  `nombres` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidoPaterno` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidoMaterno` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Este atributo es opcional por el caso de las personas que son extranjeros',
  `correo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefonoInstitucional` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefonoPersonal` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Este atributo es opcional',
  `institucionDeAdscripcion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paisDeLaInstitucion` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` binary(1) NOT NULL DEFAULT '0',
  `gradoAcademico` int(11) NOT NULL,
  `pass` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`correo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profesionales`
--

LOCK TABLES `profesionales` WRITE;
/*!40000 ALTER TABLE `profesionales` DISABLE KEYS */;
INSERT INTO `profesionales` VALUES ('viridiana','robledo','','viridiana.robledo@ipicyt.edu.mx','4621565956','4621565956','UASLP','MEX','1',3,'3418b0bb001722c4f40dc5d88f7f66ce');
/*!40000 ALTER TABLE `profesionales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `propuestasacademicas`
--

DROP TABLE IF EXISTS `propuestasacademicas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `propuestasacademicas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `estado` int(11) NOT NULL,
  `correoDelAcademico` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DetallesProyectos_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_PropuestasAcademicas_Academicos1_idx` (`correoDelAcademico`),
  KEY `fk_PropuestasAcademicas_DetallesProyectos1_idx` (`DetallesProyectos_ID`),
  CONSTRAINT `fk_PropuestasAcademicas_Academicos1` FOREIGN KEY (`correoDelAcademico`) REFERENCES `academicos` (`correo`),
  CONSTRAINT `fk_PropuestasAcademicas_DetallesProyectos1` FOREIGN KEY (`DetallesProyectos_ID`) REFERENCES `detallesproyectos` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `propuestasacademicas`
--

LOCK TABLES `propuestasacademicas` WRITE;
/*!40000 ALTER TABLE `propuestasacademicas` DISABLE KEYS */;
INSERT INTO `propuestasacademicas` VALUES (1,1,'leonardoalvriv@gmail.com',1),(2,1,'leonardoalvriv@gmail.com',5),(3,1,'leonardoalvriv@gmail.com',6),(4,1,'leonardoalvriv@gmail.com',7),(5,0,'leonardoalvriv@gmail.com',8),(6,0,'leonardoalvriv@gmail.com',9),(7,0,'leonardoalvriv@gmail.com',10),(8,0,'leonardoalvriv@gmail.com',11),(9,0,'leonardoalvriv@gmail.com',12),(10,0,'leonardoalvriv@gmail.com',13),(11,0,'leonardoalvriv@gmail.com',14),(12,0,'leonardoalvriv@gmail.com',15),(13,0,'leonardoalvriv@gmail.com',16),(14,0,'leonardoalvriv@gmail.com',17),(15,0,'leonardoalvriv@gmail.com',18);
/*!40000 ALTER TABLE `propuestasacademicas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `propuestasdependientes`
--

DROP TABLE IF EXISTS `propuestasdependientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `propuestasdependientes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `estado` int(11) NOT NULL,
  `correoDelGestor` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correoDelResponsable` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DetallesProyectos_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_PropuestasDependientes_Dependientes1_idx` (`correoDelGestor`),
  KEY `fk_PropuestasDependientes_Academicos1_idx` (`correoDelResponsable`),
  KEY `fk_PropuestasDependientes_DetallesProyectos1_idx` (`DetallesProyectos_ID`),
  CONSTRAINT `fk_PropuestasDependientes_Academicos1` FOREIGN KEY (`correoDelResponsable`) REFERENCES `academicos` (`correo`),
  CONSTRAINT `fk_PropuestasDependientes_Dependientes1` FOREIGN KEY (`correoDelGestor`) REFERENCES `dependientes` (`correo`),
  CONSTRAINT `fk_PropuestasDependientes_DetallesProyectos1` FOREIGN KEY (`DetallesProyectos_ID`) REFERENCES `detallesproyectos` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `propuestasdependientes`
--

LOCK TABLES `propuestasdependientes` WRITE;
/*!40000 ALTER TABLE `propuestasdependientes` DISABLE KEYS */;
INSERT INTO `propuestasdependientes` VALUES (3,1,'emilio.hernandez@ipicyt.edu.mx','leonardoalvriv@gmail.com',2);
/*!40000 ALTER TABLE `propuestasdependientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `propuestasprofesionales`
--

DROP TABLE IF EXISTS `propuestasprofesionales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `propuestasprofesionales` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `estado` int(11) NOT NULL,
  `correoDelProfesional` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DetallesProyectos_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_PropuestasAcademicas_copy1_Profesionales1_idx` (`correoDelProfesional`),
  KEY `fk_PropuestasProfesionales_DetallesProyectos1_idx` (`DetallesProyectos_ID`),
  CONSTRAINT `fk_PropuestasAcademicas_copy1_Profesionales1` FOREIGN KEY (`correoDelProfesional`) REFERENCES `profesionales` (`correo`),
  CONSTRAINT `fk_PropuestasProfesionales_DetallesProyectos1` FOREIGN KEY (`DetallesProyectos_ID`) REFERENCES `detallesproyectos` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `propuestasprofesionales`
--

LOCK TABLES `propuestasprofesionales` WRITE;
/*!40000 ALTER TABLE `propuestasprofesionales` DISABLE KEYS */;
/*!40000 ALTER TABLE `propuestasprofesionales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `softwarerequeridos`
--

DROP TABLE IF EXISTS `softwarerequeridos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `softwarerequeridos` (
  `DetallesProyectos_ID` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `version` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sitioWeb` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkDeLicencia` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  KEY `fk_SoftwareRequeridos_DetallesProyectos1_idx` (`DetallesProyectos_ID`),
  CONSTRAINT `fk_SoftwareRequeridos_DetallesProyectos1` FOREIGN KEY (`DetallesProyectos_ID`) REFERENCES `detallesproyectos` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `softwarerequeridos`
--

LOCK TABLES `softwarerequeridos` WRITE;
/*!40000 ALTER TABLE `softwarerequeridos` DISABLE KEYS */;
INSERT INTO `softwarerequeridos` VALUES (17,'Julia','1.3','julia.com','1','archivos/proyectos/licencia-2c8d7a27325609c50daef128577dbde7.pdf'),(18,'Python','3.7','https://python.com','1','UNKNOW_ERRORS'),(18,'Matlab','5','matlab.com','2','archivos/proyectos/licencia-908ed3abf318c842723ab3ad14777516.pdf'),(18,'julia','1.34','julia.com.mx','1','archivos/proyectos/licencia-908ed3abf318c842723ab3ad14777516.pdf');
/*!40000 ALTER TABLE `softwarerequeridos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiposdeacademico`
--

DROP TABLE IF EXISTS `tiposdeacademico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiposdeacademico` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiposdeacademico`
--

LOCK TABLES `tiposdeacademico` WRITE;
/*!40000 ALTER TABLE `tiposdeacademico` DISABLE KEYS */;
INSERT INTO `tiposdeacademico` VALUES (1,'Investigador'),(2,'Profesor');
/*!40000 ALTER TABLE `tiposdeacademico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiposdedependientes`
--

DROP TABLE IF EXISTS `tiposdedependientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiposdedependientes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiposdedependientes`
--

LOCK TABLES `tiposdedependientes` WRITE;
/*!40000 ALTER TABLE `tiposdedependientes` DISABLE KEYS */;
INSERT INTO `tiposdedependientes` VALUES (1,'Estudiante'),(2,'Postdoctorado');
/*!40000 ALTER TABLE `tiposdedependientes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-15 10:25:25
