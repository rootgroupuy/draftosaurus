CREATE DATABASE draftosaurusDB;
USE draftosaurusDB;

CREATE TABLE Jugador (
    idJugador INT PRIMARY KEY,
    nombre VARCHAR(100),
    edad INT,
    email VARCHAR(100),
    colorPreferido VARCHAR(50)
);

CREATE TABLE Partida (
    idPartida INT PRIMARY KEY,
    fecha DATE,
    duracionMinutos INT,
    modo VARCHAR(50),
    numeroRondas INT -- Derivado (puede calcularse por lógica externa)
);

CREATE TABLE Dinosaurio (
    idDinosaurio INT PRIMARY KEY,
    tipo VARCHAR(50),
    color VARCHAR(30),
    esEspecial BOOLEAN
);

CREATE TABLE Zona (
    idZona INT PRIMARY KEY,
    nombreZona VARCHAR(50),
    restricciones VARCHAR(255)
);

CREATE TABLE TableroJugador (
    idTablero INT PRIMARY KEY AUTO_INCREMENT,
    idJugador INT,
    idPartida INT,
    FOREIGN KEY (idJugador) REFERENCES Jugador(idJugador) ON DELETE CASCADE,
    FOREIGN KEY (idPartida) REFERENCES Partida(idPartida) ON DELETE CASCADE,
    UNIQUE (idJugador, idPartida) -- Un jugador tiene un único tablero por partida
);

CREATE TABLE Turno (
    idTurno INT PRIMARY KEY,
    idPartida INT,
    numeroRonda INT,
    idJugadorActivo INT,
    FOREIGN KEY (idPartida) REFERENCES Partida(idPartida) ON DELETE CASCADE,
    FOREIGN KEY (idJugadorActivo) REFERENCES Jugador(idJugador)
);

CREATE TABLE Accion (
    idAccion INT PRIMARY KEY,
    idTurno INT,
    idJugador INT,
    idDinosaurio INT,
    idZona INT,
    fechaHora DATETIME,
    FOREIGN KEY (idTurno) REFERENCES Turno(idTurno) ON DELETE CASCADE,
    FOREIGN KEY (idJugador) REFERENCES Jugador(idJugador),
    FOREIGN KEY (idDinosaurio) REFERENCES Dinosaurio(idDinosaurio),
    FOREIGN KEY (idZona) REFERENCES Zona(idZona)
);

CREATE TABLE ResultadoPartida (
    idResultado INT PRIMARY KEY,
    idPartida INT,
    idJugador INT,
    puntajeFinal INT,
    posicionFinal INT,
    FOREIGN KEY (idPartida) REFERENCES Partida(idPartida) ON DELETE CASCADE,
    FOREIGN KEY (idJugador) REFERENCES Jugador(idJugador),
    UNIQUE (idPartida, idJugador) -- Un único resultado por jugador y partida
);