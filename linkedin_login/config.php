<?php
require_once 'linkedin_login/vendor/autoload.php';
 
$config = [
    'callback' => 'https://eldhose.me/PD-eHealth-application/linkedin_login.php',
    'keys'     => [
                    'id' => '86ht2n4p6wrtkf',
                    'secret' => 'oImGXwAFc5olvz5a'
                ],
    'scope'    => 'r_liteprofile r_emailaddress',
];
 
$linkedin_login = new Hybridauth\Provider\LinkedIn( $config );
$linkedin_login->authenticate();