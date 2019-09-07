-- -----------------------------------------------------
-- Database
-- -----------------------------------------------------
CREATE DATABASE aerolinea;
GO
USE aerolinea;

-- -----------------------------------------------------
-- Table Pais
-- -----------------------------------------------------
CREATE TABLE Pais (
  idPais INT NOT NULL,
  nombre VARCHAR(45) NULL,
  nombreCorto VARCHAR(45) NULL,
  PRIMARY KEY (idPais));


-- -----------------------------------------------------
-- Table Persona
-- -----------------------------------------------------
CREATE TABLE Persona (
  idPersona INT NOT NULL,
  pNombre VARCHAR(45) NULL,
  sNombre VARCHAR(45) NULL,
  pApellido VARCHAR(45) NULL,
  sApellido VARCHAR(45) NULL,
  correoElectronico VARCHAR(45) NULL,
  direccion VARCHAR(200) NULL,
  numeroIdentidad VARCHAR(45) NOT NULL UNIQUE,
  Pais_idPais INT NOT NULL,
  PRIMARY KEY (idPersona),
  CONSTRAINT fk_Persona_Pais1
    FOREIGN KEY (Pais_idPais)
    REFERENCES Pais (idPais)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table Telefono
-- -----------------------------------------------------
CREATE TABLE Telefono (
  idTelefono INT NOT NULL,
  numeroTelefono VARCHAR(45) NULL,
  estado VARCHAR(45) NULL,
  persona_idpersona INT NOT NULL,
  PRIMARY KEY (idTelefono),
  CONSTRAINT fk_telefono_persona
    FOREIGN KEY (persona_idpersona)
    REFERENCES Persona (idPersona)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table Pasajero
-- -----------------------------------------------------
CREATE TABLE Pasajero (
  idPasajero INT NOT NULL,
  fechaRegistro DATETIME NULL,
  persona_idpersona INT NOT NULL,
  PRIMARY KEY (idPasajero),
  CONSTRAINT fk_pasajero_persona1
    FOREIGN KEY (persona_idpersona)
    REFERENCES Persona (idPersona)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table Avion
-- -----------------------------------------------------
CREATE TABLE Avion (
  idAvion INT NOT NULL,
  capacidad INT NULL,
  descripcion VARCHAR(45) NULL,
  tiempoVuelo FLOAT NULL,
  PRIMARY KEY (idAvion));


-- -----------------------------------------------------
-- Table Asiento
-- -----------------------------------------------------
CREATE TABLE Asiento (
  idAsiento INT NOT NULL,
  numeroAsiento VARCHAR(45) NULL,
  ubicacion VARCHAR(45) NULL,
  fechaUltimoMantenimiento DATETIME NULL,
  Avion_idAvion INT NOT NULL,
  PRIMARY KEY (idAsiento),
  CONSTRAINT fk_Asiento_Avion1
    FOREIGN KEY (Avion_idAvion)
    REFERENCES Avion (idAvion)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table Piloto
-- -----------------------------------------------------
CREATE TABLE Piloto (
  idPiloto INT NOT NULL,
  fechaIngreso DATETIME NULL,
  cantidadHorasVuelo FLOAT NULL,
  Persona_idPersona INT NOT NULL,
  PRIMARY KEY (idPiloto),
  CONSTRAINT fk_Piloto_Persona1
    FOREIGN KEY (Persona_idPersona)
    REFERENCES Persona (idPersona)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table TipoClase
-- -----------------------------------------------------
CREATE TABLE TipoClase (
  idTipoClase INT NOT NULL,
  descripcion VARCHAR(45) NULL,
  numeroMaletaPermitida INT NULL,
  PRIMARY KEY (idTipoClase));


-- -----------------------------------------------------
-- Table Aeropuerto
-- -----------------------------------------------------
CREATE TABLE Aeropuerto (
  idAeropuerto INT NOT NULL,
  codigoInterno VARCHAR(45) NOT NULL UNIQUE,
  nombre VARCHAR(45) NULL,
  Pais_idPais INT NOT NULL,
  PRIMARY KEY (idAeropuerto),
  CONSTRAINT fk_Aeropuerto_Pais1
    FOREIGN KEY (Pais_idPais)
    REFERENCES Pais (idPais)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table Terminal
-- -----------------------------------------------------
CREATE TABLE Terminal (
  idTerminal INT NOT NULL,
  codigoTerminal VARCHAR(45) NOT NULL UNIQUE,
  descripcion VARCHAR(45) NULL,
  Aeropuerto_idAeropuerto INT NOT NULL,
  PRIMARY KEY (idTerminal),
  CONSTRAINT fk_Terminal_Aeropuerto1
    FOREIGN KEY (Aeropuerto_idAeropuerto)
    REFERENCES Aeropuerto (idAeropuerto)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table Puerta
-- -----------------------------------------------------
CREATE TABLE Puerta (
  idPuerta INT NOT NULL,
  codigoPuerta VARCHAR(45) NULL,
  nombre VARCHAR(45) NULL,
  Terminal_idTerminal INT NOT NULL,
  PRIMARY KEY (idPuerta),
  CONSTRAINT fk_Puerta_Terminal1
    FOREIGN KEY (Terminal_idTerminal)
    REFERENCES Terminal (idTerminal)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table Vuelo
-- -----------------------------------------------------
CREATE TABLE Vuelo (
  idVuelo INT NOT NULL,
  cantidadEscala INT NULL,
  horaFechaSalida DATETIME NULL,
  horaFechaLlegada DATETIME NULL,
  Piloto_idPiloto INT NOT NULL,
  Avion_idAvion INT NOT NULL,
  TipoClase_idTipoClase INT NOT NULL,
  idPuertaOrigen INT NOT NULL,
  idPuertaDestino INT NOT NULL,
  PRIMARY KEY (idVuelo),
  CONSTRAINT fk_vuelo_Piloto1
    FOREIGN KEY (Piloto_idPiloto)
    REFERENCES Piloto (idPiloto)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_vuelo_Avion1
    FOREIGN KEY (Avion_idAvion)
    REFERENCES Avion (idAvion)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_Vuelo_TipoClase1
    FOREIGN KEY (TipoClase_idTipoClase)
    REFERENCES TipoClase (idTipoClase)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_Vuelo_Puerta1
    FOREIGN KEY (idPuertaOrigen)
    REFERENCES Puerta (idPuerta)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_Vuelo_Puerta2
    FOREIGN KEY (idPuertaDestino)
    REFERENCES Puerta (idPuerta)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table Empleado
-- -----------------------------------------------------
CREATE TABLE Empleado (
  idEmpleado INT NOT NULL,
  fechaContratacion DATETIME NULL,
  Persona_idPersona INT NOT NULL,
  PRIMARY KEY (idEmpleado),
  CONSTRAINT fk_Empleado_Persona1
    FOREIGN KEY (Persona_idPersona)
    REFERENCES Persona (idPersona)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table Boleto
-- -----------------------------------------------------
CREATE TABLE Boleto (
  idBoleto INT NOT NULL,
  fechaEmision DATETIME NULL,
  precioCompra MONEY NULL,
  Asiento_idAsiento INT NOT NULL,
  vuelo_idvuelo INT NOT NULL,
  TipoClase_idTipoClase INT NOT NULL,
  Pasajero_idPasajero INT NOT NULL,
  totalPrecioBoleto MONEY NULL,
  Empleado_idEmpleado INT NOT NULL,
  PRIMARY KEY (idBoleto),
  CONSTRAINT fk_Boleto_Asiento1
    FOREIGN KEY (Asiento_idAsiento)
    REFERENCES Asiento (idAsiento)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_Boleto_vuelo1
    FOREIGN KEY (vuelo_idvuelo)
    REFERENCES Vuelo (idVuelo)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_Boleto_TipoClase1
    FOREIGN KEY (TipoClase_idTipoClase)
    REFERENCES TipoClase (idTipoClase)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_Boleto_Pasajero1
    FOREIGN KEY (Pasajero_idPasajero)
    REFERENCES Pasajero (idPasajero)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_Boleto_Empleado1
    FOREIGN KEY (Empleado_idEmpleado)
    REFERENCES Empleado (idEmpleado)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table Equipaje
-- -----------------------------------------------------
CREATE TABLE Equipaje (
  idEquipaje INT NOT NULL,
  descripcion VARCHAR(45) NULL,
  peso FLOAT NULL,
  alto FLOAT NULL,
  ancho FLOAT NULL,
  profundidad FLOAT NULL,
  TipoClase_idTipoClase INT NULL,
  Boleto_idBoleto INT NULL,
  PRIMARY KEY (idEquipaje),
  CONSTRAINT fk_Equipaje_TipoClase1
    FOREIGN KEY (TipoClase_idTipoClase)
    REFERENCES TipoClase (idTipoClase)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_Equipaje_Boleto1
    FOREIGN KEY (Boleto_idBoleto)
    REFERENCES Boleto (idBoleto)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table PrecioVuelo
-- -----------------------------------------------------
CREATE TABLE PrecioVuelo (
  idPrecioVuelo INT NOT NULL,
  precio MONEY NULL,
  fechaInicio DATETIME NULL,
  fechaFin DATETIME NULL,
  Vuelo_idVuelo INT NOT NULL,
  PRIMARY KEY (idPrecioVuelo),
  CONSTRAINT fk_PrecioVuelo_Vuelo1
    FOREIGN KEY (Vuelo_idVuelo)
    REFERENCES Vuelo (idVuelo)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table Escala
-- -----------------------------------------------------
CREATE TABLE Escala (
  idEscala INT NOT NULL,
  fechaHoraSalida DATETIME NULL,
  fechaHoraLlegada DATETIME NULL,
  Vuelo_idVuelo INT NOT NULL,
  idPuertaOrigen INT NOT NULL,
  idPuertaDestino INT NOT NULL,
  PRIMARY KEY (idEscala),
  CONSTRAINT fk_Escala_Vuelo1
    FOREIGN KEY (Vuelo_idVuelo)
    REFERENCES Vuelo (idVuelo)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_Escala_Puerta1
    FOREIGN KEY (idPuertaOrigen)
    REFERENCES Puerta (idPuerta)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_Escala_Puerta2
    FOREIGN KEY (idPuertaDestino)
    REFERENCES Puerta (idPuerta)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table FormaPago
-- -----------------------------------------------------
CREATE TABLE FormaPago (
  idFormaPago INT NOT NULL,
  descripcion VARCHAR(45) NULL,
  PRIMARY KEY (idFormaPago));


-- -----------------------------------------------------
-- Table FormaPago_has_Boleto
-- -----------------------------------------------------
CREATE TABLE FormaPago_has_Boleto (
  FormaPago_idFormaPago INT NOT NULL,
  Boleto_idBoleto INT NOT NULL,
  PRIMARY KEY (FormaPago_idFormaPago, Boleto_idBoleto),
  CONSTRAINT fk_FormaPago_has_Boleto_FormaPago1
    FOREIGN KEY (FormaPago_idFormaPago)
    REFERENCES FormaPago (idFormaPago)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_FormaPago_has_Boleto_Boleto1
    FOREIGN KEY (Boleto_idBoleto)
    REFERENCES Boleto (idBoleto)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
