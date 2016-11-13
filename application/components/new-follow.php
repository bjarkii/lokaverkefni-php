<?php

if(isset($_POST['profile-follow-action']))
{
  $userid = $_POST['profile-follow-action'];
  $this->users->followUser($lgdin_userid, $userid);
}
