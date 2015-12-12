
CREATE SEQUENCE usuario_seq;

CREATE TABLE usuario (
                usua_codigo INTEGER NOT NULL DEFAULT nextval('usuario_seq'),
                usua_nome VARCHAR(60) NOT NULL,
                usua_email VARCHAR(30) NOT NULL,
                usua_senha VARCHAR(120) NOT NULL,
                usua_habilitado BOOLEAN DEFAULT true NOT NULL,
                usua_data_criacao TIMESTAMP DEFAULT current_timestamp NOT NULL,
                usua_data_alteracao TIMESTAMP DEFAULT current_timestamp NOT NULL,
                usua_auth_key VARCHAR(120) NOT NULL,
                CONSTRAINT usuario_pk PRIMARY KEY (usua_codigo)
);


ALTER SEQUENCE usuario_seq OWNED BY usuario.usua_codigo;

CREATE SEQUENCE estado_seq;

CREATE TABLE estado (
                esta_codigo INTEGER NOT NULL DEFAULT nextval('estado_seq'),
                esta_nome VARCHAR(60) NOT NULL,
                CONSTRAINT estado_pk PRIMARY KEY (esta_codigo)
);


ALTER SEQUENCE estado_seq OWNED BY estado.esta_codigo;

CREATE SEQUENCE municipio_seq;

CREATE TABLE municipio (
                muni_codigo INTEGER NOT NULL DEFAULT nextval('municipio_seq'),
                muni_nome VARCHAR(60) NOT NULL,
                esta_codigo INTEGER NOT NULL,
                CONSTRAINT municipio_pk PRIMARY KEY (muni_codigo)
);


ALTER SEQUENCE municipio_seq OWNED BY municipio.muni_codigo;

CREATE SEQUENCE aluno_seq;

CREATE TABLE aluno (
                alun_codigo INTEGER NOT NULL DEFAULT nextval('aluno_seq'),
                alun_nome VARCHAR(60) NOT NULL,
                alun_matricula VARCHAR(10) NOT NULL,
                alun_data_nascimento TIMESTAMP NOT NULL,
                alun_habilitado BOOLEAN DEFAULT true NOT NULL,
                alun_observacao TEXT,
                muni_codigo INTEGER NOT NULL,
                alun_data_criacao TIMESTAMP DEFAULT current_timestamp NOT NULL,
                alun_data_alteracao TIMESTAMP DEFAULT current_timestamp NOT NULL,
                CONSTRAINT aluno_pk PRIMARY KEY (alun_codigo)
);


ALTER SEQUENCE aluno_seq OWNED BY aluno.alun_codigo;

ALTER TABLE municipio ADD CONSTRAINT estado_municipio_fk
FOREIGN KEY (esta_codigo)
REFERENCES estado (esta_codigo)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE aluno ADD CONSTRAINT municipio_aluno_fk
FOREIGN KEY (muni_codigo)
REFERENCES municipio (muni_codigo)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;