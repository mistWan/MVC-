-- MySQL dump 10.16  Distrib 10.1.21-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.1.21-MariaDB

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
-- Table structure for table `ask_category`
--

DROP TABLE IF EXISTS `ask_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ask_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(32) DEFAULT NULL,
  `cat_logo` varchar(128) DEFAULT NULL,
  `cat_desc` varchar(32) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ask_category`
--

LOCK TABLES `ask_category` WRITE;
/*!40000 ALTER TABLE `ask_category` DISABLE KEYS */;
INSERT INTO `ask_category` VALUES (1,'PHP','20181004/thumb_iou_5bb596525c2b89.62193774.jpg','Best lang!',0),(2,'thinkphp','20181004/thumb_iou_5bb59677ea9fe1.22652528.png','BeOfPHP',1),(3,'Css','20181004/thumb_iou_5bb596976dc7d3.41071416.png','sheetStyle',0),(4,'less','20181004/thumb_iou_5bb596bfad8159.91883238.png','BeOfCSS',3);
/*!40000 ALTER TABLE `ask_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `ask_hot_topic`
--

DROP TABLE IF EXISTS `ask_hot_topic`;
/*!50001 DROP VIEW IF EXISTS `ask_hot_topic`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `ask_hot_topic` (
  `topic_id` tinyint NOT NULL,
  `topic_title` tinyint NOT NULL,
  `topic_pic` tinyint NOT NULL,
  `q_nums` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `ask_message`
--

DROP TABLE IF EXISTS `ask_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ask_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(13) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `send_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ask_message`
--

LOCK TABLES `ask_message` WRITE;
/*!40000 ALTER TABLE `ask_message` DISABLE KEYS */;
INSERT INTO `ask_message` VALUES (1,'18772930944','6989',1538626681);
/*!40000 ALTER TABLE `ask_message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ask_question`
--

DROP TABLE IF EXISTS `ask_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ask_question` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_title` varchar(128) DEFAULT NULL,
  `question_desc` text,
  `cat_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `pub_time` int(11) DEFAULT NULL,
  `focus_nums` int(11) DEFAULT NULL,
  `view_num` int(11) DEFAULT NULL,
  `reply_num` int(11) DEFAULT NULL,
  `static_url` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ask_question`
--

LOCK TABLES `ask_question` WRITE;
/*!40000 ALTER TABLE `ask_question` DISABLE KEYS */;
INSERT INTO `ask_question` VALUES (1,'读书',NULL,1,1,1538739415,NULL,NULL,NULL,NULL),(2,'动力源于生活，生活源于爱情',NULL,1,1,1538739415,NULL,NULL,NULL,NULL),(3,'《白鹿原》- 半世纪的风云变幻',NULL,1,1,1538739415,NULL,NULL,NULL,NULL),(4,'聊斋风月说之《画皮》-匀木说聊斋',NULL,1,1,1538739415,NULL,NULL,NULL,NULL),(5,'浅尝爱伦·坡之“毒药”——读《爱伦·坡短篇小说集》',NULL,1,1,1538739415,NULL,NULL,NULL,NULL),(6,'传习录》129条：诚意是格物之主意，格物是诚意的工夫',NULL,1,1,1538739415,NULL,NULL,NULL,NULL),(7,'那天我只是出了趟门，却与爱情撞个满怀',NULL,1,1,1538739415,NULL,NULL,NULL,NULL),(8,'内容型产品运营有感——《运营攻略》第十章读后感',NULL,1,1,1538739415,NULL,NULL,NULL,NULL),(9,'思维导图阅读法——让你快速透视一本书',NULL,1,1,1538739415,NULL,NULL,NULL,NULL),(10,'刘老师趣读《红楼》11、探春与贾环',NULL,1,1,1538739415,NULL,NULL,NULL,NULL),(11,'what is less?','what is less?what is less?what is less?',4,1,1538739471,NULL,NULL,NULL,'20181005/detail_11.html'),(12,'what is php?','',1,1,1538740522,NULL,NULL,NULL,'20181005/detail_12.html'),(13,'what is anguler?','what is anguler?',3,1,1538744681,NULL,NULL,NULL,'20181005/detail_13.html'),(14,'thinkphp is good!','thinkphp is good!',2,1,1538744770,NULL,NULL,NULL,'20181005/detail_14.html'),(15,'what is node?','what is node?what is node?what is node?what is node?',3,1,1538759905,NULL,NULL,NULL,'20181006/detail_15.html');
/*!40000 ALTER TABLE `ask_question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ask_question_topic`
--

DROP TABLE IF EXISTS `ask_question_topic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ask_question_topic` (
  `qt_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) DEFAULT NULL,
  `topic_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`qt_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ask_question_topic`
--

LOCK TABLES `ask_question_topic` WRITE;
/*!40000 ALTER TABLE `ask_question_topic` DISABLE KEYS */;
INSERT INTO `ask_question_topic` VALUES (1,0,3),(2,1,3),(3,2,3),(4,1,3),(5,12,2),(6,13,3),(7,14,3),(8,15,3),(9,16,2),(10,17,2),(11,18,3),(12,19,3),(13,20,2),(14,21,3),(15,22,3),(16,23,3),(17,25,2),(18,25,3),(19,11,2),(20,12,3),(21,13,2),(22,14,3),(23,15,1);
/*!40000 ALTER TABLE `ask_question_topic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ask_reply`
--

DROP TABLE IF EXISTS `ask_reply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ask_reply` (
  `reply_id` int(11) NOT NULL AUTO_INCREMENT,
  `reply_content` text,
  `user_id` int(11) DEFAULT NULL,
  `reply_time` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `agree_nums` int(11) DEFAULT NULL,
  `disagree_nums` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`reply_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ask_reply`
--

LOCK TABLES `ask_reply` WRITE;
/*!40000 ALTER TABLE `ask_reply` DISABLE KEYS */;
INSERT INTO `ask_reply` VALUES (1,'\n      序言 本书中，作者将此神奇的速读法分为5个步骤：准备、预习、影响阅读、活化以及高速阅读，通过此5步的循序渐进式的学习及实践，让你的阅读能力得以几...\n    ',1,1538739415,1,NULL,NULL,NULL),(2,'\n      看完唐家三少《为了你，我愿意热爱整个世界》这部书，用他的话总结了他的创作，他与木子的爱情：动力源于生活，生活源于爱情。 长弓与木子的爱情，算不上...\n    ',1,1538739415,2,NULL,NULL,NULL),(3,'\n      总有那么一些伟大的人或作品，对于名字早就耳熟能详，细说生平或内容却一无所知。早知道《白鹿原》是茅盾文学奖作品，是发生在陕西平原的故事，却在最近才...\n    ',1,1538739415,3,NULL,NULL,NULL),(4,'\n      月黑风高夜，狐仙敲门来。我是匀木，欢迎来到“聊斋风月说”。 聊斋里有很多女鬼和书生相恋的故事，有的是“有情人终成眷属”，也有的“赔了夫人又折兵”...\n    ',1,1538739415,4,NULL,NULL,NULL),(5,'\n      在坡为它注入生命力之前，哪儿有真正的侦探小说呢？——柯南·道尔 爱伦·坡（Edgar Allan Poe，1809—1849），有很多华丽的头衔...\n    ',1,1538739415,5,NULL,NULL,NULL),(6,'\n      蔡希渊问：“文公《大学》新本先格致而后诚意工夫，似与首章次第相合。若如先生从旧本之说，即诚意反在格致之前，于此尚未释然。”先生曰：“《大学》工夫...\n    ',1,1538739415,6,NULL,NULL,NULL),(7,'\n      作者寄语：以我之笔，愈你之伤；风云江山，满庭月光。简小竹《古典诗词里的治愈良药》原创系列，不定期更新。尘世纷扰，愿你在此处觅得安宁。祝好^^ 曾...\n    ',1,1538739415,7,NULL,NULL,NULL),(8,'\n      一、概述 又来啃这本书啦，今天又啃了一章，专门讲解内容型产品运营的，读完之后对内容型产品也有了个大致的观念～ 二、概念 1.内容型产品定义 为用...\n    ',1,1538739415,8,NULL,NULL,NULL),(9,'\n        学习，学就是学习，习是练习，经常，习惯。那么学习最简单的方法就是阅读。   今天我们介绍的就是用思维导图阅读法，让你快速透视一本书。   相...\n    ',1,1538739415,9,NULL,NULL,NULL),(10,'\n      刘老师趣读《红楼》11、探春与贾环 1 这世间，有些东西是没得选的，比如说父母。 读红楼，有时候，我很纳闷:探春和贾环的父母都是贾政和赵姨娘，这...\n    ',1,1538739415,10,NULL,NULL,NULL),(11,'PHP（外文名:PHP: Hypertext Preprocessor，中文名：“超文本预处理器”）是一种通用开源脚本语言。语法吸收了C语言、Java和Perl的特点，利于学习，使用广泛，主要适用于Web开发领域。PHP 独特的语法混合了C、Java、Perl以及PHP自创的语法。它可以比CGI或者Perl更快速地执行动态网页。用PHP做出的动态...',1,1538744427,12,NULL,NULL,NULL),(12,'PHP is a popular general-purpose scripting language that is especially suited to web development. Fast, flexible and pragmatic, PHP powers everything from ...	',1,1538744451,12,NULL,NULL,NULL),(13,'PHP，一个嵌套的缩写名称，是英文超级文本预处理语言（PHP:Hypertext Preprocessor）的缩写。PHP 是一种 HTML 内嵌式的语言，PHP与微软的ASP颇有几分相似，都是一种在服务器端执行的嵌入HTML文档的脚本语言，语言的风格有类似于C语言，现在被很多的网站编程人员广泛的运用。\r\n\r\nPHP 独特的语法混合了C、Java、Perl 以及 PHP 自创新的语法。它可以比 CGI 或者 Perl 更快速的执行动态网页。\r\n\r\nPHP最初是由勒多夫在1995年开始开发的；现在PHP的标准由the PHP Group维护。PHP以PHP License作为许可协议，不过因为这个协议限制了PHP名称的使用，所以和开放源代码许可协议GPL不兼容。',1,1538744557,12,NULL,NULL,NULL),(14,'AngularJS [1]  诞生于2009年，由Misko Hevery 等人创建，后为Google所收购。是一款优秀的前端JS框架，已经被用于Google的多款产品当中。AngularJS有着诸多特性，最为核心的是：MVW（Model-View-Whatever）、模块化、自动化双向数据绑定、语义化标签、依赖注入等等。\r\nAngularJS 是一个 JavaScript框架。它是一个以 JavaScript 编写的库。它可通过 <script> 标签添加到HTML 页面。\r\nAngularJS 通过 指令 扩展了 HTML，且通过 表达式 绑定数据到 HTML。\r\nAngularJS 是以一个 JavaScript 文件形式发布的，可通过 script 标签添加到网页中。	',1,1538744729,13,NULL,NULL,NULL),(15,'ThinkPHP框架 - 是由上海顶想公司开发维护的MVC结构的开源PHP框架,遵循Apache2开源协议发布,是为了敏捷WEB应用开发和简化企业应用开发而诞生的。',1,1538744789,14,NULL,NULL,NULL);
/*!40000 ALTER TABLE `ask_reply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ask_topic`
--

DROP TABLE IF EXISTS `ask_topic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ask_topic` (
  `topic_id` int(5) NOT NULL AUTO_INCREMENT,
  `topic_title` varchar(128) DEFAULT NULL,
  `topic_desc` text,
  `topic_pic` varchar(128) DEFAULT NULL,
  `discus_nums` int(5) DEFAULT NULL,
  `focus_nums` int(5) DEFAULT NULL,
  `user_id` int(5) DEFAULT NULL,
  `pub_time` int(5) DEFAULT NULL,
  PRIMARY KEY (`topic_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ask_topic`
--

LOCK TABLES `ask_topic` WRITE;
/*!40000 ALTER TABLE `ask_topic` DISABLE KEYS */;
INSERT INTO `ask_topic` VALUES (1,'node','node is a javascript','topic/20181004/thumb_iou_5bb596f3780190.44418144.png',NULL,NULL,1,1538627315),(2,'html5','h5 is hot!','topic/20181004/thumb_iou_5bb5970d9121a1.35533999.png',NULL,NULL,1,1538627341),(3,'php','php ,my love!','topic/20181004/thumb_iou_5bb597280bc0d6.06001368.jpg',NULL,NULL,1,1538627368);
/*!40000 ALTER TABLE `ask_topic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ask_user`
--

DROP TABLE IF EXISTS `ask_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ask_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT NULL,
  `reg_time` int(11) DEFAULT NULL,
  `user_pic` varchar(128) DEFAULT NULL,
  `activate_code` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ask_user`
--

LOCK TABLES `ask_user` WRITE;
/*!40000 ALTER TABLE `ask_user` DISABLE KEYS */;
INSERT INTO `ask_user` VALUES (1,'song','64b796dd3eb175855960d13011f2f417',NULL,'18772930944',1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `ask_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ask_user_topic`
--

DROP TABLE IF EXISTS `ask_user_topic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ask_user_topic` (
  `ut_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `topic_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ut_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ask_user_topic`
--

LOCK TABLES `ask_user_topic` WRITE;
/*!40000 ALTER TABLE `ask_user_topic` DISABLE KEYS */;
INSERT INTO `ask_user_topic` VALUES (1,1,2),(2,1,1),(3,1,3),(4,2,2),(5,2,1);
/*!40000 ALTER TABLE `ask_user_topic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `ask_hot_topic`
--

/*!50001 DROP TABLE IF EXISTS `ask_hot_topic`*/;
/*!50001 DROP VIEW IF EXISTS `ask_hot_topic`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `ask_hot_topic` AS select `t`.`topic_id` AS `topic_id`,`t`.`topic_title` AS `topic_title`,`t`.`topic_pic` AS `topic_pic`,count(`qt`.`question_id`) AS `q_nums` from (`ask_topic` `t` left join `ask_question_topic` `qt` on((`t`.`topic_id` = `qt`.`topic_id`))) group by `qt`.`topic_id` */;
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

-- Dump completed on 2018-10-07 20:20:55
