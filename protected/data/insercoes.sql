-- COUNTRY
INSERT INTO bdaca_proj_grupo1.country	(id, name) VALUES (1, 'Portugal');INSERT INTO bdaca_proj_grupo1.country	(id, name) VALUES (2, 'Espanha');INSERT INTO bdaca_proj_grupo1.country	(id, name) VALUES (3, 'Rússia');

-- CITY
INSERT INTO bdaca_proj_grupo1.city (id, name, country_id) VALUES (1, 'Porto',	1);INSERT INTO bdaca_proj_grupo1.city (id, name, country_id) VALUES (2, 'Madrid',	2);INSERT INTO bdaca_proj_grupo1.city (id, name, country_id) VALUES (3, 'Moscovo',	3);INSERT INTO bdaca_proj_grupo1.city (id, name, country_id) VALUES (4, 'Lisboa',	1);

-- USER
INSERT INTO bdaca_proj_grupo1.user (id, name, username, password, email, site, city_id) VALUES (1, 'Fávio Mendonça', 'flv1', 'Esta-NinguemDescobre!', 'flavio.mendonca@bdaca.pt', 'http://www.linkedin.com/in/flaviomendonca', 1);INSERT INTO bdaca_proj_grupo1.user (id, name, username, password, email, site, city_id) VALUES (2, 'Ana Filipa Mascherana', 'anaf', 'Super-Secreta', 'flipana@gov.es', NULL, 2);
INSERT INTO bdaca_proj_grupo1.user (id, name, username, password, email, site, city_id) VALUES (3, 'Peter Usinov',	'flv2', 'Pravda#123', 'usinov@fictional.ru', 'http://www.peterusinov.ru', 3);
INSERT INTO bdaca_proj_grupo1.user (id, name, username, password, email, site, city_id) VALUES (4, 'Domingos Pericão',	'peridog', 'password-facil', 'pericao@moss.pt', 'http://www.iscte.pt/~pericao', 4);

