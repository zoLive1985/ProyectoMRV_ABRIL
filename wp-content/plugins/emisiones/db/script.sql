CREATE TABLE emisiones(
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `id_iniciativa` int(11) NOT NULL,
    `nombre_iniciativa` VARCHAR(512),
    `anio` int(10),
    `provincia` VARCHAR(512),
    `finca`VARCHAR(16),
    `producto` VARCHAR(16),
    `metano_enterica` DECIMAL(10,2),
    `metano_excretas`DECIMAL(10,2),
    `N2O_excretas`DECIMAL(10,2),
    `N2O_pasturas` DECIMAL(10,2),
    `total_emisiones` DECIMAL(10,2),
    `leche`DECIMAL(10,2),
    `carne` DECIMAL(10,2),
    `IE_leche`DECIMAL(10,2),
    `IE_carne` DECIMAL(10,2),
    `estado` VARCHAR(11),
    `fecha_registro` TIMESTAMP NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY(`id`),
    CONSTRAINT FK_emisiones_iniciativas FOREIGN KEY(id_iniciativa) REFERENCES iniciativas(id)
    ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB;

UPDATE emisiones e
JOIN iniciativas i ON e.id_iniciativa = i.id
SET e.nombre_iniciativa = i.nombre;

ALTER TABLE emisiones
ADD COLUMN estado varchar(5) AFTER IE_carne;