<?php

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
