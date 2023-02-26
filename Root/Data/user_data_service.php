<?php

class UserDataService
{
    static function getUserFromDBByUserName_service($user_name)
    {
        # connect to the database
        $conn = DBUtil::get_db_connection();

        # create the sql string for the query
        $sql = <<<SQL
                SELECT
                    ID,
                    UserName,
                    Password
                FROM 
                    USERS
                WHERE
                    UserName = ?
SQL;

        # prepare a statement
        $stmt = $conn->prepare($sql);

        # bind parameters to the statement
        $stmt->bind_param("s", $user_name);

        # execute the statement
        $stmt->execute();

        # store the result from the executed statement
        $result = $stmt->get_result();

        # if there was no match, return NULL
        if ($result->num_rows == 0)
        {
            return null;
        }

        # get the first row from the result set
        $row = $result->fetch_assoc();

        # access the data from the fields in the fetched row
        $user = new User($row['ID'], $row['UserName'], $row['Password']);
        
        # close the connection
        $conn->close();

        return $user;
    }
}
?>