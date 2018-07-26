
/*Creates and initialize expenses MySQL database db_expenses if does not exist*/

CREATE DATABASE IF NOT EXISTS db_expenses;
USE db_expenses;
/* Create users table */
CREATE TABLE users(
    id INT NOT NULL AUTO_INCREMENT,
    user VARCHAR(99),
    email VARCHAR(99),
    password VARCHAR(99),
    PRIMARY KEY(id) 
);
/* Default values */
INSERT INTO users(id, user, email, password) VALUES
    (1,'Michael','user1@lanhm.com','Welcome123'),
    (2,'Steve','user2@lanhm.com','Welcome123'),
    (3,'Sara','user3@lanhm.com','Welcome123');
/* Create expenses table */
CREATE TABLE expenses(
    id INT NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    name VARCHAR(99),
    /* Set timestamp to default current date/time */
    date DATETIME default CURRENT_TIMESTAMP, 
    amount VARCHAR(99),
    category VARCHAR(99),
    PRIMARY KEY(id),
    /* References user_id for expense */
    FOREIGN KEY(user_id) REFERENCES users(id)
);
/* Default values */
INSERT INTO expenses(user_id, name, amount, category) VALUES
    ('1','Expense 1','50.00','Exhibit 1'),
    ('2','Expense 2','60.00','Exhibit 2'),
    ('3','Expense 3','70.00','Exhibit 3');



