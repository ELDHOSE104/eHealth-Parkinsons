<?php
require_once 'vendor/autoload.php';
  
$config = [
    'callback' => 'https://eldhose.me/PD-eHealth-application/twitter_login.php',
    'keys'     => ['key' => 'FNprJceCVqdm33o08Tkmk7jXv', 'secret' => '5sl67FpyuctPj95ECwrXY31ycbhksjQamPaVFLVFLd1ZCeOayN'],
    'authorize' => true
];
  
$twitter_login = new Hybridauth\Provider\Twitter( $config );

?>