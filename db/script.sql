-- Criação do Banco de Dados
CREATE DATABASE IF NOT EXISTS gtech_db;
USE gtech_db;

-- Criação da Tabela de Pedidos/Contatos
CREATE TABLE IF NOT EXISTS pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    assunto VARCHAR(50) NOT NULL,
    quantidade INT NOT NULL,
    mensagem TEXT NOT NULL,
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);