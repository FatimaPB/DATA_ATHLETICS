/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 10.4.27-MariaDB : Database - dbplayeras
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbplayeras` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `dbplayeras`;

/*Table structure for table `tblcargo` */

DROP TABLE IF EXISTS `tblcargo`;

CREATE TABLE `tblcargo` (
  `idCargo` int(11) NOT NULL AUTO_INCREMENT,
  `Cargo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idCargo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tblcargo` */

insert  into `tblcargo`(`idCargo`,`Cargo`) values 
(1,'Administrador'),
(2,'Normal'),
(3,'Diseñador');

/*Table structure for table `tblciudad` */

DROP TABLE IF EXISTS `tblciudad`;

CREATE TABLE `tblciudad` (
  `id_ciudad` int(11) NOT NULL AUTO_INCREMENT,
  `Ciudad` varchar(100) DEFAULT NULL,
  `id_Estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ciudad`),
  KEY `id_Estado` (`id_Estado`),
  CONSTRAINT `tblciudad_ibfk_1` FOREIGN KEY (`id_Estado`) REFERENCES `tblestado` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tblciudad` */

insert  into `tblciudad`(`id_ciudad`,`Ciudad`,`id_Estado`) values 
(16,'Huejutla',4),
(21,'Calnali',4);

/*Table structure for table `tblcliente` */

DROP TABLE IF EXISTS `tblcliente`;

CREATE TABLE `tblcliente` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) DEFAULT NULL,
  `APaterno` varchar(100) DEFAULT NULL,
  `AMaterno` varchar(100) DEFAULT NULL,
  `NumIne` varchar(100) DEFAULT NULL,
  `Edad` int(11) DEFAULT NULL,
  `Foto` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Usuario` varchar(30) DEFAULT NULL,
  `Pass` varchar(100) DEFAULT NULL,
  `idDireccion` int(11) NOT NULL,
  PRIMARY KEY (`idCliente`),
  KEY `idDireccion` (`idDireccion`),
  CONSTRAINT `idDireccion` FOREIGN KEY (`idDireccion`) REFERENCES `tbldireccion` (`id_direccion`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tblcliente` */

insert  into `tblcliente`(`idCliente`,`Nombre`,`APaterno`,`AMaterno`,`NumIne`,`Edad`,`Foto`,`Email`,`Usuario`,`Pass`,`idDireccion`) values 
(11,' Jose','Bautista','De la cruz','5678',38,'Foto_64ba8c6722f13.jpg','luisbdlc@gmail.com','luis','d41d8cd98f00b204e9800998ecf8427e',10),
(14,' Admin','Admin','Admin','123990120094',38,'Foto_64ba92615046c.jpg','luisbdlc@gmail.com','admin','ca808c0760ada39fc179aed279ad3c40',10),
(17,'Admin','Admin','Admin','123990120094',38,'luis.jpg','admin@gmail.com','1','c4ca4238a0b923820dcc509a6f75849b',7);

/*Table structure for table `tblcolonia` */

DROP TABLE IF EXISTS `tblcolonia`;

