CREATE DATABASE tomaladaca;

USE tomaladaca;

CREATE TABLE professor(
	cpf char(14) PRIMARY KEY,
    telefone char(15) UNIQUE,
    nome_professor varchar(80),
    senha varchar(40)
);

CREATE TABLE sala(
	cod_sala int PRIMARY KEY,
    data_inicio char(10),
    hora_inicio time,
    data_fim date,
    hora_fim time,
    cpf char(14) UNIQUE,
    FOREIGN KEY(cpf) REFERENCES professor(cpf)
);

INSERT INTO sala(cod_sala) VALUES (1400);
INSERT INTO sala(cod_sala) VALUES (1401);
INSERT INTO sala(cod_sala) VALUES (1402);
INSERT INTO sala(cod_sala) VALUES (1403);
INSERT INTO sala(cod_sala) VALUES (1404);
INSERT INTO sala(cod_sala) VALUES (1405);
INSERT INTO sala(cod_sala) VALUES (1406);