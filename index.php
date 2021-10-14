<?php
include('google_login/config.php');
include('facebook_login/config.php');
$facebook_output = '';
$facebook_helper = $facebook->getRedirectLoginHelper();
$facebook_permissions = ['email']; // Optional permissions
$facebook_login_url = $facebook_helper->getLoginUrl('https://eldhose.me/PD-eHealth-application/facebook_login.php', $facebook_permissions);
$google_button = $google_user->createAuthUrl();
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container" style="text-align:center">
 <div class="row" >
    <h2 style="text-align:center">Welcome to Parkinson’s Disease eHealth Application</h2>
    <h3 style="text-align: center;">Login with any of the following accounts<h3>
     <div class="col">
        <a href="<?php echo $facebook_login_url;?>" class="fb btn">
          <i class="fa fa-facebook fa-fw"></i> Login with Facebook
         </a>
        
        <a href="<?php echo $google_button;?>" class="google btn"><i class="fa fa-google fa-fw">
          </i> Login with Google+
        </a>
         <a href="linkedin_login.php" class="linkedin btn">
          <i class="fa fa-linkedin fa-fw"></i>  Login with LinkedIn
        </a>
           <a href="twitter_login.php" class="twitter btn">
          <i class="fa fa-twitter fa-fw"></i>  Login with Twitter
        </a>
         </a>
           <a href="https://github.com/login/oauth/authorize?client_id=c52d8af65514ddd7e7d5" class="github btn">
          <i class="fa fa-github fa-fw"></i>  Login with Github
        </a>
      </div>
</div>

</div>
</body>
</html>
