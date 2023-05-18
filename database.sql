DROP DATABASE IF EXISTS volandia;
create database volandia;
USE volandia;

/*      GESTIONE PERSONE      */
CREATE TABLE USERS (
  username VARCHAR(255) PRIMARY KEY,
  email VARCHAR(45) NOT NULL,
  password VARCHAR(60) NOT NULL
);

CREATE TABLE PASSEGGERI (
  CF VARCHAR(16) PRIMARY KEY,
  Nome VARCHAR(45) NOT NULL,
  Cognome VARCHAR(45) NOT NULL,
  DataNascita DATE NOT NULL,
  Nazionalita VARCHAR(40), 
  tipo_via VARCHAR(15) NOT NULL,
  nome_via VARCHAR(25) NOT NULL,
  Citta VARCHAR(30),
  n_via VARCHAR(15) NOT NULL,
  username VARCHAR(255) NOT NULL,
  FOREIGN KEY (username) REFERENCES USERS (username) ON DELETE RESTRICT ON UPDATE CASCADE
) ;

CREATE TABLE PERSONALE (
  Id BIGINT(255) NOT NULL PRIMARY KEY,
  Nome VARCHAR(45) NOT NULL,
  Cognome VARCHAR(45) NOT NULL,
  DataNascita DATE NOT NULL,
  Ruolo VARCHAR(30), 
  Qualifica VARCHAR(30),
  email VARCHAR(45) NOT NULL, 
  password VARCHAR(60) NOT NULL
) ;

/*      GESTIONE VOLI     */

CREATE TABLE COMPAGNIE (
  Cod_IATA VARCHAR(10) PRIMARY KEY,
  Compagnia VARCHAR(30) NOT NULL,
  Nazione VARCHAR(30) NOT NULL,
  SedeLegale VARCHAR(30)
) ;

CREATE TABLE VOLI (
  NumeroVolo VARCHAR(10)  PRIMARY KEY,
  Origine VARCHAR(30) NOT NULL,
  Destinazione VARCHAR(30) NOT NULL,
  DataPartenza TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  DataArrivo TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, 
  Capacita INT NOT NULL,
  Cod_IATA VARCHAR(10) NOT NULL,
  FOREIGN KEY (Cod_IATA) REFERENCES COMPAGNIE (Cod_IATA) ON DELETE RESTRICT ON UPDATE CASCADE
) ;

CREATE TABLE BIGLIETTI (
  CodiceTicket VARCHAR(15) NOT NULL,
  DataAcquisto DATE NOT NULL,
  Importo VARCHAR(45),
  Tasse VARCHAR(30),
  NumeroVolo VARCHAR(10) NOT NULL,
  CodiceFiscale VARCHAR(20) NOT NULL,
  PRIMARY KEY (NumeroVolo, CodiceTicket),
  FOREIGN KEY (NumeroVolo) REFERENCES VOLI (NumeroVolo) ON DELETE RESTRICT ON UPDATE CASCADE,
  FOREIGN KEY (CodiceFiscale) REFERENCES PASSEGGERI (CF) ON DELETE RESTRICT ON UPDATE CASCADE
);

/*    INSERT    */

INSERT INTO USERS (`username`, `email`, `password`) VALUES
('d3enny04', 'denysraimondi06@gmail.com', '$2y$10$orFWTcmecTQykqDFw7ItM.hfJ1XYcBPsnpFujBGKD3ogHK5cRTzAW');

INSERT INTO PASSEGGERI VALUES
('ROOT', 'Root', 'Root', '1900-01-01', 'root', 'avenue', 'root', 'root', '64', 'd3enny04'),
('DNNGRL62C12G482R', 'Gabriele', 'Dannunzio', '1962-03-12', 'italia', 'avenue', 'Novara', 'Pescara', '64','d3enny04'),
('LGHDNT79R08D612Q', 'Dante', 'Alighieri', '1979-10-08', 'italia', 'route', 'Valtellina', 'Firenze', '76','d3enny04'),
('MCCCCT65T56C342T', 'Marina', 'Maccarrone', '1965-12-16', 'italia', 'route', 'Garibaldi', 'Sarono', '87','d3enny04'),
('MRCGLL70D25A944E', 'Guglielmo Giovanni Maria', 'Marconi', '1970-04-25', 'italia', 'place', 'Loreto', 'Bologna', '3','d3enny04'),
('RMNDYS04A15I441W', 'Denys', 'Raimondi', '2004-01-15', 'italia', 'route', 'Via Pascoli', 'Uboldo', '181','d3enny04'),
('RSSMRA90R10F205I', 'Mario', 'Rossi', '0000-00-00', 'italia', 'avenue', 'Stelvio', 'Milano', '70','d3enny04'),
('VRDLGU99M01I441T', 'Luigi', 'Verdi', '0000-00-00', 'italia', 'route', 'Garibaldi', 'Saronno', '96','d3enny04');

INSERT INTO COMPAGNIE VALUES 
('IT','ITA','Italia','Roma'),
('EZY','EasyJet','Inghilterra','Londra'),
('AFR','AirFrance','Francia','Parigi'),
('LH','Lufthansa','Germania','Berlino');

INSERT INTO VOLI VALUES
('AFR192', 'Parigi', 'New York', '2021-12-10 20:00:00', '2021-12-10 05:30:00', 500, 'AFR'),
('EZY231', 'Roma', 'Bruxelles', '2021-11-15 08:00:00', '2021-11-15 13:00:00', 250, 'EZY'),
('EZY321', 'Parigi', 'Francoforte', '2021-05-30 09:30:00', '2021-05-30 12:00:00', 300, 'EZY'),
('IT34', 'Milano', 'Palermo', '2023-12-10 09:00:00', '2023-12-10 10:15:00', 250, 'IT'),
('IT35', 'Milano', 'Palermo', '2023-10-16 07:30:00', '2023-10-16 08:45:00', 300, 'IT'),
('IT47', 'Milano', 'Palermo', '2023-07-11 20:00:00', '2023-07-11 22:00:00', 200, 'IT'),
('IT7', 'Milano', 'Palermo', '2023-07-11 08:00:00', '2023-07-11 10:00:00', 200, 'IT'),
('LH231', 'Monaco', 'Seoul', '2022-07-15 20:00:00', '2022-07-15 06:00:00', 400, 'LH');

INSERT INTO PERSONALE VALUES 
(1,'Paolo','Morelli','1988-12-03 00:00:00','Tecnico','Meccanico','p.morelli@roadtrip.it','$2y$10$USPRZZJY4/4gF1CCRk3FBO0eJIH5evkUE6019wjkmJLl04t/kzCG6'),
(2,'Carlo','Remigi','1988-08-02 00:00:00','Assistente','Assistente Volo', 'c.remigi@roadtrip.it','$2y$10$ejArp8wRB5T44dTdHt0zYux8OynSZQmelaJVVxvxC7mOJc5fXbEB.'),
(3,'Carla','Milli','1989-05-11 00:00:00','Tecnico','Meccanico','c.milli@roadtrip.it','$2y$10$CotfCiJylU12fPLX2jZozezqENT/E4Mxnu0LfQg16lliNF25z8h2S'),
(4,'Giulia','Paoli','1993-06-30 00:00:00','Assistente','Assistente Volo','g.paoli@roadtrip.it','$2y$10$SC/7jYxpzSIX/iRZWnwBsuqpP0RfUlZapdd7xRgwQUsyLuR6LZTaG');
