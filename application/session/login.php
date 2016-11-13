<?php

if(isset($_SESSION['user_logged'])){
    header('Location: home');
}
