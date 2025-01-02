--
-- PostgreSQL database dump
--

-- Dumped from database version 9.5.9
-- Dumped by pg_dump version 9.5.9

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

--
-- Name: categorialocal_id_seq; Type: SEQUENCE; Schema: public; Owner: siepe
--

CREATE SEQUENCE categorialocal_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;



-- ALTER SEQUENCE  categorialocal_id_seq OWNER TO postgres;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: tipolocal; Type: TABLE; Schema: public; Owner: siepe
--

CREATE TABLE tipolocal (
    id bigint DEFAULT nextval('categorialocal_id_seq'::regclass) NOT NULL,
    descricao character varying NOT NULL
);


ALTER TABLE tipolocal OWNER TO postgres;

--
-- Name: comunidade_id_seq; Type: SEQUENCE; Schema: public; Owner: siepe
--

CREATE SEQUENCE comunidade_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE  comunidade_id_seq OWNER TO postgres;

--
-- Name: comunidade; Type: TABLE; Schema: public; Owner: siepe
--

CREATE TABLE comunidade (
    id bigint DEFAULT nextval('comunidade_id_seq'::regclass) NOT NULL,
    descricao character varying NOT NULL
);


ALTER TABLE comunidade OWNER TO postgres;

--
-- Name: embarcacao_id_seq; Type: SEQUENCE; Schema: public; Owner: siepe
--

CREATE SEQUENCE embarcacao_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE  embarcacao_id_seq OWNER TO postgres;

--
-- Name: embarcacao; Type: TABLE; Schema: public; Owner: siepe
--

CREATE TABLE embarcacao (
    id bigint DEFAULT nextval('embarcacao_id_seq'::regclass) NOT NULL,
    descricao character varying NOT NULL
);


ALTER TABLE embarcacao OWNER TO postgres;

--
-- Name: especie_id_seq; Type: SEQUENCE; Schema: public; Owner: siepe
--

CREATE SEQUENCE especie_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE  especie_id_seq OWNER TO postgres;

--
-- Name: especie; Type: TABLE; Schema: public; Owner: siepe
--

CREATE TABLE especie (
    id bigint DEFAULT nextval('especie_id_seq'::regclass) NOT NULL,
    nomepopular character varying NOT NULL,
    nomecientifico character varying NOT NULL
);


ALTER TABLE especie OWNER TO postgres;

--
-- Name: instrumento_id_seq; Type: SEQUENCE; Schema: public; Owner: siepe
--

CREATE SEQUENCE instrumento_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE  instrumento_id_seq OWNER TO postgres;

--
-- Name: instrumento; Type: TABLE; Schema: public; Owner: siepe
--

CREATE TABLE instrumento (
    id bigint DEFAULT nextval('instrumento_id_seq'::regclass) NOT NULL,
    descricao character varying NOT NULL,
    ativo boolean
);


ALTER TABLE instrumento OWNER TO postgres;

CREATE SEQUENCE estrategia_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
CREATE TABLE estrategia (
    id bigint DEFAULT nextval('estrategia_id_seq'::regclass) NOT NULL,
    descricao character varying NOT NULL,
    idinstrumento bigint
);

CREATE SEQUENCE instituicao_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
CREATE TABLE instituicao (
    id bigint DEFAULT nextval('instituicao_id_seq'::regclass) NOT NULL,
    descricao character varying NOT NULL
);

CREATE TABLE estrategia_imp_exp (
    id bigint NOT NULL,
    descricao character varying,
    controller character varying,
    ativo boolean
);


CREATE TABLE estado (
    id integer,
    sigla character varying NOT NULL,
    descricao character varying NOT NULL
);

CREATE TABLE cidade (
    id bigint,
    idestado integer,
    descricao character varying NOT NULL
);
--
-- Name: localpesca_id_seq; Type: SEQUENCE; Schema: public; Owner: siepe
--

CREATE SEQUENCE localpesca_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE  localpesca_id_seq OWNER TO postgres;

--
-- Name: local; Type: TABLE; Schema: public; Owner: siepe
--

CREATE TABLE local (
    id bigint DEFAULT nextval('localpesca_id_seq'::regclass) NOT NULL,
    idtipolocal bigint,
    idrio bigint,
    nome character varying NOT NULL
);


ALTER TABLE local OWNER TO postgres;

CREATE SEQUENCE ambiente_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

CREATE TABLE ambiente (
   id bigint DEFAULT nextval('ambiente_id_seq'::regclass) NOT NULL,
   descricao character varying NOT NULL
);

CREATE SEQUENCE acampamento_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

CREATE TABLE acampamento (
    id bigint DEFAULT nextval('acampamento_id_seq'::regclass) NOT NULL,
    nome character varying NOT NULL,
    idpesca bigint,
    nome_pesqueiro character varying
);

CREATE SEQUENCE pesca_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE  pesca_id_seq OWNER TO postgres;

--
-- Name: pesca; Type: TABLE; Schema: public; Owner: siepe
--

CREATE TABLE pesca (
    id bigint DEFAULT nextval('pesca_id_seq'::regclass) NOT NULL,
    idpescador bigint,
    datapesca date NOT NULL,
    horarioinicio time without time zone,
    horariotermino time without time zone,
    numpescadores integer NOT NULL,
    pesoconsumido double precision NOT NULL,
    pesovendido double precision NOT NULL,
    valorcusto double precision NOT NULL,
    valorvenda double precision NOT NULL,
    datacadastro time without time zone,
    diapesca integer,
    mespesca integer,
    anopesca integer,
    idusuario bigint,
    gelo double precision,
    combustivel double precision,
    alimento double precision,
    dia_inicio date,
    dia_fim date,
    ativo boolean,
    diasemana integer,
    qtd_dias integer,
    outros_gastos double precision,
    nome_porto character varying,
    nome_rio character varying,
    idcidade bigint,
    nome_pescador character varying,
    idcomunidade bigint
);


ALTER TABLE pesca OWNER TO postgres;

--
-- Name: pesca_instrumento; Type: TABLE; Schema: public; Owner: siepe
--

CREATE TABLE pesca_instrumento (
    idpesca bigint NOT NULL,
    idinstrumento bigint NOT NULL,
    qtd bigint NOT NULL
);


ALTER TABLE pesca_instrumento OWNER TO postgres;

--
-- Name: pesca_localpesca; Type: TABLE; Schema: public; Owner: siepe
--

CREATE TABLE pesca_localpesca (
    idpesca bigint NOT NULL,
    idlocalpesca bigint NOT NULL
);


ALTER TABLE pesca_localpesca OWNER TO postgres;

--
-- Name: pesca_pescado; Type: TABLE; Schema: public; Owner: siepe
--

CREATE TABLE pesca_pescado (
    idpesca bigint NOT NULL,
    idpescado bigint NOT NULL
);

ALTER TABLE pesca_pescado OWNER TO postgres;

--
-- Name: pesca_pescado; Type: TABLE; Schema: public; Owner: siepe
--

CREATE TABLE pesca_embarcacao (
    idpesca bigint NOT NULL,
    idembarcacao bigint NOT NULL,
    tamanho double precision NOT NULL,
    motorpotencia double precision NOT NULL
);

CREATE TABLE pesca_especie (
      idpesca bigint NOT NULL,
      idespecie bigint NOT NULL,
      arte character varying,
      tipomedicao integer NOT NULL,
      fator double precision NOT NULL,
      qtdvendida double precision NOT NULL,
      preco double precision NOT NULL,
      qtdconsumida double precision NOT NULL
);

ALTER TABLE pesca_embarcacao OWNER TO postgres;

--
-- Name: pescado_id_seq; Type: SEQUENCE; Schema: public; Owner: siepe
--

CREATE SEQUENCE pescado_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


CREATE SEQUENCE peixe_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

CREATE TABLE peixe (
     id bigint DEFAULT nextval('peixe_id_seq'::regclass) NOT NULL,
     nomepopular character varying,
     genero character varying,
     especie character varying,
     ordem character varying,
     familia character varying
);

ALTER SEQUENCE  pescado_id_seq OWNER TO postgres;

--
-- Name: pescado; Type: TABLE; Schema: public; Owner: siepe
--

CREATE TABLE pescado (
    id bigint DEFAULT nextval('pescado_id_seq'::regclass) NOT NULL,
    idespecie bigint,
    numpeixes integer NOT NULL,
    qtdovados integer NOT NULL,
    pesototal double precision NOT NULL,
    preco double precision NOT NULL
);


ALTER TABLE pescado OWNER TO postgres;

--
-- Name: pescador_id_seq; Type: SEQUENCE; Schema: public; Owner: siepe
--

CREATE SEQUENCE pescador_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE  pescador_id_seq OWNER TO postgres;

--
-- Name: pescador; Type: TABLE; Schema: public; Owner: siepe
--

CREATE TABLE pescador (
    id bigint DEFAULT nextval('pescador_id_seq'::regclass) NOT NULL,
    idcomunidade bigint,
    nome character varying NOT NULL
);


ALTER TABLE pescador OWNER TO postgres;

--
-- Name: rio_id_seq; Type: SEQUENCE; Schema: public; Owner: siepe
--

CREATE SEQUENCE rio_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE  rio_id_seq OWNER TO postgres;

--
-- Name: rio; Type: TABLE; Schema: public; Owner: siepe
--

CREATE TABLE rio (
    id bigint DEFAULT nextval('rio_id_seq'::regclass) NOT NULL,
    descricao character varying NOT NULL
);


ALTER TABLE rio OWNER TO postgres;


--
-- Name: perfil_id_seq; Type: SEQUENCE; Schema: public; Owner: siepe
--

CREATE SEQUENCE perfil_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE  perfil_id_seq OWNER TO postgres;

--
-- Name: rio; Type: TABLE; Schema: public; Owner: siepe
--

CREATE TABLE perfil (
    id bigint DEFAULT nextval('perfil_id_seq'::regclass) NOT NULL,
    descricao character varying NOT NULL
);


ALTER TABLE perfil OWNER TO postgres;
--
-- Name: usuario_id_seq; Type: SEQUENCE; Schema: public; Owner: siepe
--

CREATE SEQUENCE usuario_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE  usuario_id_seq OWNER TO postgres;

--
-- Name: usuario; Type: TABLE; Schema: public; Owner: siepe
--

CREATE TABLE usuario (
    id bigint DEFAULT nextval('usuario_id_seq'::regclass) NOT NULL,
    login character varying NOT NULL,
    senha character varying NOT NULL,
    idPerfil bigint,
    nome character varying,
    email character varying
);

ALTER TABLE usuario OWNER TO postgres;


SELECT pg_catalog.setval('categorialocal_id_seq', 1, false);

--
-- Name: categorialocal_id_seq; Type: SEQUENCE SET; Schema: public; Owner: siepe
--

SELECT pg_catalog.setval('comunidade_id_seq', 1, false);

--
-- Name: comunidade_id_seq; Type: SEQUENCE SET; Schema: public; Owner: siepe
--



--
-- Name: embarcacao_id_seq; Type: SEQUENCE SET; Schema: public; Owner: siepe
--

SELECT pg_catalog.setval('embarcacao_id_seq', 1, false);


--
-- Name: especie_id_seq; Type: SEQUENCE SET; Schema: public; Owner: siepe
--

SELECT pg_catalog.setval('especie_id_seq', 1, false);


--
-- Name: instrumento_id_seq; Type: SEQUENCE SET; Schema: public; Owner: siepe
--

SELECT pg_catalog.setval('instrumento_id_seq', 1, false);


--
-- Name: localpesca_id_seq; Type: SEQUENCE SET; Schema: public; Owner: siepe
--

SELECT pg_catalog.setval('localpesca_id_seq', 1, false);


--
-- Name: pesca_id_seq; Type: SEQUENCE SET; Schema: public; Owner: siepe
--

SELECT pg_catalog.setval('pesca_id_seq', 1, false);


--
-- Name: pescado_id_seq; Type: SEQUENCE SET; Schema: public; Owner: siepe
--

SELECT pg_catalog.setval('pescado_id_seq', 1, false);


--
-- Name: pescador_id_seq; Type: SEQUENCE SET; Schema: public; Owner: siepe
--

SELECT pg_catalog.setval('pescador_id_seq', 1, false);


--
-- Name: rio_id_seq; Type: SEQUENCE SET; Schema: public; Owner: siepe
--

SELECT pg_catalog.setval('rio_id_seq', 1, false);


--
-- Name: categorialocal_pkey; Type: CONSTRAINT; Schema: public; Owner: siepe
--

ALTER TABLE ONLY tipolocal
    ADD CONSTRAINT tipolocal_pkey PRIMARY KEY (id);


--
-- Name: perfil_pkey; Type: CONSTRAINT; Schema: public; Owner: siepe
--

ALTER TABLE ONLY perfil
    ADD CONSTRAINT perfil_pkey PRIMARY KEY (id);

--
-- Name: usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: siepe
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (id);


--
-- Name: comunidade_pkey; Type: CONSTRAINT; Schema: public; Owner: siepe
--

ALTER TABLE ONLY comunidade
    ADD CONSTRAINT comunidade_pkey PRIMARY KEY (id);


--
-- Name: embarcacao_pkey; Type: CONSTRAINT; Schema: public; Owner: siepe
--

ALTER TABLE ONLY embarcacao
    ADD CONSTRAINT embarcacao_pkey PRIMARY KEY (id);


--
-- Name: especie_pkey; Type: CONSTRAINT; Schema: public; Owner: siepe
--

ALTER TABLE ONLY especie
    ADD CONSTRAINT especie_pkey PRIMARY KEY (id);


--
-- Name: instrumento_pkey; Type: CONSTRAINT; Schema: public; Owner: siepe
--

ALTER TABLE ONLY instrumento
    ADD CONSTRAINT instrumento_pkey PRIMARY KEY (id);


--
-- Name: localpesca_pkey; Type: CONSTRAINT; Schema: public; Owner: siepe
--

ALTER TABLE ONLY local
    ADD CONSTRAINT localpesca_pkey PRIMARY KEY (id);


--
-- Name: pesca_pkey; Type: CONSTRAINT; Schema: public; Owner: siepe
--

ALTER TABLE ONLY pesca
    ADD CONSTRAINT pesca_pkey PRIMARY KEY (id);


--
-- Name: pescado_pkey; Type: CONSTRAINT; Schema: public; Owner: siepe
--

ALTER TABLE ONLY pescado
    ADD CONSTRAINT pescado_pkey PRIMARY KEY (id);


--
-- Name: pescadores_pkey; Type: CONSTRAINT; Schema: public; Owner: siepe
--

ALTER TABLE ONLY pescador
    ADD CONSTRAINT pescadores_pkey PRIMARY KEY (id);


--
-- Name: rio_pkey; Type: CONSTRAINT; Schema: public; Owner: siepe
--

ALTER TABLE ONLY rio
    ADD CONSTRAINT rio_pkey PRIMARY KEY (id);


--
-- Name: fki_categorialocal; Type: INDEX; Schema: public; Owner: siepe
--

CREATE INDEX fki_tipolocal ON local USING btree (idtipolocal);


--
-- Name: fki_comunidade; Type: INDEX; Schema: public; Owner: siepe
--

CREATE INDEX fki_comunidade ON pescador USING btree (idcomunidade);


--
-- Name: fki_especie; Type: INDEX; Schema: public; Owner: siepe
--

CREATE INDEX fki_especie ON pescado USING btree (idespecie);


--
-- Name: fki_instrumento; Type: INDEX; Schema: public; Owner: siepe
--

CREATE INDEX fki_instrumento ON pesca_instrumento USING btree (idinstrumento);


--
-- Name: fki_localpesca; Type: INDEX; Schema: public; Owner: siepe
--

CREATE INDEX fki_localpesca ON pesca_localpesca USING btree (idlocalpesca);


--
-- Name: fki_localpesca_pesca; Type: INDEX; Schema: public; Owner: siepe
--

CREATE INDEX fki_localpesca_pesca ON pesca_localpesca USING btree (idpesca);


--
-- Name: fki_pesca; Type: INDEX; Schema: public; Owner: siepe
--

CREATE INDEX fki_pesca ON pesca_instrumento USING btree (idpesca);


--
-- Name: fki_pescado; Type: INDEX; Schema: public; Owner: siepe
--

CREATE INDEX fki_pescado ON pesca_pescado USING btree (idpescado);


--
-- Name: fki_pescado_pesca; Type: INDEX; Schema: public; Owner: siepe
--

CREATE INDEX fki_pescado_pesca ON pesca_pescado USING btree (idpesca);


--
-- Name: fki_pescador; Type: INDEX; Schema: public; Owner: siepe
--

CREATE INDEX fki_pescador ON pesca USING btree (idpescador);


--
-- Name: fki_rio; Type: INDEX; Schema: public; Owner: siepe
--

CREATE INDEX fki_rio ON local USING btree (idrio);


--
-- Name: fk_tipolocal; Type: FK CONSTRAINT; Schema: public; Owner: siepe
--

ALTER TABLE ONLY local
    ADD CONSTRAINT fk_tipolocal FOREIGN KEY (idtipolocal) REFERENCES tipolocal(id);


--
-- Name: fk_comunidade; Type: FK CONSTRAINT; Schema: public; Owner: siepe
--

ALTER TABLE ONLY pescador
    ADD CONSTRAINT fk_comunidade FOREIGN KEY (idcomunidade) REFERENCES comunidade(id);


--
-- Name: fk_embarcacao; Type: FK CONSTRAINT; Schema: public; Owner: siepe
--

ALTER TABLE usuario
  ADD CONSTRAINT fk_usuarioperfil FOREIGN KEY (idperfil) REFERENCES perfil (id) ON UPDATE NO ACTION ON DELETE NO ACTION;

--
-- Name: fk_especie; Type: FK CONSTRAINT; Schema: public; Owner: siepe
--

ALTER TABLE ONLY pescado
    ADD CONSTRAINT fk_especie FOREIGN KEY (idespecie) REFERENCES especie(id);


--
-- Name: fk_instrumento; Type: FK CONSTRAINT; Schema: public; Owner: siepe
--

ALTER TABLE ONLY pesca_instrumento
    ADD CONSTRAINT fk_instrumento FOREIGN KEY (idinstrumento) REFERENCES instrumento(id);


--
-- Name: fk_instrumento_pesca; Type: FK CONSTRAINT; Schema: public; Owner: siepe
--

ALTER TABLE ONLY pesca_instrumento
    ADD CONSTRAINT fk_instrumento_pesca FOREIGN KEY (idpesca) REFERENCES pesca(id);

--
-- Name: fk_pescaembarcacao; Type: FK CONSTRAINT; Schema: public; Owner: siepe
--

ALTER TABLE ONLY pesca_embarcacao
    ADD CONSTRAINT fk_pescaembarcacao FOREIGN KEY (idpesca) REFERENCES pesca(id);


--
-- Name: fk_localpesca; Type: FK CONSTRAINT; Schema: public; Owner: siepe
--

ALTER TABLE ONLY pesca_embarcacao
    ADD CONSTRAINT fk_embarcacao FOREIGN KEY (idembarcacao) REFERENCES embarcacao(id);


--
-- Name: fk_localpesca; Type: FK CONSTRAINT; Schema: public; Owner: siepe
--

ALTER TABLE ONLY pesca_localpesca
    ADD CONSTRAINT fk_localpesca FOREIGN KEY (idlocalpesca) REFERENCES local(id);


--
-- Name: fk_localpesca_pesca; Type: FK CONSTRAINT; Schema: public; Owner: siepe
--

ALTER TABLE ONLY pesca_localpesca
    ADD CONSTRAINT fk_localpesca_pesca FOREIGN KEY (idpesca) REFERENCES pesca(id);


--
-- Name: fk_pescado; Type: FK CONSTRAINT; Schema: public; Owner: siepe
--

ALTER TABLE ONLY pesca_pescado
    ADD CONSTRAINT fk_pescado FOREIGN KEY (idpescado) REFERENCES pescado(id);


--
-- Name: fk_pescado_pesca; Type: FK CONSTRAINT; Schema: public; Owner: siepe
--

ALTER TABLE ONLY pesca_pescado
    ADD CONSTRAINT fk_pescado_pesca FOREIGN KEY (idpesca) REFERENCES pesca(id);


--
-- Name: fk_pescador; Type: FK CONSTRAINT; Schema: public; Owner: siepe
--

ALTER TABLE ONLY pesca
    ADD CONSTRAINT fk_pescador FOREIGN KEY (idpescador) REFERENCES pescador(id);


--
-- Name: fk_rio; Type: FK CONSTRAINT; Schema: public; Owner: siepe
--

ALTER TABLE ONLY local
    ADD CONSTRAINT fk_rio FOREIGN KEY (idrio) REFERENCES rio(id);


--
-- Name: public; Type: ACL; Schema: -; Owner: siepe
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;



CREATE TABLE public.tipocomprador
(
   id serial, 
   descricao character varying, 
   CONSTRAINT tipocomprador_pkey PRIMARY KEY (id)
) 
WITH (
  OIDS = FALSE
)
;
ALTER TABLE public.tipocomprador
  OWNER TO postgres;

CREATE TABLE public.pesca_tipocomprador
(
   idpesca integer, 
   idtipocomprador integer, 
   CONSTRAINT fk_pescatipocomprador_pesca FOREIGN KEY (idpesca) REFERENCES pesca (id) ON UPDATE NO ACTION ON DELETE NO ACTION, 
   CONSTRAINT fk_pescatipocomprador_tipocomprador FOREIGN KEY (idtipocomprador) REFERENCES tipocomprador (id) ON UPDATE NO ACTION ON DELETE NO ACTION
) 
WITH (
  OIDS = FALSE
)
;
ALTER TABLE public.pesca_tipocomprador
  OWNER TO postgres;

ALTER TABLE pescado
  ADD COLUMN tamanhomenor double precision;
ALTER TABLE pescado
  ADD COLUMN tamanhomaior double precision;

insert into perfil (id,descricao) values (5,'Administrador'),(6,'Docente'),(7,'Colaborador'),(8,'Bolsista');
INSERT INTO usuario (login, senha, idPerfil, nome, email) values ('admin',md5('admin'),5,'Admin','admin@teste.com');
INSERT INTO estrategia_imp_exp values (1,'Planilha Separada','ControllerPlanilhaSeparada',true),(2,'Planilha Única','ControllerPlanilhaUnica',true);

INSERT INTO estado VALUES (11,'RO','Rondônia'), (12,'AC','Acre'), (13,'AM','Amazonas'), (14,'RR','Roraima'), (15,'PA','Pará'), (16,'AP','Amapá'), (17,'TO','Tocantins'), (21,'MA','Maranhão'), (22,'PI','Piauí'), (23,'CE','Ceará'), (24,'RN','Rio Grande do Norte'), (25,'PB','Paraíba'), (26,'PE','Pernambuco'), (27,'AL','Alagoas'), (28,'SE','Sergipe'), (29,'BA','Bahia'), (31,'MG','Minas Gerais'), (32,'ES','Espírito Santo'), (33,'RJ','Rio de Janeiro'), (35,'SP','São Paulo'), (41,'PR','Paraná'), (42,'SC','Santa Catarina'), (43,'RS','Rio Grande do Sul'), (50,'MS','Mato Grosso do Sul'), (51,'MG','Mato Grosso'), (52,'GO','Goiás'), (53,'DF','Distrito Federal');
INSERT INTO cidade VALUES (5200050,52,'ABADIA DE GOIAS');
INSERT INTO cidade VALUES (3100104,31,'ABADIA DO DOURADOS');
INSERT INTO cidade VALUES (5200100,52,'ABADIANIA');
INSERT INTO cidade VALUES (3100203,31,'ABAETE');
INSERT INTO cidade VALUES (1500107,15,'ABAETETUBA');
INSERT INTO cidade VALUES (2300101,23,'ABAIARA');
INSERT INTO cidade VALUES (2900108,29,'ABAIRA');
INSERT INTO cidade VALUES (2900207,29,'ABARE');
INSERT INTO cidade VALUES (4100103,41,'ABATIA');
INSERT INTO cidade VALUES (4200051,42,'ABDON BATISTA');
INSERT INTO cidade VALUES (1500131,15,'ABEL FIGUEIREDO');
INSERT INTO cidade VALUES (4200101,42,'ABELARDO LUZ');
INSERT INTO cidade VALUES (3100302,31,'ABRE CAMPO');
INSERT INTO cidade VALUES (2600054,26,'ABREU E LIMA');
INSERT INTO cidade VALUES (1700251,17,'ABREULANDIA');
INSERT INTO cidade VALUES (3100401,31,'ACAIACA');
INSERT INTO cidade VALUES (2100055,21,'ACAILANDIA');
INSERT INTO cidade VALUES (2900306,29,'ACAJUTIBA');
INSERT INTO cidade VALUES (1500206,15,'ACARA');
INSERT INTO cidade VALUES (2300150,23,'ACARAPE');
INSERT INTO cidade VALUES (2300200,23,'ACARAU');
INSERT INTO cidade VALUES (2400109,24,'ACARI');
INSERT INTO cidade VALUES (2200053,22,'ACAUA');
INSERT INTO cidade VALUES (4300034,43,'ACEGUA');
INSERT INTO cidade VALUES (2300309,23,'ACOPIARA');
INSERT INTO cidade VALUES (5100102,51,'ACORIZAL');
INSERT INTO cidade VALUES (1200013,12,'ACRELANDIA');
INSERT INTO cidade VALUES (5200134,52,'ACREUNA');
INSERT INTO cidade VALUES (2400208,24,'ACU');
INSERT INTO cidade VALUES (3100500,31,'ACUCENA');
INSERT INTO cidade VALUES (3500105,35,'ADAMANTINA');
INSERT INTO cidade VALUES (5200159,52,'ADELANDIA');
INSERT INTO cidade VALUES (3500204,35,'ADOLFO');
INSERT INTO cidade VALUES (4100202,41,'ADRIANOPOLIS');
INSERT INTO cidade VALUES (2900355,29,'ADUSTINA');
INSERT INTO cidade VALUES (2600104,26,'AFOGADOS DA INGAZEIRA');
INSERT INTO cidade VALUES (2400307,24,'AFONSO BEZERRA');
INSERT INTO cidade VALUES (3200102,32,'AFONSO CLAUDIO');
INSERT INTO cidade VALUES (2100105,21,'AFONSO CUNHA');
INSERT INTO cidade VALUES (2600203,26,'AFRANIO');
INSERT INTO cidade VALUES (1500305,15,'AFUA');
INSERT INTO cidade VALUES (2600302,26,'AGRESTINA');
INSERT INTO cidade VALUES (2200103,22,'AGRICOLANDIA');
INSERT INTO cidade VALUES (4200200,42,'AGROLANDIA');
INSERT INTO cidade VALUES (4200309,42,'AGRONOMICA');
INSERT INTO cidade VALUES (1500347,15,'AGUA AZUL DO NORTE');
INSERT INTO cidade VALUES (5100201,51,'AGUA BOA');
INSERT INTO cidade VALUES (3100609,31,'AGUA BOA');
INSERT INTO cidade VALUES (2200202,22,'AGUA BRANCA');
INSERT INTO cidade VALUES (2500106,25,'AGUA BRANCA');
INSERT INTO cidade VALUES (2700102,27,'AGUA BRANCA');
INSERT INTO cidade VALUES (5000203,50,'AGUA CLARA');
INSERT INTO cidade VALUES (3100708,31,'AGUA COMPRIDA');
INSERT INTO cidade VALUES (4200408,42,'AGUA DOCE');
INSERT INTO cidade VALUES (2100154,21,'AGUA DOCE DO MARANHAO');
INSERT INTO cidade VALUES (3200169,32,'AGUA DOCE DO NORTE');
INSERT INTO cidade VALUES (2900405,29,'AGUA FRIA');
INSERT INTO cidade VALUES (5200175,52,'AGUA FRIA DE GOIAS');
INSERT INTO cidade VALUES (5200209,52,'AGUA LIMPA');
INSERT INTO cidade VALUES (2400406,24,'AGUA NOVA');
INSERT INTO cidade VALUES (2600401,26,'AGUA PRETA');
INSERT INTO cidade VALUES (4300059,43,'AGUA SANTA');
INSERT INTO cidade VALUES (3500303,35,'AGUAI');
INSERT INTO cidade VALUES (3100807,31,'AGUANIL');
INSERT INTO cidade VALUES (2600500,26,'AGUAS BELAS');
INSERT INTO cidade VALUES (3500402,35,'AGUAS DA PRATA');
INSERT INTO cidade VALUES (4200507,42,'AGUAS DE CHAPECO');
INSERT INTO cidade VALUES (3500501,35,'AGUAS DE LINDOIA');
INSERT INTO cidade VALUES (3500550,35,'AGUAS DE SANTA BARBARA');
INSERT INTO cidade VALUES (3500600,35,'AGUAS DE SAO PEDRO');
INSERT INTO cidade VALUES (3100906,31,'AGUAS FORMOSAS');
INSERT INTO cidade VALUES (4200556,42,'AGUAS FRIAS');
INSERT INTO cidade VALUES (5200258,52,'AGUAS LINDAS DE GOIAS');
INSERT INTO cidade VALUES (4200606,42,'AGUAS MORNAS');
INSERT INTO cidade VALUES (3101003,31,'AGUAS VERMELHAS');
INSERT INTO cidade VALUES (4300109,43,'AGUDO');
INSERT INTO cidade VALUES (3500709,35,'AGUDOS');
INSERT INTO cidade VALUES (4100301,41,'AGUDOS DO SUL');
INSERT INTO cidade VALUES (3200136,32,'AGUIA BRANCA');
INSERT INTO cidade VALUES (2500205,25,'AGUIAR');
INSERT INTO cidade VALUES (1700301,17,'AGUIARNOPOLIS');
INSERT INTO cidade VALUES (3101102,31,'AIMORES');
INSERT INTO cidade VALUES (2900603,29,'AIQUARA');
INSERT INTO cidade VALUES (2300408,23,'AIUABA');
INSERT INTO cidade VALUES (3101201,31,'AIURUOCA');
INSERT INTO cidade VALUES (4300208,43,'AJURICABA');
INSERT INTO cidade VALUES (3101300,31,'ALAGOA');
INSERT INTO cidade VALUES (2500304,25,'ALAGOA GRANDE');
INSERT INTO cidade VALUES (2500403,25,'ALAGOA NOVA');
INSERT INTO cidade VALUES (2500502,25,'ALAGOINHA');
INSERT INTO cidade VALUES (2600609,26,'ALAGOINHA');
INSERT INTO cidade VALUES (2200251,22,'ALAGOINHA DO PIAUI');
INSERT INTO cidade VALUES (2900702,29,'ALAGOINHAS');
INSERT INTO cidade VALUES (3500758,35,'ALAMBARI');
INSERT INTO cidade VALUES (3101409,31,'ALBERTINA');
INSERT INTO cidade VALUES (2100204,21,'ALCANTARA');
INSERT INTO cidade VALUES (2300507,23,'ALCANTARAS');
INSERT INTO cidade VALUES (2500536,25,'ALCANTIL');
INSERT INTO cidade VALUES (5000252,50,'ALCINOPOLIS');
INSERT INTO cidade VALUES (2900801,29,'ALCOBACA');
INSERT INTO cidade VALUES (2100303,21,'ALDEIAS ALTAS');
INSERT INTO cidade VALUES (4300307,43,'ALECRIM');
INSERT INTO cidade VALUES (3200201,32,'ALEGRE');
INSERT INTO cidade VALUES (4300406,43,'ALEGRETE');
INSERT INTO cidade VALUES (2200277,22,'ALEGRETE DO PIAUI');
INSERT INTO cidade VALUES (4300455,43,'ALEGRIA');
INSERT INTO cidade VALUES (3101508,31,'ALEM PARAIBA');
INSERT INTO cidade VALUES (1500404,15,'ALENQUER');
INSERT INTO cidade VALUES (2400505,24,'ALEXANDRIA');
INSERT INTO cidade VALUES (5200308,52,'ALEXANIA');
INSERT INTO cidade VALUES (3101607,31,'ALFENAS');
INSERT INTO cidade VALUES (3200300,32,'ALFREDO CHAVES');
INSERT INTO cidade VALUES (3500808,35,'ALFREDO MARCONDES');
INSERT INTO cidade VALUES (3101631,31,'ALFREDO VASCONCELOS');
INSERT INTO cidade VALUES (4200705,42,'ALFREDO WAGNER');
INSERT INTO cidade VALUES (2500577,25,'ALGODAO DE JANDAIRA');
INSERT INTO cidade VALUES (2500601,25,'ALHANDRA');
INSERT INTO cidade VALUES (2600708,26,'ALIANCA');
INSERT INTO cidade VALUES (1700350,17,'ALIANCA DO TOCANTINS');
INSERT INTO cidade VALUES (2900900,29,'ALMADINA');
INSERT INTO cidade VALUES (1700400,17,'ALMAS');
INSERT INTO cidade VALUES (1500503,15,'ALMEIRIM');
INSERT INTO cidade VALUES (3101706,31,'ALMENARA');
INSERT INTO cidade VALUES (2400604,24,'ALMINO AFONSO');
INSERT INTO cidade VALUES (4100400,41,'ALMIRANTE TAMANDARE');
INSERT INTO cidade VALUES (4300471,43,'ALMIRANTE TAMANDARE DO SUL');
INSERT INTO cidade VALUES (5200506,52,'ALOANDIA');
INSERT INTO cidade VALUES (3101805,31,'ALPERCATA');
INSERT INTO cidade VALUES (4300505,43,'ALPESTRE');
INSERT INTO cidade VALUES (3101904,31,'ALPINOPOLIS');
INSERT INTO cidade VALUES (5100250,51,'ALTA FLORESTA');
INSERT INTO cidade VALUES (1100015,11,'ALTA FLORESTA D´OESTE');
INSERT INTO cidade VALUES (3500907,35,'ALTAIR');
INSERT INTO cidade VALUES (1500602,15,'ALTAMIRA');
INSERT INTO cidade VALUES (2100402,21,'ALTAMIRA DO MARANHAO');
INSERT INTO cidade VALUES (4100459,41,'ALTAMIRA DO PARANA');
INSERT INTO cidade VALUES (2300606,23,'ALTANEIRA');
INSERT INTO cidade VALUES (3102001,31,'ALTEROSA');
INSERT INTO cidade VALUES (2600807,26,'ALTINHO');
INSERT INTO cidade VALUES (3501004,35,'ALTINOPOLIS');
INSERT INTO cidade VALUES (3501103,35,'ALTO ALEGRE');
INSERT INTO cidade VALUES (1400050,14,'ALTO ALEGRE');
INSERT INTO cidade VALUES (4300554,43,'ALTO ALEGRE');
INSERT INTO cidade VALUES (2100436,21,'ALTO ALEGRE DO MARANHAO');
INSERT INTO cidade VALUES (1100379,11,'ALTO ALEGRE DO PARECIS');
INSERT INTO cidade VALUES (2100477,21,'ALTO ALEGRE DO PINDARE');
INSERT INTO cidade VALUES (5100300,51,'ALTO ARAGUAIA');
INSERT INTO cidade VALUES (4200754,42,'ALTO BELA VISTA');
INSERT INTO cidade VALUES (5100359,51,'ALTO BOA VISTA');
INSERT INTO cidade VALUES (3102050,31,'ALTO CAPARAO');
INSERT INTO cidade VALUES (2400703,24,'ALTO DO RODRIGUES');
INSERT INTO cidade VALUES (4300570,43,'ALTO FELIZ');
INSERT INTO cidade VALUES (5100409,51,'ALTO GARCAS');
INSERT INTO cidade VALUES (5200555,52,'ALTO HORIZONTE');
INSERT INTO cidade VALUES (3153509,31,'ALTO JEQUITIBA');
INSERT INTO cidade VALUES (2200301,22,'ALTO LONGA');
INSERT INTO cidade VALUES (5100508,51,'ALTO PARAGUAI');
INSERT INTO cidade VALUES (1100403,11,'ALTO PARAISO');
INSERT INTO cidade VALUES (5200605,52,'ALTO PARAISO DE GOIAS');
INSERT INTO cidade VALUES (4100608,41,'ALTO PARANA');
INSERT INTO cidade VALUES (2100501,21,'ALTO PARNAIBA');
INSERT INTO cidade VALUES (4100707,41,'ALTO PIQUIRI');
INSERT INTO cidade VALUES (3102100,31,'ALTO RIO DOCE');
INSERT INTO cidade VALUES (3200359,32,'ALTO RIO NOVO');
INSERT INTO cidade VALUES (2300705,23,'ALTO SANTO');
INSERT INTO cidade VALUES (5100607,51,'ALTO TAQUARI');
INSERT INTO cidade VALUES (4100509,41,'ALTONIA');
INSERT INTO cidade VALUES (2200400,22,'ALTOS');
INSERT INTO cidade VALUES (3501152,35,'ALUMINIO');
INSERT INTO cidade VALUES (1300029,13,'ALVARAES');
INSERT INTO cidade VALUES (3102209,31,'ALVARENGA');
INSERT INTO cidade VALUES (3501202,35,'ALVARES FLORENCE');
INSERT INTO cidade VALUES (3501301,35,'ALVARES MACHADO');
INSERT INTO cidade VALUES (3501400,35,'ALVARO DE CARVALHO');
INSERT INTO cidade VALUES (3501509,35,'ALVINLANDIA');
INSERT INTO cidade VALUES (3102308,31,'ALVINOPOLIS');
INSERT INTO cidade VALUES (1700707,17,'ALVORADA');
INSERT INTO cidade VALUES (4300604,43,'ALVORADA');
INSERT INTO cidade VALUES (3102407,31,'ALVORADA DE MINAS');
INSERT INTO cidade VALUES (2200459,22,'ALVORADA DO GURGUEIA');
INSERT INTO cidade VALUES (5200803,52,'ALVORADA DO NORTE');
INSERT INTO cidade VALUES (4100806,41,'ALVORADA DO SUL');
INSERT INTO cidade VALUES (1100346,11,'ALVORADA D´OESTE');
INSERT INTO cidade VALUES (1400027,14,'AMAJARI');
INSERT INTO cidade VALUES (5000609,50,'AMAMBAI');
INSERT INTO cidade VALUES (1600105,16,'AMAPA');
INSERT INTO cidade VALUES (2100550,21,'AMAPA DO MARANHAO');
INSERT INTO cidade VALUES (4100905,41,'AMAPORA');
INSERT INTO cidade VALUES (2600906,26,'AMARAJI');
INSERT INTO cidade VALUES (4300638,43,'AMARAL FERRADOR');
INSERT INTO cidade VALUES (5200829,52,'AMARALINA');
INSERT INTO cidade VALUES (2200509,22,'AMARANTE');
INSERT INTO cidade VALUES (2100600,21,'AMARANTE DO MARANHAO');
INSERT INTO cidade VALUES (2901007,29,'AMARGOSA');
INSERT INTO cidade VALUES (1300060,13,'AMATURA');
INSERT INTO cidade VALUES (2901106,29,'AMELIA RODRIGUES');
INSERT INTO cidade VALUES (2901155,29,'AMERICA DOURADA');
INSERT INTO cidade VALUES (3501608,35,'AMERICANA');
INSERT INTO cidade VALUES (5200852,52,'AMERICANO DO BRASIL');
INSERT INTO cidade VALUES (3501707,35,'AMERICO BRASILIENSE');
INSERT INTO cidade VALUES (3501806,35,'AMERICO DE CAMPOS');
INSERT INTO cidade VALUES (4300646,43,'AMETISTA DO SUL');
INSERT INTO cidade VALUES (2300754,23,'AMONTADA');
INSERT INTO cidade VALUES (5200902,52,'AMORINOPOLIS');
INSERT INTO cidade VALUES (3501905,35,'AMPARO');
INSERT INTO cidade VALUES (2500734,25,'AMPARO');
INSERT INTO cidade VALUES (2800100,28,'AMPARO DE SAO FRANCISCO');
INSERT INTO cidade VALUES (3102506,31,'AMPARO DO SERRA');
INSERT INTO cidade VALUES (4101002,41,'AMPERE');
INSERT INTO cidade VALUES (2700201,27,'ANADIA');
INSERT INTO cidade VALUES (2901205,29,'ANAGE');
INSERT INTO cidade VALUES (4101051,41,'ANAHY');
INSERT INTO cidade VALUES (1500701,15,'ANAJAS');
INSERT INTO cidade VALUES (2100709,21,'ANAJATUBA');
INSERT INTO cidade VALUES (3502002,35,'ANALANDIA');
INSERT INTO cidade VALUES (1300086,13,'ANAMA');
INSERT INTO cidade VALUES (1701002,17,'ANANAS');
INSERT INTO cidade VALUES (1500800,15,'ANANINDEUA');
INSERT INTO cidade VALUES (5201108,52,'ANAPOLIS');
INSERT INTO cidade VALUES (1500859,15,'ANAPU');
INSERT INTO cidade VALUES (2100808,21,'ANAPURUS');
INSERT INTO cidade VALUES (5000708,50,'ANASTACIO');
INSERT INTO cidade VALUES (5000807,50,'ANAURILANDIA');
INSERT INTO cidade VALUES (3200409,32,'ANCHIETA');
INSERT INTO cidade VALUES (4200804,42,'ANCHIETA');
INSERT INTO cidade VALUES (2901304,29,'ANDARAI');
INSERT INTO cidade VALUES (4101101,41,'ANDIRA');
INSERT INTO cidade VALUES (2901353,29,'ANDORINHA');
INSERT INTO cidade VALUES (3102605,31,'ANDRADAS');
INSERT INTO cidade VALUES (3502101,35,'ANDRADINA');
INSERT INTO cidade VALUES (4300661,43,'ANDRE DA ROCHA');
INSERT INTO cidade VALUES (3102803,31,'ANDRELANDIA');
INSERT INTO cidade VALUES (3502200,35,'ANGATUBA');
INSERT INTO cidade VALUES (3102852,31,'ANGELANDIA');
INSERT INTO cidade VALUES (5000856,50,'ANGELICA');
INSERT INTO cidade VALUES (2601003,26,'ANGELIM');
INSERT INTO cidade VALUES (4200903,42,'ANGELINA');
INSERT INTO cidade VALUES (2901403,29,'ANGICAL');
INSERT INTO cidade VALUES (2200608,22,'ANGICAL DO PIAUI');
INSERT INTO cidade VALUES (1701051,17,'ANGICO');
INSERT INTO cidade VALUES (2400802,24,'ANGICOS');
INSERT INTO cidade VALUES (3300100,33,'ANGRA DO REIS');
INSERT INTO cidade VALUES (2901502,29,'ANGUERA');
INSERT INTO cidade VALUES (4101150,41,'ANGULO');
INSERT INTO cidade VALUES (5201207,52,'ANHANGUERA');
INSERT INTO cidade VALUES (3502309,35,'ANHEMBI');
INSERT INTO cidade VALUES (3502408,35,'ANHUMAS');
INSERT INTO cidade VALUES (5201306,52,'ANICUNS');
INSERT INTO cidade VALUES (2200707,22,'ANISIO DE ABREU');
INSERT INTO cidade VALUES (4201000,42,'ANITA GARIBALDI');
INSERT INTO cidade VALUES (4201109,42,'ANITAPOLIS');
INSERT INTO cidade VALUES (1300102,13,'ANORI');
INSERT INTO cidade VALUES (4300703,43,'ANTA GORDA');
INSERT INTO cidade VALUES (2901601,29,'ANTAS');
INSERT INTO cidade VALUES (4101200,41,'ANTONINA');
INSERT INTO cidade VALUES (2300804,23,'ANTONINA DO NORTE');
INSERT INTO cidade VALUES (2200806,22,'ANTONIO ALMEIDA');
INSERT INTO cidade VALUES (2901700,29,'ANTONIO CARDOSO');
INSERT INTO cidade VALUES (3102902,31,'ANTONIO CARLOS');
INSERT INTO cidade VALUES (4201208,42,'ANTONIO CARLOS');
INSERT INTO cidade VALUES (3103009,31,'ANTONIO DIAS');
INSERT INTO cidade VALUES (2901809,29,'ANTONIO GONCALVES');
INSERT INTO cidade VALUES (5000906,50,'ANTONIO JOAO');
INSERT INTO cidade VALUES (2400901,24,'ANTONIO MARTINS');
INSERT INTO cidade VALUES (4101309,41,'ANTONIO OLINTO');
INSERT INTO cidade VALUES (4300802,43,'ANTONIO PRADO');
INSERT INTO cidade VALUES (3103108,31,'ANTONIO PRADO DE MINAS');
INSERT INTO cidade VALUES (2500775,25,'APARECIDA');
INSERT INTO cidade VALUES (3502507,35,'APARECIDA');
INSERT INTO cidade VALUES (5201405,52,'APARECIDA DE GOIANIA');
INSERT INTO cidade VALUES (5201454,52,'APARECIDA DO RIO DOCE');
INSERT INTO cidade VALUES (1701101,17,'APARECIDA DO RIO NEGRO');
INSERT INTO cidade VALUES (5001003,50,'APARECIDA DO TABOADO');
INSERT INTO cidade VALUES (3502606,35,'APARECIDA D´OESTE');
INSERT INTO cidade VALUES (3300159,33,'APERIBE');
INSERT INTO cidade VALUES (3200508,32,'APIACA');
INSERT INTO cidade VALUES (5100805,51,'APIACAS');
INSERT INTO cidade VALUES (3502705,35,'APIAI');
INSERT INTO cidade VALUES (2100832,21,'APICUM-ACU');
INSERT INTO cidade VALUES (4201257,42,'APIUNA');
INSERT INTO cidade VALUES (2401008,24,'APODI');
INSERT INTO cidade VALUES (2901908,29,'APORA');
INSERT INTO cidade VALUES (5201504,52,'APORE');
INSERT INTO cidade VALUES (2901957,29,'APUAREMA');
INSERT INTO cidade VALUES (4101408,41,'APUCARANA');
INSERT INTO cidade VALUES (1300144,13,'APUI');
INSERT INTO cidade VALUES (2300903,23,'APUIARES');
INSERT INTO cidade VALUES (2800209,28,'AQUIDABA');
INSERT INTO cidade VALUES (5001102,50,'AQUIDAUANA');
INSERT INTO cidade VALUES (2301000,23,'AQUIRAZ');
INSERT INTO cidade VALUES (4201273,42,'ARABUTA');
INSERT INTO cidade VALUES (2500809,25,'ARACAGI');
INSERT INTO cidade VALUES (3103207,31,'ARACAI');
INSERT INTO cidade VALUES (2800308,28,'ARACAJU');
INSERT INTO cidade VALUES (3502754,35,'ARACARIGUAMA');
INSERT INTO cidade VALUES (2902054,29,'ARACAS');
INSERT INTO cidade VALUES (2301109,23,'ARACATI');
INSERT INTO cidade VALUES (2902005,29,'ARACATU');
INSERT INTO cidade VALUES (3502804,35,'ARACATUBA');
INSERT INTO cidade VALUES (2902104,29,'ARACI');
INSERT INTO cidade VALUES (3103306,31,'ARACITABA');
INSERT INTO cidade VALUES (2301208,23,'ARACOIABA');
INSERT INTO cidade VALUES (2601052,26,'ARACOIABA');
INSERT INTO cidade VALUES (3502903,35,'ARACOIABA DA SERRA');
INSERT INTO cidade VALUES (3200607,32,'ARACRUZ');
INSERT INTO cidade VALUES (5201603,52,'ARACU');
INSERT INTO cidade VALUES (3103405,31,'ARACUAI');
INSERT INTO cidade VALUES (5201702,52,'ARAGARCAS');
INSERT INTO cidade VALUES (5201801,52,'ARAGOIANIA');
INSERT INTO cidade VALUES (1701309,17,'ARAGOMINAS');
INSERT INTO cidade VALUES (1701903,17,'ARAGUACEMA');
INSERT INTO cidade VALUES (1702000,17,'ARAGUACU');
INSERT INTO cidade VALUES (5101001,51,'ARAGUAIANA');
INSERT INTO cidade VALUES (1702109,17,'ARAGUAINA');
INSERT INTO cidade VALUES (5101209,51,'ARAGUAINHA');
INSERT INTO cidade VALUES (2100873,21,'ARAGUANA');
INSERT INTO cidade VALUES (1702158,17,'ARAGUANA');
INSERT INTO cidade VALUES (5202155,52,'ARAGUAPAZ');
INSERT INTO cidade VALUES (3103504,31,'ARAGUARI');
INSERT INTO cidade VALUES (1702208,17,'ARAGUATINS');
INSERT INTO cidade VALUES (2100907,21,'ARAIOSES');
INSERT INTO cidade VALUES (5001243,50,'ARAL MOREIRA');
INSERT INTO cidade VALUES (2902203,29,'ARAMARI');
INSERT INTO cidade VALUES (4300851,43,'ARAMBARE');
INSERT INTO cidade VALUES (2100956,21,'ARAME');
INSERT INTO cidade VALUES (3503000,35,'ARAMINA');
INSERT INTO cidade VALUES (3503109,35,'ARANDU');
INSERT INTO cidade VALUES (3103603,31,'ARANTINA');
INSERT INTO cidade VALUES (3503158,35,'ARAPEI');
INSERT INTO cidade VALUES (2700300,27,'ARAPIRACA');
INSERT INTO cidade VALUES (1702307,17,'ARAPOEMA');
INSERT INTO cidade VALUES (3103702,31,'ARAPONGA');
INSERT INTO cidade VALUES (4101507,41,'ARAPONGAS');
INSERT INTO cidade VALUES (3103751,31,'ARAPORA');
INSERT INTO cidade VALUES (4101606,41,'ARAPOTI');
INSERT INTO cidade VALUES (3103801,31,'ARAPUA');
INSERT INTO cidade VALUES (4101655,41,'ARAPUA');
INSERT INTO cidade VALUES (5101258,51,'ARAPUTANGA');
INSERT INTO cidade VALUES (4201307,42,'ARAQUARI');
INSERT INTO cidade VALUES (2500908,25,'ARARA');
INSERT INTO cidade VALUES (4201406,42,'ARARANGUA');
INSERT INTO cidade VALUES (3503208,35,'ARARAQUARA');
INSERT INTO cidade VALUES (3503307,35,'ARARAS');
INSERT INTO cidade VALUES (2301257,23,'ARARENDA');
INSERT INTO cidade VALUES (2101004,21,'ARARI');
INSERT INTO cidade VALUES (4300877,43,'ARARICA');
INSERT INTO cidade VALUES (2301307,23,'ARARIPE');
INSERT INTO cidade VALUES (2601102,26,'ARARIPINA');
INSERT INTO cidade VALUES (3300209,33,'ARARUAMA');
INSERT INTO cidade VALUES (2501005,25,'ARARUNA');
INSERT INTO cidade VALUES (4101705,41,'ARARUNA');
INSERT INTO cidade VALUES (2902252,29,'ARATACA');
INSERT INTO cidade VALUES (4300901,43,'ARATIBA');
INSERT INTO cidade VALUES (2301406,23,'ARATUBA');
INSERT INTO cidade VALUES (2902302,29,'ARATUIPE');
INSERT INTO cidade VALUES (2800407,28,'ARAUA');
INSERT INTO cidade VALUES (4101804,41,'ARAUCARIA');
INSERT INTO cidade VALUES (3103900,31,'ARAUJOS');
INSERT INTO cidade VALUES (3104007,31,'ARAXA');
INSERT INTO cidade VALUES (3104106,31,'ARCEBURGO');
INSERT INTO cidade VALUES (3503356,35,'ARCO-IRIS');
INSERT INTO cidade VALUES (3104205,31,'ARCOS');
INSERT INTO cidade VALUES (2601201,26,'ARCOVERDE');
INSERT INTO cidade VALUES (3104304,31,'AREADO');
INSERT INTO cidade VALUES (3300225,33,'AREAL');
INSERT INTO cidade VALUES (3503406,35,'AREALVA');
INSERT INTO cidade VALUES (2501104,25,'AREIA');
INSERT INTO cidade VALUES (2800506,28,'AREIA BRANCA');
INSERT INTO cidade VALUES (2401107,24,'AREIA BRANCA');
INSERT INTO cidade VALUES (2501153,25,'AREIA DE BARAUNAS');
INSERT INTO cidade VALUES (2501203,25,'AREIAL');
INSERT INTO cidade VALUES (3503505,35,'AREIAS');
INSERT INTO cidade VALUES (3503604,35,'AREIOPOLIS');
INSERT INTO cidade VALUES (5101308,51,'ARENAPOLIS');
INSERT INTO cidade VALUES (5202353,52,'ARENOPOLIS');
INSERT INTO cidade VALUES (2401206,24,'ARES');
INSERT INTO cidade VALUES (3104403,31,'ARGIRITA');
INSERT INTO cidade VALUES (3104452,31,'ARICANDUVA');
INSERT INTO cidade VALUES (3104502,31,'ARINOS');
INSERT INTO cidade VALUES (5101407,51,'ARIPUANA');
INSERT INTO cidade VALUES (1100023,11,'ARIQUEMES');
INSERT INTO cidade VALUES (3503703,35,'ARIRANHA');
INSERT INTO cidade VALUES (4101853,41,'ARIRANHA DO IVAI');
INSERT INTO cidade VALUES (3300233,33,'ARMACAO DO BUZIOS');
INSERT INTO cidade VALUES (4201505,42,'ARMAZEM');
INSERT INTO cidade VALUES (2301505,23,'ARNEIROZ');
INSERT INTO cidade VALUES (2200905,22,'AROAZES');
INSERT INTO cidade VALUES (2501302,25,'AROEIRAS');
INSERT INTO cidade VALUES (2200954,22,'AROEIRAS DO ITAIM');
INSERT INTO cidade VALUES (2201002,22,'ARRAIAL');
INSERT INTO cidade VALUES (3300258,33,'ARRAIAL DO CABO');
INSERT INTO cidade VALUES (1702406,17,'ARRAIAS');
INSERT INTO cidade VALUES (4301008,43,'ARROIO DO MEIO');
INSERT INTO cidade VALUES (4301073,43,'ARROIO DO PADRE');
INSERT INTO cidade VALUES (4301107,43,'ARROIO DO RATOS');
INSERT INTO cidade VALUES (4301057,43,'ARROIO DO SAL');
INSERT INTO cidade VALUES (4301206,43,'ARROIO DO TIGRE');
INSERT INTO cidade VALUES (4301305,43,'ARROIO GRANDE');
INSERT INTO cidade VALUES (4201604,42,'ARROIO TRINTA');
INSERT INTO cidade VALUES (3503802,35,'ARTUR NOGUEIRA');
INSERT INTO cidade VALUES (5202502,52,'ARUANA');
INSERT INTO cidade VALUES (3503901,35,'ARUJA');
INSERT INTO cidade VALUES (4201653,42,'ARVOREDO');
INSERT INTO cidade VALUES (4301404,43,'ARVOREZINHA');
INSERT INTO cidade VALUES (4201703,42,'ASCURRA');
INSERT INTO cidade VALUES (3503950,35,'ASPASIA');
INSERT INTO cidade VALUES (4101903,41,'ASSAI');
INSERT INTO cidade VALUES (2301604,23,'ASSARE');
INSERT INTO cidade VALUES (3504008,35,'ASSIS');
INSERT INTO cidade VALUES (1200054,12,'ASSIS BRASIL');
INSERT INTO cidade VALUES (4102000,41,'ASSIS CHATEAUBRIAND');
INSERT INTO cidade VALUES (2501351,25,'ASSUNCAO');
INSERT INTO cidade VALUES (2201051,22,'ASSUNCAO DO PIAUI');
INSERT INTO cidade VALUES (3104601,31,'ASTOLFO DUTRA');
INSERT INTO cidade VALUES (4102109,41,'ASTORGA');
INSERT INTO cidade VALUES (4102208,41,'ATALAIA');
INSERT INTO cidade VALUES (2700409,27,'ATALAIA');
INSERT INTO cidade VALUES (1300201,13,'ATALAIA DO NORTE');
INSERT INTO cidade VALUES (4201802,42,'ATALANTA');
INSERT INTO cidade VALUES (3104700,31,'ATALEIA');
INSERT INTO cidade VALUES (3504107,35,'ATIBAIA');
INSERT INTO cidade VALUES (3200706,32,'ATILIO VIVACQUA');
INSERT INTO cidade VALUES (1702554,17,'AUGUSTINOPOLIS');
INSERT INTO cidade VALUES (1500909,15,'AUGUSTO CORREA');
INSERT INTO cidade VALUES (3104809,31,'AUGUSTO DE LIMA');
INSERT INTO cidade VALUES (4301503,43,'AUGUSTO PESTANA');
INSERT INTO cidade VALUES (2401305,24,'AUGUSTO SEVERO');
INSERT INTO cidade VALUES (4301552,43,'AUREA');
INSERT INTO cidade VALUES (2902401,29,'AURELINO LEAL');
INSERT INTO cidade VALUES (3504206,35,'AURIFLAMA');
INSERT INTO cidade VALUES (5202601,52,'AURILANDIA');
INSERT INTO cidade VALUES (4201901,42,'AURORA');
INSERT INTO cidade VALUES (2301703,23,'AURORA');
INSERT INTO cidade VALUES (1500958,15,'AURORA DO PARA');
INSERT INTO cidade VALUES (1702703,17,'AURORA DO TOCANTINS');
INSERT INTO cidade VALUES (1300300,13,'AUTAZES');
INSERT INTO cidade VALUES (3504305,35,'AVAI');
INSERT INTO cidade VALUES (3504404,35,'AVANHANDAVA');
INSERT INTO cidade VALUES (3504503,35,'AVARE');
INSERT INTO cidade VALUES (1501006,15,'AVEIRO');
INSERT INTO cidade VALUES (2201101,22,'AVELINO LOPES');
INSERT INTO cidade VALUES (5202809,52,'AVELINOPOLIS');
INSERT INTO cidade VALUES (2101103,21,'AXIXA');
INSERT INTO cidade VALUES (1702901,17,'AXIXA DO TOCANTINS');
INSERT INTO cidade VALUES (1703008,17,'BABACULANDIA');
INSERT INTO cidade VALUES (2101202,21,'BACABAL');
INSERT INTO cidade VALUES (2101251,21,'BACABEIRA');
INSERT INTO cidade VALUES (2101301,21,'BACURI');
INSERT INTO cidade VALUES (2101350,21,'BACURITUBA');
INSERT INTO cidade VALUES (3504602,35,'BADY BASSITT');
INSERT INTO cidade VALUES (3104908,31,'BAEPENDI');
INSERT INTO cidade VALUES (4301602,43,'BAGE');
INSERT INTO cidade VALUES (1501105,15,'BAGRE');
INSERT INTO cidade VALUES (2501401,25,'BAIA DA TRAICAO');
INSERT INTO cidade VALUES (2401404,24,'BAIA FORMOSA');
INSERT INTO cidade VALUES (2902500,29,'BAIANOPOLIS');
INSERT INTO cidade VALUES (1501204,15,'BAIAO');
INSERT INTO cidade VALUES (2902609,29,'BAIXA GRANDE');
INSERT INTO cidade VALUES (2201150,22,'BAIXA GRANDE DO RIBEIRO');
INSERT INTO cidade VALUES (2301802,23,'BAIXIO');
INSERT INTO cidade VALUES (3200805,32,'BAIXO GUANDU');
INSERT INTO cidade VALUES (3504701,35,'BALBINOS');
INSERT INTO cidade VALUES (3105004,31,'BALDIM');
INSERT INTO cidade VALUES (5203104,52,'BALIZA');
INSERT INTO cidade VALUES (4201950,42,'BALNEARIO ARROIO DO SILVA');
INSERT INTO cidade VALUES (4202057,42,'BALNEARIO BARRA DO SUL');
INSERT INTO cidade VALUES (4202008,42,'BALNEARIO CAMBORIU');
INSERT INTO cidade VALUES (4202073,42,'BALNEARIO GAIVOTA');
INSERT INTO cidade VALUES (4301636,43,'BALNEARIO PINHAL');
INSERT INTO cidade VALUES (4102307,41,'BALSA NOVA');
INSERT INTO cidade VALUES (3504800,35,'BALSAMO');
INSERT INTO cidade VALUES (2101400,21,'BALSAS');
INSERT INTO cidade VALUES (3105103,31,'BAMBUI');
INSERT INTO cidade VALUES (2301851,23,'BANABUIU');
INSERT INTO cidade VALUES (3504909,35,'BANANAL');
INSERT INTO cidade VALUES (2501500,25,'BANANEIRAS');
INSERT INTO cidade VALUES (3105202,31,'BANDEIRA');
INSERT INTO cidade VALUES (3105301,31,'BANDEIRA DO SUL');
INSERT INTO cidade VALUES (4202081,42,'BANDEIRANTE');
INSERT INTO cidade VALUES (5001508,50,'BANDEIRANTES');
INSERT INTO cidade VALUES (4102406,41,'BANDEIRANTES');
INSERT INTO cidade VALUES (1703057,17,'BANDEIRANTES DO TOCANTINS');
INSERT INTO cidade VALUES (1501253,15,'BANNACH');
INSERT INTO cidade VALUES (2902658,29,'BANZAE');
INSERT INTO cidade VALUES (4301651,43,'BARAO');
INSERT INTO cidade VALUES (3505005,35,'BARAO DE ANTONINA');
INSERT INTO cidade VALUES (3105400,31,'BARAO DE COCAIS');
INSERT INTO cidade VALUES (4301701,43,'BARAO DE COTEGIPE');
INSERT INTO cidade VALUES (2101509,21,'BARAO DE GRAJAU');
INSERT INTO cidade VALUES (5101605,51,'BARAO DE MELGACO');
INSERT INTO cidade VALUES (3105509,31,'BARAO DE MONTE ALTO');
INSERT INTO cidade VALUES (4301750,43,'BARAO DO TRIUNFO');
INSERT INTO cidade VALUES (2501534,25,'BARAUNA');
INSERT INTO cidade VALUES (2401453,24,'BARAUNA');
INSERT INTO cidade VALUES (3105608,31,'BARBACENA');
INSERT INTO cidade VALUES (2301901,23,'BARBALHA');
INSERT INTO cidade VALUES (3505104,35,'BARBOSA');
INSERT INTO cidade VALUES (4102505,41,'BARBOSA FERRAZ');
INSERT INTO cidade VALUES (1501303,15,'BARCARENA');
INSERT INTO cidade VALUES (2401503,24,'BARCELONA');
INSERT INTO cidade VALUES (1300409,13,'BARCELOS');
INSERT INTO cidade VALUES (3505203,35,'BARIRI');
INSERT INTO cidade VALUES (2902708,29,'BARRA');
INSERT INTO cidade VALUES (4202099,42,'BARRA BONITA');
INSERT INTO cidade VALUES (3505302,35,'BARRA BONITA');
INSERT INTO cidade VALUES (2201176,22,'BARRA D ALCANTARA');
INSERT INTO cidade VALUES (2902807,29,'BARRA DA ESTIVA');
INSERT INTO cidade VALUES (2601300,26,'BARRA DE GUABIRABA');
INSERT INTO cidade VALUES (2501609,25,'BARRA DE SANTA ROSA');
INSERT INTO cidade VALUES (2501575,25,'BARRA DE SANTANA');
INSERT INTO cidade VALUES (2700508,27,'BARRA DE SANTO ANTONIO');
INSERT INTO cidade VALUES (3200904,32,'BARRA DE SAO FRANCISCO');
INSERT INTO cidade VALUES (2501708,25,'BARRA DE SAO MIGUEL');
INSERT INTO cidade VALUES (2700607,27,'BARRA DE SAO MIGUEL');
INSERT INTO cidade VALUES (5101704,51,'BARRA DO BUGRES');
INSERT INTO cidade VALUES (3505351,35,'BARRA DO CHAPEU');
INSERT INTO cidade VALUES (2902906,29,'BARRA DO CHOCA');
INSERT INTO cidade VALUES (2800605,28,'BARRA DO COQUEIROS');
INSERT INTO cidade VALUES (2101608,21,'BARRA DO CORDA');
INSERT INTO cidade VALUES (5101803,51,'BARRA DO GARCAS');
INSERT INTO cidade VALUES (4301859,43,'BARRA DO GUARITA');
INSERT INTO cidade VALUES (4102703,41,'BARRA DO JACARE');
INSERT INTO cidade VALUES (2903003,29,'BARRA DO MENDES');
INSERT INTO cidade VALUES (1703073,17,'BARRA DO OURO');
INSERT INTO cidade VALUES (3300308,33,'BARRA DO PIRAI');
INSERT INTO cidade VALUES (4301875,43,'BARRA DO QUARAI');
INSERT INTO cidade VALUES (4301909,43,'BARRA DO RIBEIRO');
INSERT INTO cidade VALUES (4301925,43,'BARRA DO RIO AZUL');
INSERT INTO cidade VALUES (2903102,29,'BARRA DO ROCHA');
INSERT INTO cidade VALUES (3505401,35,'BARRA DO TURVO');
INSERT INTO cidade VALUES (4301958,43,'BARRA FUNDA');
INSERT INTO cidade VALUES (3105707,31,'BARRA LONGA');
INSERT INTO cidade VALUES (3300407,33,'BARRA MANSA');
INSERT INTO cidade VALUES (4202107,42,'BARRA VELHA');
INSERT INTO cidade VALUES (4301800,43,'BARRACAO');
INSERT INTO cidade VALUES (4102604,41,'BARRACAO');
INSERT INTO cidade VALUES (2201200,22,'BARRAS');
INSERT INTO cidade VALUES (2301950,23,'BARREIRA');
INSERT INTO cidade VALUES (2903201,29,'BARREIRAS');
INSERT INTO cidade VALUES (2201309,22,'BARREIRAS DO PIAUI');
INSERT INTO cidade VALUES (1300508,13,'BARREIRINHA');
INSERT INTO cidade VALUES (2101707,21,'BARREIRINHAS');
INSERT INTO cidade VALUES (2601409,26,'BARREIROS');
INSERT INTO cidade VALUES (3505500,35,'BARRETOS');
INSERT INTO cidade VALUES (3505609,35,'BARRINHA');
INSERT INTO cidade VALUES (2302008,23,'BARRO');
INSERT INTO cidade VALUES (2903235,29,'BARRO ALTO');
INSERT INTO cidade VALUES (5203203,52,'BARRO ALTO');
INSERT INTO cidade VALUES (2201408,22,'BARRO DURO');
INSERT INTO cidade VALUES (2903276,29,'BARROCAS');
INSERT INTO cidade VALUES (1703107,17,'BARROLANDIA');
INSERT INTO cidade VALUES (2302057,23,'BARROQUINHA');
INSERT INTO cidade VALUES (4302006,43,'BARROS CASSAL');
INSERT INTO cidade VALUES (3105905,31,'BARROSO');
INSERT INTO cidade VALUES (3505708,35,'BARUERI');
INSERT INTO cidade VALUES (3505807,35,'BASTOS');
INSERT INTO cidade VALUES (5001904,50,'BATAGUASSU');
INSERT INTO cidade VALUES (5002001,50,'BATAIPORA');
INSERT INTO cidade VALUES (2700706,27,'BATALHA');
INSERT INTO cidade VALUES (2201507,22,'BATALHA');
INSERT INTO cidade VALUES (3505906,35,'BATATAIS');
INSERT INTO cidade VALUES (2302107,23,'BATURITE');
INSERT INTO cidade VALUES (3506003,35,'BAURU');
INSERT INTO cidade VALUES (2501807,25,'BAYEUX');
INSERT INTO cidade VALUES (3506102,35,'BEBEDOURO');
INSERT INTO cidade VALUES (2302206,23,'BEBERIBE');
INSERT INTO cidade VALUES (2302305,23,'BELA CRUZ');
INSERT INTO cidade VALUES (5002100,50,'BELA VISTA');
INSERT INTO cidade VALUES (5203302,52,'BELA VISTA DE GOIAS');
INSERT INTO cidade VALUES (3106002,31,'BELA VISTA DE MINAS');
INSERT INTO cidade VALUES (4102752,41,'BELA VISTA DO CAROBA');
INSERT INTO cidade VALUES (2101772,21,'BELA VISTA DO MARANHAO');
INSERT INTO cidade VALUES (4102802,41,'BELA VISTA DO PARAISO');
INSERT INTO cidade VALUES (2201556,22,'BELA VISTA DO PIAUI');
INSERT INTO cidade VALUES (4202131,42,'BELA VISTA DO TOLDO');
INSERT INTO cidade VALUES (2101731,21,'BELAGUA');
INSERT INTO cidade VALUES (2700805,27,'BELEM');
INSERT INTO cidade VALUES (1501402,15,'BELEM');
INSERT INTO cidade VALUES (2501906,25,'BELEM');
INSERT INTO cidade VALUES (2601508,26,'BELEM DE MARIA');
INSERT INTO cidade VALUES (2601607,26,'BELEM DE SAO FRANCISCO');
INSERT INTO cidade VALUES (2502003,25,'BELEM DO BREJO DO CRUZ');
INSERT INTO cidade VALUES (2201572,22,'BELEM DO PIAUI');
INSERT INTO cidade VALUES (3300456,33,'BELFORD ROXO');
INSERT INTO cidade VALUES (3106101,31,'BELMIRO BRAGA');
INSERT INTO cidade VALUES (2903409,29,'BELMONTE');
INSERT INTO cidade VALUES (4202156,42,'BELMONTE');
INSERT INTO cidade VALUES (2903508,29,'BELO CAMPO');
INSERT INTO cidade VALUES (3106200,31,'BELO HORIZONTE');
INSERT INTO cidade VALUES (2601706,26,'BELO JARDIM');
INSERT INTO cidade VALUES (2700904,27,'BELO MONTE');
INSERT INTO cidade VALUES (3106309,31,'BELO ORIENTE');
INSERT INTO cidade VALUES (3106408,31,'BELO VALE');
INSERT INTO cidade VALUES (1501451,15,'BELTERRA');
INSERT INTO cidade VALUES (2201606,22,'BENEDITINOS');
INSERT INTO cidade VALUES (2101806,21,'BENEDITO LEITE');
INSERT INTO cidade VALUES (4202206,42,'BENEDITO NOVO');
INSERT INTO cidade VALUES (1501501,15,'BENEVIDES');
INSERT INTO cidade VALUES (1300607,13,'BENJAMIN CONSTANT');
INSERT INTO cidade VALUES (4302055,43,'BENJAMIN CONSTANT DO SUL');
INSERT INTO cidade VALUES (3506201,35,'BENTO DE ABREU');
INSERT INTO cidade VALUES (2401602,24,'BENTO FERNANDES');
INSERT INTO cidade VALUES (4302105,43,'BENTO GONCALVES');
INSERT INTO cidade VALUES (2101905,21,'BEQUIMAO');
INSERT INTO cidade VALUES (3106507,31,'BERILO');
INSERT INTO cidade VALUES (3106655,31,'BERIZAL');
INSERT INTO cidade VALUES (2502052,25,'BERNARDINO BATISTA');
INSERT INTO cidade VALUES (3506300,35,'BERNARDINO DE CAMPOS');
INSERT INTO cidade VALUES (2101939,21,'BERNARDO DO MEARIM');
INSERT INTO cidade VALUES (1703206,17,'BERNARDO SAYAO');
INSERT INTO cidade VALUES (3506359,35,'BERTIOGA');
INSERT INTO cidade VALUES (2201705,22,'BERTOLINIA');
INSERT INTO cidade VALUES (3106606,31,'BERTOPOLIS');
INSERT INTO cidade VALUES (1300631,13,'BERURI');
INSERT INTO cidade VALUES (2601805,26,'BETANIA');
INSERT INTO cidade VALUES (2201739,22,'BETANIA DO PIAUI');
INSERT INTO cidade VALUES (3106705,31,'BETIM');
INSERT INTO cidade VALUES (2601904,26,'BEZERROS');
INSERT INTO cidade VALUES (3106804,31,'BIAS FORTES');
INSERT INTO cidade VALUES (3106903,31,'BICAS');
INSERT INTO cidade VALUES (4202305,42,'BIGUACU');
INSERT INTO cidade VALUES (3506409,35,'BILAC');
INSERT INTO cidade VALUES (3107000,31,'BIQUINHAS');
INSERT INTO cidade VALUES (3506508,35,'BIRIGUI');
INSERT INTO cidade VALUES (3506607,35,'BIRITIBA-MIRIM');
INSERT INTO cidade VALUES (2903607,29,'BIRITINGA');
INSERT INTO cidade VALUES (4102901,41,'BITURUNA');
INSERT INTO cidade VALUES (4202404,42,'BLUMENAU');
INSERT INTO cidade VALUES (3107109,31,'BOA ESPERANCA');
INSERT INTO cidade VALUES (3201001,32,'BOA ESPERANCA');
INSERT INTO cidade VALUES (4103008,41,'BOA ESPERANCA');
INSERT INTO cidade VALUES (4103024,41,'BOA ESPERANCA DO IGUACU');
INSERT INTO cidade VALUES (3506706,35,'BOA ESPERANCA DO SUL');
INSERT INTO cidade VALUES (2201770,22,'BOA HORA');
INSERT INTO cidade VALUES (2903706,29,'BOA NOVA');
INSERT INTO cidade VALUES (2502102,25,'BOA VENTURA');
INSERT INTO cidade VALUES (4103040,41,'BOA VENTURA DE SAO ROQUE');
INSERT INTO cidade VALUES (2302404,23,'BOA VIAGEM');
INSERT INTO cidade VALUES (1400100,14,'BOA VISTA');
INSERT INTO cidade VALUES (2502151,25,'BOA VISTA');
INSERT INTO cidade VALUES (4103057,41,'BOA VISTA DA APARECIDA');
INSERT INTO cidade VALUES (4302154,43,'BOA VISTA DAS MISSOES');
INSERT INTO cidade VALUES (4302204,43,'BOA VISTA DO BURICA');
INSERT INTO cidade VALUES (4302220,43,'BOA VISTA DO CADEADO');
INSERT INTO cidade VALUES (2101970,21,'BOA VISTA DO GURUPI');
INSERT INTO cidade VALUES (4302238,43,'BOA VISTA DO INCRA');
INSERT INTO cidade VALUES (1300680,13,'BOA VISTA DO RAMOS');
INSERT INTO cidade VALUES (4302253,43,'BOA VISTA DO SUL');
INSERT INTO cidade VALUES (2903805,29,'BOA VISTA DO TUPIM');
INSERT INTO cidade VALUES (2701001,27,'BOCA DA MATA');
INSERT INTO cidade VALUES (1300706,13,'BOCA DO ACRE');
INSERT INTO cidade VALUES (3506805,35,'BOCAINA');
INSERT INTO cidade VALUES (2201804,22,'BOCAINA');
INSERT INTO cidade VALUES (3107208,31,'BOCAINA DE MINAS');
INSERT INTO cidade VALUES (4202438,42,'BOCAINA DO SUL');
INSERT INTO cidade VALUES (3107307,31,'BOCAIUVA');
INSERT INTO cidade VALUES (4103107,41,'BOCAIUVA DO SUL');
INSERT INTO cidade VALUES (2401651,24,'BODO');
INSERT INTO cidade VALUES (2602001,26,'BODOCO');
INSERT INTO cidade VALUES (5002159,50,'BODOQUENA');
INSERT INTO cidade VALUES (3506904,35,'BOFETE');
INSERT INTO cidade VALUES (3507001,35,'BOITUVA');
INSERT INTO cidade VALUES (2602100,26,'BOM CONSELHO');
INSERT INTO cidade VALUES (3107406,31,'BOM DESPACHO');
INSERT INTO cidade VALUES (3300506,33,'BOM JARDIM');
INSERT INTO cidade VALUES (2102002,21,'BOM JARDIM');
INSERT INTO cidade VALUES (2602209,26,'BOM JARDIM');
INSERT INTO cidade VALUES (4202503,42,'BOM JARDIM DA SERRA');
INSERT INTO cidade VALUES (5203401,52,'BOM JARDIM DE GOIAS');
INSERT INTO cidade VALUES (3107505,31,'BOM JARDIM DE MINAS');
INSERT INTO cidade VALUES (2401701,24,'BOM JESUS');
INSERT INTO cidade VALUES (4302303,43,'BOM JESUS');
INSERT INTO cidade VALUES (2502201,25,'BOM JESUS');
INSERT INTO cidade VALUES (4202537,42,'BOM JESUS');
INSERT INTO cidade VALUES (2201903,22,'BOM JESUS');
INSERT INTO cidade VALUES (2903904,29,'BOM JESUS DA LAPA');
INSERT INTO cidade VALUES (3107604,31,'BOM JESUS DA PENHA');
INSERT INTO cidade VALUES (2903953,29,'BOM JESUS DA SERRA');
INSERT INTO cidade VALUES (2102036,21,'BOM JESUS DAS SELVAS');
INSERT INTO cidade VALUES (5203500,52,'BOM JESUS DE GOIAS');
INSERT INTO cidade VALUES (3107703,31,'BOM JESUS DO AMPARO');
INSERT INTO cidade VALUES (5101852,51,'BOM JESUS DO ARAGUAIA');
INSERT INTO cidade VALUES (3107802,31,'BOM JESUS DO GALHO');
INSERT INTO cidade VALUES (3300605,33,'BOM JESUS DO ITABAPOANA');
INSERT INTO cidade VALUES (3201100,32,'BOM JESUS DO NORTE');
INSERT INTO cidade VALUES (4202578,42,'BOM JESUS DO OESTE');
INSERT INTO cidade VALUES (3507100,35,'BOM JESUS DO PERDOES');
INSERT INTO cidade VALUES (4103156,41,'BOM JESUS DO SUL');
INSERT INTO cidade VALUES (1501576,15,'BOM JESUS DO TOCANTINS');
INSERT INTO cidade VALUES (1703305,17,'BOM JESUS DO TOCANTINS');
INSERT INTO cidade VALUES (2102077,21,'BOM LUGAR');
INSERT INTO cidade VALUES (4302352,43,'BOM PRINCIPIO');
INSERT INTO cidade VALUES (2201919,22,'BOM PRINCIPIO DO PIAUI');
INSERT INTO cidade VALUES (4302378,43,'BOM PROGRESSO');
INSERT INTO cidade VALUES (3107901,31,'BOM REPOUSO');
INSERT INTO cidade VALUES (4202602,42,'BOM RETIRO');
INSERT INTO cidade VALUES (4302402,43,'BOM RETIRO DO SUL');
INSERT INTO cidade VALUES (4103206,41,'BOM SUCESSO');
INSERT INTO cidade VALUES (2502300,25,'BOM SUCESSO');
INSERT INTO cidade VALUES (3108008,31,'BOM SUCESSO');
INSERT INTO cidade VALUES (3507159,35,'BOM SUCESSO DE ITARARE');
INSERT INTO cidade VALUES (4103222,41,'BOM SUCESSO DO SUL');
INSERT INTO cidade VALUES (4202453,42,'BOMBINHAS');
INSERT INTO cidade VALUES (1400159,14,'BONFIM');
INSERT INTO cidade VALUES (3108107,31,'BONFIM');
INSERT INTO cidade VALUES (2201929,22,'BONFIM DO PIAUI');
INSERT INTO cidade VALUES (5203559,52,'BONFINOPOLIS');
INSERT INTO cidade VALUES (3108206,31,'BONFINOPOLIS DE MINAS');
INSERT INTO cidade VALUES (2904001,29,'BONINAL');
INSERT INTO cidade VALUES (2904050,29,'BONITO');
INSERT INTO cidade VALUES (2602308,26,'BONITO');
INSERT INTO cidade VALUES (1501600,15,'BONITO');
INSERT INTO cidade VALUES (5002209,50,'BONITO');
INSERT INTO cidade VALUES (3108255,31,'BONITO DE MINAS');
INSERT INTO cidade VALUES (2502409,25,'BONITO DE SANTA FE');
INSERT INTO cidade VALUES (5203575,52,'BONOPOLIS');
INSERT INTO cidade VALUES (2502508,25,'BOQUEIRAO');
INSERT INTO cidade VALUES (4302451,43,'BOQUEIRAO DO LEAO');
INSERT INTO cidade VALUES (2201945,22,'BOQUEIRAO DO PIAUI');
INSERT INTO cidade VALUES (2800670,28,'BOQUIM');
INSERT INTO cidade VALUES (2904100,29,'BOQUIRA');
INSERT INTO cidade VALUES (3507209,35,'BORA');
INSERT INTO cidade VALUES (3507308,35,'BORACEIA');
INSERT INTO cidade VALUES (1300805,13,'BORBA');
INSERT INTO cidade VALUES (2502706,25,'BORBOREMA');
INSERT INTO cidade VALUES (3507407,35,'BORBOREMA');
INSERT INTO cidade VALUES (3108305,31,'BORDA DA MATA');
INSERT INTO cidade VALUES (3507456,35,'BOREBI');
INSERT INTO cidade VALUES (4103305,41,'BORRAZOPOLIS');
INSERT INTO cidade VALUES (4302501,43,'BOSSOROCA');
INSERT INTO cidade VALUES (3108404,31,'BOTELHOS');
INSERT INTO cidade VALUES (3507506,35,'BOTUCATU');
INSERT INTO cidade VALUES (3108503,31,'BOTUMIRIM');
INSERT INTO cidade VALUES (2904209,29,'BOTUPORA');
INSERT INTO cidade VALUES (4202701,42,'BOTUVERA');
INSERT INTO cidade VALUES (4302584,43,'BOZANO');
INSERT INTO cidade VALUES (4202800,42,'BRACO DO NORTE');
INSERT INTO cidade VALUES (4202859,42,'BRACO DO TROMBUDO');
INSERT INTO cidade VALUES (4302600,43,'BRAGA');
INSERT INTO cidade VALUES (1501709,15,'BRAGANCA');
INSERT INTO cidade VALUES (3507605,35,'BRAGANCA PAULISTA');
INSERT INTO cidade VALUES (4103354,41,'BRAGANEY');
INSERT INTO cidade VALUES (2701100,27,'BRANQUINHA');
INSERT INTO cidade VALUES (3108701,31,'BRAS PIRES');
INSERT INTO cidade VALUES (1501725,15,'BRASIL NOVO');
INSERT INTO cidade VALUES (5002308,50,'BRASILANDIA');
INSERT INTO cidade VALUES (3108552,31,'BRASILANDIA DE MINAS');
INSERT INTO cidade VALUES (4103370,41,'BRASILANDIA DO SUL');
INSERT INTO cidade VALUES (1703602,17,'BRASILANDIA DO TOCANTINS');
INSERT INTO cidade VALUES (1200104,12,'BRASILEIA');
INSERT INTO cidade VALUES (2201960,22,'BRASILEIRA');
INSERT INTO cidade VALUES (5300108,53,'BRASILIA');
INSERT INTO cidade VALUES (3108602,31,'BRASILIA DE MINAS');
INSERT INTO cidade VALUES (5101902,51,'BRASNORTE');
INSERT INTO cidade VALUES (3108909,31,'BRASOPOLIS');
INSERT INTO cidade VALUES (3507704,35,'BRAUNA');
INSERT INTO cidade VALUES (3108800,31,'BRAUNAS');
INSERT INTO cidade VALUES (5203609,52,'BRAZABRANTES');
INSERT INTO cidade VALUES (2602407,26,'BREJAO');
INSERT INTO cidade VALUES (3201159,32,'BREJETUBA');
INSERT INTO cidade VALUES (2401800,24,'BREJINHO');
INSERT INTO cidade VALUES (2602506,26,'BREJINHO');
INSERT INTO cidade VALUES (1703701,17,'BREJINHO DE NAZARE');
INSERT INTO cidade VALUES (2102101,21,'BREJO');
INSERT INTO cidade VALUES (3507753,35,'BREJO ALEGRE');
INSERT INTO cidade VALUES (2602605,26,'BREJO DA MADRE DE DEUS');
INSERT INTO cidade VALUES (2102150,21,'BREJO DE AREIA');
INSERT INTO cidade VALUES (2502805,25,'BREJO DO CRUZ');
INSERT INTO cidade VALUES (2201988,22,'BREJO DO PIAUI');
INSERT INTO cidade VALUES (2502904,25,'BREJO DO SANTOS');
INSERT INTO cidade VALUES (2800704,28,'BREJO GRANDE');
INSERT INTO cidade VALUES (1501758,15,'BREJO GRANDE DO ARAGUAIA');
INSERT INTO cidade VALUES (2302503,23,'BREJO SANTO');
INSERT INTO cidade VALUES (2904308,29,'BREJOES');
INSERT INTO cidade VALUES (2904407,29,'BREJOLANDIA');
INSERT INTO cidade VALUES (1501782,15,'BREU BRANCO');
INSERT INTO cidade VALUES (1501808,15,'BREVES');
INSERT INTO cidade VALUES (5203807,52,'BRITANIA');
INSERT INTO cidade VALUES (4302659,43,'BROCHIER');
INSERT INTO cidade VALUES (3507803,35,'BRODOWSKI');
INSERT INTO cidade VALUES (3507902,35,'BROTAS');
INSERT INTO cidade VALUES (2904506,29,'BROTAS DE MACAUBAS');
INSERT INTO cidade VALUES (3109006,31,'BRUMADINHO');
INSERT INTO cidade VALUES (2904605,29,'BRUMADO');
INSERT INTO cidade VALUES (4202875,42,'BRUNOPOLIS');
INSERT INTO cidade VALUES (4202909,42,'BRUSQUE');
INSERT INTO cidade VALUES (3109105,31,'BUENO BRANDAO');
INSERT INTO cidade VALUES (3109204,31,'BUENOPOLIS');
INSERT INTO cidade VALUES (2602704,26,'BUENOS AIRES');
INSERT INTO cidade VALUES (2904704,29,'BUERAREMA');
INSERT INTO cidade VALUES (3109253,31,'BUGRE');
INSERT INTO cidade VALUES (2602803,26,'BUIQUE');
INSERT INTO cidade VALUES (1200138,12,'BUJARI');
INSERT INTO cidade VALUES (1501907,15,'BUJARU');
INSERT INTO cidade VALUES (3508009,35,'BURI');
INSERT INTO cidade VALUES (3508108,35,'BURITAMA');
INSERT INTO cidade VALUES (2102200,21,'BURITI');
INSERT INTO cidade VALUES (5203906,52,'BURITI ALEGRE');
INSERT INTO cidade VALUES (2102309,21,'BURITI BRAVO');
INSERT INTO cidade VALUES (5203939,52,'BURITI DE GOIAS');
INSERT INTO cidade VALUES (2202000,22,'BURITI DO LOPES');
INSERT INTO cidade VALUES (2202026,22,'BURITI DO MONTES');
INSERT INTO cidade VALUES (1703800,17,'BURITI DO TOCANTINS');
INSERT INTO cidade VALUES (2102325,21,'BURITICUPU');
INSERT INTO cidade VALUES (5203962,52,'BURITINOPOLIS');
INSERT INTO cidade VALUES (2904753,29,'BURITIRAMA');
INSERT INTO cidade VALUES (2102358,21,'BURITIRANA');
INSERT INTO cidade VALUES (1100452,11,'BURITIS');
INSERT INTO cidade VALUES (3109303,31,'BURITIS');
INSERT INTO cidade VALUES (3508207,35,'BURITIZAL');
INSERT INTO cidade VALUES (3109402,31,'BURITIZEIRO');
INSERT INTO cidade VALUES (4302709,43,'BUTIA');
INSERT INTO cidade VALUES (1300839,13,'CAAPIRANGA');
INSERT INTO cidade VALUES (2503001,25,'CAAPORA');
INSERT INTO cidade VALUES (5002407,50,'CAARAPO');
INSERT INTO cidade VALUES (2904803,29,'CAATIBA');
INSERT INTO cidade VALUES (2503100,25,'CABACEIRAS');
INSERT INTO cidade VALUES (2904852,29,'CABACEIRAS DO PARAGUACU');
INSERT INTO cidade VALUES (3109451,31,'CABECEIRA GRANDE');
INSERT INTO cidade VALUES (5204003,52,'CABECEIRAS');
INSERT INTO cidade VALUES (2202059,22,'CABECEIRAS DO PIAUI');
INSERT INTO cidade VALUES (2503209,25,'CABEDELO');
INSERT INTO cidade VALUES (1100031,11,'CABIXI');
INSERT INTO cidade VALUES (2602902,26,'CABO DE SANTO AGOSTINHO');
INSERT INTO cidade VALUES (3300704,33,'CABO FRIO');
INSERT INTO cidade VALUES (3109501,31,'CABO VERDE');
INSERT INTO cidade VALUES (3508306,35,'CABRALIA PAULISTA');
INSERT INTO cidade VALUES (3508405,35,'CABREUVA');
INSERT INTO cidade VALUES (2603009,26,'CABROBO');
INSERT INTO cidade VALUES (4203006,42,'CACADOR');
INSERT INTO cidade VALUES (3508504,35,'CACAPAVA');
INSERT INTO cidade VALUES (4302808,43,'CACAPAVA DO SUL');
INSERT INTO cidade VALUES (1100601,11,'CACAULANDIA');
INSERT INTO cidade VALUES (4302907,43,'CACEQUI');
INSERT INTO cidade VALUES (5102504,51,'CACERES');
INSERT INTO cidade VALUES (2904902,29,'CACHOEIRA');
INSERT INTO cidade VALUES (5204102,52,'CACHOEIRA ALTA');
INSERT INTO cidade VALUES (3109600,31,'CACHOEIRA DA PRATA');
INSERT INTO cidade VALUES (5204201,52,'CACHOEIRA DE GOIAS');
INSERT INTO cidade VALUES (3109709,31,'CACHOEIRA DE MINAS');
INSERT INTO cidade VALUES (3102704,31,'CACHOEIRA DE PAJEU');
INSERT INTO cidade VALUES (1502004,15,'CACHOEIRA DO ARARI');
INSERT INTO cidade VALUES (2503308,25,'CACHOEIRA DO INDIOS');
INSERT INTO cidade VALUES (1501956,15,'CACHOEIRA DO PIRIA');
INSERT INTO cidade VALUES (4303004,43,'CACHOEIRA DO SUL');
INSERT INTO cidade VALUES (3109808,31,'CACHOEIRA DOURADA');
INSERT INTO cidade VALUES (5204250,52,'CACHOEIRA DOURADA');
INSERT INTO cidade VALUES (2102374,21,'CACHOEIRA GRANDE');
INSERT INTO cidade VALUES (3508603,35,'CACHOEIRA PAULISTA');
INSERT INTO cidade VALUES (3300803,33,'CACHOEIRAS DE MACACU');
INSERT INTO cidade VALUES (1703826,17,'CACHOEIRINHA');
INSERT INTO cidade VALUES (4303103,43,'CACHOEIRINHA');
INSERT INTO cidade VALUES (2603108,26,'CACHOEIRINHA');
INSERT INTO cidade VALUES (3201209,32,'CACHOEIRO DE ITAPEMIRIM');
INSERT INTO cidade VALUES (2503407,25,'CACIMBA DE AREIA');
INSERT INTO cidade VALUES (2503506,25,'CACIMBA DE DENTRO');
INSERT INTO cidade VALUES (2503555,25,'CACIMBAS');
INSERT INTO cidade VALUES (2701209,27,'CACIMBINHAS');
INSERT INTO cidade VALUES (4303202,43,'CACIQUE DOBLE');
INSERT INTO cidade VALUES (1100049,11,'CACOAL');
INSERT INTO cidade VALUES (3508702,35,'CACONDE');
INSERT INTO cidade VALUES (5204300,52,'CACU');
INSERT INTO cidade VALUES (2905008,29,'CACULE');
INSERT INTO cidade VALUES (2905107,29,'CAEM');
INSERT INTO cidade VALUES (3109907,31,'CAETANOPOLIS');
INSERT INTO cidade VALUES (2905156,29,'CAETANOS');
INSERT INTO cidade VALUES (3110004,31,'CAETE');
INSERT INTO cidade VALUES (2603207,26,'CAETES');
INSERT INTO cidade VALUES (2905206,29,'CAETITE');
INSERT INTO cidade VALUES (2905305,29,'CAFARNAUM');
INSERT INTO cidade VALUES (4103404,41,'CAFEARA');
INSERT INTO cidade VALUES (3508801,35,'CAFELANDIA');
INSERT INTO cidade VALUES (4103453,41,'CAFELANDIA');
INSERT INTO cidade VALUES (4103479,41,'CAFEZAL DO SUL');
INSERT INTO cidade VALUES (3508900,35,'CAIABU');
INSERT INTO cidade VALUES (3110103,31,'CAIANA');
INSERT INTO cidade VALUES (5204409,52,'CAIAPONIA');
INSERT INTO cidade VALUES (4303301,43,'CAIBATE');
INSERT INTO cidade VALUES (4203105,42,'CAIBI');
INSERT INTO cidade VALUES (4303400,43,'CAICARA');
INSERT INTO cidade VALUES (2503605,25,'CAICARA');
INSERT INTO cidade VALUES (2401859,24,'CAICARA DO NORTE');
INSERT INTO cidade VALUES (2401909,24,'CAICARA DO RIO DO VENTO');
INSERT INTO cidade VALUES (2402006,24,'CAICO');
INSERT INTO cidade VALUES (3509007,35,'CAIEIRAS');
INSERT INTO cidade VALUES (2905404,29,'CAIRU');
INSERT INTO cidade VALUES (3509106,35,'CAIUA');
INSERT INTO cidade VALUES (3509205,35,'CAJAMAR');
INSERT INTO cidade VALUES (2102408,21,'CAJAPIO');
INSERT INTO cidade VALUES (2102507,21,'CAJARI');
INSERT INTO cidade VALUES (3509254,35,'CAJATI');
INSERT INTO cidade VALUES (2503704,25,'CAJAZEIRAS');
INSERT INTO cidade VALUES (2202075,22,'CAJAZEIRAS DO PIAUI');
INSERT INTO cidade VALUES (2503753,25,'CAJAZEIRINHAS');
INSERT INTO cidade VALUES (3509304,35,'CAJOBI');
INSERT INTO cidade VALUES (2701308,27,'CAJUEIRO');
INSERT INTO cidade VALUES (2202083,22,'CAJUEIRO DA PRAIA');
INSERT INTO cidade VALUES (3110202,31,'CAJURI');
INSERT INTO cidade VALUES (3509403,35,'CAJURU');
INSERT INTO cidade VALUES (2603306,26,'CALCADO');
INSERT INTO cidade VALUES (1600204,16,'CALCOENE');
INSERT INTO cidade VALUES (3110301,31,'CALDAS');
INSERT INTO cidade VALUES (2503803,25,'CALDAS BRANDAO');
INSERT INTO cidade VALUES (5204508,52,'CALDAS NOVAS');
INSERT INTO cidade VALUES (5204557,52,'CALDAZINHA');
INSERT INTO cidade VALUES (2905503,29,'CALDEIRAO GRANDE');
INSERT INTO cidade VALUES (2202091,22,'CALDEIRAO GRANDE DO PIAUI');
INSERT INTO cidade VALUES (4103503,41,'CALIFORNIA');
INSERT INTO cidade VALUES (4203154,42,'CALMON');
INSERT INTO cidade VALUES (2603405,26,'CALUMBI');
INSERT INTO cidade VALUES (2905602,29,'CAMACAN');
INSERT INTO cidade VALUES (2905701,29,'CAMACARI');
INSERT INTO cidade VALUES (3110400,31,'CAMACHO');
INSERT INTO cidade VALUES (2503902,25,'CAMALAU');
INSERT INTO cidade VALUES (2905800,29,'CAMAMU');
INSERT INTO cidade VALUES (3110509,31,'CAMANDUCAIA');
INSERT INTO cidade VALUES (5002605,50,'CAMAPUA');
INSERT INTO cidade VALUES (4303509,43,'CAMAQUA');
INSERT INTO cidade VALUES (2603454,26,'CAMARAGIBE');
INSERT INTO cidade VALUES (4303558,43,'CAMARGO');
INSERT INTO cidade VALUES (4103602,41,'CAMBARA');
INSERT INTO cidade VALUES (4303608,43,'CAMBARA DO SUL');
INSERT INTO cidade VALUES (4103701,41,'CAMBE');
INSERT INTO cidade VALUES (4103800,41,'CAMBIRA');
INSERT INTO cidade VALUES (4203204,42,'CAMBORIU');
INSERT INTO cidade VALUES (3300902,33,'CAMBUCI');
INSERT INTO cidade VALUES (3110608,31,'CAMBUI');
INSERT INTO cidade VALUES (3110707,31,'CAMBUQUIRA');
INSERT INTO cidade VALUES (1502103,15,'CAMETA');
INSERT INTO cidade VALUES (2302602,23,'CAMOCIM');
INSERT INTO cidade VALUES (2603504,26,'CAMOCIM DE SAO FELIX');
INSERT INTO cidade VALUES (3110806,31,'CAMPANARIO');
INSERT INTO cidade VALUES (3110905,31,'CAMPANHA');
INSERT INTO cidade VALUES (3111002,31,'CAMPESTRE');
INSERT INTO cidade VALUES (2701357,27,'CAMPESTRE');
INSERT INTO cidade VALUES (4303673,43,'CAMPESTRE DA SERRA');
INSERT INTO cidade VALUES (5204607,52,'CAMPESTRE DE GOIAS');
INSERT INTO cidade VALUES (2102556,21,'CAMPESTRE DO MARANHAO');
INSERT INTO cidade VALUES (4103909,41,'CAMPINA DA LAGOA');
INSERT INTO cidade VALUES (4303707,43,'CAMPINA DAS MISSOES');
INSERT INTO cidade VALUES (3509452,35,'CAMPINA DO MONTE ALEGRE');
INSERT INTO cidade VALUES (4103958,41,'CAMPINA DO SIMAO');
INSERT INTO cidade VALUES (2504009,25,'CAMPINA GRANDE');
INSERT INTO cidade VALUES (4104006,41,'CAMPINA GRANDE DO SUL');
INSERT INTO cidade VALUES (3111101,31,'CAMPINA VERDE');
INSERT INTO cidade VALUES (5204656,52,'CAMPINACU');
INSERT INTO cidade VALUES (5102603,51,'CAMPINAPOLIS');
INSERT INTO cidade VALUES (3509502,35,'CAMPINAS');
INSERT INTO cidade VALUES (2202109,22,'CAMPINAS DO PIAUI');
INSERT INTO cidade VALUES (4303806,43,'CAMPINAS DO SUL');
INSERT INTO cidade VALUES (5204706,52,'CAMPINORTE');
INSERT INTO cidade VALUES (2701407,27,'CAMPO ALEGRE');
INSERT INTO cidade VALUES (4203303,42,'CAMPO ALEGRE');
INSERT INTO cidade VALUES (5204805,52,'CAMPO ALEGRE DE GOIAS');
INSERT INTO cidade VALUES (2905909,29,'CAMPO ALEGRE DE LOURDES');
INSERT INTO cidade VALUES (2202117,22,'CAMPO ALEGRE DO FIDALGO');
INSERT INTO cidade VALUES (3111150,31,'CAMPO AZUL');
INSERT INTO cidade VALUES (3111200,31,'CAMPO BELO');
INSERT INTO cidade VALUES (4203402,42,'CAMPO BELO DO SUL');
INSERT INTO cidade VALUES (4303905,43,'CAMPO BOM');
INSERT INTO cidade VALUES (4104055,41,'CAMPO BONITO');
INSERT INTO cidade VALUES (2516409,25,'CAMPO DE SANTANA');
INSERT INTO cidade VALUES (2801009,28,'CAMPO DO BRITO');
INSERT INTO cidade VALUES (3111309,31,'CAMPO DO MEIO');
INSERT INTO cidade VALUES (4104105,41,'CAMPO DO TENENTE');
INSERT INTO cidade VALUES (4203501,42,'CAMPO ERE');
INSERT INTO cidade VALUES (3111408,31,'CAMPO FLORIDO');
INSERT INTO cidade VALUES (2906006,29,'CAMPO FORMOSO');
INSERT INTO cidade VALUES (5002704,50,'CAMPO GRANDE');
INSERT INTO cidade VALUES (2701506,27,'CAMPO GRANDE');
INSERT INTO cidade VALUES (2202133,22,'CAMPO GRANDE DO PIAUI');
INSERT INTO cidade VALUES (4104204,41,'CAMPO LARGO');
INSERT INTO cidade VALUES (2202174,22,'CAMPO LARGO DO PIAUI');
INSERT INTO cidade VALUES (5204854,52,'CAMPO LIMPO DE GOIAS');
INSERT INTO cidade VALUES (3509601,35,'CAMPO LIMPO PAULISTA');
INSERT INTO cidade VALUES (4104253,41,'CAMPO MAGRO');
INSERT INTO cidade VALUES (2202208,22,'CAMPO MAIOR');
INSERT INTO cidade VALUES (4104303,41,'CAMPO MOURAO');
INSERT INTO cidade VALUES (4304002,43,'CAMPO NOVO');
INSERT INTO cidade VALUES (1100700,11,'CAMPO NOVO DE RONDONIA');
INSERT INTO cidade VALUES (5102637,51,'CAMPO NOVO DO PARECIS');
INSERT INTO cidade VALUES (2402105,24,'CAMPO REDONDO');
INSERT INTO cidade VALUES (5102678,51,'CAMPO VERDE');
INSERT INTO cidade VALUES (3111507,31,'CAMPOS ALTOS');
INSERT INTO cidade VALUES (5204904,52,'CAMPOS BELOS');
INSERT INTO cidade VALUES (4304101,43,'CAMPOS BORGES');
INSERT INTO cidade VALUES (5102686,51,'CAMPOS DE JULIO');
INSERT INTO cidade VALUES (3301009,33,'CAMPOS DO GOYTACAZES');
INSERT INTO cidade VALUES (3509700,35,'CAMPOS DO JORDAO');
INSERT INTO cidade VALUES (3111606,31,'CAMPOS GERAIS');
INSERT INTO cidade VALUES (1703842,17,'CAMPOS LINDOS');
INSERT INTO cidade VALUES (4203600,42,'CAMPOS NOVOS');
INSERT INTO cidade VALUES (3509809,35,'CAMPOS NOVOS PAULISTA');
INSERT INTO cidade VALUES (2302701,23,'CAMPOS SALES');
INSERT INTO cidade VALUES (5204953,52,'CAMPOS VERDES');
INSERT INTO cidade VALUES (2603603,26,'CAMUTANGA');
INSERT INTO cidade VALUES (3111903,31,'CANA VERDE');
INSERT INTO cidade VALUES (3111705,31,'CANAA');
INSERT INTO cidade VALUES (1502152,15,'CANAA DO CARAJAS');
INSERT INTO cidade VALUES (5102694,51,'CANABRAVA DO NORTE');
INSERT INTO cidade VALUES (3509908,35,'CANANEIA');
INSERT INTO cidade VALUES (2701605,27,'CANAPI');
INSERT INTO cidade VALUES (3111804,31,'CANAPOLIS');
INSERT INTO cidade VALUES (2906105,29,'CANAPOLIS');
INSERT INTO cidade VALUES (2906204,29,'CANARANA');
INSERT INTO cidade VALUES (5102702,51,'CANARANA');
INSERT INTO cidade VALUES (3509957,35,'CANAS');
INSERT INTO cidade VALUES (2202251,22,'CANAVIEIRA');
INSERT INTO cidade VALUES (2906303,29,'CANAVIEIRAS');
INSERT INTO cidade VALUES (2906402,29,'CANDEAL');
INSERT INTO cidade VALUES (3112000,31,'CANDEIAS');
INSERT INTO cidade VALUES (2906501,29,'CANDEIAS');
INSERT INTO cidade VALUES (1100809,11,'CANDEIAS DO JAMARI');
INSERT INTO cidade VALUES (4304200,43,'CANDELARIA');
INSERT INTO cidade VALUES (2906600,29,'CANDIBA');
INSERT INTO cidade VALUES (4104402,41,'CANDIDO DE ABREU');
INSERT INTO cidade VALUES (4304309,43,'CANDIDO GODOI');
INSERT INTO cidade VALUES (2102606,21,'CANDIDO MENDES');
INSERT INTO cidade VALUES (3510005,35,'CANDIDO MOTA');
INSERT INTO cidade VALUES (3510104,35,'CANDIDO RODRIGUES');
INSERT INTO cidade VALUES (2906709,29,'CANDIDO SALES');
INSERT INTO cidade VALUES (4304358,43,'CANDIOTA');
INSERT INTO cidade VALUES (4104428,41,'CANDOI');
INSERT INTO cidade VALUES (4304408,43,'CANELA');
INSERT INTO cidade VALUES (4203709,42,'CANELINHA');
INSERT INTO cidade VALUES (2402204,24,'CANGUARETAMA');
INSERT INTO cidade VALUES (4304507,43,'CANGUCU');
INSERT INTO cidade VALUES (2801108,28,'CANHOBA');
INSERT INTO cidade VALUES (2603702,26,'CANHOTINHO');
INSERT INTO cidade VALUES (2302800,23,'CANINDE');
INSERT INTO cidade VALUES (2801207,28,'CANINDE DE SAO FRANCISCO');
INSERT INTO cidade VALUES (3510153,35,'CANITAR');
INSERT INTO cidade VALUES (4304606,43,'CANOAS');
INSERT INTO cidade VALUES (4203808,42,'CANOINHAS');
INSERT INTO cidade VALUES (2906808,29,'CANSANCAO');
INSERT INTO cidade VALUES (1400175,14,'CANTA');
INSERT INTO cidade VALUES (4104451,41,'CANTAGALO');
INSERT INTO cidade VALUES (3301108,33,'CANTAGALO');
INSERT INTO cidade VALUES (3112059,31,'CANTAGALO');
INSERT INTO cidade VALUES (2102705,21,'CANTANHEDE');
INSERT INTO cidade VALUES (2202307,22,'CANTO DO BURITI');
INSERT INTO cidade VALUES (2906824,29,'CANUDOS');
INSERT INTO cidade VALUES (4304614,43,'CANUDOS DO VALE');
INSERT INTO cidade VALUES (1300904,13,'CANUTAMA');
INSERT INTO cidade VALUES (4104501,41,'CAPANEMA');
INSERT INTO cidade VALUES (1502202,15,'CAPANEMA');
INSERT INTO cidade VALUES (4203253,42,'CAPAO ALTO');
INSERT INTO cidade VALUES (3510203,35,'CAPAO BONITO');
INSERT INTO cidade VALUES (4304622,43,'CAPAO BONITO DO SUL');
INSERT INTO cidade VALUES (4304630,43,'CAPAO DA CANOA');
INSERT INTO cidade VALUES (4304655,43,'CAPAO DO CIPO');
INSERT INTO cidade VALUES (4304663,43,'CAPAO DO LEAO');
INSERT INTO cidade VALUES (3112109,31,'CAPARAO');
INSERT INTO cidade VALUES (2801306,28,'CAPELA');
INSERT INTO cidade VALUES (2701704,27,'CAPELA');
INSERT INTO cidade VALUES (4304689,43,'CAPELA DE SANTANA');
INSERT INTO cidade VALUES (3510302,35,'CAPELA DO ALTO');
INSERT INTO cidade VALUES (2906857,29,'CAPELA DO ALTO ALEGRE');
INSERT INTO cidade VALUES (3112208,31,'CAPELA NOVA');
INSERT INTO cidade VALUES (3112307,31,'CAPELINHA');
INSERT INTO cidade VALUES (3112406,31,'CAPETINGA');
INSERT INTO cidade VALUES (2504033,25,'CAPIM');
INSERT INTO cidade VALUES (3112505,31,'CAPIM BRANCO');
INSERT INTO cidade VALUES (2906873,29,'CAPIM GROSSO');
INSERT INTO cidade VALUES (3112604,31,'CAPINOPOLIS');
INSERT INTO cidade VALUES (4203907,42,'CAPINZAL');
INSERT INTO cidade VALUES (2102754,21,'CAPINZAL DO NORTE');
INSERT INTO cidade VALUES (2302909,23,'CAPISTRANO');
INSERT INTO cidade VALUES (4304697,43,'CAPITAO');
INSERT INTO cidade VALUES (3112653,31,'CAPITAO ANDRADE');
INSERT INTO cidade VALUES (2202406,22,'CAPITAO DE CAMPOS');
INSERT INTO cidade VALUES (3112703,31,'CAPITAO ENEAS');
INSERT INTO cidade VALUES (2202455,22,'CAPITAO GERVASIO OLIVEIRA');
INSERT INTO cidade VALUES (4104600,41,'CAPITAO LEONIDAS MARQUES');
INSERT INTO cidade VALUES (1502301,15,'CAPITAO POCO');
INSERT INTO cidade VALUES (3112802,31,'CAPITOLIO');
INSERT INTO cidade VALUES (3510401,35,'CAPIVARI');
INSERT INTO cidade VALUES (4203956,42,'CAPIVARI DE BAIXO');
INSERT INTO cidade VALUES (4304671,43,'CAPIVARI DO SUL');
INSERT INTO cidade VALUES (1200179,12,'CAPIXABA');
INSERT INTO cidade VALUES (2603801,26,'CAPOEIRAS');
INSERT INTO cidade VALUES (3112901,31,'CAPUTIRA');
INSERT INTO cidade VALUES (4304713,43,'CARAA');
INSERT INTO cidade VALUES (1400209,14,'CARACARAI');
INSERT INTO cidade VALUES (2202505,22,'CARACOL');
INSERT INTO cidade VALUES (5002803,50,'CARACOL');
INSERT INTO cidade VALUES (3510500,35,'CARAGUATATUBA');
INSERT INTO cidade VALUES (3113008,31,'CARAI');
INSERT INTO cidade VALUES (2906899,29,'CARAIBAS');
INSERT INTO cidade VALUES (4104659,41,'CARAMBEI');
INSERT INTO cidade VALUES (3113107,31,'CARANAIBA');
INSERT INTO cidade VALUES (3113206,31,'CARANDAI');
INSERT INTO cidade VALUES (3113305,31,'CARANGOLA');
INSERT INTO cidade VALUES (3300936,33,'CARAPEBUS');
INSERT INTO cidade VALUES (3510609,35,'CARAPICUIBA');
INSERT INTO cidade VALUES (3113404,31,'CARATINGA');
INSERT INTO cidade VALUES (1301001,13,'CARAUARI');
INSERT INTO cidade VALUES (2402303,24,'CARAUBAS');
INSERT INTO cidade VALUES (2504074,25,'CARAUBAS');
INSERT INTO cidade VALUES (2202539,22,'CARAUBAS DO PIAUI');
INSERT INTO cidade VALUES (2906907,29,'CARAVELAS');
INSERT INTO cidade VALUES (4304705,43,'CARAZINHO');
INSERT INTO cidade VALUES (3113503,31,'CARBONITA');
INSERT INTO cidade VALUES (2907004,29,'CARDEAL DA SILVA');
INSERT INTO cidade VALUES (3510708,35,'CARDOSO');
INSERT INTO cidade VALUES (3301157,33,'CARDOSO MOREIRA');
INSERT INTO cidade VALUES (3113602,31,'CAREACU');
INSERT INTO cidade VALUES (1301100,13,'CAREIRO');
INSERT INTO cidade VALUES (1301159,13,'CAREIRO DA VARZEA');
INSERT INTO cidade VALUES (3201308,32,'CARIACICA');
INSERT INTO cidade VALUES (2303006,23,'CARIDADE');
INSERT INTO cidade VALUES (2202554,22,'CARIDADE DO PIAUI');
INSERT INTO cidade VALUES (2907103,29,'CARINHANHA');
INSERT INTO cidade VALUES (2801405,28,'CARIRA');
INSERT INTO cidade VALUES (2303105,23,'CARIRE');
INSERT INTO cidade VALUES (1703867,17,'CARIRI DO TOCANTINS');
INSERT INTO cidade VALUES (2303204,23,'CARIRIACU');
INSERT INTO cidade VALUES (2303303,23,'CARIUS');
INSERT INTO cidade VALUES (5102793,51,'CARLINDA');
INSERT INTO cidade VALUES (4104709,41,'CARLOPOLIS');
INSERT INTO cidade VALUES (4304804,43,'CARLOS BARBOSA');
INSERT INTO cidade VALUES (3113701,31,'CARLOS CHAGAS');
INSERT INTO cidade VALUES (4304853,43,'CARLOS GOMES');
INSERT INTO cidade VALUES (3113800,31,'CARMESIA');
INSERT INTO cidade VALUES (3301207,33,'CARMO');
INSERT INTO cidade VALUES (3113909,31,'CARMO DA CACHOEIRA');
INSERT INTO cidade VALUES (3114006,31,'CARMO DA MATA');
INSERT INTO cidade VALUES (3114105,31,'CARMO DE MINAS');
INSERT INTO cidade VALUES (3114204,31,'CARMO DO CAJURU');
INSERT INTO cidade VALUES (3114303,31,'CARMO DO PARANAIBA');
INSERT INTO cidade VALUES (3114402,31,'CARMO DO RIO CLARO');
INSERT INTO cidade VALUES (5205000,52,'CARMO DO RIO VERDE');
INSERT INTO cidade VALUES (1703883,17,'CARMOLANDIA');
INSERT INTO cidade VALUES (2801504,28,'CARMOPOLIS');
INSERT INTO cidade VALUES (3114501,31,'CARMOPOLIS DE MINAS');
INSERT INTO cidade VALUES (2603900,26,'CARNAIBA');
INSERT INTO cidade VALUES (2402402,24,'CARNAUBA DO DANTAS');
INSERT INTO cidade VALUES (2402501,24,'CARNAUBAIS');
INSERT INTO cidade VALUES (2303402,23,'CARNAUBAL');
INSERT INTO cidade VALUES (2603926,26,'CARNAUBEIRA DA PENHA');
INSERT INTO cidade VALUES (3114550,31,'CARNEIRINHO');
INSERT INTO cidade VALUES (2701803,27,'CARNEIROS');
INSERT INTO cidade VALUES (1400233,14,'CAROEBE');
INSERT INTO cidade VALUES (2102804,21,'CAROLINA');
INSERT INTO cidade VALUES (2604007,26,'CARPINA');
INSERT INTO cidade VALUES (3114600,31,'CARRANCAS');
INSERT INTO cidade VALUES (2504108,25,'CARRAPATEIRA');
INSERT INTO cidade VALUES (1703891,17,'CARRASCO BONITO');
INSERT INTO cidade VALUES (2604106,26,'CARUARU');
INSERT INTO cidade VALUES (2102903,21,'CARUTAPERA');
INSERT INTO cidade VALUES (3114709,31,'CARVALHOPOLIS');
INSERT INTO cidade VALUES (3114808,31,'CARVALHOS');
INSERT INTO cidade VALUES (3510807,35,'CASA BRANCA');
INSERT INTO cidade VALUES (3114907,31,'CASA GRANDE');
INSERT INTO cidade VALUES (2907202,29,'CASA NOVA');
INSERT INTO cidade VALUES (4304903,43,'CASCA');
INSERT INTO cidade VALUES (3115003,31,'CASCALHO RICO');
INSERT INTO cidade VALUES (2303501,23,'CASCAVEL');
INSERT INTO cidade VALUES (4104808,41,'CASCAVEL');
INSERT INTO cidade VALUES (1703909,17,'CASEARA');
INSERT INTO cidade VALUES (4304952,43,'CASEIROS');
INSERT INTO cidade VALUES (3301306,33,'CASIMIRO DE ABREU');
INSERT INTO cidade VALUES (2604155,26,'CASINHAS');
INSERT INTO cidade VALUES (2504157,25,'CASSERENGUE');
INSERT INTO cidade VALUES (3115102,31,'CASSIA');
INSERT INTO cidade VALUES (3510906,35,'CASSIA DO COQUEIROS');
INSERT INTO cidade VALUES (5002902,50,'CASSILANDIA');
INSERT INTO cidade VALUES (1502400,15,'CASTANHAL');
INSERT INTO cidade VALUES (5102850,51,'CASTANHEIRA');
INSERT INTO cidade VALUES (1100908,11,'CASTANHEIRAS');
INSERT INTO cidade VALUES (5205059,52,'CASTELANDIA');
INSERT INTO cidade VALUES (3201407,32,'CASTELO');
INSERT INTO cidade VALUES (2202604,22,'CASTELO DO PIAUI');
INSERT INTO cidade VALUES (3511003,35,'CASTILHO');
INSERT INTO cidade VALUES (4104907,41,'CASTRO');
INSERT INTO cidade VALUES (2907301,29,'CASTRO ALVES');
INSERT INTO cidade VALUES (3115300,31,'CATAGUASES');
INSERT INTO cidade VALUES (5205109,52,'CATALAO');
INSERT INTO cidade VALUES (3511102,35,'CATANDUVA');
INSERT INTO cidade VALUES (4105003,41,'CATANDUVAS');
INSERT INTO cidade VALUES (4204004,42,'CATANDUVAS');
INSERT INTO cidade VALUES (2303600,23,'CATARINA');
INSERT INTO cidade VALUES (3115359,31,'CATAS ALTAS');
INSERT INTO cidade VALUES (3115409,31,'CATAS ALTAS DA NORUEGA');
INSERT INTO cidade VALUES (2604205,26,'CATENDE');
INSERT INTO cidade VALUES (3511201,35,'CATIGUA');
INSERT INTO cidade VALUES (2504207,25,'CATINGUEIRA');
INSERT INTO cidade VALUES (2907400,29,'CATOLANDIA');
INSERT INTO cidade VALUES (2504306,25,'CATOLE DO ROCHA');
INSERT INTO cidade VALUES (2907509,29,'CATU');
INSERT INTO cidade VALUES (4305009,43,'CATUIPE');
INSERT INTO cidade VALUES (3115458,31,'CATUJI');
INSERT INTO cidade VALUES (2303659,23,'CATUNDA');
INSERT INTO cidade VALUES (5205208,52,'CATURAI');
INSERT INTO cidade VALUES (2907558,29,'CATURAMA');
INSERT INTO cidade VALUES (2504355,25,'CATURITE');
INSERT INTO cidade VALUES (3115474,31,'CATUTI');
INSERT INTO cidade VALUES (2303709,23,'CAUCAIA');
INSERT INTO cidade VALUES (5205307,52,'CAVALCANTE');
INSERT INTO cidade VALUES (3115508,31,'CAXAMBU');
INSERT INTO cidade VALUES (4204103,42,'CAXAMBU DO SUL');
INSERT INTO cidade VALUES (2103000,21,'CAXIAS');
INSERT INTO cidade VALUES (4305108,43,'CAXIAS DO SUL');
INSERT INTO cidade VALUES (2202653,22,'CAXINGO');
INSERT INTO cidade VALUES (2402600,24,'CEARA-MIRIM');
INSERT INTO cidade VALUES (2103109,21,'CEDRAL');
INSERT INTO cidade VALUES (3511300,35,'CEDRAL');
INSERT INTO cidade VALUES (2303808,23,'CEDRO');
INSERT INTO cidade VALUES (2604304,26,'CEDRO');
INSERT INTO cidade VALUES (2801603,28,'CEDRO DE SAO JOAO');
INSERT INTO cidade VALUES (3115607,31,'CEDRO DO ABAETE');
INSERT INTO cidade VALUES (4204152,42,'CELSO RAMOS');
INSERT INTO cidade VALUES (4305116,43,'CENTENARIO');
INSERT INTO cidade VALUES (1704105,17,'CENTENARIO');
INSERT INTO cidade VALUES (4105102,41,'CENTENARIO DO SUL');
INSERT INTO cidade VALUES (2907608,29,'CENTRAL');
INSERT INTO cidade VALUES (3115706,31,'CENTRAL DE MINAS');
INSERT INTO cidade VALUES (2103125,21,'CENTRAL DO MARANHAO');
INSERT INTO cidade VALUES (3115805,31,'CENTRALINA');
INSERT INTO cidade VALUES (2103158,21,'CENTRO DO GUILHERME');
INSERT INTO cidade VALUES (2103174,21,'CENTRO NOVO DO MARANHAO');
INSERT INTO cidade VALUES (1100056,11,'CEREJEIRAS');
INSERT INTO cidade VALUES (5205406,52,'CERES');
INSERT INTO cidade VALUES (3511409,35,'CERQUEIRA CESAR');
INSERT INTO cidade VALUES (3511508,35,'CERQUILHO');
INSERT INTO cidade VALUES (4305124,43,'CERRITO');
INSERT INTO cidade VALUES (4105201,41,'CERRO AZUL');
INSERT INTO cidade VALUES (4305132,43,'CERRO BRANCO');
INSERT INTO cidade VALUES (2402709,24,'CERRO CORA');
INSERT INTO cidade VALUES (4305157,43,'CERRO GRANDE');
INSERT INTO cidade VALUES (4305173,43,'CERRO GRANDE DO SUL');
INSERT INTO cidade VALUES (4305207,43,'CERRO LARGO');
INSERT INTO cidade VALUES (4204178,42,'CERRO NEGRO');
INSERT INTO cidade VALUES (3511607,35,'CESARIO LANGE');
INSERT INTO cidade VALUES (4105300,41,'CEU AZUL');
INSERT INTO cidade VALUES (5205455,52,'CEZARINA');
INSERT INTO cidade VALUES (2604403,26,'CHA DE ALEGRIA');
INSERT INTO cidade VALUES (2604502,26,'CHA GRANDE');
INSERT INTO cidade VALUES (2701902,27,'CHA PRETA');
INSERT INTO cidade VALUES (3115904,31,'CHACARA');
INSERT INTO cidade VALUES (3116001,31,'CHALE');
INSERT INTO cidade VALUES (4305306,43,'CHAPADA');
INSERT INTO cidade VALUES (1705102,17,'CHAPADA DA NATIVIDADE');
INSERT INTO cidade VALUES (1704600,17,'CHAPADA DE AREIA');
INSERT INTO cidade VALUES (5103007,51,'CHAPADA DO GUIMARAES');
INSERT INTO cidade VALUES (3116100,31,'CHAPADA DO NORTE');
INSERT INTO cidade VALUES (3116159,31,'CHAPADA GAUCHA');
INSERT INTO cidade VALUES (5205471,52,'CHAPADAO DO CEU');
INSERT INTO cidade VALUES (4204194,42,'CHAPADAO DO LAGEADO');
INSERT INTO cidade VALUES (5002951,50,'CHAPADAO DO SUL');
INSERT INTO cidade VALUES (2103208,21,'CHAPADINHA');
INSERT INTO cidade VALUES (4204202,42,'CHAPECO');
INSERT INTO cidade VALUES (3511706,35,'CHARQUEADA');
INSERT INTO cidade VALUES (4305355,43,'CHARQUEADAS');
INSERT INTO cidade VALUES (4305371,43,'CHARRUA');
INSERT INTO cidade VALUES (2303907,23,'CHAVAL');
INSERT INTO cidade VALUES (3557204,35,'CHAVANTES');
INSERT INTO cidade VALUES (1502509,15,'CHAVES');
INSERT INTO cidade VALUES (3116209,31,'CHIADOR');
INSERT INTO cidade VALUES (4305405,43,'CHIAPETA');
INSERT INTO cidade VALUES (4105409,41,'CHOPINZINHO');
INSERT INTO cidade VALUES (2303931,23,'CHORO');
INSERT INTO cidade VALUES (2303956,23,'CHOROZINHO');
INSERT INTO cidade VALUES (2907707,29,'CHORROCHO');
INSERT INTO cidade VALUES (4305439,43,'CHUI');
INSERT INTO cidade VALUES (1100924,11,'CHUPINGUAIA');
INSERT INTO cidade VALUES (4305447,43,'CHUVISCA');
INSERT INTO cidade VALUES (4105508,41,'CIANORTE');
INSERT INTO cidade VALUES (2907806,29,'CICERO DANTAS');
INSERT INTO cidade VALUES (4105607,41,'CIDADE GAUCHA');
INSERT INTO cidade VALUES (5205497,52,'CIDADE OCIDENTAL');
INSERT INTO cidade VALUES (2103257,21,'CIDELANDIA');
INSERT INTO cidade VALUES (4305454,43,'CIDREIRA');
INSERT INTO cidade VALUES (2907905,29,'CIPO');
INSERT INTO cidade VALUES (3116308,31,'CIPOTANEA');
INSERT INTO cidade VALUES (4305504,43,'CIRIACO');
INSERT INTO cidade VALUES (3116407,31,'CLARAVAL');
INSERT INTO cidade VALUES (3116506,31,'CLARO DO POCOES');
INSERT INTO cidade VALUES (5103056,51,'CLAUDIA');
INSERT INTO cidade VALUES (3116605,31,'CLAUDIO');
INSERT INTO cidade VALUES (3511904,35,'CLEMENTINA');
INSERT INTO cidade VALUES (4105706,41,'CLEVELANDIA');
INSERT INTO cidade VALUES (2908002,29,'COARACI');
INSERT INTO cidade VALUES (1301209,13,'COARI');
INSERT INTO cidade VALUES (2202703,22,'COCAL');
INSERT INTO cidade VALUES (2202711,22,'COCAL DE TELHA');
INSERT INTO cidade VALUES (2202729,22,'COCAL DO ALVES');
INSERT INTO cidade VALUES (4204251,42,'COCAL DO SUL');
INSERT INTO cidade VALUES (5103106,51,'COCALINHO');
INSERT INTO cidade VALUES (5205513,52,'COCALZINHO DE GOIAS');
INSERT INTO cidade VALUES (2908101,29,'COCOS');
INSERT INTO cidade VALUES (1301308,13,'CODAJAS');
INSERT INTO cidade VALUES (2103307,21,'CODO');
INSERT INTO cidade VALUES (2103406,21,'COELHO NETO');
INSERT INTO cidade VALUES (3116704,31,'COIMBRA');
INSERT INTO cidade VALUES (2702009,27,'COITE DO NOIA');
INSERT INTO cidade VALUES (2202737,22,'COIVARAS');
INSERT INTO cidade VALUES (1502608,15,'COLARES');
INSERT INTO cidade VALUES (3201506,32,'COLATINA');
INSERT INTO cidade VALUES (5103205,51,'COLIDER');
INSERT INTO cidade VALUES (3512001,35,'COLINA');
INSERT INTO cidade VALUES (4305587,43,'COLINAS');
INSERT INTO cidade VALUES (2103505,21,'COLINAS');
INSERT INTO cidade VALUES (5205521,52,'COLINAS DO SUL');
INSERT INTO cidade VALUES (1705508,17,'COLINAS DO TOCANTINS');
INSERT INTO cidade VALUES (1716703,17,'COLMEIA');
INSERT INTO cidade VALUES (5103254,51,'COLNIZA');
INSERT INTO cidade VALUES (3512100,35,'COLOMBIA');
INSERT INTO cidade VALUES (4105805,41,'COLOMBO');
INSERT INTO cidade VALUES (2202752,22,'COLONIA DO GURGUEIA');
INSERT INTO cidade VALUES (2202778,22,'COLONIA DO PIAUI');
INSERT INTO cidade VALUES (2702108,27,'COLONIA LEOPOLDINA');
INSERT INTO cidade VALUES (4105904,41,'COLORADO');
INSERT INTO cidade VALUES (4305603,43,'COLORADO');
INSERT INTO cidade VALUES (1100064,11,'COLORADO DO OESTE');
INSERT INTO cidade VALUES (3116803,31,'COLUNA');
INSERT INTO cidade VALUES (1705557,17,'COMBINADO');
INSERT INTO cidade VALUES (3116902,31,'COMENDADOR GOMES');
INSERT INTO cidade VALUES (3300951,33,'COMENDADOR LEVY GASPARIAN');
INSERT INTO cidade VALUES (3117009,31,'COMERCINHO');
INSERT INTO cidade VALUES (5103304,51,'COMODORO');
INSERT INTO cidade VALUES (2504405,25,'CONCEICAO');
INSERT INTO cidade VALUES (3117108,31,'CONCEICAO DA APARECIDA');
INSERT INTO cidade VALUES (3201605,32,'CONCEICAO DA BARRA');
INSERT INTO cidade VALUES (3115201,31,'CONCEICAO DA BARRA DE MINAS');
INSERT INTO cidade VALUES (2908200,29,'CONCEICAO DA FEIRA');
INSERT INTO cidade VALUES (3117306,31,'CONCEICAO DAS ALAGOAS');
INSERT INTO cidade VALUES (3117207,31,'CONCEICAO DAS PEDRAS');
INSERT INTO cidade VALUES (3117405,31,'CONCEICAO DE IPANEMA');
INSERT INTO cidade VALUES (3301405,33,'CONCEICAO DE MACABU');
INSERT INTO cidade VALUES (2908309,29,'CONCEICAO DO ALMEIDA');
INSERT INTO cidade VALUES (1502707,15,'CONCEICAO DO ARAGUAIA');
INSERT INTO cidade VALUES (2202802,22,'CONCEICAO DO CANINDE');
INSERT INTO cidade VALUES (3201704,32,'CONCEICAO DO CASTELO');
INSERT INTO cidade VALUES (2908408,29,'CONCEICAO DO COITE');
INSERT INTO cidade VALUES (2908507,29,'CONCEICAO DO JACUIPE');
INSERT INTO cidade VALUES (2103554,21,'CONCEICAO DO LAGO-ACU');
INSERT INTO cidade VALUES (3117504,31,'CONCEICAO DO MATO DENTRO');
INSERT INTO cidade VALUES (3117801,31,'CONCEICAO DO OUROS');
INSERT INTO cidade VALUES (3117603,31,'CONCEICAO DO PARA');
INSERT INTO cidade VALUES (3117702,31,'CONCEICAO DO RIO VERDE');
INSERT INTO cidade VALUES (1705607,17,'CONCEICAO DO TOCANTINS');
INSERT INTO cidade VALUES (3512209,35,'CONCHAL');
INSERT INTO cidade VALUES (3512308,35,'CONCHAS');
INSERT INTO cidade VALUES (4204301,42,'CONCORDIA');
INSERT INTO cidade VALUES (1502756,15,'CONCORDIA DO PARA');
INSERT INTO cidade VALUES (2604601,26,'CONDADO');
INSERT INTO cidade VALUES (2504504,25,'CONDADO');
INSERT INTO cidade VALUES (2504603,25,'CONDE');
INSERT INTO cidade VALUES (2908606,29,'CONDE');
INSERT INTO cidade VALUES (2908705,29,'CONDEUBA');
INSERT INTO cidade VALUES (4305702,43,'CONDOR');
INSERT INTO cidade VALUES (3117836,31,'CONEGO MARINHO');
INSERT INTO cidade VALUES (3117876,31,'CONFINS');
INSERT INTO cidade VALUES (5103353,51,'CONFRESA');
INSERT INTO cidade VALUES (2504702,25,'CONGO');
INSERT INTO cidade VALUES (3117900,31,'CONGONHAL');
INSERT INTO cidade VALUES (3118007,31,'CONGONHAS');
INSERT INTO cidade VALUES (3118106,31,'CONGONHAS DO NORTE');
INSERT INTO cidade VALUES (4106001,41,'CONGONHINHAS');
INSERT INTO cidade VALUES (3118205,31,'CONQUISTA');
INSERT INTO cidade VALUES (5103361,51,'CONQUISTA D´OESTE');
INSERT INTO cidade VALUES (3118304,31,'CONSELHEIRO LAFAIETE');
INSERT INTO cidade VALUES (4106100,41,'CONSELHEIRO MAIRINCK');
INSERT INTO cidade VALUES (3118403,31,'CONSELHEIRO PENA');
INSERT INTO cidade VALUES (3118502,31,'CONSOLACAO');
INSERT INTO cidade VALUES (4305801,43,'CONSTANTINA');
INSERT INTO cidade VALUES (3118601,31,'CONTAGEM');
INSERT INTO cidade VALUES (4106209,41,'CONTENDA');
INSERT INTO cidade VALUES (2908804,29,'CONTENDAS DO SINCORA');
INSERT INTO cidade VALUES (3118700,31,'COQUEIRAL');
INSERT INTO cidade VALUES (4305835,43,'COQUEIRO BAIXO');
INSERT INTO cidade VALUES (2702207,27,'COQUEIRO SECO');
INSERT INTO cidade VALUES (4305850,43,'COQUEIROS DO SUL');
INSERT INTO cidade VALUES (3118809,31,'CORACAO DE JESUS');
INSERT INTO cidade VALUES (2908903,29,'CORACAO DE MARIA');
INSERT INTO cidade VALUES (4106308,41,'CORBELIA');
INSERT INTO cidade VALUES (3301504,33,'CORDEIRO');
INSERT INTO cidade VALUES (3512407,35,'CORDEIROPOLIS');
INSERT INTO cidade VALUES (2909000,29,'CORDEIROS');
INSERT INTO cidade VALUES (4204350,42,'CORDILHEIRA ALTA');
INSERT INTO cidade VALUES (3118908,31,'CORDISBURGO');
INSERT INTO cidade VALUES (3119005,31,'CORDISLANDIA');
INSERT INTO cidade VALUES (2304004,23,'COREAU');
INSERT INTO cidade VALUES (2504801,25,'COREMAS');
INSERT INTO cidade VALUES (5003108,50,'CORGUINHO');
INSERT INTO cidade VALUES (2909109,29,'CORIBE');
INSERT INTO cidade VALUES (3119104,31,'CORINTO');
INSERT INTO cidade VALUES (4106407,41,'CORNELIO PROCOPIO');
INSERT INTO cidade VALUES (3119203,31,'COROACI');
INSERT INTO cidade VALUES (3512506,35,'COROADOS');
INSERT INTO cidade VALUES (2103604,21,'COROATA');
INSERT INTO cidade VALUES (3119302,31,'COROMANDEL');
INSERT INTO cidade VALUES (4305871,43,'CORONEL BARROS');
INSERT INTO cidade VALUES (4305900,43,'CORONEL BICACO');
INSERT INTO cidade VALUES (4106456,41,'CORONEL DOMINGOS SOARES');
INSERT INTO cidade VALUES (2402808,24,'CORONEL EZEQUIEL');
INSERT INTO cidade VALUES (3119401,31,'CORONEL FABRICIANO');
INSERT INTO cidade VALUES (4204400,42,'CORONEL FREITAS');
INSERT INTO cidade VALUES (2402907,24,'CORONEL JOAO PESSOA');
INSERT INTO cidade VALUES (2909208,29,'CORONEL JOAO SA');
INSERT INTO cidade VALUES (2202851,22,'CORONEL JOSE DIAS');
INSERT INTO cidade VALUES (3512605,35,'CORONEL MACEDO');
INSERT INTO cidade VALUES (4204459,42,'CORONEL MARTINS');
INSERT INTO cidade VALUES (3119500,31,'CORONEL MURTA');
INSERT INTO cidade VALUES (3119609,31,'CORONEL PACHECO');
INSERT INTO cidade VALUES (4305934,43,'CORONEL PILAR');
INSERT INTO cidade VALUES (5003157,50,'CORONEL SAPUCAIA');
INSERT INTO cidade VALUES (4106506,41,'CORONEL VIVIDA');
INSERT INTO cidade VALUES (3119708,31,'CORONEL XAVIER CHAVES');
INSERT INTO cidade VALUES (3119807,31,'CORREGO DANTA');
INSERT INTO cidade VALUES (3119906,31,'CORREGO DO BOM JESUS');
INSERT INTO cidade VALUES (5205703,52,'CORREGO DO OURO');
INSERT INTO cidade VALUES (3119955,31,'CORREGO FUNDO');
INSERT INTO cidade VALUES (3120003,31,'CORREGO NOVO');
INSERT INTO cidade VALUES (4204558,42,'CORREIA PINTO');
INSERT INTO cidade VALUES (2202901,22,'CORRENTE');
INSERT INTO cidade VALUES (2604700,26,'CORRENTES');
INSERT INTO cidade VALUES (2909307,29,'CORRENTINA');
INSERT INTO cidade VALUES (2604809,26,'CORTES');
INSERT INTO cidade VALUES (5003207,50,'CORUMBA');
INSERT INTO cidade VALUES (5205802,52,'CORUMBA DE GOIAS');
INSERT INTO cidade VALUES (5205901,52,'CORUMBAIBA');
INSERT INTO cidade VALUES (3512704,35,'CORUMBATAI');
INSERT INTO cidade VALUES (4106555,41,'CORUMBATAI DO SUL');
INSERT INTO cidade VALUES (1100072,11,'CORUMBIARA');
INSERT INTO cidade VALUES (4204509,42,'CORUPA');
INSERT INTO cidade VALUES (2702306,27,'CORURIPE');
INSERT INTO cidade VALUES (3512803,35,'COSMOPOLIS');
INSERT INTO cidade VALUES (3512902,35,'COSMORAMA');
INSERT INTO cidade VALUES (1100080,11,'COSTA MARQUES');
INSERT INTO cidade VALUES (5003256,50,'COSTA RICA');
INSERT INTO cidade VALUES (2909406,29,'COTEGIPE');
INSERT INTO cidade VALUES (3513009,35,'COTIA');
INSERT INTO cidade VALUES (4305959,43,'COTIPORA');
INSERT INTO cidade VALUES (5103379,51,'COTRIGUACU');
INSERT INTO cidade VALUES (1706001,17,'COUTO DE MAGALHAES');
INSERT INTO cidade VALUES (3120102,31,'COUTO DE MAGALHAES DE MINAS');
INSERT INTO cidade VALUES (4305975,43,'COXILHA');
INSERT INTO cidade VALUES (5003306,50,'COXIM');
INSERT INTO cidade VALUES (2504850,25,'COXIXOLA');
INSERT INTO cidade VALUES (2702355,27,'CRAIBAS');
INSERT INTO cidade VALUES (2304103,23,'CRATEUS');
INSERT INTO cidade VALUES (2304202,23,'CRATO');
INSERT INTO cidade VALUES (3513108,35,'CRAVINHOS');
INSERT INTO cidade VALUES (2909505,29,'CRAVOLANDIA');
INSERT INTO cidade VALUES (4204608,42,'CRICIUMA');
INSERT INTO cidade VALUES (3120151,31,'CRISOLITA');
INSERT INTO cidade VALUES (2909604,29,'CRISOPOLIS');
INSERT INTO cidade VALUES (4306007,43,'CRISSIUMAL');
INSERT INTO cidade VALUES (3120201,31,'CRISTAIS');
INSERT INTO cidade VALUES (3513207,35,'CRISTAIS PAULISTA');
INSERT INTO cidade VALUES (4306056,43,'CRISTAL');
INSERT INTO cidade VALUES (4306072,43,'CRISTAL DO SUL');
INSERT INTO cidade VALUES (1706100,17,'CRISTALANDIA');
INSERT INTO cidade VALUES (2203008,22,'CRISTALANDIA DO PIAUI');
INSERT INTO cidade VALUES (3120300,31,'CRISTALIA');
INSERT INTO cidade VALUES (5206206,52,'CRISTALINA');
INSERT INTO cidade VALUES (3120409,31,'CRISTIANO OTONI');
INSERT INTO cidade VALUES (5206305,52,'CRISTIANOPOLIS');
INSERT INTO cidade VALUES (3120508,31,'CRISTINA');
INSERT INTO cidade VALUES (2801702,28,'CRISTINAPOLIS');
INSERT INTO cidade VALUES (2203107,22,'CRISTINO CASTRO');
INSERT INTO cidade VALUES (2909703,29,'CRISTOPOLIS');
INSERT INTO cidade VALUES (5206404,52,'CRIXAS');
INSERT INTO cidade VALUES (1706258,17,'CRIXAS DO TOCANTINS');
INSERT INTO cidade VALUES (2304236,23,'CROATA');
INSERT INTO cidade VALUES (5206503,52,'CROMINIA');
INSERT INTO cidade VALUES (3120607,31,'CRUCILANDIA');
INSERT INTO cidade VALUES (2304251,23,'CRUZ');
INSERT INTO cidade VALUES (4306106,43,'CRUZ ALTA');
INSERT INTO cidade VALUES (2909802,29,'CRUZ DAS ALMAS');
INSERT INTO cidade VALUES (2504900,25,'CRUZ DO ESPIRITO SANTO');
INSERT INTO cidade VALUES (4106803,41,'CRUZ MACHADO');
INSERT INTO cidade VALUES (3513306,35,'CRUZALIA');
INSERT INTO cidade VALUES (4306130,43,'CRUZALTENSE');
INSERT INTO cidade VALUES (3513405,35,'CRUZEIRO');
INSERT INTO cidade VALUES (3120706,31,'CRUZEIRO DA FORTALEZA');
INSERT INTO cidade VALUES (4106571,41,'CRUZEIRO DO IGUACU');
INSERT INTO cidade VALUES (4106605,41,'CRUZEIRO DO OESTE');
INSERT INTO cidade VALUES (1200203,12,'CRUZEIRO DO SUL');
INSERT INTO cidade VALUES (4306205,43,'CRUZEIRO DO SUL');
INSERT INTO cidade VALUES (4106704,41,'CRUZEIRO DO SUL');
INSERT INTO cidade VALUES (2403004,24,'CRUZETA');
INSERT INTO cidade VALUES (3120805,31,'CRUZILIA');
INSERT INTO cidade VALUES (4106852,41,'CRUZMALTINA');
INSERT INTO cidade VALUES (3513504,35,'CUBATAO');
INSERT INTO cidade VALUES (2505006,25,'CUBATI');
INSERT INTO cidade VALUES (5103403,51,'CUIABA');
INSERT INTO cidade VALUES (2505105,25,'CUITE');
INSERT INTO cidade VALUES (2505238,25,'CUITE DE MAMANGUAPE');
INSERT INTO cidade VALUES (2505204,25,'CUITEGI');
INSERT INTO cidade VALUES (1100940,11,'CUJUBIM');
INSERT INTO cidade VALUES (5206602,52,'CUMARI');
INSERT INTO cidade VALUES (2604908,26,'CUMARU');
INSERT INTO cidade VALUES (1502764,15,'CUMARU DO NORTE');
INSERT INTO cidade VALUES (2801900,28,'CUMBE');
INSERT INTO cidade VALUES (3513603,35,'CUNHA');
INSERT INTO cidade VALUES (4204707,42,'CUNHA PORA');
INSERT INTO cidade VALUES (4204756,42,'CUNHATAI');
INSERT INTO cidade VALUES (3120839,31,'CUPARAQUE');
INSERT INTO cidade VALUES (2605004,26,'CUPIRA');
INSERT INTO cidade VALUES (2909901,29,'CURACA');
INSERT INTO cidade VALUES (2203206,22,'CURIMATA');
INSERT INTO cidade VALUES (1502772,15,'CURIONOPOLIS');
INSERT INTO cidade VALUES (4106902,41,'CURITIBA');
INSERT INTO cidade VALUES (4204806,42,'CURITIBANOS');
INSERT INTO cidade VALUES (4107009,41,'CURIUVA');
INSERT INTO cidade VALUES (2203230,22,'CURRAIS');
INSERT INTO cidade VALUES (2403103,24,'CURRAIS NOVOS');
INSERT INTO cidade VALUES (2505279,25,'CURRAL DE CIMA');
INSERT INTO cidade VALUES (3120870,31,'CURRAL DE DENTRO');
INSERT INTO cidade VALUES (2203271,22,'CURRAL NOVO DO PIAUI');
INSERT INTO cidade VALUES (2505303,25,'CURRAL VELHO');
INSERT INTO cidade VALUES (1502806,15,'CURRALINHO');
INSERT INTO cidade VALUES (2203255,22,'CURRALINHOS');
INSERT INTO cidade VALUES (1502855,15,'CURUA');
INSERT INTO cidade VALUES (1502905,15,'CURUCA');
INSERT INTO cidade VALUES (2103703,21,'CURURUPU');
INSERT INTO cidade VALUES (3120904,31,'CURVELO');
INSERT INTO cidade VALUES (2605103,26,'CUSTODIA');
INSERT INTO cidade VALUES (1600212,16,'CUTIAS');
INSERT INTO cidade VALUES (5103437,51,'CUVERLANDIA');
INSERT INTO cidade VALUES (5206701,52,'DAMIANOPOLIS');
INSERT INTO cidade VALUES (2505352,25,'DAMIAO');
INSERT INTO cidade VALUES (5206800,52,'DAMOLANDIA');
INSERT INTO cidade VALUES (1706506,17,'DARCINOPOLIS');
INSERT INTO cidade VALUES (2910008,29,'DARIO MEIRA');
INSERT INTO cidade VALUES (3121001,31,'DATAS');
INSERT INTO cidade VALUES (4306304,43,'DAVID CANABARRO');
INSERT INTO cidade VALUES (2103752,21,'DAVINOPOLIS');
INSERT INTO cidade VALUES (5206909,52,'DAVINOPOLIS');
INSERT INTO cidade VALUES (3121100,31,'DELFIM MOREIRA');
INSERT INTO cidade VALUES (3121209,31,'DELFINOPOLIS');
INSERT INTO cidade VALUES (2702405,27,'DELMIRO GOUVEIA');
INSERT INTO cidade VALUES (3121258,31,'DELTA');
INSERT INTO cidade VALUES (2203305,22,'DEMERVAL LOBAO');
INSERT INTO cidade VALUES (5103452,51,'DENISE');
INSERT INTO cidade VALUES (5003454,50,'DEODAPOLIS');
INSERT INTO cidade VALUES (2304269,23,'DEPUTADO IRAPUAN PINHEIRO');
INSERT INTO cidade VALUES (4306320,43,'DERRUBADAS');
INSERT INTO cidade VALUES (3513702,35,'DESCALVADO');
INSERT INTO cidade VALUES (4204905,42,'DESCANSO');
INSERT INTO cidade VALUES (3121308,31,'DESCOBERTO');
INSERT INTO cidade VALUES (2505402,25,'DESTERRO');
INSERT INTO cidade VALUES (3121407,31,'DESTERRO DE ENTRE RIOS');
INSERT INTO cidade VALUES (3121506,31,'DESTERRO DO MELO');
INSERT INTO cidade VALUES (4306353,43,'DEZESSEIS DE NOVEMBRO');
INSERT INTO cidade VALUES (3513801,35,'DIADEMA');
INSERT INTO cidade VALUES (2505600,25,'DIAMANTE');
INSERT INTO cidade VALUES (4107108,41,'DIAMANTE DO NORTE');
INSERT INTO cidade VALUES (4107124,41,'DIAMANTE DO SUL');
INSERT INTO cidade VALUES (4107157,41,'DIAMANTE D´OESTE');
INSERT INTO cidade VALUES (3121605,31,'DIAMANTINA');
INSERT INTO cidade VALUES (5103502,51,'DIAMANTINO');
INSERT INTO cidade VALUES (1707009,17,'DIANOPOLIS');
INSERT INTO cidade VALUES (2910057,29,'DIAS D´AVILA');
INSERT INTO cidade VALUES (4306379,43,'DILERMANDO DE AGUIAR');
INSERT INTO cidade VALUES (3121704,31,'DIOGO DE VASCONCELOS');
INSERT INTO cidade VALUES (3121803,31,'DIONISIO');
INSERT INTO cidade VALUES (4205001,42,'DIONISIO CERQUEIRA');
INSERT INTO cidade VALUES (5207105,52,'DIORAMA');
INSERT INTO cidade VALUES (3513850,35,'DIRCE REIS');
INSERT INTO cidade VALUES (2203354,22,'DIRCEU ARCOVERDE');
INSERT INTO cidade VALUES (2802007,28,'DIVINA PASTORA');
INSERT INTO cidade VALUES (3121902,31,'DIVINESIA');
INSERT INTO cidade VALUES (3122009,31,'DIVINO');
INSERT INTO cidade VALUES (3122108,31,'DIVINO DAS LARANJEIRAS');
INSERT INTO cidade VALUES (3201803,32,'DIVINO DE SAO LOURENCO');
INSERT INTO cidade VALUES (3513900,35,'DIVINOLANDIA');
INSERT INTO cidade VALUES (3122207,31,'DIVINOLANDIA DE MINAS');
INSERT INTO cidade VALUES (3122306,31,'DIVINOPOLIS');
INSERT INTO cidade VALUES (5208301,52,'DIVINOPOLIS DE GOIAS');
INSERT INTO cidade VALUES (1707108,17,'DIVINOPOLIS DO TOCANTINS');
INSERT INTO cidade VALUES (3122355,31,'DIVISA ALEGRE');
INSERT INTO cidade VALUES (3122405,31,'DIVISA NOVA');
INSERT INTO cidade VALUES (3122454,31,'DIVISOPOLIS');
INSERT INTO cidade VALUES (3514007,35,'DOBRADA');
INSERT INTO cidade VALUES (3514106,35,'DOIS CORREGOS');
INSERT INTO cidade VALUES (4306403,43,'DOIS IRMAOS');
INSERT INTO cidade VALUES (4306429,43,'DOIS IRMAOS DAS MISSOES');
INSERT INTO cidade VALUES (5003488,50,'DOIS IRMAOS DO BURITI');
INSERT INTO cidade VALUES (1707207,17,'DOIS IRMAOS DO TOCANTINS');
INSERT INTO cidade VALUES (4306452,43,'DOIS LAJEADOS');
INSERT INTO cidade VALUES (2702504,27,'DOIS RIACHOS');
INSERT INTO cidade VALUES (4107207,41,'DOIS VIZINHOS');
INSERT INTO cidade VALUES (3514205,35,'DOLCINOPOLIS');
INSERT INTO cidade VALUES (5103601,51,'DOM AQUINO');
INSERT INTO cidade VALUES (2910107,29,'DOM BASILIO');
INSERT INTO cidade VALUES (3122470,31,'DOM BOSCO');
INSERT INTO cidade VALUES (3122504,31,'DOM CAVATI');
INSERT INTO cidade VALUES (1502939,15,'DOM ELISEU');
INSERT INTO cidade VALUES (2203404,22,'DOM EXPEDITO LOPES');
INSERT INTO cidade VALUES (4306502,43,'DOM FELICIANO');
INSERT INTO cidade VALUES (2203453,22,'DOM INOCENCIO');
INSERT INTO cidade VALUES (3122603,31,'DOM JOAQUIM');
INSERT INTO cidade VALUES (2910206,29,'DOM MACEDO COSTA');
INSERT INTO cidade VALUES (4306601,43,'DOM PEDRITO');
INSERT INTO cidade VALUES (2103802,21,'DOM PEDRO');
INSERT INTO cidade VALUES (4306551,43,'DOM PEDRO DE ALCANTARA');
INSERT INTO cidade VALUES (3122702,31,'DOM SILVERIO');
INSERT INTO cidade VALUES (3122801,31,'DOM VICOSO');
INSERT INTO cidade VALUES (3201902,32,'DOMINGOS MARTINS');
INSERT INTO cidade VALUES (2203420,22,'DOMINGOS MOURAO');
INSERT INTO cidade VALUES (4205100,42,'DONA EMMA');
INSERT INTO cidade VALUES (3122900,31,'DONA EUSEBIA');
INSERT INTO cidade VALUES (4306700,43,'DONA FRANCISCA');
INSERT INTO cidade VALUES (2505709,25,'DONA INES');
INSERT INTO cidade VALUES (3123007,31,'DORES DE CAMPOS');
INSERT INTO cidade VALUES (3123106,31,'DORES DE GUANHAES');
INSERT INTO cidade VALUES (3123205,31,'DORES DO INDAIA');
INSERT INTO cidade VALUES (3202009,32,'DORES DO RIO PRETO');
INSERT INTO cidade VALUES (3123304,31,'DORES DO TURVO');
INSERT INTO cidade VALUES (3123403,31,'DORESOPOLIS');
INSERT INTO cidade VALUES (2605152,26,'DORMENTES');
INSERT INTO cidade VALUES (5003504,50,'DOURADINA');
INSERT INTO cidade VALUES (4107256,41,'DOURADINA');
INSERT INTO cidade VALUES (3514304,35,'DOURADO');
INSERT INTO cidade VALUES (3123502,31,'DOURADOQUARA');
INSERT INTO cidade VALUES (5003702,50,'DOURADOS');
INSERT INTO cidade VALUES (4107306,41,'DOUTOR CAMARGO');
INSERT INTO cidade VALUES (4306734,43,'DOUTOR MAURICIO CARDOSO');
INSERT INTO cidade VALUES (4205159,42,'DOUTOR PEDRINHO');
INSERT INTO cidade VALUES (4306759,43,'DOUTOR RICARDO');
INSERT INTO cidade VALUES (2403202,24,'DOUTOR SEVERIANO');
INSERT INTO cidade VALUES (4128633,41,'DOUTOR ULYSSES');
INSERT INTO cidade VALUES (5207253,52,'DOVERLANDIA');
INSERT INTO cidade VALUES (3514403,35,'DRACENA');
INSERT INTO cidade VALUES (3514502,35,'DUARTINA');
INSERT INTO cidade VALUES (3301603,33,'DUAS BARRAS');
INSERT INTO cidade VALUES (2505808,25,'DUAS ESTRADAS');
INSERT INTO cidade VALUES (1707306,17,'DUERE');
INSERT INTO cidade VALUES (3514601,35,'DUMONT');
INSERT INTO cidade VALUES (2103901,21,'DUQUE BACELAR');
INSERT INTO cidade VALUES (3301702,33,'DUQUE DE CAXIAS');
INSERT INTO cidade VALUES (3123528,31,'DURANDE');
INSERT INTO cidade VALUES (3514700,35,'ECHAPORA');
INSERT INTO cidade VALUES (3202108,32,'ECOPORANGA');
INSERT INTO cidade VALUES (5207352,52,'EDEALINA');
INSERT INTO cidade VALUES (5207402,52,'EDEIA');
INSERT INTO cidade VALUES (1301407,13,'EIRUNEPE');
INSERT INTO cidade VALUES (3514809,35,'ELDORADO');
INSERT INTO cidade VALUES (5003751,50,'ELDORADO');
INSERT INTO cidade VALUES (1502954,15,'ELDORADO DO CARAJAS');
INSERT INTO cidade VALUES (4306767,43,'ELDORADO DO SUL');
INSERT INTO cidade VALUES (2203503,22,'ELESBAO VELOSO');
INSERT INTO cidade VALUES (3514908,35,'ELIAS FAUSTO');
INSERT INTO cidade VALUES (2203602,22,'ELISEU MARTINS');
INSERT INTO cidade VALUES (3514924,35,'ELISIARIO');
INSERT INTO cidade VALUES (2910305,29,'ELISIO MEDRADO');
INSERT INTO cidade VALUES (3123601,31,'ELOI MENDES');
INSERT INTO cidade VALUES (2505907,25,'EMAS');
INSERT INTO cidade VALUES (3514957,35,'EMBAUBA');
INSERT INTO cidade VALUES (3515004,35,'EMBU');
INSERT INTO cidade VALUES (3515103,35,'EMBU-GUACU');
INSERT INTO cidade VALUES (3515129,35,'EMILIANOPOLIS');
INSERT INTO cidade VALUES (4306809,43,'ENCANTADO');
INSERT INTO cidade VALUES (2403301,24,'ENCANTO');
INSERT INTO cidade VALUES (2910404,29,'ENCRUZILHADA');
INSERT INTO cidade VALUES (4306908,43,'ENCRUZILHADA DO SUL');
INSERT INTO cidade VALUES (4107405,41,'ENEAS MARQUES');
INSERT INTO cidade VALUES (4107504,41,'ENGENHEIRO BELTRAO');
INSERT INTO cidade VALUES (3123700,31,'ENGENHEIRO CALDAS');
INSERT INTO cidade VALUES (3515152,35,'ENGENHEIRO COELHO');
INSERT INTO cidade VALUES (3123809,31,'ENGENHEIRO NAVARRO');
INSERT INTO cidade VALUES (3301801,33,'ENGENHEIRO PAULO DE FRONTIN');
INSERT INTO cidade VALUES (4306924,43,'ENGENHO VELHO');
INSERT INTO cidade VALUES (3123858,31,'ENTRE FOLHAS');
INSERT INTO cidade VALUES (4205175,42,'ENTRE RIOS');
INSERT INTO cidade VALUES (2910503,29,'ENTRE RIOS');
INSERT INTO cidade VALUES (3123908,31,'ENTRE RIOS DE MINAS');
INSERT INTO cidade VALUES (4107538,41,'ENTRE RIOS DO OESTE');
INSERT INTO cidade VALUES (4306957,43,'ENTRE RIOS DO SUL');
INSERT INTO cidade VALUES (4306932,43,'ENTRE-IJUIS');
INSERT INTO cidade VALUES (1301506,13,'ENVIRA');
INSERT INTO cidade VALUES (1200252,12,'EPITACIOLANDIA');
INSERT INTO cidade VALUES (2403400,24,'EQUADOR');
INSERT INTO cidade VALUES (4306973,43,'EREBANGO');
INSERT INTO cidade VALUES (4307005,43,'ERECHIM');
INSERT INTO cidade VALUES (2304277,23,'ERERE');
INSERT INTO cidade VALUES (2900504,29,'ERICO CARDOSO');
INSERT INTO cidade VALUES (4205191,42,'ERMO');
INSERT INTO cidade VALUES (4307054,43,'ERNESTINA');
INSERT INTO cidade VALUES (4307203,43,'ERVAL GRANDE');
INSERT INTO cidade VALUES (4307302,43,'ERVAL SECO');
INSERT INTO cidade VALUES (4205209,42,'ERVAL VELHO');
INSERT INTO cidade VALUES (3124005,31,'ERVALIA');
INSERT INTO cidade VALUES (2605202,26,'ESCADA');
INSERT INTO cidade VALUES (4307401,43,'ESMERALDA');
INSERT INTO cidade VALUES (3124104,31,'ESMERALDAS');
INSERT INTO cidade VALUES (3124203,31,'ESPERA FELIZ');
INSERT INTO cidade VALUES (2506004,25,'ESPERANCA');
INSERT INTO cidade VALUES (4307450,43,'ESPERANCA DO SUL');
INSERT INTO cidade VALUES (4107520,41,'ESPERANCA NOVA');
INSERT INTO cidade VALUES (2203701,22,'ESPERANTINA');
INSERT INTO cidade VALUES (1707405,17,'ESPERANTINA');
INSERT INTO cidade VALUES (2104008,21,'ESPERANTINOPOLIS');
INSERT INTO cidade VALUES (4107546,41,'ESPIGAO ALTO DO IGUACU');
INSERT INTO cidade VALUES (1100098,11,'ESPIGAO D´OESTE');
INSERT INTO cidade VALUES (3124302,31,'ESPINOSA');
INSERT INTO cidade VALUES (2403509,24,'ESPIRITO SANTO');
INSERT INTO cidade VALUES (3124401,31,'ESPIRITO SANTO DO DOURADO');
INSERT INTO cidade VALUES (3515186,35,'ESPIRITO SANTO DO PINHAL');
INSERT INTO cidade VALUES (3515194,35,'ESPIRITO SANTO DO TURVO');
INSERT INTO cidade VALUES (2910602,29,'ESPLANADA');
INSERT INTO cidade VALUES (4307500,43,'ESPUMOSO');
INSERT INTO cidade VALUES (4307559,43,'ESTACAO');
INSERT INTO cidade VALUES (2802106,28,'ESTANCIA');
INSERT INTO cidade VALUES (4307609,43,'ESTANCIA VELHA');
INSERT INTO cidade VALUES (4307708,43,'ESTEIO');
INSERT INTO cidade VALUES (3124500,31,'ESTIVA');
INSERT INTO cidade VALUES (3557303,35,'ESTIVA GERBI');
INSERT INTO cidade VALUES (2104057,21,'ESTREITO');
INSERT INTO cidade VALUES (4307807,43,'ESTRELA');
INSERT INTO cidade VALUES (3124609,31,'ESTRELA DALVA');
INSERT INTO cidade VALUES (2702553,27,'ESTRELA DE ALAGOAS');
INSERT INTO cidade VALUES (3124708,31,'ESTRELA DO INDAIA');
INSERT INTO cidade VALUES (5207501,52,'ESTRELA DO NORTE');
INSERT INTO cidade VALUES (3515301,35,'ESTRELA DO NORTE');
INSERT INTO cidade VALUES (3124807,31,'ESTRELA DO SUL');
INSERT INTO cidade VALUES (3515202,35,'ESTRELA D´OESTE');
INSERT INTO cidade VALUES (4307815,43,'ESTRELA VELHA');
INSERT INTO cidade VALUES (2910701,29,'EUCLIDES DA CUNHA');
INSERT INTO cidade VALUES (3515350,35,'EUCLIDES DA CUNHA PAULISTA');
INSERT INTO cidade VALUES (4307831,43,'EUGENIO DE CASTRO');
INSERT INTO cidade VALUES (3124906,31,'EUGENOPOLIS');
INSERT INTO cidade VALUES (2910727,29,'EUNAPOLIS');
INSERT INTO cidade VALUES (2304285,23,'EUSEBIO');
INSERT INTO cidade VALUES (3125002,31,'EWBANK DA CAMARA');
INSERT INTO cidade VALUES (3125101,31,'EXTREMA');
INSERT INTO cidade VALUES (2403608,24,'EXTREMOZ');
INSERT INTO cidade VALUES (2605301,26,'EXU');
INSERT INTO cidade VALUES (2506103,25,'FAGUNDES');
INSERT INTO cidade VALUES (4307864,43,'FAGUNDES VARELA');
INSERT INTO cidade VALUES (5207535,52,'FAINA');
INSERT INTO cidade VALUES (3125200,31,'FAMA');
INSERT INTO cidade VALUES (3125309,31,'FARIA LEMOS');
INSERT INTO cidade VALUES (2304301,23,'FARIAS BRITO');
INSERT INTO cidade VALUES (1503002,15,'FARO');
INSERT INTO cidade VALUES (4107553,41,'FAROL');
INSERT INTO cidade VALUES (4307906,43,'FARROUPILHA');
INSERT INTO cidade VALUES (3515400,35,'FARTURA');
INSERT INTO cidade VALUES (2203750,22,'FARTURA DO PIAUI');
INSERT INTO cidade VALUES (1707553,17,'FATIMA');
INSERT INTO cidade VALUES (2910750,29,'FATIMA');
INSERT INTO cidade VALUES (5003801,50,'FATIMA DO SUL');
INSERT INTO cidade VALUES (4107603,41,'FAXINAL');
INSERT INTO cidade VALUES (4205308,42,'FAXINAL DO GUEDES');
INSERT INTO cidade VALUES (4308003,43,'FAXINAL DO SOTURNO');
INSERT INTO cidade VALUES (4308052,43,'FAXINALZINHO');
INSERT INTO cidade VALUES (5207600,52,'FAZENDA NOVA');
INSERT INTO cidade VALUES (4107652,41,'FAZENDA RIO GRANDE');
INSERT INTO cidade VALUES (4308078,43,'FAZENDA VILANOVA');
INSERT INTO cidade VALUES (1200302,12,'FEIJO');
INSERT INTO cidade VALUES (2910776,29,'FEIRA DA MATA');
INSERT INTO cidade VALUES (2910800,29,'FEIRA DE SANTANA');
INSERT INTO cidade VALUES (2702603,27,'FEIRA GRANDE');
INSERT INTO cidade VALUES (2802205,28,'FEIRA NOVA');
INSERT INTO cidade VALUES (2605400,26,'FEIRA NOVA');
INSERT INTO cidade VALUES (2104073,21,'FEIRA NOVA DO MARANHAO');
INSERT INTO cidade VALUES (3125408,31,'FELICIO DO SANTOS');
INSERT INTO cidade VALUES (2403707,24,'FELIPE GUERRA');
INSERT INTO cidade VALUES (3125606,31,'FELISBURGO');
INSERT INTO cidade VALUES (3125705,31,'FELIXLANDIA');
INSERT INTO cidade VALUES (4308102,43,'FELIZ');
INSERT INTO cidade VALUES (2702702,27,'FELIZ DESERTO');
INSERT INTO cidade VALUES (5103700,51,'FELIZ NATAL');
INSERT INTO cidade VALUES (4107702,41,'FENIX');
INSERT INTO cidade VALUES (4107736,41,'FERNANDES PINHEIRO');
INSERT INTO cidade VALUES (3125804,31,'FERNANDES TOURINHO');
INSERT INTO cidade VALUES (2605459,26,'FERNANDO DE NORONHA');
INSERT INTO cidade VALUES (2104081,21,'FERNANDO FALCAO');
INSERT INTO cidade VALUES (2403756,24,'FERNANDO PEDROZA');
INSERT INTO cidade VALUES (3515608,35,'FERNANDO PRESTES');
INSERT INTO cidade VALUES (3515509,35,'FERNANDOPOLIS');
INSERT INTO cidade VALUES (3515657,35,'FERNAO');
INSERT INTO cidade VALUES (3515707,35,'FERRAZ DE VASCONCELOS');
INSERT INTO cidade VALUES (1600238,16,'FERREIRA GOMES');
INSERT INTO cidade VALUES (2605509,26,'FERREIROS');
INSERT INTO cidade VALUES (3125903,31,'FERROS');
INSERT INTO cidade VALUES (3125952,31,'FERVEDOURO');
INSERT INTO cidade VALUES (4107751,41,'FIGUEIRA');
INSERT INTO cidade VALUES (5003900,50,'FIGUEIRAO');
INSERT INTO cidade VALUES (1707652,17,'FIGUEIROPOLIS');
INSERT INTO cidade VALUES (5103809,51,'FIGUEIROPOLIS D´OESTE');
INSERT INTO cidade VALUES (2910859,29,'FILADELFIA');
INSERT INTO cidade VALUES (1707702,17,'FILADELFIA');
INSERT INTO cidade VALUES (2910909,29,'FIRMINO ALVES');
INSERT INTO cidade VALUES (5207808,52,'FIRMINOPOLIS');
INSERT INTO cidade VALUES (2702801,27,'FLEXEIRAS');
INSERT INTO cidade VALUES (4107850,41,'FLOR DA SERRA DO SUL');
INSERT INTO cidade VALUES (4205357,42,'FLOR DO SERTAO');
INSERT INTO cidade VALUES (3515806,35,'FLORA RICA');
INSERT INTO cidade VALUES (4107801,41,'FLORAI');
INSERT INTO cidade VALUES (2403806,24,'FLORANIA');
INSERT INTO cidade VALUES (3515905,35,'FLOREAL');
INSERT INTO cidade VALUES (2605608,26,'FLORES');
INSERT INTO cidade VALUES (4308201,43,'FLORES DA CUNHA');
INSERT INTO cidade VALUES (5207907,52,'FLORES DE GOIAS');
INSERT INTO cidade VALUES (2203800,22,'FLORES DO PIAUI');
INSERT INTO cidade VALUES (4107900,41,'FLORESTA');
INSERT INTO cidade VALUES (2605707,26,'FLORESTA');
INSERT INTO cidade VALUES (2911006,29,'FLORESTA AZUL');
INSERT INTO cidade VALUES (1503044,15,'FLORESTA DO ARAGUAIA');
INSERT INTO cidade VALUES (2203859,22,'FLORESTA DO PIAUI');
INSERT INTO cidade VALUES (3126000,31,'FLORESTAL');
INSERT INTO cidade VALUES (4108007,41,'FLORESTOPOLIS');
INSERT INTO cidade VALUES (2203909,22,'FLORIANO');
INSERT INTO cidade VALUES (4308250,43,'FLORIANO PEIXOTO');
INSERT INTO cidade VALUES (4205407,42,'FLORIANOPOLIS');
INSERT INTO cidade VALUES (4108106,41,'FLORIDA');
INSERT INTO cidade VALUES (3516002,35,'FLORIDA PAULISTA');
INSERT INTO cidade VALUES (3516101,35,'FLORINIA');
INSERT INTO cidade VALUES (1301605,13,'FONTE BOA');
INSERT INTO cidade VALUES (4308300,43,'FONTOURA XAVIER');
INSERT INTO cidade VALUES (3126109,31,'FORMIGA');
INSERT INTO cidade VALUES (4308409,43,'FORMIGUEIRO');
INSERT INTO cidade VALUES (5208004,52,'FORMOSA');
INSERT INTO cidade VALUES (2104099,21,'FORMOSA DA SERRA NEGRA');
INSERT INTO cidade VALUES (4108205,41,'FORMOSA DO OESTE');
INSERT INTO cidade VALUES (2911105,29,'FORMOSA DO RIO PRETO');
INSERT INTO cidade VALUES (4205431,42,'FORMOSA DO SUL');
INSERT INTO cidade VALUES (5208103,52,'FORMOSO');
INSERT INTO cidade VALUES (3126208,31,'FORMOSO');
INSERT INTO cidade VALUES (1708205,17,'FORMOSO DO ARAGUAIA');
INSERT INTO cidade VALUES (4308433,43,'FORQUETINHA');
INSERT INTO cidade VALUES (2304350,23,'FORQUILHA');
INSERT INTO cidade VALUES (4205456,42,'FORQUILHINHA');
INSERT INTO cidade VALUES (2304400,23,'FORTALEZA');
INSERT INTO cidade VALUES (3126307,31,'FORTALEZA DE MINAS');
INSERT INTO cidade VALUES (2104107,21,'FORTALEZA DO NOGUEIRAS');
INSERT INTO cidade VALUES (1708254,17,'FORTALEZA DO TABOCAO');
INSERT INTO cidade VALUES (4308458,43,'FORTALEZA DO VALOS');
INSERT INTO cidade VALUES (2304459,23,'FORTIM');
INSERT INTO cidade VALUES (2104206,21,'FORTUNA');
INSERT INTO cidade VALUES (3126406,31,'FORTUNA DE MINAS');
INSERT INTO cidade VALUES (4108304,41,'FOZ DO IGUACU');
INSERT INTO cidade VALUES (4108452,41,'FOZ DO JORDAO');
INSERT INTO cidade VALUES (4205506,42,'FRAIBURGO');
INSERT INTO cidade VALUES (3516200,35,'FRANCA');
INSERT INTO cidade VALUES (2204006,22,'FRANCINOPOLIS');
INSERT INTO cidade VALUES (4108320,41,'FRANCISCO ALVES');
INSERT INTO cidade VALUES (2204105,22,'FRANCISCO AYRES');
INSERT INTO cidade VALUES (3126505,31,'FRANCISCO BADARO');
INSERT INTO cidade VALUES (4108403,41,'FRANCISCO BELTRAO');
INSERT INTO cidade VALUES (2403905,24,'FRANCISCO DANTAS');
INSERT INTO cidade VALUES (3126604,31,'FRANCISCO DUMONT');
INSERT INTO cidade VALUES (2204154,22,'FRANCISCO MACEDO');
INSERT INTO cidade VALUES (3516309,35,'FRANCISCO MORATO');
INSERT INTO cidade VALUES (3126703,31,'FRANCISCO SA');
INSERT INTO cidade VALUES (2204204,22,'FRANCISCO SANTOS');
INSERT INTO cidade VALUES (3126752,31,'FRANCISCOPOLIS');
INSERT INTO cidade VALUES (3516408,35,'FRANCO DA ROCHA');
INSERT INTO cidade VALUES (2304509,23,'FRECHEIRINHA');
INSERT INTO cidade VALUES (4308508,43,'FREDERICO WESTPHALEN');
INSERT INTO cidade VALUES (3126802,31,'FREI GASPAR');
INSERT INTO cidade VALUES (3126901,31,'FREI INOCENCIO');
INSERT INTO cidade VALUES (3126950,31,'FREI LAGONEGRO');
INSERT INTO cidade VALUES (2506202,25,'FREI MARTINHO');
INSERT INTO cidade VALUES (2605806,26,'FREI MIGUELINHO');
INSERT INTO cidade VALUES (2802304,28,'FREI PAULO');
INSERT INTO cidade VALUES (4205555,42,'FREI ROGERIO');
INSERT INTO cidade VALUES (3127008,31,'FRONTEIRA');
INSERT INTO cidade VALUES (3127057,31,'FRONTEIRA DO VALES');
INSERT INTO cidade VALUES (2204303,22,'FRONTEIRAS');
INSERT INTO cidade VALUES (3127073,31,'FRUTA DE LEITE');
INSERT INTO cidade VALUES (3127107,31,'FRUTAL');
INSERT INTO cidade VALUES (2404002,24,'FRUTUOSO GOMES');
INSERT INTO cidade VALUES (3202207,32,'FUNDAO');
INSERT INTO cidade VALUES (3127206,31,'FUNILANDIA');
INSERT INTO cidade VALUES (3516507,35,'GABRIEL MONTEIRO');
INSERT INTO cidade VALUES (2506251,25,'GADO BRAVO');
INSERT INTO cidade VALUES (3516606,35,'GALIA');
INSERT INTO cidade VALUES (3127305,31,'GALILEIA');
INSERT INTO cidade VALUES (2404101,24,'GALINHOS');
INSERT INTO cidade VALUES (4205605,42,'GALVAO');
INSERT INTO cidade VALUES (2605905,26,'GAMELEIRA');
INSERT INTO cidade VALUES (5208152,52,'GAMELEIRA DE GOIAS');
INSERT INTO cidade VALUES (3127339,31,'GAMELEIRAS');
INSERT INTO cidade VALUES (2911204,29,'GANDU');
INSERT INTO cidade VALUES (2606002,26,'GARANHUNS');
INSERT INTO cidade VALUES (2802403,28,'GARARU');
INSERT INTO cidade VALUES (3516705,35,'GARCA');
INSERT INTO cidade VALUES (4308607,43,'GARIBALDI');
INSERT INTO cidade VALUES (4205704,42,'GAROPABA');
INSERT INTO cidade VALUES (1503077,15,'GARRAFAO DO NORTE');
INSERT INTO cidade VALUES (4308656,43,'GARRUCHOS');
INSERT INTO cidade VALUES (4205803,42,'GARUVA');
INSERT INTO cidade VALUES (4205902,42,'GASPAR');
INSERT INTO cidade VALUES (3516804,35,'GASTAO VIDIGAL');
INSERT INTO cidade VALUES (5103858,51,'GAUCHA DO NORTE');
INSERT INTO cidade VALUES (4308706,43,'GAURAMA');
INSERT INTO cidade VALUES (2911253,29,'GAVIAO');
INSERT INTO cidade VALUES (3516853,35,'GAVIAO PEIXOTO');
INSERT INTO cidade VALUES (2204352,22,'GEMINIANO');
INSERT INTO cidade VALUES (4308805,43,'GENERAL CAMARA');
INSERT INTO cidade VALUES (4108502,41,'GENERAL CARNEIRO');
INSERT INTO cidade VALUES (5103908,51,'GENERAL CARNEIRO');
INSERT INTO cidade VALUES (2802502,28,'GENERAL MAYNARD');
INSERT INTO cidade VALUES (3516903,35,'GENERAL SALGADO');
INSERT INTO cidade VALUES (2304608,23,'GENERAL SAMPAIO');
INSERT INTO cidade VALUES (4308854,43,'GENTIL');
INSERT INTO cidade VALUES (2911303,29,'GENTIO DO OURO');
INSERT INTO cidade VALUES (3517000,35,'GETULINA');
INSERT INTO cidade VALUES (4308904,43,'GETULIO VARGAS');
INSERT INTO cidade VALUES (2204402,22,'GILBUES');
INSERT INTO cidade VALUES (2702900,27,'GIRAU DO PONCIANO');
INSERT INTO cidade VALUES (4309001,43,'GIRUA');
INSERT INTO cidade VALUES (3127354,31,'GLAUCILANDIA');
INSERT INTO cidade VALUES (3517109,35,'GLICERIO');
INSERT INTO cidade VALUES (2911402,29,'GLORIA');
INSERT INTO cidade VALUES (5004007,50,'GLORIA DE DOURADOS');
INSERT INTO cidade VALUES (2606101,26,'GLORIA DO GOITA');
INSERT INTO cidade VALUES (5103957,51,'GLORIA D´OESTE');
INSERT INTO cidade VALUES (4309050,43,'GLORINHA');
INSERT INTO cidade VALUES (2104305,21,'GODOFREDO VIANA');
INSERT INTO cidade VALUES (4108551,41,'GODOY MOREIRA');
INSERT INTO cidade VALUES (3127370,31,'GOIABEIRA');
INSERT INTO cidade VALUES (2606200,26,'GOIANA');
INSERT INTO cidade VALUES (3127388,31,'GOIANA');
INSERT INTO cidade VALUES (5208400,52,'GOIANAPOLIS');
INSERT INTO cidade VALUES (5208509,52,'GOIANDIRA');
INSERT INTO cidade VALUES (5208608,52,'GOIANESIA');
INSERT INTO cidade VALUES (1503093,15,'GOIANESIA DO PARA');
INSERT INTO cidade VALUES (5208707,52,'GOIANIA');
INSERT INTO cidade VALUES (2404200,24,'GOIANINHA');
INSERT INTO cidade VALUES (5208806,52,'GOIANIRA');
INSERT INTO cidade VALUES (1708304,17,'GOIANORTE');
INSERT INTO cidade VALUES (5208905,52,'GOIAS');
INSERT INTO cidade VALUES (1709005,17,'GOIATINS');
INSERT INTO cidade VALUES (5209101,52,'GOIATUBA');
INSERT INTO cidade VALUES (4108601,41,'GOIOERE');
INSERT INTO cidade VALUES (4108650,41,'GOIOXIM');
INSERT INTO cidade VALUES (3127404,31,'GONCALVES');
INSERT INTO cidade VALUES (2104404,21,'GONCALVES DIAS');
INSERT INTO cidade VALUES (2911501,29,'GONGOGI');
INSERT INTO cidade VALUES (3127503,31,'GONZAGA');
INSERT INTO cidade VALUES (3127602,31,'GOUVEIA');
INSERT INTO cidade VALUES (5209150,52,'GOUVELANDIA');
INSERT INTO cidade VALUES (2104503,21,'GOVERNADOR ARCHER');
INSERT INTO cidade VALUES (4206009,42,'GOVERNADOR CELSO RAMOS');
INSERT INTO cidade VALUES (2404309,24,'GOVERNADOR DIX-SEPT ROSADO');
INSERT INTO cidade VALUES (2104552,21,'GOVERNADOR EDISON LOBAO');
INSERT INTO cidade VALUES (2104602,21,'GOVERNADOR EUGENIO BARROS');
INSERT INTO cidade VALUES (1101005,11,'GOVERNADOR JORGE TEIXEIRA');
INSERT INTO cidade VALUES (3202256,32,'GOVERNADOR LINDENBERG');
INSERT INTO cidade VALUES (2903300,29,'GOVERNADOR LOMANTO JUNIOR');
INSERT INTO cidade VALUES (2104628,21,'GOVERNADOR LUIZ ROCHA');
INSERT INTO cidade VALUES (2911600,29,'GOVERNADOR MANGABEIRA');
INSERT INTO cidade VALUES (2104651,21,'GOVERNADOR NEWTON BELLO');
INSERT INTO cidade VALUES (2104677,21,'GOVERNADOR NUNES FREIRE');
INSERT INTO cidade VALUES (3127701,31,'GOVERNADOR VALADARES');
INSERT INTO cidade VALUES (2304657,23,'GRACA');
INSERT INTO cidade VALUES (2104701,21,'GRACA ARANHA');
INSERT INTO cidade VALUES (2802601,28,'GRACHO CARDOSO');
INSERT INTO cidade VALUES (2104800,21,'GRAJAU');
INSERT INTO cidade VALUES (4309100,43,'GRAMADO');
INSERT INTO cidade VALUES (4309126,43,'GRAMADO DO LOUREIROS');
INSERT INTO cidade VALUES (4309159,43,'GRAMADO XAVIER');
INSERT INTO cidade VALUES (4108700,41,'GRANDES RIOS');
INSERT INTO cidade VALUES (2606309,26,'GRANITO');
INSERT INTO cidade VALUES (2304707,23,'GRANJA');
INSERT INTO cidade VALUES (2304806,23,'GRANJEIRO');
INSERT INTO cidade VALUES (3127800,31,'GRAO MOGOL');
INSERT INTO cidade VALUES (4206108,42,'GRAO PARA');
INSERT INTO cidade VALUES (2606408,26,'GRAVATA');
INSERT INTO cidade VALUES (4309209,43,'GRAVATAI');
INSERT INTO cidade VALUES (4206207,42,'GRAVATAL');
INSERT INTO cidade VALUES (2304905,23,'GROAIRAS');
INSERT INTO cidade VALUES (2404408,24,'GROSSOS');
INSERT INTO cidade VALUES (3127909,31,'GRUPIARA');
INSERT INTO cidade VALUES (4309258,43,'GUABIJU');
INSERT INTO cidade VALUES (4206306,42,'GUABIRUBA');
INSERT INTO cidade VALUES (3202306,32,'GUACUI');
INSERT INTO cidade VALUES (2204501,22,'GUADALUPE');
INSERT INTO cidade VALUES (4309308,43,'GUAIBA');
INSERT INTO cidade VALUES (3517208,35,'GUAICARA');
INSERT INTO cidade VALUES (3517307,35,'GUAIMBE');
INSERT INTO cidade VALUES (4108809,41,'GUAIRA');
INSERT INTO cidade VALUES (3517406,35,'GUAIRA');
INSERT INTO cidade VALUES (4108908,41,'GUAIRACA');
INSERT INTO cidade VALUES (2304954,23,'GUAIUBA');
INSERT INTO cidade VALUES (1301654,13,'GUAJARA');
INSERT INTO cidade VALUES (1100106,11,'GUAJARA-MIRIM');
INSERT INTO cidade VALUES (2911659,29,'GUAJERU');
INSERT INTO cidade VALUES (2404507,24,'GUAMARE');
INSERT INTO cidade VALUES (4108957,41,'GUAMIRANGA');
INSERT INTO cidade VALUES (2911709,29,'GUANAMBI');
INSERT INTO cidade VALUES (3128006,31,'GUANHAES');
INSERT INTO cidade VALUES (3128105,31,'GUAPE');
INSERT INTO cidade VALUES (3517505,35,'GUAPIACU');
INSERT INTO cidade VALUES (3517604,35,'GUAPIARA');
INSERT INTO cidade VALUES (3301850,33,'GUAPIMIRIM');
INSERT INTO cidade VALUES (4109005,41,'GUAPIRAMA');
INSERT INTO cidade VALUES (5209200,52,'GUAPO');
INSERT INTO cidade VALUES (4309407,43,'GUAPORE');
INSERT INTO cidade VALUES (4109104,41,'GUAPOREMA');
INSERT INTO cidade VALUES (3517703,35,'GUARA');
INSERT INTO cidade VALUES (2506301,25,'GUARABIRA');
INSERT INTO cidade VALUES (3517802,35,'GUARACAI');
INSERT INTO cidade VALUES (3517901,35,'GUARACI');
INSERT INTO cidade VALUES (4109203,41,'GUARACI');
INSERT INTO cidade VALUES (4206405,42,'GUARACIABA');
INSERT INTO cidade VALUES (3128204,31,'GUARACIABA');
INSERT INTO cidade VALUES (2305001,23,'GUARACIABA DO NORTE');
INSERT INTO cidade VALUES (3128253,31,'GUARACIAMA');
INSERT INTO cidade VALUES (1709302,17,'GUARAI');
INSERT INTO cidade VALUES (5209291,52,'GUARAITA');
INSERT INTO cidade VALUES (2305100,23,'GUARAMIRANGA');
INSERT INTO cidade VALUES (4206504,42,'GUARAMIRIM');
INSERT INTO cidade VALUES (3128303,31,'GUARANESIA');
INSERT INTO cidade VALUES (3128402,31,'GUARANI');
INSERT INTO cidade VALUES (4309506,43,'GUARANI DAS MISSOES');
INSERT INTO cidade VALUES (5209408,52,'GUARANI DE GOIAS');
INSERT INTO cidade VALUES (3518008,35,'GUARANI D´OESTE');
INSERT INTO cidade VALUES (4109302,41,'GUARANIACU');
INSERT INTO cidade VALUES (3518107,35,'GUARANTA');
INSERT INTO cidade VALUES (5104104,51,'GUARANTA DO NORTE');
INSERT INTO cidade VALUES (3202405,32,'GUARAPARI');
INSERT INTO cidade VALUES (4109401,41,'GUARAPUAVA');
INSERT INTO cidade VALUES (4109500,41,'GUARAQUECABA');
INSERT INTO cidade VALUES (3128501,31,'GUARARA');
INSERT INTO cidade VALUES (3518206,35,'GUARARAPES');
INSERT INTO cidade VALUES (3518305,35,'GUARAREMA');
INSERT INTO cidade VALUES (2911808,29,'GUARATINGA');
INSERT INTO cidade VALUES (3518404,35,'GUARATINGUETA');
INSERT INTO cidade VALUES (4109609,41,'GUARATUBA');
INSERT INTO cidade VALUES (3128600,31,'GUARDA-MOR');
INSERT INTO cidade VALUES (3518503,35,'GUAREI');
INSERT INTO cidade VALUES (3518602,35,'GUARIBA');
INSERT INTO cidade VALUES (2204550,22,'GUARIBAS');
INSERT INTO cidade VALUES (5209457,52,'GUARINOS');
INSERT INTO cidade VALUES (3518701,35,'GUARUJA');
INSERT INTO cidade VALUES (4206603,42,'GUARUJA DO SUL');
INSERT INTO cidade VALUES (3518800,35,'GUARULHOS');
INSERT INTO cidade VALUES (4206652,42,'GUATAMBU');
INSERT INTO cidade VALUES (3518859,35,'GUATAPARA');
INSERT INTO cidade VALUES (3128709,31,'GUAXUPE');
INSERT INTO cidade VALUES (5004106,50,'GUIA LOPES DA LAGUNA');
INSERT INTO cidade VALUES (3128808,31,'GUIDOVAL');
INSERT INTO cidade VALUES (2104909,21,'GUIMARAES');
INSERT INTO cidade VALUES (3128907,31,'GUIMARANIA');
INSERT INTO cidade VALUES (5104203,51,'GUIRATINGA');
INSERT INTO cidade VALUES (3129004,31,'GUIRICEMA');
INSERT INTO cidade VALUES (3129103,31,'GURINHATA');
INSERT INTO cidade VALUES (2506400,25,'GURINHEM');
INSERT INTO cidade VALUES (2506509,25,'GURJAO');
INSERT INTO cidade VALUES (1503101,15,'GURUPA');
INSERT INTO cidade VALUES (1709500,17,'GURUPI');
INSERT INTO cidade VALUES (3518909,35,'GUZOLANDIA');
INSERT INTO cidade VALUES (4309555,43,'HARMONIA');
INSERT INTO cidade VALUES (5209606,52,'HEITORAI');
INSERT INTO cidade VALUES (3129202,31,'HELIODORA');
INSERT INTO cidade VALUES (2911857,29,'HELIOPOLIS');
INSERT INTO cidade VALUES (3519006,35,'HERCULANDIA');
INSERT INTO cidade VALUES (4307104,43,'HERVAL');
INSERT INTO cidade VALUES (4206702,42,'HERVAL D´OESTE');
INSERT INTO cidade VALUES (4309571,43,'HERVEIRAS');
INSERT INTO cidade VALUES (5209705,52,'HIDROLANDIA');
INSERT INTO cidade VALUES (2305209,23,'HIDROLANDIA');
INSERT INTO cidade VALUES (5209804,52,'HIDROLINA');
INSERT INTO cidade VALUES (3519055,35,'HOLAMBRA');
INSERT INTO cidade VALUES (4109658,41,'HONORIO SERPA');
INSERT INTO cidade VALUES (2305233,23,'HORIZONTE');
INSERT INTO cidade VALUES (4309605,43,'HORIZONTINA');
INSERT INTO cidade VALUES (3519071,35,'HORTOLANDIA');
INSERT INTO cidade VALUES (2204600,22,'HUGO NAPOLEAO');
INSERT INTO cidade VALUES (4309654,43,'HULHA NEGRA');
INSERT INTO cidade VALUES (1301704,13,'HUMAITA');
INSERT INTO cidade VALUES (4309704,43,'HUMAITA');
INSERT INTO cidade VALUES (2105005,21,'HUMBERTO DE CAMPOS');
INSERT INTO cidade VALUES (3519105,35,'IACANGA');
INSERT INTO cidade VALUES (5209903,52,'IACIARA');
INSERT INTO cidade VALUES (3519204,35,'IACRI');
INSERT INTO cidade VALUES (2911907,29,'IACU');
INSERT INTO cidade VALUES (3129301,31,'IAPU');
INSERT INTO cidade VALUES (3519253,35,'IARAS');
INSERT INTO cidade VALUES (2606507,26,'IATI');
INSERT INTO cidade VALUES (4109708,41,'IBAITI');
INSERT INTO cidade VALUES (4309753,43,'IBARAMA');
INSERT INTO cidade VALUES (2305266,23,'IBARETAMA');
INSERT INTO cidade VALUES (3519303,35,'IBATE');
INSERT INTO cidade VALUES (2703007,27,'IBATEGUARA');
INSERT INTO cidade VALUES (3202454,32,'IBATIBA');
INSERT INTO cidade VALUES (4109757,41,'IBEMA');
INSERT INTO cidade VALUES (3129400,31,'IBERTIOGA');
INSERT INTO cidade VALUES (3129509,31,'IBIA');
INSERT INTO cidade VALUES (4309803,43,'IBIACA');
INSERT INTO cidade VALUES (3129608,31,'IBIAI');
INSERT INTO cidade VALUES (4206751,42,'IBIAM');
INSERT INTO cidade VALUES (2305308,23,'IBIAPINA');
INSERT INTO cidade VALUES (2506608,25,'IBIARA');
INSERT INTO cidade VALUES (2912004,29,'IBIASSUCE');
INSERT INTO cidade VALUES (2912103,29,'IBICARAI');
INSERT INTO cidade VALUES (4206801,42,'IBICARE');
INSERT INTO cidade VALUES (2912202,29,'IBICOARA');
INSERT INTO cidade VALUES (2912301,29,'IBICUI');
INSERT INTO cidade VALUES (2305332,23,'IBICUITINGA');
INSERT INTO cidade VALUES (2606606,26,'IBIMIRIM');
INSERT INTO cidade VALUES (2912400,29,'IBIPEBA');
INSERT INTO cidade VALUES (2912509,29,'IBIPITANGA');
INSERT INTO cidade VALUES (4109807,41,'IBIPORA');
INSERT INTO cidade VALUES (2912608,29,'IBIQUERA');
INSERT INTO cidade VALUES (3519402,35,'IBIRA');
INSERT INTO cidade VALUES (3129657,31,'IBIRACATU');
INSERT INTO cidade VALUES (3129707,31,'IBIRACI');
INSERT INTO cidade VALUES (3202504,32,'IBIRACU');
INSERT INTO cidade VALUES (4309902,43,'IBIRAIARAS');
INSERT INTO cidade VALUES (2606705,26,'IBIRAJUBA');
INSERT INTO cidade VALUES (4206900,42,'IBIRAMA');
INSERT INTO cidade VALUES (2912707,29,'IBIRAPITANGA');
INSERT INTO cidade VALUES (2912806,29,'IBIRAPUA');
INSERT INTO cidade VALUES (4309951,43,'IBIRAPUITA');
INSERT INTO cidade VALUES (3519501,35,'IBIRAREMA');
INSERT INTO cidade VALUES (2912905,29,'IBIRATAIA');
INSERT INTO cidade VALUES (3129806,31,'IBIRITE');
INSERT INTO cidade VALUES (4310009,43,'IBIRUBA');
INSERT INTO cidade VALUES (2913002,29,'IBITIARA');
INSERT INTO cidade VALUES (3519600,35,'IBITINGA');
INSERT INTO cidade VALUES (3202553,32,'IBITIRAMA');
INSERT INTO cidade VALUES (2913101,29,'IBITITA');
INSERT INTO cidade VALUES (3129905,31,'IBITIURA DE MINAS');
INSERT INTO cidade VALUES (3130002,31,'IBITURUNA');
INSERT INTO cidade VALUES (3519709,35,'IBIUNA');
INSERT INTO cidade VALUES (2913200,29,'IBOTIRAMA');
INSERT INTO cidade VALUES (2305357,23,'ICAPUI');
INSERT INTO cidade VALUES (4207007,42,'ICARA');
INSERT INTO cidade VALUES (3130051,31,'ICARAI DE MINAS');
INSERT INTO cidade VALUES (4109906,41,'ICARAIMA');
INSERT INTO cidade VALUES (2105104,21,'ICATU');
INSERT INTO cidade VALUES (3519808,35,'ICEM');
INSERT INTO cidade VALUES (2913309,29,'ICHU');
INSERT INTO cidade VALUES (2305407,23,'ICO');
INSERT INTO cidade VALUES (3202603,32,'ICONHA');
INSERT INTO cidade VALUES (2404606,24,'IELMO MARINHO');
INSERT INTO cidade VALUES (3519907,35,'IEPE');
INSERT INTO cidade VALUES (2703106,27,'IGACI');
INSERT INTO cidade VALUES (2913408,29,'IGAPORA');
INSERT INTO cidade VALUES (3520004,35,'IGARACU DO TIETE');
INSERT INTO cidade VALUES (2502607,25,'IGARACY');
INSERT INTO cidade VALUES (3520103,35,'IGARAPAVA');
INSERT INTO cidade VALUES (3130101,31,'IGARAPE');
INSERT INTO cidade VALUES (2105153,21,'IGARAPE DO MEIO');
INSERT INTO cidade VALUES (2105203,21,'IGARAPE GRANDE');
INSERT INTO cidade VALUES (1503200,15,'IGARAPE-ACU');
INSERT INTO cidade VALUES (1503309,15,'IGARAPE-MIRI');
INSERT INTO cidade VALUES (2606804,26,'IGARASSU');
INSERT INTO cidade VALUES (3520202,35,'IGARATA');
INSERT INTO cidade VALUES (3130200,31,'IGARATINGA');
INSERT INTO cidade VALUES (2913457,29,'IGRAPIUNA');
INSERT INTO cidade VALUES (2703205,27,'IGREJA NOVA');
INSERT INTO cidade VALUES (4310108,43,'IGREJINHA');
INSERT INTO cidade VALUES (3301876,33,'IGUABA GRANDE');
INSERT INTO cidade VALUES (2913507,29,'IGUAI');
INSERT INTO cidade VALUES (3520301,35,'IGUAPE');
INSERT INTO cidade VALUES (2606903,26,'IGUARACI');
INSERT INTO cidade VALUES (4110003,41,'IGUARACU');
INSERT INTO cidade VALUES (3130309,31,'IGUATAMA');
INSERT INTO cidade VALUES (5004304,50,'IGUATEMI');
INSERT INTO cidade VALUES (2305506,23,'IGUATU');
INSERT INTO cidade VALUES (4110052,41,'IGUATU');
INSERT INTO cidade VALUES (3130408,31,'IJACI');
INSERT INTO cidade VALUES (4310207,43,'IJUI');
INSERT INTO cidade VALUES (3520426,35,'ILHA COMPRIDA');
INSERT INTO cidade VALUES (2802700,28,'ILHA DAS FLORES');
INSERT INTO cidade VALUES (2204659,22,'ILHA GRANDE');
INSERT INTO cidade VALUES (3520442,35,'ILHA SOLTEIRA');
INSERT INTO cidade VALUES (3520400,35,'ILHABELA');
INSERT INTO cidade VALUES (2913606,29,'ILHEUS');
INSERT INTO cidade VALUES (4207106,42,'ILHOTA');
INSERT INTO cidade VALUES (3130507,31,'ILICINEA');
INSERT INTO cidade VALUES (4310306,43,'ILOPOLIS');
INSERT INTO cidade VALUES (2506707,25,'IMACULADA');
INSERT INTO cidade VALUES (4207205,42,'IMARUI');
INSERT INTO cidade VALUES (4110078,41,'IMBAU');
INSERT INTO cidade VALUES (4310330,43,'IMBE');
INSERT INTO cidade VALUES (3130556,31,'IMBE DE MINAS');
INSERT INTO cidade VALUES (4207304,42,'IMBITUBA');
INSERT INTO cidade VALUES (4110102,41,'IMBITUVA');
INSERT INTO cidade VALUES (4207403,42,'IMBUIA');
INSERT INTO cidade VALUES (4310363,43,'IMIGRANTE');
INSERT INTO cidade VALUES (2105302,21,'IMPERATRIZ');
INSERT INTO cidade VALUES (4110201,41,'INACIO MARTINS');
INSERT INTO cidade VALUES (5209937,52,'INACIOLANDIA');
INSERT INTO cidade VALUES (2607000,26,'INAJA');
INSERT INTO cidade VALUES (4110300,41,'INAJA');
INSERT INTO cidade VALUES (3130606,31,'INCONFIDENTES');
INSERT INTO cidade VALUES (3130655,31,'INDAIABIRA');
INSERT INTO cidade VALUES (4207502,42,'INDAIAL');
INSERT INTO cidade VALUES (3520509,35,'INDAIATUBA');
INSERT INTO cidade VALUES (4310405,43,'INDEPENDENCIA');
INSERT INTO cidade VALUES (2305605,23,'INDEPENDENCIA');
INSERT INTO cidade VALUES (3520608,35,'INDIANA');
INSERT INTO cidade VALUES (4110409,41,'INDIANOPOLIS');
INSERT INTO cidade VALUES (3130705,31,'INDIANOPOLIS');
INSERT INTO cidade VALUES (3520707,35,'INDIAPORA');
INSERT INTO cidade VALUES (5209952,52,'INDIARA');
INSERT INTO cidade VALUES (2802809,28,'INDIAROBA');
INSERT INTO cidade VALUES (5104500,51,'INDIAVAI');
INSERT INTO cidade VALUES (2506806,25,'INGA');
INSERT INTO cidade VALUES (3130804,31,'INGAI');
INSERT INTO cidade VALUES (2607109,26,'INGAZEIRA');
INSERT INTO cidade VALUES (4310413,43,'INHACORA');
INSERT INTO cidade VALUES (2913705,29,'INHAMBUPE');
INSERT INTO cidade VALUES (1503408,15,'INHANGAPI');
INSERT INTO cidade VALUES (2703304,27,'INHAPI');
INSERT INTO cidade VALUES (3130903,31,'INHAPIM');
INSERT INTO cidade VALUES (3131000,31,'INHAUMA');
INSERT INTO cidade VALUES (2204709,22,'INHUMA');
INSERT INTO cidade VALUES (5210000,52,'INHUMAS');
INSERT INTO cidade VALUES (3131109,31,'INIMUTABA');
INSERT INTO cidade VALUES (5004403,50,'INOCENCIA');
INSERT INTO cidade VALUES (3520806,35,'INUBIA PAULISTA');
INSERT INTO cidade VALUES (4207577,42,'IOMERE');
INSERT INTO cidade VALUES (3131158,31,'IPABA');
INSERT INTO cidade VALUES (5210109,52,'IPAMERI');
INSERT INTO cidade VALUES (3131208,31,'IPANEMA');
INSERT INTO cidade VALUES (2404705,24,'IPANGUACU');
INSERT INTO cidade VALUES (2305654,23,'IPAPORANGA');
INSERT INTO cidade VALUES (3131307,31,'IPATINGA');
INSERT INTO cidade VALUES (3520905,35,'IPAUCU');
INSERT INTO cidade VALUES (2305704,23,'IPAUMIRIM');
INSERT INTO cidade VALUES (4310439,43,'IPE');
INSERT INTO cidade VALUES (2913804,29,'IPECAETA');
INSERT INTO cidade VALUES (3521002,35,'IPERO');
INSERT INTO cidade VALUES (3521101,35,'IPEUNA');
INSERT INTO cidade VALUES (3131406,31,'IPIACU');
INSERT INTO cidade VALUES (2913903,29,'IPIAU');
INSERT INTO cidade VALUES (3521150,35,'IPIGUA');
INSERT INTO cidade VALUES (2914000,29,'IPIRA');
INSERT INTO cidade VALUES (4207601,42,'IPIRA');
INSERT INTO cidade VALUES (4110508,41,'IPIRANGA');
INSERT INTO cidade VALUES (5210158,52,'IPIRANGA DE GOIAS');
INSERT INTO cidade VALUES (5104526,51,'IPIRANGA DO NORTE');
INSERT INTO cidade VALUES (2204808,22,'IPIRANGA DO PIAUI');
INSERT INTO cidade VALUES (4310462,43,'IPIRANGA DO SUL');
INSERT INTO cidade VALUES (1301803,13,'IPIXUNA');
INSERT INTO cidade VALUES (1503457,15,'IPIXUNA DO PARA');
INSERT INTO cidade VALUES (2607208,26,'IPOJUCA');
INSERT INTO cidade VALUES (5210208,52,'IPORA');
INSERT INTO cidade VALUES (4110607,41,'IPORA');
INSERT INTO cidade VALUES (4207650,42,'IPORA DO OESTE');
INSERT INTO cidade VALUES (3521200,35,'IPORANGA');
INSERT INTO cidade VALUES (2305803,23,'IPU');
INSERT INTO cidade VALUES (3521309,35,'IPUA');
INSERT INTO cidade VALUES (4207684,42,'IPUACU');
INSERT INTO cidade VALUES (2607307,26,'IPUBI');
INSERT INTO cidade VALUES (2404804,24,'IPUEIRA');
INSERT INTO cidade VALUES (1709807,17,'IPUEIRAS');
INSERT INTO cidade VALUES (2305902,23,'IPUEIRAS');
INSERT INTO cidade VALUES (3131505,31,'IPUIUNA');
INSERT INTO cidade VALUES (4207700,42,'IPUMIRIM');
INSERT INTO cidade VALUES (2914109,29,'IPUPIARA');
INSERT INTO cidade VALUES (2306009,23,'IRACEMA');
INSERT INTO cidade VALUES (1400282,14,'IRACEMA');
INSERT INTO cidade VALUES (4110656,41,'IRACEMA DO OESTE');
INSERT INTO cidade VALUES (3521408,35,'IRACEMAPOLIS');
INSERT INTO cidade VALUES (4207759,42,'IRACEMINHA');
INSERT INTO cidade VALUES (4310504,43,'IRAI');
INSERT INTO cidade VALUES (3131604,31,'IRAI DE MINAS');
INSERT INTO cidade VALUES (2914208,29,'IRAJUBA');
INSERT INTO cidade VALUES (2914307,29,'IRAMAIA');
INSERT INTO cidade VALUES (1301852,13,'IRANDUBA');
INSERT INTO cidade VALUES (4207809,42,'IRANI');
INSERT INTO cidade VALUES (3521507,35,'IRAPUA');
INSERT INTO cidade VALUES (3521606,35,'IRAPURU');
INSERT INTO cidade VALUES (2914406,29,'IRAQUARA');
INSERT INTO cidade VALUES (2914505,29,'IRARA');
INSERT INTO cidade VALUES (4110706,41,'IRATI');
INSERT INTO cidade VALUES (4207858,42,'IRATI');
INSERT INTO cidade VALUES (2306108,23,'IRAUCUBA');
INSERT INTO cidade VALUES (2914604,29,'IRECE');
INSERT INTO cidade VALUES (4110805,41,'IRETAMA');
INSERT INTO cidade VALUES (4207908,42,'IRINEOPOLIS');
INSERT INTO cidade VALUES (1503507,15,'IRITUIA');
INSERT INTO cidade VALUES (3202652,32,'IRUPI');
INSERT INTO cidade VALUES (2204907,22,'ISAIAS COELHO');
INSERT INTO cidade VALUES (5210307,52,'ISRAELANDIA');
INSERT INTO cidade VALUES (4208005,42,'ITA');
INSERT INTO cidade VALUES (4310538,43,'ITAARA');
INSERT INTO cidade VALUES (2802908,28,'ITABAIANA');
INSERT INTO cidade VALUES (2506905,25,'ITABAIANA');
INSERT INTO cidade VALUES (2803005,28,'ITABAIANINHA');
INSERT INTO cidade VALUES (2914653,29,'ITABELA');
INSERT INTO cidade VALUES (3521705,35,'ITABERA');
INSERT INTO cidade VALUES (2914703,29,'ITABERABA');
INSERT INTO cidade VALUES (5210406,52,'ITABERAI');
INSERT INTO cidade VALUES (2803104,28,'ITABI');
INSERT INTO cidade VALUES (3131703,31,'ITABIRA');
INSERT INTO cidade VALUES (3131802,31,'ITABIRINHA DE MANTENA');
INSERT INTO cidade VALUES (3131901,31,'ITABIRITO');
INSERT INTO cidade VALUES (3301900,33,'ITABORAI');
INSERT INTO cidade VALUES (2914802,29,'ITABUNA');
INSERT INTO cidade VALUES (1710508,17,'ITACAJA');
INSERT INTO cidade VALUES (3132008,31,'ITACAMBIRA');
INSERT INTO cidade VALUES (3132107,31,'ITACARAMBI');
INSERT INTO cidade VALUES (2914901,29,'ITACARE');
INSERT INTO cidade VALUES (1301902,13,'ITACOATIARA');
INSERT INTO cidade VALUES (2607406,26,'ITACURUBA');
INSERT INTO cidade VALUES (4310553,43,'ITACURUBI');
INSERT INTO cidade VALUES (2915007,29,'ITAETE');
INSERT INTO cidade VALUES (2915106,29,'ITAGI');
INSERT INTO cidade VALUES (2915205,29,'ITAGIBA');
INSERT INTO cidade VALUES (2915304,29,'ITAGIMIRIM');
INSERT INTO cidade VALUES (3202702,32,'ITAGUACU');
INSERT INTO cidade VALUES (2915353,29,'ITAGUACU DA BAHIA');
INSERT INTO cidade VALUES (3302007,33,'ITAGUAI');
INSERT INTO cidade VALUES (4110904,41,'ITAGUAJE');
INSERT INTO cidade VALUES (3132206,31,'ITAGUARA');
INSERT INTO cidade VALUES (5210562,52,'ITAGUARI');
INSERT INTO cidade VALUES (5210604,52,'ITAGUARU');
INSERT INTO cidade VALUES (1710706,17,'ITAGUATINS');
INSERT INTO cidade VALUES (3521804,35,'ITAI');
INSERT INTO cidade VALUES (2607505,26,'ITAIBA');
INSERT INTO cidade VALUES (2306207,23,'ITAICABA');
INSERT INTO cidade VALUES (2205003,22,'ITAINOPOLIS');
INSERT INTO cidade VALUES (4208104,42,'ITAIOPOLIS');
INSERT INTO cidade VALUES (2105351,21,'ITAIPAVA DO GRAJAU');
INSERT INTO cidade VALUES (3132305,31,'ITAIPE');
INSERT INTO cidade VALUES (4110953,41,'ITAIPULANDIA');
INSERT INTO cidade VALUES (2306256,23,'ITAITINGA');
INSERT INTO cidade VALUES (1503606,15,'ITAITUBA');
INSERT INTO cidade VALUES (5210802,52,'ITAJA');
INSERT INTO cidade VALUES (2404853,24,'ITAJA');
INSERT INTO cidade VALUES (4208203,42,'ITAJAI');
INSERT INTO cidade VALUES (3521903,35,'ITAJOBI');
INSERT INTO cidade VALUES (3522000,35,'ITAJU');
INSERT INTO cidade VALUES (2915403,29,'ITAJU DO COLONIA');
INSERT INTO cidade VALUES (3132404,31,'ITAJUBA');
INSERT INTO cidade VALUES (2915502,29,'ITAJUIPE');
INSERT INTO cidade VALUES (3302056,33,'ITALVA');
INSERT INTO cidade VALUES (2607604,26,'ITAMARACA');
INSERT INTO cidade VALUES (2915601,29,'ITAMARAJU');
INSERT INTO cidade VALUES (3132503,31,'ITAMARANDIBA');
INSERT INTO cidade VALUES (1301951,13,'ITAMARATI');
INSERT INTO cidade VALUES (3132602,31,'ITAMARATI DE MINAS');
INSERT INTO cidade VALUES (2915700,29,'ITAMARI');
INSERT INTO cidade VALUES (3132701,31,'ITAMBACURI');
INSERT INTO cidade VALUES (4111001,41,'ITAMBARACA');
INSERT INTO cidade VALUES (2607653,26,'ITAMBE');
INSERT INTO cidade VALUES (4111100,41,'ITAMBE');
INSERT INTO cidade VALUES (2915809,29,'ITAMBE');
INSERT INTO cidade VALUES (3132800,31,'ITAMBE DO MATO DENTRO');
INSERT INTO cidade VALUES (3132909,31,'ITAMOGI');
INSERT INTO cidade VALUES (3133006,31,'ITAMONTE');
INSERT INTO cidade VALUES (2915908,29,'ITANAGRA');
INSERT INTO cidade VALUES (3522109,35,'ITANHAEM');
INSERT INTO cidade VALUES (3133105,31,'ITANHANDU');
INSERT INTO cidade VALUES (5104542,51,'ITANHANGA');
INSERT INTO cidade VALUES (2916005,29,'ITANHEM');
INSERT INTO cidade VALUES (3133204,31,'ITANHOMI');
INSERT INTO cidade VALUES (3133303,31,'ITAOBIM');
INSERT INTO cidade VALUES (3522158,35,'ITAOCA');
INSERT INTO cidade VALUES (3302106,33,'ITAOCARA');
INSERT INTO cidade VALUES (5210901,52,'ITAPACI');
INSERT INTO cidade VALUES (2306306,23,'ITAPAGE');
INSERT INTO cidade VALUES (3133402,31,'ITAPAGIPE');
INSERT INTO cidade VALUES (2916104,29,'ITAPARICA');
INSERT INTO cidade VALUES (2916203,29,'ITAPE');
INSERT INTO cidade VALUES (2916302,29,'ITAPEBI');
INSERT INTO cidade VALUES (3133501,31,'ITAPECERICA');
INSERT INTO cidade VALUES (3522208,35,'ITAPECERICA DA SERRA');
INSERT INTO cidade VALUES (2105401,21,'ITAPECURU MIRIM');
INSERT INTO cidade VALUES (4111209,41,'ITAPEJARA D´OESTE');
INSERT INTO cidade VALUES (4208302,42,'ITAPEMA');
INSERT INTO cidade VALUES (3202801,32,'ITAPEMIRIM');
INSERT INTO cidade VALUES (4111258,41,'ITAPERUCU');
INSERT INTO cidade VALUES (3302205,33,'ITAPERUNA');
INSERT INTO cidade VALUES (2607703,26,'ITAPETIM');
INSERT INTO cidade VALUES (2916401,29,'ITAPETINGA');
INSERT INTO cidade VALUES (3522307,35,'ITAPETININGA');
INSERT INTO cidade VALUES (3133600,31,'ITAPEVA');
INSERT INTO cidade VALUES (3522406,35,'ITAPEVA');
INSERT INTO cidade VALUES (3522505,35,'ITAPEVI');
INSERT INTO cidade VALUES (2916500,29,'ITAPICURU');
INSERT INTO cidade VALUES (2306405,23,'ITAPIPOCA');
INSERT INTO cidade VALUES (3522604,35,'ITAPIRA');
INSERT INTO cidade VALUES (4208401,42,'ITAPIRANGA');
INSERT INTO cidade VALUES (1302009,13,'ITAPIRANGA');
INSERT INTO cidade VALUES (5211008,52,'ITAPIRAPUA');
INSERT INTO cidade VALUES (3522653,35,'ITAPIRAPUA PAULISTA');
INSERT INTO cidade VALUES (1710904,17,'ITAPIRATINS');
INSERT INTO cidade VALUES (2607752,26,'ITAPISSUMA');
INSERT INTO cidade VALUES (2916609,29,'ITAPITANGA');
INSERT INTO cidade VALUES (2306504,23,'ITAPIUNA');
INSERT INTO cidade VALUES (4208450,42,'ITAPOA');
INSERT INTO cidade VALUES (3522703,35,'ITAPOLIS');
INSERT INTO cidade VALUES (5004502,50,'ITAPORA');
INSERT INTO cidade VALUES (1711100,17,'ITAPORA DO TOCANTINS');
INSERT INTO cidade VALUES (2507002,25,'ITAPORANGA');
INSERT INTO cidade VALUES (3522802,35,'ITAPORANGA');
INSERT INTO cidade VALUES (2803203,28,'ITAPORANGA D´AJUDA');
INSERT INTO cidade VALUES (2507101,25,'ITAPOROROCA');
INSERT INTO cidade VALUES (1101104,11,'ITAPUA DO OESTE');
INSERT INTO cidade VALUES (4310579,43,'ITAPUCA');
INSERT INTO cidade VALUES (3522901,35,'ITAPUI');
INSERT INTO cidade VALUES (3523008,35,'ITAPURA');
INSERT INTO cidade VALUES (5211206,52,'ITAPURANGA');
INSERT INTO cidade VALUES (3523107,35,'ITAQUAQUECETUBA');
INSERT INTO cidade VALUES (2916708,29,'ITAQUARA');
INSERT INTO cidade VALUES (4310603,43,'ITAQUI');
INSERT INTO cidade VALUES (5004601,50,'ITAQUIRAI');
INSERT INTO cidade VALUES (2607802,26,'ITAQUITINGA');
INSERT INTO cidade VALUES (3202900,32,'ITARANA');
INSERT INTO cidade VALUES (2916807,29,'ITARANTIM');
INSERT INTO cidade VALUES (3523206,35,'ITARARE');
INSERT INTO cidade VALUES (2306553,23,'ITAREMA');
INSERT INTO cidade VALUES (3523305,35,'ITARIRI');
INSERT INTO cidade VALUES (5211305,52,'ITARUMA');
INSERT INTO cidade VALUES (4310652,43,'ITATI');
INSERT INTO cidade VALUES (3302254,33,'ITATIAIA');
INSERT INTO cidade VALUES (3133709,31,'ITATIAIUCU');
INSERT INTO cidade VALUES (3523404,35,'ITATIBA');
INSERT INTO cidade VALUES (4310702,43,'ITATIBA DO SUL');
INSERT INTO cidade VALUES (2916856,29,'ITATIM');
INSERT INTO cidade VALUES (3523503,35,'ITATINGA');
INSERT INTO cidade VALUES (2306603,23,'ITATIRA');
INSERT INTO cidade VALUES (2507200,25,'ITATUBA');
INSERT INTO cidade VALUES (2404903,24,'ITAU');
INSERT INTO cidade VALUES (3133758,31,'ITAU DE MINAS');
INSERT INTO cidade VALUES (5104559,51,'ITAUBA');
INSERT INTO cidade VALUES (1600253,16,'ITAUBAL');
INSERT INTO cidade VALUES (5211404,52,'ITAUCU');
INSERT INTO cidade VALUES (2205102,22,'ITAUEIRA');
INSERT INTO cidade VALUES (3133808,31,'ITAUNA');
INSERT INTO cidade VALUES (4111308,41,'ITAUNA DO SUL');
INSERT INTO cidade VALUES (3133907,31,'ITAVERAVA');
INSERT INTO cidade VALUES (3134004,31,'ITINGA');
INSERT INTO cidade VALUES (2105427,21,'ITINGA DO MARANHAO');
INSERT INTO cidade VALUES (5104609,51,'ITIQUIRA');
INSERT INTO cidade VALUES (3523602,35,'ITIRAPINA');
INSERT INTO cidade VALUES (3523701,35,'ITIRAPUA');
INSERT INTO cidade VALUES (2916906,29,'ITIRUCU');
INSERT INTO cidade VALUES (2917003,29,'ITIUBA');
INSERT INTO cidade VALUES (3523800,35,'ITOBI');
INSERT INTO cidade VALUES (2917102,29,'ITORORO');
INSERT INTO cidade VALUES (3523909,35,'ITU');
INSERT INTO cidade VALUES (2917201,29,'ITUACU');
INSERT INTO cidade VALUES (2917300,29,'ITUBERA');
INSERT INTO cidade VALUES (3134103,31,'ITUETA');
INSERT INTO cidade VALUES (3134202,31,'ITUIUTABA');
INSERT INTO cidade VALUES (5211503,52,'ITUMBIARA');
INSERT INTO cidade VALUES (3134301,31,'ITUMIRIM');
INSERT INTO cidade VALUES (3524006,35,'ITUPEVA');
INSERT INTO cidade VALUES (1503705,15,'ITUPIRANGA');
INSERT INTO cidade VALUES (4208500,42,'ITUPORANGA');
INSERT INTO cidade VALUES (3134400,31,'ITURAMA');
INSERT INTO cidade VALUES (3134509,31,'ITUTINGA');
INSERT INTO cidade VALUES (3524105,35,'ITUVERAVA');
INSERT INTO cidade VALUES (2917334,29,'IUIU');
INSERT INTO cidade VALUES (3203007,32,'IUNA');
INSERT INTO cidade VALUES (4111407,41,'IVAI');
INSERT INTO cidade VALUES (4111506,41,'IVAIPORA');
INSERT INTO cidade VALUES (4111555,41,'IVATE');
INSERT INTO cidade VALUES (4111605,41,'IVATUBA');
INSERT INTO cidade VALUES (5004700,50,'IVINHEMA');
INSERT INTO cidade VALUES (5211602,52,'IVOLANDIA');
INSERT INTO cidade VALUES (4310751,43,'IVORA');
INSERT INTO cidade VALUES (4310801,43,'IVOTI');
INSERT INTO cidade VALUES (2607901,26,'JABOATAO DO GUARARAPES');
INSERT INTO cidade VALUES (4208609,42,'JABORA');
INSERT INTO cidade VALUES (2917359,29,'JABORANDI');
INSERT INTO cidade VALUES (3524204,35,'JABORANDI');
INSERT INTO cidade VALUES (4111704,41,'JABOTI');
INSERT INTO cidade VALUES (4310850,43,'JABOTICABA');
INSERT INTO cidade VALUES (3524303,35,'JABOTICABAL');
INSERT INTO cidade VALUES (3134608,31,'JABOTICATUBAS');
INSERT INTO cidade VALUES (2405009,24,'JACANA');
INSERT INTO cidade VALUES (2917409,29,'JACARACI');
INSERT INTO cidade VALUES (2507309,25,'JACARAU');
INSERT INTO cidade VALUES (2703403,27,'JACARE DO HOMENS');
INSERT INTO cidade VALUES (1503754,15,'JACAREACANGA');
INSERT INTO cidade VALUES (3524402,35,'JACAREI');
INSERT INTO cidade VALUES (4111803,41,'JACAREZINHO');
INSERT INTO cidade VALUES (3524501,35,'JACI');
INSERT INTO cidade VALUES (5104807,51,'JACIARA');
INSERT INTO cidade VALUES (3134707,31,'JACINTO');
INSERT INTO cidade VALUES (4208708,42,'JACINTO MACHADO');
INSERT INTO cidade VALUES (2917508,29,'JACOBINA');
INSERT INTO cidade VALUES (2205151,22,'JACOBINA DO PIAUI');
INSERT INTO cidade VALUES (3134806,31,'JACUI');
INSERT INTO cidade VALUES (2703502,27,'JACUIPE');
INSERT INTO cidade VALUES (4310876,43,'JACUIZINHO');
INSERT INTO cidade VALUES (1503804,15,'JACUNDA');
INSERT INTO cidade VALUES (3524600,35,'JACUPIRANGA');
INSERT INTO cidade VALUES (4310900,43,'JACUTINGA');
INSERT INTO cidade VALUES (3134905,31,'JACUTINGA');
INSERT INTO cidade VALUES (4111902,41,'JAGUAPITA');
INSERT INTO cidade VALUES (2917607,29,'JAGUAQUARA');
INSERT INTO cidade VALUES (3135001,31,'JAGUARACU');
INSERT INTO cidade VALUES (4311007,43,'JAGUARAO');
INSERT INTO cidade VALUES (2917706,29,'JAGUARARI');
INSERT INTO cidade VALUES (3203056,32,'JAGUARE');
INSERT INTO cidade VALUES (2306702,23,'JAGUARETAMA');
INSERT INTO cidade VALUES (4311106,43,'JAGUARI');
INSERT INTO cidade VALUES (4112009,41,'JAGUARIAIVA');
INSERT INTO cidade VALUES (2306801,23,'JAGUARIBARA');
INSERT INTO cidade VALUES (2306900,23,'JAGUARIBE');
INSERT INTO cidade VALUES (2917805,29,'JAGUARIPE');
INSERT INTO cidade VALUES (3524709,35,'JAGUARIUNA');
INSERT INTO cidade VALUES (2307007,23,'JAGUARUANA');
INSERT INTO cidade VALUES (4208807,42,'JAGUARUNA');
INSERT INTO cidade VALUES (3135050,31,'JAIBA');
INSERT INTO cidade VALUES (2205201,22,'JAICOS');
INSERT INTO cidade VALUES (3524808,35,'JALES');
INSERT INTO cidade VALUES (3524907,35,'JAMBEIRO');
INSERT INTO cidade VALUES (3135076,31,'JAMPRUCA');
INSERT INTO cidade VALUES (3135100,31,'JANAUBA');
INSERT INTO cidade VALUES (5211701,52,'JANDAIA');
INSERT INTO cidade VALUES (4112108,41,'JANDAIA DO SUL');
INSERT INTO cidade VALUES (2917904,29,'JANDAIRA');
INSERT INTO cidade VALUES (2405108,24,'JANDAIRA');
INSERT INTO cidade VALUES (3525003,35,'JANDIRA');
INSERT INTO cidade VALUES (2405207,24,'JANDUIS');
INSERT INTO cidade VALUES (5104906,51,'JANGADA');
INSERT INTO cidade VALUES (4112207,41,'JANIOPOLIS');
INSERT INTO cidade VALUES (3135209,31,'JANUARIA');
INSERT INTO cidade VALUES (2405306,24,'JANUARIO CICCO');
INSERT INTO cidade VALUES (3135308,31,'JAPARAIBA');
INSERT INTO cidade VALUES (2703601,27,'JAPARATINGA');
INSERT INTO cidade VALUES (2803302,28,'JAPARATUBA');
INSERT INTO cidade VALUES (3302270,33,'JAPERI');
INSERT INTO cidade VALUES (2405405,24,'JAPI');
INSERT INTO cidade VALUES (4112306,41,'JAPIRA');
INSERT INTO cidade VALUES (2803401,28,'JAPOATA');
INSERT INTO cidade VALUES (3135357,31,'JAPONVAR');
INSERT INTO cidade VALUES (5004809,50,'JAPORA');
INSERT INTO cidade VALUES (4112405,41,'JAPURA');
INSERT INTO cidade VALUES (1302108,13,'JAPURA');
INSERT INTO cidade VALUES (2607950,26,'JAQUEIRA');
INSERT INTO cidade VALUES (4311122,43,'JAQUIRANA');
INSERT INTO cidade VALUES (5211800,52,'JARAGUA');
INSERT INTO cidade VALUES (4208906,42,'JARAGUA DO SUL');
INSERT INTO cidade VALUES (5004908,50,'JARAGUARI');
INSERT INTO cidade VALUES (2703700,27,'JARAMATAIA');
INSERT INTO cidade VALUES (5005004,50,'JARDIM');
INSERT INTO cidade VALUES (2307106,23,'JARDIM');
INSERT INTO cidade VALUES (4112504,41,'JARDIM ALEGRE');
INSERT INTO cidade VALUES (2405504,24,'JARDIM DE ANGICOS');
INSERT INTO cidade VALUES (2405603,24,'JARDIM DE PIRANHAS');
INSERT INTO cidade VALUES (2205250,22,'JARDIM DO MULATO');
INSERT INTO cidade VALUES (2405702,24,'JARDIM DO SERIDO');
INSERT INTO cidade VALUES (4112603,41,'JARDIM OLINDA');
INSERT INTO cidade VALUES (4208955,42,'JARDINOPOLIS');
INSERT INTO cidade VALUES (3525102,35,'JARDINOPOLIS');
INSERT INTO cidade VALUES (4311130,43,'JARI');
INSERT INTO cidade VALUES (3525201,35,'JARINU');
INSERT INTO cidade VALUES (1100114,11,'JARU');
INSERT INTO cidade VALUES (5211909,52,'JATAI');
INSERT INTO cidade VALUES (4112702,41,'JATAIZINHO');
INSERT INTO cidade VALUES (2608008,26,'JATAUBA');
INSERT INTO cidade VALUES (5005103,50,'JATEI');
INSERT INTO cidade VALUES (2307205,23,'JATI');
INSERT INTO cidade VALUES (2105450,21,'JATOBA');
INSERT INTO cidade VALUES (2608057,26,'JATOBA');
INSERT INTO cidade VALUES (2205276,22,'JATOBA DO PIAUI');
INSERT INTO cidade VALUES (3525300,35,'JAU');
INSERT INTO cidade VALUES (1711506,17,'JAU DO TOCANTINS');
INSERT INTO cidade VALUES (5212006,52,'JAUPACI');
INSERT INTO cidade VALUES (5105002,51,'JAURU');
INSERT INTO cidade VALUES (3135407,31,'JECEABA');
INSERT INTO cidade VALUES (3135456,31,'JENIPAPO DE MINAS');
INSERT INTO cidade VALUES (2105476,21,'JENIPAPO DO VIEIRAS');
INSERT INTO cidade VALUES (3135506,31,'JEQUERI');
INSERT INTO cidade VALUES (2703759,27,'JEQUIA DA PRAIA');
INSERT INTO cidade VALUES (2918001,29,'JEQUIE');
INSERT INTO cidade VALUES (3135605,31,'JEQUITAI');
INSERT INTO cidade VALUES (3135704,31,'JEQUITIBA');
INSERT INTO cidade VALUES (3135803,31,'JEQUITINHONHA');
INSERT INTO cidade VALUES (2918100,29,'JEREMOABO');
INSERT INTO cidade VALUES (2507408,25,'JERICO');
INSERT INTO cidade VALUES (3525409,35,'JERIQUARA');
INSERT INTO cidade VALUES (3203106,32,'JERONIMO MONTEIRO');
INSERT INTO cidade VALUES (2205300,22,'JERUMENHA');
INSERT INTO cidade VALUES (3135902,31,'JESUANIA');
INSERT INTO cidade VALUES (4112751,41,'JESUITAS');
INSERT INTO cidade VALUES (5212055,52,'JESUPOLIS');
INSERT INTO cidade VALUES (2307254,23,'JIJOCA DE JERICOACOARA');
INSERT INTO cidade VALUES (1100122,11,'JI-PARANA');
INSERT INTO cidade VALUES (2918209,29,'JIQUIRICA');
INSERT INTO cidade VALUES (2918308,29,'JITAUNA');
INSERT INTO cidade VALUES (4209003,42,'JOACABA');
INSERT INTO cidade VALUES (3136009,31,'JOAIMA');
INSERT INTO cidade VALUES (3136108,31,'JOANESIA');
INSERT INTO cidade VALUES (3525508,35,'JOANOPOLIS');
INSERT INTO cidade VALUES (2608107,26,'JOAO ALFREDO');
INSERT INTO cidade VALUES (2405801,24,'JOAO CAMARA');
INSERT INTO cidade VALUES (2205359,22,'JOAO COSTA');
INSERT INTO cidade VALUES (2405900,24,'JOAO DIAS');
INSERT INTO cidade VALUES (2918357,29,'JOAO DOURADO');
INSERT INTO cidade VALUES (2105500,21,'JOAO LISBOA');
INSERT INTO cidade VALUES (3136207,31,'JOAO MONLEVADE');
INSERT INTO cidade VALUES (3203130,32,'JOAO NEIVA');
INSERT INTO cidade VALUES (2507507,25,'JOAO PESSOA');
INSERT INTO cidade VALUES (3136306,31,'JOAO PINHEIRO');
INSERT INTO cidade VALUES (3525607,35,'JOAO RAMALHO');
INSERT INTO cidade VALUES (3136405,31,'JOAQUIM FELICIO');
INSERT INTO cidade VALUES (2703809,27,'JOAQUIM GOMES');
INSERT INTO cidade VALUES (2608206,26,'JOAQUIM NABUCO');
INSERT INTO cidade VALUES (2205409,22,'JOAQUIM PIRES');
INSERT INTO cidade VALUES (4112801,41,'JOAQUIM TAVORA');
INSERT INTO cidade VALUES (2205458,22,'JOCA MARQUES');
INSERT INTO cidade VALUES (4311155,43,'JOIA');
INSERT INTO cidade VALUES (4209102,42,'JOINVILLE');
INSERT INTO cidade VALUES (3136504,31,'JORDANIA');
INSERT INTO cidade VALUES (1200328,12,'JORDAO');
INSERT INTO cidade VALUES (4209151,42,'JOSE BOITEUX');
INSERT INTO cidade VALUES (3525706,35,'JOSE BONIFACIO');
INSERT INTO cidade VALUES (2406007,24,'JOSE DA PENHA');
INSERT INTO cidade VALUES (2205508,22,'JOSE DE FREITAS');
INSERT INTO cidade VALUES (3136520,31,'JOSE GONCALVES DE MINAS');
INSERT INTO cidade VALUES (3136553,31,'JOSE RAYDAN');
INSERT INTO cidade VALUES (2105609,21,'JOSELANDIA');
INSERT INTO cidade VALUES (3136579,31,'JOSENOPOLIS');
INSERT INTO cidade VALUES (5212105,52,'JOVIANIA');
INSERT INTO cidade VALUES (5105101,51,'JUARA');
INSERT INTO cidade VALUES (2507606,25,'JUAREZ TAVORA');
INSERT INTO cidade VALUES (1711803,17,'JUARINA');
INSERT INTO cidade VALUES (3136652,31,'JUATUBA');
INSERT INTO cidade VALUES (2507705,25,'JUAZEIRINHO');
INSERT INTO cidade VALUES (2918407,29,'JUAZEIRO');
INSERT INTO cidade VALUES (2307304,23,'JUAZEIRO DO NORTE');
INSERT INTO cidade VALUES (2205516,22,'JUAZEIRO DO PIAUI');
INSERT INTO cidade VALUES (2307403,23,'JUCAS');
INSERT INTO cidade VALUES (2608255,26,'JUCATI');
INSERT INTO cidade VALUES (2918456,29,'JUCURUCU');
INSERT INTO cidade VALUES (2406106,24,'JUCURUTU');
INSERT INTO cidade VALUES (5105150,51,'JUINA');
INSERT INTO cidade VALUES (3136702,31,'JUIZ DE FORA');
INSERT INTO cidade VALUES (2205524,22,'JULIO BORGES');
INSERT INTO cidade VALUES (4311205,43,'JULIO DE CASTILHOS');
INSERT INTO cidade VALUES (3525805,35,'JULIO MESQUITA');
INSERT INTO cidade VALUES (3525854,35,'JUMIRIM');
INSERT INTO cidade VALUES (2105658,21,'JUNCO DO MARANHAO');
INSERT INTO cidade VALUES (2507804,25,'JUNCO DO SERIDO');
INSERT INTO cidade VALUES (2406155,24,'JUNDIA');
INSERT INTO cidade VALUES (2703908,27,'JUNDIA');
INSERT INTO cidade VALUES (3525904,35,'JUNDIAI');
INSERT INTO cidade VALUES (4112900,41,'JUNDIAI DO SUL');
INSERT INTO cidade VALUES (2704005,27,'JUNQUEIRO');
INSERT INTO cidade VALUES (3526001,35,'JUNQUEIROPOLIS');
INSERT INTO cidade VALUES (2608305,26,'JUPI');
INSERT INTO cidade VALUES (4209177,42,'JUPIA');
INSERT INTO cidade VALUES (3526100,35,'JUQUIA');
INSERT INTO cidade VALUES (3526209,35,'JUQUITIBA');
INSERT INTO cidade VALUES (3136801,31,'JURAMENTO');
INSERT INTO cidade VALUES (4112959,41,'JURANDA');
INSERT INTO cidade VALUES (2205532,22,'JUREMA');
INSERT INTO cidade VALUES (2608404,26,'JUREMA');
INSERT INTO cidade VALUES (2507903,25,'JURIPIRANGA');
INSERT INTO cidade VALUES (2508000,25,'JURU');
INSERT INTO cidade VALUES (1302207,13,'JURUA');
INSERT INTO cidade VALUES (3136900,31,'JURUAIA');
INSERT INTO cidade VALUES (5105176,51,'JURUENA');
INSERT INTO cidade VALUES (1503903,15,'JURUTI');
INSERT INTO cidade VALUES (5105200,51,'JUSCIMEIRA');
INSERT INTO cidade VALUES (4113007,41,'JUSSARA');
INSERT INTO cidade VALUES (2918506,29,'JUSSARA');
INSERT INTO cidade VALUES (5212204,52,'JUSSARA');
INSERT INTO cidade VALUES (2918555,29,'JUSSARI');
INSERT INTO cidade VALUES (2918605,29,'JUSSIAPE');
INSERT INTO cidade VALUES (1302306,13,'JUTAI');
INSERT INTO cidade VALUES (5005152,50,'JUTI');
INSERT INTO cidade VALUES (3136959,31,'JUVENILIA');
INSERT INTO cidade VALUES (4113106,41,'KALORE');
INSERT INTO cidade VALUES (1302405,13,'LABREA');
INSERT INTO cidade VALUES (4209201,42,'LACERDOPOLIS');
INSERT INTO cidade VALUES (3137007,31,'LADAINHA');
INSERT INTO cidade VALUES (5005202,50,'LADARIO');
INSERT INTO cidade VALUES (2918704,29,'LAFAIETE COUTINHO');
INSERT INTO cidade VALUES (3137106,31,'LAGAMAR');
INSERT INTO cidade VALUES (2803500,28,'LAGARTO');
INSERT INTO cidade VALUES (4209300,42,'LAGES');
INSERT INTO cidade VALUES (2105708,21,'LAGO DA PEDRA');
INSERT INTO cidade VALUES (2105807,21,'LAGO DO JUNCO');
INSERT INTO cidade VALUES (2105948,21,'LAGO DO RODRIGUES');
INSERT INTO cidade VALUES (2105906,21,'LAGO VERDE');
INSERT INTO cidade VALUES (2508109,25,'LAGOA');
INSERT INTO cidade VALUES (2205557,22,'LAGOA ALEGRE');
INSERT INTO cidade VALUES (4311239,43,'LAGOA BONITA DO SUL');
INSERT INTO cidade VALUES (2704104,27,'LAGOA DA CANOA');
INSERT INTO cidade VALUES (1711902,17,'LAGOA DA CONFUSAO');
INSERT INTO cidade VALUES (3137205,31,'LAGOA DA PRATA');
INSERT INTO cidade VALUES (2406205,24,'LAGOA D´ANTA');
INSERT INTO cidade VALUES (2508208,25,'LAGOA DE DENTRO');
INSERT INTO cidade VALUES (2406304,24,'LAGOA DE PEDRAS');
INSERT INTO cidade VALUES (2205573,22,'LAGOA DE SAO FRANCISCO');
INSERT INTO cidade VALUES (2406403,24,'LAGOA DE VELHOS');
INSERT INTO cidade VALUES (2205565,22,'LAGOA DO BARRO DO PIAUI');
INSERT INTO cidade VALUES (2608453,26,'LAGOA DO CARRO');
INSERT INTO cidade VALUES (2608701,26,'LAGOA DO GATOS');
INSERT INTO cidade VALUES (2608503,26,'LAGOA DO ITAENGA');
INSERT INTO cidade VALUES (2105922,21,'LAGOA DO MATO');
INSERT INTO cidade VALUES (2608602,26,'LAGOA DO OURO');
INSERT INTO cidade VALUES (3137304,31,'LAGOA DO PATOS');
INSERT INTO cidade VALUES (2205581,22,'LAGOA DO PIAUI');
INSERT INTO cidade VALUES (2205599,22,'LAGOA DO SITIO');
INSERT INTO cidade VALUES (1711951,17,'LAGOA DO TOCANTINS');
INSERT INTO cidade VALUES (4311270,43,'LAGOA DO TRES CANTOS');
INSERT INTO cidade VALUES (3137403,31,'LAGOA DOURADA');
INSERT INTO cidade VALUES (3137502,31,'LAGOA FORMOSA');
INSERT INTO cidade VALUES (3137536,31,'LAGOA GRANDE');
INSERT INTO cidade VALUES (2608750,26,'LAGOA GRANDE');
INSERT INTO cidade VALUES (2105963,21,'LAGOA GRANDE DO MARANHAO');
INSERT INTO cidade VALUES (2406502,24,'LAGOA NOVA');
INSERT INTO cidade VALUES (2918753,29,'LAGOA REAL');
INSERT INTO cidade VALUES (2406601,24,'LAGOA SALGADA');
INSERT INTO cidade VALUES (3137601,31,'LAGOA SANTA');
INSERT INTO cidade VALUES (5212253,52,'LAGOA SANTA');
INSERT INTO cidade VALUES (2508307,25,'LAGOA SECA');
INSERT INTO cidade VALUES (4311304,43,'LAGOA VERMELHA');
INSERT INTO cidade VALUES (4311254,43,'LAGOAO');
INSERT INTO cidade VALUES (3526308,35,'LAGOINHA');
INSERT INTO cidade VALUES (2205540,22,'LAGOINHA DO PIAUI');
INSERT INTO cidade VALUES (4209409,42,'LAGUNA');
INSERT INTO cidade VALUES (5005251,50,'LAGUNA CARAPA');
INSERT INTO cidade VALUES (2918803,29,'LAJE');
INSERT INTO cidade VALUES (3302304,33,'LAJE DO MURIAE');
INSERT INTO cidade VALUES (4311403,43,'LAJEADO');
INSERT INTO cidade VALUES (1712009,17,'LAJEADO');
INSERT INTO cidade VALUES (4311429,43,'LAJEADO DO BUGRE');
INSERT INTO cidade VALUES (4209458,42,'LAJEADO GRANDE');
INSERT INTO cidade VALUES (2105989,21,'LAJEADO NOVO');
INSERT INTO cidade VALUES (2918902,29,'LAJEDAO');
INSERT INTO cidade VALUES (2919009,29,'LAJEDINHO');
INSERT INTO cidade VALUES (2608800,26,'LAJEDO');
INSERT INTO cidade VALUES (2919058,29,'LAJEDO DO TABOCAL');
INSERT INTO cidade VALUES (2406700,24,'LAJES');
INSERT INTO cidade VALUES (2406809,24,'LAJES PINTADAS');
INSERT INTO cidade VALUES (3137700,31,'LAJINHA');
INSERT INTO cidade VALUES (2919108,29,'LAMARAO');
INSERT INTO cidade VALUES (3137809,31,'LAMBARI');
INSERT INTO cidade VALUES (5105234,51,'LAMBARI D´OESTE');
INSERT INTO cidade VALUES (3137908,31,'LAMIM');
INSERT INTO cidade VALUES (2205607,22,'LANDRI SALES');
INSERT INTO cidade VALUES (4113205,41,'LAPA');
INSERT INTO cidade VALUES (2919157,29,'LAPAO');
INSERT INTO cidade VALUES (3203163,32,'LARANJA DA TERRA');
INSERT INTO cidade VALUES (3138005,31,'LARANJAL');
INSERT INTO cidade VALUES (4113254,41,'LARANJAL');
INSERT INTO cidade VALUES (1600279,16,'LARANJAL DO JARI');
INSERT INTO cidade VALUES (3526407,35,'LARANJAL PAULISTA');
INSERT INTO cidade VALUES (2803609,28,'LARANJEIRAS');
INSERT INTO cidade VALUES (4113304,41,'LARANJEIRAS DO SUL');
INSERT INTO cidade VALUES (3138104,31,'LASSANCE');
INSERT INTO cidade VALUES (2508406,25,'LASTRO');
INSERT INTO cidade VALUES (4209508,42,'LAURENTINO');
INSERT INTO cidade VALUES (2919207,29,'LAURO DE FREITAS');
INSERT INTO cidade VALUES (4209607,42,'LAURO MULLER');
INSERT INTO cidade VALUES (1712157,17,'LAVANDEIRA');
INSERT INTO cidade VALUES (3526506,35,'LAVINIA');
INSERT INTO cidade VALUES (3138203,31,'LAVRAS');
INSERT INTO cidade VALUES (2307502,23,'LAVRAS DA MANGABEIRA');
INSERT INTO cidade VALUES (4311502,43,'LAVRAS DO SUL');
INSERT INTO cidade VALUES (3526605,35,'LAVRINHAS');
INSERT INTO cidade VALUES (3138302,31,'LEANDRO FERREIRA');
INSERT INTO cidade VALUES (4209706,42,'LEBON REGIS');
INSERT INTO cidade VALUES (3526704,35,'LEME');
INSERT INTO cidade VALUES (3138351,31,'LEME DO PRADO');
INSERT INTO cidade VALUES (2919306,29,'LENCOIS');
INSERT INTO cidade VALUES (3526803,35,'LENCOIS PAULISTA');
INSERT INTO cidade VALUES (4209805,42,'LEOBERTO LEAL');
INSERT INTO cidade VALUES (3138401,31,'LEOPOLDINA');
INSERT INTO cidade VALUES (5212303,52,'LEOPOLDO DE BULHOES');
INSERT INTO cidade VALUES (4113403,41,'LEOPOLIS');
INSERT INTO cidade VALUES (4311601,43,'LIBERATO SALZANO');
INSERT INTO cidade VALUES (3138500,31,'LIBERDADE');
INSERT INTO cidade VALUES (2919405,29,'LICINIO DE ALMEIDA');
INSERT INTO cidade VALUES (4113429,41,'LIDIANOPOLIS');
INSERT INTO cidade VALUES (2106003,21,'LIMA CAMPOS');
INSERT INTO cidade VALUES (3138609,31,'LIMA DUARTE');
INSERT INTO cidade VALUES (3526902,35,'LIMEIRA');
INSERT INTO cidade VALUES (3138625,31,'LIMEIRA DO OESTE');
INSERT INTO cidade VALUES (2608909,26,'LIMOEIRO');
INSERT INTO cidade VALUES (2704203,27,'LIMOEIRO DE ANADIA');
INSERT INTO cidade VALUES (1504000,15,'LIMOEIRO DO AJURU');
INSERT INTO cidade VALUES (2307601,23,'LIMOEIRO DO NORTE');
INSERT INTO cidade VALUES (4113452,41,'LINDOESTE');
INSERT INTO cidade VALUES (3527009,35,'LINDOIA');
INSERT INTO cidade VALUES (4209854,42,'LINDOIA DO SUL');
INSERT INTO cidade VALUES (4311627,43,'LINDOLFO COLLOR');
INSERT INTO cidade VALUES (4311643,43,'LINHA NOVA');
INSERT INTO cidade VALUES (3203205,32,'LINHARES');
INSERT INTO cidade VALUES (3527108,35,'LINS');
INSERT INTO cidade VALUES (2508505,25,'LIVRAMENTO');
INSERT INTO cidade VALUES (2919504,29,'LIVRAMENTO DE NOSSA SENHORA');
INSERT INTO cidade VALUES (1712405,17,'LIZARDA');
INSERT INTO cidade VALUES (4113502,41,'LOANDA');
INSERT INTO cidade VALUES (4113601,41,'LOBATO');
INSERT INTO cidade VALUES (2508554,25,'LOGRADOURO');
INSERT INTO cidade VALUES (4113700,41,'LONDRINA');
INSERT INTO cidade VALUES (3138658,31,'LONTRA');
INSERT INTO cidade VALUES (4209904,42,'LONTRAS');
INSERT INTO cidade VALUES (3527207,35,'LORENA');
INSERT INTO cidade VALUES (2106102,21,'LORETO');
INSERT INTO cidade VALUES (3527256,35,'LOURDES');
INSERT INTO cidade VALUES (3527306,35,'LOUVEIRA');
INSERT INTO cidade VALUES (5105259,51,'LUCAS DO RIO VERDE');
INSERT INTO cidade VALUES (3527405,35,'LUCELIA');
INSERT INTO cidade VALUES (2508604,25,'LUCENA');
INSERT INTO cidade VALUES (3527504,35,'LUCIANOPOLIS');
INSERT INTO cidade VALUES (5105309,51,'LUCIARA');
INSERT INTO cidade VALUES (2406908,24,'LUCRECIA');
INSERT INTO cidade VALUES (3527603,35,'LUIS ANTONIO');
INSERT INTO cidade VALUES (2205706,22,'LUIS CORREIA');
INSERT INTO cidade VALUES (2106201,21,'LUIS DOMINGUES');
INSERT INTO cidade VALUES (2919553,29,'LUIS EDUARDO MAGALHAES');
INSERT INTO cidade VALUES (2407005,24,'LUIS GOMES');
INSERT INTO cidade VALUES (3138674,31,'LUISBURGO');
INSERT INTO cidade VALUES (3138682,31,'LUISLANDIA');
INSERT INTO cidade VALUES (4210001,42,'LUIZ ALVES');
INSERT INTO cidade VALUES (4113734,41,'LUIZIANA');
INSERT INTO cidade VALUES (3527702,35,'LUIZIANIA');
INSERT INTO cidade VALUES (3138708,31,'LUMINARIAS');
INSERT INTO cidade VALUES (4113759,41,'LUNARDELLI');
INSERT INTO cidade VALUES (3527801,35,'LUPERCIO');
INSERT INTO cidade VALUES (4113809,41,'LUPIONOPOLIS');
INSERT INTO cidade VALUES (3527900,35,'LUTECIA');
INSERT INTO cidade VALUES (3138807,31,'LUZ');
INSERT INTO cidade VALUES (4210035,42,'LUZERNA');
INSERT INTO cidade VALUES (5212501,52,'LUZIANIA');
INSERT INTO cidade VALUES (2205805,22,'LUZILANDIA');
INSERT INTO cidade VALUES (1712454,17,'LUZINOPOLIS');
INSERT INTO cidade VALUES (3302403,33,'MACAE');
INSERT INTO cidade VALUES (2407104,24,'MACAIBA');
INSERT INTO cidade VALUES (2919603,29,'MACAJUBA');
INSERT INTO cidade VALUES (4311718,43,'MACAMBARA');
INSERT INTO cidade VALUES (2803708,28,'MACAMBIRA');
INSERT INTO cidade VALUES (1600303,16,'MACAPA');
INSERT INTO cidade VALUES (2609006,26,'MACAPARANA');
INSERT INTO cidade VALUES (2919702,29,'MACARANI');
INSERT INTO cidade VALUES (3528007,35,'MACATUBA');
INSERT INTO cidade VALUES (2407203,24,'MACAU');
INSERT INTO cidade VALUES (3528106,35,'MACAUBAL');
INSERT INTO cidade VALUES (2919801,29,'MACAUBAS');
INSERT INTO cidade VALUES (3528205,35,'MACEDONIA');
INSERT INTO cidade VALUES (2704302,27,'MACEIO');
INSERT INTO cidade VALUES (3138906,31,'MACHACALIS');
INSERT INTO cidade VALUES (4311700,43,'MACHADINHO');
INSERT INTO cidade VALUES (1100130,11,'MACHADINHO D´OESTE');
INSERT INTO cidade VALUES (3139003,31,'MACHADO');
INSERT INTO cidade VALUES (2609105,26,'MACHADOS');
INSERT INTO cidade VALUES (4210050,42,'MACIEIRA');
INSERT INTO cidade VALUES (3302452,33,'MACUCO');
INSERT INTO cidade VALUES (2919900,29,'MACURURE');
INSERT INTO cidade VALUES (2307635,23,'MADALENA');
INSERT INTO cidade VALUES (2205854,22,'MADEIRO');
INSERT INTO cidade VALUES (2919926,29,'MADRE DE DEUS');
INSERT INTO cidade VALUES (3139102,31,'MADRE DE DEUS DE MINAS');
INSERT INTO cidade VALUES (2508703,25,'MAE D´AGUA');
INSERT INTO cidade VALUES (1504059,15,'MAE DO RIO');
INSERT INTO cidade VALUES (2919959,29,'MAETINGA');
INSERT INTO cidade VALUES (4210100,42,'MAFRA');
INSERT INTO cidade VALUES (1504109,15,'MAGALHAES BARATA');
INSERT INTO cidade VALUES (2106300,21,'MAGALHAES DE ALMEIDA');
INSERT INTO cidade VALUES (3528304,35,'MAGDA');
INSERT INTO cidade VALUES (3302502,33,'MAGE');
INSERT INTO cidade VALUES (2920007,29,'MAIQUINIQUE');
INSERT INTO cidade VALUES (2920106,29,'MAIRI');
INSERT INTO cidade VALUES (3528403,35,'MAIRINQUE');
INSERT INTO cidade VALUES (3528502,35,'MAIRIPORA');
INSERT INTO cidade VALUES (5212600,52,'MAIRIPOTABA');
INSERT INTO cidade VALUES (4210209,42,'MAJOR GERCINO');
INSERT INTO cidade VALUES (2704401,27,'MAJOR ISIDORO');
INSERT INTO cidade VALUES (2407252,24,'MAJOR SALES');
INSERT INTO cidade VALUES (4210308,42,'MAJOR VIEIRA');
INSERT INTO cidade VALUES (3139201,31,'MALACACHETA');
INSERT INTO cidade VALUES (2920205,29,'MALHADA');
INSERT INTO cidade VALUES (2920304,29,'MALHADA DE PEDRAS');
INSERT INTO cidade VALUES (2803807,28,'MALHADA DO BOIS');
INSERT INTO cidade VALUES (2803906,28,'MALHADOR');
INSERT INTO cidade VALUES (4113908,41,'MALLET');
INSERT INTO cidade VALUES (2508802,25,'MALTA');
INSERT INTO cidade VALUES (2508901,25,'MAMANGUAPE');
INSERT INTO cidade VALUES (5212709,52,'MAMBAI');
INSERT INTO cidade VALUES (4114005,41,'MAMBORE');
INSERT INTO cidade VALUES (3139250,31,'MAMONAS');
INSERT INTO cidade VALUES (4311734,43,'MAMPITUBA');
INSERT INTO cidade VALUES (1302504,13,'MANACAPURU');
INSERT INTO cidade VALUES (2509008,25,'MANAIRA');
INSERT INTO cidade VALUES (1302553,13,'MANAQUIRI');
INSERT INTO cidade VALUES (2609154,26,'MANARI');
INSERT INTO cidade VALUES (1302603,13,'MANAUS');
INSERT INTO cidade VALUES (1200336,12,'MANCIO LIMA');
INSERT INTO cidade VALUES (4114104,41,'MANDAGUACU');
INSERT INTO cidade VALUES (4114203,41,'MANDAGUARI');
INSERT INTO cidade VALUES (4114302,41,'MANDIRITUBA');
INSERT INTO cidade VALUES (3528601,35,'MANDURI');
INSERT INTO cidade VALUES (4114351,41,'MANFRINOPOLIS');
INSERT INTO cidade VALUES (3139300,31,'MANGA');
INSERT INTO cidade VALUES (3302601,33,'MANGARATIBA');
INSERT INTO cidade VALUES (4114401,41,'MANGUEIRINHA');
INSERT INTO cidade VALUES (3139409,31,'MANHUACU');
INSERT INTO cidade VALUES (3139508,31,'MANHUMIRIM');
INSERT INTO cidade VALUES (1302702,13,'MANICORE');
INSERT INTO cidade VALUES (2205904,22,'MANOEL EMIDIO');
INSERT INTO cidade VALUES (4114500,41,'MANOEL RIBAS');
INSERT INTO cidade VALUES (1200344,12,'MANOEL URBANO');
INSERT INTO cidade VALUES (4311759,43,'MANOEL VIANA');
INSERT INTO cidade VALUES (2920403,29,'MANOEL VITORINO');
INSERT INTO cidade VALUES (2920452,29,'MANSIDAO');
INSERT INTO cidade VALUES (3139607,31,'MANTENA');
INSERT INTO cidade VALUES (3203304,32,'MANTENOPOLIS');
INSERT INTO cidade VALUES (4311775,43,'MAQUINE');
INSERT INTO cidade VALUES (3139805,31,'MAR DE ESPANHA');
INSERT INTO cidade VALUES (2704906,27,'MAR VERMELHO');
INSERT INTO cidade VALUES (5212808,52,'MARA ROSA');
INSERT INTO cidade VALUES (1302801,13,'MARAA');
INSERT INTO cidade VALUES (1504208,15,'MARABA');
INSERT INTO cidade VALUES (3528700,35,'MARABA PAULISTA');
INSERT INTO cidade VALUES (2106326,21,'MARACACUME');
INSERT INTO cidade VALUES (3528809,35,'MARACAI');
INSERT INTO cidade VALUES (4210407,42,'MARACAJA');
INSERT INTO cidade VALUES (5005400,50,'MARACAJU');
INSERT INTO cidade VALUES (1504307,15,'MARACANA');
INSERT INTO cidade VALUES (2307650,23,'MARACANAU');
INSERT INTO cidade VALUES (2920502,29,'MARACAS');
INSERT INTO cidade VALUES (2704500,27,'MARAGOGI');
INSERT INTO cidade VALUES (2920601,29,'MARAGOGIPE');
INSERT INTO cidade VALUES (2609204,26,'MARAIAL');
INSERT INTO cidade VALUES (2106359,21,'MARAJA DO SENA');
INSERT INTO cidade VALUES (2307700,23,'MARANGUAPE');
INSERT INTO cidade VALUES (2106375,21,'MARANHAOZINHO');
INSERT INTO cidade VALUES (1504406,15,'MARAPANIM');
INSERT INTO cidade VALUES (3528858,35,'MARAPOAMA');
INSERT INTO cidade VALUES (4311791,43,'MARATA');
INSERT INTO cidade VALUES (3203320,32,'MARATAIZES');
INSERT INTO cidade VALUES (2920700,29,'MARAU');
INSERT INTO cidade VALUES (4311809,43,'MARAU');
INSERT INTO cidade VALUES (2704609,27,'MARAVILHA');
INSERT INTO cidade VALUES (4210506,42,'MARAVILHA');
INSERT INTO cidade VALUES (3139706,31,'MARAVILHAS');
INSERT INTO cidade VALUES (2509057,25,'MARCACAO');
INSERT INTO cidade VALUES (5105580,51,'MARCELANDIA');
INSERT INTO cidade VALUES (4311908,43,'MARCELINO RAMOS');
INSERT INTO cidade VALUES (2407302,24,'MARCELINO VIEIRA');
INSERT INTO cidade VALUES (2920809,29,'MARCIONILIO SOUZA');
INSERT INTO cidade VALUES (2307809,23,'MARCO');
INSERT INTO cidade VALUES (2205953,22,'MARCOLANDIA');
INSERT INTO cidade VALUES (2206001,22,'MARCOS PARENTE');
INSERT INTO cidade VALUES (4114609,41,'MARECHAL CANDIDO RONDON');
INSERT INTO cidade VALUES (2704708,27,'MARECHAL DEODORO');
INSERT INTO cidade VALUES (3203346,32,'MARECHAL FLORIANO');
INSERT INTO cidade VALUES (1200351,12,'MARECHAL THAUMATURGO');
INSERT INTO cidade VALUES (4210555,42,'MAREMA');
INSERT INTO cidade VALUES (2509107,25,'MARI');
INSERT INTO cidade VALUES (3139904,31,'MARIA DA FE');
INSERT INTO cidade VALUES (4114708,41,'MARIA HELENA');
INSERT INTO cidade VALUES (4114807,41,'MARIALVA');
INSERT INTO cidade VALUES (3140001,31,'MARIANA');
INSERT INTO cidade VALUES (4311981,43,'MARIANA PIMENTEL');
INSERT INTO cidade VALUES (4312005,43,'MARIANO MORO');
INSERT INTO cidade VALUES (1712504,17,'MARIANOPOLIS DO TOCANTINS');
INSERT INTO cidade VALUES (3528908,35,'MARIAPOLIS');
INSERT INTO cidade VALUES (2704807,27,'MARIBONDO');
INSERT INTO cidade VALUES (3302700,33,'MARICA');
INSERT INTO cidade VALUES (3140100,31,'MARILAC');
INSERT INTO cidade VALUES (3203353,32,'MARILANDIA');
INSERT INTO cidade VALUES (4114906,41,'MARILANDIA DO SUL');
INSERT INTO cidade VALUES (4115002,41,'MARILENA');
INSERT INTO cidade VALUES (3529005,35,'MARILIA');
INSERT INTO cidade VALUES (4115101,41,'MARILUZ');
INSERT INTO cidade VALUES (4115200,41,'MARINGA');
INSERT INTO cidade VALUES (3529104,35,'MARINOPOLIS');
INSERT INTO cidade VALUES (3140159,31,'MARIO CAMPOS');
INSERT INTO cidade VALUES (4115309,41,'MARIOPOLIS');
INSERT INTO cidade VALUES (4115358,41,'MARIPA');
INSERT INTO cidade VALUES (3140209,31,'MARIPA DE MINAS');
INSERT INTO cidade VALUES (1504422,15,'MARITUBA');
INSERT INTO cidade VALUES (2509156,25,'MARIZOPOLIS');
INSERT INTO cidade VALUES (3140308,31,'MARLIERIA');
INSERT INTO cidade VALUES (4115408,41,'MARMELEIRO');
INSERT INTO cidade VALUES (3140407,31,'MARMELOPOLIS');
INSERT INTO cidade VALUES (4312054,43,'MARQUES DE SOUZA');
INSERT INTO cidade VALUES (4115457,41,'MARQUINHO');
INSERT INTO cidade VALUES (3140506,31,'MARTINHO CAMPOS');
INSERT INTO cidade VALUES (2307908,23,'MARTINOPOLE');
INSERT INTO cidade VALUES (3529203,35,'MARTINOPOLIS');
INSERT INTO cidade VALUES (2407401,24,'MARTINS');
INSERT INTO cidade VALUES (3140530,31,'MARTINS SOARES');
INSERT INTO cidade VALUES (2804003,28,'MARUIM');
INSERT INTO cidade VALUES (4115507,41,'MARUMBI');
INSERT INTO cidade VALUES (5212907,52,'MARZAGAO');
INSERT INTO cidade VALUES (2920908,29,'MASCOTE');
INSERT INTO cidade VALUES (2308005,23,'MASSAPE');
INSERT INTO cidade VALUES (2206050,22,'MASSAPE DO PIAUI');
INSERT INTO cidade VALUES (4210605,42,'MASSARANDUBA');
INSERT INTO cidade VALUES (2509206,25,'MASSARANDUBA');
INSERT INTO cidade VALUES (4312104,43,'MATA');
INSERT INTO cidade VALUES (2921005,29,'MATA DE SAO JOAO');
INSERT INTO cidade VALUES (2705002,27,'MATA GRANDE');
INSERT INTO cidade VALUES (2106409,21,'MATA ROMA');
INSERT INTO cidade VALUES (3140555,31,'MATA VERDE');
INSERT INTO cidade VALUES (3529302,35,'MATAO');
INSERT INTO cidade VALUES (2509305,25,'MATARACA');
INSERT INTO cidade VALUES (1712702,17,'MATEIROS');
INSERT INTO cidade VALUES (4115606,41,'MATELANDIA');
INSERT INTO cidade VALUES (3140605,31,'MATERLANDIA');
INSERT INTO cidade VALUES (3140704,31,'MATEUS LEME');
INSERT INTO cidade VALUES (3171501,31,'MATHIAS LOBATO');
INSERT INTO cidade VALUES (3140803,31,'MATIAS BARBOSA');
INSERT INTO cidade VALUES (3140852,31,'MATIAS CARDOSO');
INSERT INTO cidade VALUES (2206100,22,'MATIAS OLIMPIO');
INSERT INTO cidade VALUES (2921054,29,'MATINA');
INSERT INTO cidade VALUES (2106508,21,'MATINHA');
INSERT INTO cidade VALUES (2509339,25,'MATINHAS');
INSERT INTO cidade VALUES (4115705,41,'MATINHOS');
INSERT INTO cidade VALUES (3140902,31,'MATIPO');
INSERT INTO cidade VALUES (4312138,43,'MATO CASTELHANO');
INSERT INTO cidade VALUES (2509370,25,'MATO GROSSO');
INSERT INTO cidade VALUES (4312153,43,'MATO LEITAO');
INSERT INTO cidade VALUES (4312179,43,'MATO QUEIMADO');
INSERT INTO cidade VALUES (4115739,41,'MATO RICO');
INSERT INTO cidade VALUES (3141009,31,'MATO VERDE');
INSERT INTO cidade VALUES (2106607,21,'MATOES');
INSERT INTO cidade VALUES (2106631,21,'MATOES DO NORTE');
INSERT INTO cidade VALUES (4210704,42,'MATOS COSTA');
INSERT INTO cidade VALUES (3141108,31,'MATOZINHOS');
INSERT INTO cidade VALUES (5212956,52,'MATRINCHA');
INSERT INTO cidade VALUES (2705101,27,'MATRIZ DE CAMARAGIBE');
INSERT INTO cidade VALUES (5105606,51,'MATUPA');
INSERT INTO cidade VALUES (2509396,25,'MATUREIA');
INSERT INTO cidade VALUES (3141207,31,'MATUTINA');
INSERT INTO cidade VALUES (3529401,35,'MAUA');
INSERT INTO cidade VALUES (4115754,41,'MAUA DA SERRA');
INSERT INTO cidade VALUES (1302900,13,'MAUES');
INSERT INTO cidade VALUES (5213004,52,'MAURILANDIA');
INSERT INTO cidade VALUES (1712801,17,'MAURILANDIA DO TOCANTINS');
INSERT INTO cidade VALUES (2308104,23,'MAURITI');
INSERT INTO cidade VALUES (2407500,24,'MAXARANGUAPE');
INSERT INTO cidade VALUES (4312203,43,'MAXIMILIANO DE ALMEIDA');
INSERT INTO cidade VALUES (1600402,16,'MAZAGAO');
INSERT INTO cidade VALUES (3141306,31,'MEDEIROS');
INSERT INTO cidade VALUES (2921104,29,'MEDEIROS NETO');
INSERT INTO cidade VALUES (4115804,41,'MEDIANEIRA');
INSERT INTO cidade VALUES (1504455,15,'MEDICILANDIA');
INSERT INTO cidade VALUES (3141405,31,'MEDINA');
INSERT INTO cidade VALUES (4210803,42,'MELEIRO');
INSERT INTO cidade VALUES (1504505,15,'MELGACO');
INSERT INTO cidade VALUES (3302809,33,'MENDES');
INSERT INTO cidade VALUES (3141504,31,'MENDES PIMENTEL');
INSERT INTO cidade VALUES (3529500,35,'MENDONCA');
INSERT INTO cidade VALUES (4115853,41,'MERCEDES');
INSERT INTO cidade VALUES (3141603,31,'MERCES');
INSERT INTO cidade VALUES (3529609,35,'MERIDIANO');
INSERT INTO cidade VALUES (2308203,23,'MERUOCA');
INSERT INTO cidade VALUES (3529658,35,'MESOPOLIS');
INSERT INTO cidade VALUES (3302858,33,'MESQUITA');
INSERT INTO cidade VALUES (3141702,31,'MESQUITA');
INSERT INTO cidade VALUES (2705200,27,'MESSIAS');
INSERT INTO cidade VALUES (2407609,24,'MESSIAS TARGINO');
INSERT INTO cidade VALUES (2206209,22,'MIGUEL ALVES');
INSERT INTO cidade VALUES (2921203,29,'MIGUEL CALMON');
INSERT INTO cidade VALUES (2206308,22,'MIGUEL LEAO');
INSERT INTO cidade VALUES (3302908,33,'MIGUEL PEREIRA');
INSERT INTO cidade VALUES (3529708,35,'MIGUELOPOLIS');
INSERT INTO cidade VALUES (2921302,29,'MILAGRES');
INSERT INTO cidade VALUES (2308302,23,'MILAGRES');
INSERT INTO cidade VALUES (2106672,21,'MILAGRES DO MARANHAO');
INSERT INTO cidade VALUES (2308351,23,'MILHA');
INSERT INTO cidade VALUES (2206357,22,'MILTON BRANDAO');
INSERT INTO cidade VALUES (5213053,52,'MIMOSO DE GOIAS');
INSERT INTO cidade VALUES (3203403,32,'MIMOSO DO SUL');
INSERT INTO cidade VALUES (5213087,52,'MINACU');
INSERT INTO cidade VALUES (2705309,27,'MINADOR DO NEGRAO');
INSERT INTO cidade VALUES (4312252,43,'MINAS DO LEAO');
INSERT INTO cidade VALUES (3141801,31,'MINAS NOVAS');
INSERT INTO cidade VALUES (3141900,31,'MINDURI');
INSERT INTO cidade VALUES (5213103,52,'MINEIROS');
INSERT INTO cidade VALUES (3529807,35,'MINEIROS DO TIETE');
INSERT INTO cidade VALUES (1101203,11,'MINISTRO ANDREAZZA');
INSERT INTO cidade VALUES (3530003,35,'MIRA ESTRELA');
INSERT INTO cidade VALUES (3142007,31,'MIRABELA');
INSERT INTO cidade VALUES (3529906,35,'MIRACATU');
INSERT INTO cidade VALUES (3303005,33,'MIRACEMA');
INSERT INTO cidade VALUES (1713205,17,'MIRACEMA DO TOCANTINS');
INSERT INTO cidade VALUES (2106706,21,'MIRADOR');
INSERT INTO cidade VALUES (4115903,41,'MIRADOR');
INSERT INTO cidade VALUES (3142106,31,'MIRADOURO');
INSERT INTO cidade VALUES (4312302,43,'MIRAGUAI');
INSERT INTO cidade VALUES (3142205,31,'MIRAI');
INSERT INTO cidade VALUES (2308377,23,'MIRAIMA');
INSERT INTO cidade VALUES (5005608,50,'MIRANDA');
INSERT INTO cidade VALUES (2106755,21,'MIRANDA DO NORTE');
INSERT INTO cidade VALUES (2609303,26,'MIRANDIBA');
INSERT INTO cidade VALUES (3530102,35,'MIRANDOPOLIS');
INSERT INTO cidade VALUES (2921401,29,'MIRANGABA');
INSERT INTO cidade VALUES (1713304,17,'MIRANORTE');
INSERT INTO cidade VALUES (2921450,29,'MIRANTE');
INSERT INTO cidade VALUES (1101302,11,'MIRANTE DA SERRA');
INSERT INTO cidade VALUES (3530201,35,'MIRANTE DO PARANAPANEMA');
INSERT INTO cidade VALUES (4116000,41,'MIRASELVA');
INSERT INTO cidade VALUES (3530300,35,'MIRASSOL');
INSERT INTO cidade VALUES (5105622,51,'MIRASSOL D´OESTE');
INSERT INTO cidade VALUES (3530409,35,'MIRASSOLANDIA');
INSERT INTO cidade VALUES (3142254,31,'MIRAVANIA');
INSERT INTO cidade VALUES (4210852,42,'MIRIM DOCE');
INSERT INTO cidade VALUES (2106805,21,'MIRINZAL');
INSERT INTO cidade VALUES (4116059,41,'MISSAL');
INSERT INTO cidade VALUES (2308401,23,'MISSAO VELHA');
INSERT INTO cidade VALUES (1504604,15,'MOCAJUBA');
INSERT INTO cidade VALUES (3530508,35,'MOCOCA');
INSERT INTO cidade VALUES (4210902,42,'MODELO');
INSERT INTO cidade VALUES (3142304,31,'MOEDA');
INSERT INTO cidade VALUES (3142403,31,'MOEMA');
INSERT INTO cidade VALUES (2509404,25,'MOGEIRO');
INSERT INTO cidade VALUES (3530607,35,'MOGI DAS CRUZES');
INSERT INTO cidade VALUES (3530706,35,'MOGI-GUACU');
INSERT INTO cidade VALUES (3530805,35,'MOGI-MIRIM');
INSERT INTO cidade VALUES (5213400,52,'MOIPORA');
INSERT INTO cidade VALUES (2804102,28,'MOITA BONITA');
INSERT INTO cidade VALUES (1504703,15,'MOJU');
INSERT INTO cidade VALUES (2308500,23,'MOMBACA');
INSERT INTO cidade VALUES (3530904,35,'MOMBUCA');
INSERT INTO cidade VALUES (2106904,21,'MONCAO');
INSERT INTO cidade VALUES (3531001,35,'MONCOES');
INSERT INTO cidade VALUES (4211009,42,'MONDAI');
INSERT INTO cidade VALUES (3531100,35,'MONGAGUA');
INSERT INTO cidade VALUES (3142502,31,'MONJOLOS');
INSERT INTO cidade VALUES (2206407,22,'MONSENHOR GIL');
INSERT INTO cidade VALUES (2206506,22,'MONSENHOR HIPOLITO');
INSERT INTO cidade VALUES (3142601,31,'MONSENHOR PAULO');
INSERT INTO cidade VALUES (2308609,23,'MONSENHOR TABOSA');
INSERT INTO cidade VALUES (2509503,25,'MONTADAS');
INSERT INTO cidade VALUES (3142700,31,'MONTALVANIA');
INSERT INTO cidade VALUES (3203502,32,'MONTANHA');
INSERT INTO cidade VALUES (2407708,24,'MONTANHAS');
INSERT INTO cidade VALUES (4312351,43,'MONTAURI');
INSERT INTO cidade VALUES (1504802,15,'MONTE ALEGRE');
INSERT INTO cidade VALUES (2407807,24,'MONTE ALEGRE');
INSERT INTO cidade VALUES (5213509,52,'MONTE ALEGRE DE GOIAS');
INSERT INTO cidade VALUES (3142809,31,'MONTE ALEGRE DE MINAS');
INSERT INTO cidade VALUES (2804201,28,'MONTE ALEGRE DE SERGIPE');
INSERT INTO cidade VALUES (4312377,43,'MONTE ALEGRE DO CAMPOS');
INSERT INTO cidade VALUES (2206605,22,'MONTE ALEGRE DO PIAUI');
INSERT INTO cidade VALUES (3531209,35,'MONTE ALEGRE DO SUL');
INSERT INTO cidade VALUES (3531308,35,'MONTE ALTO');
INSERT INTO cidade VALUES (3531407,35,'MONTE APRAZIVEL');
INSERT INTO cidade VALUES (3142908,31,'MONTE AZUL');
INSERT INTO cidade VALUES (3531506,35,'MONTE AZUL PAULISTA');
INSERT INTO cidade VALUES (3143005,31,'MONTE BELO');
INSERT INTO cidade VALUES (4312385,43,'MONTE BELO DO SUL');
INSERT INTO cidade VALUES (4211058,42,'MONTE CARLO');
INSERT INTO cidade VALUES (3143104,31,'MONTE CARMELO');
INSERT INTO cidade VALUES (3531605,35,'MONTE CASTELO');
INSERT INTO cidade VALUES (4211108,42,'MONTE CASTELO');
INSERT INTO cidade VALUES (2407906,24,'MONTE DAS GAMELEIRAS');
INSERT INTO cidade VALUES (1713601,17,'MONTE DO CARMO');
INSERT INTO cidade VALUES (3143153,31,'MONTE FORMOSO');
INSERT INTO cidade VALUES (2509602,25,'MONTE HOREBE');
INSERT INTO cidade VALUES (3531803,35,'MONTE MOR');
INSERT INTO cidade VALUES (1101401,11,'MONTE NEGRO');
INSERT INTO cidade VALUES (2921500,29,'MONTE SANTO');
INSERT INTO cidade VALUES (3143203,31,'MONTE SANTO DE MINAS');
INSERT INTO cidade VALUES (1713700,17,'MONTE SANTO DO TOCANTINS');
INSERT INTO cidade VALUES (3143401,31,'MONTE SIAO');
INSERT INTO cidade VALUES (2509701,25,'MONTEIRO');
INSERT INTO cidade VALUES (3531704,35,'MONTEIRO LOBATO');
INSERT INTO cidade VALUES (2705408,27,'MONTEIROPOLIS');
INSERT INTO cidade VALUES (4312401,43,'MONTENEGRO');
INSERT INTO cidade VALUES (2107001,21,'MONTES ALTOS');
INSERT INTO cidade VALUES (3143302,31,'MONTES CLAROS');
INSERT INTO cidade VALUES (5213707,52,'MONTES CLAROS DE GOIAS');
INSERT INTO cidade VALUES (3143450,31,'MONTEZUMA');
INSERT INTO cidade VALUES (5213756,52,'MONTIVIDIU');
INSERT INTO cidade VALUES (5213772,52,'MONTIVIDIU DO NORTE');
INSERT INTO cidade VALUES (2308708,23,'MORADA NOVA');
INSERT INTO cidade VALUES (3143500,31,'MORADA NOVA DE MINAS');
INSERT INTO cidade VALUES (2308807,23,'MORAUJO');
INSERT INTO cidade VALUES (2614303,26,'MOREILANDIA');
INSERT INTO cidade VALUES (4116109,41,'MOREIRA SALES');
INSERT INTO cidade VALUES (2609402,26,'MORENO');
INSERT INTO cidade VALUES (4312427,43,'MORMACO');
INSERT INTO cidade VALUES (2921609,29,'MORPARA');
INSERT INTO cidade VALUES (4116208,41,'MORRETES');
INSERT INTO cidade VALUES (5213806,52,'MORRINHOS');
INSERT INTO cidade VALUES (2308906,23,'MORRINHOS');
INSERT INTO cidade VALUES (4312443,43,'MORRINHOS DO SUL');
INSERT INTO cidade VALUES (3531902,35,'MORRO AGUDO');
INSERT INTO cidade VALUES (5213855,52,'MORRO AGUDO DE GOIAS');
INSERT INTO cidade VALUES (2206654,22,'MORRO CABECA NO TEMPO');
INSERT INTO cidade VALUES (4211207,42,'MORRO DA FUMACA');
INSERT INTO cidade VALUES (3143609,31,'MORRO DA GARCA');
INSERT INTO cidade VALUES (2921708,29,'MORRO DO CHAPEU');
INSERT INTO cidade VALUES (2206670,22,'MORRO DO CHAPEU DO PIAUI');
INSERT INTO cidade VALUES (3143708,31,'MORRO DO PILAR');
INSERT INTO cidade VALUES (4211256,42,'MORRO GRANDE');
INSERT INTO cidade VALUES (4312450,43,'MORRO REDONDO');
INSERT INTO cidade VALUES (4312476,43,'MORRO REUTER');
INSERT INTO cidade VALUES (2107100,21,'MORROS');
INSERT INTO cidade VALUES (2921807,29,'MORTUGABA');
INSERT INTO cidade VALUES (3532009,35,'MORUNGABA');
INSERT INTO cidade VALUES (5213905,52,'MOSSAMEDES');
INSERT INTO cidade VALUES (2408003,24,'MOSSORO');
INSERT INTO cidade VALUES (4312500,43,'MOSTARDAS');
INSERT INTO cidade VALUES (3532058,35,'MOTUCA');
INSERT INTO cidade VALUES (5214002,52,'MOZARLANDIA');
INSERT INTO cidade VALUES (1504901,15,'MUANA');
INSERT INTO cidade VALUES (1400308,14,'MUCAJAI');
INSERT INTO cidade VALUES (2309003,23,'MUCAMBO');
INSERT INTO cidade VALUES (2921906,29,'MUCUGE');
INSERT INTO cidade VALUES (4312609,43,'MUCUM');
INSERT INTO cidade VALUES (2922003,29,'MUCURI');
INSERT INTO cidade VALUES (3203601,32,'MUCURICI');
INSERT INTO cidade VALUES (4312617,43,'MUITOS CAPOES');
INSERT INTO cidade VALUES (4312625,43,'MULITERNO');
INSERT INTO cidade VALUES (2509800,25,'MULUNGU');
INSERT INTO cidade VALUES (2309102,23,'MULUNGU');
INSERT INTO cidade VALUES (2922052,29,'MULUNGU DO MORRO');
INSERT INTO cidade VALUES (2922102,29,'MUNDO NOVO');
INSERT INTO cidade VALUES (5214051,52,'MUNDO NOVO');
INSERT INTO cidade VALUES (5005681,50,'MUNDO NOVO');
INSERT INTO cidade VALUES (3143807,31,'MUNHOZ');
INSERT INTO cidade VALUES (4116307,41,'MUNHOZ DE MELO');
INSERT INTO cidade VALUES (2922201,29,'MUNIZ FERREIRA');
INSERT INTO cidade VALUES (3203700,32,'MUNIZ FREIRE');
INSERT INTO cidade VALUES (2922250,29,'MUQUEM DE SAO FRANCISCO');
INSERT INTO cidade VALUES (3203809,32,'MUQUI');
INSERT INTO cidade VALUES (3143906,31,'MURIAE');
INSERT INTO cidade VALUES (2804300,28,'MURIBECA');
INSERT INTO cidade VALUES (2705507,27,'MURICI');
INSERT INTO cidade VALUES (2206696,22,'MURICI DO PORTELAS');
INSERT INTO cidade VALUES (1713957,17,'MURICILANDIA');
INSERT INTO cidade VALUES (2922300,29,'MURITIBA');
INSERT INTO cidade VALUES (3532108,35,'MURUTINGA DO SUL');
INSERT INTO cidade VALUES (2922409,29,'MUTUIPE');
INSERT INTO cidade VALUES (3144003,31,'MUTUM');
INSERT INTO cidade VALUES (5214101,52,'MUTUNOPOLIS');
INSERT INTO cidade VALUES (3144102,31,'MUZAMBINHO');
INSERT INTO cidade VALUES (3144201,31,'NACIP RAYDAN');
INSERT INTO cidade VALUES (3532157,35,'NANTES');
INSERT INTO cidade VALUES (3144300,31,'NANUQUE');
INSERT INTO cidade VALUES (4312658,43,'NAO-ME-TOQUE');
INSERT INTO cidade VALUES (3144359,31,'NAQUE');
INSERT INTO cidade VALUES (3532207,35,'NARANDIBA');
INSERT INTO cidade VALUES (2408102,24,'NATAL');
INSERT INTO cidade VALUES (3144375,31,'NATALANDIA');
INSERT INTO cidade VALUES (3144409,31,'NATERCIA');
INSERT INTO cidade VALUES (3303104,33,'NATIVIDADE');
INSERT INTO cidade VALUES (1714203,17,'NATIVIDADE');
INSERT INTO cidade VALUES (3532306,35,'NATIVIDADE DA SERRA');
INSERT INTO cidade VALUES (2509909,25,'NATUBA');
INSERT INTO cidade VALUES (4211306,42,'NAVEGANTES');
INSERT INTO cidade VALUES (5005707,50,'NAVIRAI');
INSERT INTO cidade VALUES (1714302,17,'NAZARE');
INSERT INTO cidade VALUES (2922508,29,'NAZARE');
INSERT INTO cidade VALUES (2609501,26,'NAZARE DA MATA');
INSERT INTO cidade VALUES (2206704,22,'NAZARE DO PIAUI');
INSERT INTO cidade VALUES (3532405,35,'NAZARE PAULISTA');
INSERT INTO cidade VALUES (3144508,31,'NAZARENO');
INSERT INTO cidade VALUES (2510006,25,'NAZAREZINHO');
INSERT INTO cidade VALUES (5214408,52,'NAZARIO');
INSERT INTO cidade VALUES (2804409,28,'NEOPOLIS');
INSERT INTO cidade VALUES (3144607,31,'NEPOMUCENO');
INSERT INTO cidade VALUES (5214507,52,'NEROPOLIS');
INSERT INTO cidade VALUES (3532504,35,'NEVES PAULISTA');
INSERT INTO cidade VALUES (1303007,13,'NHAMUNDA');
INSERT INTO cidade VALUES (3532603,35,'NHANDEARA');
INSERT INTO cidade VALUES (4312674,43,'NICOLAU VERGUEIRO');
INSERT INTO cidade VALUES (2922607,29,'NILO PECANHA');
INSERT INTO cidade VALUES (3303203,33,'NILOPOLIS');
INSERT INTO cidade VALUES (2107209,21,'NINA RODRIGUES');
INSERT INTO cidade VALUES (3144656,31,'NINHEIRA');
INSERT INTO cidade VALUES (5005806,50,'NIOAQUE');
INSERT INTO cidade VALUES (3532702,35,'NIPOA');
INSERT INTO cidade VALUES (5214606,52,'NIQUELANDIA');
INSERT INTO cidade VALUES (2408201,24,'NISIA FLORESTA');
INSERT INTO cidade VALUES (3303302,33,'NITEROI');
INSERT INTO cidade VALUES (5105903,51,'NOBRES');
INSERT INTO cidade VALUES (4312708,43,'NONOAI');
INSERT INTO cidade VALUES (2922656,29,'NORDESTINA');
INSERT INTO cidade VALUES (1400407,14,'NORMANDIA');
INSERT INTO cidade VALUES (5106000,51,'NORTELANDIA');
INSERT INTO cidade VALUES (2804458,28,'NOSSA SENHORA APARECIDA');
INSERT INTO cidade VALUES (2804508,28,'NOSSA SENHORA DA GLORIA');
INSERT INTO cidade VALUES (2804607,28,'NOSSA SENHORA DAS DORES');
INSERT INTO cidade VALUES (4116406,41,'NOSSA SENHORA DAS GRACAS');
INSERT INTO cidade VALUES (2804706,28,'NOSSA SENHORA DE LOURDES');
INSERT INTO cidade VALUES (2206753,22,'NOSSA SENHORA DE NAZARE');
INSERT INTO cidade VALUES (5106109,51,'NOSSA SENHORA DO LIVRAMENTO');
INSERT INTO cidade VALUES (2206803,22,'NOSSA SENHORA DO REMEDIOS');
INSERT INTO cidade VALUES (2804805,28,'NOSSA SENHORA DO SOCORRO');
INSERT INTO cidade VALUES (3532801,35,'NOVA ALIANCA');
INSERT INTO cidade VALUES (4116505,41,'NOVA ALIANCA DO IVAI');
INSERT INTO cidade VALUES (4312757,43,'NOVA ALVORADA');
INSERT INTO cidade VALUES (5006002,50,'NOVA ALVORADA DO SUL');
INSERT INTO cidade VALUES (5214705,52,'NOVA AMERICA');
INSERT INTO cidade VALUES (4116604,41,'NOVA AMERICA DA COLINA');
INSERT INTO cidade VALUES (5006200,50,'NOVA ANDRADINA');
INSERT INTO cidade VALUES (4312807,43,'NOVA ARACA');
INSERT INTO cidade VALUES (4116703,41,'NOVA AURORA');
INSERT INTO cidade VALUES (5214804,52,'NOVA AURORA');
INSERT INTO cidade VALUES (5106158,51,'NOVA BANDEIRANTES');
INSERT INTO cidade VALUES (4312906,43,'NOVA BASSANO');
INSERT INTO cidade VALUES (3144672,31,'NOVA BELEM');
INSERT INTO cidade VALUES (4312955,43,'NOVA BOA VISTA');
INSERT INTO cidade VALUES (5106208,51,'NOVA BRASILANDIA');
INSERT INTO cidade VALUES (1100148,11,'NOVA BRASILANDIA D´OESTE');
INSERT INTO cidade VALUES (4313003,43,'NOVA BRESCIA');
INSERT INTO cidade VALUES (3532827,35,'NOVA CAMPINA');
INSERT INTO cidade VALUES (2922706,29,'NOVA CANAA');
INSERT INTO cidade VALUES (5106216,51,'NOVA CANAA DO NORTE');
INSERT INTO cidade VALUES (3532843,35,'NOVA CANAA PAULISTA');
INSERT INTO cidade VALUES (4313011,43,'NOVA CANDELARIA');
INSERT INTO cidade VALUES (4116802,41,'NOVA CANTU');
INSERT INTO cidade VALUES (3532868,35,'NOVA CASTILHO');
INSERT INTO cidade VALUES (2107258,21,'NOVA COLINAS');
INSERT INTO cidade VALUES (5214838,52,'NOVA CRIXAS');
INSERT INTO cidade VALUES (2408300,24,'NOVA CRUZ');
INSERT INTO cidade VALUES (3144706,31,'NOVA ERA');
INSERT INTO cidade VALUES (4211405,42,'NOVA ERECHIM');
INSERT INTO cidade VALUES (4116901,41,'NOVA ESPERANCA');
INSERT INTO cidade VALUES (1504950,15,'NOVA ESPERANCA DO PIRIA');
INSERT INTO cidade VALUES (4116950,41,'NOVA ESPERANCA DO SUDOESTE');
INSERT INTO cidade VALUES (4313037,43,'NOVA ESPERANCA DO SUL');
INSERT INTO cidade VALUES (3532900,35,'NOVA EUROPA');
INSERT INTO cidade VALUES (2922730,29,'NOVA FATIMA');
INSERT INTO cidade VALUES (4117008,41,'NOVA FATIMA');
INSERT INTO cidade VALUES (2510105,25,'NOVA FLORESTA');
INSERT INTO cidade VALUES (3303401,33,'NOVA FRIBURGO');
INSERT INTO cidade VALUES (5214861,52,'NOVA GLORIA');
INSERT INTO cidade VALUES (3533007,35,'NOVA GRANADA');
INSERT INTO cidade VALUES (5108808,51,'NOVA GUARITA');
INSERT INTO cidade VALUES (3533106,35,'NOVA GUATAPORANGA');
INSERT INTO cidade VALUES (4313060,43,'NOVA HARTZ');
INSERT INTO cidade VALUES (2922755,29,'NOVA IBIA');
INSERT INTO cidade VALUES (3303500,33,'NOVA IGUACU');
INSERT INTO cidade VALUES (5214879,52,'NOVA IGUACU DE GOIAS');
INSERT INTO cidade VALUES (3533205,35,'NOVA INDEPENDENCIA');
INSERT INTO cidade VALUES (2107308,21,'NOVA IORQUE');
INSERT INTO cidade VALUES (1504976,15,'NOVA IPIXUNA');
INSERT INTO cidade VALUES (4211454,42,'NOVA ITABERABA');
INSERT INTO cidade VALUES (2922805,29,'NOVA ITARANA');
INSERT INTO cidade VALUES (5106182,51,'NOVA LACERDA');
INSERT INTO cidade VALUES (4117057,41,'NOVA LARANJEIRAS');
INSERT INTO cidade VALUES (3144805,31,'NOVA LIMA');
INSERT INTO cidade VALUES (4117107,41,'NOVA LONDRINA');
INSERT INTO cidade VALUES (3533304,35,'NOVA LUZITANIA');
INSERT INTO cidade VALUES (1100338,11,'NOVA MAMORE');
INSERT INTO cidade VALUES (5108857,51,'NOVA MARILANDIA');
INSERT INTO cidade VALUES (5108907,51,'NOVA MARINGA');
INSERT INTO cidade VALUES (3144904,31,'NOVA MODICA');
INSERT INTO cidade VALUES (5108956,51,'NOVA MONTE VERDE');
INSERT INTO cidade VALUES (5106224,51,'NOVA MUTUM');
INSERT INTO cidade VALUES (5106174,51,'NOVA NAZARE');
INSERT INTO cidade VALUES (3533403,35,'NOVA ODESSA');
INSERT INTO cidade VALUES (4117206,41,'NOVA OLIMPIA');
INSERT INTO cidade VALUES (5106232,51,'NOVA OLIMPIA');
INSERT INTO cidade VALUES (2309201,23,'NOVA OLINDA');
INSERT INTO cidade VALUES (1714880,17,'NOVA OLINDA');
INSERT INTO cidade VALUES (2510204,25,'NOVA OLINDA');
INSERT INTO cidade VALUES (2107357,21,'NOVA OLINDA DO MARANHAO');
INSERT INTO cidade VALUES (1303106,13,'NOVA OLINDA DO NORTE');
INSERT INTO cidade VALUES (4313086,43,'NOVA PADUA');
INSERT INTO cidade VALUES (4313102,43,'NOVA PALMA');
INSERT INTO cidade VALUES (2510303,25,'NOVA PALMEIRA');
INSERT INTO cidade VALUES (4313201,43,'NOVA PETROPOLIS');
INSERT INTO cidade VALUES (3145000,31,'NOVA PONTE');
INSERT INTO cidade VALUES (3145059,31,'NOVA PORTEIRINHA');
INSERT INTO cidade VALUES (4313300,43,'NOVA PRATA');
INSERT INTO cidade VALUES (4117255,41,'NOVA PRATA DO IGUACU');
INSERT INTO cidade VALUES (4313334,43,'NOVA RAMADA');
INSERT INTO cidade VALUES (2922854,29,'NOVA REDENCAO');
INSERT INTO cidade VALUES (3145109,31,'NOVA RESENDE');
INSERT INTO cidade VALUES (5214903,52,'NOVA ROMA');
INSERT INTO cidade VALUES (4313359,43,'NOVA ROMA DO SUL');
INSERT INTO cidade VALUES (1715002,17,'NOVA ROSALANDIA');
INSERT INTO cidade VALUES (2309300,23,'NOVA RUSSAS');
INSERT INTO cidade VALUES (4117214,41,'NOVA SANTA BARBARA');
INSERT INTO cidade VALUES (5106190,51,'NOVA SANTA HELENA');
INSERT INTO cidade VALUES (4313375,43,'NOVA SANTA RITA');
INSERT INTO cidade VALUES (2207959,22,'NOVA SANTA RITA');
INSERT INTO cidade VALUES (4117222,41,'NOVA SANTA ROSA');
INSERT INTO cidade VALUES (3145208,31,'NOVA SERRANA');
INSERT INTO cidade VALUES (2922904,29,'NOVA SOURE');
INSERT INTO cidade VALUES (4117271,41,'NOVA TEBAS');
INSERT INTO cidade VALUES (1505007,15,'NOVA TIMBOTEUA');
INSERT INTO cidade VALUES (4211504,42,'NOVA TRENTO');
INSERT INTO cidade VALUES (5106240,51,'NOVA UBIRATA');
INSERT INTO cidade VALUES (3136603,31,'NOVA UNIAO');
INSERT INTO cidade VALUES (1101435,11,'NOVA UNIAO');
INSERT INTO cidade VALUES (3203908,32,'NOVA VENECIA');
INSERT INTO cidade VALUES (4211603,42,'NOVA VENEZA');
INSERT INTO cidade VALUES (5215009,52,'NOVA VENEZA');
INSERT INTO cidade VALUES (2923001,29,'NOVA VICOSA');
INSERT INTO cidade VALUES (5106257,51,'NOVA XAVANTINA');
INSERT INTO cidade VALUES (3533254,35,'NOVAIS');
INSERT INTO cidade VALUES (1715101,17,'NOVO ACORDO');
INSERT INTO cidade VALUES (1303205,13,'NOVO AIRAO');
INSERT INTO cidade VALUES (1715150,17,'NOVO ALEGRE');
INSERT INTO cidade VALUES (1303304,13,'NOVO ARIPUANA');
INSERT INTO cidade VALUES (4313490,43,'NOVO BARREIRO');
INSERT INTO cidade VALUES (5215207,52,'NOVO BRASIL');
INSERT INTO cidade VALUES (4313391,43,'NOVO CABRAIS');
INSERT INTO cidade VALUES (3145307,31,'NOVO CRUZEIRO');
INSERT INTO cidade VALUES (5215231,52,'NOVO GAMA');
INSERT INTO cidade VALUES (4313409,43,'NOVO HAMBURGO');
INSERT INTO cidade VALUES (2923035,29,'NOVO HORIZONTE');
INSERT INTO cidade VALUES (4211652,42,'NOVO HORIZONTE');
INSERT INTO cidade VALUES (3533502,35,'NOVO HORIZONTE');
INSERT INTO cidade VALUES (5106273,51,'NOVO HORIZONTE DO NORTE');
INSERT INTO cidade VALUES (1100502,11,'NOVO HORIZONTE DO OESTE');
INSERT INTO cidade VALUES (5006259,50,'NOVO HORIZONTE DO SUL');
INSERT INTO cidade VALUES (4117297,41,'NOVO ITACOLOMI');
INSERT INTO cidade VALUES (1715259,17,'NOVO JARDIM');
INSERT INTO cidade VALUES (2705606,27,'NOVO LINO');
INSERT INTO cidade VALUES (4313425,43,'NOVO MACHADO');
INSERT INTO cidade VALUES (5106265,51,'NOVO MUNDO');
INSERT INTO cidade VALUES (2309409,23,'NOVO ORIENTE');
INSERT INTO cidade VALUES (3145356,31,'NOVO ORIENTE DE MINAS');
INSERT INTO cidade VALUES (2206902,22,'NOVO ORIENTE DO PIAUI');
INSERT INTO cidade VALUES (5215256,52,'NOVO PLANALTO');
INSERT INTO cidade VALUES (1505031,15,'NOVO PROGRESSO');
INSERT INTO cidade VALUES (1505064,15,'NOVO REPARTIMENTO');
INSERT INTO cidade VALUES (2206951,22,'NOVO SANTO ANTONIO');
INSERT INTO cidade VALUES (5106315,51,'NOVO SANTO ANTONIO');
INSERT INTO cidade VALUES (5106281,51,'NOVO SAO JOAQUIM');
INSERT INTO cidade VALUES (4313441,43,'NOVO TIRADENTES');
INSERT INTO cidade VALUES (2923050,29,'NOVO TRIUNFO');
INSERT INTO cidade VALUES (4313466,43,'NOVO XINGU');
INSERT INTO cidade VALUES (3145372,31,'NOVORIZONTE');
INSERT INTO cidade VALUES (3533601,35,'NUPORANGA');
INSERT INTO cidade VALUES (1505106,15,'OBIDOS');
INSERT INTO cidade VALUES (2309458,23,'OCARA');
INSERT INTO cidade VALUES (3533700,35,'OCAUCU');
INSERT INTO cidade VALUES (2207009,22,'OEIRAS');
INSERT INTO cidade VALUES (1505205,15,'OEIRAS DO PARA');
INSERT INTO cidade VALUES (1600501,16,'OIAPOQUE');
INSERT INTO cidade VALUES (3145406,31,'OLARIA');
INSERT INTO cidade VALUES (3533809,35,'OLEO');
INSERT INTO cidade VALUES (2207108,22,'OLHO D AGUA DO PIAUI');
INSERT INTO cidade VALUES (2510402,25,'OLHO D´AGUA');
INSERT INTO cidade VALUES (2107407,21,'OLHO D´AGUA DAS CUNHAS');
INSERT INTO cidade VALUES (2705705,27,'OLHO D´AGUA DAS FLORES');
INSERT INTO cidade VALUES (2705804,27,'OLHO D´AGUA DO CASADO');
INSERT INTO cidade VALUES (2705903,27,'OLHO D´AGUA GRANDE');
INSERT INTO cidade VALUES (2408409,24,'OLHO-D´AGUA DO BORGES');
INSERT INTO cidade VALUES (3145455,31,'OLHOS-D AGUA');
INSERT INTO cidade VALUES (3533908,35,'OLIMPIA');
INSERT INTO cidade VALUES (3145505,31,'OLIMPIO NORONHA');
INSERT INTO cidade VALUES (2609600,26,'OLINDA');
INSERT INTO cidade VALUES (2107456,21,'OLINDA NOVA DO MARANHAO');
INSERT INTO cidade VALUES (2923100,29,'OLINDINA');
INSERT INTO cidade VALUES (2510501,25,'OLIVEDOS');
INSERT INTO cidade VALUES (3145604,31,'OLIVEIRA');
INSERT INTO cidade VALUES (1715507,17,'OLIVEIRA DE FATIMA');
INSERT INTO cidade VALUES (2923209,29,'OLIVEIRA DO BREJINHOS');
INSERT INTO cidade VALUES (3145703,31,'OLIVEIRA FORTES');
INSERT INTO cidade VALUES (2706000,27,'OLIVENCA');
INSERT INTO cidade VALUES (3145802,31,'ONCA DE PITANGUI');
INSERT INTO cidade VALUES (3534005,35,'ONDA VERDE');
INSERT INTO cidade VALUES (3145851,31,'ORATORIOS');
INSERT INTO cidade VALUES (3534104,35,'ORIENTE');
INSERT INTO cidade VALUES (3534203,35,'ORINDIUVA');
INSERT INTO cidade VALUES (1505304,15,'ORIXIMINA');
INSERT INTO cidade VALUES (3145877,31,'ORIZANIA');
INSERT INTO cidade VALUES (5215306,52,'ORIZONA');
INSERT INTO cidade VALUES (3534302,35,'ORLANDIA');
INSERT INTO cidade VALUES (4211702,42,'ORLEANS');
INSERT INTO cidade VALUES (2609709,26,'OROBO');
INSERT INTO cidade VALUES (2609808,26,'OROCO');
INSERT INTO cidade VALUES (2309508,23,'OROS');
INSERT INTO cidade VALUES (4117305,41,'ORTIGUEIRA');
INSERT INTO cidade VALUES (3534401,35,'OSASCO');
INSERT INTO cidade VALUES (3534500,35,'OSCAR BRESSANE');
INSERT INTO cidade VALUES (4313508,43,'OSORIO');
INSERT INTO cidade VALUES (3534609,35,'OSVALDO CRUZ');
INSERT INTO cidade VALUES (4211751,42,'OTACILIO COSTA');
INSERT INTO cidade VALUES (1505403,15,'OUREM');
INSERT INTO cidade VALUES (2923308,29,'OURICANGAS');
INSERT INTO cidade VALUES (2609907,26,'OURICURI');
INSERT INTO cidade VALUES (1505437,15,'OURILANDIA DO NORTE');
INSERT INTO cidade VALUES (3534708,35,'OURINHOS');
INSERT INTO cidade VALUES (4117404,41,'OURIZONA');
INSERT INTO cidade VALUES (4211801,42,'OURO');
INSERT INTO cidade VALUES (2408508,24,'OURO BRANCO');
INSERT INTO cidade VALUES (3145901,31,'OURO BRANCO');
INSERT INTO cidade VALUES (2706109,27,'OURO BRANCO');
INSERT INTO cidade VALUES (3146008,31,'OURO FINO');
INSERT INTO cidade VALUES (3146107,31,'OURO PRETO');
INSERT INTO cidade VALUES (1100155,11,'OURO PRETO DO OESTE');
INSERT INTO cidade VALUES (2510600,25,'OURO VELHO');
INSERT INTO cidade VALUES (4211850,42,'OURO VERDE');
INSERT INTO cidade VALUES (3534807,35,'OURO VERDE');
INSERT INTO cidade VALUES (5215405,52,'OURO VERDE DE GOIAS');
INSERT INTO cidade VALUES (3146206,31,'OURO VERDE DE MINAS');
INSERT INTO cidade VALUES (4117453,41,'OURO VERDE DO OESTE');
INSERT INTO cidade VALUES (3534757,35,'OUROESTE');
INSERT INTO cidade VALUES (2923357,29,'OUROLANDIA');
INSERT INTO cidade VALUES (5215504,52,'OUVIDOR');
INSERT INTO cidade VALUES (3534906,35,'PACAEMBU');
INSERT INTO cidade VALUES (1505486,15,'PACAJA');
INSERT INTO cidade VALUES (2309607,23,'PACAJUS');
INSERT INTO cidade VALUES (1400456,14,'PACARAIMA');
INSERT INTO cidade VALUES (2804904,28,'PACATUBA');
INSERT INTO cidade VALUES (2309706,23,'PACATUBA');
INSERT INTO cidade VALUES (2107506,21,'PACO DO LUMIAR');
INSERT INTO cidade VALUES (2309805,23,'PACOTI');
INSERT INTO cidade VALUES (2309904,23,'PACUJA');
INSERT INTO cidade VALUES (5215603,52,'PADRE BERNARDO');
INSERT INTO cidade VALUES (3146255,31,'PADRE CARVALHO');
INSERT INTO cidade VALUES (2207207,22,'PADRE MARCOS');
INSERT INTO cidade VALUES (3146305,31,'PADRE PARAISO');
INSERT INTO cidade VALUES (2207306,22,'PAES LANDIM');
INSERT INTO cidade VALUES (3146552,31,'PAI PEDRO');
INSERT INTO cidade VALUES (4211876,42,'PAIAL');
INSERT INTO cidade VALUES (4117503,41,'PAICANDU');
INSERT INTO cidade VALUES (4313607,43,'PAIM FILHO');
INSERT INTO cidade VALUES (3146404,31,'PAINEIRAS');
INSERT INTO cidade VALUES (4211892,42,'PAINEL');
INSERT INTO cidade VALUES (3146503,31,'PAINS');
INSERT INTO cidade VALUES (3146602,31,'PAIVA');
INSERT INTO cidade VALUES (2207355,22,'PAJEU DO PIAUI');
INSERT INTO cidade VALUES (3535002,35,'PALESTINA');
INSERT INTO cidade VALUES (2706208,27,'PALESTINA');
INSERT INTO cidade VALUES (5215652,52,'PALESTINA DE GOIAS');
INSERT INTO cidade VALUES (1505494,15,'PALESTINA DO PARA');
INSERT INTO cidade VALUES (2310001,23,'PALHANO');
INSERT INTO cidade VALUES (4211900,42,'PALHOCA');
INSERT INTO cidade VALUES (3146701,31,'PALMA');
INSERT INTO cidade VALUES (4212007,42,'PALMA SOLA');
INSERT INTO cidade VALUES (2310100,23,'PALMACIA');
INSERT INTO cidade VALUES (2610004,26,'PALMARES');
INSERT INTO cidade VALUES (4313656,43,'PALMARES DO SUL');
INSERT INTO cidade VALUES (3535101,35,'PALMARES PAULISTA');
INSERT INTO cidade VALUES (4117602,41,'PALMAS');
INSERT INTO cidade VALUES (1721000,17,'PALMAS');
INSERT INTO cidade VALUES (2923407,29,'PALMAS DE MONTE ALTO');
INSERT INTO cidade VALUES (4117701,41,'PALMEIRA');
INSERT INTO cidade VALUES (4212056,42,'PALMEIRA');
INSERT INTO cidade VALUES (4313706,43,'PALMEIRA DAS MISSOES');
INSERT INTO cidade VALUES (2706307,27,'PALMEIRA DO INDIOS');
INSERT INTO cidade VALUES (2207405,22,'PALMEIRA DO PIAUI');
INSERT INTO cidade VALUES (3535200,35,'PALMEIRA D´OESTE');
INSERT INTO cidade VALUES (2207504,22,'PALMEIRAIS');
INSERT INTO cidade VALUES (2107605,21,'PALMEIRANDIA');
INSERT INTO cidade VALUES (1715705,17,'PALMEIRANTE');
INSERT INTO cidade VALUES (2923506,29,'PALMEIRAS');
INSERT INTO cidade VALUES (5215702,52,'PALMEIRAS DE GOIAS');
INSERT INTO cidade VALUES (1713809,17,'PALMEIRAS DO TOCANTINS');
INSERT INTO cidade VALUES (2610103,26,'PALMEIRINA');
INSERT INTO cidade VALUES (1715754,17,'PALMEIROPOLIS');
INSERT INTO cidade VALUES (5215801,52,'PALMELO');
INSERT INTO cidade VALUES (5215900,52,'PALMINOPOLIS');
INSERT INTO cidade VALUES (4117800,41,'PALMITAL');
INSERT INTO cidade VALUES (3535309,35,'PALMITAL');
INSERT INTO cidade VALUES (4313805,43,'PALMITINHO');
INSERT INTO cidade VALUES (4212106,42,'PALMITOS');
INSERT INTO cidade VALUES (3146750,31,'PALMOPOLIS');
INSERT INTO cidade VALUES (4117909,41,'PALOTINA');
INSERT INTO cidade VALUES (5216007,52,'PANAMA');
INSERT INTO cidade VALUES (4313904,43,'PANAMBI');
INSERT INTO cidade VALUES (3204005,32,'PANCAS');
INSERT INTO cidade VALUES (2610202,26,'PANELAS');
INSERT INTO cidade VALUES (3535408,35,'PANORAMA');
INSERT INTO cidade VALUES (4313953,43,'PANTANO GRANDE');
INSERT INTO cidade VALUES (2706406,27,'PAO DE ACUCAR');
INSERT INTO cidade VALUES (3146909,31,'PAPAGAIOS');
INSERT INTO cidade VALUES (4212205,42,'PAPANDUVA');
INSERT INTO cidade VALUES (2207553,22,'PAQUETA');
INSERT INTO cidade VALUES (3147105,31,'PARA DE MINAS');
INSERT INTO cidade VALUES (3303609,33,'PARACAMBI');
INSERT INTO cidade VALUES (3147006,31,'PARACATU');
INSERT INTO cidade VALUES (2310209,23,'PARACURU');
INSERT INTO cidade VALUES (1505502,15,'PARAGOMINAS');
INSERT INTO cidade VALUES (3147204,31,'PARAGUACU');
INSERT INTO cidade VALUES (3535507,35,'PARAGUACU PAULISTA');
INSERT INTO cidade VALUES (4314001,43,'PARAI');
INSERT INTO cidade VALUES (3303708,33,'PARAIBA DO SUL');
INSERT INTO cidade VALUES (2107704,21,'PARAIBANO');
INSERT INTO cidade VALUES (3535606,35,'PARAIBUNA');
INSERT INTO cidade VALUES (2310258,23,'PARAIPABA');
INSERT INTO cidade VALUES (3535705,35,'PARAISO');
INSERT INTO cidade VALUES (4212239,42,'PARAISO');
INSERT INTO cidade VALUES (4118006,41,'PARAISO DO NORTE');
INSERT INTO cidade VALUES (4314027,43,'PARAISO DO SUL');
INSERT INTO cidade VALUES (1716109,17,'PARAISO DO TOCANTINS');
INSERT INTO cidade VALUES (3147303,31,'PARAISOPOLIS');
INSERT INTO cidade VALUES (2310308,23,'PARAMBU');
INSERT INTO cidade VALUES (2923605,29,'PARAMIRIM');
INSERT INTO cidade VALUES (2310407,23,'PARAMOTI');
INSERT INTO cidade VALUES (2408607,24,'PARANA');
INSERT INTO cidade VALUES (1716208,17,'PARANA');
INSERT INTO cidade VALUES (4118105,41,'PARANACITY');
INSERT INTO cidade VALUES (4118204,41,'PARANAGUA');
INSERT INTO cidade VALUES (5006309,50,'PARANAIBA');
INSERT INTO cidade VALUES (5216304,52,'PARANAIGUARA');
INSERT INTO cidade VALUES (5106299,51,'PARANAITA');
INSERT INTO cidade VALUES (3535804,35,'PARANAPANEMA');
INSERT INTO cidade VALUES (4118303,41,'PARANAPOEMA');
INSERT INTO cidade VALUES (3535903,35,'PARANAPUA');
INSERT INTO cidade VALUES (2610301,26,'PARANATAMA');
INSERT INTO cidade VALUES (5106307,51,'PARANATINGA');
INSERT INTO cidade VALUES (4118402,41,'PARANAVAI');
INSERT INTO cidade VALUES (5006358,50,'PARANHOS');
INSERT INTO cidade VALUES (3147402,31,'PARAOPEBA');
INSERT INTO cidade VALUES (3536000,35,'PARAPUA');
INSERT INTO cidade VALUES (2510659,25,'PARARI');
INSERT INTO cidade VALUES (3303807,33,'PARATI');
INSERT INTO cidade VALUES (2923704,29,'PARATINGA');
INSERT INTO cidade VALUES (2408706,24,'PARAU');
INSERT INTO cidade VALUES (1505536,15,'PARAUAPEBAS');
INSERT INTO cidade VALUES (5216403,52,'PARAUNA');
INSERT INTO cidade VALUES (2408805,24,'PARAZINHO');
INSERT INTO cidade VALUES (3536109,35,'PARDINHO');
INSERT INTO cidade VALUES (4314035,43,'PARECI NOVO');
INSERT INTO cidade VALUES (1101450,11,'PARECIS');
INSERT INTO cidade VALUES (2408904,24,'PARELHAS');
INSERT INTO cidade VALUES (2706422,27,'PARICONHA');
INSERT INTO cidade VALUES (1303403,13,'PARINTINS');
INSERT INTO cidade VALUES (2923803,29,'PARIPIRANGA');
INSERT INTO cidade VALUES (2706448,27,'PARIPUEIRA');
INSERT INTO cidade VALUES (3536208,35,'PARIQUERA-ACU');
INSERT INTO cidade VALUES (3536257,35,'PARISI');
INSERT INTO cidade VALUES (2207603,22,'PARNAGUA');
INSERT INTO cidade VALUES (2207702,22,'PARNAIBA');
INSERT INTO cidade VALUES (2610400,26,'PARNAMIRIM');
INSERT INTO cidade VALUES (2403251,24,'PARNAMIRIM');
INSERT INTO cidade VALUES (2107803,21,'PARNARAMA');
INSERT INTO cidade VALUES (4314050,43,'PAROBE');
INSERT INTO cidade VALUES (2409100,24,'PASSA E FICA');
INSERT INTO cidade VALUES (3147600,31,'PASSA QUATRO');
INSERT INTO cidade VALUES (4314068,43,'PASSA SETE');
INSERT INTO cidade VALUES (3147709,31,'PASSA TEMPO');
INSERT INTO cidade VALUES (3147808,31,'PASSA VINTE');
INSERT INTO cidade VALUES (3147501,31,'PASSABEM');
INSERT INTO cidade VALUES (2510709,25,'PASSAGEM');
INSERT INTO cidade VALUES (2409209,24,'PASSAGEM');
INSERT INTO cidade VALUES (2107902,21,'PASSAGEM FRANCA');
INSERT INTO cidade VALUES (2207751,22,'PASSAGEM FRANCA DO PIAUI');
INSERT INTO cidade VALUES (2610509,26,'PASSIRA');
INSERT INTO cidade VALUES (2706505,27,'PASSO DE CAMARAGIBE');
INSERT INTO cidade VALUES (4212254,42,'PASSO DE TORRES');
INSERT INTO cidade VALUES (4314076,43,'PASSO DO SOBRADO');
INSERT INTO cidade VALUES (4314100,43,'PASSO FUNDO');
INSERT INTO cidade VALUES (3147907,31,'PASSOS');
INSERT INTO cidade VALUES (4212270,42,'PASSOS MAIA');
INSERT INTO cidade VALUES (2108009,21,'PASTOS BONS');
INSERT INTO cidade VALUES (3147956,31,'PATIS');
INSERT INTO cidade VALUES (4118451,41,'PATO BRAGADO');
INSERT INTO cidade VALUES (4118501,41,'PATO BRANCO');
INSERT INTO cidade VALUES (2510808,25,'PATOS');
INSERT INTO cidade VALUES (3148004,31,'PATOS DE MINAS');
INSERT INTO cidade VALUES (2207777,22,'PATOS DO PIAUI');
INSERT INTO cidade VALUES (3148103,31,'PATROCINIO');
INSERT INTO cidade VALUES (3148202,31,'PATROCINIO DO MURIAE');
INSERT INTO cidade VALUES (3536307,35,'PATROCINIO PAULISTA');
INSERT INTO cidade VALUES (2409308,24,'PATU');
INSERT INTO cidade VALUES (3303856,33,'PATY DO ALFERES');
INSERT INTO cidade VALUES (2923902,29,'PAU BRASIL');
INSERT INTO cidade VALUES (1505551,15,'PAU D´ARCO');
INSERT INTO cidade VALUES (1716307,17,'PAU D´ARCO');
INSERT INTO cidade VALUES (2207793,22,'PAU D´ARCO DO PIAUI');
INSERT INTO cidade VALUES (2409407,24,'PAU DO FERROS');
INSERT INTO cidade VALUES (2610608,26,'PAUDALHO');
INSERT INTO cidade VALUES (1303502,13,'PAUINI');
INSERT INTO cidade VALUES (3148301,31,'PAULA CANDIDO');
INSERT INTO cidade VALUES (4118600,41,'PAULA FREITAS');
INSERT INTO cidade VALUES (3536406,35,'PAULICEIA');
INSERT INTO cidade VALUES (3536505,35,'PAULINIA');
INSERT INTO cidade VALUES (2108058,21,'PAULINO NEVES');
INSERT INTO cidade VALUES (2610707,26,'PAULISTA');
INSERT INTO cidade VALUES (2510907,25,'PAULISTA');
INSERT INTO cidade VALUES (2207801,22,'PAULISTANA');
INSERT INTO cidade VALUES (3536570,35,'PAULISTANIA');
INSERT INTO cidade VALUES (3148400,31,'PAULISTAS');
INSERT INTO cidade VALUES (2924009,29,'PAULO AFONSO');
INSERT INTO cidade VALUES (4314134,43,'PAULO BENTO');
INSERT INTO cidade VALUES (3536604,35,'PAULO DE FARIA');
INSERT INTO cidade VALUES (4118709,41,'PAULO FRONTIN');
INSERT INTO cidade VALUES (2706604,27,'PAULO JACINTO');
INSERT INTO cidade VALUES (4212304,42,'PAULO LOPES');
INSERT INTO cidade VALUES (2108108,21,'PAULO RAMOS');
INSERT INTO cidade VALUES (3148509,31,'PAVAO');
INSERT INTO cidade VALUES (4314159,43,'PAVERAMA');
INSERT INTO cidade VALUES (2207850,22,'PAVUSSU');
INSERT INTO cidade VALUES (2924058,29,'PE DE SERRA');
INSERT INTO cidade VALUES (4118808,41,'PEABIRU');
INSERT INTO cidade VALUES (3148608,31,'PECANHA');
INSERT INTO cidade VALUES (3536703,35,'PEDERNEIRAS');
INSERT INTO cidade VALUES (2610806,26,'PEDRA');
INSERT INTO cidade VALUES (3148707,31,'PEDRA AZUL');
INSERT INTO cidade VALUES (3536802,35,'PEDRA BELA');
INSERT INTO cidade VALUES (3148756,31,'PEDRA BONITA');
INSERT INTO cidade VALUES (2310506,23,'PEDRA BRANCA');
INSERT INTO cidade VALUES (2511004,25,'PEDRA BRANCA');
INSERT INTO cidade VALUES (1600154,16,'PEDRA BRANCA DO AMAPARI');
INSERT INTO cidade VALUES (3148806,31,'PEDRA DO ANTA');
INSERT INTO cidade VALUES (3148905,31,'PEDRA DO INDAIA');
INSERT INTO cidade VALUES (3149002,31,'PEDRA DOURADA');
INSERT INTO cidade VALUES (2409506,24,'PEDRA GRANDE');
INSERT INTO cidade VALUES (2511103,25,'PEDRA LAVRADA');
INSERT INTO cidade VALUES (2805000,28,'PEDRA MOLE');
INSERT INTO cidade VALUES (2409605,24,'PEDRA PRETA');
INSERT INTO cidade VALUES (5106372,51,'PEDRA PRETA');
INSERT INTO cidade VALUES (3149101,31,'PEDRALVA');
INSERT INTO cidade VALUES (3536901,35,'PEDRANOPOLIS');
INSERT INTO cidade VALUES (2924108,29,'PEDRAO');
INSERT INTO cidade VALUES (4314175,43,'PEDRAS ALTAS');
INSERT INTO cidade VALUES (2511202,25,'PEDRAS DE FOGO');
INSERT INTO cidade VALUES (3149150,31,'PEDRAS DE MARIA DA CRUZ');
INSERT INTO cidade VALUES (4212403,42,'PEDRAS GRANDES');
INSERT INTO cidade VALUES (3537008,35,'PEDREGULHO');
INSERT INTO cidade VALUES (3537107,35,'PEDREIRA');
INSERT INTO cidade VALUES (2108207,21,'PEDREIRAS');
INSERT INTO cidade VALUES (2805109,28,'PEDRINHAS');
INSERT INTO cidade VALUES (3537156,35,'PEDRINHAS PAULISTA');
INSERT INTO cidade VALUES (3149200,31,'PEDRINOPOLIS');
INSERT INTO cidade VALUES (1716505,17,'PEDRO AFONSO');
INSERT INTO cidade VALUES (2924207,29,'PEDRO ALEXANDRE');
INSERT INTO cidade VALUES (2409704,24,'PEDRO AVELINO');
INSERT INTO cidade VALUES (3204054,32,'PEDRO CANARIO');
INSERT INTO cidade VALUES (3537206,35,'PEDRO DE TOLEDO');
INSERT INTO cidade VALUES (2108256,21,'PEDRO DO ROSARIO');
INSERT INTO cidade VALUES (5006408,50,'PEDRO GOMES');
INSERT INTO cidade VALUES (2207900,22,'PEDRO II');
INSERT INTO cidade VALUES (2207934,22,'PEDRO LAURENTINO');
INSERT INTO cidade VALUES (3149309,31,'PEDRO LEOPOLDO');
INSERT INTO cidade VALUES (4314209,43,'PEDRO OSORIO');
INSERT INTO cidade VALUES (2512721,25,'PEDRO REGIS');
INSERT INTO cidade VALUES (3149408,31,'PEDRO TEIXEIRA');
INSERT INTO cidade VALUES (2409803,24,'PEDRO VELHO');
INSERT INTO cidade VALUES (1716604,17,'PEIXE');
INSERT INTO cidade VALUES (1505601,15,'PEIXE-BOI');
INSERT INTO cidade VALUES (5106422,51,'PEIXOTO DE AZEVEDO');
INSERT INTO cidade VALUES (4314308,43,'PEJUCARA');
INSERT INTO cidade VALUES (4314407,43,'PELOTAS');
INSERT INTO cidade VALUES (2310605,23,'PENAFORTE');
INSERT INTO cidade VALUES (2108306,21,'PENALVA');
INSERT INTO cidade VALUES (3537305,35,'PENAPOLIS');
INSERT INTO cidade VALUES (2409902,24,'PENDENCIAS');
INSERT INTO cidade VALUES (2706703,27,'PENEDO');
INSERT INTO cidade VALUES (4212502,42,'PENHA');
INSERT INTO cidade VALUES (2310704,23,'PENTECOSTE');
INSERT INTO cidade VALUES (3149507,31,'PEQUERI');
INSERT INTO cidade VALUES (3149606,31,'PEQUI');
INSERT INTO cidade VALUES (1716653,17,'PEQUIZEIRO');
INSERT INTO cidade VALUES (3149705,31,'PERDIGAO');
INSERT INTO cidade VALUES (3149804,31,'PERDIZES');
INSERT INTO cidade VALUES (3149903,31,'PERDOES');
INSERT INTO cidade VALUES (3537404,35,'PEREIRA BARRETO');
INSERT INTO cidade VALUES (3537503,35,'PEREIRAS');
INSERT INTO cidade VALUES (2310803,23,'PEREIRO');
INSERT INTO cidade VALUES (2108405,21,'PERI MIRIM');
INSERT INTO cidade VALUES (3149952,31,'PERIQUITO');
INSERT INTO cidade VALUES (4212601,42,'PERITIBA');
INSERT INTO cidade VALUES (2108454,21,'PERITORO');
INSERT INTO cidade VALUES (4118857,41,'PEROBAL');
INSERT INTO cidade VALUES (4118907,41,'PEROLA');
INSERT INTO cidade VALUES (4119004,41,'PEROLA D´OESTE');
INSERT INTO cidade VALUES (5216452,52,'PEROLANDIA');
INSERT INTO cidade VALUES (3537602,35,'PERUIBE');
INSERT INTO cidade VALUES (3150000,31,'PESCADOR');
INSERT INTO cidade VALUES (2610905,26,'PESQUEIRA');
INSERT INTO cidade VALUES (2611002,26,'PETROLANDIA');
INSERT INTO cidade VALUES (4212700,42,'PETROLANDIA');
INSERT INTO cidade VALUES (2611101,26,'PETROLINA');
INSERT INTO cidade VALUES (5216809,52,'PETROLINA DE GOIAS');
INSERT INTO cidade VALUES (3303906,33,'PETROPOLIS');
INSERT INTO cidade VALUES (2706802,27,'PIACABUCU');
INSERT INTO cidade VALUES (3537701,35,'PIACATU');
INSERT INTO cidade VALUES (2511301,25,'PIANCO');
INSERT INTO cidade VALUES (2924306,29,'PIATA');
INSERT INTO cidade VALUES (3150109,31,'PIAU');
INSERT INTO cidade VALUES (4314423,43,'PICADA CAFE');
INSERT INTO cidade VALUES (1505635,15,'PICARRA');
INSERT INTO cidade VALUES (4212809,42,'PICARRAS');
INSERT INTO cidade VALUES (2208007,22,'PICOS');
INSERT INTO cidade VALUES (2511400,25,'PICUI');
INSERT INTO cidade VALUES (3537800,35,'PIEDADE');
INSERT INTO cidade VALUES (3150158,31,'PIEDADE DE CARATINGA');
INSERT INTO cidade VALUES (3150208,31,'PIEDADE DE PONTE NOVA');
INSERT INTO cidade VALUES (3150406,31,'PIEDADE DO GERAIS');
INSERT INTO cidade VALUES (3150307,31,'PIEDADE DO RIO GRANDE');
INSERT INTO cidade VALUES (4119103,41,'PIEN');
INSERT INTO cidade VALUES (2924405,29,'PILAO ARCADO');
INSERT INTO cidade VALUES (2511509,25,'PILAR');
INSERT INTO cidade VALUES (2706901,27,'PILAR');
INSERT INTO cidade VALUES (5216908,52,'PILAR DE GOIAS');
INSERT INTO cidade VALUES (3537909,35,'PILAR DO SUL');
INSERT INTO cidade VALUES (2511608,25,'PILOES');
INSERT INTO cidade VALUES (2410009,24,'PILOES');
INSERT INTO cidade VALUES (2511707,25,'PILOEZINHOS');
INSERT INTO cidade VALUES (3150505,31,'PIMENTA');
INSERT INTO cidade VALUES (1100189,11,'PIMENTA BUENO');
INSERT INTO cidade VALUES (2208106,22,'PIMENTEIRAS');
INSERT INTO cidade VALUES (1101468,11,'PIMENTEIRAS DO OESTE');
INSERT INTO cidade VALUES (2924504,29,'PINDAI');
INSERT INTO cidade VALUES (3538006,35,'PINDAMONHANGABA');
INSERT INTO cidade VALUES (2108504,21,'PINDARE MIRIM');
INSERT INTO cidade VALUES (2707008,27,'PINDOBA');
INSERT INTO cidade VALUES (2924603,29,'PINDOBACU');
INSERT INTO cidade VALUES (3538105,35,'PINDORAMA');
INSERT INTO cidade VALUES (1717008,17,'PINDORAMA DO TOCANTINS');
INSERT INTO cidade VALUES (2310852,23,'PINDORETAMA');
INSERT INTO cidade VALUES (3150539,31,'PINGO D AGUA');
INSERT INTO cidade VALUES (4119152,41,'PINHAIS');
INSERT INTO cidade VALUES (4314456,43,'PINHAL');
INSERT INTO cidade VALUES (4314464,43,'PINHAL DA SERRA');
INSERT INTO cidade VALUES (4119251,41,'PINHAL DE SAO BENTO');
INSERT INTO cidade VALUES (4314472,43,'PINHAL GRANDE');
INSERT INTO cidade VALUES (4119202,41,'PINHALAO');
INSERT INTO cidade VALUES (3538204,35,'PINHALZINHO');
INSERT INTO cidade VALUES (4212908,42,'PINHALZINHO');
INSERT INTO cidade VALUES (2805208,28,'PINHAO');
INSERT INTO cidade VALUES (4119301,41,'PINHAO');
INSERT INTO cidade VALUES (3303955,33,'PINHEIRAL');
INSERT INTO cidade VALUES (4314498,43,'PINHEIRINHO DO VALE');
INSERT INTO cidade VALUES (2108603,21,'PINHEIRO');
INSERT INTO cidade VALUES (4314506,43,'PINHEIRO MACHADO');
INSERT INTO cidade VALUES (4213005,42,'PINHEIRO PRETO');
INSERT INTO cidade VALUES (3204104,32,'PINHEIROS');
INSERT INTO cidade VALUES (2924652,29,'PINTADAS');
INSERT INTO cidade VALUES (3150570,31,'PINTOPOLIS');
INSERT INTO cidade VALUES (2208205,22,'PIO IX');
INSERT INTO cidade VALUES (2108702,21,'PIO XII');
INSERT INTO cidade VALUES (3538303,35,'PIQUEROBI');
INSERT INTO cidade VALUES (2310902,23,'PIQUET CARNEIRO');
INSERT INTO cidade VALUES (3538501,35,'PIQUETE');
INSERT INTO cidade VALUES (3538600,35,'PIRACAIA');
INSERT INTO cidade VALUES (5217104,52,'PIRACANJUBA');
INSERT INTO cidade VALUES (3150604,31,'PIRACEMA');
INSERT INTO cidade VALUES (3538709,35,'PIRACICABA');
INSERT INTO cidade VALUES (2208304,22,'PIRACURUCA');
INSERT INTO cidade VALUES (3304003,33,'PIRAI');
INSERT INTO cidade VALUES (2924678,29,'PIRAI DO NORTE');
INSERT INTO cidade VALUES (4119400,41,'PIRAI DO SUL');
INSERT INTO cidade VALUES (3538808,35,'PIRAJU');
INSERT INTO cidade VALUES (3150703,31,'PIRAJUBA');
INSERT INTO cidade VALUES (3538907,35,'PIRAJUI');
INSERT INTO cidade VALUES (2805307,28,'PIRAMBU');
INSERT INTO cidade VALUES (3150802,31,'PIRANGA');
INSERT INTO cidade VALUES (3539004,35,'PIRANGI');
INSERT INTO cidade VALUES (3150901,31,'PIRANGUCU');
INSERT INTO cidade VALUES (3151008,31,'PIRANGUINHO');
INSERT INTO cidade VALUES (2707107,27,'PIRANHAS');
INSERT INTO cidade VALUES (5217203,52,'PIRANHAS');
INSERT INTO cidade VALUES (2108801,21,'PIRAPEMAS');
INSERT INTO cidade VALUES (3151107,31,'PIRAPETINGA');
INSERT INTO cidade VALUES (4314555,43,'PIRAPO');
INSERT INTO cidade VALUES (3151206,31,'PIRAPORA');
INSERT INTO cidade VALUES (3539103,35,'PIRAPORA DO BOM JESUS');
INSERT INTO cidade VALUES (3539202,35,'PIRAPOZINHO');
INSERT INTO cidade VALUES (4119509,41,'PIRAQUARA');
INSERT INTO cidade VALUES (1717206,17,'PIRAQUE');
INSERT INTO cidade VALUES (3539301,35,'PIRASSUNUNGA');
INSERT INTO cidade VALUES (4314605,43,'PIRATINI');
INSERT INTO cidade VALUES (3539400,35,'PIRATININGA');
INSERT INTO cidade VALUES (4213104,42,'PIRATUBA');
INSERT INTO cidade VALUES (3151305,31,'PIRAUBA');
INSERT INTO cidade VALUES (5217302,52,'PIRENOPOLIS');
INSERT INTO cidade VALUES (5217401,52,'PIRES DO RIO');
INSERT INTO cidade VALUES (2310951,23,'PIRES FERREIRA');
INSERT INTO cidade VALUES (2924702,29,'PIRIPA');
INSERT INTO cidade VALUES (2208403,22,'PIRIPIRI');
INSERT INTO cidade VALUES (2924801,29,'PIRITIBA');
INSERT INTO cidade VALUES (2511806,25,'PIRPIRITUBA');
INSERT INTO cidade VALUES (4119608,41,'PITANGA');
INSERT INTO cidade VALUES (4119657,41,'PITANGUEIRAS');
INSERT INTO cidade VALUES (3539509,35,'PITANGUEIRAS');
INSERT INTO cidade VALUES (3151404,31,'PITANGUI');
INSERT INTO cidade VALUES (2511905,25,'PITIMBU');
INSERT INTO cidade VALUES (1717503,17,'PIUM');
INSERT INTO cidade VALUES (3204203,32,'PIUMA');
INSERT INTO cidade VALUES (3151503,31,'PIUMHI');
INSERT INTO cidade VALUES (1505650,15,'PLACAS');
INSERT INTO cidade VALUES (1200385,12,'PLACIDO DE CASTRO');
INSERT INTO cidade VALUES (5217609,52,'PLANALTINA');
INSERT INTO cidade VALUES (4119707,41,'PLANALTINA DO PARANA');
INSERT INTO cidade VALUES (2924900,29,'PLANALTINO');
INSERT INTO cidade VALUES (4314704,43,'PLANALTO');
INSERT INTO cidade VALUES (2925006,29,'PLANALTO');
INSERT INTO cidade VALUES (4119806,41,'PLANALTO');
INSERT INTO cidade VALUES (3539608,35,'PLANALTO');
INSERT INTO cidade VALUES (4213153,42,'PLANALTO ALEGRE');
INSERT INTO cidade VALUES (5106455,51,'PLANALTO DA SERRA');
INSERT INTO cidade VALUES (3151602,31,'PLANURA');
INSERT INTO cidade VALUES (3539707,35,'PLATINA');
INSERT INTO cidade VALUES (3539806,35,'POA');
INSERT INTO cidade VALUES (2611200,26,'POCAO');
INSERT INTO cidade VALUES (2108900,21,'POCAO DE PEDRAS');
INSERT INTO cidade VALUES (2512002,25,'POCINHOS');
INSERT INTO cidade VALUES (2410108,24,'POCO BRANCO');
INSERT INTO cidade VALUES (2512036,25,'POCO DANTAS');
INSERT INTO cidade VALUES (4314753,43,'POCO DAS ANTAS');
INSERT INTO cidade VALUES (2707206,27,'POCO DAS TRINCHEIRAS');
INSERT INTO cidade VALUES (2512077,25,'POCO DE JOSE DE MOURA');
INSERT INTO cidade VALUES (3151701,31,'POCO FUNDO');
INSERT INTO cidade VALUES (2805406,28,'POCO REDONDO');
INSERT INTO cidade VALUES (2805505,28,'POCO VERDE');
INSERT INTO cidade VALUES (2925105,29,'POCOES');
INSERT INTO cidade VALUES (5106505,51,'POCONE');
INSERT INTO cidade VALUES (3151800,31,'POCOS DE CALDAS');
INSERT INTO cidade VALUES (3151909,31,'POCRANE');
INSERT INTO cidade VALUES (2925204,29,'POJUCA');
INSERT INTO cidade VALUES (3539905,35,'POLONI');
INSERT INTO cidade VALUES (2512101,25,'POMBAL');
INSERT INTO cidade VALUES (2611309,26,'POMBOS');
INSERT INTO cidade VALUES (4213203,42,'POMERODE');
INSERT INTO cidade VALUES (3540002,35,'POMPEIA');
INSERT INTO cidade VALUES (3152006,31,'POMPEU');
INSERT INTO cidade VALUES (3540101,35,'PONGAI');
INSERT INTO cidade VALUES (1505700,15,'PONTA DE PEDRAS');
INSERT INTO cidade VALUES (4119905,41,'PONTA GROSSA');
INSERT INTO cidade VALUES (5006606,50,'PONTA PORA');
INSERT INTO cidade VALUES (3540200,35,'PONTAL');
INSERT INTO cidade VALUES (5106653,51,'PONTAL DO ARAGUAIA');
INSERT INTO cidade VALUES (4119954,41,'PONTAL DO PARANA');
INSERT INTO cidade VALUES (5217708,52,'PONTALINA');
INSERT INTO cidade VALUES (3540259,35,'PONTALINDA');
INSERT INTO cidade VALUES (4314779,43,'PONTAO');
INSERT INTO cidade VALUES (4213302,42,'PONTE ALTA');
INSERT INTO cidade VALUES (1717800,17,'PONTE ALTA DO BOM JESUS');
INSERT INTO cidade VALUES (4213351,42,'PONTE ALTA DO NORTE');
INSERT INTO cidade VALUES (1717909,17,'PONTE ALTA DO TOCANTINS');
INSERT INTO cidade VALUES (5106703,51,'PONTE BRANCA');
INSERT INTO cidade VALUES (3152105,31,'PONTE NOVA');
INSERT INTO cidade VALUES (4314787,43,'PONTE PRETA');
INSERT INTO cidade VALUES (4213401,42,'PONTE SERRADA');
INSERT INTO cidade VALUES (5106752,51,'PONTES E LACERDA');
INSERT INTO cidade VALUES (3540309,35,'PONTES GESTAL');
INSERT INTO cidade VALUES (3204252,32,'PONTO BELO');
INSERT INTO cidade VALUES (3152131,31,'PONTO CHIQUE');
INSERT INTO cidade VALUES (3152170,31,'PONTO DO VOLANTES');
INSERT INTO cidade VALUES (2925253,29,'PONTO NOVO');
INSERT INTO cidade VALUES (3540408,35,'POPULINA');
INSERT INTO cidade VALUES (2311009,23,'PORANGA');
INSERT INTO cidade VALUES (3540507,35,'PORANGABA');
INSERT INTO cidade VALUES (5218003,52,'PORANGATU');
INSERT INTO cidade VALUES (3304102,33,'PORCIUNCULA');
INSERT INTO cidade VALUES (4120002,41,'PORECATU');
INSERT INTO cidade VALUES (2410207,24,'PORTALEGRE');
INSERT INTO cidade VALUES (4314803,43,'PORTAO');
INSERT INTO cidade VALUES (5218052,52,'PORTEIRAO');
INSERT INTO cidade VALUES (2311108,23,'PORTEIRAS');
INSERT INTO cidade VALUES (3152204,31,'PORTEIRINHA');
INSERT INTO cidade VALUES (1505809,15,'PORTEL');
INSERT INTO cidade VALUES (5218102,52,'PORTELANDIA');
INSERT INTO cidade VALUES (2208502,22,'PORTO');
INSERT INTO cidade VALUES (1200807,12,'PORTO ACRE');
INSERT INTO cidade VALUES (4314902,43,'PORTO ALEGRE');
INSERT INTO cidade VALUES (5106778,51,'PORTO ALEGRE DO NORTE');
INSERT INTO cidade VALUES (2208551,22,'PORTO ALEGRE DO PIAUI');
INSERT INTO cidade VALUES (1718006,17,'PORTO ALEGRE DO TOCANTINS');
INSERT INTO cidade VALUES (4120101,41,'PORTO AMAZONAS');
INSERT INTO cidade VALUES (4120150,41,'PORTO BARREIRO');
INSERT INTO cidade VALUES (4213500,42,'PORTO BELO');
INSERT INTO cidade VALUES (2707305,27,'PORTO CALVO');
INSERT INTO cidade VALUES (2805604,28,'PORTO DA FOLHA');
INSERT INTO cidade VALUES (1505908,15,'PORTO DE MOZ');
INSERT INTO cidade VALUES (2707404,27,'PORTO DE PEDRAS');
INSERT INTO cidade VALUES (5106802,51,'PORTO DO GAUCHOS');
INSERT INTO cidade VALUES (2410256,24,'PORTO DO MANGUE');
INSERT INTO cidade VALUES (5106828,51,'PORTO ESPERIDIAO');
INSERT INTO cidade VALUES (5106851,51,'PORTO ESTRELA');
INSERT INTO cidade VALUES (3540606,35,'PORTO FELIZ');
INSERT INTO cidade VALUES (3540705,35,'PORTO FERREIRA');
INSERT INTO cidade VALUES (3152303,31,'PORTO FIRME');
INSERT INTO cidade VALUES (2109007,21,'PORTO FRANCO');
INSERT INTO cidade VALUES (1600535,16,'PORTO GRANDE');
INSERT INTO cidade VALUES (4315008,43,'PORTO LUCENA');
INSERT INTO cidade VALUES (4315057,43,'PORTO MAUA');
INSERT INTO cidade VALUES (5006903,50,'PORTO MURTINHO');
INSERT INTO cidade VALUES (1718204,17,'PORTO NACIONAL');
INSERT INTO cidade VALUES (3304110,33,'PORTO REAL');
INSERT INTO cidade VALUES (2707503,27,'PORTO REAL DO COLEGIO');
INSERT INTO cidade VALUES (4120200,41,'PORTO RICO');
INSERT INTO cidade VALUES (2109056,21,'PORTO RICO DO MARANHAO');
INSERT INTO cidade VALUES (2925303,29,'PORTO SEGURO');
INSERT INTO cidade VALUES (4213609,42,'PORTO UNIAO');
INSERT INTO cidade VALUES (1100205,11,'PORTO VELHO');
INSERT INTO cidade VALUES (4315073,43,'PORTO VERA CRUZ');
INSERT INTO cidade VALUES (4120309,41,'PORTO VITORIA');
INSERT INTO cidade VALUES (1200393,12,'PORTO WALTER');
INSERT INTO cidade VALUES (4315107,43,'PORTO XAVIER');
INSERT INTO cidade VALUES (5218300,52,'POSSE');
INSERT INTO cidade VALUES (3152402,31,'POTE');
INSERT INTO cidade VALUES (2311207,23,'POTENGI');
INSERT INTO cidade VALUES (3540754,35,'POTIM');
INSERT INTO cidade VALUES (2925402,29,'POTIRAGUA');
INSERT INTO cidade VALUES (3540804,35,'POTIRENDABA');
INSERT INTO cidade VALUES (2311231,23,'POTIRETAMA');
INSERT INTO cidade VALUES (3152501,31,'POUSO ALEGRE');
INSERT INTO cidade VALUES (3152600,31,'POUSO ALTO');
INSERT INTO cidade VALUES (4315131,43,'POUSO NOVO');
INSERT INTO cidade VALUES (4213708,42,'POUSO REDONDO');
INSERT INTO cidade VALUES (5107008,51,'POXOREO');
INSERT INTO cidade VALUES (3540853,35,'PRACINHA');
INSERT INTO cidade VALUES (1600550,16,'PRACUUBA');
INSERT INTO cidade VALUES (2925501,29,'PRADO');
INSERT INTO cidade VALUES (4120333,41,'PRADO FERREIRA');
INSERT INTO cidade VALUES (3540903,35,'PRADOPOLIS');
INSERT INTO cidade VALUES (3152709,31,'PRADOS');
INSERT INTO cidade VALUES (3541000,35,'PRAIA GRANDE');
INSERT INTO cidade VALUES (4213807,42,'PRAIA GRANDE');
INSERT INTO cidade VALUES (1718303,17,'PRAIA NORTE');
INSERT INTO cidade VALUES (1506005,15,'PRAINHA');
INSERT INTO cidade VALUES (4120358,41,'PRANCHITA');
INSERT INTO cidade VALUES (2512200,25,'PRATA');
INSERT INTO cidade VALUES (3152808,31,'PRATA');
INSERT INTO cidade VALUES (2208601,22,'PRATA DO PIAUI');
INSERT INTO cidade VALUES (3541059,35,'PRATANIA');
INSERT INTO cidade VALUES (3152907,31,'PRATAPOLIS');
INSERT INTO cidade VALUES (3153004,31,'PRATINHA');
INSERT INTO cidade VALUES (3541109,35,'PRESIDENTE ALVES');
INSERT INTO cidade VALUES (3153103,31,'PRESIDENTE BERNARDES');
INSERT INTO cidade VALUES (3541208,35,'PRESIDENTE BERNARDES');
INSERT INTO cidade VALUES (4120408,41,'PRESIDENTE CASTELO BRANCO');
INSERT INTO cidade VALUES (4213906,42,'PRESIDENTE CASTELO BRANCO');
INSERT INTO cidade VALUES (2925600,29,'PRESIDENTE DUTRA');
INSERT INTO cidade VALUES (2109106,21,'PRESIDENTE DUTRA');
INSERT INTO cidade VALUES (3541307,35,'PRESIDENTE EPITACIO');
INSERT INTO cidade VALUES (1303536,13,'PRESIDENTE FIGUEIREDO');
INSERT INTO cidade VALUES (4214003,42,'PRESIDENTE GETULIO');
INSERT INTO cidade VALUES (2925709,29,'PRESIDENTE JANIO QUADROS');
INSERT INTO cidade VALUES (2109205,21,'PRESIDENTE JUSCELINO');
INSERT INTO cidade VALUES (3153202,31,'PRESIDENTE JUSCELINO');
INSERT INTO cidade VALUES (2410306,24,'PRESIDENTE JUSCELINO');
INSERT INTO cidade VALUES (3204302,32,'PRESIDENTE KENNEDY');
INSERT INTO cidade VALUES (1718402,17,'PRESIDENTE KENNEDY');
INSERT INTO cidade VALUES (3153301,31,'PRESIDENTE KUBITSCHEK');
INSERT INTO cidade VALUES (4315149,43,'PRESIDENTE LUCENA');
INSERT INTO cidade VALUES (1100254,11,'PRESIDENTE MEDICI');
INSERT INTO cidade VALUES (2109239,21,'PRESIDENTE MEDICI');
INSERT INTO cidade VALUES (4214102,42,'PRESIDENTE NEREU');
INSERT INTO cidade VALUES (3153400,31,'PRESIDENTE OLEGARIO');
INSERT INTO cidade VALUES (3541406,35,'PRESIDENTE PRUDENTE');
INSERT INTO cidade VALUES (2109270,21,'PRESIDENTE SARNEY');
INSERT INTO cidade VALUES (2925758,29,'PRESIDENTE TANCREDO NEVES');
INSERT INTO cidade VALUES (2109304,21,'PRESIDENTE VARGAS');
INSERT INTO cidade VALUES (3541505,35,'PRESIDENTE VENCESLAU');
INSERT INTO cidade VALUES (2611408,26,'PRIMAVERA');
INSERT INTO cidade VALUES (1506104,15,'PRIMAVERA');
INSERT INTO cidade VALUES (1101476,11,'PRIMAVERA DE RONDONIA');
INSERT INTO cidade VALUES (5107040,51,'PRIMAVERA DO LESTE');
INSERT INTO cidade VALUES (2109403,21,'PRIMEIRA CRUZ');
INSERT INTO cidade VALUES (4120507,41,'PRIMEIRO DE MAIO');
INSERT INTO cidade VALUES (4214151,42,'PRINCESA');
INSERT INTO cidade VALUES (2512309,25,'PRINCESA ISABEL');
INSERT INTO cidade VALUES (5218391,52,'PROFESSOR JAMIL');
INSERT INTO cidade VALUES (4315156,43,'PROGRESSO');
INSERT INTO cidade VALUES (3541604,35,'PROMISSAO');
INSERT INTO cidade VALUES (2805703,28,'PROPRIA');
INSERT INTO cidade VALUES (4315172,43,'PROTASIO ALVES');
INSERT INTO cidade VALUES (3153608,31,'PRUDENTE DE MORAIS');
INSERT INTO cidade VALUES (4120606,41,'PRUDENTOPOLIS');
INSERT INTO cidade VALUES (1718451,17,'PUGMIL');
INSERT INTO cidade VALUES (2410405,24,'PUREZA');
INSERT INTO cidade VALUES (4315206,43,'PUTINGA');
INSERT INTO cidade VALUES (2512408,25,'PUXINANA');
INSERT INTO cidade VALUES (3541653,35,'QUADRA');
INSERT INTO cidade VALUES (4315305,43,'QUARAI');
INSERT INTO cidade VALUES (3153707,31,'QUARTEL GERAL');
INSERT INTO cidade VALUES (4120655,41,'QUARTO CENTENARIO');
INSERT INTO cidade VALUES (3541703,35,'QUATA');
INSERT INTO cidade VALUES (4120705,41,'QUATIGUA');
INSERT INTO cidade VALUES (1506112,15,'QUATIPURU');
INSERT INTO cidade VALUES (3304128,33,'QUATIS');
INSERT INTO cidade VALUES (4120804,41,'QUATRO BARRAS');
INSERT INTO cidade VALUES (4315313,43,'QUATRO IRMAOS');
INSERT INTO cidade VALUES (4120853,41,'QUATRO PONTES');
INSERT INTO cidade VALUES (2707602,27,'QUEBRANGULO');
INSERT INTO cidade VALUES (4120903,41,'QUEDAS DO IGUACU');
INSERT INTO cidade VALUES (2208650,22,'QUEIMADA NOVA');
INSERT INTO cidade VALUES (2512507,25,'QUEIMADAS');
INSERT INTO cidade VALUES (2925808,29,'QUEIMADAS');
INSERT INTO cidade VALUES (3304144,33,'QUEIMADOS');
INSERT INTO cidade VALUES (3541802,35,'QUEIROZ');
INSERT INTO cidade VALUES (3541901,35,'QUELUZ');
INSERT INTO cidade VALUES (3153806,31,'QUELUZITO');
INSERT INTO cidade VALUES (5107065,51,'QUERENCIA');
INSERT INTO cidade VALUES (4121000,41,'QUERENCIA DO NORTE');
INSERT INTO cidade VALUES (4315321,43,'QUEVEDOS');
INSERT INTO cidade VALUES (2925907,29,'QUIJINGUE');
INSERT INTO cidade VALUES (4214201,42,'QUILOMBO');
INSERT INTO cidade VALUES (4121109,41,'QUINTA DO SOL');
INSERT INTO cidade VALUES (3542008,35,'QUINTANA');
INSERT INTO cidade VALUES (4315354,43,'QUINZE DE NOVEMBRO');
INSERT INTO cidade VALUES (2611507,26,'QUIPAPA');
INSERT INTO cidade VALUES (5218508,52,'QUIRINOPOLIS');
INSERT INTO cidade VALUES (3304151,33,'QUISSAMA');
INSERT INTO cidade VALUES (4121208,41,'QUITANDINHA');
INSERT INTO cidade VALUES (2311264,23,'QUITERIANOPOLIS');
INSERT INTO cidade VALUES (2512606,25,'QUIXABA');
INSERT INTO cidade VALUES (2611533,26,'QUIXABA');
INSERT INTO cidade VALUES (2925931,29,'QUIXABEIRA');
INSERT INTO cidade VALUES (2311306,23,'QUIXADA');
INSERT INTO cidade VALUES (2311355,23,'QUIXELO');
INSERT INTO cidade VALUES (2311405,23,'QUIXERAMOBIM');
INSERT INTO cidade VALUES (2311504,23,'QUIXERE');
INSERT INTO cidade VALUES (2410504,24,'RAFAEL FERNANDES');
INSERT INTO cidade VALUES (2410603,24,'RAFAEL GODEIRO');
INSERT INTO cidade VALUES (2925956,29,'RAFAEL JAMBEIRO');
INSERT INTO cidade VALUES (3542107,35,'RAFARD');
INSERT INTO cidade VALUES (4121257,41,'RAMILANDIA');
INSERT INTO cidade VALUES (3542206,35,'RANCHARIA');
INSERT INTO cidade VALUES (4121307,41,'RANCHO ALEGRE');
INSERT INTO cidade VALUES (4121356,41,'RANCHO ALEGRE D´OESTE');
INSERT INTO cidade VALUES (4214300,42,'RANCHO QUEIMADO');
INSERT INTO cidade VALUES (2109452,21,'RAPOSA');
INSERT INTO cidade VALUES (3153905,31,'RAPOSOS');
INSERT INTO cidade VALUES (3154002,31,'RAUL SOARES');
INSERT INTO cidade VALUES (4121406,41,'REALEZA');
INSERT INTO cidade VALUES (4121505,41,'REBOUCAS');
INSERT INTO cidade VALUES (2611606,26,'RECIFE');
INSERT INTO cidade VALUES (3154101,31,'RECREIO');
INSERT INTO cidade VALUES (1718501,17,'RECURSOLANDIA');
INSERT INTO cidade VALUES (2311603,23,'REDENCAO');
INSERT INTO cidade VALUES (1506138,15,'REDENCAO');
INSERT INTO cidade VALUES (3542305,35,'REDENCAO DA SERRA');
INSERT INTO cidade VALUES (2208700,22,'REDENCAO DO GURGUEIA');
INSERT INTO cidade VALUES (4315404,43,'REDENTORA');
INSERT INTO cidade VALUES (3154150,31,'REDUTO');
INSERT INTO cidade VALUES (2208809,22,'REGENERACAO');
INSERT INTO cidade VALUES (3542404,35,'REGENTE FEIJO');
INSERT INTO cidade VALUES (3542503,35,'REGINOPOLIS');
INSERT INTO cidade VALUES (3542602,35,'REGISTRO');
INSERT INTO cidade VALUES (4315453,43,'RELVADO');
INSERT INTO cidade VALUES (2926004,29,'REMANSO');
INSERT INTO cidade VALUES (2512705,25,'REMIGIO');
INSERT INTO cidade VALUES (4121604,41,'RENASCENCA');
INSERT INTO cidade VALUES (2311702,23,'RERIUTABA');
INSERT INTO cidade VALUES (3304201,33,'RESENDE');
INSERT INTO cidade VALUES (3154200,31,'RESENDE COSTA');
INSERT INTO cidade VALUES (4121703,41,'RESERVA');
INSERT INTO cidade VALUES (5107156,51,'RESERVA DO CABACAL');
INSERT INTO cidade VALUES (4121752,41,'RESERVA DO IGUACU');
INSERT INTO cidade VALUES (3154309,31,'RESPLENDOR');
INSERT INTO cidade VALUES (3154408,31,'RESSAQUINHA');
INSERT INTO cidade VALUES (3542701,35,'RESTINGA');
INSERT INTO cidade VALUES (4315503,43,'RESTINGA SECA');
INSERT INTO cidade VALUES (2926103,29,'RETIROLANDIA');
INSERT INTO cidade VALUES (2109502,21,'RIACHAO');
INSERT INTO cidade VALUES (2512747,25,'RIACHAO');
INSERT INTO cidade VALUES (2926202,29,'RIACHAO DAS NEVES');
INSERT INTO cidade VALUES (2512754,25,'RIACHAO DO BACAMARTE');
INSERT INTO cidade VALUES (2805802,28,'RIACHAO DO DANTAS');
INSERT INTO cidade VALUES (2926301,29,'RIACHAO DO JACUIPE');
INSERT INTO cidade VALUES (2512762,25,'RIACHAO DO POCO');
INSERT INTO cidade VALUES (1718550,17,'RIACHINHO');
INSERT INTO cidade VALUES (3154457,31,'RIACHINHO');
INSERT INTO cidade VALUES (2410702,24,'RIACHO DA CRUZ');
INSERT INTO cidade VALUES (2611705,26,'RIACHO DAS ALMAS');
INSERT INTO cidade VALUES (2410801,24,'RIACHO DE SANTANA');
INSERT INTO cidade VALUES (2926400,29,'RIACHO DE SANTANA');
INSERT INTO cidade VALUES (2512788,25,'RIACHO DE SANTO ANTONIO');
INSERT INTO cidade VALUES (2512804,25,'RIACHO DO CAVALOS');
INSERT INTO cidade VALUES (3154507,31,'RIACHO DO MACHADOS');
INSERT INTO cidade VALUES (2208858,22,'RIACHO FRIO');
INSERT INTO cidade VALUES (2805901,28,'RIACHUELO');
INSERT INTO cidade VALUES (2410900,24,'RIACHUELO');
INSERT INTO cidade VALUES (5218607,52,'RIALMA');
INSERT INTO cidade VALUES (5218706,52,'RIANAPOLIS');
INSERT INTO cidade VALUES (2109551,21,'RIBAMAR FIQUENE');
INSERT INTO cidade VALUES (5007109,50,'RIBAS DO RIO PARDO');
INSERT INTO cidade VALUES (3542800,35,'RIBEIRA');
INSERT INTO cidade VALUES (2926509,29,'RIBEIRA DO AMPARO');
INSERT INTO cidade VALUES (2208874,22,'RIBEIRA DO PIAUI');
INSERT INTO cidade VALUES (2926608,29,'RIBEIRA DO POMBAL');
INSERT INTO cidade VALUES (2611804,26,'RIBEIRAO');
INSERT INTO cidade VALUES (3542909,35,'RIBEIRAO BONITO');
INSERT INTO cidade VALUES (3543006,35,'RIBEIRAO BRANCO');
INSERT INTO cidade VALUES (5107180,51,'RIBEIRAO CASCALHEIRA');
INSERT INTO cidade VALUES (4121802,41,'RIBEIRAO CLARO');
INSERT INTO cidade VALUES (3543105,35,'RIBEIRAO CORRENTE');
INSERT INTO cidade VALUES (3154606,31,'RIBEIRAO DAS NEVES');
INSERT INTO cidade VALUES (3543238,35,'RIBEIRAO DO INDIOS');
INSERT INTO cidade VALUES (2926657,29,'RIBEIRAO DO LARGO');
INSERT INTO cidade VALUES (4121901,41,'RIBEIRAO DO PINHAL');
INSERT INTO cidade VALUES (3543204,35,'RIBEIRAO DO SUL');
INSERT INTO cidade VALUES (3543253,35,'RIBEIRAO GRANDE');
INSERT INTO cidade VALUES (3543303,35,'RIBEIRAO PIRES');
INSERT INTO cidade VALUES (3543402,35,'RIBEIRAO PRETO');
INSERT INTO cidade VALUES (3154705,31,'RIBEIRAO VERMELHO');
INSERT INTO cidade VALUES (5107198,51,'RIBEIRAOZINHO');
INSERT INTO cidade VALUES (2208908,22,'RIBEIRO GONCALVES');
INSERT INTO cidade VALUES (2806008,28,'RIBEIROPOLIS');
INSERT INTO cidade VALUES (3543600,35,'RIFAINA');
INSERT INTO cidade VALUES (3543709,35,'RINCAO');
INSERT INTO cidade VALUES (3543808,35,'RINOPOLIS');
INSERT INTO cidade VALUES (3154804,31,'RIO ACIMA');
INSERT INTO cidade VALUES (4122008,41,'RIO AZUL');
INSERT INTO cidade VALUES (3204351,32,'RIO BANANAL');
INSERT INTO cidade VALUES (4122107,41,'RIO BOM');
INSERT INTO cidade VALUES (3304300,33,'RIO BONITO');
INSERT INTO cidade VALUES (4122156,41,'RIO BONITO DO IGUACU');
INSERT INTO cidade VALUES (1200401,12,'RIO BRANCO');
INSERT INTO cidade VALUES (5107206,51,'RIO BRANCO');
INSERT INTO cidade VALUES (4122172,41,'RIO BRANCO DO IVAI');
INSERT INTO cidade VALUES (4122206,41,'RIO BRANCO DO SUL');
INSERT INTO cidade VALUES (5007208,50,'RIO BRILHANTE');
INSERT INTO cidade VALUES (3154903,31,'RIO CASCA');
INSERT INTO cidade VALUES (3543907,35,'RIO CLARO');
INSERT INTO cidade VALUES (3304409,33,'RIO CLARO');
INSERT INTO cidade VALUES (1100262,11,'RIO CRESPO');
INSERT INTO cidade VALUES (1718659,17,'RIO DA CONCEICAO');
INSERT INTO cidade VALUES (4214409,42,'RIO DAS ANTAS');
INSERT INTO cidade VALUES (3304508,33,'RIO DAS FLORES');
INSERT INTO cidade VALUES (3304524,33,'RIO DAS OSTRAS');
INSERT INTO cidade VALUES (3544004,35,'RIO DAS PEDRAS');
INSERT INTO cidade VALUES (2926707,29,'RIO DE CONTAS');
INSERT INTO cidade VALUES (3304557,33,'RIO DE JANEIRO');
INSERT INTO cidade VALUES (2926806,29,'RIO DO ANTONIO');
INSERT INTO cidade VALUES (1718709,17,'RIO DO BOIS');
INSERT INTO cidade VALUES (4214508,42,'RIO DO CAMPO');
INSERT INTO cidade VALUES (4214706,42,'RIO DO CEDROS');
INSERT INTO cidade VALUES (2408953,24,'RIO DO FOGO');
INSERT INTO cidade VALUES (4315552,43,'RIO DO INDIOS');
INSERT INTO cidade VALUES (4214607,42,'RIO DO OESTE');
INSERT INTO cidade VALUES (2926905,29,'RIO DO PIRES');
INSERT INTO cidade VALUES (3155108,31,'RIO DO PRADO');
INSERT INTO cidade VALUES (4214805,42,'RIO DO SUL');
INSERT INTO cidade VALUES (3155009,31,'RIO DOCE');
INSERT INTO cidade VALUES (3155207,31,'RIO ESPERA');
INSERT INTO cidade VALUES (2611903,26,'RIO FORMOSO');
INSERT INTO cidade VALUES (4214904,42,'RIO FORTUNA');
INSERT INTO cidade VALUES (4315602,43,'RIO GRANDE');
INSERT INTO cidade VALUES (3544103,35,'RIO GRANDE DA SERRA');
INSERT INTO cidade VALUES (2209005,22,'RIO GRANDE DO PIAUI');
INSERT INTO cidade VALUES (2707701,27,'RIO LARGO');
INSERT INTO cidade VALUES (3155306,31,'RIO MANSO');
INSERT INTO cidade VALUES (1506161,15,'RIO MARIA');
INSERT INTO cidade VALUES (4215000,42,'RIO NEGRINHO');
INSERT INTO cidade VALUES (4122305,41,'RIO NEGRO');
INSERT INTO cidade VALUES (5007307,50,'RIO NEGRO');
INSERT INTO cidade VALUES (3155405,31,'RIO NOVO');
INSERT INTO cidade VALUES (3204401,32,'RIO NOVO DO SUL');
INSERT INTO cidade VALUES (3155504,31,'RIO PARANAIBA');
INSERT INTO cidade VALUES (4315701,43,'RIO PARDO');
INSERT INTO cidade VALUES (3155603,31,'RIO PARDO DE MINAS');
INSERT INTO cidade VALUES (3155702,31,'RIO PIRACICABA');
INSERT INTO cidade VALUES (3155801,31,'RIO POMBA');
INSERT INTO cidade VALUES (3155900,31,'RIO PRETO');
INSERT INTO cidade VALUES (1303569,13,'RIO PRETO DA EVA');
INSERT INTO cidade VALUES (5218789,52,'RIO QUENTE');
INSERT INTO cidade VALUES (2927002,29,'RIO REAL');
INSERT INTO cidade VALUES (4215059,42,'RIO RUFINO');
INSERT INTO cidade VALUES (1718758,17,'RIO SONO');
INSERT INTO cidade VALUES (2512903,25,'RIO TINTO');
INSERT INTO cidade VALUES (5218805,52,'RIO VERDE');
INSERT INTO cidade VALUES (5007406,50,'RIO VERDE DE MATO GROSSO');
INSERT INTO cidade VALUES (3156007,31,'RIO VERMELHO');
INSERT INTO cidade VALUES (3544202,35,'RIOLANDIA');
INSERT INTO cidade VALUES (4315750,43,'RIOZINHO');
INSERT INTO cidade VALUES (4215075,42,'RIQUEZA');
INSERT INTO cidade VALUES (3156106,31,'RITAPOLIS');
INSERT INTO cidade VALUES (3543501,35,'RIVERSUL');
INSERT INTO cidade VALUES (4315800,43,'ROCA SALES');
INSERT INTO cidade VALUES (5007505,50,'ROCHEDO');
INSERT INTO cidade VALUES (3156205,31,'ROCHEDO DE MINAS');
INSERT INTO cidade VALUES (4215109,42,'RODEIO');
INSERT INTO cidade VALUES (4315909,43,'RODEIO BONITO');
INSERT INTO cidade VALUES (3156304,31,'RODEIRO');
INSERT INTO cidade VALUES (2927101,29,'RODELAS');
INSERT INTO cidade VALUES (2411007,24,'RODOLFO FERNANDES');
INSERT INTO cidade VALUES (1200427,12,'RODRIGUES ALVES');
INSERT INTO cidade VALUES (4315958,43,'ROLADOR');
INSERT INTO cidade VALUES (4122404,41,'ROLANDIA');
INSERT INTO cidade VALUES (4316006,43,'ROLANTE');
INSERT INTO cidade VALUES (1100288,11,'ROLIM DE MOURA');
INSERT INTO cidade VALUES (3156403,31,'ROMARIA');
INSERT INTO cidade VALUES (4215208,42,'ROMELANDIA');
INSERT INTO cidade VALUES (4122503,41,'RONCADOR');
INSERT INTO cidade VALUES (4316105,43,'RONDA ALTA');
INSERT INTO cidade VALUES (4316204,43,'RONDINHA');
INSERT INTO cidade VALUES (5107578,51,'RONDOLANDIA');
INSERT INTO cidade VALUES (4122602,41,'RONDON');
INSERT INTO cidade VALUES (1506187,15,'RONDON DO PARA');
INSERT INTO cidade VALUES (5107602,51,'RONDONOPOLIS');
INSERT INTO cidade VALUES (4316303,43,'ROQUE GONZALES');
INSERT INTO cidade VALUES (1400472,14,'RORAINOPOLIS');
INSERT INTO cidade VALUES (3544251,35,'ROSANA');
INSERT INTO cidade VALUES (2109601,21,'ROSARIO');
INSERT INTO cidade VALUES (3156452,31,'ROSARIO DA LIMEIRA');
INSERT INTO cidade VALUES (2806107,28,'ROSARIO DO CATETE');
INSERT INTO cidade VALUES (4122651,41,'ROSARIO DO IVAI');
INSERT INTO cidade VALUES (4316402,43,'ROSARIO DO SUL');
INSERT INTO cidade VALUES (5107701,51,'ROSARIO OESTE');
INSERT INTO cidade VALUES (3544301,35,'ROSEIRA');
INSERT INTO cidade VALUES (2707800,27,'ROTEIRO');
INSERT INTO cidade VALUES (3156502,31,'RUBELITA');
INSERT INTO cidade VALUES (3544400,35,'RUBIACEA');
INSERT INTO cidade VALUES (5218904,52,'RUBIATABA');
INSERT INTO cidade VALUES (3156601,31,'RUBIM');
INSERT INTO cidade VALUES (3544509,35,'RUBINEIA');
INSERT INTO cidade VALUES (1506195,15,'RUROPOLIS');
INSERT INTO cidade VALUES (2311801,23,'RUSSAS');
INSERT INTO cidade VALUES (2927200,29,'RUY BARBOSA');
INSERT INTO cidade VALUES (2411106,24,'RUY BARBOSA');
INSERT INTO cidade VALUES (3156700,31,'SABARA');
INSERT INTO cidade VALUES (4122701,41,'SABAUDIA');
INSERT INTO cidade VALUES (3544608,35,'SABINO');
INSERT INTO cidade VALUES (3156809,31,'SABINOPOLIS');
INSERT INTO cidade VALUES (2311900,23,'SABOEIRO');
INSERT INTO cidade VALUES (3156908,31,'SACRAMENTO');
INSERT INTO cidade VALUES (4316428,43,'SAGRADA FAMILIA');
INSERT INTO cidade VALUES (3544707,35,'SAGRES');
INSERT INTO cidade VALUES (2612000,26,'SAIRE');
INSERT INTO cidade VALUES (4316436,43,'SALDANHA MARINHO');
INSERT INTO cidade VALUES (3544806,35,'SALES');
INSERT INTO cidade VALUES (3544905,35,'SALES OLIVEIRA');
INSERT INTO cidade VALUES (3545001,35,'SALESOPOLIS');
INSERT INTO cidade VALUES (4215307,42,'SALETE');
INSERT INTO cidade VALUES (2612109,26,'SALGADINHO');
INSERT INTO cidade VALUES (2513000,25,'SALGADINHO');
INSERT INTO cidade VALUES (2806206,28,'SALGADO');
INSERT INTO cidade VALUES (2513109,25,'SALGADO DE SAO FELIX');
INSERT INTO cidade VALUES (4122800,41,'SALGADO FILHO');
INSERT INTO cidade VALUES (2612208,26,'SALGUEIRO');
INSERT INTO cidade VALUES (3157005,31,'SALINAS');
INSERT INTO cidade VALUES (2927309,29,'SALINAS DA MARGARIDA');
INSERT INTO cidade VALUES (1506203,15,'SALINOPOLIS');
INSERT INTO cidade VALUES (2311959,23,'SALITRE');
INSERT INTO cidade VALUES (3545100,35,'SALMOURAO');
INSERT INTO cidade VALUES (2612307,26,'SALOA');
INSERT INTO cidade VALUES (4215356,42,'SALTINHO');
INSERT INTO cidade VALUES (3545159,35,'SALTINHO');
INSERT INTO cidade VALUES (3545209,35,'SALTO');
INSERT INTO cidade VALUES (3157104,31,'SALTO DA DIVISA');
INSERT INTO cidade VALUES (3545308,35,'SALTO DE PIRAPORA');
INSERT INTO cidade VALUES (5107750,51,'SALTO DO CEU');
INSERT INTO cidade VALUES (4122909,41,'SALTO DO ITARARE');
INSERT INTO cidade VALUES (4316451,43,'SALTO DO JACUI');
INSERT INTO cidade VALUES (4123006,41,'SALTO DO LONTRA');
INSERT INTO cidade VALUES (3545407,35,'SALTO GRANDE');
INSERT INTO cidade VALUES (4215406,42,'SALTO VELOSO');
INSERT INTO cidade VALUES (2927408,29,'SALVADOR');
INSERT INTO cidade VALUES (4316477,43,'SALVADOR DAS MISSOES');
INSERT INTO cidade VALUES (4316501,43,'SALVADOR DO SUL');
INSERT INTO cidade VALUES (1506302,15,'SALVATERRA');
INSERT INTO cidade VALUES (2109700,21,'SAMBAIBA');
INSERT INTO cidade VALUES (1718808,17,'SAMPAIO');
INSERT INTO cidade VALUES (4316600,43,'SANANDUVA');
INSERT INTO cidade VALUES (5219001,52,'SANCLERLANDIA');
INSERT INTO cidade VALUES (1718840,17,'SANDOLANDIA');
INSERT INTO cidade VALUES (3545506,35,'SANDOVALINA');
INSERT INTO cidade VALUES (4215455,42,'SANGAO');
INSERT INTO cidade VALUES (2612406,26,'SANHARO');
INSERT INTO cidade VALUES (3545605,35,'SANTA ADELIA');
INSERT INTO cidade VALUES (3545704,35,'SANTA ALBERTINA');
INSERT INTO cidade VALUES (4123105,41,'SANTA AMELIA');
INSERT INTO cidade VALUES (3157203,31,'SANTA BARBARA');
INSERT INTO cidade VALUES (2927507,29,'SANTA BARBARA');
INSERT INTO cidade VALUES (5219100,52,'SANTA BARBARA DE GOIAS');
INSERT INTO cidade VALUES (3157252,31,'SANTA BARBARA DO LESTE');
INSERT INTO cidade VALUES (3157278,31,'SANTA BARBARA DO MONTE VERDE');
INSERT INTO cidade VALUES (1506351,15,'SANTA BARBARA DO PARA');
INSERT INTO cidade VALUES (4316709,43,'SANTA BARBARA DO SUL');
INSERT INTO cidade VALUES (3157302,31,'SANTA BARBARA DO TUGURIO');
INSERT INTO cidade VALUES (3545803,35,'SANTA BARBARA D´OESTE');
INSERT INTO cidade VALUES (3546009,35,'SANTA BRANCA');
INSERT INTO cidade VALUES (2927606,29,'SANTA BRIGIDA');
INSERT INTO cidade VALUES (5107248,51,'SANTA CARMEM');
INSERT INTO cidade VALUES (4215505,42,'SANTA CECILIA');
INSERT INTO cidade VALUES (2513158,25,'SANTA CECILIA');
INSERT INTO cidade VALUES (4123204,41,'SANTA CECILIA DO PAVAO');
INSERT INTO cidade VALUES (4316733,43,'SANTA CECILIA DO SUL');
INSERT INTO cidade VALUES (4316758,43,'SANTA CLARA DO SUL');
INSERT INTO cidade VALUES (3546108,35,'SANTA CLARA D´OESTE');
INSERT INTO cidade VALUES (2513208,25,'SANTA CRUZ');
INSERT INTO cidade VALUES (2612455,26,'SANTA CRUZ');
INSERT INTO cidade VALUES (2411205,24,'SANTA CRUZ');
INSERT INTO cidade VALUES (2927705,29,'SANTA CRUZ CABRALIA');
INSERT INTO cidade VALUES (2612471,26,'SANTA CRUZ DA BAIXA VERDE');
INSERT INTO cidade VALUES (3546207,35,'SANTA CRUZ DA CONCEICAO');
INSERT INTO cidade VALUES (3546256,35,'SANTA CRUZ DA ESPERANCA');
INSERT INTO cidade VALUES (2927804,29,'SANTA CRUZ DA VITORIA');
INSERT INTO cidade VALUES (3546306,35,'SANTA CRUZ DAS PALMEIRAS');
INSERT INTO cidade VALUES (5219209,52,'SANTA CRUZ DE GOIAS');
INSERT INTO cidade VALUES (3157336,31,'SANTA CRUZ DE MINAS');
INSERT INTO cidade VALUES (4123303,41,'SANTA CRUZ DE MONTE CASTELO');
INSERT INTO cidade VALUES (3157377,31,'SANTA CRUZ DE SALINAS');
INSERT INTO cidade VALUES (1506401,15,'SANTA CRUZ DO ARARI');
INSERT INTO cidade VALUES (2612505,26,'SANTA CRUZ DO CAPIBARIBE');
INSERT INTO cidade VALUES (3157401,31,'SANTA CRUZ DO ESCALVADO');
INSERT INTO cidade VALUES (2209153,22,'SANTA CRUZ DO MILAGRES');
INSERT INTO cidade VALUES (2209104,22,'SANTA CRUZ DO PIAUI');
INSERT INTO cidade VALUES (3546405,35,'SANTA CRUZ DO RIO PARDO');
INSERT INTO cidade VALUES (4316808,43,'SANTA CRUZ DO SUL');
INSERT INTO cidade VALUES (5107743,51,'SANTA CRUZ DO XINGU');
INSERT INTO cidade VALUES (3157500,31,'SANTA EFIGENIA DE MINAS');
INSERT INTO cidade VALUES (3546504,35,'SANTA ERNESTINA');
INSERT INTO cidade VALUES (4123402,41,'SANTA FE');
INSERT INTO cidade VALUES (5219258,52,'SANTA FE DE GOIAS');
INSERT INTO cidade VALUES (3157609,31,'SANTA FE DE MINAS');
INSERT INTO cidade VALUES (1718865,17,'SANTA FE DO ARAGUAIA');
INSERT INTO cidade VALUES (3546603,35,'SANTA FE DO SUL');
INSERT INTO cidade VALUES (2209203,22,'SANTA FILOMENA');
INSERT INTO cidade VALUES (2612554,26,'SANTA FILOMENA');
INSERT INTO cidade VALUES (2109759,21,'SANTA FILOMENA DO MARANHAO');
INSERT INTO cidade VALUES (3546702,35,'SANTA GERTRUDES');
INSERT INTO cidade VALUES (4123501,41,'SANTA HELENA');
INSERT INTO cidade VALUES (2513307,25,'SANTA HELENA');
INSERT INTO cidade VALUES (4215554,42,'SANTA HELENA');
INSERT INTO cidade VALUES (2109809,21,'SANTA HELENA');
INSERT INTO cidade VALUES (5219308,52,'SANTA HELENA DE GOIAS');
INSERT INTO cidade VALUES (3157658,31,'SANTA HELENA DE MINAS');
INSERT INTO cidade VALUES (2927903,29,'SANTA INES');
INSERT INTO cidade VALUES (2109908,21,'SANTA INES');
INSERT INTO cidade VALUES (2513356,25,'SANTA INES');
INSERT INTO cidade VALUES (4123600,41,'SANTA INES');
INSERT INTO cidade VALUES (3546801,35,'SANTA ISABEL');
INSERT INTO cidade VALUES (5219357,52,'SANTA ISABEL');
INSERT INTO cidade VALUES (4123709,41,'SANTA ISABEL DO IVAI');
INSERT INTO cidade VALUES (1506500,15,'SANTA ISABEL DO PARA');
INSERT INTO cidade VALUES (1303601,13,'SANTA ISABEL DO RIO NEGRO');
INSERT INTO cidade VALUES (4123808,41,'SANTA IZABEL DO OESTE');
INSERT INTO cidade VALUES (3157708,31,'SANTA JULIANA');
INSERT INTO cidade VALUES (3204500,32,'SANTA LEOPOLDINA');
INSERT INTO cidade VALUES (3546900,35,'SANTA LUCIA');
INSERT INTO cidade VALUES (4123824,41,'SANTA LUCIA');
INSERT INTO cidade VALUES (2209302,22,'SANTA LUZ');
INSERT INTO cidade VALUES (2513406,25,'SANTA LUZIA');
INSERT INTO cidade VALUES (3157807,31,'SANTA LUZIA');
INSERT INTO cidade VALUES (2110005,21,'SANTA LUZIA');
INSERT INTO cidade VALUES (2928059,29,'SANTA LUZIA');
INSERT INTO cidade VALUES (2806305,28,'SANTA LUZIA DO ITANHY');
INSERT INTO cidade VALUES (2707909,27,'SANTA LUZIA DO NORTE');
INSERT INTO cidade VALUES (1506559,15,'SANTA LUZIA DO PARA');
INSERT INTO cidade VALUES (2110039,21,'SANTA LUZIA DO PARUA');
INSERT INTO cidade VALUES (1100296,11,'SANTA LUZIA D´OESTE');
INSERT INTO cidade VALUES (3157906,31,'SANTA MARGARIDA');
INSERT INTO cidade VALUES (4316972,43,'SANTA MARGARIDA DO SUL');
INSERT INTO cidade VALUES (2409332,24,'SANTA MARIA');
INSERT INTO cidade VALUES (4316907,43,'SANTA MARIA');
INSERT INTO cidade VALUES (2612604,26,'SANTA MARIA DA BOA VISTA');
INSERT INTO cidade VALUES (3547007,35,'SANTA MARIA DA SERRA');
INSERT INTO cidade VALUES (2928109,29,'SANTA MARIA DA VITORIA');
INSERT INTO cidade VALUES (1506583,15,'SANTA MARIA DAS BARREIRAS');
INSERT INTO cidade VALUES (3158003,31,'SANTA MARIA DE ITABIRA');
INSERT INTO cidade VALUES (3204559,32,'SANTA MARIA DE JETIBA');
INSERT INTO cidade VALUES (2612703,26,'SANTA MARIA DO CAMBUCA');
INSERT INTO cidade VALUES (4316956,43,'SANTA MARIA DO HERVAL');
INSERT INTO cidade VALUES (4123857,41,'SANTA MARIA DO OESTE');
INSERT INTO cidade VALUES (1506609,15,'SANTA MARIA DO PARA');
INSERT INTO cidade VALUES (3158102,31,'SANTA MARIA DO SALTO');
INSERT INTO cidade VALUES (3158201,31,'SANTA MARIA DO SUACUI');
INSERT INTO cidade VALUES (1718881,17,'SANTA MARIA DO TOCANTINS');
INSERT INTO cidade VALUES (3304607,33,'SANTA MARIA MADALENA');
INSERT INTO cidade VALUES (4123907,41,'SANTA MARIANA');
INSERT INTO cidade VALUES (3547106,35,'SANTA MERCEDES');
INSERT INTO cidade VALUES (4123956,41,'SANTA MONICA');
INSERT INTO cidade VALUES (2312205,23,'SANTA QUITERIA');
INSERT INTO cidade VALUES (2110104,21,'SANTA QUITERIA DO MARANHAO');
INSERT INTO cidade VALUES (2513703,25,'SANTA RITA');
INSERT INTO cidade VALUES (2110203,21,'SANTA RITA');
INSERT INTO cidade VALUES (3159209,31,'SANTA RITA DE CALDAS');
INSERT INTO cidade VALUES (2928406,29,'SANTA RITA DE CASSIA');
INSERT INTO cidade VALUES (3159407,31,'SANTA RITA DE IBITIPOCA');
INSERT INTO cidade VALUES (3159308,31,'SANTA RITA DE JACUTINGA');
INSERT INTO cidade VALUES (3159357,31,'SANTA RITA DE MINAS');
INSERT INTO cidade VALUES (5219407,52,'SANTA RITA DO ARAGUAIA');
INSERT INTO cidade VALUES (3159506,31,'SANTA RITA DO ITUETO');
INSERT INTO cidade VALUES (5219456,52,'SANTA RITA DO NOVO DESTINO');
INSERT INTO cidade VALUES (5007554,50,'SANTA RITA DO PARDO');
INSERT INTO cidade VALUES (3547502,35,'SANTA RITA DO PASSA QUATRO');
INSERT INTO cidade VALUES (3159605,31,'SANTA RITA DO SAPUCAI');
INSERT INTO cidade VALUES (1718899,17,'SANTA RITA DO TOCANTINS');
INSERT INTO cidade VALUES (5107768,51,'SANTA RITA DO TRIVELATO');
INSERT INTO cidade VALUES (3547403,35,'SANTA RITA D´OESTE');
INSERT INTO cidade VALUES (4317202,43,'SANTA ROSA');
INSERT INTO cidade VALUES (3159704,31,'SANTA ROSA DA SERRA');
INSERT INTO cidade VALUES (5219506,52,'SANTA ROSA DE GOIAS');
INSERT INTO cidade VALUES (4215604,42,'SANTA ROSA DE LIMA');
INSERT INTO cidade VALUES (2806503,28,'SANTA ROSA DE LIMA');
INSERT INTO cidade VALUES (3547601,35,'SANTA ROSA DE VITERBO');
INSERT INTO cidade VALUES (2209377,22,'SANTA ROSA DO PIAUI');
INSERT INTO cidade VALUES (1200435,12,'SANTA ROSA DO PURUS');
INSERT INTO cidade VALUES (4215653,42,'SANTA ROSA DO SUL');
INSERT INTO cidade VALUES (1718907,17,'SANTA ROSA DO TOCANTINS');
INSERT INTO cidade VALUES (3547650,35,'SANTA SALETE');
INSERT INTO cidade VALUES (3204609,32,'SANTA TERESA');
INSERT INTO cidade VALUES (2928505,29,'SANTA TERESINHA');
INSERT INTO cidade VALUES (2513802,25,'SANTA TERESINHA');
INSERT INTO cidade VALUES (4317251,43,'SANTA TEREZA');
INSERT INTO cidade VALUES (5219605,52,'SANTA TEREZA DE GOIAS');
INSERT INTO cidade VALUES (4124020,41,'SANTA TEREZA DO OESTE');
INSERT INTO cidade VALUES (1719004,17,'SANTA TEREZA DO TOCANTINS');
INSERT INTO cidade VALUES (4215679,42,'SANTA TEREZINHA');
INSERT INTO cidade VALUES (5107776,51,'SANTA TEREZINHA');
INSERT INTO cidade VALUES (2612802,26,'SANTA TEREZINHA');
INSERT INTO cidade VALUES (5219704,52,'SANTA TEREZINHA DE GOIAS');
INSERT INTO cidade VALUES (4124053,41,'SANTA TEREZINHA DE ITAIPU');
INSERT INTO cidade VALUES (4215687,42,'SANTA TEREZINHA DO PROGRESSO');
INSERT INTO cidade VALUES (1720002,17,'SANTA TEREZINHA DO TOCANTINS');
INSERT INTO cidade VALUES (3159803,31,'SANTA VITORIA');
INSERT INTO cidade VALUES (4317301,43,'SANTA VITORIA DO PALMAR');
INSERT INTO cidade VALUES (2928000,29,'SANTALUZ');
INSERT INTO cidade VALUES (1600600,16,'SANTANA');
INSERT INTO cidade VALUES (2928208,29,'SANTANA');
INSERT INTO cidade VALUES (4317004,43,'SANTANA DA BOA VISTA');
INSERT INTO cidade VALUES (3547205,35,'SANTANA DA PONTE PENSA');
INSERT INTO cidade VALUES (3158300,31,'SANTANA DA VARGEM');
INSERT INTO cidade VALUES (3158409,31,'SANTANA DE CATAGUASES');
INSERT INTO cidade VALUES (2513505,25,'SANTANA DE MANGUEIRA');
INSERT INTO cidade VALUES (3547304,35,'SANTANA DE PARNAIBA');
INSERT INTO cidade VALUES (3158508,31,'SANTANA DE PIRAPAMA');
INSERT INTO cidade VALUES (2312007,23,'SANTANA DO ACARAU');
INSERT INTO cidade VALUES (1506708,15,'SANTANA DO ARAGUAIA');
INSERT INTO cidade VALUES (2312106,23,'SANTANA DO CARIRI');
INSERT INTO cidade VALUES (3158607,31,'SANTANA DO DESERTO');
INSERT INTO cidade VALUES (3158706,31,'SANTANA DO GARAMBEU');
INSERT INTO cidade VALUES (2513604,25,'SANTANA DO GARROTES');
INSERT INTO cidade VALUES (2708006,27,'SANTANA DO IPANEMA');
INSERT INTO cidade VALUES (4124004,41,'SANTANA DO ITARARE');
INSERT INTO cidade VALUES (3158805,31,'SANTANA DO JACARE');
INSERT INTO cidade VALUES (4317103,43,'SANTANA DO LIVRAMENTO');
INSERT INTO cidade VALUES (3158904,31,'SANTANA DO MANHUACU');
INSERT INTO cidade VALUES (2110237,21,'SANTANA DO MARANHAO');
INSERT INTO cidade VALUES (2411403,24,'SANTANA DO MATOS');
INSERT INTO cidade VALUES (3159100,31,'SANTANA DO MONTES');
INSERT INTO cidade VALUES (2708105,27,'SANTANA DO MUNDAU');
INSERT INTO cidade VALUES (3158953,31,'SANTANA DO PARAISO');
INSERT INTO cidade VALUES (2209351,22,'SANTANA DO PIAUI');
INSERT INTO cidade VALUES (3159001,31,'SANTANA DO RIACHO');
INSERT INTO cidade VALUES (2806404,28,'SANTANA DO SAO FRANCISCO');
INSERT INTO cidade VALUES (2411429,24,'SANTANA DO SERIDO');
INSERT INTO cidade VALUES (2928307,29,'SANTANOPOLIS');
INSERT INTO cidade VALUES (2513653,25,'SANTAREM');
INSERT INTO cidade VALUES (1506807,15,'SANTAREM');
INSERT INTO cidade VALUES (1506906,15,'SANTAREM NOVO');
INSERT INTO cidade VALUES (4317400,43,'SANTIAGO');
INSERT INTO cidade VALUES (4215695,42,'SANTIAGO DO SUL');
INSERT INTO cidade VALUES (5107263,51,'SANTO AFONSO');
INSERT INTO cidade VALUES (2928604,29,'SANTO AMARO');
INSERT INTO cidade VALUES (4215703,42,'SANTO AMARO DA IMPERATRIZ');
INSERT INTO cidade VALUES (2806602,28,'SANTO AMARO DAS BROTAS');
INSERT INTO cidade VALUES (2110278,21,'SANTO AMARO DO MARANHAO');
INSERT INTO cidade VALUES (3547700,35,'SANTO ANASTACIO');
INSERT INTO cidade VALUES (2513851,25,'SANTO ANDRE');
INSERT INTO cidade VALUES (3547809,35,'SANTO ANDRE');
INSERT INTO cidade VALUES (4317509,43,'SANTO ANGELO');
INSERT INTO cidade VALUES (2411502,24,'SANTO ANTONIO');
INSERT INTO cidade VALUES (3547908,35,'SANTO ANTONIO DA ALEGRIA');
INSERT INTO cidade VALUES (5219712,52,'SANTO ANTONIO DA BARRA');
INSERT INTO cidade VALUES (4317608,43,'SANTO ANTONIO DA PATRULHA');
INSERT INTO cidade VALUES (4124103,41,'SANTO ANTONIO DA PLATINA');
INSERT INTO cidade VALUES (4317707,43,'SANTO ANTONIO DAS MISSOES');
INSERT INTO cidade VALUES (5219738,52,'SANTO ANTONIO DE GOIAS');
INSERT INTO cidade VALUES (2928703,29,'SANTO ANTONIO DE JESUS');
INSERT INTO cidade VALUES (2209401,22,'SANTO ANTONIO DE LISBOA');
INSERT INTO cidade VALUES (3304706,33,'SANTO ANTONIO DE PADUA');
INSERT INTO cidade VALUES (3548005,35,'SANTO ANTONIO DE POSSE');
INSERT INTO cidade VALUES (3159902,31,'SANTO ANTONIO DO AMPARO');
INSERT INTO cidade VALUES (3548054,35,'SANTO ANTONIO DO ARACANGUA');
INSERT INTO cidade VALUES (3160009,31,'SANTO ANTONIO DO AVENTUREIRO');
INSERT INTO cidade VALUES (4124202,41,'SANTO ANTONIO DO CAIUA');
INSERT INTO cidade VALUES (5219753,52,'SANTO ANTONIO DO DESCOBERTO');
INSERT INTO cidade VALUES (3160108,31,'SANTO ANTONIO DO GRAMA');
INSERT INTO cidade VALUES (1303700,13,'SANTO ANTONIO DO ICA');
INSERT INTO cidade VALUES (3160207,31,'SANTO ANTONIO DO ITAMBE');
INSERT INTO cidade VALUES (3160306,31,'SANTO ANTONIO DO JACINTO');
INSERT INTO cidade VALUES (3548104,35,'SANTO ANTONIO DO JARDIM');
INSERT INTO cidade VALUES (5107792,51,'SANTO ANTONIO DO LESTE');
INSERT INTO cidade VALUES (5107800,51,'SANTO ANTONIO DO LEVERGER');
INSERT INTO cidade VALUES (2110302,21,'SANTO ANTONIO DO LOPES');
INSERT INTO cidade VALUES (2209450,22,'SANTO ANTONIO DO MILAGRES');
INSERT INTO cidade VALUES (3160405,31,'SANTO ANTONIO DO MONTE');
INSERT INTO cidade VALUES (4317558,43,'SANTO ANTONIO DO PALMA');
INSERT INTO cidade VALUES (4124301,41,'SANTO ANTONIO DO PARAISO');
INSERT INTO cidade VALUES (3548203,35,'SANTO ANTONIO DO PINHAL');
INSERT INTO cidade VALUES (4317756,43,'SANTO ANTONIO DO PLANALTO');
INSERT INTO cidade VALUES (3160454,31,'SANTO ANTONIO DO RETIRO');
INSERT INTO cidade VALUES (3160504,31,'SANTO ANTONIO DO RIO ABAIXO');
INSERT INTO cidade VALUES (4124400,41,'SANTO ANTONIO DO SUDOESTE');
INSERT INTO cidade VALUES (1507003,15,'SANTO ANTONIO DO TAUA');
INSERT INTO cidade VALUES (4317806,43,'SANTO AUGUSTO');
INSERT INTO cidade VALUES (4317905,43,'SANTO CRISTO');
INSERT INTO cidade VALUES (2928802,29,'SANTO ESTEVAO');
INSERT INTO cidade VALUES (3548302,35,'SANTO EXPEDITO');
INSERT INTO cidade VALUES (4317954,43,'SANTO EXPEDITO DO SUL');
INSERT INTO cidade VALUES (3160603,31,'SANTO HIPOLITO');
INSERT INTO cidade VALUES (4124509,41,'SANTO INACIO');
INSERT INTO cidade VALUES (2209500,22,'SANTO INACIO DO PIAUI');
INSERT INTO cidade VALUES (3548401,35,'SANTOPOLIS DO AGUAPEI');
INSERT INTO cidade VALUES (3548500,35,'SANTOS');
INSERT INTO cidade VALUES (3160702,31,'SANTOS DUMONT');
INSERT INTO cidade VALUES (2312304,23,'SAO BENEDITO');
INSERT INTO cidade VALUES (2110401,21,'SAO BENEDITO DO RIO PRETO');
INSERT INTO cidade VALUES (2612901,26,'SAO BENEDITO DO SUL');
INSERT INTO cidade VALUES (2513901,25,'SAO BENTO');
INSERT INTO cidade VALUES (2110500,21,'SAO BENTO');
INSERT INTO cidade VALUES (3160801,31,'SAO BENTO ABADE');
INSERT INTO cidade VALUES (2513927,25,'SAO BENTO DE POMBAL');
INSERT INTO cidade VALUES (2411601,24,'SAO BENTO DO NORTE');
INSERT INTO cidade VALUES (3548609,35,'SAO BENTO DO SAPUCAI');
INSERT INTO cidade VALUES (4215802,42,'SAO BENTO DO SUL');
INSERT INTO cidade VALUES (1720101,17,'SAO BENTO DO TOCANTINS');
INSERT INTO cidade VALUES (2411700,24,'SAO BENTO DO TRAIRI');
INSERT INTO cidade VALUES (2613008,26,'SAO BENTO DO UNA');
INSERT INTO cidade VALUES (4215752,42,'SAO BERNARDINO');
INSERT INTO cidade VALUES (2110609,21,'SAO BERNARDO');
INSERT INTO cidade VALUES (3548708,35,'SAO BERNARDO DO CAMPO');
INSERT INTO cidade VALUES (4215901,42,'SAO BONIFACIO');
INSERT INTO cidade VALUES (4318002,43,'SAO BORJA');
INSERT INTO cidade VALUES (2708204,27,'SAO BRAS');
INSERT INTO cidade VALUES (3160900,31,'SAO BRAS DO SUACUI');
INSERT INTO cidade VALUES (2209559,22,'SAO BRAZ DO PIAUI');
INSERT INTO cidade VALUES (1507102,15,'SAO CAETANO DE ODIVELAS');
INSERT INTO cidade VALUES (3548807,35,'SAO CAETANO DO SUL');
INSERT INTO cidade VALUES (2613107,26,'SAO CAITANO');
INSERT INTO cidade VALUES (3548906,35,'SAO CARLOS');
INSERT INTO cidade VALUES (4216008,42,'SAO CARLOS');
INSERT INTO cidade VALUES (4124608,41,'SAO CARLOS DO IVAI');
INSERT INTO cidade VALUES (2806701,28,'SAO CRISTOVAO');
INSERT INTO cidade VALUES (4216057,42,'SAO CRISTOVAO DO SUL');
INSERT INTO cidade VALUES (2928901,29,'SAO DESIDERIO');
INSERT INTO cidade VALUES (5219803,52,'SAO DOMINGOS');
INSERT INTO cidade VALUES (4216107,42,'SAO DOMINGOS');
INSERT INTO cidade VALUES (2928950,29,'SAO DOMINGOS');
INSERT INTO cidade VALUES (2806800,28,'SAO DOMINGOS');
INSERT INTO cidade VALUES (3160959,31,'SAO DOMINGOS DAS DORES');
INSERT INTO cidade VALUES (2513968,25,'SAO DOMINGOS DE POMBAL');
INSERT INTO cidade VALUES (1507151,15,'SAO DOMINGOS DO ARAGUAIA');
INSERT INTO cidade VALUES (2110658,21,'SAO DOMINGOS DO AZEITAO');
INSERT INTO cidade VALUES (1507201,15,'SAO DOMINGOS DO CAPIM');
INSERT INTO cidade VALUES (2513943,25,'SAO DOMINGOS DO CARIRI');
INSERT INTO cidade VALUES (2110708,21,'SAO DOMINGOS DO MARANHAO');
INSERT INTO cidade VALUES (3204658,32,'SAO DOMINGOS DO NORTE');
INSERT INTO cidade VALUES (3161007,31,'SAO DOMINGOS DO PRATA');
INSERT INTO cidade VALUES (4318051,43,'SAO DOMINGOS DO SUL');
INSERT INTO cidade VALUES (2929107,29,'SAO FELIPE');
INSERT INTO cidade VALUES (1101484,11,'SAO FELIPE D OESTE');
INSERT INTO cidade VALUES (2929008,29,'SAO FELIX');
INSERT INTO cidade VALUES (2110807,21,'SAO FELIX DE BALSAS');
INSERT INTO cidade VALUES (3161056,31,'SAO FELIX DE MINAS');
INSERT INTO cidade VALUES (5107859,51,'SAO FELIX DO ARAGUAIA');
INSERT INTO cidade VALUES (2929057,29,'SAO FELIX DO CORIBE');
INSERT INTO cidade VALUES (2209609,22,'SAO FELIX DO PIAUI');
INSERT INTO cidade VALUES (1720150,17,'SAO FELIX DO TOCANTINS');
INSERT INTO cidade VALUES (1507300,15,'SAO FELIX DO XINGU');
INSERT INTO cidade VALUES (2411809,24,'SAO FERNANDO');
INSERT INTO cidade VALUES (3304805,33,'SAO FIDELIS');
INSERT INTO cidade VALUES (3549003,35,'SAO FRANCISCO');
INSERT INTO cidade VALUES (2513984,25,'SAO FRANCISCO');
INSERT INTO cidade VALUES (2806909,28,'SAO FRANCISCO');
INSERT INTO cidade VALUES (3161106,31,'SAO FRANCISCO');
INSERT INTO cidade VALUES (4318101,43,'SAO FRANCISCO DE ASSIS');
INSERT INTO cidade VALUES (2209658,22,'SAO FRANCISCO DE ASSIS DO PIAUI');
INSERT INTO cidade VALUES (5219902,52,'SAO FRANCISCO DE GOIAS');
INSERT INTO cidade VALUES (3304755,33,'SAO FRANCISCO DE ITABAPOANA');
INSERT INTO cidade VALUES (3161205,31,'SAO FRANCISCO DE PAULA');
INSERT INTO cidade VALUES (4318200,43,'SAO FRANCISCO DE PAULA');
INSERT INTO cidade VALUES (3161304,31,'SAO FRANCISCO DE SALES');
INSERT INTO cidade VALUES (2110856,21,'SAO FRANCISCO DO BREJAO');
INSERT INTO cidade VALUES (2929206,29,'SAO FRANCISCO DO CONDE');
INSERT INTO cidade VALUES (3161403,31,'SAO FRANCISCO DO GLORIA');
INSERT INTO cidade VALUES (1101492,11,'SAO FRANCISCO DO GUAPORE');
INSERT INTO cidade VALUES (2110906,21,'SAO FRANCISCO DO MARANHAO');
INSERT INTO cidade VALUES (2411908,24,'SAO FRANCISCO DO OESTE');
INSERT INTO cidade VALUES (1507409,15,'SAO FRANCISCO DO PARA');
INSERT INTO cidade VALUES (2209708,22,'SAO FRANCISCO DO PIAUI');
INSERT INTO cidade VALUES (4216206,42,'SAO FRANCISCO DO SUL');
INSERT INTO cidade VALUES (2929255,29,'SAO GABRIEL');
INSERT INTO cidade VALUES (4318309,43,'SAO GABRIEL');
INSERT INTO cidade VALUES (1303809,13,'SAO GABRIEL DA CACHOEIRA');
INSERT INTO cidade VALUES (3204708,32,'SAO GABRIEL DA PALHA');
INSERT INTO cidade VALUES (5007695,50,'SAO GABRIEL DO OESTE');
INSERT INTO cidade VALUES (3161502,31,'SAO GERALDO');
INSERT INTO cidade VALUES (3161601,31,'SAO GERALDO DA PIEDADE');
INSERT INTO cidade VALUES (1507458,15,'SAO GERALDO DO ARAGUAIA');
INSERT INTO cidade VALUES (3161650,31,'SAO GERALDO DO BAIXIO');
INSERT INTO cidade VALUES (3304904,33,'SAO GONCALO');
INSERT INTO cidade VALUES (3161700,31,'SAO GONCALO DO ABAETE');
INSERT INTO cidade VALUES (2412005,24,'SAO GONCALO DO AMARANTE');
INSERT INTO cidade VALUES (2312403,23,'SAO GONCALO DO AMARANTE');
INSERT INTO cidade VALUES (2929305,29,'SAO GONCALO DO CAMPOS');
INSERT INTO cidade VALUES (2209757,22,'SAO GONCALO DO GURGUEIA');
INSERT INTO cidade VALUES (3161809,31,'SAO GONCALO DO PARA');
INSERT INTO cidade VALUES (2209807,22,'SAO GONCALO DO PIAUI');
INSERT INTO cidade VALUES (3161908,31,'SAO GONCALO DO RIO ABAIXO');
INSERT INTO cidade VALUES (3125507,31,'SAO GONCALO DO RIO PRETO');
INSERT INTO cidade VALUES (3162005,31,'SAO GONCALO DO SAPUCAI');
INSERT INTO cidade VALUES (3162104,31,'SAO GOTARDO');
INSERT INTO cidade VALUES (4318408,43,'SAO JERONIMO');
INSERT INTO cidade VALUES (4124707,41,'SAO JERONIMO DA SERRA');
INSERT INTO cidade VALUES (2613206,26,'SAO JOAO');
INSERT INTO cidade VALUES (4124806,41,'SAO JOAO');
INSERT INTO cidade VALUES (2111003,21,'SAO JOAO BATISTA');
INSERT INTO cidade VALUES (4216305,42,'SAO JOAO BATISTA');
INSERT INTO cidade VALUES (3162203,31,'SAO JOAO BATISTA DO GLORIA');
INSERT INTO cidade VALUES (1400506,14,'SAO JOAO DA BALIZA');
INSERT INTO cidade VALUES (3305000,33,'SAO JOAO DA BARRA');
INSERT INTO cidade VALUES (3549102,35,'SAO JOAO DA BOA VISTA');
INSERT INTO cidade VALUES (2209856,22,'SAO JOAO DA CANABRAVA');
INSERT INTO cidade VALUES (2209872,22,'SAO JOAO DA FRONTEIRA');
INSERT INTO cidade VALUES (3162252,31,'SAO JOAO DA LAGOA');
INSERT INTO cidade VALUES (3162302,31,'SAO JOAO DA MATA');
INSERT INTO cidade VALUES (5220058,52,'SAO JOAO DA PARAUNA');
INSERT INTO cidade VALUES (1507466,15,'SAO JOAO DA PONTA');
INSERT INTO cidade VALUES (3162401,31,'SAO JOAO DA PONTE');
INSERT INTO cidade VALUES (2209906,22,'SAO JOAO DA SERRA');
INSERT INTO cidade VALUES (4318424,43,'SAO JOAO DA URTIGA');
INSERT INTO cidade VALUES (2209955,22,'SAO JOAO DA VARJOTA');
INSERT INTO cidade VALUES (5220009,52,'SAO JOAO D´ALIANCA');
INSERT INTO cidade VALUES (3549201,35,'SAO JOAO DAS DUAS PONTES');
INSERT INTO cidade VALUES (3162450,31,'SAO JOAO DAS MISSOES');
INSERT INTO cidade VALUES (3549250,35,'SAO JOAO DE IRACEMA');
INSERT INTO cidade VALUES (3305109,33,'SAO JOAO DE MERITI');
INSERT INTO cidade VALUES (1507474,15,'SAO JOAO DE PIRABAS');
INSERT INTO cidade VALUES (3162500,31,'SAO JOAO DEL REI');
INSERT INTO cidade VALUES (1507508,15,'SAO JOAO DO ARAGUAIA');
INSERT INTO cidade VALUES (2209971,22,'SAO JOAO DO ARRAIAL');
INSERT INTO cidade VALUES (4124905,41,'SAO JOAO DO CAIUA');
INSERT INTO cidade VALUES (2514008,25,'SAO JOAO DO CARIRI');
INSERT INTO cidade VALUES (2111029,21,'SAO JOAO DO CARU');
INSERT INTO cidade VALUES (4216354,42,'SAO JOAO DO ITAPERIU');
INSERT INTO cidade VALUES (4125001,41,'SAO JOAO DO IVAI');
INSERT INTO cidade VALUES (2312502,23,'SAO JOAO DO JAGUARIBE');
INSERT INTO cidade VALUES (3162559,31,'SAO JOAO DO MANHUACU');
INSERT INTO cidade VALUES (3162575,31,'SAO JOAO DO MANTENINHA');
INSERT INTO cidade VALUES (4216255,42,'SAO JOAO DO OESTE');
INSERT INTO cidade VALUES (3162609,31,'SAO JOAO DO ORIENTE');
INSERT INTO cidade VALUES (3162658,31,'SAO JOAO DO PACUI');
INSERT INTO cidade VALUES (2111052,21,'SAO JOAO DO PARAISO');
INSERT INTO cidade VALUES (3162708,31,'SAO JOAO DO PARAISO');
INSERT INTO cidade VALUES (2111102,21,'SAO JOAO DO PATOS');
INSERT INTO cidade VALUES (3549300,35,'SAO JOAO DO PAU D´ALHO');
INSERT INTO cidade VALUES (2210003,22,'SAO JOAO DO PIAUI');
INSERT INTO cidade VALUES (4318432,43,'SAO JOAO DO POLESINE');
INSERT INTO cidade VALUES (2500700,25,'SAO JOAO DO RIO DO PEIXE');
INSERT INTO cidade VALUES (2412104,24,'SAO JOAO DO SABUGI');
INSERT INTO cidade VALUES (2111078,21,'SAO JOAO DO SOTER');
INSERT INTO cidade VALUES (4216404,42,'SAO JOAO DO SUL');
INSERT INTO cidade VALUES (2514107,25,'SAO JOAO DO TIGRE');
INSERT INTO cidade VALUES (4125100,41,'SAO JOAO DO TRIUNFO');
INSERT INTO cidade VALUES (3162807,31,'SAO JOAO EVANGELISTA');
INSERT INTO cidade VALUES (3162906,31,'SAO JOAO NEPOMUCENO');
INSERT INTO cidade VALUES (4216503,42,'SAO JOAQUIM');
INSERT INTO cidade VALUES (3549409,35,'SAO JOAQUIM DA BARRA');
INSERT INTO cidade VALUES (3162922,31,'SAO JOAQUIM DE BICAS');
INSERT INTO cidade VALUES (2613305,26,'SAO JOAQUIM DO MONTE');
INSERT INTO cidade VALUES (4318440,43,'SAO JORGE');
INSERT INTO cidade VALUES (4125308,41,'SAO JORGE DO IVAI');
INSERT INTO cidade VALUES (4125357,41,'SAO JORGE DO PATROCINIO');
INSERT INTO cidade VALUES (4125209,41,'SAO JORGE D´OESTE');
INSERT INTO cidade VALUES (4216602,42,'SAO JOSE');
INSERT INTO cidade VALUES (3162948,31,'SAO JOSE DA BARRA');
INSERT INTO cidade VALUES (3549508,35,'SAO JOSE DA BELA VISTA');
INSERT INTO cidade VALUES (4125407,41,'SAO JOSE DA BOA VISTA');
INSERT INTO cidade VALUES (2613404,26,'SAO JOSE DA COROA GRANDE');
INSERT INTO cidade VALUES (2514206,25,'SAO JOSE DA LAGOA TAPADA');
INSERT INTO cidade VALUES (2708303,27,'SAO JOSE DA LAJE');
INSERT INTO cidade VALUES (3162955,31,'SAO JOSE DA LAPA');
INSERT INTO cidade VALUES (3163003,31,'SAO JOSE DA SAFIRA');
INSERT INTO cidade VALUES (2708402,27,'SAO JOSE DA TAPERA');
INSERT INTO cidade VALUES (3163102,31,'SAO JOSE DA VARGINHA');
INSERT INTO cidade VALUES (2929354,29,'SAO JOSE DA VITORIA');
INSERT INTO cidade VALUES (4318457,43,'SAO JOSE DAS MISSOES');
INSERT INTO cidade VALUES (4125456,41,'SAO JOSE DAS PALMEIRAS');
INSERT INTO cidade VALUES (2514305,25,'SAO JOSE DE CAIANA');
INSERT INTO cidade VALUES (2514404,25,'SAO JOSE DE ESPINHARAS');
INSERT INTO cidade VALUES (2412203,24,'SAO JOSE DE MIPIBU');
INSERT INTO cidade VALUES (2514503,25,'SAO JOSE DE PIRANHAS');
INSERT INTO cidade VALUES (2514552,25,'SAO JOSE DE PRINCESA');
INSERT INTO cidade VALUES (2111201,21,'SAO JOSE DE RIBAMAR');
INSERT INTO cidade VALUES (3305133,33,'SAO JOSE DE UBA');
INSERT INTO cidade VALUES (3163201,31,'SAO JOSE DO ALEGRE');
INSERT INTO cidade VALUES (4318622,43,'SAO JOSE DO AUSENTES');
INSERT INTO cidade VALUES (3549607,35,'SAO JOSE DO BARREIRO');
INSERT INTO cidade VALUES (2111250,21,'SAO JOSE DO BASILIOS');
INSERT INTO cidade VALUES (2613503,26,'SAO JOSE DO BELMONTE');
INSERT INTO cidade VALUES (2514602,25,'SAO JOSE DO BONFIM');
INSERT INTO cidade VALUES (2514651,25,'SAO JOSE DO BREJO DO CRUZ');
INSERT INTO cidade VALUES (3204807,32,'SAO JOSE DO CALCADO');
INSERT INTO cidade VALUES (2412302,24,'SAO JOSE DO CAMPESTRE');
INSERT INTO cidade VALUES (3549904,35,'SAO JOSE DO CAMPOS');
INSERT INTO cidade VALUES (4216701,42,'SAO JOSE DO CEDRO');
INSERT INTO cidade VALUES (4216800,42,'SAO JOSE DO CERRITO');
INSERT INTO cidade VALUES (2514800,25,'SAO JOSE DO CORDEIROS');
INSERT INTO cidade VALUES (3163300,31,'SAO JOSE DO DIVINO');
INSERT INTO cidade VALUES (2210052,22,'SAO JOSE DO DIVINO');
INSERT INTO cidade VALUES (2613602,26,'SAO JOSE DO EGITO');
INSERT INTO cidade VALUES (3163409,31,'SAO JOSE DO GOIABAL');
INSERT INTO cidade VALUES (4318465,43,'SAO JOSE DO HERVAL');
INSERT INTO cidade VALUES (4318481,43,'SAO JOSE DO HORTENCIO');
INSERT INTO cidade VALUES (4318499,43,'SAO JOSE DO INHACORA');
INSERT INTO cidade VALUES (2929370,29,'SAO JOSE DO JACUIPE');
INSERT INTO cidade VALUES (3163508,31,'SAO JOSE DO JACURI');
INSERT INTO cidade VALUES (3163607,31,'SAO JOSE DO MANTIMENTO');
INSERT INTO cidade VALUES (4318507,43,'SAO JOSE DO NORTE');
INSERT INTO cidade VALUES (4318606,43,'SAO JOSE DO OURO');
INSERT INTO cidade VALUES (2210102,22,'SAO JOSE DO PEIXE');
INSERT INTO cidade VALUES (2210201,22,'SAO JOSE DO PIAUI');
INSERT INTO cidade VALUES (4125506,41,'SAO JOSE DO PINHAIS');
INSERT INTO cidade VALUES (5107297,51,'SAO JOSE DO POVO');
INSERT INTO cidade VALUES (5107107,51,'SAO JOSE DO QUATRO MARCOS');
INSERT INTO cidade VALUES (2514453,25,'SAO JOSE DO RAMOS');
INSERT INTO cidade VALUES (5107305,51,'SAO JOSE DO RIO CLARO');
INSERT INTO cidade VALUES (3549706,35,'SAO JOSE DO RIO PARDO');
INSERT INTO cidade VALUES (3549805,35,'SAO JOSE DO RIO PRETO');
INSERT INTO cidade VALUES (2514701,25,'SAO JOSE DO SABUGI');
INSERT INTO cidade VALUES (2412401,24,'SAO JOSE DO SERIDO');
INSERT INTO cidade VALUES (4318614,43,'SAO JOSE DO SUL');
INSERT INTO cidade VALUES (3305158,33,'SAO JOSE DO VALE DO RIO PRETO');
INSERT INTO cidade VALUES (5107354,51,'SAO JOSE DO XINGU');
INSERT INTO cidade VALUES (2210300,22,'SAO JULIAO');
INSERT INTO cidade VALUES (4318705,43,'SAO LEOPOLDO');
INSERT INTO cidade VALUES (3163706,31,'SAO LOURENCO');
INSERT INTO cidade VALUES (2613701,26,'SAO LOURENCO DA MATA');
INSERT INTO cidade VALUES (3549953,35,'SAO LOURENCO DA SERRA');
INSERT INTO cidade VALUES (4216909,42,'SAO LOURENCO DO OESTE');
INSERT INTO cidade VALUES (2210359,22,'SAO LOURENCO DO PIAUI');
INSERT INTO cidade VALUES (4318804,43,'SAO LOURENCO DO SUL');
INSERT INTO cidade VALUES (4217006,42,'SAO LUDGERO');
INSERT INTO cidade VALUES (2111300,21,'SAO LUIS');
INSERT INTO cidade VALUES (5220108,52,'SAO LUIS DE MONTES BELOS');
INSERT INTO cidade VALUES (2312601,23,'SAO LUIS DO CURU');
INSERT INTO cidade VALUES (3550001,35,'SAO LUIS DO PARAITINGA');
INSERT INTO cidade VALUES (2210375,22,'SAO LUIS DO PIAUI');
INSERT INTO cidade VALUES (2708501,27,'SAO LUIS DO QUITUNDE');
INSERT INTO cidade VALUES (2111409,21,'SAO LUIS GONZAGA DO MARANHAO');
INSERT INTO cidade VALUES (1400605,14,'SAO LUIZ');
INSERT INTO cidade VALUES (5220157,52,'SAO LUIZ DO NORTE');
INSERT INTO cidade VALUES (4318903,43,'SAO LUIZ GONZAGA');
INSERT INTO cidade VALUES (2514909,25,'SAO MAMEDE');
INSERT INTO cidade VALUES (4125555,41,'SAO MANOEL DO PARANA');
INSERT INTO cidade VALUES (3550100,35,'SAO MANUEL');
INSERT INTO cidade VALUES (4319000,43,'SAO MARCOS');
INSERT INTO cidade VALUES (4217105,42,'SAO MARTINHO');
INSERT INTO cidade VALUES (4319109,43,'SAO MARTINHO');
INSERT INTO cidade VALUES (4319125,43,'SAO MARTINHO DA SERRA');
INSERT INTO cidade VALUES (3204906,32,'SAO MATEUS');
INSERT INTO cidade VALUES (2111508,21,'SAO MATEUS DO MARANHAO');
INSERT INTO cidade VALUES (4125605,41,'SAO MATEUS DO SUL');
INSERT INTO cidade VALUES (2412500,24,'SAO MIGUEL');
INSERT INTO cidade VALUES (3550209,35,'SAO MIGUEL ARCANJO');
INSERT INTO cidade VALUES (2210383,22,'SAO MIGUEL DA BAIXA GRANDE');
INSERT INTO cidade VALUES (4217154,42,'SAO MIGUEL DA BOA VISTA');
INSERT INTO cidade VALUES (2929404,29,'SAO MIGUEL DAS MATAS');
INSERT INTO cidade VALUES (4319158,43,'SAO MIGUEL DAS MISSOES');
INSERT INTO cidade VALUES (2515005,25,'SAO MIGUEL DE TAIPU');
INSERT INTO cidade VALUES (2412559,24,'SAO MIGUEL DE TOUROS');
INSERT INTO cidade VALUES (2807006,28,'SAO MIGUEL DO ALEIXO');
INSERT INTO cidade VALUES (3163805,31,'SAO MIGUEL DO ANTA');
INSERT INTO cidade VALUES (5220207,52,'SAO MIGUEL DO ARAGUAIA');
INSERT INTO cidade VALUES (2708600,27,'SAO MIGUEL DO CAMPOS');
INSERT INTO cidade VALUES (2210391,22,'SAO MIGUEL DO FIDALGO');
INSERT INTO cidade VALUES (1507607,15,'SAO MIGUEL DO GUAMA');
INSERT INTO cidade VALUES (1100320,11,'SAO MIGUEL DO GUAPORE');
INSERT INTO cidade VALUES (4125704,41,'SAO MIGUEL DO IGUACU');
INSERT INTO cidade VALUES (2708709,27,'SAO MIGUEL DO MILAGRES');
INSERT INTO cidade VALUES (5220264,52,'SAO MIGUEL DO PASSA QUATRO');
INSERT INTO cidade VALUES (2210409,22,'SAO MIGUEL DO TAPUIO');
INSERT INTO cidade VALUES (1720200,17,'SAO MIGUEL DO TOCANTINS');
INSERT INTO cidade VALUES (4217204,42,'SAO MIGUEL D´OESTE');
INSERT INTO cidade VALUES (4319208,43,'SAO NICOLAU');
INSERT INTO cidade VALUES (5220280,52,'SAO PATRICIO');
INSERT INTO cidade VALUES (3550308,35,'SAO PAULO');
INSERT INTO cidade VALUES (4319307,43,'SAO PAULO DAS MISSOES');
INSERT INTO cidade VALUES (1303908,13,'SAO PAULO DE OLIVENCA');
INSERT INTO cidade VALUES (2412609,24,'SAO PAULO DO POTENGI');
INSERT INTO cidade VALUES (3550407,35,'SAO PEDRO');
INSERT INTO cidade VALUES (2412708,24,'SAO PEDRO');
INSERT INTO cidade VALUES (2111532,21,'SAO PEDRO DA AGUA BRANCA');
INSERT INTO cidade VALUES (3305208,33,'SAO PEDRO DA ALDEIA');
INSERT INTO cidade VALUES (5107404,51,'SAO PEDRO DA CIPA');
INSERT INTO cidade VALUES (4319356,43,'SAO PEDRO DA SERRA');
INSERT INTO cidade VALUES (3163904,31,'SAO PEDRO DA UNIAO');
INSERT INTO cidade VALUES (4319364,43,'SAO PEDRO DAS MISSOES');
INSERT INTO cidade VALUES (4217253,42,'SAO PEDRO DE ALCANTARA');
INSERT INTO cidade VALUES (4319372,43,'SAO PEDRO DO BUTIA');
INSERT INTO cidade VALUES (2111573,21,'SAO PEDRO DO CRENTES');
INSERT INTO cidade VALUES (3164001,31,'SAO PEDRO DO FERROS');
INSERT INTO cidade VALUES (4125753,41,'SAO PEDRO DO IGUACU');
INSERT INTO cidade VALUES (4125803,41,'SAO PEDRO DO IVAI');
INSERT INTO cidade VALUES (4125902,41,'SAO PEDRO DO PARANA');
INSERT INTO cidade VALUES (2210508,22,'SAO PEDRO DO PIAUI');
INSERT INTO cidade VALUES (3164100,31,'SAO PEDRO DO SUACUI');
INSERT INTO cidade VALUES (4319406,43,'SAO PEDRO DO SUL');
INSERT INTO cidade VALUES (3550506,35,'SAO PEDRO DO TURVO');
INSERT INTO cidade VALUES (2412807,24,'SAO RAFAEL');
INSERT INTO cidade VALUES (2111607,21,'SAO RAIMUNDO DAS MANGABEIRAS');
INSERT INTO cidade VALUES (2111631,21,'SAO RAIMUNDO DO DOCA BEZERRA');
INSERT INTO cidade VALUES (2210607,22,'SAO RAIMUNDO NONATO');
INSERT INTO cidade VALUES (2111672,21,'SAO ROBERTO');
INSERT INTO cidade VALUES (3164209,31,'SAO ROMAO');
INSERT INTO cidade VALUES (3550605,35,'SAO ROQUE');
INSERT INTO cidade VALUES (3164308,31,'SAO ROQUE DE MINAS');
INSERT INTO cidade VALUES (3204955,32,'SAO ROQUE DO CANAA');
INSERT INTO cidade VALUES (1720259,17,'SAO SALVADOR DO TOCANTINS');
INSERT INTO cidade VALUES (2708808,27,'SAO SEBASTIAO');
INSERT INTO cidade VALUES (3550704,35,'SAO SEBASTIAO');
INSERT INTO cidade VALUES (4126009,41,'SAO SEBASTIAO DA AMOREIRA');
INSERT INTO cidade VALUES (3164407,31,'SAO SEBASTIAO DA BELA VISTA');
INSERT INTO cidade VALUES (1507706,15,'SAO SEBASTIAO DA BOA VISTA');
INSERT INTO cidade VALUES (3550803,35,'SAO SEBASTIAO DA GRAMA');
INSERT INTO cidade VALUES (3164431,31,'SAO SEBASTIAO DA VARGEM ALEGRE');
INSERT INTO cidade VALUES (2515104,25,'SAO SEBASTIAO DE LAGOA DE ROCA');
INSERT INTO cidade VALUES (3305307,33,'SAO SEBASTIAO DO ALTO');
INSERT INTO cidade VALUES (3164472,31,'SAO SEBASTIAO DO ANTA');
INSERT INTO cidade VALUES (4319505,43,'SAO SEBASTIAO DO CAI');
INSERT INTO cidade VALUES (3164506,31,'SAO SEBASTIAO DO MARANHAO');
INSERT INTO cidade VALUES (3164605,31,'SAO SEBASTIAO DO OESTE');
INSERT INTO cidade VALUES (3164704,31,'SAO SEBASTIAO DO PARAISO');
INSERT INTO cidade VALUES (2929503,29,'SAO SEBASTIAO DO PASSE');
INSERT INTO cidade VALUES (3164803,31,'SAO SEBASTIAO DO RIO PRETO');
INSERT INTO cidade VALUES (3164902,31,'SAO SEBASTIAO DO RIO VERDE');
INSERT INTO cidade VALUES (1720309,17,'SAO SEBASTIAO DO TOCANTINS');
INSERT INTO cidade VALUES (1303957,13,'SAO SEBASTIAO DO UATUMA');
INSERT INTO cidade VALUES (2515203,25,'SAO SEBASTIAO DO UMBUZEIRO');
INSERT INTO cidade VALUES (4319604,43,'SAO SEPE');
INSERT INTO cidade VALUES (3550902,35,'SAO SIMAO');
INSERT INTO cidade VALUES (5220405,52,'SAO SIMAO');
INSERT INTO cidade VALUES (3165206,31,'SAO THOME DAS LETRAS');
INSERT INTO cidade VALUES (3165008,31,'SAO TIAGO');
INSERT INTO cidade VALUES (3165107,31,'SAO TOMAS DE AQUINO');
INSERT INTO cidade VALUES (4126108,41,'SAO TOME');
INSERT INTO cidade VALUES (2412906,24,'SAO TOME');
INSERT INTO cidade VALUES (4319703,43,'SAO VALENTIM');
INSERT INTO cidade VALUES (4319711,43,'SAO VALENTIM DO SUL');
INSERT INTO cidade VALUES (1720499,17,'SAO VALERIO DA NATIVIDADE');
INSERT INTO cidade VALUES (4319737,43,'SAO VALERIO DO SUL');
INSERT INTO cidade VALUES (4319752,43,'SAO VENDELINO');
INSERT INTO cidade VALUES (3551009,35,'SAO VICENTE');
INSERT INTO cidade VALUES (2413003,24,'SAO VICENTE');
INSERT INTO cidade VALUES (3165305,31,'SAO VICENTE DE MINAS');
INSERT INTO cidade VALUES (2515401,25,'SAO VICENTE DO SERIDO');
INSERT INTO cidade VALUES (4319802,43,'SAO VICENTE DO SUL');
INSERT INTO cidade VALUES (2613800,26,'SAO VICENTE FERRER');
INSERT INTO cidade VALUES (2111706,21,'SAO VICENTE FERRER');
INSERT INTO cidade VALUES (2515302,25,'SAPE');
INSERT INTO cidade VALUES (2929602,29,'SAPEACU');
INSERT INTO cidade VALUES (5107875,51,'SAPEZAL');
INSERT INTO cidade VALUES (4319901,43,'SAPIRANGA');
INSERT INTO cidade VALUES (4126207,41,'SAPOPEMA');
INSERT INTO cidade VALUES (3305406,33,'SAPUCAIA');
INSERT INTO cidade VALUES (1507755,15,'SAPUCAIA');
INSERT INTO cidade VALUES (4320008,43,'SAPUCAIA DO SUL');
INSERT INTO cidade VALUES (3165404,31,'SAPUCAI-MIRIM');
INSERT INTO cidade VALUES (3305505,33,'SAQUAREMA');
INSERT INTO cidade VALUES (4126256,41,'SARANDI');
INSERT INTO cidade VALUES (4320107,43,'SARANDI');
INSERT INTO cidade VALUES (3551108,35,'SARAPUI');
INSERT INTO cidade VALUES (3165503,31,'SARDOA');
INSERT INTO cidade VALUES (3551207,35,'SARUTAIA');
INSERT INTO cidade VALUES (3165537,31,'SARZEDO');
INSERT INTO cidade VALUES (2929701,29,'SATIRO DIAS');
INSERT INTO cidade VALUES (2708907,27,'SATUBA');
INSERT INTO cidade VALUES (2111722,21,'SATUBINHA');
INSERT INTO cidade VALUES (2929750,29,'SAUBARA');
INSERT INTO cidade VALUES (4126272,41,'SAUDADE DO IGUACU');
INSERT INTO cidade VALUES (4217303,42,'SAUDADES');
INSERT INTO cidade VALUES (2929800,29,'SAUDE');
INSERT INTO cidade VALUES (4217402,42,'SCHROEDER');
INSERT INTO cidade VALUES (2929909,29,'SEABRA');
INSERT INTO cidade VALUES (4217501,42,'SEARA');
INSERT INTO cidade VALUES (3551306,35,'SEBASTIANOPOLIS DO SUL');
INSERT INTO cidade VALUES (2210623,22,'SEBASTIAO BARROS');
INSERT INTO cidade VALUES (2930006,29,'SEBASTIAO LARANJEIRAS');
INSERT INTO cidade VALUES (2210631,22,'SEBASTIAO LEAL');
INSERT INTO cidade VALUES (4320206,43,'SEBERI');
INSERT INTO cidade VALUES (4320230,43,'SEDE NOVA');
INSERT INTO cidade VALUES (4320263,43,'SEGREDO');
INSERT INTO cidade VALUES (4320305,43,'SELBACH');
INSERT INTO cidade VALUES (5007802,50,'SELVIRIA');
INSERT INTO cidade VALUES (3165560,31,'SEM PEIXE');
INSERT INTO cidade VALUES (1200500,12,'SENA MADUREIRA');
INSERT INTO cidade VALUES (2111748,21,'SENADOR ALEXANDRE COSTA');
INSERT INTO cidade VALUES (3165578,31,'SENADOR AMARAL');
INSERT INTO cidade VALUES (5220454,52,'SENADOR CANEDO');
INSERT INTO cidade VALUES (3165602,31,'SENADOR CORTES');
INSERT INTO cidade VALUES (2413102,24,'SENADOR ELOI DE SOUZA');
INSERT INTO cidade VALUES (3165701,31,'SENADOR FIRMINO');
INSERT INTO cidade VALUES (2413201,24,'SENADOR GEORGINO AVELINO');
INSERT INTO cidade VALUES (1200450,12,'SENADOR GUIOMARD');
INSERT INTO cidade VALUES (3165800,31,'SENADOR JOSE BENTO');
INSERT INTO cidade VALUES (1507805,15,'SENADOR JOSE PORFIRIO');
INSERT INTO cidade VALUES (2111763,21,'SENADOR LA ROCQUE');
INSERT INTO cidade VALUES (3165909,31,'SENADOR MODESTINO GONCALVES');
INSERT INTO cidade VALUES (2312700,23,'SENADOR POMPEU');
INSERT INTO cidade VALUES (2708956,27,'SENADOR RUI PALMEIRA');
INSERT INTO cidade VALUES (2312809,23,'SENADOR SA');
INSERT INTO cidade VALUES (4320321,43,'SENADOR SALGADO FILHO');
INSERT INTO cidade VALUES (4126306,41,'SENGES');
INSERT INTO cidade VALUES (2930105,29,'SENHOR DO BONFIM');
INSERT INTO cidade VALUES (3166006,31,'SENHORA DE OLIVEIRA');
INSERT INTO cidade VALUES (3166105,31,'SENHORA DO PORTO');
INSERT INTO cidade VALUES (3166204,31,'SENHORA DO REMEDIOS');
INSERT INTO cidade VALUES (4320354,43,'SENTINELA DO SUL');
INSERT INTO cidade VALUES (2930204,29,'SENTO SE');
INSERT INTO cidade VALUES (4320404,43,'SERAFINA CORREA');
INSERT INTO cidade VALUES (3166303,31,'SERICITA');
INSERT INTO cidade VALUES (1101500,11,'SERINGUEIRAS');
INSERT INTO cidade VALUES (4320453,43,'SERIO');
INSERT INTO cidade VALUES (3166402,31,'SERITINGA');
INSERT INTO cidade VALUES (3305554,33,'SEROPEDICA');
INSERT INTO cidade VALUES (3205002,32,'SERRA');
INSERT INTO cidade VALUES (4217550,42,'SERRA ALTA');
INSERT INTO cidade VALUES (3551405,35,'SERRA AZUL');
INSERT INTO cidade VALUES (3166501,31,'SERRA AZUL DE MINAS');
INSERT INTO cidade VALUES (2515500,25,'SERRA BRANCA');
INSERT INTO cidade VALUES (2515609,25,'SERRA DA RAIZ');
INSERT INTO cidade VALUES (3166600,31,'SERRA DA SAUDADE');
INSERT INTO cidade VALUES (2413300,24,'SERRA DE SAO BENTO');
INSERT INTO cidade VALUES (3166709,31,'SERRA DO AIMORES');
INSERT INTO cidade VALUES (2413359,24,'SERRA DO MEL');
INSERT INTO cidade VALUES (1600055,16,'SERRA DO NAVIO');
INSERT INTO cidade VALUES (2930154,29,'SERRA DO RAMALHO');
INSERT INTO cidade VALUES (3166808,31,'SERRA DO SALITRE');
INSERT INTO cidade VALUES (2930303,29,'SERRA DOURADA');
INSERT INTO cidade VALUES (2515708,25,'SERRA GRANDE');
INSERT INTO cidade VALUES (3551603,35,'SERRA NEGRA');
INSERT INTO cidade VALUES (2413409,24,'SERRA NEGRA DO NORTE');
INSERT INTO cidade VALUES (5107883,51,'SERRA NOVA DOURADA');
INSERT INTO cidade VALUES (2930402,29,'SERRA PRETA');
INSERT INTO cidade VALUES (2515807,25,'SERRA REDONDA');
INSERT INTO cidade VALUES (2613909,26,'SERRA TALHADA');
INSERT INTO cidade VALUES (3551504,35,'SERRANA');
INSERT INTO cidade VALUES (3166907,31,'SERRANIA');
INSERT INTO cidade VALUES (2111789,21,'SERRANO DO MARANHAO');
INSERT INTO cidade VALUES (5220504,52,'SERRANOPOLIS');
INSERT INTO cidade VALUES (3166956,31,'SERRANOPOLIS DE MINAS');
INSERT INTO cidade VALUES (4126355,41,'SERRANOPOLIS DO IGUACU');
INSERT INTO cidade VALUES (3167004,31,'SERRANOS');
INSERT INTO cidade VALUES (2515906,25,'SERRARIA');
INSERT INTO cidade VALUES (2413508,24,'SERRINHA');
INSERT INTO cidade VALUES (2930501,29,'SERRINHA');
INSERT INTO cidade VALUES (2413557,24,'SERRINHA DO PINTOS');
INSERT INTO cidade VALUES (2614006,26,'SERRITA');
INSERT INTO cidade VALUES (3167103,31,'SERRO');
INSERT INTO cidade VALUES (2930600,29,'SERROLANDIA');
INSERT INTO cidade VALUES (4126405,41,'SERTANEJA');
INSERT INTO cidade VALUES (2614105,26,'SERTANIA');
INSERT INTO cidade VALUES (4126504,41,'SERTANOPOLIS');
INSERT INTO cidade VALUES (4320503,43,'SERTAO');
INSERT INTO cidade VALUES (4320552,43,'SERTAO SANTANA');
INSERT INTO cidade VALUES (3551702,35,'SERTAOZINHO');
INSERT INTO cidade VALUES (2515930,25,'SERTAOZINHO');
INSERT INTO cidade VALUES (3551801,35,'SETE BARRAS');
INSERT INTO cidade VALUES (4320578,43,'SETE DE SETEMBRO');
INSERT INTO cidade VALUES (3167202,31,'SETE LAGOAS');
INSERT INTO cidade VALUES (5007703,50,'SETE QUEDAS');
INSERT INTO cidade VALUES (3165552,31,'SETUBINHA');
INSERT INTO cidade VALUES (4320602,43,'SEVERIANO DE ALMEIDA');
INSERT INTO cidade VALUES (2413607,24,'SEVERIANO MELO');
INSERT INTO cidade VALUES (3551900,35,'SEVERINIA');
INSERT INTO cidade VALUES (4217600,42,'SIDEROPOLIS');
INSERT INTO cidade VALUES (5007901,50,'SIDROLANDIA');
INSERT INTO cidade VALUES (2210656,22,'SIGEFREDO PACHECO');
INSERT INTO cidade VALUES (3305604,33,'SILVA JARDIM');
INSERT INTO cidade VALUES (5220603,52,'SILVANIA');
INSERT INTO cidade VALUES (1720655,17,'SILVANOPOLIS');
INSERT INTO cidade VALUES (4320651,43,'SILVEIRA MARTINS');
INSERT INTO cidade VALUES (3167301,31,'SILVEIRANIA');
INSERT INTO cidade VALUES (3552007,35,'SILVEIRAS');
INSERT INTO cidade VALUES (1304005,13,'SILVES');
INSERT INTO cidade VALUES (3167400,31,'SILVIANOPOLIS');
INSERT INTO cidade VALUES (2807105,28,'SIMAO DIAS');
INSERT INTO cidade VALUES (3167509,31,'SIMAO PEREIRA');
INSERT INTO cidade VALUES (2210706,22,'SIMOES');
INSERT INTO cidade VALUES (2930709,29,'SIMOES FILHO');
INSERT INTO cidade VALUES (5220686,52,'SIMOLANDIA');
INSERT INTO cidade VALUES (3167608,31,'SIMONESIA');
INSERT INTO cidade VALUES (2210805,22,'SIMPLICIO MENDES');
INSERT INTO cidade VALUES (4320677,43,'SINIMBU');
INSERT INTO cidade VALUES (5107909,51,'SINOP');
INSERT INTO cidade VALUES (4126603,41,'SIQUEIRA CAMPOS');
INSERT INTO cidade VALUES (2614204,26,'SIRINHAEM');
INSERT INTO cidade VALUES (2807204,28,'SIRIRI');
INSERT INTO cidade VALUES (5220702,52,'SITIO D´ABADIA');
INSERT INTO cidade VALUES (2930758,29,'SITIO DO MATO');
INSERT INTO cidade VALUES (2930766,29,'SITIO DO QUINTO');
INSERT INTO cidade VALUES (2111805,21,'SITIO NOVO');
INSERT INTO cidade VALUES (2413706,24,'SITIO NOVO');
INSERT INTO cidade VALUES (1720804,17,'SITIO NOVO DO TOCANTINS');
INSERT INTO cidade VALUES (2930774,29,'SOBRADINHO');
INSERT INTO cidade VALUES (4320701,43,'SOBRADINHO');
INSERT INTO cidade VALUES (2515971,25,'SOBRADO');
INSERT INTO cidade VALUES (2312908,23,'SOBRAL');
INSERT INTO cidade VALUES (3167707,31,'SOBRALIA');
INSERT INTO cidade VALUES (3552106,35,'SOCORRO');
INSERT INTO cidade VALUES (2210904,22,'SOCORRO DO PIAUI');
INSERT INTO cidade VALUES (2516003,25,'SOLANEA');
INSERT INTO cidade VALUES (4320800,43,'SOLEDADE');
INSERT INTO cidade VALUES (2516102,25,'SOLEDADE');
INSERT INTO cidade VALUES (3167806,31,'SOLEDADE DE MINAS');
INSERT INTO cidade VALUES (2614402,26,'SOLIDAO');
INSERT INTO cidade VALUES (2313005,23,'SOLONOPOLE');
INSERT INTO cidade VALUES (4217709,42,'SOMBRIO');
INSERT INTO cidade VALUES (5007935,50,'SONORA');
INSERT INTO cidade VALUES (3205010,32,'SOORETAMA');
INSERT INTO cidade VALUES (3552205,35,'SOROCABA');
INSERT INTO cidade VALUES (5107925,51,'SORRISO');
INSERT INTO cidade VALUES (2516151,25,'SOSSEGO');
INSERT INTO cidade VALUES (1507904,15,'SOURE');
INSERT INTO cidade VALUES (2516201,25,'SOUSA');
INSERT INTO cidade VALUES (2930808,29,'SOUTO SOARES');
INSERT INTO cidade VALUES (1720853,17,'SUCUPIRA');
INSERT INTO cidade VALUES (2111904,21,'SUCUPIRA DO NORTE');
INSERT INTO cidade VALUES (2111953,21,'SUCUPIRA DO RIACHAO');
INSERT INTO cidade VALUES (3552304,35,'SUD MENNUCCI');
INSERT INTO cidade VALUES (4217758,42,'SUL BRASIL');
INSERT INTO cidade VALUES (4126652,41,'SULINA');
INSERT INTO cidade VALUES (3552403,35,'SUMARE');
INSERT INTO cidade VALUES (2516300,25,'SUME');
INSERT INTO cidade VALUES (3305703,33,'SUMIDOURO');
INSERT INTO cidade VALUES (2614501,26,'SURUBIM');
INSERT INTO cidade VALUES (2210938,22,'SUSSUAPARA');
INSERT INTO cidade VALUES (3552551,35,'SUZANAPOLIS');
INSERT INTO cidade VALUES (3552502,35,'SUZANO');
INSERT INTO cidade VALUES (4320859,43,'TABAI');
INSERT INTO cidade VALUES (5107941,51,'TABAPORA');
INSERT INTO cidade VALUES (3552601,35,'TABAPUA');
INSERT INTO cidade VALUES (3552700,35,'TABATINGA');
INSERT INTO cidade VALUES (1304062,13,'TABATINGA');
INSERT INTO cidade VALUES (2614600,26,'TABIRA');
INSERT INTO cidade VALUES (3552809,35,'TABOAO DA SERRA');
INSERT INTO cidade VALUES (2930907,29,'TABOCAS DO BREJO VELHO');
INSERT INTO cidade VALUES (2413805,24,'TABOLEIRO GRANDE');
INSERT INTO cidade VALUES (3167905,31,'TABULEIRO');
INSERT INTO cidade VALUES (2313104,23,'TABULEIRO DO NORTE');
INSERT INTO cidade VALUES (2614709,26,'TACAIMBO');
INSERT INTO cidade VALUES (2614808,26,'TACARATU');
INSERT INTO cidade VALUES (3552908,35,'TACIBA');
INSERT INTO cidade VALUES (5007950,50,'TACURU');
INSERT INTO cidade VALUES (3553005,35,'TAGUAI');
INSERT INTO cidade VALUES (1720903,17,'TAGUATINGA');
INSERT INTO cidade VALUES (3553104,35,'TAIACU');
INSERT INTO cidade VALUES (1507953,15,'TAILANDIA');
INSERT INTO cidade VALUES (4217808,42,'TAIO');
INSERT INTO cidade VALUES (3168002,31,'TAIOBEIRAS');
INSERT INTO cidade VALUES (1720937,17,'TAIPAS DO TOCANTINS');
INSERT INTO cidade VALUES (2413904,24,'TAIPU');
INSERT INTO cidade VALUES (3553203,35,'TAIUVA');
INSERT INTO cidade VALUES (1720978,17,'TALISMA');
INSERT INTO cidade VALUES (2614857,26,'TAMANDARE');
INSERT INTO cidade VALUES (4126678,41,'TAMARANA');
INSERT INTO cidade VALUES (3553302,35,'TAMBAU');
INSERT INTO cidade VALUES (4126702,41,'TAMBOARA');
INSERT INTO cidade VALUES (2313203,23,'TAMBORIL');
INSERT INTO cidade VALUES (2210953,22,'TAMBORIL DO PIAUI');
INSERT INTO cidade VALUES (3553401,35,'TANABI');
INSERT INTO cidade VALUES (2414001,24,'TANGARA');
INSERT INTO cidade VALUES (4217907,42,'TANGARA');
INSERT INTO cidade VALUES (5107958,51,'TANGARA DA SERRA');
INSERT INTO cidade VALUES (3305752,33,'TANGUA');
INSERT INTO cidade VALUES (2931004,29,'TANHACU');
INSERT INTO cidade VALUES (2709004,27,'TANQUE D´ARCA');
INSERT INTO cidade VALUES (2210979,22,'TANQUE DO PIAUI');
INSERT INTO cidade VALUES (2931053,29,'TANQUE NOVO');
INSERT INTO cidade VALUES (2931103,29,'TANQUINHO');
INSERT INTO cidade VALUES (3168051,31,'TAPARUBA');
INSERT INTO cidade VALUES (1304104,13,'TAPAUA');
INSERT INTO cidade VALUES (4320909,43,'TAPEJARA');
INSERT INTO cidade VALUES (4126801,41,'TAPEJARA');
INSERT INTO cidade VALUES (4321006,43,'TAPERA');
INSERT INTO cidade VALUES (2516508,25,'TAPEROA');
INSERT INTO cidade VALUES (2931202,29,'TAPEROA');
INSERT INTO cidade VALUES (4321105,43,'TAPES');
INSERT INTO cidade VALUES (4126900,41,'TAPIRA');
INSERT INTO cidade VALUES (3168101,31,'TAPIRA');
INSERT INTO cidade VALUES (3553500,35,'TAPIRAI');
INSERT INTO cidade VALUES (3168200,31,'TAPIRAI');
INSERT INTO cidade VALUES (2931301,29,'TAPIRAMUTA');
INSERT INTO cidade VALUES (3553609,35,'TAPIRATIBA');
INSERT INTO cidade VALUES (5108006,51,'TAPURAH');
INSERT INTO cidade VALUES (4321204,43,'TAQUARA');
INSERT INTO cidade VALUES (3168309,31,'TAQUARACU DE MINAS');
INSERT INTO cidade VALUES (3553658,35,'TAQUARAL');
INSERT INTO cidade VALUES (5221007,52,'TAQUARAL DE GOIAS');
INSERT INTO cidade VALUES (2709103,27,'TAQUARANA');
INSERT INTO cidade VALUES (4321303,43,'TAQUARI');
INSERT INTO cidade VALUES (3553708,35,'TAQUARITINGA');
INSERT INTO cidade VALUES (2615003,26,'TAQUARITINGA DO NORTE');
INSERT INTO cidade VALUES (3553807,35,'TAQUARITUBA');
INSERT INTO cidade VALUES (3553856,35,'TAQUARIVAI');
INSERT INTO cidade VALUES (4321329,43,'TAQUARUCU DO SUL');
INSERT INTO cidade VALUES (5007976,50,'TAQUARUSSU');
INSERT INTO cidade VALUES (3553906,35,'TARABAI');
INSERT INTO cidade VALUES (1200609,12,'TARAUACA');
INSERT INTO cidade VALUES (2313252,23,'TARRAFAS');
INSERT INTO cidade VALUES (1600709,16,'TARTARUGALZINHO');
INSERT INTO cidade VALUES (3553955,35,'TARUMA');
INSERT INTO cidade VALUES (3168408,31,'TARUMIRIM');
INSERT INTO cidade VALUES (2112001,21,'TASSO FRAGOSO');
INSERT INTO cidade VALUES (3554003,35,'TATUI');
INSERT INTO cidade VALUES (2313302,23,'TAUA');
INSERT INTO cidade VALUES (3554102,35,'TAUBATE');
INSERT INTO cidade VALUES (4321352,43,'TAVARES');
INSERT INTO cidade VALUES (2516607,25,'TAVARES');
INSERT INTO cidade VALUES (1304203,13,'TEFE');
INSERT INTO cidade VALUES (2516706,25,'TEIXEIRA');
INSERT INTO cidade VALUES (2931350,29,'TEIXEIRA DE FREITAS');
INSERT INTO cidade VALUES (4127007,41,'TEIXEIRA SOARES');
INSERT INTO cidade VALUES (3168507,31,'TEIXEIRAS');
INSERT INTO cidade VALUES (1101559,11,'TEIXEIROPOLIS');
INSERT INTO cidade VALUES (2313351,23,'TEJUCUOCA');
INSERT INTO cidade VALUES (3554201,35,'TEJUPA');
INSERT INTO cidade VALUES (4127106,41,'TELEMACO BORBA');
INSERT INTO cidade VALUES (2807303,28,'TELHA');
INSERT INTO cidade VALUES (2414100,24,'TENENTE ANANIAS');
INSERT INTO cidade VALUES (2414159,24,'TENENTE LAURENTINO CRUZ');
INSERT INTO cidade VALUES (4321402,43,'TENENTE PORTELA');
INSERT INTO cidade VALUES (2516755,25,'TENORIO');
INSERT INTO cidade VALUES (2931400,29,'TEODORO SAMPAIO');
INSERT INTO cidade VALUES (3554300,35,'TEODORO SAMPAIO');
INSERT INTO cidade VALUES (2931509,29,'TEOFILANDIA');
INSERT INTO cidade VALUES (3168606,31,'TEOFILO OTONI');
INSERT INTO cidade VALUES (2931608,29,'TEOLANDIA');
INSERT INTO cidade VALUES (2709152,27,'TEOTONIO VILELA');
INSERT INTO cidade VALUES (5008008,50,'TERENOS');
INSERT INTO cidade VALUES (2211001,22,'TERESINA');
INSERT INTO cidade VALUES (5221080,52,'TERESINA DE GOIAS');
INSERT INTO cidade VALUES (3305802,33,'TERESOPOLIS');
INSERT INTO cidade VALUES (2615102,26,'TEREZINHA');
INSERT INTO cidade VALUES (5221197,52,'TEREZOPOLIS DE GOIAS');
INSERT INTO cidade VALUES (1507961,15,'TERRA ALTA');
INSERT INTO cidade VALUES (4127205,41,'TERRA BOA');
INSERT INTO cidade VALUES (4321436,43,'TERRA DE AREIA');
INSERT INTO cidade VALUES (2931707,29,'TERRA NOVA');
INSERT INTO cidade VALUES (2615201,26,'TERRA NOVA');
INSERT INTO cidade VALUES (5108055,51,'TERRA NOVA DO NORTE');
INSERT INTO cidade VALUES (4127304,41,'TERRA RICA');
INSERT INTO cidade VALUES (3554409,35,'TERRA ROXA');
INSERT INTO cidade VALUES (4127403,41,'TERRA ROXA');
INSERT INTO cidade VALUES (1507979,15,'TERRA SANTA');
INSERT INTO cidade VALUES (5108105,51,'TESOURO');
INSERT INTO cidade VALUES (4321451,43,'TEUTONIA');
INSERT INTO cidade VALUES (1101609,11,'THEOBROMA');
INSERT INTO cidade VALUES (2313401,23,'TIANGUA');
INSERT INTO cidade VALUES (4127502,41,'TIBAGI');
INSERT INTO cidade VALUES (2411056,24,'TIBAU');
INSERT INTO cidade VALUES (2414209,24,'TIBAU DO SUL');
INSERT INTO cidade VALUES (3554508,35,'TIETE');
INSERT INTO cidade VALUES (4217956,42,'TIGRINHOS');
INSERT INTO cidade VALUES (4218004,42,'TIJUCAS');
INSERT INTO cidade VALUES (4127601,41,'TIJUCAS DO SUL');
INSERT INTO cidade VALUES (2615300,26,'TIMBAUBA');
INSERT INTO cidade VALUES (2414308,24,'TIMBAUBA DO BATISTAS');
INSERT INTO cidade VALUES (4218103,42,'TIMBE DO SUL');
INSERT INTO cidade VALUES (2112100,21,'TIMBIRAS');
INSERT INTO cidade VALUES (4218202,42,'TIMBO');
INSERT INTO cidade VALUES (4218251,42,'TIMBO GRANDE');
INSERT INTO cidade VALUES (3554607,35,'TIMBURI');
INSERT INTO cidade VALUES (2112209,21,'TIMON');
INSERT INTO cidade VALUES (3168705,31,'TIMOTEO');
INSERT INTO cidade VALUES (4321469,43,'TIO HUGO');
INSERT INTO cidade VALUES (3168804,31,'TIRADENTES');
INSERT INTO cidade VALUES (4321477,43,'TIRADENTES DO SUL');
INSERT INTO cidade VALUES (3168903,31,'TIROS');
INSERT INTO cidade VALUES (2807402,28,'TOBIAS BARRETO');
INSERT INTO cidade VALUES (1721109,17,'TOCANTINIA');
INSERT INTO cidade VALUES (1721208,17,'TOCANTINOPOLIS');
INSERT INTO cidade VALUES (3169000,31,'TOCANTINS');
INSERT INTO cidade VALUES (3169059,31,'TOCOS DO MOGI');
INSERT INTO cidade VALUES (3169109,31,'TOLEDO');
INSERT INTO cidade VALUES (4127700,41,'TOLEDO');
INSERT INTO cidade VALUES (2807501,28,'TOMAR DO GERU');
INSERT INTO cidade VALUES (4127809,41,'TOMAZINA');
INSERT INTO cidade VALUES (3169208,31,'TOMBOS');
INSERT INTO cidade VALUES (1508001,15,'TOME-ACU');
INSERT INTO cidade VALUES (1304237,13,'TONANTINS');
INSERT INTO cidade VALUES (2615409,26,'TORITAMA');
INSERT INTO cidade VALUES (5108204,51,'TORIXOREU');
INSERT INTO cidade VALUES (4321493,43,'TOROPI');
INSERT INTO cidade VALUES (3554656,35,'TORRE DE PEDRA');
INSERT INTO cidade VALUES (4321501,43,'TORRES');
INSERT INTO cidade VALUES (3554706,35,'TORRINHA');
INSERT INTO cidade VALUES (2414407,24,'TOUROS');
INSERT INTO cidade VALUES (3554755,35,'TRABIJU');
INSERT INTO cidade VALUES (1508035,15,'TRACUATEUA');
INSERT INTO cidade VALUES (2615508,26,'TRACUNHAEM');
INSERT INTO cidade VALUES (2709202,27,'TRAIPU');
INSERT INTO cidade VALUES (1508050,15,'TRAIRAO');
INSERT INTO cidade VALUES (2313500,23,'TRAIRI');
INSERT INTO cidade VALUES (3305901,33,'TRAJANO DE MORAIS');
INSERT INTO cidade VALUES (4321600,43,'TRAMANDAI');
INSERT INTO cidade VALUES (4321626,43,'TRAVESSEIRO');
INSERT INTO cidade VALUES (2931806,29,'TREMEDAL');
INSERT INTO cidade VALUES (3554805,35,'TREMEMBE');
INSERT INTO cidade VALUES (4321634,43,'TRES ARROIOS');
INSERT INTO cidade VALUES (4218301,42,'TRES BARRAS');
INSERT INTO cidade VALUES (4127858,41,'TRES BARRAS DO PARANA');
INSERT INTO cidade VALUES (4321667,43,'TRES CACHOEIRAS');
INSERT INTO cidade VALUES (3169307,31,'TRES CORACOES');
INSERT INTO cidade VALUES (4321709,43,'TRES COROAS');
INSERT INTO cidade VALUES (4321808,43,'TRES DE MAIO');
INSERT INTO cidade VALUES (4321832,43,'TRES FORQUILHAS');
INSERT INTO cidade VALUES (3554904,35,'TRES FRONTEIRAS');
INSERT INTO cidade VALUES (5008305,50,'TRES LAGOAS');
INSERT INTO cidade VALUES (3169356,31,'TRES MARIAS');
INSERT INTO cidade VALUES (4321857,43,'TRES PALMEIRAS');
INSERT INTO cidade VALUES (4321907,43,'TRES PASSOS');
INSERT INTO cidade VALUES (3169406,31,'TRES PONTAS');
INSERT INTO cidade VALUES (5221304,52,'TRES RANCHOS');
INSERT INTO cidade VALUES (3306008,33,'TRES RIOS');
INSERT INTO cidade VALUES (4218350,42,'TREVISO');
INSERT INTO cidade VALUES (4218400,42,'TREZE DE MAIO');
INSERT INTO cidade VALUES (4218509,42,'TREZE TILIAS');
INSERT INTO cidade VALUES (2615607,26,'TRINDADE');
INSERT INTO cidade VALUES (5221403,52,'TRINDADE');
INSERT INTO cidade VALUES (4321956,43,'TRINDADE DO SUL');
INSERT INTO cidade VALUES (2516805,25,'TRIUNFO');
INSERT INTO cidade VALUES (2615706,26,'TRIUNFO');
INSERT INTO cidade VALUES (4322004,43,'TRIUNFO');
INSERT INTO cidade VALUES (2414456,24,'TRIUNFO POTIGUAR');
INSERT INTO cidade VALUES (2112233,21,'TRIZIDELA DO VALE');
INSERT INTO cidade VALUES (5221452,52,'TROMBAS');
INSERT INTO cidade VALUES (4218608,42,'TROMBUDO CENTRAL');
INSERT INTO cidade VALUES (4218707,42,'TUBARAO');
INSERT INTO cidade VALUES (2931905,29,'TUCANO');
INSERT INTO cidade VALUES (1508084,15,'TUCUMA');
INSERT INTO cidade VALUES (4322103,43,'TUCUNDUVA');
INSERT INTO cidade VALUES (1508100,15,'TUCURUI');
INSERT INTO cidade VALUES (2112274,21,'TUFILANDIA');
INSERT INTO cidade VALUES (3554953,35,'TUIUTI');
INSERT INTO cidade VALUES (3169505,31,'TUMIRITINGA');
INSERT INTO cidade VALUES (4218756,42,'TUNAPOLIS');
INSERT INTO cidade VALUES (4322152,43,'TUNAS');
INSERT INTO cidade VALUES (4127882,41,'TUNAS DO PARANA');
INSERT INTO cidade VALUES (4127908,41,'TUNEIRAS DO OESTE');
INSERT INTO cidade VALUES (2112308,21,'TUNTUM');
INSERT INTO cidade VALUES (3555000,35,'TUPA');
INSERT INTO cidade VALUES (3169604,31,'TUPACIGUARA');
INSERT INTO cidade VALUES (2615805,26,'TUPANATINGA');
INSERT INTO cidade VALUES (4322186,43,'TUPANCI DO SUL');
INSERT INTO cidade VALUES (4322202,43,'TUPANCIRETA');
INSERT INTO cidade VALUES (4322251,43,'TUPANDI');
INSERT INTO cidade VALUES (4322301,43,'TUPARENDI');
INSERT INTO cidade VALUES (2615904,26,'TUPARETAMA');
INSERT INTO cidade VALUES (4127957,41,'TUPASSI');
INSERT INTO cidade VALUES (3555109,35,'TUPI PAULISTA');
INSERT INTO cidade VALUES (1721257,17,'TUPIRAMA');
INSERT INTO cidade VALUES (1721307,17,'TUPIRATINS');
INSERT INTO cidade VALUES (2112407,21,'TURIACU');
INSERT INTO cidade VALUES (2112456,21,'TURILANDIA');
INSERT INTO cidade VALUES (3555208,35,'TURIUBA');
INSERT INTO cidade VALUES (3555307,35,'TURMALINA');
INSERT INTO cidade VALUES (3169703,31,'TURMALINA');
INSERT INTO cidade VALUES (4322327,43,'TURUCU');
INSERT INTO cidade VALUES (2313559,23,'TURURU');
INSERT INTO cidade VALUES (5221502,52,'TURVANIA');
INSERT INTO cidade VALUES (5221551,52,'TURVELANDIA');
INSERT INTO cidade VALUES (4127965,41,'TURVO');
INSERT INTO cidade VALUES (4218806,42,'TURVO');
INSERT INTO cidade VALUES (3169802,31,'TURVOLANDIA');
INSERT INTO cidade VALUES (2112506,21,'TUTOIA');
INSERT INTO cidade VALUES (1304260,13,'UARINI');
INSERT INTO cidade VALUES (2932002,29,'UAUA');
INSERT INTO cidade VALUES (3169901,31,'UBA');
INSERT INTO cidade VALUES (3170008,31,'UBAI');
INSERT INTO cidade VALUES (2932101,29,'UBAIRA');
INSERT INTO cidade VALUES (2932200,29,'UBAITABA');
INSERT INTO cidade VALUES (2313609,23,'UBAJARA');
INSERT INTO cidade VALUES (3170057,31,'UBAPORANGA');
INSERT INTO cidade VALUES (3555356,35,'UBARANA');
INSERT INTO cidade VALUES (2932309,29,'UBATA');
INSERT INTO cidade VALUES (3555406,35,'UBATUBA');
INSERT INTO cidade VALUES (3170107,31,'UBERABA');
INSERT INTO cidade VALUES (3170206,31,'UBERLANDIA');
INSERT INTO cidade VALUES (3555505,35,'UBIRAJARA');
INSERT INTO cidade VALUES (4128005,41,'UBIRATA');
INSERT INTO cidade VALUES (4322343,43,'UBIRETAMA');
INSERT INTO cidade VALUES (3555604,35,'UCHOA');
INSERT INTO cidade VALUES (2932408,29,'UIBAI');
INSERT INTO cidade VALUES (1400704,14,'UIRAMUTA');
INSERT INTO cidade VALUES (5221577,52,'UIRAPURU');
INSERT INTO cidade VALUES (2516904,25,'UIRAUNA');
INSERT INTO cidade VALUES (1508126,15,'ULIANOPOLIS');
INSERT INTO cidade VALUES (2313708,23,'UMARI');
INSERT INTO cidade VALUES (2414506,24,'UMARIZAL');
INSERT INTO cidade VALUES (2807600,28,'UMBAUBA');
INSERT INTO cidade VALUES (2932457,29,'UMBURANAS');
INSERT INTO cidade VALUES (3170305,31,'UMBURATIBA');
INSERT INTO cidade VALUES (2517001,25,'UMBUZEIRO');
INSERT INTO cidade VALUES (2313757,23,'UMIRIM');
INSERT INTO cidade VALUES (4128104,41,'UMUARAMA');
INSERT INTO cidade VALUES (2932507,29,'UNA');
INSERT INTO cidade VALUES (3170404,31,'UNAI');
INSERT INTO cidade VALUES (2211100,22,'UNIAO');
INSERT INTO cidade VALUES (4322350,43,'UNIAO DA SERRA');
INSERT INTO cidade VALUES (4128203,41,'UNIAO DA VITORIA');
INSERT INTO cidade VALUES (3170438,31,'UNIAO DE MINAS');
INSERT INTO cidade VALUES (4218855,42,'UNIAO DO OESTE');
INSERT INTO cidade VALUES (2709301,27,'UNIAO DO PALMARES');
INSERT INTO cidade VALUES (5108303,51,'UNIAO DO SUL');
INSERT INTO cidade VALUES (3555703,35,'UNIAO PAULISTA');
INSERT INTO cidade VALUES (4128302,41,'UNIFLOR');
INSERT INTO cidade VALUES (4322376,43,'UNISTALDA');
INSERT INTO cidade VALUES (2414605,24,'UPANEMA');
INSERT INTO cidade VALUES (4128401,41,'URAI');
INSERT INTO cidade VALUES (2932606,29,'URANDI');
INSERT INTO cidade VALUES (3555802,35,'URANIA');
INSERT INTO cidade VALUES (2112605,21,'URBANO SANTOS');
INSERT INTO cidade VALUES (3555901,35,'URU');
INSERT INTO cidade VALUES (5221601,52,'URUACU');
INSERT INTO cidade VALUES (5221700,52,'URUANA');
INSERT INTO cidade VALUES (3170479,31,'URUANA DE MINAS');
INSERT INTO cidade VALUES (1508159,15,'URUARA');
INSERT INTO cidade VALUES (4218905,42,'URUBICI');
INSERT INTO cidade VALUES (2313807,23,'URUBURETAMA');
INSERT INTO cidade VALUES (3170503,31,'URUCANIA');
INSERT INTO cidade VALUES (1304302,13,'URUCARA');
INSERT INTO cidade VALUES (2932705,29,'URUCUCA');
INSERT INTO cidade VALUES (2211209,22,'URUCUI');
INSERT INTO cidade VALUES (3170529,31,'URUCUIA');
INSERT INTO cidade VALUES (1304401,13,'URUCURITUBA');
INSERT INTO cidade VALUES (4322400,43,'URUGUAIANA');
INSERT INTO cidade VALUES (2313906,23,'URUOCA');
INSERT INTO cidade VALUES (1101708,11,'URUPA');
INSERT INTO cidade VALUES (4218954,42,'URUPEMA');
INSERT INTO cidade VALUES (3556008,35,'URUPES');
INSERT INTO cidade VALUES (4219002,42,'URUSSANGA');
INSERT INTO cidade VALUES (5221809,52,'URUTAI');
INSERT INTO cidade VALUES (2932804,29,'UTINGA');
INSERT INTO cidade VALUES (4322509,43,'VACARIA');
INSERT INTO cidade VALUES (5108352,51,'VALE DE SAO DOMINGOS');
INSERT INTO cidade VALUES (1101757,11,'VALE DO ANARI');
INSERT INTO cidade VALUES (1101807,11,'VALE DO PARAISO');
INSERT INTO cidade VALUES (4322533,43,'VALE DO SOL');
INSERT INTO cidade VALUES (4322541,43,'VALE REAL');
INSERT INTO cidade VALUES (4322525,43,'VALE VERDE');
INSERT INTO cidade VALUES (2932903,29,'VALENCA');
INSERT INTO cidade VALUES (3306107,33,'VALENCA');
INSERT INTO cidade VALUES (2211308,22,'VALENCA DO PIAUI');
INSERT INTO cidade VALUES (2933000,29,'VALENTE');
INSERT INTO cidade VALUES (3556107,35,'VALENTIM GENTIL');
INSERT INTO cidade VALUES (3556206,35,'VALINHOS');
INSERT INTO cidade VALUES (3556305,35,'VALPARAISO');
INSERT INTO cidade VALUES (5221858,52,'VALPARAISO DE GOIAS');
INSERT INTO cidade VALUES (4322558,43,'VANINI');
INSERT INTO cidade VALUES (4219101,42,'VARGEAO');
INSERT INTO cidade VALUES (3556354,35,'VARGEM');
INSERT INTO cidade VALUES (4219150,42,'VARGEM');
INSERT INTO cidade VALUES (3170578,31,'VARGEM ALEGRE');
INSERT INTO cidade VALUES (3205036,32,'VARGEM ALTA');
INSERT INTO cidade VALUES (3170602,31,'VARGEM BONITA');
INSERT INTO cidade VALUES (4219176,42,'VARGEM BONITA');
INSERT INTO cidade VALUES (2112704,21,'VARGEM GRANDE');
INSERT INTO cidade VALUES (3170651,31,'VARGEM GRANDE DO RIO PARDO');
INSERT INTO cidade VALUES (3556404,35,'VARGEM GRANDE DO SUL');
INSERT INTO cidade VALUES (3556453,35,'VARGEM GRANDE PAULISTA');
INSERT INTO cidade VALUES (3170701,31,'VARGINHA');
INSERT INTO cidade VALUES (5221908,52,'VARJAO');
INSERT INTO cidade VALUES (3170750,31,'VARJAO DE MINAS');
INSERT INTO cidade VALUES (2313955,23,'VARJOTA');
INSERT INTO cidade VALUES (3306156,33,'VARRE-SAI');
INSERT INTO cidade VALUES (2517100,25,'VARZEA');
INSERT INTO cidade VALUES (2414704,24,'VARZEA');
INSERT INTO cidade VALUES (2314003,23,'VARZEA ALEGRE');
INSERT INTO cidade VALUES (2211357,22,'VARZEA BRANCA');
INSERT INTO cidade VALUES (3170800,31,'VARZEA DA PALMA');
INSERT INTO cidade VALUES (2933059,29,'VARZEA DA ROCA');
INSERT INTO cidade VALUES (2933109,29,'VARZEA DO POCO');
INSERT INTO cidade VALUES (2211407,22,'VARZEA GRANDE');
INSERT INTO cidade VALUES (5108402,51,'VARZEA GRANDE');
INSERT INTO cidade VALUES (2933158,29,'VARZEA NOVA');
INSERT INTO cidade VALUES (3556503,35,'VARZEA PAULISTA');
INSERT INTO cidade VALUES (2933174,29,'VARZEDO');
INSERT INTO cidade VALUES (3170909,31,'VARZELANDIA');
INSERT INTO cidade VALUES (3306206,33,'VASSOURAS');
INSERT INTO cidade VALUES (3171006,31,'VAZANTE');
INSERT INTO cidade VALUES (4322608,43,'VENANCIO AIRES');
INSERT INTO cidade VALUES (3205069,32,'VENDA NOVA DO IMIGRANTE');
INSERT INTO cidade VALUES (2414753,24,'VENHA-VER');
INSERT INTO cidade VALUES (4128534,41,'VENTANIA');
INSERT INTO cidade VALUES (2616001,26,'VENTUROSA');
INSERT INTO cidade VALUES (5108501,51,'VERA');
INSERT INTO cidade VALUES (2933208,29,'VERA CRUZ');
INSERT INTO cidade VALUES (2414803,24,'VERA CRUZ');
INSERT INTO cidade VALUES (4322707,43,'VERA CRUZ');
INSERT INTO cidade VALUES (3556602,35,'VERA CRUZ');
INSERT INTO cidade VALUES (4128559,41,'VERA CRUZ DO OESTE');
INSERT INTO cidade VALUES (2211506,22,'VERA MENDES');
INSERT INTO cidade VALUES (4322806,43,'VERANOPOLIS');
INSERT INTO cidade VALUES (2616100,26,'VERDEJANTE');
INSERT INTO cidade VALUES (3171030,31,'VERDELANDIA');
INSERT INTO cidade VALUES (4128609,41,'VERE');
INSERT INTO cidade VALUES (2933257,29,'VEREDA');
INSERT INTO cidade VALUES (3171071,31,'VEREDINHA');
INSERT INTO cidade VALUES (3171105,31,'VERISSIMO');
INSERT INTO cidade VALUES (3171154,31,'VERMELHO NOVO');
INSERT INTO cidade VALUES (2616183,26,'VERTENTE DO LERIO');
INSERT INTO cidade VALUES (2616209,26,'VERTENTES');
INSERT INTO cidade VALUES (3171204,31,'VESPASIANO');
INSERT INTO cidade VALUES (4322855,43,'VESPASIANO CORREA');
INSERT INTO cidade VALUES (4322905,43,'VIADUTOS');
INSERT INTO cidade VALUES (4323002,43,'VIAMAO');
INSERT INTO cidade VALUES (2112803,21,'VIANA');
INSERT INTO cidade VALUES (3205101,32,'VIANA');
INSERT INTO cidade VALUES (5222005,52,'VIANOPOLIS');
INSERT INTO cidade VALUES (2616308,26,'VICENCIA');
INSERT INTO cidade VALUES (4323101,43,'VICENTE DUTRA');
INSERT INTO cidade VALUES (5008404,50,'VICENTINA');
INSERT INTO cidade VALUES (5222054,52,'VICENTINOPOLIS');
INSERT INTO cidade VALUES (2709400,27,'VICOSA');
INSERT INTO cidade VALUES (3171303,31,'VICOSA');
INSERT INTO cidade VALUES (2414902,24,'VICOSA');
INSERT INTO cidade VALUES (2314102,23,'VICOSA DO CEARA');
INSERT INTO cidade VALUES (4323200,43,'VICTOR GRAEFF');
INSERT INTO cidade VALUES (4219200,42,'VIDAL RAMOS');
INSERT INTO cidade VALUES (4219309,42,'VIDEIRA');
INSERT INTO cidade VALUES (3171402,31,'VIEIRAS');
INSERT INTO cidade VALUES (2517209,25,'VIEIROPOLIS');
INSERT INTO cidade VALUES (1508209,15,'VIGIA');
INSERT INTO cidade VALUES (4128625,41,'VILA ALTA');
INSERT INTO cidade VALUES (5105507,51,'VILA BELA DA SANTISSIMA TRINDADE');
INSERT INTO cidade VALUES (5222203,52,'VILA BOA');
INSERT INTO cidade VALUES (2415008,24,'VILA FLOR');
INSERT INTO cidade VALUES (4323309,43,'VILA FLORES');
INSERT INTO cidade VALUES (4323358,43,'VILA LANGARO');
INSERT INTO cidade VALUES (4323408,43,'VILA MARIA');
INSERT INTO cidade VALUES (2112852,21,'VILA NOVA DO MARTIRIOS');
INSERT INTO cidade VALUES (2211605,22,'VILA NOVA DO PIAUI');
INSERT INTO cidade VALUES (4323457,43,'VILA NOVA DO SUL');
INSERT INTO cidade VALUES (3205150,32,'VILA PAVAO');
INSERT INTO cidade VALUES (5222302,52,'VILA PROPICIO');
INSERT INTO cidade VALUES (5108600,51,'VILA RICA');
INSERT INTO cidade VALUES (3205176,32,'VILA VALERIO');
INSERT INTO cidade VALUES (3205200,32,'VILA VELHA');
INSERT INTO cidade VALUES (1100304,11,'VILHENA');
INSERT INTO cidade VALUES (3556701,35,'VINHEDO');
INSERT INTO cidade VALUES (3556800,35,'VIRADOURO');
INSERT INTO cidade VALUES (3171600,31,'VIRGEM DA LAPA');
INSERT INTO cidade VALUES (3171709,31,'VIRGINIA');
INSERT INTO cidade VALUES (3171808,31,'VIRGINOPOLIS');
INSERT INTO cidade VALUES (3171907,31,'VIRGOLANDIA');
INSERT INTO cidade VALUES (4128658,41,'VIRMOND');
INSERT INTO cidade VALUES (3172004,31,'VISCONDE DO RIO BRANCO');
INSERT INTO cidade VALUES (1508308,15,'VISEU');
INSERT INTO cidade VALUES (4323507,43,'VISTA ALEGRE');
INSERT INTO cidade VALUES (3556909,35,'VISTA ALEGRE DO ALTO');
INSERT INTO cidade VALUES (4323606,43,'VISTA ALEGRE DO PRATA');
INSERT INTO cidade VALUES (4323705,43,'VISTA GAUCHA');
INSERT INTO cidade VALUES (2505501,25,'VISTA SERRANA');
INSERT INTO cidade VALUES (4219358,42,'VITOR MEIRELES');
INSERT INTO cidade VALUES (3205309,32,'VITORIA');
INSERT INTO cidade VALUES (3556958,35,'VITORIA BRASIL');
INSERT INTO cidade VALUES (2933307,29,'VITORIA DA CONQUISTA');
INSERT INTO cidade VALUES (4323754,43,'VITORIA DAS MISSOES');
INSERT INTO cidade VALUES (2616407,26,'VITORIA DE SANTO ANTAO');
INSERT INTO cidade VALUES (1600808,16,'VITORIA DO JARI');
INSERT INTO cidade VALUES (2112902,21,'VITORIA DO MEARIM');
INSERT INTO cidade VALUES (1508357,15,'VITORIA DO XINGU');
INSERT INTO cidade VALUES (4128708,41,'VITORINO');
INSERT INTO cidade VALUES (2113009,21,'VITORINO FREIRE');
INSERT INTO cidade VALUES (3172103,31,'VOLTA GRANDE');
INSERT INTO cidade VALUES (3306305,33,'VOLTA REDONDA');
INSERT INTO cidade VALUES (3557006,35,'VOTORANTIM');
INSERT INTO cidade VALUES (3557105,35,'VOTUPORANGA');
INSERT INTO cidade VALUES (2933406,29,'WAGNER');
INSERT INTO cidade VALUES (2211704,22,'WALL FERRAZ');
INSERT INTO cidade VALUES (1722081,17,'WANDERLANDIA');
INSERT INTO cidade VALUES (2933455,29,'WANDERLEY');
INSERT INTO cidade VALUES (3172202,31,'WENCESLAU BRAZ');
INSERT INTO cidade VALUES (4128500,41,'WENCESLAU BRAZ');
INSERT INTO cidade VALUES (2933505,29,'WENCESLAU GUIMARAES');
INSERT INTO cidade VALUES (4323770,43,'WESTFALIA');
INSERT INTO cidade VALUES (4219408,42,'WITMARSUM');
INSERT INTO cidade VALUES (1722107,17,'XAMBIOA');
INSERT INTO cidade VALUES (4128807,41,'XAMBRE');
INSERT INTO cidade VALUES (4323804,43,'XANGRI-LA');
INSERT INTO cidade VALUES (4219507,42,'XANXERE');
INSERT INTO cidade VALUES (1200708,12,'XAPURI');
INSERT INTO cidade VALUES (4219606,42,'XAVANTINA');
INSERT INTO cidade VALUES (4219705,42,'XAXIM');
INSERT INTO cidade VALUES (2616506,26,'XEXEU');
INSERT INTO cidade VALUES (1508407,15,'XINGUARA');
INSERT INTO cidade VALUES (2933604,29,'XIQUE-XIQUE');
INSERT INTO cidade VALUES (2517407,25,'ZABELE');
INSERT INTO cidade VALUES (3557154,35,'ZACARIAS');
INSERT INTO cidade VALUES (2114007,21,'ZE DOCA');
INSERT INTO cidade VALUES (4219853,42,'ZORTEA');

