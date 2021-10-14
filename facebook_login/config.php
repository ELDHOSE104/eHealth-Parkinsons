<?php

require_once 'facebook_login/vendor/autoload.php';

if (!session_id())
{
    session_start();
}

// Call Facebook API

$facebook = new \Facebook\Facebook([
  'app_id'      => '619991836045144',
  'app_secret'     => '4cc20dda273601f82690473a31fd81f5',
  'default_graph_version'  => 'v2.10'
]);

?>