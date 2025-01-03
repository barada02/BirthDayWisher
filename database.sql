-- Create the database
CREATE DATABASE IF NOT EXISTS birthday_wisher;

-- Use the database
USE birthday_wisher;

-- Create users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE KEY unique_email (email)
);

-- Create sent_cards table for tracking sent birthday cards
CREATE TABLE IF NOT EXISTS sent_cards (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sender_id INT NOT NULL,
    recipient_name VARCHAR(100) NOT NULL,
    recipient_email VARCHAR(100) NOT NULL,
    template_used VARCHAR(50) NOT NULL,
    message TEXT,
    sent_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (sender_id) REFERENCES users(id)
);
