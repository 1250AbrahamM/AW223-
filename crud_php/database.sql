CREATE DATABASE IF NOT EXISTS crud_xampp
  CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE crud_xampp;

CREATE TABLE IF NOT EXISTS productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion VARCHAR(255) NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    cantidad INT NOT NULL,
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO productos (nombre, descripcion, precio, cantidad) VALUES
('Teclado', 'Teclado USB', 250.00, 10),
('Mouse', 'Mouse óptico', 150.00, 20);
