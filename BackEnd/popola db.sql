INSERT INTO utente ( mail, password, nome, cognome, descrizione) VALUES
('emanuele@mail.it', 'password', 'Emanuele', 'Sala', 'cagnaccio'),
('davode@mail.it', 'password', 'Davode', 'Toto', 'fra'),
('alfonso@mail.it', 'password', 'Alfonso', 'Piteo', 'sdrogo'),
('daniele@mail.it', 'password', 'Daniele', 'Insabato', 'miao');


INSERT INTO progetto (leader, nome, descrizione, data_scadenza, data_creazione) VALUES
('davode@mail.it', 'Ma scì a mangià?', 'l\'arlecchino', '2020-05-23', '2020-05-21'),
('emanuele@mail.it', 'Ma scì a mangià?', 'le pelose', '2020-05-22', '2020-05-21');

INSERT INTO candidato (utente, progetto) VALUES
('davode@mail.it', 2),
('alfonso@mail.it', 2),
('emanuele@mail.it', 1),
('alfonso@mail.it', 1),
('daniele@mail.it', 2);


INSERT INTO tag (nome) VALUES
('informatica'),
('università'),
('sport'),
('scialare');


INSERT INTO associaTag (progetto, tag, posizione) VALUES
(1, 'sport', 0),
(1, 'scialare', 1),
(1, 'università', 2),
(2, 'scialare', 0);