CREATE TABLE `tblcolonia` (
  `id_colonia` int(11) NOT NULL AUTO_INCREMENT,
  `Colonia` varchar(100) DEFAULT NULL,
  `id_Ciudad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_colonia`),
  KEY `id_Ciudad` (`id_Ciudad`),
  CONSTRAINT `tblcolonia_ibfk_1` FOREIGN KEY (`id_Ciudad`) REFERENCES `tblciudad` (`id_ciudad`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tblcolonia` */

insert  into `tblcolonia`(`id_colonia`,`Colonia`,`id_Ciudad`) values 
(6,'papalotes',16),
(9,'Anahuac',16),
(10,'Bernabe',16);

/*Table structure for table `tblcolor` */

DROP TABLE IF EXISTS `tblcolor`;

CREATE TABLE `tblcolor` (
  `id_color` int(11) NOT NULL AUTO_INCREMENT,
  `codhexa` varchar(100) DEFAULT NULL,
  `nomColor` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_color`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tblcolor` */

insert  into `tblcolor`(`id_color`,`codhexa`,`nomColor`) values 
(5,'$f4f1f3','bonito'),
(8,'#d2b6b6','salmon'),
(9,'#874545','rojo');

/*Table structure for table `tblcorte` */

DROP TABLE IF EXISTS `tblcorte`;

CREATE TABLE `tblcorte` (
  `id_corte` int(11) NOT NULL AUTO_INCREMENT,
  `Corte` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_corte`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tblcorte` */

insert  into `tblcorte`(`id_corte`,`Corte`) values 
(2,'oversized fit'),
(4,'Athletic fit'),
(7,'athletic fit');

/*Table structure for table `tbldireccion` */

DROP TABLE IF EXISTS `tbldireccion`;

CREATE TABLE `tbldireccion` (
  `id_direccion` int(11) NOT NULL AUTO_INCREMENT,
  `Direccion` varchar(300) DEFAULT NULL,
  `id_Colonia` int(11) NOT NULL,
  `costo` float DEFAULT NULL,
  PRIMARY KEY (`id_direccion`),
  KEY `id_Colonia` (`id_Colonia`),
  CONSTRAINT `tbldireccion_ibfk_1` FOREIGN KEY (`id_Colonia`) REFERENCES `tblcolonia` (`id_colonia`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbldireccion` */

insert  into `tbldireccion`(`id_direccion`,`Direccion`,`id_Colonia`,`costo`) values 
(7,'constituyentes',6,100),
(9,'Cerrada 4 caminos',9,200),
(10,'Cerrada Emiliano zapata',6,150),
(11,'Tecoluco',10,1000);

/*Table structure for table `tblelabmateriales` */

DROP TABLE IF EXISTS `tblelabmateriales`;

CREATE TABLE `tblelabmateriales` (
  `Prenda` int(11) DEFAULT NULL,
  `Material` int(11) DEFAULT NULL,
  `Porcentaje` float DEFAULT NULL,
  KEY `Prenda` (`Prenda`),
  KEY `Material` (`Material`),
  CONSTRAINT `tblelabmateriales_ibfk_1` FOREIGN KEY (`Prenda`) REFERENCES `tblprenda` (`id_prenda`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tblelabmateriales_ibfk_2` FOREIGN KEY (`Material`) REFERENCES `tblmateriales` (`idMateriales`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tblelabmateriales` */

insert  into `tblelabmateriales`(`Prenda`,`Material`,`Porcentaje`) values 
(12,1,100),
(13,3,100),
(15,3,100);

/*Table structure for table `tblempleados` */

DROP TABLE IF EXISTS `tblempleados`;

CREATE TABLE `tblempleados` (
  `RFC` varchar(100) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `APaterno` varchar(100) DEFAULT NULL,
  `AMaterno` varchar(100) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `NumIne` varchar(150) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `Email` varchar(70) DEFAULT NULL,
  `Curp` varchar(100) DEFAULT NULL,
  `Pass` varchar(100) DEFAULT NULL,
  `Usuario` varchar(30) DEFAULT NULL,
  `Cargo` int(11) NOT NULL,
  `Direccion` int(11) NOT NULL,
  PRIMARY KEY (`RFC`),
  KEY `Car` (`Cargo`),
  KEY `dir` (`Direccion`),
  CONSTRAINT `Car` FOREIGN KEY (`Cargo`) REFERENCES `tblcargo` (`idCargo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `dir` FOREIGN KEY (`Direccion`) REFERENCES `tbldireccion` (`id_direccion`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tblempleados` */

insert  into `tblempleados`(`RFC`,`Nombre`,`APaterno`,`AMaterno`,`Telefono`,`NumIne`,`foto`,`Email`,`Curp`,`Pass`,`Usuario`,`Cargo`,`Direccion`) values 
('1983','Luis Gerard','Del Angel','Hernandez','7713466575','12313sd','foto_64b54c42e9548.jpg','luis@gmail.com','123defr','c81e728d9d4c2f636f067f89cc14862c','2',1,10);

/*Table structure for table `tblentrega` */

DROP TABLE IF EXISTS `tblentrega`;

CREATE TABLE `tblentrega` (
  `idEntrega` int(11) NOT NULL AUTO_INCREMENT,
  `IdDireccion` int(11) NOT NULL,
  `idEmpleado` varchar(300) NOT NULL,
  `EstadoEntrega` varchar(300) DEFAULT NULL,
  `idVenta` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  PRIMARY KEY (`idEntrega`),
  KEY `IdDireccion` (`IdDireccion`),
  KEY `idEmpleado` (`idEmpleado`),
  KEY `idVenta` (`idVenta`),
  KEY `idCliente` (`idCliente`),
  CONSTRAINT `tblentrega_ibfk_1` FOREIGN KEY (`IdDireccion`) REFERENCES `tbldireccion` (`id_direccion`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tblentrega_ibfk_2` FOREIGN KEY (`idEmpleado`) REFERENCES `tblempleados` (`RFC`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tblentrega_ibfk_3` FOREIGN KEY (`idVenta`) REFERENCES `tblventa` (`idVenta`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tblentrega_ibfk_4` FOREIGN KEY (`idCliente`) REFERENCES `tblcliente` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tblentrega` */

/*Table structure for table `tblestado` */

DROP TABLE IF EXISTS `tblestado`;

CREATE TABLE `tblestado` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `Estado` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tblestado` */

insert  into `tblestado`(`id_estado`,`Estado`) values 
(4,'Hidalgo'),
(31,'');

/*Table structure for table `tblhistorialclinico` */

DROP TABLE IF EXISTS `tblhistorialclinico`;

CREATE TABLE `tblhistorialclinico` (
  `idHistorial` int(11) NOT NULL AUTO_INCREMENT,
  `TipoSangre` varchar(100) DEFAULT NULL,
  `Padecimientos` varchar(200) DEFAULT NULL,
  `Alergias` varchar(250) DEFAULT NULL,
  `Medicamentos` varchar(200) DEFAULT NULL,
  `idCliente` int(11) DEFAULT NULL,
  PRIMARY KEY (`idHistorial`),
  KEY `cliente` (`idCliente`),
  CONSTRAINT `cliente` FOREIGN KEY (`idCliente`) REFERENCES `tblcliente` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tblhistorialclinico` */

insert  into `tblhistorialclinico`(`idHistorial`,`TipoSangre`,`Padecimientos`,`Alergias`,`Medicamentos`,`idCliente`) values 
(32,'o+','en proceso','ninguna','en proceso',11),
(35,'o+','en proceso','ninguna','en proceso',14),
(38,'o+','en proceso','ninguna','en proceso',17);

/*Table structure for table `tblinventario` */

DROP TABLE IF EXISTS `tblinventario`;

CREATE TABLE `tblinventario` (
  `id_inventario` int(11) NOT NULL AUTO_INCREMENT,
  `id_prenda` int(11) NOT NULL,
  `Existencia` int(11) DEFAULT NULL,
  `Maximo` int(11) DEFAULT NULL,
  `Minimo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_inventario`),
  KEY `pk_prenda` (`id_prenda`),
  CONSTRAINT `pk_prenda` FOREIGN KEY (`id_prenda`) REFERENCES `tblprenda` (`id_prenda`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tblinventario` */

insert  into `tblinventario`(`id_inventario`,`id_prenda`,`Existencia`,`Maximo`,`Minimo`) values 
(4,12,90,50,1),
(5,13,5,10,1),
(7,15,40,100,1);

/*Table structure for table `tblmateriales` */

DROP TABLE IF EXISTS `tblmateriales`;

CREATE TABLE `tblmateriales` (
  `idMateriales` int(11) NOT NULL AUTO_INCREMENT,
  `Material` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idMateriales`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tblmateriales` */

insert  into `tblmateriales`(`idMateriales`,`Material`) values 
(1,'Algodon'),
(3,'Poliester'),
(4,'Nylon'),
(6,'lycra');

/*Table structure for table `tblprenda` */

DROP TABLE IF EXISTS `tblprenda`;

CREATE TABLE `tblprenda` (
  `id_prenda` int(11) NOT NULL AUTO_INCREMENT,
  `Modelo` varchar(200) DEFAULT NULL,
  `Genero` varchar(20) DEFAULT NULL,
  `Precio_venta` float DEFAULT NULL,
  `Iva` float DEFAULT NULL,
  `Foto` varchar(100) DEFAULT NULL,
  `id_corte` int(11) NOT NULL,
  `id_talla` int(11) NOT NULL,
  `id_color` int(11) NOT NULL,
  PRIMARY KEY (`id_prenda`),
  KEY `id_corte` (`id_corte`),
  KEY `id_talla` (`id_talla`),
  KEY `id_color` (`id_color`),
  CONSTRAINT `id_color` FOREIGN KEY (`id_color`) REFERENCES `tblcolor` (`id_color`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `id_corte` FOREIGN KEY (`id_corte`) REFERENCES `tblcorte` (`id_corte`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `id_talla` FOREIGN KEY (`id_talla`) REFERENCES `tbltalla` (`id_talla`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tblprenda` */

insert  into `tblprenda`(`id_prenda`,`Modelo`,`Genero`,`Precio_venta`,`Iva`,`Foto`,`id_corte`,`id_talla`,`id_color`) values 
(12,'playera','unisex',500,50,'Foto_64b43e22ef900.jpg',2,3,5),
(13,'modelo05','unisex',380,20,'Foto_64b690b83f636.jpg',4,4,8),
(15,'Playera de rudy','unisex',8000,1000,'Foto_64ba0466dbaab.jpg',2,3,5);

/*Table structure for table `tbltalla` */

DROP TABLE IF EXISTS `tbltalla`;

CREATE TABLE `tbltalla` (
  `id_talla` int(11) NOT NULL AUTO_INCREMENT,
  `talla` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_talla`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbltalla` */

insert  into `tbltalla`(`id_talla`,`talla`) values 
(3,'M'),
(4,'L'),
(5,'XXL');

/*Table structure for table `tblventa` */

DROP TABLE IF EXISTS `tblventa`;

CREATE TABLE `tblventa` (
  `idVenta` int(11) NOT NULL,
  `Cliente` int(11) DEFAULT NULL,
  `Empleado` varchar(100) DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `Total_pagar` float DEFAULT NULL,
  `idEntrega` int(11) DEFAULT NULL,
  PRIMARY KEY (`idVenta`),
  KEY `entrega` (`idEntrega`),
  KEY `Cliente` (`Cliente`),
  KEY `Empleado` (`Empleado`),
  CONSTRAINT `tblventa_ibfk_1` FOREIGN KEY (`Cliente`) REFERENCES `tblcliente` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tblventa_ibfk_2` FOREIGN KEY (`Empleado`) REFERENCES `tblempleados` (`RFC`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tblventa` */

/*Table structure for table `tblventadetalle` */

DROP TABLE IF EXISTS `tblventadetalle`;

CREATE TABLE `tblventadetalle` (
  `idPrenda` int(11) NOT NULL,
  `idVenta` int(11) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `Subtotal` float DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Hora` time DEFAULT NULL,
  KEY `idPrenda` (`idPrenda`),
  KEY `idVenta` (`idVenta`),
  CONSTRAINT `tblventadetalle_ibfk_1` FOREIGN KEY (`idPrenda`) REFERENCES `tblprenda` (`id_prenda`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tblventadetalle_ibfk_2` FOREIGN KEY (`idVenta`) REFERENCES `tblventa` (`idVenta`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tblventadetalle` */

/* Procedure structure for procedure `SP_ACTUALIZARCARGO` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_ACTUALIZARCARGO` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ACTUALIZARCARGO`(IN id int, in descripcion varchar(100))
BEGIN
	UPDATE tblcargo SET Cargo=descripcion
	WHERE idCargo=id;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_ACTUALIZARCIUDAD` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_ACTUALIZARCIUDAD` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ACTUALIZARCIUDAD`(IN id int, in cd varchar(100), in id_Es int)
BEGIN
	UPDATE tblciudad SET Ciudad=cd, id_Estado=id_Es
	WHERE id_ciudad=id;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_ACTUALIZARCLIENTE` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_ACTUALIZARCLIENTE` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ACTUALIZARCLIENTE`(in id int, IN nom VARCHAR(100),IN ap VARCHAR(100),IN am VARCHAR(100),IN ine VARCHAR(100),
    IN age INT,IN fot VARCHAR(100), IN correo VARCHAR(100),IN uss VARCHAR(30), IN pas VARCHAR(100),IN iddir INT,
    IN TP VARCHAR(100),IN Pad VARCHAR(200),IN ale VARCHAR(250), IN Med VARCHAR(200))
BEGIN
	UPDATE tblcliente SET Nombre=nom, APaterno=ap,AMaterno=am,NumIne=ine,Edad=age,Foto=fot,Email=correo,
	Usuario=uss, Pass=MD5(pas),idDireccion=iddir
	WHERE idCliente=id;
	
	update tblhistorialclinico set TipoSangre=Tp, Padecimientos=Pad, Alergias=ale, Medicamentos=Med
	where idCliente=id;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_ACTUALIZARCOLONIA` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_ACTUALIZARCOLONIA` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ACTUALIZARCOLONIA`(in id int, in col varchar(100), in id_Ci int)
BEGIN
	UPDATE tblcolonia SET Colonia=col, id_Ciudad=id_Ci
	WHERE id_colonia=id;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_ACTUALIZARCOLOR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_ACTUALIZARCOLOR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ACTUALIZARCOLOR`(IN id int,IN codhe VARCHAR(100),IN nomColo VARCHAR(100))
BEGIN
	UPDATE tblcolor SET codhexa=codhe, nomColor=nomColo
	WHERE id_color=id;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_ACTUALIZARCORTE` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_ACTUALIZARCORTE` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ACTUALIZARCORTE`(in id int, in cor varchar(100))
BEGIN
	UPDATE tblcorte SET Corte=cor
	WHERE id_corte=id;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_ACTUALIZARDIRECCION` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_ACTUALIZARDIRECCION` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ACTUALIZARDIRECCION`(in id int, in dir varchar(100), in id_col int, in cost float)
BEGIN
	UPDATE tbldireccion SEt Direccion=dir, id_Colonia=id_col, costo=cost
	WHERE id_direccion=id;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_ACTUALIZAREMPLEADO` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_ACTUALIZAREMPLEADO` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ACTUALIZAREMPLEADO`(IN id VARCHAR(100),IN nom VARCHAR(100),IN ap VARCHAR(100),IN am VARCHAR(100),IN tel VARCHAR(20),
    IN ine VARCHAR(150),IN fot VARCHAR(100),IN correo VARCHAR(70),IN cur VARCHAR(100),IN pas VARCHAR(100),IN uss VARCHAR(30),IN car INT,IN dir INT)
BEGIN
	UPDATE tblempleados SET RFC=id, Nombre=nom, APaterno=ap, AMaterno=am, Telefono=tel, NumIne=ine, foto=fot, Email=correo,
	Curp=cur, Pass=MD5(pas), Usuario=uss, Cargo=car, Direccion=dir
	WHERE RFC=id;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_ACTUALIZARESTADO` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_ACTUALIZARESTADO` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ACTUALIZARESTADO`(in id int, in es varchar(100))
BEGIN
	UPDATE tblestado SET Estado=es
	WHERE id_estado=id;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_ACTUALIZARHISTORIALCLINICO` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_ACTUALIZARHISTORIALCLINICO` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ACTUALIZARHISTORIALCLINICO`(IN id INT,IN TP VARCHAR(100),IN Pad VARCHAR(200),IN ale VARCHAR(250), 
    IN Med VARCHAR(200), IN cliente INT)
BEGIN
	UPDATE tblhistorialclinico SET TipoSangre=TP, Padecimientos=pad, Alergias=ale, Medicamentos=Med,idCliente=cliente
	WHERE idHistorial=id;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_ACTUALIZARMATERIAL` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_ACTUALIZARMATERIAL` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ACTUALIZARMATERIAL`(in id int, in mat varchar(100))
BEGIN
	UPDATE tblmateriales SET Material=mat
	WHERE idMateriales=id;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_ACTUALIZARPRENDA` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_ACTUALIZARPRENDA` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ACTUALIZARPRENDA`(in idPre int, IN model VARCHAR(200), IN Gen VARCHAR(20),
 IN PrecioV FLOAT, IN iv FLOAT, IN fot VARCHAR(100), IN idCorte INT, IN idTalla INT, IN idColor INT, IN exi INT,
 IN maxi INT, IN mini INT, IN idMat INT, IN porc FLOAT)
BEGIN
	
	UPDATE tblprenda SET Modelo=model, Genero=Gen, Precio_venta=PrecioV, Iva=iv, Foto=fot, id_corte=idCorte,
	id_talla=idTalla, id_color=idColor WHERE id_prenda=idPre;
	
	update tblinventario set Existencia=exi , Maximo=maxi, Minimo=mini
	where id_prenda=idPre;
	
	update tblelabmateriales set Material=idMat, Porcentaje=porc
	where Prenda=idPre;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_ACTUALIZARTALLA` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_ACTUALIZARTALLA` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ACTUALIZARTALLA`(in id int, in tal varchar(100))
BEGIN
	UPDATE tbltalla SET talla=tal
	WHERE id_talla=id;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_CONSULTAALLDIRECCIONES` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_CONSULTAALLDIRECCIONES` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_CONSULTAALLDIRECCIONES`()
BEGIN
	select * from direccionxcoloniaxciudadxestado;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_CONSULTACOLONIA` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_CONSULTACOLONIA` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_CONSULTACOLONIA`()
BEGIN
	SELECT * FROM tblcolonia;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_CONSULTACOLOR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_CONSULTACOLOR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_CONSULTACOLOR`()
BEGIN
	SELECT * FROM tblcolor;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_CONSULTACORTE` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_CONSULTACORTE` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_CONSULTACORTE`()
BEGIN
	SELECT * FROM tblcorte;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_CONSULTADIRECCION` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_CONSULTADIRECCION` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_CONSULTADIRECCION`()
BEGIN
	SELECT * FROM tbldireccion;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_CONSULTAESTADO` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_CONSULTAESTADO` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_CONSULTAESTADO`()
BEGIN
	SELECT * FROM tblestado;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_CONSULTAMATERIAL` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_CONSULTAMATERIAL` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_CONSULTAMATERIAL`()
BEGIN
	SELECT * FROM tblmateriales;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_CONSULTAMUNICIPIO` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_CONSULTAMUNICIPIO` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_CONSULTAMUNICIPIO`()
BEGIN
	SELECT * FROM tblciudad;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_CONSULTAPRENDAID` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_CONSULTAPRENDAID` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_CONSULTAPRENDAID`(IN id int)
BEGIN
	SELECT * FROM prendaxcortextallaxcolorxmaterialesxelabxinventario WHERE id_prenda=id;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_CONSULTAPRENDATOTAL` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_CONSULTAPRENDATOTAL` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_CONSULTAPRENDATOTAL`()
BEGIN
	SELECT * FROM prendaxcortextallaxcolorxmaterialesxelabxinventario;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_CONSULTAPRENDAxCORTE` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_CONSULTAPRENDAxCORTE` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_CONSULTAPRENDAxCORTE`(in cor varchar(100))
BEGIN
	SELECT * FROM prendaxcortextallaxcolorxmaterialesxelabxinventario v2 
	WHERE v2.Corte=cor; 
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_CONSULTAPRENDAxMATERIAL` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_CONSULTAPRENDAxMATERIAL` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_CONSULTAPRENDAxMATERIAL`(in mat varchar(100))
BEGIN
	SELECT * FROM prendaxcortextallaxcolorxmaterialesxelabxinventario v2 
	WHERE v2.Material=mat; 
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_CONSULTATALLA` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_CONSULTATALLA` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_CONSULTATALLA`()
BEGIN
	SELECT * FROM tbltalla;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_ELIMINARCARGO` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_ELIMINARCARGO` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ELIMINARCARGO`(in id int)
BEGIN
	DELETE FROM tblcargo WHERE idCargo=id;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_ELIMINARCIUDAD` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_ELIMINARCIUDAD` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ELIMINARCIUDAD`(in id int)
BEGIN
	DELETE FROM tblciudad WHERE id_ciudad=id;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_ELIMINARCLIENTE` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_ELIMINARCLIENTE` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ELIMINARCLIENTE`(in id int)
BEGIN
	DELETE FROM tblcliente WHERE idCliente=id;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_ELIMINARCOLONIA` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_ELIMINARCOLONIA` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ELIMINARCOLONIA`(in id int)
BEGIN
	DELETE FROM tblcolonia WHERE id_colonia=id;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_ELIMINARCOLOR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_ELIMINARCOLOR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ELIMINARCOLOR`(in id int)
BEGIN
	DELETE FROM tblcolor WHERE id_color=id;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_ELIMINARCORTE` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_ELIMINARCORTE` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ELIMINARCORTE`(in id int)
BEGIN
	DELETE FROM tblcorte WHERE id_corte=id;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_ELIMINARDIRECCION` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_ELIMINARDIRECCION` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ELIMINARDIRECCION`(IN id INT)
BEGIN
	DELETE FROM tbldireccion WHERE id_direccion=id;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_ELIMINAREMPLEADO` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_ELIMINAREMPLEADO` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ELIMINAREMPLEADO`(in id varchar(100))
BEGIN
	DELETE FROM tblempleados WHERE RFC=id;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_ELIMINARESTADO` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_ELIMINARESTADO` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ELIMINARESTADO`(in id int)
BEGIN
	DELETE FROM tblestado WHERE id_estado=id;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_ELIMINARMATERIAL` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_ELIMINARMATERIAL` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ELIMINARMATERIAL`(in id int)
BEGIN
	DELETE FROM tblmateriales WHERE idMateriales=id;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_ELIMINARPRENDA` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_ELIMINARPRENDA` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ELIMINARPRENDA`(In id int)
BEGIN
	DELETE FROM tblprenda wHERE id_prenda=id;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_ELIMINARTALLA` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_ELIMINARTALLA` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ELIMINARTALLA`(in id int)
BEGIN
	DELETE FROM tbltalla WHERE id_talla=id;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_EMPLEADOBYID` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_EMPLEADOBYID` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_EMPLEADOBYID`(IN rf varchar(100))
BEGIN
	SELECT * FROM tblempleados WHERE RFC=rf;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_GetAllCargo` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_GetAllCargo` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_GetAllCargo`()
BEGIN
	select * from tblcargo;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_GETALLCLIENTES` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_GETALLCLIENTES` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_GETALLCLIENTES`()
BEGIN
	SELECT * FROM clientexhistorialmedico;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_GETALLEMPLEADOS` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_GETALLEMPLEADOS` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_GETALLEMPLEADOS`()
BEGIN
	SELECT * FROM empleadoxcargo;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_GETCLIENTESBYID` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_GETCLIENTESBYID` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_GETCLIENTESBYID`(IN id VARCHAR(100))
BEGIN
	
	SELECT * FROM clientexhistorialmedico v2
	WHERE v2.idCliente=id;

	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_GETCOLONIABYID` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_GETCOLONIABYID` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_GETCOLONIABYID`(in id int)
BEGIN
	SELECT * FROM tblcolonia WHERE id_colonia=id;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_GETCOLORBYID` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_GETCOLORBYID` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_GETCOLORBYID`(in id int)
BEGIN
	SELECT * FROM tblcolor WHERE id_color=id;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_GETCORTEBYID` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_GETCORTEBYID` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_GETCORTEBYID`(IN id int)
BEGIN
	SELECT * FROM tblcorte WHERE id_corte=id;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_GETCREDENTIALCLIENTES` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_GETCREDENTIALCLIENTES` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_GETCREDENTIALCLIENTES`(IN usu VARCHAR(30), IN Ccli VARCHAR(100))
BEGIN
	
	SELECT v3.Usuario, v3.`Pass`, v3.`idCliente` 
	FROM clientexhistorialmedico v3
	WHERE v3.`Usuario`=usu AND v3.`Pass`= MD5(Ccli);
	
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_GETCREDENTIALEMPLEADO` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_GETCREDENTIALEMPLEADO` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_GETCREDENTIALEMPLEADO`(in usu varchar(30), IN Cemp VARCHAR(100))
BEGIN
	SELECT v3.`Usuario`, v3.`Pass` 
	FROM empleadoxcargo v3
	where v3.`Usuario`=usu and v3.`Pass`= md5(Cemp);
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_GETDIRECCIONBYID` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_GETDIRECCIONBYID` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_GETDIRECCIONBYID`(in id int)
BEGIN
	SELECT * FROM tbldireccion WHERE id_direccion=id;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_GETEMPLEADOBYID` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_GETEMPLEADOBYID` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_GETEMPLEADOBYID`(in id VARCHAR(100))
BEGIN
	SELECT * FROM tblempleados WHERE RFC=id;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_GETESTADOBYID` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_GETESTADOBYID` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_GETESTADOBYID`(IN id INT)
BEGIN
		SELECT * FROM tblestado WHERE id_estado=id;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_GETMATERIALBYID` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_GETMATERIALBYID` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_GETMATERIALBYID`(IN id INT)
BEGIN
	SELECT * FROM tblmateriales WHERE idMateriales=id;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_GETMUNICIPIOBYID` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_GETMUNICIPIOBYID` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_GETMUNICIPIOBYID`(in id int)
BEGIN
	SELECT * FROM tblciudad WHERE id_ciudad=id;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_GETTALLABYID` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_GETTALLABYID` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_GETTALLABYID`(in id INT)
BEGIN
	SELECT * FROM tbltalla WHERE id_talla=id;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_INSERTARCARGO` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_INSERTARCARGO` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_INSERTARCARGO`(IN car varchar(100))
BEGIN
	INSERT INTO tblcargo(Cargo) 
	VALUES(car);	
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_INSERTARCIUDAD` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_INSERTARCIUDAD` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_INSERTARCIUDAD`(IN cd varchar(100), in id_Es int)
BEGIN
	INSERT INTO tblciudad(Ciudad, id_Estado) 
	VALUES(cd, id_Es);	
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_INSERTARCLIENTE` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_INSERTARCLIENTE` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_INSERTARCLIENTE`(IN nom VARCHAR(100),IN ap VARCHAR(100),IN am VARCHAR(100),IN ine VARCHAR(100),
    IN age INT,IN fot VARCHAR(100), IN correo VARCHAR(100),IN uss VARCHAR(30), IN pas VARCHAR(100),IN iddir INT,
    IN TP VARCHAR(100),IN Pad VARCHAR(200),IN ale VARCHAR(250), IN Med VARCHAR(200))
BEGIN
	declare idC int;
	INSERT INTO tblcliente(Nombre,APaterno,AMaterno,NumIne,Edad,Foto,Email,Usuario,Pass,idDireccion) 
	VALUES(nom,ap,am,ine,age, fot, correo, uss, MD5(pas),iddir);
	
	set idC=(select max(tblcliente.`idCliente`) from tblcliente);
	
	INSERT INTO tblhistorialclinico(TipoSangre, Padecimientos,Alergias,Medicamentos,idCliente)
	VALUES(TP, Pad, ale, Med,idC);
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_INSERTARCOLONIA` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_INSERTARCOLONIA` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_INSERTARCOLONIA`(IN col VARCHAR(100), IN id_cid INT)
BEGIN
	INSERT INTO tblcolonia(Colonia, id_Ciudad) 
	VALUES(col,id_cid);
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_INSERTARCOLOR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_INSERTARCOLOR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_INSERTARCOLOR`(in codhe varchar(100),in nomColo varchar(100))
BEGIN
	INSERT INTO tblcolor(codhexa, nomColor) 
	VALUES(codhe, nomColo);	
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_INSERTARCORTE` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_INSERTARCORTE` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_INSERTARCORTE`(in cor varchar(100))
BEGIN
	INSERT INTO tblcorte(Corte) 
	VALUES(cor);	
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_INSERTARDIRECCION` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_INSERTARDIRECCION` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_INSERTARDIRECCION`(IN dir varchar(100), in id_col int, in cost float)
BEGIN
	INSERT INTO tbldireccion(Direccion, id_Colonia, costo) 
	VALUES(dir, id_col,cost);	
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_INSERTAREMPLEADO` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_INSERTAREMPLEADO` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_INSERTAREMPLEADO`(in id varchar(100),in nom varchar(100),in ap varchar(100),in am varchar(100),in tel varchar(20),
    in ine varchar(150),in fot varchar(100),in correo varchar(70),in cur varchar(100),in pas varchar(100),in uss varchar(30),in car int,in dir int)
BEGIN
	INSERT INTO tblempleados(RFC,Nombre,APaterno,AMaterno,Telefono,NumIne,foto,Email,Curp,Pass,Usuario,Cargo,Direccion) 
	VALUES(id,nom,ap,am,tel,ine,fot,correo,cur,MD5(pas),uss,car,dir);	
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_INSERTARESTADO` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_INSERTARESTADO` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_INSERTARESTADO`(in es varchar(100))
BEGIN
	INSERT INTO tblestado(Estado) 
	VALUES(es);	
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_INSERTARMATERIAL` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_INSERTARMATERIAL` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_INSERTARMATERIAL`(in mat varchar(100))
BEGIN
	INSERT INTO tblmateriales(Material) 
	VALUES(mat);	
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_INSERTARPRENDAS` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_INSERTARPRENDAS` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_INSERTARPRENDAS`(IN model VARCHAR(200), IN Gen VARCHAR(20), IN PrecioV FLOAT, IN iv FLOAT,
     IN fot VARCHAR(100), IN idCorte INT, IN idTalla INT, IN idColor INT,
     IN exi INT, IN maxi INT, IN mini INT, IN idMat INt, IN porc FLOAT)
BEGIN
	
	DECLARE idPre INT;
	INSERT INTO tblprenda(Modelo, Genero, Precio_venta, Iva, Foto, id_corte, id_talla, id_color) 
	VALUES(model,Gen,PrecioV,iv,fot,idCorte,idTalla,idColor);
	
	SET idPre=(SELECT MAX(tblprenda.`id_prenda`) FROM tblprenda);
	
	INSERT INTO tblinventario(id_prenda, Existencia, Maximo, Minimo)
	VALUES(idPre,exi,maxi,mini);
	
	INSERT INTO tblelabmateriales(Prenda, Material, Porcentaje)
	VALUES(idPre, idMat, porc);
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_INSERTARTALLA` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_INSERTARTALLA` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_INSERTARTALLA`(in tal varchar(100))
BEGIN
	INSERT INTO tbltalla(talla) 
	VALUES(tal);	
	END */$$
DELIMITER ;

/*Table structure for table `clientexhistorialmedico` */

DROP TABLE IF EXISTS `clientexhistorialmedico`;

/*!50001 DROP VIEW IF EXISTS `clientexhistorialmedico` */;
/*!50001 DROP TABLE IF EXISTS `clientexhistorialmedico` */;

/*!50001 CREATE TABLE  `clientexhistorialmedico`(
 `Nombre` varchar(100) ,
 `APaterno` varchar(100) ,
 `AMaterno` varchar(100) ,
 `NumIne` varchar(100) ,
 `Edad` int(11) ,
 `Foto` varchar(100) ,
 `Email` varchar(100) ,
 `Usuario` varchar(30) ,
 `Pass` varchar(100) ,
 `TipoSangre` varchar(100) ,
 `Padecimientos` varchar(200) ,
 `Alergias` varchar(250) ,
 `Medicamentos` varchar(200) ,
 `idCliente` int(11) 
)*/;

/*Table structure for table `direccionxcoloniaxciudadxestado` */

DROP TABLE IF EXISTS `direccionxcoloniaxciudadxestado`;

/*!50001 DROP VIEW IF EXISTS `direccionxcoloniaxciudadxestado` */;
/*!50001 DROP TABLE IF EXISTS `direccionxcoloniaxciudadxestado` */;

/*!50001 CREATE TABLE  `direccionxcoloniaxciudadxestado`(
 `id_direccion` int(11) ,
 `Direccion` varchar(300) ,
 `costo` float ,
 `id_colonia` int(11) ,
 `Colonia` varchar(100) ,
 `id_ciudad` int(11) ,
 `Ciudad` varchar(100) ,
 `id_estado` int(11) ,
 `Estado` varchar(100) 
)*/;

/*Table structure for table `empleadoxcargo` */

DROP TABLE IF EXISTS `empleadoxcargo`;

/*!50001 DROP VIEW IF EXISTS `empleadoxcargo` */;
/*!50001 DROP TABLE IF EXISTS `empleadoxcargo` */;

/*!50001 CREATE TABLE  `empleadoxcargo`(
 `RFC` varchar(100) ,
 `Nombre` varchar(100) ,
 `APaterno` varchar(100) ,
 `AMaterno` varchar(100) ,
 `Telefono` varchar(20) ,
 `NumIne` varchar(150) ,
 `foto` varchar(100) ,
 `Email` varchar(70) ,
 `Curp` varchar(100) ,
 `Pass` varchar(100) ,
 `Usuario` varchar(30) ,
 `idCargo` int(11) ,
 `Cargo` varchar(100) 
)*/;

/*Table structure for table `prendaxcortextallaxcolorxmaterialesxelabxinventario` */

DROP TABLE IF EXISTS `prendaxcortextallaxcolorxmaterialesxelabxinventario`;

/*!50001 DROP VIEW IF EXISTS `prendaxcortextallaxcolorxmaterialesxelabxinventario` */;
/*!50001 DROP TABLE IF EXISTS `prendaxcortextallaxcolorxmaterialesxelabxinventario` */;

/*!50001 CREATE TABLE  `prendaxcortextallaxcolorxmaterialesxelabxinventario`(
 `id_prenda` int(11) ,
 `Modelo` varchar(200) ,
 `Genero` varchar(20) ,
 `Precio_venta` float ,
 `Iva` float ,
 `Foto` varchar(100) ,
 `id_talla` int(11) ,
 `talla` varchar(20) ,
 `id_corte` int(11) ,
 `Corte` varchar(100) ,
 `id_color` int(11) ,
 `codhexa` varchar(100) ,
 `nomColor` varchar(100) ,
 `idMateriales` int(11) ,
 `Material` varchar(100) ,
 `Porcentaje` float ,
 `id_inventario` int(11) ,
 `Existencia` int(11) ,
 `Maximo` int(11) ,
 `Minimo` int(11) 
)*/;

/*View structure for view clientexhistorialmedico */

/*!50001 DROP TABLE IF EXISTS `clientexhistorialmedico` */;
/*!50001 DROP VIEW IF EXISTS `clientexhistorialmedico` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `clientexhistorialmedico` AS (select `tblcliente`.`Nombre` AS `Nombre`,`tblcliente`.`APaterno` AS `APaterno`,`tblcliente`.`AMaterno` AS `AMaterno`,`tblcliente`.`NumIne` AS `NumIne`,`tblcliente`.`Edad` AS `Edad`,`tblcliente`.`Foto` AS `Foto`,`tblcliente`.`Email` AS `Email`,`tblcliente`.`Usuario` AS `Usuario`,`tblcliente`.`Pass` AS `Pass`,`tblhistorialclinico`.`TipoSangre` AS `TipoSangre`,`tblhistorialclinico`.`Padecimientos` AS `Padecimientos`,`tblhistorialclinico`.`Alergias` AS `Alergias`,`tblhistorialclinico`.`Medicamentos` AS `Medicamentos`,`tblhistorialclinico`.`idCliente` AS `idCliente` from (`tblcliente` join `tblhistorialclinico` on(`tblcliente`.`idCliente` = `tblhistorialclinico`.`idCliente`))) */;

/*View structure for view direccionxcoloniaxciudadxestado */

/*!50001 DROP TABLE IF EXISTS `direccionxcoloniaxciudadxestado` */;
/*!50001 DROP VIEW IF EXISTS `direccionxcoloniaxciudadxestado` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `direccionxcoloniaxciudadxestado` AS (select `tbldireccion`.`id_direccion` AS `id_direccion`,`tbldireccion`.`Direccion` AS `Direccion`,`tbldireccion`.`costo` AS `costo`,`tblcolonia`.`id_colonia` AS `id_colonia`,`tblcolonia`.`Colonia` AS `Colonia`,`tblciudad`.`id_ciudad` AS `id_ciudad`,`tblciudad`.`Ciudad` AS `Ciudad`,`tblestado`.`id_estado` AS `id_estado`,`tblestado`.`Estado` AS `Estado` from (((`tbldireccion` join `tblcolonia`) join `tblciudad`) join `tblestado` on(`tbldireccion`.`id_Colonia` = `tblcolonia`.`id_colonia`)) where `tblcolonia`.`id_Ciudad` = `tblciudad`.`id_ciudad` and `tblciudad`.`id_Estado` = `tblestado`.`id_estado`) */;

/*View structure for view empleadoxcargo */

/*!50001 DROP TABLE IF EXISTS `empleadoxcargo` */;
/*!50001 DROP VIEW IF EXISTS `empleadoxcargo` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `empleadoxcargo` AS (select `tblempleados`.`RFC` AS `RFC`,`tblempleados`.`Nombre` AS `Nombre`,`tblempleados`.`APaterno` AS `APaterno`,`tblempleados`.`AMaterno` AS `AMaterno`,`tblempleados`.`Telefono` AS `Telefono`,`tblempleados`.`NumIne` AS `NumIne`,`tblempleados`.`foto` AS `foto`,`tblempleados`.`Email` AS `Email`,`tblempleados`.`Curp` AS `Curp`,`tblempleados`.`Pass` AS `Pass`,`tblempleados`.`Usuario` AS `Usuario`,`tblcargo`.`idCargo` AS `idCargo`,`tblcargo`.`Cargo` AS `Cargo` from (`tblempleados` join `tblcargo` on(`tblempleados`.`Cargo` = `tblcargo`.`idCargo`))) */;

/*View structure for view prendaxcortextallaxcolorxmaterialesxelabxinventario */

/*!50001 DROP TABLE IF EXISTS `prendaxcortextallaxcolorxmaterialesxelabxinventario` */;
/*!50001 DROP VIEW IF EXISTS `prendaxcortextallaxcolorxmaterialesxelabxinventario` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `prendaxcortextallaxcolorxmaterialesxelabxinventario` AS (select `tblprenda`.`id_prenda` AS `id_prenda`,`tblprenda`.`Modelo` AS `Modelo`,`tblprenda`.`Genero` AS `Genero`,`tblprenda`.`Precio_venta` AS `Precio_venta`,`tblprenda`.`Iva` AS `Iva`,`tblprenda`.`Foto` AS `Foto`,`tbltalla`.`id_talla` AS `id_talla`,`tbltalla`.`talla` AS `talla`,`tblcorte`.`id_corte` AS `id_corte`,`tblcorte`.`Corte` AS `Corte`,`tblcolor`.`id_color` AS `id_color`,`tblcolor`.`codhexa` AS `codhexa`,`tblcolor`.`nomColor` AS `nomColor`,`tblmateriales`.`idMateriales` AS `idMateriales`,`tblmateriales`.`Material` AS `Material`,`tblelabmateriales`.`Porcentaje` AS `Porcentaje`,`tblinventario`.`id_inventario` AS `id_inventario`,`tblinventario`.`Existencia` AS `Existencia`,`tblinventario`.`Maximo` AS `Maximo`,`tblinventario`.`Minimo` AS `Minimo` from ((((((`tblprenda` join `tblcorte`) join `tbltalla`) join `tblcolor`) join `tblelabmateriales`) join `tblmateriales`) join `tblinventario` on(`tblprenda`.`id_corte` = `tblcorte`.`id_corte`)) where `tblprenda`.`id_talla` = `tbltalla`.`id_talla` and `tblprenda`.`id_color` = `tblcolor`.`id_color` and `tblprenda`.`id_prenda` = `tblelabmateriales`.`Prenda` and `tblmateriales`.`idMateriales` = `tblelabmateriales`.`Material` and `tblprenda`.`id_prenda` = `tblinventario`.`id_prenda`) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
