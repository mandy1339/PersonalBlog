<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/Data/post_data_service.php');
class BlogPost 
{
    private $ID;
    private $Title;
    private $CreatedDate;
    private $ModifiedDate;
    private $Content;
    private $UserID;

    public function __construct($ID, $Title, $CreatedDate, $ModifiedDate, $Content, $UserID)
    {
        $this->ID = $ID;
        $this->Title = $Title;
        $this->CreatedDate = $CreatedDate;
        $this->ModifiedDate = $ModifiedDate;
        $this->Content = $Content;
        $this->UserID = $UserID;
    }

    # It receives the ID of the blog post to get from the database. Constructs new BlogPost object with given ID
    # and data from the database and returns it.
    public static function getBlogPostByID($blog_id)
    {
        return BlogPostDataService::get_blog_post_by_id_service($blog_id);
    }

    public function getID() 
    {
        return $this->ID;
    }

    public function getTitle()
    {
        return $this->Title;
    }

    public function getCreatedDate()
    {
        return $this->CreatedDate;
    }
    public function getModifiedDate()
    {
        return $this->ModifiedDate;
    }
    public function getContent()
    {
        return $this->Content;
    }
    public function getUserID()
    {
        return $this->UserID;
    }

    # Adds a new blog to the database and returns the ID of the newly inserted record
    public static function addNewBlogPost($title, $content, $userid)
    {
        return BlogPostDataService::add_new_blog_post_service($title, $content, $userid);
    }

    public static function getAllBlogPosts()
    {
        return BlogPostDataService::get_all_blog_posts_service();
    }

    public static function deleteBlogPost($blog_id)
    {
        BlogPostDataService::delete_blog_post_service($blog_id);
    }

    public static function editBlogPost($blog_id, $title, $content)
    {
        BlogPostDataService::edit_blog_post_service($blog_id, $title, $content);
    }
}

?>