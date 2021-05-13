-- Criando banco de dados
CREATE DATABASE akna_teste  
    DEFAULT CHARACTER
    SET utf8
    DEFAULT COLLATE utf8_general_ci;

-- Usar o banco de dados akna_teste
USE akna_teste;

-- Criando a tabela listaCompras
CREATE TABLE lista_compras (
    id int(11) NOT NULL AUTO_INCREMENT,
    mes varchar(100) NOT NULL,
    categoria varchar(100) NOT NULL,
    produto varchar(100) NOT NULL,
    quantidade int NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;