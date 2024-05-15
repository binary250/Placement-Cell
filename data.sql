CREATE TABLE participants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    enrollment_number VARCHAR(20),
    department VARCHAR(100),
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    resume VARCHAR(255),
    applied_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

