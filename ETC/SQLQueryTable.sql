CREATE DATABASE palhome;
USE palhome;


CREATE TABLE pet_adoptions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pet_image VARCHAR(255),
    species VARCHAR(50),
    post_creator VARCHAR(100),
    pet_name VARCHAR(100),
    gender_breed VARCHAR(100),
    age INT,
    link_redirectory VARCHAR(255),
    additional_content TEXT
);


CREATE TABLE missing_pets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    species VARCHAR(100) NOT NULL,
    post_creator VARCHAR(100) NOT NULL,
    contact_detail VARCHAR(255) NOT NULL,
    pet_name VARCHAR(100) NOT NULL,
    gender_breed VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    link_redirect VARCHAR(255),
    additional_content TEXT,
    pet_image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
