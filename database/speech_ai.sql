CREATE DATABASE speech_ai
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE speech_ai;

CREATE TABLE proyectos (
    id_proyecto INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(200) NOT NULL,
    carrera VARCHAR(150),
    descripcion TEXT,
    objetivo TEXT,
    metodologia TEXT,
    tecnologias TEXT,
    resultados TEXT,
    conclusiones TEXT,
    tipo_proyecto VARCHAR(100),
    nivel_dificultad VARCHAR(30),
    tiempo_exposicion INT,
    fecha_registro DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE sesiones (
    id_sesion INT AUTO_INCREMENT PRIMARY KEY,
    id_proyecto INT NOT NULL,
    duracion INT DEFAULT 0,
    transcripcion LONGTEXT,
    cantidad_palabras INT DEFAULT 0,
    cantidad_muletillas INT DEFAULT 0,
    cantidad_pausas INT DEFAULT 0,
    palabras_por_minuto DECIMAL(8,2) DEFAULT 0,
    retroalimentacion TEXT,
    fecha DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_proyecto)
        REFERENCES proyectos(id_proyecto)
);

CREATE TABLE respuestas_simulador (
    id_respuesta INT AUTO_INCREMENT PRIMARY KEY,
    id_sesion INT NOT NULL,
    pregunta TEXT NOT NULL,
    perfil_sinodal VARCHAR(50),
    respuesta LONGTEXT,
    evaluacion TEXT,
    recomendaciones TEXT,
    FOREIGN KEY (id_sesion)
        REFERENCES sesiones(id_sesion)
);