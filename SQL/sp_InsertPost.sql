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