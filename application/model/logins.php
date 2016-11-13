<?php
/**
 * Class: Logins
 *
 * User klasinn, birtir profile-a
 *
 */
class Logins
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

    public static $errors = "";

    /**
     *
     * Nýskrá notenda
     * @param
     *
    */
    public function register($uname,$uemail,$upass)
    {
      if ($uname != "" && $uemail != "" && $upass != "") {

        $new_password = password_hash($upass, PASSWORD_DEFAULT);

        $sql = 'INSERT INTO users(username,email,password, description, banner_url, profile_pic)
                VALUES(:uname, :uemail, :upass, "User has no description", "http://www.qantas.com/images/qantas/Digital/Website/Images/heroimages/Destinations/North-America/USA/New-York/new-york-central-park/jpg/hero.desktop.jpg", "http://www.murketing.com/journal/wp-content/uploads/2009/04/nopic_192.gif")';
        $query = $this->db->prepare($sql);
        $parameters = array(':uname' => $uname,
                            ':uemail' => $uemail,
                            ':upass' => $new_password);
        $query->execute($parameters);

      }
    }

    /**
     *
     * Innskrá notenda, setja session varibles
     * @param
     *
    */
    public function login($uname, $upass)
    {
      if ($uname != "" && $upass != "") {

        $sql = 'SELECT * FROM users WHERE username=:uname LIMIT 1';
        $query = $this->db->prepare($sql);
        $parameters = array(':uname' => $uname);
        $query->execute($parameters);

        $userRow=$query->fetch(PDO::FETCH_ASSOC);
        if($query->rowCount() > 0)
        {
           if(password_verify($upass, $userRow['password']))
           {
              $_SESSION['username'] = $uname;
              $_SESSION['user_logged'] = true;
              return true;
           }
           else
           {
              return false;
           }
        }

      }
    }

    /**
     *
     * Nýsrkrá
     * Athuga hvort username er til nú .egar
     * @param
     *
    */
    public function validateUsername($uname)
    {
      $sql = 'SELECT username FROM users WHERE username = :uname';
      $query = $this->db->prepare($sql);
      $parameters = array(':uname' => $uname);
      $query->execute($parameters);

      $row = $query->fetchAll(PDO::FETCH_NUM);

      if ($row == null) {
        return true;
      }
      else {
        return false;
        $errors[] = "Username already taken";
      }

    }

    /**
     *
     * Nýsrkrá
     * Sjá hvort lykilorðið er valid
     * @param
     *
    */
    public function validatePassword($upass)
    {
      if (strlen($upass) > 6) {
        return true;
      }
      else {
        return false;
      }
    }

    /**
     *
     * Nýsrkrá
     * Athuga hvort email er valid
     * @param
     *
    */
    public function validateEmail($uemail)
    {
      if (filter_var($uemail, FILTER_VALIDATE_EMAIL)) {
        return true;
      }
      else {
        return false;
      }
    }

    /**
     *
     * Redirecta yfir á aðra síðu
     * @param
     *
    */
    public function redirect($url)
    {
      header("Location: $url");
    }




}
