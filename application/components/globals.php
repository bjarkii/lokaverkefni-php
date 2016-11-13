<?php
if(isset($_SESSION['user_logged'])){
// Þegar breytt er um username er $lgdin_username update-aður
$lgdin_username = $_SESSION['username'];
$lgdin_userid = $this->users->getUserId($lgdin_username);
$lgdin_userinfo = $this->users->getUserProfile($lgdin_username);
$lgdin_userposts = $this->users->getUserPosts($this->users->getUserId($lgdin_username));
$lgdin_userfollowers = $this->follows->getFollowersInfo($this->users->getUserId($lgdin_username));
}
