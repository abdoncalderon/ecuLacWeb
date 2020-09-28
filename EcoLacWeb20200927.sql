-- MySQL dump 10.13  Distrib 8.0.15, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: ecolacwebtest
-- ------------------------------------------------------
-- Server version	8.0.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `categorias` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estaActivo` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categorias_nombre_unique` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Leches','Fruto de nuestras mejores reses','1599528192leches.jpg',1,'2020-09-08 06:23:12','2020-09-08 06:23:12'),(2,'Quesos','El sabor de los mejores quesos','1599528217queso.jpg',1,'2020-09-08 06:23:37','2020-09-08 06:23:37'),(3,'Dulces','Un experiencia de sabor en tu boca','1599528257dulces.jpg',1,'2020-09-08 06:24:17','2020-09-08 06:24:17'),(4,'Yogures','Los mejores yogures del pais','1599528285yogures.jpg',1,'2020-09-08 06:24:45','2020-09-08 06:24:45');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ciudades`
--

DROP TABLE IF EXISTS `ciudades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `ciudades` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provincia_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ciudades_provincia_id_foreign` (`provincia_id`),
  CONSTRAINT `ciudades_provincia_id_foreign` FOREIGN KEY (`provincia_id`) REFERENCES `provincias` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciudades`
--

LOCK TABLES `ciudades` WRITE;
/*!40000 ALTER TABLE `ciudades` DISABLE KEYS */;
INSERT INTO `ciudades` VALUES (1,'Loja',1,'2020-08-28 06:07:06','2020-08-28 06:07:06'),(2,'Cuenca',2,'2020-09-09 08:07:05','2020-09-09 08:07:05');
/*!40000 ALTER TABLE `ciudades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `clientes` (
  `usuario_id` bigint unsigned NOT NULL,
  `ciudad_id` bigint unsigned NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitud` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitud` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`usuario_id`),
  KEY `clientes_ciudad_id_foreign` (`ciudad_id`),
  CONSTRAINT `clientes_ciudad_id_foreign` FOREIGN KEY (`ciudad_id`) REFERENCES `ciudades` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `clientes_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (2,1,'Los Arupos','-0.1709505','-78.47564050000001','2020-09-08 08:27:31','2020-09-08 08:27:31'),(3,2,'segetret','-0.17102979999999998','-78.4750535','2020-09-14 03:17:22','2020-09-14 03:17:22');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facturas`
--

DROP TABLE IF EXISTS `facturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `facturas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `pedido_id` bigint unsigned NOT NULL,
  `subtotal` decimal(9,2) NOT NULL,
  `valorDescuento` decimal(9,2) NOT NULL,
  `valorIva` decimal(9,2) NOT NULL,
  `tipoPago` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `facturas_pedido_id_foreign` (`pedido_id`),
  CONSTRAINT `facturas_pedido_id_foreign` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facturas`
--

LOCK TABLES `facturas` WRITE;
/*!40000 ALTER TABLE `facturas` DISABLE KEYS */;
INSERT INTO `facturas` VALUES (1,'2020-09-13 21:37:22',1,7.11,0.08,0.51,'EFECTIVO','PAGADA','2020-09-14 02:37:22','2020-09-14 02:37:22');
/*!40000 ALTER TABLE `facturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
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
-- Table structure for table `imagenes_productos`
--

DROP TABLE IF EXISTS `imagenes_productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `imagenes_productos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `producto_id` bigint unsigned NOT NULL,
  `predeterminada` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `imagenes_productos_producto_id_foreign` (`producto_id`),
  CONSTRAINT `imagenes_productos_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagenes_productos`
--

