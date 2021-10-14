<?php
$servername ='localhost';
//$username ='root';
//$password = '';
$username='admin_eldhose';
$password='eldhose4444';
$dbname = "admin_pd";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
die('Could not Connect My Sql:' .mysql_error());
}

?>