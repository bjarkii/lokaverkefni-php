<?php

if(!$_SESSION['user_logged']){
    header('Location: login/');
}

  if(isset($_POST['logout-button']))
  {
    session_destroy();
    header('index.php');
    $_SESSION['user_logged'] = false;
  }
