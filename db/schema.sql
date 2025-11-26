CREATE DATABASE IF NOT EXISTS klo_oor_db;
USE klo_oor_db;

CREATE TABLE employees (
   id INT NOT NULL PRIMARY KEY,
   name VARCHAR(30) NOT NULL,
   email VARCHAR(40) NOT NULL,
   phone VARCHAR(15) NOT NULL,
   department VARCHAR(30) NOT NULL,
   password VARCHAR(30) NOT NULL
);

CREATE TABLE calls (
   id INT NOT NULL PRIMARY KEY,
   employee_id INT,
   created_at DATETIME NOT NULL,
   status ENUM("CLOSED", "OPEN"),
   equipament_name VARCHAR(50) NOT NULL,
   equipament_number VARCHAR(30),
   description TEXT NOT NULL,

   FOREIGN KEY (employee_id) REFERENCES employees(id)
);