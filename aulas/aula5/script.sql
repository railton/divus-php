
CREATE SEQUENCE setor_codigo_seq;

CREATE TABLE setor (
                codigo INTEGER NOT NULL DEFAULT nextval('setor_codigo_seq'),
                nome VARCHAR(60) NOT NULL,
                CONSTRAINT setor_pk PRIMARY KEY (codigo)
);


ALTER SEQUENCE setor_codigo_seq OWNED BY setor.codigo;

CREATE SEQUENCE usuario_codigo_seq;

CREATE TABLE usuario (
                codigo INTEGER NOT NULL DEFAULT nextval('usuario_codigo_seq'),
                nome VARCHAR(60) NOT NULL,
                email VARCHAR(40) NOT NULL,
                senha VARCHAR(200) NOT NULL,
                CONSTRAINT usuario_pk PRIMARY KEY (codigo)
);


ALTER SEQUENCE usuario_codigo_seq OWNED BY usuario.codigo
