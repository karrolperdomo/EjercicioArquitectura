CREATE DATABASE IF NOT EXISTS parkingdb DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE parkingdb;


DROP TABLE IF EXISTS persona;
CREATE TABLE persona (
  ID int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre varchar(120) DEFAULT NULL,
  usuario varchar(50) NOT NULL,
  correo varchar(120) NOT NULL,
  password varchar(255) NOT NULL,
  celular bigint(10) DEFAULT NULL,
  AdminRegdate timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS categoria;
CREATE TABLE categoria (
  ID int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  tipo varchar(120) DEFAULT NULL,
  fechacreacion timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS vehiculo;
CREATE TABLE vehiculo (
  ID int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Bahia varchar(3) DEFAULT NULL,
  Categoria varchar(120) NOT NULL,
  Marca varchar(120) DEFAULT NULL,
  Placa varchar(120) DEFAULT NULL,
  Propietario varchar(120) DEFAULT NULL,
  Celular bigint(10) DEFAULT NULL,
  HoraEntrada timestamp NULL DEFAULT current_timestamp(),
  HoraSalida timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  Valor varchar(120) NOT NULL,
  Observacion mediumtext NOT NULL,
  Estado varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO categoria (ID, tipo, fechacreacion) VALUES
(1, 'Automovil', '2021-10-30 11:03:50'),
(2, 'Moto', '2021-10-30 11:05:09'),
(3, 'Cicla', '2021-10-30 11:31:17');

INSERT INTO vehiculo (ID, Bahia, Categoria, Marca, Placa, Propietario, Celular, HoraEntrada, HoraSalida, Valor, Observacion, Estado) VALUES
(1, '12', 'Automovil', 'Hyundai', 'DEL-678787', 'Rakesh Chandra', 8956232528, '2021-10-31 05:58:38', '2021-10-31 11:09:36', '50 Rs', 'NA', 'Out'),
(2, '56', 'Moto', 'Activa', 'DEL-895623', 'Pankaj', 8989898989, '2021-10-31 08:58:38', '2021-10-31 11:09:33', '35 Rs.', 'NA', 'Out'),
(3, '71', 'Automovil', 'Hondacity', 'DEL-562389', 'Avinash', 7845123697, '2021-10-31 08:58:38', '2021-10-31 08:59:36', '50 Rs.', 'Vehicle Out', 'Out'),
(4, '41', 'Moto', 'Hero Honda', 'DEL-451236', 'Harish', 2132654447, '2021-10-31 08:58:38', '2021-10-31 09:53:35', '35 Rs.', 'Vehicle Out', 'Out'),
(5, '31', 'Moto', 'Activa', 'DEL-55776', 'Abhi', 4654654654, '2021-10-31 08:58:38', '2021-10-31 08:59:24', '', '', ''),
(6, '1', 'Moto', 'Hondacity', 'DEL-895623', 'Mahesh', 7978999879, '2021-10-31 08:58:38', NULL, '', '', ''),
(7, '5', 'Moto', 'Honda', 'DL 1c RT2323', 'ABC', 1234567890, '2021-10-31 11:03:05', NULL, '', '', ''),
(8, '21', 'Moto', 'Honda Activa', 'DL 1C TY2322', 'Test User', 1234567890, '2021-10-31 11:32:02', '2021-10-31 11:32:42', '40', 'Vehicle Out', 'Out');