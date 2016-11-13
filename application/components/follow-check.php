<?php

// Sækja id hjá logged in user, og username á profile
if ($this->follows->isFollowing($lgdin_userid, $this->users->getUserId($uname))) {
  return $isFollowing = true;
}
else {
  return $isFollowing = false;
}
