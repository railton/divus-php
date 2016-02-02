
CREATE SEQUENCE categoria_seq;

CREATE TABLE categoria (
                cate_codigo INTEGER NOT NULL DEFAULT nextval('categoria_seq'),
                cate_nome VARCHAR(60) NOT NULL,
                CONSTRAINT categoria_pk PRIMARY KEY (cate_codigo)
);


ALTER SEQUENCE categoria_seq OWNED BY categoria.cate_codigo;

CREATE SEQUENCE estado_esta_seq;

CREATE TABLE estado (
                esta_codigo INTEGER NOT NULL DEFAULT nextval('estado_esta_seq'),
                esta_nome VARCHAR(60) NOT NULL,
                CONSTRAINT estado_pk PRIMARY KEY (esta_codigo)
);


ALTER SEQUENCE estado_esta_seq OWNED BY estado.esta_codigo;

CREATE SEQUENCE municipio_seq;

CREATE TABLE municipio (
                muni_codigo INTEGER NOT NULL DEFAULT nextval('municipio_seq'),
                muni_nome VARCHAR(60) NOT NULL,
                esta_codigo INTEGER NOT NULL,
                CONSTRAINT municipio_pk PRIMARY KEY (muni_codigo)
);


ALTER SEQUENCE municipio_seq OWNED BY municipio.muni_codigo;

CREATE SEQUENCE usuario_seq;

CREATE TABLE usuario (
                usua_codigo INTEGER NOT NULL DEFAULT nextval('usuario_seq'),
                usua_nome VARCHAR(120) NOT NULL,
                usua_email VARCHAR(100) NOT NULL,
                usua_senha VARCHAR(60) NOT NULL,
                usua_tipo SMALLINT NOT NULL,
                usua_auth_key VARCHAR(32) NOT NULL,
                muni_codigo INTEGER NOT NULL,
                CONSTRAINT usuario_pk PRIMARY KEY (usua_codigo)
);
COMMENT ON COLUMN usuario.usua_tipo IS '1 = Admin
2 = Professor
3 = Alunos';


ALTER SEQUENCE usuario_seq OWNED BY usuario.usua_codigo;

CREATE SEQUENCE historico_seq;

CREATE TABLE historico (
                hist_codigo INTEGER NOT NULL DEFAULT nextval('historico_seq'),
                hist_data TIMESTAMP NOT NULL,
                hist_mensagem TEXT NOT NULL,
                usua_codigo INTEGER NOT NULL,
                CONSTRAINT historico_pk PRIMARY KEY (hist_codigo)
);


ALTER SEQUENCE historico_seq OWNED BY historico.hist_codigo;

CREATE SEQUENCE curso_seq;

CREATE TABLE curso (
                curs_codigo INTEGER NOT NULL DEFAULT nextval('curso_seq'),
                curs_nome VARCHAR(160) NOT NULL,
                curs_status SMALLINT NOT NULL,
                curs_descricao TEXT NOT NULL,
                curs_valor NUMERIC(10,2) NOT NULL,
                cate_codigo INTEGER NOT NULL,
                usua_codigo INTEGER NOT NULL,
                CONSTRAINT curso_pk PRIMARY KEY (curs_codigo)
);
COMMENT ON COLUMN curso.curs_status IS '1  - Rascunho
2 - Pronto
3 - Aprovado
4 - Não aprovado
5 - Desabilitado';


ALTER SEQUENCE curso_seq OWNED BY curso.curs_codigo;

CREATE SEQUENCE aula_seq;

CREATE TABLE aula (
                aula_codigo INTEGER NOT NULL DEFAULT nextval('aula_seq'),
                aula_nome VARCHAR(60) NOT NULL,
                aula_descricao TEXT NOT NULL,
                curs_codigo INTEGER NOT NULL,
                CONSTRAINT aula_pk PRIMARY KEY (aula_codigo)
);


ALTER SEQUENCE aula_seq OWNED BY aula.aula_codigo;

CREATE SEQUENCE anexo_seq;

CREATE TABLE anexo (
                anex_codigo INTEGER NOT NULL DEFAULT nextval('anexo_seq'),
                anex_nome VARCHAR(120) NOT NULL,
                aula_codigo INTEGER NOT NULL,
                CONSTRAINT anexo_pk PRIMARY KEY (anex_codigo)
);


ALTER SEQUENCE anexo_seq OWNED BY anexo.anex_codigo;

CREATE TABLE usuario_curso (
                usua_codigo INTEGER NOT NULL,
                curs_codigo INTEGER NOT NULL,
                CONSTRAINT usuario_curso_pk PRIMARY KEY (usua_codigo, curs_codigo)
);


ALTER TABLE curso ADD CONSTRAINT categoria_curso_fk
FOREIGN KEY (cate_codigo)
REFERENCES categoria (cate_codigo)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE municipio ADD CONSTRAINT estado_municipio_fk
FOREIGN KEY (esta_codigo)
REFERENCES estado (esta_codigo)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE usuario ADD CONSTRAINT municipio_usuario_fk
FOREIGN KEY (muni_codigo)
REFERENCES municipio (muni_codigo)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE usuario_curso ADD CONSTRAINT usuario_usuario_curso_fk
FOREIGN KEY (usua_codigo)
REFERENCES usuario (usua_codigo)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE curso ADD CONSTRAINT usuario_curso_fk
FOREIGN KEY (usua_codigo)
REFERENCES usuario (usua_codigo)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE historico ADD CONSTRAINT usuario_historico_fk
FOREIGN KEY (usua_codigo)
REFERENCES usuario (usua_codigo)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE aula ADD CONSTRAINT curso_aula_fk
FOREIGN KEY (curs_codigo)
REFERENCES curso (curs_codigo)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE usuario_curso ADD CONSTRAINT curso_usuario_curso_fk
FOREIGN KEY (curs_codigo)
REFERENCES curso (curs_codigo)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE anexo ADD CONSTRAINT aula_anexo_fk
FOREIGN KEY (aula_codigo)
REFERENCES aula (aula_codigo)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;
