<?php

//logout.php

include('google_login/config.php');

//Reset OAuth access token
$google_user->revokeToken();

//Destroy entire session data.
session_destroy();

//redirect page to index.php
header('location:index.php');

?>