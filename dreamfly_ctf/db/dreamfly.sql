-- Dreamfly DB schema for CTF
CREATE DATABASE IF NOT EXISTS dreamfly_db; 
USE dreamfly_db;

DROP TABLE IF EXISTS users;
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) NOT NULL,
  password VARCHAR(100) NOT NULL,
  role VARCHAR(20) NOT NULL DEFAULT 'student',
  full_name VARCHAR(255)
);

DROP TABLE IF EXISTS invoices;
CREATE TABLE invoices (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  invoice_no VARCHAR(50),
  amount VARCHAR(50),
  status VARCHAR(50)
);

DROP TABLE IF EXISTS feedback;
CREATE TABLE feedback (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user VARCHAR(100),
  category VARCHAR(100),
  message TEXT,
  created_at DATETIME
);

DROP TABLE IF EXISTS admin_tokens;
CREATE TABLE admin_tokens (
  id INT AUTO_INCREMENT PRIMARY KEY,
  secret_token VARCHAR(255)
);

-- Seed users
INSERT INTO users (username, password, role, full_name) VALUES
('john_doe', 'user123', 'student', 'John Doe'),
('admin', 'adminpass', 'admin', 'Site Administrator');

-- Seed invoices: admin invoice id 1000 must match file invoice_1000.txt
INSERT INTO invoices (id, user_id, invoice_no, amount, status) VALUES
(1000, 2, 'ADM-1000', '0.00', 'CONFIDENTIAL'),
(1001, 1, 'STD-1001', '1500.00', 'UNPAID');

-- Seed admin token (SQLi flag)
INSERT INTO admin_tokens (secret_token) VALUES
('FLAG{SQL1_4DM1N_T0K3N_3XTR4CT10N}');
