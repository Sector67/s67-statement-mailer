<?php

include_once('config.php');

// Let's verify our user 
if (!isset($_SERVER['PHP_AUTH_USER'])) {
  header('WWW-Authenticate: Basic realm="My Realm"');
  header('HTTP/1.0 401 Unauthorized');
  echo 'You need to be authorized to view this page.';
  exit;
} else {
  if(($_SERVER['PHP_AUTH_USER'] == 'cmeyer') && ($_SERVER['PHP_AUTH_PW'] == $PASSWORD)){

  } else {
    echo 'Bad user or pass.';
    die;
  }
}

?>