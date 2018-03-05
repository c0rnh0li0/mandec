CREATE DATABASE  IF NOT EXISTS `mandec` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `mandec`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: mandec
-- ------------------------------------------------------
-- Server version	5.7.14

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
-- Table structure for table `article_tag`
--

DROP TABLE IF EXISTS `article_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_tag`
--

LOCK TABLES `article_tag` WRITE;
/*!40000 ALTER TABLE `article_tag` DISABLE KEYS */;
/*!40000 ALTER TABLE `article_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `title` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('PUBLISHED','DRAFT') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'PUBLISHED',
  `date` date NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (1,1,'About us','about-us','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur mattis ipsum eu risus laoreet, at feugiat nisi faucibus. Donec nec pretium ante. Maecenas tempor commodo nibh, eu tincidunt justo finibus tempus. Suspendisse potenti. Suspendisse in dui lacinia, vulputate erat et, hendrerit elit. Aliquam nec malesuada velit. Donec fermentum, neque eget tempor tincidunt, ante dui lobortis sapien, ac varius dolor metus nec augue.</p>\r\n\r\n<p>Praesent consequat rhoncus nisi nec vehicula. Nulla cursus tincidunt turpis, ac ornare diam pulvinar tincidunt. Ut at aliquet arcu. Vivamus pulvinar risus erat, vel pharetra nisl porttitor vel. Phasellus sit amet orci vel sapien condimentum finibus non sed massa. Nam a sapien ligula. Phasellus quis augue ullamcorper, condimentum nunc eget, posuere leo. Nunc ut nibh luctus, tristique elit nec, posuere augue. Aliquam mi lectus, sagittis at est at, suscipit iaculis eros. Vivamus lobortis eget orci ut consectetur. Nam pretium, nisl eget luctus bibendum, velit ipsum tincidunt quam, a bibendum odio lectus id nunc.</p>','uploads/about us banner.jpg','PUBLISHED','2017-11-15',0,'2017-11-15 17:18:24','2017-11-15 17:18:24',NULL),(2,1,'Location','location','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur mattis ipsum eu risus laoreet, at feugiat nisi faucibus. Donec nec pretium ante. Maecenas tempor commodo nibh, eu tincidunt justo finibus tempus. Suspendisse potenti. Suspendisse in dui lacinia, vulputate erat et, hendrerit elit. Aliquam nec malesuada velit. Donec fermentum, neque eget tempor tincidunt, ante dui lobortis sapien, ac varius dolor metus nec augue.</p>\r\n\r\n<p>Praesent consequat rhoncus nisi nec vehicula. Nulla cursus tincidunt turpis, ac ornare diam pulvinar tincidunt. Ut at aliquet arcu. Vivamus pulvinar risus erat, vel pharetra nisl porttitor vel. Phasellus sit amet orci vel sapien condimentum finibus non sed massa. Nam a sapien ligula. Phasellus quis augue ullamcorper, condimentum nunc eget, posuere leo. Nunc ut nibh luctus, tristique elit nec, posuere augue. Aliquam mi lectus, sagittis at est at, suscipit iaculis eros. Vivamus lobortis eget orci ut consectetur. Nam pretium, nisl eget luctus bibendum, velit ipsum tincidunt quam, a bibendum odio lectus id nunc.</p>',NULL,'PUBLISHED','2017-11-15',0,'2017-11-15 17:19:15','2017-11-15 17:19:15',NULL),(3,1,'Contact us','contact-us','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur mattis ipsum eu risus laoreet, at feugiat nisi faucibus. Donec nec pretium ante. Maecenas tempor commodo nibh, eu tincidunt justo finibus tempus. Suspendisse potenti. Suspendisse in dui lacinia, vulputate erat et, hendrerit elit. Aliquam nec malesuada velit. Donec fermentum, neque eget tempor tincidunt, ante dui lobortis sapien, ac varius dolor metus nec augue.</p>\r\n\r\n<p>Praesent consequat rhoncus nisi nec vehicula. Nulla cursus tincidunt turpis, ac ornare diam pulvinar tincidunt. Ut at aliquet arcu. Vivamus pulvinar risus erat, vel pharetra nisl porttitor vel. Phasellus sit amet orci vel sapien condimentum finibus non sed massa. Nam a sapien ligula. Phasellus quis augue ullamcorper, condimentum nunc eget, posuere leo. Nunc ut nibh luctus, tristique elit nec, posuere augue. Aliquam mi lectus, sagittis at est at, suscipit iaculis eros. Vivamus lobortis eget orci ut consectetur. Nam pretium, nisl eget luctus bibendum, velit ipsum tincidunt quam, a bibendum odio lectus id nunc.</p>',NULL,'PUBLISHED','2017-11-15',0,'2017-11-15 17:19:30','2017-11-15 17:19:30',NULL);
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT '0',
  `lft` int(10) unsigned DEFAULT NULL,
  `rgt` int(10) unsigned DEFAULT NULL,
  `depth` int(10) unsigned DEFAULT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,NULL,NULL,NULL,NULL,'Contact','contact','2017-11-15 17:15:40','2017-11-15 17:15:40',NULL,'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur mattis ipsum eu risus laoreet, at feugiat nisi faucibus. Donec nec pretium ante. Maecenas tempor commodo nibh, eu tincidunt justo finibus tempus. Suspendisse potenti. Suspendisse in dui lacinia, vulputate erat et, hendrerit elit. Aliquam nec malesuada velit. Donec fermentum, neque eget tempor tincidunt, ante dui lobortis sapien, ac varius dolor metus nec augue.</p>\r\n\r\n<p>Praesent consequat rhoncus nisi nec vehicula. Nulla cursus tincidunt turpis, ac ornare diam pulvinar tincidunt. Ut at aliquet arcu. Vivamus pulvinar risus erat, vel pharetra nisl porttitor vel. Phasellus sit amet orci vel sapien condimentum finibus non sed massa. Nam a sapien ligula. Phasellus quis augue ullamcorper, condimentum nunc eget, posuere leo. Nunc ut nibh luctus, tristique elit nec, posuere augue. Aliquam mi lectus, sagittis at est at, suscipit iaculis eros. Vivamus lobortis eget orci ut consectetur. Nam pretium, nisl eget luctus bibendum, velit ipsum tincidunt quam, a bibendum odio lectus id nunc.</p>'),(2,NULL,NULL,NULL,NULL,'Architecture','architecture','2017-11-15 17:15:53','2017-11-15 17:15:53',NULL,'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur mattis ipsum eu risus laoreet, at feugiat nisi faucibus. Donec nec pretium ante. Maecenas tempor commodo nibh, eu tincidunt justo finibus tempus. Suspendisse potenti. Suspendisse in dui lacinia, vulputate erat et, hendrerit elit. Aliquam nec malesuada velit. Donec fermentum, neque eget tempor tincidunt, ante dui lobortis sapien, ac varius dolor metus nec augue.</p>\r\n\r\n<p>Praesent consequat rhoncus nisi nec vehicula. Nulla cursus tincidunt turpis, ac ornare diam pulvinar tincidunt. Ut at aliquet arcu. Vivamus pulvinar risus erat, vel pharetra nisl porttitor vel. Phasellus sit amet orci vel sapien condimentum finibus non sed massa. Nam a sapien ligula. Phasellus quis augue ullamcorper, condimentum nunc eget, posuere leo. Nunc ut nibh luctus, tristique elit nec, posuere augue. Aliquam mi lectus, sagittis at est at, suscipit iaculis eros. Vivamus lobortis eget orci ut consectetur. Nam pretium, nisl eget luctus bibendum, velit ipsum tincidunt quam, a bibendum odio lectus id nunc.</p>'),(3,NULL,NULL,NULL,NULL,'Software development','software-development','2017-11-15 17:16:12','2017-11-15 17:16:12',NULL,'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur mattis ipsum eu risus laoreet, at feugiat nisi faucibus. Donec nec pretium ante. Maecenas tempor commodo nibh, eu tincidunt justo finibus tempus. Suspendisse potenti. Suspendisse in dui lacinia, vulputate erat et, hendrerit elit. Aliquam nec malesuada velit. Donec fermentum, neque eget tempor tincidunt, ante dui lobortis sapien, ac varius dolor metus nec augue.</p>\r\n\r\n<p>Praesent consequat rhoncus nisi nec vehicula. Nulla cursus tincidunt turpis, ac ornare diam pulvinar tincidunt. Ut at aliquet arcu. Vivamus pulvinar risus erat, vel pharetra nisl porttitor vel. Phasellus sit amet orci vel sapien condimentum finibus non sed massa. Nam a sapien ligula. Phasellus quis augue ullamcorper, condimentum nunc eget, posuere leo. Nunc ut nibh luctus, tristique elit nec, posuere augue. Aliquam mi lectus, sagittis at est at, suscipit iaculis eros. Vivamus lobortis eget orci ut consectetur. Nam pretium, nisl eget luctus bibendum, velit ipsum tincidunt quam, a bibendum odio lectus id nunc.</p>'),(4,NULL,NULL,NULL,NULL,'Graphic design','graphic-design','2017-11-15 17:16:25','2017-11-15 17:16:25',NULL,'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur mattis ipsum eu risus laoreet, at feugiat nisi faucibus. Donec nec pretium ante. Maecenas tempor commodo nibh, eu tincidunt justo finibus tempus. Suspendisse potenti. Suspendisse in dui lacinia, vulputate erat et, hendrerit elit. Aliquam nec malesuada velit. Donec fermentum, neque eget tempor tincidunt, ante dui lobortis sapien, ac varius dolor metus nec augue.</p>\r\n\r\n<p>Praesent consequat rhoncus nisi nec vehicula. Nulla cursus tincidunt turpis, ac ornare diam pulvinar tincidunt. Ut at aliquet arcu. Vivamus pulvinar risus erat, vel pharetra nisl porttitor vel. Phasellus sit amet orci vel sapien condimentum finibus non sed massa. Nam a sapien ligula. Phasellus quis augue ullamcorper, condimentum nunc eget, posuere leo. Nunc ut nibh luctus, tristique elit nec, posuere augue. Aliquam mi lectus, sagittis at est at, suscipit iaculis eros. Vivamus lobortis eget orci ut consectetur. Nam pretium, nisl eget luctus bibendum, velit ipsum tincidunt quam, a bibendum odio lectus id nunc.</p>');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_items`
--

DROP TABLE IF EXISTS `menu_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `page_id` int(10) unsigned DEFAULT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `lft` int(10) unsigned DEFAULT NULL,
  `rgt` int(10) unsigned DEFAULT NULL,
  `depth` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_items`
--

LOCK TABLES `menu_items` WRITE;
/*!40000 ALTER TABLE `menu_items` DISABLE KEYS */;
INSERT INTO `menu_items` VALUES (1,'Contact','page_link',NULL,1,NULL,2,9,1,'2017-11-15 17:23:08','2017-11-15 17:24:07',NULL),(2,'About us','page_link',NULL,4,1,3,4,2,'2017-11-15 17:23:27','2017-11-15 17:24:07',NULL),(3,'Location','page_link',NULL,3,1,5,6,2,'2017-11-15 17:23:46','2017-11-15 17:24:07',NULL),(4,'Contact us','page_link',NULL,4,1,7,8,2,'2017-11-15 17:24:01','2017-11-15 17:24:07',NULL);
/*!40000 ALTER TABLE `menu_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2015_08_04_130507_create_article_tag_table',1),(4,'2015_08_04_130520_create_articles_table',1),(5,'2015_08_04_130551_create_categories_table',1),(6,'2015_08_04_131614_create_settings_table',1),(7,'2015_08_04_131626_create_tags_table',1),(8,'2016_05_05_115641_create_menu_items_table',1),(9,'2016_05_10_130540_create_permission_tables',1),(10,'2016_05_25_121918_create_pages_table',1),(11,'2016_07_24_060017_add_slug_to_categories_table',1),(12,'2016_07_24_060101_add_slug_to_tags_table',1),(13,'2017_04_10_195926_change_extras_to_longtext',1),(14,'2017_10_29_152745_create_widgets_table',1),(15,'2017_10_29_152858_create_templates_table',1),(16,'2017_10_29_152915_create_template_sections_table',1),(17,'2017_10_29_152951_create_page_template_section_pivot_table',1),(18,'2017_10_29_153012_create_page_section_widget_pivot_table',1),(19,'2017_11_01_180409_create_page_categories_table',1),(20,'2017_11_01_181017_add_categories_to_pages',1),(21,'2017_11_01_200313_add_audit_to_pages',1),(22,'2017_11_04_112343_add_file_to_templates',1),(23,'2017_11_04_123550_add_templates_to_pages',1),(24,'2017_11_11_180452_add_html_name_to_template_sections',1),(25,'2017_11_12_095739_add_description_to_categories',1),(26,'2017_11_15_164605_create_widget_types_table',1),(27,'2017_11_15_174036_add_widget_type_to_widgets_table',1),(28,'2017_12_02_223437_remove_foreign_primary_keys_from_page_section_widgets',2),(29,'2017_12_02_223755_add_id_foreign_keys_and_settings_to_pagesectionwidget_table',2),(30,'2018_03_05_193711_add_order_to_pagesectionwidget',3),(31,'2018_03_05_203801_add_css_classes_to_template_sections',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page_categories`
--

DROP TABLE IF EXISTS `page_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT '0',
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `updated_by` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `page_categories_slug_unique` (`slug`),
  KEY `page_categories_created_by_foreign` (`created_by`),
  KEY `page_categories_updated_by_foreign` (`updated_by`),
  CONSTRAINT `page_categories_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `page_categories_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_categories`
--

LOCK TABLES `page_categories` WRITE;
/*!40000 ALTER TABLE `page_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `page_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page_section_widgets`
--

DROP TABLE IF EXISTS `page_section_widgets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page_section_widgets` (
  `page_id` int(10) unsigned NOT NULL,
  `template_section_id` int(10) unsigned NOT NULL,
  `widget_id` int(10) unsigned NOT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `settings` text COLLATE utf8_unicode_ci NOT NULL,
  `order` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `page_section_widgets_page_id_index` (`page_id`),
  KEY `page_section_widgets_template_section_id_index` (`template_section_id`),
  KEY `page_section_widgets_widget_id_index` (`widget_id`),
  CONSTRAINT `page_section_widgets_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE,
  CONSTRAINT `page_section_widgets_template_section_id_foreign` FOREIGN KEY (`template_section_id`) REFERENCES `template_sections` (`id`) ON DELETE CASCADE,
  CONSTRAINT `page_section_widgets_widget_id_foreign` FOREIGN KEY (`widget_id`) REFERENCES `widgets` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_section_widgets`
--

LOCK TABLES `page_section_widgets` WRITE;
/*!40000 ALTER TABLE `page_section_widgets` DISABLE KEYS */;
INSERT INTO `page_section_widgets` VALUES (1,1,1,34,'{\"title\":\"jhgjfgj\",\"subtitle\":\"ghjf\",\"image\":\"uploads\\/about us banner.jpg\"}',1),(1,1,1,37,'{\"title\":\"52345234\",\"subtitle\":\"2354235423\",\"image\":\"uploads\\/IMG_0007.JPG\"}',2),(2,2,1,38,'{\"title\":\"3241234\",\"subtitle\":\"123412341\",\"image\":\"uploads\\/IMG_0007.JPG\"}',0),(2,3,1,40,'{\"title\":\"Deno\",\"subtitle\":\"Krstev\",\"image\":\"uploads\\/tv-stand-1.jpg\"}',0),(2,2,3,41,'{\"title\":null,\"subtitle\":null,\"image\":\"\"}',0),(2,3,4,42,'{\"title\":null,\"subtitle\":null,\"image\":\"\"}',0),(2,3,4,43,'{\"title\":null,\"subtitle\":null,\"image\":\"\"}',0);
/*!40000 ALTER TABLE `page_section_widgets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page_template_sections`
--

DROP TABLE IF EXISTS `page_template_sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page_template_sections` (
  `page_id` int(10) unsigned NOT NULL,
  `template_section_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`page_id`,`template_section_id`),
  KEY `page_template_sections_page_id_index` (`page_id`),
  KEY `page_template_sections_template_section_id_index` (`template_section_id`),
  CONSTRAINT `page_template_sections_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE,
  CONSTRAINT `page_template_sections_template_section_id_foreign` FOREIGN KEY (`template_section_id`) REFERENCES `template_sections` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_template_sections`
--

LOCK TABLES `page_template_sections` WRITE;
/*!40000 ALTER TABLE `page_template_sections` DISABLE KEYS */;
INSERT INTO `page_template_sections` VALUES (1,1),(2,2),(2,3),(3,1),(4,1);
/*!40000 ALTER TABLE `page_template_sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `template_id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `extras` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `updated_by` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pages_created_by_foreign` (`created_by`),
  KEY `pages_updated_by_foreign` (`updated_by`),
  KEY `pages_template_id_foreign` (`template_id`),
  CONSTRAINT `pages_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `pages_template_id_foreign` FOREIGN KEY (`template_id`) REFERENCES `templates` (`id`),
  CONSTRAINT `pages_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,1,'Contact page','Contact','contact','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur mattis ipsum eu risus laoreet, at feugiat nisi faucibus. Donec nec pretium ante. Maecenas tempor commodo nibh, eu tincidunt justo finibus tempus. Suspendisse potenti. Suspendisse in dui lacinia, vulputate erat et, hendrerit elit. Aliquam nec malesuada velit. Donec fermentum, neque eget tempor tincidunt, ante dui lobortis sapien, ac varius dolor metus nec augue.</p>\r\n\r\n<p>Praesent consequat rhoncus nisi nec vehicula. Nulla cursus tincidunt turpis, ac ornare diam pulvinar tincidunt. Ut at aliquet arcu. Vivamus pulvinar risus erat, vel pharetra nisl porttitor vel. Phasellus sit amet orci vel sapien condimentum finibus non sed massa. Nam a sapien ligula. Phasellus quis augue ullamcorper, condimentum nunc eget, posuere leo. Nunc ut nibh luctus, tristique elit nec, posuere augue. Aliquam mi lectus, sagittis at est at, suscipit iaculis eros. Vivamus lobortis eget orci ut consectetur. Nam pretium, nisl eget luctus bibendum, velit ipsum tincidunt quam, a bibendum odio lectus id nunc.</p>','{\"meta_title\":null,\"meta_description\":null,\"meta_keywords\":null}','2017-11-15 17:20:52','2017-11-15 17:20:52',NULL,NULL,1,1),(2,2,'About us page','About us','about-us','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur mattis ipsum eu risus laoreet, at feugiat nisi faucibus. Donec nec pretium ante. Maecenas tempor commodo nibh, eu tincidunt justo finibus tempus. Suspendisse potenti. Suspendisse in dui lacinia, vulputate erat et, hendrerit elit. Aliquam nec malesuada velit. Donec fermentum, neque eget tempor tincidunt, ante dui lobortis sapien, ac varius dolor metus nec augue.</p>\r\n\r\n<p>Praesent consequat rhoncus nisi nec vehicula. Nulla cursus tincidunt turpis, ac ornare diam pulvinar tincidunt. Ut at aliquet arcu. Vivamus pulvinar risus erat, vel pharetra nisl porttitor vel. Phasellus sit amet orci vel sapien condimentum finibus non sed massa. Nam a sapien ligula. Phasellus quis augue ullamcorper, condimentum nunc eget, posuere leo. Nunc ut nibh luctus, tristique elit nec, posuere augue. Aliquam mi lectus, sagittis at est at, suscipit iaculis eros. Vivamus lobortis eget orci ut consectetur. Nam pretium, nisl eget luctus bibendum, velit ipsum tincidunt quam, a bibendum odio lectus id nunc.</p>','{\"meta_title\":null,\"meta_description\":null,\"meta_keywords\":null}','2017-11-15 17:21:29','2017-11-15 17:21:29',NULL,NULL,1,1),(3,1,'Location page','Location','location','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur mattis ipsum eu risus laoreet, at feugiat nisi faucibus. Donec nec pretium ante. Maecenas tempor commodo nibh, eu tincidunt justo finibus tempus. Suspendisse potenti. Suspendisse in dui lacinia, vulputate erat et, hendrerit elit. Aliquam nec malesuada velit. Donec fermentum, neque eget tempor tincidunt, ante dui lobortis sapien, ac varius dolor metus nec augue.</p>\r\n\r\n<p>Praesent consequat rhoncus nisi nec vehicula. Nulla cursus tincidunt turpis, ac ornare diam pulvinar tincidunt. Ut at aliquet arcu. Vivamus pulvinar risus erat, vel pharetra nisl porttitor vel. Phasellus sit amet orci vel sapien condimentum finibus non sed massa. Nam a sapien ligula. Phasellus quis augue ullamcorper, condimentum nunc eget, posuere leo. Nunc ut nibh luctus, tristique elit nec, posuere augue. Aliquam mi lectus, sagittis at est at, suscipit iaculis eros. Vivamus lobortis eget orci ut consectetur. Nam pretium, nisl eget luctus bibendum, velit ipsum tincidunt quam, a bibendum odio lectus id nunc.</p>','{\"meta_title\":null,\"meta_description\":null,\"meta_keywords\":null}','2017-11-15 17:21:57','2017-11-15 17:21:57',NULL,NULL,1,1),(4,1,'Contact us page','Contact us','contact-us','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur mattis ipsum eu risus laoreet, at feugiat nisi faucibus. Donec nec pretium ante. Maecenas tempor commodo nibh, eu tincidunt justo finibus tempus. Suspendisse potenti. Suspendisse in dui lacinia, vulputate erat et, hendrerit elit. Aliquam nec malesuada velit. Donec fermentum, neque eget tempor tincidunt, ante dui lobortis sapien, ac varius dolor metus nec augue.</p>\r\n\r\n<p>Praesent consequat rhoncus nisi nec vehicula. Nulla cursus tincidunt turpis, ac ornare diam pulvinar tincidunt. Ut at aliquet arcu. Vivamus pulvinar risus erat, vel pharetra nisl porttitor vel. Phasellus sit amet orci vel sapien condimentum finibus non sed massa. Nam a sapien ligula. Phasellus quis augue ullamcorper, condimentum nunc eget, posuere leo. Nunc ut nibh luctus, tristique elit nec, posuere augue. Aliquam mi lectus, sagittis at est at, suscipit iaculis eros. Vivamus lobortis eget orci ut consectetur. Nam pretium, nisl eget luctus bibendum, velit ipsum tincidunt quam, a bibendum odio lectus id nunc.</p>','{\"meta_title\":null,\"meta_description\":null,\"meta_keywords\":null}','2017-11-15 17:22:28','2017-11-15 17:22:28',NULL,NULL,1,1);
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_roles`
--

DROP TABLE IF EXISTS `permission_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_roles` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_roles_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_roles_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_roles`
--

LOCK TABLES `permission_roles` WRITE;
/*!40000 ALTER TABLE `permission_roles` DISABLE KEYS */;
INSERT INTO `permission_roles` VALUES (1,1);
/*!40000 ALTER TABLE `permission_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_users`
--

DROP TABLE IF EXISTS `permission_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_users` (
  `user_id` int(10) unsigned NOT NULL,
  `permission_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`),
  KEY `permission_users_permission_id_foreign` (`permission_id`),
  CONSTRAINT `permission_users_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_users`
--

LOCK TABLES `permission_users` WRITE;
/*!40000 ALTER TABLE `permission_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'ExtendedPageCrudController@create','2017-11-15 18:12:22','2017-11-15 18:12:22'),(2,'ExtendedPageCrudController@edit','2017-11-15 18:12:22','2017-11-15 18:12:22'),(3,'ExtendedPageCrudController@reorder','2017-11-15 18:12:22','2017-11-15 18:12:22'),(4,'ExtendedPageCrudController@saveReorder','2017-11-15 18:12:22','2017-11-15 18:12:22'),(5,'ExtendedPageCrudController@showDetailsRow','2017-11-15 18:12:22','2017-11-15 18:12:22'),(6,'ExtendedPageCrudController@translateItem','2017-11-15 18:12:22','2017-11-15 18:12:22'),(7,'ExtendedPageCrudController@search','2017-11-15 18:12:22','2017-11-15 18:12:22'),(8,'ExtendedPageCrudController@index','2017-11-15 18:12:22','2017-11-15 18:12:22'),(9,'ExtendedPageCrudController@store','2017-11-15 18:12:22','2017-11-15 18:12:22'),(10,'ExtendedPageCrudController@show','2017-11-15 18:12:22','2017-11-15 18:12:22'),(11,'ExtendedPageCrudController@update','2017-11-15 18:12:22','2017-11-15 18:12:22'),(12,'ExtendedPageCrudController@destroy','2017-11-15 18:12:22','2017-11-15 18:12:22'),(13,'ExtendedPageCrudController@listRevisions','2017-11-15 18:12:22','2017-11-15 18:12:22'),(14,'ExtendedPageCrudController@restoreRevision','2017-11-15 18:12:22','2017-11-15 18:12:22'),(15,'ArticleCrudController@search','2017-11-15 18:12:22','2017-11-15 18:12:22'),(16,'ArticleCrudController@reorder','2017-11-15 18:12:23','2017-11-15 18:12:23'),(17,'ArticleCrudController@saveReorder','2017-11-15 18:12:23','2017-11-15 18:12:23'),(18,'ArticleCrudController@showDetailsRow','2017-11-15 18:12:23','2017-11-15 18:12:23'),(19,'ArticleCrudController@translateItem','2017-11-15 18:12:23','2017-11-15 18:12:23'),(20,'ArticleCrudController@listRevisions','2017-11-15 18:12:23','2017-11-15 18:12:23'),(21,'ArticleCrudController@restoreRevision','2017-11-15 18:12:23','2017-11-15 18:12:23'),(22,'ArticleCrudController@index','2017-11-15 18:12:23','2017-11-15 18:12:23'),(23,'ArticleCrudController@create','2017-11-15 18:12:23','2017-11-15 18:12:23'),(24,'ArticleCrudController@store','2017-11-15 18:12:23','2017-11-15 18:12:23'),(25,'ArticleCrudController@show','2017-11-15 18:12:23','2017-11-15 18:12:23'),(26,'ArticleCrudController@edit','2017-11-15 18:12:23','2017-11-15 18:12:23'),(27,'ArticleCrudController@update','2017-11-15 18:12:23','2017-11-15 18:12:23'),(28,'ArticleCrudController@destroy','2017-11-15 18:12:23','2017-11-15 18:12:23'),(29,'CategoryCrudController@search','2017-11-15 18:12:23','2017-11-15 18:12:23'),(30,'CategoryCrudController@reorder','2017-11-15 18:12:23','2017-11-15 18:12:23'),(31,'CategoryCrudController@saveReorder','2017-11-15 18:12:23','2017-11-15 18:12:23'),(32,'CategoryCrudController@showDetailsRow','2017-11-15 18:12:23','2017-11-15 18:12:23'),(33,'CategoryCrudController@translateItem','2017-11-15 18:12:23','2017-11-15 18:12:23'),(34,'CategoryCrudController@listRevisions','2017-11-15 18:12:23','2017-11-15 18:12:23'),(35,'CategoryCrudController@restoreRevision','2017-11-15 18:12:23','2017-11-15 18:12:23'),(36,'CategoryCrudController@index','2017-11-15 18:12:23','2017-11-15 18:12:23'),(37,'CategoryCrudController@create','2017-11-15 18:12:23','2017-11-15 18:12:23'),(38,'CategoryCrudController@store','2017-11-15 18:12:23','2017-11-15 18:12:23'),(39,'CategoryCrudController@show','2017-11-15 18:12:23','2017-11-15 18:12:23'),(40,'CategoryCrudController@edit','2017-11-15 18:12:23','2017-11-15 18:12:23'),(41,'CategoryCrudController@update','2017-11-15 18:12:23','2017-11-15 18:12:23'),(42,'CategoryCrudController@destroy','2017-11-15 18:12:23','2017-11-15 18:12:23'),(43,'TagCrudController@search','2017-11-15 18:12:23','2017-11-15 18:12:23'),(44,'TagCrudController@reorder','2017-11-15 18:12:23','2017-11-15 18:12:23'),(45,'TagCrudController@saveReorder','2017-11-15 18:12:23','2017-11-15 18:12:23'),(46,'TagCrudController@showDetailsRow','2017-11-15 18:12:23','2017-11-15 18:12:23'),(47,'TagCrudController@translateItem','2017-11-15 18:12:23','2017-11-15 18:12:23'),(48,'TagCrudController@listRevisions','2017-11-15 18:12:23','2017-11-15 18:12:23'),(49,'TagCrudController@restoreRevision','2017-11-15 18:12:23','2017-11-15 18:12:23'),(50,'TagCrudController@index','2017-11-15 18:12:23','2017-11-15 18:12:23'),(51,'TagCrudController@create','2017-11-15 18:12:23','2017-11-15 18:12:23'),(52,'TagCrudController@store','2017-11-15 18:12:23','2017-11-15 18:12:23'),(53,'TagCrudController@show','2017-11-15 18:12:23','2017-11-15 18:12:23'),(54,'TagCrudController@edit','2017-11-15 18:12:23','2017-11-15 18:12:23'),(55,'TagCrudController@update','2017-11-15 18:12:23','2017-11-15 18:12:23'),(56,'TagCrudController@destroy','2017-11-15 18:12:23','2017-11-15 18:12:23'),(57,'WidgetCrudController@search','2017-11-15 18:12:23','2017-11-15 18:12:23'),(58,'WidgetCrudController@reorder','2017-11-15 18:12:24','2017-11-15 18:12:24'),(59,'WidgetCrudController@saveReorder','2017-11-15 18:12:24','2017-11-15 18:12:24'),(60,'WidgetCrudController@showDetailsRow','2017-11-15 18:12:24','2017-11-15 18:12:24'),(61,'WidgetCrudController@translateItem','2017-11-15 18:12:24','2017-11-15 18:12:24'),(62,'WidgetCrudController@listRevisions','2017-11-15 18:12:24','2017-11-15 18:12:24'),(63,'WidgetCrudController@restoreRevision','2017-11-15 18:12:24','2017-11-15 18:12:24'),(64,'WidgetCrudController@index','2017-11-15 18:12:24','2017-11-15 18:12:24'),(65,'WidgetCrudController@create','2017-11-15 18:12:24','2017-11-15 18:12:24'),(66,'WidgetCrudController@store','2017-11-15 18:12:24','2017-11-15 18:12:24'),(67,'WidgetCrudController@show','2017-11-15 18:12:24','2017-11-15 18:12:24'),(68,'WidgetCrudController@edit','2017-11-15 18:12:24','2017-11-15 18:12:24'),(69,'WidgetCrudController@update','2017-11-15 18:12:24','2017-11-15 18:12:24'),(70,'WidgetCrudController@destroy','2017-11-15 18:12:24','2017-11-15 18:12:24'),(71,'WidgetTypeCrudController@search','2017-11-15 18:12:24','2017-11-15 18:12:24'),(72,'WidgetTypeCrudController@reorder','2017-11-15 18:12:24','2017-11-15 18:12:24'),(73,'WidgetTypeCrudController@saveReorder','2017-11-15 18:12:24','2017-11-15 18:12:24'),(74,'WidgetTypeCrudController@showDetailsRow','2017-11-15 18:12:24','2017-11-15 18:12:24'),(75,'WidgetTypeCrudController@translateItem','2017-11-15 18:12:24','2017-11-15 18:12:24'),(76,'WidgetTypeCrudController@listRevisions','2017-11-15 18:12:24','2017-11-15 18:12:24'),(77,'WidgetTypeCrudController@restoreRevision','2017-11-15 18:12:24','2017-11-15 18:12:24'),(78,'WidgetTypeCrudController@index','2017-11-15 18:12:24','2017-11-15 18:12:24'),(79,'WidgetTypeCrudController@create','2017-11-15 18:12:24','2017-11-15 18:12:24'),(80,'WidgetTypeCrudController@store','2017-11-15 18:12:24','2017-11-15 18:12:24'),(81,'WidgetTypeCrudController@show','2017-11-15 18:12:24','2017-11-15 18:12:24'),(82,'WidgetTypeCrudController@edit','2017-11-15 18:12:24','2017-11-15 18:12:24'),(83,'WidgetTypeCrudController@update','2017-11-15 18:12:24','2017-11-15 18:12:24'),(84,'WidgetTypeCrudController@destroy','2017-11-15 18:12:24','2017-11-15 18:12:24'),(85,'TemplateSectionCrudController@search','2017-11-15 18:12:24','2017-11-15 18:12:24'),(86,'TemplateSectionCrudController@reorder','2017-11-15 18:12:24','2017-11-15 18:12:24'),(87,'TemplateSectionCrudController@saveReorder','2017-11-15 18:12:24','2017-11-15 18:12:24'),(88,'TemplateSectionCrudController@showDetailsRow','2017-11-15 18:12:24','2017-11-15 18:12:24'),(89,'TemplateSectionCrudController@translateItem','2017-11-15 18:12:24','2017-11-15 18:12:24'),(90,'TemplateSectionCrudController@listRevisions','2017-11-15 18:12:24','2017-11-15 18:12:24'),(91,'TemplateSectionCrudController@restoreRevision','2017-11-15 18:12:24','2017-11-15 18:12:24'),(92,'TemplateSectionCrudController@index','2017-11-15 18:12:24','2017-11-15 18:12:24'),(93,'TemplateSectionCrudController@create','2017-11-15 18:12:24','2017-11-15 18:12:24'),(94,'TemplateSectionCrudController@store','2017-11-15 18:12:24','2017-11-15 18:12:24'),(95,'TemplateSectionCrudController@show','2017-11-15 18:12:24','2017-11-15 18:12:24'),(96,'TemplateSectionCrudController@edit','2017-11-15 18:12:24','2017-11-15 18:12:24'),(97,'TemplateSectionCrudController@update','2017-11-15 18:12:24','2017-11-15 18:12:24'),(98,'TemplateSectionCrudController@destroy','2017-11-15 18:12:24','2017-11-15 18:12:24'),(99,'TemplateCrudController@search','2017-11-15 18:12:25','2017-11-15 18:12:25'),(100,'TemplateCrudController@reorder','2017-11-15 18:12:25','2017-11-15 18:12:25'),(101,'TemplateCrudController@saveReorder','2017-11-15 18:12:25','2017-11-15 18:12:25'),(102,'TemplateCrudController@showDetailsRow','2017-11-15 18:12:25','2017-11-15 18:12:25'),(103,'TemplateCrudController@translateItem','2017-11-15 18:12:25','2017-11-15 18:12:25'),(104,'TemplateCrudController@listRevisions','2017-11-15 18:12:25','2017-11-15 18:12:25'),(105,'TemplateCrudController@restoreRevision','2017-11-15 18:12:25','2017-11-15 18:12:25'),(106,'TemplateCrudController@index','2017-11-15 18:12:25','2017-11-15 18:12:25'),(107,'TemplateCrudController@create','2017-11-15 18:12:25','2017-11-15 18:12:25'),(108,'TemplateCrudController@store','2017-11-15 18:12:25','2017-11-15 18:12:25'),(109,'TemplateCrudController@show','2017-11-15 18:12:25','2017-11-15 18:12:25'),(110,'TemplateCrudController@edit','2017-11-15 18:12:25','2017-11-15 18:12:25'),(111,'TemplateCrudController@update','2017-11-15 18:12:25','2017-11-15 18:12:25'),(112,'TemplateCrudController@destroy','2017-11-15 18:12:25','2017-11-15 18:12:25'),(113,'PageCategoryCrudController@search','2017-11-15 18:12:25','2017-11-15 18:12:25'),(114,'PageCategoryCrudController@reorder','2017-11-15 18:12:25','2017-11-15 18:12:25'),(115,'PageCategoryCrudController@saveReorder','2017-11-15 18:12:25','2017-11-15 18:12:25'),(116,'PageCategoryCrudController@showDetailsRow','2017-11-15 18:12:25','2017-11-15 18:12:25'),(117,'PageCategoryCrudController@translateItem','2017-11-15 18:12:25','2017-11-15 18:12:25'),(118,'PageCategoryCrudController@listRevisions','2017-11-15 18:12:25','2017-11-15 18:12:25'),(119,'PageCategoryCrudController@restoreRevision','2017-11-15 18:12:25','2017-11-15 18:12:25'),(120,'PageCategoryCrudController@index','2017-11-15 18:12:25','2017-11-15 18:12:25'),(121,'PageCategoryCrudController@create','2017-11-15 18:12:25','2017-11-15 18:12:25'),(122,'PageCategoryCrudController@store','2017-11-15 18:12:25','2017-11-15 18:12:25'),(123,'PageCategoryCrudController@show','2017-11-15 18:12:25','2017-11-15 18:12:25'),(124,'PageCategoryCrudController@edit','2017-11-15 18:12:25','2017-11-15 18:12:25'),(125,'PageCategoryCrudController@update','2017-11-15 18:12:25','2017-11-15 18:12:25'),(126,'PageCategoryCrudController@destroy','2017-11-15 18:12:25','2017-11-15 18:12:25'),(127,'ControllerPermissionCrudController@search','2017-11-15 18:12:25','2017-11-15 18:12:25'),(128,'ControllerPermissionCrudController@reorder','2017-11-15 18:12:25','2017-11-15 18:12:25'),(129,'ControllerPermissionCrudController@saveReorder','2017-11-15 18:12:25','2017-11-15 18:12:25'),(130,'ControllerPermissionCrudController@showDetailsRow','2017-11-15 18:12:25','2017-11-15 18:12:25'),(131,'ControllerPermissionCrudController@translateItem','2017-11-15 18:12:25','2017-11-15 18:12:25'),(132,'ControllerPermissionCrudController@listRevisions','2017-11-15 18:12:25','2017-11-15 18:12:25'),(133,'ControllerPermissionCrudController@restoreRevision','2017-11-15 18:12:25','2017-11-15 18:12:25'),(134,'ControllerPermissionCrudController@index','2017-11-15 18:12:25','2017-11-15 18:12:25'),(135,'ControllerPermissionCrudController@create','2017-11-15 18:12:25','2017-11-15 18:12:25'),(136,'ControllerPermissionCrudController@store','2017-11-15 18:12:25','2017-11-15 18:12:25'),(137,'ControllerPermissionCrudController@show','2017-11-15 18:12:25','2017-11-15 18:12:25'),(138,'ControllerPermissionCrudController@edit','2017-11-15 18:12:25','2017-11-15 18:12:25'),(139,'ControllerPermissionCrudController@update','2017-11-15 18:12:25','2017-11-15 18:12:25'),(140,'ControllerPermissionCrudController@destroy','2017-11-15 18:12:26','2017-11-15 18:12:26');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_users`
--

DROP TABLE IF EXISTS `role_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_users` (
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`user_id`),
  KEY `role_users_user_id_foreign` (`user_id`),
  CONSTRAINT `role_users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_users`
--

LOCK TABLES `role_users` WRITE;
/*!40000 ALTER TABLE `role_users` DISABLE KEYS */;
INSERT INTO `role_users` VALUES (1,1);
/*!40000 ALTER TABLE `role_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin','2017-11-15 17:59:15','2017-11-15 17:59:22'),(2,'Contributor','2017-11-15 17:59:58','2017-11-15 17:59:58');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8_unicode_ci,
  `field` text COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tags_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `template_sections`
--

DROP TABLE IF EXISTS `template_sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `template_sections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `template_id` int(10) unsigned NOT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `updated_by` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `html_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `css_classes` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `template_sections_template_id_foreign` (`template_id`),
  KEY `template_sections_created_by_foreign` (`created_by`),
  KEY `template_sections_updated_by_foreign` (`updated_by`),
  CONSTRAINT `template_sections_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `template_sections_template_id_foreign` FOREIGN KEY (`template_id`) REFERENCES `templates` (`id`),
  CONSTRAINT `template_sections_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `template_sections`
--

LOCK TABLES `template_sections` WRITE;
/*!40000 ALTER TABLE `template_sections` DISABLE KEYS */;
INSERT INTO `template_sections` VALUES (1,'Middle column',1,1,1,'2017-11-15 16:45:50','2017-11-15 16:45:50','middle-column',''),(2,'Left column',2,1,1,'2017-11-15 16:46:33','2018-03-05 19:43:49','left-column','col-md-8 col-md-offset-0 col-sm-10 col-sm-offset-1'),(3,'Right column',2,1,1,'2017-11-15 16:46:33','2018-03-05 19:43:49','right-column','col-md-3 col-md-offset-1 col-sm-4');
/*!40000 ALTER TABLE `template_sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `templates`
--

DROP TABLE IF EXISTS `templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `templates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `updated_by` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `templates_name_unique` (`name`),
  UNIQUE KEY `templates_file_unique` (`file`),
  KEY `templates_created_by_foreign` (`created_by`),
  KEY `templates_updated_by_foreign` (`updated_by`),
  CONSTRAINT `templates_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `templates_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `templates`
--

LOCK TABLES `templates` WRITE;
/*!40000 ALTER TABLE `templates` DISABLE KEYS */;
INSERT INTO `templates` VALUES (1,'One column','one-column',1,1,'2017-11-15 16:45:50','2017-11-15 16:45:50'),(2,'Two column left content','two-column-left-content',1,1,'2017-11-15 16:46:33','2017-11-15 16:46:33');
/*!40000 ALTER TABLE `templates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Darko','darkokrstev@gmail.com','$2y$10$n9drNtA9dBvvJWkx6lyEFOuecJXGVry5kBSgUNY38zevoSKdOQJ2G','LCEVA3pMXS7P3Nfh4p5ib8wAg98mYrannOMdO5pzW70CV6uw9ZrGvcpkLJYI','2017-11-15 16:45:21','2017-11-15 16:45:21');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `widget_types`
--

DROP TABLE IF EXISTS `widget_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `widget_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `settings_view` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `updated_by` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `widget_types_name_unique` (`name`),
  KEY `widget_types_created_by_foreign` (`created_by`),
  KEY `widget_types_updated_by_foreign` (`updated_by`),
  CONSTRAINT `widget_types_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `widget_types_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `widget_types`
--

LOCK TABLES `widget_types` WRITE;
/*!40000 ALTER TABLE `widget_types` DISABLE KEYS */;
INSERT INTO `widget_types` VALUES (1,'Banner','banner',1,1,'2017-11-15 17:12:28','2017-11-15 17:12:28'),(2,'Article category','article-category',1,1,'2017-11-15 17:12:56','2017-11-15 17:12:56'),(3,'Article','article',1,1,'2017-11-15 17:13:04','2017-11-15 17:13:04'),(4,'Side menu','side-menu',1,1,'2018-03-05 20:19:40','2018-03-05 20:19:40');
/*!40000 ALTER TABLE `widget_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `widgets`
--

DROP TABLE IF EXISTS `widgets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `widgets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `classname` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `updated_by` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `widget_type_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `widgets_name_unique` (`name`),
  KEY `widgets_created_by_foreign` (`created_by`),
  KEY `widgets_updated_by_foreign` (`updated_by`),
  KEY `widgets_widget_type_id_foreign` (`widget_type_id`),
  CONSTRAINT `widgets_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `widgets_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  CONSTRAINT `widgets_widget_type_id_foreign` FOREIGN KEY (`widget_type_id`) REFERENCES `widget_types` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `widgets`
--

LOCK TABLES `widgets` WRITE;
/*!40000 ALTER TABLE `widgets` DISABLE KEYS */;
INSERT INTO `widgets` VALUES (1,'Banner widget','banner-widget',1,1,'2017-11-15 17:13:27','2017-11-15 17:13:27',1),(2,'Article category widget','article-category-widget',1,1,'2017-11-15 17:13:55','2017-11-15 17:13:55',2),(3,'Article widget','article-widget',1,1,'2017-11-15 17:14:09','2017-11-15 17:14:09',3),(4,'Side menu widget','side-menu-widget',1,1,'2018-03-05 20:20:21','2018-03-05 20:20:21',4);
/*!40000 ALTER TABLE `widgets` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-05 22:39:00
