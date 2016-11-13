<?php
/**
 * Class: Posts
 *
 * User klasinn, birtir profile-a
 *
 */
class Likes
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
     * @param
     *
    */
    public function newLike($uid, $postid)
    {
      // Ef að það er ekki búið að likea
      if ($this->likeCheck($postid, $uid))
      {
        $this->registerLike($uid, $postid);
        $this->likeUp($postid);
      }
      // Ef það er búið að likea
      else
      {
        $this->removeLike($uid, $postid);
        $this->likeDown($postid);
      }
    }


    public function registerLike($uid, $postid)
    {
      // Skrásetja like
      $sql = 'INSERT INTO likes(post_id, user_id)
              VALUES (:postid, :userid)';
      $parameters = array(':userid'=>$uid,
                          ':postid'=>$postid);
      $query = $this->db->prepare($sql);
      $query->execute($parameters);
    }

    public function removeLike($uid, $postid)
    {
      $sql = 'DELETE FROM likes
              WHERE user_id = :userid
              AND post_id = :postid';
              $parameters = array(':userid'=>$uid,
                                  ':postid'=>$postid);
      $query = $this->db->prepare($sql);
      $query->execute($parameters);
    }


    /**
     *
     * Hækka like-ið um einn
     * @param
     *
    */
    public function likeUp($postid)
    {
      $sql = 'UPDATE posts
              SET likes_count = likes_count + 1
              WHERE post_id = :postid';
      $query = $this->db->prepare($sql);
      $parameters = array(':postid' => $postid);
      $query->execute($parameters);
    }

    /**
     *
     * Lækka like-ið um einn
     * @param
     *
    */
    public function likeDown($postid)
    {
      $sql = 'UPDATE posts
              SET likes_count = likes_count - 1
              WHERE post_id = :postid';
      $query = $this->db->prepare($sql);
      $parameters = array(':postid' => $postid);
      $query->execute($parameters);
    }

    /**
     *
     * Sjá hvort það sé búið að skrásetja like
     * @param
     *
    */
    public function likeCheck($postid, $userid)
    {
      $sql = 'SELECT user_id
              FROM likes
              WHERE user_id = :userid
              AND post_id = :postid';
      $query = $this->db->prepare($sql);
      $parameters = array(':userid' => $userid, 'postid' => $postid);
      $query->execute($parameters);
      $userRow=$query->fetch(PDO::FETCH_ASSOC);
      // Sjá hvort að það sé eitthvað like með þessu user_id
      if($query->rowCount() > 0)
      {
        return false;
      }
      else {
        return true;
      }
    }

}
