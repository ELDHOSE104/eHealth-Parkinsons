<?php
include('db.php');
session_start();
if(isset($_POST['submit']))
{
	$username = $_POST['user'];
	$password = md5($_POST['pass']);
  $sql = " select * from  tbl_admin where username='$username' and password='$password' ";
	$query = mysqli_query($conn,$sql);
	$row = mysqli_num_rows($query);
		if($row == 1){
			echo "login successful";
			$_SESSION['user'] = $username;
			header('location:admin_view.php');
		}else{
			//echo "login failed";
			 echo "<script>alert('Invalid username or password.');window.location.href='"."index.php';</script>";
		}
}

?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 <link rel="stylesheet" href="admin_style.css">
</head>
 
<body>

  <section class="container-fluid">
   <section class="row justify-content-center">
      <section class="col-12 col-sm-6 col-md-4">
        <form class="form-container" method="POST">
        <div class="form-group">
          <h4 class="text-center font-weight-bold" style="margin-top:0px;"> Admin Login </h4>
          <label>Username:</label>
          <input class="form-control" id="txt_username" name="user" placeholder="Username" type="text" value="" />
        </div>
        <div class="form-group">
           <label>Password:</label>
          <input class="form-control" id="txt_password" name="pass" placeholder="Password" type="password" value="" />
       </div>
        <input type="submit" class="btn btn-primary btn-block" name="submit" value="Login"></button>
        
        </form>
      </section>
    </section>
  </section>
</body>
</html>
