<?php
/**
 * Class: Users
 *
 * User klasinn, birtir profile-a
 *
 */
class Follows
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
     * Fylgja / follow notenda
     *
     * @param $userid = notendi sem triggerar functionið
     * @param $following_userid = sá sem er verið að followa
     *
    */
    public function followUser($user_id, $following_userid)
    {
      if ($this->isFollowing($user_id, $following_userid)) {
        $this->registerFollow($user_id, $following_userid);
      }
      else {
        $this->isFollowing($user_id, $following_userid);
      }
    }

    public function registerFollow($user_id, $following_userid)
    {
      $sql = 'INSERT INTO followers(user_id, following_userid)
            VALUES(:userid, :followinguser)';
      $parameters = array(':userid'=>$user_id,
                          ':followinguser'=>$following_userid);
      $query = $this->db->prepare($sql);
      $query->execute($parameters);
    }

    public function removeFollow($user_id, $following_userid)
    {
      $sql = 'DELETE FROM followers
              WHERE user_id = :userid
              AND following_userid = :followinguser';
              $parameters = array(':userid'=>$user_id,
                                  ':followinguser'=>$following_userid);
      $query = $this->db->prepare($sql);
      $query->execute($parameters);
    }

    /**
     *
     * Sjá hvort það sé búið að skrásetja follow
     * @param
     *
    */
    public function isFollowing($user_id, $following_userid)
    {
      $sql = 'SELECT user_id, following_userid
              FROM followers
              WHERE user_id = :userid
              AND following_userid = :followinguser';
      $query = $this->db->prepare($sql);
      $parameters = array(':userid' => $user_id, 'followinguser' => $following_userid);
      $query->execute($parameters);
      $userRow=$query->fetch(PDO::FETCH_ASSOC);
      // Sjá hvort að það sé eitthvað follow með þessu user_id
      if($query->rowCount() > 0)
      {
        return false;
      }
      else {
        return true;
      }
    }

    public function getFollowersInfo($user_id)
    {
      $sql = 'SELECT *
              FROM followers
              WHERE user_id = :userid';
      $query = $this->db->prepare($sql);
      $parameters = array(':userid' => $user_id);
      $query->execute($parameters);

      return $query->fetchAll();
    }

}
