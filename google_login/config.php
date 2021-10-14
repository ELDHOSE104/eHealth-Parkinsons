<?php
session_start();
require_once 'google_login/vendor/autoload.php';
$google_user = new Google_Client();

$google_user->setClientId('34484166282-02hdhh37ld3bf4v1s0dt81eqk4j4aemf.apps.googleusercontent.com');
$google_user->setClientSecret('-jbpF80-ZVJH2ef2LPQEVYVE');

$google_user->setRedirectUri('https://eldhose.me/PD-eHealth-application/google_login.php');
$google_user->addScope('email');
$google_user->addScope('profile');

?>