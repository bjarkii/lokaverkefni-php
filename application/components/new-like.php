<?php

if(isset($_POST['like-action']))
{
  $postid = $_POST['like-action'];
  $this->likes->newLike($this->users->getUserId($lgdin_username), $postid);
}
