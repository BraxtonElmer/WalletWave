# WalletWave
WalletWave is a financial management website, which is used to track your income / expenses.

# SQL CONFIGURATIONS:

CREATE DATABASE walletwave;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255),
    income_range VARCHAR(50),
    bank_name VARCHAR(255),
    account_number VARCHAR(20),
    password VARCHAR(255),
    income VARCHAR(50) DEFAULT '0',
    expense VARCHAR(50) DEFAULT '0',
    balance VARCHAR(50) DEFAULT '0'
);


CREATE TABLE transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_email VARCHAR(255),
    transaction_type VARCHAR(50),
    amount DECIMAL(10, 2),
    transaction_date DATE,
    bank_account VARCHAR(255)
);



CREATE TABLE reminder (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_email VARCHAR(255),
    category VARCHAR(255),
    amount DECIMAL(10, 2),
    description VARCHAR(255),
    datelas VARCHAR(255)
);
