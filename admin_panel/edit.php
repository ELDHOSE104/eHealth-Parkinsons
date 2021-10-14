<?php
include('db.php');
$id = $_GET['id'];
//echo $id; 
$sql = mysqli_query($conn,"select * from user where userID='$id'"); 
$data = mysqli_fetch_array($sql); 

if(isset($_POST['update'])) 
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sql = "UPDATE user SET username='$name', email='$email' WHERE userID='$id'";
          if(mysqli_query($conn, $sql))
          {
              echo "Records were updated successfully.";
              header("location:admin_view.php");
          }
          else
          {
              echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
          }  
}
?>
<html lang="en">
<head>
  <title>Admin Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2 style="text-align: center;">Edit page</h2>
  <a href="logout.php"><input id="btn_logout" name="logout" type="submit" class="btn btn-default" value="logout" / style="margin-left:55px;"></a>
    <form method="POST">
    <div class="form-group">
      <label>Name</label>
      <input type="text" class="form-control" name="name" value="<?php echo $data['username'];?>">
    </div>
    <div class="form-group">
      <label>Video Title </label>
       <input type="text" class="form-control" name="email" value="<?php echo $data['email'];?>" placeholder="" Required>
    </div>
     
     
    <button type="submit" name="update" value="update" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