LOCK TABLES `imagenes_productos` WRITE;
/*!40000 ALTER TABLE `imagenes_productos` DISABLE KEYS */;
INSERT INTO `imagenes_productos` VALUES (1,'1599533400dulce_frutilla_1.jpg',1,1,'2020-09-08 07:50:00','2020-09-08 07:50:00'),(2,'1599533458dulce_frutilla_2.jpg',2,1,'2020-09-08 07:50:58','2020-09-08 07:50:58'),(3,'1599534462dulce_leche_tarro_1.jpg',3,1,'2020-09-08 08:07:42','2020-09-08 08:07:42'),(4,'1599534476dulce_leche_funda_1.jpg',4,1,'2020-09-08 08:07:56','2020-09-08 08:07:56'),(5,'1599534488dulce_leche_funda_2.jpg',5,1,'2020-09-08 08:08:08','2020-09-08 08:08:08'),(6,'1599534541leche_botella_2.jpg',6,1,'2020-09-08 08:09:01','2020-09-08 08:09:01'),(7,'1599534558leche_deslactosada_carton_1.jpg',7,1,'2020-09-08 08:09:18','2020-09-08 08:09:18'),(8,'1599534574leche_botella_1.jpg',8,1,'2020-09-08 08:09:34','2020-09-08 08:09:34'),(9,'1599534589leche_botella_4.jpg',9,1,'2020-09-08 08:09:49','2020-09-08 08:09:49'),(10,'1599534610leche_carton_1.jpg',10,1,'2020-09-08 08:10:10','2020-09-08 08:10:10'),(11,'1599534629leche_botella_3.jpg',11,1,'2020-09-08 08:10:29','2020-09-08 08:10:29'),(12,'1599534674leche_carton_3.jpg',12,1,'2020-09-08 08:11:14','2020-09-08 08:11:14'),(13,'1599534702leche_funda_1.jpg',13,1,'2020-09-08 08:11:42','2020-09-08 08:11:42'),(14,'1599534718leche_carton_2.jpg',14,1,'2020-09-08 08:11:58','2020-09-08 08:11:58'),(15,'1599534735queso_fresco_1.jpg',15,1,'2020-09-08 08:12:15','2020-09-08 08:12:15'),(16,'1599534754queso_fresco_3.jpg',16,1,'2020-09-08 08:12:34','2020-09-08 08:12:34'),(17,'1599534770queso_fresco_2.jpg',17,1,'2020-09-08 08:12:50','2020-09-08 08:12:50'),(18,'1599534785queso_permaseno_2.jpg',18,1,'2020-09-08 08:13:05','2020-09-08 08:13:05'),(19,'1599534804queso_permaseno_1.jpg',19,1,'2020-09-08 08:13:24','2020-09-08 08:13:24'),(20,'1599534830yogurt_botella_3.jpg',20,1,'2020-09-08 08:13:50','2020-09-08 08:13:50'),(21,'1599534847yogurt_botella_2.jpg',21,1,'2020-09-08 08:14:07','2020-09-08 08:14:07'),(22,'1599534864yogurt_botella_1.jpg',22,1,'2020-09-08 08:14:24','2020-09-08 08:14:24');
/*!40000 ALTER TABLE `imagenes_productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items_pedidos`
--

DROP TABLE IF EXISTS `items_pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `items_pedidos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pedido_id` bigint unsigned NOT NULL,
  `producto_id` bigint unsigned NOT NULL,
  `cantidad` int unsigned NOT NULL,
  `precioUnitario` decimal(6,2) NOT NULL,
  `descuento` decimal(4,2) NOT NULL,
  `iva` decimal(4,2) NOT NULL,
  `subtotal` decimal(8,2) NOT NULL,
  `estado` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'AGREGADO',
  `fechaConfirmacion` datetime DEFAULT NULL,
  `fechaDespacho` datetime DEFAULT NULL,
  `fechaEntrega` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `items_pedidos_pedido_id_foreign` (`pedido_id`),
  KEY `items_pedidos_producto_id_foreign` (`producto_id`),
  CONSTRAINT `items_pedidos_pedido_id_foreign` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `items_pedidos_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items_pedidos`
--

LOCK TABLES `items_pedidos` WRITE;
/*!40000 ALTER TABLE `items_pedidos` DISABLE KEYS */;
INSERT INTO `items_pedidos` VALUES (1,1,2,1,2.10,0.00,12.00,2.10,'CONFIRMADO','2020-09-13 21:37:22',NULL,NULL,'2020-09-08 08:29:00','2020-09-14 02:37:22'),(2,1,9,1,0.75,0.00,12.00,0.75,'CONFIRMADO','2020-09-13 21:37:22',NULL,NULL,'2020-09-08 08:29:28','2020-09-14 02:37:22'),(3,1,11,3,1.50,5.00,12.00,4.26,'CONFIRMADO','2020-09-13 21:37:22',NULL,NULL,'2020-09-08 08:29:38','2020-09-14 02:37:22');
/*!40000 ALTER TABLE `items_pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `menus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `multilenguaje` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ruta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `esVisible` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_nombre_unique` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'listar provincias','content.provinces','provincias.index','provincias.png',1,NULL,NULL),(2,'crear provincias',NULL,'provincias.create','nofoto.png',0,NULL,NULL),(3,'grabar provincias',NULL,'provincias.store','nofoto.png',0,NULL,NULL),(4,'eliminar provincias',NULL,'provincias.destroy','nofoto.png',0,NULL,NULL),(5,'listar ciudades','content.cities','ciudades.index','ciudades.png',1,NULL,NULL),(6,'crear ciudades',NULL,'ciudades.create','nofoto.png',0,NULL,NULL),(7,'grabar ciudades',NULL,'ciudades.store','nofoto.png',0,NULL,NULL),(8,'editar ciudades',NULL,'ciudades.edit','nofoto.png',0,NULL,NULL),(9,'actualizar ciudades',NULL,'ciudades.update','nofoto.png',0,NULL,NULL),(10,'eliminar ciudades',NULL,'ciudades.destroy','nofoto.png',0,NULL,NULL),(11,'listar sucursales','content.offices','sucursales.index','sucursales.png',1,NULL,NULL),(12,'crear sucursales',NULL,'sucursales.create','nofoto.png',0,NULL,NULL),(13,'grabar sucursales',NULL,'sucursales.store','nofoto.png',0,NULL,NULL),(14,'editar sucursales',NULL,'sucursales.edit','nofoto.png',0,NULL,NULL),(15,'actualizar sucursales',NULL,'sucursales.update','nofoto.png',0,NULL,NULL),(16,'eliminar sucursales',NULL,'sucursales.destroy','nofoto.png',0,NULL,NULL),(17,'listar categorias','content.categories','categorias.index','categorias.png',1,NULL,NULL),(18,'crear categorias',NULL,'categorias.create','nofoto.png',0,NULL,NULL),(19,'grabar categorias',NULL,'categorias.store','nofoto.png',0,NULL,NULL),(20,'editar categorias',NULL,'categorias.edit','nofoto.png',0,NULL,NULL),(21,'actualizar categorias',NULL,'categorias.update','nofoto.png',0,NULL,NULL),(22,'eliminar categorias',NULL,'categorias.destroy','nofoto.png',0,NULL,NULL),(23,'listar tipos','content.types','tipos.index','tipos.png',1,NULL,NULL),(24,'crear tipos',NULL,'tipos.create','nofoto.png',0,NULL,NULL),(25,'grabar tipos',NULL,'tipos.store','nofoto.png',0,NULL,NULL),(26,'editar tipos',NULL,'tipos.edit','nofoto.png',0,NULL,NULL),(27,'actualizar tipos',NULL,'tipos.update','nofoto.png',0,NULL,NULL),(28,'eliminar tipos',NULL,'tipos.destroy','nofoto.png',0,NULL,NULL),(29,'listar presentaciones','content.presentations','presentaciones.index','presentaciones.png',1,NULL,NULL),(30,'crear presentaciones',NULL,'presentaciones.create','nofoto.png',0,NULL,NULL),(31,'grabar presentaciones',NULL,'presentaciones.store','nofoto.png',0,NULL,NULL),(32,'editar presentaciones',NULL,'presentaciones.edit','nofoto.png',0,NULL,NULL),(33,'actualizar presentaciones',NULL,'presentaciones.update','nofoto.png',0,NULL,NULL),(34,'eliminar presentaciones',NULL,'presentaciones.destroy','nofoto.png',0,NULL,NULL),(35,'listar productos','content.products','productos.index','productos.png',1,NULL,NULL),(36,'crear productos',NULL,'productos.create','nofoto.png',0,NULL,NULL),(37,'grabar productos',NULL,'productos.store','nofoto.png',0,NULL,NULL),(38,'editar productos',NULL,'productos.edit','nofoto.png',0,NULL,NULL),(39,'actualizar productos',NULL,'productos.update','nofoto.png',0,NULL,NULL),(40,'eliminar productos',NULL,'productos.destroy','nofoto.png',0,NULL,NULL),(41,'listar movimientos existencias',NULL,'movimientosexistencias.index','nofoto.png',0,NULL,NULL),(42,'crear movimientos existencias',NULL,'movimientosexistencias.create','nofoto.png',0,NULL,NULL),(43,'grabar movimientos existencias',NULL,'movimientosexistencias.store','nofoto.png',0,NULL,NULL),(44,'listar imagenes productos',NULL,'imagenesproductos.index','nofoto.png',0,NULL,NULL),(45,'grabar imagenes productos',NULL,'imagenesproductos.store','nofoto.png',0,NULL,NULL),(46,'eliminar imagenes productos',NULL,'imagenesproductos.destroy','nofoto.png',0,NULL,NULL),(47,'predeterminar imagenes productos',NULL,'imagenesproductos.default','nofoto.png',0,NULL,NULL),(48,'listar roles','content.roles','roles.index','roles.png',1,NULL,NULL),(49,'crear roles',NULL,'roles.create','nofoto.png',0,NULL,NULL),(50,'grabar roles',NULL,'roles.store','nofoto.png',0,NULL,NULL),(51,'editar roles',NULL,'roles.edit','nofoto.png',0,NULL,NULL),(52,'actualizar roles',NULL,'roles.update','nofoto.png',0,NULL,NULL),(53,'eliminar roles',NULL,'roles.destroy','nofoto.png',0,NULL,NULL),(54,'listar menus','content.menus','menus.index','menus.png',1,NULL,NULL),(55,'crear menus',NULL,'menus.create','nofoto.png',0,NULL,NULL),(56,'grabar menus',NULL,'menus.store','nofoto.png',0,NULL,NULL),(57,'editar menus',NULL,'menus.edit','nofoto.png',0,NULL,NULL),(58,'actualizar menus',NULL,'menus.update','nofoto.png',0,NULL,NULL),(59,'eliminar menus',NULL,'menus.destroy','nofoto.png',0,NULL,NULL),(60,'agregar menus roles',NULL,'menusroles.add','nofoto.png',0,NULL,NULL),(61,'grabar menus roles',NULL,'menusroles.store','nofoto.png',0,NULL,NULL),(62,'eliminar menus roles',NULL,'menusroles.destroy','nofoto.png',0,NULL,NULL),(63,'listar usuarios','content.users','usuarios.index','usuarios.png',1,NULL,NULL),(64,'crear usuarios',NULL,'usuarios.create','nofoto.png',0,NULL,NULL),(65,'grabar usuarios',NULL,'usuarios.store','nofoto.png',0,NULL,NULL),(66,'editar usuarios',NULL,'usuarios.edit','nofoto.png',0,NULL,NULL),(67,'actualizar usuarios',NULL,'usuarios.update','nofoto.png',0,NULL,NULL),(68,'eliminar usuarios',NULL,'usuarios.destroy','nofoto.png',0,NULL,NULL),(69,'activar usuarios',NULL,'usuarios.activate','nofoto.png',0,NULL,NULL),(70,'listar pedidos vendidos','content.orders','pedidos.vendedor','pedidos.png',1,NULL,NULL),(71,'listar pedidos despachados','content.deliveries','pedidos.repartidor','despachos.png',1,NULL,NULL),(72,'mostrar pedidos vendidos',NULL,'pedidos.showOrder','nofoto.png',0,NULL,NULL),(73,'mostrar pedidos despachados',NULL,'pedidos.showDelivery','nofoto.png',0,NULL,NULL),(74,'crear pedidos',NULL,'pedidos.create','nofoto.png',0,NULL,NULL),(75,'grabar pedidos',NULL,'pedidos.store','nofoto.png',0,NULL,NULL),(76,'editar pedidos',NULL,'pedidos.edit','nofoto.png',0,NULL,NULL),(77,'actualizar pedidos',NULL,'pedidos.update','nofoto.png',0,NULL,NULL),(78,'eliminar pedidos',NULL,'pedidos.destroy','nofoto.png',0,NULL,NULL),(79,'cambiar estado pedidos',NULL,'pedidos.change','nofoto.png',0,NULL,NULL),(80,'pagar pedidos',NULL,'pedidos.toPay','nofoto.png',0,NULL,NULL),(81,'listar items pedidos',NULL,'itemspedidos.index','nofoto.png',0,NULL,NULL),(82,'grabar items pedidos',NULL,'itemspedidos.store','nofoto.png',0,NULL,NULL),(83,'actualizar items pedidos',NULL,'itemspedidos.update','nofoto.png',0,NULL,NULL),(84,'eliminar items pedidos',NULL,'itemspedidos.destroy','nofoto.png',0,NULL,NULL),(85,'listar reportes','content.reports','reportes.index','reportes.png',1,NULL,NULL),(86,'reporte ventas',NULL,'reportes.ventas','nofoto.png',0,NULL,NULL),(87,'reporte inventario',NULL,'reportes.inventario','nofoto.png',0,NULL,NULL),(88,'cuenta clientes',NULL,'clientes.cuenta','nofoto.png',0,NULL,NULL),(89,'historial clientes',NULL,'clientes.historial','nofoto.png',0,NULL,NULL),(90,'pedido clientes',NULL,'clientes.pedido','nofoto.png',0,NULL,NULL),(91,'preordenar pedido',NULL,'clientes.preorden','nofoto.png',0,NULL,NULL);
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus_roles`
--

DROP TABLE IF EXISTS `menus_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `menus_roles` (
  `menu_id` bigint unsigned NOT NULL,
  `rol_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`menu_id`,`rol_id`),
  KEY `menus_roles_rol_id_foreign` (`rol_id`),
  CONSTRAINT `menus_roles_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `menus_roles_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus_roles`
--

LOCK TABLES `menus_roles` WRITE;
/*!40000 ALTER TABLE `menus_roles` DISABLE KEYS */;
INSERT INTO `menus_roles` VALUES (1,1,NULL,NULL),(2,1,NULL,NULL),(3,1,NULL,NULL),(4,1,NULL,NULL),(5,1,NULL,NULL),(6,1,NULL,NULL),(7,1,NULL,NULL),(8,1,NULL,NULL),(9,1,NULL,NULL),(10,1,NULL,NULL),(11,1,NULL,NULL),(12,1,NULL,NULL),(13,1,NULL,NULL),(14,1,NULL,NULL),(15,1,NULL,NULL),(16,1,NULL,NULL),(17,1,NULL,NULL),(18,1,NULL,NULL),(19,1,NULL,NULL),(20,1,NULL,NULL),(21,1,NULL,NULL),(22,1,NULL,NULL),(23,1,NULL,NULL),(24,1,NULL,NULL),(25,1,NULL,NULL),(26,1,NULL,NULL),(27,1,NULL,NULL),(28,1,NULL,NULL),(29,1,NULL,NULL),(30,1,NULL,NULL),(31,1,NULL,NULL),(32,1,NULL,NULL),(33,1,NULL,NULL),(34,1,NULL,NULL),(35,1,NULL,NULL),(36,1,NULL,NULL),(37,1,NULL,NULL),(38,1,NULL,NULL),(39,1,NULL,NULL),(40,1,NULL,NULL),(41,1,NULL,NULL),(42,1,NULL,NULL),(43,1,NULL,NULL),(44,1,NULL,NULL),(45,1,NULL,NULL),(46,1,NULL,NULL),(47,1,NULL,NULL),(48,1,NULL,NULL),(49,1,NULL,NULL),(50,1,NULL,NULL),(51,1,NULL,NULL),(52,1,NULL,NULL),(53,1,NULL,NULL),(54,1,NULL,NULL),(55,1,NULL,NULL),(56,1,NULL,NULL),(57,1,NULL,NULL),(58,1,NULL,NULL),(59,1,NULL,NULL),(60,1,NULL,NULL),(61,1,NULL,NULL),(62,1,NULL,NULL),(63,1,NULL,NULL),(64,1,NULL,NULL),(65,1,NULL,NULL),(66,1,NULL,NULL),(67,1,NULL,NULL),(68,1,NULL,NULL),(69,1,NULL,NULL),(70,1,NULL,NULL),(71,1,NULL,NULL),(72,1,NULL,NULL),(73,1,NULL,NULL),(74,1,NULL,NULL),(75,1,NULL,NULL),(76,1,NULL,NULL),(77,1,NULL,NULL),(78,1,NULL,NULL),(79,1,NULL,NULL),(80,1,NULL,NULL),(80,5,'2020-09-14 02:37:06','2020-09-14 02:37:06'),(81,1,NULL,NULL),(82,1,NULL,NULL),(83,1,NULL,NULL),(84,1,NULL,NULL),(85,1,NULL,NULL),(86,1,NULL,NULL),(87,1,NULL,NULL),(88,5,NULL,NULL),(89,5,NULL,NULL),(90,5,NULL,NULL),(91,5,NULL,NULL);
/*!40000 ALTER TABLE `menus_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_100000_create_password_resets_table',1),(2,'2019_08_19_000000_create_failed_jobs_table',1),(3,'2020_05_27_220146_create_menus_table',1),(4,'2020_05_28_222857_create_provincias_table',1),(5,'2020_05_28_222921_create_ciudades_table',1),(6,'2020_05_28_223015_create_roles_table',1),(7,'2020_05_28_223141_create_categorias_table',1),(8,'2020_05_28_223243_create_tipos_table',1),(9,'2020_05_28_223308_create_presentaciones_table',1),(10,'2020_05_28_223310_create_sucursales_table',1),(11,'2020_05_28_223315_create_users_table',1),(12,'2020_05_28_223447_create_productos_table',1),(13,'2020_05_28_223514_create_clientes_table',1),(14,'2020_05_28_223604_create_pedidos_table',1),(15,'2020_05_28_223701_create_items_pedidos_table',1),(16,'2020_05_28_223734_create_movimientos_existencias_table',1),(17,'2020_06_06_215208_create_menus_roles_table',1),(18,'2020_06_10_123229_create_imagenes_productos_table',1),(19,'2020_07_14_013112_create_facturas_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movimientos_existencias`
--

DROP TABLE IF EXISTS `movimientos_existencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `movimientos_existencias` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `usuario_id` bigint unsigned NOT NULL,
  `producto_id` bigint unsigned NOT NULL,
  `sucursal_id` bigint unsigned NOT NULL,
  `tipoMovimiento` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad` int unsigned NOT NULL,
  `saldo` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `movimientos_existencias_usuario_id_foreign` (`usuario_id`),
  KEY `movimientos_existencias_producto_id_foreign` (`producto_id`),
  KEY `movimientos_existencias_sucursal_id_foreign` (`sucursal_id`),
  CONSTRAINT `movimientos_existencias_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `movimientos_existencias_sucursal_id_foreign` FOREIGN KEY (`sucursal_id`) REFERENCES `sucursales` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `movimientos_existencias_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movimientos_existencias`
--

LOCK TABLES `movimientos_existencias` WRITE;
/*!40000 ALTER TABLE `movimientos_existencias` DISABLE KEYS */;
INSERT INTO `movimientos_existencias` VALUES (1,'2020-09-08 03:14:47',1,1,1,'REPOSICION',1000,1000,'2020-09-08 08:14:47','2020-09-08 08:14:47'),(2,'2020-09-08 03:15:09',1,2,1,'REPOSICION',1000,1000,'2020-09-08 08:15:09','2020-09-08 08:15:09'),(3,'2020-09-08 03:15:42',1,3,1,'REPOSICION',2000,2000,'2020-09-08 08:15:42','2020-09-08 08:15:42'),(4,'2020-09-08 03:16:07',1,4,1,'REPOSICION',5000,5000,'2020-09-08 08:16:07','2020-09-08 08:16:07'),(5,'2020-09-08 03:16:27',1,5,1,'REPOSICION',5000,5000,'2020-09-08 08:16:27','2020-09-08 08:16:27'),(6,'2020-09-08 03:17:13',1,6,1,'REPOSICION',3000,3000,'2020-09-08 08:17:13','2020-09-08 08:17:13'),(7,'2020-09-08 03:17:54',1,8,1,'REPOSICION',2000,2000,'2020-09-08 08:17:54','2020-09-08 08:17:54'),(8,'2020-09-08 03:19:10',1,9,1,'REPOSICION',4000,4000,'2020-09-08 08:19:10','2020-09-08 08:19:10'),(9,'2020-09-08 03:19:30',1,11,1,'REPOSICION',3000,3000,'2020-09-08 08:19:30','2020-09-08 08:19:30'),(10,'2020-09-08 03:20:20',1,13,1,'REPOSICION',5000,5000,'2020-09-08 08:20:20','2020-09-08 08:20:20'),(11,'2020-09-08 03:20:39',1,14,1,'REPOSICION',1000,1000,'2020-09-08 08:20:39','2020-09-08 08:20:39'),(12,'2020-09-08 03:22:22',1,15,1,'REPOSICION',2000,2000,'2020-09-08 08:22:22','2020-09-08 08:22:22'),(13,'2020-09-08 03:23:02',1,17,1,'REPOSICION',2000,2000,'2020-09-08 08:23:02','2020-09-08 08:23:02'),(14,'2020-09-08 03:23:18',1,18,1,'REPOSICION',5000,5000,'2020-09-08 08:23:18','2020-09-08 08:23:18'),(15,'2020-09-08 03:25:39',1,20,1,'REPOSICION',1000,1000,'2020-09-08 08:25:39','2020-09-08 08:25:39'),(16,'2020-09-08 03:25:58',1,22,1,'REPOSICION',2000,2000,'2020-09-08 08:25:58','2020-09-08 08:25:58'),(17,'2020-09-08 03:29:00',2,2,1,'VENTA',1,999,'2020-09-08 08:29:00','2020-09-08 08:29:00'),(18,'2020-09-08 03:29:28',2,9,1,'VENTA',1,3999,'2020-09-08 08:29:28','2020-09-08 08:29:28'),(19,'2020-09-08 03:29:38',2,11,1,'VENTA',3,2997,'2020-09-08 08:29:38','2020-09-08 08:29:38');
/*!40000 ALTER TABLE `movimientos_existencias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
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
INSERT INTO `password_resets` VALUES ('idonsoft@gmail.com','$2y$10$Zke2GKEnHL/dRtVILdrjruQt5WyPr6eVvyvZAl8oUMk17K3sUz8ou','2020-09-14 03:26:29'),('abdonc@gmail.com','$2y$10$dkrIJf5FCJyQKc5U9b2LbO/N7CJq3zdJ1rW2nRo8.QlmryReD/I9m','2020-09-14 03:55:29');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `pedidos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fechaCreacion` datetime NOT NULL,
  `fechaConfirmacion` datetime DEFAULT NULL,
  `fechaDespacho` datetime DEFAULT NULL,
  `fechaEntrega` datetime DEFAULT NULL,
  `cliente_id` bigint unsigned NOT NULL,
  `vendedor_id` bigint unsigned DEFAULT NULL,
  `repartidor_id` bigint unsigned DEFAULT NULL,
  `estado` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT 'ABIERTO',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pedidos_cliente_id_foreign` (`cliente_id`),
  KEY `pedidos_vendedor_id_foreign` (`vendedor_id`),
  KEY `pedidos_repartidor_id_foreign` (`repartidor_id`),
  CONSTRAINT `pedidos_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `pedidos_repartidor_id_foreign` FOREIGN KEY (`repartidor_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `pedidos_vendedor_id_foreign` FOREIGN KEY (`vendedor_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` VALUES (1,'2020-09-08 03:29:00','2020-09-13 21:37:22',NULL,NULL,2,NULL,NULL,'CONFIRMADO','2020-09-08 08:29:00','2020-09-14 02:37:22');
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `presentaciones`
--

DROP TABLE IF EXISTS `presentaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `presentaciones` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `categoria_id` bigint unsigned NOT NULL,
  `envase` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenido` int NOT NULL,
  `medida` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `presentaciones_categoria_id_foreign` (`categoria_id`),
  CONSTRAINT `presentaciones_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `presentaciones`
--

LOCK TABLES `presentaciones` WRITE;
/*!40000 ALTER TABLE `presentaciones` DISABLE KEYS */;
INSERT INTO `presentaciones` VALUES (1,2,'Funda',500,'Gramos','2020-09-08 07:22:40','2020-09-08 07:22:40'),(2,2,'Funda',200,'Gramos','2020-09-08 07:22:51','2020-09-08 07:22:51'),(3,2,'Funda',1,'Kilos','2020-09-08 07:23:05','2020-09-08 07:23:05'),(4,1,'Carton',1,'Litros','2020-09-08 07:23:36','2020-09-08 07:23:36'),(5,1,'Carton',4,'Onzas','2020-09-08 07:23:48','2020-09-08 07:23:48'),(6,1,'Botella',1,'Litros','2020-09-08 07:24:04','2020-09-08 07:24:04'),(7,1,'Botella',8,'Onzas','2020-09-08 07:24:19','2020-09-08 07:24:19'),(9,4,'Botella',1,'Kilos','2020-09-08 07:25:02','2020-09-08 07:25:02'),(10,4,'Botella',500,'Gramos','2020-09-08 07:25:17','2020-09-08 07:25:17'),(11,4,'Botella',2,'Kilos','2020-09-08 07:25:32','2020-09-08 07:25:32'),(12,3,'Tarro',500,'Gramos','2020-09-08 07:26:15','2020-09-08 07:26:15'),(15,3,'Tarrina',200,'Gramos','2020-09-08 07:27:08','2020-09-08 07:27:08'),(16,2,'Funda',300,'Gramos','2020-09-08 07:27:55','2020-09-08 07:27:55'),(17,3,'Tarro',200,'Gramos','2020-09-08 07:28:17','2020-09-08 07:28:17'),(18,3,'Funda',200,'Gramos','2020-09-08 07:28:44','2020-09-08 07:28:44'),(19,3,'Funda',500,'Gramos','2020-09-08 07:29:26','2020-09-08 07:29:26'),(20,1,'Funda',1,'Litros','2020-09-08 07:29:38','2020-09-08 07:29:38');
/*!40000 ALTER TABLE `presentaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `productos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria_id` bigint unsigned NOT NULL,
  `tipo_id` bigint unsigned NOT NULL,
  `presentacion_id` bigint unsigned NOT NULL,
  `precioUnitario` decimal(6,2) NOT NULL,
  `descuento` decimal(4,2) NOT NULL DEFAULT '0.00',
  `iva` decimal(4,2) NOT NULL DEFAULT '0.00',
  `existenciaActual` int unsigned NOT NULL DEFAULT '0',
  `esDestacado` tinyint(1) NOT NULL DEFAULT '1',
  `estado` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Agotado',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `productos_nombre_unique` (`nombre`),
  UNIQUE KEY `productos_descripcion_unique` (`descripcion`),
  KEY `productos_categoria_id_foreign` (`categoria_id`),
  KEY `productos_tipo_id_foreign` (`tipo_id`),
  KEY `productos_presentacion_id_foreign` (`presentacion_id`),
  CONSTRAINT `productos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `productos_presentacion_id_foreign` FOREIGN KEY (`presentacion_id`) REFERENCES `presentaciones` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `productos_tipo_id_foreign` FOREIGN KEY (`tipo_id`) REFERENCES `tipos` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,'Dulce de Frutilla BEEPURE Tarro 500 gr','Dulce de Frutilla BEEPURE Tarro 500 gr',3,7,12,3.20,0.00,12.00,1000,1,'Disponible','2020-09-08 07:47:20','2020-09-08 08:14:47'),(2,'Dulce de Frutilla ARCOR Tarro 200 gr','Dulce de Frutilla ARCOR Tarro 200 gr',3,7,15,2.10,0.00,12.00,999,1,'Disponible','2020-09-08 07:48:07','2020-09-08 08:29:00'),(3,'Dulce de Leche Pil Funda de 200 gr','Dulce de Leche Pil Funda de 200 gr',3,8,17,1.80,0.00,12.00,2000,1,'Disponible','2020-09-08 07:49:43','2020-09-08 08:15:42'),(4,'Dulce de Leche Pil Funda de 500 gr','Dulce de Leche Pil Funda de 500 gr',3,8,19,7.50,0.00,12.00,5000,1,'Disponible','2020-09-08 07:51:42','2020-09-08 08:16:07'),(5,'Dulce de Leche Beepure Tarro 500 gr','Dulce de Leche Beepure Tarro 500 gr',3,8,12,4.20,0.00,12.00,5000,1,'Disponible','2020-09-08 07:55:16','2020-09-08 08:16:27'),(6,'Leche Deslactosada LALA Botella de 1 Litro','Leche Deslactosada LALA Botella de 1 Litro',1,6,6,3.70,0.00,12.00,3000,1,'Disponible','2020-09-08 07:56:04','2020-09-08 08:17:13'),(7,'Leche Deslactosada PIL Carton de 1 Litro','Leche Deslactosada PIL Carton de 1 Litro',1,6,4,4.20,0.00,12.00,0,1,'Agotado','2020-09-08 07:57:08','2020-09-08 07:57:08'),(8,'Leche Entera Asturiana Botella 1 Litro','Leche Entera Asturiana Botella 1 Litro',1,4,6,2.20,10.00,12.00,2000,1,'Disponible','2020-09-08 07:57:46','2020-09-08 08:17:54'),(9,'Leche Entera Asturiana Botella 8 onzas','Leche Entera Asturiana Botella 8 onzas',1,4,7,0.75,0.00,12.00,3999,1,'Disponible','2020-09-08 07:58:40','2020-09-08 08:29:28'),(10,'Leche Entera Lider Carton 1 litros','Leche Entera Lider Carton 1 litros',1,4,4,0.80,0.00,12.00,0,1,'Agotado','2020-09-08 07:59:06','2020-09-08 07:59:06'),(11,'Leche Entera President Botella de 1 Litro','Leche Entera President Botella de 1 Litro',1,4,6,1.50,5.00,12.00,2997,1,'Disponible','2020-09-08 07:59:55','2020-09-08 08:29:38'),(12,'Leche Entera Puleva Carton 4 onzas','Leche Entera Puleva Carton 4 onzas',1,4,5,0.50,0.00,12.00,0,1,'Agotado','2020-09-08 08:00:54','2020-09-08 08:00:54'),(13,'Leche Entera Vita Funda de 1 Litro','Leche Entera Vita Funda de 1 Litro',1,4,20,0.40,0.00,12.00,5000,1,'Disponible','2020-09-08 08:01:35','2020-09-08 08:20:20'),(14,'Leche Semidescremada LLET NOSTRA Carton 1 Litro','Leche Semidescremada LLET NOSTRA Carton 1 Litro',1,5,4,2.70,5.00,12.00,1000,1,'Disponible','2020-09-08 08:02:20','2020-09-08 08:20:39'),(15,'Queso Holandes Kiosko Funda 200 gr','Queso Holandes Kiosko Funda 200 gr',2,12,2,2.50,0.00,12.00,2000,1,'Disponible','2020-09-08 08:02:51','2020-09-08 08:22:22'),(16,'Queso Normal Colanta Funda 500 gr','Queso Normal Colanta Funda 500 gr',2,1,1,2.70,0.00,12.00,0,1,'Agotado','2020-09-08 08:03:15','2020-09-08 08:03:15'),(17,'Queso Normal San Francisco Funda de 500 gr','Queso Normal San Francisco Funda de 500 gr',2,1,1,3.00,0.00,12.00,2000,1,'Disponible','2020-09-08 08:03:37','2020-09-08 08:23:02'),(18,'Queso Parmesano Alpina Funda 300 gr','Queso Parmesano Alpina Funda 300 gr',2,3,16,3.10,0.00,12.00,5000,1,'Disponible','2020-09-08 08:04:04','2020-09-08 08:23:18'),(19,'Queso Parmesano Bel Paese Funda 200gr','Queso Parmesano Bel Paese Funda 200gr',2,3,2,1.80,0.00,12.00,0,1,'Agotado','2020-09-08 08:05:01','2020-09-08 08:05:01'),(20,'Yogurt Frutilla Pil Botella 500 gr','Yogurt Frutilla Pil Botella 500 gr',4,9,10,3.10,0.00,12.00,1000,1,'Disponible','2020-09-08 08:05:23','2020-09-08 08:25:39'),(21,'Yogurt Frutilla Trebol Botella 1 Kilo','Yogurt Frutilla Trebol Botella 1 Kilo',4,9,9,4.80,0.00,12.00,0,1,'Agotado','2020-09-08 08:05:49','2020-09-08 08:05:49'),(22,'Yogurt Mango Alpina Botella 1 Kilo','Yogurt Mango Alpina Botella 1 Kilo',4,10,9,5.20,5.00,12.00,2000,1,'Disponible','2020-09-08 08:06:12','2020-09-08 08:25:58');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provincias`
--

DROP TABLE IF EXISTS `provincias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `provincias` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `provincias_nombre_unique` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provincias`
--

LOCK TABLES `provincias` WRITE;
/*!40000 ALTER TABLE `provincias` DISABLE KEYS */;
INSERT INTO `provincias` VALUES (1,'Loja','2020-08-28 06:06:55','2020-08-28 06:06:55'),(2,'Azuay','2020-09-09 08:06:55','2020-09-09 08:06:55');
/*!40000 ALTER TABLE `provincias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `esExterno` tinyint(1) NOT NULL DEFAULT '0',
  `estaActivo` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_nombre_unique` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'SUPERUSUARIO',0,1,NULL,NULL),(2,'ADMINISTRADOR',0,1,NULL,NULL),(3,'VENDEDOR',0,1,NULL,NULL),(4,'REPARTIDOR',0,1,NULL,NULL),(5,'CLIENTE',1,1,NULL,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sucursales`
--

DROP TABLE IF EXISTS `sucursales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `sucursales` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sucursales_nombre_unique` (`nombre`),
  KEY `sucursales_ciudad_id_foreign` (`ciudad_id`),
  CONSTRAINT `sucursales_ciudad_id_foreign` FOREIGN KEY (`ciudad_id`) REFERENCES `ciudades` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sucursales`
--

LOCK TABLES `sucursales` WRITE;
/*!40000 ALTER TABLE `sucursales` DISABLE KEYS */;
INSERT INTO `sucursales` VALUES (1,'Loja Norte','Chone y Cuenca','0840240242',1,'2020-09-08 06:21:38','2020-09-09 08:04:08'),(2,'Loja Sur','Teodoro Wolf y Einstein','0999324423',1,'2020-09-09 08:03:43','2020-09-09 08:03:43'),(3,'Cuenca','Gonzalez Suarez y Octavio Diaz','0934528288',2,'2020-09-09 08:07:31','2020-09-09 08:07:31');
/*!40000 ALTER TABLE `sucursales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos`
--

DROP TABLE IF EXISTS `tipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tipos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tipos_categoria_id_foreign` (`categoria_id`),
  CONSTRAINT `tipos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos`
--

LOCK TABLES `tipos` WRITE;
/*!40000 ALTER TABLE `tipos` DISABLE KEYS */;
INSERT INTO `tipos` VALUES (1,'Normal',2,'2020-09-08 07:19:49','2020-09-08 07:19:49'),(2,'Mozarella',2,'2020-09-08 07:20:00','2020-09-08 07:20:00'),(3,'Parmesano',2,'2020-09-08 07:20:12','2020-09-08 07:20:12'),(4,'Entera',1,'2020-09-08 07:20:18','2020-09-08 07:20:18'),(5,'Semidescremada',1,'2020-09-08 07:20:25','2020-09-08 07:20:25'),(6,'Deslactosada',1,'2020-09-08 07:20:31','2020-09-08 07:20:31'),(7,'Frutilla',3,'2020-09-08 07:20:40','2020-09-08 07:20:40'),(8,'Leche',3,'2020-09-08 07:21:03','2020-09-08 07:21:03'),(9,'Frutilla',4,'2020-09-08 07:21:15','2020-09-08 07:21:15'),(10,'Mango',4,'2020-09-08 07:21:23','2020-09-08 07:21:23'),(11,'Durazno',4,'2020-09-08 07:21:30','2020-09-08 07:21:30'),(12,'Holandes',2,'2020-09-08 07:22:01','2020-09-08 07:22:01');
/*!40000 ALTER TABLE `tipos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombreCompleto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cedula` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `usuario` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rol_id` bigint unsigned NOT NULL,
  `estaActivo` tinyint(1) DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_cedula_unique` (`cedula`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_usuario_unique` (`usuario`),
  KEY `users_rol_id_foreign` (`rol_id`),
  CONSTRAINT `users_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Super Usuario','0000000000','0000000000','example@email.com',NULL,'superusuario','$2y$10$hWK05bFYtvKWjJsnPU/NzOllIWdo.2awVj2lXouA1/Xy39hLnYOMS',1,1,'FlSfVaEPCWuIcz9VaJzWYBsPHF3ysK3cUAMS3Ao9oRF1MRvO8H9yDBOnkOIO',NULL,NULL),(2,'Abdon Calderon Macias','1308864642','099983024','abdonc@gmail.com',NULL,'abdonc','$2y$10$MAs1uBtPm3Lk05MpJNvAYus0x2iVDqCjAYp43SDp9xyJqidEX/nTa',5,1,NULL,'2020-09-08 08:27:31','2020-09-08 08:27:31'),(3,'Javier Calderon','1343459999','0998383838','idonsoft@gmail.com',NULL,'javico','$2y$10$4eQscFdyi.kuQlv/Pdco.ey.7hMST4oKk0k5Vw2HriPR.lP0c/t82',5,1,NULL,'2020-09-14 03:17:22','2020-09-14 03:17:22');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-09-27 23:20:59
