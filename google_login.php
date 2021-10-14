<?php
include('google_login/config.php');
include('database.php');

  $token = $google_user->fetchAccessTokenWithAuthCode($_GET["code"]);
  $google_user->setAccessToken($token['access_token']);
  $_SESSION['access_token'] = $token['access_token'];
  $google_data = new Google_Service_Oauth2($google_user);
  $data = $google_data->userinfo->get();
//print_r($data);
$name = $data['name'];
$email= $data['email'];
$image= $data['picture'];
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
 if($role=='5')
 {
   header('location:physician_page.php');
 }
}
else{
  $sql = "INSERT INTO user (username,email,Role_IDrole,image,Organization)
  VALUES ('$name','$email','5','$image','1')";
  mysqli_query($conn, $sql);
   header('location:physician_page.php');

}
?>