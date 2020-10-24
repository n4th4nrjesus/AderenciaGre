/* Estrutura do banco de dados aderencia_gre: */

DROP DATABASE IF EXISTS aderencia_gre;
CREATE DATABASE aderencia_gre;
USE aderencia_gre;


DROP TABLE IF EXISTS aderencia_gre.usuario;
CREATE TABLE aderencia_gre.usuario (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(250) NOT NULL,
    email VARCHAR(250) NOT NULL UNIQUE,
    senha VARCHAR(40) NOT NULL
);

DROP TABLE IF EXISTS aderencia_gre.artefato;
CREATE TABLE aderencia_gre.artefato (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(250) NOT NULL UNIQUE,
    tipo VARCHAR(250)
);

DROP TABLE IF EXISTS aderencia_gre.pergunta_checklist;
CREATE TABLE aderencia_gre.pergunta_checklist (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    artefato_id INTEGER NOT NULL,
    descricao VARCHAR(500) NOT NULL UNIQUE,
    CONSTRAINT fk_pergunta_checklist_artefato
    FOREIGN KEY (artefato_id)
        REFERENCES artefato(id)
);

DROP TABLE IF EXISTS aderencia_gre.urgencia;
CREATE TABLE aderencia_gre.urgencia (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL UNIQUE,
    dias_prazo INTEGER NOT NULL UNIQUE
);

DROP TABLE IF EXISTS aderencia_gre.complexidade;
CREATE TABLE aderencia_gre.complexidade (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL UNIQUE,
    dias_prazo INTEGER NOT NULL UNIQUE
);

DROP TABLE IF EXISTS aderencia_gre.cargo;
CREATE TABLE aderencia_gre.cargo (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(250) NOT NULL UNIQUE,
    descricao VARCHAR(500) NOT NULL UNIQUE
);

DROP TABLE IF EXISTS aderencia_gre.responsavel;
CREATE TABLE aderencia_gre.responsavel (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    cargo_id INTEGER NOT NULL,
    nome VARCHAR(250) NOT NULL UNIQUE,
    CONSTRAINT fk_responsavel_cargo
    FOREIGN KEY (cargo_id)
        REFERENCES cargo(id)
);

DROP TABLE IF EXISTS aderencia_gre.usuario_pergunta;
CREATE TABLE aderencia_gre.usuario_pergunta (
    usuario_id INTEGER NOT NULL,
    pergunta_checklist_id INTEGER NOT NULL,
    urgencia_id INTEGER,
    complexidade_id INTEGER,
    responsavel_id INTEGER,
    atendida INTEGER DEFAULT 1
        COMMENT '0 = não; 1 = sim; 2 = não aplicável',
    plano_acao VARCHAR(1000),
    prazo DATETIME,
    escalonada INTEGER DEFAULT 0,
    CONSTRAINT fk_usuario_pergunta_usuario
    FOREIGN KEY (usuario_id)
        REFERENCES usuario(id),
    CONSTRAINT fk_usuario_pergunta_pergunta_checklist
    FOREIGN KEY (pergunta_checklist_id)
        REFERENCES pergunta_checklist(id),
    CONSTRAINT fk_usuario_pergunta_urgencia
    FOREIGN KEY (urgencia_id)
        REFERENCES urgencia(id),
    CONSTRAINT fk_usuario_pergunta_responsavel
    FOREIGN KEY (responsavel_id)
        REFERENCES responsavel(id)
);


CREATE USER 'usu@AderenciaGre'@'localhost' IDENTIFIED BY 'aderenciagrepassword';

GRANT ALL PRIVILEGES ON aderencia_gre.* TO 'usu@AderenciaGre'@'localhost';
REVOKE CREATE, DROP, GRANT OPTION ON aderencia_gre.* FROM 'usu@AderenciaGre'@'localhost';
FLUSH PRIVILEGES;
