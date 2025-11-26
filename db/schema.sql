CREATE DATABASE IF NOT EXISTS klo_oor_db;
USE klo_oor_db;

CREATE TABLE employees (
   id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
   name VARCHAR(30) NOT NULL,
   email VARCHAR(40) NOT NULL,
   phone VARCHAR(15) NOT NULL,
   department VARCHAR(30) NOT NULL,
   password VARCHAR(30) NOT NULL
);

CREATE TABLE calls (
   id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
   employee_id INT,
   created_at DATETIME NOT NULL,
   status ENUM("CLOSED", "OPEN"),
   equipament_name VARCHAR(50) NOT NULL,
   equipament_number VARCHAR(30),
   description TEXT NOT NULL,

   FOREIGN KEY (employee_id) REFERENCES employees(id)
);

INSERT INTO employees (name, email, phone, department, password) VALUES
('Alice Silva', 'alice.silva@email.com', '11999998888', 'TI', 'senha123'),
('Bruno Costa', 'bruno.costa@email.com', '11988887777', 'Suporte', 'senha456');

INSERT INTO calls (employee_id, created_at, status, equipament_name, equipament_number, description) VALUES
(1, '2025-11-26 09:00:00', 'OPEN', 'Notebook Dell', 'EQ123', 'Problema na tela'),
(1, '2025-11-26 10:30:00', 'CLOSED', 'Impressora HP', 'EQ124', 'Falha de impressão'),
(2, '2025-11-26 11:00:00', 'OPEN', 'Desktop Lenovo', 'EQ125', 'Não liga'),
(2, '2025-11-26 14:15:00', 'CLOSED', 'Monitor Samsung', 'EQ126', 'Tela piscando');