<?php
/**
 * Class: Posts
 *
 * User klasinn, birtir profile-a
 *
 */
class Posts
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

    /**
     *
     * Sækja alla pósta
     * @param filter: skilgreinir röðina á póstum
     *
    */
    public function getHomeFeed()
    {
          $sql = 'SELECT * FROM posts
                  INNER JOIN users
                  ON posts.user_id = users.user_id
                  ORDER BY posts.date_created DESC';
          $query = $this->db->prepare($sql);
          $query->execute();

          return $query->fetchAll();
      }


    /**
     *
     * Bæta við póst
     * @param
     *
    */
    public function addNewPost($content, $userid, $postid, $pic)
    {
      $sql = 'INSERT INTO posts(content, user_id, post_id, pic)
              VALUES (:content, :user_id, :postid, :pic)';
      $parameters = array(':content'=>$content,
                          ':user_id'=>$userid,
                          ':postid'=>$postid,
                          ':pic'=>$pic);

      $query = $this->db->prepare($sql);
      $query->execute($parameters);
    }


    /**
     *
     * Bæta við póst
     * @param
     *
    */
    public function removePost($postid)
    {
      $sql = 'DELETE FROM posts
              WHERE post_id=:postid';
      $parameters = array(':postid'=>$postid);
      $query = $this->db->prepare($sql);
      $query->execute($parameters);

    }

    /**
     *
     * Búa til 4 stafa random id
     * @param
     *
    */
    public function generatePostId()
    {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $postId = '';
      for ($i = 0; $i < 4; $i++) {
          $postId .= $characters[rand(0, $charactersLength - 1)];
      }
      return $postId;
    }


}
