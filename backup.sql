-- MySQL dump 10.13  Distrib 8.0.41, for Linux (x86_64)
--
-- Host: localhost    Database: posayur
-- ------------------------------------------------------
-- Server version	8.0.41

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `activity_log`
--

DROP TABLE IF EXISTS `activity_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `activity_log` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `log_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint unsigned DEFAULT NULL,
  `event` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint unsigned DEFAULT NULL,
  `properties` json DEFAULT NULL,
  `batch_uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `causer` (`causer_type`,`causer_id`),
  KEY `subject` (`subject_type`,`subject_id`),
  KEY `activity_log_log_name_index` (`log_name`)
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity_log`
--

LOCK TABLES `activity_log` WRITE;
/*!40000 ALTER TABLE `activity_log` DISABLE KEYS */;
INSERT INTO `activity_log` VALUES (1,'Category','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Category',1,'created','App\\Models\\User',4,'{\"attributes\": {\"id\": 1, \"name\": \"category 1\", \"slug\": \"category-1\", \"image\": \"1739945935_ab67616d0000b2736638765f1619d5a148ccb12e.jpeg\", \"outlet_id\": null, \"created_at\": \"2025-02-19T06:18:55.000000Z\", \"updated_at\": \"2025-02-19T06:18:55.000000Z\", \"description\": \"category 1\"}}',NULL,'2025-02-19 06:18:55','2025-02-19 06:18:55'),(2,'Category','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Category',2,'created','App\\Models\\User',4,'{\"attributes\": {\"id\": 2, \"name\": \"Sayuran\", \"slug\": \"sayuran\", \"image\": \"1740475090_cc01493c-6a04-4bea-b33d-3be0086c9f09_169.jpeg\", \"outlet_id\": null, \"created_at\": \"2025-02-25T09:18:10.000000Z\", \"updated_at\": \"2025-02-25T09:18:10.000000Z\", \"description\": \"Sayuran\"}}',NULL,'2025-02-25 09:18:11','2025-02-25 09:18:11'),(3,'Category','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Category',3,'created','App\\Models\\User',4,'{\"attributes\": {\"id\": 3, \"name\": \"Sayuran Remina Amino\", \"slug\": \"sayuran-remina-amino\", \"image\": \"1740475215_cc01493c-6a04-4bea-b33d-3be0086c9f09_169.jpeg\", \"outlet_id\": null, \"created_at\": \"2025-02-25T09:20:15.000000Z\", \"updated_at\": \"2025-02-25T09:20:15.000000Z\", \"description\": \"Sayuran remina\"}}',NULL,'2025-02-25 09:20:15','2025-02-25 09:20:15'),(4,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Tax',1,'created','App\\Models\\User',4,'{\"attributes\": {\"name\": \"PPN\", \"rate\": \"11.00\", \"outlet_id\": 1}}',NULL,'2025-02-25 09:21:56','2025-02-25 09:21:56'),(5,'CustomerGroup','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\CustomerGroup',1,'created','App\\Models\\User',4,'{\"attributes\": {\"id\": 1, \"name\": \"Customer Group\", \"is_active\": \"0\", \"outlet_id\": null, \"created_at\": \"2025-02-25T09:29:40.000000Z\", \"percentage\": 10, \"updated_at\": \"2025-02-25T09:29:40.000000Z\"}}',NULL,'2025-02-25 09:29:40','2025-02-25 09:29:40'),(8,'Customer','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Customer',3,'created','App\\Models\\User',4,'{\"attributes\": {\"id\": 3, \"tax\": \"11\", \"city\": \"Tasikmalaya\", \"name\": \"Deni R\", \"email\": \"galihpangestu.gms@gmail.com\", \"phone\": \"085317713639\", \"state\": \"Jawa Barat\", \"address\": \"Jalan Indihiang\", \"country\": \"Indonesia\", \"user_id\": 11, \"is_active\": \"0\", \"created_at\": \"2025-02-25T09:32:38.000000Z\", \"updated_at\": \"2025-02-25T09:32:38.000000Z\", \"postal_code\": \"46151\", \"company_name\": \"PT Sayur Suplier\", \"customer_group_id\": 1}}',NULL,'2025-02-25 09:32:38','2025-02-25 09:32:38'),(9,'curencys','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Curency',1,'created','App\\Models\\User',4,'{\"attributes\": {\"id\": 1, \"code\": \"Rp.\", \"name\": \"Rupiah\", \"symbol\": \"Rp\", \"is_active\": 0, \"outlet_id\": 1, \"created_at\": \"2025-02-25T09:39:15.000000Z\", \"updated_at\": \"2025-02-25T09:39:15.000000Z\"}}',NULL,'2025-02-25 09:39:15','2025-02-25 09:39:15'),(10,'curencys','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Curency',2,'created','App\\Models\\User',4,'{\"attributes\": {\"id\": 2, \"code\": \"Rp.\", \"name\": \"Rupiah\", \"symbol\": \"Rp\", \"is_active\": 0, \"outlet_id\": 1, \"created_at\": \"2025-02-25T09:40:29.000000Z\", \"updated_at\": \"2025-02-25T09:40:29.000000Z\"}}',NULL,'2025-02-25 09:40:29','2025-02-25 09:40:29'),(11,'curencys','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Curency',1,'deleted','App\\Models\\User',4,'{\"old\": {\"id\": 1, \"code\": \"Rp.\", \"name\": \"Rupiah\", \"symbol\": \"Rp\", \"is_active\": 0, \"outlet_id\": 1, \"created_at\": \"2025-02-25T09:39:15.000000Z\", \"updated_at\": \"2025-02-25T09:39:15.000000Z\"}}',NULL,'2025-02-25 09:41:33','2025-02-25 09:41:33'),(12,'curencys','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Curency',2,'updated','App\\Models\\User',4,'{\"old\": {\"is_active\": 0, \"updated_at\": \"2025-02-25T09:40:29.000000Z\"}, \"attributes\": {\"is_active\": 1, \"updated_at\": \"2025-02-25T09:42:29.000000Z\"}}',NULL,'2025-02-25 09:42:29','2025-02-25 09:42:29'),(13,'CustomerGroup','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\CustomerGroup',2,'created','App\\Models\\User',4,'{\"attributes\": {\"id\": 2, \"name\": \"PT\", \"is_active\": \"0\", \"outlet_id\": null, \"created_at\": \"2025-02-25T09:46:47.000000Z\", \"percentage\": 10, \"updated_at\": \"2025-02-25T09:46:47.000000Z\"}}',NULL,'2025-02-25 09:46:47','2025-02-25 09:46:47'),(14,'Customer','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Customer',4,'created','App\\Models\\User',4,'{\"attributes\": {\"id\": 4, \"tax\": \"10\", \"city\": \"Tasikmalaya\", \"name\": \"PT Sejahtera Group\", \"email\": \"sejahtera@mail.com\", \"phone\": \"08592323232\", \"state\": \"Jawa Barat\", \"address\": \"PT Sejahtera Group\", \"country\": \"Indonesia\", \"user_id\": 12, \"is_active\": \"0\", \"created_at\": \"2025-02-25T09:48:07.000000Z\", \"updated_at\": \"2025-02-25T09:48:07.000000Z\", \"postal_code\": \"462130\", \"company_name\": \"PT Sejahtera Group\", \"customer_group_id\": 2}}',NULL,'2025-02-25 09:48:07','2025-02-25 09:48:07'),(15,'Customer','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Customer',5,'created','App\\Models\\User',4,'{\"attributes\": {\"id\": 5, \"tax\": \"10\", \"city\": \"Tasikmalaya\", \"name\": \"Pram\", \"email\": \"pram@mail.com\", \"phone\": \"902713123223\", \"state\": \"Jawa Barat\", \"address\": \"Saroja UU\", \"country\": \"INdonesia\", \"user_id\": 13, \"is_active\": \"0\", \"created_at\": \"2025-02-25T11:09:32.000000Z\", \"updated_at\": \"2025-02-25T11:09:32.000000Z\", \"postal_code\": \"34214324\", \"company_name\": \"Pram\", \"customer_group_id\": 2}}',NULL,'2025-02-25 11:09:32','2025-02-25 11:09:32'),(16,'Invoice','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Invoice',1,'created','App\\Models\\User',4,'{\"attributes\": {\"id\": 1, \"note\": \"kterangan\", \"discount\": null, \"outlet_id\": 1, \"total_qty\": 2, \"created_at\": \"2025-02-25T11:38:38.000000Z\", \"grandtotal\": \"92000.00\", \"updated_at\": \"2025-02-25T11:38:38.000000Z\", \"sales_order_id\": 1, \"surat_jalan_id\": 1, \"reference_number\": \"INV/20250225/1\"}}',NULL,'2025-02-25 11:38:38','2025-02-25 11:38:38'),(17,'Category','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Category',4,'created','App\\Models\\User',4,'{\"attributes\": {\"id\": 4, \"name\": \"Organik\", \"slug\": \"organik\", \"image\": \"1740497952_sayur.jpg\", \"outlet_id\": null, \"created_at\": \"2025-02-25T15:39:12.000000Z\", \"updated_at\": \"2025-02-25T15:39:12.000000Z\", \"description\": \"Organic\"}}',NULL,'2025-02-25 15:39:12','2025-02-25 15:39:12'),(18,'Category','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Category',4,'updated','App\\Models\\User',4,'{\"old\": {\"name\": \"Organik\", \"slug\": \"organik\", \"updated_at\": \"2025-02-25T15:39:12.000000Z\"}, \"attributes\": {\"name\": \"Organic\", \"slug\": \"organic\", \"updated_at\": \"2025-02-25T15:39:47.000000Z\"}}',NULL,'2025-02-25 15:39:47','2025-02-25 15:39:47'),(19,'Coupon','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Coupon',1,'created','App\\Models\\User',4,'{\"attributes\": {\"id\": 1, \"qty\": 2, \"code\": \"FEB2025\", \"type\": \"fixed\", \"used\": 0, \"amount\": 3000, \"user_id\": 4, \"exp_date\": \"2025-03-10\", \"is_active\": \"1\", \"outlet_id\": 1, \"created_at\": \"2025-02-25T15:42:27.000000Z\", \"min_amount\": 100000, \"updated_at\": \"2025-02-25T15:42:27.000000Z\"}}',NULL,'2025-02-25 15:42:27','2025-02-25 15:42:27'),(20,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Tax',2,'created','App\\Models\\User',4,'{\"attributes\": {\"name\": \"PPN\", \"rate\": \"12.00\", \"outlet_id\": 1}}',NULL,'2025-02-25 15:43:17','2025-02-25 15:43:17'),(21,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Tax',2,'updated','App\\Models\\User',4,'{\"old\": [], \"attributes\": []}',NULL,'2025-02-25 15:53:50','2025-02-25 15:53:50'),(22,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Tax',1,'updated','App\\Models\\User',4,'{\"old\": [], \"attributes\": []}',NULL,'2025-02-25 15:54:04','2025-02-25 15:54:04'),(23,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Tax',2,'updated','App\\Models\\User',4,'{\"old\": [], \"attributes\": []}',NULL,'2025-02-25 15:54:09','2025-02-25 15:54:09'),(24,'CustomerGroup','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\CustomerGroup',3,'created','App\\Models\\User',4,'{\"attributes\": {\"id\": 3, \"name\": \"Group Astacode\", \"is_active\": \"0\", \"outlet_id\": null, \"created_at\": \"2025-02-25T16:03:02.000000Z\", \"percentage\": 10, \"updated_at\": \"2025-02-25T16:03:02.000000Z\"}}',NULL,'2025-02-25 16:03:02','2025-02-25 16:03:02'),(25,'Customer','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Customer',6,'created','App\\Models\\User',4,'{\"attributes\": {\"id\": 6, \"tax\": null, \"city\": \"Tasikmalaya\", \"name\": \"Icam\", \"email\": \"icam@astacode.id\", \"phone\": \"08123798634\", \"state\": \"Jawa Barat\", \"address\": \"Jl. Paseh Gg. Hamidi\", \"country\": \"Indonesia\", \"user_id\": 14, \"is_active\": \"0\", \"created_at\": \"2025-02-25T16:04:33.000000Z\", \"updated_at\": \"2025-02-25T16:04:33.000000Z\", \"postal_code\": \"46151\", \"company_name\": \"Asta\", \"customer_group_id\": 3}}',NULL,'2025-02-25 16:04:33','2025-02-25 16:04:33'),(26,'Category','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Category',5,'created','App\\Models\\User',4,'{\"attributes\": {\"id\": 5, \"name\": \"Sayuran Halal\", \"slug\": \"sayuran-halal\", \"image\": \"1740534956_cc01493c-6a04-4bea-b33d-3be0086c9f09_169.jpeg\", \"outlet_id\": null, \"created_at\": \"2025-02-26T01:55:56.000000Z\", \"updated_at\": \"2025-02-26T01:55:56.000000Z\", \"description\": \"testing\"}}',NULL,'2025-02-26 01:55:56','2025-02-26 01:55:56'),(27,'CustomerGroup','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\CustomerGroup',4,'created','App\\Models\\User',4,'{\"attributes\": {\"id\": 4, \"name\": \"ADSAD\", \"is_active\": \"0\", \"outlet_id\": null, \"created_at\": \"2025-02-26T02:17:53.000000Z\", \"percentage\": 10, \"updated_at\": \"2025-02-26T02:17:53.000000Z\"}}',NULL,'2025-02-26 02:17:53','2025-02-26 02:17:53'),(28,'CustomerGroup','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\CustomerGroup',4,'deleted','App\\Models\\User',4,'{\"old\": {\"id\": 4, \"name\": \"ADSAD\", \"is_active\": \"0\", \"outlet_id\": null, \"created_at\": \"2025-02-26T02:17:53.000000Z\", \"percentage\": 10, \"updated_at\": \"2025-02-26T02:17:53.000000Z\"}}',NULL,'2025-02-26 02:18:07','2025-02-26 02:18:07'),(29,'Customer','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Customer',7,'created','App\\Models\\User',4,'{\"attributes\": {\"id\": 7, \"tax\": \"11\", \"city\": \"asdasdasd\", \"name\": \"asadasd\", \"email\": \"sejahtera1@mail.com\", \"phone\": \"asdasd\", \"state\": \"asdsadas\", \"address\": \"adsaqd\", \"country\": \"adasd\", \"user_id\": 15, \"is_active\": \"0\", \"created_at\": \"2025-02-26T02:20:35.000000Z\", \"updated_at\": \"2025-02-26T02:20:35.000000Z\", \"postal_code\": \"asdasdd\", \"company_name\": \"asdasd\", \"customer_group_id\": 2}}',NULL,'2025-02-26 02:20:35','2025-02-26 02:20:35'),(30,'Category','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Category',5,'updated','App\\Models\\User',4,'{\"old\": {\"updated_at\": \"2025-02-26T01:55:56.000000Z\", \"description\": \"testing\"}, \"attributes\": {\"updated_at\": \"2025-02-26T02:26:38.000000Z\", \"description\": \"Testing\"}}',NULL,'2025-02-26 02:26:38','2025-02-26 02:26:38'),(31,'Category','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Category',5,'updated','App\\Models\\User',4,'{\"old\": {\"updated_at\": \"2025-02-26T02:26:38.000000Z\", \"description\": \"Testing\"}, \"attributes\": {\"updated_at\": \"2025-02-26T02:27:00.000000Z\", \"description\": \"Testing.\"}}',NULL,'2025-02-26 02:27:00','2025-02-26 02:27:00'),(32,'Category','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Category',6,'created','App\\Models\\User',4,'{\"attributes\": {\"id\": 6, \"name\": \"Buah\", \"slug\": \"buah\", \"image\": \"1740537035_buah.jpg\", \"outlet_id\": null, \"created_at\": \"2025-02-26T02:30:35.000000Z\", \"updated_at\": \"2025-02-26T02:30:35.000000Z\", \"description\": \"buah segar\"}}',NULL,'2025-02-26 02:30:35','2025-02-26 02:30:35'),(33,'Category','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Category',6,'deleted','App\\Models\\User',4,'{\"old\": {\"id\": 6, \"name\": \"Buah\", \"slug\": \"buah\", \"image\": \"1740537035_buah.jpg\", \"outlet_id\": null, \"created_at\": \"2025-02-26T02:30:35.000000Z\", \"updated_at\": \"2025-02-26T02:30:35.000000Z\", \"description\": \"buah segar\"}}',NULL,'2025-02-26 02:31:12','2025-02-26 02:31:12'),(34,'Category','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Category',7,'created','App\\Models\\User',4,'{\"attributes\": {\"id\": 7, \"name\": \"Buah\", \"slug\": \"buah\", \"image\": \"1740537288_buah.jpg\", \"outlet_id\": null, \"created_at\": \"2025-02-26T02:34:48.000000Z\", \"updated_at\": \"2025-02-26T02:34:48.000000Z\", \"description\": \"buah buahan\"}}',NULL,'2025-02-26 02:34:48','2025-02-26 02:34:48'),(35,'Category','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Category',7,'updated','App\\Models\\User',4,'{\"old\": {\"updated_at\": \"2025-02-26T02:34:48.000000Z\", \"description\": \"buah buahan\"}, \"attributes\": {\"updated_at\": \"2025-02-26T02:35:48.000000Z\", \"description\": \"buahhhh\"}}',NULL,'2025-02-26 02:35:48','2025-02-26 02:35:48'),(36,'Category','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Category',7,'deleted','App\\Models\\User',4,'{\"old\": {\"id\": 7, \"name\": \"Buah\", \"slug\": \"buah\", \"image\": \"1740537288_buah.jpg\", \"outlet_id\": null, \"created_at\": \"2025-02-26T02:34:48.000000Z\", \"updated_at\": \"2025-02-26T02:35:48.000000Z\", \"description\": \"buahhhh\"}}',NULL,'2025-02-26 02:36:32','2025-02-26 02:36:32'),(37,'Category','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Category',8,'created','App\\Models\\User',4,'{\"attributes\": {\"id\": 8, \"name\": \"Fruit\", \"slug\": \"fruit\", \"image\": \"1740537575_fruit.jpeg\", \"outlet_id\": null, \"created_at\": \"2025-02-26T02:39:35.000000Z\", \"updated_at\": \"2025-02-26T02:39:35.000000Z\", \"description\": \"menambah fruit\"}}',NULL,'2025-02-26 02:39:35','2025-02-26 02:39:35'),(38,'Category','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Category',8,'deleted','App\\Models\\User',4,'{\"old\": {\"id\": 8, \"name\": \"Fruit\", \"slug\": \"fruit\", \"image\": \"1740537575_fruit.jpeg\", \"outlet_id\": null, \"created_at\": \"2025-02-26T02:39:35.000000Z\", \"updated_at\": \"2025-02-26T02:39:35.000000Z\", \"description\": \"menambah fruit\"}}',NULL,'2025-02-26 02:39:53','2025-02-26 02:39:53'),(39,'Category','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Category',9,'created','App\\Models\\User',4,'{\"attributes\": {\"id\": 9, \"name\": \"Fruit\", \"slug\": \"fruit\", \"image\": \"1740537633_fruit.jpeg\", \"outlet_id\": null, \"created_at\": \"2025-02-26T02:40:33.000000Z\", \"updated_at\": \"2025-02-26T02:40:33.000000Z\", \"description\": \"fruit fresh and sweet\"}}',NULL,'2025-02-26 02:40:33','2025-02-26 02:40:33'),(40,'Category','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Category',10,'created','App\\Models\\User',4,'{\"attributes\": {\"id\": 10, \"name\": \"Vegan Food\", \"slug\": \"vegan-food\", \"image\": \"1740537663_Screenshot 2025-01-21 at 13-38-11 Modernize Bootstrap Admin.png\", \"outlet_id\": null, \"created_at\": \"2025-02-26T02:41:03.000000Z\", \"updated_at\": \"2025-02-26T02:41:03.000000Z\", \"description\": \"Makanan untuk vegan yang tidak suka makan daging\"}}',NULL,'2025-02-26 02:41:03','2025-02-26 02:41:03'),(41,'Category','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Category',11,'created','App\\Models\\User',4,'{\"attributes\": {\"id\": 11, \"name\": \"hhhh\", \"slug\": \"hhhh\", \"image\": \"1740537675_fruit.jpeg\", \"outlet_id\": null, \"created_at\": \"2025-02-26T02:41:15.000000Z\", \"updated_at\": \"2025-02-26T02:41:15.000000Z\", \"description\": \"fruit fresh\"}}',NULL,'2025-02-26 02:41:15','2025-02-26 02:41:15'),(42,'Category','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Category',11,'updated','App\\Models\\User',4,'{\"old\": {\"slug\": \"hhhh\", \"updated_at\": \"2025-02-26T02:41:15.000000Z\"}, \"attributes\": {\"slug\": \"hahaha\", \"updated_at\": \"2025-02-26T02:43:32.000000Z\"}}',NULL,'2025-02-26 02:43:32','2025-02-26 02:43:32'),(43,'Category','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Category',11,'deleted','App\\Models\\User',4,'{\"old\": {\"id\": 11, \"name\": \"hhhh\", \"slug\": \"hahaha\", \"image\": \"1740537675_fruit.jpeg\", \"outlet_id\": null, \"created_at\": \"2025-02-26T02:41:15.000000Z\", \"updated_at\": \"2025-02-26T02:43:32.000000Z\", \"description\": \"fruit fresh\"}}',NULL,'2025-02-26 02:44:19','2025-02-26 02:44:19'),(44,'Coupon','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Coupon',2,'created','App\\Models\\User',4,'{\"attributes\": {\"id\": 2, \"qty\": 240, \"code\": \"RIZKI HEBAT\", \"type\": \"fixed\", \"used\": 0, \"amount\": 10000, \"user_id\": 4, \"exp_date\": \"2025-02-28\", \"is_active\": \"1\", \"outlet_id\": 1, \"created_at\": \"2025-02-26T02:46:49.000000Z\", \"min_amount\": 1000, \"updated_at\": \"2025-02-26T02:46:49.000000Z\"}}',NULL,'2025-02-26 02:46:49','2025-02-26 02:46:49'),(45,'Coupon','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Coupon',2,'updated','App\\Models\\User',4,'{\"old\": {\"code\": \"RIZKI HEBAT\", \"updated_at\": \"2025-02-26T02:46:49.000000Z\"}, \"attributes\": {\"code\": \"RIZKI-HEBAT\", \"updated_at\": \"2025-02-26T02:47:19.000000Z\"}}',NULL,'2025-02-26 02:47:19','2025-02-26 02:47:19'),(46,'Coupon','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Coupon',2,'deleted','App\\Models\\User',4,'{\"old\": {\"id\": 2, \"qty\": 240, \"code\": \"RIZKI-HEBAT\", \"type\": \"fixed\", \"used\": 0, \"amount\": 10000, \"user_id\": 4, \"exp_date\": \"2025-02-28\", \"is_active\": \"1\", \"outlet_id\": 1, \"created_at\": \"2025-02-26T02:46:49.000000Z\", \"min_amount\": 1000, \"updated_at\": \"2025-02-26T02:47:19.000000Z\"}}',NULL,'2025-02-26 02:47:41','2025-02-26 02:47:41'),(47,'Category','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Category',12,'created','App\\Models\\User',4,'{\"attributes\": {\"id\": 12, \"name\": \"fruit pak rizki\", \"slug\": \"fruit-pak-rizki\", \"image\": \"1740538192_fruit.jpeg\", \"outlet_id\": null, \"created_at\": \"2025-02-26T02:49:52.000000Z\", \"updated_at\": \"2025-02-26T02:49:52.000000Z\", \"description\": \"fresh and delicious\"}}',NULL,'2025-02-26 02:49:52','2025-02-26 02:49:52'),(48,'Category','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Category',12,'deleted','App\\Models\\User',4,'{\"old\": {\"id\": 12, \"name\": \"fruit pak rizki\", \"slug\": \"fruit-pak-rizki\", \"image\": \"1740538192_fruit.jpeg\", \"outlet_id\": null, \"created_at\": \"2025-02-26T02:49:52.000000Z\", \"updated_at\": \"2025-02-26T02:49:52.000000Z\", \"description\": \"fresh and delicious\"}}',NULL,'2025-02-26 02:51:04','2025-02-26 02:51:04'),(49,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Tax',1,'updated','App\\Models\\User',4,'{\"old\": [], \"attributes\": []}',NULL,'2025-02-26 02:51:31','2025-02-26 02:51:31'),(50,'Category','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Category',10,'deleted','App\\Models\\User',4,'{\"old\": {\"id\": 10, \"name\": \"Vegan Food\", \"slug\": \"vegan-food\", \"image\": \"1740537663_Screenshot 2025-01-21 at 13-38-11 Modernize Bootstrap Admin.png\", \"outlet_id\": null, \"created_at\": \"2025-02-26T02:41:03.000000Z\", \"updated_at\": \"2025-02-26T02:41:03.000000Z\", \"description\": \"Makanan untuk vegan yang tidak suka makan daging\"}}',NULL,'2025-02-26 02:52:02','2025-02-26 02:52:02'),(51,'Category','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Category',9,'deleted','App\\Models\\User',4,'{\"old\": {\"id\": 9, \"name\": \"Fruit\", \"slug\": \"fruit\", \"image\": \"1740537633_fruit.jpeg\", \"outlet_id\": null, \"created_at\": \"2025-02-26T02:40:33.000000Z\", \"updated_at\": \"2025-02-26T02:40:33.000000Z\", \"description\": \"fruit fresh and sweet\"}}',NULL,'2025-02-26 02:52:14','2025-02-26 02:52:14'),(52,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Tax',3,'created','App\\Models\\User',4,'{\"attributes\": {\"name\": \"PPN Cabang Bangkok\", \"rate\": \"7.00\", \"outlet_id\": 2}}',NULL,'2025-02-26 02:52:15','2025-02-26 02:52:15'),(53,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Tax',4,'created','App\\Models\\User',4,'{\"attributes\": {\"name\": \"rizki\", \"rate\": \"10.00\", \"outlet_id\": 2}}',NULL,'2025-02-26 02:52:16','2025-02-26 02:52:16'),(54,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Tax',4,'updated','App\\Models\\User',4,'{\"old\": {\"name\": \"rizki\"}, \"attributes\": {\"name\": \"PPN fruit\"}}',NULL,'2025-02-26 02:52:55','2025-02-26 02:52:55'),(55,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Tax',1,'updated','App\\Models\\User',4,'{\"old\": [], \"attributes\": []}',NULL,'2025-02-26 02:53:44','2025-02-26 02:53:44'),(56,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Tax',4,'updated','App\\Models\\User',4,'{\"old\": [], \"attributes\": []}',NULL,'2025-02-26 02:57:59','2025-02-26 02:57:59'),(57,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Tax',2,'updated','App\\Models\\User',4,'{\"old\": [], \"attributes\": []}',NULL,'2025-02-26 02:58:18','2025-02-26 02:58:18'),(58,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Tax',4,'updated','App\\Models\\User',4,'{\"old\": [], \"attributes\": []}',NULL,'2025-02-26 02:58:32','2025-02-26 02:58:32'),(59,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Tax',4,'updated','App\\Models\\User',4,'{\"old\": [], \"attributes\": []}',NULL,'2025-02-26 02:58:53','2025-02-26 02:58:53'),(60,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Tax',4,'updated','App\\Models\\User',4,'{\"old\": [], \"attributes\": []}',NULL,'2025-02-26 02:59:30','2025-02-26 02:59:30'),(61,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Tax',4,'updated','App\\Models\\User',4,'{\"old\": [], \"attributes\": []}',NULL,'2025-02-26 03:00:47','2025-02-26 03:00:47'),(62,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Tax',2,'updated','App\\Models\\User',4,'{\"old\": [], \"attributes\": []}',NULL,'2025-02-26 03:00:57','2025-02-26 03:00:57'),(63,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Tax',3,'updated','App\\Models\\User',4,'{\"old\": [], \"attributes\": []}',NULL,'2025-02-26 03:01:06','2025-02-26 03:01:06'),(64,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Tax',4,'updated','App\\Models\\User',4,'{\"old\": [], \"attributes\": []}',NULL,'2025-02-26 03:01:43','2025-02-26 03:01:43'),(65,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Tax',3,'updated','App\\Models\\User',4,'{\"old\": [], \"attributes\": []}',NULL,'2025-02-26 03:02:00','2025-02-26 03:02:00'),(66,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Tax',3,'updated','App\\Models\\User',4,'{\"old\": [], \"attributes\": []}',NULL,'2025-02-26 03:02:11','2025-02-26 03:02:11'),(67,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Tax',3,'updated','App\\Models\\User',4,'{\"old\": [], \"attributes\": []}',NULL,'2025-02-26 03:02:12','2025-02-26 03:02:12'),(68,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Tax',3,'updated','App\\Models\\User',4,'{\"old\": [], \"attributes\": []}',NULL,'2025-02-26 03:02:12','2025-02-26 03:02:12'),(69,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Tax',3,'updated','App\\Models\\User',4,'{\"old\": [], \"attributes\": []}',NULL,'2025-02-26 03:02:12','2025-02-26 03:02:12'),(70,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Tax',3,'updated','App\\Models\\User',4,'{\"old\": [], \"attributes\": []}',NULL,'2025-02-26 03:02:12','2025-02-26 03:02:12'),(71,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Tax',3,'updated','App\\Models\\User',4,'{\"old\": [], \"attributes\": []}',NULL,'2025-02-26 03:02:12','2025-02-26 03:02:12'),(72,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Tax',3,'updated','App\\Models\\User',4,'{\"old\": [], \"attributes\": []}',NULL,'2025-02-26 03:02:13','2025-02-26 03:02:13'),(73,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Tax',3,'updated','App\\Models\\User',4,'{\"old\": [], \"attributes\": []}',NULL,'2025-02-26 03:02:13','2025-02-26 03:02:13'),(74,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Tax',3,'updated','App\\Models\\User',4,'{\"old\": [], \"attributes\": []}',NULL,'2025-02-26 03:02:19','2025-02-26 03:02:19'),(75,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Tax',3,'updated','App\\Models\\User',4,'{\"old\": [], \"attributes\": []}',NULL,'2025-02-26 03:02:54','2025-02-26 03:02:54'),(76,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Tax',3,'updated','App\\Models\\User',4,'{\"old\": [], \"attributes\": []}',NULL,'2025-02-26 03:03:38','2025-02-26 03:03:38'),(77,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Tax',3,'updated','App\\Models\\User',4,'{\"old\": [], \"attributes\": []}',NULL,'2025-02-26 03:04:07','2025-02-26 03:04:07'),(78,'Invoice','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Invoice',2,'created','App\\Models\\User',4,'{\"attributes\": {\"id\": 2, \"note\": null, \"discount\": null, \"outlet_id\": 1, \"total_qty\": 2, \"created_at\": \"2025-02-26T03:14:45.000000Z\", \"grandtotal\": \"15000.00\", \"updated_at\": \"2025-02-26T03:14:45.000000Z\", \"sales_order_id\": 3, \"surat_jalan_id\": 3, \"reference_number\": \"INV/20250226/3\"}}',NULL,'2025-02-26 03:14:45','2025-02-26 03:14:45'),(79,'Customer','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Customer',8,'created','App\\Models\\User',4,'{\"attributes\": {\"id\": 8, \"tax\": \"jjjjjj\", \"city\": \"tasikmalaya\", \"name\": \"rizki\", \"email\": \"rizkixirpl@gmail.com\", \"phone\": \"085797779967\", \"state\": \"jawa-barat\", \"address\": \"cihurip\", \"country\": \"indonesia\", \"user_id\": 16, \"is_active\": \"0\", \"created_at\": \"2025-02-26T03:22:39.000000Z\", \"updated_at\": \"2025-02-26T03:22:39.000000Z\", \"postal_code\": \"02123\", \"company_name\": \"PT.rizki.nusantara\", \"customer_group_id\": 2}}',NULL,'2025-02-26 03:22:39','2025-02-26 03:22:39'),(80,'Customer','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Customer',9,'created','App\\Models\\User',4,'{\"attributes\": {\"id\": 9, \"tax\": \"1\", \"city\": \"Kab. Ciamis\", \"name\": \"Dr. Syahdan B.A., Ph.D.\", \"email\": \"sahdanhusna057@gmail.com\", \"phone\": \"085183138321\", \"state\": \"Jawa Barat\", \"address\": \"Sukamaju\", \"country\": \"Indonesia\", \"user_id\": 17, \"is_active\": \"0\", \"created_at\": \"2025-02-26T03:28:21.000000Z\", \"updated_at\": \"2025-02-26T03:28:21.000000Z\", \"postal_code\": \"46262\", \"company_name\": \"Astacode Management\", \"customer_group_id\": 3}}',NULL,'2025-02-26 03:28:21','2025-02-26 03:28:21'),(81,'Category','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Category',13,'created','App\\Models\\User',4,'{\"attributes\": {\"id\": 13, \"name\": \"Sayuran Bayam\", \"slug\": \"sayuran-bayam\", \"image\": \"1740542166_cc01493c-6a04-4bea-b33d-3be0086c9f09_169.jpeg\", \"outlet_id\": null, \"created_at\": \"2025-02-26T03:56:06.000000Z\", \"updated_at\": \"2025-02-26T03:56:06.000000Z\", \"description\": \"aLAMAT\"}}',NULL,'2025-02-26 03:56:06','2025-02-26 03:56:06'),(82,'Category','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Category',14,'created','App\\Models\\User',4,'{\"attributes\": {\"id\": 14, \"name\": \"sAYUR WOTTEL\", \"slug\": \"sayur-wottel\", \"image\": \"1740542959_cc01493c-6a04-4bea-b33d-3be0086c9f09_169.jpeg\", \"outlet_id\": null, \"created_at\": \"2025-02-26T04:09:19.000000Z\", \"updated_at\": \"2025-02-26T04:09:19.000000Z\", \"description\": \"DFESKTIPIS\"}}',NULL,'2025-02-26 04:09:19','2025-02-26 04:09:19'),(83,'CustomerGroup','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\CustomerGroup',5,'created','App\\Models\\User',4,'{\"attributes\": {\"id\": 5, \"name\": \"Group Syahdan\", \"is_active\": \"0\", \"outlet_id\": null, \"created_at\": \"2025-02-26T04:10:45.000000Z\", \"percentage\": 30, \"updated_at\": \"2025-02-26T04:10:45.000000Z\"}}',NULL,'2025-02-26 04:10:45','2025-02-26 04:10:45'),(84,'CustomerGroup','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\CustomerGroup',5,'deleted','App\\Models\\User',4,'{\"old\": {\"id\": 5, \"name\": \"Group Syahdan\", \"is_active\": \"0\", \"outlet_id\": null, \"created_at\": \"2025-02-26T04:10:45.000000Z\", \"percentage\": 30, \"updated_at\": \"2025-02-26T04:10:45.000000Z\"}}',NULL,'2025-02-26 04:11:17','2025-02-26 04:11:17'),(85,'CustomerGroup','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\CustomerGroup',6,'created','App\\Models\\User',4,'{\"attributes\": {\"id\": 6, \"name\": \"Group Syahdan\", \"is_active\": \"1\", \"outlet_id\": null, \"created_at\": \"2025-02-26T04:11:33.000000Z\", \"percentage\": 50, \"updated_at\": \"2025-02-26T04:11:33.000000Z\"}}',NULL,'2025-02-26 04:11:33','2025-02-26 04:11:33'),(86,'Category','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Category',14,'updated','App\\Models\\User',4,'{\"old\": {\"updated_at\": \"2025-02-26T04:09:19.000000Z\", \"description\": \"DFESKTIPIS\"}, \"attributes\": {\"updated_at\": \"2025-02-26T04:15:07.000000Z\", \"description\": \"lorem ipsum dolor sit amet, consectetur\"}}',NULL,'2025-02-26 04:15:11','2025-02-26 04:15:11'),(87,'Category','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Category',15,'created','App\\Models\\User',4,'{\"attributes\": {\"id\": 15, \"name\": \"sAYURAN wORTEL\", \"slug\": \"sayuran-wortel\", \"image\": \"1740543359_cc01493c-6a04-4bea-b33d-3be0086c9f09_169.jpeg\", \"outlet_id\": null, \"created_at\": \"2025-02-26T04:15:59.000000Z\", \"updated_at\": \"2025-02-26T04:15:59.000000Z\", \"description\": \"DESKRIPSI\"}}',NULL,'2025-02-26 04:15:59','2025-02-26 04:15:59'),(88,'Category','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Category',14,'deleted','App\\Models\\User',4,'{\"old\": {\"id\": 14, \"name\": \"sAYUR WOTTEL\", \"slug\": \"sayur-wottel\", \"image\": \"1740542959_cc01493c-6a04-4bea-b33d-3be0086c9f09_169.jpeg\", \"outlet_id\": null, \"created_at\": \"2025-02-26T04:09:19.000000Z\", \"updated_at\": \"2025-02-26T04:15:07.000000Z\", \"description\": \"lorem ipsum dolor sit amet, consectetur\"}}',NULL,'2025-02-26 04:16:47','2025-02-26 04:16:47'),(89,'Coupon','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Coupon',3,'created','App\\Models\\User',4,'{\"attributes\": {\"id\": 3, \"qty\": 1000, \"code\": \"SYAHDANKASEPPISAN\", \"type\": \"percentage\", \"used\": 0, \"amount\": 99, \"user_id\": 4, \"exp_date\": \"2029-12-31\", \"is_active\": \"1\", \"outlet_id\": 1, \"created_at\": \"2025-02-26T04:20:50.000000Z\", \"min_amount\": 0, \"updated_at\": \"2025-02-26T04:20:50.000000Z\"}}',NULL,'2025-02-26 04:20:50','2025-02-26 04:20:50'),(90,'Coupon','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Coupon',4,'created','App\\Models\\User',4,'{\"attributes\": {\"id\": 4, \"qty\": 1, \"code\": \"COBA\", \"type\": \"fixed\", \"used\": 0, \"amount\": 1, \"user_id\": 4, \"exp_date\": \"2025-02-28\", \"is_active\": \"0\", \"outlet_id\": 3, \"created_at\": \"2025-02-26T04:22:44.000000Z\", \"min_amount\": 1, \"updated_at\": \"2025-02-26T04:22:44.000000Z\"}}',NULL,'2025-02-26 04:22:44','2025-02-26 04:22:44'),(91,'Coupon','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Coupon',4,'updated','App\\Models\\User',4,'{\"old\": {\"code\": \"COBA\", \"updated_at\": \"2025-02-26T04:22:44.000000Z\"}, \"attributes\": {\"code\": \"COBAKEDUA\", \"updated_at\": \"2025-02-26T04:23:10.000000Z\"}}',NULL,'2025-02-26 04:23:10','2025-02-26 04:23:10'),(92,'Coupon','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Coupon',4,'deleted','App\\Models\\User',4,'{\"old\": {\"id\": 4, \"qty\": 1, \"code\": \"COBAKEDUA\", \"type\": \"fixed\", \"used\": 0, \"amount\": 1, \"user_id\": 4, \"exp_date\": \"2025-02-28\", \"is_active\": \"0\", \"outlet_id\": 3, \"created_at\": \"2025-02-26T04:22:44.000000Z\", \"min_amount\": 1, \"updated_at\": \"2025-02-26T04:23:10.000000Z\"}}',NULL,'2025-02-26 04:23:17','2025-02-26 04:23:17'),(93,'Customer','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Customer',10,'created','App\\Models\\User',4,'{\"attributes\": {\"id\": 10, \"tax\": \"123\", \"city\": \"Kab. Ciamis\", \"name\": \"Dr. Muhammad Syahdan Husna Mubarok B.A., Ph.D.\", \"email\": \"heavenman699@gmail.com\", \"phone\": \"085183138321\", \"state\": \"Jawa Barat\", \"address\": \"Sukamaju\", \"country\": \"Indonesia\", \"user_id\": 18, \"is_active\": \"0\", \"created_at\": \"2025-02-26T06:25:08.000000Z\", \"updated_at\": \"2025-02-26T06:25:08.000000Z\", \"postal_code\": \"46262\", \"company_name\": \"Astacode Management\", \"customer_group_id\": 6}}',NULL,'2025-02-26 06:25:08','2025-02-26 06:25:08'),(94,'Coupon','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Coupon',3,'updated','App\\Models\\User',4,'{\"old\": {\"type\": \"percentage\", \"amount\": 99, \"updated_at\": \"2025-02-26T04:20:50.000000Z\"}, \"attributes\": {\"type\": \"fixed\", \"amount\": 80000, \"updated_at\": \"2025-02-26T07:12:38.000000Z\"}}',NULL,'2025-02-26 07:12:38','2025-02-26 07:12:38'),(95,'Coupon','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-14T00:09:52.000000Z\"}','App\\Models\\Coupon',3,'updated','App\\Models\\User',4,'{\"old\": {\"type\": \"fixed\", \"amount\": 80000, \"updated_at\": \"2025-02-26T07:12:38.000000Z\"}, \"attributes\": {\"type\": \"percentage\", \"amount\": 99, \"updated_at\": \"2025-02-26T07:13:21.000000Z\"}}',NULL,'2025-02-26 07:13:21','2025-02-26 07:13:21'),(96,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":\"085183138321\",\"post_code\":\"46262\",\"city\":\"Kab. Ciamis\",\"country\":\"Indonesia\",\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-26T08:09:09.000000Z\"}','App\\Models\\Tax',3,'updated','App\\Models\\User',4,'{\"old\": {\"outlet_id\": 2}, \"attributes\": {\"outlet_id\": 1}}',NULL,'2025-02-27 03:07:46','2025-02-27 03:07:46'),(97,'Category','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":\"085183138321\",\"post_code\":\"46262\",\"city\":\"Kab. Ciamis\",\"country\":\"Indonesia\",\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-26T08:09:09.000000Z\"}','App\\Models\\Category',16,'created','App\\Models\\User',4,'{\"attributes\": {\"id\": 16, \"name\": \"ttes\", \"slug\": \"ttes\", \"image\": \"1740726527_js.png\", \"outlet_id\": 1, \"created_at\": \"2025-02-28T07:08:47.000000Z\", \"updated_at\": \"2025-02-28T07:08:47.000000Z\", \"description\": \"ttessss\"}}',NULL,'2025-02-28 07:08:47','2025-02-28 07:08:47'),(98,'Category','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":\"085183138321\",\"post_code\":\"46262\",\"city\":\"Kab. Ciamis\",\"country\":\"Indonesia\",\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-26T08:09:09.000000Z\"}','App\\Models\\Category',16,'updated','App\\Models\\User',4,'{\"old\": {\"name\": \"ttes\", \"slug\": \"ttes\", \"updated_at\": \"2025-02-28T07:08:47.000000Z\"}, \"attributes\": {\"name\": \"ttes2\", \"slug\": \"ttes2\", \"updated_at\": \"2025-02-28T07:09:40.000000Z\"}}',NULL,'2025-02-28 07:09:40','2025-02-28 07:09:40'),(99,'Coupon','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":\"085183138321\",\"post_code\":\"46262\",\"city\":\"Kab. Ciamis\",\"country\":\"Indonesia\",\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-26T08:09:09.000000Z\"}','App\\Models\\Coupon',5,'created','App\\Models\\User',4,'{\"attributes\": {\"id\": 5, \"qty\": 1, \"code\": \"TTESPOS\", \"type\": \"fixed\", \"used\": 0, \"amount\": 100, \"user_id\": 4, \"exp_date\": \"2025-03-01\", \"is_active\": \"0\", \"outlet_id\": 1, \"created_at\": \"2025-02-28T07:13:19.000000Z\", \"min_amount\": 0, \"updated_at\": \"2025-02-28T07:13:19.000000Z\"}}',NULL,'2025-02-28 07:13:19','2025-02-28 07:13:19'),(100,'Coupon','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":\"085183138321\",\"post_code\":\"46262\",\"city\":\"Kab. Ciamis\",\"country\":\"Indonesia\",\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-26T08:09:09.000000Z\"}','App\\Models\\Coupon',5,'updated','App\\Models\\User',4,'{\"old\": {\"code\": \"TTESPOS\", \"is_active\": \"0\", \"updated_at\": \"2025-02-28T07:13:19.000000Z\"}, \"attributes\": {\"code\": \"TESPOS\", \"is_active\": \"1\", \"updated_at\": \"2025-02-28T07:13:45.000000Z\"}}',NULL,'2025-02-28 07:13:45','2025-02-28 07:13:45'),(101,'Category','{\"id\":14,\"outlet_id\":1,\"name\":\"Admin Koyasai\",\"email\":\"adminkoyasai@gmail.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-25T16:04:33.000000Z\",\"created_at\":\"2025-02-25T16:04:33.000000Z\",\"updated_at\":\"2025-02-27T03:08:52.000000Z\"}','App\\Models\\Category',16,'updated','App\\Models\\User',14,'{\"old\": {\"name\": \"ttes2\", \"slug\": \"ttes2\", \"updated_at\": \"2025-02-28T07:09:40.000000Z\"}, \"attributes\": {\"name\": \"Maman\", \"slug\": \"maman\", \"updated_at\": \"2025-02-28T07:13:46.000000Z\"}}',NULL,'2025-02-28 07:13:46','2025-02-28 07:13:46'),(102,'Customer','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":\"085183138321\",\"post_code\":\"46262\",\"city\":\"Kab. Ciamis\",\"country\":\"Indonesia\",\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-26T08:09:09.000000Z\"}','App\\Models\\Customer',11,'created','App\\Models\\User',4,'{\"attributes\": {\"id\": 11, \"tax\": null, \"city\": \"Kabupaten Tasikmalaya\", \"name\": \"Usman\", \"email\": \"sahdanhusna057@gmail.com\", \"phone\": \"081224066288\", \"state\": \"Jawa Barat\", \"address\": \"Desa sukamaju, dusun sukamaju hilir, rt8 rw 3\", \"country\": \"Indonesia\", \"user_id\": 19, \"is_active\": \"0\", \"created_at\": \"2025-02-28T07:20:24.000000Z\", \"updated_at\": \"2025-02-28T07:20:24.000000Z\", \"postal_code\": \"46262\", \"company_name\": \"Syahdan store\", \"customer_group_id\": 6}}',NULL,'2025-02-28 07:20:24','2025-02-28 07:20:24'),(103,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":\"085183138321\",\"post_code\":\"46262\",\"city\":\"Kab. Ciamis\",\"country\":\"Indonesia\",\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-26T08:09:09.000000Z\"}','App\\Models\\Tax',5,'created','App\\Models\\User',4,'{\"attributes\": {\"name\": \"haha\", \"rate\": \"20.00\", \"outlet_id\": 1}}',NULL,'2025-02-28 07:20:34','2025-02-28 07:20:34'),(104,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":\"085183138321\",\"post_code\":\"46262\",\"city\":\"Kab. Ciamis\",\"country\":\"Indonesia\",\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-26T08:09:09.000000Z\"}','App\\Models\\Tax',3,'updated','App\\Models\\User',4,'{\"old\": [], \"attributes\": []}',NULL,'2025-02-28 07:21:38','2025-02-28 07:21:38'),(105,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":\"085183138321\",\"post_code\":\"46262\",\"city\":\"Kab. Ciamis\",\"country\":\"Indonesia\",\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-26T08:09:09.000000Z\"}','App\\Models\\Tax',3,'updated','App\\Models\\User',4,'{\"old\": [], \"attributes\": []}',NULL,'2025-02-28 07:22:19','2025-02-28 07:22:19'),(106,'CustomerGroup','{\"id\":14,\"outlet_id\":1,\"name\":\"Admin Koyasai\",\"email\":\"adminkoyasai@gmail.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-25T16:04:33.000000Z\",\"created_at\":\"2025-02-25T16:04:33.000000Z\",\"updated_at\":\"2025-02-27T03:08:52.000000Z\"}','App\\Models\\CustomerGroup',1,'updated','App\\Models\\User',14,'{\"old\": {\"is_active\": \"0\", \"updated_at\": \"2025-02-25T09:29:40.000000Z\"}, \"attributes\": {\"is_active\": \"1\", \"updated_at\": \"2025-02-28T07:23:29.000000Z\"}}',NULL,'2025-02-28 07:23:29','2025-02-28 07:23:29'),(107,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":\"085183138321\",\"post_code\":\"46262\",\"city\":\"Kab. Ciamis\",\"country\":\"Indonesia\",\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-26T08:09:09.000000Z\"}','App\\Models\\Tax',3,'updated','App\\Models\\User',4,'{\"old\": [], \"attributes\": []}',NULL,'2025-02-28 07:23:31','2025-02-28 07:23:31'),(108,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":\"085183138321\",\"post_code\":\"46262\",\"city\":\"Kab. Ciamis\",\"country\":\"Indonesia\",\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-26T08:09:09.000000Z\"}','App\\Models\\Tax',3,'updated','App\\Models\\User',4,'{\"old\": [], \"attributes\": []}',NULL,'2025-02-28 07:25:17','2025-02-28 07:25:17'),(109,'Customer','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":\"085183138321\",\"post_code\":\"46262\",\"city\":\"Kab. Ciamis\",\"country\":\"Indonesia\",\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-26T08:09:09.000000Z\"}','App\\Models\\Customer',11,'deleted','App\\Models\\User',4,'{\"old\": {\"id\": 11, \"tax\": null, \"city\": \"Kabupaten Tasikmalaya\", \"name\": \"Usman\", \"email\": \"sahdanhusna057@gmail.com\", \"phone\": \"081224066288\", \"state\": \"Jawa Barat\", \"address\": \"Desa sukamaju, dusun sukamaju hilir, rt8 rw 3\", \"country\": \"Indonesia\", \"user_id\": 19, \"is_active\": \"0\", \"created_at\": \"2025-02-28T07:20:24.000000Z\", \"updated_at\": \"2025-02-28T07:25:17.000000Z\", \"postal_code\": \"46262\", \"company_name\": \"Syahdan Syahrir\", \"customer_group_id\": 6}}',NULL,'2025-02-28 07:25:24','2025-02-28 07:25:24'),(110,'Category','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":\"085183138321\",\"post_code\":\"46262\",\"city\":\"Kab. Ciamis\",\"country\":\"Indonesia\",\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-26T08:09:09.000000Z\"}','App\\Models\\Category',17,'created','App\\Models\\User',4,'{\"attributes\": {\"id\": 17, \"name\": \"Vegetable\", \"slug\": \"vegetable\", \"image\": \"1740728210_logo-type.jpeg\", \"outlet_id\": 8, \"created_at\": \"2025-02-28T07:36:50.000000Z\", \"updated_at\": \"2025-02-28T07:36:50.000000Z\", \"description\": \"Lorem ipsum dolor sit amet amet jabang bayi\"}}',NULL,'2025-02-28 07:36:50','2025-02-28 07:36:50'),(111,'Category','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":\"085183138321\",\"post_code\":\"46262\",\"city\":\"Kab. Ciamis\",\"country\":\"Indonesia\",\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-26T08:09:09.000000Z\"}','App\\Models\\Category',18,'created','App\\Models\\User',4,'{\"attributes\": {\"id\": 18, \"name\": \"fjkdslfjds\", \"slug\": \"fjkdslfjds\", \"image\": \"1740728432_logo-mark.jpeg\", \"outlet_id\": 1, \"created_at\": \"2025-02-28T07:40:32.000000Z\", \"updated_at\": \"2025-02-28T07:40:32.000000Z\", \"description\": \"dfdsff\"}}',NULL,'2025-02-28 07:40:32','2025-02-28 07:40:32'),(112,'Category','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":\"085183138321\",\"post_code\":\"46262\",\"city\":\"Kab. Ciamis\",\"country\":\"Indonesia\",\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-26T08:09:09.000000Z\"}','App\\Models\\Category',18,'deleted','App\\Models\\User',4,'{\"old\": {\"id\": 18, \"name\": \"fjkdslfjds\", \"slug\": \"fjkdslfjds\", \"image\": \"1740728432_logo-mark.jpeg\", \"outlet_id\": 1, \"created_at\": \"2025-02-28T07:40:32.000000Z\", \"updated_at\": \"2025-02-28T07:40:32.000000Z\", \"description\": \"dfdsff\"}}',NULL,'2025-02-28 07:41:12','2025-02-28 07:41:12'),(113,'Category','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":\"085183138321\",\"post_code\":\"46262\",\"city\":\"Kab. Ciamis\",\"country\":\"Indonesia\",\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-26T08:09:09.000000Z\"}','App\\Models\\Category',16,'updated','App\\Models\\User',4,'{\"old\": {\"name\": \"Maman\", \"slug\": \"maman\", \"updated_at\": \"2025-02-28T07:13:46.000000Z\"}, \"attributes\": {\"name\": \"Maman racing\", \"slug\": \"maman-racing\", \"updated_at\": \"2025-02-28T07:42:28.000000Z\"}}',NULL,'2025-02-28 07:42:28','2025-02-28 07:42:28'),(114,'Coupon','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":\"085183138321\",\"post_code\":\"46262\",\"city\":\"Kab. Ciamis\",\"country\":\"Indonesia\",\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-26T08:09:09.000000Z\"}','App\\Models\\Coupon',5,'updated','App\\Models\\User',4,'{\"old\": {\"type\": \"fixed\", \"updated_at\": \"2025-02-28T07:13:45.000000Z\"}, \"attributes\": {\"type\": \"percentage\", \"updated_at\": \"2025-02-28T07:46:08.000000Z\"}}',NULL,'2025-02-28 07:46:08','2025-02-28 07:46:08'),(115,'Customer','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":\"085183138321\",\"post_code\":\"46262\",\"city\":\"Kab. Ciamis\",\"country\":\"Indonesia\",\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-26T08:09:09.000000Z\"}','App\\Models\\Customer',12,'created','App\\Models\\User',4,'{\"attributes\": {\"id\": 12, \"tax\": \"20\", \"city\": \"tasik\", \"name\": \"rizki\", \"email\": \"rizkixirpl123@gmail.com\", \"phone\": \"08574384384\", \"state\": \"jawa barat\", \"address\": \"tasik\", \"country\": \"indonesia\", \"user_id\": 20, \"is_active\": \"0\", \"created_at\": \"2025-02-28T07:46:28.000000Z\", \"updated_at\": \"2025-02-28T07:46:28.000000Z\", \"postal_code\": \"4053\", \"company_name\": \"PT.rizki nusantara\", \"customer_group_id\": 2}}',NULL,'2025-02-28 07:46:28','2025-02-28 07:46:28'),(116,'Category','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":\"085183138321\",\"post_code\":\"46262\",\"city\":\"Kab. Ciamis\",\"country\":\"Indonesia\",\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-26T08:09:09.000000Z\"}','App\\Models\\Category',17,'deleted','App\\Models\\User',4,'{\"old\": {\"id\": 17, \"name\": \"Vegetable\", \"slug\": \"vegetable\", \"image\": \"1740728210_logo-type.jpeg\", \"outlet_id\": 8, \"created_at\": \"2025-02-28T07:36:50.000000Z\", \"updated_at\": \"2025-02-28T07:36:50.000000Z\", \"description\": \"Lorem ipsum dolor sit amet amet jabang bayi\"}}',NULL,'2025-02-28 07:48:57','2025-02-28 07:48:57'),(117,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":\"085183138321\",\"post_code\":\"46262\",\"city\":\"Kab. Ciamis\",\"country\":\"Indonesia\",\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-26T08:09:09.000000Z\"}','App\\Models\\Tax',3,'updated','App\\Models\\User',4,'{\"old\": [], \"attributes\": []}',NULL,'2025-02-28 07:54:58','2025-02-28 07:54:58'),(118,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":\"085183138321\",\"post_code\":\"46262\",\"city\":\"Kab. Ciamis\",\"country\":\"Indonesia\",\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-26T08:09:09.000000Z\"}','App\\Models\\Tax',5,'updated','App\\Models\\User',4,'{\"old\": [], \"attributes\": []}',NULL,'2025-02-28 07:55:04','2025-02-28 07:55:04'),(119,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":\"085183138321\",\"post_code\":\"46262\",\"city\":\"Kab. Ciamis\",\"country\":\"Indonesia\",\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-26T08:09:09.000000Z\"}','App\\Models\\Tax',3,'updated','App\\Models\\User',4,'{\"old\": [], \"attributes\": []}',NULL,'2025-02-28 07:55:11','2025-02-28 07:55:11'),(120,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":\"085183138321\",\"post_code\":\"46262\",\"city\":\"Kab. Ciamis\",\"country\":\"Indonesia\",\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-26T08:09:09.000000Z\"}','App\\Models\\Tax',5,'updated','App\\Models\\User',4,'{\"old\": [], \"attributes\": []}',NULL,'2025-02-28 07:55:20','2025-02-28 07:55:20'),(121,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":\"085183138321\",\"post_code\":\"46262\",\"city\":\"Kab. Ciamis\",\"country\":\"Indonesia\",\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-26T08:09:09.000000Z\"}','App\\Models\\Tax',3,'updated','App\\Models\\User',4,'{\"old\": [], \"attributes\": []}',NULL,'2025-02-28 07:55:44','2025-02-28 07:55:44'),(122,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":\"085183138321\",\"post_code\":\"46262\",\"city\":\"Kab. Ciamis\",\"country\":\"Indonesia\",\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-26T08:09:09.000000Z\"}','App\\Models\\Tax',5,'updated','App\\Models\\User',4,'{\"old\": [], \"attributes\": []}',NULL,'2025-02-28 07:56:27','2025-02-28 07:56:27'),(123,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":\"085183138321\",\"post_code\":\"46262\",\"city\":\"Kab. Ciamis\",\"country\":\"Indonesia\",\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-26T08:09:09.000000Z\"}','App\\Models\\Tax',5,'updated','App\\Models\\User',4,'{\"old\": [], \"attributes\": []}',NULL,'2025-02-28 07:56:32','2025-02-28 07:56:32'),(124,'tax','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":\"085183138321\",\"post_code\":\"46262\",\"city\":\"Kab. Ciamis\",\"country\":\"Indonesia\",\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-26T08:09:09.000000Z\"}','App\\Models\\Tax',5,'updated','App\\Models\\User',4,'{\"old\": [], \"attributes\": []}',NULL,'2025-02-28 07:56:34','2025-02-28 07:56:34'),(125,'Category','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":\"085183138321\",\"post_code\":\"46262\",\"city\":\"Kab. Ciamis\",\"country\":\"Indonesia\",\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-26T08:09:09.000000Z\"}','App\\Models\\Category',16,'updated','App\\Models\\User',4,'{\"old\": {\"outlet_id\": 1, \"updated_at\": \"2025-02-28T07:42:28.000000Z\"}, \"attributes\": {\"outlet_id\": 9, \"updated_at\": \"2025-02-28T07:57:30.000000Z\"}}',NULL,'2025-02-28 07:57:30','2025-02-28 07:57:30'),(126,'Coupon','{\"id\":14,\"outlet_id\":1,\"name\":\"Admin Koyasai\",\"email\":\"adminkoyasai@gmail.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-25T16:04:33.000000Z\",\"created_at\":\"2025-02-25T16:04:33.000000Z\",\"updated_at\":\"2025-02-27T03:08:52.000000Z\"}','App\\Models\\Coupon',5,'updated','App\\Models\\User',14,'{\"old\": {\"amount\": 100, \"min_amount\": 0, \"updated_at\": \"2025-02-28T07:46:08.000000Z\"}, \"attributes\": {\"amount\": 70, \"min_amount\": 50, \"updated_at\": \"2025-02-28T08:39:04.000000Z\"}}',NULL,'2025-02-28 08:39:04','2025-02-28 08:39:04'),(127,'Category','{\"id\":14,\"outlet_id\":1,\"name\":\"Admin Koyasai\",\"email\":\"adminkoyasai@gmail.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-25T16:04:33.000000Z\",\"created_at\":\"2025-02-25T16:04:33.000000Z\",\"updated_at\":\"2025-02-27T03:08:52.000000Z\"}','App\\Models\\Category',19,'created','App\\Models\\User',14,'{\"attributes\": {\"id\": 19, \"name\": \"ktegori\", \"slug\": \"ktegori\", \"image\": \"1740733706_111121.png\", \"outlet_id\": 1, \"created_at\": \"2025-02-28T09:08:26.000000Z\", \"updated_at\": \"2025-02-28T09:08:26.000000Z\", \"description\": \"contoh\"}}',NULL,'2025-02-28 09:08:26','2025-02-28 09:08:26'),(128,'Coupon','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":\"085183138321\",\"post_code\":\"46262\",\"city\":\"Kab. Ciamis\",\"country\":\"Indonesia\",\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-26T08:09:09.000000Z\"}','App\\Models\\Coupon',3,'updated','App\\Models\\User',4,'{\"old\": {\"used\": 0, \"updated_at\": \"2025-02-26T07:13:21.000000Z\"}, \"attributes\": {\"used\": 1, \"updated_at\": \"2025-02-28T09:09:32.000000Z\"}}',NULL,'2025-02-28 09:09:32','2025-02-28 09:09:32'),(129,'Coupon','{\"id\":4,\"outlet_id\":null,\"name\":\"Super Admin\",\"email\":\"superadmin@dashcode.com\",\"phone\":\"085183138321\",\"post_code\":\"46262\",\"city\":\"Kab. Ciamis\",\"country\":\"Indonesia\",\"email_verified_at\":\"2025-02-14T00:09:52.000000Z\",\"created_at\":\"2025-02-14T00:09:52.000000Z\",\"updated_at\":\"2025-02-26T08:09:09.000000Z\"}','App\\Models\\Coupon',3,'updated','App\\Models\\User',4,'{\"old\": {\"used\": 1, \"updated_at\": \"2025-02-28T09:09:32.000000Z\"}, \"attributes\": {\"used\": 2, \"updated_at\": \"2025-02-28T09:13:09.000000Z\"}}',NULL,'2025-02-28 09:13:09','2025-02-28 09:13:09'),(130,'Coupon','{\"id\":14,\"outlet_id\":1,\"name\":\"Admin Koyasai\",\"email\":\"adminkoyasai@gmail.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-25T16:04:33.000000Z\",\"created_at\":\"2025-02-25T16:04:33.000000Z\",\"updated_at\":\"2025-02-27T03:08:52.000000Z\"}','App\\Models\\Coupon',5,'updated','App\\Models\\User',14,'{\"old\": {\"used\": 0, \"updated_at\": \"2025-02-28T08:39:04.000000Z\"}, \"attributes\": {\"used\": 1, \"updated_at\": \"2025-02-28T09:32:56.000000Z\"}}',NULL,'2025-02-28 09:32:56','2025-02-28 09:32:56'),(131,'Coupon','{\"id\":14,\"outlet_id\":1,\"name\":\"Admin Koyasai\",\"email\":\"adminkoyasai@gmail.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-25T16:04:33.000000Z\",\"created_at\":\"2025-02-25T16:04:33.000000Z\",\"updated_at\":\"2025-02-27T03:08:52.000000Z\"}','App\\Models\\Coupon',5,'updated','App\\Models\\User',14,'{\"old\": {\"used\": 1, \"updated_at\": \"2025-02-28T09:32:56.000000Z\"}, \"attributes\": {\"used\": 2, \"updated_at\": \"2025-02-28T09:34:02.000000Z\"}}',NULL,'2025-02-28 09:34:02','2025-02-28 09:34:02'),(132,'Invoice','{\"id\":14,\"outlet_id\":1,\"name\":\"Admin Koyasai\",\"email\":\"adminkoyasai@gmail.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-25T16:04:33.000000Z\",\"created_at\":\"2025-02-25T16:04:33.000000Z\",\"updated_at\":\"2025-02-27T03:08:52.000000Z\"}','App\\Models\\Invoice',3,'created','App\\Models\\User',14,'{\"attributes\": {\"id\": 3, \"note\": \"22223\", \"discount\": null, \"outlet_id\": 1, \"total_qty\": 12, \"created_at\": \"2025-02-28T09:46:41.000000Z\", \"grandtotal\": \"201000.00\", \"updated_at\": \"2025-02-28T09:46:41.000000Z\", \"sales_order_id\": 20, \"surat_jalan_id\": 7, \"reference_number\": \"INV/20250228/20\"}}',NULL,'2025-02-28 09:46:41','2025-02-28 09:46:41'),(133,'Coupon','{\"id\":14,\"outlet_id\":1,\"name\":\"Admin Koyasai\",\"email\":\"adminkoyasai@gmail.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-25T16:04:33.000000Z\",\"created_at\":\"2025-02-25T16:04:33.000000Z\",\"updated_at\":\"2025-02-27T03:08:52.000000Z\"}','App\\Models\\Coupon',5,'updated','App\\Models\\User',14,'{\"old\": {\"used\": 2, \"updated_at\": \"2025-02-28T09:34:02.000000Z\"}, \"attributes\": {\"used\": 3, \"updated_at\": \"2025-02-28T09:50:09.000000Z\"}}',NULL,'2025-02-28 09:50:09','2025-02-28 09:50:09'),(134,'Invoice','{\"id\":14,\"outlet_id\":1,\"name\":\"Admin Koyasai\",\"email\":\"adminkoyasai@gmail.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-25T16:04:33.000000Z\",\"created_at\":\"2025-02-25T16:04:33.000000Z\",\"updated_at\":\"2025-02-27T03:08:52.000000Z\"}','App\\Models\\Invoice',4,'created','App\\Models\\User',14,'{\"attributes\": {\"id\": 4, \"note\": null, \"discount\": null, \"outlet_id\": 1, \"total_qty\": 9, \"created_at\": \"2025-02-28T09:53:31.000000Z\", \"grandtotal\": \"651000.00\", \"updated_at\": \"2025-02-28T09:53:31.000000Z\", \"sales_order_id\": 21, \"surat_jalan_id\": 8, \"reference_number\": \"INV/20250228/21\"}}',NULL,'2025-02-28 09:53:31','2025-02-28 09:53:31'),(135,'Invoice','{\"id\":14,\"outlet_id\":1,\"name\":\"Admin Koyasai\",\"email\":\"adminkoyasai@gmail.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-25T16:04:33.000000Z\",\"created_at\":\"2025-02-25T16:04:33.000000Z\",\"updated_at\":\"2025-02-27T03:08:52.000000Z\"}','App\\Models\\Invoice',5,'created','App\\Models\\User',14,'{\"attributes\": {\"id\": 5, \"note\": null, \"discount\": null, \"coupon_id\": null, \"outlet_id\": 1, \"total_qty\": 3, \"created_at\": \"2025-03-01T08:43:47.000000Z\", \"grandtotal\": \"112871.00\", \"updated_at\": \"2025-03-01T08:43:47.000000Z\", \"coupon_type\": null, \"paid_amount\": \"0.000\", \"coupon_amount\": \"0.000\", \"sales_order_id\": 36, \"surat_jalan_id\": 10, \"total_discount\": \"0.000\", \"reference_number\": \"INV/20250301/36\"}}',NULL,'2025-03-01 08:43:47','2025-03-01 08:43:47'),(136,'Invoice','{\"id\":14,\"outlet_id\":1,\"name\":\"Admin Koyasai\",\"email\":\"adminkoyasai@gmail.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-25T16:04:33.000000Z\",\"created_at\":\"2025-02-25T16:04:33.000000Z\",\"updated_at\":\"2025-02-27T03:08:52.000000Z\"}','App\\Models\\Invoice',6,'created','App\\Models\\User',14,'{\"attributes\": {\"id\": 6, \"note\": \"111\", \"discount\": null, \"coupon_id\": null, \"outlet_id\": 1, \"total_qty\": 1, \"created_at\": \"2025-03-03T08:01:41.000000Z\", \"grandtotal\": \"44900.00\", \"updated_at\": \"2025-03-03T08:01:41.000000Z\", \"coupon_type\": null, \"paid_amount\": \"100.000\", \"coupon_amount\": \"0.000\", \"sales_order_id\": 37, \"surat_jalan_id\": 11, \"total_discount\": \"0.000\", \"reference_number\": \"INV/20250303/37\"}}',NULL,'2025-03-03 08:01:41','2025-03-03 08:01:41'),(137,'Invoice','{\"id\":14,\"outlet_id\":1,\"name\":\"Admin Koyasai\",\"email\":\"adminkoyasai@gmail.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-25T16:04:33.000000Z\",\"created_at\":\"2025-02-25T16:04:33.000000Z\",\"updated_at\":\"2025-02-27T03:08:52.000000Z\"}','App\\Models\\Invoice',7,'created','App\\Models\\User',14,'{\"attributes\": {\"id\": 7, \"note\": null, \"discount\": null, \"coupon_id\": null, \"outlet_id\": 1, \"total_qty\": 3, \"created_at\": \"2025-03-14T13:15:36.000000Z\", \"grandtotal\": \"168000.00\", \"updated_at\": \"2025-03-14T13:15:36.000000Z\", \"coupon_type\": null, \"paid_amount\": \"0.000\", \"coupon_amount\": \"0.000\", \"sales_order_id\": 38, \"surat_jalan_id\": 12, \"total_discount\": \"0.000\", \"reference_number\": \"INV/20250314/38\"}}',NULL,'2025-03-14 13:15:36','2025-03-14 13:15:36'),(138,'CustomerGroup','{\"id\":14,\"outlet_id\":1,\"name\":\"Admin Koyasai\",\"email\":\"adminkoyasai@gmail.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-25T16:04:33.000000Z\",\"created_at\":\"2025-02-25T16:04:33.000000Z\",\"updated_at\":\"2025-02-27T03:08:52.000000Z\"}','App\\Models\\CustomerGroup',1,'deleted','App\\Models\\User',14,'{\"old\": {\"id\": 1, \"name\": \"Customer Group\", \"is_active\": \"1\", \"outlet_id\": null, \"created_at\": \"2025-02-25T09:29:40.000000Z\", \"percentage\": 10, \"updated_at\": \"2025-02-28T07:23:29.000000Z\"}}',NULL,'2025-04-02 06:27:33','2025-04-02 06:27:33'),(139,'CustomerGroup','{\"id\":14,\"outlet_id\":1,\"name\":\"Admin Koyasai\",\"email\":\"adminkoyasai@gmail.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-25T16:04:33.000000Z\",\"created_at\":\"2025-02-25T16:04:33.000000Z\",\"updated_at\":\"2025-02-27T03:08:52.000000Z\"}','App\\Models\\CustomerGroup',2,'deleted','App\\Models\\User',14,'{\"old\": {\"id\": 2, \"name\": \"PT\", \"is_active\": \"0\", \"outlet_id\": null, \"created_at\": \"2025-02-25T09:46:47.000000Z\", \"percentage\": 10, \"updated_at\": \"2025-02-25T09:46:47.000000Z\"}}',NULL,'2025-04-02 06:27:42','2025-04-02 06:27:42'),(140,'CustomerGroup','{\"id\":14,\"outlet_id\":1,\"name\":\"Admin Koyasai\",\"email\":\"adminkoyasai@gmail.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-25T16:04:33.000000Z\",\"created_at\":\"2025-02-25T16:04:33.000000Z\",\"updated_at\":\"2025-02-27T03:08:52.000000Z\"}','App\\Models\\CustomerGroup',3,'deleted','App\\Models\\User',14,'{\"old\": {\"id\": 3, \"name\": \"Group Astacode\", \"is_active\": \"0\", \"outlet_id\": null, \"created_at\": \"2025-02-25T16:03:02.000000Z\", \"percentage\": 10, \"updated_at\": \"2025-02-25T16:03:02.000000Z\"}}',NULL,'2025-04-02 06:27:46','2025-04-02 06:27:46'),(141,'CustomerGroup','{\"id\":14,\"outlet_id\":1,\"name\":\"Admin Koyasai\",\"email\":\"adminkoyasai@gmail.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-25T16:04:33.000000Z\",\"created_at\":\"2025-02-25T16:04:33.000000Z\",\"updated_at\":\"2025-02-27T03:08:52.000000Z\"}','App\\Models\\CustomerGroup',6,'deleted','App\\Models\\User',14,'{\"old\": {\"id\": 6, \"name\": \"Group Syahdan\", \"is_active\": \"1\", \"outlet_id\": null, \"created_at\": \"2025-02-26T04:11:33.000000Z\", \"percentage\": 50, \"updated_at\": \"2025-02-26T04:11:33.000000Z\"}}',NULL,'2025-04-02 06:27:50','2025-04-02 06:27:50'),(142,'CustomerGroup','{\"id\":14,\"outlet_id\":1,\"name\":\"Admin Koyasai\",\"email\":\"adminkoyasai@gmail.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-25T16:04:33.000000Z\",\"created_at\":\"2025-02-25T16:04:33.000000Z\",\"updated_at\":\"2025-02-27T03:08:52.000000Z\"}','App\\Models\\CustomerGroup',7,'created','App\\Models\\User',14,'{\"attributes\": {\"id\": 7, \"name\": \"Pendekar Group\", \"is_active\": \"0\", \"outlet_id\": null, \"created_at\": \"2025-04-02T06:28:33.000000Z\", \"percentage\": 100, \"updated_at\": \"2025-04-02T06:28:33.000000Z\"}}',NULL,'2025-04-02 06:28:33','2025-04-02 06:28:33'),(143,'CustomerGroup','{\"id\":14,\"outlet_id\":1,\"name\":\"Admin Koyasai\",\"email\":\"adminkoyasai@gmail.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-25T16:04:33.000000Z\",\"created_at\":\"2025-02-25T16:04:33.000000Z\",\"updated_at\":\"2025-02-27T03:08:52.000000Z\"}','App\\Models\\CustomerGroup',8,'created','App\\Models\\User',14,'{\"attributes\": {\"id\": 8, \"name\": \"PT Sinar Rasa Abadi\", \"is_active\": \"0\", \"outlet_id\": null, \"created_at\": \"2025-04-02T06:30:15.000000Z\", \"percentage\": 100, \"updated_at\": \"2025-04-02T06:30:15.000000Z\"}}',NULL,'2025-04-02 06:30:15','2025-04-02 06:30:15'),(144,'Customer','{\"id\":14,\"outlet_id\":1,\"name\":\"Admin Koyasai\",\"email\":\"adminkoyasai@gmail.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-25T16:04:33.000000Z\",\"created_at\":\"2025-02-25T16:04:33.000000Z\",\"updated_at\":\"2025-02-27T03:08:52.000000Z\"}','App\\Models\\Customer',13,'created','App\\Models\\User',14,'{\"attributes\": {\"id\": 13, \"tax\": null, \"city\": \"Tangerang\", \"name\": \"Pendekar Alam Sutera\", \"email\": \"abcd@asdasda.com\", \"phone\": \"1231231231\", \"state\": \"Banten\", \"address\": \"Jl asdasjdajksdhajshkahskjhdakjsd\", \"country\": \"Indonesia\", \"user_id\": 21, \"is_active\": \"0\", \"created_at\": \"2025-04-02T06:35:58.000000Z\", \"updated_at\": \"2025-04-02T06:35:58.000000Z\", \"postal_code\": \"15810\", \"company_name\": \"PT Boga Pendekar\", \"customer_group_id\": 7}}',NULL,'2025-04-02 06:35:58','2025-04-02 06:35:58'),(145,'CustomerGroup','{\"id\":14,\"outlet_id\":1,\"name\":\"Admin Koyasai\",\"email\":\"adminkoyasai@gmail.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-25T16:04:33.000000Z\",\"created_at\":\"2025-02-25T16:04:33.000000Z\",\"updated_at\":\"2025-02-27T03:08:52.000000Z\"}','App\\Models\\CustomerGroup',7,'deleted','App\\Models\\User',14,'{\"old\": {\"id\": 7, \"name\": \"Pendekar Group\", \"is_active\": \"0\", \"outlet_id\": null, \"created_at\": \"2025-04-02T06:28:33.000000Z\", \"percentage\": 100, \"updated_at\": \"2025-04-02T06:28:33.000000Z\"}}',NULL,'2025-04-02 06:57:44','2025-04-02 06:57:44'),(146,'CustomerGroup','{\"id\":14,\"outlet_id\":1,\"name\":\"Admin Koyasai\",\"email\":\"adminkoyasai@gmail.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-25T16:04:33.000000Z\",\"created_at\":\"2025-02-25T16:04:33.000000Z\",\"updated_at\":\"2025-02-27T03:08:52.000000Z\"}','App\\Models\\CustomerGroup',8,'deleted','App\\Models\\User',14,'{\"old\": {\"id\": 8, \"name\": \"PT Sinar Rasa Abadi\", \"is_active\": \"0\", \"outlet_id\": null, \"created_at\": \"2025-04-02T06:30:15.000000Z\", \"percentage\": 100, \"updated_at\": \"2025-04-02T06:30:15.000000Z\"}}',NULL,'2025-04-02 06:57:47','2025-04-02 06:57:47'),(147,'CustomerGroup','{\"id\":14,\"outlet_id\":1,\"name\":\"Admin Koyasai\",\"email\":\"adminkoyasai@gmail.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-25T16:04:33.000000Z\",\"created_at\":\"2025-02-25T16:04:33.000000Z\",\"updated_at\":\"2025-02-27T03:08:52.000000Z\"}','App\\Models\\CustomerGroup',9,'created','App\\Models\\User',14,'{\"attributes\": {\"id\": 9, \"name\": \"Pendekar Group\", \"is_active\": \"0\", \"outlet_id\": null, \"created_at\": \"2025-04-02T07:01:09.000000Z\", \"percentage\": 100, \"updated_at\": \"2025-04-02T07:01:09.000000Z\"}}',NULL,'2025-04-02 07:01:09','2025-04-02 07:01:09'),(148,'Customer','{\"id\":14,\"outlet_id\":1,\"name\":\"Admin Koyasai\",\"email\":\"adminkoyasai@gmail.com\",\"phone\":null,\"post_code\":null,\"city\":null,\"country\":null,\"email_verified_at\":\"2025-02-25T16:04:33.000000Z\",\"created_at\":\"2025-02-25T16:04:33.000000Z\",\"updated_at\":\"2025-02-27T03:08:52.000000Z\"}','App\\Models\\Customer',14,'created','App\\Models\\User',14,'{\"attributes\": {\"id\": 14, \"tax\": null, \"city\": \"Tangerang\", \"name\": \"Diana\", \"email\": \"sasdasdas@gmail.com\", \"phone\": \"1231231231\", \"state\": \"Banten\", \"address\": \"asdasdasda\", \"country\": \"Indonesia\", \"user_id\": 22, \"is_active\": \"0\", \"created_at\": \"2025-04-02T07:04:40.000000Z\", \"updated_at\": \"2025-04-02T07:04:40.000000Z\", \"postal_code\": \"15810\", \"company_name\": \"PT Boga Pendekar\", \"customer_group_id\": 9}}',NULL,'2025-04-02 07:04:40','2025-04-02 07:04:40');
/*!40000 ALTER TABLE `activity_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `batches`
--

DROP TABLE IF EXISTS `batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `batches` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `batch_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int NOT NULL,
  `price` int NOT NULL,
  `expired_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `batches`
--

LOCK TABLES `batches` WRITE;
/*!40000 ALTER TABLE `batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brand` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `outlet_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = tidak aktif 1 = aktif',
  PRIMARY KEY (`id`),
  KEY `brand_outlet_id_foreign` (`outlet_id`),
  CONSTRAINT `brand_outlet_id_foreign` FOREIGN KEY (`outlet_id`) REFERENCES `outlets` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brand`
--

LOCK TABLES `brand` WRITE;
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` VALUES (1,'2025-02-25 09:21:24','2025-02-26 04:27:45',NULL,'Brand Sayuran Sejahtara','1740475284_cc01493c-6a04-4bea-b33d-3be0086c9f09_169.jpeg','0'),(4,'2025-02-28 07:46:46','2025-02-28 07:47:18',NULL,'Syahdan Luxury','1740728806_logo-mark.jpeg','0'),(5,'2025-03-01 05:50:38','2025-04-02 07:06:48',1,'KOYASAI GADING SERPONG','1740808238_LOGO KOYASAI_PUTIH (1).png','0');
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `outlet_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_outlet_id_foreign` (`outlet_id`),
  CONSTRAINT `category_outlet_id_foreign` FOREIGN KEY (`outlet_id`) REFERENCES `outlets` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,NULL,'category 1','1739945935_ab67616d0000b2736638765f1619d5a148ccb12e.jpeg','category-1','category 1','2025-02-19 06:18:55','2025-02-19 06:18:55'),(2,NULL,'Sayuran','1740475090_cc01493c-6a04-4bea-b33d-3be0086c9f09_169.jpeg','sayuran','Sayuran','2025-02-25 09:18:10','2025-02-25 09:18:10'),(3,NULL,'Sayuran Remina Amino','1740475215_cc01493c-6a04-4bea-b33d-3be0086c9f09_169.jpeg','sayuran-remina-amino','Sayuran remina','2025-02-25 09:20:15','2025-02-25 09:20:15'),(4,NULL,'Organic','1740497952_sayur.jpg','organic','Organic','2025-02-25 15:39:12','2025-02-25 15:39:47'),(5,NULL,'Sayuran Halal','1740534956_cc01493c-6a04-4bea-b33d-3be0086c9f09_169.jpeg','sayuran-halal','Testing.','2025-02-26 01:55:56','2025-02-26 02:27:00'),(13,NULL,'Sayuran Bayam','1740542166_cc01493c-6a04-4bea-b33d-3be0086c9f09_169.jpeg','sayuran-bayam','aLAMAT','2025-02-26 03:56:06','2025-02-26 03:56:06'),(15,NULL,'sAYURAN wORTEL','1740543359_cc01493c-6a04-4bea-b33d-3be0086c9f09_169.jpeg','sayuran-wortel','DESKRIPSI','2025-02-26 04:15:59','2025-02-26 04:15:59'),(16,9,'Maman racing','1740726527_js.png','maman-racing','ttessss','2025-02-28 07:08:47','2025-02-28 07:57:30'),(19,1,'ktegori','1740733706_111121.png','ktegori','contoh','2025-02-28 09:08:26','2025-02-28 09:08:26');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupon`
--

DROP TABLE IF EXISTS `coupon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coupon` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `outlet_id` bigint unsigned DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('fixed','percentage') COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int NOT NULL,
  `min_amount` int NOT NULL,
  `qty` int NOT NULL,
  `used` int NOT NULL,
  `exp_date` date NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = tidak aktif 1 = aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `coupon_outlet_id_foreign` (`outlet_id`),
  KEY `coupon_user_id_foreign` (`user_id`),
  CONSTRAINT `coupon_outlet_id_foreign` FOREIGN KEY (`outlet_id`) REFERENCES `outlets` (`id`) ON DELETE SET NULL,
  CONSTRAINT `coupon_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupon`
--

LOCK TABLES `coupon` WRITE;
/*!40000 ALTER TABLE `coupon` DISABLE KEYS */;
INSERT INTO `coupon` VALUES (1,1,'FEB2025','fixed',3000,100000,2,0,'2025-03-10',4,'1','2025-02-25 15:42:27','2025-02-25 15:42:27'),(3,1,'SYAHDANKASEPPISAN','percentage',99,0,1000,2,'2029-12-31',4,'1','2025-02-26 04:20:50','2025-02-28 09:13:09'),(5,1,'TESPOS','percentage',70,50,1,3,'2025-03-01',4,'1','2025-02-28 07:13:19','2025-02-28 09:50:09');
/*!40000 ALTER TABLE `coupon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curencys`
--

DROP TABLE IF EXISTS `curencys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `curencys` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `outlet_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curencys`
--

LOCK TABLES `curencys` WRITE;
/*!40000 ALTER TABLE `curencys` DISABLE KEYS */;
INSERT INTO `curencys` VALUES (2,1,'2025-02-25 09:40:29','2025-02-25 09:42:29','Rupiah','Rp','Rp.',1);
/*!40000 ALTER TABLE `curencys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `customer_group_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = tidak aktif 1 = aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_customer_group_id_foreign` (`customer_group_id`),
  KEY `customer_user_id_foreign` (`user_id`),
  CONSTRAINT `customer_customer_group_id_foreign` FOREIGN KEY (`customer_group_id`) REFERENCES `customer_group` (`id`) ON DELETE CASCADE,
  CONSTRAINT `customer_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (14,9,22,'PT Boga Pendekar','Diana','sasdasdas@gmail.com','1231231231',NULL,'asdasdasda','Tangerang','Banten','Indonesia','15810','0','2025-04-02 07:04:40','2025-04-02 07:04:40');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_group`
--

DROP TABLE IF EXISTS `customer_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer_group` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `outlet_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` int NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = tidak aktif 1 = aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_group_outlet_id_foreign` (`outlet_id`),
  CONSTRAINT `customer_group_outlet_id_foreign` FOREIGN KEY (`outlet_id`) REFERENCES `outlets` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_group`
--

LOCK TABLES `customer_group` WRITE;
/*!40000 ALTER TABLE `customer_group` DISABLE KEYS */;
INSERT INTO `customer_group` VALUES (9,NULL,'Pendekar Group',100,'0','2025-04-02 07:01:09','2025-04-02 07:01:09');
/*!40000 ALTER TABLE `customer_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice_purchases`
--

DROP TABLE IF EXISTS `invoice_purchases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoice_purchases` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `invoice_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `outlet_id` bigint unsigned NOT NULL,
  `purchase_id` bigint unsigned NOT NULL,
  `supplier_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `total_qty` int NOT NULL,
  `total_cost` decimal(15,2) NOT NULL,
  `total_discount` decimal(15,2) DEFAULT NULL,
  `grand_total` decimal(15,2) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `invoice_purchases_outlet_id_foreign` (`outlet_id`),
  KEY `invoice_purchases_purchase_id_foreign` (`purchase_id`),
  KEY `invoice_purchases_supplier_id_foreign` (`supplier_id`),
  KEY `invoice_purchases_user_id_foreign` (`user_id`),
  CONSTRAINT `invoice_purchases_outlet_id_foreign` FOREIGN KEY (`outlet_id`) REFERENCES `outlets` (`id`),
  CONSTRAINT `invoice_purchases_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchase` (`id`),
  CONSTRAINT `invoice_purchases_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`),
  CONSTRAINT `invoice_purchases_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice_purchases`
--

LOCK TABLES `invoice_purchases` WRITE;
/*!40000 ALTER TABLE `invoice_purchases` DISABLE KEYS */;
INSERT INTO `invoice_purchases` VALUES (1,'2025-02-26 04:51:41','2025-02-26 04:51:41','INV-PO/20250226/5150',1,2,2,4,0,0.00,NULL,0.00,'-'),(2,'2025-03-03 08:12:59','2025-03-03 08:12:59','INV-PO/20250303/1816',1,5,10,14,2,126000.00,NULL,126000.00,'-');
/*!40000 ALTER TABLE `invoice_purchases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoices` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reference_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_order_id` bigint unsigned NOT NULL,
  `outlet_id` bigint unsigned NOT NULL,
  `surat_jalan_id` bigint unsigned NOT NULL,
  `total_qty` int NOT NULL,
  `paid_amount` decimal(20,3) NOT NULL,
  `total_discount` decimal(20,3) NOT NULL,
  `coupon_id` bigint unsigned DEFAULT NULL,
  `coupon_type` enum('fixed','percentage') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_amount` decimal(20,3) DEFAULT NULL,
  `grandtotal` decimal(15,2) NOT NULL,
  `discount` decimal(15,2) DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `invoices_reference_number_unique` (`reference_number`),
  KEY `invoices_sales_order_id_foreign` (`sales_order_id`),
  KEY `invoices_outlet_id_foreign` (`outlet_id`),
  KEY `invoices_surat_jalan_id_foreign` (`surat_jalan_id`),
  CONSTRAINT `invoices_outlet_id_foreign` FOREIGN KEY (`outlet_id`) REFERENCES `outlets` (`id`),
  CONSTRAINT `invoices_sales_order_id_foreign` FOREIGN KEY (`sales_order_id`) REFERENCES `sales_orders` (`id`),
  CONSTRAINT `invoices_surat_jalan_id_foreign` FOREIGN KEY (`surat_jalan_id`) REFERENCES `surat_jalans` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoices`
--

LOCK TABLES `invoices` WRITE;
/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;
INSERT INTO `invoices` VALUES (1,'2025-02-25 11:38:38','2025-02-25 11:38:38','INV/20250225/1',1,1,1,2,0.000,0.000,NULL,NULL,NULL,92000.00,NULL,'kterangan'),(2,'2025-02-26 03:14:45','2025-02-26 03:14:45','INV/20250226/3',3,1,3,2,0.000,0.000,NULL,NULL,NULL,15000.00,NULL,NULL),(3,'2025-02-28 09:46:41','2025-02-28 09:46:41','INV/20250228/20',20,1,7,12,0.000,0.000,NULL,NULL,NULL,201000.00,NULL,'22223'),(4,'2025-02-28 09:53:31','2025-02-28 09:53:31','INV/20250228/21',21,1,8,9,0.000,0.000,NULL,NULL,NULL,651000.00,NULL,NULL),(5,'2025-03-01 08:43:47','2025-03-01 08:43:47','INV/20250301/36',36,1,10,3,0.000,0.000,NULL,NULL,0.000,112871.00,NULL,NULL),(6,'2025-03-03 08:01:41','2025-03-03 08:01:41','INV/20250303/37',37,1,11,1,100.000,0.000,NULL,NULL,0.000,44900.00,NULL,'111'),(7,'2025-03-14 13:15:36','2025-03-14 13:15:36','INV/20250314/38',38,1,12,3,0.000,0.000,NULL,NULL,0.000,168000.00,NULL,NULL);
/*!40000 ALTER TABLE `invoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_products`
--

DROP TABLE IF EXISTS `log_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `log_products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` bigint unsigned NOT NULL,
  `stock` decimal(20,2) NOT NULL,
  `stock_in` decimal(20,2) NOT NULL,
  `stock_out` decimal(20,2) NOT NULL,
  `stock_adjustment` decimal(20,2) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `log_products_product_id_foreign` (`product_id`),
  CONSTRAINT `log_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_products`
--

LOCK TABLES `log_products` WRITE;
/*!40000 ALTER TABLE `log_products` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `media` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint unsigned NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `generated_conversions` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `media_uuid_unique` (`uuid`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  KEY `media_order_column_index` (`order_column`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
INSERT INTO `media` VALUES (4,'App\\Models\\GeneralSetting',1,'9298d324-2e9d-43b2-8ba5-40ef175bf178','logo','safeimagekit-LOGO_KOYASAI_PUTIH__1_-removebg-preview','safeimagekit-LOGO_KOYASAI_PUTIH__1_-removebg-preview.png','image/png','public','public',1035,'[]','[]','[]','[]',1,'2025-03-01 06:32:01','2025-03-01 06:32:01'),(5,'App\\Models\\GeneralSetting',3,'b084d156-f2d4-4115-9d3f-cea514f485b7','dark_logo','safeimagekit-LOGO_KOYASAI_PUTIH__1_-removebg-preview','safeimagekit-LOGO_KOYASAI_PUTIH__1_-removebg-preview.png','image/png','public','public',1035,'[]','[]','[]','[]',1,'2025-03-01 06:32:01','2025-03-01 06:32:01'),(6,'App\\Models\\GeneralSetting',2,'917efddc-22b0-4b5d-98bc-675761b33347','favicon','safeimagekit-LOGO_KOYASAI_PUTIH__1_-removebg-preview','safeimagekit-LOGO_KOYASAI_PUTIH__1_-removebg-preview.png','image/png','public','public',1035,'[]','[]','[]','[]',1,'2025-03-01 06:32:44','2025-03-01 06:32:44'),(7,'App\\Models\\GeneralSetting',5,'8927b1a3-5845-4048-8a18-894dcf619d0a','guest_background','guest-background','guest-background.svg','image/svg+xml','public','public',50937,'[]','[]','[]','[]',1,'2025-03-01 06:35:33','2025-03-01 06:35:33');
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2024_12_02_071642_create_activity_log_table',1),(2,'2024_12_02_071642_create_batches_table',1),(3,'2024_12_02_071642_create_brand_table',1),(4,'2024_12_02_071642_create_category_table',1),(5,'2024_12_02_071642_create_coupon_table',1),(6,'2024_12_02_071642_create_curencys_table',1),(7,'2024_12_02_071642_create_customer_group_table',1),(8,'2024_12_02_071642_create_customer_table',1),(9,'2024_12_02_071642_create_failed_jobs_table',1),(10,'2024_12_02_071642_create_invoice_purchases_table',1),(11,'2024_12_02_071642_create_invoices_table',1),(12,'2024_12_02_071642_create_jobs_table',1),(13,'2024_12_02_071642_create_log_products_table',1),(14,'2024_12_02_071642_create_media_table',1),(15,'2024_12_02_071642_create_model_has_permissions_table',1),(16,'2024_12_02_071642_create_model_has_roles_table',1),(17,'2024_12_02_071642_create_outlets_table',1),(18,'2024_12_02_071642_create_password_resets_table',1),(19,'2024_12_02_071642_create_pending_user_emails_table',1),(20,'2024_12_02_071642_create_permissions_table',1),(21,'2024_12_02_071642_create_personal_access_tokens_table',1),(22,'2024_12_02_071642_create_product_invoice_purchases_table',1),(23,'2024_12_02_071642_create_product_invoices_table',1),(24,'2024_12_02_071642_create_product_price_by_customers_table',1),(25,'2024_12_02_071642_create_product_purchase_table',1),(26,'2024_12_02_071642_create_product_return_purchases_table',1),(27,'2024_12_02_071642_create_product_return_sales_order_table',1),(28,'2024_12_02_071642_create_product_sales_orders_table',1),(29,'2024_12_02_071642_create_product_surat_jalans_table',1),(30,'2024_12_02_071642_create_product_table',1),(31,'2024_12_02_071642_create_purchase_table',1),(32,'2024_12_02_071642_create_return_purchases_table',1),(33,'2024_12_02_071642_create_return_sales_order_table',1),(34,'2024_12_02_071642_create_role_has_permissions_table',1),(35,'2024_12_02_071642_create_roles_table',1),(36,'2024_12_02_071642_create_sales_orders_table',1),(37,'2024_12_02_071642_create_settings_table',1),(38,'2024_12_02_071642_create_stock_op_names_table',1),(39,'2024_12_02_071642_create_supplier_table',1),(40,'2024_12_02_071642_create_surat_jalans_table',1),(41,'2024_12_02_071642_create_tax_table',1),(42,'2024_12_02_071642_create_taxes_table',1),(43,'2024_12_02_071642_create_unit_table',1),(44,'2024_12_02_071642_create_units_table',1),(45,'2024_12_02_071642_create_users_table',1),(46,'2024_12_02_071642_create_variants_table',1),(47,'2024_12_02_071645_add_foreign_keys_to_brand_table',1),(48,'2024_12_02_071645_add_foreign_keys_to_category_table',1),(49,'2024_12_02_071645_add_foreign_keys_to_coupon_table',1),(50,'2024_12_02_071645_add_foreign_keys_to_customer_group_table',1),(51,'2024_12_02_071645_add_foreign_keys_to_customer_table',1),(52,'2024_12_02_071645_add_foreign_keys_to_invoice_purchases_table',1),(53,'2024_12_02_071645_add_foreign_keys_to_invoices_table',1),(54,'2024_12_02_071645_add_foreign_keys_to_log_products_table',1),(55,'2024_12_02_071645_add_foreign_keys_to_model_has_permissions_table',1),(56,'2024_12_02_071645_add_foreign_keys_to_model_has_roles_table',1),(57,'2024_12_02_071645_add_foreign_keys_to_product_invoice_purchases_table',1),(58,'2024_12_02_071645_add_foreign_keys_to_product_invoices_table',1),(59,'2024_12_02_071645_add_foreign_keys_to_product_price_by_customers_table',1),(60,'2024_12_02_071645_add_foreign_keys_to_product_purchase_table',1),(61,'2024_12_02_071645_add_foreign_keys_to_product_return_purchases_table',1),(62,'2024_12_02_071645_add_foreign_keys_to_product_return_sales_order_table',1),(63,'2024_12_02_071645_add_foreign_keys_to_product_sales_orders_table',1),(64,'2024_12_02_071645_add_foreign_keys_to_product_surat_jalans_table',1),(65,'2024_12_02_071645_add_foreign_keys_to_product_table',1),(66,'2024_12_02_071645_add_foreign_keys_to_purchase_table',1),(67,'2024_12_02_071645_add_foreign_keys_to_return_purchases_table',1),(68,'2024_12_02_071645_add_foreign_keys_to_return_sales_order_table',1),(69,'2024_12_02_071645_add_foreign_keys_to_role_has_permissions_table',1),(70,'2024_12_02_071645_add_foreign_keys_to_stock_op_names_table',1),(71,'2024_12_02_071645_add_foreign_keys_to_supplier_table',1),(72,'2024_12_02_071645_add_foreign_keys_to_surat_jalans_table',1),(73,'2024_12_02_071645_add_foreign_keys_to_tax_table',1),(74,'2024_12_02_071645_add_foreign_keys_to_taxes_table',1),(75,'2024_12_02_071645_add_foreign_keys_to_unit_table',1),(76,'2024_12_02_071645_add_foreign_keys_to_units_table',1),(77,'2024_12_02_071645_add_foreign_keys_to_users_table',1),(78,'2024_12_02_071645_add_foreign_keys_to_variants_table',1),(79,'2022_12_12_105531_create_general_settings',2),(80,'2025_02_28_024204_add_column_in_surat_jalan',3),(81,'2025_03_01_060214_add_type_and_amount_in_sales_order',4),(82,'2025_02_28_084551_add_column_in_invoices_table',5),(83,'2025_03_01_084857_add_peyment_type_sales_order',6),(84,'2025_03_01_084941_add_peyment_type_in_purchase',7);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (8,'App\\Models\\User',4),(8,'App\\Models\\User',5),(10,'App\\Models\\User',6),(10,'App\\Models\\User',7),(10,'App\\Models\\User',8),(11,'App\\Models\\User',11),(11,'App\\Models\\User',12),(11,'App\\Models\\User',13),(9,'App\\Models\\User',14),(11,'App\\Models\\User',15),(11,'App\\Models\\User',16),(11,'App\\Models\\User',18),(11,'App\\Models\\User',19),(11,'App\\Models\\User',20),(11,'App\\Models\\User',21),(11,'App\\Models\\User',22);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `outlets`
--

DROP TABLE IF EXISTS `outlets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `outlets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `outlets`
--

LOCK TABLES `outlets` WRITE;
/*!40000 ALTER TABLE `outlets` DISABLE KEYS */;
INSERT INTO `outlets` VALUES (1,'b7476a4a-6ce2-4420-b8cb-d7286245c8f8','2025-02-17 13:19:49','2025-03-01 08:48:18','PT. Agrotani Koyasai Indonesia','1740818898.png','Jl. Pelepah Raya, Gading Serpong, Kelapa Dua Kec. Klp Dua, Tangerang Banten 15810','093123123',NULL,NULL),(8,'159c1392-a35c-4047-878f-8b07107a5034','2025-02-28 07:15:29','2025-02-28 07:15:29','astacode','1740726929.jpeg','jl.mega asri','01234',NULL,NULL),(9,'00e6c96a-98e7-46ee-9caa-7506dcca6483','2025-02-28 07:53:59','2025-02-28 07:53:59','12121','1740729239.png','12121','121212212',NULL,NULL);
/*!40000 ALTER TABLE `outlets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pending_user_emails`
--

DROP TABLE IF EXISTS `pending_user_emails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pending_user_emails` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pending_user_emails_user_type_user_id_index` (`user_type`,`user_id`),
  KEY `pending_user_emails_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pending_user_emails`
--

LOCK TABLES `pending_user_emails` WRITE;
/*!40000 ALTER TABLE `pending_user_emails` DISABLE KEYS */;
/*!40000 ALTER TABLE `pending_user_emails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'user create','user','web','2024-10-15 05:56:49','2024-10-15 05:56:49'),(2,'user update','user','web','2024-10-15 05:56:49','2024-10-15 05:56:49'),(3,'user delete','user','web','2024-10-15 05:56:49','2024-10-15 05:56:49'),(4,'user show','user','web','2024-10-15 05:56:49','2024-10-15 05:56:49'),(5,'user index','user','web','2024-10-15 05:56:49','2024-10-15 05:56:49'),(6,'permission index','permission','web','2024-10-15 05:56:49','2024-10-15 05:56:49'),(7,'permission create','permission','web','2024-10-15 05:56:49','2024-10-15 05:56:49'),(8,'permission update','permission','web','2024-10-15 05:56:49','2024-10-15 05:56:49'),(9,'permission delete','permission','web','2024-10-15 05:56:49','2024-10-15 05:56:49'),(10,'permission show','permission','web','2024-10-15 05:56:49','2024-10-15 05:56:49'),(11,'role index','role','web','2024-10-15 05:56:49','2024-10-15 05:56:49'),(12,'role create','role','web','2024-10-15 05:56:49','2024-10-15 05:56:49'),(13,'role update','role','web','2024-10-15 05:56:49','2024-10-15 05:56:49'),(14,'role delete','role','web','2024-10-15 05:56:49','2024-10-15 05:56:49'),(15,'role show','role','web','2024-10-15 05:56:49','2024-10-15 05:56:49'),(16,'database_backup viewAny','database_backup','web','2024-10-15 05:56:49','2024-10-15 05:56:49'),(17,'database_backup create','database_backup','web','2024-10-15 05:56:49','2024-10-15 05:56:49'),(18,'database_backup delete','database_backup','web','2024-10-15 05:56:49','2024-10-15 05:56:49'),(19,'database_backup download','database_backup','web','2024-10-15 05:56:49','2024-10-15 05:56:49'),(20,'menu users_list','menu','web','2024-10-15 05:56:49','2024-10-15 05:56:49'),(21,'menu role_permission','menu','web','2024-10-15 05:56:49','2024-10-15 05:56:49'),(22,'menu role_permission_permissions','menu','web','2024-10-15 05:56:49','2024-10-15 05:56:49'),(23,'menu role_permission_roles','menu','web','2024-10-15 05:56:49','2024-10-15 05:56:49'),(24,'menu database_backup','menu','web','2024-10-15 05:56:49','2024-10-15 05:56:49'),(25,'outlet create','outlet','web','2024-10-15 07:16:15','2024-10-15 07:16:15'),(26,'outlet update','outlet','web','2024-10-15 19:26:55','2024-10-15 19:26:55'),(27,'outlet delete','outlet','web','2024-10-15 19:27:10','2024-10-15 19:27:10'),(29,'product create','product','web','2024-10-23 07:37:26','2024-10-23 07:37:26'),(30,'product index','product','web','2024-10-23 07:37:38','2024-10-23 07:37:38'),(31,'product update','product','web','2024-10-24 03:12:49','2024-10-24 03:12:49'),(32,'product delete','product','web','2024-10-24 03:12:58','2024-10-24 03:12:58'),(33,'product isdif','product','web','2024-10-24 03:13:07','2024-10-24 03:13:07'),(34,'product_customer_price index','product_customer_price','web','2024-10-24 09:03:46','2024-10-24 09:03:46'),(35,'product_customer_price create','product_customer_price','web','2024-10-24 09:04:02','2024-10-24 09:04:02'),(36,'product_customer_price update','product_customer_price','web','2024-10-24 09:04:15','2024-10-24 09:04:15'),(37,'product_customer_price delete','product_customer_price','web','2024-10-24 09:04:26','2024-10-24 09:04:26'),(38,'purchase view','purchase','web','2024-10-25 03:37:51','2024-11-30 19:05:33'),(39,'purchase create','purchase','web','2024-10-25 03:37:58','2024-10-25 03:37:58'),(40,'purchase edit','purchase','web','2024-10-25 03:38:04','2024-10-25 03:38:04'),(41,'purchase delete','purchase','web','2024-10-25 03:38:14','2024-10-25 03:38:14'),(42,'category update','category','web','2024-11-09 06:54:59','2024-11-09 06:54:59'),(43,'category delete','category','web','2024-11-09 06:55:09','2024-11-09 06:55:09'),(44,'coupon index','coupon','web','2024-11-09 08:36:23','2024-11-09 08:36:23'),(45,'coupon create','coupon','web','2024-11-09 08:36:31','2024-11-09 08:36:31'),(46,'coupon update','coupon','web','2024-11-09 08:36:40','2024-11-09 08:36:40'),(47,'coupon delete','coupon','web','2024-11-09 08:36:54','2024-11-09 08:36:54'),(48,'category create','category','web','2024-11-09 09:22:09','2024-11-09 09:22:09'),(49,'suratjalan index','suratjalan','web','2024-11-09 10:19:48','2024-11-09 10:19:48'),(50,'suratjalan create','suratjalan','web','2024-11-09 10:19:57','2024-11-09 10:19:57'),(51,'suratjalan edit','suratjalan','web','2024-11-09 10:20:10','2024-11-09 10:20:10'),(52,'suratjalan delete','suratjalan','web','2024-11-09 10:20:18','2024-11-09 10:20:18'),(53,'suratjalan view','suratjalan','web','2024-11-12 05:45:54','2024-11-12 05:45:54'),(54,'suratjalan show','suratjalan','web','2024-11-12 05:46:13','2024-11-12 05:46:13'),(55,'unit index','unit','web','2024-11-14 09:49:23','2024-11-14 09:49:23'),(56,'unit create','unit','web','2024-11-14 09:49:32','2024-11-14 09:49:32'),(57,'unit edit','unit','web','2024-11-14 09:49:39','2024-11-14 09:49:39'),(58,'unit delete','unit','web','2024-11-14 09:49:46','2024-11-14 09:49:46'),(59,'tax index','tax','web','2024-11-16 04:29:43','2024-11-16 04:29:43'),(60,'tax create','tax','web','2024-11-16 04:29:52','2024-11-16 04:29:52'),(61,'tax edit','tax','web','2024-11-16 04:29:58','2024-11-16 04:29:58'),(62,'tax delete','tax','web','2024-11-16 04:30:07','2024-11-16 04:30:07'),(63,'salesorder index','salesorder','web','2024-11-16 07:42:31','2024-11-16 07:42:31'),(64,'salesorder create','salesorder','web','2024-11-16 07:42:40','2024-11-16 07:42:40'),(65,'salesorder edit','salesorder','web','2024-11-16 07:42:47','2024-11-16 07:42:47'),(66,'salesorder delete','salesorder','web','2024-11-16 07:42:55','2024-11-16 07:42:55'),(67,'invoice view','invoice','web','2024-11-22 13:14:25','2024-11-22 16:46:32'),(68,'invoice create','invoice','web','2024-11-22 13:14:34','2024-11-22 13:14:34'),(69,'invoice edit','invoice','web','2024-11-22 13:14:42','2024-11-22 13:14:42'),(70,'invoice delete','invoice','web','2024-11-22 13:14:51','2024-11-22 13:14:51'),(71,'returnsalesorder create','returnsalesorder','web','2024-11-22 19:10:55','2024-11-22 19:10:55'),(72,'returnsalesorder view','returnsalesorder','web','2024-11-22 19:11:01','2024-11-22 19:11:01'),(73,'returnsalesorder edit','returnsalesorder','web','2024-11-22 19:11:36','2024-11-22 19:11:36'),(74,'returnsalesorder delete','returnsalesorder','web','2024-11-22 19:11:44','2024-11-22 19:11:44'),(75,'listorder view','listorder','web','2024-11-23 01:53:32','2024-11-23 01:53:32'),(76,'listorder show','listorder','web','2024-11-23 01:53:59','2024-11-23 01:53:59'),(77,'salesorder export','salesorder','web','2024-11-23 08:11:32','2024-11-23 08:11:32'),(78,'suratjalan export','suratjalan','web','2024-11-23 08:11:43','2024-11-23 08:11:43'),(79,'invoice export','invoice','web','2024-11-23 08:11:53','2024-11-23 08:11:53'),(80,'returnsalesorder export','returnsalesorder','web','2024-11-23 16:12:39','2024-11-23 16:12:39'),(81,'listorder export','listorder','web','2024-11-23 16:30:02','2024-11-23 16:30:02'),(82,'stockopname create','stockopname','web','2024-11-25 05:04:43','2024-11-25 05:04:43'),(83,'stockopname edit','stockopname','web','2024-11-25 05:04:51','2024-11-25 05:04:51'),(84,'stockopname show','stockopname','web','2024-11-25 05:04:59','2024-11-25 05:04:59'),(85,'stockopname delete','stockopname','web','2024-11-25 05:05:06','2024-11-25 05:05:06'),(86,'stockopname export','stockopname','web','2024-11-25 05:05:19','2024-11-25 05:05:19'),(87,'stockopname view','stockopname','web','2024-11-25 05:57:26','2024-11-25 05:57:26'),(88,'curency view','curency','web','2024-11-28 03:59:05','2024-11-28 03:59:05'),(89,'curency create','curency','web','2024-11-28 03:59:14','2024-11-28 03:59:14'),(90,'curency edit','curency','web','2024-11-28 03:59:20','2024-11-28 03:59:20'),(91,'curency delete','curency','web','2024-11-28 03:59:24','2024-11-28 03:59:24'),(92,'returnpurchase view','returnpurchase','web','2024-11-30 18:51:10','2024-11-30 18:51:10'),(93,'returnpurchase edit','returnpurchase','web','2024-11-30 18:51:20','2024-11-30 18:51:20'),(94,'returnpurchase create','returnpurchase','web','2024-11-30 18:51:27','2024-11-30 18:51:27'),(95,'returnpurchase delete','returnpurchase','web','2024-11-30 18:51:33','2024-11-30 18:51:33'),(96,'returnpurchase export','returnpurchase','web','2024-11-30 18:51:40','2024-11-30 18:51:40');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `outlet_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost_price` int NOT NULL,
  `selling_price` int NOT NULL,
  `qty` int NOT NULL,
  `alert_qty` int NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `is_variant` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 = tidak varian 1 = varian',
  `is_batch` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 = tidak batch 1 = batch',
  `is_difprice` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 = tidak difprice 1 = difprice',
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 = tidak aktif 1 = aktif',
  `category_id` bigint unsigned NOT NULL,
  `brand_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `unit_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_outlet_id_foreign` (`outlet_id`),
  KEY `product_category_id_foreign` (`category_id`),
  KEY `product_brand_id_foreign` (`brand_id`),
  KEY `product_unit_id_foreign` (`unit_id`),
  CONSTRAINT `product_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`),
  CONSTRAINT `product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `product_outlet_id_foreign` FOREIGN KEY (`outlet_id`) REFERENCES `outlets` (`id`) ON DELETE SET NULL,
  CONSTRAINT `product_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=356 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (13,1,'ACAR TIMUN GHERKIN PICKLE',NULL,NULL,63000,63000,94,10,'ACAR TIMUN GHERKIN PICKLE',NULL,'ACAR TIMUN GHERKIN PICKLE','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-03-03 07:58:30',1),(14,1,'ADAS/FENNEL',NULL,NULL,63000,0,85,10,'ADAS/FENNEL',NULL,'ADAS/FENNEL','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-28 09:34:02',1),(15,1,'AIR ABU 500 ML',NULL,NULL,63000,15000,82,10,'AIR ABU 500 ML',NULL,'AIR ABU 500 ML','0','0','0','1',2,1,'2025-02-25 11:16:06','2025-02-28 09:34:02',2),(16,1,'AKAR GOBO 1KG',NULL,NULL,63000,63000,69,10,'AKAR GOBO 1KG',NULL,'AKAR GOBO 1KG','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-03-14 13:14:16',1),(17,1,'AKAR TERATAI',NULL,NULL,63000,75000,68,10,'AKAR TERATAI',NULL,'AKAR TERATAI','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-03-01 08:41:48',1),(18,1,'Alpukat Mentega Besar',NULL,NULL,63000,45000,82,10,'Alpukat Mentega Besar',NULL,'Alpukat Mentega Besar','0','0','0','1',3,1,'2025-02-25 11:16:06','2025-03-14 13:14:16',1),(19,1,'ARAGULA 20 gr',NULL,NULL,63000,16500,100,10,'ARAGULA 20 gr',NULL,'ARAGULA 20 gr','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(20,1,'Arang Batok',NULL,NULL,63000,160000,100,10,'Arang Batok',NULL,'Arang Batok','0','0','0','1',2,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',6),(21,1,'ASAM JAWA',NULL,NULL,63000,24000,98,10,'ASAM JAWA',NULL,'ASAM JAWA','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-26 03:05:21',1),(22,1,'BAWANG BOMBAI',NULL,NULL,63000,31500,99,10,'BAWANG BOMBAI',NULL,'BAWANG BOMBAI','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-26 03:05:21',1),(23,1,'BAWANG BOMBAI MERAH',NULL,NULL,63000,60000,98,10,'BAWANG BOMBAI MERAH',NULL,'BAWANG BOMBAI MERAH','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-03-14 13:14:16',1),(24,1,'Bawang Merah Goreng',NULL,NULL,63000,93000,100,10,'Bawang Merah Goreng',NULL,'Bawang Merah Goreng','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(25,1,'BAWANG MERAH IRIS',NULL,NULL,63000,53000,100,10,'BAWANG MERAH IRIS',NULL,'BAWANG MERAH IRIS','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(26,1,'BAWANG MERAH KUPAS',NULL,NULL,63000,49000,100,10,'BAWANG MERAH KUPAS',NULL,'BAWANG MERAH KUPAS','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(27,1,'BAWANG MERAH UTUH',NULL,NULL,63000,40000,100,10,'BAWANG MERAH UTUH',NULL,'BAWANG MERAH UTUH','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(28,1,'BAWANG PUTIH BUBUK 130 GR',NULL,NULL,63000,27000,100,10,'BAWANG PUTIH BUBUK 130 GR',NULL,'BAWANG PUTIH BUBUK 130 GR','0','0','0','1',2,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',8),(29,1,'BAWANG PUTIH GORENG 500 GR',NULL,NULL,63000,65000,99,10,'BAWANG PUTIH GORENG 500 GR',NULL,'BAWANG PUTIH GORENG 500 GR','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-28 08:41:19',3),(30,1,'BAWANG PUTIH KUPAS',NULL,NULL,63000,53000,100,10,'BAWANG PUTIH KUPAS',NULL,'BAWANG PUTIH KUPAS','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(31,1,'BAWANG PUTIH UTUH',NULL,NULL,63000,46000,100,10,'BAWANG PUTIH UTUH',NULL,'BAWANG PUTIH UTUH','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(32,1,'BAYAM JEPANG',NULL,NULL,63000,65000,100,10,'BAYAM JEPANG',NULL,'BAYAM JEPANG','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(33,1,'BAYAM LOKAL',NULL,NULL,63000,14000,100,10,'BAYAM LOKAL',NULL,'BAYAM LOKAL','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(34,1,'Belimbing Sayur/Wuluh',NULL,NULL,63000,14000,100,10,'Belimbing Sayur/Wuluh',NULL,'Belimbing Sayur/Wuluh','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(35,1,'BENANG WOOL',NULL,NULL,63000,15000,100,10,'BENANG WOOL',NULL,'BENANG WOOL','0','0','0','1',2,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',4),(36,1,'BENGKUANG',NULL,NULL,63000,15000,100,10,'BENGKUANG',NULL,'BENGKUANG','0','0','0','1',3,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(37,1,'BERAS KETAN',NULL,NULL,63000,35000,100,10,'BERAS KETAN',NULL,'BERAS KETAN','0','0','0','1',2,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(38,1,'BIHUN KERING 500 GR',NULL,NULL,63000,11000,100,10,'BIHUN KERING 500 GR',NULL,'BIHUN KERING 500 GR','0','0','0','1',2,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',3),(39,1,'ACAR TIMUN GHERKIN PICKLE',NULL,NULL,63000,28623,100,10,'ACAR TIMUN GHERKIN PICKLE',NULL,'ACAR TIMUN GHERKIN PICKLE','0','0','0','1',2,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',3),(40,1,'ADAS/FENNEL',NULL,NULL,63000,27473,100,10,'ADAS/FENNEL',NULL,'ADAS/FENNEL','0','0','0','1',2,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',3),(41,1,'AIR ABU 500 ML',NULL,NULL,63000,26322,100,10,'AIR ABU 500 ML',NULL,'AIR ABU 500 ML','0','0','0','1',2,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',3),(42,1,'AKAR GOBO 1KG',NULL,NULL,63000,25172,100,10,'AKAR GOBO 1KG',NULL,'AKAR GOBO 1KG','0','0','0','1',2,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',3),(43,1,'AKAR TERATAI',NULL,NULL,63000,24021,100,10,'AKAR TERATAI',NULL,'AKAR TERATAI','0','0','0','1',2,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',3),(44,1,'Alpukat Mentega Besar',NULL,NULL,63000,22871,79,10,'Alpukat Mentega Besar',NULL,'Alpukat Mentega Besar','0','0','0','1',2,1,'2025-02-25 11:16:06','2025-03-01 08:42:19',3),(45,1,'ARAGULA 20 gr',NULL,NULL,63000,21721,100,10,'ARAGULA 20 gr',NULL,'ARAGULA 20 gr','0','0','0','1',2,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',3),(46,1,'Arang Batok',NULL,NULL,63000,20570,100,10,'Arang Batok',NULL,'Arang Batok','0','0','0','1',2,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',3),(47,1,'ASAM JAWA',NULL,NULL,63000,19420,100,10,'ASAM JAWA',NULL,'ASAM JAWA','0','0','0','1',2,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',3),(48,1,'BUAH ALPUKAT MENTEGA',NULL,NULL,63000,45000,90,10,'BUAH ALPUKAT MENTEGA',NULL,'BUAH ALPUKAT MENTEGA','0','0','0','1',3,1,'2025-02-25 11:16:06','2025-03-01 08:42:19',1),(49,1,'BUAH ANGGUR EXOTIC BLACK',NULL,NULL,63000,108000,100,10,'BUAH ANGGUR EXOTIC BLACK',NULL,'BUAH ANGGUR EXOTIC BLACK','0','0','0','1',3,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(50,1,'BUAH ANGGUR HIJAU -DRINKS',NULL,NULL,63000,100000,100,10,'BUAH ANGGUR HIJAU -DRINKS',NULL,'BUAH ANGGUR HIJAU -DRINKS','0','0','0','1',3,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(51,1,'BUAH ANGGUR MERAH',NULL,NULL,63000,95000,100,10,'BUAH ANGGUR MERAH',NULL,'BUAH ANGGUR MERAH','0','0','0','1',3,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(52,1,'BUAH APEL FUJI',NULL,NULL,63000,39000,100,10,'BUAH APEL FUJI',NULL,'BUAH APEL FUJI','0','0','0','1',3,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(53,1,'BUAH APEL HIJAU -DRINKS',NULL,NULL,63000,35000,100,10,'BUAH APEL HIJAU -DRINKS',NULL,'BUAH APEL HIJAU -DRINKS','0','0','0','1',3,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(54,1,'BUAH APEL MERAH -DRINKS',NULL,NULL,63000,45000,100,10,'BUAH APEL MERAH -DRINKS',NULL,'BUAH APEL MERAH -DRINKS','0','0','0','1',3,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(55,1,'BUAH BIT/BEETROOT',NULL,NULL,63000,43000,100,10,'BUAH BIT/BEETROOT',NULL,'BUAH BIT/BEETROOT','0','0','0','1',3,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(56,1,'BUAH BLUEBERRY',NULL,NULL,63000,63000,100,10,'BUAH BLUEBERRY',NULL,'BUAH BLUEBERRY','0','0','0','1',3,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',20),(57,1,'BUAH DELIMA -DRINKS',NULL,NULL,63000,105000,100,10,'BUAH DELIMA -DRINKS',NULL,'BUAH DELIMA -DRINKS','0','0','0','1',3,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(58,1,'BUAH JAMBU BIJI MERAH',NULL,NULL,63000,23000,100,10,'BUAH JAMBU BIJI MERAH',NULL,'BUAH JAMBU BIJI MERAH','0','0','0','1',3,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(59,1,'BUAH JAMBU BIJI MERAH -DRINKS',NULL,NULL,63000,25000,100,10,'BUAH JAMBU BIJI MERAH -DRINKS',NULL,'BUAH JAMBU BIJI MERAH -DRINKS','0','0','0','1',3,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(60,1,'BUAH JERUK KALAMANSI -DRINKS',NULL,NULL,63000,18000,100,10,'BUAH JERUK KALAMANSI -DRINKS',NULL,'BUAH JERUK KALAMANSI -DRINKS','0','0','0','1',3,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(61,1,'BUAH JERUK LEMON IMPOR',NULL,NULL,63000,35000,100,10,'BUAH JERUK LEMON IMPOR',NULL,'BUAH JERUK LEMON IMPOR','0','0','0','1',3,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(62,1,'BUAH JERUK LEMON LOKAL -DRINKS',NULL,NULL,63000,15000,100,10,'BUAH JERUK LEMON LOKAL -DRINKS',NULL,'BUAH JERUK LEMON LOKAL -DRINKS','0','0','0','1',3,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(63,1,'BUAH JERUK LIMO',NULL,NULL,63000,23000,100,10,'BUAH JERUK LIMO',NULL,'BUAH JERUK LIMO','0','0','0','1',3,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(64,1,'BUAH JERUK MEDAN -DRINKS',NULL,NULL,63000,28000,100,10,'BUAH JERUK MEDAN -DRINKS',NULL,'BUAH JERUK MEDAN -DRINKS','0','0','0','1',3,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(65,1,'BUAH JERUK NIPIS -DRINKS',NULL,NULL,63000,25000,100,10,'BUAH JERUK NIPIS -DRINKS',NULL,'BUAH JERUK NIPIS -DRINKS','0','0','0','1',3,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(66,1,'BUAH JERUK PONKAM',NULL,NULL,63000,28000,100,10,'BUAH JERUK PONKAM',NULL,'BUAH JERUK PONKAM','0','0','0','1',3,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(67,1,'BUAH JERUK SUNKIST',NULL,NULL,63000,43000,100,10,'BUAH JERUK SUNKIST',NULL,'BUAH JERUK SUNKIST','0','0','0','1',3,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(68,1,'BUAH KEDONDONG',NULL,NULL,63000,18000,100,10,'BUAH KEDONDONG',NULL,'BUAH KEDONDONG','0','0','0','1',3,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(69,1,'BUAH KIWI -DRINKS',NULL,NULL,63000,73000,100,10,'BUAH KIWI -DRINKS',NULL,'BUAH KIWI -DRINKS','0','0','0','1',3,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(70,1,'BUAH MANGGA',NULL,NULL,63000,35000,100,10,'BUAH MANGGA',NULL,'BUAH MANGGA','0','0','0','1',3,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(71,1,'BUAH MARKISA -DRINKS',NULL,NULL,63000,58000,100,10,'BUAH MARKISA -DRINKS',NULL,'BUAH MARKISA -DRINKS','0','0','0','1',3,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(72,1,'BUAH MELON MADU -DRINKS',NULL,NULL,63000,18000,100,10,'BUAH MELON MADU -DRINKS',NULL,'BUAH MELON MADU -DRINKS','0','0','0','1',3,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(73,1,'BUAH MELON ORANGE',NULL,NULL,63000,22000,100,10,'BUAH MELON ORANGE',NULL,'BUAH MELON ORANGE','0','0','0','1',3,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(74,1,'BUAH NAGA MERAH -DRINKS',NULL,NULL,63000,25000,100,10,'BUAH NAGA MERAH -DRINKS',NULL,'BUAH NAGA MERAH -DRINKS','0','0','0','1',3,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(75,1,'BUAH NANAS 1/2MATANG',NULL,NULL,63000,16000,100,10,'BUAH NANAS 1/2MATANG',NULL,'BUAH NANAS 1/2MATANG','0','0','0','1',3,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',30),(76,1,'BUAH NANAS 1/2MATANG -DRINKS',NULL,NULL,63000,14000,84,10,'BUAH NANAS 1/2MATANG -DRINKS',NULL,'BUAH NANAS 1/2MATANG -DRINKS','0','0','0','1',3,1,'2025-02-25 11:16:06','2025-03-01 08:41:48',1),(77,1,'BUAH NANGKA UTUH -DRINKS',NULL,NULL,63000,19000,100,10,'BUAH NANGKA UTUH -DRINKS',NULL,'BUAH NANGKA UTUH -DRINKS','0','0','0','1',3,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(78,1,'BUAH PEAR HIJAU',NULL,NULL,63000,53000,100,10,'BUAH PEAR HIJAU',NULL,'BUAH PEAR HIJAU','0','0','0','1',3,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(79,1,'BUAH PEPAYA',NULL,NULL,63000,12000,100,10,'BUAH PEPAYA',NULL,'BUAH PEPAYA','0','0','0','1',3,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(80,1,'BUAH PIR LOKAL',NULL,NULL,63000,25000,100,10,'BUAH PIR LOKAL',NULL,'BUAH PIR LOKAL','0','0','0','1',3,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(81,1,'BUAH PISANG',NULL,NULL,63000,19000,100,10,'BUAH PISANG',NULL,'BUAH PISANG','0','0','0','1',3,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(82,1,'BUAH PISANG BARANGAN',NULL,NULL,63000,12000,100,10,'BUAH PISANG BARANGAN',NULL,'BUAH PISANG BARANGAN','0','0','0','1',3,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',32),(83,1,'BUAH PISANG -DRINKS',NULL,NULL,63000,18000,100,10,'BUAH PISANG -DRINKS',NULL,'BUAH PISANG -DRINKS','0','0','0','1',3,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(84,1,'BUAH PISANG TANDUK 4',NULL,NULL,63000,11000,100,10,'BUAH PISANG TANDUK 4',NULL,'BUAH PISANG TANDUK 4','0','0','0','1',3,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',4),(85,1,'BUAH SEMANGKA TANPA BIJI',NULL,NULL,63000,18000,100,10,'BUAH SEMANGKA TANPA BIJI',NULL,'BUAH SEMANGKA TANPA BIJI','0','0','0','1',3,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(86,1,'BUAH SIRSAK BERSIH TANPA BIJI',NULL,NULL,63000,28000,100,10,'BUAH SIRSAK BERSIH TANPA BIJI',NULL,'BUAH SIRSAK BERSIH TANPA BIJI','0','0','0','1',3,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(87,1,'BUAH STROBERI',NULL,NULL,63000,60000,100,10,'BUAH STROBERI',NULL,'BUAH STROBERI','0','0','0','1',3,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(88,1,'BUAVITA 1 LTR',NULL,NULL,63000,0,100,10,'BUAVITA 1 LTR',NULL,'BUAVITA 1 LTR','0','0','0','1',2,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',34),(89,1,'BUBUK KEJU 25GR',NULL,NULL,63000,0,100,10,'BUBUK KEJU 25GR',NULL,'BUBUK KEJU 25GR','0','0','0','1',2,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',18),(90,1,'Bumbu Gohiong',NULL,NULL,63000,0,100,10,'Bumbu Gohiong',NULL,'Bumbu Gohiong','0','0','0','1',2,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(91,1,'BUMBU PECEL 100GR PCK',NULL,NULL,63000,0,100,10,'BUMBU PECEL 100GR PCK',NULL,'BUMBU PECEL 100GR PCK','0','0','0','1',2,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',24),(92,1,'Bumbu Rendang (sari minang)',NULL,NULL,63000,25000,100,10,'Bumbu Rendang (sari minang)',NULL,'Bumbu Rendang (sari minang)','0','0','0','1',2,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',9),(93,1,'BUNGA LAWANG / ANISTAR 1 KG',NULL,NULL,63000,168000,100,10,'BUNGA LAWANG / ANISTAR 1 KG',NULL,'BUNGA LAWANG / ANISTAR 1 KG','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(94,1,'Bunga Pepaya',NULL,NULL,63000,35000,100,10,'Bunga Pepaya',NULL,'Bunga Pepaya','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(95,1,'BUNGA SEDAP MALAM',NULL,NULL,63000,225000,100,10,'BUNGA SEDAP MALAM',NULL,'BUNGA SEDAP MALAM','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(96,1,'CABAI BESAR HIJAU PETIK BERSIH',NULL,NULL,63000,55000,100,10,'CABAI BESAR HIJAU PETIK BERSIH',NULL,'CABAI BESAR HIJAU PETIK BERSIH','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(97,1,'CABAI BESAR HIJAU PETIK BERSIH',NULL,NULL,63000,55000,100,10,'CABAI BESAR HIJAU PETIK BERSIH',NULL,'CABAI BESAR HIJAU PETIK BERSIH','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(98,1,'CABAI BESAR HIJAU TANGKAI',NULL,NULL,63000,0,100,10,'CABAI BESAR HIJAU TANGKAI',NULL,'CABAI BESAR HIJAU TANGKAI','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(99,1,'CABAI BESAR MERAH',NULL,NULL,63000,75000,100,10,'CABAI BESAR MERAH',NULL,'CABAI BESAR MERAH','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(100,1,'CABAI BESAR MERAH KERING',NULL,NULL,63000,99000,100,10,'CABAI BESAR MERAH KERING',NULL,'CABAI BESAR MERAH KERING','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(101,1,'CABAI BESAR MERAH PETIK BERSIH',NULL,NULL,63000,85000,100,10,'CABAI BESAR MERAH PETIK BERSIH',NULL,'CABAI BESAR MERAH PETIK BERSIH','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(102,1,'CABAI HIJAU KERITING',NULL,NULL,63000,60000,100,10,'CABAI HIJAU KERITING',NULL,'CABAI HIJAU KERITING','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(103,1,'CABAI HIJAU KERITING PETIK',NULL,NULL,63000,0,100,10,'CABAI HIJAU KERITING PETIK',NULL,'CABAI HIJAU KERITING PETIK','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(104,1,'CABAI KERITING KERING',NULL,NULL,63000,95000,100,10,'CABAI KERITING KERING',NULL,'CABAI KERITING KERING','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(105,1,'CABAI KERITING MERAH',NULL,NULL,63000,75000,100,10,'CABAI KERITING MERAH',NULL,'CABAI KERITING MERAH','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(106,1,'CABAI KERITING MERAH PETIK',NULL,NULL,63000,0,100,10,'CABAI KERITING MERAH PETIK',NULL,'CABAI KERITING MERAH PETIK','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(107,1,'CABAI RAWIT HIJAU',NULL,NULL,63000,70000,100,10,'CABAI RAWIT HIJAU',NULL,'CABAI RAWIT HIJAU','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(108,1,'CABAI RAWIT HIJAU PETIK',NULL,NULL,63000,0,100,10,'CABAI RAWIT HIJAU PETIK',NULL,'CABAI RAWIT HIJAU PETIK','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(109,1,'CABAI RAWIT MERAH',NULL,NULL,63000,95000,100,10,'CABAI RAWIT MERAH',NULL,'CABAI RAWIT MERAH','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(110,1,'CABAI RAWIT MERAH PETIK BERSIH',NULL,NULL,63000,100000,100,10,'CABAI RAWIT MERAH PETIK BERSIH',NULL,'CABAI RAWIT MERAH PETIK BERSIH','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(111,1,'CENGKEH',NULL,NULL,63000,190000,100,10,'CENGKEH',NULL,'CENGKEH','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(112,1,'CINCAU HITAM',NULL,NULL,63000,5000,100,10,'CINCAU HITAM',NULL,'CINCAU HITAM','0','0','0','1',2,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',3),(113,1,'Cireng',NULL,NULL,63000,10000,100,10,'Cireng',NULL,'Cireng','0','0','0','1',2,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',9),(114,1,'CLAWMEAT 227 GR',NULL,NULL,63000,230000,100,10,'CLAWMEAT 227 GR',NULL,'CLAWMEAT 227 GR','0','0','0','1',2,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',5),(115,1,'COCONUT FLAKES 250GR',NULL,NULL,63000,38000,100,10,'COCONUT FLAKES 250GR',NULL,'COCONUT FLAKES 250GR','0','0','0','1',2,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',13),(116,1,'COCONUT OIL 250ML',NULL,NULL,63000,0,100,10,'COCONUT OIL 250ML',NULL,'COCONUT OIL 250ML','0','0','0','1',2,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',7),(117,1,'Coconute Flakes',NULL,NULL,63000,38500,100,10,'Coconute Flakes',NULL,'Coconute Flakes','0','0','0','1',2,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',9),(118,1,'CORN FLAKES KELLOGS 275GR',NULL,NULL,63000,36000,100,10,'CORN FLAKES KELLOGS 275GR',NULL,'CORN FLAKES KELLOGS 275GR','0','0','0','1',2,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',6),(119,1,'CRAB STICK 250 GR',NULL,NULL,63000,31500,100,10,'CRAB STICK 250 GR',NULL,'CRAB STICK 250 GR','0','0','0','1',2,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',9),(120,1,'DARK RAISIN',NULL,NULL,63000,93000,100,10,'DARK RAISIN',NULL,'DARK RAISIN','0','0','0','1',2,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(121,1,'DAUN BAMBU 100 4',NULL,NULL,63000,60000,100,10,'DAUN BAMBU 100 4',NULL,'DAUN BAMBU 100 4','0','0','0','1',2,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(122,1,'DAUN BASIL FRESH',NULL,NULL,63000,65000,100,10,'DAUN BASIL FRESH',NULL,'DAUN BASIL FRESH','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(123,1,'DAUN BAWANG BESAR',NULL,NULL,63000,28000,100,10,'DAUN BAWANG BESAR',NULL,'DAUN BAWANG BESAR','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(124,1,'DAUN BAWANG KECIL',NULL,NULL,63000,43000,100,10,'DAUN BAWANG KECIL',NULL,'DAUN BAWANG KECIL','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(125,1,'DAUN BAWANG PREY',NULL,NULL,63000,73000,100,10,'DAUN BAWANG PREY',NULL,'DAUN BAWANG PREY','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(126,1,'DAUN BAYLEAF 8 GR',NULL,NULL,63000,0,100,10,'DAUN BAYLEAF 8 GR',NULL,'DAUN BAYLEAF 8 GR','0','0','0','1',2,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',17),(127,1,'DAUN DILL',NULL,NULL,63000,68000,100,10,'DAUN DILL',NULL,'DAUN DILL','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(128,1,'Daun Jati',NULL,NULL,0,0,100,10,'Daun Jati',NULL,'Daun Jati','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',4),(129,1,'DAUN JERUK',NULL,NULL,45000,45000,100,10,'DAUN JERUK',NULL,'DAUN JERUK','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(130,1,'DAUN KALE',NULL,NULL,93000,93000,100,10,'DAUN KALE',NULL,'DAUN KALE','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(131,1,'DAUN KARI',NULL,NULL,35000,35000,100,10,'DAUN KARI',NULL,'DAUN KARI','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(132,1,'DAUN KEMANGI',NULL,NULL,30000,30000,100,10,'DAUN KEMANGI',NULL,'DAUN KEMANGI','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(133,1,'Daun Kenikir',NULL,NULL,25000,25000,100,10,'Daun Kenikir',NULL,'Daun Kenikir','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(134,1,'DAUN KETUMBAR / WANSUI',NULL,NULL,75000,75000,100,10,'DAUN KETUMBAR / WANSUI',NULL,'DAUN KETUMBAR / WANSUI','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(135,1,'DAUN KUNYIT',NULL,NULL,18000,18000,100,10,'DAUN KUNYIT',NULL,'DAUN KUNYIT','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(136,1,'DAUN MELINJO',NULL,NULL,30000,30000,100,10,'DAUN MELINJO',NULL,'DAUN MELINJO','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(137,1,'DAUN MINT',NULL,NULL,40000,40000,100,10,'DAUN MINT',NULL,'DAUN MINT','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(138,1,'DAUN OBHA 10 GR',NULL,NULL,3000,3000,100,10,'DAUN OBHA 10 GR',NULL,'DAUN OBHA 10 GR','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',18),(139,1,'Daun Pakis',NULL,NULL,20000,20000,100,10,'Daun Pakis',NULL,'Daun Pakis','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(140,1,'DAUN PANDAN MUDA',NULL,NULL,15000,15000,100,10,'DAUN PANDAN MUDA',NULL,'DAUN PANDAN MUDA','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(141,1,'DAUN PETERSELI / PARSLEY',NULL,NULL,55000,55000,100,10,'DAUN PETERSELI / PARSLEY',NULL,'DAUN PETERSELI / PARSLEY','0','0','0','1',1,1,'2025-02-25 11:16:06','2025-02-25 11:16:06',1),(142,1,'DAUN PISANG',NULL,NULL,14000,14000,100,10,'DAUN PISANG',NULL,'DAUN PISANG','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(143,1,'DAUN SAGE',NULL,NULL,0,0,100,10,'DAUN SAGE',NULL,'DAUN SAGE','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',19),(144,1,'DAUN SALAM',NULL,NULL,13000,13000,100,10,'DAUN SALAM',NULL,'DAUN SALAM','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(145,1,'DAUN SELEDRI IMPOR PCK 500GR',NULL,NULL,38000,38000,100,10,'DAUN SELEDRI IMPOR PCK 500GR',NULL,'DAUN SELEDRI IMPOR PCK 500GR','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(146,1,'DAUN SELEDRI LOKAL',NULL,NULL,35000,35000,100,10,'DAUN SELEDRI LOKAL',NULL,'DAUN SELEDRI LOKAL','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(147,1,'DAUN SHUNGIKU / SAYUR KRISAN HIJAU',NULL,NULL,0,0,100,10,'DAUN SHUNGIKU / SAYUR KRISAN HIJAU',NULL,'DAUN SHUNGIKU / SAYUR KRISAN HIJAU','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(148,1,'DAUN SINGKONG',NULL,NULL,10000,10000,100,10,'DAUN SINGKONG',NULL,'DAUN SINGKONG','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(149,1,'EBI KERING',NULL,NULL,110000,110000,100,10,'EBI KERING',NULL,'EBI KERING','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(150,1,'Emping',NULL,NULL,105000,105000,100,10,'Emping',NULL,'Emping','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(151,1,'FROZEN BLUEBERRY 1 KG -DRINKS',NULL,NULL,65000,65000,100,10,'FROZEN BLUEBERRY 1 KG -DRINKS',NULL,'FROZEN BLUEBERRY 1 KG -DRINKS','0','0','0','1',3,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',26),(152,1,'FROZEN MIXED BARRIES 1KG -DRINKS',NULL,NULL,0,0,100,10,'FROZEN MIXED BARRIES 1KG -DRINKS',NULL,'FROZEN MIXED BARRIES 1KG -DRINKS','0','0','0','1',3,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',26),(153,1,'GREEK YOGHURT 1 KG',NULL,NULL,0,0,100,10,'GREEK YOGHURT 1 KG',NULL,'GREEK YOGHURT 1 KG','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',26),(154,1,'Gula aren',NULL,NULL,33000,33000,100,10,'Gula aren',NULL,'Gula aren','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(155,1,'GULA AREN PADAT',NULL,NULL,33000,33000,100,10,'GULA AREN PADAT',NULL,'GULA AREN PADAT','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(156,1,'Gula Merah',NULL,NULL,23000,23000,100,10,'Gula Merah',NULL,'Gula Merah','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(157,1,'GULA MERAH PADAT',NULL,NULL,23000,23000,100,10,'GULA MERAH PADAT',NULL,'GULA MERAH PADAT','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(158,1,'IKAN ASIN JAMBAL KERING',NULL,NULL,112000,112000,100,10,'IKAN ASIN JAMBAL KERING',NULL,'IKAN ASIN JAMBAL KERING','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(159,1,'IKAN TERI JENGKI',NULL,NULL,95000,95000,100,10,'IKAN TERI JENGKI',NULL,'IKAN TERI JENGKI','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(160,1,'IKAN TERI MEDAN KERING',NULL,NULL,165000,165000,100,10,'IKAN TERI MEDAN KERING',NULL,'IKAN TERI MEDAN KERING','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(161,1,'JAGUNG MANIS KUPAS',NULL,NULL,25000,25000,100,10,'JAGUNG MANIS KUPAS',NULL,'JAGUNG MANIS KUPAS','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(162,1,'JAGUNG MANIS',NULL,NULL,23000,23000,100,10,'JAGUNG MANIS',NULL,'JAGUNG MANIS','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(163,1,'Jagung manis pipil',NULL,NULL,46000,46000,100,10,'Jagung manis pipil',NULL,'Jagung manis pipil','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(164,1,'JAGUNG MUDA',NULL,NULL,24000,24000,100,10,'JAGUNG MUDA',NULL,'JAGUNG MUDA','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(165,1,'JAHE PUTIH',NULL,NULL,33000,33000,100,10,'JAHE PUTIH',NULL,'JAHE PUTIH','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(166,1,'JAMUR CHAMPIGNON',NULL,NULL,45000,45000,100,10,'JAMUR CHAMPIGNON',NULL,'JAMUR CHAMPIGNON','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(167,1,'JAMUR ENOKI',NULL,NULL,6000,6000,100,10,'JAMUR ENOKI',NULL,'JAMUR ENOKI','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',24),(168,1,'JAMUR ERINGI 200 GR',NULL,NULL,15000,15000,100,10,'JAMUR ERINGI 200 GR',NULL,'JAMUR ERINGI 200 GR','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',25),(169,1,'JAMUR MERANG',NULL,NULL,48000,48000,100,10,'JAMUR MERANG',NULL,'JAMUR MERANG','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(170,1,'JAMUR SHIMEJI COKLAT 156 GR',NULL,NULL,12000,12000,100,10,'JAMUR SHIMEJI COKLAT 156 GR',NULL,'JAMUR SHIMEJI COKLAT 156 GR','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',21),(171,1,'JAMUR SHIMEJI PUTIH 156 GR',NULL,NULL,12000,12000,100,10,'JAMUR SHIMEJI PUTIH 156 GR',NULL,'JAMUR SHIMEJI PUTIH 156 GR','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',21),(172,1,'JAMUR SHITAKE BASAH',NULL,NULL,102000,102000,100,10,'JAMUR SHITAKE BASAH',NULL,'JAMUR SHITAKE BASAH','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(173,1,'JAMUR TIRAM',NULL,NULL,25000,25000,100,10,'JAMUR TIRAM',NULL,'JAMUR TIRAM','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(174,1,'Jeruk Bali',NULL,NULL,38500,38500,100,10,'Jeruk Bali',NULL,'Jeruk Bali','0','0','0','1',3,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(175,1,'Jeruk Kunci/Bangka',NULL,NULL,19000,19000,100,10,'Jeruk Kunci/Bangka',NULL,'Jeruk Kunci/Bangka','0','0','0','1',3,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(176,1,'JERUK PERAS',NULL,NULL,16000,16000,100,10,'JERUK PERAS',NULL,'JERUK PERAS','0','0','0','1',3,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(177,1,'JINTEN PUTIH BUBUK',NULL,NULL,0,0,100,10,'JINTEN PUTIH BUBUK',NULL,'JINTEN PUTIH BUBUK','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(178,1,'Juhi Kering',NULL,NULL,0,0,100,10,'Juhi Kering',NULL,'Juhi Kering','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(179,1,'KABOCHA ORANGE/LABU PARANG',NULL,NULL,25000,25000,100,10,'KABOCHA ORANGE/LABU PARANG',NULL,'KABOCHA ORANGE/LABU PARANG','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(180,1,'KACANG BUNCIS',NULL,NULL,15000,15000,100,10,'KACANG BUNCIS',NULL,'KACANG BUNCIS','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(181,1,'KACANG BUNCIS BABY',NULL,NULL,25000,25000,100,10,'KACANG BUNCIS BABY',NULL,'KACANG BUNCIS BABY','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(182,1,'KACANG HIJAU',NULL,NULL,35000,35000,100,10,'KACANG HIJAU',NULL,'KACANG HIJAU','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(183,1,'KACANG KAPRI IMPOR',NULL,NULL,125000,125000,100,10,'KACANG KAPRI IMPOR',NULL,'KACANG KAPRI IMPOR','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(184,1,'KACANG KEDELAI',NULL,NULL,23000,23000,100,10,'KACANG KEDELAI',NULL,'KACANG KEDELAI','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(185,1,'KACANG MEDE MENTAH',NULL,NULL,170000,170000,100,10,'KACANG MEDE MENTAH',NULL,'KACANG MEDE MENTAH','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(186,1,'KACANG MERAH MENTAH',NULL,NULL,34000,34000,100,10,'KACANG MERAH MENTAH',NULL,'KACANG MERAH MENTAH','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(187,1,'KACANG PANJANG',NULL,NULL,23000,23000,100,10,'KACANG PANJANG',NULL,'KACANG PANJANG','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(188,1,'KACANG POLONG',NULL,NULL,78000,78000,100,10,'KACANG POLONG',NULL,'KACANG POLONG','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(189,1,'Kacang Tanah Kulit',NULL,NULL,40000,40000,100,10,'Kacang Tanah Kulit',NULL,'Kacang Tanah Kulit','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(190,1,'KACANG TANAH KULIT MENTAH',NULL,NULL,43000,43000,100,10,'KACANG TANAH KULIT MENTAH',NULL,'KACANG TANAH KULIT MENTAH','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(191,1,'KACANG TANAH KUPAS MENTAH',NULL,NULL,45000,45000,100,10,'KACANG TANAH KUPAS MENTAH',NULL,'KACANG TANAH KUPAS MENTAH','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(192,1,'KACANG TOLO',NULL,NULL,0,0,100,10,'KACANG TOLO',NULL,'KACANG TOLO','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(193,1,'KAILAN BABY IMPOR',NULL,NULL,75000,75000,100,10,'KAILAN BABY IMPOR',NULL,'KAILAN BABY IMPOR','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(194,1,'KANGKUNG KG',NULL,NULL,14000,14000,100,10,'KANGKUNG KG',NULL,'KANGKUNG KG','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(195,1,'Kapulaga',NULL,NULL,205000,205000,100,10,'Kapulaga',NULL,'Kapulaga','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(196,1,'KAPULAGA CAOGUO KERING',NULL,NULL,198000,198000,100,10,'KAPULAGA CAOGUO KERING',NULL,'KAPULAGA CAOGUO KERING','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(197,1,'KARA COCO WATER 1LTR',NULL,NULL,0,0,100,10,'KARA COCO WATER 1LTR',NULL,'KARA COCO WATER 1LTR','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',22),(198,1,'KAYU MANIS BATANG',NULL,NULL,140000,140000,100,10,'KAYU MANIS BATANG',NULL,'KAYU MANIS BATANG','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(199,1,'Kecambah',NULL,NULL,28000,28000,100,10,'Kecambah',NULL,'Kecambah','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(200,1,'KECOMBRANG',NULL,NULL,45000,45000,100,10,'KECOMBRANG',NULL,'KECOMBRANG','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(201,1,'KEJU SINGLE 5 LBR',NULL,NULL,0,0,100,10,'KEJU SINGLE 5 LBR',NULL,'KEJU SINGLE 5 LBR','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',23),(202,1,'KELAPA MUDA',NULL,NULL,15000,15000,100,10,'KELAPA MUDA',NULL,'KELAPA MUDA','0','0','0','1',3,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',4),(203,1,'KELAPA NATA DE COCO',NULL,NULL,19000,19000,100,10,'KELAPA NATA DE COCO',NULL,'KELAPA NATA DE COCO','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(204,1,'KELAPA PARUT',NULL,NULL,0,0,100,10,'KELAPA PARUT',NULL,'KELAPA PARUT','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(205,1,'KEMIRI',NULL,NULL,75000,75000,100,10,'KEMIRI',NULL,'KEMIRI','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(206,1,'KENCUR',NULL,NULL,32000,32000,100,10,'KENCUR',NULL,'KENCUR','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(207,1,'KENTANG',NULL,NULL,24000,24000,100,10,'KENTANG',NULL,'KENTANG','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(208,1,'KERIPIK SINGKONG',NULL,NULL,0,0,100,10,'KERIPIK SINGKONG',NULL,'KERIPIK SINGKONG','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(209,1,'KERUPUK KULIT MENTAH',NULL,NULL,0,0,100,10,'KERUPUK KULIT MENTAH',NULL,'KERUPUK KULIT MENTAH','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(210,1,'KERUPUK KULIT TULIP',NULL,NULL,0,0,100,10,'KERUPUK KULIT TULIP',NULL,'KERUPUK KULIT TULIP','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',36),(211,1,'KERUPUK UDANG FINNA',NULL,NULL,45000,45000,100,10,'KERUPUK UDANG FINNA',NULL,'KERUPUK UDANG FINNA','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',26),(212,1,'KETAN HITAM',NULL,NULL,45000,45000,100,10,'KETAN HITAM',NULL,'KETAN HITAM','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(213,1,'KETUMBAR',NULL,NULL,45000,45000,100,10,'KETUMBAR',NULL,'KETUMBAR','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(214,1,'Kiamboy',NULL,NULL,15000,15000,100,10,'Kiamboy',NULL,'Kiamboy','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',24),(215,1,'KIKIL',NULL,NULL,0,0,100,10,'KIKIL',NULL,'KIKIL','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(216,1,'KLUWEK/KEPAYANG',NULL,NULL,33000,33000,100,10,'KLUWEK/KEPAYANG',NULL,'KLUWEK/KEPAYANG','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(217,1,'KLUWEK/KEPAYANG',NULL,NULL,0,0,100,10,'KLUWEK/KEPAYANG',NULL,'KLUWEK/KEPAYANG','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(218,1,'Kol Putih',NULL,NULL,14000,14000,100,10,'Kol Putih',NULL,'Kol Putih','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(219,1,'KOLANG-KALING',NULL,NULL,19000,19000,100,10,'KOLANG-KALING',NULL,'KOLANG-KALING','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(220,1,'KONYAKU',NULL,NULL,18000,18000,100,10,'KONYAKU',NULL,'KONYAKU','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',13),(221,1,'KONYAKU SHIRATAKI RICE 9 1KG',NULL,NULL,225000,225000,100,10,'KONYAKU SHIRATAKI RICE 9 1KG',NULL,'KONYAKU SHIRATAKI RICE 9 1KG','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',26),(222,1,'Krupuk Udang Besar',NULL,NULL,37000,37000,100,10,'Krupuk Udang Besar',NULL,'Krupuk Udang Besar','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',9),(223,1,'KUBIS BROKOLI BERSIH BUANG BATANG',NULL,NULL,45000,45000,100,10,'KUBIS BROKOLI BERSIH BUANG BATANG',NULL,'KUBIS BROKOLI BERSIH BUANG BATANG','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(224,1,'KUBIS BRUSSEL / CUCIWIS',NULL,NULL,25000,25000,100,10,'KUBIS BRUSSEL / CUCIWIS',NULL,'KUBIS BRUSSEL / CUCIWIS','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(225,1,'KUBIS BUNGA / KEMBANG KOL',NULL,NULL,25000,25000,100,10,'KUBIS BUNGA / KEMBANG KOL',NULL,'KUBIS BUNGA / KEMBANG KOL','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(226,1,'KUBIS KOL',NULL,NULL,14000,14000,100,10,'KUBIS KOL',NULL,'KUBIS KOL','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(227,1,'KUBIS KOL UNGU',NULL,NULL,35000,35000,100,10,'KUBIS KOL UNGU',NULL,'KUBIS KOL UNGU','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(228,1,'KUCAI',NULL,NULL,19000,19000,100,10,'KUCAI',NULL,'KUCAI','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(229,1,'KULIT KEMBANG TAHU LOKAL ASIN',NULL,NULL,17000,17000,100,10,'KULIT KEMBANG TAHU LOKAL ASIN',NULL,'KULIT KEMBANG TAHU LOKAL ASIN','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',33),(230,1,'KULIT LUMPIA',NULL,NULL,0,0,100,10,'KULIT LUMPIA',NULL,'KULIT LUMPIA','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',4),(231,1,'KULIT PANGSIT',NULL,NULL,10000,10000,100,10,'KULIT PANGSIT',NULL,'KULIT PANGSIT','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',12),(232,1,'Kulit Popiah',NULL,NULL,1800,1800,100,10,'Kulit Popiah',NULL,'Kulit Popiah','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',4),(233,1,'KUNYIT',NULL,NULL,18000,18000,100,10,'KUNYIT',NULL,'KUNYIT','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(234,1,'KUNYIT BUBUK 1 KG',NULL,NULL,40000,40000,100,10,'KUNYIT BUBUK 1 KG',NULL,'KUNYIT BUBUK 1 KG','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',14),(235,1,'KUNYIT GILING',NULL,NULL,45000,45000,100,10,'KUNYIT GILING',NULL,'KUNYIT GILING','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(236,1,'KWETIAU BERAS LEBAR',NULL,NULL,30000,30000,100,10,'KWETIAU BERAS LEBAR',NULL,'KWETIAU BERAS LEBAR','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(237,1,'KWETIAU KECIL',NULL,NULL,10000,10000,100,10,'KWETIAU KECIL',NULL,'KWETIAU KECIL','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',3),(238,1,'KYURI',NULL,NULL,32000,32000,100,10,'KYURI',NULL,'KYURI','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(239,1,'LABU SIAM',NULL,NULL,10000,10000,100,10,'LABU SIAM',NULL,'LABU SIAM','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(240,1,'LADA HITAM UTUH',NULL,NULL,145000,145000,100,10,'LADA HITAM UTUH',NULL,'LADA HITAM UTUH','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(241,1,'LENGKUAS',NULL,NULL,12000,12000,100,10,'LENGKUAS',NULL,'LENGKUAS','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(242,1,'Lidah Buaya',NULL,NULL,31500,31500,100,10,'Lidah Buaya',NULL,'Lidah Buaya','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',9),(243,1,'LOBAK BABY UNGU',NULL,NULL,31000,31000,100,10,'LOBAK BABY UNGU',NULL,'LOBAK BABY UNGU','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(244,1,'LOBAK KERING CAIPO MANIS',NULL,NULL,48000,48000,100,10,'LOBAK KERING CAIPO MANIS',NULL,'LOBAK KERING CAIPO MANIS','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(245,1,'LOBAK KERING TONGCAI ASIN',NULL,NULL,55000,55000,100,10,'LOBAK KERING TONGCAI ASIN',NULL,'LOBAK KERING TONGCAI ASIN','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(246,1,'LOBAK PUTIH',NULL,NULL,13000,13000,100,10,'LOBAK PUTIH',NULL,'LOBAK PUTIH','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(247,1,'Longan',NULL,NULL,48000,48000,100,10,'Longan',NULL,'Longan','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',28),(248,1,'LONTONG',NULL,NULL,2500,2500,100,10,'LONTONG',NULL,'LONTONG','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',4),(249,1,'MAKARONI',NULL,NULL,25000,25000,100,10,'MAKARONI',NULL,'MAKARONI','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(250,1,'Mangga Harum Manis',NULL,NULL,37000,37000,100,10,'Mangga Harum Manis',NULL,'Mangga Harum Manis','0','0','0','1',3,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(251,1,'MANGGA MUDA ASAM',NULL,NULL,33000,33000,100,10,'MANGGA MUDA ASAM',NULL,'MANGGA MUDA ASAM','0','0','0','1',3,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(252,1,'MAX CREAMER 500 GR',NULL,NULL,48000,48000,100,10,'MAX CREAMER 500 GR',NULL,'MAX CREAMER 500 GR','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',3),(253,1,'MELINJO',NULL,NULL,25000,25000,100,10,'MELINJO',NULL,'MELINJO','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(254,1,'MIKA TUMPENG',NULL,NULL,0,0,100,10,'MIKA TUMPENG',NULL,'MIKA TUMPENG','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',28),(255,1,'MIZUNA FRESH',NULL,NULL,0,0,100,10,'MIZUNA FRESH',NULL,'MIZUNA FRESH','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(256,1,'NANAS KALENG',NULL,NULL,0,0,100,10,'NANAS KALENG',NULL,'NANAS KALENG','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',28),(257,1,'Nanas Mateng Honey',NULL,NULL,22000,22000,100,10,'Nanas Mateng Honey',NULL,'Nanas Mateng Honey','0','0','0','1',3,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',30),(258,1,'NANGKA SAYUR',NULL,NULL,15000,15000,100,10,'NANGKA SAYUR',NULL,'NANGKA SAYUR','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(259,1,'Nata de coco',NULL,NULL,15000,15000,100,10,'Nata de coco',NULL,'Nata de coco','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',9),(260,1,'Nutrijell Lychee',NULL,NULL,11000,11000,100,10,'Nutrijell Lychee',NULL,'Nutrijell Lychee','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',9),(261,1,'OKRA',NULL,NULL,33000,33000,100,10,'OKRA',NULL,'OKRA','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(262,1,'ORGANIC BLACK QUINOA 1KG',NULL,NULL,160000,160000,100,10,'ORGANIC BLACK QUINOA 1KG',NULL,'ORGANIC BLACK QUINOA 1KG','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',26),(263,1,'ORGANIC WHITE QUINOA 1KG',NULL,NULL,115000,115000,100,10,'ORGANIC WHITE QUINOA 1KG',NULL,'ORGANIC WHITE QUINOA 1KG','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',26),(264,1,'OYONG',NULL,NULL,17000,17000,100,10,'OYONG',NULL,'OYONG','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(265,1,'Pakcoy',NULL,NULL,16000,16000,100,10,'Pakcoy',NULL,'Pakcoy','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(266,1,'PALA UTUH',NULL,NULL,0,0,100,10,'PALA UTUH',NULL,'PALA UTUH','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(267,1,'PAPRIKA HIJAU',NULL,NULL,55000,55000,100,10,'PAPRIKA HIJAU',NULL,'PAPRIKA HIJAU','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(268,1,'PAPRIKA MERAH',NULL,NULL,95000,95000,100,10,'PAPRIKA MERAH',NULL,'PAPRIKA MERAH','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(269,1,'PEANUT BUTTER CREAMY 500GR',NULL,NULL,0,0,100,10,'PEANUT BUTTER CREAMY 500GR',NULL,'PEANUT BUTTER CREAMY 500GR','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',3),(270,1,'PERIA / PARE',NULL,NULL,20000,20000,100,10,'PERIA / PARE',NULL,'PERIA / PARE','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(271,1,'PERMEN',NULL,NULL,0,0,100,10,'PERMEN',NULL,'PERMEN','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',14),(272,1,'Pete',NULL,NULL,15000,15000,100,10,'Pete',NULL,'Pete','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',4),(273,1,'PETE KUPAS',NULL,NULL,0,0,100,10,'PETE KUPAS',NULL,'PETE KUPAS','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(274,1,'Pisang Kepok',NULL,NULL,22500,22500,100,10,'Pisang Kepok',NULL,'Pisang Kepok','0','0','0','1',3,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',23),(275,1,'PUMPKIN SEEDS',NULL,NULL,68000,68000,100,10,'PUMPKIN SEEDS',NULL,'PUMPKIN SEEDS','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',3),(276,1,'RED RADEST LOBAK MERAH',NULL,NULL,34000,34000,100,10,'RED RADEST LOBAK MERAH',NULL,'RED RADEST LOBAK MERAH','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(277,1,'ROLLED OATS 500 GR',NULL,NULL,0,0,100,10,'ROLLED OATS 500 GR',NULL,'ROLLED OATS 500 GR','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',4),(278,1,'ROSE MARRY FLOWER 20GR',NULL,NULL,15000,15000,100,10,'ROSE MARRY FLOWER 20GR',NULL,'ROSE MARRY FLOWER 20GR','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',24),(279,1,'SALAD SALANOVA 9ING IMPORT 250 GR',NULL,NULL,195000,195000,100,10,'SALAD SALANOVA 9ING IMPORT 250 GR',NULL,'SALAD SALANOVA 9ING IMPORT 250 GR','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(280,1,'SAWI HIJAU / CAISIM',NULL,NULL,15000,15000,100,10,'SAWI HIJAU / CAISIM',NULL,'SAWI HIJAU / CAISIM','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(281,1,'SAWI HIJAU / CAISIM BABY',NULL,NULL,18000,18000,100,10,'SAWI HIJAU / CAISIM BABY',NULL,'SAWI HIJAU / CAISIM BABY','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(282,1,'SAWI PUTIH',NULL,NULL,15000,15000,100,10,'SAWI PUTIH',NULL,'SAWI PUTIH','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(283,1,'SAWI SENDOK / PAKCOY BABY',NULL,NULL,20000,20000,100,10,'SAWI SENDOK / PAKCOY BABY',NULL,'SAWI SENDOK / PAKCOY BABY','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(284,1,'Sawo',NULL,NULL,25000,25000,100,10,'Sawo',NULL,'Sawo','0','0','0','1',3,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(285,1,'SELADA AIR',NULL,NULL,28000,28000,100,10,'SELADA AIR',NULL,'SELADA AIR','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(286,1,'SELADA KERITING',NULL,NULL,41000,41000,100,10,'SELADA KERITING',NULL,'SELADA KERITING','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(287,1,'SELADA LETTUCE',NULL,NULL,33000,33000,100,10,'SELADA LETTUCE',NULL,'SELADA LETTUCE','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(288,1,'SELADA ROMAINE',NULL,NULL,35000,35000,100,10,'SELADA ROMAINE',NULL,'SELADA ROMAINE','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(289,1,'SELADA UNGU',NULL,NULL,55000,55000,100,10,'SELADA UNGU',NULL,'SELADA UNGU','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(290,1,'SERAI',NULL,NULL,15000,15000,100,10,'SERAI',NULL,'SERAI','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(291,1,'SHINSHUICI MIKOCHAN SHIRO MISO 1 KG',NULL,NULL,58500,58500,100,10,'SHINSHUICI MIKOCHAN SHIRO MISO 1 KG',NULL,'SHINSHUICI MIKOCHAN SHIRO MISO 1 KG','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',26),(292,1,'SHIRATAKI 200 GR',NULL,NULL,9500,9500,100,10,'SHIRATAKI 200 GR',NULL,'SHIRATAKI 200 GR','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',25),(293,1,'SINGKONG',NULL,NULL,7000,7000,100,10,'SINGKONG',NULL,'SINGKONG','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(294,1,'SOUN',NULL,NULL,20000,20000,100,10,'SOUN',NULL,'SOUN','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(295,1,'SPIRILUNA POWDER 100GR',NULL,NULL,75000,75000,100,10,'SPIRILUNA POWDER 100GR',NULL,'SPIRILUNA POWDER 100GR','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',24),(296,1,'SRI RACHA SAUCE',NULL,NULL,0,0,100,10,'SRI RACHA SAUCE',NULL,'SRI RACHA SAUCE','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',2),(297,1,'SUNFLOWER SEED 250GR',NULL,NULL,33000,33000,100,10,'SUNFLOWER SEED 250GR',NULL,'SUNFLOWER SEED 250GR','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',13),(298,1,'SUSU COCONUT DELIGHT',NULL,NULL,0,0,100,10,'SUSU COCONUT DELIGHT',NULL,'SUSU COCONUT DELIGHT','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',22),(299,1,'TAHU CINA',NULL,NULL,6500,6500,100,10,'TAHU CINA',NULL,'TAHU CINA','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',4),(300,1,'TAHU COKLAT KOTAK',NULL,NULL,0,0,100,10,'TAHU COKLAT KOTAK',NULL,'TAHU COKLAT KOTAK','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',4),(301,1,'TAHU COKLAT SEGITIGA',NULL,NULL,0,0,100,10,'TAHU COKLAT SEGITIGA',NULL,'TAHU COKLAT SEGITIGA','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',4),(302,1,'TAHU PONG MENTAH',NULL,NULL,800,800,100,10,'TAHU PONG MENTAH',NULL,'TAHU PONG MENTAH','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',4),(303,1,'TAHU PUTIH BANDUNG',NULL,NULL,0,0,100,10,'TAHU PUTIH BANDUNG',NULL,'TAHU PUTIH BANDUNG','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',4),(304,1,'TAHU SUTRA KOTAK',NULL,NULL,13000,13000,100,10,'TAHU SUTRA KOTAK',NULL,'TAHU SUTRA KOTAK','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',10),(305,1,'TAHU TELUR JEPANG',NULL,NULL,9000,9000,100,10,'TAHU TELUR JEPANG',NULL,'TAHU TELUR JEPANG','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',4),(306,1,'TAMPAH BAMBU',NULL,NULL,0,0,100,10,'TAMPAH BAMBU',NULL,'TAMPAH BAMBU','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',4),(307,1,'TAOGE BESAR',NULL,NULL,14000,14000,100,10,'TAOGE BESAR',NULL,'TAOGE BESAR','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(308,1,'TAOGE RAWON KECIL',NULL,NULL,30000,30000,100,10,'TAOGE RAWON KECIL',NULL,'TAOGE RAWON KECIL','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(309,1,'TAPE SINGKONG',NULL,NULL,16000,16000,100,10,'TAPE SINGKONG',NULL,'TAPE SINGKONG','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(310,1,'Tape Singkong CPR - Jalarasa',NULL,NULL,33500,33500,100,10,'Tape Singkong CPR - Jalarasa',NULL,'Tape Singkong CPR - Jalarasa','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',3),(311,1,'TARAGON',NULL,NULL,75000,75000,100,10,'TARAGON',NULL,'TARAGON','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(312,1,'Tauco Medan',NULL,NULL,25000,25000,100,10,'Tauco Medan',NULL,'Tauco Medan','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',7),(313,1,'TAUCO MEDAN',NULL,NULL,25000,25000,100,10,'TAUCO MEDAN',NULL,'TAUCO MEDAN','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',7),(314,1,'TELUR ASIN MENTAH',NULL,NULL,4000,4000,100,10,'TELUR ASIN MENTAH',NULL,'TELUR ASIN MENTAH','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',4),(315,1,'TELUR AYAM NEGERI',NULL,NULL,34000,34000,100,10,'TELUR AYAM NEGERI',NULL,'TELUR AYAM NEGERI','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(316,1,'TELUR BEBEK',NULL,NULL,4500,4500,100,10,'TELUR BEBEK',NULL,'TELUR BEBEK','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',4),(317,1,'TELUR OMEGA 10 4',NULL,NULL,33000,33000,100,10,'TELUR OMEGA 10 4',NULL,'TELUR OMEGA 10 4','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',4),(318,1,'TELUR PITAN',NULL,NULL,15000,15000,100,10,'TELUR PITAN',NULL,'TELUR PITAN','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',4),(319,1,'TELUR PUYUH',NULL,NULL,50000,50000,100,10,'TELUR PUYUH',NULL,'TELUR PUYUH','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(320,1,'Tempe',NULL,NULL,7000,7000,100,10,'Tempe',NULL,'Tempe','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',4),(321,1,'TEMPE 500 GR',NULL,NULL,7000,7000,100,10,'TEMPE 500 GR',NULL,'TEMPE 500 GR','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',4),(322,1,'TEMPE KOTAK',NULL,NULL,0,0,100,10,'TEMPE KOTAK',NULL,'TEMPE KOTAK','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',4),(323,1,'TEMPE KOTAK IRIS',NULL,NULL,0,0,100,10,'TEMPE KOTAK IRIS',NULL,'TEMPE KOTAK IRIS','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',4),(324,1,'Tempe Mendoan',NULL,NULL,3500,3500,100,10,'Tempe Mendoan',NULL,'Tempe Mendoan','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',4),(325,1,'Terasi Juek',NULL,NULL,15000,15000,100,10,'Terasi Juek',NULL,'Terasi Juek','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',4),(326,1,'TERASI KERING LOKAL 9 100GR',NULL,NULL,0,0,100,10,'TERASI KERING LOKAL 9 100GR',NULL,'TERASI KERING LOKAL 9 100GR','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',24),(327,1,'TERONG UNGU',NULL,NULL,11000,11000,100,10,'TERONG UNGU',NULL,'TERONG UNGU','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(328,1,'THYME FRESH 20 GR',NULL,NULL,17000,17000,100,10,'THYME FRESH 20 GR',NULL,'THYME FRESH 20 GR','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',8),(329,1,'TIMUN LOKAL BESAR',NULL,NULL,18000,18000,100,10,'TIMUN LOKAL BESAR',NULL,'TIMUN LOKAL BESAR','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(330,1,'TIMUN LOKAL KECIL',NULL,NULL,14000,14000,100,10,'TIMUN LOKAL KECIL',NULL,'TIMUN LOKAL KECIL','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(331,1,'TIMUN SEDANG',NULL,NULL,14000,14000,100,10,'TIMUN SEDANG',NULL,'TIMUN SEDANG','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(332,1,'TOFU KOTAK SILKEN',NULL,NULL,17000,17000,100,10,'TOFU KOTAK SILKEN',NULL,'TOFU KOTAK SILKEN','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',10),(333,1,'TOMAT CHERRY',NULL,NULL,48000,48000,100,10,'TOMAT CHERRY',NULL,'TOMAT CHERRY','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(334,1,'TOMAT HIJAU',NULL,NULL,18000,18000,100,10,'TOMAT HIJAU',NULL,'TOMAT HIJAU','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(335,1,'TOMAT MERAH',NULL,NULL,25000,25000,100,10,'TOMAT MERAH',NULL,'TOMAT MERAH','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(336,1,'TROPICANASLIM GULA SACHET/BOX ISI 504',NULL,NULL,0,0,100,10,'TROPICANASLIM GULA SACHET/BOX ISI 504',NULL,'TROPICANASLIM GULA SACHET/BOX ISI 504','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',9),(337,1,'TRUFFLESLICE 40GR',NULL,NULL,560000,560000,100,10,'TRUFFLESLICE 40GR',NULL,'TRUFFLESLICE 40GR','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',5),(338,1,'Tusuk sate daging P. 25cm',NULL,NULL,16000,16000,100,10,'Tusuk sate daging P. 25cm',NULL,'Tusuk sate daging P. 25cm','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',9),(339,1,'UBI JALAR ORANGE',NULL,NULL,12000,12000,100,10,'UBI JALAR ORANGE',NULL,'UBI JALAR ORANGE','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(340,1,'UBI MERAH',NULL,NULL,10000,10000,100,10,'UBI MERAH',NULL,'UBI MERAH','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(341,1,'Ubi Orange',NULL,NULL,12000,12000,100,10,'Ubi Orange',NULL,'Ubi Orange','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(342,1,'UBI UNGU',NULL,NULL,11000,11000,100,10,'UBI UNGU',NULL,'UBI UNGU','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(343,1,'UDANG REBON',NULL,NULL,115000,115000,100,10,'UDANG REBON',NULL,'UDANG REBON','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(344,1,'WAKEGI',NULL,NULL,72000,72000,100,10,'WAKEGI',NULL,'WAKEGI','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(345,1,'WALNUT 1 KG',NULL,NULL,150000,150000,99,10,'WALNUT 1 KG',NULL,'WALNUT 1 KG','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:36:01',1),(346,1,'WIJEN HITAM',NULL,NULL,72000,72000,99,10,'WIJEN HITAM',NULL,'WIJEN HITAM','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:36:01',14),(347,1,'WIJEN PUTIH UTUH',NULL,NULL,63000,63000,100,10,'WIJEN PUTIH UTUH',NULL,'WIJEN PUTIH UTUH','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(348,1,'WORTEL IMPOR',NULL,NULL,20000,20000,99,10,'WORTEL IMPOR',NULL,'WORTEL IMPOR','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:36:01',1),(349,1,'YAKULT 54/PCK',NULL,NULL,0,0,100,10,'YAKULT 54/PCK',NULL,'YAKULT 54/PCK','0','0','0','1',2,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',9),(350,1,'ZUKINI',NULL,NULL,20000,20000,100,10,'ZUKINI',NULL,'ZUKINI','0','0','0','1',1,1,'2025-02-25 11:16:07','2025-02-25 11:16:07',1),(351,1,'Maman Racing','MMNR-CG','maman-racing',10000,9000,40,10,'MMN-576-','1740502412.jpg',NULL,'0','0','0','1',4,1,'2025-02-25 16:53:32','2025-02-28 09:13:13',14),(355,1,'ngubah nama sama unit','SIT -LABO-RUM -SINT','ngubah-nama-sama-unit',643,329000,48,339,'CUM-QUE- QUI','1740813546.png','Mollitia consequatur','0','0','0','1',19,5,'2025-03-01 07:19:06','2025-03-01 07:28:22',11);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_invoice_purchases`
--

DROP TABLE IF EXISTS `product_invoice_purchases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_invoice_purchases` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `invoice_purchase_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `variant_id` bigint unsigned DEFAULT NULL,
  `batch_id` bigint unsigned DEFAULT NULL,
  `qty` int NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `discount` decimal(15,2) DEFAULT NULL,
  `total_price` decimal(15,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_invoice_purchases_invoice_purchase_id_foreign` (`invoice_purchase_id`),
  KEY `product_invoice_purchases_product_id_foreign` (`product_id`),
  KEY `product_invoice_purchases_variant_id_foreign` (`variant_id`),
  KEY `product_invoice_purchases_batch_id_foreign` (`batch_id`),
  CONSTRAINT `product_invoice_purchases_batch_id_foreign` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`id`),
  CONSTRAINT `product_invoice_purchases_invoice_purchase_id_foreign` FOREIGN KEY (`invoice_purchase_id`) REFERENCES `invoice_purchases` (`id`),
  CONSTRAINT `product_invoice_purchases_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `product_invoice_purchases_variant_id_foreign` FOREIGN KEY (`variant_id`) REFERENCES `variants` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_invoice_purchases`
--

LOCK TABLES `product_invoice_purchases` WRITE;
/*!40000 ALTER TABLE `product_invoice_purchases` DISABLE KEYS */;
INSERT INTO `product_invoice_purchases` VALUES (1,'2025-02-26 04:51:41','2025-02-26 04:51:41',1,13,NULL,NULL,0,63000.00,NULL,0.00),(2,'2025-02-26 04:51:41','2025-02-26 04:51:41',1,15,NULL,NULL,0,63000.00,NULL,0.00),(3,'2025-03-03 08:12:59','2025-03-03 08:12:59',2,13,NULL,NULL,1,63000.00,NULL,63000.00),(4,'2025-03-03 08:12:59','2025-03-03 08:12:59',2,15,NULL,NULL,1,63000.00,NULL,63000.00);
/*!40000 ALTER TABLE `product_invoice_purchases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_invoices`
--

DROP TABLE IF EXISTS `product_invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_invoices` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `invoice_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `qty` int NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `discount` decimal(15,2) DEFAULT NULL,
  `total` decimal(15,2) NOT NULL,
  `variant_id` bigint unsigned DEFAULT NULL,
  `batch_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_invoices_invoice_id_foreign` (`invoice_id`),
  KEY `product_invoices_product_id_foreign` (`product_id`),
  KEY `product_invoices_variant_id_foreign` (`variant_id`),
  KEY `product_invoices_batch_id_foreign` (`batch_id`),
  CONSTRAINT `product_invoices_batch_id_foreign` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`id`),
  CONSTRAINT `product_invoices_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`),
  CONSTRAINT `product_invoices_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `product_invoices_variant_id_foreign` FOREIGN KEY (`variant_id`) REFERENCES `variants` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_invoices`
--

LOCK TABLES `product_invoices` WRITE;
/*!40000 ALTER TABLE `product_invoices` DISABLE KEYS */;
INSERT INTO `product_invoices` VALUES (1,'2025-02-25 11:38:38','2025-02-25 11:38:38',1,345,0,150000.00,NULL,0.00,NULL,NULL),(2,'2025-02-25 11:38:38','2025-02-25 11:38:38',1,348,1,20000.00,NULL,20000.00,NULL,NULL),(3,'2025-02-25 11:38:38','2025-02-25 11:38:38',1,346,1,72000.00,NULL,72000.00,NULL,NULL),(4,'2025-02-26 03:14:45','2025-02-26 03:14:45',2,14,1,0.00,NULL,0.00,NULL,NULL),(5,'2025-02-26 03:14:45','2025-02-26 03:14:45',2,15,1,15000.00,NULL,15000.00,NULL,NULL),(6,'2025-02-28 09:46:41','2025-02-28 09:46:41',3,14,5,0.00,NULL,0.00,NULL,NULL),(7,'2025-02-28 09:46:41','2025-02-28 09:46:41',3,15,5,15000.00,NULL,75000.00,NULL,NULL),(8,'2025-02-28 09:46:41','2025-02-28 09:46:41',3,16,2,63000.00,NULL,126000.00,NULL,NULL),(9,'2025-02-28 09:53:31','2025-02-28 09:53:31',4,16,2,63000.00,NULL,126000.00,NULL,NULL),(10,'2025-02-28 09:53:31','2025-02-28 09:53:31',4,17,7,75000.00,NULL,525000.00,NULL,NULL),(11,'2025-03-01 08:43:47','2025-03-01 08:43:47',5,48,2,45000.00,NULL,90000.00,NULL,NULL),(12,'2025-03-01 08:43:47','2025-03-01 08:43:47',5,44,1,22871.00,NULL,22871.00,NULL,NULL),(13,'2025-03-03 08:01:41','2025-03-03 08:01:41',6,13,0,63000.00,NULL,0.00,NULL,NULL),(14,'2025-03-03 08:01:41','2025-03-03 08:01:41',6,18,1,45000.00,NULL,45000.00,NULL,NULL),(15,'2025-03-14 13:15:36','2025-03-14 13:15:36',7,16,1,63000.00,NULL,63000.00,NULL,NULL),(16,'2025-03-14 13:15:36','2025-03-14 13:15:36',7,18,1,45000.00,NULL,45000.00,NULL,NULL),(17,'2025-03-14 13:15:36','2025-03-14 13:15:36',7,23,1,60000.00,NULL,60000.00,NULL,NULL);
/*!40000 ALTER TABLE `product_invoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_price_by_customers`
--

DROP TABLE IF EXISTS `product_price_by_customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_price_by_customers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` bigint unsigned NOT NULL,
  `customer_id` bigint unsigned NOT NULL,
  `outlet_id` bigint unsigned NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `unit_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_price_by_customers_product_id_foreign` (`product_id`),
  KEY `product_price_by_customers_customer_id_foreign` (`customer_id`),
  KEY `product_price_by_customers_outlet_id_foreign` (`outlet_id`),
  KEY `product_price_by_customers_unit_id_foreign` (`unit_id`),
  CONSTRAINT `product_price_by_customers_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_price_by_customers_outlet_id_foreign` FOREIGN KEY (`outlet_id`) REFERENCES `outlets` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_price_by_customers_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_price_by_customers_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_price_by_customers`
--

LOCK TABLES `product_price_by_customers` WRITE;
/*!40000 ALTER TABLE `product_price_by_customers` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_price_by_customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_purchase`
--

DROP TABLE IF EXISTS `product_purchase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_purchase` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `purchase_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `quantity` int NOT NULL,
  `receive` int DEFAULT NULL,
  `unit_price` decimal(15,2) NOT NULL,
  `net_cost` decimal(15,2) NOT NULL,
  `discount` decimal(15,2) DEFAULT NULL,
  `tax` decimal(15,2) DEFAULT NULL,
  `tax_rate` decimal(5,2) DEFAULT NULL,
  `total_cost` decimal(15,2) NOT NULL,
  `variant_id` bigint unsigned DEFAULT NULL,
  `batch_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_purchase_purchase_id_foreign` (`purchase_id`),
  KEY `product_purchase_product_id_foreign` (`product_id`),
  KEY `product_purchase_variant_id_foreign` (`variant_id`),
  KEY `product_purchase_batch_id_foreign` (`batch_id`),
  CONSTRAINT `product_purchase_batch_id_foreign` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`id`),
  CONSTRAINT `product_purchase_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_purchase_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchase` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_purchase_variant_id_foreign` FOREIGN KEY (`variant_id`) REFERENCES `variants` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_purchase`
--

LOCK TABLES `product_purchase` WRITE;
/*!40000 ALTER TABLE `product_purchase` DISABLE KEYS */;
INSERT INTO `product_purchase` VALUES (3,'2025-02-26 04:50:44','2025-02-26 04:50:44',2,13,1,NULL,63000.00,63000.00,NULL,NULL,NULL,63000.00,NULL,NULL),(4,'2025-02-26 04:50:44','2025-02-26 04:50:44',2,15,3,NULL,15000.00,63000.00,NULL,NULL,NULL,189000.00,NULL,NULL),(5,'2025-02-28 08:12:26','2025-02-28 08:12:26',3,17,1,NULL,75000.00,75000.00,NULL,NULL,NULL,75000.00,NULL,NULL),(6,'2025-02-28 08:12:26','2025-02-28 08:12:26',3,13,4,NULL,63000.00,252000.00,NULL,NULL,NULL,252000.00,NULL,NULL),(7,'2025-03-01 07:54:22','2025-03-01 07:54:22',4,16,1,NULL,63000.00,63000.00,NULL,NULL,NULL,63000.00,NULL,NULL),(8,'2025-03-01 07:54:22','2025-03-01 07:54:22',4,15,10,NULL,15000.00,150000.00,NULL,NULL,NULL,150000.00,NULL,NULL),(9,'2025-03-01 07:54:22','2025-03-01 07:54:22',4,23,1,NULL,60000.00,60000.00,NULL,NULL,NULL,60000.00,NULL,NULL),(10,'2025-03-03 08:02:30','2025-03-03 08:02:30',5,13,1,NULL,63000.00,63000.00,NULL,NULL,NULL,63000.00,NULL,NULL),(11,'2025-03-03 08:02:30','2025-03-03 08:02:30',5,15,1,NULL,15000.00,15000.00,NULL,NULL,NULL,15000.00,NULL,NULL),(12,'2025-04-02 07:11:46','2025-04-02 07:11:46',6,13,1,NULL,63000.00,63000.00,NULL,NULL,NULL,63000.00,NULL,NULL);
/*!40000 ALTER TABLE `product_purchase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_return_purchases`
--

DROP TABLE IF EXISTS `product_return_purchases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_return_purchases` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `return_purchase_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `qty` decimal(20,2) NOT NULL,
  `price` decimal(20,2) NOT NULL,
  `discount` decimal(20,2) DEFAULT NULL,
  `tax` decimal(20,2) DEFAULT NULL,
  `total` decimal(20,2) NOT NULL,
  `variant_id` bigint unsigned DEFAULT NULL,
  `batch_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_return_purchases_return_purchase_id_foreign` (`return_purchase_id`),
  KEY `product_return_purchases_product_id_foreign` (`product_id`),
  KEY `product_return_purchases_variant_id_foreign` (`variant_id`),
  KEY `product_return_purchases_batch_id_foreign` (`batch_id`),
  CONSTRAINT `product_return_purchases_batch_id_foreign` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`id`),
  CONSTRAINT `product_return_purchases_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `product_return_purchases_return_purchase_id_foreign` FOREIGN KEY (`return_purchase_id`) REFERENCES `return_purchases` (`id`),
  CONSTRAINT `product_return_purchases_variant_id_foreign` FOREIGN KEY (`variant_id`) REFERENCES `variants` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_return_purchases`
--

LOCK TABLES `product_return_purchases` WRITE;
/*!40000 ALTER TABLE `product_return_purchases` DISABLE KEYS */;
INSERT INTO `product_return_purchases` VALUES (1,'2025-02-26 04:51:41','2025-02-26 04:51:41',1,13,100.00,63000.00,NULL,NULL,6300000.00,NULL,NULL),(2,'2025-02-26 04:51:41','2025-02-26 04:51:41',1,15,97.00,63000.00,NULL,NULL,6111000.00,NULL,NULL),(3,'2025-03-03 08:12:59','2025-03-03 08:12:59',2,13,0.00,63000.00,NULL,NULL,0.00,NULL,NULL),(4,'2025-03-03 08:12:59','2025-03-03 08:12:59',2,15,0.00,63000.00,NULL,NULL,0.00,NULL,NULL);
/*!40000 ALTER TABLE `product_return_purchases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_return_sales_order`
--

DROP TABLE IF EXISTS `product_return_sales_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_return_sales_order` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `return_sales_order_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `qty` decimal(20,2) NOT NULL,
  `price` bigint NOT NULL,
  `discount` decimal(20,2) DEFAULT NULL,
  `tax` decimal(20,2) DEFAULT NULL,
  `total` decimal(20,2) NOT NULL,
  `variant_id` bigint unsigned DEFAULT NULL,
  `batch_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_return_sales_order_return_sales_order_id_foreign` (`return_sales_order_id`),
  KEY `product_return_sales_order_variant_id_foreign` (`variant_id`),
  KEY `product_return_sales_order_batch_id_foreign` (`batch_id`),
  CONSTRAINT `product_return_sales_order_batch_id_foreign` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`id`),
  CONSTRAINT `product_return_sales_order_return_sales_order_id_foreign` FOREIGN KEY (`return_sales_order_id`) REFERENCES `return_sales_order` (`id`),
  CONSTRAINT `product_return_sales_order_variant_id_foreign` FOREIGN KEY (`variant_id`) REFERENCES `variants` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_return_sales_order`
--

LOCK TABLES `product_return_sales_order` WRITE;
/*!40000 ALTER TABLE `product_return_sales_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_return_sales_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_sales_orders`
--

DROP TABLE IF EXISTS `product_sales_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_sales_orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sales_order_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `variant_id` bigint unsigned DEFAULT NULL,
  `batch_id` bigint unsigned DEFAULT NULL,
  `qty` int NOT NULL,
  `unit_price` int NOT NULL,
  `total_price` int NOT NULL,
  `discount` int NOT NULL DEFAULT '0',
  `tax` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `product_sales_orders_sales_order_id_foreign` (`sales_order_id`),
  KEY `product_sales_orders_product_id_foreign` (`product_id`),
  KEY `product_sales_orders_variant_id_foreign` (`variant_id`),
  KEY `product_sales_orders_batch_id_foreign` (`batch_id`),
  CONSTRAINT `product_sales_orders_batch_id_foreign` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`id`),
  CONSTRAINT `product_sales_orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_sales_orders_sales_order_id_foreign` FOREIGN KEY (`sales_order_id`) REFERENCES `sales_orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_sales_orders_variant_id_foreign` FOREIGN KEY (`variant_id`) REFERENCES `variants` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_sales_orders`
--

LOCK TABLES `product_sales_orders` WRITE;
/*!40000 ALTER TABLE `product_sales_orders` DISABLE KEYS */;
INSERT INTO `product_sales_orders` VALUES (1,'2025-02-25 11:36:01','2025-02-25 11:36:01',1,345,NULL,NULL,1,150000,150000,0,0),(2,'2025-02-25 11:36:01','2025-02-25 11:36:01',1,348,NULL,NULL,1,20000,20000,0,0),(3,'2025-02-25 11:36:01','2025-02-25 11:36:01',1,346,NULL,NULL,1,72000,72000,0,0),(4,'2025-02-25 16:39:17','2025-02-25 16:39:17',2,16,NULL,NULL,2,63000,126000,0,0),(5,'2025-02-26 02:51:12','2025-02-26 02:51:12',3,14,NULL,NULL,1,0,0,0,0),(6,'2025-02-26 02:51:12','2025-02-26 02:51:12',3,15,NULL,NULL,1,15000,15000,0,0),(7,'2025-02-26 02:54:54','2025-02-26 02:54:54',4,16,NULL,NULL,2,63000,126000,0,0),(8,'2025-02-26 02:54:54','2025-02-26 02:54:54',4,17,NULL,NULL,1,75000,75000,0,0),(9,'2025-02-26 02:54:54','2025-02-26 02:54:54',4,15,NULL,NULL,1,15000,15000,0,0),(10,'2025-02-26 02:54:54','2025-02-26 02:54:54',4,21,NULL,NULL,1,24000,24000,0,0),(11,'2025-02-26 02:54:54','2025-02-26 02:54:54',4,14,NULL,NULL,2,0,0,0,0),(12,'2025-02-26 02:56:26','2025-02-26 02:56:26',5,14,NULL,NULL,1,0,0,0,0),(13,'2025-02-26 02:56:26','2025-02-26 02:56:26',5,15,NULL,NULL,1,15000,15000,0,0),(14,'2025-02-26 02:56:26','2025-02-26 02:56:26',5,16,NULL,NULL,1,63000,63000,0,0),(15,'2025-02-26 03:05:21','2025-02-26 03:05:21',6,22,NULL,NULL,1,31500,31500,0,0),(16,'2025-02-26 03:05:21','2025-02-26 03:05:21',6,21,NULL,NULL,1,24000,24000,0,0),(17,'2025-02-26 03:05:46','2025-02-26 03:05:46',7,18,NULL,NULL,1,45000,45000,0,0),(18,'2025-02-26 03:05:46','2025-02-26 03:05:46',7,17,NULL,NULL,1,75000,75000,0,0),(19,'2025-02-26 03:09:10','2025-02-26 03:09:10',8,17,NULL,NULL,1,75000,75000,0,0),(20,'2025-02-26 03:09:10','2025-02-26 03:09:10',8,18,NULL,NULL,1,45000,45000,0,0),(21,'2025-02-26 03:09:54','2025-02-26 03:09:54',9,16,NULL,NULL,1,63000,63000,0,0),(22,'2025-02-26 03:09:54','2025-02-26 03:09:54',9,18,NULL,NULL,1,45000,45000,0,0),(23,'2025-02-26 03:37:23','2025-02-26 03:37:23',10,18,NULL,NULL,4,45000,180000,0,0),(24,'2025-02-26 03:41:10','2025-02-26 03:41:10',11,16,NULL,NULL,1,63000,63000,0,0),(25,'2025-02-26 07:12:02','2025-02-26 07:12:02',12,13,NULL,NULL,1,63000,63000,0,0),(26,'2025-02-26 07:12:02','2025-02-26 07:12:02',12,14,NULL,NULL,1,0,0,0,0),(27,'2025-02-26 07:12:02','2025-02-26 07:12:02',12,16,NULL,NULL,1,63000,63000,0,0),(28,'2025-02-26 07:12:02','2025-02-26 07:12:02',12,17,NULL,NULL,1,75000,75000,0,0),(29,'2025-02-28 07:47:09','2025-02-28 07:47:09',13,16,NULL,NULL,5,63000,315000,0,0),(30,'2025-02-28 07:47:09','2025-02-28 07:47:09',13,17,NULL,NULL,3,75000,225000,0,0),(31,'2025-02-28 07:53:31','2025-02-28 07:53:31',14,16,NULL,NULL,2,63000,126000,0,0),(32,'2025-02-28 07:54:57','2025-02-28 07:54:57',15,18,NULL,NULL,2,45000,90000,0,0),(33,'2025-02-28 08:41:19','2025-02-28 08:41:19',16,29,NULL,NULL,1,0,0,0,0),(34,'2025-02-28 09:09:32','2025-02-28 09:09:32',17,17,NULL,NULL,3,75000,225000,0,0),(35,'2025-02-28 09:09:32','2025-02-28 09:09:32',17,13,NULL,NULL,4,63000,252000,0,0),(36,'2025-02-28 09:09:32','2025-02-28 09:09:32',17,16,NULL,NULL,1,63000,63000,0,0),(37,'2025-02-28 09:09:32','2025-02-28 09:09:32',17,18,NULL,NULL,1,45000,45000,0,0),(38,'2025-02-28 09:13:09','2025-02-28 09:13:09',18,16,NULL,NULL,1,63000,63000,0,0),(39,'2025-02-28 09:32:56','2025-02-28 09:32:56',19,15,NULL,NULL,10,15000,150000,0,0),(40,'2025-02-28 09:32:56','2025-02-28 09:32:56',19,16,NULL,NULL,5,63000,315000,0,0),(41,'2025-02-28 09:32:56','2025-02-28 09:32:56',19,17,NULL,NULL,5,75000,375000,0,0),(42,'2025-02-28 09:34:02','2025-02-28 09:34:02',20,14,NULL,NULL,10,0,0,0,0),(43,'2025-02-28 09:34:02','2025-02-28 09:34:02',20,15,NULL,NULL,5,15000,75000,0,0),(44,'2025-02-28 09:34:02','2025-02-28 09:34:02',20,16,NULL,NULL,2,63000,126000,0,0),(45,'2025-02-28 09:50:09','2025-02-28 09:50:09',21,16,NULL,NULL,5,63000,315000,0,0),(46,'2025-02-28 09:50:09','2025-02-28 09:50:09',21,17,NULL,NULL,7,75000,525000,0,0),(47,'2025-02-28 09:55:40','2025-02-28 09:55:40',22,17,NULL,NULL,7,75000,525000,0,0),(48,'2025-02-28 09:55:40','2025-02-28 09:55:40',22,18,NULL,NULL,5,45000,225000,0,0),(49,'2025-03-01 05:57:48','2025-03-01 05:57:48',23,16,NULL,NULL,1,63000,63000,0,0),(50,'2025-03-01 05:57:48','2025-03-01 05:57:48',23,17,NULL,NULL,1,75000,75000,0,0),(51,'2025-03-01 05:57:48','2025-03-01 05:57:48',23,18,NULL,NULL,1,45000,45000,0,0),(52,'2025-03-01 08:40:25','2025-03-01 08:40:25',34,44,NULL,NULL,10,22871,228710,0,0),(53,'2025-03-01 08:40:25','2025-03-01 08:40:25',34,76,NULL,NULL,8,14000,112000,0,0),(54,'2025-03-01 08:40:25','2025-03-01 08:40:25',34,17,NULL,NULL,1,75000,75000,0,0),(55,'2025-03-01 08:41:48','2025-03-01 08:41:48',35,44,NULL,NULL,10,22871,228710,0,0),(56,'2025-03-01 08:41:48','2025-03-01 08:41:48',35,76,NULL,NULL,8,14000,112000,0,0),(57,'2025-03-01 08:41:48','2025-03-01 08:41:48',35,17,NULL,NULL,1,75000,75000,0,0),(58,'2025-03-01 08:42:19','2025-03-01 08:42:19',36,48,NULL,NULL,10,45000,450000,0,0),(59,'2025-03-01 08:42:19','2025-03-01 08:42:19',36,44,NULL,NULL,1,22871,22871,0,0),(60,'2025-03-03 07:58:30','2025-03-03 07:58:30',37,13,NULL,NULL,1,63000,63000,0,0),(61,'2025-03-03 07:58:30','2025-03-03 07:58:30',37,18,NULL,NULL,1,45000,45000,0,0),(62,'2025-03-14 13:14:16','2025-03-14 13:14:16',38,16,NULL,NULL,1,63000,63000,0,0),(63,'2025-03-14 13:14:16','2025-03-14 13:14:16',38,18,NULL,NULL,1,45000,45000,0,0),(64,'2025-03-14 13:14:16','2025-03-14 13:14:16',38,23,NULL,NULL,2,60000,120000,0,0);
/*!40000 ALTER TABLE `product_sales_orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_surat_jalans`
--

DROP TABLE IF EXISTS `product_surat_jalans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_surat_jalans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `surat_jalan_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `qty` int NOT NULL,
  `unit_price` int NOT NULL,
  `total_price` int NOT NULL,
  `variant_id` bigint unsigned DEFAULT NULL,
  `batch_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_surat_jalans_surat_jalan_id_foreign` (`surat_jalan_id`),
  KEY `product_surat_jalans_product_id_foreign` (`product_id`),
  KEY `product_surat_jalans_variant_id_foreign` (`variant_id`),
  KEY `product_surat_jalans_batch_id_foreign` (`batch_id`),
  CONSTRAINT `product_surat_jalans_batch_id_foreign` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`id`),
  CONSTRAINT `product_surat_jalans_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_surat_jalans_surat_jalan_id_foreign` FOREIGN KEY (`surat_jalan_id`) REFERENCES `surat_jalans` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_surat_jalans_variant_id_foreign` FOREIGN KEY (`variant_id`) REFERENCES `variants` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_surat_jalans`
--

LOCK TABLES `product_surat_jalans` WRITE;
/*!40000 ALTER TABLE `product_surat_jalans` DISABLE KEYS */;
INSERT INTO `product_surat_jalans` VALUES (1,'2025-02-25 11:36:35','2025-02-25 11:36:35',1,345,1,150000,150000,NULL,NULL),(2,'2025-02-25 11:36:35','2025-02-25 11:36:35',1,348,1,20000,20000,NULL,NULL),(3,'2025-02-25 11:36:35','2025-02-25 11:36:35',1,346,1,72000,72000,NULL,NULL),(5,'2025-02-26 03:05:58','2025-02-26 03:05:58',3,14,1,0,0,NULL,NULL),(6,'2025-02-26 03:05:58','2025-02-26 03:05:58',3,15,1,15000,15000,NULL,NULL),(19,'2025-02-28 09:45:51','2025-02-28 09:45:51',7,14,5,0,0,NULL,NULL),(20,'2025-02-28 09:45:51','2025-02-28 09:45:51',7,15,5,15000,75000,NULL,NULL),(21,'2025-02-28 09:45:51','2025-02-28 09:45:51',7,16,2,63000,126000,NULL,NULL),(22,'2025-02-28 09:52:32','2025-02-28 09:52:32',8,16,2,63000,126000,NULL,NULL),(23,'2025-02-28 09:52:32','2025-02-28 09:52:32',8,17,7,75000,525000,NULL,NULL),(24,'2025-02-28 09:56:27','2025-02-28 09:56:27',9,17,5,75000,375000,NULL,NULL),(25,'2025-02-28 09:56:27','2025-03-01 08:32:42',9,18,6,45000,270000,NULL,NULL),(26,'2025-03-01 08:43:27','2025-03-01 08:43:27',10,48,5,45000,225000,NULL,NULL),(27,'2025-03-01 08:43:27','2025-03-01 08:43:27',10,44,1,22871,22871,NULL,NULL),(28,'2025-03-03 08:00:35','2025-03-03 08:00:35',11,13,0,63000,0,NULL,NULL),(29,'2025-03-03 08:00:35','2025-03-03 08:00:35',11,18,1,45000,45000,NULL,NULL),(30,'2025-03-14 13:15:09','2025-03-14 13:15:09',12,16,1,63000,63000,NULL,NULL),(31,'2025-03-14 13:15:09','2025-03-14 13:15:09',12,18,1,45000,45000,NULL,NULL),(32,'2025-03-14 13:15:09','2025-03-14 13:15:09',12,23,2,60000,120000,NULL,NULL);
/*!40000 ALTER TABLE `product_surat_jalans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase`
--

DROP TABLE IF EXISTS `purchase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `purchase` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reference_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `supplier_id` bigint unsigned NOT NULL,
  `outlet_id` bigint unsigned NOT NULL,
  `total_qty` int NOT NULL,
  `total_discount` decimal(15,2) DEFAULT NULL,
  `total_tax` decimal(15,2) DEFAULT NULL,
  `total_cost` decimal(15,2) NOT NULL,
  `order_tax_rate` decimal(5,2) DEFAULT NULL,
  `order_tax` decimal(15,2) DEFAULT NULL,
  `order_discount` decimal(15,2) DEFAULT NULL,
  `shipping_cost` decimal(15,2) DEFAULT NULL,
  `grand_total` decimal(15,2) NOT NULL,
  `paid_amount` decimal(15,2) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `purchase_user_id_foreign` (`user_id`),
  KEY `purchase_supplier_id_foreign` (`supplier_id`),
  KEY `purchase_outlet_id_foreign` (`outlet_id`),
  CONSTRAINT `purchase_outlet_id_foreign` FOREIGN KEY (`outlet_id`) REFERENCES `outlets` (`id`) ON DELETE CASCADE,
  CONSTRAINT `purchase_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`) ON DELETE CASCADE,
  CONSTRAINT `purchase_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase`
--

LOCK TABLES `purchase` WRITE;
/*!40000 ALTER TABLE `purchase` DISABLE KEYS */;
INSERT INTO `purchase` VALUES (2,'2025-02-26 04:50:44','2025-02-26 04:51:41','PO-1740545444',4,2,1,4,NULL,NULL,252000.00,NULL,0.00,0.00,NULL,252000.00,NULL,'completed','unpaid',NULL,'Jangan pake sambel',NULL),(3,'2025-02-28 08:12:26','2025-02-28 08:12:26','PO-1740730346',4,2,1,5,NULL,NULL,327000.00,NULL,NULL,NULL,NULL,327000.00,NULL,'pending','unpaid',NULL,'-',NULL),(4,'2025-03-01 07:54:22','2025-03-01 07:54:22','PO-1740815662',14,10,1,12,NULL,NULL,400000.00,NULL,NULL,NULL,NULL,273000.00,NULL,'pending','unpaid',NULL,'-',NULL),(5,'2025-03-03 08:02:30','2025-03-03 08:12:59','PO-1740988950',14,10,1,2,NULL,NULL,100000.00,NULL,NULL,NULL,NULL,78000.00,NULL,'completed','unpaid',NULL,'-',NULL),(6,'2025-04-02 07:11:46','2025-04-02 07:11:46','PO-1743577906',14,10,1,1,NULL,NULL,63000.00,NULL,NULL,NULL,NULL,63000.00,NULL,'pending','unpaid',NULL,'-',NULL);
/*!40000 ALTER TABLE `purchase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `return_purchases`
--

DROP TABLE IF EXISTS `return_purchases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `return_purchases` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `outlet_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `purchase_id` bigint unsigned NOT NULL,
  `return_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `return_date` date NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `total_qty` decimal(20,2) NOT NULL,
  `total_discount` decimal(20,2) DEFAULT NULL,
  `total_tax` decimal(20,2) DEFAULT NULL,
  `grand_total` decimal(20,2) NOT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `return_purchases_outlet_id_foreign` (`outlet_id`),
  KEY `return_purchases_user_id_foreign` (`user_id`),
  KEY `return_purchases_purchase_id_foreign` (`purchase_id`),
  CONSTRAINT `return_purchases_outlet_id_foreign` FOREIGN KEY (`outlet_id`) REFERENCES `outlets` (`id`),
  CONSTRAINT `return_purchases_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchase` (`id`),
  CONSTRAINT `return_purchases_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `return_purchases`
--

LOCK TABLES `return_purchases` WRITE;
/*!40000 ALTER TABLE `return_purchases` DISABLE KEYS */;
INSERT INTO `return_purchases` VALUES (1,'2025-02-26 04:51:41','2025-02-26 04:51:41',1,4,2,'RET-INV/20250226/3494','2025-02-26','-',197.00,NULL,NULL,12411000.00,NULL),(2,'2025-03-03 08:12:59','2025-03-03 08:12:59',1,14,5,'RET-INV/20250303/7804','2025-03-03','-',0.00,NULL,NULL,0.00,NULL);
/*!40000 ALTER TABLE `return_purchases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `return_sales_order`
--

DROP TABLE IF EXISTS `return_sales_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `return_sales_order` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `outlet_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `sales_order_id` bigint unsigned NOT NULL,
  `return_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `return_date` date NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `total_qty` decimal(20,2) NOT NULL,
  `total_discount` decimal(20,2) DEFAULT NULL,
  `total_tax` decimal(20,2) DEFAULT NULL,
  `grand_total` decimal(20,2) NOT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `return_sales_order_outlet_id_foreign` (`outlet_id`),
  KEY `return_sales_order_user_id_foreign` (`user_id`),
  KEY `return_sales_order_sales_order_id_foreign` (`sales_order_id`),
  CONSTRAINT `return_sales_order_outlet_id_foreign` FOREIGN KEY (`outlet_id`) REFERENCES `outlets` (`id`),
  CONSTRAINT `return_sales_order_sales_order_id_foreign` FOREIGN KEY (`sales_order_id`) REFERENCES `sales_orders` (`id`),
  CONSTRAINT `return_sales_order_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `return_sales_order`
--

LOCK TABLES `return_sales_order` WRITE;
/*!40000 ALTER TABLE `return_sales_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `return_sales_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,8),(2,8),(3,8),(4,8),(5,8),(6,8),(7,8),(8,8),(9,8),(10,8),(11,8),(12,8),(13,8),(14,8),(15,8),(16,8),(17,8),(18,8),(19,8),(20,8),(21,8),(22,8),(23,8),(24,8),(25,8),(26,8),(27,8),(29,8),(30,8),(31,8),(32,8),(33,8),(34,8),(35,8),(36,8),(37,8),(38,8),(39,8),(40,8),(41,8),(42,8),(43,8),(44,8),(45,8),(46,8),(47,8),(48,8),(49,8),(50,8),(51,8),(52,8),(53,8),(54,8),(55,8),(56,8),(57,8),(58,8),(59,8),(60,8),(61,8),(62,8),(63,8),(64,8),(65,8),(66,8),(67,8),(68,8),(69,8),(70,8),(71,8),(72,8),(73,8),(74,8),(75,8),(76,8),(77,8),(78,8),(79,8),(80,8),(81,8),(82,8),(83,8),(84,8),(85,8),(86,8),(87,8),(88,8),(89,8),(90,8),(91,8),(92,8),(93,8),(94,8),(95,8),(96,8),(1,9),(2,9),(3,9),(4,9),(5,9),(11,9),(13,9),(15,9),(16,9),(17,9),(18,9),(19,9),(20,9),(21,9),(22,9),(23,9),(29,9),(30,9),(31,9),(32,9),(33,9),(34,9),(35,9),(36,9),(37,9),(38,9),(39,9),(40,9),(41,9),(42,9),(43,9),(44,9),(45,9),(46,9),(47,9),(48,9),(49,9),(50,9),(51,9),(52,9),(53,9),(54,9),(55,9),(56,9),(57,9),(58,9),(59,9),(60,9),(61,9),(62,9),(63,9),(64,9),(65,9),(66,9),(67,9),(68,9),(69,9),(70,9),(71,9),(72,9),(73,9),(74,9),(75,9),(76,9),(77,9),(78,9),(79,9),(80,9),(81,9),(82,9),(83,9),(84,9),(85,9),(86,9),(87,9),(88,9),(89,9),(90,9),(91,9),(92,9),(93,9),(94,9),(95,9),(96,9),(2,10),(4,10),(5,10),(20,10),(1,11),(2,11),(3,11),(4,11),(5,11);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (8,'super-admin','web','2025-02-14 00:09:27','2025-02-14 00:09:27'),(9,'admin','web','2025-02-14 00:09:27','2025-02-14 00:09:27'),(10,'user','web','2025-02-14 00:09:27','2025-02-14 00:09:27'),(11,'Customer','web','2025-02-25 09:32:32','2025-02-25 09:32:32');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales_orders`
--

DROP TABLE IF EXISTS `sales_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sales_orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `outlet_id` bigint unsigned NOT NULL,
  `customer_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `coupon_id` bigint unsigned DEFAULT NULL,
  `reference_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_qty` int NOT NULL DEFAULT '0',
  `total_discount` int NOT NULL DEFAULT '0',
  `total_tax` int NOT NULL DEFAULT '0',
  `grandtotal` int NOT NULL,
  `order_tax_rate` int NOT NULL DEFAULT '0',
  `order_tax` int NOT NULL DEFAULT '0',
  `shipping_cost` int NOT NULL DEFAULT '0',
  `status` enum('pending','process','completed','canceled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_amount` int NOT NULL DEFAULT '0',
  `note` text COLLATE utf8mb4_unicode_ci,
  `coupon_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_amount` decimal(10,2) DEFAULT '0.00',
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales_orders`
--

LOCK TABLES `sales_orders` WRITE;
/*!40000 ALTER TABLE `sales_orders` DISABLE KEYS */;
INSERT INTO `sales_orders` VALUES (1,'2025-02-25 11:36:01','2025-02-25 11:38:38',1,5,4,NULL,'SO-1740483361',3,0,0,242000,0,0,0,'completed',NULL,0,'-',NULL,0.00,NULL),(2,'2025-02-25 16:39:17','2025-02-28 08:35:19',1,6,4,1,'SO-1740501557',2,3000,0,123000,0,0,0,'pending',NULL,150,'-',NULL,0.00,NULL),(3,'2025-02-26 02:51:12','2025-02-26 03:14:45',1,5,4,1,'SO-1740538272',2,3000,0,12000,0,0,0,'completed',NULL,0,'-',NULL,0.00,NULL),(4,'2025-02-26 02:54:54','2025-02-28 08:35:37',1,5,4,1,'SO-1740538494',7,3000,0,237000,0,0,0,'pending',NULL,1,'-',NULL,0.00,NULL),(5,'2025-02-26 02:56:26','2025-02-26 02:56:26',1,5,4,1,'SO-1740538586',3,3000,0,75000,0,0,0,'pending',NULL,0,'-',NULL,0.00,NULL),(6,'2025-02-26 03:05:21','2025-02-26 03:05:21',1,5,4,NULL,'SO-1740539121',2,0,0,55500,0,0,0,'pending',NULL,50,'-',NULL,0.00,NULL),(7,'2025-02-26 03:05:46','2025-02-28 08:11:13',1,5,4,NULL,'SO-1740539146',2,0,0,120000,0,0,0,'pending',NULL,100,'-',NULL,0.00,NULL),(8,'2025-02-26 03:09:10','2025-02-26 03:09:10',1,6,4,1,'SO-1740539350',2,3000,0,117000,0,0,0,'pending',NULL,100,'-',NULL,0.00,NULL),(9,'2025-02-26 03:09:54','2025-02-26 03:09:54',1,6,4,1,'SO-1740539394',2,3000,0,105000,0,0,0,'pending',NULL,1,'-',NULL,0.00,NULL),(10,'2025-02-26 03:37:23','2025-02-26 03:37:23',1,7,4,NULL,'SO-1740541043',4,0,0,180000,0,0,0,'pending',NULL,0,'-',NULL,0.00,NULL),(11,'2025-02-26 03:41:10','2025-02-26 03:41:10',1,6,4,NULL,'SO-1740541270',1,0,0,63000,0,0,0,'pending',NULL,0,'-',NULL,0.00,NULL),(12,'2025-02-26 07:12:02','2025-02-26 07:12:02',1,10,4,1,'SO-1740553922',4,3000,0,198000,0,0,0,'pending',NULL,8,'-',NULL,0.00,NULL),(13,'2025-02-28 07:47:09','2025-02-28 07:47:09',1,5,4,5,'SO-1740728829',8,540000,0,0,0,0,0,'pending',NULL,0,'-',NULL,0.00,NULL),(14,'2025-02-28 07:53:31','2025-02-28 07:53:31',1,10,4,5,'SO-1740729211',2,126000,0,0,0,0,0,'pending',NULL,126,'-',NULL,0.00,NULL),(15,'2025-02-28 07:54:57','2025-02-28 07:54:57',1,5,4,5,'SO-1740729297',2,90000,0,0,0,0,0,'pending',NULL,0,'-',NULL,0.00,NULL),(16,'2025-02-28 08:41:19','2025-02-28 08:41:19',1,7,4,NULL,'SO-1740732079',1,0,0,0,0,0,0,'pending',NULL,0,'-',NULL,0.00,NULL),(17,'2025-02-28 09:09:32','2025-02-28 09:09:32',1,10,4,3,'SO-1740733772',9,579150,0,5850,0,0,0,'pending',NULL,10,'-',NULL,0.00,NULL),(18,'2025-02-28 09:13:09','2025-02-28 09:13:09',1,10,4,3,'SO-1740733989',1,62370,0,630,0,0,0,'pending',NULL,630,'-',NULL,0.00,NULL),(19,'2025-02-28 09:32:56','2025-02-28 09:32:56',1,5,14,5,'SO-1740735176',20,588000,0,252000,0,0,0,'pending',NULL,0,'-',NULL,0.00,NULL),(20,'2025-02-28 09:34:02','2025-02-28 09:46:41',1,5,14,5,'SO-1740735242',17,140700,0,60300,0,0,0,'completed',NULL,0,'-',NULL,0.00,NULL),(21,'2025-02-28 09:50:09','2025-02-28 09:53:31',1,5,14,5,'SO-1740736209',12,588000,0,252000,0,0,0,'completed',NULL,0,'-',NULL,0.00,NULL),(22,'2025-02-28 09:55:40','2025-02-28 09:56:27',1,5,14,NULL,'SO-1740736540',12,0,0,750000,0,0,0,'process',NULL,500,'-',NULL,0.00,NULL),(23,'2025-03-01 05:57:48','2025-03-01 05:57:48',1,5,14,NULL,'SO-1740808668',3,0,0,183000,0,0,0,'pending',NULL,0,'-',NULL,0.00,NULL),(34,'2025-03-01 08:40:25','2025-03-01 08:40:25',1,5,14,NULL,'SO-1740818425',19,0,0,415710,0,0,0,'pending',NULL,0,'-',NULL,0.00,NULL),(35,'2025-03-01 08:41:48','2025-03-01 08:41:48',1,5,14,NULL,'SO-1740818508',19,0,0,415710,0,0,0,'pending',NULL,0,'-',NULL,0.00,NULL),(36,'2025-03-01 08:42:19','2025-03-01 08:43:47',1,5,14,NULL,'SO-1740818539',11,0,0,472871,0,0,0,'completed',NULL,0,'-',NULL,0.00,NULL),(37,'2025-03-03 07:58:30','2025-03-03 08:01:41',1,5,14,NULL,'SO-1740988710',2,0,0,108000,0,0,0,'completed',NULL,100,'-',NULL,0.00,'Cash'),(38,'2025-03-14 13:14:16','2025-03-14 13:15:36',1,5,14,NULL,'SO-1741958056',4,0,0,228000,0,0,0,'completed',NULL,0,'-',NULL,0.00,'Cash');
/*!40000 ALTER TABLE `sales_orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locked` tinyint(1) NOT NULL,
  `payload` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `settings_group_index` (`group`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'general-settings','logo',0,'\"https://koyasai.co.id/storage/4/safeimagekit-LOGO_KOYASAI_PUTIH__1_-removebg-preview.png\"','2025-02-13 23:27:44','2025-03-01 06:35:33'),(2,'general-settings','favicon',0,'\"https://koyasai.co.id/storage/6/safeimagekit-LOGO_KOYASAI_PUTIH__1_-removebg-preview.png\"','2025-02-13 23:27:44','2025-03-01 06:35:33'),(3,'general-settings','dark_logo',0,'\"https://koyasai.co.id/storage/5/safeimagekit-LOGO_KOYASAI_PUTIH__1_-removebg-preview.png\"','2025-02-13 23:27:44','2025-03-01 06:35:33'),(4,'general-settings','guest_logo',0,'\"http://193.203.162.113/images/guest-logo.svg\"','2025-02-13 23:27:44','2025-03-01 06:35:33'),(5,'general-settings','guest_background',0,'\"https://koyasai.co.id/storage/7/guest-background.svg\"','2025-02-13 23:27:44','2025-03-01 06:35:33');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_op_names`
--

DROP TABLE IF EXISTS `stock_op_names`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stock_op_names` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `outlet_id` bigint unsigned NOT NULL,
  `initial_qty` int NOT NULL,
  `actual_qty` int NOT NULL,
  `difference` int NOT NULL,
  `opname_date` date NOT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `stock_op_names_product_id_foreign` (`product_id`),
  KEY `stock_op_names_outlet_id_foreign` (`outlet_id`),
  CONSTRAINT `stock_op_names_outlet_id_foreign` FOREIGN KEY (`outlet_id`) REFERENCES `outlets` (`id`) ON DELETE CASCADE,
  CONSTRAINT `stock_op_names_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_op_names`
--

LOCK TABLES `stock_op_names` WRITE;
/*!40000 ALTER TABLE `stock_op_names` DISABLE KEYS */;
/*!40000 ALTER TABLE `stock_op_names` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `supplier` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `outlet_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_branch` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_holder` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `supplier_outlet_id_foreign` (`outlet_id`),
  CONSTRAINT `supplier_outlet_id_foreign` FOREIGN KEY (`outlet_id`) REFERENCES `outlets` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier`
--

LOCK TABLES `supplier` WRITE;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` VALUES (2,'2025-02-25 16:11:52','2025-02-28 07:38:11',NULL,'Sayuranku','sayuranku@gmail.com','0812698726','Bandung Lautan Istri','CV Sayuranku Sehat Selalu','Toko Sayur Cikurubuk','BCA','HZ Tasikmalaya','Icam','790186239'),(9,'2025-02-28 08:11:08','2025-02-28 08:11:08',NULL,'Jauhari Masih Senin','jauh@hari.com','0838403','Bukit Sinabung','JSN','Jauhari Store Nasional','Mandiri','HZ','Jauhari','4590398'),(10,'2025-03-01 07:48:53','2025-03-01 07:53:40',1,'Kang beni','beni@mail.com','0851232132','Tasikmalaya','BENI BERKAH','BERKAH JAYA','BCA','SUTSEN','BENI NUR HAMADAH','13213231322132'),(11,'2025-04-02 06:44:58','2025-04-02 06:44:58',1,'1231231','asdajjsdjk@gmail.com','1231231','ksldjalksdjal','ksjdljslfjsldfjs','ksdjflsjdfk','sdfsdfs','sfsdfds','sdfsdfs','132123132123');
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `surat_jalans`
--

DROP TABLE IF EXISTS `surat_jalans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `surat_jalans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sales_order_id` bigint unsigned NOT NULL,
  `reference_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `packer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driver` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `signature_gudang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signature_penerima` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signature_driver` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_qty` int DEFAULT NULL,
  `grand_total` decimal(20,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `surat_jalans_sales_order_id_foreign` (`sales_order_id`),
  CONSTRAINT `surat_jalans_sales_order_id_foreign` FOREIGN KEY (`sales_order_id`) REFERENCES `sales_orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `surat_jalans`
--

LOCK TABLES `surat_jalans` WRITE;
/*!40000 ALTER TABLE `surat_jalans` DISABLE KEYS */;
INSERT INTO `surat_jalans` VALUES (1,'2025-02-25 11:36:35','2025-02-26 07:35:31',1,NULL,'Steven austin','Deni','2025-02-26',NULL,NULL,NULL,3,242000.00),(3,'2025-02-26 03:05:58','2025-02-26 03:05:58',3,NULL,NULL,'Galih','2025-02-26',NULL,NULL,NULL,2,15000.00),(7,'2025-02-28 09:45:51','2025-02-28 09:45:51',20,'SJ-1740735951','Galih','Irfan','2025-03-31',NULL,NULL,NULL,12,201000.00),(8,'2025-02-28 09:52:32','2025-02-28 09:52:32',21,'SJ-1740736352','121212','1212','2025-05-30',NULL,NULL,NULL,9,651000.00),(9,'2025-02-28 09:56:27','2025-03-01 08:32:42',22,'SJ-1740736587','galih','galih','2025-03-31',NULL,NULL,NULL,11,644500.00),(10,'2025-03-01 08:43:27','2025-03-01 08:43:27',36,'SJ-1740818607','icim','Galih','2025-03-01',NULL,NULL,NULL,6,247871.00),(11,'2025-03-03 08:00:35','2025-03-03 08:00:35',37,'SJ-1740988835','aaaaaa','aaa','2025-03-03',NULL,NULL,NULL,1,44900.00),(12,'2025-03-14 13:15:09','2025-03-14 13:15:09',38,'SJ-1741958109','galih','hissam','2025-03-14',NULL,NULL,NULL,4,228000.00);
/*!40000 ALTER TABLE `surat_jalans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tax`
--

DROP TABLE IF EXISTS `tax`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tax` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `outlet_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = tidak aktif 1 = aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tax_outlet_id_foreign` (`outlet_id`),
  CONSTRAINT `tax_outlet_id_foreign` FOREIGN KEY (`outlet_id`) REFERENCES `outlets` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tax`
--

LOCK TABLES `tax` WRITE;
/*!40000 ALTER TABLE `tax` DISABLE KEYS */;
/*!40000 ALTER TABLE `tax` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taxes`
--

DROP TABLE IF EXISTS `taxes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `taxes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `outlet_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` decimal(20,2) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `taxes_outlet_id_foreign` (`outlet_id`),
  CONSTRAINT `taxes_outlet_id_foreign` FOREIGN KEY (`outlet_id`) REFERENCES `outlets` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taxes`
--

LOCK TABLES `taxes` WRITE;
/*!40000 ALTER TABLE `taxes` DISABLE KEYS */;
INSERT INTO `taxes` VALUES (3,1,'2025-02-26 02:52:15','2025-02-28 07:56:34','PPN Cabang Bangkok',7.00,0),(5,1,'2025-02-28 07:20:34','2025-02-28 07:56:34','haha',20.00,1);
/*!40000 ALTER TABLE `taxes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unit`
--

DROP TABLE IF EXISTS `unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `unit` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `outlet_id` bigint unsigned DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `base_unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operator` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operation_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = tidak aktif 1 = aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `unit_outlet_id_foreign` (`outlet_id`),
  CONSTRAINT `unit_outlet_id_foreign` FOREIGN KEY (`outlet_id`) REFERENCES `outlets` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unit`
--

LOCK TABLES `unit` WRITE;
/*!40000 ALTER TABLE `unit` DISABLE KEYS */;
/*!40000 ALTER TABLE `unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `units`
--

DROP TABLE IF EXISTS `units`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `units` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `outlet_id` bigint unsigned DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `base_unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operator` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operation_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = tidak aktif 1 = aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `units_outlet_id_foreign` (`outlet_id`),
  CONSTRAINT `units_outlet_id_foreign` FOREIGN KEY (`outlet_id`) REFERENCES `outlets` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `units`
--

LOCK TABLES `units` WRITE;
/*!40000 ALTER TABLE `units` DISABLE KEYS */;
INSERT INTO `units` VALUES (1,1,'KG','Kilogram','KG','=','1','1','2025-02-24 14:22:07','2025-02-24 14:22:07'),(2,1,'BTL-500ML','Botol 500ML','BTL','=','1','1','2025-02-24 14:22:07','2025-02-24 14:22:07'),(3,1,'BTL-130GR','Botol 130GR','BTL','=','1','1','2025-02-24 14:22:07','2025-02-24 14:22:07'),(4,1,'PCK-500GR','Pack 500GR','PCK','=','1','1','2025-02-24 14:22:07','2025-02-24 14:22:07'),(5,1,'PCK-300GR','Pack 300GR','PCK','=','1','1','2025-02-24 14:22:07','2025-02-24 14:22:07'),(6,1,'PCS','Pieces','PCS','=','1','1','2025-02-24 14:22:07','2025-02-24 14:22:07'),(7,1,'PACK-500GR','Pack 500GR','PACK','=','1','1','2025-02-24 14:22:07','2025-02-24 14:22:07'),(8,1,'PCK-250GR','Pack 250GR','PCK','=','1','1','2025-02-24 14:22:07','2025-02-24 14:22:07'),(9,1,'PCK-1KG','Pack 1KG','PCK','=','1','1','2025-02-24 14:22:07','2025-02-24 14:22:07'),(10,1,'BTL-250ML','Botol 250ML','BTL','=','1','1','2025-02-24 14:22:07','2025-02-24 14:22:07'),(11,1,'PACK-275GR','Pack 275GR','PACK','=','1','1','2025-02-24 14:22:07','2025-02-24 14:22:07'),(12,1,'BTL-8GR','Botol 8GR','BTL','=','1','1','2025-02-24 14:22:07','2025-02-24 14:22:07'),(13,1,'PCK-10GR','Pack 10GR','PCK','=','1','1','2025-02-24 14:22:07','2025-02-24 14:22:07'),(14,1,'PCK-40GR','Pack 40GR','PCK','=','1','1','2025-02-24 14:22:07','2025-02-24 14:22:07'),(15,1,'PCK-170GR','Pack 170GR','PCK','=','1','1','2025-02-24 14:22:07','2025-02-24 14:22:07'),(16,1,'PCK-165GR','Pack 165GR','PCK','=','1','1','2025-02-24 14:22:07','2025-02-24 14:22:07'),(17,1,'PCK-1LTR','Pack 1LTR','PCK','=','1','1','2025-02-24 14:22:07','2025-02-24 14:22:07'),(18,1,'PCK-5SLICE','Pack 5 Slice','PCK','=','1','1','2025-02-24 14:22:07','2025-02-24 14:22:07'),(19,1,'PACK-100GR','Pack 100GR','PACK','=','1','1','2025-02-24 14:22:07','2025-02-24 14:22:07'),(20,1,'PACK-200GR','Pack 200GR','PACK','=','1','1','2025-02-24 14:22:07','2025-02-24 14:22:07'),(21,1,'PACK-1KG','Pack 1KG','PACK','=','1','1','2025-02-24 14:22:07','2025-02-24 14:22:07'),(22,1,'CAN-227GR','Can 227GR','CAN','=','1','1','2025-02-24 14:22:07','2025-02-24 14:22:07'),(23,1,'CAN-1000GR','Can 1000GR','CAN','=','1','1','2025-02-24 14:22:07','2025-02-24 14:22:07'),(24,1,'PAPAN','Papan','PAPAN','=','1','1','2025-02-24 14:22:07','2025-02-24 14:22:07'),(25,1,'BUAH','Buah','BUAH','=','1','1','2025-02-24 14:22:07','2025-02-24 14:22:07'),(26,1,'BTR','Butir','BTR','=','1','1','2025-02-24 14:22:07','2025-02-24 14:22:07'),(27,1,'SISIR','Sisir','SISIR','=','1','1','2025-02-24 14:22:07','2025-02-24 14:22:07'),(28,1,'LBR','Lembar','LBR','=','1','1','2025-02-24 14:22:07','2025-02-24 14:22:07'),(29,1,'LTR','Liter','LTR','=','1','1','2025-02-24 14:22:07','2025-02-24 14:22:07'),(30,1,'BOX-50PCS','Box 50PCS','BOX','=','1','1','2025-02-24 14:22:07','2025-02-24 14:22:07'),(31,1,'BAL','Bal','BAL','=','1','1','2025-02-24 14:22:07','2025-02-24 14:22:07'),(32,1,'KG','Kilogram','KG','=','1','1','2025-02-24 14:22:09','2025-02-24 14:22:09'),(33,1,'BTL-500ML','Botol 500ML','BTL','=','1','1','2025-02-24 14:22:09','2025-02-24 14:22:09'),(34,1,'BTL-130GR','Botol 130GR','BTL','=','1','1','2025-02-24 14:22:09','2025-02-24 14:22:09'),(36,1,'PCK-500GR','Pack 500GR','PCK','=','1','1','2025-02-24 14:22:09','2025-02-24 14:22:09'),(37,1,'PCK-300GR','Pack 300GR','PCK','=','1','1','2025-02-24 14:22:09','2025-02-24 14:22:09'),(38,1,'PCS','Pieces','PCS','=','1','1','2025-02-24 14:22:09','2025-02-24 14:22:09'),(39,1,'PACK-500GR','Pack 500GR','PACK','=','1','1','2025-02-24 14:22:09','2025-02-24 14:22:09'),(40,1,'PCK-250GR','Pack 250GR','PCK','=','1','1','2025-02-24 14:22:09','2025-02-24 14:22:09'),(41,1,'PCK-1KG','Pack 1KG','PCK','=','1','1','2025-02-24 14:22:09','2025-02-24 14:22:09'),(42,1,'BTL-250ML','Botol 250ML','BTL','=','1','1','2025-02-24 14:22:09','2025-02-24 14:22:09'),(43,1,'PACK-275GR','Pack 275GR','PACK','=','1','1','2025-02-24 14:22:09','2025-02-24 14:22:09'),(44,1,'BTL-8GR','Botol 8GR','BTL','=','1','1','2025-02-24 14:22:09','2025-02-24 14:22:09'),(45,1,'PCK-10GR','Pack 10GR','PCK','=','1','1','2025-02-24 14:22:09','2025-02-24 14:22:09'),(46,1,'PCK-40GR','Pack 40GR','PCK','=','1','1','2025-02-24 14:22:09','2025-02-24 14:22:09'),(47,1,'PCK-170GR','Pack 170GR','PCK','=','1','1','2025-02-24 14:22:09','2025-02-24 14:22:09'),(48,1,'PCK-165GR','Pack 165GR','PCK','=','1','1','2025-02-24 14:22:09','2025-02-24 14:22:09'),(49,1,'PCK-1LTR','Pack 1LTR','PCK','=','1','1','2025-02-24 14:22:09','2025-02-24 14:22:09'),(50,1,'PCK-5SLICE','Pack 5 Slice','PCK','=','1','1','2025-02-24 14:22:09','2025-02-24 14:22:09'),(51,1,'PACK-100GR','Pack 100GR','PACK','=','1','1','2025-02-24 14:22:09','2025-02-24 14:22:09'),(52,1,'PACK-200GR','Pack 200GR','PACK','=','1','1','2025-02-24 14:22:09','2025-02-24 14:22:09'),(53,1,'PACK-1KG','Pack 1KG','PACK','=','1','1','2025-02-24 14:22:09','2025-02-24 14:22:09'),(54,1,'CAN-227GR','Can 227GR','CAN','=','1','1','2025-02-24 14:22:09','2025-02-24 14:22:09'),(55,1,'CAN-1000GR','Can 1000GR','CAN','=','1','1','2025-02-24 14:22:09','2025-02-24 14:22:09'),(56,1,'PAPAN','Papan','PAPAN','=','1','1','2025-02-24 14:22:09','2025-02-24 14:22:09'),(57,1,'BUAH','Buah','BUAH','=','1','1','2025-02-24 14:22:09','2025-02-24 14:22:09'),(58,1,'BTR','Butir','BTR','=','1','1','2025-02-24 14:22:09','2025-02-24 14:22:09'),(59,1,'SISIR','Sisir','SISIR','=','1','1','2025-02-24 14:22:09','2025-02-24 14:22:09'),(60,1,'LBR','Lembar','LBR','=','1','1','2025-02-24 14:22:09','2025-02-24 14:22:09'),(61,1,'LTR','Liter','LTR','=','1','1','2025-02-24 14:22:09','2025-02-24 14:22:09'),(62,1,'BOX-50PCS','Box 50PCS','BOX','=','1','1','2025-02-24 14:22:09','2025-02-24 14:22:09'),(63,1,'BAL','Bal','BAL','=','1','1','2025-02-24 14:22:09','2025-02-24 14:22:09');
/*!40000 ALTER TABLE `units` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `outlet_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_outlet_id_foreign` (`outlet_id`),
  CONSTRAINT `users_outlet_id_foreign` FOREIGN KEY (`outlet_id`) REFERENCES `outlets` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (4,NULL,'Super Admin','superadmin@dashcode.com','085183138321','46262','Kab. Ciamis','Indonesia','2025-02-14 00:09:52','$2y$10$MSEvjpZ5fAXOtGsyOCg5tepY6VZ1caHxC1.bYKJo57JBof37A2MRK','KYrsZfiTx5OwPchTZuekAMHkhZb4TKWM7bU55iQf0mKPQiaLf6nxNVnb7kJF','2025-02-14 00:09:52','2025-02-26 08:09:09'),(5,NULL,'Admin','admin@mail.com',NULL,NULL,NULL,NULL,'2025-02-14 00:09:52','$2y$10$uCByJTiWa9AhQBUWwzrWFO7ZbGgHco16fv8DmKwc81yMwEWcHaYDm',NULL,'2025-02-14 00:09:52','2025-02-14 00:09:52'),(6,NULL,'User','user@mail.com',NULL,NULL,NULL,NULL,'2025-02-14 00:09:52','$2y$10$A3WgRe9.RqT8PovAbOpVjuI5OhgI8wEv/mwbskeC0PtqTWy7mAqoq',NULL,'2025-02-14 00:09:52','2025-02-14 00:09:52'),(7,NULL,'BrandonNaw','alllinks2001@gmail.com',NULL,NULL,NULL,NULL,NULL,'$2y$10$nlMh1yXIZxtW0B0hGmwawe48nd31DWE4ZjT./3GdkFAhihtZ8SP8u',NULL,'2025-02-19 10:03:19','2025-02-19 10:03:19'),(8,NULL,'Uzair','jerrysoomro7@gmail.com',NULL,NULL,NULL,NULL,NULL,'$2y$10$T6EUQf9.qUBGWTPTLpQ84uByeIr/uotEO/KeN0uWQKL2wyFsHYIue',NULL,'2025-02-24 04:08:29','2025-02-24 04:08:29'),(11,NULL,'Deni R','galihpangestu.gms@gmail.com',NULL,NULL,NULL,NULL,'2025-02-25 09:32:38','$2y$10$gIDIunjv01yuj3FnKN0yCu/JJRzHoBFn1sN2lHznQjdpCuOJmkzuO',NULL,'2025-02-25 09:32:38','2025-02-25 09:32:38'),(12,NULL,'PT Sejahtera Group','sejahtera@mail.com',NULL,NULL,NULL,NULL,'2025-02-25 09:48:07','$2y$10$pEJ25Ly7irorUCHMpMwqy.8haRdOa0ngSaFRciXtvCEU1YrOn3PEy',NULL,'2025-02-25 09:48:07','2025-02-25 09:48:07'),(13,1,'Pram','pram@mail.com',NULL,NULL,NULL,NULL,'2025-02-25 11:09:32','$2y$10$bYd8.NLZyph32dZdNz.HjuItnYRLmGNwQ9wvh.k.iTmhJyfPZFRyy',NULL,'2025-02-25 11:09:32','2025-02-25 11:09:32'),(14,1,'Admin Koyasai','adminkoyasai@gmail.com','085198989750','15810','Banten','Indonesia','2025-02-25 16:04:33','$2y$10$giQXp0VVNg36eQv7pfmfJOJCxq4i7oKA0SEbOG5IdZQoid.vDaH6y',NULL,'2025-02-25 16:04:33','2025-04-02 07:28:09'),(15,1,'asadasd','sejahtera1@mail.com',NULL,NULL,NULL,NULL,'2025-02-26 02:20:35','$2y$10$4U0nUo.aoxG3rEKWUPCG8OwHZ9XnwSeJuViSBHnaaP09qYwDbzwya',NULL,'2025-02-26 02:20:35','2025-02-26 02:20:35'),(16,1,'rizki milik haha','rizkixirpl@gmail.com',NULL,NULL,NULL,NULL,'2025-02-28 07:39:42','$2y$10$..fE5wq0PyMXf7.BxRlmQOxN709GZKTkIs.hXzuPylkOGjcSo/tMC',NULL,'2025-02-26 03:22:39','2025-02-28 07:39:42'),(18,1,'Alm. Dr. Muhammad Syahdan Husna Mubarok B.A., Ph.D.','heavenman699@gmail.com',NULL,NULL,NULL,NULL,'2025-02-28 07:32:33','$2y$10$HlYH36CAy/X2qog8qVldneOYzubXZyDbhIxj6CZy6tY/9Uo.8tTYm',NULL,'2025-02-26 06:25:08','2025-02-28 07:32:33'),(19,NULL,'Usman','sahdanhusna057@gmail.com',NULL,NULL,NULL,NULL,'2025-02-28 07:25:17','$2y$10$GNMaDkV0x8EnVqKoQ9zFf..Z6Dg7w1hahyedmYEJJ/GGusegMc9zS',NULL,'2025-02-28 07:20:24','2025-02-28 07:25:17'),(20,8,'rizki','rizkixirpl123@gmail.com',NULL,NULL,NULL,NULL,'2025-02-28 08:05:45','$2y$10$QjS2n4aNR4rftL2N9giSsOo0mo0lVNHi8uodIo2IjowvER2jZqwJu',NULL,'2025-02-28 07:46:28','2025-02-28 08:05:45'),(21,1,'Pendekar Alam Sutera','abcd@asdasda.com',NULL,NULL,NULL,NULL,'2025-04-02 06:35:58','$2y$10$wXsdoWqDqPYym.wDaHQRyux/yehMJwLeKSQKJOwExjfb8r1D7RI6C',NULL,'2025-04-02 06:35:58','2025-04-02 06:35:58'),(22,1,'Diana','sasdasdas@gmail.com',NULL,NULL,NULL,NULL,'2025-04-02 07:04:40','$2y$10$QzG1YiCS2fdDw0gvxylR3uKGf3JehyKQK9JwJ84ZN0Aah2FEq.5HS',NULL,'2025-04-02 07:04:40','2025-04-02 07:04:40');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `variants`
--

DROP TABLE IF EXISTS `variants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `variants` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `outlet_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int NOT NULL,
  `item_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_price` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `variants_product_id_foreign` (`product_id`),
  CONSTRAINT `variants_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `variants`
--

LOCK TABLES `variants` WRITE;
/*!40000 ALTER TABLE `variants` DISABLE KEYS */;
/*!40000 ALTER TABLE `variants` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-04-05 13:32:35
