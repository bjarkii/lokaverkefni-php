<?php
/**
 * Class: Posts
 *
 * User klasinn, birtir profile-a
 *
 */
class Comments
{
    /**
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function addNewComment($userid, $postid, $content)
    {
      $sql = 'INSERT INTO replies(user_id, post_id, content)
              VALUES (:userid, :postid, :content)';
      $parameters = array(':content'=>$content,
                          ':userid'=>$userid,
                          ':postid'=>$postid);

      $query = $this->db->prepare($sql);
      $query->execute($parameters);
    }

    public function getPostComments($postid)
    {
      $sql = 'SELECT * FROM replies
              INNER JOIN users
              ON replies.user_id = users.user_id
              ORDER BY users.date_created DESC';
      $query = $this->db->prepare($sql);
      $query->execute();

      return $query->fetchAll();
    }

}
