CREATE TABLE register (
    id_register INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(150),
    password VARCHAR(255),
    created_at DATETIME
);
