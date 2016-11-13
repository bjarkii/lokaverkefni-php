<?php
/**
 * Class: Users
 *
 * User klasinn, birtir profile-a
 *
 */
class Users
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
     * Ná í alla notendur
     * @param filter: skilgreinir röðina á notendum
     *
    */
    public function getAllUserProfiles()
    {
      $sql = 'SELECT * FROM users';
      $query = $this->db->prepare($sql);
      $query->execute();

      return $query->fetchAll();
    }

    /**
     *
     * Ná í ákveðinn user-profile
     * @param
     *
    */
    public function getUserProfile($uname)
    {
      $sql = 'SELECT *
              FROM users
              WHERE username = :username';
      $query = $this->db->prepare($sql);
      $parameters = array(':username' => $uname);
      $query->execute($parameters);

      return $query->fetchAll();
    }


    public function getUserPosts($user_id)
    {
      $sql = 'SELECT *
              FROM posts
              INNER JOIN users
              ON posts.user_id = users.user_id
              WHERE posts.user_id = :userid
              AND users.user_id = :userid
              ORDER BY posts.date_created DESC';
      $query = $this->db->prepare($sql);
      $parameters = array(':userid' => $user_id);
      $query->execute($parameters);

      return $query->fetchAll();
    }

    /**
     *
     * Setja username yfir í user id
     * @param
     *
    */
    public function getUserId($uname)
    {
      $sql = 'SELECT user_id
              FROM users
              WHERE username = :username';
      $query = $this->db->prepare($sql);
      $parameters = array(':username' => $uname);
      $query->execute($parameters);

      return $query->fetchColumn();
    }


}
