<?php
/**
   * Class Home
   *
   * Controller fyrir home síðuna.
   *
  */
class Home extends Controller
{
    public function index()
    {
      // Sækir upplýsingar um núverandi notanda
      require APP . 'components/globals.php';
      // Athugar ef að notandi póstar/tweetar
      require APP . 'components/new-post.php';
      // Athugar ef að notandi likear post
      require APP . 'components/new-like.php';
      // Læsa síðu ef þú ert ekki log-aður inn
      require APP . 'session/restricted.php';

      $allPosts = $this->posts->getHomeFeed();

      $allUserInfo = $this->users->getAllUserProfiles();

      require APP . 'components/twig.php';
      echo $twig->render('home-feed.twig', array('allPosts'=>$allPosts, 'allUsers'=>$allUserInfo));
    }

}
