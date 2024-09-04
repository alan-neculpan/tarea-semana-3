-- Crear la base de datos
CREATE DATABASE firma_abogados_db;

-- Seleccionar la base de datos
USE firma_abogados_db;

-- Crear la tabla "clientes"
CREATE TABLE clientes (
  id_cliente INT AUTO_INCREMENT,
  rut VARCHAR(12) NOT NULL,
  nombre VARCHAR(50) NOT NULL,
  apellido VARCHAR(50) NOT NULL,
  direccion VARCHAR(100) NOT NULL,
  correo_electronico VARCHAR(100) NOT NULL,
  telefono VARCHAR(20) NOT NULL,
  numero_caso INT NOT NULL,
  descripcion_caso TEXT NOT NULL,
  fecha_inicio DATE NOT NULL,
  estado_caso VARCHAR(20) NOT NULL,
  descripcion_sentencia TEXT,
  fecha_cierre DATE,
  PRIMARY KEY (id_cliente)
);