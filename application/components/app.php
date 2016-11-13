<?php

// Globals
if(isset($_SESSION['user_logged'])){
// Þegar breytt er um username er $lgdin_username update-aður
$lgdin_username = $_SESSION['username'];
$lgdin_userid = $this->users->getUserId($lgdin_username);
$lgdin_userinfo = $this->users->getUserProfile($lgdin_username);
$lgdin_userposts = $this->users->getUserPosts($this->users->getUserId($lgdin_username));
$lgdin_userfollowers = $this->follows->getFollowersInfo($this->users->getUserId($lgdin_username));
}

// --------------------------------------
// Twig Templates Initalize
// -------------------------------------

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



// Add new post
if(isset($_POST['new-status']))
{
  $content = $_POST['status-content'];
  $username = $_SESSION['username'];
  $userid = $this->users->getUserId($username);
  $postid = $this->posts->generatePostId();

  if (isset($_POST['image-content'])) {
    $pic = $_POST['image-content'];
    $this->posts->addNewPost($content, $userid, $postid, $pic);
  }
  else {
    $this->posts->addNewPost($content, $userid, $postid, null);
  }
}

// Remove Post
if (isset($_POST['profile-follow-action'])) {
  $postid = $_POST['profile-follow-action'];

  $this->posts->removepost($postid);
}

// New Like
if(isset($_POST['like-action']))
{
  $postid = $_POST['like-action'];
  $this->posts->newLike($this->users->getUserId($lgdin_username), $postid);
}


// New follow
if(isset($_POST['profile-follow-action']))
{
  $userid = $_POST['profile-follow-action'];
  $this->users->followUser($lgdin_userid, $userid);
}
