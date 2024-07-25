create database `CRUD_LSP`;

use `CRUD_LSP`;

CREATE TABLE `login` (
  `Id` int(9) NOT NULL auto_increment,
  `Nama` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,  
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB;

CREATE TABLE `Mahasiswa` (
  `Id` int(9) NOT NULL auto_increment,
  `Nim` varchar(225) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Sex` varchar(1) NOT NULL,
  `Prodi_Jurusan` varchar(50) NOT NULL,
  `Tanggal_masuk` DATE NOT NULL,
  `Login_id` int(20) NOT NULL,
  PRIMARY KEY  (`Id`),
  CONSTRAINT FK_products_1
  FOREIGN KEY (Login_id) REFERENCES login(Id)
  ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;
