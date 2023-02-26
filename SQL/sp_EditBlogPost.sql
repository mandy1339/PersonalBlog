DELIMITER $$
CREATE PROCEDURE sp_EditBlogPost
(	
    IN Param_BlogID INT,
    IN Param_Title VARCHAR(250),
    IN Param_Content TEXT
)
BEGIN
	UPDATE
		POST
	SET
		Title = Param_Title,
		Content = Param_Content
	WHERE
		ID = Param_BlogID;
END$$
DELIMITER ;