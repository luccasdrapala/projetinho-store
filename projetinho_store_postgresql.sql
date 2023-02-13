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
    price numeric(5,2) DEFAULT NULL::numeric
);


ALTER TABLE public._product OWNER TO rebasedata;

--
-- Name: _product_type; Type: TABLE; Schema: public; Owner: rebasedata
--

CREATE TABLE public._product_type (
    id smallint,
    product_description character varying(10) DEFAULT NULL::character varying,
    product_tax numeric(4,2) DEFAULT NULL::numeric
);


ALTER TABLE public._product_type OWNER TO rebasedata;

--
-- Name: _sales; Type: TABLE; Schema: public; Owner: rebasedata
--

CREATE TABLE public._sales (
    id smallint,
    total_price numeric(4,2) DEFAULT NULL::numeric,
    total_tax numeric(3,2) DEFAULT NULL::numeric,
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
    quantity numeric(5,4) DEFAULT NULL::numeric,
    price numeric(6,4) DEFAULT NULL::numeric,
    tax numeric(5,4) DEFAULT NULL::numeric,
    created_at character varying(19) DEFAULT NULL::character varying,
    updated_at character varying(1) DEFAULT NULL::character varying
);


ALTER TABLE public._sales_item OWNER TO rebasedata;

--
-- Data for Name: _product; Type: TABLE DATA; Schema: public; Owner: rebasedata
--

COPY public._product (id, type_product_id, description, price) FROM stdin;
13	28	Harry Potter - A Pedra Filosofal	49.99
15	30	T-Shirt New Balance	199.99
\.


--
-- Data for Name: _product_type; Type: TABLE DATA; Schema: public; Owner: rebasedata
--

COPY public._product_type (id, product_description, product_tax) FROM stdin;
28	Books	1.50
30	Clothes	12.50
31	Television	11.50
32	Instrument	1.50
\.


--
-- Data for Name: _sales; Type: TABLE DATA; Schema: public; Owner: rebasedata
--

COPY public._sales (id, total_price, total_tax, created_at, updated_at) FROM stdin;
1	49.99	1.50	2023-02-12 19:17:41	
\.


--
-- Data for Name: _sales_item; Type: TABLE DATA; Schema: public; Owner: rebasedata
--

COPY public._sales_item (id, sale_id, product_id, quantity, price, tax, created_at, updated_at) FROM stdin;
1	1	13	1.0000	49.9900	1.5000	2023-02-12 19:19:00	
\.


--
-- PostgreSQL database dump complete
--

