CREATE TABLE iniciativas(
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `codigo`varchar(16) UNIQUE,
    `nombre` varchar(512),
    `ndc` varchar(32),
    `meta_anual`decimal(5,2),
    `escenario` tinyint(1),
    `linea_accion` varchar(512),
    `componente`varchar(512),
    `objetivo_desarrollo` varchar(512),
    `sector`varchar(32),
    `estado` BOOLEAN DEFAULT TRUE,
    `fecha_registro` TIMESTAMP NOT NULL DEFAULT current_timestamp(), 
    PRIMARY KEY(`id`) 
)ENGINE=InnoDB;

ALTER TABLE iniciativas
ADD COLUMN ndc varchar(255) AFTER nombre;