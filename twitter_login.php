<?php
require_once 'twitter_login/config.php';
 include('database.php');

    $twitter_login->authenticate();
    $twitter_user_info = $twitter_login->getUserProfile();
    //print_r($userProfile);
   // echo '<a href="logout.php">Logout</a>';
$name =  $twitter_user_info->firstName;
$email = $twitter_user_info->email;
$image = $twitter_user_info->photoURL;
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
   header('location:junior_reseracher.php');
 }
}
else{
    $sql = "INSERT INTO user (username,email,Role_IDrole,image,Organization)
  VALUES ('$name','$email','5','$image','1')";
  mysqli_query($conn, $sql);
   header('location:junior_reseracher.php');

}


?>