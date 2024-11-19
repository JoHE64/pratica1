CREATE DATABASE pratica1;

USE pratica1;

CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    telefone VARCHAR(15) UNIQUE
);

CREATE TABLE colaboradores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE chamados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    descricao TEXT NOT NULL,
    criticidade VARCHAR(25),
    dataAbertura TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    idCliente INT NOT NULL,
    idColaborador INT,
    FOREIGN KEY (idCliente) REFERENCES clientes(id),
    FOREIGN KEY (idColaborador) REFERENCES colaboradores(id)
);