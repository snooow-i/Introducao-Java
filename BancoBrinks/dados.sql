CREATE DATABASE IF NOT EXISTS bancobrinks;

USE bancobrinks;

CREATE TABLE IF NOT EXISTS agencias (
    id_agencia INT AUTO_INCREMENT PRIMARY KEY,
    nome_agencia VARCHAR(255) NOT NULL,
    numero_agencia INT NOT NULL,
    endereco_agencia VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS contas (
    id_conta INT AUTO_INCREMENT PRIMARY KEY,
    id_agencia INT,
    numero_agencia INT, -- Adicione esta linha
    nome_cliente VARCHAR(255) NOT NULL,
    cpf VARCHAR(14) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    numero_conta INT NOT NULL,
    saldo DECIMAL(10, 2) NOT NULL DEFAULT 0.00,
    FOREIGN KEY (id_agencia) REFERENCES agencias(id_agencia)
);
