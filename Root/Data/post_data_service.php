<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/Data/db_util.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Model/blogpost_class.php');

class BlogPostDataService
{
    # Adds a new blog to the database and returns the ID of the newly inserted record
    static function add_new_blog_post_service($title, $content, $userid)
    {
        # connect to the database
        $conn = DBUtil::get_db_connection();
        
        # create the sql string for the query
        $sql = <<<SQL
                CALL sp_InsertPost(@inserted_id,?,?,?)
SQL;

        # prepare a statement
        $stmt = $conn->prepare($sql);

        # bind parameters to the statement
        $stmt->bind_param("ssi", $title, $content, $userid);

        # execute the statement
        $stmt->execute();
        
        # store the result from the executed statement
        $stmt->close();

        # get the id of the inserted blog post
        $output = $conn->query("SELECT @inserted_id AS inserted_id");

        # get the first row from the result set
        $RS = $output->fetch_assoc();
        
        $conn->close();

        # access the data from the fields in the fetched row
        return $RS['inserted_id'];
        
    }

    # Return array with all blog posts
    static function get_all_blog_posts_service()
    {
        # connect to the database
        $conn = DBUtil::get_db_connection();

        # create the sql string for the query
        $sql = <<<SQL
                SELECT
                    ID,
                    Title,
                    CreatedDate,
                    ModifiedDate,
                    Content,
                    UserID
                FROM
                    POST
                ORDER BY
                    ID DESC
SQL;

        # prepare a statement
        $stmt = $conn->prepare($sql);        

        # execute the statement
        $stmt->execute();
        
        # store the result from the executed statement
        $result = ($stmt->get_result());        

        $array_of_blog_posts = array();

        while ($row = $result->fetch_assoc())
        {
            $blog_post = new BlogPost($row['ID'], $row['Title'],$row['CreatedDate'],$row['ModifiedDate'],$row['Content'],$row['UserID']);
            array_push($array_of_blog_posts, $blog_post);
        }               
        
        $conn->close();
        
        # return the array of blog posts
        return $array_of_blog_posts;
    }


    static function get_blog_post_by_id_service($blog_id) 
    {
        # connect to the database
        $conn = DBUtil::get_db_connection();

        # create the sql string for the query
        $sql = <<<SQL
            SELECT 
                ID,
                Title,
                CreatedDate,
                ModifiedDate,
                Content,
                UserID
            FROM 
                POST
            WHERE 
                ID = ?
SQL;        
 
        # prepare a statement
        $stmt = $conn->prepare($sql);    
 
        # bind params
        $stmt->bind_param("i", $blog_id);

        # execute the statement & fetch row
        $stmt->execute();
        $row = ($stmt->get_result())->fetch_assoc();
    
        # return single blog post fetched from the db
        $blog_post = new BlogPost($row['ID'], $row['Title'],$row['CreatedDate'],$row['ModifiedDate'],$row['Content'],$row['UserID']);

        $conn->close();        
        return $blog_post;
    }

    static function edit_blog_post_service ($blog_id, $title, $content) 
    {
        $conn = DBUtil::get_db_connection();
        $sql = <<<SQL
            CALL sp_EditBlogPost(?,?,?) 
SQL;
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iss", $blog_id, $title, $content);
        $stmt->execute();
        $conn->close();
    }

    static function delete_blog_post_service($blog_id) 
    {
        $conn = DBUtil::get_db_connection();
        $sql = <<<SQL
            CALL sp_DeleteBlogPost(?) 
SQL;
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $blog_id);
        $stmt->execute();
        $conn->close();        
    }
}


?>