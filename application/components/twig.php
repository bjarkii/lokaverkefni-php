<?php

Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(APP . 'views');
$twig = new Twig_Environment($loader, array(
  /*'cache' => 'cache',*/
));
$twig->addExtension(new Twig_Extensions_Extension_Date());

if(isset($_SESSION['user_logged'])){
$twig->addGlobal('currentUserInfo', $lgdin_userinfo);
$twig->addGlobal('currentUserPosts', $lgdin_userposts);
$twig->addGlobal('currentFollowers', $lgdin_userfollowers);
$twig->addGlobal('path', 'http://localhost:8888');
}
