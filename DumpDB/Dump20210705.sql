-- MySQL dump 10.13  Distrib 8.0.25, for Win64 (x86_64)
--
-- Host: localhost    Database: planningdoctrine
-- ------------------------------------------------------
-- Server version	5.7.34

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20210701133800','2021-07-01 13:38:26',116),('DoctrineMigrations\\Version20210701191740','2021-07-01 19:18:29',138),('DoctrineMigrations\\Version20210701200136','2021-07-01 20:01:49',224),('DoctrineMigrations\\Version20210702094835','2021-07-02 09:49:25',1287),('DoctrineMigrations\\Version20210703051715','2021-07-03 05:17:42',337),('DoctrineMigrations\\Version20210703052132','2021-07-03 05:21:52',280),('DoctrineMigrations\\Version20210703054135','2021-07-03 05:41:49',437),('DoctrineMigrations\\Version20210705082756','2021-07-05 08:28:08',202);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `tickets_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5C93B3A48FDC0E9A` (`tickets_id`),
  CONSTRAINT `FK_5C93B3A48FDC0E9A` FOREIGN KEY (`tickets_id`) REFERENCES `tickets` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (9,'reiciendis','repellat','http://lorempixel.com/150/150/?98578','1978-09-24','1973-07-07',NULL),(10,'dignissimos','natus','http://lorempixel.com/150/150/?20929','2016-05-06','1985-10-13',NULL),(11,'cum','iusto','http://lorempixel.com/150/150/?12906','1973-08-02','1981-04-05',NULL),(12,'nobis','odit','http://lorempixel.com/150/150/?56405','2011-09-16','1973-11-03',NULL),(13,'fugiat','necessitatibus','http://lorempixel.com/150/150/?74328','1978-03-25','2011-01-02',NULL),(14,'eum','occaecati','http://lorempixel.com/150/150/?58735','1974-03-26','1995-06-28',NULL);
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `secuser`
--

DROP TABLE IF EXISTS `secuser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `secuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_6A908FE9E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `secuser`
--

LOCK TABLES `secuser` WRITE;
/*!40000 ALTER TABLE `secuser` DISABLE KEYS */;
INSERT INTO `secuser` VALUES (8,'xTexier@tiscali.fr','[\"ROLE_USER\"]','$2y$13$xjqLlnlD3BgbRLeBrERyuu8DFwdiDde94FmFXxSqRPu60VwbwvZOS'),(9,'y.beneito@gmail.com','[\"ROLE_USER\"]','$2y$13$x8q1jkxY6z0gf6ri.oDuteI2ZYMiLEmj.v9BziuXcXv0lzpcWDyj.'),(10,'y.beneito@gmail.fr','[\"ROLE_ADMIN\"]','$2y$13$O3HNJ/scGnMZdiQXVBr/4OvzfZP.sr7P4nBfob3nGaBTYC03aXkkK');
/*!40000 ALTER TABLE `secuser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slogan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `projects_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_96C222581EDE0F55` (`projects_id`),
  CONSTRAINT `FK_96C222581EDE0F55` FOREIGN KEY (`projects_id`) REFERENCES `projects` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` VALUES (27,'quis','La team0','http://lorempixel.com/150/150/?55345',9),(28,'ea','La team1','http://lorempixel.com/150/150/?93541',NULL),(29,'sunt','La team2','http://lorempixel.com/150/150/?55591',NULL),(30,'est','La team0','http://lorempixel.com/150/150/?46521',NULL),(31,'quis','La team1','http://lorempixel.com/150/150/?20124',NULL),(32,'nisi','La team2','http://lorempixel.com/150/150/?70990',NULL);
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `status` smallint(6) NOT NULL,
  `tag` int(11) NOT NULL,
  `end` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_54469DF4A76ED395` (`user_id`),
  CONSTRAINT `FK_54469DF4A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
INSERT INTO `tickets` VALUES (1,NULL,1,1234,'1976-11-22 02:11:42'),(2,NULL,1,1234,'1991-07-02 07:14:56'),(3,NULL,1,1234,'1983-07-19 01:35:41');
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (21,'Timothée','Delahaye','Michelle.Pruvost@club-internet.fr','http://lorempixel.com/150/150/?56887','quis','})m#Hn%+.oQtX0V5'),(22,'Adrien','Delaunay','Valette.Colette@free.fr','http://lorempixel.com/150/150/?65484','laborum','^-lB_xek>oGj_K_/Po<\''),(23,'Émilie','Ferreira','Elisabeth.Georges@sfr.fr','http://lorempixel.com/150/150/?13093','consequuntur','h=)3y38fvILRplXz'),(24,'Yohan','Beneito','y.beneito@gmail.com','http://lorempixel.com/150/150/?13093','waz','123456'),(25,'Auguste','Martineau','Thomas00@free.fr','http://lorempixel.com/150/150/?25749','quia','M^AwQ^hzWg7Oi['),(26,'Jacqueline','Weiss','pAlves@orange.fr','http://lorempixel.com/150/150/?23372','enim','M;bDe|x!eI3W@aD}HQ%q'),(27,'Gabriel','Hardy','Alice37@Laroche.fr','http://lorempixel.com/150/150/?82836','omnis','N2)|AVez37pI:');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_teams`
--

DROP TABLE IF EXISTS `users_teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users_teams` (
  `users_id` int(11) NOT NULL,
  `teams_id` int(11) NOT NULL,
  PRIMARY KEY (`users_id`,`teams_id`),
  KEY `IDX_71B5861167B3B43D` (`users_id`),
  KEY `IDX_71B58611D6365F12` (`teams_id`),
  CONSTRAINT `FK_71B5861167B3B43D` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_71B58611D6365F12` FOREIGN KEY (`teams_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_teams`
--

LOCK TABLES `users_teams` WRITE;
/*!40000 ALTER TABLE `users_teams` DISABLE KEYS */;
INSERT INTO `users_teams` VALUES (24,27),(24,28),(24,29);
/*!40000 ALTER TABLE `users_teams` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-07-05 18:23:02
