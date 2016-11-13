<?php
/**
 * Class Users
 *
 * User klasinn, birtir profile-a
 *
 */
class User extends Controller
{

    public function index()
    {
      require APP . 'components/app.php';
      require APP . 'components/twig.php';
      echo $twig->render('edit-profile.twig', array());
    }

    public function findUser($uname)
    {
      require APP . 'components/app.php';
      // Athuga ef þú ert að followa notenda
      require APP . 'components/follow-check.php';

      $profileInfo = $this->users->getUserProfile($uname);
      $profilePosts = $this->users->getUserPosts($this->users->getUserId($uname));

      require APP . 'components/twig.php';
      echo $twig->render('profile.twig', array('userProfile'=>$profileInfo, 'userPosts'=>$profilePosts, 'isFollowing'=>$isFollowing));
    }

    public function allUsers()
    {
      require APP . 'components/app.php';

      $allUserInfo = $this->users->getAllUserProfiles();

      require APP . 'components/twig.php';
      echo $twig->render('all-profiles.twig', array('allUsers'=>$allUserInfo));
    }

}
