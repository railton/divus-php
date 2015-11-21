
CREATE SEQUENCE setor_codigo_seq;

CREATE TABLE setor (
                codigo INTEGER NOT NULL DEFAULT nextval('setor_codigo_seq'),
                nome VARCHAR(30) NOT NULL,
                CONSTRAINT setor_pk PRIMARY KEY (codigo)
);


ALTER SEQUENCE setor_codigo_seq OWNED BY setor.codigo;

CREATE SEQUENCE usuario_codigo_seq;

CREATE TABLE usuario (
                codigo INTEGER NOT NULL DEFAULT nextval('usuario_codigo_seq'),
                email VARCHAR(30) NOT NULL,
                nome VARCHAR(60),
                senha VARCHAR(200) NOT NULL,
                admin BOOLEAN DEFAULT false NOT NULL,
                habilitado BOOLEAN DEFAULT true NOT NULL,
                CONSTRAINT usuario_pk PRIMARY KEY (codigo)
);


ALTER SEQUENCE usuario_codigo_seq OWNED BY usuario.codigo;

CREATE SEQUENCE aluno_seq;

CREATE TABLE aluno (
                codigo INTEGER NOT NULL DEFAULT nextval('aluno_seq'),
                nome VARCHAR(60) NOT NULL,
                matricula VARCHAR(10) NOT NULL,
                email VARCHAR(60) NOT NULL,
                habilitado BOOLEAN DEFAULT true NOT NULL,
                CONSTRAINT aluno_pk PRIMARY KEY (codigo)
);


ALTER SEQUENCE aluno_seq OWNED BY aluno.codigo;