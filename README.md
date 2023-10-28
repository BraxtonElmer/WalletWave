This is a project which me and my teamates did for a Hackathon from scratch in a few hours.

# WalletWave
WalletWave is a financial management website, which is used to track your income / expenses with date, set reminders for bills, taxes due and so on.

# Features

- Income Tracking with date
- Expense Tracking with date
- Set reminders for bill dues or other Payments.
- View Balance available'
- Actively plan and manage your expenses

# Getting Started:

Download [XAMPP](https://www.apachefriends.org/download.html) or any other Apache provider<br>
Make sure you install php and mysql<br>
drop the repo files in ```C://XAMPP/htdocs/``` (or any other place you installed)<br>
open XAMPP, select start apache and start mysql.<br>
type `localhost` in browser.<br>
NOTE: DO SQL CONFIG FOR THE PHP TO WORK<br>
open `localhost/phpmyadmin` in a browser.<br>
and follow the below steps:

## AUTOMATIC SQL CONFIG:

Open SQL Command interface in phpmyadmin

```CREATE DATABASE `walletwave`;```

import the walletwave.sql file in the main folder.

## MANUAL SQL CONFIGURATIONS:

```
CREATE DATABASE walletwave;
```

```
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
```


# CONTRIBUTORS
Braxton Elmer A<br>
Vishwaa R<br>
Vikraman SP<br>
