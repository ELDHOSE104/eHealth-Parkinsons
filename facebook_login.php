<?php
//include('google_login/config.php');
include('facebook_login/config.php');
include('database.php');
$facebook_helper = $facebook->getRedirectLoginHelper();
  $access_token = $facebook_helper->getAccessToken();

  $_SESSION['access_token'] = $access_token;

  $facebook->setDefaultAccessToken($_SESSION['access_token']);
  $graph_response = $facebook->get("/me?fields=name,email", $access_token);
  $facebook_user_info = $graph_response->getGraphUser();
  $id = $facebook_user_info['id'];
  $image='http://graph.facebook.com/'.$id.'/picture';

//print_r($facebook_user_info);
  $name=$facebook_user_info['name'];
  $email=$facebook_user_info['email'];
$sql = "SELECT userID, email, Role_IDrole FROM user WHERE email='$email'";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($query);
$login_email=$row['email'];
$role = $row['Role_IDrole'];
if($login_email==$email )
{
 if($role=='1')
 {
  header('location:patient_page.php');
 }
 if($role=='2')
 {
  header('location:physician_page.php');
 }
 if($role=='3')
 {
   header('location:reseracher_page.php');
 }
  if($role=='4')
 {
  header('location:junior_reseracher.php');
 }
 if($role=='5'){
  header('location:patient_page.php');
 }
}
else{
    $sql = "INSERT INTO user (username,email,Role_IDrole,image,Organization)
  VALUES ('$name','$email','5','$image','1')";
  mysqli_query($conn, $sql);

  header('location:patient_page.php');
}
  ?>