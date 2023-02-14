--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.10
-- Dumped by pg_dump version 9.6.10

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
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


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: _product; Type: TABLE; Schema: public; Owner: rebasedata
--

CREATE TABLE public._product (
    id smallint,
    type_product_id smallint,
    description character varying(32) DEFAULT NULL::character varying,
    price numeric(9,4) DEFAULT NULL::numeric
);


ALTER TABLE public._product OWNER TO rebasedata;

--
-- Name: _product_type; Type: TABLE; Schema: public; Owner: rebasedata
--

CREATE TABLE public._product_type (
    id smallint,
    product_description character varying(29) DEFAULT NULL::character varying,
    product_tax numeric(7,4) DEFAULT NULL::numeric
);


ALTER TABLE public._product_type OWNER TO rebasedata;

--
-- Name: _sales; Type: TABLE; Schema: public; Owner: rebasedata
--

CREATE TABLE public._sales (
    id smallint,
    total_price numeric(9,4) DEFAULT NULL::numeric,
    total_tax numeric(7,4) DEFAULT NULL::numeric,
    created_at character varying(19) DEFAULT NULL::character varying,
    updated_at character varying(1) DEFAULT NULL::character varying
);


ALTER TABLE public._sales OWNER TO rebasedata;

--
-- Name: _sales_item; Type: TABLE; Schema: public; Owner: rebasedata
--

CREATE TABLE public._sales_item (
    id smallint,
    sale_id smallint,
    product_id smallint,
    quantity numeric(6,4) DEFAULT NULL::numeric,
    price numeric(9,4) DEFAULT NULL::numeric,
    tax numeric(7,4) DEFAULT NULL::numeric,
    created_at character varying(19) DEFAULT NULL::character varying,
    updated_at character varying(1) DEFAULT NULL::character varying
);


ALTER TABLE public._sales_item OWNER TO rebasedata;

--
-- Data for Name: _product; Type: TABLE DATA; Schema: public; Owner: rebasedata
--

COPY public._product (id, type_product_id, description, price) FROM stdin;
13	28	Harry Potter - A Pedra Filosofal	49.9900
15	30	T-Shirt New Balance	199.9900
17	28	New Product	823.0000
18	28	234	23.0000
19	48	Xbox 360	789.5000
20	49	RTX 4090	23600.0000
\.


--
-- Data for Name: _product_type; Type: TABLE DATA; Schema: public; Owner: rebasedata
--

COPY public._product_type (id, product_description, product_tax) FROM stdin;
28	Books	1.5000
30	Clothes	12.5000
31	Television	11.5000
32	Instrument	1.5000
43	Esse é bom	1.5000
46	Programador Sênior em 6 meses	4.0000
47	8	4.0000
48	Video Games	12.0000
49	PCzismo	1.5000
50	44444	999.9900
\.


--
-- Data for Name: _sales; Type: TABLE DATA; Schema: public; Owner: rebasedata
--

COPY public._sales (id, total_price, total_tax, created_at, updated_at) FROM stdin;
4	224.9900	25.0000	2023-02-13 21:26:34	
6	275.7300	25.7500	2023-02-13 21:27:16	
7	833.8700	34.0000	2023-02-13 21:27:43	
8	101.4800	1.5000	2023-02-14 08:19:08	
11	47908.0000	708.0000	2023-02-14 08:40:49	
\.


--
-- Data for Name: _sales_item; Type: TABLE DATA; Schema: public; Owner: rebasedata
--

COPY public._sales_item (id, sale_id, product_id, quantity, price, tax, created_at, updated_at) FROM stdin;
4	4	15	1.0000	199.9900	25.0000	2023-02-13 21:26:34	
7	6	13	1.0000	49.9900	0.7500	2023-02-13 21:27:16	
8	6	15	1.0000	199.9900	25.0000	2023-02-13 21:27:16	
9	7	13	12.0000	49.9900	9.0000	2023-02-13 21:27:43	
10	7	15	1.0000	199.9900	25.0000	2023-02-13 21:27:43	
11	8	13	2.0000	49.9900	1.5000	2023-02-14 08:19:08	
14	11	20	2.0000	23600.0000	708.0000	2023-02-14 08:40:49	
\.


--
-- PostgreSQL database dump complete
--

