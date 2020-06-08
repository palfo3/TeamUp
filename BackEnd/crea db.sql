CREATE DATABASE db_ing;
USE db_ing;
CREATE TABLE candidato (utente varchar(60) NOT NULL, progetto int(10) NOT NULL, accettato tinyint(1) DEFAULT 0, curriculum varchar(255), PRIMARY KEY (MailUtente, ProgettoID));
CREATE TABLE progetto (ID int NOT NULL AUTO_INCREMENT, leader varchar(60) NOT NULL, nome varchar(60) NOT NULL, descrizione varchar(255), data_scadenza date NOT NULL, data_creazione date NOT NULL, candidatura tinyint(1) DEFAULT 0, numero_candidati int(10), ricercabile tinyint(1) DEFAULT 1, PRIMARY KEY (ID), INDEX (Leader));
CREATE TABLE utente (mail varchar(60) NOT NULL, password varchar(64) , nome varchar(40) NOT NULL, cognome varchar(50) NOT NULL, nascita date, descrizione varchar(250) NOT NULL, immagine varchar(255), curriculum varchar(255), PRIMARY KEY (Mail));
CREATE TABLE tag (nome varchar(60) PRIMARY KEY);
ALTER TABLE candidato ADD CONSTRAINT FKcandidato524966 FOREIGN KEY (Progetto) REFERENCES progetto (ID);
ALTER TABLE candidato ADD CONSTRAINT FKcandidato918278 FOREIGN KEY (utente) REFERENCES utente (Mail);
ALTER TABLE progetto ADD CONSTRAINT FKProgetto579424 FOREIGN KEY (Leader) REFERENCES Utente (Mail);
