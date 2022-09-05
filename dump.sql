
Execute um comando por vez. 


CREATE DATABASE auladw ;


CREATE TABLE usuario
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL
);


CREATE TABLE `cliente` (
  `nome` varchar(250) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `datanascimento` date DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
