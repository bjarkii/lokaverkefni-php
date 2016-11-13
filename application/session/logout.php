<?php
  if(isset($_SESSION['user_logged']))
  {
    if(isset($_POST['logout-button']))
    {
      session_destroy();
      header('index.php');
      $_SESSION['user_logged'] = false;
    }
  }
?>
