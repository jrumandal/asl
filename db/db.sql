-- MySQL dump 10.13  Distrib 5.7.9, for Win32 (AMD64)
--
-- Host: localhost    Database: asl
-- ------------------------------------------------------
-- Server version	5.7.11-log

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
-- Table structure for table `accessi`
--

DROP TABLE IF EXISTS `accessi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accessi` (
  `ID_Accesso` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `User` char(32) NOT NULL,
  `LoginDate` date NOT NULL,
  PRIMARY KEY (`ID_Accesso`),
  KEY `User` (`User`),
  CONSTRAINT `accessi_ibfk_1` FOREIGN KEY (`User`) REFERENCES `accounting` (`User`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accessi`
--

LOCK TABLES `accessi` WRITE;
/*!40000 ALTER TABLE `accessi` DISABLE KEYS */;
INSERT INTO `accessi` VALUES (1,'admin','2016-07-06'),(2,'umandal.john','2016-07-06'),(3,'admin','2016-07-06'),(4,'calderazzo.niccolo','2016-07-06'),(5,'admin','2016-07-08'),(6,'umandal.john','2016-07-08'),(7,'admin','2016-07-08'),(8,'admin','2016-07-08'),(9,'admin','2016-07-08'),(10,'caporalini.niccolo','2016-07-08'),(11,'umandal.john','2016-08-03'),(12,'admin','2016-08-03'),(13,'umandal.john','2016-08-03'),(14,'umandal.john','2016-08-19');
/*!40000 ALTER TABLE `accessi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `accounting`
--

DROP TABLE IF EXISTS `accounting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accounting` (
  `User` char(32) NOT NULL,
  `Password` char(32) NOT NULL,
  `ID_Rango` int(10) unsigned NOT NULL,
  PRIMARY KEY (`User`),
  KEY `ID_Rango` (`ID_Rango`),
  CONSTRAINT `accounting_ibfk_1` FOREIGN KEY (`ID_Rango`) REFERENCES `ranghi` (`ID_Rango`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounting`
--

LOCK TABLES `accounting` WRITE;
/*!40000 ALTER TABLE `accounting` DISABLE KEYS */;
INSERT INTO `accounting` VALUES ('acai.phoenix','4926719c59b9aa2f376b7d00fe096680',3),('admin','21232f297a57a5a743894a0e4a801fc3',4),('aironi','761dba30019689f1454ebd80e8584c05',3),('anselmi.daniele','ced9cd6d9045273d0959ef490fc29638',1),('arefayne.filmon','e042e500a6068637a953b30d726f23bc',1),('azienda.diritto.uni','89921d2c4eb9df4079269108d7275ac7',3),('barletti.andrea','0caac31c3de740dac8128b396ec9f708',1),('bassifondi.mariana','74a7ffa6b70c74a6ac42676379d55cc8',2),('bertoli.francesco','ad35bdf43b8a55c8ee44c8551c08a4ad',2),('bianco.bruno','bba2269ac8623803a299444ca8763486',2),('braccini.gianluca','7aca48c1ceccd1971716f89768ad3118',2),('calderazzo.niccolo','b90832b9729d84f835932c726e65f9b1',1),('calosci.jan','e2c603bfea15a5c5ae91d15a38c49083',1),('calosi.lorenzo','e5e40181a8dbb17bb136b3c4c96830d6',1),('cambi.valentina','25022657f4a9eebe2197f16318853cff',1),('canti.edoardo','4736e990b4ad93edd138b2c1b96728e1',1),('caporalini.niccolo','4736e990b4ad93edd138b2c1b96728e1',1),('carniani.simone','451219385030d8c6199a33b19039bde7',1),('celima.isabel','bc76eb5e17703acda2e2dc725f6e1804',1),('commit.software','dc39a0e446000db4b4e7b452ac80b9ba',3),('corbo.samuele','57ab593abfe7870be24fc21a5cf886b0',1),('d addetta.primiano','c7cd04a08e50352a3bbd92d34e6f2c48',1),('de rita.giovanni','d102440315ea875fc166981ba43ac73b',2),('della fortuna.marco','7606ee8bc9c7bee6eff59f18bf648a39',1),('ente.diritto.uni','70d251b6b81fa33aec01b77f04c09e7a',3),('firmiano.antonio','07f5b6be5c38c44c7d6bf150ac81a3fb',1),('futurantica','9765ac3b0aa8fcb2e76e97d91ab65c06',3),('gambardella.michele','bfb280a53d99abfb7f18db9a99a579e4',1),('globus.spa','0c3ed999c5bd93cf659341d7430f476b',3),('grossi.valentina','350a710c87084ea3764556d0fecdb33f',1),('horizons.unlimited','3a8245290e9d2bb2656c451ea94e6579',3),('infomouse','0826ecc7ac9481aab2a97785cd77fa2d',3),('ingenito.erika','041187fb6db32e66ae6ffdb9d5682219',2),('leso.pippo','9112440509f9ea9b0dd462f9e7dd9df5',2),('maggioni.niccolo','9306381cfbcfffc186fa814fde278fc4',1),('magrini.pietro','34c29b3cde78d7d19d084778eb84c323',1),('mancuso.marco','365200ca118b41cf0a670d7d1d1f3355',2),('manetti.mirko','4e5c6b1e36cc964cc787736d7baa7e22',1),('meini.fabio','ceacbadeb90b347f171e05542d8c8265',1),('misuri.andrea','77ef672e26d1673d9b0aa1ca93bc3c41',1),('monda.elisabetta','aab5274779bb2f3ee8cd8b504b96071d',2),('paoli.matteo','59a3a43cf9dfb28c32f8f881025c2f61',2),('passaparola.ernesto','fc4ef9668e6a23ed1c3e940c6b7c721d',2),('peduto.vito','800a4ffa218f52e0aa132ef34d622386',2),('pescioni.stefano','e6df6b8248fb08e855537d7319900c16',1),('picerno.filippo','e69eb29b876b9f6568b1d46cd3d50d65',1),('sacca.sergio','6ed7c8d90ad1e63d597d9a58150c1871',1),('salvadorini.simona','3a5fa50590c1be82adf117bca67bb983',2),('santucci.monica','615b49d9241ca243886988b07df3ec71',2),('scrivere.leonardo','1945f1921e49783d73d97dcacd35e615',1),('suppaiah.rich','2b3bdd306c688457464e98e11b4c3e5c',1),('trussardi.gaia','b38b1fafe13f5dd0d08e64d31a8878be',1),('umandal.john','4a5c4cebd5d0b7ea0fb24a451829b4aa',1),('zebbino.kenneth','9e882ff2f82554eeb5b360ac15827912',2);
/*!40000 ALTER TABLE `accounting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `autovalutazioni`
--

DROP TABLE IF EXISTS `autovalutazioni`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `autovalutazioni` (
  `ID_Autovalutazione` int(11) NOT NULL AUTO_INCREMENT,
  `Matricola` int(10) unsigned NOT NULL,
  `DataValutazione` date NOT NULL,
  `ID_Stage` int(10) unsigned NOT NULL,
  PRIMARY KEY (`ID_Autovalutazione`),
  KEY `Matricola` (`Matricola`),
  KEY `ID_Stage` (`ID_Stage`),
  CONSTRAINT `autovalutazioni_ibfk_1` FOREIGN KEY (`Matricola`) REFERENCES `studenti` (`Matricola`),
  CONSTRAINT `autovalutazioni_ibfk_2` FOREIGN KEY (`ID_Stage`) REFERENCES `stage` (`ID_Stage`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autovalutazioni`
--

LOCK TABLES `autovalutazioni` WRITE;
/*!40000 ALTER TABLE `autovalutazioni` DISABLE KEYS */;
INSERT INTO `autovalutazioni` VALUES (1,29,'2016-07-06',1),(2,2,'2016-07-06',2),(3,20,'2016-07-08',4);
/*!40000 ALTER TABLE `autovalutazioni` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `classi`
--

DROP TABLE IF EXISTS `classi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classi` (
  `ID_Classe` char(5) NOT NULL,
  `ID_Specializzazione` int(10) unsigned NOT NULL,
  PRIMARY KEY (`ID_Classe`),
  KEY `ID_Specializzazione` (`ID_Specializzazione`),
  CONSTRAINT `classi_ibfk_1` FOREIGN KEY (`ID_Specializzazione`) REFERENCES `specializzazioni` (`ID_Specializzazione`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classi`
--

LOCK TABLES `classi` WRITE;
/*!40000 ALTER TABLE `classi` DISABLE KEYS */;
INSERT INTO `classi` VALUES ('3AINF',2),('4AINF',2),('5AINF',2),('3AMEC',3),('4AMEC',3),('5AMEC',3),('3ATEL',4),('4ATEL',4),('5ATEL',4),('3AELE',5),('4AELE',5),('5AELE',5),('3ACOS',6),('4ACOS',6),('5ACOS',6),('3ACHI',7),('4ACHI',7),('5ACHI',7),('3AAUT',8),('4AAUT',8),('5AAUT',8),('3AFOT',9),('4AFOT',9),('5AFOT',9),('3AODO',10),('4AODO',10),('5AODO',10),('3AGRA',11),('4AGRA',11),('5AGRA',11);
/*!40000 ALTER TABLE `classi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `codiciverifica`
--

DROP TABLE IF EXISTS `codiciverifica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `codiciverifica` (
  `ID_CodiceVerifica` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Codice` char(5) NOT NULL,
  `Usato` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_CodiceVerifica`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `codiciverifica`
--

LOCK TABLES `codiciverifica` WRITE;
/*!40000 ALTER TABLE `codiciverifica` DISABLE KEYS */;
INSERT INTO `codiciverifica` VALUES (1,'00000',0),(2,'00001',0),(3,'00002',0),(4,'00003',0),(5,'00004',0),(6,'00005',0),(7,'00006',0),(8,'00007',0);
/*!40000 ALTER TABLE `codiciverifica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `domande`
--

DROP TABLE IF EXISTS `domande`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `domande` (
  `ID_Domanda` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Descrizione` char(255) NOT NULL,
  `Tipo` char(2) NOT NULL,
  PRIMARY KEY (`ID_Domanda`),
  KEY `Tipo` (`Tipo`),
  CONSTRAINT `domande_ibfk_1` FOREIGN KEY (`Tipo`) REFERENCES `tipivalutazione` (`Tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `domande`
--

LOCK TABLES `domande` WRITE;
/*!40000 ALTER TABLE `domande` DISABLE KEYS */;
INSERT INTO `domande` VALUES (1,'Avevi le conoscenze adeguate per affrontare i compiti che ti sono stati assegnati','IN'),(2,'I compiti assegnati ti sono sembrati coerenti con il percorso formativo da te intrapreso','PF'),(3,'Quanto impegno ti sembra di aver dedicato all\'attività svolta','MP'),(4,'Nel contesto in cui sei stato/a inserito/a hai avuto spazi di autonomia e di iniziativa personale))','AU'),(5,'Sei Soddisfatto dell\'immagine di te che hai trasmesso','AL'),(6,'Ritieni di aver tratto vantaggio dallʼesperienza di Alternanza Scuola Lavoro','ES'),(7,'Ritieni che lʼAlternanza sia una modalità di apprendimento efficace','ES'),(8,'Il tempo trascorso in azienda, rispetto alle finalità generali del progetto ed ai contenuti dellʼAlternanza, è stato adeguato','TA'),(9,'Rispetto alle tue aspettative lʼambiente di lavoro che hai sperimentato ti è sembrato migliore di come lo immaginavi','CL'),(10,'Da questa esperienza pesi di aver ricavato maggiori sollecitazioni allo studio','AP'),(11,'Da questa esperienza pesi di aver ricavato utili indicazioni al fine di orientare le tue scelte future','AP'),(12,'Quali sono stati gli aspetti positivi del Progetto di Alternanza?','DA'),(13,'Quali sono stati gli aspetti negativi del Progetto di Alternanza?','DA'),(14,'Che cosa cambieresti per migliorare il Progetto di Alternanza?','DA'),(15,'Quali materie di studio previste nel percorso curricolare sono state direttamente interessate dallʼesperienza lavorativa?','DA');
/*!40000 ALTER TABLE `domande` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entiaziende`
--

DROP TABLE IF EXISTS `entiaziende`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entiaziende` (
  `ID_EnteAzienda` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nome` char(100) NOT NULL,
  `Indirizzo` char(255) DEFAULT NULL,
  `User` char(32) DEFAULT NULL,
  PRIMARY KEY (`ID_EnteAzienda`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entiaziende`
--

LOCK TABLES `entiaziende` WRITE;
/*!40000 ALTER TABLE `entiaziende` DISABLE KEYS */;
INSERT INTO `entiaziende` VALUES (1,'Glo.bu.s S.p.a.','Via Mannelli 147/9a',NULL),(2,'Ente regionale per il diritto allo studio universitario','Vicolo della Serpe 1, 60121 Ancona',NULL),(3,'Azienda regionale per il diritto allo studio universitario di Bologna','Via Einstein 39, 70100 Bologna',NULL),(4,'CoopAcai Phoenix Arl','Viale Giulio Cesare 47, 00192 Roma',NULL),(5,'Futurantica, Servizi per i beni culturali','Via Libertà 167, 90143 Palermo',NULL),(6,'Infomouse','Via Nino Bonnet 11/A, 20154 Milano',NULL),(7,'Horizons Unlimited srl','Via Cignani 66, 40128 Bologna',NULL),(8,'Gli Aironi','Via XI febbraio 25, Sannazzaro de’ Burgundi, Pavia',NULL),(9,'Commit Software','Via Mario de\' Bernardi 65, 50145 Firenze',NULL);
/*!40000 ALTER TABLE `entiaziende` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `informazionistage`
--

DROP TABLE IF EXISTS `informazionistage`;
/*!50001 DROP VIEW IF EXISTS `informazionistage`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `informazionistage` AS SELECT 
 1 AS `id_stage`,
 1 AS `stud_nome`,
 1 AS `stud_cognome`,
 1 AS `id_azienda`,
 1 AS `azienda_nome`,
 1 AS `attivita`,
 1 AS `tutoraziendale`,
 1 AS `ins_nome`,
 1 AS `ins_cognome`,
 1 AS `datainizio`,
 1 AS `datafine`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `insegna`
--

DROP TABLE IF EXISTS `insegna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `insegna` (
  `Matricola` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ID_Classe` char(5) NOT NULL,
  KEY `Matricola` (`Matricola`),
  KEY `ID_Classe` (`ID_Classe`),
  CONSTRAINT `insegna_ibfk_1` FOREIGN KEY (`Matricola`) REFERENCES `insegnanti` (`Matricola`),
  CONSTRAINT `insegna_ibfk_2` FOREIGN KEY (`ID_Classe`) REFERENCES `classi` (`ID_Classe`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insegna`
--

LOCK TABLES `insegna` WRITE;
/*!40000 ALTER TABLE `insegna` DISABLE KEYS */;
INSERT INTO `insegna` VALUES (1,'3AINF'),(1,'4AINF'),(1,'5AINF'),(2,'4AINF'),(2,'5AINF'),(3,'3AINF'),(3,'4AINF'),(3,'5AINF'),(4,'3AINF'),(4,'5AINF'),(5,'5AINF'),(6,'5AINF'),(7,'3AINF'),(7,'4AINF'),(7,'5AINF'),(7,'5AMEC'),(8,'3AINF'),(9,'3AINF');
/*!40000 ALTER TABLE `insegna` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insegnanti`
--

DROP TABLE IF EXISTS `insegnanti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `insegnanti` (
  `Matricola` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nome` char(30) NOT NULL,
  `Cognome` char(30) NOT NULL,
  `User` char(32) DEFAULT NULL,
  PRIMARY KEY (`Matricola`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insegnanti`
--

LOCK TABLES `insegnanti` WRITE;
/*!40000 ALTER TABLE `insegnanti` DISABLE KEYS */;
INSERT INTO `insegnanti` VALUES (1,'Vito','Peduto',NULL),(2,'Francesco','Bertoli',NULL),(3,'Giovanni','De Rita',NULL),(4,'Marco','Mancuso',NULL),(5,'Monica','Santucci',NULL),(6,'Simona','Salvadorini',NULL),(7,'Stefania','Bianchina',NULL),(8,'Ernesto','Passaparola',NULL),(9,'Gianluca','Braccini',NULL),(10,'Elisabetta','Monda',NULL),(11,'Erika','Ingenito',NULL),(12,'Matteo','Paoli',NULL),(13,'Mariana','Bassifondi',NULL),(14,'Pippo','Leso',NULL),(15,'Kenneth','Zebbino',NULL);
/*!40000 ALTER TABLE `insegnanti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `iscritto`
--

DROP TABLE IF EXISTS `iscritto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `iscritto` (
  `Matricola` int(10) unsigned NOT NULL,
  `ID_Classe` char(5) NOT NULL,
  `AnnoIscrizione` int(10) unsigned NOT NULL,
  KEY `Matricola` (`Matricola`),
  KEY `ID_Classe` (`ID_Classe`),
  CONSTRAINT `iscritto_ibfk_1` FOREIGN KEY (`Matricola`) REFERENCES `studenti` (`Matricola`),
  CONSTRAINT `iscritto_ibfk_2` FOREIGN KEY (`ID_Classe`) REFERENCES `classi` (`ID_Classe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `iscritto`
--

LOCK TABLES `iscritto` WRITE;
/*!40000 ALTER TABLE `iscritto` DISABLE KEYS */;
INSERT INTO `iscritto` VALUES (1,'4AINF',2015),(2,'4AINF',2015),(3,'4AINF',2015),(4,'4AINF',2015),(5,'4AINF',2015),(6,'4AINF',2015),(7,'4AINF',2015),(8,'4AINF',2015),(9,'4AINF',2015),(10,'4AINF',2015),(11,'4AINF',2015),(12,'4AINF',2015),(13,'4AINF',2015),(14,'4AINF',2015),(15,'5AINF',2015),(16,'5AINF',2015),(17,'5AINF',2015),(18,'5AINF',2015),(19,'5AINF',2015),(20,'5AINF',2015),(21,'5AINF',2015),(22,'5AINF',2015),(23,'5AINF',2015),(24,'5AINF',2015),(25,'5AINF',2015),(26,'5AINF',2015),(27,'5AINF',2015),(28,'5AINF',2015),(29,'5AINF',2015);
/*!40000 ALTER TABLE `iscritto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partecipa`
--

DROP TABLE IF EXISTS `partecipa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partecipa` (
  `Matricola` int(10) unsigned NOT NULL,
  `ID_Stage` int(10) unsigned NOT NULL,
  `DataInizio` date NOT NULL,
  `DataFine` date NOT NULL,
  KEY `Matricola` (`Matricola`),
  KEY `ID_Stage` (`ID_Stage`),
  CONSTRAINT `partecipa_ibfk_1` FOREIGN KEY (`Matricola`) REFERENCES `studenti` (`Matricola`),
  CONSTRAINT `partecipa_ibfk_2` FOREIGN KEY (`ID_Stage`) REFERENCES `stage` (`ID_Stage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partecipa`
--

LOCK TABLES `partecipa` WRITE;
/*!40000 ALTER TABLE `partecipa` DISABLE KEYS */;
INSERT INTO `partecipa` VALUES (29,1,'2016-07-08','2016-07-10'),(2,2,'2016-07-15','2016-07-29'),(20,4,'2016-07-09','2016-07-16'),(29,3,'2016-08-03','2016-08-04');
/*!40000 ALTER TABLE `partecipa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ranghi`
--

DROP TABLE IF EXISTS `ranghi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ranghi` (
  `ID_Rango` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nome` char(32) NOT NULL,
  `Scrittura` tinyint(1) NOT NULL DEFAULT '0',
  `Lettura` tinyint(1) NOT NULL DEFAULT '0',
  `Modifica` tinyint(1) NOT NULL DEFAULT '0',
  `Cancellazione` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_Rango`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ranghi`
--

LOCK TABLES `ranghi` WRITE;
/*!40000 ALTER TABLE `ranghi` DISABLE KEYS */;
INSERT INTO `ranghi` VALUES (1,'Studente',1,1,1,0),(2,'Professore',0,1,1,0),(3,'Azienda',0,1,0,0),(4,'Amministratore',1,1,1,1);
/*!40000 ALTER TABLE `ranghi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `specializzazioni`
--

DROP TABLE IF EXISTS `specializzazioni`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `specializzazioni` (
  `ID_Specializzazione` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Descrizione` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_Specializzazione`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `specializzazioni`
--

LOCK TABLES `specializzazioni` WRITE;
/*!40000 ALTER TABLE `specializzazioni` DISABLE KEYS */;
INSERT INTO `specializzazioni` VALUES (1,'Biennio'),(2,'Informatica'),(3,'Meccanica'),(4,'Telecomunicazioni'),(5,'Elettronica'),(6,'Costruzione'),(7,'Chimica'),(8,'Automazione'),(9,'Fotografia'),(10,'Odontoiatria'),(11,'Grafico');
/*!40000 ALTER TABLE `specializzazioni` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stage`
--

DROP TABLE IF EXISTS `stage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stage` (
  `ID_Stage` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ID_EnteAzienda` int(10) unsigned NOT NULL,
  `AttivitaSettore` varchar(50) NOT NULL,
  `MatricolaTutorInterno` int(10) unsigned NOT NULL,
  `TutorAziendale` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_Stage`),
  KEY `ID_EnteAzienda` (`ID_EnteAzienda`),
  KEY `MatricolaTutorInterno` (`MatricolaTutorInterno`),
  CONSTRAINT `stage_ibfk_1` FOREIGN KEY (`ID_EnteAzienda`) REFERENCES `entiaziende` (`ID_EnteAzienda`),
  CONSTRAINT `stage_ibfk_2` FOREIGN KEY (`MatricolaTutorInterno`) REFERENCES `insegnanti` (`Matricola`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stage`
--

LOCK TABLES `stage` WRITE;
/*!40000 ALTER TABLE `stage` DISABLE KEYS */;
INSERT INTO `stage` VALUES (1,1,'SISTEMISTA',1,'Daidone Federico'),(2,6,'CUOCO',2,'Miriano Moschi'),(3,6,'Lavapiatti',3,'Ing. Poppo'),(4,9,'Lavapiatti',4,'Tutor Aziendale');
/*!40000 ALTER TABLE `stage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `studenti`
--

DROP TABLE IF EXISTS `studenti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `studenti` (
  `Matricola` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nome` char(30) NOT NULL,
  `Cognome` char(30) NOT NULL,
  `User` char(32) DEFAULT NULL,
  PRIMARY KEY (`Matricola`),
  KEY `User` (`User`),
  CONSTRAINT `studenti_ibfk_1` FOREIGN KEY (`User`) REFERENCES `accounting` (`User`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `studenti`
--

LOCK TABLES `studenti` WRITE;
/*!40000 ALTER TABLE `studenti` DISABLE KEYS */;
INSERT INTO `studenti` VALUES (1,'Daniele','Anselmi','anselmi.daniele'),(2,'Niccolo','Calderazzo','calderazzo.niccolo'),(3,'Jan','Calosci','calosci.jan'),(4,'Samuele','Corbo','corbo.samuele'),(5,'Antonio','Firmiano','firmiano.antonio'),(6,'Niccolo','Maggioni','maggioni.niccolo'),(7,'Mirko','Manetti','manetti.mirko'),(8,'Fabio','Meini','meini.fabio'),(9,'Andrea','Misuri','misuri.andrea'),(10,'Stefano','Pescioni','pescioni.stefano'),(11,'Filippo','Picerno','picerno.filippo'),(12,'Sergio','Sacca','sacca.sergio'),(13,'Leonardo','Scrivere','scrivere.leonardo'),(14,'Gaia','Trussardi','trussardi.gaia'),(15,'Filmon','Arefayne','arefayne.filmon'),(16,'Andrea','Barletti','barletti.andrea'),(17,'Lorenzo','Calosi','calosi.lorenzo'),(18,'Valentina','Cambi','cambi.valentina'),(19,'Edoardo','Canti','canti.edoardo'),(20,'Niccolo','Caporalini','caporalini.niccolo'),(21,'Simone','Carniani','carniani.simone'),(22,'Isabel','Celima','celima.isabel'),(23,'Primiano','D Addetta','d addetta.primiano'),(24,'Marco','Della Fortuna','della fortuna.marco'),(25,'Michele','Gambardella','gambardella.michele'),(26,'Valentina','Grossi','grossi.valentina'),(27,'Pietro','Magrini','magrini.pietro'),(28,'Rich','Suppaiah','suppaiah.rich'),(29,'John','Umandal','umandal.john');
/*!40000 ALTER TABLE `studenti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipivalutazione`
--

DROP TABLE IF EXISTS `tipivalutazione`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipivalutazione` (
  `Tipo` char(2) NOT NULL,
  `Descrizione` char(255) NOT NULL,
  PRIMARY KEY (`Tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipivalutazione`
--

LOCK TABLES `tipivalutazione` WRITE;
/*!40000 ALTER TABLE `tipivalutazione` DISABLE KEYS */;
INSERT INTO `tipivalutazione` VALUES ('AL','Altro'),('AP','Apprendimento'),('AS','Azienda scuola'),('AU','Autonomia'),('CL','Clima'),('DA','Domanda aperta'),('EF','Efficacia'),('ES','Esperienza'),('IN','Conoscenze iniziali'),('MP','Impegno'),('PF','Progetto formativo'),('PP','Proposte professionali'),('TA','Tempo adeguato');
/*!40000 ALTER TABLE `tipivalutazione` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vota`
--

DROP TABLE IF EXISTS `vota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vota` (
  `ID_Autovalutazione` int(11) NOT NULL,
  `ID_Domanda` int(10) unsigned NOT NULL,
  `Voto` int(10) unsigned NOT NULL DEFAULT '2',
  `Risposta` char(255) DEFAULT NULL,
  KEY `ID_Autovalutazione` (`ID_Autovalutazione`),
  KEY `ID_Domanda` (`ID_Domanda`),
  CONSTRAINT `vota_ibfk_1` FOREIGN KEY (`ID_Autovalutazione`) REFERENCES `autovalutazioni` (`ID_Autovalutazione`),
  CONSTRAINT `vota_ibfk_2` FOREIGN KEY (`ID_Domanda`) REFERENCES `domande` (`ID_Domanda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vota`
--

LOCK TABLES `vota` WRITE;
/*!40000 ALTER TABLE `vota` DISABLE KEYS */;
INSERT INTO `vota` VALUES (1,1,2,NULL),(1,2,3,NULL),(1,3,4,NULL),(1,4,3,NULL),(1,5,3,NULL),(1,6,4,NULL),(1,7,4,NULL),(1,8,3,NULL),(1,9,4,NULL),(1,10,2,NULL),(1,11,1,NULL),(1,12,2,'no'),(1,13,2,'si'),(1,14,2,'nulla'),(1,15,2,'non saprei'),(2,1,1,NULL),(2,2,1,NULL),(2,3,1,NULL),(2,4,1,NULL),(2,5,1,NULL),(2,6,1,NULL),(2,7,1,NULL),(2,8,1,NULL),(2,9,1,NULL),(2,10,1,NULL),(2,11,1,NULL),(2,12,2,''),(2,13,2,''),(2,14,2,''),(2,15,2,''),(3,1,1,NULL),(3,2,1,NULL),(3,3,1,NULL),(3,4,1,NULL),(3,5,1,NULL),(3,6,1,NULL),(3,7,1,NULL),(3,8,1,NULL),(3,9,1,NULL),(3,10,1,NULL),(3,11,1,NULL),(3,12,2,''),(3,13,2,''),(3,14,2,''),(3,15,2,'');
/*!40000 ALTER TABLE `vota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `informazionistage`
--

/*!50001 DROP VIEW IF EXISTS `informazionistage`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `informazionistage` AS (select `s`.`ID_Stage` AS `id_stage`,`stud`.`Nome` AS `stud_nome`,`stud`.`Cognome` AS `stud_cognome`,`ea`.`ID_EnteAzienda` AS `id_azienda`,`ea`.`Nome` AS `azienda_nome`,`s`.`AttivitaSettore` AS `attivita`,`s`.`TutorAziendale` AS `tutoraziendale`,`i`.`Nome` AS `ins_nome`,`i`.`Cognome` AS `ins_cognome`,`p`.`DataInizio` AS `datainizio`,`p`.`DataFine` AS `datafine` from ((((`studenti` `stud` join `partecipa` `p`) join `insegnanti` `i`) join `stage` `s`) join `entiaziende` `ea`) where ((`stud`.`Matricola` = `p`.`Matricola`) and (`p`.`ID_Stage` = `s`.`ID_Stage`) and (`s`.`ID_EnteAzienda` = `ea`.`ID_EnteAzienda`) and (`s`.`MatricolaTutorInterno` = `i`.`Matricola`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-19  3:05:59
