-- CREACIÓN BASE DE DATOS

CREATE DATABASE edutracer
CHARACTER SET utf8mb4
COLLATE utf8mb4_spanish_ci;

-----------------------------------------------------------------------------

CREATE TABLE estudiantes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    documento VARCHAR(50),
    grado VARCHAR(20),
    correo_acudiente VARCHAR(100)
);

--------------------------------------------------------------------------------

CREATE TABLE notas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    estudiante_id INT,
    materia VARCHAR(50),
    nota DECIMAL(5,2),
    FOREIGN KEY (estudiante_id) REFERENCES estudiantes(id)
);