/* 
	AT :: 2/16/2023
	This script is intended to deploy a brand new database with 
	the database objects required for my personal blog

*/

-- Create database
CREATE DATABASE PersonalBlog;


-- Use the database
USE PersonalBlog;


-- Create Users table
CREATE TABLE USERS(
	ID INT PRIMARY KEY AUTO_INCREMENT,
    UserName NVARCHAR(50) NOT NULL UNIQUE,
    Password NVARCHAR(500) NOT NULL
);


-- Create Blog Post table
CREATE TABLE POST(
	ID INT PRIMARY KEY AUTO_INCREMENT,
    Title NVARCHAR(250) NULL,
    CreatedDate DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
    ModifiedDate DATETIME ON UPDATE CURRENT_TIMESTAMP,
    Content TEXT NOT NULL,
    UserID INT NOT NULL,
    FOREIGN KEY FK_POST_USERS (UserID) REFERENCES USERS(ID)
);


-- Create procedure to insert new blog post
DELIMITER $$
CREATE PROCEDURE sp_InsertPost
(
	OUT PKEY INT,
    IN Title NVARCHAR(250),
    IN Content TEXT,
    IN UserID INT
)
BEGIN
	INSERT INTO POST (Title, Content, UserID) VALUES
    (Title, Content, UserID);    
    
    SELECT LAST_INSERT_ID() INTO PKEY;
END$$
DELIMITER ;
