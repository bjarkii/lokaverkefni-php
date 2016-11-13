<?php
/**
 * Class Users
 *
 * User klasinn, birtir profile-a
 *
*/

class Login extends Controller
{

    public function index()
    {

      require APP . 'session/login.php';

      if(isset($_POST['login-form']))
      {
        $uname = $_POST['login_username'];
        $upass = $_POST['login_password'];

        if($this->logins->login($uname,$upass))
        {
         $this->logins->redirect('../');
         echo "tókst";
        }
        else
        {
         echo "tókst ekki";
        }
      }

      if(isset($_POST['register-form']))
      {
        $uname = $_POST['register_uname'];
        $uemail = $_POST['register_email'];
        $upass = $_POST['register_password'];

        if ($this->logins->validateUsername($uname)) {
          if ($this->logins->validateEmail($uemail)) {
            if ($this->logins->validatePassword($upass)) {
              $this->logins->register($uname, $uemail, $upass);
            }
          }
        }

      }

      require APP . 'components/twig.php';
      echo $twig->render('login.twig', array());
    }

}
