CREATE DATABASE tienda_master;
USE tienda_master;

CREATE TABLE usuarios (
id INT (255) AUTO_INCREMENT NOT NULL,
nombre VARCHAR (100) NOT NULL,
apellido VARCHAR (255),
email VARCHAR (255) NOT NULL,
pass VARCHAR (255) NOT NULL,
rol VARCHAR(20),
imagen VARCHAR(255),
CONSTRAINT pk_usuarios PRIMARY KEY(id),
CONSTRAINT uq_email UNIQUE(email)
)ENGINE= INNODB;

INSERT INTO usuarios VALUES (NULL,'admin','admin','amdin@admin.com','contraseña','admin',NULL);

CREATE TABLE categorias (
id INT (255) AUTO_INCREMENT NOT NULL,
nombre VARCHAR (100) NOT NULL,
CONSTRAINT pk_categorias PRIMARY KEY(id)
)ENGINE= INNODB;

INSERT INTO categorias VALUES(NULL,'manga corta');
INSERT INTO categorias VALUES(NULL,'tirante');
INSERT INTO categorias VALUES(NULL,'manga larga');
INSERT INTO categorias VALUES(NULL,'sudadera');

SELECT*FROM categorias;

CREATE TABLE productos (
id INT (255) AUTO_INCREMENT NOT NULL,
categoria_id INT(255) NOT NULL,
nombre VARCHAR (100) NOT NULL,
apellido TEXT,
precio FLOAT(100,2) NOT NULL,
stock INT(255) NOT NULL,
oferta VARCHAR(2),
fecha DATE NOT NULL,
imagen VARCHAR(255),
CONSTRAINT pk_productos PRIMARY KEY(id),
CONSTRAINT fk_producto_categoria FOREIGN KEY(categoria_id) REFERENCES categorias(id)
)ENGINE= INNODB;

CREATE TABLE lineas_pedidos(
id INT(255) AUTO_INCREMENT NOT NULL,
pedido_id INT(255) NOT NULL,
producto_id INT(255) NOT NULL,
CONSTRAINT pk_lineas_pedidos PRIMARY KEY(id),
CONSTRAINT fk_lineas_pedido FOREIGN KEY(pedido_id) REFERENCES pedidos(id),
CONSTRAINT fk_lineas_productos FOREIGN KEY(producto_id) REFERENCES productos(id)
)ENGINE=INNODB;